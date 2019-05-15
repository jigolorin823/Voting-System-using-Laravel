-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 03:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfos`
--

CREATE TABLE `admininfos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admininfos`
--

INSERT INTO `admininfos` (`id`, `user_id`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 7, 15, '2019-01-15 13:01:04', '2019-01-15 13:01:04'),
(2, 8, 15, '2019-01-15 13:19:16', '2019-01-15 13:19:16'),
(3, 11, 7, '2019-01-22 00:52:01', '2019-01-22 00:52:01'),
(4, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `city_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Maa', NULL, NULL),
(2, 1, 'Sasa', NULL, NULL),
(3, 1, 'Mintal', NULL, NULL),
(4, 1, 'Panacan', NULL, NULL),
(5, 2, 'Poblacion', '2019-01-15 12:48:30', '2019-01-15 12:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `ballot_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `person_id`, `ballot_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'bts', '2019-01-10 21:51:51', '2019-01-10 21:51:51'),
(2, 2, 'Kaizer', '2019-01-10 22:17:19', '2019-01-10 22:17:19'),
(3, 3, 'Jigo Lorin', '2019-01-15 12:50:10', '2019-01-15 12:50:10'),
(4, 4, 'CJ Lorin hehe', '2019-01-15 13:35:36', '2019-01-15 13:35:36'),
(5, 5, 'Roi69', '2019-01-16 22:10:58', '2019-01-16 22:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 'Davao City', NULL, NULL),
(2, 1, 'Compostela', NULL, NULL),
(3, 2, 'Tagum City', NULL, NULL),
(4, 3, 'Mati City', NULL, NULL),
(5, 4, 'Digos City', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `civil_statuses`
--

CREATE TABLE `civil_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_statuses`
--

INSERT INTO `civil_statuses` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Single', NULL, NULL),
(2, 'Married', NULL, NULL),
(3, 'Divorced', NULL, NULL),
(4, 'Widowed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `electorals`
--

CREATE TABLE `electorals` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `partylist_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `electorals`
--

INSERT INTO `electorals` (`id`, `candidate_id`, `position_id`, `partylist_id`, `year_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4, 'Active', '2019-01-10 21:52:28', '2019-01-10 21:52:28'),
(2, 2, 6, 1, 4, 'Active', '2019-01-15 09:47:00', '2019-01-15 09:47:00'),
(3, 3, 4, 1, 4, 'Active', '2019-01-15 12:50:24', '2019-01-15 12:50:24'),
(4, 4, 2, 1, 4, 'Active', '2019-01-15 13:35:49', '2019-01-15 13:35:49'),
(5, 5, 1, 1, 4, 'Active', '2019-01-16 22:11:18', '2019-01-16 22:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Male', NULL, NULL),
(2, 'Female', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'National', NULL, NULL),
(2, 'Local', NULL, NULL);

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
(1, '2014_10_12_000001_create_roles_table', 1),
(2, '2014_10_12_000002_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_11_22_112958_create_regions_table', 1),
(5, '2018_11_22_112959_create_names_table', 1),
(6, '2018_11_22_112960_create_admininfos_table', 1),
(7, '2018_11_22_113055_create_genders_table', 1),
(8, '2018_11_22_113136_create_civil_statuses_table', 1),
(9, '2018_11_22_113310_create_provinces_table', 1),
(10, '2018_11_22_113325_create_cities_table', 1),
(11, '2018_11_22_113403_create_barangays_table', 1),
(12, '2018_11_22_113404_create_people_table', 1),
(13, '2018_11_22_114456_create_voters_table', 1),
(14, '2018_11_22_114643_create_levels_table', 1),
(15, '2018_11_22_114706_create_positions_table', 1),
(16, '2018_11_22_114739_create_candidates_table', 1),
(17, '2018_11_22_115110_create_partylists_table', 1),
(18, '2018_11_22_115125_create_years_table', 1),
(19, '2018_11_22_115127_create_electorals_table', 1),
(20, '2018_11_22_115146_create_votes_table', 1),
(21, '2018_11_22_115215_create_vote_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `id` int(10) UNSIGNED NOT NULL,
  `fName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`id`, `fName`, `mName`, `lName`, `created_at`, `updated_at`) VALUES
(1, 'jass', 'per', 'estrada', '2019-01-10 21:49:36', '2019-01-10 21:49:36'),
(2, 'kaizer', 'John', 'Taylarann', '2019-01-10 22:16:19', '2019-01-10 22:16:19'),
(3, 'Jigo', 'Alia', 'Lorin', '2019-01-15 12:49:11', '2019-01-15 12:49:11'),
(4, 'CJ', 'Kinoc', 'Melencion', '2019-01-15 13:35:20', '2019-01-15 13:35:20'),
(5, 'Frederich Roi', 'Superioridad', 'Tambol', '2019-01-16 22:10:06', '2019-01-16 22:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `partylists`
--

CREATE TABLE `partylists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partylists`
--

INSERT INTO `partylists` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Independent', '', NULL, NULL);

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
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_id` int(10) UNSIGNED NOT NULL,
  `barangay_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `civil_status_id` int(10) UNSIGNED NOT NULL,
  `house_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name_id`, `barangay_id`, `gender_id`, `civil_status_id`, `house_street`, `date_birth`, `occupation`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 2, 'matina aplaya', '04/24/99', 'CEO', 'uploads/1547185776jigo3.PNG', '2019-01-10 21:49:36', '2019-01-10 21:49:36'),
(2, 2, 3, 1, 1, 'Panacan', '07-10-998', 'Wala', 'uploads/15471873796966505-art-cat.jpg', '2019-01-10 22:16:19', '2019-01-10 22:16:19'),
(3, 3, 5, 1, 1, 'Panacan', '08/23/1997', 'Student', 'uploads/1547585351asd.png', '2019-01-15 12:49:11', '2019-01-15 12:49:11'),
(4, 4, 3, 2, 1, 'davao city', '03/04/1999', 'Student', 'uploads/1547588120asd.png', '2019-01-15 13:35:20', '2019-01-15 13:35:20'),
(5, 5, 3, 1, 1, 'davao city', '10/16/98', 'none', 'uploads/15477054066966505-art-cat.jpg', '2019-01-16 22:10:06', '2019-01-16 22:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_winners` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `level_id`, `description`, `num_winners`, `created_at`, `updated_at`) VALUES
(1, 1, 'President', 1, NULL, NULL),
(2, 1, 'Vice-President', 1, NULL, NULL),
(3, 1, 'Senator', 12, NULL, NULL),
(4, 2, 'Governor', 1, NULL, NULL),
(5, 2, 'Mayor', 1, NULL, NULL),
(6, 2, 'Barangay Captian', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `region_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 15, 'Compostela Valley', NULL, NULL),
(2, 15, 'Davao del Norte', NULL, NULL),
(3, 15, 'Davao Oriental', NULL, NULL),
(4, 15, 'Davao del Sur', NULL, NULL),
(5, 15, 'Davao', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)', NULL, NULL),
(2, 'CORDILLERA ADMINISTRATIVE REGION (CAR)', NULL, NULL),
(3, 'NATIONAL CAPITAL REGION (NCR)', NULL, NULL),
(4, 'I-Ilocos Region', NULL, NULL),
(5, 'II-Cagayen Valley', NULL, NULL),
(6, 'III-Central Luzon', NULL, NULL),
(7, 'IVA-CALABARZON', NULL, NULL),
(8, 'IVB-MIMAROPA', NULL, NULL),
(9, 'V-Bicol Region', NULL, NULL),
(10, 'VI-Western Visayas', NULL, NULL),
(11, 'VII-Central Visayas', NULL, NULL),
(12, 'VIII-Eastern Visayas', NULL, NULL),
(13, 'IX-Zamboanga Peninsula', NULL, NULL),
(14, 'X-Northern Mindanao', NULL, NULL),
(15, 'XI-Davao Region', NULL, NULL),
(16, 'XII-SOCCSKSARGEN', NULL, NULL),
(17, 'XIII-Caraga Region', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Voter', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', 1, '$2y$10$fmGfqrOkSJDmb0rgk0LZduCOy8qc5AmSFMnFs22IKV3WZ.oSOMmMe', 1, '3FTjTWzfZkh5Hz3jBNIsVkPA3BIGv8zhQXSFk95YBm6CBurxexsTcYGp3gZ4', NULL, NULL),
(2, 'estrada999999', 'estrada999999@gmail.com', 3, '$2y$10$/ZdO8G.VVRbgXh0VFqVfWuiZZE3G2xtAXX9cWdEnfBgMtypcklNIK', 1, 'PL8OEmuX5JKukH8qFBcGUkgB5f0Uc7So0CRiJbaVXuXS9GyqywiYTlYRyLdj', '2019-01-10 21:49:36', '2019-01-24 19:21:52'),
(3, 'admin1_4', 'admin1_4@gmail.com', 2, '$2y$10$IvcUd86FSp/Trwkio6Di0.nn7hz0OM0IyIL9fwvBJel4j2s7Uj9TC', 1, 'lOzBqM0h0bmrWnyWXpuH4kLGYyNGyD2BnhOpEOtE1UuGd6yKnJqAAVLg3Puj', '2019-01-10 21:51:06', '2019-01-10 21:51:06'),
(4, 'Taylarann454633', 'Taylarann454633@gmail.com', 3, '$2y$10$s4L0o0B79TuSxt0IrEDJru8IvYBzaQ0NZH7NzCGnoHRQh669EvD2C', 1, NULL, '2019-01-10 22:16:19', '2019-01-24 19:21:52'),
(5, 'Lorin123123', 'Lorin123123@gmail.com', 3, '$2y$10$KOwBl/hG/tjmImWr3rMYYulecoHV4JOCcp4FL2jQbBRpNxLSjuxF2', 1, 'G9ti8kTQH1UQfotzkVsedgmCX5llQAHMJG3pOOrhPh6q7C9Ox2ZMwqRu5uG9', '2019-01-15 12:49:11', '2019-01-24 19:21:52'),
(6, 'admin1_15', 'admin1_15@gmail.com', 2, '$2y$10$zAmpoE17xMxDJq.FSBdtXORh3daLQ23ofsNP5ZDwbSWV5ZN7txobm', 1, '1QsbCiYbIDzbfCecjbXkkgbySovyx6KF9PIQPp0Qsr23ClWMV6e3z5HW0wjr', '2019-01-15 13:00:38', '2019-01-15 13:00:38'),
(7, 'admin1_15', 'admin1_15@gmail.com', 2, '$2y$10$d7h7r8EM1YcSpX0SSlIolOddFYuj3QV4DNbx9k1CWJYE8Mp9q6E1y', 0, NULL, '2019-01-15 13:01:04', '2019-01-22 00:52:18'),
(8, 'admin2_15', 'admin2_15@gmail.com', 2, '$2y$10$SgMeUl6xky3FEjY6sdZw6e5F4Fu3ZM6wq62VvXXMHkuahatYF56s2', 1, 'j86DyPsV2z9Gqs1x0csMKfnU6EvrryAFzu701vazczsMMIGH7herSTCLu5tJ', '2019-01-15 13:19:16', '2019-01-15 13:19:16'),
(9, 'Melencion456456', 'Melencion456456@gmail.com', 3, '$2y$10$oCM887l71cMi9cK4lmgXKuwO3p32hD9rHOBqOrnKNxorrwdisoHgi', 1, 'lVwQOBtYNpMVclHXhyhCq8pSTWyyiYcn6kTNzPWbBJz4njZVGy5jmhzVzIZm', '2019-01-15 13:35:20', '2019-01-24 19:21:52'),
(10, 'Tambol909090', 'Tambol909090@gmail.com', 3, '$2y$10$IZ2DKZlWPZNIyShC0mCT1euvlVqiP.v1SKjeQu8RRdqUj.q8fkLGe', 1, NULL, '2019-01-16 22:10:06', '2019-01-24 19:21:52'),
(11, 'admin3_7', 'admin3_7@gmail.com', 2, '$2y$10$v1X1nCe1q/b2XyC1ujOoTeKstc0qjYdk795f7Z8AQeYkAMUpLnC7q', 1, NULL, '2019-01-22 00:52:01', '2019-01-22 00:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `voter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `user_id`, `person_id`, `voter_id`, `status`, `voted`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '999999', 'Active', 0, '2019-01-10 21:49:36', '2019-01-24 19:21:52'),
(2, 4, 2, '454633', 'Active', 0, '2019-01-10 22:16:19', '2019-01-24 19:21:52'),
(3, 5, 3, '123123', 'Active', 0, '2019-01-15 12:49:11', '2019-01-24 19:21:52'),
(4, 9, 4, '456456', 'Active', 0, '2019-01-15 13:35:20', '2019-01-24 19:21:52'),
(5, 10, 5, '909090', 'Active', 0, '2019-01-16 22:10:06', '2019-01-24 19:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `voter_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voter_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-01-11', '2019-01-10 21:54:40', '2019-01-10 21:54:40'),
(2, 3, '2019-01-17', '2019-01-17 07:24:38', '2019-01-17 07:24:38'),
(3, 4, '2019-01-22', '2019-01-22 00:46:09', '2019-01-22 00:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `vote_details`
--

CREATE TABLE `vote_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `vote_id` int(10) UNSIGNED NOT NULL,
  `electoral_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vote_details`
--

INSERT INTO `vote_details` (`id`, `vote_id`, `electoral_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-01-10 21:54:40', '2019-01-10 21:54:40'),
(2, 1, 2, NULL, NULL),
(3, 2, 5, '2019-01-17 07:24:38', '2019-01-17 07:24:38'),
(4, 2, 4, '2019-01-17 07:24:38', '2019-01-17 07:24:38'),
(5, 2, 3, '2019-01-17 07:24:38', '2019-01-17 07:24:38'),
(6, 3, 1, '2019-01-22 00:46:09', '2019-01-22 00:46:09'),
(7, 3, 3, '2019-01-22 00:46:09', '2019-01-22 00:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, '2010', 0, NULL, NULL),
(2, '2013', 0, NULL, NULL),
(3, '2016', 0, NULL, NULL),
(4, '2019', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfos`
--
ALTER TABLE `admininfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admininfos_user_id_foreign` (`user_id`),
  ADD KEY `admininfos_region_id_foreign` (`region_id`);

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangays_city_id_foreign` (`city_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_person_id_foreign` (`person_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `civil_statuses`
--
ALTER TABLE `civil_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electorals`
--
ALTER TABLE `electorals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `electorals_candidate_id_foreign` (`candidate_id`),
  ADD KEY `electorals_position_id_foreign` (`position_id`),
  ADD KEY `electorals_partylist_id_foreign` (`partylist_id`),
  ADD KEY `electorals_year_id_foreign` (`year_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partylists`
--
ALTER TABLE `partylists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people_name_id_foreign` (`name_id`),
  ADD KEY `people_barangay_id_foreign` (`barangay_id`),
  ADD KEY `people_gender_id_foreign` (`gender_id`),
  ADD KEY `people_civil_status_id_foreign` (`civil_status_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_level_id_foreign` (`level_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_region_id_foreign` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voters_user_id_foreign` (`user_id`),
  ADD KEY `voters_person_id_foreign` (`person_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_voter_id_foreign` (`voter_id`);

--
-- Indexes for table `vote_details`
--
ALTER TABLE `vote_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vote_details_vote_id_foreign` (`vote_id`),
  ADD KEY `vote_details_electoral_id_foreign` (`electoral_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfos`
--
ALTER TABLE `admininfos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `civil_statuses`
--
ALTER TABLE `civil_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `electorals`
--
ALTER TABLE `electorals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `names`
--
ALTER TABLE `names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partylists`
--
ALTER TABLE `partylists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vote_details`
--
ALTER TABLE `vote_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admininfos`
--
ALTER TABLE `admininfos`
  ADD CONSTRAINT `admininfos_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `admininfos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangays`
--
ALTER TABLE `barangays`
  ADD CONSTRAINT `barangays_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `electorals`
--
ALTER TABLE `electorals`
  ADD CONSTRAINT `electorals_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `electorals_partylist_id_foreign` FOREIGN KEY (`partylist_id`) REFERENCES `partylists` (`id`),
  ADD CONSTRAINT `electorals_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `electorals_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_barangay_id_foreign` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`),
  ADD CONSTRAINT `people_civil_status_id_foreign` FOREIGN KEY (`civil_status_id`) REFERENCES `civil_statuses` (`id`),
  ADD CONSTRAINT `people_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `people_name_id_foreign` FOREIGN KEY (`name_id`) REFERENCES `names` (`id`);

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `voters`
--
ALTER TABLE `voters`
  ADD CONSTRAINT `voters_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `voters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_voter_id_foreign` FOREIGN KEY (`voter_id`) REFERENCES `voters` (`id`);

--
-- Constraints for table `vote_details`
--
ALTER TABLE `vote_details`
  ADD CONSTRAINT `vote_details_electoral_id_foreign` FOREIGN KEY (`electoral_id`) REFERENCES `electorals` (`id`),
  ADD CONSTRAINT `vote_details_vote_id_foreign` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
