<?php
namespace Ov\Component\Salaov\Administrator\View\Staff;
\defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
class HtmlView extends BaseHtmlView { public function display($tpl=null){ $this->items=$this->getModel()->getItems(); parent::display($tpl); } }
