-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2016 at 10:32 AM
-- Server version: 5.5.46-0ubuntu0.12.04.2
-- PHP Version: 5.5.31-2+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(2, 'Tsukisima', 'Kei', 'male', 'Tokyo', '1988-09-01 17:00:00'),
(8, 'Rifki', 'Ahmad', 'male', 'Indonesia', '2016-01-23 06:46:31'),
(9, 'uchiha', 'itachi', 'male', 'Ex Konoha', '2016-01-23 06:46:31'),
(11, 'kageyama', 'tobio', 'male', 'Jhozenji', '2016-01-23 06:47:07'),
(12, 'Tsukisima', 'Kei', 'male', 'Tokyo', '1988-09-01 17:00:00'),
(13, 'Rifki', 'Ahmad', 'male', 'jl mondokan-sumberlawang', '2016-01-23 06:46:31'),
(14, 'uchiha', 'itachi', 'male', 'Ex Konoha', '2016-01-23 06:46:31'),
(15, 'Hinata', 'Shoyo', 'male', 'Karasuno', '2016-01-23 06:46:31'),
(16, 'kageyama', 'tobio', 'male', 'karasuno', '2016-01-23 06:47:07'),
(17, 'uchiha', 'itachi', 'male', 'Ex Konoha', '2016-01-23 06:46:31'),
(19, 'kageyama', 'tobio', 'male', 'karasuno', '2016-01-23 06:47:07'),
(20, 'Nishinoya', 'thunder', 'male', 'karasuno', '2016-01-23 12:35:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
