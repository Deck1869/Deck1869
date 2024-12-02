-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpld`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `business_name` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `business_description` text NOT NULL,
  `id` int(20) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `business_description` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `business_name`, `business_type`, `contact_name`, `contact_email`, `contact_phone`, `business_description`, `submitted_at`) VALUES
(1, 'ONLINE SHOP', 'solo business', 'Joy garcia', 'joy@gmail.com', '09327656876', 'laban laban', '2024-11-23 01:54:41'),
(2, 'sari sari store', 'solo business', 'leah santos', 'leah@gnail.com', '09171856044', 'laban lang', '2024-11-23 02:04:32'),
(6, 'sari sari store', 'solo business', 'leah santos', 'leah@gnail.com', '09171856044', 'laban lang', '2024-11-23 02:06:59'),
(7, 'tatakbap', 'solo business', 'darell dublin', 'darell@gmail.com', '09994567914', 'kaya natin to', '2024-11-23 02:08:37'),
(8, 'tatakbap', 'solo business', 'darell dublin', 'darell@gmail.com', '09994567914', 'kaya natin to', '2024-11-23 02:09:20'),
(9, 'tatakbap', 'solo business', 'darell dublin', 'darell@gmail.com', '09994567914', 'kaya natin to', '2024-11-23 02:09:24'),
(10, 'tatakbap', 'solo business', 'darell dublin', 'darell@gmail.com', '09994567914', 'kaya natin to', '2024-11-23 02:11:04'),
(11, 'tatakbap', 'solo business', 'darell dublin', 'darell@gmail.com', '09994567914', 'kaya natin to', '2024-11-23 02:11:07'),
(12, 'tatakbap', 'solo business', 'darell dublin', 'darell@gmail.com', '09994567914', 'kaya natin to', '2024-11-23 02:11:16'),
(13, 'tatakbap', 'solo business', 'darell dublin', 'darell@gmail.com', '09994567914', 'kaya natin to', '2024-11-23 02:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `company` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `email`, `company`, `password`) VALUES
('admin', 'admin@gmail.com', 'admin corp', 'admin123'),
('joyy', 'joy@gmail.com', 'joyjoy store', 'GARCIA'),
('nicia', 'nicia@gmail.com', 'KAPEMO', 'NICIA'),
('joyy', 'joy@gmail.com', 'onlineshoop', 'garcia'),
('joy', 'jhinejoii.garciaa@gmail.com', 'sari sari', '1234567'),
('leah', 'lea@gmail.com', 'sari sari store ', 'santos123'),
('admin1', 'joy@gmail.com', 'Tatakbap Inc.', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
