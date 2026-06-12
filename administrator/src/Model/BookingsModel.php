<?php
namespace Ov\Component\Salaov\Administrator\Model;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
class BookingsModel extends BaseDatabaseModel {
 public function getItems(){ $db=$this->getDatabase(); $q=$db->getQuery(true)->select('b.*, s.title AS slot_title, s.start_time, s.end_time, st.name AS staff_label')->from('#__salaov_bookings AS b')->join('LEFT','#__salaov_slots AS s ON s.id=b.slot_id')->join('LEFT','#__salaov_staff AS st ON st.id=b.staff_id')->order('b.visit_date DESC, b.id DESC'); $db->setQuery($q); return $db->loadObjectList(); }
 public function getStaff(){ $db=$this->getDatabase(); $db->setQuery('SELECT id,name FROM #__salaov_staff WHERE published=1 ORDER BY name'); return $db->loadObjectList(); }
}
