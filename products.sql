-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 10:08 AM
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
-- Database: `cph`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` text NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `product_title`, `product_img`, `product_price`, `product_description`) VALUES
(1, 1, 'Handmade Rattan Handbag', 'bag-1.jpg', '50.00', 'ASD'),
(2, 1, 'Handmade Rattan Crossbody', 'bag-2.jpg', '45.00', 'ASD'),
(3, 1, 'Handmade Top-Handle Bag', 'bag-3.jpg', '40.00', 'ASD'),
(4, 1, 'Handmade Sling Bag', 'bag-4.jpg', '35.00', 'ASD'),
(5, 3, 'All is Bright Jar Candle', 'candle-1.jpg', '45.00', 'ASD'),
(6, 3, 'Aloe Water Jar Candle', 'candle-2.jpg', '45.00', 'ASD'),
(7, 3, 'Alpine Jar Candle', 'candle-3.jpg', '45.00', 'ASD'),
(8, 3, 'A Calm & Quiet Place Jar ', 'candle-4.jpg', '45.00', 'ASD'),
(9, 2, 'Clean Charcoal Soap', 'soap-1.jpg', '15.00', 'ASD'),
(10, 2, 'Apricot Scrub Soap', 'soap-2.jpg', '25.00', 'ASD'),
(11, 2, 'Deep Clean Soap', 'soap-3.jpg', '22.00', 'ASD'),
(12, 2, 'Lavender Oil Soap', 'soap-4.jpg', '20.00', 'ASD'),
(13, 4, 'The Lion King', 'wood-1.jpg', '150.00', 'ASD'),
(14, 4, 'The Wolves', 'wood-2.jpg', '120.00', 'ASD'),
(15, 4, 'The Owl', 'wood-3.jpg', '95.00', 'ASD'),
(16, 4, 'The Grand Piano', 'wood-4.jpg', '85.00', 'ASD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
