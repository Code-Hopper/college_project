-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2023 at 07:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `name` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`name`, `ad_email`, `ad_password`) VALUES
('Priya', 'priya@gmail.com', 'priya@2000');

-- --------------------------------------------------------

--
-- Table structure for table `admission_forms`
--

CREATE TABLE `admission_forms` (
  `id` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `education` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `interests` text NOT NULL,
  `accepted` tinyint(1) DEFAULT 0,
  `ssc_marks` decimal(5,2) NOT NULL DEFAULT 0.00,
  `hsc_marks` decimal(5,2) NOT NULL DEFAULT 0.00,
  `graduation` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission_forms`
--

INSERT INTO `admission_forms` (`id`, `student_email`, `name`, `contact`, `education`, `course`, `interests`, `accepted`, `ssc_marks`, `hsc_marks`, `graduation`) VALUES
('10', 'farhan@gmail.com', 'farhan', '8857032120', 'BBA', 'Course 1', 'no message', 1, 65.00, 55.00, 44.00),
('11', 'p@gmail.com', 'piyush sormare', '18769766121', 'B.COM', 'Course 1', 'RTMNU universasdhnalsd', 1, 60.00, 55.00, 66.00),
('12', 'mrunal@gmail.com', 'mrunal ghotekar', '7871723899', 'BCCA', 'Course 1', 'abcdefgh', 1, 77.00, 70.00, 50.00),
('8', 'ameykhondekar01@gmail.com', 'Amey Khondekar', '9766696550', 'BCA', 'Course 1', 'i want to learn new things', 1, 84.00, 74.00, 66.00),
('9', 'devashree@gmail.com', 'devashree', '9145252569', 'BCCA', 'Course 1', 'no message', 1, 84.00, 10.00, 66.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `interests` text DEFAULT NULL,
  `accepted` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `education`, `course`, `interests`, `accepted`) VALUES
(9, 'devashree', '9145252569', 'devashree@gmail.com', '123', 'BCCA', 'MBA', 'blah', NULL),
(10, 'farhan', '8857032120', 'farhan@gmail.com', '1234', 'BBA', 'MCA', 'acdb', NULL),
(11, 'piyush', '167825387', 'p@gmail.com', '123', 'B.COM', 'MCM', 'one one one', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_forms`
--
ALTER TABLE `admission_forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student_email` (`student_email`),
  ADD KEY `idx_accepted` (`accepted`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
