-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2013 at 08:28 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `push_notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `password`, `display_name`) VALUES
(1, 'Shailesh', 'Satariya', 'shailesh.satariya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Shailesh Satariya'),
(2, 'Chetan', 'Vashist', 'chetan.v27512@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Chetan Vahsist'),
(3, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '');

-- --------------------------------------------------------

--
-- Table structure for table `client_outbox`
--

CREATE TABLE IF NOT EXISTS `client_outbox` (
  `message_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_outbox`
--

INSERT INTO `client_outbox` (`message_id`, `client_id`) VALUES
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`id`, `gcm_regid`, `name`, `email`, `created_at`) VALUES
(1, 'APA91bEch2pNWXUHBlt6ovWyhCAs_XBIcL1dXSZ2KBpVge_CZfhRFxjU7Xc-dcQlF-OHL1Sjlqc-yZEy18IVtLOrkL3udCquENOaWkttL-Z46HDw97WJuAYTIfLZnSq3rFW3hz_tzW9MgEE3LWozVi1a45gx_R4UNNfMcbh_Ya4Lw7Zt3L7W3B0', 'Pratik Gadhiya', 'tiktik82@gmail.com', '2012-12-15 14:29:07'),
(2, 'APA91bFThh9rLetV8qAKXjmD8ij-Ct0IMHFy2tamHXu3NDK5SuwG6IITzZUCV6P5L2g3cURJ6IyaXoN2yYIQ1uS1iZkkvVWqYjtUo0dY64hNvGwR1rq4BrX7OFk5zHocgY6_8KQ6hdLv0cbaWXRAZvdt-lAxwguTUHEnLGUD7qcJsocD9kIKszs', 'Chetan Vashist (Mobile)', 'alloy.ymca@gmail.com', '2012-12-15 14:29:07'),
(3, 'APA91bF6jBBgVIQX5Z22GqC6A6B_KNCO9Wvu3U2WZfxw_1PFtHXI60PeJ65tLtb0PTZ4XOpRHm8LkpnD0AS2BKh5OQfj6grf3Mgqn5JzklVwYOUreSxxtCh0MRjZLKkzykRGLIUrRhfJxK7B6tgdwcN0bwZZ14bmHXGOzIrqBoqz30KnasmAIzs', 'Shailesh', 'shailesh.satariya@gmail.combination ', '2012-12-25 15:50:59'),
(4, 'APA91bGra6t78wFk6GbbEljOvIWfc4zdHmjZJZoLgil89bvYYfCbBTcjC7ueuaPsxU0flolXE2bV0BMTsc7N5wr1mtB7ovWB-6He7K-rc_1QhcA6cqZ03xbjv7FPZ29T9aR6LOoh5c2BXqHap1AnhDy4KEiMxn4eoQ', 'Shailesh Satariya', 'shailesh.satariya@gmail ', '2012-12-28 19:19:24'),
(5, 'APA91bGra6t78wFk6GbbEljOvIWfc4zdHmjZJZoLgil89bvYYfCbBTcjC7ueuaPsxU0flolXE2bV0BMTsc7N5wr1mtB7ovWB-6He7K-rc_1QhcA6cqZ03xbjv7FPZ29T9aR6LOoh5c2BXqHap1AnhDy4KEiMxn4eoQ', 'shailesh', 'shailesh.satariya@gmail ', '2013-01-01 15:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `message`, `date`) VALUES
(1, 'Test message', 'This is test message. Do not respond.', '0000-00-00 00:00:00'),
(7, 'sss', 'ssssss', '0000-00-00 00:00:00'),
(8, 'sss', 'ssssss', '0000-00-00 00:00:00'),
(9, 'Hiii', 'Hiiiiii', '0000-00-00 00:00:00'),
(10, 'Hiii', 'Hiiiiii', '0000-00-00 00:00:00'),
(11, 'Test Subject', 'Test Message', '0000-00-00 00:00:00'),
(12, 'Test Subject2', 'Test Message 2', '2012-12-24 00:00:00'),
(13, 'Test Subject 3', 'Hiii', '2012-12-24 17:29:49'),
(14, 'Test Subject', 'Test Message', '2012-12-25 16:59:41'),
(15, 'Test Subject 3', 'Hiii This is a test message', '2012-12-25 17:02:24'),
(16, 'Test Subject2', 'nl.n.kn-.m-lm-Ã¶ml,. -', '2012-12-25 17:03:59'),
(17, 'New Message', 'Hiii', '2012-12-25 17:04:22'),
(18, 'Test Subject', 'Test SubjectTest Subject', '2012-12-25 17:05:20'),
(19, 'HIiii', 'hiiiiiii', '2012-12-25 17:12:12'),
(20, 'Test Subject 3', 'Test Subject 3Test Subject 3Test Subject 3Test Subject 3Test Subject 3', '2012-12-25 17:23:57'),
(21, 'Test Subject', 'Test tesstttts', '2012-12-25 18:03:35'),
(22, 'Test Subject', 'Test Subject', '2012-12-25 18:04:57'),
(23, 'Test Subject', 'Test Subject', '2012-12-25 18:07:52'),
(24, 'Test Subject', 'Test Subject', '2012-12-25 18:08:03'),
(25, 'dddd', 'dddd', '2012-12-25 18:19:59'),
(26, 'dddd', 'dddd', '2012-12-25 18:20:42'),
(27, 'dddd', 'dddd', '2012-12-25 18:49:41'),
(28, 'dddd', 'dddd', '2012-12-25 18:49:57'),
(29, 'dddd', 'dddd', '2012-12-25 18:50:58'),
(30, 'dddd', 'dddd', '2012-12-25 19:17:51'),
(31, 'dddd', 'dddd', '2012-12-25 19:19:46'),
(32, 'dddd', 'dddd', '2012-12-25 19:21:46'),
(33, 'dddd', 'dddd', '2012-12-25 19:32:05'),
(34, 'dddd', 'dddd', '2012-12-25 19:32:34'),
(35, 'dddd', 'dddd', '2012-12-25 19:33:25'),
(36, 'dddd', 'dddd', '2012-12-25 19:33:47'),
(37, 'dddd', 'dddd', '2012-12-25 19:35:40'),
(38, 'dddd', 'dddd', '2012-12-25 19:35:58'),
(39, 'dddd', 'dddd', '2012-12-25 19:36:43'),
(40, 'dddd', 'dddd', '2012-12-25 20:05:06'),
(41, 'dddd', 'dddd', '2012-12-25 20:05:50'),
(42, 'Test Subject', 'Test Subject', '2012-12-28 20:22:37'),
(43, 'Subject 2', 'Message 2', '2012-12-29 19:47:25'),
(44, 'Test Subject 3', 'Message 3', '2012-12-29 21:02:25'),
(45, 'Test Subject 4', 'Message 4', '2012-12-29 21:10:35'),
(46, 'Test Subject 5', 'Test Subject 5', '2012-12-29 21:13:14'),
(47, 'Test Subject 6', 'Test Subject 6', '2012-12-29 21:13:37'),
(48, 'Test Subject 7', 'Test Subject 7', '2012-12-29 21:15:07'),
(49, 'Test Subject 7', 'Test Subject 7', '2012-12-29 21:30:43'),
(50, 'Test Subject 8', 'Test Subject 8', '2012-12-29 21:31:04'),
(51, 'Test Subject 9', 'Test Subject 9', '2012-12-29 22:53:26'),
(52, 'Test Subject 10', 'Test Subject 10', '2012-12-29 23:31:40'),
(53, 'Test Subject 11', 'Test Subject 11', '2012-12-29 23:44:55'),
(54, 'Test Subject 13', '', '2012-12-29 23:45:42'),
(55, 'Test Subject 14', 'Test Subject 14', '2012-12-29 23:46:31'),
(56, 'Test Subject 15', 'Test Subject 15', '2012-12-29 23:47:32'),
(57, 'Test Subject 16', 'Test Subject 16', '2012-12-29 23:53:50'),
(58, 'Test Subject 16.5', 'Test Subject 17', '2012-12-30 00:05:04'),
(59, 'Test Subject 17', 'Test Subject 17', '2012-12-30 00:18:33'),
(60, 'Test Subject 18', 'Test Subject 18', '2012-12-30 15:21:39'),
(61, 'Test Subject 19', 'Test Subject 19\r\n', '2012-12-30 15:41:54'),
(62, 'Test Subject 20', 'Test Subject 20', '2012-12-30 21:20:43'),
(63, 'Test Subject 21', 'Test Subject 21', '2012-12-30 22:32:37'),
(64, 'Test Subject 21', 'Test Subject 21', '2012-12-30 22:40:31'),
(65, 'Test Subject 22', 'Test Subject 22', '2012-12-30 23:45:17'),
(66, 'Test Subject 23', 'Test Subject 23', '2012-12-31 17:51:04'),
(67, 'Test Subject 24', 'Test Subject 24', '2012-12-31 19:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `name`, `email`) VALUES
(3, 'Pratik Gadhiya', 'tiktik82@gmail.com'),
(4, 'Chetan Vashist (Mobile)', 'alloy.ymca@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_inbox`
--

CREATE TABLE IF NOT EXISTS `user_inbox` (
  `message_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_inbox`
--

INSERT INTO `user_inbox` (`message_id`, `user_id`) VALUES
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 2),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 4),
(60, 4),
(61, 4),
(62, 4),
(63, 4),
(64, 4),
(65, 4),
(66, 4),
(67, 4),
(68, 4),
(69, 4),
(70, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
