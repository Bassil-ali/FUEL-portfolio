-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 12:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `admin_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `status`, `admin_id`, `deleted_at`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'name', 'super_admin@app.com', NULL, NULL, '$2y$10$6J8FRcfn3JcAhtroYxUdY.MUboCTAk0SKHamHR8VAiqojG7.rZ5qm', 0, NULL, NULL, '2023-04-15 21:21:12', '2023-04-15 21:21:12', 'S4eaLJ1BxwsRduRt1mvQLfWa9LvS6tUAdoe4uU98uwYk8bFbe5rvkYeFY9JD'),
(3, 'aa', 'aa@gmail.com', 'admins/VwtMslIwsKBBJg2rTSGASy6utG2UzfFrluQGP7Tr.png', NULL, '$2y$10$lt/RIX7Yq.Z1e0MwzCI1YuflkyIXGN0Y.zY9Zzulje0UD3fgScQQC', 0, NULL, NULL, '2023-04-17 21:31:26', '2023-04-17 21:31:26', 'WDyeIHGpiZ9R8JIi6Nd9qZKd9qXPOTgtBXT3vZ6gk3vvMB0zG1BPrvI9lBbL');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` enum('RTL','LTR') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `default`, `code`, `dir`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Arabic', 1, 'ar', 'RTL', 0, NULL, NULL, '2023-04-15 22:56:19'),
(2, 'English', 0, 'en', 'LTR', 0, NULL, NULL, '2023-04-15 22:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_02_151355_create_admins_table', 1),
(7, '2023_04_04_222051_create_languages_table', 1),
(8, '2023_04_12_213231_create_permission_tables', 1),
(9, '2023_04_13_205301_create_settings_table', 1),
(10, '2023_04_13_213826_create_sliders_table', 1),
(11, '2023_04_15_021716_create_partners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `description`, `image`, `status`, `admin_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\":\"AFPI\",\"en\":\"AFPI\"}', '{\"ar\":\"\\u0647\\u064a \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0631\\u0627\\u0626\\u062f\\u0629 \\u0641\\u064a \\u0645\\u062c\\u0627\\u0644 \\u0635\\u062f\\u0627\\u0645\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0648\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0627\\u0644\\u0647\\u064a\\u0627\\u0643\\u0644 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a\\u0629 \\u0645\\u0639 \\u062e\\u0628\\u0631\\u0629 \\u062a\\u0641\\u0648\\u0642 \\u0627\\u0644\\u0640 28 \\u0639\\u0627\\u0645\\u0627\\u064b \\u0630\\u0627\\u062a \\u0642\\u0627\\u0639\\u062f\\u0629 \\u0639\\u0645\\u0644\\u0627\\u0621 \\u0648\\u0627\\u0633\\u0639\\u0629 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0627\\u064b\\u060c \\u062a\\u0627\\u064a\\u0644\\u0646\\u062f\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0646\\u0634\\u0623. \\u0630\\u0627\\u062a \\u0645\\u0639\\u0627\\u064a\\u064a\\u0631 \\u062a\\u0635\\u0646\\u064a\\u0639 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0629\\u061b \\u0645\\u062e\\u0635\\u0635\\u0629 \\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\r\\n\\u0627\\u0644\\u0646\\u0642\\u0644 \\u0648\\u0627\\u0644\\u0634\\u0627\\u062d\\u0646\\u0627\\u062a \\u0648\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0631\\u0643\\u0627\\u0628 \\u0627\\u0644\\u064a\\u0627\\u0628\\u0627\\u0646\\u064a\\u0629\\u060c \\u0648\\u062a\\u063a\\u0637\\u064a \\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\r\\n \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629 \\u062a\\u0648\\u064a\\u0648\\u062a\\u0627 \\u0646\\u064a\\u0633\\u0627\\u0646 \\u0627\\u064a\\u0633\\u0648\\u0632\\u0648 \\u0645\\u0627\\u0632\\u062f\\u0627 \\u0645\\u064a\\u062a\\u0633\\u0648\\u0628\\u064a\\u0634\\u064a\\u060c \\u0647\\u064a\\u0646\\u0648\\u060c \\r\\n\\u0647\\u0648\\u0646\\u062f\\u0627\\u060c \\u0633\\u0648\\u0632\\u0648\\u0643\\u064a \\u0633\\u0645\\u0627\\u0631\\u062a \\u0633\\u0627\\u0645\\u0633\\u0648\\u0646\\u062c\\u060c \\u062f\\u0627\\u064a\\u0648 \\u0647\\u064a\\u0648\\u0646\\u062f\\u0627\\u064a \\u0648\\u0643\\u064a\\u0627.\",\"en\":\"It is one of the leading companies in the field of car bumpers and design of exterior structures, with an experience of more than 28 years, with a wide international customer base, of Thai origin. with international manufacturing standards; dedicated to cars\\r\\nJapanese transport, trucks and passenger cars, all brands covered\\r\\n Main business: Toyota, Nissan, Isuzu, Mazda, Mitsubishi, Hino,\\r\\nHonda, Suzuki Smart Samsung, Daewoo Hyundai and Kia.\"}', 'partners/8HnRepNTN7WdP8V5tmh8u1AxW21uh3PEmi76AfYk.png', 0, 1, NULL, '2023-04-17 01:13:25', '2023-04-17 11:19:10'),
(3, '{\"ar\":\"DEPO\",\"en\":\"DEPO\"}', '{\"ar\":\"\\u0647\\u064a \\u0645\\u0646 \\u0623\\u0641\\u0636\\u0644 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u062a\\u0627\\u064a\\u0648\\u0627\\u0646\\u064a\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645 \\u0644\\u062a\\u0635\\u0646\\u064a\\u0639 \\u0634\\u0645\\u0639\\u0627\\u062a \\u0648\\u0645\\u0635\\u0627\\u0628\\u064a\\u062d \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a\\u060c \\u062a\\u0633\\u0639\\u0649 \\u0644\\u0644\\u062d\\u0641\\u0627\\u0638 \\u0639\\u0644\\u0649 \\u0645\\u0643\\u0627\\u0646\\u062a\\u0647\\u0627 \\u0643\\u0634\\u0631\\u0643\\u0629 \\u0631\\u0627\\u0626\\u062f\\u0629 \\u0641\\u064a \\u0645\\u062c\\u0627\\u0644 \\u0627\\u0644\\u062a\\u0635\\u0646\\u064a\\u0639 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u062a\\u0648\\u0641\\u064a\\u0631 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0645\\u0648\\u062b\\u0648\\u0642\\u0629 \\u0648\\u0628\\u0623\\u0633\\u0639\\u0627\\u0631 \\u0645\\u0639\\u0642\\u0648\\u0644\\u0629 \\u0648\\u0645\\u0628\\u062a\\u0643\\u0631\\u0629 \\u0644\\u0639\\u0645\\u0644\\u0627\\u0626\\u0647\\u0627 \\u0628\\u0627\\u0633\\u062a\\u0645\\u0631\\u0627\\u0631. \\u0634\\u0639\\u0627\\u0631\\u0647\\u0627 \\u0645\\u0646\\u0630 \\u0627\\u0644\\u062a\\u0623\\u0633\\u064a\\u0633\",\"en\":\"It is one of the world\'s best Taiwanese car spark plugs and bulbs manufacturers, striving to maintain its position as a leading manufacturer by constantly providing reliable, affordable and innovative products to its customers. Its motto since inception\"}', 'partners/motlRbfhamxeEeScc49Jec7xHRkqnP7msuNz1TeT.png', 0, 1, NULL, '2023-04-17 01:15:09', '2023-04-17 11:14:53'),
(4, '{\"ar\":\"YES-Q\",\"en\":\"YES-Q\"}', '{\"ar\":\"\\u0634\\u0631\\u0643\\u0629 \\u0645\\u0627\\u0644\\u064a\\u0632\\u064a\\u0629 \\u062a\\u0623\\u0633\\u0633\\u062a \\u0639\\u0627\\u0645 1990\\u0645 \\u0628\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0645\\u062a\\u0639\\u0627\\u0631\\u0641 \\u0639\\u0644\\u064a\\u0647 Everspark \\u0648\\u0647\\u064a \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0631\\u0627\\u0626\\u062f\\u0629 \\u0641\\u064a \\u0645\\u062c\\u0627\\u0644 \\u0635\\u0646\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0645\\u0648\\u0644\\u062f\\u0627\\u062a \\u00ab\\u0642\\u0637\\u0639 \\u0627\\u0644\\u0633\\u0644\\u0641 \\u0648\\u0627\\u0644\\u062f\\u064a\\u0646\\u0645\\u0648\\u00bb\\u060c \\u0627\\u0644\\u0645\\u0628\\u062f\\u0644\\u0627\\u062a\\u060c \\u0627\\u0644\\u0636\\u0648\\u0627\\u063a\\u0637 \\u0648\\u0645\\u0643\\u064a\\u0641\\u0627\\u062a \\u0627\\u0644\\u0647\\u0648\\u0627\\u0621. \\u0645\\u0643\\u0631\\u0633\\u0629 \\u0639\\u0645\\u0644\\u0647\\u0627 \\u0644\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0623\\u0641\\u0636\\u0644 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0630\\u0627\\u062a \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\u0627\\u0644\\u0639\\u0627\\u0644\\u064a\\u0629 \\u0648\\u062a\\u062c\\u0631\\u0628\\u0629 \\u062e\\u062f\\u0645\\u0629 \\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621 \\r\\n \\u0628\\u0634\\u0643\\u0644 \\u0641\\u0631\\u064a\\u062f \\u0645\\u0646 \\u0646\\u0648\\u0639\\u0647. \\u0639\\u0645\\u0644\\u064a\\u0629 \\u0627\\u0644\\u062a\\u0635\\u0646\\u064a\\u0639 \\u0644\\u062f\\u064a\\u0647\\u0627 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642 \\u0645\\u0639 . : 2008: * ISO\",\"en\":\"A Malaysian company established in 1990 under the known name Everspark, and it is one of the leading companies in the field of manufacturing generators, generators, alternators, compressors, and air conditioners. Dedicated to providing the best quality products and customer service experience\\r\\n Uniquely. Its manufacturing process is compatible with . : 2008: * ISO\"}', 'partners/R3zdEORapmirL43BCScqz7M8AF55ABo3cRcLUYFY.png', 0, 1, NULL, '2023-04-17 01:16:07', '2023-04-17 11:16:32'),
(5, '{\"ar\":\"Xwagen\",\"en\":\"Xwagen\"}', '{\"ar\":\"\\u0647\\u064a \\u0623\\u062d\\u062f \\u0627\\u0644\\u0645\\u0635\\u0627\\u0646\\u0639 \\u0627\\u0644\\u0635\\u064a\\u0646\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062a\\u0639\\u0627\\u0631\\u0641 \\u0639\\u0644\\u064a\\u0647\\u0627 \\u0641\\u064a \\u0635\\u0646\\u0627\\u0639\\u0629 \\u0623\\u062c\\u0632\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0635\\u062f\\u0627\\u0645\\u0627\\u062a \\u0627\\u0644\\u0623\\u0645\\u0627\\u0645\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0645\\u0635\\u0627\\u0628\\u064a\\u062d \\u0628\\u062c\\u0648\\u062f\\u0629 \\u0648\\u062f\\u0642\\u0629 \\u0639\\u0627\\u0644\\u064a\\u0629 \\u0645\\u0642\\u0631\\u0647\\u0627 \\r\\n\\u0634\\u0646\\u063a\\u0647\\u0627\\u064a \\u0627\\u0644\\u0635\\u064a\\u0646\\u064a\\u0629.\",\"en\":\"It is one of the well-known Chinese factories in the manufacture of exterior car parts, including front bumpers and headlights, with high quality and precision\\r\\n Shanghai Chinese.\"}', 'partners/O9wN6IFAJ98Ol9Y55utgVTeywQX3oiD1PabWg0dj.png', 0, 1, NULL, '2023-04-17 01:17:38', '2023-04-17 11:16:24'),
(6, '{\"ar\":\"Rmy\",\"en\":\"Rmy\"}', '{\"ar\":\"\\u0647\\u064a \\u0639\\u0628\\u0627\\u0631\\u0629 \\u0639\\u0646 \\u0634\\u0631\\u0643\\u0629 \\u064a\\u0627\\u0628\\u0627\\u0646\\u064a\\u0629 \\u00abTMY\\u00bb \\u062a\\u0623\\u0633\\u0633\\u062a \\u0639\\u0627\\u0645 1947\\u0645 \\u0645\\u062a\\u062e\\u0635\\u0635\\u0629 \\u0628\\u062a\\u0648\\u0641\\u064a\\u0631 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u063a\\u064a\\u0627\\u0631 \\u0644\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0643\\u0641\\u0644\\u0627\\u062a\\u0631 \\u0627\\u0644\\u0647\\u0648\\u0627\\u0621\\u060c \\u0627\\u0644\\u0632\\u064a\\u062a\\u060c \\u0627\\u0644\\u0648\\u0642\\u0648\\u062f \\u0627\\u0644\\u062a\\u0643\\u064a\\u064a\\u0641, \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0623\\u0646\\u0638\\u0645\\u0629 \\u0627\\u0644\\u0641\\u0631\\u0627\\u0645\\u0644\\u060c \\u0627\\u0644\\u0645\\u062d\\u0631\\u0643\\u0627\\u062a \\u0648\\u063a\\u064a\\u0631\\u0647\\u0627 \\u0648\\u0647\\u064a \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0645\\u0635\\u062f\\u0631\\u0629 \\u0644\\u0643\\u0644 \\u0623\\u0646\\u062d\\u0627\\u0621 \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645 \\u0648\\u062a\\u0643\\u0645\\u0646 \\u0642\\u0648\\u062a\\u0647\\u0627 \\u0641\\u064a \\u0639\\u062f\\u062f \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u062a\\u064a \\u062a\\u0646\\u062a\\u062c\\u0647\\u0627\\u060c \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\r\\n\\u062a\\u0648\\u0641\\u064a\\u0631\\u0647\\u0627 \\u062e\\u062f\\u0645\\u0629 \\u0627\\u0644\\u0634\\u062d\\u0646 \\u0625\\u0644\\u0649 \\u0645\\u062e\\u062a\\u0644\\u0641 \\u0627\\u0644\\u062f\\u0648\\u0644 \\u0648\\u0644\\u0647\\u0627 \\u0641\\u0631\\u0648\\u0639 \\u0645\\u062a\\u0639\\u062f\\u062f\\u0629 \\u062d\\u0648\\u0644 \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645 \\u00ab\\u0633\\u0646\\u063a\\u0627\\u0641\\u0648\\u0631\\u0629 \\u0634\\u0646\\u063a\\u0647\\u0627\\u064a\\u060c \\u0625\\u0646\\u062f\\u0648\\u0646\\u064a\\u0633\\u064a\\u0627\\u060c \\u062f\\u0628\\u064a\\u060c \\u0623\\u0644\\u0645\\u0627\\u0646\\u064a\\u0627 \\u0648\\u0631\\u0648\\u0633\\u064a\\u0627\\u00bb.\",\"en\":\"It is a Japanese company \\u00abTMY\\u00bb founded in 1947 AD specialized in providing spare parts for cars such as air filters, oil, air conditioning fuel, spare parts for brake systems, engines and others. It is one of the companies that export all over the world and its strength lies in the number of products it produces, in addition to\\r\\nIt provides shipping services to various countries and has multiple branches around the world (Singapore, Shanghai, Indonesia, Dubai, Germany and Russia).\"}', 'partners/58dPr6tiVxG26WSC2JzwC4PxK1uBPVLQs0Xm765W.png', 0, 1, NULL, '2023-04-17 01:18:27', '2023-04-17 11:14:51'),
(7, '{\"ar\":\"Paco\",\"en\":\"Paco\"}', '{\"ar\":\"\\u0647\\u064a \\u0634\\u0631\\u0643\\u0629 \\u062a\\u0627\\u064a\\u0644\\u0627\\u0646\\u062f\\u064a\\u0629 \\u0631\\u0627\\u0626\\u062f\\u0629 \\u0641\\u064a \\u062a\\u0635\\u0646\\u064a\\u0639 \\u0645\\u0643\\u062b\\u0641\\u0627\\u062a \\u062a\\u0643\\u064a\\u064a\\u0641 \\u0647\\u0648\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u00ab\\u0642\\u0637\\u0639 \\u0627\\u0644\\u062a\\u0628\\u0631\\u064a\\u062f\\u00bb. \\u0645\\u062a\\u062e\\u0635\\u0635\\u0629 \\u0641\\u064a \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0643\\u062b\\u064a\\u0631\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0623\\u0646\\u0627\\u0628\\u064a\\u0628 \\u0648\\u0645\\u0643\\u062b\\u0641\\u0627\\u062a \\u0627\\u0644\\u062a\\u0643\\u064a\\u064a\\u0641 \\u0627\\u0644\\u0628\\u0627\\u0631\\u062f \\u0648\\u0627\\u0644\\u0633\\u0627\\u062e\\u0646 \\u0630\\u0627\\u062a \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\u0648\\u0627\\u0644\\u0623\\u062f\\u0627\\u0621 \\u0627\\u0644\\u0639\\u0627\\u0644\\u064a \\u2013 \\u0645\\u0646 \\u0623\\u0641\\u0636\\u0644 \\r\\n\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u062a\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u064a\\u0629.\",\"en\":\"It is a leading Thai company in the manufacture of automotive air conditioning condensers \\u00abrefrigeration parts\\u00bb. Specializing in many types of tubes and condensers for cold and hot air conditioning of high quality and performance \\u2013 one of the best\\r\\nglobal refrigeration companies.\"}', 'partners/7ld4PTMFSTwl5urRMTJF37KOgCJreBX2ytFnFMVY.png', 0, 1, NULL, '2023-04-17 01:19:16', '2023-04-17 11:16:23'),
(8, '{\"ar\":\"\\u0645\\u0635\\u0627\\u0646\\u0639 \\u0647\\u064a\\u0627\\u0643\\u0644 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u062a\\u0627\\u06cc\\u0648\\u0627\\u0646\",\"en\":\"Taiwan auto body manufacturers\"}', '{\"ar\":\"\\u062a\\u0639\\u062f \\u062a\\u0627\\u064a\\u0648\\u0646 \\u0645\\u0646 \\u0627\\u0644\\u0628\\u0644\\u062f\\u0627\\u0646 \\u0627\\u0644\\u0645\\u0645\\u064a\\u0632\\u0629 \\u0641\\u064a \\u0635\\u0646\\u0627\\u0639\\u0629 \\u0647\\u064a\\u0627\\u0643\\u0644 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u062d\\u064a\\u062b \\u062a\\u062d\\u062a\\u0648\\u064a \\u0639\\u0644\\u0649 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0643\\u0628\\u064a\\u0631\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0635\\u0627\\u0646\\u0639 \\u0627\\u0644\\u0645\\u062a\\u062e\\u0635\\u0635\\u0629 \\u0641\\u064a \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u062c\\u0627\\u0644 \\u0648\\u0627\\u0644\\u062a\\u064a \\u0644\\u062f\\u064a\\u0647\\u0627 \\u0627\\u0639\\u062a\\u0645\\u0627\\u062f\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u0638\\u0645\\u0627\\u062a \\u0627\\u0644\\u062f\\u0648\\u0644\\u064a\\u0629\\u060c \\u0645\\u062b\\u0644: CAPA \\u060c Thatcham \\u0648\\u0628\\u0646\\u0627\\u0621\\u064b \\u0639\\u0644\\u0649 \\u0641\\u0644\\u0633\\u0641\\u062a\\u0647\\u0627 \\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a\\u0629 \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627 \\u0648\\u0627\\u0644\\u0627\\u0628\\u062a\\u0643\\u0627\\u0631 \\u0648\\u062e\\u062f\\u0645\\u0629 \\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621\\u060c \\u0641\\u0647\\u0645 \\u0645\\u0644\\u062a\\u0632\\u0645\\u0648\\u0646 \\u0628\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0623\\u0641\\u0636\\u0644 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0648\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0639\\u0627\\u0644\\u064a\\u0629 \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\r\\n\\u0644\\u0639\\u0645\\u0644\\u0627\\u0626\\u0647\\u0645.\",\"en\":\"Taiwan is one of the distinguished countries in the auto body industry, as it contains a large group of specialized factories in this field that have accreditations from international organizations, such as: CAPA, Thatcham, and based on their management philosophy of quality, technology, innovation, and customer service, they are committed to providing the best services and high-quality products\\r\\nto their clients.\"}', 'partners/sbPTtMlZQyW4Pv7pBQODYAUACeC1y21erXjIDK4o.png', 0, 1, NULL, '2023-04-17 01:20:25', '2023-04-17 11:16:27'),
(9, '{\"ar\":\"AAAAAAAAAAAAAAaaaaa\",\"en\":\"\\u0644\\u0634\\u0628\\u0633\\u0644\"}', '{\"ar\":\"\\u0634\\u064a\\u0628\",\"en\":\"\\u0634\\u0633\\u0628\\u0644\"}', 'partners/XBB7AgYrehc9WbeBsRXmI8wqXXXQFCXBYmF7qcO6.png', 1, 1, '2023-04-17 21:28:57', '2023-04-17 21:24:56', '2023-04-17 21:28:57'),
(10, '{\"ar\":\"\\u0634\\u064a\\u0628\",\"en\":\"\\u0644\\u0634\\u0628\\u0633\\u0644\"}', '{\"ar\":\"\\u0634\\u064a\\u0628\",\"en\":\"\\u0633\\u0628\\u0644\"}', 'partners/ivK7cANQeqlaNEKf2jBAKP7vduRObmIVHXl4sth0.png', 1, 1, '2023-04-17 21:29:16', '2023-04-17 21:26:01', '2023-04-17 21:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-home', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(2, 'read-home', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(3, 'update-home', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(4, 'delete-home', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(5, 'status-home', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(6, 'create-admins', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(7, 'read-admins', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(8, 'update-admins', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(9, 'delete-admins', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(10, 'status-admins', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(11, 'create-roles', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(12, 'read-roles', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(13, 'update-roles', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(14, 'delete-roles', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(15, 'status-roles', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(16, 'create-settings', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(17, 'read-settings', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(18, 'update-settings', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(19, 'delete-settings', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(20, 'status-settings', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(21, 'create-sliders', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(22, 'read-sliders', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(23, 'update-sliders', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(24, 'delete-sliders', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(25, 'status-sliders', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(26, 'create-partners', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(27, 'read-partners', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(28, 'update-partners', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(29, 'delete-partners', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(30, 'status-partners', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(31, 'create-languages', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(32, 'read-languages', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(33, 'update-languages', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(34, 'delete-languages', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(35, 'status-languages', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12'),
(2, 'super_admin', 'admin', '2023-04-15 21:21:12', '2023-04-15 21:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'system_image', 'settings/9cWgCaujpBF9f7RbqIgGrwWzFiC2maA82g4j5hfE.png', '2023-04-15 22:45:45', '2023-04-17 00:06:01'),
(2, 'system_name', '{\"ar\":\"\\u0634\\u0631\\u0643\\u0629 \\u0641\\u064a\\u0648\\u0644 | \\u0644\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a\",\"en\":\"Fuel Company | for car spare parts\"}', '2023-04-15 22:45:45', '2023-04-17 21:45:27'),
(3, 'achievement_name', '[{\"ar\":\"\\u062a\\u062c\\u0627\\u0631 \\u0627\\u0644\\u062c\\u0645\\u0644\\u0629 \\u0648\\u0627\\u0644\\u062a\\u062c\\u0632\\u0626\\u0629\",\"en\":\"wholesalers and retailers\"},{\"ar\":\"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a & \\u0634\\u0627\\u062d\\u0646\\u0627\\u062a\",\"en\":\"Cars & Trucks\"},{\"ar\":\"\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\",\"en\":\"spare parts\"},{\"ar\":\"\\u0639\\u0645\\u0644\\u0627\\u0626\\u0646\\u0627\",\"en\":\"our clients\"}]', '2023-04-16 21:12:13', '2023-04-17 00:19:16'),
(4, 'achievement_count', '[{\"ar\":\"125\",\"en\":\"125\"},{\"ar\":\"227\",\"en\":\"227\"},{\"ar\":\"7269\",\"en\":\"7269\"},{\"ar\":\"1699\",\"en\":\"1699\"}]', '2023-04-16 21:12:13', '2023-04-17 00:19:16'),
(5, 'contact_email', 'info@fuelap.co', '2023-04-16 23:32:32', '2023-04-17 21:38:51'),
(6, 'contact_phone', '0126423360', '2023-04-16 23:32:32', '2023-04-16 23:38:49'),
(7, 'contact_fax', '0126426660', '2023-04-16 23:32:32', '2023-04-16 23:38:49'),
(8, 'contact_address', 'السعودية - جدة شارع حائل , 2419 الرمز البريدي 21451', '2023-04-16 23:32:32', '2023-04-16 23:38:49'),
(9, 'contact_commercial_record', '4030354937', '2023-04-16 23:37:35', '2023-04-16 23:38:49'),
(10, 'contact_tax_number', '310364979400003', '2023-04-16 23:37:35', '2023-04-16 23:38:49'),
(11, 'system_description', '{\"ar\":\"\\u0634\\u0631\\u0643\\u0629 \\u0630\\u0627\\u062a \\u0645\\u0633\\u0624\\u0648\\u0644\\u064a\\u0629 \\u0645\\u062d\\u062f\\u0648\\u062f\\u0629 (\\u0630) \\u0645 \\u0645 \\u0645\\u0642\\u0631\\u0647\\u0627 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633 \\u0645\\u062f\\u064a\\u0646\\u0629 \\u062c\\u062f\\u0629 \\u0628\\u0627\\u0644\\u0645\\u0645\\u0644\\u0643\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u0629 \\u0644\\u0647\\u0627 \\u0641\\u0631\\u0648\\u0639 \\u0639\\u062f\\u0629 \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\\u060c \\u0627\\u0644\\u062f\\u0645\\u0627\\u0645\\u060c \\u062e\\u0645\\u064a\\u0633 \\u0645\\u0634\\u064a\\u0637 \\u0648\\u062a\\u0628\\u0648\\u0643. \\u0648\\u0647\\u064a \\u0634\\u0631\\u0643\\u0629 \\u0631\\u0627\\u0626\\u062f\\u0629 \\u0641\\u064a \\u0645\\u062c\\u0627\\u0644 \\u0627\\u0633\\u062a\\u064a\\u0631\\u0627\\u062f \\u0648\\u062a\\u0635\\u062f\\u064a\\u0631 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a.\",\"en\":\"A limited liability company (LLC) headquartered in Jeddah, Saudi Arabia, with several branches in Riyadh, Dammam, Khamis Mushait and Tabuk. It is a leading company in the field of importing and exporting auto parts.\"}', '2023-04-17 00:03:04', '2023-04-17 21:45:27'),
(12, 'about_title', '[{\"ar\":\"\\u0641\\u064a\\u0648\\u0644 \\u0644\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u062a\",\"en\":\"\\u0641\\u064a\\u0648\\u0644 \\u0644\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u062a\"},{\"ar\":\"\\u0623\\u0648\\u0644\\u0648\\u064a\\u0627\\u062a\\u0646\\u0627\",\"en\":\"\\u0623\\u0648\\u0644\\u0648\\u064a\\u0627\\u062a\\u0646\\u0627\"},{\"ar\":\"\\u0645\\u0627 \\u064a\\u0645\\u064a\\u0632\\u0646\\u0627\",\"en\":\"\\u0645\\u0627 \\u064a\\u0645\\u064a\\u0632\\u0646\\u0627\"}]', '2023-04-17 01:38:05', '2023-04-17 02:00:14'),
(13, 'about_description', '[{\"ar\":\"\\u0634\\u0631\\u0643\\u0629 \\u0630\\u0627\\u062a \\u0645\\u0633\\u0624\\u0648\\u0644\\u064a\\u0629 \\u0645\\u062d\\u062f\\u0648\\u062f\\u0629 (\\u0630) \\u0645 \\u0645 \\u0645\\u0642\\u0631\\u0647\\u0627 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633 \\u0645\\u062f\\u064a\\u0646\\u0629 \\u062c\\u062f\\u0629 \\u0628\\u0627\\u0644\\u0645\\u0645\\u0644\\u0643\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u0629 \\u0644\\u0647\\u0627 \\u0641\\u0631\\u0648\\u0639 \\u0639\\u062f\\u0629 \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\\u060c \\u0627\\u0644\\u062f\\u0645\\u0627\\u0645\\u060c \\u062e\\u0645\\u064a\\u0633 \\u0645\\u0634\\u064a\\u0637 \\u0648\\u062a\\u0628\\u0648\\u0643. \\u0648\\u0647\\u064a \\u0634\\u0631\\u0643\\u0629 \\u0631\\u0627\\u0626\\u062f\\u0629 \\u0641\\u064a \\u0645\\u062c\\u0627\\u0644 \\u0627\\u0633\\u062a\\u064a\\u0631\\u0627\\u062f \\u0648\\u062a\\u0635\\u062f\\u064a\\u0631 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a.\",\"en\":\"A limited liability company (LLC) headquartered in Jeddah, Saudi Arabia, with several branches in Riyadh, Dammam, Khamis Mushait and Tabuk. It is a leading company in the field of importing and exporting auto parts.\"},{\"ar\":\"\\u0645\\u0646 \\u0623\\u0648\\u0644\\u0648\\u064a\\u0627\\u062a \\u0634\\u0631\\u0643\\u0629 \\u0641\\u064a\\u0648\\u0644 \\u0641\\u064a \\u0627\\u0644\\u0633\\u0648\\u0642 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a \\u0643\\u0633\\u0628 \\u062b\\u0642\\u0629 \\u0639\\u0645\\u0644\\u0627\\u0626\\u0647\\u0627 \\u0645\\u0639 \\u0627\\u0644\\u062a\\u0631\\u0643\\u064a\\u0632 \\u0639\\u0644\\u0649 \\u0628\\u0642\\u0639\\u0629 \\u062a\\u0648\\u0633\\u0639\\u0647\\u0627 \\u0641\\u064a \\u0627\\u0644\\u0633\\u0648\\u0642 \\u0627\\u0644\\u0645\\u062d\\u0644\\u064a \\u0627\\u0644\\u0625\\u0642\\u0644\\u064a\\u0645\\u064a \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a \\u0648\\u0635\\u0648\\u0644\\u0627\\u064b \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0633\\u0648\\u0627\\u0642 \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u064a\\u0629\\u060c \\u0647\\u062f\\u0641\\u0647\\u0627 \\u0634\\u0645\\u0648\\u0644 \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635 \\u0628\\u0645\\u062c\\u0627\\u0644\\u0627\\u062a \\u0645\\u062e\\u062a\\u0644\\u0641\\u0629 \\u0645\\u0646 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0643\\u0627\\u0644\\u0642\\u0637\\u0639 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0634\\u0645\\u0639\\u0627\\u062a \\u0648\\u0627\\u0644\\u0625\\u0636\\u0627\\u0621\\u0629 \\u0648\\u0623\\u0646\\u0638\\u0645\\u0629 \\u0627\\u0644\\u0641\\u0631\\u0627\\u0645\\u0644 \\u0648\\u0627\\u0644\\u062a\\u0639\\u0644\\u064a\\u0642 \\u0648\\u0623\\u0646\\u0638\\u0645\\u0629 \\u0627\\u0644\\u062a\\u0628\\u0631\\u064a\\u062f \\u0644\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629\\r\\n\\r\\n\\u0648\\u062a\\u0639\\u062a\\u0628\\u0631 \\u0641\\u064a\\u0648\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0648\\u0631\\u062f\\u0629 \\u0648\\u0627\\u0644\\u0645\\u0635\\u062f\\u0631\\u0629 \\u0644\\u0645\\u0627\\u0631\\u0643\\u0627\\u062a \\u0639\\u0627\\u0644\\u0645\\u064a\\u0629 \\u0645\\u0646 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u0621 \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u064a\\u064a\\u0646 \\u0643\\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u064a\\u0627\\u0628\\u0627\\u0646\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0643\\u0648\\u0631\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0639\\u0631\\u0648\\u0641\\u0629 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0627\\u064b \\u0648\\u0641\\u064a \\u0627\\u0644\\u0633\\u0648\\u0642 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a\\u060c \\u0628\\u0627\\u0644\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0646\\u0633\\u0628\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062a\\u064a\\u0631\\u0627\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0633\\u0627\\u0628\\u0642\\u0629 \\u0627\\u0644\\u0630\\u0643\\u0631\",\"en\":\"One of the priorities of the Fuel Company in the Saudi market is to gain the trust of its customers, while focusing on its expansion spot in the local, regional, Arab market, all the way to the global markets.\\r\\n\\r\\nFuel is considered one of the companies importing and exporting international brands of auto spare parts to a group of international partners such as Japanese and Korean companies known internationally and in the Saudi market, in addition to increasing the proportion of imports from the aforementioned companies.\"},{\"ar\":\"\\u062a\\u062a\\u0645\\u064a\\u0640\\u0632 \\u0641\\u0640\\u064a\\u0640\\u0648\\u0644 \\u0628\\u0640\\u0623\\u0646 \\u062c\\u0645\\u064a\\u0639 \\u0645\\u0648\\u0638\\u0641\\u064a\\u0647\\u0627 \\u0630\\u0648\\u0648 \\u062e\\u0628\\u0631\\u0627\\u062a \\u0639\\u0627\\u0644\\u064a\\u0629 \\u0641\\u064a \\u0645\\u062c\\u0627\\u0644 \\u0627\\u0633\\u062a\\u064a\\u0631\\u0627\\u062f \\u0648\\u062a\\u0635\\u062f\\u064a\\u0631 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0648\\u0639\\u0644\\u0649 \\u062f\\u0631\\u0627\\u064a\\u0629 \\u0643\\u0627\\u0645\\u0644\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0633\\u0648\\u0642 \\u0627\\u0644\\u0633\\u0639\\u0648\\u062f\\u064a.\",\"en\":\"Fuel is distinguished by the fact that all its employees are highly experienced in the field of importing and exporting auto parts, and are fully aware of the Saudi market.\"}]', '2023-04-17 01:50:00', '2023-04-17 02:00:14'),
(14, 'about_image', 'settings/sxNKeLSeBhXfa0dsYxPNpt8BxvAMI9rtc7C8JI3U.jpg', '2023-04-17 01:58:57', '2023-04-17 02:00:14'),
(15, 'feature_image', 'settings/JBkXvjcTcbLOWW07MSIdxULwVKjM87DJ49Yg2wMF.png', '2023-04-17 10:38:58', '2023-04-17 10:46:35'),
(16, 'feature_title', '[{\"ar\":\"\\u0631\\u0624\\u064a\\u062a\\u0646\\u0627\",\"en\":\"Our vision\"},{\"ar\":\"\\u0631\\u0633\\u0627\\u0644\\u062a\\u0646\\u0627\",\"en\":\"Our message\"},{\"ar\":\"\\u0623\\u0647\\u062f\\u0627\\u0641\\u0646\\u0627\",\"en\":\"Our goals\"},{\"ar\":\"\\u0642\\u064a\\u0645\\u0646\\u0627\",\"en\":\"rate us\"}]', '2023-04-17 10:38:58', '2023-04-17 10:51:53'),
(17, 'feature_description', '[{\"ar\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u062f\\u0629 \\u0641\\u064a \\u0645\\u062c\\u0627\\u0644 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0648\\u062a\\u0648\\u0641\\u064a\\u0631 \\u0627\\u0644\\u062d\\u0644\\u0648\\u0644 \\u0627\\u0644\\u0645\\u062a\\u0643\\u0627\\u0645\\u0644\\u0629 \\u0628\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0642\\u0637\\u0627\\u0639 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0645\\u062d\\u0644\\u064a \\u0648\\u0627\\u0644\\u0625\\u0642\\u0644\\u064a\\u0645\\u064a \\u0648\\u0627\\u0644\\u062f\\u0648\\u0644\\u064a. \\u0648\\u0642\\u064a\\u0627\\u062f\\u0629 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629 \\u0644\\u0622\\u0641\\u0627\\u0642 \\u062c\\u062f\\u064a\\u062f\\u0629.\",\"en\":\"Leadership in the field of auto parts and providing integrated solutions in this sector at the local, regional and international levels. And lead the company to new horizons.\"},{\"ar\":\"\\u0627\\u0644\\u0633\\u0639\\u064a \\u0644\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0623\\u0631\\u0642\\u0649 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0644\\u0639\\u0645\\u0644\\u0627\\u0626\\u0646\\u0627 \\u0648\\u062a\\u0644\\u0628\\u064a\\u0629 \\u0627\\u062d\\u062a\\u064a\\u0627\\u062c\\u0627\\u062a\\u0647\\u0645 \\u0648\\u0631\\u063a\\u0628\\u0627\\u062a\\u0647\\u0645 \\u0641\\u064a \\u0639\\u0627\\u0644\\u0645 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a. \\u0648\\u064a\\u062a\\u0645 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0630\\u0644\\u0643 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0627\\u0644\\u062f\\u0627\\u0626\\u0645 \\u0644\\u062a\\u0648\\u0641\\u064a\\u0631 \\u0643\\u0627\\u0641\\u0629 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0631\\u062f\\u064a\\u0646 \\u0627\\u0644\\u0645\\u0645\\u064a\\u0632\\u064a\\u0646\\u060c\\r\\n\\r\\n\\u0628\\u0627\\u0644\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u062a\\u0639\\u0632\\u064a\\u0632 \\u0648\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621 \\u0639\\u0628\\u0631 \\u0645\\u0646\\u062d\\u0647\\u0645 \\u062d\\u0644\\u0648\\u0644\\u0627\\u064b \\u0645\\u062a\\u0643\\u0627\\u0645\\u0644\\u0629\\u060c \\u0648\\u0645\\u064a\\u0632\\u0627\\u062a \\u062a\\u0641\\u0648\\u0642 \\u0633\\u0642\\u0641 \\u062a\\u0648\\u0642\\u0639\\u0627\\u062a\\u0647\\u0645\\u060c \\u0648\\u062a\\u0639\\u0632\\u064a\\u0632 \\u0627\\u0646\\u062a\\u0645\\u0627\\u0621 \\u0648\\u0648\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0645\\u0648\\u0638\\u0641\\u064a\\u0646 \\u0644\\u0644\\u0634\\u0631\\u0643\\u0629 \\u0639\\u0628\\u0631 \\u0627\\u0644\\u062a\\u0637\\u0648\\u064a\\u0631 \\u0627\\u0644\\u062f\\u0627\\u0626\\u0645 \\u0648\\u0627\\u0644\\u0645\\u0643\\u0627\\u0641\\u0622\\u062a \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0645\\u0639\\u0646\\u0648\\u064a\\u0629\\u060c \\u0648\\u062a\\u0623\\u0643\\u064a\\u062f \\u0627\\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0645\\u0631 \\u0644\\u0634\\u0631\\u0643\\u0627\\u0626\\u0646\\u0627 \\u0627\\u0644\\u0639\\u0638\\u0645\\u0627\\u0621.\",\"en\":\"Striving to provide the best services to our customers and meet their needs and desires in the world of cars. This is provided through permanent work to provide all auto spare parts from distinguished suppliers,\\r\\n\\r\\nIn addition to enhancing customer loyalty by providing them with integrated solutions and features that exceed their expectations, and enhancing employee affiliation and loyalty to the company through permanent development, financial and moral rewards, and affirming continuous support for our great partners.\"},{\"ar\":\"\\u0645\\u0646\\u0640\\u062d \\u0627\\u0644\\u0639\\u0645\\u0640\\u0644\\u0627\\u0621 \\u062c\\u0648\\u0644\\u0640\\u0629 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0629 \\u0645\\u062c\\u062f\\u064a\\u0640\\u0629 \\u0641\\u0640\\u064a \\u0639\\u0627\\u0644\\u0640\\u0645 \\u0642\\u0637\\u0640\\u0639 \\u063a\\u0640\\u064a\\u0640\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u062d\\u062f\\u064a\\u062b\\u0629\\u060c \\u0628\\u0627\\u0644\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0633\\u0645\\u0627\\u062d \\u0644\\u0647\\u0645 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0639\\u0631\\u0648\\u0636 \\u0623\\u0633\\u0639\\u0627\\u0631\\u060c\\r\\n\\r\\n\\u0648\\u0646\\u062d\\u0646 \\u0641\\u064a \\u0641\\u064a\\u0648\\u0644 \\u0646\\u0633\\u0639\\u0649 \\u062c\\u0627\\u0647\\u062f\\u064a\\u0646 \\u0644\\u062a\\u0648\\u0641\\u064a\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0648\\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0645\\u0637\\u0644\\u0648\\u0628\\u0629 \\u0644\\u0639\\u0645\\u0644\\u0627\\u0626\\u0646\\u0627\\u060c \\u0648\\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0627\\u0644\\u062e\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0645\\u062a\\u0639\\u062f\\u062f\\u0629 \\u0648\\u0627\\u0644\\u0645\\u062a\\u0645\\u064a\\u0632\\u0629 \\u0627\\u0644\\u062a\\u064a \\u0646\\u062a\\u064a\\u062d\\u0647\\u0627\\u060c \\u0643\\u0625\\u0645\\u0643\\u0627\\u0646\\u064a\\u0629 \\u0627\\u0633\\u062a\\u0639\\u0631\\u0627\\u0636 \\u0622\\u0631\\u0627\\u0621 \\u0627\\u0644\\u062e\\u0628\\u0631\\u0627\\u0621 \\u0648\\u0623\\u0646 \\u0646\\u062c\\u0639\\u0644 \\u0645\\u0646 \\u062a\\u062c\\u0631\\u0628\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0639 \\u0648 \\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0639\\u0628\\u0631 \\u0641\\u064a\\u0648\\u0644 \\u062a\\u062c\\u0631\\u0628\\u0629 \\u0645\\u0645\\u062a\\u0639\\u0629 \\u0648\\u0628\\u0639\\u064a\\u062f\\u0629 \\u0639\\u0646 \\u0623\\u064a \\u0639\\u0646\\u0627\\u0621.\",\"en\":\"Giving customers a meaningful global tour of the world of modern auto parts, in addition to allowing them to easily obtain quotes,\\r\\n\\r\\nWe at Fuel strive to provide the required products and services to our customers, and through the multiple and distinct options that we offer, such as the ability to review expert opinions and to make the buying and selling experience through Fuel an enjoyable and effortless experience.\"},{\"ar\":\"\\u0641\\u064a \\u0641\\u064a\\u0648\\u0644\\u060c \\u062a\\u062d\\u0643\\u0645\\u0646\\u0627 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0642\\u064a\\u0645 \\u062c\\u0648\\u0647\\u0631\\u064a\\u0629 \\u0623\\u0633\\u0627\\u0633\\u064a\\u0629 \\u0646\\u0639\\u062a\\u0632 \\u0628\\u0647\\u0640\\u0627\\u060c \\u0641\\u0646\\u062d\\u0640\\u0646 \\u0645\\u062a\\u062d\\u0645\\u0633\\u0648\\u0646 \\u0644\\u062a\\u0648\\u0638\\u064a\\u0641 \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629 \\u0645\\u0646 \\u0623\\u062c\\u0644 \\u0639\\u0627\\u0644\\u0645 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a\\u060c \\u0648\\u0645\\u0644\\u062a\\u0632\\u0645\\u0648\\u0646 \\u0628\\u062a\\u0642\\u062f\\u064a\\u0645 \\u062e\\u062f\\u0645\\u0627\\u062a \\u0630\\u0627\\u062a \\u062c\\u0648\\u062f\\u0629 \\u0639\\u0627\\u0644\\u064a\\u0629\\u060c \\u0648\\u0641\\u0631\\u064a\\u0642\\u0646\\u0627 \\u0645\\u0644\\u062a\\u0632\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0641\\u0627\\u0646\\u064a \\u0644\\u062a\\u0645\\u0643\\u064a\\u0646 \\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621 \\u0645\\u0646 \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0623\\u0641\\u0636\\u0644 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0640\\u0627\\u062a \\u0645\\u0640\\u0646 \\u062e\\u0640\\u0644\\u0627\\u0644\\r\\n\\r\\n\\u0627\\u0644\\u062b\\u0642\\u0629 \\u0648 \\u0627\\u0644\\u0646\\u0632\\u0627\\u0647\\u0629\\r\\n \\u0627\\u0644\\u062c\\u0648\\u062f\\u0629 \\u0648\\u0627\\u0644\\u0634\\u0641\\u0627\\u0641\\u064a\\u0629\\r\\n \\u0625\\u0631\\u0636\\u0627\\u0621 \\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621\\r\\n \\u0627\\u0644\\u0645\\u0633\\u0627\\u0647\\u0645\\u0629 \\u0627\\u0644\\u0641\\u0639\\u0627\\u0644\\u0629 \\u0641\\u064a \\u062e\\u062f\\u0645\\u0629 \\u0627\\u0644\\u0645\\u062c\\u062a\\u0645\\u0639 \\u0648\\u0627\\u0632\\u062f\\u0647\\u0627\\u0631\\u0647\\r\\n \\u0627\\u0644\\u0627\\u0633\\u062a\\u062b\\u0645\\u0627\\u0631 \\u0628\\u0642\\u0648\\u0629 \\u0641\\u064a \\u0641\\u0631\\u064a\\u0642 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0628\\u0627\\u0639\\u062a\\u0628\\u0627\\u0631\\u0647 \\u0627\\u0644\\u0645\\u0648\\u0631\\u062f \\u0627\\u0644\\u0623\\u0633\\u0627\\u0633\\u064a\",\"en\":\"Fuel\\r\\n\\r\\nTrust and integrity\\r\\n Quality and transparency\\r\\n Customers satisfaction\\r\\n Effective contribution to community service and prosperity\\r\\n Investing strongly in the work team as the primary resource\"}]', '2023-04-17 10:46:35', '2023-04-17 10:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `admin_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\":\"\\u0641\\u064a\\u0648\\u0644 \\u0644\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u062a\",\"en\":\"\\u0641\\u064a\\u0648\\u0644 \\u0644\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u062a\"}', '{\"ar\":\"\\u0634\\u0631\\u0643\\u0629 \\u0645\\u0633\\u062a\\u0648\\u0631\\u062f\\u0629 \\u0648\\u0645\\u0635\\u062f\\u0631\\u0629 \\u0644\\u0645\\u0627\\u0631\\u0643\\u0627\\u062a \\u0639\\u0627\\u0644\\u0645\\u064a\\u0629 \\u0645\\u0646 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u064a\\u064a\\u0646\",\"en\":\"\\u0634\\u0631\\u0643\\u0629 \\u0645\\u0633\\u062a\\u0648\\u0631\\u062f\\u0629 \\u0648\\u0645\\u0635\\u062f\\u0631\\u0629 \\u0644\\u0645\\u0627\\u0631\\u0643\\u0627\\u062a \\u0639\\u0627\\u0644\\u0645\\u064a\\u0629 \\u0645\\u0646 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u064a\\u064a\\u0646\"}', 'sliders/wPhKmmwksWCfFE8twPgY0QlVOOkld9SmbkSERhUl.jpg', 1, 1, NULL, '2023-04-16 23:30:06', '2023-04-16 23:30:06'),
(3, '{\"ar\":\"\\u0641\\u064a\\u0648\\u0644 \\u0644\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u062a\",\"en\":\"\\u0641\\u064a\\u0648\\u0644 \\u0644\\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u062a\"}', '{\"ar\":\"\\u0634\\u0631\\u0643\\u0629 \\u0645\\u0633\\u062a\\u0648\\u0631\\u062f\\u0629 \\u0648\\u0645\\u0635\\u062f\\u0631\\u0629 \\u0644\\u0645\\u0627\\u0631\\u0643\\u0627\\u062a \\u0639\\u0627\\u0644\\u0645\\u064a\\u0629 \\u0645\\u0646 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u064a\\u064a\\u0646\",\"en\":\"\\u0634\\u0631\\u0643\\u0629 \\u0645\\u0633\\u062a\\u0648\\u0631\\u062f\\u0629 \\u0648\\u0645\\u0635\\u062f\\u0631\\u0629 \\u0644\\u0645\\u0627\\u0631\\u0643\\u0627\\u062a \\u0639\\u0627\\u0644\\u0645\\u064a\\u0629 \\u0645\\u0646 \\u0642\\u0637\\u0639 \\u063a\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u062a \\u0627\\u0644\\u0639\\u0627\\u0644\\u0645\\u064a\\u064a\\u0646\"}', 'sliders/92CCmc6ihVukFPpsLE9LUHgBCFFXpYgSyjFCW8Xp.jpg', 1, 1, NULL, '2023-04-16 23:30:29', '2023-04-16 23:30:29'),
(4, '{\"ar\":\"sfgsfggfgfg\",\"en\":\"gfsgsfg\"}', '{\"ar\":\"adafsfgsg\",\"en\":\"sfgsgsfg\"}', NULL, 1, 1, NULL, '2023-04-17 20:13:46', '2023-04-17 20:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
