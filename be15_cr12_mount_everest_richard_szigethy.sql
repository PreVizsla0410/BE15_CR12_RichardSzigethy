-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 08:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be15_cr12_mount_everest_richard_szigethy`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `holidayname` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `length-of-holiday` varchar(25) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `image`, `holidayname`, `price`, `description`, `length-of-holiday`, `longitude`, `latitude`) VALUES
(1, 'Bulgaria.jpg', 'Sofia', 75, 'This is Bulgaria. Do you need more explanation?', '8 days', '23.319941', '42.698334'),
(2, 'Moldawien.jpg', 'Chisinau', 150, 'With this alternative journey, you really gonna surprise your friends', '8 days', '28.863810', '47.010452'),
(3, 'romania.jpg', 'Glod, Dâmbovița', 120, 'Visit Borats homevillage. In Romania ', '6 days', '25.448660', '45.238960'),
(4, 'Ungarn.jpg', 'Öcsény', 20, 'If you think you live in a racist and conservative area, visit any place in Hungary - Öcsény escpcially', '5 days', '18.757778', '46.312500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
