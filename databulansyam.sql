-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2022 at 12:30 AM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramdanfl_burung`
--

-- --------------------------------------------------------

--
-- Table structure for table `databulansyam`
--

CREATE TABLE `databulansyam` (
  `id` int(11) NOT NULL,
  `basitoh` int(11) NOT NULL,
  `kabisah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databulansyam`
--

INSERT INTO `databulansyam` (`id`, `basitoh`, `kabisah`) VALUES
(1, 31, 31),
(2, 28, 29),
(3, 31, 31),
(4, 30, 30),
(5, 31, 31),
(6, 30, 30),
(7, 31, 31),
(8, 31, 31),
(9, 30, 30),
(10, 31, 31),
(11, 30, 30),
(12, 31, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databulansyam`
--
ALTER TABLE `databulansyam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databulansyam`
--
ALTER TABLE `databulansyam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
