-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Eyl 2014, 16:34:48
-- Sunucu sürümü: 5.6.16
-- PHP Sürümü: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `backlink`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `backlinks`
--

CREATE TABLE IF NOT EXISTS `backlinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `check_url` text COLLATE utf8_unicode_ci NOT NULL,
  `link_one` text COLLATE utf8_unicode_ci NOT NULL,
  `link_two` text COLLATE utf8_unicode_ci NOT NULL,
  `link_three` text COLLATE utf8_unicode_ci NOT NULL,
  `check_count` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `backlinks`
--

INSERT INTO `backlinks` (`id`, `created_at`, `updated_at`, `check_url`, `link_one`, `link_two`, `link_three`, `check_count`) VALUES
(1, '2014-09-25 05:52:28', '2014-09-26 11:33:14', 'http://www.diyetisyenim.org', 'www.diyetisyenim.org', 'www.kabecanliyayin.net', 'www.bitkirehberi.net', 11),
(7, '2014-09-25 07:23:49', '2014-09-26 11:33:14', 'http://www.bitkirehberi.net', 'www.diyetisyenim.org', '', 'www.iyimarka.net', 9),
(8, '2014-09-25 05:52:28', '2014-09-26 11:33:14', 'http://www.diyetisyenim.org', 'www.diyetisyenim.org', 'www.alkamine.org', 'www.bitkirehberi.net', 11),
(9, '2014-09-25 07:23:49', '2014-09-26 11:33:14', 'http://www.bitkirehberi.net', 'www.diyetisyenim.org', '', 'www.iyimarka.net', 9),
(10, '2014-09-25 07:23:49', '2014-09-26 11:33:14', 'http://www.bitkirehberi.net', 'www.diyetisyenim.org', '', 'www.iyimarka.net', 9),
(11, '2014-09-26 09:08:45', '2014-09-26 11:33:14', 'http://www.btp.org.tr/', 'www.iyimarka.net', 'www.kabecanliyayin.net', 'www.bitkirehberi.net', 9),
(12, '2014-09-26 09:30:23', '2014-09-26 11:33:14', 'http://www.diyetisyenim.org', 'http://www.iyimarka.net/depycure-tuy-dokucu-spreys', '', '', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_09_25_084519_create_backlinks_table', 1),
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 2),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 2),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 2),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
