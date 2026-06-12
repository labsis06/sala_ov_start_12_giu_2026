<?php
namespace Ov\Component\Salaov\Administrator\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\BaseController; use Joomla\CMS\Factory; use Joomla\CMS\Session\Session;
class AvailabilityController extends BaseController {
 public function save(){ Session::checkToken() or die('Invalid token'); $app=Factory::getApplication(); $db=Factory::getContainer()->get('DatabaseDriver'); $date=$app->input->getString('visit_date'); $cap=max(0,$app->input->getInt('capacity',20)); $avail=$app->input->getInt('available',1); $note=$app->input->getString('note'); if($date){ $q=$db->getQuery(true)->insert('#__salaov_day_capacity')->columns(['visit_date','available','capacity','note'])->values($db->quote($date).','.(int)$avail.','.(int)$cap.','.$db->quote($note)); $q .= ' ON DUPLICATE KEY UPDATE available=VALUES(available), capacity=VALUES(capacity), note=VALUES(note)'; $db->setQuery($q)->execute(); } $this->setRedirect('index.php?option=com_salaov&view=availability','Disponibilita salvata'); }
 public function delete(){ $id=Factory::getApplication()->input->getInt('id'); if($id){ $db=Factory::getContainer()->get('DatabaseDriver'); $db->setQuery('DELETE FROM #__salaov_day_capacity WHERE id='.(int)$id)->execute(); } $this->setRedirect('index.php?option=com_salaov&view=availability','Regola eliminata'); }
}
