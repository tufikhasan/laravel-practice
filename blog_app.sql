-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 07:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Exploring the Wonders of Nature', 'Discover the beauty of nature through this breathtaking journey.', 'https://cdn.pixabay.com/photo/2019/09/17/18/48/computer-4484282_960_720.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(2, 'The Art of Culinary Delights', 'Embark on a gastronomic adventure with our mouthwatering recipes.', 'https://cdn.pixabay.com/photo/2020/03/06/08/00/laptop-4906312_1280.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(3, 'Travel Tales: Unforgettable Adventures', 'Join us as we explore exotic destinations and create memories for a lifetime.', 'https://cdn.pixabay.com/photo/2015/05/31/10/55/man-791049_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(4, 'Fitness and Wellness: A Holistic Approach', 'Learn how to maintain a healthy lifestyle and achieve inner balance.', 'https://cdn.pixabay.com/photo/2017/04/05/01/16/food-2203732_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(5, 'Unlocking the Secrets of the Universe', 'Delve into the mysteries of space and unravel the secrets of the cosmos.', 'https://cdn.pixabay.com/photo/2014/02/13/07/28/security-265130_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(6, 'The Joy of Parenthood', 'Discover the joys and challenges of raising a family.', 'https://cdn.pixabay.com/photo/2019/01/17/23/14/work-3938875_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(7, 'Mastering the Art of Photography', 'Capture breathtaking moments with expert tips and techniques.', 'https://cdn.pixabay.com/photo/2017/05/30/03/58/blog-2355684_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(8, 'Finding Your Zen: The Power of Meditation', 'Experience tranquility and mindfulness through the practice of meditation.', 'https://cdn.pixabay.com/photo/2015/01/04/17/30/wordpress-588495_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(9, 'Thrill Seekers: Adventures Beyond Limits', 'Get your adrenaline pumping with thrilling activities and extreme sports.', 'https://cdn.pixabay.com/photo/2014/08/27/07/53/blog-428950_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44'),
(10, 'Unleashing Your Creativity', 'Uncover your artistic potential and express yourself through various forms of creativity.', 'https://cdn.pixabay.com/photo/2016/10/09/14/00/vegetable-juices-1725835_640.jpg', '2023-07-12 12:09:44', '2023-07-12 12:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `comments_blog_id_foreign` (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `email`, `comment`, `created_at`, `updated_at`) VALUES
(30, 1, 'Md Tufik Hasan', 'tufikhasan05@gmail.com', 'nice', '2023-07-12 10:35:53', '2023-07-12 10:35:53'),
(31, 1, 'Shovon', 'shovonr06@gmail.com', 'Awesome blog', '2023-07-12 10:36:33', '2023-07-12 10:36:33'),
(32, 2, 'Liakat', 'liakat@gmail.com', 'Love this blog', '2023-07-12 10:37:09', '2023-07-12 10:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_07_11_232414_create_blogs_table', 1),
(10, '2023_07_12_114941_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
