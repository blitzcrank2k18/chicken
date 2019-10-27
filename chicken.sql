-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 11:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chicken`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_contact` varchar(30) NOT NULL,
  `cust_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_contact`, `cust_address`) VALUES
(1, 'Kaye Cueva', '09554545', 'Bago City'),
(2, 'Lee', '12345', 'bago');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `truck_seal` varchar(50) NOT NULL,
  `tripno` int(11) NOT NULL,
  `noofcrew` int(11) NOT NULL,
  `timeoutfarm` time NOT NULL,
  `pcshauled` int(11) NOT NULL,
  `houseno` int(11) NOT NULL,
  `farmchecker` varchar(50) NOT NULL,
  `alw` decimal(10,2) NOT NULL,
  `delivery_weigher` varchar(50) NOT NULL,
  `birdspercoop` int(11) NOT NULL,
  `coopswocover` int(11) NOT NULL,
  `timeinplant` time NOT NULL,
  `grower_id` int(11) NOT NULL,
  `timeinfarm` time NOT NULL,
  `loadstart` time NOT NULL,
  `loadfinish` time NOT NULL,
  `plateno` varchar(30) NOT NULL,
  `preparedby` varchar(50) NOT NULL,
  `delivery_date` date NOT NULL,
  `gross_weight` decimal(10,2) NOT NULL,
  `net_weight` decimal(10,2) NOT NULL,
  `doa_pcs` int(11) NOT NULL,
  `doa_weight` decimal(10,2) NOT NULL,
  `daa_pcs` int(11) NOT NULL,
  `daa_weight` decimal(10,2) NOT NULL,
  `driver` varchar(30) NOT NULL,
  `verifier` varchar(50) NOT NULL,
  `weigher` varchar(50) NOT NULL,
  `timeweighed` time NOT NULL,
  `datefeed` date NOT NULL,
  `timefeed` time NOT NULL,
  `birdstatus` varchar(30) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `time_hanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tare` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `truck_seal`, `tripno`, `noofcrew`, `timeoutfarm`, `pcshauled`, `houseno`, `farmchecker`, `alw`, `delivery_weigher`, `birdspercoop`, `coopswocover`, `timeinplant`, `grower_id`, `timeinfarm`, `loadstart`, `loadfinish`, `plateno`, `preparedby`, `delivery_date`, `gross_weight`, `net_weight`, `doa_pcs`, `doa_weight`, `daa_pcs`, `daa_weight`, `driver`, `verifier`, `weigher`, `timeweighed`, `datefeed`, `timefeed`, `birdstatus`, `reason`, `destination`, `time_hanged`, `tare`) VALUES
(11, 'dsds', 1, 2, '00:00:00', 500, 4, 'Idk', '1.50', 'Jenny Caberte', 3, 5, '00:00:00', 2, '00:00:00', '00:00:00', '00:00:00', '123', '', '2019-10-19', '100.00', '250.00', 7, '14.00', 5, '5.00', 'dsds', '', '', '00:00:00', '2019-09-03', '00:00:00', 'dili basa', 'ddadsa', '', '2019-10-23 13:10:05', '0.00'),
(20, '123', 1, 2, '01:00:00', 100, 123, '222', '1.20', 'Jenny Caberte', 3, 2, '01:00:00', 1, '01:00:00', '01:00:00', '01:00:00', '123', '', '2019-10-19', '200.00', '200.00', 5, '10.00', 1, '1.00', '', '', '', '01:00:00', '2019-01-01', '01:00:00', 'dili basa', '', 'process', '2019-10-23 12:45:58', '0.00'),
(21, 'dsds', 1, 2, '00:00:00', 500, 4, 'Idk', '1.50', 'Jenny Caberte', 3, 5, '00:00:00', 1, '00:00:00', '00:00:00', '00:00:00', '123', '', '2019-10-19', '100.00', '250.00', 7, '14.00', 5, '5.00', 'dsds', '', '', '00:00:00', '2019-09-03', '00:00:00', 'dili basa', 'ddadsa', '', '2019-10-23 13:10:05', '0.00'),
(22, '111', 111, 111, '01:00:00', 250, 111, 'dsdfd', '1.10', 'Leah Amar', 16, 1, '01:00:00', 1, '01:00:00', '01:00:00', '01:00:00', '1111', '', '2019-10-27', '250.00', '240.00', 5, '10.00', 0, '0.00', 'JoemZ', 'Jenny Caberte', 'Leah Amar', '01:00:00', '2019-10-24', '01:01:00', 'dili basa', '', 'live', '2019-10-26 17:05:35', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `grower`
--

CREATE TABLE `grower` (
  `grower_id` int(11) NOT NULL,
  `grower_name` varchar(100) NOT NULL,
  `grower_address` varchar(100) NOT NULL,
  `grower_contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grower`
--

INSERT INTO `grower` (`grower_id`, `grower_name`, `grower_address`, `grower_contact`) VALUES
(1, 'Test 1', 'bago1', '08981'),
(2, 'Test 2\r\n', 'bago1', '08981');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `history_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(500) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`history_log_id`, `user_id`, `action`, `date`) VALUES
(1, 1, 'has logged in the system at ', '2019-08-18 15:31:04'),
(2, 1, 'has logged out the system at ', '2019-08-18 21:36:05'),
(3, 1, 'has logged in the system at ', '2019-08-18 21:36:14'),
(4, 1, 'has logged in the system at ', '2019-08-20 21:37:55'),
(5, 1, 'has logged out the system at ', '2019-08-21 08:48:12'),
(6, 1, 'has logged in the system at ', '2019-08-21 08:55:20'),
(7, 0, 'has logged out the system at ', '2019-08-25 09:52:30'),
(8, 1, 'has logged in the system at ', '2019-08-25 10:01:50'),
(9, 1, 'has logged in the system at ', '2019-09-01 12:41:18'),
(10, 3, 'has logged in the system at ', '2019-09-01 12:42:54'),
(11, 3, 'has logged in the system at ', '2019-09-01 12:43:03'),
(12, 2, 'has logged in the system at ', '2019-09-01 12:43:11'),
(13, 2, 'has logged out the system at ', '2019-09-01 12:43:35'),
(14, 3, 'has logged in the system at ', '2019-09-01 12:47:13'),
(15, 3, 'has logged out the system at ', '2019-09-01 12:50:37'),
(16, 3, 'has logged in the system at ', '2019-09-01 12:50:47'),
(17, 3, 'has logged out the system at ', '2019-09-01 12:50:54'),
(18, 2, 'has logged in the system at ', '2019-09-01 12:51:01'),
(19, 2, 'has logged out the system at ', '2019-09-01 13:34:09'),
(20, 1, 'has logged in the system at ', '2019-09-01 13:34:15'),
(21, 1, 'has logged out the system at ', '2019-09-01 13:42:46'),
(22, 6, 'has logged in the system at ', '2019-09-01 13:42:53'),
(23, 6, 'has logged out the system at ', '2019-09-01 13:44:02'),
(24, 5, 'has logged in the system at ', '2019-09-01 13:44:08'),
(25, 5, 'has logged in the system at ', '2019-09-01 13:45:24'),
(26, 5, 'has logged in the system at ', '2019-09-01 13:46:25'),
(27, 5, 'has logged out the system at ', '2019-09-01 13:57:51'),
(28, 6, 'has logged in the system at ', '2019-09-01 13:58:14'),
(29, 6, 'has logged out the system at ', '2019-09-01 13:59:15'),
(30, 5, 'has logged in the system at ', '2019-09-01 13:59:22'),
(31, 5, 'has logged out the system at ', '2019-09-01 18:38:51'),
(32, 6, 'has logged in the system at ', '2019-09-01 18:39:03'),
(33, 6, 'has logged in the system at ', '2019-09-02 18:03:34'),
(34, 6, 'has logged in the system at ', '2019-09-02 19:08:07'),
(35, 6, 'has logged out the system at ', '2019-09-02 22:27:58'),
(36, 1, 'has logged in the system at ', '2019-09-02 22:28:11'),
(37, 1, 'has logged out the system at ', '2019-09-02 22:47:39'),
(38, 6, 'has logged in the system at ', '2019-09-02 22:47:47'),
(39, 6, 'has logged in the system at ', '2019-09-03 10:04:42'),
(40, 6, 'has logged out the system at ', '2019-09-03 10:05:38'),
(41, 5, 'has logged in the system at ', '2019-09-03 10:05:44'),
(42, 5, 'has logged out the system at ', '2019-09-03 10:23:38'),
(43, 6, 'has logged in the system at ', '2019-09-03 10:23:45'),
(44, 6, 'has logged in the system at ', '2019-09-03 14:09:20'),
(45, 5, 'has logged in the system at ', '2019-09-05 20:04:47'),
(46, 5, 'has logged out the system at ', '2019-09-05 21:07:35'),
(47, 1, 'has logged in the system at ', '2019-09-05 21:07:58'),
(48, 1, 'has logged out the system at ', '2019-09-05 21:24:09'),
(49, 6, 'has logged in the system at ', '2019-09-05 21:24:15'),
(50, 6, 'has logged out the system at ', '2019-09-05 21:26:10'),
(51, 5, 'has logged in the system at ', '2019-09-05 21:26:18'),
(52, 5, 'has logged out the system at ', '2019-09-05 21:47:38'),
(53, 1, 'has logged in the system at ', '2019-09-06 18:49:43'),
(54, 1, 'has logged in the system at ', '2019-09-11 20:34:48'),
(55, 6, 'has logged in the system at ', '2019-10-03 19:50:57'),
(56, 5, 'has logged in the system at ', '2019-10-03 19:56:45'),
(57, 5, 'has logged out the system at ', '2019-10-03 19:57:02'),
(58, 1, 'has logged in the system at ', '2019-10-03 19:57:10'),
(59, 6, 'has logged out the system at ', '2019-10-03 20:15:47'),
(60, 5, 'has logged in the system at ', '2019-10-03 20:16:00'),
(61, 5, 'has logged out the system at ', '2019-10-03 20:16:07'),
(62, 1, 'has logged in the system at ', '2019-10-03 20:16:14'),
(63, 1, 'has logged out the system at ', '2019-10-03 20:17:20'),
(64, 5, 'has logged in the system at ', '2019-10-03 20:17:26'),
(65, 5, 'has logged out the system at ', '2019-10-03 20:19:05'),
(66, 1, 'has logged in the system at ', '2019-10-03 20:19:10'),
(67, 5, 'has logged in the system at ', '2019-10-03 20:50:50'),
(68, 1, 'has logged out the system at ', '2019-10-03 20:59:05'),
(69, 5, 'has logged in the system at ', '2019-10-03 20:59:12'),
(70, 5, 'has logged out the system at ', '2019-10-03 21:02:06'),
(71, 6, 'has logged in the system at ', '2019-10-03 21:02:12'),
(72, 6, 'has logged out the system at ', '2019-10-03 21:04:00'),
(73, 1, 'has logged in the system at ', '2019-10-03 21:04:05'),
(74, 1, 'has logged out the system at ', '2019-10-03 21:04:57'),
(75, 5, 'has logged in the system at ', '2019-10-03 21:05:03'),
(76, 5, 'has logged out the system at ', '2019-10-03 21:21:17'),
(77, 1, 'has logged in the system at ', '2019-10-03 21:21:22'),
(78, 1, 'has logged out the system at ', '2019-10-03 21:24:52'),
(79, 5, 'has logged in the system at ', '2019-10-03 21:25:02'),
(80, 6, 'has logged in the system at ', '2019-10-19 16:35:46'),
(81, 6, 'has logged out the system at ', '2019-10-19 17:07:09'),
(82, 5, 'has logged in the system at ', '2019-10-19 17:07:15'),
(83, 5, 'has logged out the system at ', '2019-10-19 17:19:58'),
(84, 6, 'has logged in the system at ', '2019-10-19 17:20:03'),
(85, 6, 'has logged out the system at ', '2019-10-19 17:20:17'),
(86, 1, 'has logged in the system at ', '2019-10-19 17:20:24'),
(87, 6, 'has logged in the system at ', '2019-10-19 17:51:10'),
(88, 6, 'has logged out the system at ', '2019-10-19 17:52:34'),
(89, 5, 'has logged in the system at ', '2019-10-19 17:52:41'),
(90, 1, 'has logged out the system at ', '2019-10-19 18:58:50'),
(91, 6, 'has logged in the system at ', '2019-10-19 18:58:58'),
(92, 6, 'has logged out the system at ', '2019-10-19 20:36:18'),
(93, 5, 'has logged in the system at ', '2019-10-19 20:36:27'),
(94, 5, 'has logged out the system at ', '2019-10-19 21:57:14'),
(95, 1, 'has logged in the system at ', '2019-10-19 21:57:25'),
(96, 1, 'has logged out the system at ', '2019-10-19 23:23:27'),
(97, 6, 'has logged in the system at ', '2019-10-19 23:23:34'),
(98, 1, 'has logged in the system at ', '2019-10-22 21:35:01'),
(99, 1, 'has logged out the system at ', '2019-10-22 21:36:00'),
(100, 6, 'has logged in the system at ', '2019-10-22 21:36:10'),
(101, 5, 'has logged out the system at ', '2019-10-23 22:08:39'),
(102, 1, 'has logged in the system at ', '2019-10-23 22:08:46'),
(103, 6, 'has logged in the system at ', '2019-10-23 22:11:10'),
(104, 1, 'has logged out the system at ', '2019-10-23 22:12:26'),
(105, 6, 'has logged in the system at ', '2019-10-23 22:12:36'),
(106, 6, 'has logged in the system at ', '2019-10-24 23:44:06'),
(107, 5, 'has logged in the system at ', '2019-10-26 23:52:50'),
(108, 5, 'has logged out the system at ', '2019-10-26 23:53:49'),
(109, 6, 'has logged in the system at ', '2019-10-26 23:53:59'),
(110, 6, 'has logged out the system at ', '2019-10-27 00:08:17'),
(111, 5, 'has logged in the system at ', '2019-10-27 00:08:25'),
(112, 5, 'has logged out the system at ', '2019-10-27 00:12:32'),
(113, 6, 'has logged in the system at ', '2019-10-27 00:12:40'),
(114, 6, 'has logged out the system at ', '2019-10-27 00:14:07'),
(115, 1, 'has logged in the system at ', '2019-10-27 00:14:19'),
(116, 1, 'has logged out the system at ', '2019-10-27 00:20:07'),
(117, 6, 'has logged in the system at ', '2019-10-27 00:20:13'),
(118, 6, 'has logged out the system at ', '2019-10-27 00:21:01'),
(119, 5, 'has logged in the system at ', '2019-10-27 00:21:06'),
(120, 5, 'has logged out the system at ', '2019-10-27 00:23:02'),
(121, 6, 'has logged in the system at ', '2019-10-27 00:23:07'),
(122, 6, 'has logged out the system at ', '2019-10-27 00:23:38'),
(123, 1, 'has logged in the system at ', '2019-10-27 00:23:43'),
(124, 1, 'has logged out the system at ', '2019-10-27 00:26:13'),
(125, 6, 'has logged in the system at ', '2019-10-27 00:26:21'),
(126, 6, 'has logged out the system at ', '2019-10-27 01:12:18'),
(127, 5, 'has logged in the system at ', '2019-10-27 01:12:26'),
(128, 5, 'has logged out the system at ', '2019-10-27 01:15:20'),
(129, 6, 'has logged in the system at ', '2019-10-27 01:15:25'),
(130, 2, 'has logged out the system at ', '2019-10-27 15:53:54'),
(131, 5, 'has logged in the system at ', '2019-10-27 15:54:03'),
(132, 5, 'has logged out the system at ', '2019-10-27 15:55:28'),
(133, 5, 'has logged in the system at ', '2019-10-27 15:56:47'),
(134, 5, 'has logged out the system at ', '2019-10-27 15:58:01'),
(135, 6, 'has logged in the system at ', '2019-10-27 15:58:25'),
(136, 6, 'has logged out the system at ', '2019-10-27 16:03:59'),
(137, 1, 'has logged in the system at ', '2019-10-27 16:04:05'),
(138, 5, 'has logged in the system at ', '2019-10-27 16:05:52'),
(139, 1, 'has logged out the system at ', '2019-10-27 16:59:47'),
(140, 5, 'has logged in the system at ', '2019-10-27 16:59:53'),
(141, 5, 'has logged out the system at ', '2019-10-27 18:01:28'),
(142, 6, 'has logged in the system at ', '2019-10-27 18:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `live_weight`
--

CREATE TABLE `live_weight` (
  `live_weight_id` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `coops` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_weight`
--

INSERT INTO `live_weight` (`live_weight_id`, `weight`, `coops`, `delivery_id`) VALUES
(11, '42.85', 2, 6),
(12, '50.00', 2, 6),
(13, '25.00', 2, 6),
(14, '10.00', 2, 6),
(15, '30.00', 2, 6),
(16, '1.00', 2, 6),
(17, '2.00', 2, 6),
(18, '2.00', 2, 7),
(19, '10.00', 2, 7),
(20, '10.00', 2, 7),
(21, '20.00', 2, 7),
(22, '20.00', 2, 7),
(23, '2.00', 2, 2),
(25, '20.00', 2, 7),
(26, '1.00', 2, 7),
(27, '22.00', 2, 7),
(28, '40.00', 2, 8),
(29, '45.00', 2, 8),
(30, '46.00', 2, 8),
(31, '42.50', 2, 8),
(32, '50.00', 2, 8),
(33, '40.00', 2, 8),
(34, '52.00', 2, 8),
(35, '48.00', 2, 8),
(36, '41.00', 2, 8),
(37, '42.50', 2, 8),
(38, '45.00', 2, 8),
(39, '43.00', 2, 8),
(40, '44.50', 2, 8),
(41, '46.20', 2, 8),
(42, '55.00', 2, 8),
(43, '41.50', 2, 8),
(44, '41.00', 2, 8),
(45, '42.00', 2, 8),
(46, '42.00', 2, 8),
(47, '43.00', 2, 8),
(48, '42.50', 2, 8),
(49, '52.00', 2, 8),
(50, '42.00', 2, 8),
(51, '42.85', 2, 8),
(52, '40.00', 2, 8),
(53, '41.00', 2, 8),
(54, '42.50', 2, 8),
(55, '43.00', 2, 8),
(56, '43.50', 2, 8),
(57, '48.00', 2, 8),
(58, '47.50', 2, 8),
(59, '46.00', 2, 8),
(60, '45.50', 2, 8),
(61, '52.00', 2, 8),
(62, '50.00', 2, 8),
(63, '54.00', 2, 8),
(64, '40.00', 2, 8),
(65, '42.50', 2, 8),
(66, '41.85', 2, 8),
(67, '43.50', 2, 8),
(68, '42.40', 2, 8),
(69, '42.50', 2, 8),
(70, '45.20', 2, 8),
(71, '41.00', 2, 8),
(72, '40.00', 2, 8),
(73, '42.20', 2, 8),
(74, '42.00', 2, 8),
(75, '43.00', 2, 8),
(76, '45.00', 2, 8),
(77, '52.00', 2, 8),
(78, '46.00', 2, 8),
(79, '41.80', 2, 8),
(80, '41.80', 2, 8),
(81, '42.30', 2, 8),
(82, '45.50', 2, 8),
(83, '45.00', 2, 8),
(84, '46.00', 2, 8),
(85, '48.00', 2, 8),
(86, '42.00', 2, 8),
(87, '41.20', 2, 8),
(88, '45.20', 2, 8),
(89, '45.00', 2, 8),
(90, '42.00', 2, 8),
(91, '43.00', 2, 8),
(92, '40.00', 2, 8),
(93, '41.00', 2, 8),
(94, '42.80', 2, 8),
(95, '43.60', 2, 8),
(96, '50.50', 2, 8),
(97, '49.00', 2, 8),
(98, '48.50', 2, 8),
(99, '42.50', 2, 8),
(100, '43.00', 2, 8),
(101, '45.00', 2, 8),
(102, '52.20', 2, 8),
(103, '41.60', 2, 8),
(104, '42.00', 2, 8),
(105, '48.00', 2, 8),
(106, '42.50', 2, 8),
(107, '43.20', 2, 8),
(108, '41.80', 2, 8),
(109, '42.60', 2, 8),
(110, '52.00', 2, 8),
(111, '48.00', 2, 8),
(112, '46.00', 2, 8),
(113, '45.00', 2, 8),
(114, '40.00', 2, 8),
(115, '40.60', 2, 8),
(116, '41.50', 2, 8),
(117, '42.60', 2, 8),
(118, '52.00', 2, 8),
(119, '42.00', 2, 8),
(120, '43.00', 2, 8),
(121, '41.20', 2, 8),
(122, '45.00', 2, 8),
(123, '42.90', 2, 8),
(124, '41.00', 2, 8),
(125, '42.00', 2, 8),
(126, '40.00', 2, 8),
(127, '40.50', 2, 8),
(128, '42.30', 2, 8),
(129, '42.00', 2, 8),
(130, '42.00', 2, 8),
(131, '47.00', 2, 8),
(132, '45.00', 2, 8),
(133, '46.00', 2, 8),
(134, '42.00', 2, 8),
(135, '42.30', 2, 8),
(136, '41.20', 2, 8),
(137, '41.20', 2, 8),
(138, '42.00', 2, 8),
(139, '45.00', 2, 8),
(140, '42.00', 2, 8),
(141, '47.00', 2, 8),
(142, '48.60', 2, 8),
(143, '42.50', 2, 8),
(144, '41.00', 2, 8),
(145, '42.00', 2, 8),
(146, '43.00', 2, 8),
(147, '0.00', 2, 8),
(148, '0.00', 2, 7),
(149, '0.00', 2, 7),
(150, '0.00', 2, 7),
(151, '0.00', 2, 7),
(152, '100.00', 2, 21),
(153, '5.00', 2, 21),
(154, '10.00', 2, 21),
(155, '54.00', 2, 21),
(156, '50.00', 2, 21),
(157, '42.00', 2, 22),
(158, '45.00', 2, 22),
(159, '54.00', 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `loops`
--

CREATE TABLE `loops` (
  `loops_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `looptaken` int(11) NOT NULL,
  `loopreturn` int(11) NOT NULL,
  `takedate` date NOT NULL,
  `returndate` date NOT NULL,
  `taketime` time NOT NULL,
  `returntime` time NOT NULL,
  `takenguard` varchar(30) NOT NULL,
  `returnguard` varchar(30) NOT NULL,
  `coops_weight` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loops`
--

INSERT INTO `loops` (`loops_id`, `delivery_id`, `looptaken`, `loopreturn`, `takedate`, `returndate`, `taketime`, `returntime`, `takenguard`, `returnguard`, `coops_weight`) VALUES
(1, 3, 5, 5, '2019-01-01', '2019-01-01', '00:00:00', '00:00:00', '', '', '0.00'),
(2, 4, 2, 2, '2019-01-01', '2019-01-01', '00:00:00', '00:00:00', 'len', 'elen', '0.00'),
(3, 5, 2, 2, '2019-01-01', '2019-01-01', '00:00:00', '00:00:00', 'len', 'elen', '0.00'),
(4, 6, 5, 5, '2019-08-25', '2019-08-25', '00:00:00', '00:00:00', 'Jomz', 'jomz', '0.00'),
(5, 7, 1, 1, '2019-09-03', '2019-09-10', '01:00:00', '01:00:00', 'Jenny Caberte', 'Leah Amar', '0.00'),
(6, 8, 5, 5, '2019-09-02', '2019-09-02', '00:00:00', '00:00:00', 'Will', 'Will', '0.00'),
(7, 9, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', '', '', '0.00'),
(8, 10, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(9, 11, 1, 1, '2019-09-03', '2019-09-03', '00:00:00', '00:00:00', 'Ramon Magbanua', 'Ramon Magbanua', '2.00'),
(10, 13, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(11, 14, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(12, 15, 10, 10, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(13, 16, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(14, 17, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(15, 18, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(16, 19, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '0.00'),
(17, 20, 2, 2, '2019-01-01', '2019-01-01', '00:00:00', '00:00:00', 'Jenny Caberte', 'Jenny Caberte', '12.00'),
(18, 22, 2, 2, '2019-10-24', '2019-10-30', '00:00:00', '00:00:00', 'Ramon Magbanua', 'Ramon Magbanua', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `personnel_id` int(11) NOT NULL,
  `personnel_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`personnel_id`, `personnel_name`) VALUES
(2, 'Jenny Caberte'),
(3, 'Ramon Magbanua'),
(4, 'Leah Amar');

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

CREATE TABLE `pr` (
  `pr_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `pr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`pr_id`, `cust_id`, `pr_date`) VALUES
(1, 1, '2019-08-18'),
(2, 1, '2019-08-18'),
(3, 1, '2019-08-18'),
(4, 1, '2019-08-18'),
(5, 1, '2019-08-18'),
(6, 1, '2019-08-18'),
(7, 1, '2019-08-18'),
(8, 1, '2019-08-18'),
(9, 1, '2019-08-18'),
(10, 1, '2019-08-18'),
(11, 1, '2019-08-20'),
(12, 1, '2019-08-20'),
(13, 0, '0000-00-00'),
(14, 0, '2019-08-21'),
(15, 0, '2019-08-21'),
(16, 1, '2019-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `process_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `process_weight` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`process_id`, `prod_id`, `qty`, `delivery_id`, `process_weight`) VALUES
(15, 1, 100, 6, '0.00'),
(16, 2, 124, 6, '0.00'),
(17, 1, 100, 7, '0.00'),
(18, 2, 28, 7, '0.00'),
(19, 1, 10, 21, '20.00'),
(20, 2, 30, 21, '50.00'),
(21, 1, 10, 22, '50.00'),
(22, 2, 20, 22, '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(30) NOT NULL,
  `prod_desc` varchar(200) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_desc`, `prod_price`, `prod_qty`) VALUES
(1, 'FCB', 'Testing', '180.00', 0),
(2, 'FC1', 'kjskfjsdk', '150.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pr_details`
--

CREATE TABLE `pr_details` (
  `pr_details_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `pr_qty` int(11) NOT NULL,
  `pr_weight` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_details`
--

INSERT INTO `pr_details` (`pr_details_id`, `pr_id`, `prod_id`, `pr_qty`, `pr_weight`) VALUES
(5, 8, 2, 1, '1.00'),
(6, 8, 2, 2, '1.00'),
(7, 9, 2, 1, '1.00'),
(8, 9, 2, 2, '1.00'),
(9, 10, 2, 1, '1.00'),
(10, 10, 1, 2, '2.00'),
(11, 11, 2, 1, '2.00'),
(12, 11, 1, 2, '3.00'),
(13, 12, 2, 12, '12.00'),
(14, 12, 1, 1, '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `sales_date` datetime NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `cash_tendered` decimal(10,2) NOT NULL,
  `cash_change` decimal(10,2) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `percent` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `total`, `sales_date`, `discount`, `amount_due`, `cash_tendered`, `cash_change`, `cust_id`, `percent`) VALUES
(1, '310.00', '2019-08-21 00:38:44', '10.00', '320.00', '500.00', '180.00', 0, '0.00'),
(2, '310.00', '2019-08-21 00:39:11', '10.00', '320.00', '500.00', '180.00', 0, '0.00'),
(3, '310.00', '2019-08-21 00:39:29', '10.00', '-5000.00', '500.00', '180.00', 0, '0.00'),
(4, '310.00', '2019-08-22 00:40:16', '10.00', '320.00', '500.00', '180.00', 0, '0.00'),
(5, '310.00', '2019-08-21 00:40:31', '10.00', '320.00', '500.00', '180.00', 0, '0.00'),
(6, '150.00', '2019-08-21 00:41:25', '0.00', '150.00', '200.00', '50.00', 0, '0.00'),
(7, '200.00', '2019-07-22 00:52:35', '800.00', '1000.00', '1000.00', '0.00', 0, '0.00'),
(8, '900.00', '2019-10-03 20:51:13', '0.00', '900.00', '1000.00', '100.00', 0, '0.00'),
(10, '900.00', '2019-10-02 20:51:13', '0.00', '900.00', '1000.00', '100.00', 0, '0.00'),
(11, '0.00', '2019-10-03 21:28:33', '0.00', '0.00', '0.00', '0.00', 0, '0.00'),
(12, '0.00', '2019-10-03 21:29:05', '0.00', '0.00', '0.00', '0.00', 0, '0.00'),
(13, '0.00', '2019-10-03 21:29:34', '0.00', '0.00', '0.00', '0.00', 0, '0.00'),
(14, '3000.00', '2019-10-19 17:59:25', '0.00', '3000.00', '3000.00', '0.00', 0, '0.00'),
(15, '15000.00', '2019-10-19 18:02:27', '0.00', '15000.00', '15000.00', '0.00', 0, '0.00'),
(16, '150.00', '2019-10-19 20:40:13', '0.00', '150.00', '150.00', '0.00', 1, '0.00'),
(17, '100.00', '2019-06-12 00:38:44', '10.00', '320.00', '500.00', '180.00', 0, '0.00'),
(18, '1700.00', '2019-10-27 15:54:36', '50.00', '1750.00', '1800.00', '50.00', 1, '0.00'),
(19, '1500.00', '2019-10-27 16:06:14', '0.00', '1500.00', '1500.00', '0.00', 2, '0.00'),
(20, '1800.00', '2019-10-27 16:07:32', '0.00', '1800.00', '2000.00', '200.00', 1, '0.00'),
(21, '750.00', '2019-10-27 16:21:22', '0.00', '750.00', '800.00', '50.00', 1, '0.00'),
(22, '134.90', '2019-10-27 17:11:01', '0.10', '135.00', '150.00', '15.00', 1, '0.00'),
(23, '125.00', '2019-10-27 17:15:54', '10.00', '135.00', '150.00', '15.00', 1, '0.00'),
(24, '125.00', '2019-10-27 17:25:13', '0.10', '135.00', '150.00', '15.00', 1, '10.00'),
(25, '125.00', '2019-10-27 17:26:43', '13.50', '135.00', '150.00', '15.00', 1, '10.00'),
(26, '150.00', '2019-10-27 17:31:02', '15.00', '135.00', '150.00', '15.00', 1, '10.00'),
(27, '150.00', '2019-10-27 17:35:20', '15.00', '135.00', '150.00', '15.00', 1, '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `sales_qty` int(11) NOT NULL,
  `sales_kg` decimal(10,2) NOT NULL,
  `sales_price` decimal(10,2) NOT NULL,
  `sales_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_details_id`, `sales_id`, `prod_id`, `sales_qty`, `sales_kg`, `sales_price`, `sales_total`) VALUES
(1, 4, 1, 1, '0.00', '180.00', '180.00'),
(2, 5, 1, 1, '0.00', '180.00', '180.00'),
(3, 5, 2, 1, '0.00', '150.00', '150.00'),
(4, 6, 2, 1, '0.00', '150.00', '150.00'),
(5, 7, 2, 12, '12.00', '150.00', '1800.00'),
(6, 8, 2, 6, '10.00', '150.00', '900.00'),
(7, 9, 1, 10, '10.00', '180.00', '1800.00'),
(8, 11, 2, 1, '1.00', '150.00', '150.00'),
(9, 12, 2, 1, '1.00', '150.00', '150.00'),
(10, 14, 2, 1, '20.00', '150.00', '150.00'),
(11, 15, 2, 1, '100.00', '150.00', '15000.00'),
(12, 16, 2, 1, '1.00', '150.00', '150.00'),
(13, 18, 1, 1, '10.00', '180.00', '1800.00'),
(14, 19, 2, 1, '10.00', '150.00', '1500.00'),
(15, 20, 1, 10, '10.00', '180.00', '1800.00'),
(16, 21, 2, 1, '5.00', '150.00', '750.00'),
(17, 22, 2, 1, '1.00', '150.00', '150.00'),
(18, 23, 2, 1, '1.00', '150.00', '150.00'),
(19, 24, 2, 1, '1.00', '150.00', '150.00'),
(20, 25, 2, 1, '1.00', '150.00', '150.00'),
(21, 26, 2, 1, '1.00', '150.00', '150.00'),
(22, 27, 2, 1, '1.00', '150.00', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `tare`
--

CREATE TABLE `tare` (
  `tare_id` int(11) NOT NULL,
  `tare_pc` int(11) NOT NULL,
  `tare_weight` decimal(10,2) NOT NULL,
  `tare_total` decimal(10,2) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tare`
--

INSERT INTO `tare` (`tare_id`, `tare_pc`, `tare_weight`, `tare_total`, `delivery_id`, `color`) VALUES
(7, 1, '1.00', '1.00', 6, ''),
(8, 10, '2.00', '20.00', 7, ''),
(9, 2, '2.00', '4.00', 8, ''),
(10, 0, '0.00', '0.00', 9, ''),
(11, 0, '0.00', '0.00', 10, ''),
(12, 0, '0.00', '0.00', 11, ''),
(13, 0, '0.00', '0.00', 13, ''),
(14, 0, '0.00', '0.00', 14, ''),
(15, 11, '1.00', '11.00', 15, ''),
(16, 2, '3.00', '6.00', 15, ''),
(17, 0, '0.00', '0.00', 16, ''),
(18, 0, '0.00', '0.00', 16, ''),
(19, 0, '0.00', '0.00', 17, ''),
(20, 0, '0.00', '0.00', 17, ''),
(21, 0, '0.00', '0.00', 18, ''),
(22, 0, '0.00', '0.00', 18, ''),
(23, 0, '0.00', '0.00', 19, ''),
(24, 0, '0.00', '0.00', 19, ''),
(25, 0, '0.00', '0.00', 20, ''),
(26, 0, '0.00', '0.00', 20, ''),
(27, 5, '1.00', '5.00', 22, ''),
(28, 5, '1.00', '5.00', 22, '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Admin', 'admin', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 'admin'),
(5, 'Operations Staff', 'operations', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 'operation'),
(6, 'Recording Staff', 'recording', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 'recording'),
(7, 'ramon', 'ramon', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 'recording');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `grower`
--
ALTER TABLE `grower`
  ADD PRIMARY KEY (`grower_id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`history_log_id`);

--
-- Indexes for table `live_weight`
--
ALTER TABLE `live_weight`
  ADD PRIMARY KEY (`live_weight_id`);

--
-- Indexes for table `loops`
--
ALTER TABLE `loops`
  ADD PRIMARY KEY (`loops_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `pr_details`
--
ALTER TABLE `pr_details`
  ADD PRIMARY KEY (`pr_details_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`);

--
-- Indexes for table `tare`
--
ALTER TABLE `tare`
  ADD PRIMARY KEY (`tare_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `grower`
--
ALTER TABLE `grower`
  MODIFY `grower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `history_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `live_weight`
--
ALTER TABLE `live_weight`
  MODIFY `live_weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `loops`
--
ALTER TABLE `loops`
  MODIFY `loops_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pr_details`
--
ALTER TABLE `pr_details`
  MODIFY `pr_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tare`
--
ALTER TABLE `tare`
  MODIFY `tare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
