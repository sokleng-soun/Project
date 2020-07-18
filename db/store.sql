-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2020 at 06:25 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobiles', 'mobiles', 1, '2020-07-16 00:57:03', '2020-07-16 00:57:03'),
(2, 'Audio', 'audio', 1, '2020-07-16 00:57:03', '2020-07-16 00:57:03'),
(3, 'Computer', 'computer', 1, '2020-07-16 00:57:03', '2020-07-16 00:57:03'),
(4, 'Household', 'household', 1, '2020-07-16 00:57:03', '2020-07-16 00:57:03'),
(5, 'Kitchen', 'kitchen', 1, '2020-07-16 00:57:03', '2020-07-16 00:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2020_07_13_165511_create_categories_table', 1),
(19, '2020_07_13_171110_create_products_table', 1),
(20, '2020_07_13_171145_create_product_images_table', 1),
(21, '2020_07_16_132945_create_user_details_table', 2),
(22, '2020_07_16_133252_create_orders_table', 3),
(23, '2020_07_16_133300_create_order_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double(10,2) NOT NULL,
  `discount` double(10,2) DEFAULT 0.00,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_id`, `amount`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TZDZSY6UITA', 2, 2182.00, 0.00, 'Pending', '2020-07-16 11:48:20', '2020-07-16 11:48:20'),
(2, 'GK6OI3LZ03W', 2, 4522.00, 0.00, 'Pending', '2020-07-16 11:49:21', '2020-07-16 11:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` double(10,2) NOT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `total_price` double(10,2) NOT NULL,
  `discounted_unit_price` double(10,2) NOT NULL,
  `discounted_total_price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `discount`, `total_price`, `discounted_unit_price`, `discounted_total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1104.00, 96.00, 1104.00, 1104.00, 1104.00, '2020-07-16 11:48:20', '2020-07-16 11:48:20'),
(2, 1, 7, 1, 922.00, 38.00, 922.00, 922.00, 922.00, '2020-07-16 11:48:20', '2020-07-16 11:48:20'),
(3, 1, 9, 2, 78.00, 4.00, 156.00, 78.00, 156.00, '2020-07-16 11:48:20', '2020-07-16 11:48:20'),
(4, 2, 5, 1, 1800.00, 0.00, 1800.00, 1800.00, 1800.00, '2020-07-16 11:49:21', '2020-07-16 11:49:21'),
(5, 2, 7, 1, 922.00, 38.00, 922.00, 922.00, 922.00, '2020-07-16 11:49:21', '2020-07-16 11:49:21'),
(6, 2, 10, 2, 900.00, 0.00, 1800.00, 900.00, 1800.00, '2020-07-16 11:49:21', '2020-07-16 11:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `regular_price` double DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_stock` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`) USING HASH,
  UNIQUE KEY `products_slug_unique` (`slug`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sku`, `name`, `slug`, `description`, `regular_price`, `discount`, `total_stock`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'Smart Phone', 'Smart Phone', 'smart-phone', '<p><span style=\"color: rgb(153, 153, 153); font-family: \"Open Sans\", sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 1200, 8, 10, 1, 0, '2020-07-16 04:57:47', '2020-07-16 11:33:58'),
(2, 2, 'Wireless Speaker', 'Wireless Speaker', 'wireless-speaker', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 450, NULL, 5, 1, 0, '2020-07-16 04:58:26', '2020-07-16 04:58:26'),
(3, 2, 'Music MP3 Player', 'Music MP3 Player', 'music-mp3-player', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 380, 5, 6, 1, 0, '2020-07-16 04:59:15', '2020-07-16 04:59:15'),
(4, 3, 'Asus Laptop', 'Asus Laptop', 'asus-laptop', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 2200, 10, 8, 1, 0, '2020-07-16 05:00:00', '2020-07-16 05:00:00'),
(5, 3, 'Multicolor Laptop', 'Multicolor Laptop', 'multicolor-laptop', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 1800, NULL, 4, 1, 0, '2020-07-16 05:00:29', '2020-07-16 05:00:29'),
(6, 4, 'Microwave Oven', 'Microwave Oven', 'microwave-oven', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 650, 3, 7, 1, 0, '2020-07-16 05:01:41', '2020-07-16 05:01:41'),
(7, 4, 'Vacuum Cleaner', 'Vacuum Cleaner', 'vacuum-cleaner', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 960, 4, 3, 1, 0, '2020-07-16 05:02:43', '2020-07-16 05:02:43'),
(8, 5, 'Coffee Maker', 'Coffee Maker', 'coffee-maker', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 220, 7, 2, 1, 0, '2020-07-16 05:03:20', '2020-07-16 05:03:20'),
(9, 5, 'Juicer Mixer', 'Juicer Mixer', 'juicer-mixer', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 80, 2, 3, 1, 0, '2020-07-16 05:03:49', '2020-07-16 05:03:49'),
(10, 1, 'Red Mobile', 'Red Mobile', 'red-mobile', '<p><span style=\"color: rgb(153, 153, 153); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</span><br></p>', 900, NULL, 5, 1, 0, '2020-07-16 05:05:19', '2020-07-16 05:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '20200716_1594897067395.jpg', 1, '2020-07-16 04:57:47', '2020-07-16 04:57:47'),
(2, 1, '20200716_1594897067316.jpg', 1, '2020-07-16 04:57:47', '2020-07-16 04:57:47'),
(3, 1, '20200716_1594897067238.jpg', 1, '2020-07-16 04:57:47', '2020-07-16 04:57:47'),
(4, 2, '20200716_1594897106191.jpg', 1, '2020-07-16 04:58:26', '2020-07-16 04:58:26'),
(5, 2, '20200716_1594897106605.jpg', 1, '2020-07-16 04:58:26', '2020-07-16 04:58:26'),
(6, 3, '20200716_1594897155961.jpg', 1, '2020-07-16 04:59:15', '2020-07-16 04:59:15'),
(7, 3, '20200716_1594897155803.jpg', 1, '2020-07-16 04:59:15', '2020-07-16 04:59:15'),
(8, 4, '20200716_1594897200775.jpg', 1, '2020-07-16 05:00:00', '2020-07-16 05:00:00'),
(9, 4, '20200716_1594897200376.jpg', 1, '2020-07-16 05:00:00', '2020-07-16 05:00:00'),
(10, 4, '20200716_1594897200959.jpg', 1, '2020-07-16 05:00:00', '2020-07-16 05:00:00'),
(11, 5, '20200716_1594897229961.jpg', 1, '2020-07-16 05:00:29', '2020-07-16 05:00:29'),
(12, 5, '20200716_159489722956.jpg', 1, '2020-07-16 05:00:29', '2020-07-16 05:00:29'),
(13, 5, '20200716_1594897229212.jpg', 1, '2020-07-16 05:00:29', '2020-07-16 05:00:29'),
(14, 6, '20200716_1594897301837.jpg', 1, '2020-07-16 05:01:41', '2020-07-16 05:01:41'),
(15, 7, '20200716_159489736320.jpg', 1, '2020-07-16 05:02:43', '2020-07-16 05:02:43'),
(16, 8, '20200716_1594897400458.jpg', 1, '2020-07-16 05:03:20', '2020-07-16 05:03:20'),
(17, 8, '20200716_1594897400495.jpg', 1, '2020-07-16 05:03:20', '2020-07-16 05:03:20'),
(18, 9, '20200716_1594897429833.jpg', 1, '2020-07-16 05:03:49', '2020-07-16 05:03:49'),
(19, 9, '20200716_1594897429381.jpg', 1, '2020-07-16 05:03:49', '2020-07-16 05:03:49'),
(20, 10, '20200716_1594897519813.jpg', 1, '2020-07-16 05:05:19', '2020-07-16 05:05:19'),
(21, 10, '20200716_1594897519346.jpg', 1, '2020-07-16 05:05:19', '2020-07-16 05:05:19'),
(22, 10, '20200716_1594897519182.jpg', 1, '2020-07-16 05:05:19', '2020-07-16 05:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Captain', 'admin@mail.com', NULL, '$2y$10$ZjORGEPcUJyiEvxT5D.ArOie0.rcgry7/n65/E7R4ni3oeCunGWey', 'admin', NULL, '2020-07-16 00:57:03', NULL),
(2, 'Ahmed khan', 'khan@mail.com', NULL, '$2y$10$T0tGYLq/Fw..zl161LlUz.0mfarpz8Ai0PNPsn1ULW7I9UAyCJ.0.', 'customer', NULL, '2020-07-16 11:19:11', '2020-07-16 11:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countrey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `address`, `zip_code`, `city`, `countrey`, `created_at`, `updated_at`) VALUES
(1, 2, '68765454', 'thana road, north badda', '1213', 'Dhaka', 'Bangladesh', '2020-07-16 11:19:11', '2020-07-16 11:19:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
