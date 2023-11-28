-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 08:53 AM
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
  `thumb` varchar(512) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `cat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `publish` tinyint(4) DEFAULT NULL,
  `test1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `thumb`, `description`, `content`, `cat`, `created_at`, `publish`, `test1`) VALUES
(3, 'Tin nhanh 1', '/images/a5.jpg', '', '', NULL, '2023-09-14 05:35:55', 1, 1),
(5, 'Tin nhanh 21', '/images/a2.jpg', '123', '456', NULL, '2023-10-18 05:14:21', NULL, NULL),
(8, 'Tin nhanh 3', '/images/a4.jpg', '1212', '1212', NULL, '2023-10-18 05:29:27', NULL, NULL),
(12, 'Tin 5', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:44:31', NULL, NULL),
(13, 'Tin 6', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:47:00', NULL, NULL),
(14, '123', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:47:19', NULL, NULL),
(15, '123', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:49:07', NULL, NULL),
(16, '123', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:49:23', NULL, NULL),
(17, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:53:25', NULL, NULL),
(18, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:54:29', NULL, NULL),
(19, 'Bai viet 1', '/images/a2.jpg', '', '', NULL, '2023-11-14 04:55:10', NULL, NULL),
(20, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:55:57', NULL, NULL),
(21, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:57:23', NULL, NULL),
(22, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:58:27', NULL, NULL),
(23, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:59:02', NULL, NULL),
(24, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:00:24', NULL, NULL),
(25, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:01:44', NULL, NULL),
(26, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:03:10', NULL, NULL),
(27, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:02', NULL, NULL),
(28, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:06', NULL, NULL),
(29, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:35', NULL, NULL),
(30, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:54', NULL, NULL),
(31, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:09:02', NULL, NULL),
(32, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:10:00', NULL, NULL),
(33, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:17:44', NULL, NULL),
(34, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:17:48', NULL, NULL),
(35, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:18:13', NULL, NULL),
(39, 'Tin 6', '/images/a1.jpg', '', '', NULL, '2023-11-15 11:58:35', NULL, NULL),
(40, 'Tin 12345', '/images/a4.jpg', 'mo ta 1', 'noi dung 1', NULL, '2023-11-16 05:31:50', NULL, NULL),
(41, 'Tin 8', '/images/', '', '', NULL, '2023-11-17 07:43:05', 0, 1),
(42, '123223', '/images/', '', '', NULL, '2023-11-17 07:49:27', 0, 1),
(43, 't55', '/images/', '', '', NULL, '2023-11-17 07:49:57', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `thumb` varchar(128) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `detail` mediumtext DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `thumb`, `cat_id`, `description`, `detail`, `price`, `created_at`) VALUES
(3, 'Iphone 8 ', '/images/a1.jpg', 0, '212121243563456', '<p><b><i>Sản phẩm mới!</i></b></p><p><br /></p><p></p><p><br /></p><p></p><div><div></div></div>', 123456, '2023-09-27 08:27:20'),
(4, '2343', '/images/a1.jpg', 0, '2343', '2343', 2343, '2023-09-27 04:27:20'),
(7, '1212', NULL, 1212, '1212', '212', 1212, '2023-10-18 05:36:55'),
(8, 'Iphone', NULL, 0, '', '', 0, '2023-11-14 03:21:53'),
(9, 'Tin 10', NULL, NULL, NULL, NULL, NULL, '2023-11-14 11:12:23'),
(10, 'Iphone 20', NULL, NULL, NULL, NULL, NULL, '2023-11-14 11:12:30');

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
(21, 'member', 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0),
(22, 'admin1', 'abc1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1),
(26, 'frikazadmin', 'abc4@gmail.com', '', NULL, NULL, NULL, NULL, 0),
(27, 'crobles', 'abc5@gmail.com', '', NULL, NULL, NULL, NULL, 0),
(28, 'parksh', 'abc6@gmail.com', '', NULL, NULL, NULL, NULL, 0),
(29, 'kobayasi', 'abc7@gmail.com', '', NULL, NULL, NULL, NULL, 0),
(30, 'bmidd', 'bmidd@gmail.com', '', NULL, NULL, NULL, NULL, 0),
(31, 'hmbrand', 'hmbrand@gmail.com', '', NULL, NULL, NULL, NULL, 0),
(32, 'farber', 'farber@outlook.com', '', NULL, NULL, NULL, NULL, 0),
(33, 'syrinx1', 'syrinx@optonline.net', '', NULL, NULL, NULL, NULL, 0),
(34, 'mosses', 'mosses@aol.com', '', NULL, NULL, NULL, NULL, 0),
(35, 'giafly', 'giafly@verizon.net', '', NULL, NULL, NULL, NULL, 0),
(36, '121', '2121212', '1212', '12112', '1212', NULL, NULL, 0),
(38, 'admin2', 'jackma@gmail.com', 'e11170b8cbd2d74102651cb967fa28e5', NULL, NULL, NULL, NULL, NULL),
(39, 'admin3', 'elonmusk1@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, NULL),
(40, 'PcHx', 'aiTO', 'ruHF', NULL, NULL, NULL, NULL, NULL),
(483, 'admi4n454', 'admin@a4dmi4n.com', '123\'\'', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
