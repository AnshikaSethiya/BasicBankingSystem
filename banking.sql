-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 01:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankusers`
--

CREATE TABLE `bankusers` (
  `CustomerID` int(5) NOT NULL,
  `AccountNumber` int(10) NOT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `BranchName` varchar(50) DEFAULT NULL,
  `AvailableBalance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankusers`
--

INSERT INTO `bankusers` (`CustomerID`, `AccountNumber`, `CustomerName`, `Email`, `BranchName`, `AvailableBalance`) VALUES
(1, 1005012, 'Abhimanyu Vyas', 'abhivyas@gmail.com', 'Indore', 51000),
(2, 2006402, 'Abhilasha Yadav', 'yadavabhilasha98@gmail.com', 'Dewas', 64857),
(3, 3006503, 'Beena Tripathi', 'tbeenagmail.com', 'Ujjain', 69150),
(4, 4001504, 'Charvi Mittal', 'charvimit3@gmail.com', 'Agra', 5100),
(5, 5003405, 'Dev Kashyap', 'dkashyap21@gmail.com', 'Kota', 22660),
(6, 6001606, 'Faiz Khan', 'faiz.khan@gmail.com', 'Jaipur', 4360),
(7, 7008407, 'Manan Jain', 'mjain24@yahoo.com', 'Delhi', 6700),
(8, 8003708, 'Paridhi Sharma', 'parisharma56@gmail.com', 'Indore', 36234),
(9, 9008409, 'Ved Agarwal', 'agarwalved@gmail.com', 'Bhopal', 82972),
(10, 10005610, 'Zeenat Arya', 'zeearya87@gmail.com', 'Kota', 33445);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `TransactionID` int(11) NOT NULL,
  `TransfererName` varchar(30) NOT NULL,
  `ReceiverName` varchar(30) NOT NULL,
  `CashTransfer` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`TransactionID`, `TransfererName`, `ReceiverName`, `CashTransfer`) VALUES
(1, 'Beena Tripathi', 'Faiz Khan', 500),
(2, 'Dev Kashyap', 'Charvi Mittal', 40),
(3, 'Dev Kashyap', 'Faiz Khan', 500),
(4, 'Dev Kashyap', 'Faiz Khan', 100),
(5, 'Dev Kashyap', 'Faiz Khan', 200),
(6, 'Beena Tripathi', 'Charvi Mittal', 300),
(7, 'Zeenat Arya', 'Faiz Khan', 500),
(8, 'Paridhi Sharma', 'Faiz Khan', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankusers`
--
ALTER TABLE `bankusers`
  ADD PRIMARY KEY (`AccountNumber`,`CustomerID`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`TransactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
