-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `device_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  PRIMARY KEY (`device_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `api_key` (`api_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `devices` (`device_id`, `name`, `api_key`) VALUES
(1,	'arduino 0',	'51866292d9f808e47c67930bb63989fc'),
(2,	'arduino 1',	'6b37497be99345fdba8af2ec7a676383'),
(3,	'arduino 2',	'8f1d6574d87eef5750d1b7f29d679621'),
(4,	'arduino 3',	'5b0ab930f86169039fcf19415d95dc11');

DROP TABLE IF EXISTS `motion_history`;
CREATE TABLE `motion_history` (
  `motion_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `device_id` bigint(20) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`motion_id`),
  KEY `device_id` (`device_id`),
  KEY `created_at` (`created_at`),
  CONSTRAINT `motion_history_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `motion_history` (`motion_id`, `device_id`, `created_at`) VALUES
(1,	1,	'2021-01-04 01:15:41'),
(2,	1,	'2021-01-04 02:19:49'),
(3,	2,	'2021-01-04 04:05:02'),
(4,	2,	'2021-01-04 04:27:18'),
(5,	2,	'2021-01-04 05:14:45'),
(6,	1,	'2021-01-04 05:39:18'),
(7,	2,	'2021-01-04 06:05:53'),
(8,	1,	'2021-01-04 07:41:26'),
(9,	2,	'2021-01-04 08:04:35'),
(10,	1,	'2021-01-04 08:33:46'),
(11,	1,	'2021-01-04 09:36:43'),
(12,	1,	'2021-01-04 10:13:50'),
(13,	1,	'2021-01-04 11:37:10'),
(14,	1,	'2021-01-04 12:26:40'),
(15,	1,	'2021-01-04 13:08:17'),
(16,	2,	'2021-01-04 13:56:22'),
(17,	2,	'2021-01-04 14:16:14'),
(18,	1,	'2021-01-04 16:15:55'),
(19,	2,	'2021-01-04 16:48:07'),
(20,	1,	'2021-01-04 17:36:18'),
(21,	1,	'2021-01-04 19:08:55'),
(22,	1,	'2021-01-04 19:33:44'),
(23,	1,	'2021-01-04 21:04:08'),
(24,	1,	'2021-01-04 22:31:45'),
(25,	1,	'2021-01-04 23:42:42'),
(26,	1,	'2021-01-05 00:44:24'),
(27,	2,	'2021-01-05 01:58:22'),
(28,	1,	'2021-01-05 02:54:48'),
(29,	1,	'2021-01-05 03:10:52'),
(30,	2,	'2021-01-05 04:07:01'),
(31,	1,	'2021-01-05 05:00:55'),
(32,	1,	'2021-01-05 05:57:24'),
(33,	2,	'2021-01-05 07:50:58'),
(34,	2,	'2021-01-05 08:27:20'),
(35,	2,	'2021-01-05 08:42:53'),
(36,	2,	'2021-01-05 10:28:46'),
(37,	1,	'2021-01-05 11:07:55'),
(38,	2,	'2021-01-05 11:27:12'),
(39,	2,	'2021-01-05 13:15:51'),
(40,	2,	'2021-01-05 14:05:14'),
(41,	1,	'2021-01-05 14:41:40'),
(42,	1,	'2021-01-05 15:43:41'),
(43,	2,	'2021-01-05 16:41:09'),
(44,	2,	'2021-01-05 17:13:06'),
(45,	2,	'2021-01-05 18:17:52'),
(46,	1,	'2021-01-05 19:34:05'),
(47,	1,	'2021-01-05 20:37:00'),
(48,	1,	'2021-01-05 22:17:17'),
(49,	2,	'2021-01-05 23:52:36'),
(50,	2,	'2021-01-06 00:15:04'),
(51,	2,	'2021-01-06 00:15:04'),
(52,	1,	'2021-01-08 08:24:45'),
(53,	1,	'2021-01-08 08:28:14'),
(54,	1,	'2021-01-08 08:28:34');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1,	'admin',	'$2y$10$NntPazMcQ5UwOQKOubrHL.aHmPhwMrduXEy495VrWCXsw3kOCKXom');

-- 2021-01-08 01:34:56
