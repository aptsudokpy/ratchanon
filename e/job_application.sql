-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 05:36 AM
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
-- Database: `4154db`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `j_id` int(11) NOT NULL,
  `j_position` varchar(255) NOT NULL,
  `j_prefix` varchar(255) NOT NULL,
  `j_fullname` varchar(255) NOT NULL,
  `j_dob` date NOT NULL,
  `j_education` varchar(255) NOT NULL,
  `j_skills` text NOT NULL,
  `j_experience` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`j_id`, `j_position`, `j_prefix`, `j_fullname`, `j_dob`, `j_education`, `j_skills`, `j_experience`) VALUES
(1, 'hjg', 'ghjg', 'ghj', '0000-00-00', 'ghj', 'gjh', 'gjhhgjjhg'),
(3, 'นักออกแบบกราฟิก', 'นาย', 'แสกกลาง บางระจัน', '2525-12-25', 'ปริญญาตรี', 'กินส้มตำ', 'สูบชา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`j_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
