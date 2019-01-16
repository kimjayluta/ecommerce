-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 07:29 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `o_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prod_id`, `ip_add`, `user_id`, `qty`) VALUES
(32, 38, '127.0.0.1', 10, 1),
(33, 36, '127.0.0.1', 10, 1),
(34, 37, '127.0.0.1', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prod_qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `prod_qty`) VALUES
(66, 't-shirt', 6),
(69, 'pants', 0),
(70, 'accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `ord_stat` enum('pend','comp','canc') NOT NULL DEFAULT 'pend'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `prod_id`, `qty`, `ord_stat`) VALUES
(34, 29, 38, 1, 'pend'),
(35, 29, 37, 1, 'pend'),
(36, 29, 33, 1, 'pend'),
(37, 29, 35, 5, 'pend'),
(38, 30, 33, 1, 'pend'),
(39, 30, 39, 1, 'pend'),
(40, 30, 38, 1, 'pend'),
(41, 30, 37, 1, 'pend'),
(42, 30, 36, 1, 'pend'),
(43, 30, 35, 1, 'pend'),
(44, 30, 34, 1, 'pend'),
(45, 31, 33, 1, 'pend'),
(46, 31, 39, 1, 'pend'),
(47, 32, 39, 1, 'pend'),
(48, 32, 38, 1, 'pend'),
(49, 33, 35, 1, 'pend'),
(50, 33, 33, 1, 'pend'),
(51, 33, 39, 1, 'pend'),
(52, 33, 38, 1, 'pend'),
(53, 33, 37, 1, 'pend'),
(54, 33, 36, 1, 'pend'),
(55, 33, 34, 1, 'pend'),
(56, 34, 35, 1, 'pend'),
(57, 34, 33, 1, 'pend'),
(58, 34, 39, 1, 'pend'),
(59, 34, 36, 1, 'pend'),
(60, 35, 35, 1, 'pend'),
(61, 35, 33, 1, 'pend'),
(62, 35, 39, 1, 'pend'),
(63, 36, 35, 1, 'pend'),
(64, 37, 35, 1, 'pend'),
(65, 37, 33, 1, 'pend'),
(66, 38, 35, 1, 'pend'),
(67, 39, 33, 1, 'pend'),
(68, 40, 36, 1, 'pend'),
(69, 41, 35, 1, 'pend');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `id` int(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `date_ord` date NOT NULL,
  `cnum` bigint(20) NOT NULL,
  `total_ord` int(255) NOT NULL,
  `ord_stat` enum('pend','comp','canc') NOT NULL DEFAULT 'pend'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`id`, `cust_name`, `address`, `date_ord`, `cnum`, `total_ord`, `ord_stat`) VALUES
(29, 'Patricia Ganda', 'Pacul street, Baranggay Carolina, naga, Camarines Sur, 4400', '2019-01-14', 123123, 100, 'comp'),
(30, 'Kim gwapo', 'molave street, Baranggay liboton, naga, Camarines Sur, 4400', '2019-02-02', 123123, 100, 'comp'),
(31, 'gleen cute', 'libmanan street, Baranggay sipocot, naga, Camarines Sur, 4400', '2019-03-06', 2312311, 1502, 'canc'),
(32, 'Jay are', 'gainza street, Baranggay gainza, naga, Camarines Sur, 4400', '2019-04-17', 12321321, 437, 'canc'),
(33, 'ace', 'pacul street, Baranggay naga, naga, Camarines Sur, 4400', '2019-05-02', 13213, 3667, 'pend'),
(34, 'dkkadaj', 'djakdjakdj street, Baranggay kdakdajd, dakdajdawkj, Metro manila, 3131', '2019-06-12', 1123131, 2635, 'pend'),
(35, 'dkakdajdkj', 'djkasdajkdjka street, Baranggay dkjadjdak, adjawdkawd, Agusan Del Norte, 3131', '2019-07-24', 3131231, 1515, 'pend'),
(36, 'kadawjkdawjk', 'ajkdajkdakjd street, Baranggay djkajkdajkdajk, kadajdjkadjk, Kalinga, 3131', '2019-08-21', 31313, 13, 'pend'),
(37, 'dakdajd', 'ajdakjdawkjd street, Baranggay jkadkajdawjk, dnandaa, Abra, 3131', '2019-09-04', 313111, 15154, 'pend'),
(38, 'dajdakdja', 'dkawkdawdjk street, Baranggay kkawdjawkdk, djakdjakdj, Metro manila, 3113', '2019-10-02', 31313, 13440, 'pend'),
(39, 'dakdawjedajkdk', 'dnadakdak street, Baranggay dadjawdjkawdkj, jdkakdjajdajkd, Agusan Del Norte, 3131', '2019-11-02', 113131, 1502, 'pend'),
(40, 'kadawkdja', 'kadakjdakjd street, Baranggay kdkadjakdaj, jkdkajdjawdjk, Agusan Del Norte, 3131', '2019-12-18', 31313, 1120, 'pend'),
(41, 'akdjawdkja', 'kadjadjka street, Baranggay jajdakdja, akdjakd, Metro manila, 3131', '2019-01-15', 313141, 100, 'pend');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `prod_cat` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `prod_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prod_cat`, `name`, `descrip`, `price`, `qty`, `date_added`, `prod_img`) VALUES
(33, 66, 'black t-shirt', 'dkadjadkjdjk', 1341, 131, '2019-01-14 14:27:23', '1546833003bg2.jpg'),
(34, 66, 'dadkakld', 'ldadladakdlk', 31, 3, '2019-01-07 12:12:34', '1546834354bg.jpg'),
(35, 66, 'Red snapback', 'awdawdawdawdawdaw', 12, 121, '2019-01-14 15:33:11', '1546835445c3.PNG'),
(36, 66, 'Black longsleeve', '100% comfortable', 1000, 10, '2019-01-07 14:34:37', '1546842877i1.PNG'),
(37, 70, 'sun glass', 'shade for moon', 500, 5, '2019-01-07 14:36:17', '1546842977c1.PNG'),
(38, 66, 'Knitted Top', 'Pink shirt', 390, 5, '2019-01-07 14:42:51', '1546843371b4.PNG'),
(39, 66, 'Gray Top', 'Ganda ng model eh', 0, 0, '2019-01-14 08:54:05', '1547427141elizabeth.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fn` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_num` bigint(20) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `type` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fn`, `ln`, `address`, `contact_num`, `usn`, `pwd`, `type`) VALUES
(1, 'elizabeth', 'solis', 'panganiban naga city', 213113231, 'elizabeth', 'elizabeth', '0'),
(2, 'admin', 'admin', 'admin', 311313, 'admin', 'admin', '1'),
(3, 'Patricia', 'Baron', 'Pacul, Naga city', 123123, 'patricia', 'patricia', '0'),
(4, 'Nicole', 'Salceda', 'Abella , Naga city', 12345678, 'nicole', 'nicole', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_cat` (`prod_cat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prod_cat`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
