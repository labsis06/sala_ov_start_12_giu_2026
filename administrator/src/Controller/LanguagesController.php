<?php
namespace Ov\Component\Salaov\Administrator\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Session\Session;

class LanguagesController extends BaseController
{
    public function save()
    {
        Session::checkToken() or die('Invalid token');

        $app = Factory::getApplication();
        $db  = Factory::getContainer()->get('DatabaseDriver');

        $id = $app->input->getInt('id');

        $data = [
            'title'     => $app->input->getString('title'),
            'published' => $app->input->getInt('published', 1),
        ];

        if ($id) {
            $sets = [];
            foreach ($data as $k => $v) {
                $sets[] = $db->quoteName($k) . ' = ' . $db->quote($v);
            }

            $query = $db->getQuery(true)
                ->update($db->quoteName('#__salaov_languages'))
                ->set($sets)
                ->where($db->quoteName('id') . ' = ' . (int) $id);
        } else {
            $query = $db->getQuery(true)
                ->insert($db->quoteName('#__salaov_languages'))
                ->columns($db->quoteName(array_keys($data)))
                ->values(implode(',', array_map([$db, 'quote'], array_values($data))));
        }

        $db->setQuery($query)->execute();

        $this->setRedirect('index.php?option=com_salaov&view=languages', 'Lingua salvata.');
    }

    public function delete()
    {
        $id = Factory::getApplication()->input->getInt('id');

        if ($id) {
            $db = Factory::getContainer()->get('DatabaseDriver');
            $db->setQuery('DELETE FROM #__salaov_languages WHERE id = ' . (int) $id)->execute();
        }

        $this->setRedirect('index.php?option=com_salaov&view=languages', 'Lingua eliminata.');
    }
}