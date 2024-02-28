-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 06:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justrepair`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` varchar(255) NOT NULL,
  `requirements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`requirements`)),
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `complain_no` varchar(255) NOT NULL,
  `status` enum('accept','reject','process','done','close') NOT NULL DEFAULT 'process',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `preferred_date`, `preferred_time`, `requirements`, `service_id`, `fullname`, `mobileno`, `address`, `landmark`, `city`, `complain_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024-02-22', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\"]', 7, 'ayan', '9546805580', 'fsda', 'fasd', 'fas', 'JR2402228022', 'process', '2024-02-22 09:00:02', '2024-02-22 09:00:02'),
(2, '2024-02-21', '09 AM - 11 AM', '[\"Installation\\/ Removal\"]', 9, 'fdas', '34566543456', 'fasd', 'fsa', 'fdas', 'JR2402229907', 'done', '2024-01-09 11:16:19', '2024-02-26 23:47:36'),
(3, '2024-02-25', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\",\"Any Other AC related issue\"]', 7, 'sadique', '9546805580', 'rockiing', 'sadffasd', 'fdas', 'JR2402246525', 'accept', '2024-02-24 11:34:57', '2024-02-24 11:34:57'),
(4, '2024-02-25', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\",\"Any Other AC related issue\"]', 7, 'fas', '9546805580', 'fsa', 'fas', 'fsa', 'JR2402245651', 'process', '2024-02-24 11:36:07', '2024-02-27 03:06:37'),
(5, '2024-02-26', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\",\"Any Other AC related issue\"]', 7, 'nam', '34554345', 'fasd', 'fads', 'fsad', 'JR2402244117', 'accept', '2024-02-24 11:39:37', '2024-02-24 11:39:37'),
(6, '2024-02-25', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\",\"Any Other AC related issue\"]', 7, 'fasd', 'fads', 'fads', 'fsda', 'fasd', 'JR2402247319', 'accept', '2024-02-24 11:40:11', '2024-02-24 11:40:11'),
(7, '2024-02-25', '05 PM - 07 PM', '[\"AC Installation\\/ Removal\",\"AC Repair\\/ Service\"]', 7, 'nimmi bano', '95485585585', 'lapata ganj', 'near railway gate', 'purnea', 'JR2402256650', 'done', '2024-02-25 00:50:12', '2024-02-27 23:09:28'),
(8, '2024-02-25', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\"]', 7, 'afs', 'fas', 'fas', 'fsa', 'fas', 'JR2402251025', 'accept', '2024-02-25 05:20:53', '2024-02-25 05:20:53'),
(9, '2024-02-25', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\",\"AC Repair\\/ Service\"]', 7, 'fasd', 'fsda', 'fads', 'fsa', 'fsad', 'JR2402254051', 'accept', '2024-02-25 05:23:59', '2024-02-25 05:23:59'),
(10, '2024-02-27', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\",\"AC Repair\\/ Service\"]', 7, 'babar', '954854582', 'Purnea city', 'railway gate', 'purnea', 'JR2402252044', 'done', '2024-02-25 05:26:44', '2024-02-26 08:00:07'),
(11, '2024-03-01', '09 AM - 11 AM', '[\"AC Installation\\/ Removal\",\"AC Repair\\/ Service\"]', 7, 'd', 'fdas', 'fsa', 'fgsa', 'fsa', 'JR2402279608', 'done', '2024-02-27 03:10:45', '2024-02-27 08:25:23'),
(12, '2024-02-27', '09 AM - 11 AM', '[\"Installation\\/ Removal\"]', 9, 'sadique', '9546805580', 'rocking', 'data', 'purnea', 'JR2402279585', 'done', '2024-02-27 08:35:20', '2024-02-27 23:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2024_02_08_115837_create_categories_table', 1),
(39, '2024_02_12_104207_create_services_table', 1),
(40, '2024_02_16_042456_create_requirements_table', 1),
(41, '2024_02_16_120047_create_appointments_table', 1),
(42, '2024_02_17_132056_create_service_fees_table', 1);

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
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `req_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `service_id`, `req_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 'AC Installation/ Removal', 1, '2024-02-16 18:13:05', '2024-02-16 18:13:05'),
(2, 7, 'AC Repair/ Service', 1, '2024-02-16 18:13:05', '2024-02-16 18:13:05'),
(3, 7, 'Any Other AC related issue', 1, '2024-02-16 18:13:05', '2024-02-16 18:13:05'),
(4, 9, 'Installation/ Removal', 1, '2024-02-16 18:18:17', '2024-02-16 18:18:17'),
(5, 9, 'Semi Automatic', 1, '2024-02-16 18:18:17', '2024-02-16 18:18:17'),
(6, 9, 'Fully Automatic', 1, '2024-02-16 18:18:17', '2024-02-16 18:18:17'),
(7, 9, 'Any Other Washing Machine related issue', 1, '2024-02-16 18:18:17', '2024-02-16 18:18:17'),
(8, 10, 'Refrigerator Repair', 1, '2024-02-16 18:24:48', '2024-02-16 18:24:48'),
(9, 10, 'New Installation/ Removal', 1, '2024-02-16 18:24:48', '2024-02-16 18:24:48'),
(10, 10, 'Gas Filling', 1, '2024-02-16 18:24:48', '2024-02-16 18:24:48'),
(11, 10, 'Any Other Refrigerator related issue', 1, '2024-02-16 18:24:48', '2024-02-16 18:24:48'),
(12, 11, 'Water Purifier Installation/ Removal', 1, '2024-02-16 18:27:45', '2024-02-16 18:27:45'),
(13, 11, 'Water Purifier Repair', 1, '2024-02-16 18:27:45', '2024-02-16 18:27:45'),
(14, 11, 'Any Other Related Issue', 1, '2024-02-16 18:27:45', '2024-02-16 18:27:45'),
(15, 12, 'Geyser Installation/ Removal', 1, '2024-02-16 18:30:59', '2024-02-16 18:30:59'),
(16, 12, 'Geyser Repair', 1, '2024-02-16 18:30:59', '2024-02-16 18:30:59'),
(17, 12, 'Any Other Geyser related Issue', 1, '2024-02-16 18:30:59', '2024-02-16 18:30:59'),
(18, 13, 'Microwave Oven Repair', 1, '2024-02-16 18:37:22', '2024-02-16 18:37:22'),
(19, 13, 'Dishwasher Repair', 1, '2024-02-16 18:37:22', '2024-02-16 18:37:22'),
(20, 13, 'Blender Repair', 1, '2024-02-16 18:37:22', '2024-02-16 18:37:22'),
(21, 13, 'Coffee Maker Repair', 1, '2024-02-16 18:37:22', '2024-02-16 18:37:22'),
(22, 13, 'Vacuum Cleaner Repair', 1, '2024-02-16 18:37:22', '2024-02-16 18:37:22'),
(23, 13, 'Any Other Home Appliances Related Issue', 1, '2024-02-16 18:37:22', '2024-02-16 18:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `icon`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 'A/C Repair', 'a-c-repair', '1708146785.png', 'Stay cool and comfortable with our premier AC repair service. Our team of expert technicians is dedicated to restoring your air conditioning system to optimal performance, ensuring your home or business remains a haven from the heat. With prompt and professional service, we diagnose and address any issues efficiently, using cutting-edge tools and techniques. From minor repairs to major overhauls, we\'ve got you covered. Trust us to provide reliable solutions tailored to your needs, all backed by our commitment to quality and customer satisfaction. Don\'t let a malfunctioning AC disrupt your comfort – contact us today for swift and effective repairs.', 1, '2024-02-16 18:13:05', '2024-02-16 18:13:05'),
(9, 'Washing Machine Repair', 'w-repair', '1708147097.png', 'Experience seamless laundry days again with our top-notch washing machine repair service. Our skilled technicians specialize in diagnosing and fixing a wide range of washing machine issues promptly and efficiently. Whether it\'s a leak, strange noises, or complete malfunction, we\'ve got the expertise to get your machine running smoothly in no time. Utilizing advanced tools and industry-leading techniques, we ensure lasting solutions tailored to your appliance\'s make and model. Count on us for transparent communication, fair pricing, and superior workmanship, all aimed at restoring convenience to your home. Say goodbye to laundry woes – contact us today for reliable washing machine repairs.', 1, '2024-02-16 18:18:17', '2024-02-16 18:18:17'),
(10, 'Refrigerator Service', NULL, '1708147488.png', 'Regain confidence in your kitchen\'s cooling capabilities with our expert refrigerator repair service. Our dedicated team of professionals is equipped to tackle any refrigerator issue, from temperature fluctuations to faulty compressors, with precision and efficiency. Using state-of-the-art diagnostic tools and extensive experience, we swiftly identify the root cause of the problem and implement effective solutions to restore your refrigerator\'s performance. With transparent pricing, timely service, and a commitment to customer satisfaction, we strive to exceed your expectations every time. Don\'t let food spoilage or inconvenience disrupt your routine – trust us to bring your refrigerator back to life. Contact us today for reliable repairs you can trust.', 1, '2024-02-16 18:24:48', '2024-02-16 18:24:48'),
(11, 'Water Purifier', NULL, '1708147665.png', 'Ensure pure and refreshing hydration with our premier water purifier repair service. Our team of skilled technicians is dedicated to restoring your water purifier to peak performance, ensuring that your family has access to clean and safe drinking water. Whether it\'s a filter replacement, system calibration, or addressing any malfunction, we have the expertise and tools to get the job done efficiently. With a focus on transparency, reliability, and customer satisfaction, we guarantee prompt service and lasting solutions tailored to your specific needs. Don\'t compromise on the quality of your drinking water – trust us to keep your water purifier running smoothly. Contact us today for expert repairs you can rely on.', 1, '2024-02-16 18:27:45', '2024-02-16 18:27:45'),
(12, 'Geyser Repair', NULL, '1708147859.png', 'Regain the comfort of hot water on demand with our professional geyser repair service. Our team of experienced technicians specializes in diagnosing and fixing a wide range of geyser issues promptly and effectively. Whether it\'s a heating element malfunction, thermostat failure, or leaky tank, we have the expertise and tools to restore your geyser\'s functionality. With transparent pricing, timely service, and a commitment to quality workmanship, we ensure your satisfaction every step of the way. Don\'t let cold showers disrupt your routine – trust us to bring warmth back into your home. Contact us today for reliable geyser repairs you can count on.', 1, '2024-02-16 18:30:59', '2024-02-16 18:30:59'),
(13, 'Home Appliances Repair', NULL, '1708148242.png', 'Keep your home running smoothly with our comprehensive home appliance repair service. From refrigerators to washing machines, ovens to dishwashers, our team of skilled technicians is equipped to handle repairs for all major appliances. With years of experience and expertise, we diagnose issues quickly and provide efficient solutions to get your appliances back in working order. We prioritize transparent communication, fair pricing, and timely service, ensuring your satisfaction every step of the way. Don\'t let appliance malfunctions disrupt your daily life – trust us to bring reliability back to your home. Contact us today for dependable repairs you can trust.', 1, '2024-02-16 18:37:22', '2024-02-16 18:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `service_fees`
--

CREATE TABLE `service_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_fees_name` varchar(255) NOT NULL,
  `service_fees` int(11) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_fees`
--

INSERT INTO `service_fees` (`id`, `service_id`, `service_fees_name`, `service_fees`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 7, 'Split Ac', 0, NULL, '2024-02-24 23:10:34', '2024-02-24 23:10:34'),
(13, 7, 'Split AC Installation/ Fitting', 1499, 1, NULL, NULL),
(14, 7, 'Split AC Removal', 699, 1, NULL, NULL),
(15, 7, 'Removing and Fitting on other wall', 1499, 1, NULL, NULL),
(16, 7, 'Split AC jet pump service', 799, 1, NULL, NULL),
(17, 7, 'Split AC Chemical Servicing', 1225, 1, NULL, NULL),
(18, 7, 'Split AC (Normal Servicing)', 499, 1, NULL, NULL),
(19, 7, 'Split AC Gas Filling - 1 Ton', 1850, 1, NULL, NULL),
(20, 7, 'Split AC Gas Filling R 22 - 1.5 Ton', 2250, 1, NULL, NULL),
(21, 7, 'Split AC Gas Filling R 410- 1.5', 3250, 1, NULL, NULL),
(22, 7, 'Split AC Gas Filling - 2.5 Ton', 2950, 1, NULL, NULL),
(23, 7, 'Split AC Gas Filling R32 - 1.5 Ton', 2950, 1, NULL, NULL),
(24, 9, 'semi automatic', 0, NULL, '2024-02-27 08:36:52', '2024-02-27 08:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sadique', 'rock@gmail.com', '9546805580', 1, NULL, '$2y$12$wRpQYFf.4QbEccWsd3h7heq6Eu9Dt/1hifwY/xVAXufZInNQbE0Xy', NULL, '2024-02-23 11:55:45', '2024-02-23 11:55:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_complain_no_unique` (`complain_no`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `service_fees`
--
ALTER TABLE `service_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_fees_service_id_foreign` (`service_id`),
  ADD KEY `service_fees_parent_id_foreign` (`parent_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service_fees`
--
ALTER TABLE `service_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_fees`
--
ALTER TABLE `service_fees`
  ADD CONSTRAINT `service_fees_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `service_fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_fees_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
