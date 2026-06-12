<?php
namespace Ov\Component\Salaov\Administrator\Model;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
class AvailabilityModel extends BaseDatabaseModel {
 public function getItems(){ $db=$this->getDatabase(); $db->setQuery('SELECT * FROM #__salaov_day_capacity WHERE visit_date >= CURDATE() ORDER BY visit_date ASC LIMIT 180'); return $db->loadObjectList(); }
}
