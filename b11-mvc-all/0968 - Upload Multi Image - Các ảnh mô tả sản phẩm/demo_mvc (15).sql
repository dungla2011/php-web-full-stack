-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 10:04 AM
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
(4204, 'Tin nhanh 111', NULL, '', '', 3, '2023-12-07 08:10:31', 0, NULL),
(4205, 'Tin 5', NULL, '', '', 2, '2023-12-07 08:38:57', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_cat`
--

CREATE TABLE `news_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_cat`
--

INSERT INTO `news_cat` (`id`, `name`, `parent`, `created_at`) VALUES
(1, 'Tin thể thao', 0, '2023-12-07 06:36:00'),
(2, 'Giải trí', 0, '2023-12-07 06:49:39'),
(3, 'Công nghệ', 2, '2023-12-07 07:07:46'),
(4, 'CNTT', 3, '2023-12-07 08:03:11');

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
(3, 'Iphone 8 ', '/images/a1.jpg', 2, '212121243563456', '<p><b><i>Sản phẩm mới!</i></b></p><p><br /></p><p></p><p><br /></p><p></p><div><div></div></div>', 123456, '2023-09-27 08:27:20'),
(4, '2343', '/images/a1.jpg', 0, '2343', '2343', 2343, '2023-09-27 04:27:20'),
(7, 'Iphone 8', NULL, 1, '1212', '212', 1212, '2023-10-18 05:36:55'),
(8, 'Iphone', NULL, 0, '', '', 0, '2023-11-14 03:21:53'),
(9, 'Tin 10', NULL, NULL, NULL, NULL, NULL, '2023-11-14 11:12:23'),
(10, 'Iphone 20', NULL, NULL, NULL, NULL, NULL, '2023-11-14 11:12:30'),
(11, 'Galaxy s30', NULL, 2, '', '', 0, '2023-12-07 08:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `products_cat`
--

CREATE TABLE `products_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_cat`
--

INSERT INTO `products_cat` (`id`, `name`, `parent`, `created_at`) VALUES
(1, 'Điện thoại', 0, '2023-12-07 06:36:00'),
(2, 'Samsung', 0, '2023-12-07 06:49:39'),
(3, 'Galaxy S', 2, '2023-12-07 07:07:46');

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
-- Indexes for table `news_cat`
--
ALTER TABLE `news_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_cat`
--
ALTER TABLE `products_cat`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4206;

--
-- AUTO_INCREMENT for table `news_cat`
--
ALTER TABLE `news_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_cat`
--
ALTER TABLE `products_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
