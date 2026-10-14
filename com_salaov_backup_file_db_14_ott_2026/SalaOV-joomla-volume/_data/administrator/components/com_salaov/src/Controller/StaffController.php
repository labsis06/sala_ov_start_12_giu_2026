<?php
namespace Ov\Component\Salaov\Administrator\Controller;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\BaseController; use Joomla\CMS\Factory; use Joomla\CMS\Session\Session;
class StaffController extends BaseController {
 public function save(){ Session::checkToken() or die('Invalid token'); 
 $app=Factory::getApplication(); 
 $db=Factory::getContainer()->get('DatabaseDriver'); 
 $id=$app->input->getInt('id'); 
 $data=[
    'name'=>$app->input->getString('name'),
    'email'=>$app->input->getString('email'),
    'phone'=>$app->input->getString('phone'),
    'spoken_language'=>$app->input->getString('spoken_language'),
    'published'=>$app->input->getInt('published',1)
];
     if($id){ $sets=[]; 
        foreach($data as $k=>$v){$sets[]=$db->quoteName($k).'='.$db->quote($v);} $q=$db->getQuery(true)->update('#__salaov_staff')->set($sets)->where('id='.(int)$id); 
        } else 
           { 
            $q=$db->getQuery(true)->insert('#__salaov_staff')->columns($db->quoteName(array_keys($data)))->values(implode(',',array_map([$db,'quote'],array_values($data)))); 
            } 
           $db->setQuery($q)->execute(); $this->setRedirect('index.php?option=com_salaov&view=staff','Personale salvato'); 
           }
   public function delete(){ $id=Factory::getApplication()->input->getInt('id'); 
         if($id){ $db=Factory::getContainer()->get('DatabaseDriver'); 
             $db->setQuery('DELETE FROM #__salaov_staff WHERE id='.(int)$id)->execute(); 
             } 
                $this->setRedirect('index.php?option=com_salaov&view=staff','Personale eliminato'); 
            }
}
