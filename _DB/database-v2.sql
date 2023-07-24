-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table safety_management.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table safety_management.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2014_10_12_000000_create_users_table', 1),
	(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(9, '2019_08_19_000000_create_failed_jobs_table', 1),
	(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(11, '2023_07_16_144405_create_organitations_table', 1),
	(12, '2023_07_16_144433_create_roles_table', 1),
	(13, '2023_07_18_070520_create_safeties_table', 2),
	(14, '2023_07_18_070520_create_safeties_table copy', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table safety_management.organitations
CREATE TABLE IF NOT EXISTS `organitations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.organitations: ~4 rows (approximately)
/*!40000 ALTER TABLE `organitations` DISABLE KEYS */;
INSERT IGNORE INTO `organitations` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Bid. Sistem Manajemen Basis Data', NULL, NULL),
	(2, 'Dep. Enterprise Aplikasi & Solusi Migrasi', NULL, NULL),
	(3, 'Bid. Sistem Pemeliharaan', NULL, NULL),
	(4, 'Bid. Notuna', '2023-07-17 16:01:18', '2023-07-17 16:01:18');
/*!40000 ALTER TABLE `organitations` ENABLE KEYS */;

-- Dumping structure for table safety_management.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table safety_management.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table safety_management.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT IGNORE INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2023-07-17 15:38:13', '2023-07-17 15:38:13'),
	(2, 'Dept.Safety', NULL, NULL),
	(4, 'Response Function', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table safety_management.safeties
CREATE TABLE IF NOT EXISTS `safeties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporter` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classification` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_submission` date DEFAULT NULL,
  `date_of_hazard_identification` date DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_operation` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file_reporter` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_probability` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_severity` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_index` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cop` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hm` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsible` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_response` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.safeties: ~3 rows (approximately)
/*!40000 ALTER TABLE `safeties` DISABLE KEYS */;
INSERT IGNORE INTO `safeties` (`id`, `number`, `reporter`, `classification`, `date_of_submission`, `date_of_hazard_identification`, `location`, `type_operation`, `description`, `file_reporter`, `risk_probability`, `risk_severity`, `risk_index`, `cop`, `hm`, `co`, `responsible`, `file_response`, `created_at`, `updated_at`) VALUES
	(6, 'HR0001/07/23', NULL, '2', '2023-07-18', '2023-06-30', 'awdaw', '2', 'awdawdawd', 'file/y31FvVtDcePe1nslYqOPnM4DfmNs7O4Yg06ZDYLj.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'file/y31FvVtDcePe1nslYqOPnM4DfmNs7O4Yg06ZDYLj.png', '2023-07-18 07:52:39', '2023-07-18 07:52:39'),
	(7, 'HR0001/07/23', NULL, '1', '2023-07-18', '2023-07-18', 'Bandung', '3', 'hehe', 'file/SkMwlA5vpLN1oIjtx2oeJtfAHNhYU7HzYX2F9bHX.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'file/SkMwlA5vpLN1oIjtx2oeJtfAHNhYU7HzYX2F9bHX.png', '2023-07-18 10:36:04', '2023-07-18 10:36:04'),
	(8, 'HR0002/07/23', NULL, '2', '2023-07-18', '2023-07-12', 'FW', '3', 'Haard', 'file/sZ5fwdrDYJenGaCrXtoPrVOJoIfLLkqAyoltxqED.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'file/sZ5fwdrDYJenGaCrXtoPrVOJoIfLLkqAyoltxqED.png', '2023-07-18 11:07:01', '2023-07-18 11:07:01');
/*!40000 ALTER TABLE `safeties` ENABLE KEYS */;

-- Dumping structure for table safety_management.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `organitation_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table safety_management.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `role_id`, `organitation_id`, `username`, `fullname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 1, 2, '1', 'Admin Safety Management', NULL, '2023-07-17 15:13:16', '$2y$10$KVQr6qE.3tMWG.g4755noeyLBhrWDR9kXl/NLIHyU9v.hCUqgL8QC', NULL, '2023-07-17 15:13:16', '2023-07-18 10:57:39'),
	(3, 2, 1, '222', 'Staff', NULL, '2023-07-18 10:58:04', '$2y$10$GpoTDcT3PwK8d0182E7/5.hOm/s69oOc0m/1/wzLKdSszqg3/QzxO', NULL, '2023-07-18 10:58:04', '2023-07-18 10:58:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
