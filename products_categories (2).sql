-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 04:34 PM
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
-- Database: `cph`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `product_category_id` int(10) NOT NULL,
  `product_category_title` text NOT NULL,
  `product_category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`product_category_id`, `product_category_title`, `product_category_desc`) VALUES
(1, 'Hand Crafted Bag', 'This gorgeous hand crafted rattan handbag allows you to bring everything with you whenever you need to, but fashionably of course! Grab this gorgeous and beautiful hand crafted rattan made for yourself or your loved ones before its too late!'),
(2, 'Hand Crafted Saop', 'A soap which gently exfoliates with apricot kernel powder and is not stripping on the skin. Enjoy it daily with the warm and relaxing scent of lemongrass and rosemary essential oils.'),
(3, 'Homemade Jar Candle ', 'A meditative fragrance - balanced and entered with gentle jasmine, a whisper of patchouli and warm amber musk.'),
(4, 'Wood Crafting', 'The art pieces are all hand assembled with the finest wood veneer.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `product_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
