-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 09:08 PM
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
-- Database: `webkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@example.com', 'admin', NULL, '6571507933a5a1701924985.png', '$2y$10$ZOWPSwbB7098UQHq/GZX5uGq43wfuDDjMBNASktSNK55T/4jC/xvy', 'SMMvyAASmMjlP7lr1BfguHkrny2kh4duGrNxekHyxshpeMesSQOXeMgO6OqJ', NULL, '2023-12-06 22:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT 0,
  `click_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `user_id`, `title`, `read_status`, `click_url`, `created_at`, `updated_at`) VALUES
(8, 34, 'instructor', 0, '/admin/manage/users/detail/34', '2023-12-08 10:15:43', '2023-12-08 10:15:43'),
(9, 35, 'New member registered', 0, '/admin/manage/users/detail/35', '2023-12-08 10:42:41', '2023-12-08 10:42:41'),
(10, 39, 'New member registered', 0, '/admin/manage/users/detail/39', '2024-01-07 01:44:15', '2024-01-07 01:44:15'),
(11, 40, 'New member registered', 0, '/admin/manage/users/detail/40', '2024-01-08 10:50:44', '2024-01-08 10:50:44'),
(12, 41, 'New member registered', 0, '/admin/manage/users/detail/41', '2024-01-08 11:27:18', '2024-01-08 11:27:18'),
(13, 35, 'Course buy via net balance', 0, '/admin/manage/deposits/successful', '2024-01-12 11:12:50', '2024-01-12 11:12:50'),
(14, 35, 'Course buy via net balance', 0, '/admin/manage/deposits/successful', '2024-01-14 01:02:10', '2024-01-14 01:02:10'),
(15, 35, 'Course buy via net balance', 0, '/admin/manage/deposits/successful', '2024-01-16 08:41:33', '2024-01-16 08:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_subscribed` int(2) NOT NULL DEFAULT 0,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `path`, `image`, `is_subscribed`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'web design', '2023/12', '6570d52dcaf5d1701893421.jpg', 0, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2023-12-05 10:54:58', '2023-12-30 11:49:24'),
(3, 'online marketing', '2023/12', '6570d24c5c3941701892684.jpg', 1, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '2023-12-05 11:20:36', '2023-12-06 13:58:04'),
(4, 'Video editing', '2023/12', '6570d2538d7951701892691.jpg', 0, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '2023-12-05 11:37:14', '2023-12-06 13:58:11'),
(9, 'Web Application', '2023/12', '6570d2538d7951701892691.jpg', 0, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '2023-12-05 11:37:14', '2023-12-06 13:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE `category_details` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `creator_id` int(10) NOT NULL,
  `price` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `is_purchase` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`id`, `category_id`, `creator_id`, `price`, `is_purchase`, `created_at`, `updated_at`) VALUES
(1, 3, 41, 5.00000000, 1, '2024-01-09 04:18:07', '2024-01-09 04:18:07'),
(5, 1, 41, 0.00000000, 0, '2024-01-10 01:24:02', '2024-01-10 01:24:02'),
(6, 4, 41, 0.00000000, 0, '2024-01-10 01:24:02', '2024-01-10 01:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) NOT NULL,
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `percentage_charge` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `fixed_charge`, `percentage_charge`, `created_at`, `updated_at`) VALUES
(1, 5.00000000, 10, '2024-01-14 05:56:19', '2024-01-14 00:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `commission_logs`
--

CREATE TABLE `commission_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `level` varchar(191) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `type` varchar(40) NOT NULL,
  `details` varchar(255) NOT NULL,
  `trx` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `creator_id` int(10) NOT NULL,
  `price` decimal(28,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `category_id`, `creator_id`, `price`, `image`, `img_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 1, 41, 50.00, '659ff9889deb51704982920.jpg', '2024/01', 1, '2024-01-10 11:35:25', '2024-01-11 08:22:00'),
(2, 'Flutter', 1, 41, 20.00, '659ffb1f699da1704983327.jpg', '2024/01', 1, '2024-01-10 11:35:25', '2024-01-11 08:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `method_code` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `method_currency` varchar(40) DEFAULT NULL,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `final_amo` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `detail` text DEFAULT NULL,
  `btc_amo` varchar(255) DEFAULT NULL,
  `btc_wallet` varchar(255) DEFAULT NULL,
  `trx` varchar(40) DEFAULT NULL,
  `try` int(10) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `from_api` tinyint(1) NOT NULL DEFAULT 0,
  `admin_feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `method_code`, `amount`, `method_currency`, `charge`, `rate`, `final_amo`, `detail`, `btc_amo`, `btc_wallet`, `trx`, `try`, `status`, `from_api`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 8, 103, 20.00000000, 'USD', 2.00000000, 1.00000000, 102.00000000, NULL, '0', '', 'XN7REMJGE4C4', 0, 1, 0, NULL, '2022-01-05 12:12:50', '2022-03-30 12:12:50'),
(2, 8, 1001, 10.00000000, 'USD', 5.10000000, 1.00000000, 15.10000000, '[{\"name\":\"Transaction Number\",\"type\":\"text\",\"value\":\"asdfasdf\"},{\"name\":\"Screenshot\",\"type\":\"file\",\"value\":\"2022\\/03\\/30\\/62446a3b559711648650811.jpg\"}]', '0', '', 'R3G56TCAUJMM', 0, 1, 0, 'sdfgsdfgsd', '2022-05-04 13:03:24', '2022-03-30 13:04:13'),
(3, 8, 1000, 100.00000000, 'USD', 0.58000000, 1.00000000, 100.58000000, '[{\"name\":\"Send From Number\",\"type\":\"text\",\"value\":\"sdfg\"},{\"name\":\"Transaction Number\",\"type\":\"text\",\"value\":\"asdfasdf\"},{\"name\":\"Screenshot\",\"type\":\"file\",\"value\":\"2022\\/03\\/30\\/62446a83a6cdb1648650883.jpg\"}]', '0', '', 'QR37YU2V2MAA', 0, 1, 0, NULL, '2022-03-30 13:04:37', '2022-03-30 13:04:43'),
(4, 8, 1001, 10.00000000, 'USD', 5.10000000, 1.00000000, 15.10000000, '[{\"name\":\"Transaction Number\",\"type\":\"text\",\"value\":\"asdfasdf\"},{\"name\":\"Screenshot\",\"type\":\"file\",\"value\":\"2022\\/04\\/02\\/6247e7d13a7001648879569.pdf\"}]', '0', '', 'NHFHX4TO5ETR', 0, 1, 0, NULL, '2022-04-02 04:35:26', '2022-04-02 04:36:09'),
(5, 8, 1001, 10.00000000, 'USD', 5.10000000, 1.00000000, 15.10000000, '[{\"name\":\"Transaction Number\",\"type\":\"text\",\"value\":\"asdfasdf\"},{\"name\":\"Screenshot\",\"type\":\"file\",\"value\":\"2022\\/04\\/02\\/6247e7fa216ab1648879610.pdf\"}]', '0', '', '6RQ5DFRGCDVH', 0, 1, 0, NULL, '2022-04-02 04:36:23', '2022-04-02 04:36:50'),
(6, 8, 1001, 10.00000000, 'USD', 5.10000000, 1.00000000, 15.10000000, '[{\"name\":\"Transaction Number\",\"type\":\"text\",\"value\":\"asdfasdf\"},{\"name\":\"Screenshot\",\"type\":\"file\",\"value\":\"2022\\/04\\/02\\/6247e8dc05b9a1648879836.PDF\"}]', '0', '', 'WD65AUAU418T', 0, 1, 0, NULL, '2022-04-02 04:37:08', '2022-04-02 04:40:36'),
(7, 8, 1001, 10.00000000, 'USD', 5.10000000, 1.00000000, 15.10000000, NULL, '0', '', 'QFQ1J7GJ4AX2', 0, 1, 0, NULL, '2022-06-09 04:40:54', '2022-04-02 04:40:54'),
(8, 8, 501, 1.00000000, 'BTC', 11.01000000, 1.00000000, 12.01000000, NULL, '0', '', 'OEW63JWSU8Q7', 0, 0, 0, NULL, '2022-04-04 06:58:01', '2022-04-04 06:58:01'),
(9, 8, 501, 1.00000000, 'BTC', 11.01000000, 1.00000000, 12.01000000, NULL, '0', '', 'CWQAFRUY2CYN', 0, 0, 0, NULL, '2022-04-04 06:58:46', '2022-04-04 06:58:46'),
(10, 8, 506, 10.00000000, 'USD', 2.00000000, 10.00000000, 120.00000000, NULL, '0', '', '8HFWBM1HKGXZ', 0, 0, 0, NULL, '2022-04-04 07:00:22', '2022-04-04 07:00:22'),
(11, 8, 506, 10.00000000, 'USD', 2.00000000, 10.00000000, 120.00000000, NULL, '0', '', 'KBWTC2PFT3Y4', 0, 0, 0, NULL, '2022-04-04 07:00:49', '2022-04-04 07:00:49'),
(12, 8, 1001, 10.00000000, 'USD', 5.10000000, 1.00000000, 15.10000000, '[{\"name\":\"Transaction Number\",\"type\":\"text\",\"value\":\"66\"},{\"name\":\"Screenshot\",\"type\":\"file\",\"value\":\"2022\\/04\\/11\\/6253b35a2066f1649652570.jpg\"},{\"name\":\"asdf\",\"type\":\"file\",\"value\":\"2022\\/04\\/11\\/6253b35a48fe31649652570.png\"}]', '0', '', 'F75X3ZFZJJXM', 0, 2, 0, NULL, '2022-04-11 03:16:59', '2022-04-11 03:19:30'),
(13, 8, 108, 100.00000000, 'USD', 1.00000000, 1.00000000, 101.00000000, NULL, '0', '', '1M4GTD3568MO', 0, 0, 0, NULL, '2022-05-08 10:25:41', '2022-05-08 10:25:41'),
(52, 60, 1000, 10000.00000000, 'TK', 510.00000000, 100.00000000, 1051000.00000000, '[]', '0', '', '2K4E2V4T49YB', 0, 1, 0, NULL, '2022-11-09 03:11:15', '2022-11-09 03:12:13'),
(53, 62, 1000, 10000.00000000, 'TK', 510.00000000, 100.00000000, 1051000.00000000, '[]', '0', '', 'P5X4QSWBKT48', 0, 1, 0, NULL, '2022-11-09 03:36:14', '2022-11-09 03:36:45'),
(54, 63, 1000, 10000.00000000, 'TK', 510.00000000, 100.00000000, 1051000.00000000, '[]', '0', '', 'DDN2MOS9ECB3', 0, 1, 0, NULL, '2022-11-09 03:55:36', '2022-11-09 03:55:53'),
(55, 60, 1000, 500.00000000, 'TK', 35.00000000, 100.00000000, 53500.00000000, '[]', '0', '', 'CCRSGBFT6N2K', 0, 1, 0, NULL, '2022-11-09 04:39:26', '2022-11-09 04:39:39'),
(56, 60, 1000, 500.00000000, 'TK', 35.00000000, 100.00000000, 53500.00000000, '[]', '0', '', 'DKSDCBGY8RVF', 0, 1, 0, NULL, '2022-11-09 08:37:31', '2022-11-09 11:12:32'),
(57, 60, 1000, 500.00000000, 'TK', 35.00000000, 100.00000000, 53500.00000000, NULL, '0', '', 'CEW5EHBF47JB', 0, 0, 0, NULL, '2022-11-09 08:43:04', '2022-11-09 08:43:04'),
(58, 64, 1000, 10000.00000000, 'TK', 510.00000000, 100.00000000, 1051000.00000000, '[]', '0', '', 'WF6PH46P55JB', 0, 1, 0, NULL, '2022-11-09 10:39:59', '2022-11-09 10:40:28'),
(59, 65, 1000, 10000.00000000, 'TK', 510.00000000, 100.00000000, 1051000.00000000, '[]', '0', '', 'TZ6FE3TO2EE2', 0, 1, 0, NULL, '2022-11-09 11:12:04', '2022-11-09 11:13:15'),
(60, 66, 1000, 50000.00000000, 'TK', 2510.00000000, 100.00000000, 5251000.00000000, '[]', '0', '', 'H5U92ODF7BQP', 0, 1, 0, NULL, '2022-11-14 04:34:08', '2022-11-14 04:34:27'),
(61, 60, 114, 5000.00000000, 'USD', 260.00000000, 100.00000000, 526000.00000000, NULL, '0', 'cs_test_a1kTQYYmEI7ImJRadDutBu64CCdtAULEnvTu18PdlvGu4c59bVwjAQOzcP', 'DUANPRNU9VQP', 0, 0, 0, NULL, '2022-11-14 05:40:40', '2022-11-14 05:40:43'),
(62, 60, 1000, 500.00000000, 'TK', 35.00000000, 100.00000000, 53500.00000000, '[]', '0', '', '314RWBNG3C4U', 0, 2, 0, NULL, '2022-11-14 10:28:25', '2022-11-14 10:28:27'),
(63, 60, 101, 500.00000000, 'USD', 35.00000000, 80.00000000, 42800.00000000, NULL, '0', '', '88OMNT4KYEB3', 0, 0, 0, NULL, '2022-11-14 10:29:03', '2022-11-14 10:29:03'),
(64, 35, 101, 29.00000000, 'USD', 1.29000000, 1.00000000, 30.29000000, NULL, '0', '', 'GT7AMX3HP7D3', 0, 0, 0, NULL, '2023-12-30 10:36:43', '2023-12-30 10:36:43'),
(65, 35, 101, 29.00000000, 'USD', 1.29000000, 1.00000000, 30.29000000, NULL, '0', '', 'XT4NXC4OW47X', 0, 0, 0, NULL, '2023-12-30 10:41:15', '2023-12-30 10:41:15'),
(66, 35, 114, 29.00000000, 'USD', 1.58000000, 1.00000000, 30.58000000, NULL, '0', '', 'N2E5VTM8EAMZ', 0, 0, 0, NULL, '2023-12-30 10:47:42', '2023-12-30 10:47:42'),
(67, 35, 114, 29.00000000, 'USD', 1.58000000, 1.00000000, 30.58000000, NULL, '0', 'cs_test_a1qgXgolYPcfvLZ9EbEcZdrboChzULvwlgblejOUUlvzs4StqGk9411HeK', '1GRK2MZF3PPT', 0, 0, 0, NULL, '2023-12-30 10:54:31', '2023-12-30 11:24:26'),
(68, 35, 114, 29.00000000, 'USD', 1.58000000, 1.00000000, 30.58000000, NULL, '0', '', 'PVEARAJY12OC', 0, 0, 0, NULL, '2023-12-30 11:36:25', '2023-12-30 11:36:25'),
(69, 35, 114, 29.00000000, 'USD', 1.58000000, 1.00000000, 30.58000000, NULL, '0', 'cs_test_a1gjGTjD5LpYAE2K5JlupsO5jkeFxUkNhXAU7Y8pBgHOaVMGRSnjGqxu8o', 'FRGAJDVSDEXA', 0, 0, 0, NULL, '2023-12-30 11:36:56', '2023-12-30 11:43:56'),
(70, 35, 114, 20.00000000, 'USD', 1.40000000, 1.00000000, 21.40000000, NULL, '0', 'cs_test_a1lmzGX8BiRcMqTp48tDuRAlqi11OLW2PLuKE1a7wTcu7MMM8QKnYWaR2S', 'MTEOV4AFWCSX', 0, 0, 0, NULL, '2023-12-30 11:49:22', '2023-12-30 11:49:40'),
(71, 39, 114, 20.00000000, 'USD', 1.40000000, 1.00000000, 21.40000000, NULL, '0', 'cs_test_a1FlcqWXxoj95hGwXyndskGwIGcwfrY61p5EPUFKCxQ8G4OPSQqQFcbsIx', 'F7YJ2TH1GGBD', 0, 0, 0, NULL, '2024-01-07 11:19:29', '2024-01-07 11:19:38'),
(72, 35, 114, 20.00000000, 'USD', 1.40000000, 1.00000000, 21.40000000, NULL, '0', 'cs_test_a17sUNYmT0GKTcedL1YSs7JgPbHgTTd70JQhYLW7Qcz6Qe9x66elyTGuVo', '5UD72K7DQM8X', 0, 0, 0, NULL, '2024-01-12 10:10:07', '2024-01-12 10:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_link` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `course_id`, `title`, `file_path`, `file`, `file_link`, `status`, `description`, `created_at`, `updated_at`) VALUES
(5, 1, 'Episode One', '2024/01', '659d1d5f581ee1704795487.mp4', NULL, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages', '2024-01-09 04:18:07', '2024-01-13 13:14:41'),
(6, 5, 'Episode two', '2024/01', '659e46121d5e61704871442.mp4', 'https://www.youtube.com/watch?v=K76X6vyhUrE', 0, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia', '2024-01-10 01:24:02', '2024-01-10 01:24:02'),
(7, 1, 'Episode Two', '2024/01', '659ee9ae0e4ed1704913326.mp4', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,', '2024-01-10 13:02:06', '2024-01-18 11:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `script` text DEFAULT NULL,
  `shortcode` text DEFAULT NULL COMMENT 'object',
  `support` text DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Live Chat(Tawk.to)', 'Key location is shown bellow', 'chat-png.png', '<script>\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n                        (function(){\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\n                        s1.async=true;\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\n                        s1.charset=\"UTF-8\";\n                        s1.setAttribute(\"crossorigin\",\"*\");\n                        s0.parentNode.insertBefore(s1,s0);\n                        })();\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"55\"}}', 'twak.png', 0, NULL, '2019-10-18 23:16:05', '2023-03-22 06:04:56'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha2.png', '\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\n<div class=\"g-recaptcha\" data-sitekey=\"{{site_key}}\" data-callback=\"verifyCaptcha\"></div>\n<div id=\"g-recaptcha-error\"></div>', '{\"site_key\":{\"title\":\"Site Key\",\"value\":\"6LdPC88fAAAAADQlUf_DV6Hrvgm-pZuLJFSLDOWV\"},\"secret_key\":{\"title\":\"Secret Key\",\"value\":\"6LdPC88fAAAAAG5SVaRYDnV2NpCrptLg2XLYKRKB\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2022-05-08 04:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) DEFAULT NULL,
  `form_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `act`, `form_data`, `created_at`, `updated_at`) VALUES
(2, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"nid_number_22\":{\"name\":\"NID Number 22\",\"label\":\"nid_number_22\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"textarea\"},\"sadfg\":{\"name\":\"sadfg\",\"label\":\"sadfg\",\"is_required\":\"optional\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"asdf\":{\"name\":\"asdf\",\"label\":\"asdf\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Test\",\"Test2\",\"Test3\"],\"type\":\"select\"},\"nid_number_226985\":{\"name\":\"NID Number 226985\",\"label\":\"nid_number_226985\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Test\",\"Test 2\",\"Test 3\"],\"type\":\"checkbox\"},\"nid_number_3333\":{\"name\":\"NID Number 3333\",\"label\":\"nid_number_3333\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Test\",\"asdf\"],\"type\":\"radio\"},\"nid_number_3333587\":{\"name\":\"NID Number 3333587\",\"label\":\"nid_number_3333587\",\"is_required\":\"optional\",\"extensions\":\"jpg,bmp,png,pdf\",\"options\":[],\"type\":\"file\"}}', '2022-03-16 01:09:49', '2022-03-17 00:02:54'),
(3, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"nid_number_226985\":{\"name\":\"NID Number 226985\",\"label\":\"nid_number_226985\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-16 04:32:29', '2022-03-16 04:35:32'),
(5, 'withdraw_method', '{\"nid_number_33\":{\"name\":\"NID Number 33\",\"label\":\"nid_number_33\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-17 00:45:35', '2022-03-17 00:53:17'),
(6, 'withdraw_method', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-17 00:47:04', '2022-03-17 00:47:04'),
(7, 'kyc', '{\"full_name\":{\"name\":\"Full Name\",\"label\":\"full_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"gender\":{\"name\":\"Gender\",\"label\":\"gender\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Male\",\"Female\",\"Others\"],\"type\":\"select\"},\"you_hobby\":{\"name\":\"You Hobby\",\"label\":\"you_hobby\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Programming\",\"Gardening\",\"Traveling\",\"Others\"],\"type\":\"checkbox\"},\"nid_photo\":{\"name\":\"NID Photo\",\"label\":\"nid_photo\",\"is_required\":\"required\",\"extensions\":\"jpg,png\",\"options\":[],\"type\":\"file\"}}', '2022-03-17 02:56:14', '2022-04-11 03:23:40'),
(8, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"}}', '2022-03-21 07:53:25', '2022-03-21 07:53:25'),
(9, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"}}', '2022-03-21 07:54:15', '2022-03-21 07:54:15'),
(10, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-21 07:55:15', '2022-03-21 07:55:22'),
(11, 'withdraw_method', '{\"nid_number_2658\":{\"name\":\"NID Number 2658\",\"label\":\"nid_number_2658\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[\"asdf\"],\"type\":\"checkbox\"}}', '2022-03-22 00:14:09', '2022-03-22 00:14:18'),
(12, 'withdraw_method', '[]', '2022-03-30 09:03:12', '2022-03-30 09:03:12'),
(13, 'withdraw_method', '{\"bank_name\":{\"name\":\"Bank Name\",\"label\":\"bank_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"account_name\":{\"name\":\"Account Name\",\"label\":\"account_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"account_number\":{\"name\":\"Account Number\",\"label\":\"account_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2022-03-30 09:09:11', '2022-09-28 04:05:20'),
(14, 'withdraw_method', '{\"mobile_number\":{\"name\":\"Mobile Number\",\"label\":\"mobile_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2022-03-30 09:10:12', '2022-09-29 09:55:20'),
(15, 'manual_deposit', '{\"send_from_number\":{\"name\":\"Send From Number\",\"label\":\"send_from_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"},\"transaction_number\":{\"name\":\"Transaction Number\",\"label\":\"transaction_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"},\"screenshot\":{\"name\":\"Screenshot\",\"label\":\"screenshot\",\"is_required\":\"required\",\"extensions\":\"jpg,jpeg,png\",\"options\":[],\"type\":\"file\"}}', '2022-03-30 09:15:27', '2022-03-30 09:15:27'),
(16, 'manual_deposit', '{\"transaction_number\":{\"name\":\"Transaction Number\",\"label\":\"transaction_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"screenshot\":{\"name\":\"Screenshot\",\"label\":\"screenshot\",\"is_required\":\"required\",\"extensions\":\"jpg,pdf,docx\",\"options\":[],\"type\":\"file\"}}', '2022-03-30 09:16:43', '2022-04-11 03:19:54'),
(17, 'manual_deposit', '[]', '2022-03-30 09:21:19', '2022-03-30 09:21:19'),
(18, 'manual_deposit', '{\"asdfasddf\":{\"name\":\"asdfasddf\",\"label\":\"asdfasddf\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"}}', '2022-09-28 04:50:55', '2022-09-28 04:50:55'),
(19, 'manual_deposit', '{\"sadf\":{\"name\":\"sadf\",\"label\":\"sadf\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"textarea\"}}', '2022-09-28 05:13:04', '2022-09-28 05:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(40) DEFAULT NULL,
  `data_values` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"website\",\"services\"],\"description\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"social_title\":\"Webkit\",\"social_description\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ff\",\"image\":\"5fa397a629bee1604556710.jpg\"}', '2020-07-04 23:42:52', '2023-12-07 01:09:23'),
(24, 'about.content', '{\"has_image\":\"1\",\"heading\":\"Welcome to eLEARNING\",\"subheading\":\"ABOUT US\",\"description\":\"Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.\\r\\n\\r\\nTempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet\",\"about_icon\":\"<i class=\\\"fas fa-angle-double-right text-primary\\\"><\\/i>\",\"background_image\":\"60951a84abd141620384388.png\",\"about_image\":\"656ee3de546d51701766110.jpg\"}', '2020-10-28 00:51:20', '2023-12-05 02:48:30'),
(25, 'blog.content', '{\"heading\":\"Latest News\",\"subheading\":\"------ddd\"}', '2020-10-28 00:51:34', '2023-03-21 08:44:54'),
(26, 'blog.element', '{\"has_image\":[\"1\",\"1\"],\"title\":\"This is a Blog Post\",\"description\":\"This is a Blog Post\",\"description_nic\":\"<p>This is a Blog Post<\\/p>\",\"blog_icon\":\"<i class=\\\"fab fa-accusoft\\\"><\\/i>\",\"blog_image_1\":\"5f99164f1baec1603868239.jpg\",\"blog_image_2\":\"5ff2e146346d21609752902.jpg\"}', '2020-10-28 00:57:19', '2022-09-29 10:05:34'),
(27, 'contact_us.content', '{\"title\":\"Get In Touch\",\"short_details\":\"The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done. Download Now.\",\"email_address\":\"webkit@gmail.com\",\"contact_details\":\"123 Street, New York, USA\",\"contact_number\":\"+012 345 67890\",\"latitude\":\"23.7815118,90\",\"longitude\":\"90.42125\",\"website_footer\":\"<p>Copyright 2023. All rights reserved.<\\/p>\"}', '2020-10-28 00:59:19', '2023-12-06 22:55:58'),
(28, 'counter.content', '{\"heading\":\"Clients\",\"subheading\":\"Auctor gravida vestibulu\"}', '2020-10-28 01:04:02', '2022-09-28 14:02:14'),
(31, 'social_icon.element', '{\"title\":\"Facebook\",\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.google.com\\/\"}', '2020-11-12 04:07:30', '2022-09-30 09:38:49'),
(33, 'feature.content', '{\"heading\":\"asdf\",\"sub_heading\":\"asdf\"}', '2021-01-03 23:40:54', '2021-01-03 23:40:55'),
(34, 'feature.element', '{\"title\":\"asdf\",\"description\":\"asdf\",\"feature_icon\":\"asdf\"}', '2021-01-03 23:41:02', '2021-01-03 23:41:02'),
(35, 'service.element', '{\"title\":\"Skilled Instructors\",\"description\":\"Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam\",\"service_icon\":\"<i class=\\\"fa fa-3x fa-graduation-cap text-primary mb-4\\\"><\\/i>\"}', '2021-03-06 01:12:10', '2023-12-05 02:41:10'),
(36, 'service.content', '{\"trx_type\":\"deposit\",\"heading\":\"asdf fffff\",\"subheading\":\"555\"}', '2021-03-06 01:27:34', '2022-03-30 08:07:06'),
(39, 'banner.content', '{\"heading1\":\"The Best Online Learning Platform\",\"heading2\":\"Get Educated Online From Your Home\",\"subheading1\":\"Best Online Courses\",\"subheading2\":\"Best Online Courses\",\"paragraph1\":\"Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.\",\"paragraph2\":\"Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.\"}', '2021-05-02 06:09:30', '2023-12-06 23:38:11'),
(41, 'cookie.data', '{\"short_desc\":\"Cookies let us evaluate website traffic, provide you with targeted information or adverts, and improve your surfing experience. Clicking \\\"Accept\\\" indicates that you agree to our cookie usage.\",\"description\":\"<h4>GDPR, cookie policies, and adherence&nbsp;<\\/h4><p>&nbsp;<\\/p><p>Cookie consent is essential for websites with users based in the EU, even though cookies are only referenced once in the GDPR. This is due to the fact that website cookies are among the most widely used methods for gathering and disseminating personal data online. Specific guidelines for the usage of cookies are outlined in the GDPR.&nbsp;<\\/p><p>Because of this, the most common legal justification for websites to collect personal data and use cookies under the GDPR is end-user permission to cookies.&nbsp;<\\/p><ul><li>The&nbsp;General Data Protection Regulation (GDPR)&nbsp;is an EU legislation that governs all collection and processing of personal data from individuals inside the EU.<\\/li><li>Under the EU\\u2019s GDPR, it is the&nbsp;legal responsibility of website owners and operators&nbsp;to make sure that personal data is collected and processed lawfully.<\\/li><li>A website outside of the EU is required to comply with the GDPR if it collects&nbsp;data from users inside the EU.<\\/li><\\/ul><p>&nbsp;<\\/p>\",\"status\":1}', '2020-07-04 23:42:52', '2024-01-11 13:19:41'),
(42, 'policy_pages.element', '{\"title\":\"Privacy Policy\",\"details\":\"<h3><strong>Where does it come from?<\\/strong><\\/h3><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>\\u00a0<\\/p><h4><strong>Where can I get some?<\\/strong><\\/h4><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<\\/p><p>\\u00a0<\\/p><h3><strong>Sed ut perspiciatis unde omnis iste\\u00a0<\\/strong><\\/h3><ul><li>Consequuntur quia consequuntur\\u00a0<\\/li><li>Eos qui ratione voluptatem\\u00a0<\\/li><li>Dolores eos qui ratione voluptatem<\\/li><li>Quis autem vel eum iure\\u00a0<\\/li><\\/ul><h3><strong>1914 translation by H. Rackham<\\/strong><\\/h3><ul><li>Consequuntur quia consequuntur\\u00a0<\\/li><li>Eos qui ratione voluptatem\\u00a0<\\/li><li>Dolores eos qui ratione voluptatem<\\/li><li>Quis autem vel eum iure\\u00a0<\\/li><\\/ul><p>qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<\\/p><p>\\u00a0<\\/p><h4><strong>The standard Lorem Ipsum passage, used since the 1500s<\\/strong><\\/h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<\\/p>\"}', '2021-06-09 08:50:42', '2024-01-14 11:51:22'),
(43, 'policy_pages.element', '{\"title\":\"Terms of Service\",\"details\":\"<h3><strong>Sed ut perspiciatis unde omnis iste\\u00a0<\\/strong><\\/h3><p>natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.<\\/p><p>\\u00a0<\\/p><ul><li>Consequuntur quia consequuntur\\u00a0<\\/li><li>Eos qui ratione voluptatem\\u00a0<\\/li><li>Dolores eos qui ratione voluptatem<\\/li><li>Quis autem vel eum iure\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><h3><strong>Nisi ut aliquid ex ea commodi consequatur<\\/strong><\\/h3><p>qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<\\/p><p>\\u00a0<\\/p><h3><strong>Sed ut perspiciatis unde omnis iste\\u00a0<\\/strong><\\/h3><ul><li>Consequuntur quia consequuntur\\u00a0<\\/li><li>Eos qui ratione voluptatem\\u00a0<\\/li><li>Dolores eos qui ratione voluptatem<\\/li><li>Quis autem vel eum iure\\u00a0<\\/li><\\/ul><p>\\u00a0<\\/p><h3><strong>Nisi ut aliquid ex ea commodi consequatur<\\/strong><\\/h3><ul><li>Consequuntur quia consequuntur\\u00a0<\\/li><li>Eos qui ratione voluptatem\\u00a0<\\/li><li>Dolores eos qui ratione voluptatem<\\/li><li>Quis autem vel eum iure\\u00a0<\\/li><\\/ul><p>qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<\\/p><p>\\u00a0<\\/p><h3><strong>Sed ut perspiciatis unde omnis iste\\u00a0<\\/strong><\\/h3><p>natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.\\u00a0<\\/p><p>\\u00a0<\\/p><h3><strong>Nisi ut aliquid ex ea commodi consequatur<\\/strong><\\/h3><p>qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<\\/p>\"}', '2021-06-09 08:51:18', '2022-12-17 06:01:43'),
(44, 'maintenance.data', '{\"description\":\"<div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"text-align: center; font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"text-align: center; margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div>\"}', '2020-07-04 23:42:52', '2022-05-11 03:57:17'),
(45, 'feature.element', '{\"title\":\"sytry\",\"description\":\"ertyerty\",\"feature_icon\":\"<i class=\\\"fas fa-address-book\\\"><\\/i>\"}', '2022-10-17 10:23:22', '2022-10-17 10:23:22'),
(46, 'feature.element', '{\"title\":\"sytry\",\"description\":\"ertyerty\",\"feature_icon\":\"<i class=\\\"fas fa-address-book\\\"><\\/i>\"}', '2022-10-17 10:23:22', '2022-10-17 10:23:22'),
(51, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"dd\",\"description\":\"<p>ffaa<\\/p>\",\"blog_image\":\"641991bc922611679397308.png\"}', '2023-03-21 08:45:08', '2023-03-21 08:45:08'),
(52, 'service.element', '{\"title\":\"Online Classes\",\"description\":\"Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam\",\"service_icon\":\"<i class=\\\"fas fa-3x text-primary fa-globe mb-4\\\"><\\/i>\"}', '2023-12-05 02:38:52', '2023-12-05 02:42:28'),
(53, 'service.element', '{\"title\":\"Home Projects\",\"description\":\"Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam\",\"service_icon\":\"<i class=\\\"fas fa-3x text-primary mb-4 fa-house-damage\\\"><\\/i>\"}', '2023-12-05 02:38:52', '2023-12-05 02:42:54'),
(54, 'service.element', '{\"title\":\"Book Library\",\"description\":\"Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam\",\"service_icon\":\"<i class=\\\"fas fa-3x text-primary mb-4 fa-book-open\\\"><\\/i>\"}', '2023-12-05 02:39:54', '2023-12-05 02:43:25'),
(55, 'testimonial.content', '{\"heading\":\"Our Students Say!\",\"subheading\":\"TESTIMONIAL\"}', '2023-12-05 08:57:33', '2023-12-05 08:57:34'),
(56, 'testimonial.element', '{\"title\":\"Jhon Doe\",\"subtitle\":\"Web Designer\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters\",\"has_image\":\"1\",\"testimonial_image\":\"656f3bb8892491701788600.jpg\"}', '2023-12-05 09:03:20', '2023-12-05 09:03:20'),
(57, 'course.content', '{\"heading\":\"Popular Courses\",\"subheading\":\"COURSES\"}', '2023-12-05 09:34:30', '2023-12-05 09:34:30'),
(58, 'category.content', '{\"heading\":\"All Categories\",\"subheading\":\"CATEGORIES\"}', '2023-12-05 09:37:57', '2024-01-10 01:59:08'),
(59, 'testimonial.element', '{\"title\":\"Selina Nicholes\",\"subtitle\":\"Graphics Designer\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters\",\"has_image\":\"1\",\"testimonial_image\":\"65715d3d8d01e1701928253.jpg\"}', '2023-12-06 23:50:04', '2023-12-06 23:51:18'),
(60, 'testimonial.element', '{\"title\":\"Stave Smith\",\"subtitle\":\"Digital Marketer\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters\",\"has_image\":\"1\",\"testimonial_image\":\"65715d7b905fe1701928315.jpg\"}', '2023-12-06 23:51:55', '2023-12-06 23:53:36'),
(61, 'about.element', '{\"title\":\"Skilled Instructors\",\"icon\":\"<i class=\\\"fas fa-angle-double-right text-primary\\\"><\\/i>\"}', '2023-12-07 00:15:07', '2023-12-07 00:15:07'),
(62, 'about.element', '{\"title\":\"Online Classes\",\"icon\":\"<i class=\\\"fas fa-angle-double-right text-primary\\\"><\\/i>\"}', '2023-12-07 00:21:26', '2023-12-07 00:21:50'),
(63, 'about.element', '{\"title\":\"International Certificate\",\"icon\":\"<i class=\\\"fas fa-angle-double-right text-primary\\\"><\\/i>\"}', '2023-12-07 00:22:16', '2023-12-07 00:22:16'),
(64, 'about.element', '{\"title\":\"Skilled Instructors\",\"icon\":\"<i class=\\\"fas fa-angle-double-right text-primary\\\"><\\/i>\"}', '2023-12-07 00:23:01', '2023-12-07 00:23:02'),
(65, 'instructor.content', '{\"heading\":\"Expert Instructors\",\"subheading\":\"INSTRUCTORS\"}', '2024-01-10 03:47:04', '2024-01-10 03:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `code` int(10) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `alias` varchar(40) NOT NULL DEFAULT 'NULL',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `gateway_parameters` text DEFAULT NULL,
  `supported_currencies` text DEFAULT NULL,
  `crypto` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `form_id`, `code`, `name`, `alias`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 101, 'Paypal', 'Paypal', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"sb-58ira22618401@business.example.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 08:03:45'),
(2, 0, 102, 'Perfect Money', 'PerfectMoney', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"---------------------\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 07:50:01'),
(3, 0, 105, 'PayTM', 'Paytm', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"-----------\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"--------------------\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"example.com\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 08:10:37'),
(4, 0, 107, 'PayStack', 'Paystack', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"--------\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"----------------\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.Paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.Paystack\"}}\r\n', NULL, '2019-09-14 13:14:22', '2022-11-26 07:49:18'),
(5, 0, 108, 'VoguePay', 'Voguepay', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"-------------------\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 07:50:14'),
(6, 0, 109, 'Flutterwave', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"----------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"-----------------------\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"------------------\"}}', '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2021-06-05 11:37:45'),
(7, 0, 110, 'RazorPay', 'Razorpay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"------------\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"--------\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:51:32'),
(8, 0, 112, 'Instamojo', 'Instamojo', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"------------\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"---------\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"-------\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 08:00:15'),
(9, 0, 503, 'CoinPayments', 'Coinpayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"---------------\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"------------\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"----------------\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"USDT.BEP20\":\"Tether USD (BSC Chain)\",\"USDT.ERC20\":\"Tether USD (ERC20)\",\"USDT.TRC20\":\"Tether USD (Tron/TRC20)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, '2019-09-14 13:14:22', '2022-10-29 07:29:51'),
(10, 0, 506, 'Coinbase Commerce', 'CoinbaseCommerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"---------\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"----------------\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.CoinbaseCommerce\"}}', NULL, '2019-09-14 13:14:22', '2022-10-29 07:29:48'),
(11, 0, 113, 'Paypal Express', 'PaypalSdk', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"------------\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"-----------\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2021-05-20 23:01:08'),
(12, 0, 114, 'Stripe Checkout', 'StripeV3', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51N3HoVDIjbcv2hIxhY0VFrtOk12C3ZIoohtCDkXA8YPAr15uVJDlGimXdqDSLDhEhrB6gUXqYgWLTxKnexvGrnOt00gDrUJikO\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51N3HoVDIjbcv2hIxCJ6oS0oQstDu6POIkpNbi9jOIVfFgqmi6K9JzkpsAuc9kZqKyNseOv87IL9o48nDH1xNgUoW000zNvJyWK\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"webkit\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.StripeV3\"}}', NULL, '2019-09-14 13:14:22', '2023-12-30 10:47:21'),
(46, 20, 1000, 'Mobile', 'mobile', 1, '[]', '[]', 0, NULL, '<p>abc.......</p>', '2022-10-29 10:26:00', '2024-01-07 11:46:05'),
(47, 23, 1001, 'Online Payment', 'online_payment', 1, '[]', '[]', 0, NULL, '<p>You must be fill up email and account number field.</p>', '2022-12-27 06:46:49', '2022-12-27 06:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `currency` varchar(40) DEFAULT NULL,
  `symbol` varchar(40) DEFAULT NULL,
  `method_code` int(10) DEFAULT NULL,
  `gateway_alias` varchar(40) DEFAULT NULL,
  `min_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `max_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(255) DEFAULT NULL,
  `gateway_parameter` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `name`, `currency`, `symbol`, `method_code`, `gateway_alias`, `min_amount`, `max_amount`, `percent_charge`, `fixed_charge`, `rate`, `image`, `gateway_parameter`, `created_at`, `updated_at`) VALUES
(2, 'Paypal - USD', 'USD', '$', 101, 'Paypal', 1.00000000, 100000.00000000, 1.00, 1.00000000, 1.00000000, NULL, '{\"paypal_email\":\"sb-58ira22618401@business.example.com\"}', '2023-11-10 03:31:40', '2023-11-10 03:31:40'),
(4, 'Stripe Checkout - USD', 'USD', '$', 114, 'StripeV3', 5.00000000, 10000.00000000, 2.00, 1.00000000, 1.00000000, NULL, '{\"secret_key\":\"sk_test_51N3HoVDIjbcv2hIxhY0VFrtOk12C3ZIoohtCDkXA8YPAr15uVJDlGimXdqDSLDhEhrB6gUXqYgWLTxKnexvGrnOt00gDrUJikO\",\"publishable_key\":\"pk_test_51N3HoVDIjbcv2hIxCJ6oS0oQstDu6POIkpNbi9jOIVfFgqmi6K9JzkpsAuc9kZqKyNseOv87IL9o48nDH1xNgUoW000zNvJyWK\",\"end_point\":\"webkit\"}', '2023-12-30 11:01:16', '2023-12-30 11:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(40) DEFAULT NULL,
  `cur_text` varchar(40) DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(40) DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(40) DEFAULT NULL,
  `email_template` text DEFAULT NULL,
  `sms_body` varchar(255) DEFAULT NULL,
  `sms_from` varchar(255) DEFAULT NULL,
  `base_color` varchar(40) DEFAULT NULL,
  `secondary_color` varchar(40) DEFAULT NULL,
  `mail_config` text DEFAULT NULL COMMENT 'email configuration',
  `sms_config` text DEFAULT NULL,
  `global_shortcodes` text DEFAULT NULL,
  `kv` tinyint(1) NOT NULL DEFAULT 0,
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'mobile verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms notification, 0 - dont send, 1 - send',
  `force_ssl` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0,
  `secure_password` tinyint(1) NOT NULL DEFAULT 0,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `registration` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Off	, 1: On',
  `active_template` varchar(40) DEFAULT NULL,
  `system_info` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_body`, `sms_from`, `base_color`, `secondary_color`, `mail_config`, `sms_config`, `global_shortcodes`, `kv`, `ev`, `en`, `sv`, `sn`, `force_ssl`, `maintenance_mode`, `secure_password`, `agree`, `registration`, `active_template`, `system_info`, `created_at`, `updated_at`) VALUES
(1, 'WebKit', 'USD', '$', 'info@example.com', '<p>Hi {{fullname}} ({{username}}),&nbsp;</p><p>{{message}}</p>', 'Hi {{fullname}} ({{username}}), \r\n{{message}}', 'Webkit', '1a8994', '062562', '{\"name\":\"smtp\",\"host\":\"smtp.mailtrap.io\",\"port\":\"2525\",\"enc\":\"ssl\",\"username\":\"bcbcc6239f7a0e\",\"password\":\"c5d10803bef9b1\"}', '{\"name\":\"messageBird\",\"clickatell\":{\"api_key\":\"----------------\"},\"infobip\":{\"username\":\"------------8888888\",\"password\":\"-----------------\"},\"message_bird\":{\"api_key\":\"-------------------\"},\"nexmo\":{\"api_key\":\"----------------------\",\"api_secret\":\"----------------------\"},\"sms_broadcast\":{\"username\":\"----------------------\",\"password\":\"-----------------------------\"},\"twilio\":{\"account_sid\":\"-----------------------\",\"auth_token\":\"---------------------------\",\"from\":\"----------------------\"},\"text_magic\":{\"username\":\"-----------------------\",\"apiv2_key\":\"-------------------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\"],\"value\":[\"test_api 555\"]},\"body\":{\"name\":[\"from_number\"],\"value\":[\"5657545757\"]}}}', '{\n    \"site_name\":\"Name of your site\",\n    \"site_currency\":\"Currency of your site\",\n    \"currency_symbol\":\"Symbol of currency\"\n}', 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 'default', '[]', NULL, '2024-01-16 08:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `code` varchar(40) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `text_align` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '5f15968db08911595250317.png', 0, 1, '2020-07-06 03:47:55', '2022-09-29 10:36:14'),
(14, 'Spanish', 'es', NULL, 0, 0, '2023-02-15 11:06:57', '2023-02-15 11:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sender` varchar(40) DEFAULT NULL,
  `sent_from` varchar(40) DEFAULT NULL,
  `sent_to` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `notification_type` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_logs`
--

INSERT INTO `notification_logs` (`id`, `user_id`, `sender`, `sent_from`, `sent_to`, `subject`, `message`, `notification_type`, `created_at`, `updated_at`) VALUES
(1, 0, 'smtp', 'webkit@example.com', 'receiver@gmail.com', 'SMTP Configuration Success', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n  <!--[if !mso]><!-->\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n  <!--<![endif]-->\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n  <title></title>\n  <style type=\"text/css\">\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\n.ExternalClass { width: 100%; background-color: #ffffff; }\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\nhtml { width: 100%; }\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\ntable table table { table-layout: auto; }\n.yshortcuts a { border-bottom: none !important; }\nimg:hover { opacity: 0.9 !important; }\na { color: #0087ff; text-decoration: none; }\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\n.btn-link a { color:#FFFFFF !important;}\n\n@media only screen and (max-width: 480px) {\nbody { width: auto !important; }\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\n/* image */\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\n}\n</style>\n\n\n\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\n    <tbody><tr>\n      <td height=\"50\"></td>\n    </tr>\n    <tr>\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n          <tbody><tr>\n            <td align=\"center\" width=\"600\">\n              <!--header-->\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\n                <tbody><tr>\n                  <td bgcolor=\"#7752fe\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\n                      <tbody><tr>\n                        <td height=\"20\"></td>\n                      </tr>\n                      <tr>\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">Email System</td>\n                      </tr>\n                      <tr>\n                        <td height=\"20\"></td>\n                      </tr>\n                    </tbody></table>\n                  </td>\n                </tr>\n              </tbody></table>\n              <!--end header-->\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                <tbody><tr>\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                      <tbody><tr>\n                        <td height=\"35\"></td>\n                      </tr>\n                      <!--logo-->\n                      <tr>\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\n                          <a href=\"#\">\n                            Webkit\n                          </a>\n                        </td>\n                      </tr>\n                      <!--end logo-->\n                      <tr>\n                        <td height=\"40\"></td>\n                      </tr>\n                      <!--headline-->\n                      <tr>\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello Admin (admin@gmail.com)</td>\n                      </tr>\n                      <!--end headline-->\n                      <tr>\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\n                            <tbody><tr>\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\n                            </tr>\n                          </tbody></table>\n                        </td>\n                      </tr>\n                      <tr>\n                        <td height=\"20\"></td>\n                      </tr>\n                      <!--content-->\n                      <tr>\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\">Your Webkit email notification configuration is complete.</td>\n                      </tr>\n                      <!--end content-->\n                      <tr>\n                        <td height=\"40\"></td>\n                      </tr>\n              \n                    </tbody></table>\n                  </td>\n                </tr>\n                <tr>\n                  <td height=\"45\" align=\"center\" bgcolor=\"#fff\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                      <tbody><tr>\n                        <td height=\"10\"></td>\n                      </tr>\n                      <!--preference-->\n                      <tr>\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7752fe; font-size:14px;\">\n                          © 2024&nbsp;<a href=\"{{route(\'home\')}}\">Webkit</a>&nbsp;. All Rights Reserved. \n                        </td>\n                      </tr>\n                      <!--end preference-->\n                      <tr>\n                        <td height=\"10\"></td>\n                      </tr>\n                    </tbody></table>\n                  </td>\n                </tr>\n              </tbody></table>\n            </td>\n          </tr>\n        </tbody></table>\n      </td>\n    </tr>\n    <tr>\n      <td height=\"60\"></td>\n    </tr>\n  </tbody></table>', 'email', '2024-01-01 07:41:43', '2024-01-02 07:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `subj` varchar(255) DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `sms_body` text DEFAULT NULL,
  `shortcodes` text DEFAULT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 1,
  `sms_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'BAL_ADD', 'Balance - Added', 'Your Account has been Credited', '<div><div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been added to your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}&nbsp;</span></font><br></div><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin note:&nbsp;<span style=\"color: rgb(33, 37, 41); font-size: 12px; font-weight: 600; white-space: nowrap; text-align: var(--bs-body-text-align);\">{{remark}}</span></div>', '{{amount}} {{site_currency}} credited in your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin note is \"{{remark}}\"', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 0, '2021-11-03 12:00:00', '2022-09-21 13:04:13'),
(2, 'BAL_SUB', 'Balance - Subtracted', 'Your Account has been Debited', '<div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been subtracted from your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}</span></font><br><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin Note: {{remark}}</div>', '{{amount}} {{site_currency}} debited from your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin Note is {{remark}}', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:24:11'),
(3, 'DEPOSIT_COMPLETE', 'Deposit - Automated - Successful', 'Deposit Completed Successfully', '<div>Your deposit of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been completed Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div><br></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#000000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div>Received : {{method_amount}} {{method_currency}}<br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{amount}} {{site_currency}} Deposit successfully by {{method_name}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:25:43'),
(4, 'DEPOSIT_APPROVE', 'Deposit - Manual - Approved', 'Your Deposit is Approved', '<div style=\"font-family: Montserrat, sans-serif;\">Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>is Approved .<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Paid via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div>', 'Admin Approve Your {{amount}} {{site_currency}} payment request by {{method_name}} transaction : {{trx}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:26:07'),
(5, 'DEPOSIT_REJECT', 'Deposit - Manual - Rejected', 'Your Deposit Request is Rejected', '<div style=\"font-family: Montserrat, sans-serif;\">Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}} has been rejected</span>.<span style=\"font-weight: bolder;\"><br></span></div><div><br></div><div><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Paid via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge: {{charge}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number was : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">if you have any queries, feel free to contact us.<br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><br><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">{{rejection_message}}</span><br>', 'Admin Rejected Your {{amount}} {{site_currency}} payment request by {{method_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"rejection_message\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:45:27'),
(6, 'DEPOSIT_REQUEST', 'Deposit - Manual - Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>submitted successfully<span style=\"font-weight: bolder;\">&nbsp;.<br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div><br></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}}<br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{amount}} {{site_currency}} Deposit requested by {{method_name}}. Charge: {{charge}} . Trx: {{trx}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:29:19'),
(7, 'PASS_RESET_CODE', 'Password - Reset - Code', 'Password Reset', '<div style=\"font-family: Montserrat, sans-serif;\">We have received a request to reset the password for your account on&nbsp;<span style=\"font-weight: bolder;\">{{time}} .<br></span></div><div style=\"font-family: Montserrat, sans-serif;\">Requested From IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><div>Your account recovery code is:&nbsp;&nbsp;&nbsp;<font size=\"6\"><span style=\"font-weight: bolder;\">{{code}}</span></font></div><div><br></div></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><div><font size=\"4\" color=\"#CC0000\"><br></font></div>', 'Your account recovery code is: {{code}}', '{\"code\":\"Verification code for password reset\",\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 0, '2021-11-03 12:00:00', '2022-03-20 20:47:05'),
(8, 'PASS_RESET_DONE', 'Password - Reset - Confirmation', 'You have reset your password', '<p style=\"font-family: Montserrat, sans-serif;\">You have successfully reset your password.</p><p style=\"font-family: Montserrat, sans-serif;\">You changed from&nbsp; IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{time}}</span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><font color=\"#ff0000\">If you did not change that, please contact us as soon as possible.</font></span></p>', 'Your password has been changed successfully', '{\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:46:35'),
(9, 'ADMIN_SUPPORT_REPLY', 'Support - Reply', 'Reply Support Ticket', '<div><p><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\">A member from our support team has replied to the following ticket:</span></span></p><p><span style=\"font-weight: bolder;\"><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\"><br></span></span></span></p><p><span style=\"font-weight: bolder;\">[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</span></p><p>----------------------------------------------</p><p>Here is the reply :<br></p><p>{{reply}}<br></p></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', 'Your Ticket#{{ticket_id}} :  {{ticket_subject}} has been replied.', '{\"ticket_id\":\"ID of the support ticket\",\"ticket_subject\":\"Subject  of the support ticket\",\"reply\":\"Reply made by the admin\",\"link\":\"URL to view the support ticket\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:47:51'),
(10, 'EVER_CODE', 'Verification - Email', 'Please verify your email address', '<br><div><div style=\"font-family: Montserrat, sans-serif;\">Thanks For joining us.<br></div><div style=\"font-family: Montserrat, sans-serif;\">Please use the below code to verify your email address.<br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your email verification code is:<font size=\"6\"><span style=\"font-weight: bolder;\">&nbsp;{{code}}</span></font></div></div>', '---', '{\"code\":\"Email verification code\"}', 1, 0, '2021-11-03 12:00:00', '2022-04-03 02:32:07'),
(11, 'SVER_CODE', 'Verification - SMS', 'Verify Your Mobile Number', '---', 'Your phone verification code is: {{code}}', '{\"code\":\"SMS Verification Code\"}', 0, 1, '2021-11-03 12:00:00', '2022-03-20 19:24:37'),
(12, 'WITHDRAW_APPROVE', 'Withdraw - Approved', 'Withdraw Request has been Processed and your money is sent', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Processed Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Processed Payment :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div>', 'Admin Approve Your {{amount}} {{site_currency}} withdraw request by {{method_name}}. Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"admin_details\":\"Details provided by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:50:16'),
(13, 'WITHDRAW_REJECT', 'Withdraw - Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Rejected.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You should get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">----</div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\"><br></font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\">{{amount}} {{currency}} has been&nbsp;<span style=\"font-weight: bolder;\">refunded&nbsp;</span>to your account and your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}}</span><span style=\"font-weight: bolder;\">&nbsp;{{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Rejection :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br><br><br></div><div></div><div></div>', 'Admin Rejected Your {{amount}} {{site_currency}} withdraw request. Your Main Balance {{post_balance}}  {{method_name}} , Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this action\",\"admin_details\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:57:46'),
(14, 'WITHDRAW_REQUEST', 'Withdraw - Requested', 'Withdraw Request Submitted Successfully', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been submitted Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br></div>', '{{amount}} {{site_currency}} withdraw requested by {{method_name}}. You will get {{method_amount}} {{method_currency}} Trx: {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-21 04:39:03'),
(15, 'DEFAULT', 'Default Template', '{{subject}}', '{{message}}', '{{message}}', '{\"subject\":\"Subject\",\"message\":\"Message\"}', 1, 1, '2019-09-14 13:14:22', '2021-11-04 09:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `slug` varchar(40) DEFAULT NULL,
  `tempname` varchar(40) DEFAULT NULL COMMENT 'template name',
  `secs` text DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 'presets.default.', '[\"banner\",\"service\",\"about\",\"instructor\",\"category\",\"course\",\"testimonial\"]', 1, '2020-07-11 06:23:58', '2023-12-06 23:19:52'),
(4, 'About', 'about', 'presets.default.', '[\"service\",\"about\",\"instructor\"]', 1, '2020-10-22 01:14:43', '2023-12-05 02:29:21'),
(5, 'Courses', 'courses', 'presets.default.', '[\"category\",\"course\",\"instructor\"]', 1, '2020-10-22 01:14:53', '2023-12-05 09:46:31'),
(19, 'Contact', 'contact', 'presets.default.', NULL, 1, '2020-10-22 01:14:53', '2020-10-22 01:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(40) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ronnie@gmail.com', '100375', '2020-07-07 05:44:47'),
('user@site.comfff', '988862', '2021-05-07 07:31:28'),
('mosta@gmail.com', '865544', '2021-06-10 09:21:05'),
('user@site.com', '532560', '2022-04-04 03:52:27'),
('testuser1@gmail.com', '542151', '2023-11-10 03:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(29, 'App\\Models\\User', 22, 'MyApp', '5da1bfd64a5d95722d5c085185f0787323270c5cf12d09c5a69e4f950f4d8420', '[\"*\"]', NULL, '2021-05-19 05:47:02', '2021-05-19 05:47:02'),
(46, 'App\\Models\\User', 25, 'auth_token', 'bc7288b4e2082a0475639d6e2f29483a35abd11f55110df12244d9142f7ca54a', '[\"*\"]', NULL, '2021-06-10 05:35:17', '2021-06-10 05:35:17'),
(47, 'App\\Models\\User', 25, 'auth_token', '2bcdbee9ab110af212b02516a602ba52cf27a6aa844901acbb2fbfc09c95bb34', '[\"*\"]', NULL, '2021-06-10 06:31:50', '2021-06-10 06:31:50'),
(51, 'App\\Models\\User', 26, 'auth_token', 'c792344d1730dde4e418f6380309b24767062dc5e9c6757fce88675f7bbff9f3', '[\"*\"]', NULL, '2021-06-10 08:38:29', '2021-06-10 08:38:29'),
(53, 'App\\Models\\User', 24, 'auth_token', '36c0eb2f6065deb315bd996e158aed1d6c06f4a04879317bcf1961ea786a675c', '[\"*\"]', '2021-06-10 13:04:13', '2021-06-10 09:36:52', '2021-06-10 13:04:13'),
(54, 'App\\Models\\User', 24, 'auth_token', 'ddcfe3a5d501093c86a0a376a125099517199ea17ee9d4d78be12e476e413b40', '[\"*\"]', '2021-06-10 10:05:35', '2021-06-10 10:05:22', '2021-06-10 10:05:35'),
(55, 'App\\Models\\User', 24, 'auth_token', 'ecf248b74ee8bff942c22b299ccb3afe840a589b7dbd62b9897cbe46ea6c8941', '[\"*\"]', NULL, '2021-06-10 11:56:06', '2021-06-10 11:56:06'),
(58, 'App\\Models\\User', 8, 'auth_token', 'e572eaf82d8c9849394bb7790486730ab529e6ab53d9e4abc14dd69bd70bbd3f', '[\"*\"]', NULL, '2022-03-22 10:47:56', '2022-03-22 10:47:56'),
(59, 'App\\Models\\User', 8, 'auth_token', '21b0d071e22f45a7520c36b825b4f2582037004ee019e67707a4c6cabcbc9375', '[\"*\"]', '2022-04-05 05:13:26', '2022-03-22 10:48:33', '2022-04-05 05:13:26'),
(60, 'App\\Models\\User', 31, 'auth_token', '29647be4a8b5510c717c50b8279d168717ebcc25b3d0155fcc840cd315527112', '[\"*\"]', NULL, '2022-03-22 11:22:57', '2022-03-22 11:22:57'),
(61, 'App\\Models\\User', 8, 'auth_token', '9b103d59a6f148c7153e4c411fac11bf46e8ebeb886835c967a3f3896476da29', '[\"*\"]', '2022-04-16 06:29:21', '2022-03-29 08:05:49', '2022-04-16 06:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(11, 35, 1, '2024-01-16 08:41:33', '2024-01-16 08:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_attachments`
--

INSERT INTO `support_attachments` (`id`, `support_message_id`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 6, '5ff1cd83c827a1609682307.jpg', '2021-01-03 07:58:27', '2021-01-03 07:58:27'),
(2, 8, '5ff1d3c9a3c591609683913.jpg', '2021-01-03 08:25:13', '2021-01-03 08:25:13'),
(3, 9, '5ff1d3d69ab511609683926.png', '2021-01-03 08:25:26', '2021-01-03 08:25:26'),
(4, 10, '5ff2a60b733881609737739.jpg', '2021-01-03 23:22:19', '2021-01-03 23:22:19'),
(5, 11, '5ff2a61b5e0241609737755.jpg', '2021-01-03 23:22:35', '2021-01-03 23:22:35'),
(6, 12, '5ff2a62da8a951609737773.jpg', '2021-01-03 23:22:53', '2021-01-03 23:22:53'),
(7, 21, '5ff2bbbb6897b1609743291.docx', '2021-01-04 00:54:51', '2021-01-04 00:54:51'),
(8, 35, '5ff2bea23c7991609744034.docx', '2021-01-04 01:07:14', '2021-01-04 01:07:14'),
(9, 35, '5ff2bea23d8fa1609744034.docx', '2021-01-04 01:07:14', '2021-01-04 01:07:14'),
(10, 38, '5ff2bfbf2f9481609744319.docx', '2021-01-04 01:11:59', '2021-01-04 01:11:59'),
(11, 43, '5ff2dac6e521a1609751238.docx', '2021-01-04 03:07:18', '2021-01-04 03:07:18'),
(14, 53, '6094f795dfa401620375445.png', '2021-05-07 07:47:25', '2021-05-07 07:47:25'),
(15, 54, '6094f830810e01620375600.png', '2021-05-07 07:50:00', '2021-05-07 07:50:00'),
(16, 58, '6098ce4aa0f8a1620627018.png', '2021-05-10 05:40:18', '2021-05-10 05:40:18'),
(17, 59, '6098ce5f55e341620627039.png', '2021-05-10 05:40:39', '2021-05-10 05:40:39'),
(18, 59, '6098ce5f5a8e61620627039.png', '2021-05-10 05:40:39', '2021-05-10 05:40:39'),
(20, 66, '60a638a1cc01f1621506209.docx', '2021-05-20 09:53:29', '2021-05-20 09:53:29'),
(21, 68, '60bb580fc47f71622890511.png', '2021-06-05 10:25:11', '2021-06-05 10:25:11'),
(22, 69, '60bb581a0ff221622890522.docx', '2021-06-05 10:25:22', '2021-06-05 10:25:22'),
(23, 100, '62383bec3d82d1647852524.png', '2022-03-21 02:48:44', '2022-03-21 02:48:44'),
(24, 107, '6239a78108aec1647945601.png', '2022-03-22 09:10:02', '2022-03-22 09:10:02'),
(25, 110, '6239ab121e9221647946514.jpeg', '2022-03-22 09:25:14', '2022-03-22 09:25:14'),
(26, 110, '6239ab12402461647946514.jpeg', '2022-03-22 09:25:14', '2022-03-22 09:25:14'),
(29, 119, '624938901eab21648965776.pdf', '2022-04-03 04:32:56', '2022-04-03 04:32:56'),
(30, 119, '6249389030f681648965776.pdf', '2022-04-03 04:32:56', '2022-04-03 04:32:56'),
(31, 119, '624938905867d1648965776.pdf', '2022-04-03 04:32:56', '2022-04-03 04:32:56'),
(32, 119, '624938906b5621648965776.pdf', '2022-04-03 04:32:56', '2022-04-03 04:32:56'),
(33, 119, '62493890778f91648965776.pdf', '2022-04-03 04:32:56', '2022-04-03 04:32:56'),
(34, 121, '624a8a4eaa9911649052238.pdf', '2022-04-04 04:33:58', '2022-04-04 04:33:58'),
(35, 121, '624a8a4eb21b21649052238.pdf', '2022-04-04 04:33:58', '2022-04-04 04:33:58'),
(36, 121, '624a8a4eb7ff01649052238.pdf', '2022-04-04 04:33:58', '2022-04-04 04:33:58'),
(37, 121, '624a8a4ebe4e91649052238.pdf', '2022-04-04 04:33:58', '2022-04-04 04:33:58'),
(38, 121, '624a8a4ec435b1649052238.pdf', '2022-04-04 04:33:58', '2022-04-04 04:33:58'),
(39, 122, '624bd7bd9f77b1649137597.pdf', '2022-04-05 04:16:37', '2022-04-05 04:16:37'),
(40, 123, '624ea914315121649322260.png', '2022-04-07 07:34:20', '2022-04-07 07:34:20'),
(41, 123, '624ea9147c6e51649322260.png', '2022-04-07 07:34:20', '2022-04-07 07:34:20'),
(42, 123, '624ea914851b41649322260.png', '2022-04-07 07:34:20', '2022-04-07 07:34:20'),
(43, 123, '624ea914a995e1649322260.png', '2022-04-07 07:34:20', '2022-04-07 07:34:20'),
(44, 123, '624ea914b3cfa1649322260.png', '2022-04-07 07:34:20', '2022-04-07 07:34:20'),
(45, 136, '624eab9c85d3f1649322908.png', '2022-04-07 07:45:08', '2022-04-07 07:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `support_ticket_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'sdfgsfdsdfg', '2021-01-03 06:14:26', '2021-01-03 06:14:26'),
(2, 1, 1, 'asdfasdf asdfasdf', '2021-01-03 06:16:15', '2021-01-03 06:16:15'),
(3, 1, 0, 'dsfgdfghdfg dgfhdf dgh', '2021-01-03 06:46:03', '2021-01-03 06:46:03'),
(4, 1, 0, 'sdf aesgsdfg', '2021-01-03 06:46:34', '2021-01-03 06:46:34'),
(5, 1, 1, 'asdfasdfattachment', '2021-01-03 07:58:23', '2021-01-03 07:58:23'),
(6, 1, 1, 'asdfasdfattachment', '2021-01-03 07:58:27', '2021-01-03 07:58:27'),
(7, 2, 0, 'sdfg', '2021-01-03 08:24:45', '2021-01-03 08:24:45'),
(8, 2, 0, 'asdfasdf', '2021-01-03 08:25:13', '2021-01-03 08:25:13'),
(9, 3, 0, 'ffddffdff', '2021-01-03 08:25:26', '2021-01-03 08:25:26'),
(10, 2, 1, 'ff', '2021-01-03 23:22:19', '2021-01-03 23:22:19'),
(11, 2, 1, 'fff', '2021-01-03 23:22:35', '2021-01-03 23:22:35'),
(12, 1, 1, 'ffff', '2021-01-03 23:22:53', '2021-01-03 23:22:53'),
(13, 4, 0, 'asdfasdf', '2021-01-04 00:27:08', '2021-01-04 00:27:08'),
(14, 5, 0, 'asdfasdf', '2021-01-04 00:27:51', '2021-01-04 00:27:51'),
(15, 6, 0, 'asdfasdf', '2021-01-04 00:28:04', '2021-01-04 00:28:04'),
(16, 7, 0, 'asdfasdf', '2021-01-04 00:29:37', '2021-01-04 00:29:37'),
(17, 8, 0, 'asdfasdf', '2021-01-04 00:30:23', '2021-01-04 00:30:23'),
(19, 10, 0, 'asdf', '2021-01-04 00:54:35', '2021-01-04 00:54:35'),
(20, 11, 0, 'asdf', '2021-01-04 00:54:41', '2021-01-04 00:54:41'),
(21, 12, 0, 'asdf', '2021-01-04 00:54:51', '2021-01-04 00:54:51'),
(22, 12, 0, 'asdf', '2021-01-04 01:01:07', '2021-01-04 01:01:07'),
(23, 12, 0, 'asdf', '2021-01-04 01:01:31', '2021-01-04 01:01:31'),
(24, 12, 0, 'sdfg', '2021-01-04 01:02:18', '2021-01-04 01:02:18'),
(25, 12, 0, 'asdfasdf', '2021-01-04 01:02:49', '2021-01-04 01:02:49'),
(26, 12, 0, 'asdfasdf', '2021-01-04 01:02:55', '2021-01-04 01:02:55'),
(27, 12, 0, 'asdf', '2021-01-04 01:03:24', '2021-01-04 01:03:24'),
(28, 12, 0, 'asdf', '2021-01-04 01:03:33', '2021-01-04 01:03:33'),
(29, 12, 0, 'asdf', '2021-01-04 01:03:41', '2021-01-04 01:03:41'),
(30, 12, 0, 'asdf', '2021-01-04 01:03:51', '2021-01-04 01:03:51'),
(31, 12, 0, 'asdf', '2021-01-04 01:04:09', '2021-01-04 01:04:09'),
(32, 12, 0, 'asdf', '2021-01-04 01:04:29', '2021-01-04 01:04:29'),
(33, 12, 0, 'asdf', '2021-01-04 01:04:34', '2021-01-04 01:04:34'),
(34, 12, 0, 'ghdgh', '2021-01-04 01:06:45', '2021-01-04 01:06:45'),
(35, 12, 0, 'asdfasd', '2021-01-04 01:07:14', '2021-01-04 01:07:14'),
(36, 11, 1, 'asdfasdf', '2021-01-04 01:09:58', '2021-01-04 01:09:58'),
(37, 11, 1, 'asdfasdf', '2021-01-04 01:10:13', '2021-01-04 01:10:13'),
(38, 12, 0, 'asdfsfg sdfgdsfg hdfghdfghdfghdfghdfghdfghdfgh', '2021-01-04 01:11:59', '2021-01-04 01:11:59'),
(39, 12, 1, 'dfghfgj', '2021-01-04 03:05:42', '2021-01-04 03:05:42'),
(40, 12, 1, 'asdf', '2021-01-04 03:06:01', '2021-01-04 03:06:01'),
(41, 12, 1, 'asdf', '2021-01-04 03:06:15', '2021-01-04 03:06:15'),
(42, 12, 1, 'asdf', '2021-01-04 03:06:24', '2021-01-04 03:06:24'),
(43, 12, 1, 'asdf', '2021-01-04 03:07:18', '2021-01-04 03:07:18'),
(44, 13, 0, 'sdfsadfsdfg', '2021-03-06 01:03:48', '2021-03-06 01:03:48'),
(45, 13, 1, 'dfasdfasdfasdf', '2021-03-06 01:03:59', '2021-03-06 01:03:59'),
(46, 14, 0, 'asdasdfasdf', '2021-03-15 04:30:17', '2021-03-15 04:30:17'),
(47, 17, 0, 'asdf', '2021-03-15 04:32:52', '2021-03-15 04:32:52'),
(48, 18, 0, 'asdfasdf', '2021-05-03 10:39:08', '2021-05-03 10:39:08'),
(49, 19, 0, 'sdfgsdfg', '2021-05-07 07:40:50', '2021-05-07 07:40:50'),
(50, 19, 0, 'adsfadsf', '2021-05-07 07:43:15', '2021-05-07 07:43:15'),
(53, 20, 0, 'asdf', '2021-05-07 07:47:25', '2021-05-07 07:47:25'),
(54, 20, 0, 'asdf', '2021-05-07 07:50:00', '2021-05-07 07:50:00'),
(55, 21, 0, 'asdfasdf', '2021-05-08 04:20:10', '2021-05-08 04:20:10'),
(56, 22, 0, 'sdfgsdfg', '2021-05-09 04:48:46', '2021-05-09 04:48:46'),
(57, 23, 0, 'dfgsdfgsdfg', '2021-05-09 04:52:37', '2021-05-09 04:52:37'),
(58, 24, 0, 'sdfgsdfgsfdg', '2021-05-10 05:40:18', '2021-05-10 05:40:18'),
(59, 24, 0, 'asdfasdf', '2021-05-10 05:40:39', '2021-05-10 05:40:39'),
(60, 25, 0, 'sdfgsdfg', '2021-05-10 05:44:39', '2021-05-10 05:44:39'),
(61, 25, 1, 'asdfasdf', '2021-05-12 04:34:37', '2021-05-12 04:34:37'),
(63, 26, 0, 'asdfgsadfgasdfasdf', '2021-05-18 05:13:17', '2021-05-18 05:13:17'),
(64, 26, 0, 'dfgsdfgsdfgsdfg', '2021-05-18 05:15:37', '2021-05-18 05:15:37'),
(65, 26, 1, 'asdfasdfasdf', '2021-05-18 05:19:15', '2021-05-18 05:19:15'),
(66, 24, 1, 'ZXCZXC', '2021-05-20 09:53:29', '2021-05-20 09:53:29'),
(67, 24, 0, 'gfsdfgsdfg', '2021-05-30 11:42:17', '2021-05-30 11:42:17'),
(68, 27, 0, 'sdfgsdfg', '2021-06-05 10:25:11', '2021-06-05 10:25:11'),
(69, 27, 0, 'sdfgsdfg', '2021-06-05 10:25:22', '2021-06-05 10:25:22'),
(70, 27, 1, 'asdfasdfasdf', '2021-06-05 13:18:55', '2021-06-05 13:18:55'),
(71, 21, 1, 'rftghdfghdfgh', '2021-06-05 13:28:57', '2021-06-05 13:28:57'),
(72, 21, 1, 'rftghdfghdfgh', '2021-06-05 13:29:15', '2021-06-05 13:29:15'),
(73, 28, 0, 'rgtsdfgsdfg', '2021-06-17 12:19:16', '2021-06-17 12:19:16'),
(74, 29, 0, 'asdfasdf', '2021-06-17 12:20:26', '2021-06-17 12:20:26'),
(75, 30, 0, 'asdfasdf', '2021-06-17 12:22:10', '2021-06-17 12:22:10'),
(76, 31, 0, 'Sed tenetur voluptat', '2022-02-23 00:57:45', '2022-02-23 00:57:45'),
(77, 32, 0, 'Sint doloremque aut', '2022-02-23 00:58:05', '2022-02-23 00:58:05'),
(78, 33, 0, 'Aperiam lorem cupidi', '2022-02-23 01:12:51', '2022-02-23 01:12:51'),
(79, 34, 0, 'Aperiam lorem cupidi', '2022-02-23 01:12:59', '2022-02-23 01:12:59'),
(80, 35, 0, 'Consectetur in qui', '2022-02-23 01:13:10', '2022-02-23 01:13:10'),
(81, 36, 0, 'Consectetur in qui', '2022-02-23 01:13:21', '2022-02-23 01:13:21'),
(82, 37, 0, 'Atque magnam exercit', '2022-02-23 01:13:33', '2022-02-23 01:13:33'),
(83, 38, 0, 'Quidem aut accusanti', '2022-02-23 01:15:29', '2022-02-23 01:15:29'),
(84, 39, 0, 'Possimus excepteur', '2022-02-23 01:16:40', '2022-02-23 01:16:40'),
(85, 40, 0, 'Ea molestiae aut eni', '2022-02-23 01:17:29', '2022-02-23 01:17:29'),
(86, 41, 0, 'In qui nulla ullamco', '2022-02-23 01:17:42', '2022-02-23 01:17:42'),
(87, 42, 0, 'Quia natus voluptati', '2022-02-23 01:19:12', '2022-02-23 01:19:12'),
(88, 43, 0, 'Quia natus voluptati', '2022-02-23 01:19:20', '2022-02-23 01:19:20'),
(89, 44, 0, 'Nostrud itaque reici', '2022-02-23 01:58:43', '2022-02-23 01:58:43'),
(90, 45, 0, 'sdfg', '2022-02-23 07:50:09', '2022-02-23 07:50:09'),
(91, 46, 0, 'sdfg', '2022-02-23 07:50:59', '2022-02-23 07:50:59'),
(92, 47, 0, 'Natus adipisicing qu', '2022-03-05 06:32:42', '2022-03-05 06:32:42'),
(94, 30, 0, 'ff', '2022-03-19 05:57:32', '2022-03-19 05:57:32'),
(95, 30, 0, '0000000000', '2022-03-19 06:01:04', '2022-03-19 06:01:04'),
(96, 30, 0, 'ggggg', '2022-03-19 06:01:21', '2022-03-19 06:01:21'),
(97, 30, 0, 'ff', '2022-03-19 06:01:54', '2022-03-19 06:01:54'),
(98, 30, 0, 'sdfsdf', '2022-03-19 06:02:50', '2022-03-19 06:02:50'),
(99, 30, 0, 'asdf', '2022-03-21 00:35:33', '2022-03-21 00:35:33'),
(100, 47, 1, 'asdfasdf', '2022-03-21 02:48:44', '2022-03-21 02:48:44'),
(101, 48, 0, 'Explicabo Dignissim', '2022-03-22 08:30:31', '2022-03-22 08:30:31'),
(102, 48, 0, 'asdfgsdfg', '2022-03-22 08:32:54', '2022-03-22 08:32:54'),
(103, 49, 0, 'Dignissimos eos et t', '2022-03-22 08:58:43', '2022-03-22 08:58:43'),
(104, 49, 0, 'asdfasdf', '2022-03-22 09:07:03', '2022-03-22 09:07:03'),
(105, 49, 1, 'fffffff', '2022-03-22 09:07:47', '2022-03-22 09:07:47'),
(107, 49, 0, 'sdrgsdfg', '2022-03-22 09:10:00', '2022-03-22 09:10:00'),
(108, 49, 1, 'sdfggggggggggggggggggggggggg  dddddddddddddd', '2022-03-22 09:17:28', '2022-03-22 09:17:28'),
(109, 49, 1, 'sdfgsfg', '2022-03-22 09:18:35', '2022-03-22 09:18:35'),
(110, 49, 1, 'asdfasdfadsf', '2022-03-22 09:25:14', '2022-03-22 09:25:14'),
(112, 49, 1, 'gg', '2022-03-30 09:42:35', '2022-03-30 09:42:35'),
(113, 49, 1, 'gg', '2022-03-30 09:43:24', '2022-03-30 09:43:24'),
(114, 49, 1, 'gg', '2022-03-30 09:44:19', '2022-03-30 09:44:19'),
(115, 49, 1, 'gg', '2022-03-30 09:50:10', '2022-03-30 09:50:10'),
(116, 49, 1, 'gg', '2022-03-30 09:50:30', '2022-03-30 09:50:30'),
(118, 50, 0, 'Quo tempor doloremqu', '2022-04-03 03:39:13', '2022-04-03 03:39:13'),
(119, 36, 1, 'ff', '2022-04-03 04:32:56', '2022-04-03 04:32:56'),
(120, 51, 0, 'In in totam nobis om', '2022-04-03 07:52:21', '2022-04-03 07:52:21'),
(121, 51, 1, 'h', '2022-04-04 04:33:58', '2022-04-04 04:33:58'),
(122, 51, 1, 'sdfg', '2022-04-05 04:16:37', '2022-04-05 04:16:37'),
(123, 51, 1, 'dfgsdfg sdfg sd', '2022-04-07 07:34:20', '2022-04-07 07:34:20'),
(124, 51, 1, 'sadfasdf asdfasdfasdf', '2022-04-07 07:34:31', '2022-04-07 07:34:31'),
(125, 49, 1, 'sdfg sfgsfg', '2022-04-07 07:35:03', '2022-04-07 07:35:03'),
(126, 51, 1, 'adsfasdf', '2022-04-07 07:37:11', '2022-04-07 07:37:11'),
(127, 51, 1, 'adsfasdf', '2022-04-07 07:37:48', '2022-04-07 07:37:48'),
(128, 51, 1, 'adsfasdf', '2022-04-07 07:37:58', '2022-04-07 07:37:58'),
(129, 51, 1, 'adsfasdf', '2022-04-07 07:38:07', '2022-04-07 07:38:07'),
(130, 51, 1, 'adsfasdf', '2022-04-07 07:38:36', '2022-04-07 07:38:36'),
(131, 51, 1, 'adsfasdf', '2022-04-07 07:38:43', '2022-04-07 07:38:43'),
(132, 51, 1, 'adsfasdf', '2022-04-07 07:38:55', '2022-04-07 07:38:55'),
(133, 51, 1, 'adsfasdf', '2022-04-07 07:40:28', '2022-04-07 07:40:28'),
(134, 51, 1, 'adsfasdf', '2022-04-07 07:40:45', '2022-04-07 07:40:45'),
(135, 51, 1, 'asdfsadfsdf', '2022-04-07 07:42:34', '2022-04-07 07:42:34'),
(136, 51, 1, 'j', '2022-04-07 07:45:08', '2022-04-07 07:45:08'),
(137, 52, 0, 'Quia lorem iusto in', '2022-04-09 02:12:51', '2022-04-09 02:12:51'),
(138, 52, 0, 'asdfasdf asdfasdf', '2022-04-09 02:12:57', '2022-04-09 02:12:57'),
(139, 52, 0, 'asdfadsf', '2022-04-09 02:13:26', '2022-04-09 02:13:26'),
(140, 52, 0, 'asdf', '2022-04-09 02:14:33', '2022-04-09 02:14:33'),
(141, 52, 1, 'dfsdfgsdfg', '2022-09-26 14:01:26', '2022-09-26 14:01:26'),
(142, 52, 1, 'fsadf', '2023-11-15 14:03:19', '2023-11-15 14:03:19'),
(143, 53, 0, 'heloo elearning', '2023-12-05 01:10:37', '2023-12-05 01:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT 0,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `ticket` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `name`, `email`, `ticket`, `subject`, `status`, `priority`, `last_reply`, `created_at`, `updated_at`) VALUES
(28, 0, 'Marchant Marchant', 'marchant@gmail.com', '92776025', 'yturtyhd', 0, 2, '2021-06-17 18:19:16', '2021-06-17 12:19:16', '2021-06-17 12:19:16'),
(29, 8, 'Marchant Marchant', 'marchant@gmail.com', '08230823', 'asdfasdf', 3, 2, '2021-06-17 18:20:26', '2021-06-17 12:20:26', '2022-04-04 05:49:53'),
(30, 8, 'f33 h', 'user@site.com', '54825065', 'asdf', 3, 2, '2022-03-21 06:35:33', '2021-06-17 12:22:10', '2022-04-03 03:00:18'),
(31, 0, 'Stone Dennis', 'pybezeha@amimail.com', '57495475', 'Elit corporis est', 0, 2, '2022-02-23 06:57:45', '2022-02-23 00:57:45', '2022-02-23 00:57:45'),
(32, 0, 'Willow Nguyen', 'cupe@amimail.com', '29070859', 'Eveniet adipisicing', 0, 2, '2022-02-23 06:58:05', '2022-02-23 00:58:05', '2022-02-23 00:58:05'),
(33, 0, 'Cole Byers', 'nuhydej@amimail.com', '68231262', 'Perferendis qui dele', 0, 2, '2022-02-23 07:12:51', '2022-02-23 01:12:51', '2022-02-23 01:12:51'),
(34, 0, 'Cole Byers', 'nuhydej@amimail.com', '58246189', 'Perferendis qui dele', 0, 2, '2022-02-23 07:12:59', '2022-02-23 01:12:59', '2022-02-23 01:12:59'),
(35, 0, 'Keane Hunter', 'pafori@amimail.com', '80866392', 'Qui saepe harum quamQui saepe harum quamQui saepe harum quam', 0, 2, '2022-02-23 07:13:10', '2022-02-23 01:13:10', '2022-02-23 01:13:10'),
(36, 0, 'Keane Hunter', 'pafori@amimail.com', '13088897', 'Natus quidem laborum', 2, 2, '2022-04-03 10:32:56', '2022-02-23 01:13:21', '2022-04-03 04:32:56'),
(37, 0, 'India Morrow', 'dawilazajy@amimail.com', '82511865', 'Earum voluptates qui', 0, 2, '2022-02-23 07:13:33', '2022-02-23 01:13:33', '2022-02-23 01:13:33'),
(38, 0, 'Lareina Robles', 'kuwosejeji@amimail.com', '12583429', 'Dolor nobis placeat', 0, 2, '2022-02-23 07:15:29', '2022-02-23 01:15:29', '2022-02-23 01:15:29'),
(39, 0, 'Darryl Coffey', 'beseruko@amimail.com', '70052193', 'Quae dolor deserunt', 0, 2, '2022-02-23 07:16:40', '2022-02-23 01:16:40', '2022-02-23 01:16:40'),
(40, 0, 'Katelyn Hansen', 'mamyvyli@amimail.com', '18796027', 'Qui lorem voluptas e', 0, 2, '2022-02-23 07:17:29', '2022-02-23 01:17:29', '2022-02-23 01:17:29'),
(41, 0, 'Ursa Fulton', 'hejyl@amimail.com', '18352800', 'Expedita elit aut i', 0, 2, '2022-02-23 07:17:42', '2022-02-23 01:17:42', '2022-02-23 01:17:42'),
(42, 0, 'Rebekah Fulton', 'bicikocaza@amimail.com', '15754786', 'Illo sed dolor incid', 0, 2, '2022-02-23 07:19:12', '2022-02-23 01:19:12', '2022-02-23 01:19:12'),
(43, 0, 'Rebekah Fulton', 'bicikocaza@amimail.com', '95463552', 'Illo sed dolor incid', 0, 2, '2022-02-23 07:19:20', '2022-02-23 01:19:20', '2022-02-23 01:19:20'),
(44, 0, 'Jada Fry', 'nojomopa@amimail.com', '51547138', 'Sint ut natus accusa', 0, 2, '2022-02-23 07:58:43', '2022-02-23 01:58:43', '2022-02-23 01:58:43'),
(45, 0, 'sgd', 'sdfg', '76951166', 'dfg', 0, 2, '2022-02-23 13:50:09', '2022-02-23 07:50:09', '2022-02-23 07:50:09'),
(46, 0, 'sgd', 'sdfg', '70632904', 'dfg', 0, 2, '2022-02-23 13:50:59', '2022-02-23 07:50:59', '2022-02-23 07:50:59'),
(47, 0, 'Destiny Wise', 'jaqidisyb@amimail.com', '54666280', 'Qui saepe harum quam', 1, 2, '2022-03-21 08:48:44', '2022-03-05 06:32:41', '2022-03-21 02:48:44'),
(48, 30, 'Herrod Parrish', 'fevu@amimail.com', '581151', 'Optio esse veniam', 3, 2, '2022-03-22 14:32:54', '2022-03-22 08:30:31', '2022-03-22 08:32:58'),
(49, 30, 'Herrod Parrish', 'fevu@amimail.com', '403997', 'Vel ut qui tenetur f', 2, 3, '2022-04-07 13:35:03', '2022-03-22 08:58:43', '2022-04-07 07:35:03'),
(50, 0, 'Timon Kim', 'vozuxad@mailinator.com', '40031718', 'In molestiae delenit', 0, 2, '2022-04-03 09:39:13', '2022-04-03 03:39:13', '2022-04-03 03:39:13'),
(51, 0, 'Roth Mcneil', 'tavexora@mailinator.com', '36771383', 'Facilis dolore natus', 2, 2, '2022-04-07 13:45:08', '2022-04-03 07:52:21', '2022-04-07 07:45:08'),
(52, 0, 'Colin Mccray', 'cizepuda@amimail.com', '06772251', 'Sapiente sit consequ', 1, 2, '2023-11-15 20:03:19', '2022-04-09 02:12:51', '2023-11-15 14:03:19'),
(53, 0, 'demouser', 'demouser@gmail.com', '03199251', 'New', 0, 2, '2023-12-05 07:10:37', '2023-12-05 01:10:37', '2023-12-05 01:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `post_balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `trx_type` varchar(40) DEFAULT NULL,
  `trx` varchar(40) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `remark` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `charge`, `post_balance`, `trx_type`, `trx`, `details`, `remark`, `created_at`, `updated_at`) VALUES
(1, 29, 100.00000000, 2.00000000, 100.00000000, '+', 'AHROWMD1MXO6', 'Deposit Via Stripe Hosted - USD', 'deposit', NULL, NULL),
(2, 29, 100.00000000, 2.00000000, 200.00000000, '+', 'T29P6QSQTQU2', 'Deposit Via Stripe Hosted - USD', 'deposit', '2022-03-21 04:05:04', '2022-03-21 04:05:04'),
(3, 8, 19.54700000, 0.00000000, 14787.55755565, '+', 'DG7V5FHHV24Z', 'Qui enim nisi eos ra', 'balance_add', '2022-03-21 07:07:49', '2022-03-21 07:07:49'),
(4, 8, 10.00000000, 1.10000000, 14777.55755565, '-', 'H3SQMS7PW6FV', '8.90 USD Withdraw Via Cheyenne Justice', 'withdraw', '2022-03-24 04:47:11', '2022-03-24 04:47:11'),
(6, 8, 10.00000000, 0.00000000, 14817.55755565, '+', 'MM3HNXB4PMO6', '256', 'balance_add', '2022-03-30 10:02:06', '2022-03-30 10:02:06'),
(7, 8, 100.00000000, 3.00000000, 14717.55755565, '-', '63QSRS186WNB', '97.00 USD Withdraw Via Bank Transfer', 'withdraw', '2022-04-03 04:23:38', '2022-04-03 04:23:38'),
(8, 8, 100.00000000, 0.00000000, 14817.55755565, '+', '63QSRS186WNB', '100.00 USD Refunded from withdrawal rejection', 'withdraw_reject', '2022-04-03 04:25:53', '2022-04-03 04:25:53'),
(9, 8, 100.00000000, 3.00000000, 14717.55755565, '-', '9JO7WE2YMWJY', '97.00 USD Withdraw Via Bank Transfer', 'withdraw', '2022-04-04 05:37:37', '2022-04-04 05:37:37'),
(10, 35, 20.00000000, 0.00000000, 10000.00000000, '-', 'HGVRXHO18M42', 'Course buy viaTest User\'s net balance', 'Purchase_from_wallet', '2024-01-12 11:12:50', '2024-01-12 11:12:50'),
(11, 35, 50.00000000, 0.00000000, 9930.00000000, '-', 'KFW23WDR446B', 'Course buy viaTest User\'s net balance', 'Purchase_from_wallet', '2024-01-14 01:02:09', '2024-01-14 01:02:09'),
(12, 35, 50.00000000, 0.00000000, 9880.00000000, '-', '6NSGE4FUEOFP', 'Course buy viaTest User\'s net balance', 'Purchase_from_wallet', '2024-01-16 08:41:33', '2024-01-16 08:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `gauth_id` int(11) DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `country_code` varchar(40) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `ref_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `designation` varchar(255) DEFAULT NULL,
  `user_type` tinyint(2) NOT NULL DEFAULT 0,
  `kyc_data` text DEFAULT NULL,
  `kv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: KYC Unverified, 2: KYC pending, 1: KYC verified',
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: mobile unverified, 1: mobile verified',
  `reg_step` tinyint(1) NOT NULL DEFAULT 0,
  `ver_code` varchar(40) DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) DEFAULT NULL,
  `ban_reason` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `gauth_id`, `firstname`, `lastname`, `username`, `email`, `country_code`, `mobile`, `ref_by`, `balance`, `password`, `image`, `address`, `status`, `designation`, `user_type`, `kyc_data`, `kv`, `ev`, `sv`, `reg_step`, `ver_code`, `ver_code_send_at`, `ts`, `tv`, `tsc`, `ban_reason`, `remember_token`, `created_at`, `updated_at`) VALUES
(35, NULL, 'Test', 'User', 'testuser', 'testuser@gmail.com', 'AF', '93123456', 0, 9880.00000000, '$2y$10$/LzyzkcZg0NANjb9pOd7Q..8/.B/u1gdi1aQRkrnBOKrkbfqcG5KC', NULL, '{\"address\":null,\"state\":null,\"zip\":null,\"country\":\"Afghanistan\",\"city\":null}', 1, NULL, 0, NULL, 1, 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, '2023-12-08 10:42:41', '2024-01-16 08:41:33'),
(39, 7, 'Hridoy', 'Khan', 'hridoy7', 'majid.hridoy@gmail.com', NULL, NULL, 0, 0.00000000, '', 'https://lh3.googleusercontent.com/a/ACg8ocJQivX1JmHJgpWwAByVb8yDvlUI7mEcNljx_FkF9JI4JA=s96-c', NULL, 1, 'Web Developer', 0, NULL, 1, 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, '2024-01-07 01:44:15', '2024-01-07 01:47:27'),
(41, NULL, 'Stave', 'Smith', 'demouser', 'demouser@gmail.com', 'AF', '9301312617206', 0, 269.40000000, '$2y$10$hEGXff8aW/PTbstPUlV4GuB3wI29FsQ0NZ802KaGcXrkxTGgxmRCu', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"Afghanistan\",\"city\":\"\"}', 0, 'Web Developer', 1, NULL, 1, 1, 1, 1, NULL, NULL, 0, 1, NULL, 'fsadfsdafdsg fgds', NULL, '2024-01-08 11:27:18', '2024-01-18 09:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_ip` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `country_code` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `city`, `country`, `country_code`, `longitude`, `latitude`, `browser`, `os`, `created_at`, `updated_at`) VALUES
(1, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-22 04:09:56', '2023-03-22 04:09:56'),
(2, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-10 03:33:33', '2023-11-10 03:33:33'),
(3, 34, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-08 10:15:43', '2023-12-08 10:15:43'),
(4, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-08 10:42:41', '2023-12-08 10:42:41'),
(5, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-08 10:56:12', '2023-12-08 10:56:12'),
(6, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-08 10:56:37', '2023-12-08 10:56:37'),
(7, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-09 09:10:42', '2023-12-09 09:10:42'),
(8, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-18 21:42:29', '2023-12-18 21:42:29'),
(9, 35, '127.0.0.1', '', '', '', '', '', 'Opera', 'Windows 10', '2023-12-19 10:38:45', '2023-12-19 10:38:45'),
(10, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-25 03:07:48', '2023-12-25 03:07:48'),
(11, 35, '127.0.0.1', '', '', '', '', '', 'Opera', 'Windows 10', '2023-12-25 09:26:03', '2023-12-25 09:26:03'),
(12, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-28 23:21:40', '2023-12-28 23:21:40'),
(13, 35, '127.0.0.1', '', '', '', '', '', 'Firefox', 'Windows 10', '2023-12-29 08:38:02', '2023-12-29 08:38:02'),
(14, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-12-29 23:37:28', '2023-12-29 23:37:28'),
(15, 35, '127.0.0.1', '', '', '', '', '', 'Opera', 'Windows 10', '2023-12-30 09:47:46', '2023-12-30 09:47:46'),
(16, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-03 11:54:57', '2024-01-03 11:54:57'),
(17, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-03 12:31:39', '2024-01-03 12:31:39'),
(18, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-04 00:22:34', '2024-01-04 00:22:34'),
(19, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-06 07:10:56', '2024-01-06 07:10:56'),
(20, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-06 11:07:28', '2024-01-06 11:07:28'),
(21, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-07 11:44:42', '2024-01-07 11:44:42'),
(22, 40, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-08 10:50:45', '2024-01-08 10:50:45'),
(23, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-08 11:27:18', '2024-01-08 11:27:18'),
(24, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-09 01:08:18', '2024-01-09 01:08:18'),
(25, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-09 08:52:28', '2024-01-09 08:52:28'),
(26, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-09 11:47:10', '2024-01-09 11:47:10'),
(27, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-09 13:00:46', '2024-01-09 13:00:46'),
(28, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-09 22:39:58', '2024-01-09 22:39:58'),
(29, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-10 09:13:41', '2024-01-10 09:13:41'),
(30, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-10 09:19:41', '2024-01-10 09:19:41'),
(31, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-10 10:47:01', '2024-01-10 10:47:01'),
(32, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-10 11:15:14', '2024-01-10 11:15:14'),
(33, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-10 13:11:01', '2024-01-10 13:11:01'),
(34, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-10 22:39:36', '2024-01-10 22:39:36'),
(35, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-10 23:35:59', '2024-01-10 23:35:59'),
(36, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-11 07:28:19', '2024-01-11 07:28:19'),
(37, 41, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-11 07:43:55', '2024-01-11 07:43:55'),
(38, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-11 23:26:22', '2024-01-11 23:26:22'),
(39, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-12 09:32:21', '2024-01-12 09:32:21'),
(40, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-12 10:43:27', '2024-01-12 10:43:27'),
(41, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-14 00:12:16', '2024-01-14 00:12:16'),
(42, 35, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2024-01-16 08:37:03', '2024-01-16 08:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `currency` varchar(40) DEFAULT NULL,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `trx` varchar(40) DEFAULT NULL,
  `final_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `after_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `withdraw_information` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `method_id`, `user_id`, `amount`, `currency`, `rate`, `charge`, `trx`, `final_amount`, `after_charge`, `withdraw_information`, `status`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 100.00000000, 'USD', 1.00000000, 3.00000000, '63QSRS186WNB', 97.00000000, 97.00000000, '[{\"name\":\"Bank Name\",\"type\":\"text\",\"value\":\"Hilary Irwin\"},{\"name\":\"Account Name\",\"type\":\"text\",\"value\":\"Mira Bishop\"},{\"name\":\"Account Number\",\"type\":\"text\",\"value\":\"384\"}]', 1, 'ffffff', '2022-03-01 04:23:33', '2022-04-03 04:25:53'),
(2, 1, 8, 10.00000000, 'USD', 1.00000000, 1.20000000, 'QNVJZSWATSH2', 8.80000000, 8.80000000, NULL, 1, NULL, '2022-04-03 06:38:22', '2022-04-03 06:38:22'),
(3, 1, 8, 100.00000000, 'USD', 1.00000000, 3.00000000, '9JO7WE2YMWJY', 97.00000000, 97.00000000, '[{\"name\":\"Bank Name\",\"type\":\"text\",\"value\":\"Yardley Castaneda\"},{\"name\":\"Account Name\",\"type\":\"text\",\"value\":\"Chelsea Collins\"},{\"name\":\"Account Number\",\"type\":\"text\",\"value\":\"969\"}]', 1, NULL, '2022-04-04 05:37:32', '2022-04-04 05:37:37'),
(4, 1, 8, 10.00000000, 'USD', 1.00000000, 1.20000000, 'B5B3RT3VN1XH', 8.80000000, 8.80000000, NULL, 0, NULL, '2022-04-05 05:13:26', '2022-04-05 05:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(40) DEFAULT NULL,
  `min_limit` decimal(28,8) DEFAULT 0.00000000,
  `max_limit` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `fixed_charge` decimal(28,8) DEFAULT 0.00000000,
  `rate` decimal(28,8) DEFAULT 0.00000000,
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `form_id`, `name`, `min_limit`, `max_limit`, `fixed_charge`, `rate`, `percent_charge`, `currency`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 'Bank Transfer', 1.00000000, 1000.00000000, 1.00000000, 1.00000000, 2.00, 'USD', '<p>Please Provide The information Below:</p>', 0, '2022-03-30 09:09:11', '2024-01-18 23:48:14'),
(2, 14, 'Mobile Fund Transfer', 1.00000000, 1000.00000000, 0.00000000, 1.00000000, 0.01, 'USD', '<p>Please Provide The Information Below:<br>&nbsp;</p>', 1, '2022-03-30 09:10:12', '2024-01-18 23:54:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_details`
--
ALTER TABLE `category_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_details`
--
ALTER TABLE `category_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
