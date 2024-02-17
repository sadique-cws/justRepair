-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 12:22 PM
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
-- Database: `justrepair`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` time NOT NULL,
  `requirement_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_08_115837_create_categories_table', 1),
(7, '2024_02_12_104207_create_services_table', 1),
(8, '2024_02_16_042456_create_requirements_table', 2),
(9, '2024_02_16_120047_create_appointments_table', 3);

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
(1, 7, 'AC Installation/ Removal', 1, '2024-02-16 23:43:05', '2024-02-16 23:43:05'),
(2, 7, 'AC Repair/ Service', 1, '2024-02-16 23:43:05', '2024-02-16 23:43:05'),
(3, 7, 'Any Other AC related issue', 1, '2024-02-16 23:43:05', '2024-02-16 23:43:05'),
(4, 9, 'Installation/ Removal', 1, '2024-02-16 23:48:17', '2024-02-16 23:48:17'),
(5, 9, 'Semi Automatic', 1, '2024-02-16 23:48:17', '2024-02-16 23:48:17'),
(6, 9, 'Fully Automatic', 1, '2024-02-16 23:48:17', '2024-02-16 23:48:17'),
(7, 9, 'Any Other Washing Machine related issue', 1, '2024-02-16 23:48:17', '2024-02-16 23:48:17'),
(8, 10, 'Refrigerator Repair', 1, '2024-02-16 23:54:48', '2024-02-16 23:54:48'),
(9, 10, 'New Installation/ Removal', 1, '2024-02-16 23:54:48', '2024-02-16 23:54:48'),
(10, 10, 'Gas Filling', 1, '2024-02-16 23:54:48', '2024-02-16 23:54:48'),
(11, 10, 'Any Other Refrigerator related issue', 1, '2024-02-16 23:54:48', '2024-02-16 23:54:48'),
(12, 11, 'Water Purifier Installation/ Removal', 1, '2024-02-16 23:57:45', '2024-02-16 23:57:45'),
(13, 11, 'Water Purifier Repair', 1, '2024-02-16 23:57:45', '2024-02-16 23:57:45'),
(14, 11, 'Any Other Related Issue', 1, '2024-02-16 23:57:45', '2024-02-16 23:57:45'),
(15, 12, 'Geyser Installation/ Removal', 1, '2024-02-17 00:00:59', '2024-02-17 00:00:59'),
(16, 12, 'Geyser Repair', 1, '2024-02-17 00:00:59', '2024-02-17 00:00:59'),
(17, 12, 'Any Other Geyser related Issue', 1, '2024-02-17 00:00:59', '2024-02-17 00:00:59'),
(18, 13, 'Microwave Oven Repair', 1, '2024-02-17 00:07:22', '2024-02-17 00:07:22'),
(19, 13, 'Dishwasher Repair', 1, '2024-02-17 00:07:22', '2024-02-17 00:07:22'),
(20, 13, 'Blender Repair', 1, '2024-02-17 00:07:22', '2024-02-17 00:07:22'),
(21, 13, 'Coffee Maker Repair', 1, '2024-02-17 00:07:22', '2024-02-17 00:07:22'),
(22, 13, 'Vacuum Cleaner Repair', 1, '2024-02-17 00:07:22', '2024-02-17 00:07:22'),
(23, 13, 'Any Other Home Appliances Related Issue', 1, '2024-02-17 00:07:22', '2024-02-17 00:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `icon`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 'A/C Repair', '1708146785.png', 'Stay cool and comfortable with our premier AC repair service. Our team of expert technicians is dedicated to restoring your air conditioning system to optimal performance, ensuring your home or business remains a haven from the heat. With prompt and professional service, we diagnose and address any issues efficiently, using cutting-edge tools and techniques. From minor repairs to major overhauls, we\'ve got you covered. Trust us to provide reliable solutions tailored to your needs, all backed by our commitment to quality and customer satisfaction. Don\'t let a malfunctioning AC disrupt your comfort – contact us today for swift and effective repairs.', 1, '2024-02-16 23:43:05', '2024-02-16 23:43:05'),
(9, 'Washing Machine Repair', '1708147097.png', 'Experience seamless laundry days again with our top-notch washing machine repair service. Our skilled technicians specialize in diagnosing and fixing a wide range of washing machine issues promptly and efficiently. Whether it\'s a leak, strange noises, or complete malfunction, we\'ve got the expertise to get your machine running smoothly in no time. Utilizing advanced tools and industry-leading techniques, we ensure lasting solutions tailored to your appliance\'s make and model. Count on us for transparent communication, fair pricing, and superior workmanship, all aimed at restoring convenience to your home. Say goodbye to laundry woes – contact us today for reliable washing machine repairs.', 1, '2024-02-16 23:48:17', '2024-02-16 23:48:17'),
(10, 'Refrigerator Service', '1708147488.png', 'Regain confidence in your kitchen\'s cooling capabilities with our expert refrigerator repair service. Our dedicated team of professionals is equipped to tackle any refrigerator issue, from temperature fluctuations to faulty compressors, with precision and efficiency. Using state-of-the-art diagnostic tools and extensive experience, we swiftly identify the root cause of the problem and implement effective solutions to restore your refrigerator\'s performance. With transparent pricing, timely service, and a commitment to customer satisfaction, we strive to exceed your expectations every time. Don\'t let food spoilage or inconvenience disrupt your routine – trust us to bring your refrigerator back to life. Contact us today for reliable repairs you can trust.', 1, '2024-02-16 23:54:48', '2024-02-16 23:54:48'),
(11, 'Water Purifier', '1708147665.png', 'Ensure pure and refreshing hydration with our premier water purifier repair service. Our team of skilled technicians is dedicated to restoring your water purifier to peak performance, ensuring that your family has access to clean and safe drinking water. Whether it\'s a filter replacement, system calibration, or addressing any malfunction, we have the expertise and tools to get the job done efficiently. With a focus on transparency, reliability, and customer satisfaction, we guarantee prompt service and lasting solutions tailored to your specific needs. Don\'t compromise on the quality of your drinking water – trust us to keep your water purifier running smoothly. Contact us today for expert repairs you can rely on.', 1, '2024-02-16 23:57:45', '2024-02-16 23:57:45'),
(12, 'Geyser Repair', '1708147859.png', 'Regain the comfort of hot water on demand with our professional geyser repair service. Our team of experienced technicians specializes in diagnosing and fixing a wide range of geyser issues promptly and effectively. Whether it\'s a heating element malfunction, thermostat failure, or leaky tank, we have the expertise and tools to restore your geyser\'s functionality. With transparent pricing, timely service, and a commitment to quality workmanship, we ensure your satisfaction every step of the way. Don\'t let cold showers disrupt your routine – trust us to bring warmth back into your home. Contact us today for reliable geyser repairs you can count on.', 1, '2024-02-17 00:00:59', '2024-02-17 00:00:59'),
(13, 'Home Appliances Repair', '1708148242.png', 'Keep your home running smoothly with our comprehensive home appliance repair service. From refrigerators to washing machines, ovens to dishwashers, our team of skilled technicians is equipped to handle repairs for all major appliances. With years of experience and expertise, we diagnose issues quickly and provide efficient solutions to get your appliances back in working order. We prioritize transparent communication, fair pricing, and timely service, ensuring your satisfaction every step of the way. Don\'t let appliance malfunctions disrupt your daily life – trust us to bring reliability back to your home. Contact us today for dependable repairs you can trust.', 1, '2024-02-17 00:07:22', '2024-02-17 00:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_requirement_id_foreign` (`requirement_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_requirement_id_foreign` FOREIGN KEY (`requirement_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
