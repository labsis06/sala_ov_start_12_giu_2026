<?php
namespace Ov\Component\Salaov\Administrator\Controller;
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Session\Session;
use Joomla\CMS\Uri\Uri;

class BookingsController extends BaseController
{
    public function approve()
    {
        $this->setStatus('approved', true);
    }

    public function reject()
    {
        $this->setStatus('rejected', false);
    }

    public function cancel()
    {
        $this->setStatus('cancelled', false);
    }

    private function setStatus(string $status, bool $withStaff = false): void
    {
        Session::checkToken() or die('Invalid token');

        $app     = Factory::getApplication();
        $ids     = $app->input->get('cid', [], 'array');
        $staffId = $app->input->getInt('staff_id');
        $db      = Factory::getContainer()->get('DatabaseDriver');

        $ids = array_values(array_filter(array_map('intval', $ids)));

if (empty($ids)) {
    $this->setRedirect(
        'index.php?option=com_salaov&view=bookings',
        'Seleziona almeno una prenotazione.',
        'warning'
    );
    return;
}


        if ($withStaff && !$staffId) {
            $this->setRedirect('index.php?option=com_salaov&view=bookings', 'Seleziona il personale che accompagnera la visita prima di approvare.', 'warning');
            return;
        }

        $staff = null;
        if ($withStaff && $staffId) {
            $query = $db->getQuery(true)
                ->select('*')
                ->from($db->quoteName('#__salaov_staff'))
                ->where($db->quoteName('id') . ' = ' . (int) $staffId)
                ->where($db->quoteName('published') . ' = 1');
            $db->setQuery($query);
            $staff = $db->loadObject();

            if (!$staff) {
                $this->setRedirect('index.php?option=com_salaov&view=bookings', 'Personale non trovato o non attivo.', 'error');
                return;
            }
        }

        $updated = 0;
        $emailsSent = 0;
        $adminEmailsSent = 0;

        foreach ($ids as $id) {
            $id = (int) $id;
            if (!$id) {
                continue;
            }

            $sets = [
                $db->quoteName('status') . ' = ' . $db->quote($status),
                $db->quoteName('modified') . ' = NOW()',
            ];

            if ($withStaff) {
                $sets[] = $db->quoteName('staff_id') . ' = ' . (int) $staff->id;
                $sets[] = $db->quoteName('staff_name') . ' = ' . $db->quote($staff->name);
            }

            $query = $db->getQuery(true)
                ->update($db->quoteName('#__salaov_bookings'))
                ->set($sets)
                ->where($db->quoteName('id') . ' = ' . $id);
            $db->setQuery($query)->execute();
            $updated++;

            if ($withStaff) {
                if (!empty($staff->email) && $this->sendStaffAssignmentEmail($id, $staff)) {
                    $emailsSent++;
                }

                $adminEmailsSent += $this->sendAdminStatusEmail($id, $status, $staff);
                $this->sendRequesterStatusEmail($id, $status, $staff);
            }
        }

        if ($withStaff) {
            $message = 'Prenotazione approvata e personale assegnato.';
            if ($emailsSent > 0) {
                $message .= ' Email inviata al personale assegnato: ' . $emailsSent . '.';
            } elseif ($staff && empty($staff->email)) {
                $message .= ' Nessuna email inviata: il personale selezionato non ha un indirizzo email configurato.';
            }

            if ($adminEmailsSent > 0) {
                $message .= ' Email inviata agli amministratori: ' . $adminEmailsSent . '.';
            }
        } else {
            $message = 'Stato aggiornato.';
        }

        $this->setRedirect('index.php?option=com_salaov&view=bookings', $message);
    }

    private function sendStaffAssignmentEmail(int $bookingId, object $staff): bool
    {
        try {
            $db = Factory::getContainer()->get('DatabaseDriver');
            $query = $db->getQuery(true)
                ->select([
                    'b.*',
                    's.title AS slot_title',
                    's.start_time',
                    's.end_time',
                ])
                ->from($db->quoteName('#__salaov_bookings', 'b'))
                ->join('LEFT', $db->quoteName('#__salaov_slots', 's') . ' ON s.id = b.slot_id')
                ->where('b.id = ' . (int) $bookingId);
            $db->setQuery($query);
            $booking = $db->loadObject();

            if (!$booking || empty($staff->email)) {
                return false;
            }

            $config = Factory::getApplication()->getConfig();
            $siteName  = (string) $config->get('sitename');

            $subject = 'Assegnazione visita Sala OV - ' . $booking->visit_date;
            $slot = trim(($booking->slot_title ?: 'Fascia oraria') . ' ' . substr((string) $booking->start_time, 0, 5) . '-' . substr((string) $booking->end_time, 0, 5));

            $body = "Gentile " . $staff->name . ",\n\n"
                . "ti e stata assegnata la gestione di una visita alla Sala di Monitoraggio dell'Osservatorio Vesuviano.\n\n"
                . "Riepilogo prenotazione:\n"
                . "Data visita: " . $booking->visit_date . "\n"
                . "Fascia oraria: " . $slot . "\n"
                . "Richiedente: " . $booking->first_name . " " . $booking->last_name . "\n"
                . "Email richiedente: " . $booking->email . "\n"
                . "Telefono: " . $booking->phone . "\n"
                . "Ente/Scuola: " . $booking->organization . "\n"
                . "Numero visitatori: " . (int) $booking->visitors . "\n"
                . "Lingua visita: " . $booking->language_name . "\n"
                . "Note: " . trim((string) $booking->notes) . "\n\n"
                . "Questa email e stata generata automaticamente dal sistema di prenotazione Sala OV.\n"
                . $siteName . "\n";

            $mailer = Factory::getMailer();
            $this->setMailerSender($mailer);
            $mailer->addRecipient($staff->email, $staff->name);
            $mailer->setSubject($subject);
            $mailer->setBody($body);

            return $mailer->Send() === true;
        } catch (\Throwable $e) {
            Factory::getApplication()->enqueueMessage('Errore invio email al personale: ' . $e->getMessage(), 'warning');
            return false;
        }
    }

    private function sendRequesterStatusEmail(int $bookingId, string $status, ?object $staff = null): bool
    {
        try {
            $booking = $this->getBookingForEmail($bookingId);

            if (!$booking || empty($booking->email)) {
                return false;
            }

            $mailer = Factory::getMailer();
            $this->setMailerSender($mailer);
            $mailer->addRecipient($booking->email, trim($booking->first_name . ' ' . $booking->last_name));
            $mailer->setSubject('Prenotazione Sala OV approvata - ' . $booking->visit_date);
            $mailer->setBody($this->buildRequesterStatusEmailBody($booking, $status, $staff));

            return $mailer->Send() === true;
        } catch (\Throwable $e) {
            Factory::getApplication()->enqueueMessage('Errore invio email al referente della visita: ' . $e->getMessage(), 'warning');
            return false;
        }
    }

    private function setMailerSender($mailer): void
    {
        $config = Factory::getApplication()->getConfig();
        $fromEmail = (string) $config->get('mailfrom');
        $fromName = (string) $config->get('fromname');

        if ($fromEmail) {
            $mailer->setSender([$fromEmail, $fromName]);
        }
    }

    private function buildRequesterStatusEmailBody(object $booking, string $status, ?object $staff = null): string
    {
        $staffName = $staff->name ?? $booking->staff_name ?? '';

        return "Gentile {$booking->first_name} {$booking->last_name},\n\n"
            . "La tua prenotazione alla Sala OV e stata approvata.\n\n"
            . "Riepilogo prenotazione:\n"
            . "Data visita: {$booking->visit_date}\n"
            . "Lingua visita: {$booking->language_name}\n"
            . "Livello visita: {$booking->visit_level_label}\n"
            . "Referente visita: {$staffName}\n"
            . "Visitatori: " . (int) $booking->visitors . "\n"
            . "Ente/Scuola: {$booking->organization}\n"
            . "Note: " . trim((string) $booking->notes) . "\n\n"
            . "Questa email e stata generata automaticamente dal sistema di prenotazione Sala OV.\n";
    }


    private function sendAdminStatusEmail(int $bookingId, string $status, ?object $staff = null): int
    {
        try {
            $booking = $this->getBookingForEmail($bookingId);
            $recipients = $this->getAdminRecipients();

            if (!$booking || !$recipients) {
                return 0;
            }

            $sent = 0;
            foreach ($recipients as $recipient) {
                if (empty($recipient->email)) {
                    continue;
                }

                $mailer = Factory::getMailer();
                $this->setMailerSender($mailer);
                $mailer->addRecipient($recipient->email, $recipient->name);
                $mailer->setSubject('Prenotazione Sala OV approvata - ' . $booking->visit_date);
                $mailer->setBody($this->buildBookingEmailBody($booking, $status, $staff));

                if ($mailer->Send() === true) {
                    $sent++;
                }
            }

            return $sent;
        } catch (\Throwable $e) {
            Factory::getApplication()->enqueueMessage('Errore invio email agli amministratori: ' . $e->getMessage(), 'warning');
            return 0;
        }
    }

    private function getAdminRecipients(): array
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $db->setQuery('SELECT name, email FROM #__salaov_admin_recipients WHERE published = 1 AND email <> "" ORDER BY name ASC');
        $recipients = $db->loadObjectList();

        if ($recipients) {
            return $recipients;
        }

        $config = Factory::getApplication()->getConfig();
        $fallback = (string) $config->get('mailfrom');

        return $fallback ? [(object) ['name' => 'Amministratore', 'email' => $fallback]] : [];
    }

    private function getBookingForEmail(int $bookingId): ?object
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $query = $db->getQuery(true)
            ->select([
                'b.*',
                's.title AS slot_title',
                's.start_time',
                's.end_time',
            ])
            ->from($db->quoteName('#__salaov_bookings', 'b'))
            ->join('LEFT', $db->quoteName('#__salaov_slots', 's') . ' ON s.id = b.slot_id')
            ->where('b.id = ' . (int) $bookingId);
        $db->setQuery($query);
        $booking = $db->loadObject();

        return $booking ?: null;
    }

    private function buildBookingEmailBody(object $booking, string $status, ?object $staff = null): string
    {
        $slot = trim(($booking->slot_title ?: 'Fascia oraria') . ' ' . substr((string) $booking->start_time, 0, 5) . '-' . substr((string) $booking->end_time, 0, 5));
        $staffName = $staff->name ?? $booking->staff_name ?? '';

        return "Prenotazione Sala OV aggiornata.\n\n"
            . "Stato richiesta: {$status}\n"
            . "Data visita: {$booking->visit_date}\n"
            . "Fascia oraria: {$slot}\n"
            . "Lingua visita: {$booking->language_name}\n"
            . "Livello visita: {$booking->visit_level_label}\n"
            . "Referente visita: {$staffName}\n"
            . "Richiedente: {$booking->first_name} {$booking->last_name}\n"
            . "Email: {$booking->email}\n"
            . "Telefono: {$booking->phone}\n"
            . "Visitatori: " . (int) $booking->visitors . "\n"
            . "Ente/Scuola: {$booking->organization}\n"
            . "Note: " . trim((string) $booking->notes) . "\n";
    }



    public function saveEdit(): void
    {
    Session::checkToken() or die('Invalid token');

    $app = Factory::getApplication();
    $db  = Factory::getContainer()->get('DatabaseDriver');

    $id = $app->input->getInt('id', 0);

    if ($id <= 0) {
        $this->setRedirect(
            'index.php?option=com_salaov&view=bookings',
            'Prenotazione non valida.',
            'error'
        );
        return;
    }

    $languageId   = $app->input->getInt('language_id', 0);
    $visitLevelId = $app->input->getInt('visit_level_id', 0);
    $staffId      = $app->input->getInt('staff_id_edit', 0);
    $slotId       = $app->input->getInt('slot_id_edit', 0);

    $languageName = '';
    if ($languageId > 0) {
        $query = $db->getQuery(true)
            ->select($db->quoteName('title'))
            ->from($db->quoteName('#__salaov_languages'))
            ->where($db->quoteName('id') . ' = ' . (int) $languageId);

        $db->setQuery($query);
        $languageName = (string) $db->loadResult();
    }

    $visitLevelLabel = '';
    if ($visitLevelId > 0) {
        $query = $db->getQuery(true)
            ->select($db->quoteName('title'))
            ->from($db->quoteName('#__salaov_visit_levels'))
            ->where($db->quoteName('id') . ' = ' . (int) $visitLevelId);

        $db->setQuery($query);
        $visitLevelLabel = (string) $db->loadResult();
    }

    $staffName = '';
    if ($staffId > 0) {
        $query = $db->getQuery(true)
            ->select($db->quoteName('name'))
            ->from($db->quoteName('#__salaov_staff'))
            ->where($db->quoteName('id') . ' = ' . (int) $staffId);

        $db->setQuery($query);
        $staffName = (string) $db->loadResult();
    }

    $allowedStatuses = ['pending', 'approved', 'rejected', 'cancelled'];
    $status = $app->input->getCmd('status', 'pending');

    if (!in_array($status, $allowedStatuses, true)) {
        $status = 'pending';
    }

    $visitDate = $app->input->getString('visit_date', '');

    if ($visitDate === '') {
        $this->setRedirect(
            'index.php?option=com_salaov&view=bookings&edit=' . (int) $id,
            'La data visita è obbligatoria.',
            'warning'
        );
        return;
    }

    $sets = [
        $db->quoteName('visit_date') . ' = ' . $db->quote($visitDate),
        $db->quoteName('slot_id') . ' = ' . (int) $slotId,
        $db->quoteName('day_slot_id') . ' = NULL',
        $db->quoteName('first_name') . ' = ' . $db->quote($app->input->getString('first_name', '')),
        $db->quoteName('last_name') . ' = ' . $db->quote($app->input->getString('last_name', '')),
        $db->quoteName('email') . ' = ' . $db->quote($app->input->getString('email', '')),
        $db->quoteName('phone') . ' = ' . $db->quote($app->input->getString('phone', '')),
        $db->quoteName('organization') . ' = ' . $db->quote($app->input->getString('organization', '')),
        $db->quoteName('visitors') . ' = ' . (int) $app->input->getInt('visitors', 1),
        $db->quoteName('language_id') . ' = ' . (int) $languageId,
        $db->quoteName('language_name') . ' = ' . $db->quote($languageName),
        $db->quoteName('visit_level_id') . ' = ' . (int) $visitLevelId,
        $db->quoteName('visit_level_label') . ' = ' . $db->quote($visitLevelLabel),
        $db->quoteName('staff_id') . ' = ' . (int) $staffId,
        $db->quoteName('staff_name') . ' = ' . $db->quote($staffName),
        $db->quoteName('status') . ' = ' . $db->quote($status),
        $db->quoteName('notes') . ' = ' . $db->quote($app->input->getString('notes', '')),
        $db->quoteName('modified') . ' = NOW()',
    ];

    $query = $db->getQuery(true)
        ->update($db->quoteName('#__salaov_bookings'))
        ->set($sets)
        ->where($db->quoteName('id') . ' = ' . (int) $id);

    $db->setQuery($query)->execute();

    $this->setRedirect(
        'index.php?option=com_salaov&view=bookings',
        'Prenotazione modificata correttamente.'
    );
    }



    public function export()
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $db->setQuery('SELECT b.*, s.title AS slot_title, s.start_time, s.end_time, COALESCE(st.name,b.staff_name) AS staff_label FROM #__salaov_bookings b LEFT JOIN #__salaov_slots s ON s.id=b.slot_id LEFT JOIN #__salaov_staff st ON st.id=b.staff_id ORDER BY b.visit_date DESC, b.id DESC');
        $rows = $db->loadAssocList();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=salaov_prenotazioni.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID','Data','Fascia','Nome','Cognome','Email','Telefono','Ente/Scuola','Livello visita','Visitatori','Stato','Personale','Note']);
        foreach ($rows as $r) {
           fputcsv($out, [
    $r['id'],
    $r['visit_date'],
    $r['slot_title'] . ' ' . $r['start_time'] . '-' . $r['end_time'],
    $r['first_name'],
    $r['last_name'],
    $r['email'],
    $r['phone'],
    $r['organization'],
    $r['visit_level_label'],
    $r['visitors'],
    $r['status'],
    $r['staff_label'],
    $r['notes']
]);
}
        fclose($out);
        Factory::getApplication()->close();
    }
}
