-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2020 at 06:13 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `BookId` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(64) NOT NULL,
  `GenreId` int(11) NOT NULL,
  `TotalPages` int(11) NOT NULL,
  PRIMARY KEY (`BookId`),
  KEY `GenreId` (`GenreId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookId`, `Title`, `GenreId`, `TotalPages`) VALUES
(1, 'Treasure Island', 1, 304),
(2, 'Long Walk To Freedom', 2, 630),
(3, 'To Kill A Mockingbird', 3, 281),
(4, 'You Suck At Cooking', 4, 224),
(5, 'Helter Skelter', 5, 502),
(6, 'The Lord of the Rings', 6, 1178),
(7, 'The Hound of the Baskervilles', 7, 150),
(8, 'Animal Farm', 8, 112),
(9, 'Gone Girl', 9, 422),
(10, 'The Giver', 10, 192);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `GenreId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  PRIMARY KEY (`GenreId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`GenreId`, `Name`) VALUES
(1, 'Action-Adventure'),
(2, 'Autobiography'),
(3, 'Classic'),
(4, 'Cookbook'),
(5, 'Crime'),
(6, 'Fantasy'),
(7, 'Mystery'),
(8, 'Satire'),
(9, 'Thriller'),
(10, 'Young Adult');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `security` varchar(16) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `security`) VALUES
(1, 'admin', 'admin', 'administrator'),
(2, 'member', 'member', 'member'),
(3, 'guest', 'guest', 'guest');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
