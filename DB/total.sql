-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2019 at 08:49 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `id10043492_storemgmnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE IF NOT EXISTS `total` (
  `Materials_code` int(9) NOT NULL,
  `Materials_name` varchar(30) NOT NULL,
  `Parts_code` varchar(10) CHARACTER SET ucs2 NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `Input_qty` int(10) NOT NULL,
  `Out_qty` int(10) NOT NULL,
  `Qty` int(10) NOT NULL,
  PRIMARY KEY (`Materials_name`),
  KEY `Input_qty` (`Input_qty`),
  KEY `Input_qty_2` (`Input_qty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`Materials_code`, `Materials_name`, `Parts_code`, `Unit`, `Input_qty`, `Out_qty`, `Qty`) VALUES
(1200, 'H1', 'A12', 'Pcs', 150, 30, 0),
(1500, 'M1', 'G25', 'Pcs', 100, 20, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
