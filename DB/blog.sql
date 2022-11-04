-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 01:50 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_info`
--

CREATE TABLE IF NOT EXISTS `post_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `post_subtitle` varchar(1000) NOT NULL,
  `post_title` varchar(1000) NOT NULL,
  `post_short_description` varchar(1000) NOT NULL,
  `post_description` varchar(2000) NOT NULL,
  `post_status` varchar(100) NOT NULL,
  `post_created_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `post_info`
--

INSERT INTO `post_info` (`id`, `user_id`, `post_subtitle`, `post_title`, `post_short_description`, `post_description`, `post_status`, `post_created_date`) VALUES
(26, 9, 'this is subtitle', 'the tittle ', 'post short description 																', 'post description 																	', 'draft', '24-09-2014'),
(27, 9, 'this is subtitle', 'the tittle ', 'post short description 																						', 'post description 																							', 'publish', '24-09-2014'),
(28, 10, 'this is subtitle2233', 'the tittle 23', 'short description 23																																									', 'long description 23																																							', 'publish', '--'),
(29, 10, '2nd short title ', 'second title ', '	Rosslyn Chapel Educational Content Now Available Photograph of the entrance to Rosslyn Chapel in Roslin, Scotland Rosslyn Chapel Educational Content Now Available Cross-section of Rosslyn Chapel, created by CDDV from 3D laser scan data\r\nRosslyn Chapel Educational Content Now , please contact us at info@cyark.org.																							', '		Rosslyn Chapel Educational Content Now Available Photograph of the entrance to Rosslyn Chapel in Roslin, Scotland Rosslyn Chapel Educational Content Now Available Cross-section of Rosslyn Chapel, created by CDDV from 3D laser scan data\nRosslyn Chapel Educational Content Now Available Lady Helen, the Countess of Rosslyn, with a message for those who complete the online quiz With the new school year just around the corner, CyArk is excited to announce the release of new lesson plans and online activities for teachers and students, bringing the mysteries of the past to the classroom via CyArk’s newly released Rosslyn Chapel project. A mid-15th century Gothic chapel, Rosslyn Chapel is covered in extensive carvings throughout the interior and exterior, which have figured this wonderful chapel into numerous legends over time, including that of the Holy Grail. Now, with the help of three free lesson plans and an interactive quiz, students can analyze the construction techniques behind Gothic structures, study symbolism through carvings, and experiment with the laws of physics in building stable and secured archways.\nThese lesson plans were created under the expert guidance of Fiona Rogan, Learning and Outreach Manager at the Rosslyn Chapel Trust. Together, CyArk and the Rosslyn Chapel Trust developed three diverse lesson plans based on the 3D interactive content created by Historic Scotland and the Digital Design Studio at the Glasgow School of Art. Many thanks to these partners for making the Rosslyn Chapel digital documentation and education development possible! CyArk would also like to thank Robert Anderson of Beeslack Community High School and Scott McGibbon of City of Glasgow College for contributing their knowledge of technology, design, and stone construction to our lesson plans. Their superior feedback strengthens these lessons and enables wider accessibility for both lower and upper level students.\nThe new lesson plans cover a wide range of topics. In “Talki', 'publish', '3-3-2011'),
(30, 11, 'taest', 'sdfds', 'sdfds						', '	dsfdff					', 'draft', '19-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_picture` varchar(555) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `fullname`, `email`, `profile_picture`, `hash`, `password`, `status`) VALUES
(9, 'OMAR FARUK', 'faruk@gmail.com', '', '', '123456', 'active'),
(10, 'Al Amin', 'toalaminbd@gmail.com', '', '', '123456', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
