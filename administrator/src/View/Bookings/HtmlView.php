<?php
namespace Ov\Component\Salaov\Administrator\View\Bookings;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
class HtmlView extends BaseHtmlView { public function display($tpl=null){ $model=$this->getModel(); $this->items=$model->getItems(); $this->staff=method_exists($model,'getStaff')?$model->getStaff():[]; parent::display($tpl); } }
