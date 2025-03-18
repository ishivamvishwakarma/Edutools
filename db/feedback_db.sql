-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 02:13 PM
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
-- Database: `feedback_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `reg_date`) VALUES
(1, 'Hii', 'a@d.c', 'jkdsfkjsdbfksbf', '2025-03-16 12:41:41'),
(2, 'Hiii', 'Welcomegdfg@djn.dfgdsf', 'jkkjdsgksfhbkdbfgdbgdfhglxcidsgihxiohboighxhoclgn', '2025-03-16 12:53:43'),
(3, 'Hii', 'fdgfd@g.c', 'jfjkshkdjshfkdjsfhkjdfg', '2025-03-16 13:02:35'),
(4, 'Hiii', 'Hi@g.c', 'ofdfbjskdfbksjbkjsbfksjbdf', '2025-03-16 13:04:29'),
(5, 'HI', 'djglkdfjg@g.fdg', 'dlfjlkjglkfdgfg', '2025-03-16 13:07:04'),
(6, 'rkjgdfg', 'dflmdfklgF@fdgf.gfg', 'djhgkxjbnkfjgn', '2025-03-16 13:07:19'),
(7, 'IHjxofohg', 'dflkdnfglk@fdgdfg.dssdf', 'sdjkfhkjbvxkgbkjvbkxg', '2025-03-16 13:08:55'),
(8, 'dgdsfgs', 'sdfsdf@ghjg.ffdg', 'sddsfgdfgcx', '2025-03-16 13:09:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
