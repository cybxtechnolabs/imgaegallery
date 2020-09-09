-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.22-MariaDB-1ubuntu1 - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for gallery_new_boot
CREATE DATABASE IF NOT EXISTS `gallery_new_boot` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `gallery_new_boot`;

-- Dumping structure for table gallery_new_boot.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gallery_new_boot.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table gallery_new_boot.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gallery_new_boot.galleries: ~2 rows (approximately)
DELETE FROM `galleries`;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `slug`) VALUES
	(2, 'Test', 2, '2020-09-09 08:51:42', '2020-09-09 08:51:42', 'test'),
	(3, 'asdf', 5, '2020-09-09 09:02:37', '2020-09-09 09:02:37', 'asdf');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;

-- Dumping structure for table gallery_new_boot.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gallery_new_boot.images: ~4 rows (approximately)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `name`, `gallery_id`, `path`, `created_at`, `updated_at`) VALUES
	(2, '149248284-pan-card-jpg', 2, '149248284-pan-card-jpg_1599641530.jpg', '2020-09-09 08:52:10', '2020-09-09 08:52:10'),
	(4, '149248284-pan-card-jpg', 3, '149248284-pan-card-jpg_1599642178.jpg', '2020-09-09 09:02:58', '2020-09-09 09:02:58'),
	(5, '149248284-pan-card-jpg', 3, '149248284-pan-card-jpg_1599642179.jpg', '2020-09-09 09:02:59', '2020-09-09 09:02:59'),
	(6, '149248284-pan-card-jpg', 3, '149248284-pan-card-jpg_1599642181.jpg', '2020-09-09 09:03:01', '2020-09-09 09:03:01');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table gallery_new_boot.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gallery_new_boot.migrations: ~6 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_08_22_135621_create_gallery_table', 1),
	(5, '2020_08_22_135805_create_images_table', 1),
	(6, '2020_08_25_072353_add_gallery_slug', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table gallery_new_boot.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gallery_new_boot.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table gallery_new_boot.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gallery_new_boot.users: ~5 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', '2020-09-09 12:17:33', '$2y$10$MyjNttgHC2hS4x18zeM3dumwOW.d93E6jIekBp24kfNqa4h9J8ur6', NULL, '1', '1', '2020-09-09 06:47:25', '2020-09-09 08:10:06'),
	(2, 'majnu', 'contact@milon.im', NULL, '$2y$10$im2idMeqixhYMuvq95yiye821f2Liay5lIyX4m0AYQ6tiDEfs7DRe', NULL, '0', '1', '2020-09-09 07:11:23', '2020-09-09 08:06:23'),
	(3, 'test', 'test@test.com', NULL, '$2y$10$eiCPdMjQzxRqOdHk7sYW1.NydQBd4J3x.XEZDbrfjBoBNiMkqnDiq', NULL, '0', '0', '2020-09-09 08:56:26', '2020-09-09 08:56:26'),
	(4, 'adsf', 'asdf@asd.com', NULL, '$2y$10$tf5A9RGDEngPWqG0Isv8xeV.2L0tkTu4b8ywmg2YIlPDNPg8hzsDC', NULL, '0', '1', '2020-09-09 08:59:38', '2020-09-09 09:07:26'),
	(5, 'asdf', 'asdf@asdf.coo', NULL, '$2y$10$fWrJA/tN1c883vSK60NwLu5XPE5h3VPHNHU0VjbDWYCgA5dA93sH.', NULL, '0', '1', '2020-09-09 09:01:39', '2020-09-09 09:07:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
