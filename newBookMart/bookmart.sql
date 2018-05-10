-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 09:36 AM
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
(17, 'Neverwhere', 450, 'Neil Gaiman', 'Neverwhere is the companion novelisation written by English author Neil Gaiman of the television serial Neverwhere, by Gaiman and Lenny Henry. The plot and characters are exactly the same as in the series, with the exception that the novel form allowed Gaiman to expand and elaborate on certain elements of the story and restore changes made in the televised version from his original plans.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4722/9781472234353.jpg', 540),
(25, ' Charlotte\'s Web ', 250, 'E.B White', 'This is a lovely novel that all age groups can understand. Aimed at native English speaking children, there are many adults who still say this famous book is their favorite. This is part of the national curriculum in many schools around the world, so it’s quite possible this book will also come up in conversation. You can almost guarantee that the majority of native English speakers have read this book at least once.', 'https://www.fluentu.com/blog/english/wp-content/uploads/sites/4/2014/08/easy-simple-english-books-read-beginners-202x300.jpg', 250),
(26, 'Mieko and the Fifth Treasure  ', 300, 'Eleanor Coerr', 'This book is not really so famous, but it is on the recommended book list. What’s great about “Mieko and the Fifth Treasure” is that it’s short. At only 77 pages long, this will be an easy read. Again this book is aimed at young native English speakers, so if you’re learning English, the level won’t be so difficult. This book will keep you interested as you’ll learn many interesting things about Japan and its culture.', 'https://www.fluentu.com/blog/english/wp-content/uploads/sites/4/2014/08/easy-simple-english-books-read-beginners-1.jpg', 350),
(27, '  The Outsiders', 400, ' S.E. Hinton', 'This short novel is perfect for EFL learners. It has modern themes and typical teenage issues that people around the world have experienced. There are very few cultural notes in this, which means you don’t need much background information. The sentences are short and easy to understand. The vocabulary is also very easy. You should be able to read this book without difficulty.', 'https://www.fluentu.com/blog/english/wp-content/uploads/sites/4/2014/08/easy-simple-english-books-read-beginners-2.jpg', 200),
(28, ' The House On Mango Street', 500, 'Sandra Cisneros', 'The great thing about “The House On Mango Street” is that it’s an interesting read. It’s written from the point of view of the writer. You can really feel what the protagonist (the main character) feels. The sentences are really short so it’s also easy to understand. ', 'https://www.fluentu.com/blog/english/wp-content/uploads/sites/4/2014/08/easy-simple-english-books-read-beginners-3.jpg', 220),
(29, '  Thirteen Reasons Why', 450, ' Jay Asher', 'This story takes place in the present, which means the writer writes using simple grammar. All sentences are short and the vocabulary is relatively easy. The interesting grammar and short paragraphs make this a quick and easy book for ESL learners. This is an award-winning book and on the NY Times best books list, so it’s worth a read. ', 'https://www.fluentu.com/blog/english/wp-content/uploads/sites/4/2014/08/easy-simple-english-books-read-beginners-4-200x300.jpg', 350),
(30, 'Peter Pan ', 350, 'J.M. Barrie', 'Almost everyone knows the story of “Peter Pan” which is why this is an easy read. Being familiar with a story already helps the reader to understand the text better. This book is aimed at children, but it continues to be enjoyed by adults around the world too.\r\n\r\n', 'https://www.fluentu.com/blog/english/wp-content/uploads/sites/4/2014/08/easy-simple-english-books-read-beginners-5-200x300.jpg', 250);

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
(20, 1, 3, 1),
(21, 1, 10, 1);

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

--
-- Dumping data for table `buys`
--

INSERT INTO `buys` (`buy_id`, `fk_booktocart_id`, `buy_price`, `day`, `delivery`, `buy_rating`) VALUES
(27, 20, 450, '2018-05-10', 0, NULL),
(28, 21, 300, '2018-05-10', 0, NULL);

--
-- Triggers `buys`
--
DELIMITER $$
CREATE TRIGGER `default_date` BEFORE INSERT ON `buys` FOR EACH ROW if ( isnull(new.day) ) then
 set new.day=curdate();
end if
$$
DELIMITER ;

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
  `address` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `email`, `customer_fullname`, `address`, `points`) VALUES
(1, 'adminc', 'adminc', 'admin@gmail.com', 'admin customer', 'Olive Heights, Andheri, Mumbai-400057', NULL),
(2, 'buyer2', 'buyer2', 'buyer2@gmail.com', 'nikita', 'room no 59 chl no 7 ganesh soc mhada phase 2', 50),
(3, 'buyer3', 'buyer3', 'buyer3@gamil.com', 'purva ', '34/8 om shanti soc bhayander', 90),
(4, 'buyer4', 'buyer4', 'buyer4@gmail.com', 'harshali tare', '45/9 b wing ramdeo park , Miraroad', 100),
(5, 'buyer5', 'buyer5', 'buyer5@gmail.com', 'vedant tare', '56/9 c wing gitanjali, andheri(E)', 20),
(6, 'buyer6', 'buyer6', 'buyer6@gmail.com', 'kinnary raut', 'room no 56 buid no 9 geeta hsg soc, malad', 76),
(7, 'buyer7', 'buyer7', 'buyer7@gmail.com', 'vaidehin pinto', '45/8 sham sadan, near khau galli , kalyan', 89),
(8, 'buyer8', 'buyer8', 'buyer8@gmail.com', 'monish gavali', 'room no 67 ghanshyam hsg soc, dahisar', 30),
(9, 'buyer9', 'buyer9', 'buyer9@gmail.com', 'pandurang pawar', '45/7, gulmohor hsg soc, mulund', 78),
(10, 'buyer10', 'buyer10', 'buyer10@gmail.com', 'balu naik', '46/9,gandhi nagar soc, thane', 67),
(11, 'buyer11', 'buyer11', 'buyer11@gmail.com', 'prakash borse', '34/8, gokul village, virar', 56),
(12, 'buyer12', 'buyer12', 'buyer12@gmail.com', 'arun prajapti', '34/7, malvani, mulund', 34),
(13, 'buyer13', 'buyer13', 'buyer13@gmail.com', 'piyush khan', '45/7, mehek soc, grant road', 23),
(14, 'buyer14', 'buyer14', 'buyer14@gmail.com', 'damodar shastri', '56, ganesh hsg rows, shanti park, kurla', NULL),
(15, 'buyer15', 'buyer15', 'buyer15@gmail.com', 'vishakha dole', 'prem niwas, bolinj, virar', 23);

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
(4, 'Novel'),
(5, 'science fiction'),
(6, 'poetry'),
(7, 'mystry'),
(8, 'fantacy'),
(9, 'biography'),
(10, 'comic');

-- --------------------------------------------------------

--
-- Table structure for table `hasgenre`
--

CREATE TABLE `hasgenre` (
  `hasgenre_id` int(11) NOT NULL,
  `fk_book_id` int(11) DEFAULT NULL,
  `fk_genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasgenre`
--

INSERT INTO `hasgenre` (`hasgenre_id`, `fk_book_id`, `fk_genre_id`) VALUES
(1, 15, 2),
(2, 16, 4),
(3, 14, 3),
(4, 12, 4),
(5, 15, 1),
(7, 13, 3),
(12, 17, 8),
(13, 25, 8),
(14, 26, 4),
(15, 29, 4),
(16, 27, 2),
(17, 28, 6),
(18, 27, 3),
(19, 30, 7);

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

--
-- Triggers `returned`
--
DELIMITER $$
CREATE TRIGGER `return_date` BEFORE INSERT ON `returned` FOR EACH ROW if ( isnull(new.day) ) then
 set new.day=curdate();
end if
$$
DELIMITER ;

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
  `address` varchar(255) DEFAULT NULL,
  `seller_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `username`, `password`, `email`, `seller_fullname`, `address`, `seller_rating`) VALUES
(1, 'admins', 'admins', 'admins@gmail.com', 'admin seller', 'Highway Shoppers, Andheri, Mumbai-400057', 4),
(2, 'seller1', 'seller1', 'seller1@gmail.com', 'shyamj mali', 'new hsg , wesstern marcket, borivali', 3),
(4, 'seller4', 'seller4', 'seller4@gmail.com', 'seller4', 'shop no 60, sadashiv peth, pune', 2),
(5, 'seller5', 'seller5', 'seller5@gamil.com', 'gangaram godse', 'shop no 10, ganpati mandir, pune', 5),
(6, 'seller6', 'seller6', 'seller6@gmail.com', 'sundarlal gupta', 'shop no 10, sadashiv peth, pune', 4),
(7, 'seller7', 'seller7', 'seller7@gamil.com', 'seller7', 'shop no 10, gujrat store, kolhapur', 4),
(8, 'seller8', 'seller8', 'seller8@gamil.com', 'seller8', 'shop no 34, saras baug, pune', 3),
(9, 'seller9', 'seller9', 'seller9@gamil.com', 'seller9', 'shop no 34,akshar store, mohan dham, churchgate', 3),
(10, 'seller10', 'seller10', 'seller10@gamil.com', 'seller10', 'shop no 34, surya shopping centre, dadar', 5),
(11, 'seller11', 'seller11', 'seller11@gamil.com', 'seller11', 'shop no 34, pushkar baug, ganmpati pule', 1);

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
(1, 1, 15, 10),
(2, 4, 13, 2),
(3, 1, 17, 5),
(4, 4, 16, 12),
(5, 5, 12, 2),
(6, 10, 14, 1),
(7, 5, 15, 3),
(8, 10, 16, 9),
(9, 4, 16, 3),
(10, 6, 26, 4),
(11, 10, 30, 10),
(12, 7, 28, 3),
(13, 7, 25, 3),
(14, 2, 29, 1),
(15, 8, 15, 2),
(16, 4, 28, 2),
(17, 11, 27, 8),
(18, 9, 27, 3),
(19, 6, 27, 12),
(20, 4, 29, 20),
(22, 8, 12, 10),
(23, 2, 26, 3),
(24, 4, 13, 5),
(25, 8, 30, 5),
(26, 1, 28, 4),
(27, 1, 14, 3),
(28, 7, 28, 7),
(29, 11, 30, 5),
(30, 7, 12, 5),
(31, 6, 12, 6);

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
  ADD PRIMARY KEY (`hasgenre_id`),
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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `booktocart`
--
ALTER TABLE `booktocart`
  MODIFY `booktocart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `buys`
--
ALTER TABLE `buys`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hasgenre`
--
ALTER TABLE `hasgenre`
  MODIFY `hasgenre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `returned`
--
ALTER TABLE `returned`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `sells_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
