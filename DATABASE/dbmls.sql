-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2020 at 07:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmls`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_name` varchar(23) NOT NULL,
  `Pwd` varchar(23) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`sno`, `Admin_name`, `Pwd`) VALUES
(1, 'Rohit', 'rohit'),
(2, 'Sagar', 'sagar'),
(3, 'Sajan', 'sajan');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `al_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(30) NOT NULL,
  `Year` year(4) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `cover` varchar(100) NOT NULL,
  PRIMARY KEY (`al_id`),
  UNIQUE KEY `album_title` (`album_title`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`al_id`, `album_title`, `Year`, `artist_id`, `cover`) VALUES
(20, 'Divide', 2017, 13, '../Cover/divide.jpeg'),
(21, 'Live Fast', 2019, 14, '../Cover/livefast.jpg'),
(23, 'Jab Tak Hai Jaan', 2012, 15, '../Cover/Jab Tak Hai Jaan.jpg'),
(24, 'Padmavat', 2018, 16, '../Cover/Padmavat.jpg'),
(25, 'Ram Leela', 2013, 15, '../Cover/Ram Leela.jpg'),
(26, 'Kishore ki Yaadein', 1980, 17, '../Cover/Kishore ki Yaadein.jpg'),
(27, 'Best of Neeti Mohan', 2015, 18, '../Cover/Best of Neeti Mohan.jpg'),
(28, 'Biebs and Chill', 2020, 19, '../Cover/Biebs and Chill.jpg'),
(29, 'Changes', 2020, 19, '../Cover/Changes.jpg'),
(30, 'Different World', 2018, 14, '../Cover/Different World.jpg'),
(31, 'Live at the Bedford', 2011, 13, '../Cover/Live at the Bedford.jpg'),
(32, 'Devdas', 2002, 16, '../Cover/Devdas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `artist_name` (`artist_name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `artist_name`) VALUES
(14, 'Alan Walker'),
(15, 'Arijit Singh'),
(13, 'Ed Sheeran'),
(19, 'Justin Bieber'),
(17, 'Kishore Kumar'),
(18, 'Neeti Mohan'),
(16, 'Shreya Goshal');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `Fname` varchar(23) NOT NULL,
  `Lname` varchar(23) NOT NULL,
  `Email` varchar(23) NOT NULL,
  `Pwd` varchar(23) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`sno`, `username`, `Fname`, `Lname`, `Email`, `Pwd`, `dt`) VALUES
(1, 'dummy', 'dum', 'my', 'dummy@gmail.com', 'dummy', '2020-11-27 20:56:43'),
(10, 'Sajan19', 'SAJAN', 'VISHWAKARMA', 'sajan@gmail.com', 'sajan', '2020-11-27 22:00:02'),
(11, 'sajan_19', 'sajan', 'vishwakarma', 'sajan@gmail', 'sajan', '2020-11-28 10:45:48'),
(12, 'itsrdb', 'ROHIT', 'BORKAR', 'rohit@gmail.com', 'rohit', '2020-11-28 18:10:23'),
(13, 'sajan', 'sajan', 'vish', 'sajan@gmail.com', 'sajan', '2020-12-02 10:23:07'),
(14, 'Sajan19_', 'sajan', 'vishwakarma', 'sajan@gmail.com', 'sajan', '2020-12-02 13:06:18'),
(36, 'saj', 'sajan', 'vishwa', 'sajan@gmail', 'sajan', '2020-12-03 10:41:42'),
(37, 'sjan', 'sajan', 'vishwa', 'sajan@gmail', 'sajan', '2020-12-03 10:41:42'),
(38, 'sjahenn', 'sajan', 'vishwa', 'sajan@gmail', 'sajan', '2020-12-03 10:41:42'),
(39, 'rajns', 'sajan', 'vihenwa', 'sajan@gmail', 'sajan', '2020-12-03 10:41:42'),
(40, 'ssdfan', 'paul', 'hen', 'sajan@gmail', 'sajan', '2020-12-03 10:41:42'),
(41, 'rajhenns', 'spauln', 'henry', 'sajan@gmail', 'sajan', '2020-12-03 10:41:42'),
(42, 'sspaulan', 'spaul', 'henry', 'sajan@gmail', 'sajan', '2020-12-03 10:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cno` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(23) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `Email` varchar(23) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cno`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cno`, `user`, `comment`, `Email`, `date`) VALUES
(52, 'sajan', '', 'sajan@gmail.com', '2020-12-11 16:39:11'),
(53, 'sajan', '', 'sajan@gmail.com', '2020-12-11 16:39:41'),
(54, 'sajan', 'this is a check comment', 'sajan@gmail.com', '2020-12-11 16:40:42'),
(55, 'sajan', 'this is a check comment', 'sajan@gmail.com', '2020-12-11 16:40:47'),
(56, 'sajan', 'another', 'sajan@gmail.com', '2020-12-11 16:44:59'),
(57, 'sajan', 'trying', 'sajan@gmail.com', '2020-12-11 16:47:39'),
(58, 'sajan', 'try', 'sajan@gmail.com', '2020-12-11 16:48:19'),
(59, 'sajan', 'try', 'sajan@gmail.com', '2020-12-11 16:49:36'),
(60, 'sajan', 'sajan', 'sajan@gmail.com', '2020-12-11 16:50:56'),
(61, 'sajan', 'sajan', 'sajan@gmail.com', '2020-12-11 16:51:58'),
(62, 'sajan', '123', 'sajan@gmail.com', '2020-12-11 16:52:31'),
(63, 'sajan', 'asdio', 'sajan@gmail.com', '2020-12-11 16:55:57'),
(64, 'sajan', 'asdio', 'sajan@gmail.com', '2020-12-11 16:56:28'),
(65, 'sajan', 'asdio', 'sajan@gmail.com', '2020-12-11 16:56:32'),
(66, 'sajan', 'asdio', 'sajan@gmail.com', '2020-12-11 16:56:59'),
(67, 'sajan', 'asdio', 'sajan@gmail.com', '2020-12-11 16:57:15'),
(68, 'sajan', 'hel', 'sajan@gmail.com', '2020-12-11 17:00:13'),
(69, 'sajan', 'meiia', 'sajan@gmail.com', '2020-12-11 17:01:04'),
(70, 'sajan', 'this is final coment', 'sajan@gmail.com', '2020-12-11 17:01:34'),
(71, 'sajan', 'thisis working i guess', 'sajan@gmail.com', '2020-12-11 17:13:58'),
(72, 'sajan', 'this is comment from categories\r\n', 'sajan@gmail.com', '2020-12-11 22:44:13'),
(73, 'sajan', 'when bg is changed', 'sajan@gmail.com', '2020-12-11 22:48:04'),
(74, 'itsrdb', 'comment from top20\r\n', 'rohit@gmail.com', '2020-12-13 00:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

DROP TABLE IF EXISTS `favourite`;
CREATE TABLE IF NOT EXISTS `favourite` (
  `userid` int(11) NOT NULL,
  `songid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`songid`),
  KEY `songid` (`songid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`userid`, `songid`) VALUES
(12, 19),
(12, 25),
(13, 33);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `genre_type` varchar(23) NOT NULL,
  PRIMARY KEY (`gid`),
  UNIQUE KEY `genre_type` (`genre_type`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`gid`, `genre_type`) VALUES
(78, 'ASP Rocky'),
(76, 'Classical'),
(80, 'Dance'),
(77, 'Drama'),
(81, 'Gajal'),
(75, 'Metal'),
(74, 'Rock'),
(79, 'Romantic');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
CREATE TABLE IF NOT EXISTS `track` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `songname` varchar(30) NOT NULL,
  `Release_date` date NOT NULL,
  `album_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `audiopath` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `album_id` (`album_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`sid`, `songname`, `Release_date`, `album_id`, `genre_id`, `likes`, `audiopath`) VALUES
(18, 'Saans', '2012-12-01', 23, 79, 0, '../mp3/Saans.mp3'),
(19, 'Heer', '2012-12-02', 23, 79, 2, '../mp3/Heer.mp3'),
(20, 'Ek Dil Ek Jaan', '2018-08-11', 24, 79, 1, '../mp3/Ek Dil Ek Jaan.mp3'),
(21, 'Khalibali', '2018-10-01', 24, 80, 1, '../mp3/Khalibali.mp3'),
(22, 'Laal Ishq', '2013-10-01', 25, 79, 0, '../mp3/Laal Ishq.mp3'),
(23, 'Nagada Sang Dhol', '2013-05-05', 25, 80, 0, '../mp3/Nagada Sang Dhol.mp3'),
(24, 'O Sathi Re', '1980-02-05', 26, 79, 0, '../mp3/O Sathi Re.mp3'),
(25, 'Ek Chatur Naar', '1985-06-12', 26, 77, 4, '../mp3/Ek Chatur Naar.mp3'),
(26, 'Nachi Nachi', '2020-02-03', 27, 78, 1, '../mp3/Nachi Nachi.mp3'),
(27, 'Bad Boy', '2019-09-01', 27, 80, 0, '../mp3/Bad Boy.mp3'),
(28, 'E.T.A', '2020-03-12', 28, 77, 0, '../mp3/E.T.A.mp3'),
(29, 'Confirmation', '2020-02-01', 28, 75, 0, '../mp3/Confirmation.mp3'),
(32, 'Lost Control', '2018-07-01', 30, 77, 1, '../mp3/Lost Control.mp3'),
(33, 'Lily', '2018-08-05', 30, 74, 0, '../mp3/Lily.mp3'),
(34, 'Homeless', '2011-10-15', 31, 78, 1, '../mp3/Homeless.mp3'),
(35, 'This City', '2011-09-10', 31, 75, 1, '../mp3/This City.mp3'),
(36, 'Dola Re Dola', '2002-05-20', 32, 77, 0, '../mp3/Dola Re Dola.mp3'),
(37, 'Baire Piya', '2020-02-01', 32, 79, 0, '../mp3/Baire Piya.mp3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `Album_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `Favourite_ibfk_1` FOREIGN KEY (`songid`) REFERENCES `track` (`sid`);

--
-- Constraints for table `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `Track_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`al_id`),
  ADD CONSTRAINT `Track_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`gid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
