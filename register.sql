-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 03:26 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(5) NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(200) NOT NULL,
  `article` varchar(50) NOT NULL,
  `property_num` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity_unit` int(10) NOT NULL,
  `unit_value` double NOT NULL,
  `BPC_quantity` int(10) NOT NULL,
  `BPC_value` int(100) NOT NULL,
  `OPC_quantity` int(10) NOT NULL,
  `OPC_value` int(100) NOT NULL,
  `SO_value` int(11) DEFAULT NULL,
  `SO_quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Remarks` varchar(100) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `article`, `property_num`, `description`, `quantity_unit`, `unit_value`, `BPC_quantity`, `BPC_value`, `OPC_quantity`, `OPC_value`, `SO_value`, `SO_quantity`, `date`, `Remarks`, `type`) VALUES
(1, '', '33-0004', 'Computer Monitor (ACC) LCD Monitor', 5, 4700, 1, 4700, 1, 4700, 1, 1, '2008-12-08', 'Sarah S. Navarro', 'IT EQUIPMENTS AND SOFTWARE'),
(2, '', '33-0009-CL', 'Laptop Compaq Presario Daul Core\r\nsn#: CND94757UN', 1, 28450, 1, 28450, 1, 28450, 1, 1, '2018-10-15', 'Fe L. Dio', 'IT EQUIPMENTS AND SOFTWARE'),
(24, '', '47', 'ballpen', 4, 47, 47, 47, 1, 74, 1, 1, '2018-10-31', 'ms.Ikaw', 'other'),
(28, '', 'b-123', 'qwe', 444, 4454, 444, 4564, 1, 454, 1, 1, '2018-07-17', 'ms.U', 'other'),
(27, '', 'BP-1', 'ballpen', 123, 12, 32, 131, 1, 121, 1, 1, '2018-07-17', 'Michael john T. Timajo', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(6, 'admin', 'Admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2018-06-20 01:55:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
