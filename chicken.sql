-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 04:43 AM
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
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `death_id` int(11) NOT NULL,
  `death_type` varchar(30) NOT NULL,
  `death_pc` int(11) NOT NULL,
  `death_wt` decimal(10,2) NOT NULL,
  `delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `death`
--

INSERT INTO `death` (`death_id`, `death_type`, `death_pc`, `death_wt`, `delivery_id`) VALUES
(5, 'doa', 1, '1.00', 6),
(6, 'daa', 1, '1.00', 6);

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
  `feed` datetime NOT NULL,
  `timeweighed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alw` decimal(10,2) NOT NULL,
  `weigher` varchar(50) NOT NULL,
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
  `coops_weight` decimal(10,2) NOT NULL,
  `net_weight` decimal(10,2) NOT NULL,
  `doa_pcs` int(11) NOT NULL,
  `doa_weight` decimal(10,2) NOT NULL,
  `driver` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `truck_seal`, `tripno`, `noofcrew`, `timeoutfarm`, `pcshauled`, `houseno`, `farmchecker`, `feed`, `timeweighed`, `alw`, `weigher`, `birdspercoop`, `coopswocover`, `timeinplant`, `grower_id`, `timeinfarm`, `loadstart`, `loadfinish`, `plateno`, `preparedby`, `delivery_date`, `gross_weight`, `coops_weight`, `net_weight`, `doa_pcs`, `doa_weight`, `driver`) VALUES
(1, '6565', 6, 7, '07:30:00', 0, 0, '', '0000-00-00 00:00:00', '2019-08-25 08:23:24', '0.00', '', 0, 0, '01:00:00', 0, '01:00:00', '01:00:00', '01:00:00', '111', '', '2019-01-01', '0.00', '0.00', '0.00', 0, '0.00', ''),
(2, '878', 8, 7, '00:00:00', 120, 1, 'gretch', '2019-01-01 00:00:00', '0000-00-00 00:00:00', '0.00', 'allen', 8, 5, '01:00:00', 1, '01:00:00', '03:00:00', '02:00:00', '7676', '', '2019-01-01', '0.00', '0.00', '0.00', 0, '0.00', ''),
(3, '123', 1, 7, '00:00:00', 10, 12, 'pepay', '2019-08-22 00:00:00', '0000-00-00 00:00:00', '1.50', 'hell', 8, 2, '01:00:00', 1, '01:00:00', '01:30:00', '02:00:00', '233', '', '2020-01-01', '0.00', '2.00', '100.00', 0, '2.00', ''),
(4, '12', 2, 2, '00:00:00', 12, 2, 'jkj', '2019-01-01 00:00:00', '0000-00-00 00:00:00', '2.50', 'ejk', 8, 2, '01:00:00', 1, '01:00:00', '01:00:00', '01:00:00', '12', '', '2019-01-01', '0.00', '12.00', '2.00', 2, '2.50', ''),
(5, '12', 2, 2, '00:00:00', 12, 2, 'jkj', '2019-01-01 00:00:00', '0000-00-00 00:00:00', '2.50', 'ejk', 8, 2, '01:00:00', 1, '01:00:00', '01:00:00', '01:00:00', '12', '', '2019-01-01', '0.00', '12.00', '2.00', 2, '2.50', ''),
(6, '123', 2, 12, '00:00:00', 120, 12, 'Mitoy', '2019-08-25 00:00:00', '0000-00-00 00:00:00', '1.20', 'alien', 8, 2, '09:00:00', 1, '07:00:00', '07:00:00', '08:00:00', 'test123', '', '2019-08-25', '2.00', '2.00', '4.00', 1, '1.20', ''),
(7, '', 0, 0, '00:00:00', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '', 0, 0, '00:00:00', 1, '00:00:00', '00:00:00', '00:00:00', '', '', '0000-00-00', '0.00', '0.00', '0.00', 0, '0.00', '');

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
(1, 'Test 1', 'bago1', '08981');

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
(8, 1, 'has logged in the system at ', '2019-08-25 10:01:50');

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
(16, '1.00', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `loops`
--

CREATE TABLE `loops` (
  `loops_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `looptaken` int(11) NOT NULL,
  `loopreturn` int(11) NOT NULL,
  `takedate` datetime NOT NULL,
  `returndate` datetime NOT NULL,
  `takenguard` varchar(30) NOT NULL,
  `returnguard` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loops`
--

INSERT INTO `loops` (`loops_id`, `delivery_id`, `looptaken`, `loopreturn`, `takedate`, `returndate`, `takenguard`, `returnguard`) VALUES
(1, 3, 5, 5, '2019-01-01 00:00:00', '2019-01-01 00:00:00', '', ''),
(2, 4, 2, 2, '2019-01-01 00:00:00', '2019-01-01 00:00:00', 'len', 'elen'),
(3, 5, 2, 2, '2019-01-01 00:00:00', '2019-01-01 00:00:00', 'len', 'elen'),
(4, 6, 5, 5, '2019-08-25 00:00:00', '2019-08-25 00:00:00', 'Jomz', 'jomz'),
(5, 7, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

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
(15, 0, '2019-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `process_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`process_id`, `prod_id`, `qty`, `delivery_id`) VALUES
(9, 1, 1, 6),
(10, 2, 1, 6),
(11, 1, 1, 6),
(12, 2, 1, 6),
(13, 1, 1, 6),
(14, 2, 1, 6);

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
  `cash_change` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `total`, `sales_date`, `discount`, `amount_due`, `cash_tendered`, `cash_change`) VALUES
(1, '310.00', '2019-08-21 00:38:44', '10.00', '320.00', '500.00', '180.00'),
(2, '310.00', '2019-08-21 00:39:11', '10.00', '320.00', '500.00', '180.00'),
(3, '310.00', '2019-08-21 00:39:29', '10.00', '320.00', '500.00', '180.00'),
(4, '310.00', '2019-08-21 00:40:16', '10.00', '320.00', '500.00', '180.00'),
(5, '310.00', '2019-08-21 00:40:31', '10.00', '320.00', '500.00', '180.00'),
(6, '150.00', '2019-08-21 00:41:25', '0.00', '150.00', '200.00', '50.00'),
(7, '200.00', '2019-08-22 00:52:35', '800.00', '1000.00', '1000.00', '0.00');

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
(5, 7, 2, 12, '12.00', '150.00', '1800.00');

-- --------------------------------------------------------

--
-- Table structure for table `tare`
--

CREATE TABLE `tare` (
  `tare_id` int(11) NOT NULL,
  `tare_pc` int(11) NOT NULL,
  `tare_weight` decimal(10,2) NOT NULL,
  `tare_total` decimal(10,2) NOT NULL,
  `delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tare`
--

INSERT INTO `tare` (`tare_id`, `tare_pc`, `tare_weight`, `tare_total`, `delivery_id`) VALUES
(7, 1, '1.00', '1.00', 6);

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
(1, 'Lee Pipez', 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'user'),
(2, 'Kaye', 'kaye', 'a1Bz20ydqelm8m1wql71e4e5af2c51dabe73732781a9275b30', 'user'),
(3, 'Joemz', '', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 'guard'),
(4, '', '', 'a1Bz20ydqelm8m1wqld41d8cd98f00b204e9800998ecf8427e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
  ADD PRIMARY KEY (`death_id`);

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
-- AUTO_INCREMENT for table `death`
--
ALTER TABLE `death`
  MODIFY `death_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `grower`
--
ALTER TABLE `grower`
  MODIFY `grower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `history_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `live_weight`
--
ALTER TABLE `live_weight`
  MODIFY `live_weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `loops`
--
ALTER TABLE `loops`
  MODIFY `loops_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tare`
--
ALTER TABLE `tare`
  MODIFY `tare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
