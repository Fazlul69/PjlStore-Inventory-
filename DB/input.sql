-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2019 at 08:48 AM
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
-- Table structure for table `input`
--

CREATE TABLE IF NOT EXISTS `input` (
  `Date` date NOT NULL,
  `Materials_code` int(9) NOT NULL,
  `Materials_name` varchar(30) NOT NULL,
  `Parts_code` varchar(20) NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `Input_qty` int(10) NOT NULL,
  `RcvNameId` varchar(30) NOT NULL,
  `PrvNameId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `input`
--

INSERT INTO `input` (`Date`, `Materials_code`, `Materials_name`, `Parts_code`, `Unit`, `Input_qty`, `RcvNameId`, `PrvNameId`) VALUES
('2019-07-13', 1500, 'M1', 'G25', 'Pcs', 100, 'Biddut STF120154', 'Rahul MGT101586'),
('2019-07-14', 1200, 'H1', 'A12', 'Pcs', 50, 'Iqbal  STF100158', 'Rakib STF100157'),
('2019-07-12', 1200, 'H1', 'A12', 'Pcs', 100, 'Iqbal  STF100158', 'Rakib STF100157');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
