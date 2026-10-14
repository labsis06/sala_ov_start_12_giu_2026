<?php
namespace Ov\Component\Salaov\Administrator\Model;
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
class AvailabilityModel extends BaseDatabaseModel {
 public function getItems()
{
   $db=$this->getDatabase();
   $db->setQuery('SELECT * FROM #__salaov_day_capacity WHERE visit_date >= CURDATE() ORDER BY visit_date ASC LIMIT 365');
   return $db->loadObjectList();
 }

  public function getStaff()
  { 
    $db=$this->getDatabase(); 
    $db->setQuery('SELECT * FROM #__salaov_staff WHERE published = 1 ORDER BY name ASC');
    return $db->loadObjectList(); 
  }
 
  public function getDaySlots()
  { 
    $db=$this->getDatabase(); 
    $db->setQuery('SELECT * FROM #__salaov_day_slots WHERE visit_date >= CURDATE() ORDER BY visit_date ASC, ordering ASC, start_time ASC LIMIT 2000'); 
    return $db->loadObjectList(); 
  }
 
  public function getDayStaff()
  { 
    $db=$this->getDatabase(); 
    $db->setQuery('SELECT ds.visit_date, s.id, s.name, s.email, s.spoken_language FROM #__salaov_day_staff ds INNER JOIN #__salaov_staff s ON s.id = ds.staff_id WHERE ds.visit_date >= CURDATE() ORDER BY ds.visit_date ASC, s.name ASC LIMIT 2000');
  }
  }
