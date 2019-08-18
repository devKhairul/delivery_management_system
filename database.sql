-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2019 at 04:42 AM
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
-- Database: `sf_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `statusName` varchar(255) NOT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `statusName`) VALUES
(1, 'Not Started'),
(2, 'In Progress'),
(3, 'Complete'),
(4, 'Delayed'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_size`
--

DROP TABLE IF EXISTS `tasks_size`;
CREATE TABLE IF NOT EXISTS `tasks_size` (
  `tasksSizeId` int(11) NOT NULL AUTO_INCREMENT,
  `tasksSizeName` varchar(255) NOT NULL,
  PRIMARY KEY (`tasksSizeId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks_size`
--

INSERT INTO `tasks_size` (`tasksSizeId`, `tasksSizeName`) VALUES
(1, 'XS: Upto half-day'),
(2, 'S: 1 day'),
(3, 'M: 2-3 days'),
(4, 'L: 1-2 weeks'),
(5, 'XL: 2-4 weeks'),
(6, 'XXL: 1 month++'),
(7, 'XSM: 1-2 hour');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticketId` int(11) NOT NULL AUTO_INCREMENT,
  `ticketNumber` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `userDept` varchar(100) NOT NULL,
  `ticketDescription` text NOT NULL,
  `ticketRequestedBy` varchar(255) NOT NULL,
  `ticketReqDate` date NOT NULL,
  `ticketDeadline` date NOT NULL,
  `ticketSize` varchar(255) NOT NULL,
  `ticketAssignedTo` varchar(255) NOT NULL,
  `ticketStatus` varchar(100) NOT NULL,
  `ticketComment` text,
  `ticketCreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticketUpdatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`ticketId`)
) ENGINE=MyISAM AUTO_INCREMENT=354 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketId`, `ticketNumber`, `userId`, `userDept`, `ticketDescription`, `ticketRequestedBy`, `ticketReqDate`, `ticketDeadline`, `ticketSize`, `ticketAssignedTo`, `ticketStatus`, `ticketComment`, `ticketCreatedAt`, `ticketUpdatedAt`) VALUES
(14, 'SFT000006', 11, 'IT', 'Install The GP Modem In Area manager Computer\r\n', 'Aminul khan AM(Biborton)-Br-210', '2019-03-18', '2019-03-18', '7', '23', '3', NULL, '2019-03-18 20:24:43', NULL),
(13, 'SFT000005', 11, 'IT', 'Browsec vpn add-ons for Firefox', 'Sardor Ashrsfuzzaman', '2018-03-20', '2018-03-20', '7', '19', '3', NULL, '2019-03-18 20:18:58', NULL),
(12, 'SFT000004', 11, 'IT', 'Browsec vpn add-ons for Firefox', 'Md Robiul Islam', '2018-03-20', '2018-03-20', '7', '19', '3', NULL, '2019-03-18 20:17:20', NULL),
(11, 'SFT000003', 11, 'IT', 'Day  Restore', 'Md. Moniruzzaman  	Asst. Officer	F & A Br-216', '2019-03-18', '2019-03-18', '7', '23', '3', NULL, '2019-03-18 20:15:44', NULL),
(10, 'SFT000002', 11, 'IT', 'browser vpn Add for browser ', 'Md Tajul Islam', '2018-03-20', '2018-03-20', '7', '19', '3', NULL, '2019-03-18 20:10:11', NULL),
(9, 'SFT000001', 11, 'IT', '', 'Branch', '2019-03-18', '2019-03-18', '7', '15', '3', NULL, '2019-03-18 19:29:47', NULL),
(15, 'SFT000007', 11, 'IT', 'Setup Zimbra Mail On Area Manager Computer', 'Aminul khan AM(Biborton)-Br-210', '2019-03-18', '2019-03-18', '7', '23', '3', NULL, '2019-03-18 20:25:59', NULL),
(16, 'SFT000008', 11, 'IT', 'projector setup For Sexul Harassment traing', 'Md Tajul Islam', '2018-03-20', '2018-03-20', '7', '19', '3', NULL, '2019-03-18 20:27:13', NULL),
(17, 'SFT000009', 11, 'IT', 'Install the GP Modem in Am Computer.', 'Md. Ashik Mahmud Mukta AM(Biborton)Br-213', '2019-03-18', '2019-03-18', '7', '23', '3', NULL, '2019-03-18 20:30:22', NULL),
(18, 'SFT000010', 11, 'IT', 'Setup Zimbra Mail in AM Computer', 'Md. Ashik Mahmud Mukta AM(Biborton)Br-213', '2019-03-18', '2019-03-18', '7', '23', '3', NULL, '2019-03-18 20:31:12', NULL),
(19, 'SFT000011', 11, 'IT', 'Insurance Delete ', 'Md Mehed Hasan', '2018-03-20', '2018-03-20', '7', '19', '3', NULL, '2019-03-18 20:31:49', NULL),
(20, 'SFT000012', 11, 'IT', 'Insurance Delete', 'Md Mahbubul Hossin', '2018-03-20', '2018-03-20', '7', '19', '3', NULL, '2019-03-18 20:33:57', NULL),
(21, 'SFT000013', 11, 'IT', 'Kabirajpur-223 Insurance Was Removed..\r\n ', 'Sagar Chandra Das	Asst. Officer	F & A Br-223', '2019-03-18', '2019-03-18', '7', '23', '3', NULL, '2019-03-18 20:37:45', NULL),
(22, 'SFT000014', 11, 'IT', 'Printer sharing in network ', 'Sardor Ashrsfuzzaman', '2018-03-20', '2018-03-20', '7', '19', '3', NULL, '2019-03-18 20:38:11', NULL),
(23, 'SFT000015', 11, 'IT', 'Email not found ', 'Accountant', '2019-03-18', '2019-03-18', '7', '15', '3', NULL, '2019-03-18 20:48:50', NULL),
(24, 'SFT000016', 11, 'IT', 'Email not found', 'Accountant', '2019-03-18', '2019-03-18', '7', '15', '3', NULL, '2019-03-18 20:49:59', NULL),
(25, 'SFT000017', 11, 'IT', 'Need daily time extend', 'Accountant', '2019-03-18', '2019-03-18', '7', '15', '3', NULL, '2019-03-18 20:52:13', NULL),
(26, 'SFT000018', 11, 'IT', 'Branch -73 Insurance Problem Solved', 'Awal Miah', '2019-03-18', '2019-03-18', '7', '18', '3', NULL, '2019-03-19 09:06:56', NULL),
(27, 'SFT000019', 11, 'IT', 'Munshgonj Sadar-118 Holiday TP Missing ', 'Monirul Islam', '2019-03-18', '2019-03-18', '7', '18', '3', NULL, '2019-03-19 09:10:14', NULL),
(28, 'SFT000020', 11, 'IT', 'Lawhaajong-188 Holiday TP Missing ', 'Md. Uzzal Mia', '2019-03-18', '2019-03-18', '7', '18', '3', NULL, '2019-03-19 09:16:27', NULL),
(29, 'SFT000021', 11, 'IT', 'IT Sumon RM Brother Refer Call Outlook Password Block .\r\nProblem Solved', 'IT Sumon (RM)', '2019-03-18', '2019-03-18', '7', '18', '3', NULL, '2019-03-19 09:24:02', NULL),
(30, 'SFT000022', 11, 'IT', 'Excel Any Works All Problem Solved', 'Md.Zakir Hossain', '2019-03-18', '2019-03-18', '7', '18', '3', NULL, '2019-03-19 09:25:21', NULL),
(31, 'SFT000023', 11, 'IT', 'Member Name Correction', 'Md.Faruk', '2019-03-18', '2019-03-18', '7', '18', '3', NULL, '2019-03-19 09:28:34', NULL),
(32, 'SFT000024', 11, 'IT', 'Collection Date Correction Complate', 'Md.Faruk', '2019-03-18', '2019-03-18', '7', '18', '3', NULL, '2019-03-19 09:30:34', NULL),
(33, 'SFT000025', 11, 'IT', 'Jatrabari-19 Desktop PC Casing Change and Blower Complate', 'Md. Sirajul Islam', '2019-03-18', '2019-03-18', '2', '18', '3', NULL, '2019-03-19 09:34:14', NULL),
(34, 'SFT000026', 11, 'IT', 'Hasnabad -03 Two Insurance Problem Solved ', 'Md.Mamun', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 09:36:22', NULL),
(35, 'SFT000027', 11, 'IT', '', 'Accountant', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 09:42:28', NULL),
(36, 'SFT000028', 11, 'IT', 'Laksham-178 Insurance Problem Solved ', 'Md.Shajeb', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 09:47:47', NULL),
(37, 'SFT000029', 11, 'IT', 'Panchaboti-12 Microsoft Office-10 Uninstall  or Microsoft Office -7 Install\r\nMonth Closing DATA Prepare Dos\'t Complate', 'Md. Asadullah', '2019-03-19', '2019-03-19', '2', '18', '3', NULL, '2019-03-19 09:52:19', NULL),
(38, 'SFT000030', 11, 'IT', '', 'Accountant', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 10:15:45', NULL),
(39, 'SFT000031', 11, 'IT', 'Daily Due Login  Open  \r\nhttp://due.sajidafoundation.org:99/dailydue/', 'A S M Fazlul Hasan', '2019-03-20', '2019-03-20', '7', '19', '3', NULL, '2019-03-19 10:17:39', NULL),
(40, 'SFT000032', 11, 'IT', 'Insurance Delete', 'Alamgir Hossain', '2019-03-20', '2019-03-20', '7', '19', '3', NULL, '2019-03-19 10:40:17', NULL),
(41, 'SFT000033', 11, 'IT', '', 'Accountant', '2019-03-19', '2019-03-19', '1', '15', '3', NULL, '2019-03-19 10:51:30', NULL),
(42, 'SFT000034', 11, 'IT', 'Health camp started at Sajeda Hospital, Keraniganj on 13th. There is a package of 1000 / - for patients. Report how many patients have received that package.', 'Dr. Ishtique Ahamed Zahid', '2019-03-19', '2019-03-19', '3', '16', '3', NULL, '2019-03-19 10:55:09', NULL),
(43, 'SFT000035', 11, 'IT', 'Find out who is doing the problem.', 'Dr. Shangjucta Das Pooja', '2019-03-19', '2019-03-19', '1', '16', '3', NULL, '2019-03-19 10:58:41', NULL),
(44, 'SFT000036', 11, 'IT', 'The attached file can not be opened from the email.', 'Md. Harun-or-Rashid', '2019-03-19', '2019-03-19', '1', '16', '3', NULL, '2019-03-19 11:06:29', NULL),
(45, 'SFT000037', 11, 'IT', 'Both Hospital Pathological (Lab &  X-ray) Report', 'Md. Abul Kalam Azad', '2019-03-19', '2019-03-20', '2', '16', '3', NULL, '2019-03-19 11:13:45', NULL),
(46, 'SFT000038', 11, 'IT', 'Hospital Highlights Report has to be created.', 'Dr. Ishtique Ahamed Zahid', '2019-03-19', '2019-03-19', '2', '16', '3', NULL, '2019-03-19 11:16:29', NULL),
(47, 'SFT000039', 11, 'IT', 'NH Indoor CC Camera not work.', 'Md. Aminul Islam (Shohag)', '2019-03-19', '2019-03-20', '3', '16', '3', NULL, '2019-03-19 11:23:24', NULL),
(48, 'SFT000040', 11, 'IT', 'Both Hospital Patient Mobile Number Last 1year ', 'Emanual Bappy Mondol', '2019-03-18', '2019-03-19', '3', '16', '3', NULL, '2019-03-19 11:59:20', NULL),
(49, 'SFT000041', 11, 'IT', '', '', '2019-03-19', '2019-03-19', '2', '21', '3', NULL, '2019-03-19 12:09:31', NULL),
(50, 'SFT000042', 11, 'IT', 'Dr. Ishtique Ahamed Zahid Brother\'s Telephone Line is set up in the admission section.', 'Dr. Ishtique Ahamed Zahid', '2019-03-19', '2019-03-19', '7', '16', '3', NULL, '2019-03-19 12:17:59', NULL),
(51, 'SFT000043', 11, 'IT', 'Every morning, two hospitals and Pharmacy Income report are offered at Whats App.', 'Director', '2019-03-19', '2019-03-19', '7', '16', '3', NULL, '2019-03-19 12:23:51', NULL),
(52, 'SFT000044', 11, 'IT', 'User system problem', 'Accountant, Br151', '2019-03-19', '2019-03-19', '7', '21', '3', NULL, '2019-03-19 12:31:11', NULL),
(53, 'SFT000045', 11, 'IT', 'Entering a code incorrectly entered another code entry.', 'Md. Raquibul Islam (CCO)', '2019-03-18', '2019-03-22', '5', '16', '3', NULL, '2019-03-19 12:36:25', NULL),
(54, 'SFT000046', 11, 'IT', 'Laptop works at slow speed', 'Br-164', '2019-03-19', '2019-03-19', '2', '21', '3', NULL, '2019-03-19 12:41:12', NULL),
(55, 'SFT000047', 11, 'IT', '1 Laptop Installation ready for Fahrita Annana  ', 'Fahrita Annana  ', '2019-03-19', '2019-03-19', '2', '14', '3', NULL, '2019-03-19 12:41:19', NULL),
(56, 'SFT000048', 11, 'IT', 'Accountant of Bakulia 56 want to connect his smartphone hotspot internet to the laptop regard of wallet data payment, but his phone\'s  hotspot wasn\'t working. i re-configure phone\'s hotspot settings and solve it. ', 'fayej bhai', '2019-03-18', '2019-03-18', '7', '22', '3', NULL, '2019-03-19 12:49:39', NULL),
(57, 'SFT000049', 11, 'IT', 'Mozilla browser wasn\'t updated, working slowly.', 'fayej bhai', '2019-03-18', '2019-03-18', '7', '22', '3', NULL, '2019-03-19 12:52:04', NULL),
(58, 'SFT000050', 11, 'IT', 'Accountant want to change his password in Southtech Software.', 'fayej bhai', '2019-03-18', '2019-03-18', '7', '22', '3', NULL, '2019-03-19 12:53:43', NULL),
(59, 'SFT000051', 11, 'IT', 'Bayezid 57 received new 3G modem yesterday.', 'Ujjal dada', '2019-03-19', '2019-03-19', '1', '22', '3', NULL, '2019-03-19 12:59:41', NULL),
(60, 'SFT000052', 11, 'IT', '14 to 17 Hospital Daily Report.', 'Md. Ziaur Rahman (KH Accounts)', '2019-03-19', '2019-03-19', '7', '16', '3', NULL, '2019-03-19 13:00:04', NULL),
(61, 'SFT000053', 11, 'IT', 'Scanner Software wasn\'t working', 'Nijam bhai', '2019-03-19', '2019-03-19', '7', '22', '3', NULL, '2019-03-19 13:01:10', NULL),
(62, 'SFT000054', 11, 'IT', 'Area Manager Laptop Mozila firefox Unistall or Install', 'Md. Ruhul Amin', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 13:08:07', NULL),
(63, 'SFT000055', 11, 'IT', 'Office Auto-correction option reset+Mozilla Auto Password save reset+accountant pen drive lost data recover etc ', 'Emran bhai', '2019-03-19', '2019-03-19', '1', '22', '3', NULL, '2019-03-19 13:13:38', NULL),
(64, 'SFT000056', 11, 'IT', '', 'Muntasir Rakin (HO)', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 13:21:07', NULL),
(65, 'SFT000057', 11, 'IT', '', 'Imran Maleqe (HO)', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 13:23:10', NULL),
(66, 'SFT000058', 11, 'IT', 'AM Humayen Bhai was in need of Zimbra & due login shortcut Bookmarks.', 'AM Humayen Bhai', '2019-03-19', '2019-03-19', '7', '22', '3', NULL, '2019-03-19 13:23:58', NULL),
(67, 'SFT000059', 11, 'IT', '', 'Pulaq Baral Tanu (HO)', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 13:26:53', NULL),
(68, 'SFT000060', 11, 'IT', 'E-mail,Teams,outlook,Ondrive  setup you Computer And Mobille Mobile', 'Md Joha Islam', '2019-03-19', '2019-03-19', '7', '19', '3', NULL, '2019-03-19 13:38:30', NULL),
(69, 'SFT000061', 11, 'IT', 'Outlook Setup', 'Md Riyadh Hossin', '2019-03-19', '2019-03-19', '7', '19', '3', NULL, '2019-03-19 13:44:09', NULL),
(70, 'SFT000062', 11, 'IT', 'Homna -126 Insurance Problem Salutation.....  ', 'Khaledun Nobi  	Asst. Officer F & A  Br-126', '2019-03-19', '2019-03-19', '7', '23', '3', NULL, '2019-03-19 13:46:38', NULL),
(71, 'SFT000063', 11, 'IT', 'Takerhat-220\r\nRun This TP_167,168,169,170,171.....', 'Sabdip Biswas	Officer	F & A ', '2019-03-19', '2019-03-19', '7', '23', '3', NULL, '2019-03-19 13:57:42', NULL),
(72, 'SFT000064', 11, 'IT', '', 'RM Shofiqul Islam', '2019-03-19', '2019-03-20', '3', '21', '3', NULL, '2019-03-19 13:57:49', NULL),
(73, 'SFT000065', 11, 'IT', 'Preparing the projector for training', 'RM Robiul Islam', '2019-03-17', '2019-03-19', '3', '21', '3', NULL, '2019-03-19 14:02:41', NULL),
(74, 'SFT000066', 11, 'IT', '', 'Nusrat', '2019-03-19', '2019-03-19', '7', '24', '3', NULL, '2019-03-19 14:03:35', NULL),
(75, 'SFT000067', 11, 'IT', '1. Laptop works at slow speed \r\n2. Broadband Internet visit ', 'Branch Manager & Accountant', '2019-03-19', '2019-03-20', '2', '21', '3', NULL, '2019-03-19 14:18:26', NULL),
(76, 'SFT000068', 11, 'IT', 'can not attach file in outlook.', 'Fahim', '2019-03-19', '2019-03-19', '7', '24', '3', NULL, '2019-03-19 14:24:25', NULL),
(77, 'SFT000069', 11, 'IT', 'Southtech Software Data Restore', 'Accountant', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 14:47:50', NULL),
(78, 'SFT000070', 11, 'IT', 'Southtech Software Restore', 'Accountant', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 14:51:07', NULL),
(79, 'SFT000071', 11, 'IT', 'SP-167,168,169,170,171 Run', 'Anowar Vi', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 14:54:23', NULL),
(80, 'SFT000072', 11, 'IT', 'SP-167,168,169,170,171 Run\r\n', 'Anowar Vi', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 14:57:46', NULL),
(81, 'SFT000073', 11, 'IT', 'TP & SP Version Info Report (BR-50 & 45) email Anowar vi', 'Anowar Vi', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 15:00:26', NULL),
(82, 'SFT000074', 11, 'IT', 'Both Hospital Highlights Report', 'Md. Reajul Haque', '2019-03-19', '2019-03-19', '1', '16', '3', NULL, '2019-03-19 15:00:28', NULL),
(83, 'SFT000075', 11, 'IT', 'NH Finger Entry Device Entry Problem', 'Sumona Akter', '2019-03-19', '2019-03-19', '7', '16', '3', NULL, '2019-03-19 15:06:11', NULL),
(84, 'SFT000076', 11, 'IT', 'BR-190 Insurance Delete support by Teamviewer', 'Accountant', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 15:06:16', NULL),
(85, 'SFT000077', 11, 'IT', ' Protoul Da MS Word Problem Solve by Phone Support', 'Protul Da', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 15:09:09', NULL),
(86, 'SFT000078', 11, 'IT', 'educational claim', 'Accounts officer ', '2019-03-19', '2019-03-19', '7', '21', '3', NULL, '2019-03-19 15:13:18', NULL),
(87, 'SFT000079', 11, 'IT', 'don\'t print', 'Farhan', '2019-03-19', '2019-03-19', '7', '24', '3', NULL, '2019-03-19 15:16:09', NULL),
(88, 'SFT000080', 11, 'IT', 'Laptop Full Setup Mr. Imtiaz Ahmed ', 'Mr. Imtiaz  Ahmed ', '2019-03-19', '2019-03-19', '2', '14', '3', NULL, '2019-03-19 15:24:58', NULL),
(89, 'SFT000081', 11, 'IT', 'TP & SP Version Info Report BR-72 & 89 email to Anowar vi', 'Anowar Vi', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 15:26:55', NULL),
(90, 'SFT000082', 11, 'IT', 'Printer Sharing', 'Md Riyadh Hossin', '2019-03-19', '2019-03-19', '7', '19', '3', NULL, '2019-03-19 15:31:48', NULL),
(91, 'SFT000083', 11, 'IT', 'Posting Problem ', 'Accounts officer ', '2019-03-19', '2019-03-19', '7', '21', '3', NULL, '2019-03-19 15:37:47', NULL),
(92, 'SFT000084', 11, 'IT', 'MS word save sa 97-2003 team viewer support ok', 'Protul Da', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 15:41:55', NULL),
(93, 'SFT000085', 11, 'IT', 'Blood Surge Chart, Blood Requisition Form, OT Call List & Per-Anesthetist Cheek List.', 'Farjana Mitu', '2019-03-19', '2019-03-21', '3', '16', '3', NULL, '2019-03-19 15:52:10', NULL),
(94, 'SFT000086', 11, 'IT', '', 'Ziaul Haque (S00444) Area Mamager Suchona (Daudkandi Area)', '2019-03-19', '2019-03-19', '1', '15', '3', NULL, '2019-03-19 16:08:25', NULL),
(95, 'SFT000087', 11, 'IT', 'Laptops do not work properly and all folders are hidden.', 'Sumona Akter (NH Admin)', '2019-03-19', '2019-03-19', '7', '16', '3', NULL, '2019-03-19 16:20:43', NULL),
(96, 'SFT000088', 11, 'IT', 'BR-7 Southtech Soft Time  Problem, restore software then solve', 'Accountant', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 16:41:38', NULL),
(97, 'SFT000089', 11, 'IT', 'BR-94 Scanner Problem solve.\r\nScanner Driver Install', 'Accountant', '2019-03-19', '2019-03-19', '7', '17', '3', NULL, '2019-03-19 16:47:21', NULL),
(98, 'SFT000090', 11, 'IT', 'UPS is closed when the electricity is gone.', 'Md. Sanaullah', '2019-03-19', '2019-03-23', '3', '16', '3', NULL, '2019-03-19 17:19:04', NULL),
(99, 'SFT000091', 11, 'IT', 'connected laptop to tv', 'Nusrat', '2019-03-19', '2019-03-19', '7', '24', '3', NULL, '2019-03-19 17:20:01', NULL),
(100, 'SFT000092', 11, 'IT', 'The computer is on and off automatically', 'Md. Serajul Islam', '2019-03-19', '2019-03-21', '2', '16', '3', NULL, '2019-03-19 17:24:46', NULL),
(101, 'SFT000093', 11, 'IT', 'Account officer collect wrong Insurance fee', 'Accountant Br-05', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 17:28:38', NULL),
(102, 'SFT000094', 11, 'IT', 'Both Hospital Data Backup', 'Md. Reajul Haque', '2019-03-19', '2019-03-19', '7', '16', '3', NULL, '2019-03-19 17:30:35', NULL),
(103, 'SFT000095', 11, 'IT', 'Meghula-21 Insurance Problem Solved', 'Md.Hasan Mredha', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 17:35:31', NULL),
(104, 'SFT000096', 11, 'IT', 'Betkabazar-119 Insurance Problem Solved', 'Achinta Kumer Sarker', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 17:37:48', NULL),
(105, 'SFT000097', 11, 'IT', 'Matuail-30 Insurance problem Solved', 'Md.Ferdush Alom', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 17:42:38', NULL),
(106, 'SFT000098', 11, 'IT', 'Chatmohor, Br-146...Additional fees were insured. \r\nProblem solved ', 'Accounts officer ', '2019-03-19', '2019-03-19', '7', '21', '3', NULL, '2019-03-19 17:56:40', NULL),
(107, 'SFT000099', 11, 'IT', 'Pagla-9 Day Open Problem message same ID already Ex.....  ', 'Md.Masum', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 17:59:02', NULL),
(108, 'SFT000100', 11, 'IT', 'Are Manager Md.Kamal Hossain Leptop SAJIDAMF Reporting  System Larn', 'Md.Kamal Hossain', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-19 18:11:35', NULL),
(109, 'SFT000101', 11, 'IT', 'The Outlook Was Opened By The Area Manager.......', 'A.N.Gazi Saifuddin Ahmed AM Biborton ME Br-204', '2019-03-19', '2019-03-19', '7', '23', '3', NULL, '2019-03-19 19:12:13', NULL),
(110, 'SFT000102', 11, 'IT', 'Run This Tp_1976', 'Md.Giasul Azam 	Officer	F & A Br-217', '2019-03-19', '2019-03-19', '7', '23', '3', NULL, '2019-03-19 20:02:36', NULL),
(111, 'SFT000103', 11, 'IT', 'Insurance Problem Salutationâ€¦', 'Md.Giasul Azam 	Officer	F & A Br-217', '2019-03-19', '2019-03-19', '7', '23', '3', NULL, '2019-03-19 20:03:32', NULL),
(112, 'SFT000104', 11, 'IT', 'Shibgong, Br-163', 'Accounts officer ', '2019-03-19', '2019-03-19', '7', '21', '3', NULL, '2019-03-19 20:24:46', NULL),
(113, 'SFT000105', 11, 'IT', ' Br-143, Br-144, Br-145, Br-146, Br-153, Br-155, Br165, Br-161, Br-162, Br-163, Br-164, Br-166, Br-167, Br-186, Br-187, Br-199', 'On Duty ', '2019-03-19', '2019-03-19', '7', '21', '3', NULL, '2019-03-19 20:32:35', NULL),
(114, 'SFT000106', 11, 'IT', 'Unmapped insurance found on day close at kalurghat - 55', 'Didar bhai(Accountant)', '2019-03-19', '2019-03-19', '7', '22', '3', NULL, '2019-03-19 20:49:56', NULL),
(115, 'SFT000107', 11, 'IT', '', 'Accountant br-59', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 21:33:54', NULL),
(116, 'SFT000108', 11, 'IT', '', 'Accountant br-126', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 21:34:27', NULL),
(117, 'SFT000109', 11, 'IT', '', 'Accountant br-217', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 21:35:45', NULL),
(118, 'SFT000110', 11, 'IT', '', 'Accountant br-218', '2019-03-19', '2019-03-19', '7', '15', '3', NULL, '2019-03-19 21:36:30', NULL),
(119, 'SFT000111', 11, 'IT', 'Modem install steps ', 'Sikder Md.Siddiqur Rahman (AM)', '2019-03-19', '2019-03-19', '7', '19', '3', NULL, '2019-03-19 22:05:14', NULL),
(120, 'SFT000112', 11, 'IT', 'Bill Refund Problem, Because of He could not fulfill the bill return options correctly.', 'Md. Tanvir Ahmmed (KH CCO)', '2019-03-19', '2019-03-20', '2', '16', '4', NULL, '2019-03-19 23:10:22', NULL),
(121, 'SFT000113', 11, 'IT', 'Purchase Medicine Posted Problem, because of purchases ID is wrong.', 'Md. Jamil Uddin', '2019-03-19', '2019-03-20', '2', '16', '3', NULL, '2019-03-19 23:23:23', NULL),
(122, 'SFT000114', 11, 'IT', 'Sanarpar-65 Insurance Problem Splved', 'Md.Jahangir Alom', '2019-03-19', '2019-03-19', '7', '18', '3', NULL, '2019-03-20 09:08:38', NULL),
(123, 'SFT000115', 11, 'IT', 'Adobe Reader Remove and software install  Adobe Reader\r\n', 'A. F. M. Moudud Khan (AM)', '2019-03-20', '2019-03-20', '7', '19', '3', NULL, '2019-03-20 09:09:14', NULL),
(124, 'SFT000116', 11, 'IT', 'Laptop Problem BR-35 by phone support Solve', 'AO BR-35', '2019-03-20', '2019-03-20', '7', '17', '3', NULL, '2019-03-20 09:14:59', NULL),
(125, 'SFT000117', 11, 'IT', 'SQL Server Configuration....... \r\n', 'Md.Saiful Islam	Asst. Officer	F & A -Br-222', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 09:16:51', NULL),
(126, 'SFT000118', 11, 'IT', 'Salim Vi Laptop OS', 'Salim Vi', '2019-03-20', '2019-03-20', '1', '17', '3', NULL, '2019-03-20 09:20:03', NULL),
(127, 'SFT000119', 11, 'IT', 'Both Hospital Daily Income Report will be offered at WhatsApp.', 'Director', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 10:23:00', NULL),
(128, 'SFT000120', 11, 'IT', 'card  access  for new employee', 'nevia', '2019-03-20', '2019-03-20', '7', '24', '3', NULL, '2019-03-20 10:27:07', NULL),
(129, 'SFT000121', 11, 'IT', 'Day Close Problem', 'Md. Ubaydullah ', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 10:27:34', NULL),
(130, 'SFT000122', 11, 'IT', 'Pathology Sismex Report Computer Problem ', 'Md. Jahidul Islam', '2019-03-20', '2019-03-20', '1', '16', '3', NULL, '2019-03-20 10:29:06', NULL),
(131, 'SFT000123', 11, 'IT', 'skype room ready for meeting.', 'SM Mahmudul Moshin', '2019-03-20', '2019-03-20', '7', '24', '3', NULL, '2019-03-20 10:30:22', NULL),
(132, 'SFT000124', 11, 'IT', 'Needed March-2018 & March-2019 Month wise Report', 'Dr. Mahmuda Akhtar', '2019-03-20', '2019-03-22', '5', '16', '3', NULL, '2019-03-20 10:32:23', NULL),
(133, 'SFT000125', 11, 'IT', 'Finger Attendance Divice is the removal of the staff who have left the job.', 'Dr. Mahmuda Akhtar', '2019-03-20', '2019-03-25', '5', '16', '2', NULL, '2019-03-20 10:50:50', NULL),
(134, 'SFT000126', 11, 'IT', 'skype room5 ready for meeting with Ishtiaq sir', 'satya kumar', '2019-03-20', '2019-03-20', '7', '24', '3', NULL, '2019-03-20 10:53:56', NULL),
(135, 'SFT000127', 11, 'IT', 'Software not open, Show Rollback Comment.', 'Md. Shahjalal Farazi', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 11:02:00', NULL),
(136, 'SFT000128', 11, 'IT', 'Office e-mail id need to be setup in mobile.', 'Md. Akhteruzzaman', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 11:07:50', NULL),
(137, 'SFT000129', 11, 'IT', 'SAJIDA MF REPORTING Potal setup ', 'Hassan Vi AM (ME)', '2019-03-20', '2019-03-20', '7', '17', '3', NULL, '2019-03-20 11:19:01', NULL),
(138, 'SFT000130', 11, 'IT', 'Sanarpar-65 Day Open Key Code Problem Southtech Ltd. Connect Then Problem Solved', 'Md.Jahangir Alom', '2019-03-20', '2019-03-20', '7', '18', '3', NULL, '2019-03-20 11:23:22', NULL),
(139, 'SFT000131', 11, 'IT', '1. Office 365 Login problem ( reset password)\r\n2. Outlook configure (nazmul@sajida.org)\r\n3. Microsoft office 2016 Active Problem. ', 'Md. Nazmul Haque RM', '2019-03-20', '2019-03-20', '1', '15', '3', NULL, '2019-03-20 11:27:35', NULL),
(140, 'SFT000132', 11, 'IT', 'Windows Setup was given to the area managerâ€™s computer..\r\n', 'Golok Chandra Biswas	AM	Suchona Br-204', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 11:29:51', NULL),
(141, 'SFT000133', 11, 'IT', '', 'Accountant Br-138 (Aminul-IT)', '2019-03-20', '2019-03-20', '7', '15', '3', NULL, '2019-03-20 11:30:14', NULL),
(142, 'SFT000134', 11, 'IT', 'Sanarpar-65 Sr. Credit Analis (SME) Md.Mahbub New Laptop all Pertition Delete and OS Setup With New Partition Create.', 'Md.Mahbub', '2019-03-20', '2019-03-20', '2', '18', '3', NULL, '2019-03-20 11:33:10', NULL),
(143, 'SFT000135', 11, 'IT', '', 'Accountant Br-52', '2019-03-20', '2019-03-20', '7', '15', '3', NULL, '2019-03-20 11:56:54', NULL),
(144, 'SFT000136', 11, 'IT', 'Sticky Notes show Admin PC  Complet', 'Jakir Admin(DW)', '2019-03-20', '2019-03-20', '7', '17', '3', NULL, '2019-03-20 12:05:35', NULL),
(145, 'SFT000137', 11, 'IT', 'SQL Server Configuration.......', 'Alamgir Hossain	Sr.Asst.Officer	F & A Br-205', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 12:51:48', NULL),
(146, 'SFT000138', 11, 'IT', 'mail support', 'safaet', '2019-03-20', '2019-03-20', '7', '24', '3', NULL, '2019-03-20 13:05:09', NULL),
(147, 'SFT000139', 11, 'IT', 'Outlook settings problem ', 'Am Mukul Hossain ( Biborton)', '2019-03-20', '2019-03-20', '7', '21', '3', NULL, '2019-03-20 13:59:52', NULL),
(148, 'SFT000140', 11, 'IT', 'Outlook settings problem ', 'Am Mukul Hossain ( Biborton)', '2019-03-20', '2019-03-20', '7', '21', '3', NULL, '2019-03-20 14:00:01', NULL),
(149, 'SFT000141', 11, 'IT', 'Needed KH Total Due Statement', 'Md. Ziaur Rahman (KH Accounts)', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 14:11:33', NULL),
(150, 'SFT000142', 11, 'IT', 'The server room must be cleaned.', 'Director', '2019-03-20', '2019-03-20', '1', '16', '3', NULL, '2019-03-20 14:13:39', NULL),
(151, 'SFT000143', 11, 'IT', 'Internet line is not available.', 'Dr. Mahmuda Akhtar', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 14:17:58', NULL),
(152, 'SFT000144', 11, 'IT', 'Internet line is not available.', 'Dr. Mahmuda Akhtar', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 14:19:47', NULL),
(153, 'SFT000145', 11, 'IT', 'Branch information not update', 'Md. Abdur Rahman Been Ali Area Manager Biborton', '2019-03-20', '2019-03-20', '7', '15', '3', NULL, '2019-03-20 14:29:53', NULL),
(154, 'SFT000146', 11, 'IT', 'can\'t open teams.', 'fozlul houqe', '2019-03-20', '2019-03-20', '7', '24', '3', NULL, '2019-03-20 15:41:51', NULL),
(155, 'SFT000147', 11, 'IT', 'Both hospital patient mobile no. last 4 month', 'Md. Reajul Haque', '2019-03-20', '2019-03-20', '1', '16', '3', NULL, '2019-03-20 15:43:20', NULL),
(156, 'SFT000148', 11, 'IT', 'Sysmex Report Printer not work', 'Md. Sakhowat Hossain', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 15:44:36', NULL),
(157, 'SFT000149', 11, 'IT', 'Kasipur-39 Printer Driver Uninstall or Install then Problem Solved', 'Md.Mijanur Rahman', '2019-03-20', '2019-03-20', '2', '18', '3', NULL, '2019-03-20 16:06:10', NULL),
(158, 'SFT000150', 11, 'IT', 'Install the GP Modem In AM Computer.  ', 'Golok Chandra Biswas	AM	Suchona Br-204', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 16:18:59', NULL),
(159, 'SFT000151', 11, 'IT', 'computer transfer from one desk to another desktop', 'imtiaz ahmed', '2019-03-20', '2019-03-20', '7', '24', '3', NULL, '2019-03-20 16:23:26', NULL),
(160, 'SFT000152', 11, 'IT', 'Md.Mahabubur Brother Laptop Mother Board Driver , Office-16, Bijoy,Microsoft Theams, Outlook, Adobe Reader, Flash Player, One Drive, Mizila Firefox, Google  Chrome etc. Driver Install', 'Md.Mahbubur', '2019-03-20', '2019-03-20', '7', '18', '3', NULL, '2019-03-20 16:25:47', NULL),
(161, 'SFT000153', 11, 'IT', 'AscendEETP_1565_Upazilaelection31032019  Holiday TP Run BR-49  Run complet', 'Forid Vi RM', '2019-03-20', '2019-03-20', '7', '17', '3', NULL, '2019-03-20 16:39:18', NULL),
(162, 'SFT000154', 11, 'IT', 'BR-49 Insurance Delete complet', 'AO BR-49', '2019-03-20', '2019-03-20', '7', '17', '3', NULL, '2019-03-20 16:40:52', NULL),
(163, 'SFT000155', 11, 'IT', 'Area Manager Foyjul Brother (Regine) Laptop Windows Setup But Problem', 'Md.zahurul Islam', '2019-03-20', '2019-03-27', '4', '......', '2', NULL, '2019-03-20 16:59:42', NULL),
(164, 'SFT000156', 11, 'IT', 'Nobabgonj27 Area to Are Manager Fayzul Brother (Regine staf) Laptop Windows.', 'Md.zahurul Islam', '2019-03-20', '2019-03-27', '4', '18', '2', NULL, '2019-03-20 17:07:47', NULL),
(165, 'SFT000157', 11, 'IT', 'My All Region SP_167,168,169,170,171 Sand And Following', 'IT Zaman', '2019-03-20', '2019-03-21', '3', '18', '2', NULL, '2019-03-20 17:34:49', NULL),
(166, 'SFT000158', 11, 'IT', 'Jatrabari-19 Prapty Lon Insurance Problem Solved', 'Md.Serajul Islam', '2019-03-20', '2019-03-20', '7', '18', '3', NULL, '2019-03-20 17:46:23', NULL),
(167, 'SFT000159', 11, 'IT', 'Microsoft  Office Active Has Been Done and E-mail Privacy Security Problem Solve', 'Md Mehed Hasan', '2019-03-20', '2019-03-20', '7', '19', '3', NULL, '2019-03-20 18:02:11', NULL),
(168, 'SFT000160', 11, 'IT', ' Photo Scan Problem Solved', 'Md.Mijanur Rahman', '2019-03-20', '2019-03-20', '7', '18', '3', NULL, '2019-03-20 18:10:50', NULL),
(169, 'SFT000161', 11, 'IT', 'Setup on Mobile and Computer microsoft 365 Problem Solve', 'Md Rabiul Karim (RM)', '2019-03-20', '2019-03-20', '7', '19', '3', NULL, '2019-03-20 18:12:29', NULL),
(170, 'SFT000162', 11, 'IT', 'TP is not run .\r\nSo the Brance was run', 'Md sazib Hossin', '2019-03-20', '2019-03-20', '7', '19', '3', NULL, '2019-03-20 18:41:57', NULL),
(171, 'SFT000163', 11, 'IT', '', 'Accountant Br-19', '2019-03-20', '2019-03-20', '7', '15', '3', NULL, '2019-03-20 18:48:05', NULL),
(172, 'SFT000164', 11, 'IT', 'Insurance Problem Salutationâ€¦', 'Md.Zahid Hasan	Asst. Officer	F & A Br-214', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 18:58:15', NULL),
(173, 'SFT000165', 11, 'IT', 'Run This Tp_167,168,169,170,171\r\n', 'Palash Roy	Sr.Asst.Officer	F & A Br-210', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 19:04:32', NULL),
(174, 'SFT000166', 11, 'IT', 'Run This Tp_167,168,169,170,171', 'Md.Zahid Hasan	Asst. Officer	F & A Br-214', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 19:16:34', NULL),
(175, 'SFT000167', 11, 'IT', 'Run This  Tp_167,168,169,170,171', 'Md.Mominul islam	Asst. Officer	F & A Br-218', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 19:52:09', NULL),
(176, 'SFT000168', 11, 'IT', 'Run This Tp_167,168,169,170,171', 'Alamgir Hossain	Sr.Asst.Officer	F & A Br-205', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 20:12:20', NULL),
(177, 'SFT000169', 11, 'IT', 'Purchase Medicine Posted Problem (NH)', 'Md. Khan Jahan Khan', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 20:45:22', NULL),
(178, 'SFT000170', 11, 'IT', 'Both Hospital DATA Backup', 'Md. Aminul Islam (Shohag)', '2019-03-20', '2019-03-20', '7', '16', '3', NULL, '2019-03-20 20:46:42', NULL),
(179, 'SFT000171', 11, 'IT', 'Run This Tp_167,168,169,170,171', 'Md.Giasul Azam 	Officer	F & A Br-217', '2019-03-20', '2019-03-20', '7', '23', '3', NULL, '2019-03-20 21:00:59', NULL),
(180, 'SFT000172', 11, 'IT', 'Kashinathpur, br-143 new Router setup', 'Accounts officer ', '2019-03-20', '2019-03-20', '7', '21', '3', NULL, '2019-03-20 21:31:16', NULL),
(181, 'SFT000173', 11, 'IT', 'Veramara, br-154 ', 'Accounts officer ', '2019-03-20', '2019-03-20', '7', '21', '3', NULL, '2019-03-20 21:32:25', NULL),
(182, 'SFT000174', 11, 'IT', 'ShirajGong road, Br-144', 'Accounts officer ', '2019-03-20', '2019-03-20', '7', '21', '3', NULL, '2019-03-20 21:33:17', NULL),
(183, 'SFT000175', 11, 'IT', 'Insurance Delete at Kalurghat-55', 'Didar bhai(Accountant)', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 21:53:02', NULL),
(184, 'SFT000176', 11, 'IT', 'Visit + Online file save option Change at chandanaish-171', 'Accountant Bhai', '2019-03-20', '2019-03-20', '7', '......', '3', NULL, '2019-03-20 22:29:32', NULL),
(185, 'SFT000177', 11, 'IT', 'Canon Lide-300 Installation at Fatickchari-105', 'Shadul Bhai', '2019-03-20', '2019-03-20', '7', '......', '3', NULL, '2019-03-20 22:31:08', NULL),
(186, 'SFT000178', 11, 'IT', 'Antivirus Doesn\'t working at Lalkhan Bazar-192', 'Sumi didi', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:32:44', NULL),
(187, 'SFT000179', 11, 'IT', 'Create and add an Email signature in Zimbra', 'AM Kashedul Bhai', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:34:07', NULL),
(188, 'SFT000180', 11, 'IT', 'New Office Installation', 'AM Kashedul Bhai', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:34:50', NULL),
(189, 'SFT000181', 11, 'IT', 'Database restore at Vujpur-105', 'Mamun Bhai', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:35:46', NULL),
(190, 'SFT000182', 11, 'IT', 'Due login+Zimbra Bookmarks Setup ', 'AM Kashedul Bhai', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:39:03', NULL),
(191, 'SFT000183', 11, 'IT', 'MF Reporting Software bookmarking + Short tutorial', 'AM Kashedul Bhai', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:40:13', NULL),
(192, 'SFT000184', 11, 'IT', 'New Ammy Admin setup + Kaspersky rules Add', 'Accountant Bhai', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:41:55', NULL),
(193, 'SFT000185', 11, 'IT', 'Adding Zimbra mail in Browser and create a shortcut in smartphone home screen', 'Zia Bhai (BM br-171)', '2019-03-20', '2019-03-20', '7', '22', '3', NULL, '2019-03-20 22:46:02', NULL),
(194, 'SFT000186', 11, 'IT', 'Shibgong Br-163,  printer does note work ', 'Accounts officer ', '2019-03-21', '2019-03-24', '3', '21', '3', NULL, '2019-03-21 08:47:17', NULL),
(195, 'SFT000187', 11, 'IT', 'Chsasara-18 Support PC Windows Setup and Southtech Software and Printer Sharing', 'Md.Alomgir Hossain', '2019-03-21', '2019-03-28', '4', '18', '3', NULL, '2019-03-21 08:58:12', NULL),
(196, 'SFT000188', 11, 'IT', 'Area Manager Md.Ruhul Amin Brother Laptop Windows Setup and all Software Setup', 'Md.Ruhul Amin', '2019-03-21', '2019-03-28', '4', '18', '3', NULL, '2019-03-21 09:00:53', NULL),
(197, 'SFT000189', 11, 'IT', 'Pen Drive Virus Clean+data Recover', 'Mohsin (BM br-60)', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 09:08:32', NULL),
(198, 'SFT000190', 11, 'IT', 'Kasipur -39 Daily Data Saved Problem Drive Latter  Change and Old Data Removed', 'Md.Mijanur Rahman', '2019-03-21', '2019-03-21', '7', '18', '3', NULL, '2019-03-21 09:12:02', NULL),
(199, 'SFT000191', 11, 'IT', 'SQL Server Configuration.......', 'Md. Moniruzzaman  	Asst. Officer	F & A Br-216', '2019-03-21', '2019-03-21', '7', '23', '3', NULL, '2019-03-21 09:23:12', NULL),
(200, 'SFT000192', 11, 'IT', '', 'Accountant Br-59', '2019-03-21', '2019-03-21', '7', '15', '3', NULL, '2019-03-21 09:42:29', NULL),
(201, 'SFT000193', 11, 'IT', '', 'Accountant Br-43', '2019-03-21', '2019-03-21', '7', '15', '3', NULL, '2019-03-21 10:05:22', NULL),
(202, 'SFT000194', 11, 'IT', 'Windows Update Off &User Name Change.. ', 'Golok Chandra Biswas AM Br-204', '2019-03-21', '2019-03-21', '7', '23', '3', NULL, '2019-03-21 10:07:37', NULL),
(203, 'SFT000195', 11, 'IT', 'skype room ready for meeting ', 'samiul', '2019-03-21', '2019-03-21', '7', '24', '3', NULL, '2019-03-21 10:18:27', NULL),
(204, 'SFT000196', 11, 'IT', 'PC Problom BR-35 . Pc Run But monitor no Display', 'AO BR-35', '2019-03-21', '2019-03-21', '2', '17', '3', NULL, '2019-03-21 10:19:20', NULL),
(205, 'SFT000197', 11, 'IT', 'Data Restore BR-182, Support By Phone Complet', 'AO BR-182', '2019-03-21', '2019-03-21', '7', '17', '3', NULL, '2019-03-21 10:20:56', NULL),
(206, 'SFT000198', 11, 'IT', 'windows activation and other problem', 'shafiq', '2019-03-21', '2019-03-21', '7', '24', '3', NULL, '2019-03-21 10:21:38', NULL),
(207, 'SFT000199', 11, 'IT', 'Wallat Problem Solve BR-170', 'AO BR-170', '2019-03-21', '2019-03-21', '7', '17', '3', NULL, '2019-03-21 10:23:12', NULL),
(208, 'SFT000200', 11, 'IT', 'The hospital will be arranged on March 25th for the camp.', 'Dr. Mahmuda Akhtar', '2019-03-21', '2019-03-21', '2', '16', '3', NULL, '2019-03-21 10:24:41', NULL),
(209, 'SFT000201', 11, 'IT', 'Both Hospital Daily Income Report will be offered at Whats App.', 'Director', '2019-03-21', '2019-03-21', '7', '16', '3', NULL, '2019-03-21 10:27:43', NULL),
(210, 'SFT000202', 11, 'IT', 'Meeting on the occasion of the 25th Camp successful.', 'Dr. Mahmuda Akhtar', '2019-03-21', '2019-03-21', '7', '16', '3', NULL, '2019-03-21 10:32:43', NULL),
(211, 'SFT000203', 11, 'IT', 'See if USG Color Printer is OK.', 'Sumona Akter (NH Admin)', '2019-03-21', '2019-03-21', '1', '16', '3', NULL, '2019-03-21 10:35:52', NULL),
(212, 'SFT000204', 11, 'IT', 'Create an audio file with voice for promotion in Health Camp.', 'Md. Ali Hossan', '2019-03-21', '2019-03-25', '......', '16', '5', NULL, '2019-03-21 10:40:42', NULL),
(213, 'SFT000205', 11, 'IT', 'The Outlook Was Opened By The Accountant', 'Palash Roy	Sr.Asst.Officer	F & A Br-210', '2019-03-21', '2019-03-21', '7', '23', '3', NULL, '2019-03-21 11:00:45', NULL),
(214, 'SFT000206', 11, 'IT', 'Paint Pin to Taskber ', 'Md.Mijanur Rahman', '2019-03-21', '2019-03-21', '7', '18', '3', NULL, '2019-03-21 11:08:04', NULL),
(215, 'SFT000207', 11, 'IT', 'Adomjinagor-22 Student List Update Problem Solved', 'Md.Kaium ', '2019-03-21', '2019-03-21', '7', '18', '3', NULL, '2019-03-21 11:21:18', NULL),
(216, 'SFT000208', 11, 'IT', 'Insurance Problem Salutationâ€¦', 'Md.Saiful Islam	Asst. Officer	F & A Br-222', '2019-03-21', '2019-03-21', '7', '23', '3', NULL, '2019-03-21 11:53:50', NULL),
(217, 'SFT000209', 11, 'IT', 'print problem from software', 'Nazma', '2019-03-21', '2019-03-21', '7', '24', '3', NULL, '2019-03-21 12:31:46', NULL),
(218, 'SFT000210', 11, 'IT', 'Both Hospital Start to Last Month Report', 'Director', '2019-03-21', '2019-03-25', '3', '16', '3', NULL, '2019-03-21 12:35:09', NULL),
(219, 'SFT000211', 11, 'IT', ' Insurance Unmap Found, Insurance Delete BR-35', 'AO BR-35', '2019-03-21', '2019-03-21', '7', '17', '3', NULL, '2019-03-21 13:02:16', NULL),
(220, 'SFT000212', 11, 'IT', 'Bin Replece BR-47 ', 'AO BR-47', '2019-03-21', '2019-03-21', '7', '17', '3', NULL, '2019-03-21 13:04:36', NULL),
(221, 'SFT000213', 11, 'IT', 'Bin Replece Complet  BR-35 ', 'AO BR-35', '2019-03-21', '2019-03-21', '7', '17', '3', NULL, '2019-03-21 13:05:47', NULL),
(222, 'SFT000214', 11, 'IT', 'Downloads Always ask you where to save files  or Save files to', 'Aodhir Chandra Das', '2019-03-21', '2019-03-21', '7', '19', '3', NULL, '2019-03-21 13:47:32', NULL),
(223, 'SFT000215', 11, 'IT', 'Insurance Delete', 'Md Mamun Ali', '2019-03-21', '2019-03-21', '7', '19', '3', NULL, '2019-03-21 13:52:03', NULL),
(224, 'SFT000216', 11, 'IT', 'Modem software  install', 'Md Razzak ', '2019-03-21', '2019-03-21', '7', '19', '3', NULL, '2019-03-21 14:00:03', NULL),
(225, 'SFT000217', 11, 'IT', 'Chasara-10 Accountant Mobile Due or Zimbra Use Learn', 'Md.Alomgir Hossain', '2019-03-21', '2019-03-21', '7', '18', '3', NULL, '2019-03-21 15:12:18', NULL),
(226, 'SFT000218', 11, 'IT', 'Database Restore BR-49 Date 20-03-2019', 'AO BR-49', '2019-03-21', '2019-03-21', '7', '17', '3', NULL, '2019-03-21 15:49:00', NULL),
(227, 'SFT000219', 11, 'IT', 'Insurance Delete', 'Md Aminul Haquk', '2019-03-21', '2019-03-21', '7', '19', '3', NULL, '2019-03-21 16:03:33', NULL),
(228, 'SFT000220', 11, 'IT', 'Insurance Delete', 'Md Jabed Hossin', '2019-03-21', '2019-03-21', '7', '19', '3', NULL, '2019-03-21 16:09:32', NULL),
(229, 'SFT000221', 11, 'IT', 'Password reset, Area Rearrange', 'Mohammad Rohul Amin (Area Manager) Poncho Boti Suchona', '2019-03-21', '2019-03-21', '7', '15', '3', NULL, '2019-03-21 16:11:35', NULL),
(230, 'SFT000222', 11, 'IT', 'Insurance Problem Salutationâ€¦', 'Mostafijur Rahaman  	Officer	F & A -Br-219', '2019-03-21', '2019-03-21', '7', '23', '3', NULL, '2019-03-21 16:13:33', NULL),
(231, 'SFT000223', 11, 'IT', 'Insurance Delet ', 'Md Nazmul Hasan', '2019-03-21', '2019-03-21', '7', '19', '3', NULL, '2019-03-21 16:46:48', NULL),
(232, 'SFT000224', 11, 'IT', '', 'Accountant Br-177', '2019-03-21', '2019-03-21', '7', '15', '3', NULL, '2019-03-21 16:55:30', NULL),
(233, 'SFT000225', 11, 'IT', 'Lab Printer Problems So Need A Backup Printer', 'Md. Jahidul Islam', '2019-03-21', '2019-03-21', '7', '16', '3', NULL, '2019-03-21 17:03:11', NULL),
(234, 'SFT000226', 11, 'IT', 'Both Hospital Daily DATA Backup', 'Md. Aminul Islam (Shohag)', '2019-03-21', '2019-03-21', '7', '16', '3', NULL, '2019-03-21 17:07:08', NULL),
(235, 'SFT000227', 11, 'IT', '', 'Accountant Br-157', '2019-03-21', '2019-03-21', '7', '15', '3', NULL, '2019-03-21 18:02:52', NULL),
(236, 'SFT000228', 11, 'IT', 'Insurance Problem Salutation', 'Md.Saiful Islam	Asst. Officer	F & A Br-222', '2019-03-21', '2019-03-21', '7', '23', '3', NULL, '2019-03-21 19:09:37', NULL),
(237, 'SFT000229', 11, 'IT', ' Insurance Delete BR-182 Complete', 'AO BR-182', '2019-03-21', '2019-03-21', '7', '17', '3', NULL, '2019-03-21 21:15:49', NULL),
(238, 'SFT000230', 11, 'IT', 'New Windows + Southtech+SQL2008+Utility Soft setup at Sonagazi-125 on new support laptop', 'Shah Alam Vai (accountant)', '2019-03-21', '2019-03-21', '2', '22', '3', NULL, '2019-03-21 21:51:43', NULL),
(239, 'SFT000231', 11, 'IT', 'New Office+mozilla+New user rules etc at Sonagazi-125 on old laptop', 'Shah Alam Vai (accountant)', '2019-03-21', '2019-03-21', '2', '22', '3', NULL, '2019-03-21 21:53:22', NULL),
(240, 'SFT000232', 11, 'IT', 'Share 2 laptop (Printer+Southtech+Folder) at Sonagazi-125', 'Shah Alam Vai (accountant)', '2019-03-21', '2019-03-21', '1', '22', '3', NULL, '2019-03-21 21:55:01', NULL),
(241, 'SFT000233', 11, 'IT', 'Insurance Delete at Pahartoli-54', 'Mijan bhai (Accountant)', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 21:55:51', NULL),
(242, 'SFT000234', 11, 'IT', 'Insurance Delete at patenga-58', 'Accountant(br-56)', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 21:57:25', NULL),
(243, 'SFT000235', 11, 'IT', 'Database restore at Vujpur-105 2nd time', 'Masud Amin', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 21:58:22', NULL),
(244, 'SFT000236', 11, 'IT', 'Database restore at Vujpur-105 3rd time', 'Mamun Bhai', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 21:59:04', NULL),
(245, 'SFT000237', 11, 'IT', 'New Mozilla+Due login+Short course on Reporting soft', 'AM Rashedul Hoque', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 22:00:40', NULL),
(246, 'SFT000238', 11, 'IT', 'Pen Drive Virus Clean+data Recover', 'Shah Alam Vai (accountant)', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 22:01:24', NULL),
(247, 'SFT000239', 11, 'IT', 'Insurance Delete at MirSorai-106', 'Alamgeer bhai (Accountant)', '2019-03-21', '2019-03-21', '7', '22', '3', NULL, '2019-03-21 22:06:08', NULL),
(248, 'SFT000240', 11, 'IT', 'New Mozilla+Due login+Bookmark toolbar at Alanker-52', 'Accountant Bhai', '2019-03-23', '2019-03-23', '7', '22', '3', NULL, '2019-03-23 09:35:39', NULL),
(249, 'SFT000241', 11, 'IT', 'New Bijoy 52 Setup at Alanker-52', 'Accountant Bhai', '2019-03-23', '2019-03-23', '7', '22', '3', NULL, '2019-03-23 09:36:39', NULL),
(250, 'SFT000242', 11, 'IT', 'Both Hospital Daily Income Report will be offered at Whats App.', 'Director', '2019-03-22', '2019-03-22', '7', '16', '3', NULL, '2019-03-23 10:11:01', NULL),
(251, 'SFT000243', 11, 'IT', 'Both Hospital Daily Income Report will be offered at Whats App.', 'Director', '2019-03-23', '2019-03-23', '7', '16', '3', NULL, '2019-03-23 10:12:09', NULL),
(252, 'SFT000244', 11, 'IT', 'Discount is not counted in software.', 'Md. Ubaydullah', '2019-03-22', '2019-03-22', '7', '16', '3', NULL, '2019-03-23 10:19:32', NULL),
(253, 'SFT000245', 11, 'IT', 'USG Color Printer not work.', 'Md. Shahjalal Farazi / Tahmina', '2019-03-23', '2019-03-23', '7', '16', '3', NULL, '2019-03-23 10:21:59', NULL),
(254, 'SFT000246', 11, 'IT', 'Crystal Report Problem BR-47 Solve', 'AO BR-47', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 10:29:26', NULL),
(255, 'SFT000247', 11, 'IT', 'KH Health Camp Package Statement 17 to 23 March, 2019', 'Md. Shahjalal Farazi', '2019-03-23', '2019-03-23', '1', '16', '3', NULL, '2019-03-23 10:36:53', NULL),
(256, 'SFT000248', 11, 'IT', 'Pathology Barcode printer is not work', 'Amullya Chandra Sarker ', '2019-03-23', '2019-03-23', '7', '16', '3', NULL, '2019-03-23 10:40:32', NULL),
(257, 'SFT000249', 11, 'IT', 'It has been approved to be Head Office, that will show some information discreet manual to be software.', 'Md. Ziaur Rahman (KH Accounts)', '2019-03-23', '2019-03-31', '4', '16', '1', NULL, '2019-03-23 10:48:36', NULL),
(258, 'SFT000250', 11, 'IT', 'AscendEETP_1565_Upazilaelection31032019', 'AO BR-72', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 10:51:36', NULL),
(259, 'SFT000251', 11, 'IT', 'Some computer accessories are needed, so the purchase committee has to help.', 'Md. Ali Hossan', '2019-03-23', '2019-03-23', '1', '16', '3', NULL, '2019-03-23 10:52:56', NULL),
(260, 'SFT000252', 11, 'IT', 'Holiday Upazilaelection 31/03/2019, BR-07', 'AO BR-07', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 10:53:22', NULL),
(261, 'SFT000253', 11, 'IT', 'Holiday Upazilaelection 31/03/2019  BR-46 Complete', 'AO BR-46', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 10:58:10', NULL),
(262, 'SFT000254', 11, 'IT', 'Holiday Upazilaelection 31/03/2019  BR-1 Complet\r\nSupport By Phone', 'AO BR-1', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 11:04:03', NULL),
(263, 'SFT000255', 11, 'IT', 'Holiday Upazilaelection BR-95 Complet\r\nSupport By Phone', 'AO BR-95', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 11:18:57', NULL),
(264, 'SFT000256', 11, 'IT', 'Holiday Upazilaelection BR-89', 'AO BR-89', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 11:22:56', NULL),
(265, 'SFT000257', 11, 'IT', 'Holiday Upazilaelection31/03/2019 BR-90', 'AO BR-90', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 11:31:18', NULL),
(266, 'SFT000258', 11, 'IT', 'Holiday Upazilaelection 31/03/2019 BR-170 complet\r\nBy phone Confirm', 'AO BR-132', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 11:47:03', NULL),
(267, 'SFT000259', 11, 'IT', 'Holiday Upazilaelection 24/03/2019 BR-181 Complete\r\nBy Phone Confirm', 'AO BR-181', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 11:52:13', NULL),
(268, 'SFT000260', 11, 'IT', 'Holiday Upazilaelection 24/03/2019 BR-170', 'AO BR-170', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 11:54:40', NULL),
(269, 'SFT000261', 11, 'IT', 'Veramara, Br-154', 'Accounts officer ', '2019-03-23', '2019-03-25', '3', '21', '1', NULL, '2019-03-23 12:30:31', NULL),
(270, 'SFT000262', 11, 'IT', 'Sinthiya, Br-145', 'Accounts officer ', '2019-03-23', '2019-03-25', '3', '21', '1', NULL, '2019-03-23 12:32:15', NULL),
(271, 'SFT000263', 11, 'IT', 'Insurance Delete', 'Md Mizanur Rahman', '2019-03-21', '2019-03-21', '7', '19', '3', NULL, '2019-03-23 12:55:06', NULL),
(272, 'SFT000264', 11, 'IT', 'The Outlook Was Opened By The Area Manager.......', 'Md Khalid Emaran AM Br-207', '2019-03-23', '2019-03-23', '7', '23', '3', NULL, '2019-03-23 12:57:32', NULL),
(273, 'SFT000265', 11, 'IT', 'Eye Department Reception UPS not work properly.', ' 	Md. Masudur Rahman ', '2019-03-23', '2019-03-23', '3', '16', '3', NULL, '2019-03-23 13:46:00', NULL),
(274, 'SFT000266', 11, 'IT', 'UPS is not working properly.', 'Farjana Mitu', '2019-03-23', '2019-03-25', '3', '16', '3', NULL, '2019-03-23 13:49:01', NULL),
(275, 'SFT000267', 11, 'IT', 'Product ID 1185 Product Name Cap. Rocef 500mg. The purchase rate is 10.62 Taka, wrongly entered is 13.60 Taka, which needs to be resolved (In the 2016 inventory\'s time was wrong entry).', 'Md. Sanaullah', '2019-03-23', '2019-03-23', '1', '16', '3', NULL, '2019-03-23 14:10:11', NULL),
(276, 'SFT000268', 11, 'IT', 'Holiday Upazilaelection 24/03/2019 BR-182 \r\nSupport By Phone Confirm ', 'AO BR-182', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 14:10:12', NULL),
(277, 'SFT000269', 11, 'IT', 'bijoy 52 software is installed on the area manager\'s computer', 'Md.Shafiqul islam AM Biborton Br-207', '2019-03-23', '2019-03-23', '7', '23', '3', NULL, '2019-03-23 15:17:38', NULL),
(278, 'SFT000270', 11, 'IT', 'Office Problem BR-35 solve', 'AO BR-35', '2019-03-23', '2019-03-23', '7', '17', '3', NULL, '2019-03-23 15:19:13', NULL),
(279, 'SFT000271', 11, 'IT', 'The Outlook Was Opened By The Accountan.......', 'MD:SAROWAR HOSSAIN	Officer(F& A)	F & A Br-207', '2019-03-23', '2019-03-23', '7', '23', '3', NULL, '2019-03-23 15:19:24', NULL),
(280, 'SFT000272', 11, 'IT', 'The Outlook Was Opened By The Accountan.......', 'MD:SAROWAR HOSSAIN	Officer(F& A)	F & A Br-207', '2019-03-23', '2019-03-23', '7', '23', '3', NULL, '2019-03-23 15:21:39', NULL),
(281, 'SFT000273', 11, 'IT', 'Mozila Firefox Problem Unistall Or Install', 'Md.Mahbubur', '2019-03-23', '2019-03-23', '7', '18', '3', NULL, '2019-03-23 15:46:27', NULL),
(282, 'SFT000274', 11, 'IT', 'Mozila Firefox Problem Unistall Or Install', 'Md.Jomidar', '2019-03-23', '2019-03-23', '7', '18', '3', NULL, '2019-03-23 15:46:58', NULL),
(283, 'SFT000275', 11, 'IT', 'Virus Clean & Browser Setup BR-04 complete', 'AO BR-04', '2019-03-23', '2019-03-23', '1', '17', '3', NULL, '2019-03-23 16:09:12', NULL),
(284, 'SFT000276', 11, 'IT', 'Canon lide 120 driver install', 'Md Abu zafar  Ahamad', '2019-03-23', '2019-03-23', '7', '19', '3', NULL, '2019-03-23 16:32:04', NULL),
(285, 'SFT000277', 11, 'IT', 'The Outlook Was Opened By The  Manager.......', 'Md.Minhajul islam Khan BM MF Br-207', '2019-03-23', '2019-03-23', '7', '23', '3', NULL, '2019-03-23 17:01:00', NULL),
(286, 'SFT000278', 11, 'IT', 'Complete the daily data backup process in the hospital.', 'Md. Aminul Islam (Shohag)', '2019-03-23', '2019-03-23', '7', '16', '3', NULL, '2019-03-23 17:01:14', NULL),
(287, 'SFT000279', 11, 'IT', 'Database restore at Alanker-52', 'Accountant Bhai', '2019-03-23', '2019-03-23', '7', '22', '3', NULL, '2019-03-23 18:16:04', NULL),
(288, 'SFT000280', 11, 'IT', 'Acrobat reader setup at Lalkhanbazar-192', 'Sumi didi', '2019-03-23', '2019-03-23', '7', '22', '3', NULL, '2019-03-23 18:17:30', NULL),
(289, 'SFT000281', 11, 'IT', 'Database restore at Bandar-62', 'Alamgeer bhai (Accountant)', '2019-03-23', '2019-03-23', '7', '22', '3', NULL, '2019-03-23 18:18:18', NULL),
(290, 'SFT000282', 11, 'IT', 'Insurance Delete at Chandanaish-171', 'Accountant Bhai', '2019-03-23', '2019-03-23', '7', '22', '3', NULL, '2019-03-23 18:43:30', NULL),
(291, 'SFT000283', 11, 'IT', 'Problems with USG Color Printer, Not Being Printed.', 'Md. Shahjalal Farazi', '2019-03-24', '2019-03-24', '2', '16', '3', NULL, '2019-03-24 09:46:14', NULL),
(292, 'SFT000284', 11, 'IT', 'Eye camp will be organized in the next 27 march,\r\nArrange the videos to be shown on the camp through multimedia projectors and TVs.', 'Dr. Ishtique Ahamed Zahid', '2019-03-24', '2019-03-24', '2', '16', '3', NULL, '2019-03-24 10:21:04', NULL);
INSERT INTO `tickets` (`ticketId`, `ticketNumber`, `userId`, `userDept`, `ticketDescription`, `ticketRequestedBy`, `ticketReqDate`, `ticketDeadline`, `ticketSize`, `ticketAssignedTo`, `ticketStatus`, `ticketComment`, `ticketCreatedAt`, `ticketUpdatedAt`) VALUES
(293, 'SFT000285', 11, 'IT', 'MS Word Problem BR-35, Print Preview solve ', 'AO BR-35', '2019-03-24', '2019-03-24', '7', '17', '3', NULL, '2019-03-24 10:32:05', NULL),
(294, 'SFT000286', 11, 'IT', 'Scanner & SQL Setup  BR-07 ', 'AO BR-07', '2019-03-24', '2019-03-24', '1', '17', '3', NULL, '2019-03-24 10:57:27', NULL),
(295, 'SFT000287', 11, 'IT', 'Needed Corporate wise report 01 to 23 March, 2019 ', 'Md. Harun-or-Rashid', '2019-03-24', '2019-03-24', '1', '16', '3', NULL, '2019-03-24 11:15:51', NULL),
(296, 'SFT000288', 11, 'IT', '', 'Nazma', '2019-03-24', '2019-03-24', '7', '24', '3', NULL, '2019-03-24 11:27:37', NULL),
(297, 'SFT000289', 11, 'IT', 'loose connection ', 'tariqul islam', '2019-03-24', '2019-03-24', '7', '24', '3', NULL, '2019-03-24 11:37:22', NULL),
(298, 'SFT000290', 11, 'IT', '', 'Accountant Br-37', '2019-03-24', '2019-03-24', '7', '15', '3', NULL, '2019-03-24 11:37:36', NULL),
(299, 'SFT000291', 11, 'IT', '', 'Accountant Br-183', '2019-03-24', '2019-03-24', '7', '15', '3', NULL, '2019-03-24 11:38:13', NULL),
(300, 'SFT000292', 11, 'IT', 'Wallet data send problem ', 'Accounts officer ', '2019-03-24', '2019-03-24', '7', '21', '3', NULL, '2019-03-24 12:45:50', NULL),
(301, 'SFT000293', 11, 'IT', 'Br-165, 168, 146, 153, 199', 'IT Md. Anowar Hossain ', '2019-03-24', '2019-03-24', '2', '21', '2', NULL, '2019-03-24 12:48:52', NULL),
(302, 'SFT000294', 11, 'IT', 'I don\'t no', 'RM Shofiqul Islam', '2019-03-24', '2019-03-24', '7', '21', '3', NULL, '2019-03-24 12:51:12', NULL),
(303, 'SFT000295', 11, 'IT', 'Haad Office FTP server Data sand', 'Md Shohel Rana', '2019-03-24', '2019-03-24', '7', '19', '3', NULL, '2019-03-24 12:54:58', NULL),
(304, 'SFT000296', 11, 'IT', 'March 2018 to March 2019 Service wise report needed.', 'Dr. Mahmuda Akhtar', '2019-03-24', '2019-03-25', '2', '16', '3', NULL, '2019-03-24 13:12:56', NULL),
(305, 'SFT000297', 11, 'IT', 'The Outlook Was Opened By The Aaccountan .......', 'Md.Azizul Haque	Sr.Asst.Officer F & A Br-208', '2019-03-24', '2019-03-24', '7', '23', '3', NULL, '2019-03-24 13:21:12', NULL),
(306, 'SFT000298', 11, 'IT', 'internet problem', 'khairul alam', '2019-03-24', '2019-03-24', '7', '24', '3', NULL, '2019-03-24 14:45:56', NULL),
(307, 'SFT000299', 11, 'IT', 'cant  write  in excel', 'farhan', '2019-03-24', '2019-03-24', '7', '24', '3', NULL, '2019-03-24 14:47:29', NULL),
(308, 'SFT000300', 11, 'IT', 'antivirus uninstall for new software install', 'badruzzaman bappy', '2019-03-24', '2019-03-24', '7', '24', '3', NULL, '2019-03-24 15:00:22', NULL),
(309, 'SFT000301', 11, 'IT', 'new windows install', 'Mukit Akram', '2019-03-24', '2019-03-24', '1', '24', '3', NULL, '2019-03-24 15:08:32', NULL),
(310, 'SFT000302', 11, 'IT', 'SO Setup BR-07 The reason â€SQL not confige  ', 'AO BR-07', '2019-03-24', '2019-03-24', '1', '17', '3', NULL, '2019-03-24 15:12:02', NULL),
(311, 'SFT000303', 11, 'IT', '', 'Accountant Br-196', '2019-03-24', '2019-03-24', '7', '15', '3', NULL, '2019-03-24 15:35:14', NULL),
(312, 'SFT000304', 11, 'IT', 'Page Setup', 'Md Shohel Rana', '2019-03-24', '2019-03-24', '7', '19', '3', NULL, '2019-03-24 16:07:48', NULL),
(313, 'SFT000305', 11, 'IT', 'how to learn E-mail using. ', 'Md Masud Rana', '2019-03-24', '2019-03-24', '7', '19', '3', NULL, '2019-03-24 16:23:16', NULL),
(314, 'SFT000306', 11, 'IT', 'Insurance Delete at patenga-58', 'Accountant Bhai', '2019-03-24', '2019-03-24', '7', '22', '3', NULL, '2019-03-24 16:45:11', NULL),
(315, 'SFT000307', 11, 'IT', 'New Windows + Southtech+SQL2008+Utility Soft setup at Bandar-62', 'Alamgeer bhai (Accountant)', '2019-03-24', '2019-03-24', '1', '22', '3', NULL, '2019-03-24 16:46:07', NULL),
(316, 'SFT000308', 11, 'IT', 'Due login+Zimbra Bookmarks Setup at Bakulia 56', 'Accountant Bhai', '2019-03-24', '2019-03-24', '7', '22', '3', NULL, '2019-03-24 16:46:42', NULL),
(317, 'SFT000309', 11, 'IT', 'Share 2 laptop (Printer+Southtech+Folder) at Bandar-62', 'Alamgeer bhai (Accountant)', '2019-03-24', '2019-03-24', '1', '22', '3', NULL, '2019-03-24 16:47:25', NULL),
(318, 'SFT000310', 11, 'IT', 'Database restore at Halisahar-53', 'AM Kashedul Bhai', '2019-03-24', '2019-03-24', '7', '22', '3', NULL, '2019-03-24 16:49:58', NULL),
(319, 'SFT000311', 11, 'IT', 'Scanner new setup at Alanker-52', 'Accountant Bhai', '2019-03-24', '2019-03-24', '7', '22', '3', NULL, '2019-03-24 16:56:24', NULL),
(320, 'SFT000312', 11, 'IT', 'Complete the daily data backup process in the hospital.', 'Md. Aminul Islam (Shohag)', '2019-03-24', '2019-03-24', '7', '16', '3', NULL, '2019-03-24 18:00:25', NULL),
(321, 'SFT000313', 11, 'IT', 'Eye Camp Meeting', 'Dr. Ishtique Ahamed Zahid', '2019-03-24', '2019-03-24', '7', '16', '3', NULL, '2019-03-24 18:01:33', NULL),
(322, 'SFT000314', 11, 'IT', 'Software not work', 'Md. Ubaydullah', '2019-03-24', '2019-03-24', '7', '16', '3', NULL, '2019-03-24 18:05:35', NULL),
(323, 'SFT000315', 11, 'IT', 'Printer not work show the error massage', 'Md. Sawkat (NH X-ray)', '2019-03-24', '2019-03-26', '3', '16', '2', NULL, '2019-03-24 18:09:57', NULL),
(324, 'SFT000316', 11, 'IT', 'We need to establish email communication with Snaullah & Khan E Jahan.', 'Director', '2019-03-24', '2019-03-26', '3', '16', '2', NULL, '2019-03-24 18:50:55', NULL),
(325, 'SFT000317', 11, 'IT', 'SF Some videos are not open on TV.', 'Dr. Ishtique Ahamed Zahid', '2019-03-24', '2019-03-24', '7', '16', '3', NULL, '2019-03-24 19:09:29', NULL),
(326, 'SFT000318', 11, 'IT', 'Insurance Delete at Br-109', 'Accountant Bhai', '2019-03-24', '2019-03-24', '7', '22', '3', NULL, '2019-03-24 20:13:36', NULL),
(327, 'SFT000319', 11, 'IT', 'Cannot connected Wifi', 'RM Roiul Islam', '2019-03-24', '2019-03-24', '7', '21', '3', NULL, '2019-03-24 22:32:17', NULL),
(328, 'SFT000320', 11, 'IT', 'Cannot connected Wifi', 'RM Roiul Islam', '2019-03-24', '2019-03-24', '7', '21', '3', NULL, '2019-03-24 23:01:28', NULL),
(329, 'SFT000321', 11, 'IT', '', 'Accountant Br-124', '2019-03-25', '2019-03-25', '7', '15', '3', NULL, '2019-03-25 09:14:36', NULL),
(330, 'SFT000322', 11, 'IT', 'Sonargon-38 Insurance Problem Solved', 'Md.Parves Akther', '2019-03-24', '2019-03-24', '7', '18', '3', NULL, '2019-03-25 09:20:51', NULL),
(331, 'SFT000323', 11, 'IT', 'Tongibari-156 Insurance Problem Solved', 'Md.Faruk', '2019-03-24', '2019-03-24', '7', '18', '3', NULL, '2019-03-25 09:22:27', NULL),
(332, 'SFT000324', 11, 'IT', 'Sreenagar Br-1565 for Election TP Run This Branch\r\n', 'Md.Md.Elias', '2019-03-24', '2019-03-24', '7', '18', '3', NULL, '2019-03-25 09:31:18', NULL),
(333, 'SFT000325', 11, 'IT', 'Veramara, Br-154', 'Accounts officer ', '2019-03-25', '2019-03-25', '7', '21', '3', NULL, '2019-03-25 09:33:35', NULL),
(334, 'SFT000326', 11, 'IT', 'Allardorga, Br-165', 'Accounts officer ', '2019-03-25', '2019-03-25', '7', '21', '3', NULL, '2019-03-25 09:38:58', NULL),
(335, 'SFT000327', 11, 'IT', 'Lahini, Br-198', 'Accounts officer ', '2019-03-25', '2019-03-25', '7', '21', '3', NULL, '2019-03-25 09:52:14', NULL),
(336, 'SFT000328', 11, 'IT', 'Lahini, Br-198', 'Accounts officer ', '2019-03-25', '2019-03-25', '7', '21', '3', NULL, '2019-03-25 09:52:49', NULL),
(337, 'SFT000329', 11, 'IT', 'Bhaggokul-120 Branch Visit PC Un Necessary Temp File Clean, Modem Draiver Unistall or Install, TV/Pendrive Check etc.', 'Nittanondo Kunda', '2019-03-24', '2019-03-24', '7', '18', '3', NULL, '2019-03-25 09:54:47', NULL),
(338, 'SFT000330', 11, 'IT', 'Today, to work with the campus of the eye, stay with the management (eye camps in 25 March 2019).', 'Emanual Bappy Mondol', '2019-03-25', '2019-03-25', '2', '16', '2', NULL, '2019-03-25 10:01:49', NULL),
(339, 'SFT000331', 11, 'IT', 'Both Hospital Daily Income Report will be offered at Whats App.', 'Director', '2019-03-25', '2019-03-25', '7', '16', '3', NULL, '2019-03-25 10:02:51', NULL),
(340, 'SFT000332', 11, 'IT', 'Insurance Delete BR-35 complet', 'AO BR-35', '2019-03-25', '2019-03-25', '7', '17', '3', NULL, '2019-03-25 10:04:44', NULL),
(341, 'SFT000333', 11, 'IT', 'Srenagor-121 Branch visit PC Un Nacessary trmp Fie TP SP Clean TV/Pendrive Check', 'Md.Elias ', '2019-03-24', '2019-03-24', '7', '18', '3', NULL, '2019-03-25 10:05:14', NULL),
(342, 'SFT000334', 11, 'IT', 'Sarulia-13 Sexual Training Projector Ganarator etc', 'Md.Yusuf Ali (RM)', '2019-03-25', '2019-03-25', '2', '18', '2', NULL, '2019-03-25 10:09:12', NULL),
(343, 'SFT000335', 11, 'IT', 'Scanner  Setup  BR-147 Complete\r\nThis Branch Others work ok', 'AO BR-147', '2019-03-25', '2019-03-25', '1', '17', '2', NULL, '2019-03-25 10:09:31', NULL),
(344, 'SFT000336', 1, 'IT', 'Test', 'Myself', '2019-03-25', '2019-03-26', '1', '25', '3', NULL, '2019-03-25 10:53:01', '2019-03-25 10:53:11'),
(345, 'SFT000337', 1, 'IT', 'Test 1', 'khairul@sajida.org', '2019-07-03', '2019-07-05', '1', '25', '3', NULL, '2019-07-03 06:54:23', '2019-07-03 09:39:52'),
(346, 'SFT000338', 1, 'IT', 'Test', 'khairul@sajida.org', '2019-07-03', '2019-07-03', '2', '25', '3', NULL, '2019-07-03 09:44:41', '2019-07-03 09:45:25'),
(347, 'SFT000339', 1, 'IT', 'TEst', 'khairul@sajida.org', '2019-07-03', '2019-07-03', '3', '25', '3', NULL, '2019-07-03 09:49:56', '2019-07-03 09:50:05'),
(348, 'SFT000340', 1, 'IT', 'Imp,,ement', 'khairul@sajida.org', '2019-07-07', '2019-07-07', '2', '25', '3', NULL, '2019-07-07 04:46:41', '2019-07-07 04:48:06'),
(349, 'SFT000341', 1, 'IT', '', 'khairul@sajida.org', '2019-07-07', '2019-07-07', '3', '25', '3', NULL, '2019-07-07 05:05:44', NULL),
(350, 'SFT000342', 1, 'IT', '', 'khairul@sajida.org', '2019-07-07', '2019-07-08', '1', '25', '3', NULL, '2019-07-07 05:06:10', '2019-07-07 05:06:18'),
(351, 'SFT000343', 1, 'IT', '', 'rafiq.islam@sajida.org', '2019-07-25', '2019-07-26', '2', '25', '3', NULL, '2019-07-25 04:59:50', '2019-07-25 05:14:47'),
(352, 'SFT000344', 1, 'IT', '', 'khairul@sajida.org', '2019-07-25', '2019-07-26', '2', '25', '3', NULL, '2019-07-25 05:00:23', '2019-07-25 05:15:18'),
(353, 'SFT000345', 1, 'IT', '', 'khairul@sajida.org', '2019-07-25', '2019-07-25', '2', '25', '3', NULL, '2019-07-25 05:27:02', '2019-07-25 05:53:54');

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
  `supervisorId` int(11) DEFAULT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userDept` varchar(150) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `userStatus` varchar(100) NOT NULL DEFAULT 'Active',
  `userCreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `supervisorId`, `userName`, `userEmail`, `userPassword`, `userDept`, `userType`, `userStatus`, `userCreatedAt`) VALUES
(1, 0, 'Khairul Alam', 'khairul@sajida.org', '$2y$10$6bJMNvMyWKs4eyLiqbLqf.ZPYqFJob7zQQkHgM.N6wQBcQDH4qJSq', 'IT', 'Administrator', 'Active', '2019-02-04 09:36:56'),
(12, 9, 'Shamim', 'shamim@sajida.org', '$2y$10$SGmDC9Vb1nCYnRKIIbUwpuuStlj/amyTyMDxykJ8wQxUyzHNStiPO', 'MIS', 'Supervisor', 'Active', '2019-03-11 13:40:59'),
(11, 9, 'Rejaul Haque', 'rejaul@sajida.org', '$2y$10$wZuIb0A.mJUfm3yrYPp0XuKlWkYcipMf0f5brIko9GOjjhqP0DpzC', 'IT', 'Supervisor', 'Active', '2019-02-26 16:04:23'),
(9, 1, 'Tazin Shadid', 'tazin@sajida.org', '$2y$10$JvJxFDZ.K4rg3S2FgwQ8xuuZdYKUmlTFUSBsA2FGwyLnVAnfGkxrK', 'IT', 'Supervisor', 'Active', '2019-02-26 15:55:28'),
(15, 11, 'Md. Anowar Hossain', 'anowar@sajida.org', '$2y$10$ODzaF8Z25v03E1PmmCaw7ubA7f591EBfRe3oUUOhsjOE4.t8RxYLK', 'IT', 'User', 'Active', '2019-03-18 17:21:37'),
(14, 11, 'Md. Mostafizur Rahman', 'mostafiz@sajida.org', '$2y$10$XaBW27VkPHGFIKgTgf0fIeJrpYDFo0BhylLQSNnk.3xnEa5tsdX2u', 'IT', 'User', 'Active', '2019-03-18 17:20:56'),
(16, 11, 'Md. Aminul Islam Shohag', 'aminul@sajida.org', '$2y$10$Cq2JZaS0VUFBocHQaEzZ3OOtgAcJJxbtadjeliNixDs6W5hJJOfqW', 'IT', 'User', 'Active', '2019-03-18 17:22:16'),
(17, 11, 'Md. Yousuf Ali', 'yousuf@sajida.org', '$2y$10$dll06AnMs/JiwUgEtH7zdORbXCOzQZfF788GYn7FG9voSKG5cncY2', 'IT', 'User', 'Active', '2019-03-18 17:22:45'),
(18, 11, 'Md. Kamruzzaman', 'zaman@sajida.org', '$2y$10$WXordYlOzlFkAZD6tQJ7SuBTYBKFcvXfKod9VQSot0JI9gcrid.Nu', 'IT', 'User', 'Active', '2019-03-18 17:23:09'),
(19, 11, 'Md. Aminul Islam', 'a.aminul@sajida.org', '$2y$10$XSkhGsqmwAysF7nxjXG43.oIzzQi5avYQQ5sqYcpvdor0j8zf5Txa', 'IT', 'User', 'Active', '2019-03-18 17:23:49'),
(20, 11, 'Mohaimenul Islam', 'mohaimenul@sajida.org', '$2y$10$gZJt5JXr7pMOiE1WbjlgtOtYMVR2e6o5yTCOeCmXMYHGj9zwhlEou', 'IT', 'User', 'Active', '2019-03-18 17:28:32'),
(21, 11, 'Md. Sanaullah Smrat', 'sanaullah@sajida.org', '$2y$10$DhdmVldhszMtXAdcCEVWduAeQbvld2NzfWW6PdYL5UpBndqtTOSb6', 'IT', 'User', 'Active', '2019-03-18 17:29:06'),
(22, 11, 'Md. Masudul Amin', 'masud@sajida.org', '$2y$10$ypjGbOL.kcXflkAVc09BlODwy8TR9e5K0t5uiX4BLQMnUf/ivtGtK', 'IT', 'User', 'Active', '2019-03-18 17:30:18'),
(23, 11, 'Md. Sajjat Hossain', 'sajjat@sajida.org', '$2y$10$/zcC.ly/2REkee9bGZ1QcO7TqSIZosM6KmDooCVofnzNtf69HKZZG', 'IT', 'User', 'Active', '2019-03-18 17:31:11'),
(24, 11, 'Md. Rafiqul Islam', 'rafiq.islam@sajida.org', '$2y$10$Lwl8UOKi77lTypZ/a0m.D.RBomVNLr/i.2Gwn9.jZI9SWrxgUYKeK', 'IT', 'User', 'Active', '2019-03-19 12:09:56'),
(25, 1, 'Test Account', 'test@sajida.org', '$2y$10$ukUPQ7gpPl1UXbLKXJCOYuNxSZYSWEM4mNHhhkvg/HeSv7EAiYCWS', 'IT', 'User', 'Active', '2019-03-25 10:52:15'),
(26, 1, 'Test', 'test@sajida.org', '$2y$10$apZYK./ABk/HAu8yXZDBZ.MooGxUj9j/4qNYThN3Sy5NZ3Ipju3p.', 'MIS', 'User', 'Active', '2019-06-27 04:06:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
