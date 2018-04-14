-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 11:24 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_cost` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booktocart`
--

CREATE TABLE `booktocart` (
  `booktocart_id` int(11) NOT NULL,
  `fk_customer_id` int(11) NOT NULL,
  `fk_sells_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `buy_id` int(11) NOT NULL,
  `fk_booktocart_id` int(11) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `day` date DEFAULT NULL,
  `delivery` int(11) NOT NULL DEFAULT '0',
  `buy_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `customer_fullname` varchar(255) NOT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `email`, `customer_fullname`, `customer_address`, `points`) VALUES
(1, 'adminc', 'adminc', 'admin@gmail.com', 'admin customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasgenre`
--

CREATE TABLE `hasgenre` (
  `fk_book_id` int(11) DEFAULT NULL,
  `fk_genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE `returned` (
  `return_id` int(11) NOT NULL,
  `fk_buy_id` int(11) DEFAULT NULL,
  `day` date DEFAULT NULL,
  `delivery` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `seller_fullname` varchar(50) NOT NULL,
  `seller_address` varchar(255) DEFAULT NULL,
  `seller_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `username`, `password`, `email`, `seller_fullname`, `seller_address`, `seller_rating`) VALUES
(1, 'admins', 'admins', 'admins@gmail.com', 'admin seller', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `sells_id` int(11) NOT NULL,
  `fk_seller_id` int(11) DEFAULT NULL,
  `fk_book_id` int(11) DEFAULT NULL,
  `sells_price` int(11) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_name` (`book_name`);

--
-- Indexes for table `booktocart`
--
ALTER TABLE `booktocart`
  ADD PRIMARY KEY (`booktocart_id`),
  ADD KEY `fk_customer_id` (`fk_customer_id`),
  ADD KEY `fk_sells_id` (`fk_sells_id`);

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`buy_id`),
  ADD KEY `fk_booktocart_id` (`fk_booktocart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `hasgenre`
--
ALTER TABLE `hasgenre`
  ADD KEY `fk_book_id` (`fk_book_id`),
  ADD KEY `fk_genre_id` (`fk_genre_id`);

--
-- Indexes for table `returned`
--
ALTER TABLE `returned`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `fk_buy_id` (`fk_buy_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`sells_id`),
  ADD KEY `fk_seller_id` (`fk_seller_id`),
  ADD KEY `fk_book_id` (`fk_book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booktocart`
--
ALTER TABLE `booktocart`
  MODIFY `booktocart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buys`
--
ALTER TABLE `buys`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returned`
--
ALTER TABLE `returned`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `sells_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booktocart`
--
ALTER TABLE `booktocart`
  ADD CONSTRAINT `booktocart_ibfk_1` FOREIGN KEY (`fk_customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booktocart_ibfk_2` FOREIGN KEY (`fk_sells_id`) REFERENCES `sells` (`sells_id`) ON UPDATE CASCADE;

--
-- Constraints for table `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_ibfk_1` FOREIGN KEY (`fk_booktocart_id`) REFERENCES `booktocart` (`booktocart_id`) ON UPDATE CASCADE;

--
-- Constraints for table `hasgenre`
--
ALTER TABLE `hasgenre`
  ADD CONSTRAINT `hasgenre_ibfk_1` FOREIGN KEY (`fk_book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hasgenre_ibfk_2` FOREIGN KEY (`fk_genre_id`) REFERENCES `genre` (`genre_id`) ON UPDATE CASCADE;

--
-- Constraints for table `returned`
--
ALTER TABLE `returned`
  ADD CONSTRAINT `returned_ibfk_1` FOREIGN KEY (`fk_buy_id`) REFERENCES `buys` (`buy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `sells_ibfk_1` FOREIGN KEY (`fk_seller_id`) REFERENCES `seller` (`seller_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sells_ibfk_2` FOREIGN KEY (`fk_book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
