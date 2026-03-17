/*
SQLyog Ultimate v11.11 (64 bit)
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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
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

/*Data for the table `failed_jobs` */

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id`,`nama_jabatan`,`created_at`,`updated_at`) values (1,'Kalaksa','2026-03-16 07:37:43','2026-03-16 07:37:43'),(2,'Kabid KL','2026-03-16 07:38:46','2026-03-16 07:38:46'),(3,'Kasi Kedarutan','2026-03-16 07:39:16','2026-03-16 07:39:16'),(4,'Kasi Logistik','2026-03-16 07:39:34','2026-03-16 07:39:34'),(5,'Operator Pusdalops','2026-03-16 07:40:08','2026-03-16 07:40:08'),(6,'Operator Database','2026-03-16 07:49:57','2026-03-16 07:49:57');

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
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

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
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

/*Data for the table `jobs` */

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wilayah_id` bigint unsigned NOT NULL,
  `jabatan_id` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kontak_wilayah_id_foreign` (`wilayah_id`),
  KEY `kontak_jabatan_id_foreign` (`jabatan_id`),
  CONSTRAINT `kontak_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kontak_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayah` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id`,`wilayah_id`,`jabatan_id`,`nama`,`no_hp`,`created_at`,`updated_at`) values (1,1,1,'Dr. Ir. Erasukma Munaf, S.T., M.M., M.T.','082283387772','2026-03-16 07:38:20','2026-03-16 07:38:20'),(2,1,2,'Fajar Sukma, S.Pd.','081270522400','2026-03-16 07:40:36','2026-03-16 07:40:36'),(3,2,5,'Hengki Murdiono','081374963615','2026-03-16 07:41:19','2026-03-16 07:47:38'),(4,2,5,'Lukman Syahputra','082170948247','2026-03-16 07:41:46','2026-03-16 07:47:45'),(5,2,5,'Supardi','082285445644','2026-03-16 07:42:24','2026-03-16 07:47:52'),(6,2,5,'Genta Putra Ramadhani','082174843071','2026-03-16 07:43:12','2026-03-16 07:47:59'),(7,2,5,'Rika Novia Darmawati','082171392470','2026-03-16 07:43:47','2026-03-16 07:48:06'),(8,2,5,'Sri Mahyuni','085363651055','2026-03-16 07:44:14','2026-03-16 07:48:13'),(9,2,5,'Ade Setiawan Putra','085263055681','2026-03-16 07:44:38','2026-03-16 07:48:20'),(10,3,1,'Suherman Juanaidi, S.Kom','+62 813-6349-5294','2026-03-16 07:49:05','2026-03-16 07:49:05'),(11,3,2,'Ardianus','081277058276','2026-03-16 07:49:36','2026-03-16 07:49:36'),(12,3,6,'Yana Witarsa','+62 822-8507-2323','2026-03-16 07:50:29','2026-03-16 07:50:29'),(13,4,1,'Sarman P. Simanungkalit, S.H., M.Ec.Dev','081365985281','2026-03-16 07:51:45','2026-03-16 07:51:45'),(14,4,2,'Abital','082269417779','2026-03-16 07:52:08','2026-03-16 07:52:08'),(15,4,3,'Albert','082144383332','2026-03-16 07:52:39','2026-03-16 07:52:39'),(16,4,4,'Halimah','081374567279','2026-03-16 07:53:10','2026-03-16 07:53:10'),(17,4,6,'Tri Oktavia','+62 823-9069-2919','2026-03-16 07:53:41','2026-03-16 07:53:41'),(18,4,6,'azfariza huska','+62 852-7448-0148','2026-03-16 07:54:11','2026-03-16 07:54:11');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_03_16_065009_create_wilayahs_table',1),(5,'2026_03_16_065244_create_jabatans_table',1),(6,'2026_03_16_065546_create_kontaks_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
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

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('JwBuQD7q8gkOCYLUWRNPEOg07JURBkwmIVNNrcIe',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibFJLaURtV2lrcXRFaHFNcUVRNGxEVnpiWmp5MWJzalkzQ2syT09GRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb250YWsiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1773648026),('lRPWz8s5519pYTWEwJSVfaT2OqkuyCZHsSjztzvs',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidXNqQmp1T0ZLUUZVMnNrekFZeFo3VHhjRHo3eWRvZzlNaUdGMFlSSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb250YWsiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1773711217),('qPmxdD7BrOQdOMaaoGn1G54YuqrSEBj1KwiTUGzX',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0ZTUzdjYWZMY25lYlAxRmRNaER2dVdBclFlWDNDWjZJcHo1ZnRSYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb250YWsiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1773711497);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*Table structure for table `wilayah` */

DROP TABLE IF EXISTS `wilayah`;

CREATE TABLE `wilayah` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `wilayah` */

insert  into `wilayah`(`id`,`nama_wilayah`,`created_at`,`updated_at`) values (1,'Provinsi Sumatera Barat','2026-03-16 07:32:48','2026-03-16 07:32:48'),(2,'Kabupaten Agam','2026-03-16 07:47:30','2026-03-16 07:47:30'),(3,'Kabupaten Darmasraya','2026-03-16 07:48:37','2026-03-16 07:48:37'),(4,'Kabupaten Kep. Mentawai','2026-03-16 07:51:23','2026-03-16 07:51:23'),(5,'Kabupaten Lima Puluh Kota','2026-03-16 07:55:03','2026-03-16 07:55:03'),(6,'Kabupaten Padang Pariaman','2026-03-16 07:55:12','2026-03-16 07:55:12'),(7,'Kabupaten Pasaman','2026-03-16 07:55:34','2026-03-16 07:55:34'),(8,'Kabupaten Pasaman Barat','2026-03-16 07:55:48','2026-03-16 07:55:48'),(9,'Kabupaten Pessisir Selatan','2026-03-16 07:56:04','2026-03-16 07:56:04'),(10,'Kabupaten Sijunjung','2026-03-16 07:56:22','2026-03-16 07:56:22'),(11,'Kabupaten Solok','2026-03-16 07:56:53','2026-03-16 07:56:53'),(12,'Kabupaten Solok Selatan','2026-03-16 07:57:11','2026-03-16 07:57:11'),(13,'Kabupaten Tanah Datar','2026-03-16 07:57:30','2026-03-16 07:57:30'),(14,'Kota Bukittinggi','2026-03-16 07:57:45','2026-03-16 07:57:45'),(15,'Kota Padang','2026-03-16 07:58:01','2026-03-16 07:58:01'),(16,'Kota Padang Panjang','2026-03-16 07:58:19','2026-03-16 07:58:19'),(17,'Kota Pariaman','2026-03-16 07:58:33','2026-03-16 07:58:33'),(18,'Kota Payakumbuh','2026-03-16 07:58:49','2026-03-16 07:58:49');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
