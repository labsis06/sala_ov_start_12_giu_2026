<?php

namespace Ov\Component\Salaov\Administrator\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Session\Session;

class VisitlevelsController extends BaseController
{
    public function save(): void
    {
        Session::checkToken() or die('Invalid token');

        $app = Factory::getApplication();
        $db  = Factory::getContainer()->get('DatabaseDriver');

        $id = $app->input->getInt('id', 0);

        $title       = trim($app->input->getString('title', ''));
        $description = trim($app->input->getString('description', ''));
        $priority    = $app->input->getInt('priority', 0);
        $ordering    = $app->input->getInt('ordering', 0);
        $published   = $app->input->getInt('published', 1);
        
        $allowedIcons = [
            'tier_1_basic_school.svg',
            'tier_2_standard_school.svg',
            'tier_3_scientific.svg',
            'tier_4_institutional.svg',
            'tier_5_premium_delegation.svg',
            'tier_6_vip_head_of_state.svg',
            'tier_media_attention.svg',
        'tier_other_neutral.svg',
        ];

$icon = $app->input->getString('icon', 'tier_other_neutral.svg');

if (!in_array($icon, $allowedIcons, true)) {
    $icon = 'tier_other_neutral.svg';
}

        if ($title === '') {
            $this->setRedirect(
                'index.php?option=com_salaov&view=visitlevels',
                'Il titolo del livello visita è obbligatorio.',
                'warning'
            );
            return;
        }

        $data = [
            'title'       => $title,
            'description' => $description,
            'icon'        => $icon,
            'priority'    => $priority,
            'ordering'    => $ordering,
            'published'   => $published ? 1 : 0,
        ];

        if ($id > 0) {
            $sets = [];

            foreach ($data as $field => $value) {
                $sets[] = $db->quoteName($field) . ' = ' . $db->quote($value);
            }

            $query = $db->getQuery(true)
                ->update($db->quoteName('#__salaov_visit_levels'))
                ->set($sets)
                ->where($db->quoteName('id') . ' = ' . (int) $id);
        } else {
            $query = $db->getQuery(true)
                ->insert($db->quoteName('#__salaov_visit_levels'))
                ->columns($db->quoteName(array_keys($data)))
                ->values(implode(',', array_map([$db, 'quote'], array_values($data))));
        }

        $db->setQuery($query)->execute();

        $this->setRedirect(
            'index.php?option=com_salaov&view=visitlevels',
            'Livello visita salvato.'
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
                ->delete($db->quoteName('#__salaov_visit_levels'))
                ->where($db->quoteName('id') . ' = ' . (int) $id);

            $db->setQuery($query)->execute();
        }

        $this->setRedirect(
            'index.php?option=com_salaov&view=visitlevels',
            'Livello visita eliminato.'
        );
    }
}