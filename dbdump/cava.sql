-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2013 at 04:30 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cava`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_about_landing_page`
--

DROP TABLE IF EXISTS `cv_about_landing_page`;
CREATE TABLE IF NOT EXISTS `cv_about_landing_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cv_about_landing_page`
--

INSERT INTO `cv_about_landing_page` (`id`, `title`, `description`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'We are CAVA Property', '<p>\r\n We are professionals in property marketing and consulting who always carry together our experience, knowledge and passion to our clients.</p>\r\n<p>\r\n <span class="text-green">OUR SERVICE</span><br />\r\n <span class="text-green">WE ADVISE WHAT BEST TO ACHIEVE THE BEST</span><br />\r\n Through detailed study, we tailor the best approach (including size, targets, strategies and marketing communications) to match our clients&#39; expectations.</p>\r\n<p>\r\n <span class="text-green">VISION</span><br />\r\n <span class="text-green">MORE GAINS, LESS RISKS</span><br />\r\n We believe it can be achieved with a great decision based on our detailed strategies.</p>\r\n<p>\r\n <span class="text-green">MISSION</span><br />\r\n <span class="text-green">OUR GOAL IS SIMPLE</span><br />\r\n We want to create a successful story with our clients and their projects.</p>', 0, '2013-04-14 22:18:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_about_people`
--

DROP TABLE IF EXISTS `cv_about_people`;
CREATE TABLE IF NOT EXISTS `cv_about_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `ordering` int(2) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cv_about_people`
--

INSERT INTO `cv_about_people` (`id`, `name`, `position`, `description`, `image_id`, `ordering`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Reynolds Darmadi', 'Founder & CEO', '<p>\r\n Gazing at the skyscrapers while meeting new people around, Reynolds founded &Ccedil;ava in 2010 to bridge those two different interests. He holds an MBA in Real Estate from the University of Aberdeen, UK and has been in the business from 2002. His experience in property consultants and developers both in a company and independently gives him insight to combine visions from them to create a better project and to match clients&rsquo; expectations.</p>', 3, 1, 0, '2013-04-14 22:38:13', '2013-04-20 14:00:26'),
(2, 'Vanessa Natalia', '', '<p>\r\n Dynamic and loves challenge, Vanessa joined &Ccedil;ava in 2012 after building an impressive reputation in Office Advisory and Sole Exclusive Agency Division by handling several big names in her previous works. She knows how to handle clients with different backgrounds and her managerial ability is also exceptional.</p>', 4, 5, 0, '2013-04-16 10:16:52', '2013-04-20 14:00:59'),
(3, 'Laura Loe', '', '<p>\r\n Graduated as bachelor in Marketing Management from Curtin University, Laura joined &Ccedil;ava in April 2011, soon-after the company was established. Her previous work was in one of the biggest property consultants in this country. Just like Benigna, she entered the business in 2003. This broad experience makes her work unquestionable.</p>', 5, 2, 0, '2013-04-16 10:58:24', '2013-04-20 14:01:23'),
(4, 'Benigna Maria (Noni)', '', '<p>\r\n Reliable, experienced, and professional. Benigna Maria (Noni) is a Mass Communication graduate from Curtin University, Western Australia and founded &Ccedil;ava together with Reynolds. As one of the founders, she possesses great knowledge, vision and understanding in the property business. Building her portfolio since 2003, she took responsibility as project leader in several prestigious projects before starting her own business.</p>', 7, 3, 0, '2013-04-16 10:58:51', '2013-04-20 14:01:55'),
(5, 'David Tan', '', '<p>\r\n Just joined &Ccedil;ava in September, 2012, David jumped to property business after a short experience in hotel industry. Started as sales marketing and has built his expertise in international property for more than 10 years, he is now very enthusiastic and committed with his new, young and vibrant company.</p>', 6, 4, 0, '2013-04-16 10:59:10', '2013-04-20 14:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `cv_activities`
--

DROP TABLE IF EXISTS `cv_activities`;
CREATE TABLE IF NOT EXISTS `cv_activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `cv_activities`
--

INSERT INTO `cv_activities` (`activity_id`, `user_id`, `activity`, `module`, `created_on`, `deleted`) VALUES
(1, 1, 'logged in from: ::1', 'users', '2013-04-07 09:58:13', 0),
(2, 1, 'App settings saved from: ::1', 'core', '2013-04-07 09:58:31', 0),
(3, 1, 'App settings saved from: ::1', 'core', '2013-04-07 09:58:34', 0),
(4, 1, 'created a new User: Administrator', 'users', '2013-04-07 09:59:19', 0),
(5, 1, 'modified user: Administrator', 'users', '2013-04-07 09:59:26', 0),
(6, 1, 'Migrate Type: article_ Uninstalled Version: 0 from: ::1', 'migrations', '2013-04-07 09:59:43', 0),
(7, 1, 'Migrate Type: news_ Uninstalled Version: 0 from: ::1', 'migrations', '2013-04-07 09:59:47', 0),
(8, 1, 'Deleted Module: Article : ::1', 'builder', '2013-04-07 09:59:56', 0),
(9, 1, 'Deleted Module: News : ::1', 'builder', '2013-04-07 09:59:58', 0),
(10, 1, 'Migrate Type: news_ to Version: 1 from: ::1', 'migrations', '2013-04-07 10:30:42', 0),
(11, 1, 'Migrate Type: news_ to Version: 2 from: ::1', 'migrations', '2013-04-07 10:30:46', 0),
(12, 1, 'Migrate Type: news_ to Version: 3 from: ::1', 'migrations', '2013-04-07 10:30:50', 0),
(13, 1, 'modified user: Andhika Novandi Patria', 'users', '2013-04-07 10:39:25', 0),
(14, 1, 'Created Module: Project : ::1', 'modulebuilder', '2013-04-07 11:21:33', 0),
(15, 1, 'Created record with ID: 1 : ::1', 'project', '2013-04-07 11:49:14', 0),
(16, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-07 11:49:57', 0),
(17, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-07 11:50:54', 0),
(18, 1, 'Created record with ID: 2 : ::1', 'project', '2013-04-07 11:51:02', 0),
(19, 1, 'logged in from: ::1', 'users', '2013-04-07 16:34:07', 0),
(20, 1, 'Created record with ID: 1 : ::1', 'project', '2013-04-07 16:42:09', 0),
(21, 1, 'Created record with ID: 2 : ::1', 'project', '2013-04-07 16:44:59', 0),
(22, 1, 'Created record with ID: 3 : ::1', 'project', '2013-04-07 16:45:17', 0),
(23, 1, 'Created record with ID: 4 : ::1', 'project', '2013-04-07 16:45:28', 0),
(24, 1, 'Created record with ID: 5 : ::1', 'project', '2013-04-07 16:46:21', 0),
(25, 1, 'Created record with ID: 6 : ::1', 'project', '2013-04-07 16:46:34', 0),
(26, 1, 'Created record with ID: 7 : ::1', 'project', '2013-04-07 16:46:47', 0),
(27, 1, 'Created record with ID: 8 : ::1', 'project', '2013-04-07 16:46:55', 0),
(28, 1, 'logged in from: ::1', 'users', '2013-04-07 18:50:18', 0),
(29, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-07 18:54:05', 0),
(30, 1, 'logged in from: ::1', 'users', '2013-04-07 22:08:14', 0),
(31, 1, 'Create File Folder: 2 : ::1', 'files folders', '2013-04-07 23:46:53', 0),
(32, 1, 'Upload File: 1 : ::1', 'files', '2013-04-07 23:47:29', 0),
(33, 1, 'Upload File: 2 : ::1', 'files', '2013-04-07 23:47:29', 0),
(34, 1, 'Created record with ID: 1 : ::1', 'project', '2013-04-07 23:47:42', 0),
(35, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-07 23:54:48', 0),
(36, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-07 23:55:07', 0),
(37, 1, 'logged in from: ::1', 'users', '2013-04-14 13:14:41', 0),
(38, 1, 'logged in from: ::1', 'users', '2013-04-14 18:29:30', 0),
(39, 1, 'Created record with ID: 1 : ::1', 'project', '2013-04-14 18:44:02', 0),
(40, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-14 18:52:33', 0),
(41, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-14 18:53:23', 0),
(42, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-14 18:54:29', 0),
(43, 1, 'Created Module: Marketing : ::1', 'modulebuilder', '2013-04-14 19:13:13', 0),
(44, 1, 'Created record with ID: 1 : ::1', 'marketing', '2013-04-14 19:35:09', 0),
(45, 1, 'logged in from: ::1', 'users', '2013-04-14 21:49:52', 0),
(46, 1, 'Created Module: Aboout : ::1', 'modulebuilder', '2013-04-14 21:52:48', 0),
(47, 1, 'Migrate Type: aboout_ Uninstalled Version: 0 from: ::1', 'migrations', '2013-04-14 21:53:22', 0),
(48, 1, 'Deleted Module: Aboout : ::1', 'builder', '2013-04-14 21:53:27', 0),
(49, 1, 'Created Module: About : ::1', 'modulebuilder', '2013-04-14 21:54:28', 0),
(50, 1, 'Created record with ID: 1 : ::1', 'about', '2013-04-14 22:18:45', 0),
(51, 1, 'Create File Folder: 3 : ::1', 'files folders', '2013-04-14 22:36:29', 0),
(52, 1, 'Upload File: 4 : ::1', 'files', '2013-04-14 22:37:36', 0),
(53, 1, 'Upload File: 5 : ::1', 'files', '2013-04-14 22:37:36', 0),
(54, 1, 'Upload File: 3 : ::1', 'files', '2013-04-14 22:37:36', 0),
(55, 1, 'Upload File: 6 : ::1', 'files', '2013-04-14 22:37:36', 0),
(56, 1, 'Upload File: 7 : ::1', 'files', '2013-04-14 22:37:36', 0),
(57, 1, 'Created record with ID: 1 : ::1', 'about', '2013-04-14 22:38:13', 0),
(58, 1, 'Updated record with ID: 1 : ::1', 'about', '2013-04-14 22:38:40', 0),
(59, 1, 'Created Module: Career : ::1', 'modulebuilder', '2013-04-14 22:46:42', 0),
(60, 1, 'Created record with ID: 1 : ::1', 'career', '2013-04-14 23:03:49', 0),
(61, 1, 'Deleted record with ID: 1 : ::1', 'career', '2013-04-14 23:04:24', 0),
(62, 1, 'Created Module: Contact : ::1', 'modulebuilder', '2013-04-14 23:15:43', 0),
(63, 1, 'Created record with ID: 1 : ::1', 'contact', '2013-04-14 23:29:53', 0),
(64, 1, 'Updated record with ID: 1 : ::1', 'contact', '2013-04-14 23:30:04', 0),
(65, 1, 'Created record with ID: 1 : ::1', 'contact', '2013-04-14 23:54:26', 0),
(66, 1, 'Deleted record with ID: 1 : ::1', 'contact', '2013-04-14 23:55:41', 0),
(67, 1, 'Created record with ID: 1 : ::1', 'contact', '2013-04-15 00:07:57', 0),
(68, 1, 'Deleted record with ID: 1 : ::1', 'contact', '2013-04-15 00:08:07', 0),
(69, 1, 'logged in from: ::1', 'users', '2013-04-16 08:51:18', 0),
(70, 1, 'Migrate Type: banner_ to Version: 1 from: ::1', 'migrations', '2013-04-16 09:26:05', 0),
(71, 1, 'Migrate Type: banner_ to Version: 2 from: ::1', 'migrations', '2013-04-16 09:26:09', 0),
(72, 1, 'Migrate Type: banner_ to Version: 3 from: ::1', 'migrations', '2013-04-16 09:26:14', 0),
(73, 1, 'Created record with ID: 1 : ::1', 'banner', '2013-04-16 09:27:12', 0),
(74, 1, 'Updated record with ID: 1 : ::1', 'banner', '2013-04-16 09:27:20', 0),
(75, 1, 'logged in from: ::1', 'users', '2013-04-16 09:39:25', 0),
(76, 1, 'Create File Folder: 4 : ::1', 'files folders', '2013-04-16 09:44:52', 0),
(77, 1, 'Upload File: 8 : ::1', 'files', '2013-04-16 09:46:37', 0),
(78, 1, 'Upload File: 9 : ::1', 'files', '2013-04-16 09:46:37', 0),
(79, 1, 'Created record with ID: 1 : ::1', 'banner', '2013-04-16 09:47:05', 0),
(80, 1, 'Created record with ID: 2 : ::1', 'banner', '2013-04-16 09:58:18', 0),
(81, 1, 'Updated record with ID: 1 : ::1', 'banner', '2013-04-16 10:08:43', 0),
(82, 1, 'Updated record with ID: 1 : ::1', 'banner', '2013-04-16 10:09:34', 0),
(83, 1, 'Created record with ID: 2 : ::1', 'about', '2013-04-16 10:16:52', 0),
(84, 1, 'Updated record with ID: 1 : ::1', 'about', '2013-04-16 10:56:37', 0),
(85, 1, 'Updated record with ID: 2 : ::1', 'about', '2013-04-16 10:56:45', 0),
(86, 1, 'Created record with ID: 3 : ::1', 'about', '2013-04-16 10:58:24', 0),
(87, 1, 'Created record with ID: 4 : ::1', 'about', '2013-04-16 10:58:51', 0),
(88, 1, 'Created record with ID: 5 : ::1', 'about', '2013-04-16 10:59:10', 0),
(89, 1, 'Updated record with ID: 3 : ::1', 'about', '2013-04-16 11:24:46', 0),
(90, 1, 'Updated record with ID: 4 : ::1', 'about', '2013-04-16 11:25:03', 0),
(91, 1, 'Updated record with ID: 5 : ::1', 'about', '2013-04-16 11:25:32', 0),
(92, 1, 'logged in from: ::1', 'users', '2013-04-16 15:45:17', 0),
(93, 1, 'logged in from: ::1', 'users', '2013-04-18 10:52:49', 0),
(94, 1, 'Created record with ID: 1 : ::1', 'news', '2013-04-18 16:08:27', 0),
(95, 1, 'Updated record with ID: 1 : ::1', 'contact', '2013-04-18 11:26:14', 0),
(96, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-18 14:00:12', 0),
(97, 1, 'logged in from: ::1', 'users', '2013-04-18 16:53:47', 0),
(98, 1, 'logged in from: ::1', 'users', '2013-04-19 08:53:27', 0),
(99, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-19 09:23:23', 0),
(100, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-19 09:27:09', 0),
(101, 1, 'logged in from: ::1', 'users', '2013-04-19 10:59:22', 0),
(102, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-19 11:13:39', 0),
(103, 1, 'logged in from: ::1', 'users', '2013-04-20 11:06:36', 0),
(104, 1, 'logged in from: ::1', 'users', '2013-04-20 13:43:42', 0),
(105, 1, 'Updated record with ID: 4 : ::1', 'about', '2013-04-20 13:45:00', 0),
(106, 1, 'Updated record with ID: 1 : ::1', 'about', '2013-04-20 13:45:19', 0),
(107, 1, 'Updated record with ID: 2 : ::1', 'about', '2013-04-20 13:45:36', 0),
(108, 1, 'Updated record with ID: 5 : ::1', 'about', '2013-04-20 13:45:52', 0),
(109, 1, 'Updated record with ID: 3 : ::1', 'about', '2013-04-20 13:46:10', 0),
(110, 1, 'Updated record with ID: 4 : ::1', 'about', '2013-04-20 13:47:49', 0),
(111, 1, 'Updated record with ID: 1 : ::1', 'about', '2013-04-20 14:00:26', 0),
(112, 1, 'Updated record with ID: 2 : ::1', 'about', '2013-04-20 14:00:59', 0),
(113, 1, 'Updated record with ID: 3 : ::1', 'about', '2013-04-20 14:01:23', 0),
(114, 1, 'Updated record with ID: 4 : ::1', 'about', '2013-04-20 14:01:55', 0),
(115, 1, 'Updated record with ID: 5 : ::1', 'about', '2013-04-20 14:02:12', 0),
(116, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 14:22:36', 0),
(117, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 14:44:46', 0),
(118, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 14:48:04', 0),
(119, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 14:52:00', 0),
(120, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:01:33', 0),
(121, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:01:51', 0),
(122, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:02:16', 0),
(123, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:02:25', 0),
(124, 1, 'Created record with ID: 1 : ::1', 'project', '2013-04-20 15:22:15', 0),
(125, 1, 'Created record with ID: 2 : ::1', 'project', '2013-04-20 15:22:20', 0),
(126, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:24:33', 0),
(127, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:25:55', 0),
(128, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:26:30', 0),
(129, 1, 'Created record with ID: 2 : ::1', 'project', '2013-04-20 15:37:50', 0),
(130, 1, 'Updated record with ID: 2 : ::1', 'project', '2013-04-20 15:38:07', 0),
(131, 1, 'Created record with ID: 3 : ::1', 'project', '2013-04-20 15:38:28', 0),
(132, 1, 'Created record with ID: 4 : ::1', 'project', '2013-04-20 15:38:42', 0),
(133, 1, 'Created record with ID: 5 : ::1', 'project', '2013-04-20 15:38:52', 0),
(134, 1, 'Created record with ID: 6 : ::1', 'project', '2013-04-20 15:39:04', 0),
(135, 1, 'Created record with ID: 7 : ::1', 'project', '2013-04-20 15:39:17', 0),
(136, 1, 'Updated record with ID: 3 : ::1', 'project', '2013-04-20 15:53:33', 0),
(137, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-20 15:53:41', 0),
(138, 1, 'Updated record with ID: 2 : ::1', 'project', '2013-04-20 15:53:46', 0),
(139, 1, 'logged in from: ::1', 'users', '2013-04-21 01:04:28', 0),
(140, 1, 'Updated record with ID: 1 : ::1', 'news', '2013-04-21 01:23:08', 0),
(141, 1, 'Updated record with ID: 1 : ::1', 'news', '2013-04-21 01:32:58', 0),
(142, 1, 'Updated record with ID: 4 : ::1', 'news', '2013-04-21 03:37:38', 0),
(143, 1, 'Updated record with ID: 4 : ::1', 'news', '2013-04-21 03:38:09', 0),
(144, 1, 'Updated record with ID: 4 : ::1', 'news', '2013-04-21 03:40:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cv_banner`
--

DROP TABLE IF EXISTS `cv_banner`;
CREATE TABLE IF NOT EXISTS `cv_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `position` int(2) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_banner`
--

INSERT INTO `cv_banner` (`id`, `group_id`, `title`, `summary`, `image_id`, `url`, `position`, `publish`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, 'Slide 1', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis justo sem, condimentum eget sollicitudin sit amet, congue quis ipsum.</p>', 8, '#', 1, 'Y', 0, '2013-04-16 09:47:05', '2013-04-16 10:09:34'),
(2, 1, 'Slide 2', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis justo sem, condimentum eget sollicitudin sit amet, congue quis ipsum.</p>', 9, '#', 2, 'Y', 0, '2013-04-16 09:58:18', '2013-04-16 10:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `cv_banner_group`
--

DROP TABLE IF EXISTS `cv_banner_group`;
CREATE TABLE IF NOT EXISTS `cv_banner_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `abbr` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cv_banner_group`
--

INSERT INTO `cv_banner_group` (`id`, `title`, `abbr`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Homepage', 'homepage', 0, '2013-04-16 09:27:12', '2013-04-16 09:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `cv_career`
--

DROP TABLE IF EXISTS `cv_career`;
CREATE TABLE IF NOT EXISTS `cv_career` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `qualification` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cv_career`
--

INSERT INTO `cv_career` (`id`, `title`, `summary`, `description`, `qualification`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Marketing Division', '<p>\r\n Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>', '<p>\r\n Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie.</p>', '<ol>\r\n <li>\r\n  Vel illum dolore eu feugiat nulla</li>\r\n <li>\r\n  Legentis in iis qui facit eorum claritatem</li>\r\n <li>\r\n  Quam nunc putamus</li>\r\n <li>\r\n  Nunc nobis videntur</li>\r\n</ol>', 'marketing-division', 0, '2013-04-14 23:03:49', '0000-00-00 00:00:00'),
(2, 'Finance Division', '<p>\r\n Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>', '<p>\r\n Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie.</p>', '<ol>\r\n <li>\r\n  Vel illum dolore eu feugiat nulla</li>\r\n <li>\r\n  Legentis in iis qui facit eorum claritatem</li>\r\n <li>\r\n  Quam nunc putamus</li>\r\n <li>\r\n  Nunc nobis videntur</li>\r\n</ol>', 'finance-division', 0, '2013-04-14 23:04:49', '0000-00-00 00:00:00'),
(3, 'IT Division', '<p>\r\n Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>', '<p>\r\n Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie.</p>', '<ol>\r\n <li>\r\n  Vel illum dolore eu feugiat nulla</li>\r\n <li>\r\n  Legentis in iis qui facit eorum claritatem</li>\r\n <li>\r\n  Quam nunc putamus</li>\r\n <li>\r\n  Nunc nobis videntur</li>\r\n</ol>', 'it-division', 0, '2013-04-14 23:05:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_contact_mail`
--

DROP TABLE IF EXISTS `cv_contact_mail`;
CREATE TABLE IF NOT EXISTS `cv_contact_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_contact_mail`
--

INSERT INTO `cv_contact_mail` (`id`, `name`, `email`, `subject`, `message`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Andhika', 'andhikanovandi@gmail.com', 'test', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum eros, consectetur eu eleifend quis, egestas aliquet massa. Curabitur orci odio, volutpat a vestibulum eu, hendrerit sed nunc. Ut sit amet lacus vitae tortor tincidunt fringilla. In vel sapien ut nisl consectetur tincidunt ut non lorem. Maecenas at ullamcorper metus. Phasellus et odio nec lacus faucibus consectetur sit amet ut turpis. Ut a risus in tellus suscipit malesuada.</p>', 0, '2013-04-14 23:54:26', '0000-00-00 00:00:00'),
(2, 'Andhika', 'andhikanovandi@gmail.com', 'test', 'test', 0, '2013-04-18 11:45:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_contact_office`
--

DROP TABLE IF EXISTS `cv_contact_office`;
CREATE TABLE IF NOT EXISTS `cv_contact_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cv_contact_office`
--

INSERT INTO `cv_contact_office` (`id`, `title`, `address`, `phone`, `fax`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Cava''s Head Office', '<p>\r\n CITYLOFTS SUDIRMAN<br />\r\n #26 floor unit #2623<br />\r\n Jl. KH. Mas Mansyur No. 121<br />\r\n Jakarta 10220</p>', '021 2555 8994 / 021 2991 2845', '021 2991 2844', 0, '2013-04-14 23:29:53', '2013-04-18 11:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `cv_contact_phone`
--

DROP TABLE IF EXISTS `cv_contact_phone`;
CREATE TABLE IF NOT EXISTS `cv_contact_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `other_phone` int(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_contact_phone`
--

INSERT INTO `cv_contact_phone` (`id`, `name`, `phone`, `other_phone`, `subject`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Andhika', 123456, 654321, 'Test', 0, '2013-04-15 00:07:57', '0000-00-00 00:00:00'),
(2, 'Andhika', 123456, 654321, 'test', 0, '2013-04-18 11:52:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_email_queue`
--

DROP TABLE IF EXISTS `cv_email_queue`;
CREATE TABLE IF NOT EXISTS `cv_email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(128) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cv_file`
--

DROP TABLE IF EXISTS `cv_file`;
CREATE TABLE IF NOT EXISTS `cv_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '1',
  `type` enum('a','v','d','i','o') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` int(5) DEFAULT NULL,
  `height` int(5) DEFAULT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `date_added` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cv_file`
--

INSERT INTO `cv_file` (`id`, `folder_id`, `user_id`, `type`, `name`, `filename`, `description`, `extension`, `mimetype`, `width`, `height`, `filesize`, `date_added`, `sort`) VALUES
(1, 2, 1, 'i', 'One Balmoral.jpg', '1365353249_ce75def4456f0700d91a1eed7fb060fe.jpg', '', '.jpg', 'image/jpeg', 1024, 485, 96, 1365353249, 0),
(2, 2, 1, 'i', 'One Balmoral 1.jpg', '1365353249_bfb0f9334add6f827a0638ca95b8fdf4.jpg', '', '.jpg', 'image/jpeg', 1200, 964, 168, 1365353249, 0),
(3, 3, 1, 'i', 'p-1.jpg', '1365953856_27e37efff7bca80a6e195055256cdcae.jpg', '', '.jpg', 'image/jpeg', 180, 180, 13, 1365953856, 0),
(4, 3, 1, 'i', 'p-3.jpg', '1365953856_c6089052af56c4ab6f7ed69bec96f01e.jpg', '', '.jpg', 'image/jpeg', 180, 180, 10, 1365953856, 0),
(5, 3, 1, 'i', 'p-2.jpg', '1365953856_ddc5b2162ae573b96488c0c1b142df9d.jpg', '', '.jpg', 'image/jpeg', 180, 180, 12, 1365953856, 0),
(6, 3, 1, 'i', 'p-4.jpg', '1365953856_41f568bba0094b20232a725caf979ac7.jpg', '', '.jpg', 'image/jpeg', 180, 180, 11, 1365953856, 0),
(7, 3, 1, 'i', 'p-5.jpg', '1365953856_4c5a3abbaa482e228229e9a58081ec16.jpg', '', '.jpg', 'image/jpeg', 180, 180, 11, 1365953856, 0),
(8, 4, 1, 'i', 'slide-1.jpg', '1366098397_ba8defeb3a3c29f314c65ba3d5fe9d19.jpg', '', '.jpg', 'image/jpeg', 900, 360, 93, 1366098397, 0),
(9, 4, 1, 'i', 'slide-2.jpg', '1366098397_3582e4141094b915b18962e5947ed3b1.jpg', '', '.jpg', 'image/jpeg', 900, 360, 116, 1366098397, 0),
(10, 1, 1, 'i', 'news-a.jpg', 'news-a.jpg', '', '.jpg', 'image/jpeg', 680, 360, 99, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cv_file_folders`
--

DROP TABLE IF EXISTS `cv_file_folders`;
CREATE TABLE IF NOT EXISTS `cv_file_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `slug` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_added` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cv_file_folders`
--

INSERT INTO `cv_file_folders` (`id`, `parent_id`, `slug`, `name`, `date_added`, `sort`) VALUES
(1, 0, 'default', 'Default Folder', 1365203367, 0),
(2, 0, 'property-image', 'Property Image', 1365353213, 0),
(3, 0, 'people-image', 'People Image', 1365953789, 0),
(4, 0, 'banner-image', 'Banner Image', 1366098292, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cv_login_attempts`
--

DROP TABLE IF EXISTS `cv_login_attempts`;
CREATE TABLE IF NOT EXISTS `cv_login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cv_marketing_agent`
--

DROP TABLE IF EXISTS `cv_marketing_agent`;
CREATE TABLE IF NOT EXISTS `cv_marketing_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_marketing_agent`
--

INSERT INTO `cv_marketing_agent` (`id`, `name`, `phone`, `email`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Agent 1', '+62812 3456 789', 'agent1@cavaproperty.com', 0, '2013-04-14 19:35:09', '0000-00-00 00:00:00'),
(2, 'Agent 2', '+62812 3456 789', 'agent2@cavaproperty.com', 0, '2013-04-14 19:36:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_news`
--

DROP TABLE IF EXISTS `cv_news`;
CREATE TABLE IF NOT EXISTS `cv_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `month` int(2) NOT NULL,
  `year` year(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cv_news`
--

INSERT INTO `cv_news` (`id`, `title`, `description`, `image_id`, `slug`, `month`, `year`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'News 1', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-1', 4, 2013, 0, '2013-04-18 16:08:27', '2013-04-21 01:32:58'),
(2, 'News 2', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-2', 5, 2013, 0, '2013-05-19 16:08:27', '2013-04-21 01:32:58'),
(3, 'News 3', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-3', 6, 2014, 0, '2014-06-20 16:08:27', '2013-04-21 01:32:58'),
(4, 'News 4', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-4', 7, 2014, 0, '2014-07-21 16:08:27', '2013-04-21 03:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `cv_news_gallery`
--

DROP TABLE IF EXISTS `cv_news_gallery`;
CREATE TABLE IF NOT EXISTS `cv_news_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cv_news_gallery`
--

INSERT INTO `cv_news_gallery` (`id`, `news_id`, `file_id`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cv_permissions`
--

DROP TABLE IF EXISTS `cv_permissions`;
CREATE TABLE IF NOT EXISTS `cv_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `cv_permissions`
--

INSERT INTO `cv_permissions` (`permission_id`, `name`, `description`, `status`) VALUES
(1, 'Site.Signin.Allow', 'Allow users to login to the site', 'active'),
(2, 'Site.Content.View', 'Allow users to view the Content Context', 'active'),
(3, 'Site.Reports.View', 'Allow users to view the Reports Context', 'active'),
(4, 'Site.Settings.View', 'Allow users to view the Settings Context', 'active'),
(5, 'Site.Developer.View', 'Allow users to view the Developer Context', 'active'),
(6, 'Bonfire.Roles.Manage', 'Allow users to manage the user Roles', 'active'),
(7, 'Bonfire.Users.Manage', 'Allow users to manage the site Users', 'active'),
(8, 'Bonfire.Users.View', 'Allow users access to the User Settings', 'active'),
(9, 'Bonfire.Users.Add', 'Allow users to add new Users', 'active'),
(10, 'Bonfire.Database.Manage', 'Allow users to manage the Database settings', 'active'),
(11, 'Bonfire.Emailer.Manage', 'Allow users to manage the Emailer settings', 'active'),
(12, 'Bonfire.Logs.View', 'Allow users access to the Log details', 'active'),
(13, 'Bonfire.Logs.Manage', 'Allow users to manage the Log files', 'active'),
(14, 'Bonfire.Emailer.View', 'Allow users access to the Emailer settings', 'active'),
(15, 'Site.Signin.Offline', 'Allow users to login to the site when the site is offline', 'active'),
(16, 'Bonfire.Permissions.View', 'Allow access to view the Permissions menu unders Settings Context', 'active'),
(17, 'Bonfire.Permissions.Manage', 'Allow access to manage the Permissions in the system', 'active'),
(18, 'Bonfire.Roles.Delete', 'Allow users to delete user Roles', 'active'),
(19, 'Bonfire.Modules.Add', 'Allow creation of modules with the builder.', 'active'),
(20, 'Bonfire.Modules.Delete', 'Allow deletion of modules.', 'active'),
(21, 'Permissions.Administrator.Manage', 'To manage the access control permissions for the Administrator role.', 'active'),
(22, 'Permissions.Editor.Manage', 'To manage the access control permissions for the Editor role.', 'active'),
(24, 'Permissions.User.Manage', 'To manage the access control permissions for the User role.', 'active'),
(25, 'Permissions.Developer.Manage', 'To manage the access control permissions for the Developer role.', 'active'),
(27, 'Activities.Own.View', 'To view the users own activity logs', 'active'),
(28, 'Activities.Own.Delete', 'To delete the users own activity logs', 'active'),
(29, 'Activities.User.View', 'To view the user activity logs', 'active'),
(30, 'Activities.User.Delete', 'To delete the user activity logs, except own', 'active'),
(31, 'Activities.Module.View', 'To view the module activity logs', 'active'),
(32, 'Activities.Module.Delete', 'To delete the module activity logs', 'active'),
(33, 'Activities.Date.View', 'To view the users own activity logs', 'active'),
(34, 'Activities.Date.Delete', 'To delete the dated activity logs', 'active'),
(35, 'Bonfire.UI.Manage', 'Manage the Bonfire UI settings', 'active'),
(36, 'Bonfire.Settings.View', 'To view the site settings page.', 'active'),
(37, 'Bonfire.Settings.Manage', 'To manage the site settings.', 'active'),
(38, 'Bonfire.Activities.View', 'To view the Activities menu.', 'active'),
(39, 'Bonfire.Database.View', 'To view the Database menu.', 'active'),
(40, 'Bonfire.Migrations.View', 'To view the Migrations menu.', 'active'),
(41, 'Bonfire.Builder.View', 'To view the Modulebuilder menu.', 'active'),
(42, 'Bonfire.Roles.View', 'To view the Roles menu.', 'active'),
(43, 'Bonfire.Sysinfo.View', 'To view the System Information page.', 'active'),
(44, 'Bonfire.Translate.Manage', 'To manage the Language Translation.', 'active'),
(45, 'Bonfire.Translate.View', 'To view the Language Translate menu.', 'active'),
(46, 'Bonfire.UI.View', 'To view the UI/Keyboard Shortcut menu.', 'active'),
(47, 'Bonfire.Update.Manage', 'To manage the Bonfire Update.', 'active'),
(48, 'Bonfire.Update.View', 'To view the Developer Update menu.', 'active'),
(49, 'Bonfire.Profiler.View', 'To view the Console Profiler Bar.', 'active'),
(50, 'Bonfire.Roles.Add', 'To add New Roles', 'active'),
(55, 'Files.Content.View', '', 'active'),
(56, 'Files.Content.Create', '', 'active'),
(57, 'Files.Content.Edit', '', 'active'),
(58, 'Files.Content.Delete', '', 'active'),
(59, 'Files.Content.Download', '', 'active'),
(64, 'News.Content.View', '', 'active'),
(65, 'News.Content.Create', '', 'active'),
(66, 'News.Content.Edit', '', 'active'),
(67, 'News.Content.Delete', '', 'active'),
(68, 'Project.Content.View', '', 'active'),
(69, 'Project.Content.Create', '', 'active'),
(70, 'Project.Content.Edit', '', 'active'),
(71, 'Project.Content.Delete', '', 'active'),
(72, 'Marketing.Content.View', '', 'active'),
(73, 'Marketing.Content.Create', '', 'active'),
(74, 'Marketing.Content.Edit', '', 'active'),
(75, 'Marketing.Content.Delete', '', 'active'),
(80, 'About.Content.View', '', 'active'),
(81, 'About.Content.Create', '', 'active'),
(82, 'About.Content.Edit', '', 'active'),
(83, 'About.Content.Delete', '', 'active'),
(84, 'Career.Content.View', '', 'active'),
(85, 'Career.Content.Create', '', 'active'),
(86, 'Career.Content.Edit', '', 'active'),
(87, 'Career.Content.Delete', '', 'active'),
(88, 'Contact.Content.View', '', 'active'),
(89, 'Contact.Content.Create', '', 'active'),
(90, 'Contact.Content.Edit', '', 'active'),
(91, 'Contact.Content.Delete', '', 'active'),
(92, 'Banner.Content.View', '', 'active'),
(93, 'Banner.Content.Create', '', 'active'),
(94, 'Banner.Content.Edit', '', 'active'),
(95, 'Banner.Content.Delete', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cv_project_category`
--

DROP TABLE IF EXISTS `cv_project_category`;
CREATE TABLE IF NOT EXISTS `cv_project_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_project_category`
--

INSERT INTO `cv_project_category` (`id`, `title`, `description`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Residential', '<p>\r\n Residential</p>', 'residential', 0, '2013-04-07 11:49:14', '2013-04-07 11:50:54'),
(2, 'Commercial', '<p>\r\n Commercial</p>', 'commercial', 0, '2013-04-07 11:51:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_project_developer`
--

DROP TABLE IF EXISTS `cv_project_developer`;
CREATE TABLE IF NOT EXISTS `cv_project_developer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `highlight` enum('yes','no') NOT NULL DEFAULT 'no',
  `slug` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cv_project_developer`
--

INSERT INTO `cv_project_developer` (`id`, `title`, `description`, `highlight`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'One Balmoral', '<p>\r\n One Balmoral</p>', 'yes', 'one-balmoral', 0, '2013-04-14 18:44:02', '2013-04-20 15:53:41'),
(2, 'Setia Budi Sky Garden', '<p>\r\n Setia Budi Sky Garden</p>', 'yes', 'setia-budi-sky-garden', 0, '2013-04-20 15:37:50', '2013-04-20 15:53:46'),
(3, 'Izzara', '<p>\r\n Izzara</p>', 'yes', 'izzara', 0, '2013-04-20 15:38:28', '2013-04-20 15:53:33'),
(4, 'Cassamora', '<p>\r\n Cassamora</p>', 'no', 'cassamora', 0, '2013-04-20 15:38:42', '0000-00-00 00:00:00'),
(5, 'Serena Hills', '<p>\r\n Serena Hills</p>', 'no', 'serena-hills', 0, '2013-04-20 15:38:52', '0000-00-00 00:00:00'),
(6, 'Alila', '<p>\r\n Alila</p>', 'no', 'alila', 0, '2013-04-20 15:39:04', '0000-00-00 00:00:00'),
(7, 'Harris', '<p>\r\n Harris</p>', 'no', 'harris', 0, '2013-04-20 15:39:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_project_location`
--

DROP TABLE IF EXISTS `cv_project_location`;
CREATE TABLE IF NOT EXISTS `cv_project_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_project_location`
--

INSERT INTO `cv_project_location` (`id`, `title`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Indonesia', 'indonesia', 0, '2013-04-20 15:22:15', '0000-00-00 00:00:00'),
(2, 'Singapore', 'singapore', 0, '2013-04-20 15:22:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_project_property`
--

DROP TABLE IF EXISTS `cv_project_property`;
CREATE TABLE IF NOT EXISTS `cv_project_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `marketing_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `size` varchar(255) NOT NULL,
  `bedroom` int(11) NOT NULL DEFAULT '0',
  `facility` text NOT NULL,
  `condition` varchar(255) NOT NULL,
  `additional` text,
  `youtube` varchar(255) DEFAULT NULL,
  `vimeo` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cv_project_property`
--

INSERT INTO `cv_project_property` (`id`, `type_id`, `developer_id`, `location_id`, `marketing_id`, `title`, `address`, `size`, `bedroom`, `facility`, `condition`, `additional`, `youtube`, `vimeo`, `image_id`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, 1, 2, 2, 'One Balmoral 1', 'Balmoral Road (District 10)', '3000 m2', 5, '<p>\r\n Developed by Hong Leong Holdings Ltd, twin blocks of 12 storey apartments comprising of 91 apartments to be built on an approximately 6157m2 land. It offers a choice of 1, 2, 3 and 4 bedrooms, equipped with imported finishings.</p>\r\n<p>\r\n One Balmoral is strategically located at Balmoral Road (District 10) and within the greenery of neighbouring Goodwood Hill. One of Singapore&iacute;s premier schools, Raffles Girls&#39; Secondary School, is a stone&iacute;s throw away and you will be spoilt for choice with the private clubs available nearby, namely The Pines, the Tanglin Club and the American Club. One Balmoral is just minutes&iacute; drive away from ION Orchard and the shopping belt of Orchard Road.</p>\r\n<p>\r\n Currently, the piling is near completion and anticipated handing over is March 2015.</p>\r\n<ul>\r\n <li>\r\n  Total no. of units 91</li>\r\n <li>\r\n  Twin towers of 12 storeys plus attic</li>\r\n <li>\r\n  Car park lots 103, inclusive of 2 handicap lots at basement and first storey</li>\r\n <li>\r\n  Facilities &amp; Lap pool, clubhouse, meditation garden, gym, BBQ pavilions amongst others</li>\r\n</ul>', 'New', '<p>\r\n For more questions and inquiries please feel free to contact us in +62817 9999 199 or +62813 1848 9293</p>', 'YJ66_zLvE8k', '', 1, 'one-balmoral-1', 0, '2013-04-07 23:47:42', '2013-04-20 15:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `cv_project_property_gallery`
--

DROP TABLE IF EXISTS `cv_project_property_gallery`;
CREATE TABLE IF NOT EXISTS `cv_project_property_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `caption` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_project_property_gallery`
--

INSERT INTO `cv_project_property_gallery` (`id`, `property_id`, `file_id`, `caption`) VALUES
(1, 1, 2, '1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 1, 1, '2 Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

-- --------------------------------------------------------

--
-- Table structure for table `cv_project_type`
--

DROP TABLE IF EXISTS `cv_project_type`;
CREATE TABLE IF NOT EXISTS `cv_project_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cv_project_type`
--

INSERT INTO `cv_project_type` (`id`, `category_id`, `title`, `description`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, 'Apartement', '<p>\r\n Apartement</p>', 'apartement', 0, '2013-04-07 16:42:09', '2013-04-07 18:54:05'),
(2, 1, 'Condotel', '<p>\r\n Condotel</p>', 'condotel', 0, '2013-04-07 16:44:59', '0000-00-00 00:00:00'),
(3, 1, 'House', '<p>\r\n House</p>', 'house', 0, '2013-04-07 16:45:17', '0000-00-00 00:00:00'),
(4, 1, 'Villa', '<p>\r\n Villa</p>', 'villa', 0, '2013-04-07 16:45:28', '0000-00-00 00:00:00'),
(5, 2, 'Shop (Ruko)', '<p>\r\n Shop (Ruko)</p>', 'shop-ruko', 0, '2013-04-07 16:46:21', '0000-00-00 00:00:00'),
(6, 2, 'Office', '<p>\r\n Office</p>', 'office', 0, '2013-04-07 16:46:34', '0000-00-00 00:00:00'),
(7, 2, 'Factory', '<p>\r\n Factory</p>', 'factory', 0, '2013-04-07 16:46:47', '0000-00-00 00:00:00'),
(8, 2, 'Warehouse', '<p>\r\n Warehouse</p>', 'warehouse', 0, '2013-04-07 16:46:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_roles`
--

DROP TABLE IF EXISTS `cv_roles`;
CREATE TABLE IF NOT EXISTS `cv_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `default_context` varchar(255) NOT NULL DEFAULT 'content',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cv_roles`
--

INSERT INTO `cv_roles` (`role_id`, `role_name`, `description`, `default`, `can_delete`, `login_destination`, `deleted`, `default_context`) VALUES
(1, 'Administrator', 'Has full control over every aspect of the site.', 0, 0, 'admin/content', 0, 'content'),
(2, 'Editor', 'Can handle day-to-day management, but does not have full power.', 0, 1, '', 0, 'content'),
(4, 'User', 'This is the default user with access to login.', 1, 0, '', 0, 'content'),
(6, 'Developer', 'Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.', 0, 1, '', 0, 'content');

-- --------------------------------------------------------

--
-- Table structure for table `cv_role_permissions`
--

DROP TABLE IF EXISTS `cv_role_permissions`;
CREATE TABLE IF NOT EXISTS `cv_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cv_role_permissions`
--

INSERT INTO `cv_role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 24),
(1, 25),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(2, 1),
(2, 2),
(2, 3),
(4, 1),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 49);

-- --------------------------------------------------------

--
-- Table structure for table `cv_schema_version`
--

DROP TABLE IF EXISTS `cv_schema_version`;
CREATE TABLE IF NOT EXISTS `cv_schema_version` (
  `type` varchar(40) NOT NULL,
  `version` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cv_schema_version`
--

INSERT INTO `cv_schema_version` (`type`, `version`) VALUES
('about_', 2),
('app_', 0),
('banner_', 3),
('career_', 2),
('contact_', 2),
('core', 34),
('files_', 2),
('marketing_', 2),
('news_', 3),
('project_', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cv_sessions`
--

DROP TABLE IF EXISTS `cv_sessions`;
CREATE TABLE IF NOT EXISTS `cv_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cv_settings`
--

DROP TABLE IF EXISTS `cv_settings`;
CREATE TABLE IF NOT EXISTS `cv_settings` (
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `unique - name` (`name`),
  KEY `index - name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cv_settings`
--

INSERT INTO `cv_settings` (`name`, `module`, `value`) VALUES
('auth.allow_name_change', 'core', '1'),
('auth.allow_register', 'core', '0'),
('auth.allow_remember', 'core', '1'),
('auth.do_login_redirect', 'core', '1'),
('auth.login_type', 'core', 'both'),
('auth.name_change_frequency', 'core', '1'),
('auth.name_change_limit', 'core', '1'),
('auth.password_force_mixed_case', 'core', '0'),
('auth.password_force_numbers', 'core', '0'),
('auth.password_force_symbols', 'core', '0'),
('auth.password_min_length', 'core', '8'),
('auth.password_show_labels', 'core', '0'),
('auth.remember_length', 'core', '1209600'),
('auth.use_extended_profile', 'core', '0'),
('auth.use_usernames', 'core', '1'),
('auth.user_activation_method', 'core', '0'),
('form_save', 'core.ui', 'ctrl+s/⌘+s'),
('goto_content', 'core.ui', 'alt+c'),
('mailpath', 'email', '/usr/sbin/sendmail'),
('mailtype', 'email', 'text'),
('protocol', 'email', 'mail'),
('sender_email', 'email', 'andhikanovandi@gmail.com'),
('site.languages', 'core', 'a:3:{i:0;s:7:"english";i:1;s:7:"persian";i:2;s:10:"portuguese";}'),
('site.list_limit', 'core', '25'),
('site.show_front_profiler', 'core', '0'),
('site.show_profiler', 'core', '1'),
('site.status', 'core', '1'),
('site.system_email', 'core', 'andhikanovandi@gmail.com'),
('site.title', 'core', 'Cava Property'),
('smtp_host', 'email', ''),
('smtp_pass', 'email', ''),
('smtp_port', 'email', ''),
('smtp_timeout', 'email', ''),
('smtp_user', 'email', ''),
('updates.bleeding_edge', 'core', '1'),
('updates.do_check', 'core', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cv_users`
--

DROP TABLE IF EXISTS `cv_users`;
CREATE TABLE IF NOT EXISTS `cv_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `email` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` varchar(40) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `salt` varchar(7) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(40) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_message` varchar(255) DEFAULT NULL,
  `reset_by` int(10) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT '',
  `display_name_changed` date DEFAULT NULL,
  `timezone` char(4) NOT NULL DEFAULT 'UM6',
  `language` varchar(20) NOT NULL DEFAULT 'english',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activate_hash` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_users`
--

INSERT INTO `cv_users` (`id`, `role_id`, `email`, `username`, `password_hash`, `reset_hash`, `salt`, `last_login`, `last_ip`, `created_on`, `deleted`, `banned`, `ban_message`, `reset_by`, `display_name`, `display_name_changed`, `timezone`, `language`, `active`, `activate_hash`) VALUES
(1, 1, 'andhikanovandi@gmail.com', 'andhika', 'd8db64dfb1062b9200c4e57c51d0b736d5f57692', NULL, 'Seqx4Rm', '2013-04-21 01:04:28', '::1', '0000-00-00 00:00:00', 0, 0, NULL, NULL, 'Andhika Novandi Patria', NULL, 'UM6', 'english', 1, ''),
(2, 1, 'admin@bonfire.com', 'admin', '1d06325762c0707eb40517772e1eafd6838075ac', NULL, 'JoCRMtX', '0000-00-00 00:00:00', '', '2013-04-07 09:59:19', 0, 0, NULL, NULL, 'Administrator', NULL, 'UM6', 'english', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cv_user_cookies`
--

DROP TABLE IF EXISTS `cv_user_cookies`;
CREATE TABLE IF NOT EXISTS `cv_user_cookies` (
  `user_id` bigint(20) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cv_user_meta`
--

DROP TABLE IF EXISTS `cv_user_meta`;
CREATE TABLE IF NOT EXISTS `cv_user_meta` (
  `meta_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_value` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cv_user_meta`
--

INSERT INTO `cv_user_meta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 2, 'state', 'SC'),
(2, 2, 'country', 'US'),
(3, 2, 'type', 'small'),
(4, 1, 'state', 'SC'),
(5, 1, 'country', 'US'),
(6, 1, 'type', 'small');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
