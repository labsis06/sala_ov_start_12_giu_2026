<?php
namespace Ov\Component\Salaov\Administrator\Model;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class LanguagesModel extends BaseDatabaseModel
{
    public function getItems()
    {
        $db = $this->getDatabase();
        $db->setQuery('SELECT * FROM #__salaov_languages ORDER BY published DESC, title ASC');

        return $db->loadObjectList();
    }
}