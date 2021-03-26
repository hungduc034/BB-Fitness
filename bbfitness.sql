-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 01:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbfitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coId` varchar(8) NOT NULL,
  `coName` varchar(50) DEFAULT NULL,
  `coDoB` date DEFAULT NULL,
  `coEmail` varchar(50) DEFAULT NULL,
  `coPhone` varchar(15) DEFAULT NULL,
  `coGender` char(1) DEFAULT NULL,
  `coAddress` varchar(200) DEFAULT NULL,
  `coImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coId`, `coName`, `coDoB`, `coEmail`, `coPhone`, `coGender`, `coAddress`, `coImage`) VALUES
('BC00112', 'Hung Duc', '1999-01-01', 'asdasd@gmail.com', '22122121', 'M', 'HN', 'BC00112.jpg'),
('BC11223', 'abc', '2000-01-01', 'asdasd@gmail.com', '21313', 'M', 'HN', 'BC11223.jpg'),
('BC12345', 'Ly Duc', '2000-01-01', 'asdasd@gmail.com', '3212333', 'M', 'HD', 'BC12345.jpg'),
('GCH11111', 'John cena', '2000-01-01', 'asdasd@gmail.com', '122231321', 'M', 'HN', 'GCH11111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cId` int(10) UNSIGNED NOT NULL,
  `cName` varchar(50) DEFAULT NULL,
  `cPrice` varchar(200) DEFAULT NULL,
  `cImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cId`, `cName`, `cPrice`, `cImage`) VALUES
(10, 'Gym', '200$', 'Gym.jpg'),
(11, 'Yoga', '200$', 'Yoga.jpg'),
(12, 'Tennis', '200$', 'Tennis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cuId` varchar(8) NOT NULL,
  `cuName` varchar(50) DEFAULT NULL,
  `cuDoB` date DEFAULT NULL,
  `cuEmail` varchar(50) DEFAULT NULL,
  `cuPhone` varchar(15) DEFAULT NULL,
  `cuGender` char(10) DEFAULT NULL,
  `cuAddress` varchar(200) DEFAULT NULL,
  `cuImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cuId`, `cuName`, `cuDoB`, `cuEmail`, `cuPhone`, `cuGender`, `cuAddress`, `cuImage`) VALUES
('BB11223', 'Duc aaa', '2000-01-01', 'abc@gmail.com', '11111111', 'Male', 'HN', 'BB11223.jpg'),
('BB12231', 'Duc', '2000-01-01', 'abc@gmail.com', '1233213', 'Male', 'HN', 'BB12231.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registercourse`
--

CREATE TABLE `registercourse` (
  `rId` int(10) UNSIGNED NOT NULL,
  `rCustomer` varchar(200) DEFAULT NULL,
  `rName` varchar(50) DEFAULT NULL,
  `rPrice` varchar(50) DEFAULT NULL,
  `rStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registercourse`
--

INSERT INTO `registercourse` (`rId`, `rCustomer`, `rName`, `rPrice`, `rStatus`) VALUES
(4, 'Duc', 'Tennis', '150$', 'Paid'),
(6, 'Duc aaa', 'Gym', '200$', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uId` int(10) UNSIGNED NOT NULL,
  `forename` varchar(32) DEFAULT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uId`, `forename`, `surname`, `username`, `password`, `role`, `status`) VALUES
(1, 'John', 'Smith', 'admin', '6e8204c0862ec8abecb49762f0899554', 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cId`),
  ADD KEY `cName` (`cName`(20));

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cuId`),
  ADD KEY `cuName` (`cuName`(10));

--
-- Indexes for table `registercourse`
--
ALTER TABLE `registercourse`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uId`),
  ADD KEY `username` (`username`(10));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registercourse`
--
ALTER TABLE `registercourse`
  MODIFY `rId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
