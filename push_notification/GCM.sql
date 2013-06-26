-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2012 at 01:03 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gcm`
--
CREATE DATABASE `gcm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gcm`;

-- --------------------------------------------------------

--
-- Table structure for table `gcm_users`
--

CREATE TABLE IF NOT EXISTS `gcm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gcm_regid` text,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`id`, `gcm_regid`, `name`, `email`, `created_at`) VALUES
(1, 'APA91bFDdz18uUUQ4BBmZbJ4Vpc48Xbt2-cXTy1InGYOtmOnklc5rqHEYyFi7gfb9rjGFO3NUTpLVm5XoYwFzz7oInJm_YC1JqSuZ73lLPJXFT97GJlYt_LzSMud8n8_zu-Zw8MBrhNv76HOz9NR70igx6OJxNJzfwmy0ap271J3IQTL1-BxtRQ', 'Shailesh Satariya', 'shailesh.satariya@gmail.com', '2012-11-26 16:04:11'),
(2, 'APA91bFDdz18uUUQ4BBmZbJ4Vpc48Xbt2-cXTy1InGYOtmOnklc5rqHEYyFi7gfb9rjGFO3NUTpLVm5XoYwFzz7oInJm_YC1JqSuZ73lLPJXFT97GJlYt_LzSMud8n8_zu-Zw8MBrhNv76HOz9NR70igx6OJxNJzfwmy0ap271J3IQTL1-BxtRQ', 'null', 'null', '2012-12-02 18:23:39'),
(3, 'APA91bF6jBBgVIQX5Z22GqC6A6B_KNCO9Wvu3U2WZfxw_1PFtHXI60PeJ65tLtb0PTZ4XOpRHm8LkpnD0AS2BKh5OQfj6grf3Mgqn5JzklVwYOUreSxxtCh0MRjZLKkzykRGLIUrRhfJxK7B6tgdwcN0bwZZ14bmHXGOzIrqBoqz30KnasmAIzs', 'null', 'null', '2012-12-02 18:28:44'),
(4, 'APA91bF6jBBgVIQX5Z22GqC6A6B_KNCO9Wvu3U2WZfxw_1PFtHXI60PeJ65tLtb0PTZ4XOpRHm8LkpnD0AS2BKh5OQfj6grf3Mgqn5JzklVwYOUreSxxtCh0MRjZLKkzykRGLIUrRhfJxK7B6tgdwcN0bwZZ14bmHXGOzIrqBoqz30KnasmAIzs', 'null', 'null', '2012-12-10 17:16:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
