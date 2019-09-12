-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2019 at 08:48 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbf-tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

DROP TABLE IF EXISTS `labs`;
CREATE TABLE IF NOT EXISTS `labs` (
  `labId` int(11) NOT NULL AUTO_INCREMENT,
  `labName` varchar(255) NOT NULL,
  PRIMARY KEY (`labId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`labId`, `labName`) VALUES
(1, 'Ibn Sina'),
(2, 'Popular Diagnostics');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `orderNumber` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `clientName` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `collectionDate` date DEFAULT NULL,
  `testName` varchar(255) NOT NULL,
  `labName` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` text,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderNumber`, `userId`, `clientName`, `address`, `phoneNumber`, `collectionDate`, `testName`, `labName`, `status`, `remarks`, `createdAt`, `updatedAt`) VALUES
(1, 'ALAB0000001', 1, 'Khairul Alam', 'House 28, 7A', '0167742442', NULL, 'Glucose', '1', '2', 'None', '2019-09-04 09:16:12', NULL),
(2, 'ALAB0000002', 1, 'Khairul Alam', 'House 28, 7A', '0167742442', NULL, 'Glucose', '1', '2', 'None', '2019-09-04 09:16:16', NULL),
(3, 'ALAB0000003', 1, 'Khairul A', 'Dhanmondi', '01677422442', '2019-09-06', 'Diabetic', '1', '2', 'Hello there', '2019-09-05 04:44:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `statusName` varchar(255) NOT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `statusName`) VALUES
(1, 'Order Confirmed'),
(2, 'Order Scheduled'),
(3, 'Sample Collected'),
(4, 'Sample Delivered'),
(5, 'Report Available'),
(6, 'Report Collected'),
(7, 'Report Delivered'),
(8, 'Order Completed');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_feedback`
--

DROP TABLE IF EXISTS `ticket_feedback`;
CREATE TABLE IF NOT EXISTS `ticket_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `ticketId` varchar(100) NOT NULL,
  `feedback` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_feedback`
--

INSERT INTO `ticket_feedback` (`id`, `userId`, `ticketId`, `feedback`, `created_at`) VALUES
(1, 25, '350', 'yes', '2019-07-07 05:54:24'),
(2, 25, '352', 'no', '2019-07-07 09:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `userStatus` varchar(100) NOT NULL DEFAULT 'Active',
  `userCreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPassword`, `userType`, `userStatus`, `userCreatedAt`) VALUES
(1, 'Tazin Shadid', 'tazins@hotmail.com', '$2y$10$9LVEfCTSZ0BFxeWhtIn4HOhGfeanVutd2Redh4KZIpnj6W.fS43pS', 'MGM', 'Active', '2019-09-02 06:21:12'),
(2, 'Zahid', 'zahid@hotmail.com', '$2y$10$Uk/xQX6InPuTNhRhR4KAE.A3r7Tp7uqrZxySuqbhKC4HvxF3tPzfC', 'OPSM', 'Active', '2019-09-02 06:22:20'),
(3, 'Piyas', 'piyash@hotmail.com', '$2y$10$pfkE8X12C9ejEvd5/d7V0.GHwSap.VaBKd1d3pKwCE8dcgQO4ziCe', 'SC', 'Active', '2019-09-02 06:23:05'),
(4, 'Hasib', 'hasib@amarlab.com', '$2y$10$juxM0dd/E8EnlOwV9WtzHOTneQu79PWhNYHh6oHxNevRXhhq8/LMK', 'CCC', 'Active', '2019-09-04 06:52:40'),
(11, 'Khairul Alam', 'khairul@amarlab.com', '$2y$10$gJYKhQHc2ayL/70pRw.0c.a7mcAV2cb43fB24I3GtWyIbcQ8vPM9m', 'SU', 'Active', '2019-09-05 05:12:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
