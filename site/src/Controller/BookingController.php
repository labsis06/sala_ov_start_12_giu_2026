<?php
namespace Ov\Component\Salaov\Site\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;

class BookingController extends BaseController
{
    public function submit()
    {
        $this->checkToken();

        $app = Factory::getApplication();
        $user = $app->getIdentity();
        $return = $app->input->getBase64('return');
        $redirect = $return ? base64_decode($return) : Route::_('index.php?option=com_salaov&view=booking', false);

        if ($user->guest) {
            $app->enqueueMessage('Devi effettuare il login per prenotare.', 'warning');
            $this->setRedirect($redirect);
            return;
        }

        $db = Factory::getContainer()->get('DatabaseDriver');
        $date = $app->input->getString('visit_date');
        $slotInput = $app->input->getString('slot_id');
        $visitors = (int) $app->input->getInt('visitors');
        $slot = 0;
        $daySlotId = 0;
        $isDaySlot = strpos($slotInput, 'd:') === 0;
        if ($isDaySlot) { $daySlotId = (int) substr($slotInput, 2); }
        else { $slot = (int) str_replace('w:', '', $slotInput); }

        $weekday = (int) (new \DateTimeImmutable($date))->format('N');
        if ($isDaySlot) {
            $db->setQuery('SELECT capacity, visit_date FROM #__salaov_day_slots WHERE published = 1 AND id = ' . (int) $daySlotId);
            $slotRow = $db->loadObject();
            $capacity = $slotRow ? (int) $slotRow->capacity : 0;
            if (!$slotRow || (string) $slotRow->visit_date !== $date) {
                $app->enqueueMessage('La fascia specifica selezionata non corrisponde al giorno scelto.', 'error');
                $this->setRedirect($redirect);
                return;
            }
        } else {
            $db->setQuery('SELECT capacity, weekday FROM #__salaov_slots WHERE published = 1 AND id = ' . (int) $slot);
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
                $app->enqueueMessage('Il giorno selezionato non e disponibile.', 'error');
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

$visitLevel = $app->input->getCmd('visit_level', '');

if (!isset($visitLevels[$visitLevel])) {
    $app->enqueueMessage('Seleziona un livello visita valido.', 'error');
    $this->setRedirect($redirect);
    return;
}

$visitLevelLabel = $visitLevels[$visitLevel];

        $booking = (object) [
            'user_id' => (int) $user->id,
            'slot_id' => $slot,
            'day_slot_id' => $daySlotId ?: null,
            'visit_date' => $date,
            'first_name' => $app->input->getString('first_name'),
            'last_name' => $app->input->getString('last_name'),
            'email' => $app->input->getString('email'),
            'phone' => $app->input->getString('phone'),
            'organization' => $app->input->getString('organization'),
            'visitors' => $visitors,
            'notes' => $app->input->getString('notes'),
            'status' => 'pending',
            'created' => Factory::getDate()->toSql(),
            'language_id'   => (int) $language->id,
            'language_name' => $language->title,
            'visit_level_id'    => (int) $visitLevel->id,
            'visit_level_label' => $visitLevel->title,
        ];

        $db->insertObject('#__salaov_bookings', $booking);
        $this->sendNotice($booking);

        $app->enqueueMessage('Richiesta inviata. La prenotazione e in attesa di approvazione.');
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

        foreach ($recipients as $recipient) {
            $mailer->addRecipient($recipient->email, $recipient->name);
        }

        $mailer->setSubject('Nuova prenotazione Sala OV in attesa');
        $mailer->setBody(
            "Nuova richiesta di prenotazione Sala OV.\n\n"
            . "Data visita: {$booking->visit_date}\n"
            . "Lingua visita: {$booking->language_name}\n"
            . "Livello visita: {$booking->visit_level_label}\n"
            . "Richiedente: {$booking->first_name} {$booking->last_name}\n"
            . "Email: {$booking->email}\n"
            . "Telefono: {$booking->phone}\n"
            . "Visitatori: {$booking->visitors}\n"
            . "Ente/Scuola: {$booking->organization}\n"
        );

        $mailer->Send();
    } catch (\Throwable $e) {
    }
}
}
