-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2016 at 10:36 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a8314948_nill`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_user`
--

CREATE TABLE `blog_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `email_code` text NOT NULL,
  `pro_img` varchar(32) NOT NULL,
  `bann` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog_user`
--

INSERT INTO `blog_user` VALUES(4, 'priya', '25f9e794323b453885f5181f1b624d0b', 'Susmita', 'bonik', 'priya@gmail.com', '01c8b96af4c7f9137dff6cd32ca8989c', '', 0, 0);
INSERT INTO `blog_user` VALUES(3, 'adminharun', '25d55ad283aa400af464c76d713c07ad', 'Md.Harun', 'Ur-Rashid', 'www.faz13@gmail.com', 'ca21cbdf9fcb83c7b1785ba1d72075b5', 'IMG_20100101_080213.jpg', 0, 1);
INSERT INTO `blog_user` VALUES(5, 'à¦¬à¦¾à¦¬à§', 'e807f1fcf82d132f9bb018ca6738a19f', 'à¦¤à¦¾à¦‡à¦‰à¦¬ à¦–à¦¾à¦¨', 'à¦¬à¦¾à¦¬à§', 'babu@gmail.com', 'dd023ff82b4a28c71536ff2685a742ce', '', 0, 0);
INSERT INTO `blog_user` VALUES(6, 'anik', '25f9e794323b453885f5181f1b624d0b', 'Md.anik', 'Hasan', 'anik@gmail.com', '7c51ac89f33046a9a01a6158c26311ad', '3d-Wallpaper-Images-UNoQX.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issu_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` VALUES(1, 1, 4, 1, 'à¦…à¦¨à§‡à¦• à¦¸à§à¦¨à§à¦¦à¦° à¦•à¦¬à¦¿à¦¤à¦¾');
INSERT INTO `comments` VALUES(4, 2, 5, 1, 'à¦•à¦¾à¦œà§€ à¦¨à¦œà¦°à§à¦² à¦‡à¦¸à¦²à¦¾à¦® à¦à¦° à¦¬à¦¿à¦–à§à¦¯à¦¾à¦¤ à¦•à¦¬à¦¿à¦¤à¦¾ ');
INSERT INTO `comments` VALUES(5, 1, 3, 1, 'à¦¹à§à¦® à¦¥à¦¿à¦• à¦¬à¦²à§‡à¦¸à§‡à¦¨');
INSERT INTO `comments` VALUES(6, 1, 5, 1, 'very nice');
INSERT INTO `comments` VALUES(7, 2, 5, 1, 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issu_id` int(11) NOT NULL AUTO_INCREMENT,
  `issu_title` text NOT NULL,
  `issu_publish` text NOT NULL,
  `issu_des` text NOT NULL,
  `issu_cover` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issu_date` datetime NOT NULL,
  PRIMARY KEY (`issu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` VALUES(1, 'à¦¬à¦¾à¦‚à¦²à¦¾ à¦•à¦¬à¦¿à¦¤à¦¾', 'à¦¹à¦¾à¦°à§à¦¨ à¦‰à¦° à¦°à¦¾à¦¶à¦¿à¦¦', 'à¦¬à¦¾à¦‚à¦²à¦¾-à¦•à¦¬à¦¿à¦¤à¦¾ à¦“à§Ÿà§‡à¦¬à¦¸à¦¾à¦‡à¦Ÿà¦Ÿà¦¿ à¦ªà§à¦°à¦–à§à¦¯à¦¾à¦¤ à¦¬à¦¾à¦™à¦¾à¦²à¦¿ à¦•à¦¬à¦¿à¦¦à§‡à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦•à¦¬à¦¿à¦¤à¦¾à¦° à¦à¦• à¦…à¦¨à¦²à¦¾à¦‡à¦¨ à¦¸à¦‚à¦—à§à¦°à¦¹à¦¶à¦¾à¦²à¦¾à¥¤ à¦ªà¦¾à¦¶à¦¾à¦ªà¦¾à¦¶à¦¿ à¦¸à§Œà¦–à¦¿à¦¨ à¦•à¦¬à¦¿à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦°à§Ÿà§‡à¦›à§‡ \\"à¦•à¦¬à¦¿à¦¤à¦¾à¦° à¦†à¦¸à¦°\\" à¦¬à¦¿à¦­à¦¾à¦—à¥¤ à¦à¦–à¦¾à¦¨à§‡ à¦¯à§‡ à¦•à§‡à¦‰ à¦¤à¦¾à¦° à¦¸à§à¦¬à¦°à¦šà¦¿à¦¤ à¦•à¦¬à¦¿à¦¤à¦¾ à¦ªà§à¦°à¦•à¦¾à¦¶ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¦¨à¥¤ à¦à¦›à¦¾à§œà¦¾à¦“ à¦•à¦¬à¦¿ à¦“ à¦•à¦¬à¦¿à¦¤à¦¾ à¦¨à¦¿à§Ÿà§‡ à¦†à¦²à§‹à¦šà¦¨à¦¾à¦° à¦œà¦¨à§à¦¯ à¦°à§Ÿà§‡à¦›à§‡ \\"à¦†à¦²à§‹à¦šà¦¨à¦¾ à¦¸à¦­à¦¾\\", à¦à¦¬à¦‚ à¦‰à¦ªà¦¸à§à¦¥à¦¿à¦¤ à¦•à¦¬à¦¿à¦¦à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦°à¦¾à¦¸à¦°à¦¿ à¦•à¦¥à¦¾ à¦¬à¦²à¦¾à¦° à¦œà¦¨à§à¦¯ \\"à¦•à¦¬à¦¿à¦¦à§‡à¦° à¦†à¦¡à§à¦¡à¦¾\\" à¦¨à¦¾à¦®à¦• à¦¨à¦¤à§à¦¨ à¦¬à¦¿à¦­à¦¾à¦—à¥¤ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¬à¦¿à¦¶à§à¦¬à¦¾à¦¸ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦à¦‡ à¦•à§à¦·à§à¦¦à§à¦° à¦ªà§à¦°à¦šà§‡à¦·à§à¦Ÿà¦¾ à¦¬à¦¾à¦‚à¦²à¦¾ à¦¸à¦¾à¦¹à¦¿à¦¤à§à¦¯, à¦•à¦¬à¦¿à¦¤à¦¾ à¦“ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¦à§‡à¦¶à§€à§Ÿ à¦•à§ƒà¦·à§à¦Ÿà¦¿-à¦•à¦¾à¦²à¦šà¦¾à¦°à¦•à§‡ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¨à¦¾à¦¨à¦¾ à¦ªà§à¦°à¦¾à¦¨à§à¦¤à§‡ à¦›à§œà¦¿à§Ÿà§‡ à¦¥à¦¾à¦•à¦¾ à¦¨à¦¤à§à¦¨ à¦ªà§à¦°à¦œà¦¨à§à¦®à§‡à¦° à¦¬à¦¾à¦™à¦¾à¦²à¦¿à¦¦à§‡à¦° à¦•à¦¾à¦›à§‡ à¦†à¦°à¦“ à¦ªà¦°à¦¿à¦šà¦¿à¦¤ à¦•à¦°à§‡ à¦¤à§à¦²à¦¬à§‡à¥¤', 'image1.jpg', 3, '2015-09-20 18:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `issu_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_writer` text NOT NULL,
  `cat` varchar(32) NOT NULL,
  `post_content` text NOT NULL,
  `post_publish_time` datetime NOT NULL,
  `post_img` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` VALUES(1, 3, 1, 'à¦•à¦¨à§à¦¯à¦¾à¦¬à¦¿à¦¦à¦¾à¦¯à¦¼', 'à¦°à¦¬à§€à¦¨à§à¦¦à§à¦°à¦¨à¦¾à¦¥ à¦ à¦¾à¦•à§à¦°', 'Unknown', 'à¦•à§‡ à¦¤à§à¦®à¦¿ à¦–à§à¦à¦œà¦¿à¦› à¦œà¦—à¦¦à§€à¦¶ à¦­à¦¾à¦‡ à¦†à¦•à¦¾à¦¶ à¦ªà¦¾à¦¤à¦¾à¦² à¦œà§à§œà§‡â€™ \r\nà¦•à§‡ à¦¤à§à¦®à¦¿ à¦«à¦¿à¦°à¦¿à¦› à¦¬à¦¨à§‡-à¦œà¦™à§à¦—à¦²à§‡, à¦•à§‡ à¦¤à§à¦®à¦¿ à¦ªà¦¾à¦¹à¦¾à§œ-à¦šà§‚à§œà§‡? \r\n       à¦¹à¦¾à§Ÿ à¦‹à¦·à¦¿ à¦¦à¦°à¦¬à§‡à¦¶, \r\n  à¦¬à§à¦•à§‡à¦° à¦®à¦¾à¦¨à¦¿à¦•à§‡ à¦¬à§à¦•à§‡ à¦§â€™à¦°à§‡ à¦¤à§à¦®à¦¿ à¦–à§‹à¦à¦œ à¦¤à¦¾à¦°à§‡ à¦¦à§‡à¦¶-à¦¦à§‡à¦¶à¥¤ \r\n  à¦¸à§ƒà¦·à§à¦Ÿà¦¿ à¦°à§Ÿà§‡à¦›à§‡ à¦¤à§‹à¦®à¦¾ à¦ªà¦¾à¦¨à§‡ à¦šà§‡à§Ÿà§‡ à¦¤à§à¦®à¦¿ à¦†à¦› à¦šà§‹à¦– à¦¬à§à¦à¦œà§‡, \r\n  à¦¸à§à¦°à¦·à§à¦Ÿà¦¾à¦°à§‡ à¦–à§‹à¦à¦œà§‹-à¦†à¦ªà¦¨à¦¾à¦°à§‡ à¦¤à§à¦®à¦¿ à¦†à¦ªà¦¨à¦¿ à¦«à¦¿à¦°à¦¿à¦› à¦–à§à¦à¦œà§‡! \r\n  à¦‡à¦šà§à¦›à¦¾-à¦…à¦¨à§à¦§! à¦†à¦à¦–à¦¿ à¦–à§‹à¦²à§‹, à¦¦à§‡à¦¶ à¦¦à¦°à§à¦ªà¦£à§‡ à¦¨à¦¿à¦œ-à¦•à¦¾à§Ÿà¦¾, \r\n  à¦¦à§‡à¦–à¦¿à¦¬à§‡, à¦¤à§‹à¦®à¦¾à¦°à¦¿ à¦¸à¦¬ à¦…à¦¬à§Ÿà¦¬à§‡ à¦ªâ€™à§œà§‡à¦›à§‡ à¦¤à¦¾à¦à¦¹à¦¾à¦° à¦›à¦¾à§Ÿà¦¾à¥¤ \r\n  à¦¶à¦¿à¦¹à¦°à¦¿â€™ à¦‰à¦ à§‹ à¦¨à¦¾, à¦¶à¦¾à¦¸à§à¦¤à§à¦°à¦¬à¦¿à¦¦à§‡à¦° à¦•â€™à¦°à§‹ à¦¨à¦¾ à¦•â€™ à¦¬à§€à¦°, à¦­à§Ÿ- \r\nà¦¤à¦¾à¦¹à¦¾à¦°à¦¾ à¦–à§‹à¦¦à¦¾à¦° à¦–à§‹à¦¦à§â€Œ â€˜à¦ªà§à¦°à¦¾à¦‡à¦­à§‡à¦Ÿ à¦¸à§‡à¦•à§à¦°à§‡à¦Ÿà¦¾à¦°à§€â€™ à¦¤ à¦¨à§Ÿ!', '2015-09-20 18:49:14', '');
INSERT INTO `post` VALUES(2, 3, 1, 'à¦ˆà¦¶à§à¦¬à¦°', 'à¦•à¦¾à¦œà§€ à¦¨à¦œà¦°à§à¦² à¦‡à¦¸à¦²à¦¾à¦®', 'Onubad Kbita', 'à¦œà¦¨à¦¨à§€, à¦•à¦¨à§à¦¯à¦¾à¦°à§‡ à¦†à¦œ à¦¬à¦¿à¦¦à¦¾à¦¯à¦¼à§‡à¦° à¦•à§à¦·à¦£à§‡ \r\nà¦†à¦ªà¦¨ à¦…à¦¤à§€à¦¤à¦°à§‚à¦ª à¦ªà¦¡à¦¼à¦¿à¦¯à¦¼à¦¾à¦›à§‡ à¦®à¦¨à§‡ \r\nà¦¯à¦–à¦¨ à¦¬à¦¾à¦²à¦¿à¦•à¦¾ à¦›à¦¿à¦²à§‡à¥¤ \r\n                 à¦®à¦¾à¦¤à§ƒà¦•à§à¦°à§‹à¦¡à¦¼ à¦¹à¦¤à§‡ \r\nà¦¤à§‹à¦®à¦¾à¦°à§‡ à¦­à¦¾à¦¸à¦¾à¦²à§‹ à¦­à¦¾à¦—à§à¦¯ à¦¦à§‚à¦°à¦¤à¦° à¦¸à§à¦°à§‹à¦¤à§‡ \r\nà¦¸à¦‚à¦¸à¦¾à¦°à§‡à¦°à¥¤ \r\n         à¦¤à¦¾à¦° à¦ªà¦° à¦—à§‡à¦² à¦•à¦¤ à¦¦à¦¿à¦¨ \r\nà¦¦à§à¦ƒà¦–à§‡ à¦¸à§à¦–à§‡, \r\n         à¦¬à¦¿à¦šà§à¦›à§‡à¦¦à§‡à¦° à¦•à§à¦·à¦¤ à¦¹à¦² à¦•à§à¦·à§€à¦£à¥¤ ', '2015-09-20 19:50:30', '');
