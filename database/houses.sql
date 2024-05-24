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


-- Dumping database structure for houses
CREATE DATABASE IF NOT EXISTS `houses` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `houses`;

-- Dumping structure for table houses.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.cache: ~0 rows (approximately)

-- Dumping structure for table houses.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.cache_locks: ~0 rows (approximately)

-- Dumping structure for table houses.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.categories: ~2 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Bài viết', NULL, NULL),
	(2, 'Họ', NULL, NULL);

-- Dumping structure for table houses.category_children
CREATE TABLE IF NOT EXISTS `category_children` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_parent_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_children_category_parent_id_foreign` (`category_parent_id`),
  CONSTRAINT `category_children_category_parent_id_foreign` FOREIGN KEY (`category_parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.category_children: ~2 rows (approximately)
INSERT INTO `category_children` (`id`, `name`, `created_at`, `updated_at`, `category_parent_id`) VALUES
	(1, 'Bài viết mới nhất', NULL, NULL, 1),
	(2, 'Bài viết cũ nhất', NULL, NULL, 1);

-- Dumping structure for table houses.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commentable_id` int unsigned DEFAULT NULL,
  `commentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `house_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_house_id_foreign` (`house_id`),
  CONSTRAINT `comments_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.comments: ~3 rows (approximately)
INSERT INTO `comments` (`id`, `content`, `created_at`, `updated_at`, `commentable_id`, `commentable_type`, `user_id`, `house_id`) VALUES
	(188, 'haiz', '2024-05-07 04:18:37', '2024-05-07 04:18:37', NULL, NULL, 3, 648),
	(189, 'nè', '2024-05-07 04:29:02', '2024-05-07 04:29:02', NULL, NULL, 3, 83),
	(190, 'ád', '2024-05-07 04:35:43', '2024-05-07 04:35:43', NULL, NULL, 3, 86),
	(191, 'này', '2024-05-07 04:40:54', '2024-05-07 04:40:54', NULL, NULL, 3, 83),
	(192, 'asd', '2024-05-08 05:17:24', '2024-05-08 05:17:24', NULL, NULL, 3, 83);

-- Dumping structure for table houses.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.contacts: ~0 rows (approximately)
INSERT INTO `contacts` (`id`, `name`, `email`, `question`, `content`, `created_at`, `updated_at`, `phone`) VALUES
	(1, 'huy', 'huyl43336@gmail.com', 'Nhà cho thuê có uy tín không', 'cảm ơn', '2024-05-07 15:46:43', '2024-05-07 15:46:43', '0989977224');

-- Dumping structure for table houses.failed_jobs
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

-- Dumping data for table houses.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table houses.homecontents
CREATE TABLE IF NOT EXISTS `homecontents` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `carousel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_carousel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_house` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.homecontents: ~2 rows (approximately)
INSERT INTO `homecontents` (`id`, `carousel`, `caption_carousel`, `video_url`, `top_house`, `created_at`, `updated_at`) VALUES
	(7, '1714016130R (8).jpg', 'abc', NULL, NULL, '2024-04-24 20:35:30', '2024-04-24 20:35:30'),
	(9, '1714446672_AZ7A9508.jpg', 'bb', NULL, NULL, '2024-04-24 20:40:54', '2024-04-29 20:11:12'),
	(10, '1714446769_79d3a41bcf129cb6737513c24abd48f1.jpg', 'c', NULL, NULL, '2024-04-24 20:44:35', '2024-05-04 04:18:14'),
	(11, '1714446610z5223833879147_73148f2f0ac1f1efbfd70d00f355c0c5.jpg', 'caar', NULL, NULL, '2024-04-29 20:10:10', '2024-04-29 20:10:10');

-- Dumping structure for table houses.homes_content
CREATE TABLE IF NOT EXISTS `homes_content` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `carousel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_carousel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_house` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.homes_content: ~3 rows (approximately)
INSERT INTO `homes_content` (`id`, `carousel`, `caption_carousel`, `video_url`, `top_house`, `created_at`, `updated_at`) VALUES
	(1, 'https://phunugioi.com/wp-content/uploads/2020/03/hinh-anh-nhung-ngoi-nha-dep-cho-khong-gian-song-ly-tuong.jpg', 'null', 'ádsd', 'ádsd', NULL, NULL),
	(2, 'https://vtkong.com/wp-content/uploads/2019/11/thiet-ke-nha-cap-4-9x12m-01.jpg', NULL, NULL, NULL, NULL, NULL),
	(3, 'https://th.bing.com/th/id/OIP.bztX66stanS0G3ziV9lP8gHaEK?rs=1&pid=ImgDetMain', NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table houses.houses
CREATE TABLE IF NOT EXISTS `houses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Expirationdate` date NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed` int unsigned NOT NULL,
  `bath` int unsigned NOT NULL,
  `area` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` int NOT NULL DEFAULT '0',
  `images` int unsigned DEFAULT NULL,
  `size` int unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `images` (`images`),
  KEY `houses_user_id_foreign` (`user_id`),
  CONSTRAINT `houses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=649 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.houses: ~35 rows (approximately)
INSERT INTO `houses` (`id`, `title`, `author`, `Expirationdate`, `content`, `bed`, `bath`, `area`, `phone`, `price`, `images`, `size`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, '225812', 'gggg', '2024-04-23', 'Lỗi "Undefined property: stdClass::$[{"image_url":"..." và các giá trị tương tự]" thường xảy ra khi bạn truy cập vào một thuộc tính không tồn tại trên một đối tượng stdClass (đối tượng mà bạn nhận được từ kết quả của phương thức get() trong truy vấn database).', 2, 2, 'bn', '123', 10, 2, 10, '2024-04-23 15:23:17', '2024-05-05 14:49:46', 10),
	(2, '123456', 'hj', '2024-05-04', 'nhà', 3, 3, 'Hà Nội', '012577', 4000, 456, 100, '2024-05-04 04:25:01', '2024-05-08 16:05:18', 3),
	(40, 'cho thuê nhà', 'áds', '2024-04-30', 'Chào mừng bạn đến với căn nhà ấm cúng tại khu vực Long Biên!\r\n\r\nBạn đang tìm kiếm một nơi lý tưởng để tạm dừng và cảm thấy như ở nhà? Chúng tôi có một lựa chọn tuyệt vời cho bạn!\r\n\r\n🌟 Vị trí: Đắc địa ngay tại khu vực Long Biên - một trong những khu vực phát triển nhanh chóng của Hà Nội. Gần các trường học, bệnh viện, siêu thị và các tiện ích công cộng, giúp cuộc sống của bạn trở nên tiện lợi hơn bao giờ hết.\r\n\r\n🏠 Căn nhà: Rộng rãi, thoáng đãng và được thiết kế một cách thông minh, căn nhà này sẽ đáp ứng mọi nhu cầu của bạn. Với không gian sống rộng rãi, phòng ngủ thoải mái và những tiện nghi hiện đại, bạn sẽ tìm thấy sự thoải mái và tiện nghi ở đây.\r\n\r\n💰 Giá cả: Chúng tôi cam kết mang đến cho bạn một giá cả hợp lý nhất trong khu vực. Đây là cơ hội tuyệt vời để bạn sở hữu một căn nhà tốt với mức giá phải chăng.\r\n\r\n🔑 Liên hệ ngay với chúng tôi để biết thêm thông tin chi tiết và sắp xếp thời gian tham quan căn nhà. Đừng bỏ lỡ cơ hội sống trong một không gian lý tưởng tại khu vực Long Biên!', 2, 2, 'Long Biên', '1232323', 34, 999, 34, '2024-04-25 07:52:44', '2024-05-04 02:59:55', 30),
	(41, 'ádsdsd', 'áds', '2024-05-11', 'assssss', 2, 2, 'Long Biên', '1232323', 43, 50, 43, '2024-04-25 07:55:57', '2024-04-29 09:31:10', 38),
	(56, 'nhà', 'huy', '2024-05-17', 'cho thuê', 2, 4, 'Hà Nội', '9977221', 12, 75, 120, '2024-05-02 02:02:37', '2024-05-02 02:02:37', 3),
	(57, 'nhà mới', 'huy', '2024-05-16', 'ád', 2, 2, 'Hà Nội', '9977221', 20, 81, 110, '2024-05-02 02:14:57', '2024-05-02 02:14:57', 3),
	(58, 'aaaaaaaaaaa', 'hhhhhhhhhhhhhh', '2024-05-31', 'nbasd', 2, 2, 'Hà Nam', '1232323', 12, NULL, 30, '2024-05-05 05:41:46', '2024-05-05 05:41:46', 3),
	(59, 'aaaaaaaaaaa', 'hhhhhhhhhhhhhh', '2024-05-31', 'nbasd', 2, 2, 'Hà Nam', '1232323', 12, NULL, 30, '2024-05-05 05:42:09', '2024-05-05 05:42:09', 3),
	(60, 'aaaaaaaaaaa', 'hhhhhhhhhhhhhh', '2024-05-31', 'nbasd', 2, 2, 'Hà Nam', '1232323', 12, NULL, 30, '2024-05-05 05:47:10', '2024-05-05 05:47:10', 3),
	(61, 'aaaaaaaaaaa', 'hhhhhhhhhhhhhh', '2024-05-31', 'nbasd', 2, 2, 'Hà Nam', '1232323', 12, NULL, 30, '2024-05-05 05:48:13', '2024-05-05 05:48:13', 3),
	(62, '225', 'hhhhhhhhhhhhhh', '2024-05-31', 'adsds', 2, 2, 'Hà Nam', '1232323', 50, NULL, 50, '2024-05-05 05:48:55', '2024-05-05 05:48:55', 3),
	(63, 'Bài viết số: 912', 'hhhhhhhhhhhhhh', '2024-05-03', '123', 123, 123, 'Hà Nội', '9977221', 34, 343, 34, '2024-05-05 05:50:29', '2024-05-05 05:50:29', 3),
	(64, '225', 'hhhhhhhhhhhhhh', '2024-05-23', 'ád', 2, 2, 'Hà Nam', '1232323', 23, NULL, 43, '2024-05-05 05:53:25', '2024-05-05 05:53:25', 3),
	(65, '225', 'hhhhhhhhhhhhhh', '2024-05-23', 'ád', 2, 2, 'Hà Nam', '1232323', 23, NULL, 43, '2024-05-05 05:54:47', '2024-05-05 05:54:47', 3),
	(66, 'Bài viết số: 912', 'hhhhhhhhhhhhhh', '2024-05-04', '12', 123, 123, 'Hà Nội', '9977221', 4, 3434, 5, '2024-05-05 05:57:14', '2024-05-05 05:57:14', 3),
	(67, 'Bài viết số: 912', 'hhhhhhhhhhhhhh', '2024-05-23', 'ád', 123, 123, 'Hà Nội', '9977221', 3123, 34343, 21, '2024-05-05 06:00:38', '2024-05-05 06:00:38', 3),
	(69, '225', 'hhhhhhhhhhhhhh', '2024-05-17', 'á', 2, 2, 'Hà Nam', '1232323', 51, NULL, 15, '2024-05-05 06:04:42', '2024-05-05 06:04:42', 3),
	(70, '225', 'hhhhhhhhhhhhhh', '2024-05-17', 'á', 2, 2, 'Hà Nam', '1232323', 51, 70, 15, '2024-05-05 06:06:07', '2024-05-05 06:06:07', 3),
	(71, '225', 'hhhhhhhhhhhhhh', '2024-05-17', 'á', 2, 2, 'Hà Nam', '1232323', 51, 71, 15, '2024-05-05 06:06:37', '2024-05-05 06:06:37', 3),
	(72, '22123', 'hhhhhhhhhhhhhh', '2024-05-17', 'á', 2, 2, 'Hà Nam', '1232323', 51, 72, 15, '2024-05-05 06:08:09', '2024-05-05 06:08:09', 3),
	(73, '22123', 'hhhhhhhhhhhhhh', '2024-05-17', 'á', 2, 2, 'Hà Nam', '1232323', 51, 73, 15, '2024-05-05 06:08:26', '2024-05-05 06:08:26', 3),
	(74, '221236', 'hhhhhhhhhhhhhh', '2024-05-17', 'á', 2, 2, 'Hà Nam', '1232323', 51, 74, 15, '2024-05-05 06:08:42', '2024-05-05 06:15:42', 3),
	(75, 'Bài viết số: 912', 'hhhhhhhhhhhhhh', '2024-05-25', '123', 23, 32, 'Hà Nội', '12345', 87, NULL, 87, '2024-05-05 06:16:56', '2024-05-05 06:16:56', 3),
	(76, 'Bài viết số: 9126', 'hhhhhhhhhhhhhh', '2024-05-25', '123', 23, 32, 'Hà Nội', '12345', 87, 76, 87, '2024-05-05 06:17:24', '2024-05-05 06:17:24', 3),
	(77, 'loz', 'huy', '2024-05-17', 'bn', 10, 10, 'Hà Nội', '098', 55, NULL, 51, '2024-05-05 06:18:17', '2024-05-05 06:18:17', 3),
	(78, 'loc', 'huy', '2024-05-17', 'bn', 10, 10, 'Hà Nội', '098', 55, 78, 51, '2024-05-05 06:19:15', '2024-05-05 14:18:54', 3),
	(79, 'egyt', 'ád', '2024-05-29', 'adsd', 123, 123, 'Hà Nội', '12324', 56, 79, 56, '2024-05-05 06:19:58', '2024-05-05 06:19:58', 3),
	(80, 'joe', 'mes', '2024-05-18', 'ádsdsd', 456, 21, '21', '123244', 999, 80, 8, '2024-05-05 06:20:56', '2024-05-05 06:20:56', 3),
	(81, 'joe', 'mes', '2024-05-24', '12323', 456, 21, '21', '123244', 23, NULL, 23, '2024-05-05 06:57:12', '2024-05-05 06:57:12', 3),
	(82, 'joe', 'mes', '2024-05-24', '12323', 456, 21, '21', '123244', 23, 82, 23, '2024-05-05 06:57:29', '2024-05-05 06:57:29', 3),
	(83, 'joer', 'mes', '2024-05-29', 'ád', 456, 21, '21', '123244', 12, 83, 12, '2024-05-05 07:00:04', '2024-05-05 07:00:04', 3),
	(84, 'messi', 'huy', '2024-05-22', '23', 12, 12, 'Hà Nội', '5555', 31, 84, 31, '2024-05-05 07:00:44', '2024-05-05 07:00:44', 3),
	(85, 'nhà nè', 't', '2024-05-08', 'ádsd', 45, 45, 'Hà Nội', '1232', 45, 85, 56, '2024-05-05 07:03:26', '2024-05-05 07:03:26', 3),
	(86, 'nhà nè à e', 't', '2024-05-20', 'ádsd', 45, 45, 'Hà Nội', '1232', 123, 86, 321, '2024-05-05 07:08:08', '2024-05-05 07:11:14', 3),
	(648, 'mono', 'a', '2024-06-01', 'ád', 23, 23, 'Hà Nội', '1233', 244, 648, 567, '2024-05-05 14:50:52', '2024-05-05 14:50:52', 3);

-- Dumping structure for table houses.image_posts
CREATE TABLE IF NOT EXISTS `image_posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int unsigned DEFAULT NULL,
  `string` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_posts_image_id_foreign` (`image_id`),
  CONSTRAINT `image_posts_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `houses` (`images`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.image_posts: ~115 rows (approximately)
INSERT INTO `image_posts` (`id`, `image_url`, `image_id`, `string`, `created_at`, `updated_at`) VALUES
	(794, 'kememay.jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(795, 'Kreatif-Desain-Interior-Rumah-Type-60-34-Renovasi-Inspirasi-Dekorasi-Rumah-Kecil-untuk-Desain-Interior-Rumah-Type-60-.jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(796, 'memay.jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(797, 'noi-that-phong-khach-chung-cu-nho-2.jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(798, 'OIP (10).jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(799, 'OIP (11).jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(800, 'OIP (12).jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(801, 'R (8).jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(802, 'thiet-ke-phong-khach-chung-cu-anh-can-2.jpg', NULL, '', '2024-04-25 07:57:03', '2024-04-25 07:57:03'),
	(803, '79d52c144120999.628676bd70a3b.jpg', NULL, '', '2024-04-25 07:57:59', '2024-04-25 07:57:59'),
	(804, 'cr.jpg', NULL, '', '2024-04-25 07:57:59', '2024-04-25 07:57:59'),
	(805, 'Kreatif-Desain-Interior-Rumah-Type-60-34-Renovasi-Inspirasi-Dekorasi-Rumah-Kecil-untuk-Desain-Interior-Rumah-Type-60-.jpg', NULL, '', '2024-04-25 07:57:59', '2024-04-25 07:57:59'),
	(806, 'noi-that-phong-khach-chung-cu-nho-2.jpg', NULL, '', '2024-04-25 07:57:59', '2024-04-25 07:57:59'),
	(807, 'OIP (8).jpg', NULL, '', '2024-04-25 07:58:54', '2024-04-25 07:58:54'),
	(809, '79d52c144120999.628676bd70a3b.jpg', NULL, '', '2024-04-25 08:02:54', '2024-04-25 08:02:54'),
	(810, 'cr.jpg', NULL, '', '2024-04-25 08:02:54', '2024-04-25 08:02:54'),
	(811, 'Kreatif-Desain-Interior-Rumah-Type-60-34-Renovasi-Inspirasi-Dekorasi-Rumah-Kecil-untuk-Desain-Interior-Rumah-Type-60-.jpg', NULL, '', '2024-04-25 08:02:54', '2024-04-25 08:02:54'),
	(812, 'noi-that-phong-khach-chung-cu-nho-2.jpg', NULL, '', '2024-04-25 08:02:54', '2024-04-25 08:02:54'),
	(813, 'OIP (11).jpg', NULL, '', '2024-04-25 08:02:54', '2024-04-25 08:02:54'),
	(814, 'R (8).jpg', NULL, '', '2024-04-25 08:02:54', '2024-04-25 08:02:54'),
	(815, 'nt1.jpg', NULL, '', '2024-04-25 08:06:08', '2024-04-25 08:06:08'),
	(816, 'nt2.jpg', NULL, '', '2024-04-25 08:06:08', '2024-04-25 08:06:08'),
	(840, 'AZ7A9545.jpg', 2, '', '2024-04-29 09:07:36', '2024-04-29 09:07:36'),
	(841, 'AZ7A9540.jpg', 2, '', '2024-04-29 09:07:36', '2024-04-29 09:07:36'),
	(842, 'AZ7A9536.jpg', 2, '', '2024-04-29 09:07:36', '2024-04-29 09:07:36'),
	(843, 'AZ7A9545.jpg', 2, '', '2024-04-29 09:08:09', '2024-04-29 09:08:09'),
	(844, 'AZ7A9540.jpg', 2, '', '2024-04-29 09:08:09', '2024-04-29 09:08:09'),
	(845, 'AZ7A9536.jpg', 2, '', '2024-04-29 09:08:09', '2024-04-29 09:08:09'),
	(846, 'AZ7A9526.jpg', 2, '', '2024-04-29 09:08:09', '2024-04-29 09:08:09'),
	(847, 'AZ7A9518.jpg', 2, '', '2024-04-29 09:08:09', '2024-04-29 09:08:09'),
	(848, 'AZ7A9462.jpg', NULL, '', '2024-04-29 09:27:53', '2024-04-29 09:27:53'),
	(849, 'AZ7A9430.jpg', NULL, '', '2024-04-29 09:27:53', '2024-04-29 09:27:53'),
	(850, 'AZ7A9434.jpg', NULL, '', '2024-04-29 09:27:53', '2024-04-29 09:27:53'),
	(851, 'AZ7A9462.jpg', NULL, '', '2024-04-29 09:29:09', '2024-04-29 09:29:09'),
	(852, 'AZ7A9430.jpg', NULL, '', '2024-04-29 09:29:09', '2024-04-29 09:29:09'),
	(853, 'AZ7A9434.jpg', NULL, '', '2024-04-29 09:29:09', '2024-04-29 09:29:09'),
	(854, 'AZ7A9462.jpg', 50, '', '2024-04-29 09:31:10', '2024-04-29 09:31:10'),
	(855, 'AZ7A9430.jpg', 50, '', '2024-04-29 09:31:10', '2024-04-29 09:31:10'),
	(856, 'AZ7A9434.jpg', 50, '', '2024-04-29 09:31:10', '2024-04-29 09:31:10'),
	(857, 'AZ7A9422.jpg', 50, '', '2024-04-29 09:31:47', '2024-04-29 09:31:47'),
	(858, 'AZ7A9462.jpg', 50, '', '2024-04-29 09:31:47', '2024-04-29 09:31:47'),
	(859, 'AZ7A9430.jpg', 50, '', '2024-04-29 09:31:47', '2024-04-29 09:31:47'),
	(860, 'AZ7A9434.jpg', 50, '', '2024-04-29 09:31:47', '2024-04-29 09:31:47'),
	(871, 'AZ7A9098.jpg', 999, '', '2024-04-29 09:35:28', '2024-04-29 09:35:28'),
	(872, 'AZ7A9094.jpg', 999, '', '2024-04-29 09:35:28', '2024-04-29 09:35:28'),
	(873, 'AZ7A9090.jpg', 999, '', '2024-04-29 09:35:28', '2024-04-29 09:35:28'),
	(874, 'AZ7A9085.jpg', 999, '', '2024-04-29 09:35:28', '2024-04-29 09:35:28'),
	(875, 'AZ7A9070.jpg', 999, '', '2024-04-29 09:35:28', '2024-04-29 09:35:28'),
	(890, 'z5223833055328_944f61a04c3e040f7ff34bbcf108771e.jpg', 75, '', '2024-05-02 02:02:37', '2024-05-02 02:02:37'),
	(891, 'z5223833055331_6363bae9252b700f46279da92898d1cc.jpg', 75, '', '2024-05-02 02:02:37', '2024-05-02 02:02:37'),
	(892, 'z5223833060358_df6946c348943feebf1c9ba1b3f4cee2.jpg', 75, '', '2024-05-02 02:02:37', '2024-05-02 02:02:37'),
	(893, 'z5223833060359_6029f2307a2ec437523bbf54a0237954.jpg', 75, '', '2024-05-02 02:02:37', '2024-05-02 02:02:37'),
	(894, 'z5223833061218_861e7372b15928dce7f1fec828bc9398.jpg', 75, '', '2024-05-02 02:02:37', '2024-05-02 02:02:37'),
	(895, '1ecca3914d6a9034c97b.jpg', 81, '', '2024-05-02 02:14:57', '2024-05-02 02:14:57'),
	(896, '2efa062584d1598f00c0.jpg', 81, '', '2024-05-02 02:14:57', '2024-05-02 02:14:57'),
	(897, '4a4f6190e3643e3a6775.jpg', 81, '', '2024-05-02 02:14:57', '2024-05-02 02:14:57'),
	(898, '9dc66a91846a5934007b.jpg', 81, '', '2024-05-02 02:14:57', '2024-05-02 02:14:57'),
	(899, '9f517483f6772b297266.jpg', 81, '', '2024-05-02 02:14:57', '2024-05-02 02:14:57'),
	(912, 'z5319689863494_b089d477aa519541bd0e6943127dded5.jpg', 456, '', '2024-05-04 02:48:29', '2024-05-04 02:48:29'),
	(913, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 456, '', '2024-05-04 02:48:29', '2024-05-04 02:48:29'),
	(914, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 456, '', '2024-05-04 02:48:29', '2024-05-04 02:48:29'),
	(915, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 456, '', '2024-05-04 02:48:29', '2024-05-04 02:48:29'),
	(916, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 456, '', '2024-05-04 02:48:29', '2024-05-04 02:48:29'),
	(917, 'z5319689897811_84e508f7dd2a7ac777831e94bd19ee17.jpg', 456, '', '2024-05-04 02:48:29', '2024-05-04 02:48:29'),
	(918, 'z5319689898949_74c171f31f3d5ec01ead37b72d1a8624.jpg', 456, '', '2024-05-04 02:48:29', '2024-05-04 02:48:29'),
	(919, 'anhot.png', NULL, '', '2024-05-05 05:47:10', '2024-05-05 05:47:10'),
	(920, 'anhot.png', NULL, '', '2024-05-05 05:48:13', '2024-05-05 05:48:13'),
	(921, 'AZ7A9500 (1).jpg', NULL, '', '2024-05-05 05:48:55', '2024-05-05 05:48:55'),
	(922, 'AZ7A9500 (1).jpg', 343, '', '2024-05-05 05:50:29', '2024-05-05 05:50:29'),
	(925, 'AZ7A9508.jpg', 3434, '', '2024-05-05 05:57:14', '2024-05-05 05:57:14'),
	(926, 'AZ7A9500 (1).jpg', 74, '', '2024-05-05 06:08:42', '2024-05-05 06:08:42'),
	(927, 'z5319689863494_b089d477aa519541bd0e6943127dded5.jpg', 76, '', '2024-05-05 06:17:24', '2024-05-05 06:17:24'),
	(928, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 76, '', '2024-05-05 06:17:24', '2024-05-05 06:17:24'),
	(929, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 76, '', '2024-05-05 06:17:24', '2024-05-05 06:17:24'),
	(930, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 76, '', '2024-05-05 06:17:24', '2024-05-05 06:17:24'),
	(931, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 76, '', '2024-05-05 06:17:24', '2024-05-05 06:17:24'),
	(932, 'z5319689897811_84e508f7dd2a7ac777831e94bd19ee17.jpg', 76, '', '2024-05-05 06:17:24', '2024-05-05 06:17:24'),
	(933, 'z5319689863494_b089d477aa519541bd0e6943127dded5.jpg', 78, '', '2024-05-05 06:19:15', '2024-05-05 06:19:15'),
	(934, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 78, '', '2024-05-05 06:19:15', '2024-05-05 06:19:15'),
	(935, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 78, '', '2024-05-05 06:19:15', '2024-05-05 06:19:15'),
	(936, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 78, '', '2024-05-05 06:19:15', '2024-05-05 06:19:15'),
	(937, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 78, '', '2024-05-05 06:19:15', '2024-05-05 06:19:15'),
	(938, 'z5319689863494_b089d477aa519541bd0e6943127dded5.jpg', 79, '', '2024-05-05 06:19:58', '2024-05-05 06:19:58'),
	(939, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 79, '', '2024-05-05 06:19:58', '2024-05-05 06:19:58'),
	(940, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 79, '', '2024-05-05 06:19:58', '2024-05-05 06:19:58'),
	(941, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 79, '', '2024-05-05 06:19:58', '2024-05-05 06:19:58'),
	(942, 'z5319689863494_b089d477aa519541bd0e6943127dded5.jpg', 80, '', '2024-05-05 06:20:56', '2024-05-05 06:20:56'),
	(943, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 80, '', '2024-05-05 06:20:56', '2024-05-05 06:20:56'),
	(944, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 80, '', '2024-05-05 06:20:56', '2024-05-05 06:20:56'),
	(945, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 80, '', '2024-05-05 06:20:56', '2024-05-05 06:20:56'),
	(946, 'z5319689863494_b089d477aa519541bd0e6943127dded5.jpg', 82, '', '2024-05-05 06:57:29', '2024-05-05 06:57:29'),
	(947, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 82, '', '2024-05-05 06:57:29', '2024-05-05 06:57:29'),
	(948, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 82, '', '2024-05-05 06:57:29', '2024-05-05 06:57:29'),
	(949, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 82, '', '2024-05-05 06:57:29', '2024-05-05 06:57:29'),
	(950, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 82, '', '2024-05-05 06:57:29', '2024-05-05 06:57:29'),
	(951, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 83, '', '2024-05-05 07:00:04', '2024-05-05 07:00:04'),
	(952, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 83, '', '2024-05-05 07:00:04', '2024-05-05 07:00:04'),
	(953, 'z5319689897811_84e508f7dd2a7ac777831e94bd19ee17.jpg', 83, '', '2024-05-05 07:00:04', '2024-05-05 07:00:04'),
	(954, 'z5319689898949_74c171f31f3d5ec01ead37b72d1a8624.jpg', 83, '', '2024-05-05 07:00:04', '2024-05-05 07:00:04'),
	(955, 'z5319689863494_b089d477aa519541bd0e6943127dded5.jpg', 84, '', '2024-05-05 07:00:44', '2024-05-05 07:00:44'),
	(956, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 84, '', '2024-05-05 07:00:44', '2024-05-05 07:00:44'),
	(957, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 84, '', '2024-05-05 07:00:44', '2024-05-05 07:00:44'),
	(958, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 84, '', '2024-05-05 07:00:44', '2024-05-05 07:00:44'),
	(959, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 84, '', '2024-05-05 07:00:44', '2024-05-05 07:00:44'),
	(960, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 85, '', '2024-05-05 07:03:26', '2024-05-05 07:03:26'),
	(961, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 85, '', '2024-05-05 07:03:26', '2024-05-05 07:03:26'),
	(962, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 85, '', '2024-05-05 07:03:26', '2024-05-05 07:03:26'),
	(963, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 85, '', '2024-05-05 07:03:26', '2024-05-05 07:03:26'),
	(964, 'z5319689897811_84e508f7dd2a7ac777831e94bd19ee17.jpg', 85, '', '2024-05-05 07:03:26', '2024-05-05 07:03:26'),
	(965, 'z5319689870813_c7882d73da86f84324a58c069b9796da.jpg', 86, '', '2024-05-05 07:08:08', '2024-05-05 07:08:08'),
	(966, 'z5319689875888_8c085099ddd0eee4853a3ebd3ef5ba3f.jpg', 86, '', '2024-05-05 07:08:08', '2024-05-05 07:08:08'),
	(967, 'z5319689884309_124c766fc25602972e559bdb7441be63.jpg', 86, '', '2024-05-05 07:08:08', '2024-05-05 07:08:08'),
	(968, 'z5319689889503_9c4f4e395f2b89cc4e9897fae72d3ef6.jpg', 86, '', '2024-05-05 07:08:08', '2024-05-05 07:08:08'),
	(969, 'z5319689897811_84e508f7dd2a7ac777831e94bd19ee17.jpg', 86, '', '2024-05-05 07:08:08', '2024-05-05 07:08:08'),
	(996, '1ecca3914d6a9034c97b.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(997, '2efa062584d1598f00c0.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(998, '4a4f6190e3643e3a6775.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(999, '9dc66a91846a5934007b.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1000, '9f517483f6772b297266.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1001, '846c05bf874b5a15035a.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1002, '7905875569aeb4f0edbf.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1003, 'b9e44b28c9dc14824dcd.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1004, 'b62fbeec3c18e146b809.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1005, 'd66c3ebebc4a6114385b.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1006, 'd97eed2703dcde8287cd.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08'),
	(1007, 'e5826bd5852e5870013f.jpg', 648, '', '2024-05-07 06:25:08', '2024-05-07 06:25:08');

-- Dumping structure for table houses.jobs
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

-- Dumping data for table houses.jobs: ~0 rows (approximately)

-- Dumping structure for table houses.job_batches
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

-- Dumping data for table houses.job_batches: ~0 rows (approximately)

-- Dumping structure for table houses.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `likes` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `house_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  KEY `likes_house_id_foreign` (`house_id`),
  CONSTRAINT `likes_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.likes: ~9 rows (approximately)
INSERT INTO `likes` (`id`, `likes`, `created_at`, `updated_at`, `user_id`, `house_id`) VALUES
	(22, 1, '2024-05-04 02:41:21', '2024-05-04 02:41:21', 3, 56),
	(23, 1, '2024-05-04 02:42:04', '2024-05-04 02:42:04', 3, 57),
	(39, 1, '2024-05-05 14:51:58', '2024-05-05 14:51:58', 3, 648),
	(40, 1, '2024-05-07 04:07:00', '2024-05-07 04:07:00', 37, 86),
	(41, 1, '2024-05-07 04:07:00', '2024-05-07 04:07:00', 37, 86),
	(42, 1, '2024-05-07 04:08:35', '2024-05-07 04:08:35', 37, 648),
	(43, 1, '2024-05-07 04:46:06', '2024-05-07 04:46:06', 3, 648),
	(44, 1, '2024-05-07 05:50:12', '2024-05-07 05:50:12', 3, 83),
	(45, 1, '2024-05-07 05:50:27', '2024-05-07 05:50:27', 3, 83),
	(46, 1, '2024-05-07 05:50:52', '2024-05-07 05:50:52', 3, 1),
	(47, 1, '2024-05-07 05:50:55', '2024-05-07 05:50:55', 3, 1);

-- Dumping structure for table houses.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.migrations: ~17 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_04_14_132910_add_propery_to_users', 2),
	(5, '2024_04_15_135036_create_categories_table', 3),
	(6, '2024_04_15_143530_create_category_children_table', 4),
	(7, '2024_04_15_143627_add_foreign_key_to_category_children', 5),
	(8, '2024_04_16_062412_create_posts_table', 6),
	(9, '2024_04_18_142501_create_table_homes_content', 7),
	(10, '2024_04_18_142534_create_homes_content', 7),
	(11, '2024_04_18_143512_create_homecontents_table', 8),
	(12, '2024_04_20_131103_create_comments_table', 9),
	(13, '2024_04_20_141840_create_comments_table', 10),
	(14, '2024_04_20_142924_drop_table_comments', 10),
	(15, '2024_04_20_142952_drop_to_table_comments', 10),
	(16, '2024_04_20_143057_create_comments', 11),
	(17, '2024_04_20_172317_add_foreign_key_to_comments', 12),
	(18, '2024_04_20_173217_add_property_to_comments', 13),
	(19, '2024_04_21_142653_create_houses_table', 14),
	(20, '2024_04_21_143354_add_property_to_houses', 15),
	(21, '2024_04_21_143602_create_image_posts_table', 16),
	(22, '2024_04_23_145339_add_property_to_houses', 17),
	(23, '2024_05_01_163829_add_foreign_key_to_houses', 18),
	(24, '2024_05_01_164101_add_foreign_key_to_comments', 18),
	(25, '2024_05_04_033409_create_likes_table', 19),
	(26, '2024_05_04_033657_add_foreign_key_to_likes', 20),
	(27, '2024_05_04_033817_add_foreign_key2_to_likes', 21),
	(28, '2024_05_04_151731_create_save_houses_table', 22),
	(29, '2024_05_04_152136_add_foreign_key_to_save_houses', 23),
	(30, '2024_05_07_222308_create_contacts_table', 24),
	(31, '2024_05_07_222753_add_property_to_contacts', 25);

-- Dumping structure for table houses.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table houses.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.posts: ~0 rows (approximately)
INSERT INTO `posts` (`id`, `title`, `name`, `content`, `author`, `url`, `created_at`, `updated_at`) VALUES
	(1, 'Nhà thuê đang có dấu hiệu giám giá', 'nhà ', 'Một trong những yếu tố chính gây ra sự giảm giá của nhà đất là tình hình kinh tế không ổn định. Sự suy giảm trong hoạt động kinh doanh và sản xuất có thể dẫn đến tăng tỷ lệ thất nghiệp và giảm thu nhập của người dân, từ đó làm giảm khả năng mua sắm và đầu tư vào bất động sản.', 'Huy', NULL, NULL, NULL);

-- Dumping structure for table houses.save_houses
CREATE TABLE IF NOT EXISTS `save_houses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `house_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `save_houses_house_id_foreign` (`house_id`),
  KEY `save_houses_user_id_foreign` (`user_id`),
  CONSTRAINT `save_houses_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`),
  CONSTRAINT `save_houses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.save_houses: ~21 rows (approximately)
INSERT INTO `save_houses` (`id`, `url`, `created_at`, `updated_at`, `house_id`, `user_id`) VALUES
	(5, NULL, '2024-05-05 15:29:24', '2024-05-05 15:29:24', 648, 48),
	(6, NULL, '2024-05-05 17:15:22', '2024-05-05 17:15:22', 648, 37),
	(8, NULL, '2024-05-05 17:18:06', '2024-05-05 17:18:06', 57, 37),
	(9, NULL, '2024-05-05 17:22:34', '2024-05-05 17:22:34', 85, 37),
	(10, NULL, '2024-05-05 17:31:29', '2024-05-05 17:31:29', 83, 37),
	(11, NULL, '2024-05-07 04:05:32', '2024-05-07 04:05:32', 1, 37),
	(12, NULL, '2024-05-07 04:05:34', '2024-05-07 04:05:34', 1, 37),
	(13, NULL, '2024-05-07 04:05:35', '2024-05-07 04:05:35', 1, 37),
	(14, NULL, '2024-05-07 04:05:36', '2024-05-07 04:05:36', 1, 37),
	(15, NULL, '2024-05-07 04:05:37', '2024-05-07 04:05:37', 1, 37),
	(16, NULL, '2024-05-07 04:05:37', '2024-05-07 04:05:37', 1, 37),
	(17, NULL, '2024-05-07 04:05:37', '2024-05-07 04:05:37', 1, 37),
	(18, NULL, '2024-05-07 04:05:39', '2024-05-07 04:05:39', 1, 37),
	(19, NULL, '2024-05-07 04:05:39', '2024-05-07 04:05:39', 1, 37),
	(20, NULL, '2024-05-07 04:05:40', '2024-05-07 04:05:40', 1, 37),
	(21, NULL, '2024-05-07 04:05:41', '2024-05-07 04:05:41', 1, 37),
	(22, NULL, '2024-05-07 04:05:41', '2024-05-07 04:05:41', 1, 37),
	(23, NULL, '2024-05-07 04:06:09', '2024-05-07 04:06:09', 1, 37),
	(24, NULL, '2024-05-07 04:06:11', '2024-05-07 04:06:11', 1, 37),
	(25, NULL, '2024-05-07 04:06:58', '2024-05-07 04:06:58', 86, 37),
	(26, NULL, '2024-05-07 04:08:33', '2024-05-07 04:08:33', 648, 37);

-- Dumping structure for table houses.sessions
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

-- Dumping data for table houses.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('WWuW4UxA31VDqTtfY79Ft7nFJmtc5pArBDHxyxJE', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieGlHQXR4aEFTdDNWQlVrb2Z0OGJsZ0NxUlR4a1ZVc3Nxa2YybVBTTSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xlbmQvaG91c2UvZmF2aWNvbi5zdmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1715499792),
	('yIE0VjfBlD4Far9pa2V20r8x2k3NnB91eP4zcAKL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGZWcEx2OEFUMTFZbUptaU84NWgwdHNzWE8xcENTbUpPb2toSEFOaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1715608817);

-- Dumping structure for table houses.table_homes_content
CREATE TABLE IF NOT EXISTS `table_homes_content` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.table_homes_content: ~0 rows (approximately)

-- Dumping structure for table houses.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `role` enum('admin','regular') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'regular',
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table houses.users: ~13 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `phone`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'hhhhhr', 'huyl43336@gmail.com', NULL, '$2y$12$Lj8/cDIxEu/jK4GLA9mViu0jO0V1l4hDzXYWlerzw7nOgsgwmuC32', '0989977224', 'regular', '1713606275_Ft-PBXwWIAIKaFi.jpg', NULL, '2024-04-14 06:42:00', '2024-04-20 02:44:35'),
	(3, 'huy', 'huyjk1802@gmail.com', NULL, '$2y$12$KKZraV/T8/EdHTPP8QINT.SWKMtBsf9DiMue0ndswSwuOL2DuCWFS', '0', 'admin', '1713606318_OIP (6).jpg', NULL, '2024-04-14 06:43:08', '2024-04-20 03:45:10'),
	(9, 'long', 'longnguyen123@gmail.com', NULL, '$2y$12$zSUJUU.ugdmzSYIoeI84L.vZ0DUpbZGD9UZXbMYSXTynzxKADS8.O', '0', 'regular', '1713606229_b661c657a8e336b45d078991fd1600bd.jpg', NULL, '2024-04-14 10:22:28', '2024-04-20 02:43:49'),
	(10, 'huy', 'giang123@gmail.com', NULL, '$2y$12$4ugfbnku5g0GUzHk0/ux.uQ7KWQvpcYVOtcNfZpUK3025uySqK2tm', '0', 'admin', '1713606185_e1dd6c395e05e5b174c73d2063a2de8a.jpg', NULL, NULL, '2024-04-29 20:08:19'),
	(30, 'zoro', 'sto@gmail.com', NULL, '$2y$12$LXS8BePxNTrASaFz/eRMR.t708AqlV8NGZUTxpG0scZD0wngMN40i', '0', 'admin', '1713606140_R (7).jpg', NULL, '2024-04-18 06:16:13', '2024-04-20 03:43:39'),
	(33, 'huy', 'huyle43367@gmail.com', NULL, '$2y$12$3UYebgcC/mHjsPYGbrfLDeM1GsOnFhwKgts4rKDQsKg3iG8pEPd62', '0', 'admin', '1713606101_Avatar-Luffy-dep-an-tuong-nhat.jpg', NULL, '2024-04-18 19:58:31', '2024-04-20 02:41:41'),
	(36, 'hoang', 'hoaanrb1802@gmail.com', NULL, '$2y$12$dncwk.aTOl6r75Y7A6jkeODeLlyJQnM7scdEqedPy1WLnQdssgdL6', '0', 'admin', '1713707006_OIP (7).jpg', NULL, '2024-04-20 10:48:28', '2024-04-21 06:43:26'),
	(37, 'hai', 'hai245@gmail.com', NULL, '$2y$12$Hr3rMYX9g8yuH0lPfG3EaeIg.8sugftWT14BnbHqmKyXRNeUbaeH2', '0', 'regular', '1713707106_a130864e6d6db6899ca996b0691113f8--avatar-the-last-airbender-avatar-aang.jpg', NULL, '2024-04-21 06:44:20', '2024-05-09 16:17:17'),
	(38, 'nam', 'namnguyen123@gmail.com', NULL, '$2y$12$C2H1bfEgu2W2WcbmcbDhqeS7VWDTuDYsbvA18TMU1rIEeW3f8rAz.', '0', 'admin', '1713707543_OIP (8).jpg', NULL, '2024-04-21 06:46:23', '2024-04-23 07:00:17'),
	(48, 'loada', 'jk56@gmail.com', NULL, '$2y$12$lLE.gWSCOonx1sdMC46WleMsk9x0rXsLq9glMYPL8oTS/LVxqKDIy', '0', 'regular', 'avadefault.jpg', NULL, '2024-05-05 07:43:50', '2024-05-05 07:43:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
