-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 02:47 AM
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
  `timeoutfarm` datetime NOT NULL,
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
  `timinfarm` time NOT NULL,
  `loadstart` time NOT NULL,
  `loadend` time NOT NULL,
  `plateno` varchar(30) NOT NULL,
  `preparedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 1, 'has logged in the system at ', '2019-08-20 21:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `live_weight`
--

CREATE TABLE `live_weight` (
  `live_weight_id` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `coops` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `total_birds` int(11) NOT NULL,
  `total_weight` decimal(10,2) NOT NULL,
  `coops_weight` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 1, '2019-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(30) NOT NULL,
  `prod_desc` varchar(200) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_desc`, `prod_price`) VALUES
(1, 'FCB', 'Testing', '180.00'),
(2, 'FC1', 'kjskfjsdk', '150.00');

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
(7, '200.00', '2019-08-21 00:52:35', '800.00', '1000.00', '1000.00', '0.00');

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'Lee Pipez', 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3'),
(2, 'Kaye', 'kaye', 'a1Bz20ydqelm8m1wql71e4e5af2c51dabe73732781a9275b30');

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
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`pr_id`);

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
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grower`
--
ALTER TABLE `grower`
  MODIFY `grower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `history_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `live_weight`
--
ALTER TABLE `live_weight`
  MODIFY `live_weight_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loops`
--
ALTER TABLE `loops`
  MODIFY `loops_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
