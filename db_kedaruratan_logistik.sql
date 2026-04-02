/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - db_kedaruratan_logistik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kedaruratan_logistik` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_kedaruratan_logistik`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id`,`nama_jabatan`,`created_at`,`updated_at`) values 
(1,'Kepala Pelaksana','2026-03-17 07:04:32','2026-03-17 07:22:02'),
(2,'Kepala Bidang Kedaruratan & Logistik','2026-03-17 07:04:32','2026-03-17 07:22:39'),
(3,'Kasi Kedaruratan','2026-03-17 07:04:32','2026-03-17 07:04:32'),
(4,'Kasi Logistik','2026-03-17 07:04:32','2026-03-17 07:04:32'),
(5,'Operator Pusdalops','2026-03-17 07:04:32','2026-03-17 07:04:32'),
(6,'Operator Database','2026-03-17 07:04:32','2026-03-17 07:04:32');

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wilayah_id` bigint unsigned NOT NULL,
  `jabatan_id` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kontak_wilayah_id_foreign` (`wilayah_id`),
  KEY `kontak_jabatan_id_foreign` (`jabatan_id`),
  CONSTRAINT `kontak_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kontak_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayah` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id`,`wilayah_id`,`jabatan_id`,`nama`,`no_hp`,`foto`,`created_at`,`updated_at`) values 
(1,1,1,'Erasukma Munaf','082283387772','kontak/f4JZy6RgTT9mbiBnGwn9i6OdBDizfPt7pO3x3FTm.jpg','2026-03-17 07:04:32','2026-03-25 03:34:02'),
(2,1,2,'Fajar Sukma','081270522400',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(3,2,1,'Rahmad Lasmono','08126637241','kontak/3iwmRMURypVgpxoJ0qnmtTsEzk9pblavPuvOKI2q.webp','2026-03-17 07:04:32','2026-03-25 08:51:29'),
(4,2,2,'Abdul Ghafur','085296660628',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(5,2,5,'Hengki Murdiono','081374963615',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(6,2,5,'Lukman Syahputra','082170948247',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(7,2,5,'Supardi','082285445644',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(8,2,5,'Genta Putra Ramadhani','082174843071',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(9,2,5,'Rika Novia Darmawati','082171392470',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(10,2,5,'Sri Mahyuni','085363651055',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(11,3,1,'Suherman Juanaidi','081363495294',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(12,3,2,'Ardianus','081277058276',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(13,3,6,'Yana Witarsa','082285072323',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(14,4,1,'Sarman Simanungkalit','081365985281',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(15,4,2,'Abital','082269417779',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(16,4,3,'Albert','082144383332',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(17,4,4,'Halimah','081374567279',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(18,4,6,'Tri Oktavia','082390692919',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(19,4,6,'Azfariza Huska','085274480148',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(20,5,1,'Zaimar Hakim','085271804517',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(21,5,2,'Ardiman','085274696211',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(22,5,5,'Miko Darlis','081270736006',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(23,5,5,'Rudi Idra','08126683610',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(24,5,5,'Alek Sandra','081374582864',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(25,6,1,'Emri Nurman','085263296162',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(26,6,2,'Jonadi','082386692757',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(27,6,3,'Romer Merkurius','082173052129',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(28,6,4,'Mukhsis Muslim','081363741800',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(29,6,5,'Andre Putra','082383010492',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(30,6,5,'Afif Alfarisi','085272578508',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(31,7,1,'Mardianto','085274285046',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(32,7,2,'Haryanto','082383552777',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(33,7,5,'BISCO','083190988488',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(34,7,5,'Rudy Jens','082348303967',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(35,8,1,'Jhon Edwar','085182484131',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(36,8,2,'Afrizal','085364645131',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(37,9,1,'Armen','081363490172',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(38,9,2,'Hendri Agustian','081363380713',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(39,9,6,'Anggye Kurniawan','081275113131',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(40,10,1,'Yulizar','081363461496',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(41,10,2,'Feby Hendra','08126760356',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(42,11,1,'Khairul','082284490156',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(43,11,2,'Indra Muchsis','082387275695',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(44,12,1,'Novi Hendrix','081267020645',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(45,12,2,'Romi Aprijal','081374512122',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(46,13,1,'Remon Revlin','085263108980',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(47,13,2,'Dody Susilo','081374988808',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(48,14,1,'Zulhenri','082288341747',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(49,14,2,'Doni','081363754999',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(50,15,1,'Hendri Zulviton','082384117670',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(51,15,2,'Al Banna','081266943300',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(52,15,6,'Febrian Mulyadi','089623104492',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(53,16,1,'Dian Eka Putra','085272101313',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(54,16,2,'Kharul Abdi','085278352717',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(55,17,1,'Ferry Ferdian','085274311199',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(56,17,2,'Dendy Pribadi','085274273463',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(57,18,1,'Erizon','082297304995',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(58,18,2,'Hapi','081277252288',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(59,19,1,'Hilmed','081266873752',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(60,19,2,'Dedi Satria','085198057763',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(61,20,1,'Edrizal','08126771299',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32'),
(62,20,3,'Ade Chandra Yuda','08126643509',NULL,'2026-03-17 07:04:32','2026-03-17 07:04:32');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_03_16_065009_create_wilayahs_table',1),
(5,'2026_03_16_065244_create_jabatans_table',1),
(6,'2026_03_16_065546_create_kontaks_table',1),
(7,'2026_03_13_073745_create_roles_table',2),
(8,'2026_03_25_100000_add_foto_to_wilayah_and_kontak_tables',3),
(9,'2026_03_26_090000_create_sirines_table',4),
(10,'2026_03_26_090100_create_sirine_logs_table',5),
(11,'2026_03_26_120000_refactor_sirines_fields',6),
(12,'2026_03_26_130000_cleanup_legacy_sirine_structure',7);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('9OINGJdXnNIE325TQckQbaATGzXUdpEnNqXSnwE6',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2ZtdHVaVlhJbFhYZzBYUkZ0aU9Qem9DUVlCZGxOM0lzcHNsa3RsMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXJpbmUiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1774585667),
('eqSdHEW4zS1QYOui2p7c8Ld1Ezc0y9dZDpkB3prV',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoia3YzYlY5OE8wNGJrN3c4bUUxWmkwc2VhSXdBMEVBMDl5T1htTGlrSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXJpbmUiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1774600824),
('X78f4qxjMMbPvbL2GZgkUK6mE7ksYoSLWERrj9Gc',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/2.3.34 Chrome/138.0.7204.251 Electron/37.7.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3ZqdHdkb3R5RHpIOWd6SHdlRlBmRDl2M1hObHlsYzJjMUgyVEY2diI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1774578673),
('XvM1vGq6Eu9YSDGg4SecvakgFZWVZ5JU2h8ZZI84',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/2.3.34 Chrome/138.0.7204.251 Electron/37.7.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDNpWXA5NHljYlZhYUlUeEtTWE94VlE1WkhpOEF5ZVdKWGxRQWpNbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1774578672);

/*Table structure for table `sirines` */

DROP TABLE IF EXISTS `sirines`;

CREATE TABLE `sirines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `status_aktif` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `kondisi_alat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sirines` */

insert  into `sirines`(`id`,`nama_petugas`,`lokasi`,`latitude`,`longitude`,`status_aktif`,`kondisi_alat`,`created_at`,`updated_at`) values 
(1,'Mediaris Djorghy','Mesjid Raya Nailus Sa\'adah, Jl. Adinegoro',-0.8504200,100.3348600,'aktif','Suara Jelas dan Bersih','2026-03-26 08:38:14','2026-03-27 03:20:11'),
(3,'Arpen Aipo','Mesjid Al Muhajirin, Pasir Putih',-0.8656500,100.3354800,'nonaktif','Tidak Berfungsi','2026-03-26 08:53:08','2026-03-27 03:26:50'),
(4,'Wahyu Saputra','Shelter Darussalam, Linggarjati',-0.8680800,100.3394900,'aktif','Jelas dan bersih','2026-03-27 02:33:03','2026-03-27 03:28:35'),
(5,'Rifqa Mardatillah','Shelter Jl. Wisma Indah Parupuk',-0.8817200,100.3441100,'aktif','Jelas dan Bersih','2026-03-27 03:30:26','2026-03-27 03:30:26'),
(6,'Firsa Alfarezi','Masjid Darul Muttaqin, Pasia Nan Tigo',-0.8517300,100.3277567,'aktif','Suara Putus-putus dan tidak jelas','2026-03-27 03:38:59','2026-03-27 03:38:59'),
(7,'Ilham Sanitria','Kampus UNP Air Tawar',-0.8966167,100.3501861,'nonaktif','Tidak Berfungsi','2026-03-27 03:41:39','2026-03-27 03:45:47'),
(8,'Surung M Sinaga, SKM','Kampus UBH Ulak Karang',-0.9060500,100.3446000,'aktif','Jelas dan Bersih','2026-03-27 03:42:26','2026-03-27 03:42:26'),
(10,'Suryadi, S.Kom','SMA 1 Padang, Jl. Belanti',-0.9189583,100.3546110,'aktif','Jelas dan Bersih','2026-03-27 03:44:20','2026-03-27 03:44:20'),
(11,'Agung Dwiky Pradipta','Kantor DPRD Jl. Khatib Sulaiman',-0.9067056,100.3520500,'nonaktif','Tidak Berfungsi','2026-03-27 03:45:26','2026-03-27 03:45:26'),
(13,'Apes Syuriadi Putra','Surau Angku Sidi Alam (Masjid Jihad Jondul V, Parupuk Tabing)',-0.8761553,100.3419714,'aktif','Jelas dan Bersih','2026-03-27 03:49:41','2026-03-27 03:49:41'),
(14,'Donal Khairi','SMP N 7 Padang, Lolong Belanti',-0.9393000,100.3540940,'aktif','Jelas dan Berfungsi','2026-03-27 03:53:07','2026-03-27 03:53:07'),
(15,'Wilman','Masjid Al Falah, Kel. Padang Sarai',-0.8080784,100.3078850,'aktif','Jelas dan Berfungsi','2026-03-27 03:55:51','2026-03-27 03:55:51'),
(16,'Tara Suci Ramadhani','GOR Haji Agus Salim',-0.9302770,100.3602020,'aktif','Jelas dan Berfungsi','2026-03-27 03:57:01','2026-03-27 03:57:01'),
(17,'Acil Erbara','Kantor Gubernur Jl. Jend. Sudirman',-0.9368694,100.3601000,'aktif','Jelas dan Berfungsi','2026-03-27 03:57:56','2026-03-27 03:57:56'),
(18,'LS. Rozano','Kantor BAPPEDA Prov. Sumatera Barat',-0.9258834,100.3608483,'aktif','Jelas dan Berfungsi','2026-03-27 04:04:09','2026-03-27 04:04:09'),
(19,'Dilla Ulfa Desma, S.Si','SDN 03 & SDN 04 Purus',-0.9393000,100.3540940,'aktif','Jelas dan Berfungsi','2026-03-27 04:05:01','2026-03-27 04:05:01'),
(20,'Petugas Piket/Security','Kantor BPBD Prov. Sumatera Barat',-0.9387050,100.3611433,'aktif','Jelas dan Berfungsi','2026-03-27 04:12:43','2026-03-27 04:12:43'),
(21,'Afrinaldi','SDN 24 Ujung Gurun',-0.9325000,100.3541300,'aktif','Jelas dan Berfungsi','2026-03-27 04:13:30','2026-03-27 04:13:30'),
(22,'Herwin','Mercure Hotel',-0.9360972,100.3528170,'aktif','Jelas dan Berfungsi','2026-03-27 04:14:11','2026-03-27 04:14:11'),
(23,'Agus Prayitno, A.Md.','Bank Nagari Pusat Jl. Pemuda',-0.9493917,100.3545917,'aktif','Jelas dan Brfungsi','2026-03-27 04:15:03','2026-03-27 04:15:03');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*Table structure for table `wilayah` */

DROP TABLE IF EXISTS `wilayah`;

CREATE TABLE `wilayah` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `wilayah` */

insert  into `wilayah`(`id`,`nama_wilayah`,`foto`,`created_at`,`updated_at`) values 
(1,'Provinsi Sumatera Barat','wilayah/Q7ybY5u7L8HW6UA3JkEWbFEYneOk0e3mXgXTwyGC.png','2026-03-17 07:04:32','2026-03-25 04:18:48'),
(2,'Kabupaten Agam','wilayah/jZXAzShnVaouQt6MbkM3BdyvHuSGgeb9Z0DPolCw.png','2026-03-17 07:04:32','2026-03-25 04:19:31'),
(3,'Kabupaten Darmasraya','wilayah/SWX6oeO5x9yITujheWqditnc1ZBGa6jtUXNkFYUa.png','2026-03-17 07:04:32','2026-03-25 04:20:10'),
(4,'Kabupaten Kep. Mentawai','wilayah/F6APG3Sm0rUIunuOo4qAhOEJgoAx1L2PXmdQny5h.webp','2026-03-17 07:04:32','2026-03-25 04:21:27'),
(5,'Kabupaten Lima Puluh Kota','wilayah/j1q4QdH5rR1eKIL9HgbCXVYFRylcv8FkGWepc5Qy.png','2026-03-17 07:04:32','2026-03-25 04:22:18'),
(6,'Kabupaten Padang Pariaman','wilayah/n3eiNuYHQk8ndjgkqy1uhMfe8qhWTfxAKcigHf5E.png','2026-03-17 07:04:32','2026-03-25 04:25:05'),
(7,'Kabupaten Pasaman','wilayah/LoJvQALQiE10QeuPLF57V2LwPWsDogmlDkWWYHxx.png','2026-03-17 07:04:32','2026-03-25 04:26:36'),
(8,'Kabupaten Pasaman Barat','wilayah/yorLsmBEaKHM0slbSxb0Bj9Pgdg2OqUpTVmFo3QK.png','2026-03-17 07:04:32','2026-03-25 04:27:11'),
(9,'Kabupaten Pesisir Selatan','wilayah/Pc4EPgpPACc85Dm2jo32dIwdZwrcuC8afPHeQSwq.png','2026-03-17 07:04:32','2026-03-25 04:28:48'),
(10,'Kabupaten Sijunjung','wilayah/M4mpZkCFrl7x9KyPRKOoQiALZHcMMDw0do1MSokQ.jpg','2026-03-17 07:04:32','2026-03-25 04:30:35'),
(11,'Kabupaten Solok','wilayah/qsJPlv53RjyBdjqvO3n3eAUz4HmenpNmXnDhqmVP.png','2026-03-17 07:04:32','2026-03-25 04:31:17'),
(12,'Kabupaten Solok Selatan','wilayah/mVwJs5MLOFGnSasyyak4sNz7J5NPVtSfjsRi2iJ0.png','2026-03-17 07:04:32','2026-03-25 04:31:42'),
(13,'Kabupaten Tanah Datar','wilayah/vlHopCZNRjihDrZulWq0uDTAIyZzaOoMh8eQx826.png','2026-03-17 07:04:32','2026-03-25 04:32:24'),
(14,'Kota Bukittinggi','wilayah/MRI1gBgQFyjddZ4P8ECGv4kNXl56s3aYXXvRDh34.png','2026-03-17 07:04:32','2026-03-25 04:32:57'),
(15,'Kota Padang','wilayah/8llaywmAXmUDBaXpm8bqvSGlks8ij1hIwWIHXJgt.png','2026-03-17 07:04:32','2026-03-25 04:33:37'),
(16,'Kota Padang Panjang','wilayah/Ao4tKzFzhn0XcfXznT63oBtSdDnhCxsBR1IxuSa4.png','2026-03-17 07:04:32','2026-03-25 04:34:59'),
(17,'Kota Pariaman','wilayah/J6fjXVMKyu2RzNb4XiZySIcNXaNhUBbETXWbpx3l.png','2026-03-17 07:04:32','2026-03-25 04:35:55'),
(18,'Kota Payakumbuh','wilayah/WR2ZucbPceViI0sshpx3TEzj5vY7kBd96u9GnpqS.png','2026-03-17 07:04:32','2026-03-25 04:36:30'),
(19,'Kota Sawahlunto','wilayah/atgNn5s9oIDNY2xhGlP9nuhLcInmbGqUmkM2y708.png','2026-03-17 07:04:32','2026-03-25 04:37:04'),
(20,'Kota Solok','wilayah/TRa63gUdCmfWxorZ9Vp06pxWs0Oplw0rFVuDcFEa.png','2026-03-17 07:04:32','2026-03-25 04:38:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
