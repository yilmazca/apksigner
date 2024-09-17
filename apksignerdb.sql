-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 17, 2024 at 08:11 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apksignerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_files`
--

CREATE TABLE `cs_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `apk_total_download` int(11) DEFAULT NULL,
  `apk_total_signed` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `download_at` datetime DEFAULT NULL,
  `is_unsigned` tinyint(4) DEFAULT '0',
  `file_url_hash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cs_settings`
--

CREATE TABLE `cs_settings` (
  `pre_name` varchar(255) DEFAULT NULL,
  `system_under_construction` tinyint(4) DEFAULT '0',
  `apk_download_name` varchar(255) DEFAULT NULL,
  `apk_total_download` int(11) DEFAULT NULL,
  `apk_total_signed` int(11) DEFAULT NULL,
  `apk_total_upload` int(11) DEFAULT NULL,
  `system_email` varchar(255) DEFAULT NULL,
  `payment_usdt_address` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_settings`
--

INSERT INTO `cs_settings` (`pre_name`, `system_under_construction`, `apk_download_name`, `apk_total_download`, `apk_total_signed`, `apk_total_upload`, `system_email`, `payment_usdt_address`) VALUES
('install', 0, NULL, NULL, NULL, NULL, 'admin@admin.com', '0x00');

-- --------------------------------------------------------

--
-- Table structure for table `cs_users`
--

CREATE TABLE `cs_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `apk_build_count` int(11) DEFAULT NULL,
  `apk_download_count` int(11) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT '0',
  `permission` varchar(100) DEFAULT 'user',
  `keystore_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_users`
--

INSERT INTO `cs_users` (`id`, `email`, `password`, `created_at`, `update_at`, `apk_build_count`, `apk_download_count`, `is_admin`, `is_active`, `permission`, `keystore_pass`) VALUES
(1, 'admin@admin.com', '123456', NULL, NULL, 1, 1, 1, 1, 'admin', '56035240');

-- --------------------------------------------------------

--
-- Table structure for table `cs_user_logs`
--

CREATE TABLE `cs_user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `last_download` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cs_files`
--
ALTER TABLE `cs_files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cs_files_UN` (`id`),
  ADD UNIQUE KEY `cs_files_filename_UN` (`file_name`);

--
-- Indexes for table `cs_users`
--
ALTER TABLE `cs_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cs_users_UN` (`id`),
  ADD UNIQUE KEY `cs_users_unique_email` (`email`);

--
-- Indexes for table `cs_user_logs`
--
ALTER TABLE `cs_user_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cs_user_logs_UN` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cs_files`
--
ALTER TABLE `cs_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT for table `cs_users`
--
ALTER TABLE `cs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cs_user_logs`
--
ALTER TABLE `cs_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
