-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 03:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onssdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblnotes`
--

CREATE TABLE `tblnotes` (
  `ID` int(5) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `Subject` varchar(250) DEFAULT NULL,
  `NotesTitle` varchar(250) DEFAULT NULL,
  `NotesDecription` longtext DEFAULT NULL,
  `File1` varchar(250) DEFAULT NULL,
  `File2` varchar(250) DEFAULT NULL,
  `File3` varchar(255) DEFAULT NULL,
  `File4` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnotes`
--

INSERT INTO `tblnotes` (`ID`, `UserID`, `Subject`, `NotesTitle`, `NotesDecription`, `File1`, `File2`, `File3`, `File4`, `CreationDate`, `UpdationDate`) VALUES
(1, 3, 'Math', 'Maths Shortcuts', 'It contain math shortcuts.', 'd41d8cd98f00b204e9800998ecf8427e1702536045.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702536260', 'd41d8cd98f00b204e9800998ecf8427e1702536700', 'd41d8cd98f00b204e9800998ecf8427e1702534796.pdf', '2023-12-14 06:19:56', '2023-12-14 06:51:40'),
(2, 3, 'English', 'English Vocabulary', 'shgfgrhfgrw\r\nfdfhreiufyhw\r\nfewyhiufywe', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', '', '2023-12-14 07:33:52', NULL),
(3, 3, 'English', 'English Literature', 'shgfgrhfgrw\r\nfdfhreiufyhw\r\nfewyhiufywe', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', '', '2023-12-14 07:33:52', '2023-12-14 13:30:34'),
(4, 2, 'Math', 'Maths Shortcuts', 'It contain math shortcuts.', 'd41d8cd98f00b204e9800998ecf8427e1702536045.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702536260', 'd41d8cd98f00b204e9800998ecf8427e1702536700', 'd41d8cd98f00b204e9800998ecf8427e1702534796.pdf', '2023-12-14 06:19:56', '2023-12-14 13:18:41'),
(5, 1, 'Math', 'Maths Shortcuts', 'It contain math shortcuts.', 'd41d8cd98f00b204e9800998ecf8427e1702536045.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702536260', 'd41d8cd98f00b204e9800998ecf8427e1702536700', 'd41d8cd98f00b204e9800998ecf8427e1702534796.pdf', '2023-12-14 06:19:56', '2023-12-14 13:18:46'),
(6, 2, 'English', 'English Vocabulary', 'shgfgrhfgrw\r\nfdfhreiufyhw\r\nfewyhiufywe', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', 'd41d8cd98f00b204e9800998ecf8427e1702539232.pdf', '', '2023-12-14 07:33:52', '2023-12-14 13:18:51'),
(11, 5, 'Diskpart', 'Hi', 'qwerty', 'd41d8cd98f00b204e9800998ecf8427e1739122108.pdf', 'd41d8cd98f00b204e9800998ecf8427e1739122108.pdf', '', '', '2025-02-09 17:28:28', NULL),
(15, 4, 'Mathematics ', 'Lucky s Book', 'Chapter 11', 'd41d8cd98f00b204e9800998ecf8427e1740312523.pdf', '', '', '', '2025-02-23 12:08:43', NULL),
(17, 6, 'Public ', 'Testing ', 'Testing ????????', 'd41d8cd98f00b204e9800998ecf8427e1741098588.pdf', '', '', '', '2025-03-04 14:29:48', NULL),
(18, 6, 'Public 2', 'Testing 2', 'Testing 2 week\' ', 'd41d8cd98f00b204e9800998ecf8427e1741099384.pdf', '', '', '', '2025-03-04 14:43:04', NULL),
(19, 6, 'Public 2', 'Testing 2', 'Testing 2 week\' ', 'd41d8cd98f00b204e9800998ecf8427e1741101384.pdf', '', '', '', '2025-03-04 15:16:24', NULL),
(20, 8, 'Maths 1', 'Sets and relation', 'Imp chapter', 'd41d8cd98f00b204e9800998ecf8427e1741784972.pdf', '', '', '', '2025-03-12 13:09:32', NULL),
(22, 10, 'SAQ', 'English', 'Session', 'd41d8cd98f00b204e9800998ecf8427e1741786018.pdf', '', '', '', '2025-03-12 13:26:58', NULL),
(23, 11, 'ITIM', 'BSCIT', 'Very Good Subject ', 'd41d8cd98f00b204e9800998ecf8427e1741786032.pdf', '', '', '', '2025-03-12 13:27:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(4, 'Shivam', 1122112211, 'abc@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-12-15 17:46:20'),
(5, 'Shubham', 1234567890, 'abcd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2025-02-09 17:26:55'),
(6, 'Satyendra ', 9000000000, 'saty@edutools.com', 'f925916e2754e5e03f75dd58a5733251', '2025-03-01 18:21:01'),
(7, 'Shubham Vishwakarma ', 9828381370, 'shubhamvishwa9139@gmail.com', '43c15c51ecf98f18a090666784b80797', '2025-03-12 12:55:54'),
(8, 'Shubham Vishwakarma ', 8928381370, 'shubham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2025-03-12 12:58:42'),
(9, 'Aryan', 9137081644, 'aryanyadav@9867', '2cfd4560539f887a5e420412b370b361', '2025-03-12 13:08:07'),
(10, 'Nilesh', 8291825975, 'nilesh@gmail.com', 'dd0ff90ea41e1e7cd9a0db2565274c4a', '2025-03-12 13:24:25'),
(11, 'Rakesh ', 7977841022, 'balotiyarakesh730@gmail.com', '1fb38a2c8002e087410e879a7ac6170e', '2025-03-12 13:24:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblnotes`
--
ALTER TABLE `tblnotes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblnotes`
--
ALTER TABLE `tblnotes`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
