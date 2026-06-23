<?php
namespace Ov\Component\Salaov\Site\View\Booking;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
class HtmlView extends BaseHtmlView 

{ 
    public function display($tpl=null)
    
    {
        
    $model=$this->getModel();
    $this->slots=method_exists($model,'getSlots')?$model->getSlots():[];
    $this->availability=method_exists($model,'getAvailability')?$model->getAvailability():[]; 
    $this->dayRules=method_exists($model,'getDayRules')?$model->getDayRules():[]; 
    $this->daySlots=method_exists($model,'getDaySlots')?$model->getDaySlots():[];
    $this->languages = method_exists($model, 'getLanguages') ? $model->getLanguages() : []; 
    $this->visitLevels = method_exists($model, 'getVisitLevels') ? $model->getVisitLevels() : [];
    parent::display($tpl); 
    } 
    
}
