-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 01:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `mini_car_store`
--

CREATE TABLE `mini_car_store` (
  `manufacture_name` varchar(100) NOT NULL,
  `model` varchar(100) DEFAULT NULL,
  `color` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `manufacturing_year` int(4) NOT NULL,
  `registration_number` varchar(10) NOT NULL,
  `sold_flag` varchar(1) NOT NULL DEFAULT 'N',
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mini_car_store`
--

INSERT INTO `mini_car_store` (`manufacture_name`, `model`, `color`, `price`, `manufacturing_year`, `registration_number`, `sold_flag`, `url`) VALUES
('SUZUKI', NULL, '', 0, 0, '', 'N', ''),
('AUDI', 'Q3', 'GREY', 0, 2019, 'HO41-74856', 'Y', 'http://localhost/images/15532581221830968618.jpg'),
('AUDI', 'Q3', 'WHITE', 0, 2018, 'OK45-74587', 'N', 'http://localhost/images/15532586451490725184.jpg'),
('BENZ', 'I20', 'SILVER', 0, 2010, 'PL74-78946', 'N', 'http://localhost/images/15532586781313076906.jpg'),
('AUDI', 'BALLENO', 'SILVER', 0, 2019, 'OK74-78524', 'N', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
