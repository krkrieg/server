-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2020 at 11:54 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FiLo`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_category` enum('pet','jewlery','phone') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'phone',
  `found_time` date DEFAULT NULL,
  `found_user_id` int(11) DEFAULT NULL,
  `found_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `created_at`, `updated_at`, `item_category`, `found_time`, `found_user_id`, `found_place`, `color`, `image`, `description`) VALUES
(15, '2020-04-24 07:20:17', '2020-04-29 04:46:53', 'pet', '2020-02-10', 1, 'London, Heuston Station', 'black', '8a6ecbd4-e8fd-409e-970e-6facdeb19bd4_1588142813.jpg', 'Smartphone with pet background.'),
(16, '2020-04-24 07:21:11', '2020-04-29 04:52:29', 'pet', '2020-03-13', 1, 'Berlin, Airport, Gate 7', 'black', '4782646977_c41a6568d0_1588143149.jpg', 'Iphone with black case.'),
(17, '2020-04-24 07:22:23', '2020-04-24 07:22:23', 'jewlery', '2020-04-04', 1, 'Birmingham, Aston University, Library', 'silver', 'download-1_1587720143.jpg', 'Silver necklace with cross.'),
(18, '2020-04-24 07:23:12', '2020-04-27 10:29:18', 'jewlery', '2020-04-05', 1, 'Birmingham, Court', 'gold and silver', 'download_1587990558.jpg', 'A golden ring with silver diamonds.'),
(19, '2020-04-24 07:24:52', '2020-04-27 10:28:13', 'jewlery', '2020-05-01', 1, 'Birmingham Central Kitchen, Bull Ring', 'brown', 'download-2_1587990493.jpg', 'A wrist watch with a brown lether strap.'),
(20, '2020-04-24 07:26:24', '2020-04-24 07:26:24', 'pet', '2020-02-20', 1, 'London, London Eye', 'light blond', 'download-2_1587720384.jpg', 'A little light blond puppy with a red collar.'),
(21, '2020-04-24 07:27:29', '2020-04-24 07:27:29', 'pet', '2020-04-05', 1, 'Birmingham, Bull Ring, Church', 'black-grey stripped', 'download_1587720449.jpg', 'A big black-grey stripped with a balck collar.'),
(22, '2020-04-24 07:28:26', '2020-04-24 07:28:26', 'pet', '2020-02-15', 1, 'Gloucester, Cathedral', 'light brown and white', 'download-3_1587720506.jpg', 'A little light brown and white puppy.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_04_12_095410_create_accounts_table', 1),
(11, '2020_04_12_104826_create_items_table', 1),
(12, '2020_04_12_104850_create_requests_table', 1);

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
-- Table structure for table `request_items`
--

CREATE TABLE `request_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `search_user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `confirmed_by_admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_items`
--

INSERT INTO `request_items` (`id`, `created_at`, `updated_at`, `reason`, `search_user_id`, `item_id`, `confirmed_by_admin`) VALUES
(80, '2020-04-28 06:19:51', '2020-04-28 08:23:32', 'I lost this phone in exact this area on this date. I can show you that I can unlog it.', 4, NULL, 1),
(81, '2020-04-28 06:21:35', '2020-04-28 06:21:35', 'This is my phone. I\'m very sure. It has circular scratches on the backside, right?', 1, NULL, NULL),
(82, '2020-04-28 06:30:05', '2020-04-28 06:30:05', 'My grandma gave me this necklace on my 10th birthday. It has so much value for me. Please give me the long lost necklace back.', 1, NULL, NULL),
(83, '2020-04-28 06:31:12', '2020-04-28 08:23:36', 'I was so nervous that I lost my engagement ring in court. I can prove by documents that this is my ring.', 5, NULL, 1),
(84, '2020-04-28 06:33:17', '2020-04-28 06:33:17', 'We\'re from Birmingham and bought this little cute puppy called Nero in London and lost him at the London Eye. Please help us get him back.', 5, NULL, NULL),
(85, '2020-04-28 06:35:03', '2020-04-28 06:35:03', 'My cat got lost and I can prove by pictures that this is my cat Fluffy. Please return him.', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
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

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kristina Kriegert', 0, 'kristina.kriegert2000@gmail.com', NULL, '$2y$10$yxjWq3bBkjBFrIsDJwBwquSNXffopPoP.xACvZpQgigdfv6YtSbHa', NULL, '2020-04-12 13:16:28', '2020-04-12 13:16:28'),
(4, 'admin', 1, 'admin@admin.com', NULL, '$2y$10$NE8uLCYBuvgeoNRayt38x.POX0rmkxCqJ9K4Zm7shJrsGURjBwf/y', NULL, '2020-04-18 11:09:46', '2020-04-18 11:09:46'),
(5, 'TestUser', 0, 'testuser@test.com', NULL, '$2y$10$h97SIjWlZCOnQSx9s4fqQe855OiBWn0FK62TeYv1lYF6wtkRYVKv6', NULL, '2020-04-27 05:11:37', '2020-04-27 05:11:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `request_items`
--
ALTER TABLE `request_items`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_items`
--
ALTER TABLE `request_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
