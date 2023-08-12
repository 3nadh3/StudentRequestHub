-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 05:18 PM
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
-- Database: `permission_project_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`) VALUES
('satyanarayana', 'satyanarayana', 'satyanarayana');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission id` int(11) NOT NULL,
  `id` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `type of letter` text NOT NULL,
  `reason` text NOT NULL,
  `letter` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission id`, `id`, `name`, `type of letter`, `reason`, `letter`, `time`, `status`) VALUES
(1, '21B81A1273', 'Trinadh', 'Uniform', 'rainy season so the colthes not dried', '\r\n			  <p>To,\n\r\n			   The Head of Department,\n\r\n			   Information Technology,\n\r\n			   Sir CR Reddy Engineering college,\n\r\n			   Sir,\r\n			  	<p>\r\n				     I am writing this letter to request permission for Uniform. \r\n				    Due to rainy season so the colthes not dried, I was unable to comply with the rules and regulations of the institute. I assure you that this will not happen again in the future. I kindly request you to grant me permission to continue attending the classes.Thank you for your understanding and cooperation in this matter.</p>\r\n			  <p>Sincerely,\n\r\n			  Trinadh\n\r\n			  21B81A1273\n\r\n			  2 year, section B\n\r\n			  31-07-2023	</p>\r\n		  ', '2023-07-31 20:46:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='DataBase Table which stores the name,id,and password';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `name`) VALUES
('21B81A1273', '21B81A1273', 'Trinadh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `permission id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
