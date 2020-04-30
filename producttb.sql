-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 11:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_price`, `product_image`) VALUES
(1, 'Handmade Rattan Handbag', 50, 'images/bag-1.jpg'),
(2, 'Handmade Rattan Crossbody', 45, 'images/bag-2.jpg'),
(3, 'Handmade Top-Handle Bag', 40, 'images/bag-3.jpg'),
(4, 'Handmade Woven Sling Bag', 35, 'images/bag-4.jpg'),
(5, 'All is Bright Jar Candle', 45, 'images/candle-1.jpg'),
(6, 'Aloe Water Jar Candle', 45, 'images/candle-2.jpg'),
(7, 'Alpine Morning Jar Candle', 45, 'images/candle-3.jpg'),
(8, 'A Calm & Quiet Place Jar ', 45, 'images/candle-4.jpg'),
(9, 'Deep Clean Charcoal Soap', 15, 'images/soap-1.jpg'),
(10, 'Apricot Kernel Scrub Soap', 25, 'images/soap-2.jpg'),
(11, 'Chamomile Soap', 22, 'images/soap-3.jpg'),
(12, 'Lavender Oil Soap', 20, 'images/soap-4.jpg'),
(13, 'The Lion King', 150, 'images/wood-1.jpg'),
(14, 'The Wolves', 120, 'images/wood-2.jpg'),
(15, 'The Owl', 95, 'images/wood-3.jpg'),
(16, 'The Grand Piano', 85, 'images/wood-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
