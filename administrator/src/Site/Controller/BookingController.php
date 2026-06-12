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
        $slot = (int) $app->input->getInt('slot_id');
        $visitors = (int) $app->input->getInt('visitors');

        $weekday = (int) (new \DateTimeImmutable($date))->format('N');
        $db->setQuery('SELECT capacity, weekday FROM #__salaov_slots WHERE published = 1 AND id = ' . $slot);
        $slotRow = $db->loadObject();
        $capacity = $slotRow ? (int) $slotRow->capacity : 0;

        if (!$slotRow || (int) $slotRow->weekday !== $weekday) {
            $app->enqueueMessage('La fascia selezionata non corrisponde al giorno scelto.', 'error');
            $this->setRedirect($redirect);
            return;
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
            . ' AND slot_id = ' . $slot
        );
        $used = (int) $db->loadResult();

        if (!$capacity || $visitors < 1 || ($used + $visitors) > $capacity) {
            $app->enqueueMessage('La fascia selezionata non ha disponibilita sufficiente.', 'error');
            $this->setRedirect($redirect);
            return;
        }

        $booking = (object) [
            'user_id' => (int) $user->id,
            'slot_id' => $slot,
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
        ];

        $db->insertObject('#__salaov_bookings', $booking);
        $this->sendNotice($booking);

        $app->enqueueMessage('Richiesta inviata. La prenotazione e in attesa di approvazione.');
        $this->setRedirect($redirect);
    }

    private function sendNotice($booking)
    {
        try {
            $mailer = Factory::getMailer();
            $config = Factory::getConfig();
            $to = $config->get('mailfrom');
            $mailer->addRecipient($to);
            $mailer->setSubject('Nuova prenotazione Sala OV in attesa');
            $mailer->setBody("Nuova richiesta per {$booking->visit_date}. Richiedente: {$booking->first_name} {$booking->last_name}, visitatori: {$booking->visitors}, ente: {$booking->organization}");
            $mailer->Send();
        } catch (\Throwable $e) {
        }
    }
}
