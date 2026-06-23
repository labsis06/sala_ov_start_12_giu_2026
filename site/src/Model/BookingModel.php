<?php
namespace Ov\Component\Salaov\Site\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class BookingModel extends BaseDatabaseModel
{
    public function getSlots()
    {
        $db = $this->getDatabase();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__salaov_slots'))
            ->where($db->quoteName('published') . ' = 1')
            ->order($db->quoteName(['weekday', 'start_time']));
        $db->setQuery($query);
        return $db->loadObjectList();
    }

    public function getLanguages()
    {
    $db = $this->getDatabase();
    $db->setQuery('SELECT * FROM #__salaov_languages WHERE published = 1 ORDER BY title ASC');

    return $db->loadObjectList();
    }

    public function getVisitLevels()
{
    $db = $this->getDatabase();

    $db->setQuery(
        'SELECT * FROM #__salaov_visit_levels WHERE published = 1 ORDER BY ordering ASC, priority DESC, title ASC'
    );

    return $db->loadObjectList();
}


    public function getDayRules()
    {
        $db = $this->getDatabase();
        $db->setQuery('SELECT * FROM #__salaov_day_capacity WHERE visit_date >= CURDATE() ORDER BY visit_date ASC');
        return $db->loadObjectList();
    }

    public function getDaySlots()
    {
        $db = $this->getDatabase();
        $db->setQuery('SELECT * FROM #__salaov_day_slots WHERE visit_date >= CURDATE() AND published = 1 ORDER BY visit_date ASC, ordering ASC, start_time ASC');
        return $db->loadObjectList();
    }

    public function getAvailability()
    {
        $db = $this->getDatabase();
        $query = $db->getQuery(true)
            ->select([
                $db->quoteName('visit_date'),
                'SUM(CASE WHEN ' . $db->quoteName('status') . ' = ' . $db->quote('pending') . ' THEN ' . $db->quoteName('visitors') . ' ELSE 0 END) AS pending_visitors',
                'SUM(CASE WHEN ' . $db->quoteName('status') . ' = ' . $db->quote('approved') . ' THEN ' . $db->quoteName('visitors') . ' ELSE 0 END) AS approved_visitors',
            ])
            ->from($db->quoteName('#__salaov_bookings'))
            ->where($db->quoteName('status') . ' IN (' . $db->quote('pending') . ',' . $db->quote('approved') . ')')
            ->group($db->quoteName('visit_date'));
        $db->setQuery($query);
        return $db->loadObjectList();
    }
}
