<?php
namespace Ov\Component\Salaov\Administrator\View\Availability;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
class HtmlView extends BaseHtmlView 
{ 
    public $items=[]; 
    public $staff=[]; 
    public $daySlots=[]; 
    public $dayStaff=[]; 
    public function display($tpl=null)
    { 
        $m=$this->getModel(); 
        $this->items=$m->getItems(); 
        $this->staff=$m->getStaff(); 
        $this->daySlots=$m->getDaySlots(); 
        $this->dayStaff=$m->getDayStaff(); 
        parent::display($tpl); 
    } 
        
}
