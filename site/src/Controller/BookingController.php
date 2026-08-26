<?php
namespace Ov\Component\Salaov\Site\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

class BookingController extends BaseController
{
    public function submit()
    {
        $this->checkToken();

        $app = Factory::getApplication();
        $user = $app->getIdentity();
        $return = $app->input->getBase64('return');
        $redirect = $return ? base64_decode($return) : Route::_('index.php?option=com_salaov&view=booking', false);


        $db = Factory::getContainer()->get('DatabaseDriver');
        $date = $app->input->getString('visit_date');
        $slotInput = $app->input->getString('slot_id');
        $visitors = (int) $app->input->getInt('visitors');
        $firstName = trim($app->input->getString('first_name'));
        $lastName = trim($app->input->getString('last_name'));
        $email = trim($app->input->getString('email'));
        $organization = trim($app->input->getString('organization'));

        if ($firstName === '' || $lastName === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $app->enqueueMessage('Nome, Cognome ed Email sono obbligatori. Inserisci un indirizzo email valido.', 'error');
            $this->setRedirect($redirect);
            return;
        }

        if ($visitors > 1 && $organization === '') {
            $app->enqueueMessage('La denominazione del gruppo è obbligatoria per una visita con più partecipanti.', 'error');
            $this->setRedirect($redirect);
            return;
        }
        $canApproveDirectly = $user && !$user->guest && (
            $user->authorise('core.admin') ||
            $user->authorise('core.manage', 'com_salaov')
        );

$approveNow = $canApproveDirectly && $app->input->getInt('approve_now', 0) === 1;
$bookingStatus = $approveNow ? 'approved' : 'pending';
        $staff = null;
        $staffId = $canApproveDirectly ? $app->input->getInt('staff_id', 0) : 0;

        if ($staffId > 0) {
            $query = $db->getQuery(true)
                ->select($db->quoteName(['id', 'name']))
                ->from($db->quoteName('#__salaov_staff'))
                ->where($db->quoteName('id') . ' = ' . (int) $staffId)
                ->where($db->quoteName('published') . ' = 1');
            $db->setQuery($query);
            $staff = $db->loadObject();

            if (!$staff) {
                $app->enqueueMessage('Seleziona un membro del personale valido.', 'error');
                $this->setRedirect($redirect);
                return;
            }
        }

        $slot = 0;
        $daySlotId = 0;
        $isDaySlot = strpos($slotInput, 'd:') === 0;
        if ($isDaySlot) { $daySlotId = (int) substr($slotInput, 2); }
        else { $slot = (int) str_replace('w:', '', $slotInput); }

        $weekday = (int) (new \DateTimeImmutable($date))->format('N');
        if ($isDaySlot) {
            $db->setQuery('SELECT capacity, visit_date, title, start_time, end_time FROM #__salaov_day_slots WHERE published = 1 AND id = ' . (int) $daySlotId);
            $slotRow = $db->loadObject();
            $capacity = $slotRow ? (int) $slotRow->capacity : 0;
            if (!$slotRow || (string) $slotRow->visit_date !== $date) {
                $app->enqueueMessage('La fascia specifica selezionata non corrisponde al giorno scelto.', 'error');
                $this->setRedirect($redirect);
                return;
            }
        } else {
            $db->setQuery('SELECT capacity, weekday, title, start_time, end_time FROM #__salaov_slots WHERE published = 1 AND id = ' . (int) $slot);
            $slotRow = $db->loadObject();
            $capacity = $slotRow ? (int) $slotRow->capacity : 0;
            if (!$slotRow || (int) $slotRow->weekday !== $weekday) {
                $app->enqueueMessage('La fascia selezionata non corrisponde al giorno scelto.', 'error');
                $this->setRedirect($redirect);
                return;
            }
        }

        $db->setQuery('SELECT available, capacity FROM #__salaov_day_capacity WHERE visit_date = ' . $db->quote($date));
        $dayRule = $db->loadObject();
        if ($dayRule) {
            if (!(int) $dayRule->available) {
                $app->enqueueMessage('Il giorno selezionato non è disponibile.', 'error');
                $this->setRedirect($redirect);
                return;
            }
            $capacity = min($capacity, (int) $dayRule->capacity);
        }

        $db->setQuery(
            'SELECT COALESCE(SUM(visitors), 0) FROM #__salaov_bookings'
            . ' WHERE status IN (' . $db->quote('pending') . ',' . $db->quote('approved') . ')'
            . ' AND visit_date = ' . $db->quote($date)
            . ($isDaySlot ? ' AND day_slot_id = ' . (int) $daySlotId : ' AND slot_id = ' . (int) $slot . ' AND (day_slot_id IS NULL OR day_slot_id = 0)')
        );
        $used = (int) $db->loadResult();

        if (!$capacity || $visitors < 1 || ($used + $visitors) > $capacity) {
            $app->enqueueMessage('La fascia selezionata non ha disponibilita sufficiente.', 'error');
            $this->setRedirect($redirect);
            return;
        }
        
        $languageId = $app->input->getInt('language_id');

        $db->setQuery(
                       'SELECT * FROM #__salaov_languages WHERE published = 1 AND id = ' . (int) $languageId
                     );
        $language = $db->loadObject();

        if (!$language) {
            $app->enqueueMessage('Seleziona una lingua valida per la visita.', 'error');
            $this->setRedirect($redirect);
            return;
                        }

        $visitLevelId = $app->input->getInt('visit_level_id');

$db->setQuery(
    'SELECT * FROM #__salaov_visit_levels WHERE published = 1 AND id = ' . (int) $visitLevelId
);

$visitLevel = $db->loadObject();

if (!$visitLevel) {
    $app->enqueueMessage('Seleziona un livello visita valido.', 'error');
    $this->setRedirect($redirect);
    return;
}



        $booking = (object) [
            'user_id' => $user->guest ? 0 : (int) $user->id,
            'slot_id' => $slot,
            'day_slot_id' => $daySlotId ?: null,
            'visit_date' => $date,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $app->input->getString('phone'),
            'organization' => $organization,
            'visitors' => $visitors,
            'notes' => $app->input->getString('notes'),
            'status' => $bookingStatus,
            'created' => Factory::getDate()->toSql(),
            'language_id'   => (int) $language->id,
            'language_name' => $language->title,
            'visit_level_id'    => (int) $visitLevel->id,
            'visit_level_label' => $visitLevel->title,
            'staff_id' => $staff ? (int) $staff->id : null,
            'staff_name' => $staff ? $staff->name : null,
        ];

        $db->insertObject('#__salaov_bookings', $booking);
        $booking->id = (int) $db->insertid();
        $booking->slot_label = trim((string) $slotRow->title)
            . ' ' . substr((string) $slotRow->start_time, 0, 5)
            . '-' . substr((string) $slotRow->end_time, 0, 5);
        $this->sendNotice($booking);
        $this->sendReferentNotice($booking, $approveNow ? 'approved' : 'pending');
        $this->sendRequesterNotice($booking, $approveNow ? 'approved' : 'pending');

        if ($approveNow) {
          $app->enqueueMessage('Richiesta inviata e approvata direttamente.');
        } else {
          $app->enqueueMessage('Richiesta inviata. La prenotazione è in attesa di approvazione.');
        }
        $this->setRedirect($redirect);
    }

    private function sendNotice($booking)
    {
        try {
            $db = Factory::getContainer()->get('DatabaseDriver');

            $db->setQuery(
                'SELECT name, email FROM #__salaov_admin_recipients WHERE published = 1 AND email <> "" ORDER BY name ASC'
            );
            $recipients = $db->loadObjectList();

            if (!$recipients) {
                $config = Factory::getConfig();
                $fallback = (string) $config->get('mailfrom');

                if (!$fallback) {
                    return;
                }

                $recipients = [(object) ['name' => 'Amministratore', 'email' => $fallback]];
            }

            $mailer = Factory::getMailer();
            $this->setMailerSender($mailer);

            foreach ($recipients as $recipient) {
                $mailer->addRecipient($recipient->email, $recipient->name);
            }

            $mailer->setSubject(
               $booking->status === 'approved'
                ? 'Nuova prenotazione Sala OV approvata direttamente'
                : 'Nuova prenotazione Sala OV in attesa'
            );
            $adminBookingsUrl = Uri::root() . 'administrator/index.php?option=com_salaov&view=bookings';
            $mailer->setBody(
                "Nuova richiesta di prenotazione Sala OV.\n\n"
                . "Stato richiesta: {$booking->status}\n"
                . "Data visita: {$booking->visit_date}\n"
                . "Fascia oraria: {$booking->slot_label}\n"
                . "Lingua visita: {$booking->language_name}\n"
                . "Livello visita: {$booking->visit_level_label}\n"
                . "Personale OV assegnato alla visita: " . ($booking->staff_name ?? '-') . "\n"
                . "Richiedente: {$booking->first_name} {$booking->last_name}\n"
                . "Email: {$booking->email}\n"
                . "Telefono: {$booking->phone}\n"
                . "Visitatori: {$booking->visitors}\n"
                . "Ente/Scuola: {$booking->organization}\n"
                . "\nGestisci le prenotazioni: {$adminBookingsUrl}\n"
            );

            $mailer->Send();
        } catch (\Throwable $e) {
        }
    }

    private function sendRequesterNotice(object $booking, string $event): bool
    {
        try {
            if (empty($booking->email)) {
                return false;
            }

            $mailer = Factory::getMailer();
            $this->setMailerSender($mailer);
            $mailer->addRecipient($booking->email, trim($booking->first_name . ' ' . $booking->last_name));
            $mailer->setSubject(
                $event === 'approved'
                    ? 'Prenotazione Sala OV approvata - ' . $booking->visit_date
                    : 'Richiesta prenotazione Sala OV ricevuta - ' . $booking->visit_date
            );
            $mailer->setBody($this->buildRequesterMailBody($booking, $event));

            return $mailer->Send() === true;
        } catch (\Throwable $e) {
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

    private function buildRequesterMailBody(object $booking, string $event): string
    {
        $statusLabel = $event === 'approved'
            ? 'La tua prenotazione e stata approvata.'
            : 'La tua richiesta e stata ricevuta ed e in attesa di approvazione.';

        return "Gentile {$booking->first_name} {$booking->last_name},\n\n"
            . $statusLabel . "\n\n"
            . "Riepilogo richiesta:\n"
            . "Data visita: {$booking->visit_date}\n"
            . "Fascia oraria: {$booking->slot_label}\n"
            . "Lingua visita: {$booking->language_name}\n"
            . "Livello visita: {$booking->visit_level_label}\n"
            . "Visitatori: {$booking->visitors}\n"
            . "Ente/Scuola: {$booking->organization}\n"
            . "Note: " . trim((string) $booking->notes) . "\n\n"
            . "Questa email e stata generata automaticamente dal sistema di prenotazione Sala OV.\n";
    }

    private function sendReferentNotice(object $booking, string $event): int
    {
        try {
            $referents = $this->getVisitReferents($booking);

            if (!$referents) {
                return 0;
            }

            $sent = 0;
            foreach ($referents as $referent) {
                if (empty($referent->email)) {
                    continue;
                }

                $mailer = Factory::getMailer();
                $this->setMailerSender($mailer);
                $mailer->addRecipient($referent->email, $referent->name);
                $mailer->setSubject(
                    $event === 'approved'
                        ? 'Prenotazione Sala OV approvata - ' . $booking->visit_date
                        : 'Nuova richiesta Sala OV - ' . $booking->visit_date
                );
                $mailer->setBody($this->buildBookingMailBody($booking, $event));

                if ($mailer->Send() === true) {
                    $sent++;
                }
            }

            return $sent;
        } catch (\Throwable $e) {
            return 0;
        }
    }

    private function getVisitReferents(object $booking): array
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $query = $db->getQuery(true)
            ->select('DISTINCT s.name, s.email')
            ->from($db->quoteName('#__salaov_day_staff', 'ds'))
            ->join('INNER', $db->quoteName('#__salaov_staff', 's') . ' ON s.id = ds.staff_id')
            ->where('ds.visit_date = ' . $db->quote($booking->visit_date))
            ->where('s.published = 1')
            ->where('s.email <> ' . $db->quote(''))
            ->order('s.name ASC');
        $db->setQuery($query);

        return $db->loadObjectList() ?: [];
    }

    private function buildBookingMailBody(object $booking, string $event): string
    {
        $statusLabel = $event === 'approved' ? 'approvata' : 'in attesa di approvazione';

        return "Prenotazione Sala OV {$statusLabel}.\n\n"
            . "Data visita: {$booking->visit_date}\n"
            . "Fascia oraria: {$booking->slot_label}\n"
            . "Lingua visita: {$booking->language_name}\n"
            . "Livello visita: {$booking->visit_level_label}\n"
            . "Richiedente: {$booking->first_name} {$booking->last_name}\n"
            . "Email: {$booking->email}\n"
            . "Telefono: {$booking->phone}\n"
            . "Visitatori: {$booking->visitors}\n"
            . "Ente/Scuola: {$booking->organization}\n"
            . "Note: " . trim((string) $booking->notes) . "\n";
    }

}
