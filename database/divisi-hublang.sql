-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table divisi-hublang.cabang
CREATE TABLE IF NOT EXISTS `cabang` (
  `id_cabang` int NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table divisi-hublang.cabang: ~21 rows (approximately)
INSERT INTO `cabang` (`id_cabang`, `nama_cabang`) VALUES
	(1, 'Cabang Medan Kota'),
	(2, 'Cabang Sei Agul'),
	(3, 'Cabang Medan Denai'),
	(4, 'Cabang Medan Labuhan'),
	(5, 'Cabang Berastagi'),
	(6, 'Cabang Sibolangit'),
	(7, 'Cabang Sunggal'),
	(8, 'Cabang Padang Bulan'),
	(9, 'Cabang Delitua'),
	(10, 'Cabang Tuasan'),
	(11, 'Cabang Diski'),
	(12, 'Cabang H.M Yamin'),
	(13, 'Cabang Belawan Kota'),
	(14, 'Cabang Cemara'),
	(15, 'Cabang Deli Serdang'),
	(16, 'Cabang Tobasa'),
	(17, 'Cabang Samosir'),
	(18, 'Cabang Tapanuli Selatan'),
	(19, 'Cabang Nias Selatan'),
	(20, 'Unit Nias Utara');

-- Dumping structure for table divisi-hublang.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.cache: ~0 rows (approximately)

-- Dumping structure for table divisi-hublang.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.cache_locks: ~0 rows (approximately)

-- Dumping structure for table divisi-hublang.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table divisi-hublang.form_inputan
CREATE TABLE IF NOT EXISTS `form_inputan` (
  `npa` varchar(50) NOT NULL DEFAULT '',
  `pegawai_id` int NOT NULL,
  `tanggal_input` date NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `stand_meter` int NOT NULL DEFAULT '0',
  `tarif` varchar(50) NOT NULL DEFAULT '0',
  `hasil_temuan` text NOT NULL,
  `arahan_tindak_lanjut` text NOT NULL,
  `cabang_id` int NOT NULL DEFAULT '0',
  `tanggal_cek_ulang` date NOT NULL,
  `tanggal_cetak` date NOT NULL,
  PRIMARY KEY (`npa`),
  KEY `FK_pegawai` (`pegawai_id`),
  KEY `FK_cabang` (`cabang_id`),
  CONSTRAINT `FK_cabang` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id_cabang`),
  CONSTRAINT `FK_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table divisi-hublang.form_inputan: ~1 rows (approximately)
INSERT INTO `form_inputan` (`npa`, `pegawai_id`, `tanggal_input`, `nama_pelanggan`, `alamat`, `stand_meter`, `tarif`, `hasil_temuan`, `arahan_tindak_lanjut`, `cabang_id`, `tanggal_cek_ulang`, `tanggal_cetak`) VALUES
	('1109070028', 2, '2025-01-22', 'Esra Siagian', 'Jalan Rakyat 188/194', 8976, '89765', 'Meter Tertimbun', 'TLM', 9, '2025-01-15', '2025-01-07'),
	('1122270002', 2, '2025-01-22', 'Sutami Karimunda', 'Kapt. M Jamil Lubis', 12, '122', 'Meter Mati, air dipakai pelanggan', 'Ganti Meter', 3, '2025-01-23', '2025-01-23'),
	('1122270015', 1, '2025-01-22', 'Tiaminun Nasution', 'Kapt. M. Jamil Lubis Gg. Sukses 15', 222, '2222', 'Meter Mati, Air dipakai pelanggan', 'Ganti Meter', 2, '2025-01-21', '2025-01-23');

-- Dumping structure for table divisi-hublang.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.jobs: ~0 rows (approximately)

-- Dumping structure for table divisi-hublang.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.job_batches: ~0 rows (approximately)

-- Dumping structure for table divisi-hublang.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1);

-- Dumping structure for table divisi-hublang.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table divisi-hublang.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table divisi-hublang.pegawai: ~15 rows (approximately)
INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`) VALUES
	(1, 'Ahmad Zuhdi Lubis', 'ahmad123', '12345'),
	(2, 'Aulia Natalianz', 'aulia123', '12345'),
	(3, 'Haslinda Nasution', 'haslinda123', '12345'),
	(4, 'Hasoloan Sotarduga', 'hasoloan123', '12345'),
	(5, 'Iskandar Zulkarnain Siregar', 'iskandar123', '12345'),
	(6, 'Madina Sari Nasution', NULL, NULL),
	(7, 'Muhammad Akhir Harahap', NULL, NULL),
	(8, 'Muhammad Ridho', NULL, NULL),
	(9, 'Ramadhan Harahap', NULL, NULL),
	(10, 'Ramadoni', NULL, NULL),
	(11, 'Rina Suryani', NULL, NULL),
	(12, 'Romy Pranata', NULL, NULL),
	(15, 'Lia Romaito Harahap', NULL, NULL),
	(16, 'M. Yogi Firmansyah', NULL, NULL);

-- Dumping structure for table divisi-hublang.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('T0HTl4UyWGyx4xAgqgjRrHmqVNTo1HPJ4XqzeoZv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVZRTnNhbW11ZnJuaGJVTUl5MkZIR2dnMUxrbWFMaldxUEduWVRBOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9kaXZpc2ktaHVibGFuZy50ZXN0L3BkZiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoicGVnYXdhaSI7YTozOntzOjI6ImlkIjtpOjI7czo4OiJ1c2VybmFtZSI7czo4OiJhdWxpYTEyMyI7czo0OiJuYW1hIjtzOjE1OiJBdWxpYSBOYXRhbGlhbnoiO319', 1737535969);

-- Dumping structure for table divisi-hublang.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table divisi-hublang.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Yayaa', 'auliya@gmail.com', NULL, '$2y$10$IfpIUlC589Ugz2uxweUCFulvVseSW/PLjjs9ZB/FjfY0Vq770li8i', NULL, '2025-01-18 22:40:02', '2025-01-18 22:40:02');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
