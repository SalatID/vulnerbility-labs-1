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

-- Dumping structure for table vuln_labs.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.carts: ~2 rows (approximately)
REPLACE INTO `carts` (`id`, `product_id`, `qty`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 4, 1, 2, '2025-06-05 06:16:43', '2025-06-05 06:16:43'),
	(2, 1, 4, 2, '2025-06-05 06:20:01', '2025-06-05 06:27:35');

-- Dumping structure for table vuln_labs.failed_jobs
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

-- Dumping data for table vuln_labs.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table vuln_labs.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.migrations: ~7 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_05_29_144610_create_permission_tables', 2),
	(7, '2025_05_29_230244_user_transaction', 3),
	(8, '2025_05_30_001033_prodcut_migration', 4),
	(9, '2025_06_02_025448_alter_transaction', 5),
	(10, '2025_06_02_233113_chart_table', 5),
	(11, '2025_06_03_002350_alter_table_user', 5);

-- Dumping structure for table vuln_labs.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table vuln_labs.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.model_has_roles: ~3 rows (approximately)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3);

-- Dumping structure for table vuln_labs.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table vuln_labs.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.permissions: ~0 rows (approximately)
REPLACE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'dashboard.view', 'web', '2025-05-29 07:59:27', '2025-05-29 07:59:27');

-- Dumping structure for table vuln_labs.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
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

-- Dumping data for table vuln_labs.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table vuln_labs.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.products: ~50 rows (approximately)
REPLACE INTO `products` (`id`, `product_name`, `price`, `image`, `kategory`, `created_at`, `updated_at`) VALUES
	(1, 'quod', 724.85, 'https://via.placeholder.com/640x480.png/00eeff?text=products+animi', 'doloremque', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(2, 'ut', 230.37, 'https://via.placeholder.com/640x480.png/00ff22?text=products+nulla', 'praesentium', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(3, 'nesciunt', 77.52, 'https://via.placeholder.com/640x480.png/004499?text=products+ab', 'quos', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(4, 'soluta', 169.18, 'https://via.placeholder.com/640x480.png/009999?text=products+illo', 'in', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(5, 'minus', 809.77, 'https://via.placeholder.com/640x480.png/000055?text=products+eligendi', 'ut', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(6, 'placeat', 615.36, 'https://via.placeholder.com/640x480.png/00ff33?text=products+id', 'iure', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(7, 'consectetur', 718.60, 'https://via.placeholder.com/640x480.png/000088?text=products+commodi', 'aut', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(8, 'ea', 269.28, 'https://via.placeholder.com/640x480.png/00bb00?text=products+aut', 'ea', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(9, 'nisi', 901.32, 'https://via.placeholder.com/640x480.png/00ff33?text=products+ea', 'id', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(10, 'et', 941.75, 'https://via.placeholder.com/640x480.png/0099dd?text=products+harum', 'vel', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(11, 'illo', 327.90, 'https://via.placeholder.com/640x480.png/00dd22?text=products+dolores', 'ut', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(12, 'sed', 584.34, 'https://via.placeholder.com/640x480.png/0044bb?text=products+odit', 'aliquam', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(13, 'iusto', 563.61, 'https://via.placeholder.com/640x480.png/00ff77?text=products+aliquam', 'culpa', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(14, 'blanditiis', 549.55, 'https://via.placeholder.com/640x480.png/00ee22?text=products+vel', 'nobis', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(15, 'rem', 239.99, 'https://via.placeholder.com/640x480.png/004466?text=products+omnis', 'harum', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(16, 'omnis', 733.53, 'https://via.placeholder.com/640x480.png/0011dd?text=products+tempore', 'molestiae', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(17, 'ut', 170.29, 'https://via.placeholder.com/640x480.png/00aa99?text=products+voluptatem', 'et', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(18, 'cumque', 917.84, 'https://via.placeholder.com/640x480.png/0088aa?text=products+officiis', 'ut', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(19, 'aperiam', 978.56, 'https://via.placeholder.com/640x480.png/00ffdd?text=products+distinctio', 'ex', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(20, 'aut', 67.33, 'https://via.placeholder.com/640x480.png/00eeaa?text=products+blanditiis', 'velit', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(21, 'error', 331.74, 'https://via.placeholder.com/640x480.png/00ddee?text=products+id', 'tenetur', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(22, 'ut', 370.42, 'https://via.placeholder.com/640x480.png/00ff44?text=products+et', 'porro', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(23, 'nam', 26.68, 'https://via.placeholder.com/640x480.png/0066cc?text=products+voluptas', 'sint', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(24, 'ut', 381.95, 'https://via.placeholder.com/640x480.png/0099cc?text=products+omnis', 'dolorem', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(25, 'tempora', 349.78, 'https://via.placeholder.com/640x480.png/00eecc?text=products+atque', 'eaque', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(26, 'accusamus', 600.65, 'https://via.placeholder.com/640x480.png/00aabb?text=products+exercitationem', 'et', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(27, 'placeat', 513.01, 'https://via.placeholder.com/640x480.png/000022?text=products+tenetur', 'qui', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(28, 'quo', 58.35, 'https://via.placeholder.com/640x480.png/009999?text=products+officia', 'architecto', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(29, 'officiis', 653.29, 'https://via.placeholder.com/640x480.png/00bbcc?text=products+beatae', 'beatae', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(30, 'modi', 915.26, 'https://via.placeholder.com/640x480.png/006622?text=products+rerum', 'iure', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(31, 'consequuntur', 482.80, 'https://via.placeholder.com/640x480.png/00ee55?text=products+voluptas', 'perferendis', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(32, 'et', 394.00, 'https://via.placeholder.com/640x480.png/007799?text=products+enim', 'voluptatem', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(33, 'deleniti', 375.04, 'https://via.placeholder.com/640x480.png/00ddff?text=products+aspernatur', 'quia', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(34, 'illo', 323.32, 'https://via.placeholder.com/640x480.png/0077bb?text=products+officia', 'ut', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(35, 'animi', 303.88, 'https://via.placeholder.com/640x480.png/004411?text=products+maxime', 'laudantium', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(36, 'dolore', 946.66, 'https://via.placeholder.com/640x480.png/00ccaa?text=products+aspernatur', 'consequuntur', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(37, 'sunt', 946.96, 'https://via.placeholder.com/640x480.png/009900?text=products+consequatur', 'quae', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(38, 'labore', 829.71, 'https://via.placeholder.com/640x480.png/005555?text=products+illo', 'et', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(39, 'iure', 530.64, 'https://via.placeholder.com/640x480.png/00cc99?text=products+provident', 'eum', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(40, 'harum', 759.85, 'https://via.placeholder.com/640x480.png/00aadd?text=products+nihil', 'velit', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(41, 'corrupti', 549.68, 'https://via.placeholder.com/640x480.png/0088dd?text=products+eos', 'omnis', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(42, 'quasi', 684.51, 'https://via.placeholder.com/640x480.png/00aacc?text=products+similique', 'vero', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(43, 'quia', 671.55, 'https://via.placeholder.com/640x480.png/00ccdd?text=products+ut', 'ut', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(44, 'saepe', 21.17, 'https://via.placeholder.com/640x480.png/009944?text=products+et', 'omnis', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(45, 'hic', 901.77, 'https://via.placeholder.com/640x480.png/00ff77?text=products+ipsam', 'velit', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(46, 'esse', 150.92, 'https://via.placeholder.com/640x480.png/003377?text=products+accusantium', 'aut', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(47, 'quis', 237.56, 'https://via.placeholder.com/640x480.png/007788?text=products+aut', 'quas', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(48, 'modi', 338.74, 'https://via.placeholder.com/640x480.png/00ff66?text=products+aut', 'quia', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(49, 'exercitationem', 459.96, 'https://via.placeholder.com/640x480.png/005555?text=products+nesciunt', 'quia', '2025-05-29 17:14:10', '2025-05-29 17:14:10'),
	(50, 'est', 390.03, 'https://via.placeholder.com/640x480.png/0044aa?text=products+fugit', 'veritatis', '2025-05-29 17:14:10', '2025-05-29 17:14:10');

-- Dumping structure for table vuln_labs.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.roles: ~2 rows (approximately)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'web', '2025-05-29 07:59:27', '2025-05-29 07:59:27'),
	(2, 'general_user', 'web', '2025-05-29 07:59:27', '2025-05-29 07:59:27');

-- Dumping structure for table vuln_labs.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.role_has_permissions: ~2 rows (approximately)
REPLACE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 2);

-- Dumping structure for table vuln_labs.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.transactions: ~30 rows (approximately)
REPLACE INTO `transactions` (`id`, `user_id`, `transaction_date`, `amount`, `description`, `qty`, `created_at`, `updated_at`) VALUES
	(1, 1, '2025-05-06', 94.97, 'Transaction for user 1 - 1', 3, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(2, 1, '2025-05-28', 66.54, 'Transaction for user 1 - 2', 5, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(3, 1, '2025-05-19', 72.31, 'Transaction for user 1 - 3', 8, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(4, 1, '2025-05-27', 9.94, 'Transaction for user 1 - 4', 8, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(5, 1, '2025-05-02', 68.95, 'Transaction for user 1 - 5', 10, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(6, 1, '2025-05-18', 53.62, 'Transaction for user 1 - 6', 6, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(7, 1, '2025-05-28', 97.62, 'Transaction for user 1 - 7', 8, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(8, 1, '2025-05-04', 35.90, 'Transaction for user 1 - 8', 3, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(9, 1, '2025-05-02', 46.34, 'Transaction for user 1 - 9', 8, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(10, 1, '2025-05-07', 83.37, 'Transaction for user 1 - 10', 2, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(11, 1, '2025-05-24', 8.68, 'Transaction for user 1 - 11', 2, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(12, 1, '2025-05-07', 94.45, 'Transaction for user 1 - 12', 8, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(13, 1, '2025-05-25', 56.37, 'Transaction for user 1 - 13', 9, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(14, 1, '2025-05-06', 13.45, 'Transaction for user 1 - 14', 1, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(15, 1, '2025-05-05', 62.01, 'Transaction for user 1 - 15', 9, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(16, 2, '2025-05-28', 83.15, 'Transaction for user 2 - 1', 6, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(17, 2, '2025-05-26', 46.77, 'Transaction for user 2 - 2', 4, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(18, 2, '2025-05-25', 84.35, 'Transaction for user 2 - 3', 3, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(19, 2, '2025-05-15', 31.08, 'Transaction for user 2 - 4', 4, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(20, 2, '2025-05-06', 9.75, 'Transaction for user 2 - 5', 3, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(21, 2, '2025-05-10', 30.45, 'Transaction for user 2 - 6', 10, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(22, 2, '2025-05-20', 51.25, 'Transaction for user 2 - 7', 2, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(23, 2, '2025-05-04', 33.75, 'Transaction for user 2 - 8', 2, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(24, 2, '2025-05-21', 69.06, 'Transaction for user 2 - 9', 1, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(25, 2, '2025-05-21', 46.10, 'Transaction for user 2 - 10', 4, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(26, 2, '2025-05-04', 20.65, 'Transaction for user 2 - 11', 1, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(27, 2, '2025-04-29', 41.03, 'Transaction for user 2 - 12', 7, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(28, 2, '2025-05-08', 56.08, 'Transaction for user 2 - 13', 5, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(29, 2, '2025-05-01', 16.78, 'Transaction for user 2 - 14', 8, '2025-05-29 16:31:42', '2025-05-29 16:31:42'),
	(30, 2, '2025-05-28', 59.87, 'Transaction for user 2 - 15', 10, '2025-05-29 16:31:42', '2025-05-29 16:31:42');

-- Dumping structure for table vuln_labs.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vuln_labs.users: ~3 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, '<img onerror="alert(document.cookie)" src="http://www.notfoundurl.com" />', 'admin@example.com', NULL, NULL, '$2y$12$LUQPPWkcQnsxmIWF7YVMlenfajb6Rtpm8AluiyETUh.7WKgXMcPPa', NULL, '2025-05-29 07:59:27', '2025-06-07 01:23:11'),
	(2, 'Regular User', 'user3@example.com', NULL, NULL, '$2y$12$qCMKuIFv5fK0uVL2Hu9v7OSpS0rC5LMtuYtBvAbGdqO6oQvTEgFK2', NULL, '2025-05-29 07:59:27', '2025-06-05 11:09:13'),
	(3, 'Regular User 2', 'user2@example.com', NULL, NULL, '$2y$12$ib5zdI8xOkRbSmiglRyypOzE0/MhZExFflYcAkBa8ynMeg5KX8w9K', NULL, '2025-05-29 16:23:08', '2025-05-29 16:23:08');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
