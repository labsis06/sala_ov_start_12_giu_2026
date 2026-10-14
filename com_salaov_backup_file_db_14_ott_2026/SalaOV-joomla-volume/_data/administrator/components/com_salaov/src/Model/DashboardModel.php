<?php
namespace Ov\Component\Salaov\Administrator\Model;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
class DashboardModel extends BaseDatabaseModel { public function getStats(){ $db=$this->getDatabase(); $stats=[]; foreach(['pending','approved','rejected','cancelled'] as $s){$db->setQuery("SELECT COUNT(*) FROM #__salaov_bookings WHERE status=".$db->quote($s)); $stats[$s]=(int)$db->loadResult();} $db->setQuery('SELECT COUNT(*) FROM #__salaov_slots WHERE published=1'); $stats['slots']=(int)$db->loadResult(); return $stats; } }
