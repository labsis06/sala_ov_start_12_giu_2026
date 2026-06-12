<?php
namespace Ov\Component\Salaov\Administrator\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;
use Joomla\CMS\Session\Session;
class BookingsController extends BaseController {
 public function approve(){ $this->setStatus('approved', true); }
 public function reject(){ $this->setStatus('rejected', false); }
 public function cancel(){ $this->setStatus('cancelled', false); }
 private function setStatus($status, $withStaff=false){ Session::checkToken() or die('Invalid token'); $app=Factory::getApplication(); $ids=$app->input->get('cid',[],'array'); $staffId=$app->input->getInt('staff_id'); $db=Factory::getContainer()->get('DatabaseDriver'); $staffName=''; if($withStaff && $staffId){ $db->setQuery('SELECT name FROM #__salaov_staff WHERE id='.(int)$staffId); $staffName=(string)$db->loadResult(); } foreach($ids as $id){ $id=(int)$id; if($id){ $sets=[$db->quoteName('status').'='.$db->quote($status),$db->quoteName('modified').'=NOW()']; if($withStaff){ $sets[]=$db->quoteName('staff_id').'=' . ($staffId ?: 'NULL'); $sets[]=$db->quoteName('staff_name').'=' . $db->quote($staffName); } $q=$db->getQuery(true)->update($db->quoteName('#__salaov_bookings'))->set($sets)->where($db->quoteName('id').'='.$id); $db->setQuery($q)->execute(); }} $msg=$withStaff?'Prenotazione approvata e personale assegnato':'Stato aggiornato'; $this->setRedirect('index.php?option=com_salaov&view=bookings',$msg); }
 public function export(){ $db=Factory::getContainer()->get('DatabaseDriver'); $db->setQuery('SELECT b.*, s.title AS slot_title, s.start_time, s.end_time, COALESCE(st.name,b.staff_name) AS staff_label FROM #__salaov_bookings b LEFT JOIN #__salaov_slots s ON s.id=b.slot_id LEFT JOIN #__salaov_staff st ON st.id=b.staff_id ORDER BY b.visit_date DESC, b.id DESC'); $rows=$db->loadAssocList(); header('Content-Type: text/csv; charset=utf-8'); header('Content-Disposition: attachment; filename=salaov_prenotazioni.csv'); $out=fopen('php://output','w'); fputcsv($out,['ID','Data','Fascia','Nome','Cognome','Email','Telefono','Ente/Scuola','Visitatori','Stato','Personale','Note']); foreach($rows as $r){ fputcsv($out,[$r['id'],$r['visit_date'],$r['slot_title'].' '.$r['start_time'].'-'.$r['end_time'],$r['first_name'],$r['last_name'],$r['email'],$r['phone'],$r['organization'],$r['visitors'],$r['status'],$r['staff_label'],$r['notes']]); } fclose($out); Factory::getApplication()->close(); }
}
