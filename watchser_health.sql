-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2019 at 02:39 PM
-- Server version: 5.7.27
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watchser_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'my Health', 'test@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2019-06-14 04:58:26', '2019-06-14 04:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `current_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyalty_points` int(11) DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `class_id`, `current_date`, `loyalty_points`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 11, '2019-06-25', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(32, 20, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `admin_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Felix Hickmans', 1, '2019-06-13 11:11:39', '2019-06-13 11:11:46', 0),
(2, 'Zena Prince', 1, '2019-06-18 10:10:13', '2019-06-18 10:10:13', 0),
(3, 'Shay Travis', 1, '2019-06-18 10:10:17', '2019-06-18 10:10:17', 0),
(4, 'Yvette Walker', 1, '2019-07-15 20:29:34', '2019-07-15 20:29:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loyaltyPoints` int(11) NOT NULL DEFAULT '0',
  `QRpassword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `img`, `time`, `duration`, `venue`, `description`, `credits`, `level`, `slot`, `status`, `state`, `category_id`, `program_id`, `is_delete`, `created_at`, `updated_at`, `loyaltyPoints`, `QRpassword`) VALUES
(1, 'first class', 'classes/HeVrL6ugyvcKOVCnuJ8MVDbJVPmu79ErhSsX1lYI.jpeg', '04:05', '2 hour', 'Qui nem', 'Quod enim earum aspe', 1, 'one', 'Perspiciatis', ' ', 2, 1, 2, 0, '2019-06-14 05:38:05', '2019-06-14 05:38:05', 0, ''),
(8, 'Brittany Leon', 'classes/cSpFaIlSVwLisjUpa7fsEJnhXiNvROe6wBJCYDuh.jpeg', '11:00', '45 mint', 'Consequatur Tempori', 'Molestias veritatis', 11, '3', 'Est cons', ' ', 1, 1, 3, 0, '2019-06-20 11:49:47', '2019-06-20 11:49:47', 0, ''),
(7, 'Audra Burnett', 'classes/gryBMlRcZkYRTNWg9lgiJedxrfHEPrOmyJrpwPtE.jpeg', '11:08', '5 hour', 'Sed officia exceptur', 'Anim ut quasi id vol', 11, 'second', 'Ut provident', ' ', 1, 3, 4, 0, '2019-06-18 10:12:42', '2019-06-18 10:12:42', 0, ''),
(9, 'Fritz Potter', 'classes/BzxFuIXZXaPB270QfZxnbpIBc0Adu2aDYYC35gUx.jpeg', '12:00', '1 hour', 'Est quia impedit nu', 'Sed rerum pariatur', 3, 'Laudantium', 'Nemo', ' ', 2, 2, 5, 0, '2019-06-23 07:23:21', '2019-06-23 07:23:21', 0, ''),
(10, 'Scarlet Dotson', 'classes/QWhcl5ZV4tiTL7c5b76vcD5oNQWfkUvxWwfUTui0.jpeg', '2:00', '30 mint', 'Et nisi adipisci com', 'Et sint explicabo E', 4, 'Deleniti', 'Sint', ' ', 2, 2, 6, 0, '2019-06-23 07:29:12', '2019-06-23 07:29:12', 0, ''),
(11, 'Idola Floyd', 'classes/1h83yclY8qJfhTpIChbYs4EeCEc93zuyh9kvH4Ui.jpeg', NULL, '45 mint', 'Eveniet at laborum', 'Vero harum nemo temp', 4, 'Pariatur', 'Con', ' ', 2, 2, 1, 0, '2019-06-23 12:18:13', '2019-06-23 12:18:13', 50, ''),
(12, 'New saeed\'s class', 'classes/4b6pR4ZFWn2DbVfHpmIm6gTTqk5PUh6CMHx8Ty2v.jpeg', NULL, '2 hours', 'new block', 'yoga class', 10, 'no', '1 2 3', ' ', 2, 2, 7, 0, '2019-06-27 22:17:33', '2019-06-27 22:17:33', 7, ''),
(13, 'Shaine Holden', 'classes/BEk35WAWzEMwdcw4FCsALPT3UYPwjVBzkTVHSLLv.jpeg', NULL, '1 hour', 'Autem fugiat quibus', 'Velit ut non proiden', NULL, '1', 'Sit recusandae', ' ', 2, 3, 5, 0, '2019-07-12 19:10:42', '2019-07-12 19:10:42', 50, '$2y$10$HOEq6uLYMc0Q6Vxbbs3toePPfJI/e4SCthGUIb6JFGdV8TkXjFxbC'),
(14, 'Mechelle Mitchell', 'classes/bLN4iEBDI3sgV94NIuSQ3GbC9dK7bL3qA9OJQOMy.jpeg', NULL, '2 hours', 'Sed aut saepe dolor', 'Excepturi natus erro', NULL, 'Temporibus', 'Ducimus culpa omni', ' ', 2, 2, 5, 0, '2019-07-20 11:36:25', '2019-07-20 11:36:25', 99, '$2y$10$gWTIvvGC4GB9LYCUL.Y3t.27apQI9DRR5ZulVBK4WC24/QdEBomwW');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `district_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Abvolution Wellness', 2, '2019-06-13 11:13:23', '2019-06-13 11:13:15', 0),
(2, 'NTU north hill Gym', 5, '2019-06-15 11:58:26', '2019-06-15 11:58:26', 0),
(3, 'Kelsie Winters', 2, '2019-06-18 10:10:04', '2019-06-18 10:10:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`id`, `address`, `phone`, `email`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Est consequatur Qu', '+1 (172) 599-714', 'rukur@mailinator.com', 1, 1, NULL, NULL),
(2, '14 Ang Mo Kio Industiral park 2 #03-04 Singapore 750419', '+65 69041253', 'enquiry@ab-volution.com', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phone`, `message`, `state`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Nemo', 'usethi759@gmail.com', '03456855144', 'Nemo explicabo Cons', 2, NULL, NULL, 1),
(2, 'Demetria Washington', 'garuzapajo@mailinator.net', '+1 (361) 101-1661', 'Consectetur ipsa n', 1, NULL, NULL, 1),
(3, 'McKenzie Nielsen', 'demoproject005@gmail.com', '+1 (475) 551-9914', 'Eius asperiores odio', 2, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `product` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `price`, `state`, `admin_id`, `status`, `product`, `points`, `created_at`, `updated_at`) VALUES
(1, 'Illo et occaecat com', '345132', 948, 1, 1, 1, 0, 120, '2019-06-14 11:10:03', '2019-06-14 11:10:03'),
(2, 'Testing new coupon', '9090', 30, 1, 1, 0, 0, 60, '2019-08-11 14:38:20', '2019-08-11 14:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'North', 1, 0, '2019-06-14 10:55:05', '2019-06-14 10:55:05'),
(2, 'Rhiannon Mitchell', 1, 1, '2019-06-14 10:55:05', '2019-06-14 10:55:05'),
(3, 'East', 1, 0, '2019-08-31 17:13:46', '2019-08-31 17:13:46'),
(4, 'South', 1, 0, '2019-08-31 17:13:52', '2019-08-31 17:13:52'),
(5, 'West', 1, 0, '2019-08-31 17:13:56', '2019-08-31 17:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `questions` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `questions`, `answer`, `state`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Officiis quia dolore', 'Hic dolore voluptate', 1, 1, 0, '2019-06-14 11:13:30', '2019-06-14 11:13:30'),
(2, 'Unde sunt officia ni', 'Eaque rerum eum ulla', 1, 1, 1, '2019-06-14 12:11:45', '2019-06-14 12:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redemption_points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_04_24_100300_create_admins_table', 1),
(23, '2019_04_24_100350_create_districts_table', 1),
(24, '2019_04_24_100375_create_companies_table', 1),
(25, '2019_04_24_100400_create_users_table', 1),
(26, '2019_04_24_100438_create_faqs_table', 1),
(27, '2019_04_24_100514_create_coupons_table', 1),
(28, '2019_04_24_100545_create_vouchers_table', 1),
(29, '2019_04_24_100734_create_products_table', 1),
(30, '2019_04_24_100854_create_categories_table', 1),
(31, '2019_04_24_100860_create_program_table', 1),
(32, '2019_04_24_100865_create_classes_table', 1),
(33, '2019_04_24_100945_create_news_table', 1),
(34, '2019_04_24_100952_create_contactus_table', 1),
(35, '2019_04_24_101008_create_contactinfo_table', 1),
(36, '2019_06_02_084106_create_cart_table', 1),
(37, '2019_06_02_084156_create_shipping_table', 1),
(38, '2019_06_02_084165_create_table_orders', 1),
(39, '2019_06_02_095248_create_attendance_table', 1),
(40, '2019_06_02_095317_create_gifts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `type`, `title`, `img`, `description`, `company_id`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'specific', 'New Classes!', 'news/buBpqGCe7U0sc1h5Mf9nMohTyJBci5AKXCDeqg1y.jpeg', 'welcome to the new classes', 1, 1, 0, '2019-06-14 10:16:55', '2019-06-14 10:17:01'),
(2, 'specific', 'Sit aut omnis animi', 'news/7CT5AEm57KcgRrvF3YEQrjTwlsmTmVHs0sl65bJs.jpeg', 'In ab inventore cons', 1, 1, 0, '2019-06-14 10:16:55', '2019-06-14 10:17:01'),
(3, 'specific', 'Irure est ratione te', 'news/iDayYS2E6ljrsYgX9pdcJw9FBEIcd2xLtnw3BZpx.jpeg', 'Ut praesentium quia', 1, 1, 1, '2019-06-14 10:16:55', '2019-06-14 10:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `shipping_charges` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `cc_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0',
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_payment` int(11) NOT NULL DEFAULT '0',
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `type`, `sub_total`, `shipping_charges`, `discount`, `total`, `user_id`, `delivery_id`, `cart_id`, `status`, `created_at`, `updated_at`, `name`, `contact`, `address`, `cc_name`, `is_read`, `product_id`, `is_payment`, `product_qty`) VALUES
(7, 'product', 6393, 0, 0, 6393, 1, NULL, 18, 'Accept', '2019-06-19 10:07:44', NULL, 'Norman Chandler', 'Nulla sed doloremque', 'Dolores laboriosam', 'Melinda Owen', 1, NULL, 0, NULL),
(4, 'product', 10655, 0, 0, 10655, 1, NULL, 14, 'Reject', '2019-06-19 09:54:28', NULL, 'Roth Brady', 'Perspiciatis eum qu', 'Sint sit in et sol', 'Zia Myers', 1, NULL, 0, NULL),
(8, 'product', 10655, 0, 0, 10655, 1, NULL, 19, 'Pending', '2019-06-19 10:20:48', NULL, 'Martin Bird', 'Minim delectus illu', 'Sed explicabo Digni', 'Tamekah Hurley', 1, NULL, 0, NULL),
(9, 'product', 1717586, 0, 0, 1717586, 1, NULL, 21, 'Pending', '2019-06-19 11:50:20', NULL, 'Odysseus Frye', 'Est ut sint debitis', 'Cupiditate proident', 'Kirsten Kent', 1, NULL, 0, NULL),
(11, 'point', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Pending', '2019-06-25 07:57:33', NULL, NULL, NULL, NULL, NULL, 1, '3', 0, NULL),
(12, 'product', 1084, 0, 0, 1084, 1, NULL, 23, 'Pending', '2019-06-25 11:26:52', NULL, 'Heather Gross', 'Est aut eligendi eli', 'Nihil esse nulla lo', 'Eagan Vang', 1, NULL, 1, NULL),
(13, 'product', 3215, 0, 0, 3215, 1, NULL, 29, 'Pending', '2019-07-08 20:40:34', NULL, 'Saeed Ahmad', '03024267970', 'Model town link road Lahore, Pakistan', 'Saeed Ahmad', 1, NULL, 1, NULL),
(14, 'product', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'started', '2019-07-30 11:38:13', NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL),
(15, 'point', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Pending', '2019-08-11 14:31:07', NULL, NULL, NULL, NULL, NULL, 1, '3', 0, NULL),
(16, 'product', 2131, 0, 0, 2131, 1, NULL, 30, 'Pending', '2019-08-11 15:03:13', NULL, 'Saeed Ahmad', '03024267970', 'Model town link road Lahore, Pakistan', 'Saeed Ahmad', 1, NULL, 0, NULL),
(17, 'point', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Pending', '2019-08-26 18:01:21', NULL, NULL, NULL, NULL, NULL, 1, '3', 0, NULL),
(18, 'product', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'started', '2019-08-26 18:11:42', NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL),
(19, 'point', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Pending', '2019-08-31 11:23:09', NULL, NULL, NULL, NULL, NULL, 1, '3', 0, NULL),
(20, 'product', NULL, NULL, NULL, NULL, 8, NULL, NULL, 'started', '2019-08-31 17:00:24', NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pointproducts`
--

CREATE TABLE `pointproducts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `points` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`, `specification`, `type`, `state`, `points`, `admin_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Carl Mill', 'products/XxMvjUJMoPZMk1n2zi8z5QDia5PDBlk3BKIZEkcP.jpeg', 'sdassda', '2131', 'asd', '1', 2, NULL, 1, '2019-06-13 11:33:52', '2019-06-13 11:33:44', 0),
(3, 'Felicia Whitaker', 'products/37KkZPGAz1q6tk5Cyz94Wpp5DprkrNzA135DvRp3.jpeg', 'Irure soluta dolore', '522', 'Corrupti fugit eos', '0', 2, '200', 1, '2019-06-24 11:19:49', '2019-06-24 11:19:49', 0),
(4, 'Seth Burke', 'products/qtyixVHBokvuvMZMzEFLZz9EN9kIHjaGBLYsuyj9.jpeg', 'Non quo doloribus es', '542', 'Quis ut ipsum ea eo', '1', 2, NULL, 1, '2019-06-25 09:24:49', '2019-06-25 09:24:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `company_id`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amber Foreman', 1, 1, 1, '2019-06-15 11:07:32', '2019-06-15 11:07:32'),
(2, 'programme', 1, 1, 1, '2019-06-15 11:07:32', '2019-06-15 11:07:32'),
(3, 'Chelsea Morrow', 2, 1, 0, '2019-06-15 13:17:30', '2019-06-15 13:17:30'),
(4, 'Magee Wall', 3, 1, 0, '2019-06-18 10:10:27', '2019-06-18 10:10:27'),
(5, 'Linus Rowland', 1, 1, 0, '2019-06-18 10:10:30', '2019-06-18 10:10:30'),
(6, 'Shannon Crane', 3, 1, 0, '2019-06-18 10:10:33', '2019-06-18 10:10:33'),
(7, 'xyz', 2, 1, 0, '2019-06-27 22:04:34', '2019-06-27 22:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_classes`
--

CREATE TABLE `reserve_classes` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserve_classes`
--

INSERT INTO `reserve_classes` (`id`, `class_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 7, 1, '2019-06-20 12:49:02', '2019-06-20 12:49:02'),
(3, 1, 1, '2019-06-22 21:18:43', '2019-06-22 21:18:43'),
(4, 10, 1, '2019-06-23 08:47:44', '2019-06-23 08:47:44'),
(7, 9, 1, '2019-07-10 19:12:17', '2019-07-10 19:12:17'),
(8, 13, 1, '2019-07-12 20:12:10', '2019-07-12 20:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `class_id`, `date`, `time`) VALUES
(4, 11, '2019-07-10', '09:00:00'),
(5, 11, '2019-06-25', '10:00:00'),
(6, 10, '2019-07-12', '08:00:00'),
(7, 10, '2019-06-27', '09:00:00'),
(8, 13, '2019-07-13', '10:00:00'),
(9, 13, '2019-07-14', '10:00:00'),
(12, 14, '2019-07-19', '05:51:00'),
(13, 14, '2019-07-20', '17:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `salutation` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `workpermit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonestatus` tinyint(1) DEFAULT NULL,
  `emailstatus` tinyint(1) DEFAULT NULL,
  `nam` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IC` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat` date DEFAULT NULL,
  `q1` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q2` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q3` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q4` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q5` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q6` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q7` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q8` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q9` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `otp_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QRpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `QRimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `loyaltyPoints` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `salutation`, `name`, `email`, `company_id`, `workpermit`, `password`, `img`, `phone`, `phonestatus`, `emailstatus`, `nam`, `IC`, `signature`, `dat`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `created_at`, `updated_at`, `otp_code`, `QRpassword`, `QRimg`, `loyaltyPoints`) VALUES
(1, NULL, 'Barry Dickerson', 'demoproject005@gmail.com', 1, 'pr', 'e10adc3949ba59abbe56e057f20f883e', NULL, '03456254877', NULL, NULL, 'Reiciendis minim dol', 'Quas culpa numquam c', 'Quo ut ab Nam cumque', '2018-07-05', '1', '0', '0', '1', '1', '0', '1', '0', '1', '2019-07-11 18:43:15', '2019-07-11 18:43:15', '', '$2y$10$Mb1DrdQN68LQStOcGe/u8eHbDnFusQXk5I6rMSfIJibl20VZXobhq', '4839607.png', 50),
(2, NULL, 'Ashely Gilmore', 'bopyfus@mailinator.net', 2, 'singaporean', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0345614455', NULL, NULL, 'Aut fugiat aute in l', 'Reprehenderit volup', 'Ipsam quasi ratione', '1997-05-14', '1', '1', '1', '1', '0', '0', '0', '0', '1', '2019-07-11 18:43:15', '2019-07-11 18:43:15', NULL, '$2y$10$A0qrmMBc4IdZfbnL1BbJJeUqy184VSqKsE3ad.TpCWzJ46s54RcJS', '1653972.png', 50),
(3, NULL, 'Test', 'test@gmail.com', 1, 'nationality', 'ae2b1fca515949e5d54fb22b8ed95575', NULL, '3041280395', NULL, NULL, 'lkf', 'sdlk', 'sdgfdsg', '2019-07-03', '1', '1', '0', '0', '1', '0', '1', '0', '1', '2019-07-11 18:43:15', '2019-07-11 18:43:15', NULL, '', '', 50),
(4, NULL, 'Sara Gamble', 'lazevype@mailinator.net', 2, 'pr', 'e10adc3949ba59abbe56e057f20f883e', NULL, '03455262732', NULL, NULL, 'Eum dolor et nisi im', 'Minima voluptate sed', 'Ea nihil velit dolor', '2006-07-13', '1', '1', '1', '0', '1', '0', '0', '0', '1', '2019-07-11 18:43:15', '2019-07-11 18:43:15', NULL, '', '', 50),
(5, NULL, 'Zahir Ellis', 'kicityjyt@mailinator.net', 2, 'pr', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0312312312312', NULL, NULL, 'Eligendi ut sint qui', 'Distinctio Et odio', 'Animi eos ea qui er', '2014-10-10', '0', '1', '1', '1', '1', '0', '0', '0', '0', '2019-07-11 18:43:15', '2019-07-11 18:43:15', NULL, '$2y$10$SklL1Xf2XTIxCu37qhLBy.2vVwCGQUg04tngimjDrHMcaskF6oowC', '8818941.png', 50),
(6, NULL, 'azhar', 'azhar@gmail.com', 2, 'workpermit', 'e10adc3949ba59abbe56e057f20f883e', NULL, '03024267657', NULL, NULL, 'azhar', 'djkjdk', 'df', '1201-10-10', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2019-08-05 14:48:30', '2019-08-05 14:48:30', NULL, '', '', 50),
(7, NULL, 'ksdjjhfksdhgk', 'dsfds@g.com', 2, 'singaporean', 'c33367701511b4f6020ec61ded352059', NULL, '5646498494', NULL, NULL, 'ksdhhgkjhdflghldfhgli', 'oihsddgoidfi', 'ipjidfgoidjig', '2019-08-15', '1', '0', '1', '0', '1', '0', '1', '0', '1', '2019-08-31 12:08:33', '2019-08-31 12:08:33', NULL, '', '', 50),
(8, NULL, 'Gerald Lim', 'Geraldlim@ab-volution.com', 1, 'workpermit', '57ba172a6be125cca2f449826f9980ca', NULL, '97305803', NULL, NULL, 'gerald lim', 's1234567A', 'geraldlim', '2019-09-01', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2019-08-31 16:59:52', '2019-08-31 16:59:52', NULL, '', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'classes/BzxFuIXZXaPB270QfZxnbpIBc0Adu2aDYYC35gUx.jpeg'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `title`, `description`, `code`, `state`, `admin_id`, `status`, `points`, `created_at`, `updated_at`, `img`) VALUES
(1, 'Eligendi ab sed impe', 'Veniam in earum aut', '1531322', 1, 1, 1, 50, '2019-06-14 11:14:22', '2019-06-14 11:14:22', 'classes/BzxFuIXZXaPB270QfZxnbpIBc0Adu2aDYYC35gUx.jpeg'),
(2, 'Get 50% of', 'Get of on cafe Jade by reedem', '112233', 1, 1, 0, 100, '2019-08-11 14:37:17', '2019-08-11 14:37:17', 'classes/BzxFuIXZXaPB270QfZxnbpIBc0Adu2aDYYC35gUx.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_user_id_foreign` (`user_id`),
  ADD KEY `attendance_class_id_foreign` (`class_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_order_id_foreign` (`order_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_category_id_foreign` (`category_id`),
  ADD KEY `classes_program_id_foreign` (`program_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_district_id_foreign` (`district_id`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactinfo_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_company_id_foreign` (`company_id`),
  ADD KEY `news_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`),
  ADD KEY `orders_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pointproducts`
--
ALTER TABLE `pointproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_company_id_foreign` (`company_id`),
  ADD KEY `programs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `reserve_classes`
--
ALTER TABLE `reserve_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_company_id_foreign` (`company_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vouchers_admin_id_foreign` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pointproducts`
--
ALTER TABLE `pointproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reserve_classes`
--
ALTER TABLE `reserve_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
