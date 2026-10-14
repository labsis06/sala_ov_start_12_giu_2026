#
#<?php die('Forbidden.'); ?>
#Date: 2026-09-30 15:05:26 UTC
#Software: Joomla! 5.0.0 Stable [ Kuboresha ] 17-October-2023 16:00 GMT

#Fields: datetime	priority clientip	category	message
2026-09-30T15:05:26+00:00	INFO 192.168.3.1	update	Test logging
2026-09-30T15:05:26+00:00	INFO 192.168.3.1	update	Uploading update file
2026-09-30T15:06:27+00:00	INFO 192.168.3.1	update	Test logging
2026-09-30T15:06:27+00:00	INFO 192.168.3.1	update	Uploading update file
2026-09-30T15:06:34+00:00	INFO 192.168.3.1	update	File [ROOT][TMP]/ju8Pg8EH downloaded.
2026-09-30T15:06:34+00:00	INFO 192.168.3.1	update	Starting installation of new version.
2026-09-30T15:06:40+00:00	INFO	192.168.3.1	update	Finalising installation.
2026-09-30T15:06:40+00:00	INFO	192.168.3.1	update	Start of SQL updates.
2026-09-30T15:06:40+00:00	INFO	192.168.3.1	update	The current database version (schema) is 5.0.0-2023-09-11.
2026-09-30T15:06:40+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2023-11-28. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:41+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-01-04. Query text: ALTER TABLE `#__fields_values` MODIFY `value` MEDIUMTEXT;.
2026-09-30T15:06:41+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-02-10. Query text: ALTER TABLE `#__guidedtour_steps` ADD COLUMN `params` text NULL ;.
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-02-24. Query text: CREATE TABLE IF NOT EXISTS `#__tuf_metadata` (   `id` int NOT NULL AUTO_INCREMEN.
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-02-24. Query text: INSERT INTO `#__tuf_metadata` (`update_site_id`, `root`) SELECT ue.`update_site_.
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-02-24. Query text: UPDATE `#__update_sites`    SET `type` = 'tuf', `location` = 'https://update.joo.
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-02-25. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-03-08. Query text: INSERT IGNORE INTO `#__guidedtour_steps` (`tour_id`, `title`, `published`, `desc.
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-03-08. Query text: ALTER TABLE `#__guidedtours` ADD COLUMN `autostart` int NOT NULL DEFAULT 0 ;.
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-03-08. Query text: INSERT IGNORE INTO `#__guidedtours` (`title`, `uid`, `description`, `ordering`, .
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-03-08. Query text: UPDATE `#__guidedtour_steps` SET `tour_id` = LAST_INSERT_ID() WHERE `tour_id`=0;.
2026-09-30T15:06:42+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.0-2024-03-28. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.1.1-2024-04-18. Query text: UPDATE `#__template_styles` SET `params` = JSON_SET(`params`, '$.colorScheme', '.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.0-2024-07-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.0-2024-07-19. Query text: INSERT INTO `#__action_logs_extensions` (`extension`) VALUES ('com_guidedtours').
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.0-2024-07-19. Query text: INSERT INTO `#__action_log_config` (`type_title`, `type_alias`, `id_holder`, `ti.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.0-2024-08-22. Query text: INSERT INTO `#__guidedtours` (`title`, `description`, `extensions`, `url`, `publ.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.0-2024-08-22. Query text: INSERT INTO `#__guidedtour_steps` (`title`, `description`, `position`, `target`,.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.0-2024-09-17. Query text: UPDATE `#__guidedtour_steps` SET `ordering` = `ordering` + 1 WHERE `title` IN ('.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.0-2024-09-17. Query text: INSERT INTO `#__guidedtour_steps` (`title`, `description`, `position`, `target`,.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.2-2024-09-24. Query text: UPDATE `#__assets` SET `title` = 'PUBLISH' WHERE `name` LIKE 'com_content.transi.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.2-2024-09-24. Query text: UPDATE `#__assets` SET `title` = 'UNPUBLISH' WHERE `name` LIKE 'com_content.tran.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.2-2024-09-24. Query text: UPDATE `#__assets` SET `title` = 'TRASH' WHERE `name` LIKE 'com_content.transiti.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.2-2024-09-24. Query text: UPDATE `#__assets` SET `title` = 'ARCHIVE' WHERE `name` LIKE 'com_content.transi.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.2-2024-09-24. Query text: UPDATE `#__assets` SET `title` = 'FEATURE' WHERE `name` LIKE 'com_content.transi.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.2-2024-09-24. Query text: UPDATE `#__assets` SET `title` = 'UNFEATURE' WHERE `name` LIKE 'com_content.tran.
2026-09-30T15:06:43+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.2-2024-09-24. Query text: UPDATE `#__assets` SET `title` = 'PUBLISH_AND_FEATURE' WHERE `name` LIKE 'com_co.
2026-09-30T15:06:44+00:00	INFO	192.168.3.1	update	Ran query from file 5.2.3-2025-01-09. Query text: UPDATE `#__mail_templates` SET `params` = '{"tags":["messages","message","date",.
2026-09-30T15:06:45+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2024-10-13. Query text: ALTER TABLE `#__fields` MODIFY `fieldparams` MEDIUMTEXT NOT NULL;.
2026-09-30T15:06:45+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2024-10-26. Query text: CREATE TABLE IF NOT EXISTS `#__scheduler_logs` (   `id` int unsigned NOT NULL AU.
2026-09-30T15:06:45+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2024-12-09. Query text: INSERT INTO `#__action_log_config` (`type_title`, `type_alias`, `id_holder`, `ti.
2026-09-30T15:06:45+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2025-02-09. Query text: ALTER TABLE `#__action_logs_users` DROP COLUMN `exclude_self` ;.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2025-02-22. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2025-03-14. Query text: UPDATE `#__guidedtours` SET `autostart` = 0 WHERE `uid` = 'joomla-whatsnew-5-2';.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2025-03-14. Query text: INSERT INTO `#__guidedtours` (`title`, `description`, `extensions`, `url`, `publ.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.0-2025-03-14. Query text: INSERT INTO `#__guidedtour_steps` (`title`, `description`, `position`, `target`,.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.4-2025-09-19. Query text: UPDATE `#__content_types` SET `field_mappings` = JSON_SET(`field_mappings`, '$.c.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.3.4-2025-09-19. Query text: UPDATE `#__content_types` SET `field_mappings` = JSON_SET(`field_mappings`, '$.c.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-04-23. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-05-10. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-05-10. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-05-10. Query text: INSERT IGNORE INTO `#__mail_templates` (`template_id`, `extension`, `language`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-05-10. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-05-10. Query text: UPDATE `#__guidedtours` SET `autostart` = 0 WHERE `uid` = 'joomla-whatsnew-5-3';.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-05-10. Query text: INSERT INTO `#__guidedtours` (`title`, `description`, `extensions`, `url`, `publ.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-05-10. Query text: INSERT INTO `#__guidedtour_steps` (`title`, `description`, `position`, `target`,.
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, .
2026-09-30T15:06:46+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: UPDATE `#__extensions` SET `locked` = 1  WHERE `type` = 'plugin' AND `folder` = .
2026-09-30T15:06:47+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: UPDATE `#__extensions` SET `locked` = 1  WHERE `type` = 'plugin' AND `element` =.
2026-09-30T15:06:47+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.0-2025-08-02. Query text: UPDATE `#__extensions` SET `locked` = 1  WHERE `type` = 'plugin' AND `element` =.
2026-09-30T15:06:47+00:00	INFO	192.168.3.1	update	Ran query from file 5.4.9-2026-08-11. Query text: ALTER TABLE `#__updates` ADD COLUMN `security` TINYINT NULL DEFAULT NULL AFTER `.
2026-09-30T15:06:47+00:00	INFO	192.168.3.1	update	End of SQL updates.
2026-09-30T15:06:47+00:00	INFO	192.168.3.1	update	Uninstalling extensions
2026-09-30T15:06:47+00:00	INFO	192.168.3.1	update	Deleting removed files and folders.
2026-09-30T15:07:03+00:00	INFO	192.168.3.1	update	Cleaning up after installation.
2026-09-30T15:07:03+00:00	INFO	192.168.3.1	update	Update to version 5.4.9 is complete.
2026-09-30T15:13:00+00:00	INFO	192.168.3.1	update	Test logging
2026-09-30T15:13:00+00:00	INFO	192.168.3.1	update	Uploading update file
2026-09-30T15:13:05+00:00	INFO	192.168.3.1	update	File [ROOT][TMP]/juy0ehHJ downloaded.
2026-09-30T15:13:05+00:00	INFO	192.168.3.1	update	Starting installation of new version.
