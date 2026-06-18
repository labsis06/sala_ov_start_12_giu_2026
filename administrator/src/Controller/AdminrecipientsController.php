<?php

namespace Ov\Component\Salaov\Administrator\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Session\Session;

class AdminrecipientsController extends BaseController
{
    public function save(): void
    {
        Session::checkToken() or die('Invalid token');

        $app = Factory::getApplication();
        $db  = Factory::getContainer()->get('DatabaseDriver');

        $id = $app->input->getInt('id', 0);

        $name      = trim($app->input->getString('name', ''));
        $email     = trim($app->input->getString('email', ''));
        $published = $app->input->getInt('published', 1);

        if ($name === '' || $email === '') {
            $this->setRedirect(
                'index.php?option=com_salaov&view=adminrecipients',
                'Nome ed email sono obbligatori.',
                'warning'
            );
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->setRedirect(
                'index.php?option=com_salaov&view=adminrecipients',
                'Indirizzo email non valido.',
                'warning'
            );
            return;
        }

        $data = [
            'name'      => $name,
            'email'     => $email,
            'published' => $published ? 1 : 0,
        ];

        if ($id > 0) {
            $sets = [];

            foreach ($data as $field => $value) {
                $sets[] = $db->quoteName($field) . ' = ' . $db->quote($value);
            }

            $query = $db->getQuery(true)
                ->update($db->quoteName('#__salaov_admin_recipients'))
                ->set($sets)
                ->where($db->quoteName('id') . ' = ' . (int) $id);
        } else {
            $query = $db->getQuery(true)
                ->insert($db->quoteName('#__salaov_admin_recipients'))
                ->columns($db->quoteName(array_keys($data)))
                ->values(implode(',', array_map([$db, 'quote'], array_values($data))));
        }

        $db->setQuery($query)->execute();

        $this->setRedirect(
            'index.php?option=com_salaov&view=adminrecipients',
            'Destinatario email salvato.'
        );
    }

    public function delete(): void
    {
        Session::checkToken('get') or die('Invalid token');

        $app = Factory::getApplication();
        $id  = $app->input->getInt('id', 0);

        if ($id > 0) {
            $db = Factory::getContainer()->get('DatabaseDriver');

            $query = $db->getQuery(true)
                ->delete($db->quoteName('#__salaov_admin_recipients'))
                ->where($db->quoteName('id') . ' = ' . (int) $id);

            $db->setQuery($query)->execute();
        }

        $this->setRedirect(
            'index.php?option=com_salaov&view=adminrecipients',
            'Destinatario email eliminato.'
        );
    }
}