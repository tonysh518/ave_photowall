-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2014 at 06:56 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `avene_photowall`
--

-- --------------------------------------------------------

--
-- Table structure for table `Photo`
--

CREATE TABLE `Photo` (
  `pid` int(16) NOT NULL AUTO_INCREMENT COMMENT 'photo id',
  `image` varchar(255) NOT NULL COMMENT 'image url',
  `screen_name` varchar(255) NOT NULL COMMENT 'weibo screen name',
  `sns_uid` int(30) NOT NULL COMMENT 'weibo uid',
  `avatar` varchar(255) NOT NULL COMMENT 'weibo avatar url',
  `content` text NOT NULL COMMENT 'content',
  `datetime` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `uid` int(11) NOT NULL COMMENT 'user id',
  `username` varchar(255) NOT NULL COMMENT 'user name',
  `password` varchar(255) NOT NULL COMMENT 'password',
  `salt` varchar(30) NOT NULL COMMENT 'salt',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
