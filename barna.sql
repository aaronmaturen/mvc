-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2011 at 07:23 AM
-- Server version: 5.1.47
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `barna`
--

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
		  `page_name` varchar(35) NOT NULL,
		  `about` mediumtext NOT NULL,
		  PRIMARY KEY (`page_name`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;

		--
-- Dumping data for table `site`
--

INSERT INTO `site` (`page_name`, `about`) VALUES
('about', 'This would be the about page');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
		  `username` varchar(15) NOT NULL,
		  `firstname` varchar(20) NOT NULL,
		  `lastname` varchar(20) NOT NULL,
		  `email` varchar(35) NOT NULL,
		  `password` char(32) NOT NULL,
		  `usertype` enum('user','admin','master') NOT NULL,
		  `disabled` tinyint(1) DEFAULT NULL,
		  PRIMARY KEY (`username`),
		  UNIQUE KEY `username` (`username`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;

		--
-- Dumping data for table `user`
--


