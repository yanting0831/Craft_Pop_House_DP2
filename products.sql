-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 05:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 2, 1, 'Handmade Woven Sling Bag', 'bag-4.jpg', '35', 'This bag designed by Craft Pop House allows you to bring everything with you whenever you need to. Bring this back home, bring it for travelling, shopping or any leisure activities to inspire your friends and family with this casual and nice bag.'),
(2, 2, 1, 'Handmade Top-Handle Bag', 'bag-3.jpg', '40', 'This traditional rattan made handbag allows you to bring everything in this simplistic and fashion design bag. Get compliments from everyone on the gorgeous gold hardware on this stunning bag.'),
(3, 2, 1, 'Handmade Rattan Crossbody Bag', 'bag-2.jpg', '45', 'This beautiful rattan crossbody bag by Craft Pop House allows you to bring everything with you whenever you need to, but fashionably of course! Get compliments from everyone on the gorgeous gold hardware on this stunning bag.'),
(4, 2, 3, 'All is Bright Jar Candle', 'candle-1.jpg', '45', 'A blend of sparkling citrus scents drifting on warm musk.'),
(5, 2, 3, 'Aloe Water Jar Candle', 'candle-2.jpg', '45', 'A sophisticated and soothing blend of florals and subtle fruits. \r\n		Fragrance Notes:\r\n		Top: Sheer Citrus, Aldehydes, Greens\r\n		Mid: Mimosa, Ylang, Jasmine, Rose, Tuberose\r\n		Base: Sweet Musk, Sandalwood, Tonka Bean\r\n		Burn Time:110 to 150 hours\r\n		Weight:22oz'),
(6, 2, 3, 'A Calm Jar Candle', 'candle-4.jpg', '55', 'A meditative fragrance with gentle jasmine, patchouli and amber musk.'),
(7, 2, 3, 'Alpine Morning Jar Candle', 'candle-3.jpg', '45', 'Wake up to a breath of fresh mountain air: flowers and spice, with a zing of citrus.'),
(8, 2, 2, 'Charcoal Soap', 'soap-1.jpg', '15', 'Charcoal detoxifies skin by absorbing oil and impurities that cause acne and blackheads. Shea butter, castor oil & wheat germ oil help to soothen skin and promote scar healing especially for acne. Suitable for oily skin with pimples and acne.'),
(9, 2, 2, 'Kernel Scrub Soap', 'soap-2.jpg', '25', 'A soap which gently exfoliates with apricot kernel powder and is not stripping on the skin. Enjoy it daily with the warm and relaxing scent of lemongrass and rosemary essential oils.'),
(10, 2, 2, 'Chamomile Soap', 'soap-3.jpg', '22', 'Chamomile is traditionally used to relieve skin irritations such as acne, insect bites and itching. To fully distill the benefits of the chamomile flower, we have infused chamomile flowers in olive oil for 2 months before using the oil for soap making.  Suitable for sensitive dry skin.'),
(11, 2, 2, 'Lavender Olive Soap', 'soap-4.jpg', '20', 'To make this bar, we infused lavender flowers into olive oil for 2 months. This soap is also superfatted with evening primrose oil to help with skin inflammations, acne and itching.This soap is suitable for normal, sentisive and dry skin types.'),
(12, 2, 4, 'The Grand Piano', 'wood-4.jpg', '85', 'The art pieces are all hand assembled with the finest wood veneer.'),
(13, 2, 4, 'The Lion King', 'wood-1.jpg', '150', 'The art pieces are all hand assembled with the finest wood veneer.'),
(14, 2, 4, 'The Wolves', 'wood-2.jpg', '120', 'The art pieces are all hand assembled with the finest wood veneer.'),
(15, 2, 4, 'The Owl', 'wood-3.jpg', '95', 'The art pieces are all hand assembled with the finest wood veneer.');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
