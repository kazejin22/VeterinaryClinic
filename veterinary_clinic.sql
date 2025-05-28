-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2025 at 02:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterinary_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `pet_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `status` enum('scheduled','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `pet_id`, `doctor_id`, `service_id`, `time`, `status`, `created_at`, `updated_at`) VALUES
(72, 23, 3, 8, '2025-05-15 15:48:00', 'scheduled', '2025-05-04 01:48:22', '2025-05-04 01:48:22'),
(73, 24, 1, 3, '2025-05-06 17:47:00', 'scheduled', '2025-05-05 03:47:37', '2025-05-05 03:47:37'),
(74, 25, 4, 7, '2025-05-24 17:47:00', 'scheduled', '2025-05-05 03:47:51', '2025-05-05 03:47:51'),
(75, 24, 3, 9, '2025-05-31 17:48:00', 'scheduled', '2025-05-05 03:48:06', '2025-05-05 03:48:06'),
(76, 23, 1, 3, '2025-05-21 13:37:00', 'scheduled', '2025-05-05 23:37:47', '2025-05-05 23:37:47'),
(77, 26, 1, 4, '2025-05-30 13:44:00', 'scheduled', '2025-05-05 23:44:07', '2025-05-05 23:44:07'),
(78, 26, 1, 4, '2025-05-30 13:44:00', 'scheduled', '2025-05-05 23:44:09', '2025-05-05 23:44:09'),
(79, 23, 1, 3, '2025-05-22 13:59:00', 'scheduled', '2025-05-05 23:59:24', '2025-05-05 23:59:24'),
(80, 26, 3, 2, '2025-05-24 14:42:00', 'scheduled', '2025-05-06 00:42:48', '2025-05-06 00:42:48'),
(81, 23, 1, 3, '2025-05-23 16:02:00', 'scheduled', '2025-05-06 02:02:15', '2025-05-06 02:02:15'),
(82, 23, 1, 5, '2025-05-21 06:39:00', 'scheduled', '2025-05-18 16:39:38', '2025-05-18 16:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin@gmail.com|127.0.0.1', 'i:1;', 1746511499),
('laravel_cache_admin@gmail.com|127.0.0.1:timer', 'i:1746511499;', 1746511499);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `specialization`, `phone_number`, `email`, `license_number`, `created_at`, `updated_at`) VALUES
(1, 'andrew', 'Veterinary Dermatologist', '082145152022', 'andrew@gmail.com', '90809886757', '2025-04-28 01:07:09', '2025-05-04 01:13:33'),
(3, 'kia', 'Veterinary Oncologist', '082145152023', 'saskia@gmail.com', 'w234245654', '2025-04-28 17:52:51', '2025-05-04 01:14:14'),
(4, 'elpi', 'Veterinary Anesthesiologist', '082145152024', 'elvia@gmail.com', 'w23424234233', '2025-04-29 23:32:49', '2025-05-04 01:14:22');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `appointment_id` bigint UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `appointment_id`, `invoice_number`, `time`, `cost`, `created_at`, `updated_at`) VALUES
(44, 72, 'INV-00809098615A', '2025-05-15 15:48:00', '150.00', '2025-05-04 01:48:22', '2025-05-04 01:48:22'),
(45, 73, 'INV-6572AE6C0473', '2025-05-06 17:47:00', '50.00', '2025-05-05 03:47:37', '2025-05-05 03:47:37'),
(46, 74, 'INV-6252C020F92F', '2025-05-24 17:47:00', '35.00', '2025-05-05 03:47:51', '2025-05-05 03:47:51'),
(47, 75, 'INV-F91DCE6B6F8F', '2025-05-31 17:48:00', '60.00', '2025-05-05 03:48:06', '2025-05-05 03:48:06'),
(48, 76, 'INV-AA619E94EE3D', '2025-05-21 13:37:00', '50.00', '2025-05-05 23:37:47', '2025-05-05 23:37:47'),
(49, 77, 'INV-7D766017EE48', '2025-05-30 13:44:00', '40.00', '2025-05-05 23:44:07', '2025-05-05 23:44:07'),
(50, 78, 'INV-B28ACD123912', '2025-05-30 13:44:00', '40.00', '2025-05-05 23:44:09', '2025-05-05 23:44:09'),
(51, 79, 'INV-43CD70290FA3', '2025-05-22 13:59:00', '50.00', '2025-05-05 23:59:24', '2025-05-05 23:59:24'),
(52, 80, 'INV-3EFF9EA37326', '2025-05-24 14:42:00', '30.00', '2025-05-06 00:42:48', '2025-05-06 00:42:48'),
(53, 81, 'INV-8331E0A33D57', '2025-05-23 16:02:00', '50.00', '2025-05-06 02:02:15', '2025-05-06 02:02:15'),
(54, 82, 'INV-65B53016D425', '2025-05-21 06:39:00', '45.00', '2025-05-18 16:39:38', '2025-05-18 16:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int DEFAULT NULL
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
(15, '2025_01_02_193807_add_user_id_to_pets_table', 1),
(19, '0001_01_01_000000_create_users_table', 2),
(20, '0001_01_01_000001_create_cache_table', 2),
(21, '0001_01_01_000002_create_jobs_table', 2),
(22, '2025_01_02_084711_create_pets_table', 2),
(23, '2025_01_02_172327_create_doctors_table', 2),
(24, '2025_01_03_015732_create_services_table', 2),
(25, '2025_04_25_020457_create_appointments_table', 2),
(26, '2025_04_25_040612_add_role_to_users_table', 2),
(27, '2025_04_28_092650_create_payments_table', 3),
(29, '2025_04_29_172551_create_invoices_table', 4);

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
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `species` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `user_id`, `name`, `species`, `breed`, `age`, `gender`, `created_at`, `updated_at`) VALUES
(17, 5, 'andrew', 'mouse', 'chihuahua', 2, 'male', '2025-05-02 14:41:08', '2025-05-02 14:41:08'),
(18, 5, 'plupy', 'mouse', 'chihuahua', 3, 'male', '2025-05-02 14:49:55', '2025-05-02 14:49:55'),
(22, 8, 'kumel', 'dog', 'chihuahua', 56, 'male', '2025-05-04 01:44:51', '2025-05-04 01:44:51'),
(23, 9, 'kumel', 'dog', 'chihuahua', 16, 'male', '2025-05-04 01:47:07', '2025-05-04 01:47:07'),
(24, 11, 'test1', 'test', 'test', 8, 'male', '2025-05-05 03:47:14', '2025-05-05 03:47:14'),
(25, 11, 'test2', 'test', 'testt', 56, 'female', '2025-05-05 03:47:27', '2025-05-05 03:47:27'),
(26, 9, 'plupy', 'mouse', 'chihuahua', 4, 'male', '2025-05-05 23:04:35', '2025-05-05 23:04:35'),
(28, 9, 'kumel', 'cat', 'curut', 23, 'male', '2025-05-18 16:37:46', '2025-05-18 16:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `service_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `description`, `cost`, `created_at`, `updated_at`) VALUES
(2, 'Pet Grooming', 'A full grooming service including bath, nail trimming, and haircuts for pets.', '30.00', '2025-04-28 17:15:44', '2025-04-28 17:15:44'),
(3, 'Vet Consultation', 'A check-up consultation with a licensed veterinarian to assess your pet\'s health.', '50.00', '2025-04-28 17:16:15', '2025-04-28 17:16:15'),
(4, 'Vaccination', 'Administering vaccines to ensure your pet stays healthy and protected against diseases.', '40.00', '2025-04-28 17:16:40', '2025-04-28 17:16:40'),
(5, 'Dental Cleaning', 'Professional cleaning to maintain your pet\'s oral hygiene and prevent dental issues.', '45.00', '2025-04-28 17:17:01', '2025-04-28 17:17:01'),
(6, 'Pet Boarding', 'Treatment to eliminate fleas and prevent future infestations in your pet\'s fur and skin.', '25.00', '2025-04-28 17:17:25', '2025-04-28 17:17:25'),
(7, 'Flea Treatment', 'Berbagai produk berkualitas untuk hewan peliharaan, seperti makanan, aksesoris, dan perlengkapan lainnya.', '35.00', '2025-04-28 17:17:47', '2025-04-28 17:17:47'),
(8, 'Surgery (Minor)', 'Minor surgical procedures such as spaying, neutering, or wound stitching.', '150.00', '2025-04-28 17:18:42', '2025-04-28 17:18:42'),
(9, 'Pet Training', 'Basic obedience training sessions for dogs to improve behavior and commands.', '60.00', '2025-04-28 17:19:00', '2025-04-28 17:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4wI1kv1C9xQ8tbSXmjfxAf5LediXyG5Pk4sq5tZq', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUxBVkJkQWNsVzk0bmhUdG05QkwyS0FCV3FiVmZ1Z3lkSk1KbDFodCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHBvaW50bWVudHMvdGhhbmt5b3UiO319', 1746522136),
('P5U6sRQ1iDxRtIyaGObMAM8KFXxldgiZZSAYWFDj', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS1lUNlJxQXlkNXdtbGFrT3Q3MlcyOWtYY1NVZlIzbVJockg2b09zUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pbnZvaWNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1747611771),
('sHiHrzgaO33fKSqR7cQRHn8z6j930QyteVAxvrzs', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaE0wVWRrWlh1czRBVzFrc01TcWV2R1pDQUl0cHhXTVBwNFJPYUxMVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kb2N0b3JzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1747681521);

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
  `role` enum('admin','user','owner') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'elvia', 'elvia@gmail.com', NULL, '$2y$12$DD55.SkYSbaXaY3fvZDIN.QboFXhzssbRjaPPrYZUsra6jjMcAJqm', 'admin', '9Ku56bPw9BhlxZBzrIOO0i9EbCH2LG3Bsnu8Dlut0XslKDAYBvvgkczYWdpX', '2025-05-01 20:35:13', '2025-05-01 20:35:13'),
(8, 'andrew', 'andrew@gmail.com', NULL, '$2y$12$8uN1hPq/t195Ff5iVkHMpunF8LUxNKYcS8i3sRMRk8GNXvWYUm3ey', 'admin', NULL, '2025-05-04 01:44:14', '2025-05-04 01:44:14'),
(9, 'test', 'test@gmail.com', NULL, '$2y$12$IW3xmZzbXwZc8VHXvT7VEunq1TIBBfepxziZjfkP3an/H2G7sw..S', 'admin', 'l9KxmSuNDx5BIhCyHgZqavTon0I5U3mNGGAbHXcyVey4Exe61Gq1ew1mAuhe', '2025-05-04 01:46:27', '2025-05-04 01:46:27'),
(10, 'kumel', 'kumel@gmail.com', NULL, '$2y$12$V9MUW/Z5oErmhbP6IpPkv.hfKBtGpBIyy0TLcX9BbbCuXCxJUFgU2', 'admin', NULL, '2025-05-05 03:35:56', '2025-05-05 03:35:56'),
(11, 'kia', 'kia@gmail.com', NULL, '$2y$12$Q69XcINA8aPqKxhupL9apeDfgc6fgJpE6bbRZoW5NXfPShATu4DW.', 'admin', NULL, '2025-05-05 03:46:55', '2025-05-05 03:46:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_pet_id_foreign` (`pet_id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `invoices_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `pets_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
