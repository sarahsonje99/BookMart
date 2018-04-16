-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 02:15 AM
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
  `summary` text NOT NULL,
  `imgUrl` text NOT NULL,
  `pages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_cost`, `author`, `summary`, `imgUrl`, `pages`) VALUES
(12, 'Tom Sawyer', 352, 'Mark Twain', 'The Perks of Being a Wallflower is a coming-of-age epistolary novel by American writer Stephen Chbosky which was first published on February 1, 1999, by Pocket Books. Set in the early 1990s, the novel follows Charlie, an introverted teenager, through his freshman year of high school in a Pittsburgh suburb.', 'https://images-na.ssl-images-amazon.com/images/I/5114SGc8lmL._SX356_BO1,204,203,200_.jpg', 356),
(13, 'Paper Towns', 358, 'John Green', 'When Margo Roth Spiegelman beckons Quentin Jacobsen in the middle of the night--dressed like a ninja and plotting an ingenious campaign of revenge--he follows her. Margo has always planned extravagantly, and, until now, she has always planned solo. After a lifetime of loving Margo from afar, things are finally looking up for Q . . . until day breaks and she has vanished. Always an enigma, Margo has now become a mystery. But there are clues. And they are for Q.', 'https://www.booksofbuderim.com.au/wp-content/uploads/2016/05/Paper-Towns-MTI-Cover-521x710.jpg', 305),
(14, 'The Perks of Being a Wallflower', 300, 'Chbosky', 'The Perks of Being a Wallflower is a coming-of-age epistolary novel by American writer Stephen Chbosky which was first published on February 1, 1999, by Pocket Books. Set in the early 1990s, the novel follows Charlie, an introverted teenager, through his freshman year of high school in a Pittsburgh suburb.', 'https://www.booktopia.com.au/http_coversbooktopiacomau/big/9781847394071/the-perks-of-being-a-wallflower.jpg', 250),
(15, 'The Da Vinci Code', 400, 'Dan Brown', 'The Da Vinci Code is a 2003 mystery thriller novel by Dan Brown. It follows \"symbologist\" Robert Langdon and cryptologist Sophie Neveu after a murder in the Louvre Museum in Paris causes them to become involved in a battle between the Priory of Sion and Opus Dei over the possibility of Jesus Christ having been a companion to Mary Magdalene.', 'https://resizing.flixster.com/7-QFEH63yycuAzN5jjo6fevs0qg=/206x305/v1.bTsxMTIwOTQ2MDtqOzE3NzI0OzEyMDA7MzMxODs0NDI0', 550),
(16, 'Lord of the Flies', 320, 'William Golding', 'Lord of the Flies is a 1954 novel by Nobel Prize–winning British author William Golding. The book focuses on a group of British boys stranded on an uninhabited island and their disastrous attempt to govern themselves.', 'https://images-na.ssl-images-amazon.com/images/I/51KsgCsIYyL._SX315_BO1,204,203,200_.jpg', 279),
(17, 'Neverwhere', 450, 'Neil Gaiman', 'Neverwhere is the companion novelisation written by English author Neil Gaiman of the television serial Neverwhere, by Gaiman and Lenny Henry. The plot and characters are exactly the same as in the series, with the exception that the novel form allowed Gaiman to expand and elaborate on certain elements of the story and restore changes made in the televised version from his original plans.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4722/9781472234353.jpg', 540);

-- --------------------------------------------------------

--
-- Table structure for table `booktocart`
--

CREATE TABLE `booktocart` (
  `booktocart_id` int(11) NOT NULL,
  `fk_customer_id` int(11) NOT NULL,
  `fk_sells_id` int(11) NOT NULL,
  `in_buys` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktocart`
--

INSERT INTO `booktocart` (`booktocart_id`, `fk_customer_id`, `fk_sells_id`, `in_buys`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(10, 1, 1, 0);

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

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Fiction'),
(2, 'Thriller'),
(3, 'Classic'),
(4, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `hasgenre`
--

CREATE TABLE `hasgenre` (
  `fk_book_id` int(11) DEFAULT NULL,
  `fk_genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasgenre`
--

INSERT INTO `hasgenre` (`fk_book_id`, `fk_genre_id`) VALUES
(15, 2),
(16, 4),
(14, 3),
(12, 4),
(15, 1);

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
(1, 'admins', 'admins', 'admins@gmail.com', 'admin seller', NULL, NULL),
(4, 'seller11', 'seller11', 'seller11@gmail.com', 'seller 11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `sells_id` int(11) NOT NULL,
  `fk_seller_id` int(11) DEFAULT NULL,
  `fk_book_id` int(11) DEFAULT NULL,
  `avail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`sells_id`, `fk_seller_id`, `fk_book_id`, `avail`) VALUES
(1, 1, 15, 8),
(2, 4, 13, 2),
(3, 1, 17, 6);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `booktocart`
--
ALTER TABLE `booktocart`
  MODIFY `booktocart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `buys`
--
ALTER TABLE `buys`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `returned`
--
ALTER TABLE `returned`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `sells_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
