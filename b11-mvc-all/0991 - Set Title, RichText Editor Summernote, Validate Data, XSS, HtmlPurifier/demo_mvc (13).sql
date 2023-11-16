-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 02:55 AM
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
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `thumb`, `description`, `content`, `cat`, `created_at`) VALUES
(3, 'Tin nhanh 1', '/images/a2.jpg', 'abc123', 'Noi dung 2123', NULL, '2023-09-14 05:35:55'),
(5, 'Tin nhanh 21', '/images/a2.jpg', '123', '456', NULL, '2023-10-18 05:14:21'),
(8, 'Tin nhanh 3', NULL, '1212', '1212', NULL, '2023-10-18 05:29:27'),
(9, 'Tin nhanh 5', NULL, '121', '21212', NULL, '2023-10-18 05:50:29'),
(10, 'Tin nhanh 6', NULL, '232', '32323', NULL, '2023-10-18 05:51:19'),
(11, '1212', NULL, 'dfdf', 'dfdf', NULL, '2023-10-18 05:52:35'),
(12, 'Tin 5', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:44:31'),
(13, '1', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:47:00'),
(14, '123', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:47:19'),
(15, '123', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:49:07'),
(16, '123', '/images/a1.jpg', '', '', NULL, '2023-11-10 09:49:23'),
(17, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:53:25'),
(18, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:54:29'),
(19, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:55:10'),
(20, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:55:57'),
(21, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:57:23'),
(22, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:58:27'),
(23, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 04:59:02'),
(24, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:00:24'),
(25, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:01:44'),
(26, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:03:10'),
(27, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:02'),
(28, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:06'),
(29, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:35'),
(30, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:08:54'),
(31, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:09:02'),
(32, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:10:00'),
(33, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:17:44'),
(34, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:17:48'),
(35, 'Bai viet 1', NULL, NULL, NULL, NULL, '2023-11-14 05:18:13'),
(39, 'Tin 6', '/images/a1.jpg', '', '', NULL, '2023-11-15 11:58:35');

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
  `detail` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `thumb`, `cat_id`, `description`, `detail`, `price`, `created_at`) VALUES
(3, 'Iphone 8', '/images/a1.jpg', 0, '212121243563456', '212121243563456', 123456, '2023-09-27 08:27:20'),
(4, '2343', '/images/a1.jpg', 0, '2343', '2343', 2343, '2023-09-27 04:27:20'),
(5, 'Sản phẩm mới', NULL, NULL, 'Sản phẩm mới', 'Sản phẩm mới', 0, '2023-09-27 08:51:35'),
(6, 'Sản phẩm mới', NULL, NULL, 'Sản phẩm mới', 'Sản phẩm mới', 0, '2023-09-27 08:51:58'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
