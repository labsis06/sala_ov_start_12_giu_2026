<?php

namespace Ov\Component\Salaov\Administrator\View\Bookings;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    public function display($tpl = null)
    {
        $model = $this->getModel();

        $this->items       = $model->getItems();
        $this->staff       = method_exists($model, 'getStaff') ? $model->getStaff() : [];
        $this->slots       = method_exists($model, 'getSlots') ? $model->getSlots() : [];
        $this->languages   = method_exists($model, 'getLanguages') ? $model->getLanguages() : [];
        $this->visitLevels = method_exists($model, 'getVisitLevels') ? $model->getVisitLevels() : [];

        parent::display($tpl);
    }
}