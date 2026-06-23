<?php

namespace Ov\Component\Salaov\Administrator\View\Visitlevels;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    protected $items = [];

    public function display($tpl = null): void
    {
        $this->items = $this->getModel()->getItems();

        parent::display($tpl);
    }
}