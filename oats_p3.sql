-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2009 at 12:03 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oats_p3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_det`
--

DROP TABLE IF EXISTS `admin_det`;
CREATE TABLE IF NOT EXISTS `admin_det` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_det`
--

INSERT INTO `admin_det` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'isbr');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `prog_id` int(11) NOT NULL,
  PRIMARY KEY (`batch_id`),
  UNIQUE KEY `name` (`name`,`prog_id`),
  UNIQUE KEY `name_2` (`name`,`prog_id`),
  UNIQUE KEY `name_3` (`name`,`prog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `batch`
--


-- --------------------------------------------------------

--
-- Table structure for table `faculty_det`
--

DROP TABLE IF EXISTS `faculty_det`;
CREATE TABLE IF NOT EXISTS `faculty_det` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `sect_ids` varchar(35) NOT NULL,
  PRIMARY KEY (`fac_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `faculty_det`
--


-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(26) NOT NULL,
  PRIMARY KEY (`prog_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`),
  UNIQUE KEY `name_3` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `program`
--


-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `sect_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5) NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY (`sect_id`),
  UNIQUE KEY `name` (`name`,`batch_id`),
  UNIQUE KEY `name_2` (`name`,`batch_id`),
  UNIQUE KEY `name_3` (`name`,`batch_id`),
  UNIQUE KEY `name_4` (`name`,`batch_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `section`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_det`
--

DROP TABLE IF EXISTS `student_det`;
CREATE TABLE IF NOT EXISTS `student_det` (
  `stud_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sect_id` varchar(8) NOT NULL,
  PRIMARY KEY (`stud_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`),
  UNIQUE KEY `email_3` (`email`),
  UNIQUE KEY `email_4` (`email`),
  UNIQUE KEY `email_5` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_det`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_qnr`
--

DROP TABLE IF EXISTS `tb_qnr`;
CREATE TABLE IF NOT EXISTS `tb_qnr` (
  `sno` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `trg_sect_ids` varchar(20) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL,
  `start_on` datetime NOT NULL,
  `end_on` datetime NOT NULL,
  `time_limit` int(11) NOT NULL,
  `response` int(6) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_qnr`
--

