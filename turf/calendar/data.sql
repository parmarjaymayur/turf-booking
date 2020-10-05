-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `Contacts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Resources` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subject` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2018-07-26 13:10:38
