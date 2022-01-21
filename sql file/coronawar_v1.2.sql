-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 02:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coronawar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(20) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `NAME`, `EMAIL`, `PASS`) VALUES
(1, 'Admin', 'admin@gmail.com', 81);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `NAME`, `TYPE`, `EMAIL`, `PASS`) VALUES
(4, 'Mahbub rahman    ', 'Coronavirus Specialist', 'mrm@gmail.com', 81),
(5, 'Rakib Mahmud', 'Coronavirus expert', 'rakib@gmail.com', 81),
(8, 'Rahim', 'Corona Expert', 'rahim@gmail.com', 81),
(16, 'Farhana Khan', 'medicine', 'farhanasoha22@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `info_bd`
--

CREATE TABLE `info_bd` (
  `id` int(20) NOT NULL,
  `cases` int(20) NOT NULL,
  `recovered` int(20) NOT NULL,
  `deaths` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_bd`
--

INSERT INTO `info_bd` (`id`, `cases`, `recovered`, `deaths`) VALUES
(1, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `info_world`
--

CREATE TABLE `info_world` (
  `id` int(20) NOT NULL,
  `cases` int(20) NOT NULL,
  `recovered` int(20) NOT NULL,
  `deaths` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_world`
--

INSERT INTO `info_world` (`id`, `cases`, `recovered`, `deaths`) VALUES
(1, 555, 555, 555);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `NAME`, `EMAIL`, `PASS`) VALUES
(1, 'Naeem Hossain', 'naeem@gmail.com', 81),
(12, 'Al Mamun', 'm@gmail.com', 81),
(13, 'Likhon', 'l@gmail.com', 81);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(20) NOT NULL,
  `Product_Name` varchar(250) NOT NULL,
  `Product_Cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `ID` int(11) NOT NULL,
  `D_NAME` varchar(255) NOT NULL,
  `P_NAME` varchar(255) NOT NULL,
  `S_TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`ID`, `D_NAME`, `P_NAME`, `S_TYPE`) VALUES
(28, 'Mahbub rahman    ', 'Rakib Hassan', 'Vaccine Push'),
(43, 'Mahbub rahman    ', 'Naeem', 'Antibody Test'),
(46, 'Mahbub rahman    ', 'Likhon', 'Antibody Test'),
(47, 'Mahbub rahman    ', 'Likhon', 'Corona Test'),
(48, 'Mahbub rahman    ', 'Rakib Hassan', 'Vaccine Push'),
(54, 'Mahbub rahman', 'Naeem Hossain', 'Antibody Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_bd`
--
ALTER TABLE `info_bd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_world`
--
ALTER TABLE `info_world`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `info_bd`
--
ALTER TABLE `info_bd`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info_world`
--
ALTER TABLE `info_world`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
