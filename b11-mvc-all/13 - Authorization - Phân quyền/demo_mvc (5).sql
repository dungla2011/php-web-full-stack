-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 12:26 PM
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
-- Database: `demo_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `cat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `content`, `cat`, `created_at`) VALUES
(2, 'Tin 1', 'Mo ta 1', 'Noi dung 1', NULL, '2023-09-14 05:35:43'),
(3, 'Tin nhanh', 'Mo ta 2', 'Noi dung 2', NULL, '2023-09-14 05:35:55'),
(4, 'Tin moi', 'Mo ta 3', 'Cont 3', NULL, '2023-09-14 05:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `math` tinyint(4) DEFAULT NULL,
  `physical` tinyint(4) DEFAULT NULL,
  `chemistry` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `math`, `physical`, `chemistry`) VALUES
(1, 'bill2', 'gate1', 9, 10, 8),
(3, 'steve', 'job', 8, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone_number`, `delete_date`, `is_admin`) VALUES
(20, 'admin', 'admin@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, '2023-09-08 08:41:09', 1),
(21, 'member', 'enintend@msn.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0),
(22, 'admin1', 'admin1@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1),
(26, 'frikazoyd', 'frikazoyd@sbcglobal.net', '', NULL, NULL, NULL, NULL, 0),
(27, 'crobles', 'crobles@live.com', '', NULL, NULL, NULL, NULL, 0),
(28, 'parksh', 'parksh@yahoo.com', '', NULL, NULL, NULL, NULL, 0),
(29, 'kobayasi', 'kobayasi@aol.com', '', NULL, NULL, NULL, NULL, 0),
(30, 'bmidd', 'bmidd@gmail.com', '', NULL, NULL, NULL, NULL, 0),
(31, 'hmbrand', 'hmbrand@live.com', '', NULL, NULL, NULL, NULL, 0),
(32, 'farber', 'farber@outlook.com', '', NULL, NULL, NULL, NULL, 0),
(33, 'syrinx1', 'syrinx@optonline.net', '', NULL, NULL, NULL, NULL, 0),
(34, 'mosses', 'mosses@aol.com', '', NULL, NULL, NULL, NULL, 0),
(35, 'giafly', 'giafly@verizon.net', '', NULL, NULL, NULL, NULL, 0),
(36, '121', '2121212', '1212', '12112', '1212', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
