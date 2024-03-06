-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 04:58 PM
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
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `msgId` int(11) NOT NULL,
  `recId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`msgId`, `recId`, `userId`, `name`, `email`, `subject`, `message`) VALUES
(1, '', '', 'Anjana Nadeeshan Upasena', 'nadeeshan.an23@gmail.com', 'sdfsfsdf', 'sdfsfsfasd'),
(2, NULL, '5', 'Anjana Nadeeshan Upasena', 'nadeeshan.an23@gmail.com', 'sdfsfsdf', 'sdfsfsfasd'),
(3, NULL, '5', 'Anjana', 'maleehiru@gmail.com', 'ANLAPAAPA', 'weerteteetetwet'),
(4, '6', NULL, 'dfgdg', 'anjananadee23@gmail.com', 'sdfgsdgsd', 'gsdgsdfgsd');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_data`
--

CREATE TABLE `recruiter_data` (
  `recId` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `comAddress` varchar(255) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruiter_data`
--

INSERT INTO `recruiter_data` (`recId`, `firstName`, `lastName`, `companyName`, `comAddress`, `userName`, `email`, `password`, `dateCreated`) VALUES
(6, 'Anju', 'Upasena', 'Anjp Solution', 'eteter', 'rec', 'anjananadee23@gmail.com', '$2y$10$4ZAfRrMuK5utv5vguejsh.qGWO33xr6pGIVm7WThnYMAAIzM3y.oi', '2024-02-25 07:40:19'),
(7, 'Anju', 'Upasena', 'Anjp Solution', 'Clo', 'user', 'hack.anj23@gmail.com', '', '2024-02-27 21:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `seeker_data`
--

CREATE TABLE `seeker_data` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seeker_data`
--

INSERT INTO `seeker_data` (`userId`, `firstName`, `lastName`, `address`, `userName`, `email`, `password`, `dateCreated`) VALUES
(5, 'Anju', 'lastName=?', 'Anuradhapura', 'seeker', 'nadeeshan.an23@gmail.com', '$2y$10$WuTLWKxbVVV2QuYFCrBMNenjyVo6dYgQM8koqpq9SmbIERtzE2xry', '2024-02-25 06:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `recruiter_data`
--
ALTER TABLE `recruiter_data`
  ADD PRIMARY KEY (`recId`);

--
-- Indexes for table `seeker_data`
--
ALTER TABLE `seeker_data`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recruiter_data`
--
ALTER TABLE `recruiter_data`
  MODIFY `recId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seeker_data`
--
ALTER TABLE `seeker_data`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
