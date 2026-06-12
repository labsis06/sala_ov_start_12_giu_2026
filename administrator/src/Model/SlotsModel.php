<?php
namespace Ov\Component\Salaov\Administrator\Model;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
class SlotsModel extends BaseDatabaseModel { public function getItems(){ $db=$this->getDatabase(); $db->setQuery('SELECT * FROM #__salaov_slots ORDER BY weekday, start_time'); return $db->loadObjectList(); } }
