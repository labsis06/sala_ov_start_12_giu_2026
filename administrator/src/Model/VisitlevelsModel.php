<?php

namespace Ov\Component\Salaov\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class VisitlevelsModel extends BaseDatabaseModel
{
    public function getItems(): array
    {
        $db = $this->getDatabase();

        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__salaov_visit_levels'))
            ->order($db->quoteName('ordering') . ' ASC')
            ->order($db->quoteName('priority') . ' DESC')
            ->order($db->quoteName('title') . ' ASC');

        $db->setQuery($query);

        return $db->loadObjectList() ?: [];
    }
}