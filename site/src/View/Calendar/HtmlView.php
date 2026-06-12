<?php
namespace Ov\Component\Salaov\Site\View\Calendar;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
class HtmlView extends BaseHtmlView { public function display($tpl=null){ $model=$this->getModel(); $this->slots=method_exists($model,'getSlots')?$model->getSlots():[]; $this->availability=method_exists($model,'getAvailability')?$model->getAvailability():[]; $this->dayRules=method_exists($model,'getDayRules')?$model->getDayRules():[]; parent::display($tpl); } }
