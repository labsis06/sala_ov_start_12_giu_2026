<?php

namespace Ov\Component\Salaov\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class BookingsModel extends BaseDatabaseModel
{
    public function getItems()
    {
        $db = $this->getDatabase();

        $q = $db->getQuery(true)
           ->select([
                'b.*',
                's.title AS slot_title',
                's.start_time',
                's.end_time',
                'st.name AS staff_label',
                'vl.icon AS visit_level_icon'
    ])
            ->from($db->quoteName('#__salaov_bookings', 'b'))
            ->join('LEFT', $db->quoteName('#__salaov_slots', 's') . ' ON s.id = b.slot_id')
            ->join('LEFT', $db->quoteName('#__salaov_staff', 'st') . ' ON st.id = b.staff_id')
            ->join('LEFT', $db->quoteName('#__salaov_visit_levels', 'vl') . ' ON vl.id = b.visit_level_id')
            ->order('b.visit_date DESC, b.id DESC');

        $db->setQuery($q);

        return $db->loadObjectList();
    }

    public function getStaff()
    {
        $db = $this->getDatabase();
        $db->setQuery('SELECT id, name FROM #__salaov_staff WHERE published = 1 ORDER BY name ASC');

        return $db->loadObjectList();
    }

    public function getSlots()
    {
        $db = $this->getDatabase();
        $db->setQuery('SELECT id, weekday, title, start_time, end_time, capacity FROM #__salaov_slots WHERE published = 1 ORDER BY weekday ASC, start_time ASC');

        return $db->loadObjectList();
    }

    public function getLanguages()
    {
        $db = $this->getDatabase();
        $db->setQuery('SELECT id, title FROM #__salaov_languages WHERE published = 1 ORDER BY title ASC');

        return $db->loadObjectList();
    }

    public function getVisitLevels()
    {
        $db = $this->getDatabase();
        $db->setQuery('SELECT id, title FROM #__salaov_visit_levels WHERE published = 1 ORDER BY ordering ASC, priority DESC, title ASC');

        return $db->loadObjectList();
    }
}