-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2026 at 10:43 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mileston_tbt_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `value`) VALUES
(1, 'bunny_ready', '0'),
(2, 'bunny_pullzone', 'https://vz-d5dd88c0-b28.b-cdn.net'),
(3, 'bunny_cdntoken', '62674427-5592-4d34-96e4-298271767195'),
(4, 'bunny_accesskey', 'e07608c9-6542-411a-95332721699e-e051-41ce'),
(5, 'timezone', 'Asia/Karachi'),
(6, 'date_seperator', '-'),
(7, 'unit_label', 'Chapter'),
(8, 'organization_name', 'Ainove'),
(9, 'organization_url', 'https://thebullstrading.com'),
(10, 'review_mode', '1'),
(11, 'max_units', '10'),
(12, 'external_redirects', 'https://president.com,https://www.pornhub.com,letsenter.com,,wtf.com,,www.shit.com');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `file_status` int NOT NULL,
  `title` varchar(1024) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `uid` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `file_status`, `title`, `type`, `description`, `uid`) VALUES
(1, 2, 'Can this document work?', 'doc', 'Random fucking text for random fucking doc.', ''),
(2, 2, 'A BS video mate', 'video', 'Whatever the fuck it is goes here.', '4fad1488-3577-4676-88d7-b05aa617c858');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `pfp` varchar(1024) NOT NULL,
  `occupation` varchar(1024) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `pwd_timestamp` varchar(1024) NOT NULL,
  `preference_theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `role`, `password`, `pfp`, `occupation`, `phone`, `address`, `pwd_timestamp`, `preference_theme`) VALUES
(1, 'Harris Shahryar', 'steven.raj@euromets.com', '2', 1, 'noorula1n', 'data/user_data/pfp_a.jfif', 'Commercial Executive', '+923161075498', 'House No. R143, Block A, Bagh E Malir, Karachi', '16-07-2026', 'dark');

-- --------------------------------------------------------

--
-- Table structure for table `video_logs`
--

CREATE TABLE `video_logs` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `watched_ranges` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video_logs`
--

INSERT INTO `video_logs` (`id`, `email`, `video_id`, `watched_ranges`) VALUES
(1, 'steven.raj@euromets.com', '1', '[[0.033288, 2.380712], [31.374813, 33.166509], [88.993967, 129.419496], [251.590485, 254.203], [254.731028, 265.959626]]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `video_logs`
--
ALTER TABLE `video_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_logs`
--
ALTER TABLE `video_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
