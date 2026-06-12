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

            if ($withStaff && !empty($staff->email)) {
                if ($this->sendStaffAssignmentEmail($id, $staff)) {
                    $emailsSent++;
                }
            }
        }

        if ($withStaff) {
            $message = 'Prenotazione approvata e personale assegnato.';
            if ($emailsSent > 0) {
                $message .= ' Email inviata al personale assegnato: ' . $emailsSent . '.';
            } elseif ($staff && empty($staff->email)) {
                $message .= ' Nessuna email inviata: il personale selezionato non ha un indirizzo email configurato.';
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
            $fromEmail = (string) $config->get('mailfrom');
            $fromName  = (string) $config->get('fromname');
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
                . "Note: " . trim((string) $booking->notes) . "\n\n"
                . "Questa email e stata generata automaticamente dal sistema di prenotazione Sala OV.\n"
                . $siteName . "\n";

            $mailer = Factory::getMailer();
            $mailer->setSender([$fromEmail, $fromName]);
            $mailer->addRecipient($staff->email, $staff->name);
            $mailer->setSubject($subject);
            $mailer->setBody($body);

            return $mailer->Send() === true;
        } catch (\Throwable $e) {
            Factory::getApplication()->enqueueMessage('Errore invio email al personale: ' . $e->getMessage(), 'warning');
            return false;
        }
    }

    public function export()
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $db->setQuery('SELECT b.*, s.title AS slot_title, s.start_time, s.end_time, COALESCE(st.name,b.staff_name) AS staff_label FROM #__salaov_bookings b LEFT JOIN #__salaov_slots s ON s.id=b.slot_id LEFT JOIN #__salaov_staff st ON st.id=b.staff_id ORDER BY b.visit_date DESC, b.id DESC');
        $rows = $db->loadAssocList();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=salaov_prenotazioni.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID','Data','Fascia','Nome','Cognome','Email','Telefono','Ente/Scuola','Visitatori','Stato','Personale','Note']);
        foreach ($rows as $r) {
            fputcsv($out, [$r['id'],$r['visit_date'],$r['slot_title'].' '.$r['start_time'].'-'.$r['end_time'],$r['first_name'],$r['last_name'],$r['email'],$r['phone'],$r['organization'],$r['visitors'],$r['status'],$r['staff_label'],$r['notes']]);
        }
        fclose($out);
        Factory::getApplication()->close();
    }
}
