-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 08:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LACounty_TEST`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ASSETTAG` varchar(30) NOT NULL,
  `UPDATE_TIME` datetime NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `UPDATE_BY_USER` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ASSETTAG`, `UPDATE_TIME`, `DESCRIPTION`, `UPDATE_BY_USER`) VALUES
('AS000420', '2017-03-27 05:27:28', 'TESTTIME', 'Sue'),
('AS000200', '2017-03-27 06:27:28', 'Custodian Change from Angel to Tony', 'Anthony'),
('AS000200', '2017-03-27 06:28:36', 'Office Change from C35 to D209', 'Charlene'),
('AS000200', '2017-03-27 06:32:48', 'New Action', 'Anthony'),
('AS000200', '2017-03-27 06:33:05', 'New Action2', 'Sue'),
('AS000200', '2017-03-27 06:33:48', 'New Action3', 'Harvey'),
('AS000420', '2017-03-27 07:02:32', 'TEST1', 'Charlene');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`UPDATE_TIME`),
  ADD UNIQUE KEY `UPDATE_TIME` (`UPDATE_TIME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;