<?php

namespace Ov\Component\Salaov\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class AdminrecipientsModel extends BaseDatabaseModel
{
    public function getItems(): array
    {
        $db = $this->getDatabase();

        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__salaov_admin_recipients'))
            ->order($db->quoteName('published') . ' DESC')
            ->order($db->quoteName('name') . ' ASC');

        $db->setQuery($query);

        return $db->loadObjectList() ?: [];
    }
}