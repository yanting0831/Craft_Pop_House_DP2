-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 05:42 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'Eric', 'eric_kong11@hotmail.com', 'admin', '877a038ed0cb94b0a2d4672c9639ce2a'),
(2, 'YanTing', 'tanYT@hotmail.com', 'seller', 'a026d1b4a4464a3b94f0ae9193bbab48'),
(3, 'Ricky', 'rickysu98@hotmail.com', 'seller', 'e9fa126bf7032a6b4811112450fbee07'),
(13, 'asd', '100083700@students.swinburne.edu.my', 'user', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'PCSects', 'harry@den.com', 'user', '202cb962ac59075b964b07152d234b70'),
(15, '123', 'admin@admin.com', 'user', '7815696ecbf1c96e6894b779456d330e'),
(16, 'ric123', 'rickysoo98@hotmail.com', 'seller', '202cb962ac59075b964b07152d234b70'),
(17, 'seller123', 'seller123@hotmail.com', 'seller', '202cb962ac59075b964b07152d234b70'),
(18, 'ioii', 'eric_kong99@hotmail.com', 'user', 'b706835de79a2b4e80506f582af3676a'),
(19, 'opop', 'eric_kong100111@hotmail.com', 'user', 'b706835de79a2b4e80506f582af3676a'),
(20, 'ioiiooo', 'eric_kong11111@hotmail.com', 'user', 'b706835de79a2b4e80506f582af3676a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
