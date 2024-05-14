-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3309
-- Generation Time: May 14, 2024 at 05:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `userId` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_01_093647_create_permission_tables', 1),
(5, '2021_04_01_093648_create_room_table', 1),
(6, '2021_04_01_093806_create_students_table', 1),
(7, '2021_04_01_131308_add_details_to_student', 1),
(8, '2021_04_02_040938_add_photo_to_student', 1),
(9, '2021_04_02_092846_add_roomid_to_student', 1),
(10, '2021_05_20_031755_create_articles_table', 1),
(11, '2021_06_20_074202_add_id_user_to_articles', 1);

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
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ms_formdatadiri`
--

CREATE TABLE `ms_formdatadiri` (
  `Id` int NOT NULL,
  `VisitorName` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Yes',
  `Email` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Yes',
  `Phone` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Yes',
  `Gender` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Yes',
  `Address` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Yes',
  `Company` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Yes',
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ms_formdatadiri`
--

INSERT INTO `ms_formdatadiri` (`Id`, `VisitorName`, `Email`, `Phone`, `Gender`, `Address`, `Company`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(1, 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', '2024-04-24 08:38:21', '1', '2024-05-03 07:15:32', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ms_formsyaratdanketentuan`
--

CREATE TABLE `ms_formsyaratdanketentuan` (
  `Id` int NOT NULL,
  `Activated` enum('Yes','No') DEFAULT 'Yes',
  `TermsAndConditions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ms_formsyaratdanketentuan`
--

INSERT INTO `ms_formsyaratdanketentuan` (`Id`, `Activated`, `TermsAndConditions`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(1, 'Yes', '<ol><li>Pengunjung wajib mematuhi seluruh Syarat dan Ketentuan ini.&nbsp;</li><li>Pengunjung dilarang menggunakan alat komunikasi elektronik di area Perusahaan, kecuali dengan izin dari Perusahaan.</li><li>Pengunjung dilarang membawa dan menggunakan kamera di area Perusahaan, kecuali dengan izin dari Perusahaan.</li><li>Pengunjung dilarang mengambil gambar atau video di area Perusahaan, kecuali dengan izin dari Perusahaan.</li><li>Pengunjung dilarang membawa dan meninggalkan benda-benda di area Perusahaan&nbsp;tanpa izin dari Perusahaan.</li><li>Perusahaan berhak untuk menolak masuknya Pengunjung ke area Perusahaan, dengan alasan yang wajar.</li><li>Pengunjung bertanggung jawab atas segala kerusakan yang ditimbulkan oleh dirinya sendiri atau barang bawaannya di area Perusahaan.<br></li></ol>', '2024-04-25 09:00:42', '1', '2024-04-25 14:16:45', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ms_formtujuan`
--

CREATE TABLE `ms_formtujuan` (
  `Id` int NOT NULL,
  `All` enum('Yes','No') DEFAULT NULL,
  `AddresseesName` enum('Yes','No') DEFAULT NULL,
  `AddresseesPhone` enum('Yes','No') DEFAULT NULL,
  `DepartmentDestination` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Yes',
  `ArrivalDestination` enum('Yes','No') DEFAULT NULL,
  `NumberOfPersons` enum('Yes','No') DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ms_formtujuan`
--

INSERT INTO `ms_formtujuan` (`Id`, `All`, `AddresseesName`, `AddresseesPhone`, `DepartmentDestination`, `ArrivalDestination`, `NumberOfPersons`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(1, 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', '2024-04-24 11:13:17', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_qr`
--

CREATE TABLE `ms_qr` (
  `Id` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `LinkUrl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ms_qr`
--

INSERT INTO `ms_qr` (`Id`, `Name`, `LinkUrl`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(3, 'Link URL Form Register', 'https://e-receptionist.omas-mfg.com', '2024-05-08 08:31:03', NULL, '2024-04-25 10:56:24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ms_telegramtokens`
--

CREATE TABLE `ms_telegramtokens` (
  `Id` int NOT NULL,
  `Departments` varchar(75) DEFAULT NULL,
  `Tokens` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `RequestUrls` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ms_telegramtokens`
--

INSERT INTO `ms_telegramtokens` (`Id`, `Departments`, `Tokens`, `RequestUrls`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(10, 'All', '7154584647:AAECe9pjZbHPiZidrlp2qIst8DBsmfIQMEE', 'TELEGRAM_BOT_TOKEN', '2024-05-08 08:33:02', NULL, '2024-05-07 10:08:06', '1'),
(12, 'All', '-1002109644192', 'TELEGRAM_CHANNEL_ID', '2024-05-08 08:33:16', NULL, NULL, NULL),
(13, 'IT', 'test', 'test', NULL, NULL, NULL, NULL);

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
(1, 'student-list', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(2, 'student-create', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(3, 'student-edit', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(4, 'user-list', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(5, 'user-create', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(6, 'user-edit', 'web', '2024-04-02 20:53:37', '2024-04-02 20:53:37'),
(28, 'form', 'web', '2024-04-25 02:19:03', '2024-04-25 02:19:03'),
(29, 'qr', 'web', '2024-04-25 03:56:45', '2024-04-25 03:56:45'),
(30, 'telegram', 'web', '2024-04-26 03:54:50', '2024-04-26 03:54:50'),
(31, 'pengunjung', 'web', '2024-05-08 01:19:49', '2024-05-08 01:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_bu`
--

CREATE TABLE `permissions_bu` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_bu`
--

INSERT INTO `permissions_bu` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'student-list', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(2, 'student-create', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(3, 'student-edit', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(4, 'user-list', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(5, 'user-create', 'web', '2024-04-02 20:53:36', '2024-04-02 20:53:36'),
(6, 'user-edit', 'web', '2024-04-02 20:53:37', '2024-04-02 20:53:37');

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
(1, 'Super Admin', 'web', '2024-04-02 20:53:37', '2024-04-02 20:53:37'),
(2, 'Student', 'web', '2024-04-02 20:55:54', '2024-04-02 20:55:54'),
(3, 'sa', 'web', '2024-04-23 02:34:18', '2024-04-23 02:34:18');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(1, 2),
(4, 2),
(1, 3),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` bigint UNSIGNED NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `room`, `details`, `created_at`, `updated_at`) VALUES
(1, '1A', 'Class 1A', '2024-04-02 20:53:37', '2024-04-02 20:53:37'),
(2, '2A', 'Class 2A', '2024-04-02 20:53:37', '2024-04-02 20:53:37'),
(3, '3A', 'Class 3A', '2024-04-02 20:53:37', '2024-04-02 20:53:37'),
(4, '1B', 'Class 1B', '2024-04-02 20:53:37', '2024-04-02 20:53:37'),
(5, '2B', 'Class 2B', '2024-04-02 20:53:37', '2024-04-02 20:53:37'),
(6, '3B', 'Class 3B', '2024-04-02 20:53:37', '2024-04-02 20:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `roomId` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roomId`, `name`, `nim`, `phone`, `email`, `photo`, `created_at`, `updated_at`) VALUES
(2, 1, 'Test', '1234455667788', '1233333333333', 'user@gmail.com', '1234455667788.png', '2024-04-02 22:38:34', '2024-04-02 22:38:34'),
(3, 1, 'Test 2', '11223344556677', '081390076655', 'user2@gmail.com', '11223344556677.png', '2024-04-02 22:57:13', '2024-04-02 22:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `trans_visitor`
--

CREATE TABLE `trans_visitor` (
  `Id` int NOT NULL,
  `Tickets` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `VisitorName` varchar(75) DEFAULT NULL,
  `VisitorEmail` varchar(75) DEFAULT NULL,
  `VisitorPhone` varchar(18) DEFAULT NULL,
  `VisitorGender` varchar(2) DEFAULT NULL,
  `VisitorAddress` varchar(255) DEFAULT NULL,
  `VisitorCompany` varchar(75) DEFAULT NULL,
  `AddresseesName` varchar(75) DEFAULT NULL,
  `AddresseesPhone` varchar(18) DEFAULT NULL,
  `DepartmentDestination` varchar(25) DEFAULT NULL,
  `ArrivalDestination` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `NumberOfPersons` int DEFAULT NULL,
  `TermsAndConditions` longtext,
  `SaveInfo` varchar(3) DEFAULT NULL,
  `CheckinDate` datetime DEFAULT NULL,
  `CheckoutDate` datetime DEFAULT NULL,
  `CheckoutBy` enum('Visitor','User') DEFAULT NULL,
  `CheckoutDateLimit` datetime DEFAULT NULL,
  `Status` enum('In','Out') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Devices` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trans_visitor`
--

INSERT INTO `trans_visitor` (`Id`, `Tickets`, `VisitorName`, `VisitorEmail`, `VisitorPhone`, `VisitorGender`, `VisitorAddress`, `VisitorCompany`, `AddresseesName`, `AddresseesPhone`, `DepartmentDestination`, `ArrivalDestination`, `NumberOfPersons`, `TermsAndConditions`, `SaveInfo`, `CheckinDate`, `CheckoutDate`, `CheckoutBy`, `CheckoutDateLimit`, `Status`, `Devices`) VALUES
(1, 'XMWLVW2', 'John Doe', 'john@gmail.com', NULL, 'L', 'Kp. Cibadak, Bojong, Cikupa, Kab. Tangerang, Banten 15710.', NULL, 'Ibu Dika', NULL, 'HRD', 'Pertemuan', NULL, 'on', 'on', '2024-05-09 07:52:55', '2024-05-09 10:57:57', 'User', '2024-05-09 12:52:55', 'Out', 'Windows-WebKit-Chrome-10.0'),
(2, 'CZSKKXL', 'John Doe', 'john@gmail.com', NULL, 'L', 'Kp. Cibadak, Bojong, Cikupa, Kab. Tangerang, Banten 15710.', NULL, 'Ibu Dika', NULL, 'HRD', 'Wawancara & Psikotest', NULL, 'on', 'on', '2024-05-09 14:34:16', NULL, NULL, '2024-05-09 19:34:16', 'In', 'Windows-WebKit-Chrome-10.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$1iWeTWCoyiK5M6QlRZfat.INfw.9mDrJ/pFoodsjHS65wkrOp2SXK', 'G4NYbpeoPR05PdzqW3Ii9ELrfKUYUBVRA5hdSCO0GsBAP2rgDpScf9VEHOy8', '2024-04-02 20:53:37', '2024-05-08 07:55:07'),
(3, 'mudin', 'nj.mudin18@gmail.com', NULL, '$2y$10$ukGHJF0AwUWAL4DYM/n2cuh1mTSiwGXaw4eXn0kUoZrwtuvcUvPY6', NULL, '2024-04-23 03:20:56', '2024-04-23 03:20:56'),
(4, 'mudin', 'nj.mudin@yahoo.com', NULL, '$2y$10$R8eslJBPvK0ggIZI6ewh9usc1FOydwiN8/912DSs3dk0AEm2P8XWW', 'pF7F4Cu2AExzugnympctEemSHGgI2EkC6xClOi9G0B3vI9sRzsyxdRvaZKXn', '2024-04-23 03:21:20', '2024-04-23 07:10:31'),
(7, 'Test', 'test@gmail.com', NULL, '$2y$10$mMlE7zeKLLUGB0GW5iawCuquBh1EIYAp8MQhLPuzhq.ilRQbs9o4a', NULL, '2024-05-14 02:20:36', '2024-05-14 02:20:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_userid_index` (`userId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `ms_formdatadiri`
--
ALTER TABLE `ms_formdatadiri`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ms_formsyaratdanketentuan`
--
ALTER TABLE `ms_formsyaratdanketentuan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ms_formtujuan`
--
ALTER TABLE `ms_formtujuan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ms_qr`
--
ALTER TABLE `ms_qr`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ms_telegramtokens`
--
ALTER TABLE `ms_telegramtokens`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permissions_bu`
--
ALTER TABLE `permissions_bu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_roomid_index` (`roomId`);

--
-- Indexes for table `trans_visitor`
--
ALTER TABLE `trans_visitor`
  ADD PRIMARY KEY (`Id`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ms_formdatadiri`
--
ALTER TABLE `ms_formdatadiri`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_formsyaratdanketentuan`
--
ALTER TABLE `ms_formsyaratdanketentuan`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_formtujuan`
--
ALTER TABLE `ms_formtujuan`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_qr`
--
ALTER TABLE `ms_qr`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_telegramtokens`
--
ALTER TABLE `ms_telegramtokens`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions_bu`
--
ALTER TABLE `permissions_bu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_visitor`
--
ALTER TABLE `trans_visitor`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_roomid_foreign` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`roomId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
