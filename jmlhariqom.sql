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
-- Table structure for table `jmlhariqom`
--

CREATE TABLE `jmlhariqom` (
  `id` int(11) NOT NULL,
  `jmlhari` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jmlhariqom`
--

INSERT INTO `jmlhariqom` (`id`, `jmlhari`) VALUES
(1, 354),
(2, 709),
(3, 1063),
(4, 1417),
(5, 1772),
(6, 2481),
(7, 2835),
(8, 2835),
(9, 3189),
(10, 3544),
(11, 3898),
(12, 4252),
(13, 4607),
(14, 4961),
(15, 5316),
(16, 5670),
(17, 6024),
(18, 6379),
(19, 6733),
(20, 7087),
(21, 7442),
(22, 7796),
(23, 8150),
(24, 8505),
(25, 8859),
(26, 9214),
(27, 9568),
(28, 9922),
(29, 10277),
(30, 10631);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jmlhariqom`
--
ALTER TABLE `jmlhariqom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jmlhariqom`
--
ALTER TABLE `jmlhariqom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
