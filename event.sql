-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 04:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventcalendar`
--

CREATE TABLE `eventcalendar` (
  `id` int(11) NOT NULL,
  `titile` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `eventdate` varchar(19) NOT NULL,
  `eveventadded` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcalendar`
--

INSERT INTO `eventcalendar` (`id`, `titile`, `detail`, `eventdate`, `eveventadded`) VALUES
(25, 'Name', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime accusamus deserunt officia, cupiditate iure id, et nobis, perferendis nam hic consequatur voluptates eos illo quis consequuntur voluptate totam itaque est.', '01/08/2017', '01/07/2017'),
(27, 'test', 'k', '01/08/2017', '01/07/2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventcalendar`
--
ALTER TABLE `eventcalendar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventcalendar`
--
ALTER TABLE `eventcalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
