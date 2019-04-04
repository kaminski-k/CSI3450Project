-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 02:48 PM
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
-- Database: `icecream`
--

-- --------------------------------------------------------

--
-- Table structure for table `flavors`
--

CREATE TABLE `flavors` (
  `id` varchar(11) NOT NULL,
  `flavor` text NOT NULL,
  `brand` text NOT NULL,
  `upc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flavors`
--

INSERT INTO `flavors` (`id`, `flavor`, `brand`, `upc`) VALUES
('1', 'paaaa', 'h', '2'),
('flavor', '', '', ''),
('ice', 'cream', 'for', 'everyone'),
('', 'a', 'b', '2'),
('', 'for', 'me', '4'),
('', 'for', 'uy', '1'),
('', 'm', 'k', '1'),
('11', 'ke', 'o', '22'),
('1', 'c', 'c', '22'),
('1', 'lik', 'ir', '2'),
('1', 'chocolate', 'Strohs', '333333333'),
('1', 'you', 'me', '3333');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(4, 'Chocolate', 'chocolate.jpg', 2.50),
(5, 'Cookie-dough', 'cookiedough.jpg', 3.50),
(6, 'Vanilla', 'vanilla.jpg', 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `user_name` varchar(60) DEFAULT NULL,
  `user_password` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `user_name`, `user_password`, `email`) VALUES
(1, 'ice', 'cream', 'icecream@cream.ice'),
(11, 'pass', 'passpass', 'pass@pass.cm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flavors`
--
ALTER TABLE `flavors`
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
