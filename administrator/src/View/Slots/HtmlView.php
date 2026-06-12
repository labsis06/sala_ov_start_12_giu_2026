<?php
namespace Ov\Component\Salaov\Administrator\View\Slots;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
class HtmlView extends BaseHtmlView { public function display($tpl=null){ $model=$this->getModel(); if(method_exists($model,'getItems')) $this->items=$model->getItems(); if(method_exists($model,'getStats')) $this->stats=$model->getStats(); parent::display($tpl); } }
