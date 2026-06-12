<?php
\defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Filesystem\File;

class Com_SalaovInstallerScript
{
    public function install($parent) { $this->migrate(); $this->forceFiles($parent); }
    public function update($parent) { $this->migrate(); $this->forceFiles($parent); }
    public function postflight($type, $parent) { $this->migrate(); $this->forceFiles($parent); }

    private function forceFiles($parent): void
    {
        try {
            $source = $parent->getParent()->getPath('source');
            $copies = [
                $source . '/site/src' => JPATH_SITE . '/components/com_salaov/src',
                $source . '/site/tmpl' => JPATH_SITE . '/components/com_salaov/tmpl',
                $source . '/site/language' => JPATH_SITE . '/components/com_salaov/language',
                $source . '/administrator/services' => JPATH_ADMINISTRATOR . '/components/com_salaov/services',
                $source . '/administrator/src' => JPATH_ADMINISTRATOR . '/components/com_salaov/src',
                $source . '/administrator/tmpl' => JPATH_ADMINISTRATOR . '/components/com_salaov/tmpl',
            ];
            foreach ($copies as $from => $to) {
                if (is_dir($from)) {
                    if (!is_dir($to)) { Folder::create($to); }
                    Folder::copy($from, $to, '', true);
                }
            }
            $this->clearOpcodeCache();
        } catch (Throwable $e) {}
    }

    private function clearOpcodeCache(): void
    {
        if (function_exists('opcache_reset')) { @opcache_reset(); }
        clearstatcache(true);
    }

    private function migrate(): void
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $queries = [
            "CREATE TABLE IF NOT EXISTS `#__salaov_staff` (`id` int unsigned NOT NULL AUTO_INCREMENT, `name` varchar(190) NOT NULL, `email` varchar(190) NULL, `phone` varchar(60) NULL, `published` tinyint NOT NULL DEFAULT 1, PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci",
            "CREATE TABLE IF NOT EXISTS `#__salaov_day_capacity` (`id` int unsigned NOT NULL AUTO_INCREMENT, `visit_date` date NOT NULL, `available` tinyint NOT NULL DEFAULT 1, `capacity` int unsigned NOT NULL DEFAULT 20, `note` varchar(255) NULL, PRIMARY KEY (`id`), UNIQUE KEY `idx_visit_date` (`visit_date`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci",
            "CREATE TABLE IF NOT EXISTS `#__salaov_day_slots` (`id` int unsigned NOT NULL AUTO_INCREMENT, `visit_date` date NOT NULL, `title` varchar(100) NOT NULL, `start_time` time NOT NULL, `end_time` time NOT NULL, `capacity` int unsigned NOT NULL DEFAULT 20, `published` tinyint NOT NULL DEFAULT 1, `ordering` int NOT NULL DEFAULT 0, PRIMARY KEY (`id`), KEY `idx_visit_date` (`visit_date`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci",
            "CREATE TABLE IF NOT EXISTS `#__salaov_day_staff` (`id` int unsigned NOT NULL AUTO_INCREMENT, `visit_date` date NOT NULL, `staff_id` int unsigned NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `idx_day_staff` (`visit_date`,`staff_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci",
        ];
        foreach ($queries as $query) { $db->setQuery($query)->execute(); }
        $this->addColumn($db, '#__salaov_bookings', 'day_slot_id', "int unsigned NULL AFTER `slot_id`");
        $this->addColumn($db, '#__salaov_bookings', 'staff_id', "int unsigned NULL AFTER `status`");
        $this->addColumn($db, '#__salaov_bookings', 'staff_name', "varchar(190) NULL AFTER `staff_id`");
        $db->setQuery("INSERT IGNORE INTO `#__salaov_staff` (`id`,`name`,`email`,`phone`,`published`) VALUES (1,'Personale OV','','',1)")->execute();
    }

    private function addColumn($db, string $table, string $column, string $definition): void
    {
        try {
            $db->setQuery('SHOW COLUMNS FROM `' . $table . '` LIKE ' . $db->quote($column));
            if (!$db->loadObject()) {
                $db->setQuery('ALTER TABLE `' . $table . '` ADD `' . $column . '` ' . $definition)->execute();
            }
        } catch (Throwable $e) {}
    }
}
