-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 04:11 AM
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'haha', '123'),
(4, 'test', '1234'),
(5, '11', '22'),
(6, 'zxcasd', '1214');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `comment`, `createdOn`) VALUES
(21, 13, 'asd124312', '2020-05-25 13:39:04'),
(22, 13, '333333333333333', '2020-05-25 13:39:14'),
(23, 13, '12312413', '2020-05-25 13:43:31'),
(24, 13, '111111111111', '2020-05-25 13:55:45'),
(25, 13, 'test123', '2020-05-25 13:59:48'),
(26, 14, 'TestingForDP2', '2020-05-25 14:11:43'),
(27, 14, 'Helloooooo', '2020-05-25 19:32:00'),
(28, 13, 'testing 123', '2020-05-27 11:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `seller_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`seller_id`, `due_amount`, `invoice_no`, `qty`, `order_date`) VALUES
(18, 176, 193133736, 2, '2020-05-27'),
(20, 10000, 193133736, 1, '2020-05-27'),
(16, 85, 312964298, 1, '2020-05-27'),
(16, 285, 270365387, 3, '2020-05-27'),
(16, 340, 270365387, 4, '2020-05-27'),
(16, 85, 1460992783, 1, '2020-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(1, 'asd', '2020-05-26 14:29:20', 7, 13),
(2, '123', '2020-05-26 14:36:28', 8, 13),
(3, 'zxc', '2020-05-26 14:49:41', 9, 13),
(4, '22', '2020-05-26 15:14:18', 10, 13),
(5, '11111', '2020-05-26 17:04:31', 13, 1),
(6, 'hello', '2020-05-26 17:13:30', 13, 13),
(7, 'Leave a comment here!', '2020-05-26 19:41:37', 14, 13),
(8, 'test123', '2020-05-26 19:48:53', 13, 13),
(9, 'test123', '2020-05-26 19:49:43', 13, 13);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` text NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `seller_id`, `product_category_id`, `product_title`, `product_img`, `product_price`, `product_description`) VALUES
(24, 16, 1, 'Handmade Rattan Handbag', 'bag-1.jpg', '50.00', 'ASD'),
(26, 2, 1, 'Handmade Rattan Crossbody', 'bag-2.jpg', '45.00', 'ASD'),
(27, 2, 1, 'Handmade Top-Handle Bag', 'bag-3.jpg', '40.00', 'ASD'),
(28, 2, 1, 'Handmade Sling Bag', 'bag-4.jpg', '35.00', 'ASD'),
(29, 2, 3, 'All is Bright Jar Candle', 'candle-1.jpg', '45.00', 'ASD'),
(30, 17, 3, 'Aloe Water Jar Candle', 'candle-2.jpg', '45.00', 'ASD'),
(31, 17, 3, 'Alpine Wooden Jar Candle', 'candle-3.jpg', '45.00', 'ASD'),
(32, 17, 3, 'A Calm & Quiet Place Jar', 'candle-4.jpg', '45.00', 'ASD'),
(33, 16, 2, 'Wood Coal Soap', 'soap-1.jpg', '15.00', 'ASD'),
(34, 16, 2, 'Apricot Scrub Soap', 'soap-2.jpg', '25.00', 'ASD'),
(35, 16, 2, 'Deep Clean Soap', 'soap-3.jpg', '22.00', 'ASD'),
(36, 16, 2, 'Lavender Oil Soap', 'soap-4.jpg', '20.00', 'ASD'),
(37, 16, 4, 'The Lion King', 'wood-1.jpg', '150.00', 'ASD'),
(38, 16, 4, 'The Wolves', 'wood-2.jpg', '120.00', 'ASD'),
(39, 16, 4, 'The Owl', 'wood-3.jpg', '95.00', 'ASD'),
(40, 16, 4, 'The Grand Piano', 'wood-4.jpg', '85.00', 'ASD');

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

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `createdOn` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `commentID`, `comment`, `createdOn`, `userID`) VALUES
(1, 23, 'hahah123', '2020-05-25 13:48:13', 13),
(2, 22, 'trhhhh', '2020-05-25 13:50:32', 13),
(3, 21, '44444444', '2020-05-25 13:50:38', 13),
(4, 24, '123124123', '2020-05-25 13:56:45', 13),
(5, 25, 'allahu', '2020-05-25 13:59:53', 13),
(6, 26, 'You suck', '2020-05-25 14:11:54', 13),
(7, 28, 'asd124', '2020-05-27 20:08:23', 13),
(8, 28, '111111', '2020-05-29 09:58:49', 13);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_name` text NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_name`, `slide_image`) VALUES
(3, 'erer', 'slide3.jpg'),
(4, 'erer', 'slide1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(7, 'asd', '2020-05-26 14:29:20', 1, 13),
(8, 'zc', '2020-05-26 14:36:28', 4, 13),
(9, '1241', '2020-05-26 14:49:41', 1, 13),
(10, 'allas', '2020-05-26 15:14:18', 5, 13),
(11, '12344', '2020-05-26 17:03:57', 1, 1),
(12, '12344', '2020-05-26 17:04:18', 1, 1),
(13, '12344', '2020-05-26 17:04:31', 1, 1),
(14, 'Hand Crafted Bags', '2020-05-26 19:41:37', 6, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'Eric', 'eric_kong11@hotmail.com', 'admin', '877a038ed0cb94b0a2d4672c9639ce2a'),
(2, 'YanTing', 'tanYT@hotmail.com', 'seller', 'a026d1b4a4464a3b94f0ae9193bbab48'),
(3, 'Ricky', 'rickysu98@hotmail.com', 'user', 'e9fa126bf7032a6b4811112450fbee07'),
(13, 'asd', '100083700@students.swinburne.edu.my', 'user', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'PCSects', 'harry@den.com', 'user', '202cb962ac59075b964b07152d234b70'),
(15, '123', 'admin@admin.com', 'user', '7815696ecbf1c96e6894b779456d330e'),
(16, 'ric123', 'rickysoo98@hotmail.com', 'seller', '202cb962ac59075b964b07152d234b70'),
(17, 'seller123', 'seller123@hotmail.com', 'seller', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentID` (`commentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`fname`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `product_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
