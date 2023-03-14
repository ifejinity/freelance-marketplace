-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2022 at 01:02 PM
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
-- Database: `fmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

DROP TABLE IF EXISTS `apply`;
CREATE TABLE IF NOT EXISTS `apply` (
  `f_username` varchar(200) NOT NULL,
  `job_id` varchar(30) NOT NULL,
  `price` int(50) NOT NULL,
  `cover_letter` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `profile_sum` varchar(1000) DEFAULT NULL,
  `photo` varchar(2000) NOT NULL,
  `facebook` varchar(1000) NOT NULL,
  `gmail` varchar(1000) NOT NULL,
  `twitter` varchar(1000) NOT NULL,
  `linkedin` varchar(1000) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`username`, `password`, `Name`, `email`, `contact_no`, `address`, `gender`, `birthdate`, `company`, `profile_sum`, `photo`, `facebook`, `gmail`, `twitter`, `linkedin`) VALUES
('freelancer1', '102518', 'Jeffrey Lonzanida', 'mrlonzanida08@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'BSIT 4-2A', 'NA', 'profile/117377597_382656009382555_8295335342167482489_o.jpg', 'Jeff Buiza', 'mrlonzanida08@gmail.com', 'jeffrey_lonzanida', 'jeffreylonzanida'),
('Jeffrey', '102518', 'Jeffrey Lonzanida', 'mrlonzanida08@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'BSIT 4-2A', 'NA', 'profile/117377597_382656009382555_8295335342167482489_o.jpg', '', '', '', ''),
('Jeffrey08', '102518', 'Jeffrey Lonzanida', 'mrlonzanida08@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'BSIT 4-2A', 'NA', 'profile/117377597_382656009382555_8295335342167482489_o.jpg', '', '', '', ''),
('mslorica', '102518', 'Chermae Lorica', 'chermaelorica26@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'BSIS 4-2B', 'NA', 'profile/IMG_20200118_151336.jpg', 'rtytry', 'rtyrt', 'yrty', 'rtyr'),
('student2', '102518', 'Abdul malik', 'mrlonzanida08@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'BSIS 4-2B', 'NA', 'profile/PHOTO2.jpg', 'jhkhjk', 'hjkhjkhj', 'jhkhjkhjk', 'khjk');

-- --------------------------------------------------------

--
-- Table structure for table `e_social`
--

DROP TABLE IF EXISTS `e_social`;
CREATE TABLE IF NOT EXISTS `e_social` (
  `e_username` varchar(200) NOT NULL,
  `social_prof` varchar(200) NOT NULL,
  PRIMARY KEY (`e_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

DROP TABLE IF EXISTS `freelancer`;
CREATE TABLE IF NOT EXISTS `freelancer` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `prof_title` varchar(200) DEFAULT NULL,
  `profile_sum` varchar(1000) DEFAULT NULL,
  `education` varchar(200) DEFAULT NULL,
  `experience` varchar(200) DEFAULT NULL,
  `skills` varchar(200) DEFAULT NULL,
  `photo` varchar(2000) NOT NULL,
  `facebook` varchar(1000) NOT NULL,
  `gmail` varchar(1000) NOT NULL,
  `twitter` varchar(1000) NOT NULL,
  `linkedin` varchar(1000) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`username`, `password`, `name`, `email`, `contact_no`, `address`, `gender`, `birthdate`, `prof_title`, `profile_sum`, `education`, `experience`, `skills`, `photo`, `facebook`, `gmail`, `twitter`, `linkedin`) VALUES
('freelancer2', '102518', 'Jeffrey Buiza', 'mrlonzanida08@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'none', 'NA', 'College', 'N/a', 'FULL STACK', 'profile/117377597_382656009382555_8295335342167482489_o.jpg', 'Jeff Buiza', 'mrlonzanida08@gmail.com', 'jeffrey_lonzanida', 'jeffreylonzanida'),
('mrlonzanida', '102518', 'Jeffrey Lonzanida', 'mrlonzanida08@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'none', 'NA', 'College', 'N/a', 'Web  development', 'profile/117377597_382656009382555_8295335342167482489_o.jpg', 'Jeff Buiza', 'mrlonzanida08@gmail.com', 'jeffrey_lonzanida', 'jeffreylonzanida'),
('Renz08', '102518', 'Renz sagge', 'mrlonzanida08@gmail.com', '09306904474', 'Lwood st. Baranggay Dolores, Taytay, Rizal', 'male', '2001-01-08', 'none', 'NA', 'College', 'N/a', 'FULL STACK', 'profile/743972.png', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_skill`
--

DROP TABLE IF EXISTS `f_skill`;
CREATE TABLE IF NOT EXISTS `f_skill` (
  `f_username` varchar(200) NOT NULL,
  `skill` varchar(200) NOT NULL,
  PRIMARY KEY (`f_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_social`
--

DROP TABLE IF EXISTS `f_social`;
CREATE TABLE IF NOT EXISTS `f_social` (
  `f_username` varchar(200) NOT NULL,
  `social_prof` varchar(200) NOT NULL,
  PRIMARY KEY (`f_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_offer`
--

DROP TABLE IF EXISTS `job_offer`;
CREATE TABLE IF NOT EXISTS `job_offer` (
  `job_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `budget` int(11) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `special_skill` varchar(200) NOT NULL,
  `e_username` varchar(200) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  `deadline` varchar(50) NOT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `job_id` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_offer`
--

INSERT INTO `job_offer` (`job_id`, `title`, `type`, `description`, `budget`, `skills`, `special_skill`, `e_username`, `valid`, `timestamp`, `deadline`) VALUES
(1, 'Capstone system developer', 'Web Development', 'Creating IMS for Taytay, Rizal', 2500, 'Full stack Developer', 'Wamp Developer', 'mslorica', 1, '2022/10/18', '2022/12/03'),
(2, 'CAPSTONE SYSTEM DEVELOPER', 'SYSTEM DEVELOPER', 'WEB DEV', 2500, 'FULL STACK', 'WAMP DEVELOPER', 'Jeffrey08', 0, '2022/10/18', '2022/12/03'),
(3, 'capstone system developer', 'it', 'Creating IMS for Taytay, Rizal', 500, 'FULL STACK', 'wamp', 'Jeffrey', 0, '2022/10/18', '2022/12/03'),
(4, 'fdgfd', 'gfdgfdg', 'fdgfdg', 500000, 'fdgfdg', 'dfgfdg', 'mslorica', 1, '2022/10/25', '2022/12/03'),
(5, 'POLICE CLEARANCE SYSTEM', 'fsdfsdf', 'dfsdf', 6000, 'fdgfdg', 'fdgfdg', 'mslorica', 0, '2022/10/26', '2022/12/03'),
(6, 'DIGITAL ARTS', 'DIGITAL ARTS', 'ANIME', 6000, 'GRAPHICS', 'gfhfgh', 'student2', 0, '2022/10/27', '2022/12/03');

-- --------------------------------------------------------

--
-- Table structure for table `job_skill`
--

DROP TABLE IF EXISTS `job_skill`;
CREATE TABLE IF NOT EXISTS `job_skill` (
  `job_id` varchar(30) NOT NULL,
  `skill` varchar(200) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `userid` int(50) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `msg` longblob NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`userid`, `sender`, `receiver`, `msg`, `timestamp`) VALUES
(1, 'Renz08', 'mslorica', 0x63787678637664666467, '2022-10-26 12:13:19'),
(1, 'Renz08', 'mslorica', 0x6667646667646667, '2022-10-26 12:14:43'),
(3, 'Renz08', 'mrlonzanida', 0x6869, '2022-10-26 12:14:55'),
(5, 'mrlonzanida', 'mslorica', 0x6f79, '2022-10-26 12:15:22'),
(6, 'mslorica', 'mrlonzanida', 0x6869, '2022-10-26 12:15:45'),
(6, 'mslorica', 'mrlonzanida', 0x6869, '2022-10-26 12:15:51'),
(4, 'mrlonzanida', 'Renz08', 0x6869, '2022-10-26 12:16:37'),
(5, 'mrlonzanida', 'mslorica', 0x6f79, '2022-10-26 12:16:46'),
(6, 'mslorica', 'mrlonzanida', 0x504850205475746f7269616c2050485020484f4d452050485020496e74726f2050485020496e7374616c6c205048502053796e7461782050485020436f6d6d656e747320504850205661726961626c657320504850204563686f202f205072696e742050485020446174612054797065732050485020537472696e677320504850204e756d6265727320504850204d6174682050485020436f6e7374616e747320504850204f70657261746f7273205048502049662e2e2e456c73652e2e2e456c73656966205048502053776974636820504850204c6f6f7073205048502046756e6374696f6e73205048502041727261797320504850205375706572676c6f62616c7320504850205265674578202050485020466f726d732050485020466f726d2048616e646c696e672050485020466f726d2056616c69646174696f6e2050485020466f726d2052657175697265642050485020466f726d2055524c2f452d6d61696c2050485020466f726d20436f6d706c657465202050485020416476616e63656420504850204461746520616e642054696d652050485020496e636c756465205048502046696c652048616e646c696e67205048502046696c65204f70656e2f52656164205048502046696c65204372656174652f5772697465205048502046696c652055706c6f61642050485020436f6f6b696573205048502053657373696f6e73205048502046696c74657273205048502046696c7465727320416476616e636564205048502043616c6c6261636b2046756e6374696f6e7320504850204a534f4e2050485020457863657074696f6e732020504850204f4f50205048502057686174206973204f4f502050485020436c61737365732f4f626a656374732050485020436f6e7374727563746f72205048502044657374727563746f722050485020416363657373204d6f646966696572732050485020496e6865726974616e63652050485020436f6e7374616e74732050485020416273747261637420436c61737365732050485020496e746572666163657320504850205472616974732050485020537461746963204d6574686f647320504850205374617469632050726f7065727469657320504850204e616d6573706163657320504850204974657261626c657320204d7953514c204461746162617365204d7953514c204461746162617365204d7953514c20436f6e6e656374204d7953514c20437265617465204442204d7953514c20437265617465205461626c65204d7953514c20496e736572742044617461204d7953514c20476574204c617374204944204d7953514c20496e73657274204d756c7469706c65204d7953514c205072657061726564204d7953514c2053656c6563742044617461204d7953514c20576865, '2022-10-26 12:18:07'),
(6, 'mslorica', 'mrlonzanida', 0x6664, '2022-10-26 12:22:46'),
(6, 'mslorica', 'mrlonzanida', 0x6766676664, '2022-10-26 12:22:53'),
(6, 'mslorica', 'mrlonzanida', 0x6667, '2022-10-26 12:22:57'),
(6, 'mslorica', 'mrlonzanida', 0x6766, '2022-10-26 12:22:59'),
(6, 'mslorica', 'mrlonzanida', 0x6766, '2022-10-26 12:23:05'),
(6, 'mslorica', 'mrlonzanida', 0x67, '2022-10-26 12:23:07'),
(6, 'mslorica', 'mrlonzanida', 0x73616473616461, '2022-10-26 12:37:23'),
(6, 'mslorica', 'mrlonzanida', 0x46444844464748464748464748, '2022-10-26 12:40:40'),
(2, 'mslorica', 'Renz08', 0x6869, '2022-10-26 12:41:12'),
(1, 'Renz08', 'mslorica', 0x48454c4c4f, '2022-10-26 12:41:42'),
(6, 'mslorica', 'mrlonzanida', 0x4644474644, '2022-10-26 12:48:16'),
(6, 'mslorica', 'mrlonzanida', 0x4644474644, '2022-10-26 12:48:35'),
(6, 'mslorica', 'mrlonzanida', 0x4644474644, '2022-10-26 12:49:44'),
(6, 'mslorica', 'mrlonzanida', 0x4644474644, '2022-10-26 12:49:52'),
(6, 'mslorica', 'mrlonzanida', 0x4644474644, '2022-10-26 12:50:17'),
(6, 'mslorica', 'mrlonzanida', 0x6d6e6c6a, '2022-10-27 01:01:05'),
(6, 'mslorica', 'mrlonzanida', 0x6869, '2022-10-27 02:47:30'),
(2, 'mslorica', 'Renz08', 0x636768666768, '2022-10-27 03:10:38'),
(7, 'mslorica', 'Jeffrey', 0x62627667, '2022-10-27 03:27:01'),
(9, 'freelancer1', 'mrlonzanida', 0x686579, '2022-10-27 12:38:23'),
(11, 'freelancer2', 'student2', 0x4c4f445320, '2022-10-27 12:55:39'),
(12, 'student2', 'freelancer2', 0x6869, '2022-10-27 12:56:06'),
(11, 'freelancer2', 'student2', 0x504850205475746f7269616c2050485020484f4d452050485020496e74726f2050485020496e7374616c6c205048502053796e7461782050485020436f6d6d656e747320504850205661726961626c657320504850204563686f202f205072696e742050485020446174612054797065732050485020537472696e677320504850204e756d6265727320504850204d6174682050485020436f6e7374616e747320504850204f70657261746f7273205048502049662e2e2e456c73652e2e2e456c73656966205048502053776974636820504850204c6f6f7073205048502046756e6374696f6e73205048502041727261797320504850205375706572676c6f62616c7320504850205265674578202050485020466f726d732050485020466f726d2048616e646c696e672050485020466f726d2056616c69646174696f6e2050485020466f726d2052657175697265642050485020466f726d2055524c2f452d6d61696c2050485020466f726d20436f6d706c657465202050485020416476616e63656420504850204461746520616e642054696d652050485020496e636c756465205048502046696c652048616e646c696e67205048502046696c65204f70656e2f52656164205048502046696c65204372656174652f5772697465205048502046696c652055706c6f61642050485020436f6f6b696573205048502053657373696f6e73205048502046696c74657273205048502046696c7465727320416476616e636564205048502043616c6c6261636b2046756e6374696f6e7320504850204a534f4e2050485020457863657074696f6e732020504850204f4f50205048502057686174206973204f4f502050485020436c61737365732f4f626a656374732050485020436f6e7374727563746f72205048502044657374727563746f722050485020416363657373204d6f646966696572732050485020496e6865726974616e63652050485020436f6e7374616e74732050485020416273747261637420436c61737365732050485020496e746572666163657320504850205472616974732050485020537461746963204d6574686f647320504850205374617469632050726f7065727469657320504850204e616d6573706163657320504850204974657261626c657320204d7953514c204461746162617365204d7953514c204461746162617365204d7953514c20436f6e6e656374204d7953514c20437265617465204442204d7953514c20437265617465205461626c65204d7953514c20496e736572742044617461204d7953514c20476574204c617374204944204d7953514c20496e73657274204d756c7469706c65204d7953514c205072657061726564204d7953514c2053656c6563742044617461204d7953514c20576865, '2022-10-27 12:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `messengeruser`
--

DROP TABLE IF EXISTS `messengeruser`;
CREATE TABLE IF NOT EXISTS `messengeruser` (
  `userid` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `e_username` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messengeruser`
--

INSERT INTO `messengeruser` (`userid`, `username`, `e_username`) VALUES
(1, 'Renz08', 'mslorica'),
(2, 'mslorica', 'Renz08'),
(3, 'Renz08', 'mrlonzanida'),
(4, 'mrlonzanida', 'Renz08'),
(5, 'mrlonzanida', 'mslorica'),
(6, 'mslorica', 'mrlonzanida'),
(7, 'mslorica', 'Jeffrey'),
(8, 'Jeffrey', 'mslorica'),
(9, 'freelancer1', 'mrlonzanida'),
(10, 'mrlonzanida', 'freelancer1'),
(11, 'freelancer2', 'student2'),
(12, 'student2', 'freelancer2');

-- --------------------------------------------------------

--
-- Table structure for table `requestimages`
--

DROP TABLE IF EXISTS `requestimages`;
CREATE TABLE IF NOT EXISTS `requestimages` (
  `imgaeid` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `img` varchar(2000) NOT NULL,
  PRIMARY KEY (`imgaeid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestimages`
--

INSERT INTO `requestimages` (`imgaeid`, `username`, `title`, `img`) VALUES
(1, 'mslorica', 'fdgfd', 'poster sketch copy.jpg'),
(2, 'mslorica', 'fdgfd', 'hacker-activity1-1030x617.png'),
(3, 'mslorica', 'POLICE CLEARANCE SYSTEM', 'poster sketch copy.jpg'),
(4, 'mslorica', 'POLICE CLEARANCE SYSTEM', 'hacker-activity1-1030x617.png'),
(9, 'student2', 'DIGITAL ARTS', '117377597_382656009382555_8295335342167482489_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

DROP TABLE IF EXISTS `review_table`;
CREATE TABLE IF NOT EXISTS `review_table` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceid` int(50) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `serviceid`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(19, 3, 'mslorica', 3, 'sdsad', 1666753951),
(20, 3, 'mslorica', 2, 'ghg', 1666754101),
(21, 3, 'mslorica', 5, 'fdgfdg', 1666754234),
(22, 4, 'mslorica', 3, 'sddd', 1666754882),
(23, 3, 'mslorica', 3, 'sdddd', 1666755663),
(24, 6, 'mslorica', 3, 'JjJJANSDASHD', 1666756339),
(25, 3, 'mslorica', 5, 'sddtsdfsdfsd', 1666756420),
(26, 5, 'mslorica', 3, 'nice quality', 1666757889),
(27, 3, 'mslorica', 1, 'kkhvnviuv', 1666758174),
(28, 4, 'mslorica', 5, 'vcvtfxdetr', 1666758210),
(29, 4, 'mslorica', 5, 'vcvtfxdetr', 1666758381),
(30, 4, 'mslorica', 5, 'vcvtfxdetr', 1666759270),
(31, 4, 'mslorica', 5, 'vcvtfxdetr', 1666759273),
(32, 4, 'mslorica', 1, 'vcvtfxdetr', 1666759281),
(33, 3, 'mslorica', 1, 'dfsdfsdfsdf', 1666787803),
(34, 7, 'mslorica', 5, 'sdfsdtertert', 1666787821),
(35, 8, 'mslorica', 5, 'SADASDGFG', 1666788010),
(36, 8, 'mslorica', 2, 'SADASDGFGFDGDFGDFG', 1666788016),
(37, 3, 'mslorica', 1, 'fuck', 1666837249),
(38, 9, 'student2', 5, 'ggwp', 1666875520),
(39, 9, 'student2', 3, 'ggwp', 1666875529);

-- --------------------------------------------------------

--
-- Table structure for table `selected`
--

DROP TABLE IF EXISTS `selected`;
CREATE TABLE IF NOT EXISTS `selected` (
  `f_username` varchar(200) NOT NULL,
  `job_id` varchar(30) NOT NULL,
  `e_username` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected`
--

INSERT INTO `selected` (`f_username`, `job_id`, `e_username`, `price`, `valid`) VALUES
('mrlonzanida', '5', 'mslorica', 6000, 0),
('freelancer2', '6', 'student2', 6000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `serviceimages`
--

DROP TABLE IF EXISTS `serviceimages`;
CREATE TABLE IF NOT EXISTS `serviceimages` (
  `imageid` int(50) NOT NULL AUTO_INCREMENT,
  `img` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceimages`
--

INSERT INTO `serviceimages` (`imageid`, `img`, `title`, `username`) VALUES
(7, 'poster sketch copy.jpg', 'fdgd', 'mrlonzanida'),
(8, 'hacker-activity1-1030x617.png', 'fdgd', 'mrlonzanida'),
(12, '787756.png', 'fsdf', 'mrlonzanida'),
(11, '764864.png', 'fsdf', 'mrlonzanida'),
(13, '117377597_382656009382555_8295335342167482489_o.jpg', 'fsdf', 'mrlonzanida'),
(14, '764864.png', 'IMS FOR BARANAGAY', 'mrlonzanida'),
(15, '743972.png', 'DOCUMENTATION', 'mrlonzanida'),
(16, '117377597_382656009382555_8295335342167482489_o.jpg', 'DOCUMENTATION', 'mrlonzanida'),
(17, '743972.png', 'CAPSTONE', 'mrlonzanida'),
(18, '117377597_382656009382555_8295335342167482489_o.jpg', 'CAPSTONE', 'mrlonzanida'),
(19, 'poster sketch copy.jpg', 'SECURITY', 'mrlonzanida'),
(20, 'hacker-activity1-1030x617.png', 'POSTER', 'Renz08'),
(21, '743972.png', 'POLICE CLEEARANCE', 'mrlonzanida'),
(22, '744908.jpg', 'POLICE CLEEARANCE', 'mrlonzanida'),
(24, 'poster sketch copy.jpg', 'IMPORTANCE OF SECURITY', 'freelancer2'),
(25, 'hacker-activity1-1030x617.png', 'IMPORTANCE OF SECURITY', 'freelancer2');

-- --------------------------------------------------------

--
-- Table structure for table `servicelist`
--

DROP TABLE IF EXISTS `servicelist`;
CREATE TABLE IF NOT EXISTS `servicelist` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `img` varchar(2000) NOT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicelist`
--

INSERT INTO `servicelist` (`serviceid`, `username`, `category`, `title`, `price`, `description`, `date`, `img`) VALUES
(3, 'mrlonzanida', 'Digital Marketing', 'DOCUMENTATION', 2500, 'fdgfdg', '2022/10/26', 'uploads/117377597_382656009382555_8295335342167482489_o.jpg'),
(4, 'mrlonzanida', 'Programming', 'IMS FOR BARANAGAY', 2500, 'FEATURES', '2022/10/25', 'uploads/764864.png'),
(5, 'mrlonzanida', 'Digital Marketing', 'CAPSTONE', 2500, 'Creating IMS for Taytay, Rizal', '2022/10/26', 'uploads/117377597_382656009382555_8295335342167482489_o.jpg'),
(6, 'mrlonzanida', 'Design &amp; Graphics', 'SECURITY', 5000, 'Creating IMS for Taytay, Rizal', '2022/10/26', 'uploads/poster sketch copy.jpg'),
(7, 'Renz08', 'Design &amp; Graphics', 'POSTER', 1000, 'IMPORTANCE  OF SECURITY', '2022/10/26', 'uploads/hacker-activity1-1030x617.png'),
(8, 'mrlonzanida', 'Digital Marketing', 'POLICE CLEEARANCE', 139, 'FGHFGHFGHFGHF', '2022/10/26', 'uploads/744908.jpg'),
(9, 'freelancer2', 'Design &amp; Graphics', 'IMPORTANCE OF SECURITY', 2500, 'IMPORTANCE  OF SECURITY', '2022/10/27', 'uploads/hacker-activity1-1030x617.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
