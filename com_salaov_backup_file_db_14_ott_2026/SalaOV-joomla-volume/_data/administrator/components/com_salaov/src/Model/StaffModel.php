<?php
namespace Ov\Component\Salaov\Administrator\Model;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
class StaffModel extends BaseDatabaseModel { public function getItems(){ $db=$this->getDatabase(); $db->setQuery('SELECT * FROM #__salaov_staff ORDER BY published DESC, name ASC'); return $db->loadObjectList(); } }
