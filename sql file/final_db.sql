-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 11:34 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(5) NOT NULL,
  `BookID` varchar(10) NOT NULL COMMENT 'Ex. 0000000001',
  `Name` varchar(50) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `Author` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `BLE_ID` varchar(17) NOT NULL COMMENT 'Ex. 88:4A:EA:6C:34:E8',
  `Shelf_id` varchar(10) NOT NULL,
  `Status` varchar(1) NOT NULL COMMENT 'ตัวแปรเก็บสถานะหนังสือ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Data of book';

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `BookID`, `Name`, `img`, `Author`, `Category`, `BLE_ID`, `Shelf_id`, `Status`) VALUES
(1, '001', 'PHP MySQL', 'assets/imgs/book/book2.gif', 'บัญชา ปะสีละเตสัง', 'ภาษาคอมพิวเตอร์', '88:4A:EA:6C:34:E8', 'A001', '2'),
(2, '002', 'Computer Architecture', 'assets/imgs/book/book1.jpg', 'William  Stallings', 'ภาษาคอมพิวเตอร์', '50:8C:B1:75:23:9D', 'A001', '0');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `BorrowID` int(5) NOT NULL,
  `StudentID` varchar(8) NOT NULL,
  `BookID` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `Time_STAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`BorrowID`, `StudentID`, `BookID`, `status`, `Time_STAMP`) VALUES
(1, '57021252', '001', 2, '2017-11-15 04:35:26'),
(2, '57021252', '002', 0, '2017-11-15 04:38:03'),
(3, '57021252', '001', 2, '2017-11-15 04:38:11'),
(4, '57021252', '001', 2, '2017-11-15 04:40:34'),
(5, '57021252', '001', 2, '2017-11-15 05:02:01'),
(6, '57021252', '002', 0, '2017-11-15 05:02:33'),
(7, '57021252', '001', 2, '2017-11-15 05:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `borrowfinal`
--

CREATE TABLE `borrowfinal` (
  `id` int(5) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `BookID` varchar(10) NOT NULL,
  `StartDate` varchar(20) NOT NULL,
  `ReturnDate` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL,
  `Renew` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrowfinal`
--

INSERT INTO `borrowfinal` (`id`, `StudentID`, `BookID`, `StartDate`, `ReturnDate`, `Time`, `Renew`, `status`) VALUES
(1, '57021252', '001', '15:11:2017', '6:12:2017', '12:05:41', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(5) NOT NULL COMMENT 'Auto ',
  `StudentID` varchar(8) NOT NULL COMMENT 'Ex. 57021252',
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL COMMENT 'Ex. 0954464537',
  `Email` text,
  `img` varchar(50) NOT NULL,
  `Sex` varchar(6) NOT NULL COMMENT 'male or female',
  `Status` int(1) DEFAULT NULL COMMENT 'status of user',
  `StatusLogin` int(1) DEFAULT NULL COMMENT '0 or 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `StudentID`, `Password`, `Name`, `Phone`, `Email`, `img`, `Sex`, `Status`, `StatusLogin`) VALUES
(1, '57021252', 'a', 'Thaychasain Chinnaphong', '0954464537', 'thaychasain@hotmail.com', 'assets/imgs/user/user1.jpg', 'male', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `id` int(3) NOT NULL,
  `Shelf_id` varchar(10) NOT NULL,
  `LoadCell` varchar(10) NOT NULL,
  `Weight` varchar(10) NOT NULL,
  `Status` varchar(10) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`id`, `Shelf_id`, `LoadCell`, `Weight`, `Status`) VALUES
(1, 'A001', 'L001', 'W001', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`BorrowID`);

--
-- Indexes for table `borrowfinal`
--
ALTER TABLE `borrowfinal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `BorrowID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `borrowfinal`
--
ALTER TABLE `borrowfinal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Auto ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
