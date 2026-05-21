CREATE DATABASE IF NOT EXISTS `socialnet`;
USE `socialnet`;

-- Adminer 5.4.2 MySQL 8.0.45-0ubuntu0.24.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `description`) VALUES
(1,	'admin',	'System Administrator',	'$2y$10$JQSJt6caNjfBYgzAWyZmYO3Ngb/z5m1ZZ9x81sBjnbaKqpfdJX.b.',	NULL),
(2,	'dungnt',	'Nguyen Tai Dung',	'$2y$10$jc1T.2jLsvNPiOuT4gLID.2y8pyvfUrLG.Igqt8ViGo8ENcfb9WpS',	NULL),
(3,	'hoatran',	'Tran Thi Hoa',	'$2y$10$hAMHt09K5Z0E5KmQRcE1EO66saq0Y/zJti32H6rhfvQDU.0QlWdze',	NULL),
(4,	'minhnguyen',	'Nguyen Quang Minh',	'$2y$10$xFpGCTPLplOdYntk.H.FZueJfo12d9vwTLmcwSFzT9O4i.iI2P6zO',	NULL),
(5,	'duongkt',	'Kieu Thai Duong',	'$2y$10$6KmZOdHtZ9eH1tC9tM0Q1e9VGBV9BdHnkQ/TZPMMeJg0kvbIK0PqG',	NULL),
(6,	'tungduong',	'Pham Tung Duong',	'$2y$10$aHIVOAd1wnhBUHL5KDr/ZOzk.pi6k0Nd/Zyc1xewW2ZXsisW28kpi',	NULL),
(7,	'lannhu',	'Hoang Lan Nhu',	'$2y$10$jGzOxG1nyCKa1/renSv0g.sFBmKfDwElIEGHKgK693UDh4ZZ0yrsW',	NULL),
(8,	'anhquan',	'Vu Anh Quan',	'$2y$10$HQcCW.C3ueplFlKs/oLHkOr0s425aflNFkW8f5zwnIOmDkOrjL3r2',	NULL);

-- 2026-05-21 04:41:20 UTC
