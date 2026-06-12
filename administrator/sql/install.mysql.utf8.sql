CREATE TABLE IF NOT EXISTS `#__salaov_slots` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `weekday` tinyint NOT NULL DEFAULT 1,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `capacity` int unsigned NOT NULL DEFAULT 20,
  `published` tinyint NOT NULL DEFAULT 1,
  `ordering` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`), KEY `idx_weekday` (`weekday`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS `#__salaov_bookings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT 0,
  `slot_id` int unsigned NOT NULL,
  `visit_date` date NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(190) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `organization` varchar(190) NOT NULL,
  `visitors` int unsigned NOT NULL DEFAULT 1,
  `notes` text NULL,
  `status` enum('pending','approved','rejected','cancelled') NOT NULL DEFAULT 'pending',
  `created` datetime NOT NULL,
  `modified` datetime NULL,
  `checked_out` int unsigned NULL,
  `checked_out_time` datetime NULL,
  PRIMARY KEY (`id`), KEY `idx_date_slot` (`visit_date`,`slot_id`), KEY `idx_user` (`user_id`), KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;
INSERT INTO `#__salaov_slots` (`title`,`weekday`,`start_time`,`end_time`,`capacity`,`published`,`ordering`) VALUES
('Mattina',1,'09:30:00','11:00:00',20,1,1),('Pomeriggio',1,'14:30:00','16:00:00',20,1,2),
('Mattina',2,'09:30:00','11:00:00',20,1,1),('Pomeriggio',2,'14:30:00','16:00:00',20,1,2),
('Mattina',3,'09:30:00','11:00:00',20,1,1),('Pomeriggio',3,'14:30:00','16:00:00',20,1,2),
('Mattina',4,'09:30:00','11:00:00',20,1,1),('Pomeriggio',4,'14:30:00','16:00:00',20,1,2),
('Mattina',5,'09:30:00','11:00:00',20,1,1);
CREATE TABLE IF NOT EXISTS `#__salaov_staff` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `email` varchar(190) NULL,
  `phone` varchar(60) NULL,
  `published` tinyint NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS `#__salaov_day_capacity` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `available` tinyint NOT NULL DEFAULT 1,
  `capacity` int unsigned NOT NULL DEFAULT 20,
  `note` varchar(255) NULL,
  PRIMARY KEY (`id`), UNIQUE KEY `idx_visit_date` (`visit_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;
INSERT IGNORE INTO `#__salaov_staff` (`id`,`name`,`email`,`phone`,`published`) VALUES (1,'Personale OV','','',1);
CREATE TABLE IF NOT EXISTS `#__salaov_day_slots` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `capacity` int unsigned NOT NULL DEFAULT 20,
  `published` tinyint NOT NULL DEFAULT 1,
  `ordering` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`), KEY `idx_visit_date` (`visit_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS `#__salaov_day_staff` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `staff_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`), UNIQUE KEY `idx_day_staff` (`visit_date`,`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;
