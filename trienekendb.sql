-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 06:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trienekendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drivertable`
--

CREATE TABLE `drivertable` (
  `driverID` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dumptable`
--

CREATE TABLE `dumptable` (
  `serialNo` varchar(15) NOT NULL,
  `tonnage` int(11) NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `tripID` int(11) NOT NULL,
  `driverID` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `holidaytable`
--

CREATE TABLE `holidaytable` (
  `date` date NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rorotable`
--

CREATE TABLE `rorotable` (
  `rorogroup` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `serialNo` varchar(15) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `qrcode` varchar(40) NOT NULL,
  `in_house` varchar(10) NOT NULL,
  `with_customer` varchar(10) NOT NULL,
  `lost` varchar(10) NOT NULL,
  `longitude` double(10,7) NOT NULL,
  `latitude` double(10,7) NOT NULL,
  `status` varchar(20) NOT NULL,
  `day_held` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tripdonetable`
--

CREATE TABLE `tripdonetable` (
  `invoiceID` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `driverID` int(11) NOT NULL,
  `delivered` int(11) NOT NULL,
  `returned` int(11) NOT NULL,
  `tripID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `triptable`
--

CREATE TABLE `triptable` (
  `cust_name` varchar(30) NOT NULL,
  `areaID` varchar(15) NOT NULL,
  `container_retrieve` varchar(15) NOT NULL,
  `container_placed` varchar(15) NOT NULL,
  `collection_time` time NOT NULL,
  `collection_type` varchar(20) NOT NULL,
  `waste_type` varchar(20) NOT NULL,
  `tripID` int(11) NOT NULL,
  `customer_sign` varchar(200) NOT NULL,
  `ship_date` date NOT NULL,
  `return_date` date NOT NULL,
  `driverID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `assign_status` varchar(20) NOT NULL,
  `trip_status` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `instruction` varchar(100) NOT NULL,
  `truckID` varchar(15) NOT NULL,
  `salesOrderNo` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `container_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trucktable`
--

CREATE TABLE `trucktable` (
  `truckID` varchar(15) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uploadedtable`
--

CREATE TABLE `uploadedtable` (
  `cust_name` varchar(30) NOT NULL,
  `areaID` varchar(15) NOT NULL,
  `container_retrieve` varchar(15) NOT NULL,
  `container_placed` varchar(15) NOT NULL,
  `collection_type` varchar(20) NOT NULL,
  `ship_date` date NOT NULL,
  `driverID` int(11) NOT NULL,
  `truckID` varchar(15) NOT NULL,
  `adminID` int(11) NOT NULL,
  `salesOrderNo` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `container_size` varchar(50) NOT NULL,
  `u_trip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `drivertable`
--
ALTER TABLE `drivertable`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `dumptable`
--
ALTER TABLE `dumptable`
  ADD PRIMARY KEY (`serialNo`);

--
-- Indexes for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`tripID`),
  ADD KEY `driverID` (`driverID`);

--
-- Indexes for table `holidaytable`
--
ALTER TABLE `holidaytable`
  ADD PRIMARY KEY (`date`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `rorotable`
--
ALTER TABLE `rorotable`
  ADD PRIMARY KEY (`serialNo`);

--
-- Indexes for table `tripdonetable`
--
ALTER TABLE `tripdonetable`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `driverID` (`driverID`),
  ADD KEY `tripID` (`tripID`);

--
-- Indexes for table `triptable`
--
ALTER TABLE `triptable`
  ADD PRIMARY KEY (`tripID`),
  ADD KEY `container_placed` (`container_placed`),
  ADD KEY `container_retrieve` (`container_retrieve`),
  ADD KEY `driverID` (`driverID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `truckID` (`truckID`);

--
-- Indexes for table `trucktable`
--
ALTER TABLE `trucktable`
  ADD PRIMARY KEY (`truckID`);

--
-- Indexes for table `uploadedtable`
--
ALTER TABLE `uploadedtable`
  ADD PRIMARY KEY (`u_trip`),
  ADD KEY `container_placed` (`container_placed`),
  ADD KEY `container_retrieve` (`container_retrieve`),
  ADD KEY `driverID` (`driverID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `truckID` (`truckID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivertable`
--
ALTER TABLE `drivertable`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tripdonetable`
--
ALTER TABLE `tripdonetable`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `triptable`
--
ALTER TABLE `triptable`
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploadedtable`
--
ALTER TABLE `uploadedtable`
  MODIFY `u_trip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=741;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dumptable`
--
ALTER TABLE `dumptable`
  ADD CONSTRAINT `dumptable_ibfk_1` FOREIGN KEY (`serialNo`) REFERENCES `rorotable` (`serialNo`);

--
-- Constraints for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD CONSTRAINT `feedbacktable_ibfk_2` FOREIGN KEY (`driverID`) REFERENCES `drivertable` (`driverID`),
  ADD CONSTRAINT `feedbacktable_ibfk_3` FOREIGN KEY (`tripID`) REFERENCES `triptable` (`tripID`);

--
-- Constraints for table `holidaytable`
--
ALTER TABLE `holidaytable`
  ADD CONSTRAINT `holidaytable_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admintable` (`adminID`);

--
-- Constraints for table `tripdonetable`
--
ALTER TABLE `tripdonetable`
  ADD CONSTRAINT `tripdonetable_ibfk_1` FOREIGN KEY (`driverID`) REFERENCES `drivertable` (`driverID`),
  ADD CONSTRAINT `tripdonetable_ibfk_2` FOREIGN KEY (`tripID`) REFERENCES `triptable` (`tripID`);

--
-- Constraints for table `triptable`
--
ALTER TABLE `triptable`
  ADD CONSTRAINT `triptable_ibfk_1` FOREIGN KEY (`container_placed`) REFERENCES `rorotable` (`serialNo`),
  ADD CONSTRAINT `triptable_ibfk_2` FOREIGN KEY (`container_retrieve`) REFERENCES `rorotable` (`serialNo`),
  ADD CONSTRAINT `triptable_ibfk_3` FOREIGN KEY (`driverID`) REFERENCES `drivertable` (`driverID`),
  ADD CONSTRAINT `triptable_ibfk_4` FOREIGN KEY (`adminID`) REFERENCES `admintable` (`adminID`),
  ADD CONSTRAINT `triptable_ibfk_5` FOREIGN KEY (`truckID`) REFERENCES `trucktable` (`truckID`);

--
-- Constraints for table `uploadedtable`
--
ALTER TABLE `uploadedtable`
  ADD CONSTRAINT `uploadedtable_ibfk_1` FOREIGN KEY (`container_placed`) REFERENCES `rorotable` (`serialNo`),
  ADD CONSTRAINT `uploadedtable_ibfk_2` FOREIGN KEY (`container_retrieve`) REFERENCES `rorotable` (`serialNo`),
  ADD CONSTRAINT `uploadedtable_ibfk_3` FOREIGN KEY (`driverID`) REFERENCES `drivertable` (`driverID`),
  ADD CONSTRAINT `uploadedtable_ibfk_4` FOREIGN KEY (`adminID`) REFERENCES `admintable` (`adminID`),
  ADD CONSTRAINT `uploadedtable_ibfk_5` FOREIGN KEY (`truckID`) REFERENCES `trucktable` (`truckID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
