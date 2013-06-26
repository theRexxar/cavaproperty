-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2013 at 11:25 PM
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
(1, 'Reynolds Darmadi', 'Founder', '<p>\n Gazing at the skyscrapers while meeting new people around, Reynolds founded &Ccedil;ava in 2010 to bridge those two different interests. He holds an MBA in Real Estate from the University of Aberdeen, UK and has been in the business from 2002. His experience in property consultants and developers both in a company and independently gives him insight to combine visions from them to create a better project and to match clients&rsquo; expectations.</p>', 3, 1, 0, '2013-04-14 22:38:13', '2013-04-26 06:46:05'),
(2, 'Vanessa Natalia', '', '<p>\r\n Dynamic and loves challenge, Vanessa joined &Ccedil;ava in 2012 after building an impressive reputation in Office Advisory and Sole Exclusive Agency Division by handling several big names in her previous works. She knows how to handle clients with different backgrounds and her managerial ability is also exceptional.</p>', 4, 5, 0, '2013-04-16 10:16:52', '2013-04-20 14:00:59'),
(3, 'Laura Loe', '', '<p>\r\n Graduated as bachelor in Marketing Management from Curtin University, Laura joined &Ccedil;ava in April 2011, soon-after the company was established. Her previous work was in one of the biggest property consultants in this country. Just like Benigna, she entered the business in 2003. This broad experience makes her work unquestionable.</p>', 5, 2, 0, '2013-04-16 10:58:24', '2013-04-20 14:01:23'),
(4, 'Benigna Maria (Noni)', 'Founder', '<p>\n Reliable, experienced, and professional. Benigna Maria (Noni) is a Mass Communication graduate from Curtin University, Western Australia and founded &Ccedil;ava together with Reynolds. As one of the CEO&#39;s, she possesses great knowledge, vision and understanding in the property business. Building her portfolio since 2003, she took responsibility as project leader in several prestigious projects before starting her own business.</p>', 7, 3, 0, '2013-04-16 10:58:51', '2013-04-26 06:46:22'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=535 ;

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
(144, 1, 'Updated record with ID: 4 : ::1', 'news', '2013-04-21 03:40:55', 0),
(145, 1, 'logged in from: ::1', 'users', '2013-04-21 13:33:39', 0),
(146, 1, 'modified user: Administrator', 'users', '2013-04-21 13:33:54', 0),
(147, 1, 'Updated record with ID: 1 : ::1', 'news', '2013-04-21 16:30:23', 0),
(148, 1, 'Updated record with ID: 1 : ::1', 'news', '2013-04-21 16:30:53', 0),
(149, 2, 'logged in from: 139.228.152.223', 'users', '2013-04-21 18:35:40', 0),
(150, 2, 'logged in from: 103.2.146.20', 'users', '2013-04-22 11:19:41', 0),
(151, 2, 'Created record with ID: 5 : 103.2.146.20', 'news', '2013-04-22 11:26:59', 0),
(152, 2, 'Created record with ID: 6 : 103.2.146.20', 'news', '2013-04-22 11:37:31', 0),
(153, 2, 'Updated record with ID: 6 : 103.2.146.20', 'news', '2013-04-22 11:39:00', 0),
(154, 2, 'Updated record with ID: 6 : 103.2.146.20', 'news', '2013-04-22 11:39:27', 0),
(155, 2, 'Created record with ID: 7 : 103.2.146.20', 'news', '2013-04-22 11:42:51', 0),
(156, 2, 'Updated record with ID: 6 : 103.2.146.20', 'news', '2013-04-22 11:56:35', 0),
(157, 2, 'Updated record with ID: 6 : 103.2.146.20', 'news', '2013-04-22 11:57:35', 0),
(158, 2, 'Created record with ID: 8 : 103.2.146.20', 'news', '2013-04-22 12:03:24', 0),
(159, 2, 'Created record with ID: 9 : 103.2.146.20', 'news', '2013-04-22 12:08:15', 0),
(160, 2, 'Created record with ID: 10 : 103.2.146.20', 'news', '2013-04-22 12:13:43', 0),
(161, 2, 'Created record with ID: 11 : 103.2.146.20', 'news', '2013-04-22 12:16:58', 0),
(162, 2, 'Created record with ID: 12 : 103.2.146.20', 'news', '2013-04-22 12:52:58', 0),
(163, 2, 'Created record with ID: 13 : 103.2.146.20', 'news', '2013-04-22 13:06:40', 0),
(164, 1, 'logged in from: 103.2.146.20', 'users', '2013-04-22 14:05:28', 0),
(165, 1, 'Updated record with ID: 1 : 103.2.146.20', 'project', '2013-04-22 14:15:56', 0),
(166, 1, 'Delete File: 1 : 103.2.146.20', 'files', '2013-04-22 14:16:48', 0),
(167, 1, 'Delete File: 2 : 103.2.146.20', 'files', '2013-04-22 14:16:54', 0),
(168, 1, 'Create File Folder: 5 : 103.2.146.20', 'files folders', '2013-04-22 14:17:13', 0),
(169, 1, 'Create File Folder: 6 : 103.2.146.20', 'files folders', '2013-04-22 14:17:35', 0),
(170, 1, 'Create File Folder: 7 : 103.2.146.20', 'files folders', '2013-04-22 14:17:46', 0),
(171, 1, 'Create File Folder: 8 : 103.2.146.20', 'files folders', '2013-04-22 14:17:55', 0),
(172, 1, 'Create File Folder: 9 : 103.2.146.20', 'files folders', '2013-04-22 14:18:04', 0),
(173, 2, 'Created record with ID: 14 : 103.2.146.20', 'news', '2013-04-22 14:18:05', 0),
(174, 1, 'Edit File Folder: 9 : 103.2.146.20', 'files folders', '2013-04-22 14:18:16', 0),
(175, 1, 'Create File Folder: 10 : 103.2.146.20', 'files folders', '2013-04-22 14:18:31', 0),
(176, 1, 'Create File Folder: 11 : 103.2.146.20', 'files folders', '2013-04-22 14:18:44', 0),
(177, 1, 'Upload File: 66 : 103.2.146.20', 'files', '2013-04-22 14:19:57', 0),
(178, 1, 'Upload File: 67 : 103.2.146.20', 'files', '2013-04-22 14:19:57', 0),
(179, 1, 'Upload File: 68 : 103.2.146.20', 'files', '2013-04-22 14:19:57', 0),
(180, 1, 'Upload File: 69 : 103.2.146.20', 'files', '2013-04-22 14:19:58', 0),
(181, 1, 'Upload File: 70 : 103.2.146.20', 'files', '2013-04-22 14:19:58', 0),
(182, 1, 'Upload File: 71 : 103.2.146.20', 'files', '2013-04-22 14:19:58', 0),
(183, 1, 'Upload File: 72 : 103.2.146.20', 'files', '2013-04-22 14:20:00', 0),
(184, 1, 'Upload File: 73 : 103.2.146.20', 'files', '2013-04-22 14:20:57', 0),
(185, 1, 'Upload File: 74 : 103.2.146.20', 'files', '2013-04-22 14:20:58', 0),
(186, 1, 'Upload File: 75 : 103.2.146.20', 'files', '2013-04-22 14:21:45', 0),
(187, 1, 'Upload File: 76 : 103.2.146.20', 'files', '2013-04-22 14:21:49', 0),
(188, 2, 'Create File Folder: 12 : 103.2.146.20', 'files folders', '2013-04-22 14:21:56', 0),
(189, 2, 'Upload File: 77 : 103.2.146.20', 'files', '2013-04-22 14:23:46', 0),
(190, 2, 'Upload File: 78 : 103.2.146.20', 'files', '2013-04-22 14:23:49', 0),
(191, 2, 'Upload File: 79 : 103.2.146.20', 'files', '2013-04-22 14:23:50', 0),
(192, 2, 'Upload File: 80 : 103.2.146.20', 'files', '2013-04-22 14:23:51', 0),
(193, 2, 'Upload File: 81 : 103.2.146.20', 'files', '2013-04-22 14:23:51', 0),
(194, 2, 'Upload File: 82 : 103.2.146.20', 'files', '2013-04-22 14:23:51', 0),
(195, 1, 'Upload File: 83 : 103.2.146.20', 'files', '2013-04-22 14:23:54', 0),
(196, 1, 'Upload File: 84 : 103.2.146.20', 'files', '2013-04-22 14:23:55', 0),
(197, 1, 'Upload File: 85 : 103.2.146.20', 'files', '2013-04-22 14:23:55', 0),
(198, 1, 'Upload File: 86 : 103.2.146.20', 'files', '2013-04-22 14:23:55', 0),
(199, 1, 'Upload File: 87 : 103.2.146.20', 'files', '2013-04-22 14:23:56', 0),
(200, 1, 'Upload File: 88 : 103.2.146.20', 'files', '2013-04-22 14:23:56', 0),
(201, 1, 'Upload File: 89 : 103.2.146.20', 'files', '2013-04-22 14:23:57', 0),
(202, 1, 'Upload File: 90 : 103.2.146.20', 'files', '2013-04-22 14:24:41', 0),
(203, 1, 'Upload File: 91 : 103.2.146.20', 'files', '2013-04-22 14:24:43', 0),
(204, 1, 'Upload File: 92 : 103.2.146.20', 'files', '2013-04-22 14:24:43', 0),
(205, 1, 'Upload File: 93 : 103.2.146.20', 'files', '2013-04-22 14:24:44', 0),
(206, 1, 'Upload File: 94 : 103.2.146.20', 'files', '2013-04-22 14:24:44', 0),
(207, 1, 'Upload File: 95 : 103.2.146.20', 'files', '2013-04-22 14:24:45', 0),
(208, 1, 'Upload File: 96 : 103.2.146.20', 'files', '2013-04-22 14:24:46', 0),
(209, 1, 'Upload File: 97 : 103.2.146.20', 'files', '2013-04-22 14:24:47', 0),
(210, 1, 'Upload File: 98 : 103.2.146.20', 'files', '2013-04-22 14:24:47', 0),
(211, 1, 'Upload File: 99 : 103.2.146.20', 'files', '2013-04-22 14:24:48', 0),
(212, 1, 'Upload File: 100 : 103.2.146.20', 'files', '2013-04-22 14:24:48', 0),
(213, 1, 'Updated record with ID: 1 : 103.2.146.20', 'project', '2013-04-22 14:26:17', 0),
(214, 1, 'Updated record with ID: 1 : 103.2.146.20', 'project', '2013-04-22 14:27:36', 0),
(215, 2, 'Created record with ID: 15 : 103.2.146.20', 'news', '2013-04-22 14:29:11', 0),
(216, 2, 'Upload File: 102 : 103.2.146.20', 'files', '2013-04-22 14:29:36', 0),
(217, 2, 'Upload File: 103 : 103.2.146.20', 'files', '2013-04-22 14:30:52', 0),
(218, 2, 'Upload File: 104 : 103.2.146.20', 'files', '2013-04-22 14:30:53', 0),
(219, 2, 'Created record with ID: 16 : 103.2.146.20', 'news', '2013-04-22 14:32:06', 0),
(220, 2, 'Updated record with ID: 16 : 103.2.146.20', 'news', '2013-04-22 14:32:25', 0),
(221, 2, 'Upload File: 105 : 103.2.146.20', 'files', '2013-04-22 14:34:03', 0),
(222, 2, 'Upload File: 106 : 103.2.146.20', 'files', '2013-04-22 14:34:03', 0),
(223, 2, 'Upload File: 107 : 103.2.146.20', 'files', '2013-04-22 14:34:03', 0),
(224, 2, 'Upload File: 108 : 103.2.146.20', 'files', '2013-04-22 14:34:04', 0),
(225, 2, 'Upload File: 109 : 103.2.146.20', 'files', '2013-04-22 14:34:04', 0),
(226, 2, 'Upload File: 110 : 103.2.146.20', 'files', '2013-04-22 14:34:04', 0),
(227, 2, 'Created record with ID: 17 : 103.2.146.20', 'news', '2013-04-22 14:36:54', 0),
(228, 2, 'Upload File: 111 : 103.2.146.20', 'files', '2013-04-22 14:38:26', 0),
(229, 2, 'Upload File: 112 : 103.2.146.20', 'files', '2013-04-22 14:38:29', 0),
(230, 2, 'Upload File: 113 : 103.2.146.20', 'files', '2013-04-22 14:38:32', 0),
(231, 2, 'Created record with ID: 18 : 103.2.146.20', 'news', '2013-04-22 14:40:44', 0),
(232, 2, 'Upload File: 114 : 103.2.146.20', 'files', '2013-04-22 14:42:06', 0),
(233, 2, 'Upload File: 115 : 103.2.146.20', 'files', '2013-04-22 14:42:07', 0),
(234, 2, 'Upload File: 116 : 103.2.146.20', 'files', '2013-04-22 14:42:07', 0),
(235, 2, 'Upload File: 117 : 103.2.146.20', 'files', '2013-04-22 14:42:07', 0),
(236, 2, 'Upload File: 118 : 103.2.146.20', 'files', '2013-04-22 14:42:07', 0),
(237, 2, 'Upload File: 119 : 103.2.146.20', 'files', '2013-04-22 14:42:11', 0),
(238, 2, 'Upload File: 120 : 103.2.146.20', 'files', '2013-04-22 14:42:19', 0),
(239, 2, 'Created record with ID: 19 : 103.2.146.20', 'news', '2013-04-22 14:44:33', 0),
(240, 2, 'Upload File: 121 : 103.2.146.20', 'files', '2013-04-22 14:45:32', 0),
(241, 2, 'Upload File: 122 : 103.2.146.20', 'files', '2013-04-22 14:45:33', 0),
(242, 2, 'Upload File: 123 : 103.2.146.20', 'files', '2013-04-22 14:45:33', 0),
(243, 2, 'Upload File: 124 : 103.2.146.20', 'files', '2013-04-22 14:45:33', 0),
(244, 2, 'Upload File: 125 : 103.2.146.20', 'files', '2013-04-22 14:45:34', 0),
(245, 2, 'Upload File: 126 : 103.2.146.20', 'files', '2013-04-22 14:45:39', 0),
(246, 2, 'Created record with ID: 20 : 103.2.146.20', 'news', '2013-04-22 14:47:57', 0),
(247, 2, 'Upload File: 127 : 103.2.146.20', 'files', '2013-04-22 14:48:53', 0),
(248, 2, 'Upload File: 128 : 103.2.146.20', 'files', '2013-04-22 14:48:53', 0),
(249, 2, 'Upload File: 129 : 103.2.146.20', 'files', '2013-04-22 14:48:53', 0),
(250, 2, 'Upload File: 130 : 103.2.146.20', 'files', '2013-04-22 14:48:53', 0),
(251, 2, 'Created record with ID: 21 : 103.2.146.20', 'news', '2013-04-22 14:50:25', 0),
(252, 2, 'Upload File: 131 : 103.2.146.20', 'files', '2013-04-22 14:55:09', 0),
(253, 2, 'Upload File: 132 : 103.2.146.20', 'files', '2013-04-22 14:55:10', 0),
(254, 2, 'Upload File: 133 : 103.2.146.20', 'files', '2013-04-22 14:55:10', 0),
(255, 2, 'Upload File: 134 : 103.2.146.20', 'files', '2013-04-22 14:55:11', 0),
(256, 2, 'Upload File: 135 : 103.2.146.20', 'files', '2013-04-22 14:55:15', 0),
(257, 2, 'Upload File: 136 : 103.2.146.20', 'files', '2013-04-22 14:55:19', 0),
(258, 2, 'Upload File: 137 : 103.2.146.20', 'files', '2013-04-22 14:55:31', 0),
(259, 2, 'Upload File: 138 : 103.2.146.20', 'files', '2013-04-22 14:55:32', 0),
(260, 2, 'Upload File: 139 : 103.2.146.20', 'files', '2013-04-22 14:55:39', 0),
(261, 2, 'Upload File: 140 : 103.2.146.20', 'files', '2013-04-22 14:55:40', 0),
(262, 2, 'Upload File: 141 : 103.2.146.20', 'files', '2013-04-22 14:55:42', 0),
(263, 2, 'Upload File: 142 : 103.2.146.20', 'files', '2013-04-22 14:55:51', 0),
(264, 2, 'Upload File: 143 : 103.2.146.20', 'files', '2013-04-22 14:56:05', 0),
(265, 2, 'Upload File: 144 : 103.2.146.20', 'files', '2013-04-22 14:56:06', 0),
(266, 2, 'Upload File: 145 : 103.2.146.20', 'files', '2013-04-22 14:56:07', 0),
(267, 2, 'Upload File: 146 : 103.2.146.20', 'files', '2013-04-22 14:56:09', 0),
(268, 2, 'Upload File: 147 : 103.2.146.20', 'files', '2013-04-22 14:56:10', 0),
(269, 2, 'Upload File: 148 : 103.2.146.20', 'files', '2013-04-22 14:56:10', 0),
(270, 2, 'Upload File: 149 : 103.2.146.20', 'files', '2013-04-22 14:56:28', 0),
(271, 2, 'Upload File: 150 : 103.2.146.20', 'files', '2013-04-22 14:56:42', 0),
(272, 2, 'Created record with ID: 22 : 103.2.146.20', 'news', '2013-04-22 15:01:12', 0),
(273, 2, 'Upload File: 151 : 103.2.146.20', 'files', '2013-04-22 15:03:07', 0),
(274, 2, 'Upload File: 152 : 103.2.146.20', 'files', '2013-04-22 15:03:08', 0),
(275, 2, 'Upload File: 153 : 103.2.146.20', 'files', '2013-04-22 15:03:08', 0),
(276, 2, 'Upload File: 154 : 103.2.146.20', 'files', '2013-04-22 15:03:08', 0),
(277, 2, 'Upload File: 155 : 103.2.146.20', 'files', '2013-04-22 15:03:08', 0),
(278, 2, 'Upload File: 156 : 103.2.146.20', 'files', '2013-04-22 15:03:08', 0),
(279, 2, 'Created record with ID: 23 : 103.2.146.20', 'news', '2013-04-22 15:04:11', 0),
(280, 2, 'Upload File: 157 : 103.2.146.20', 'files', '2013-04-22 15:05:23', 0),
(281, 2, 'Upload File: 158 : 103.2.146.20', 'files', '2013-04-22 15:05:24', 0),
(282, 2, 'Upload File: 159 : 103.2.146.20', 'files', '2013-04-22 15:05:24', 0),
(283, 2, 'Upload File: 160 : 103.2.146.20', 'files', '2013-04-22 15:05:24', 0),
(284, 2, 'Upload File: 161 : 103.2.146.20', 'files', '2013-04-22 15:05:24', 0),
(285, 2, 'Upload File: 162 : 103.2.146.20', 'files', '2013-04-22 15:05:24', 0),
(286, 2, 'Created record with ID: 24 : 103.2.146.20', 'news', '2013-04-22 15:07:40', 0),
(287, 2, 'Upload File: 163 : 103.2.146.20', 'files', '2013-04-22 15:08:54', 0),
(288, 2, 'Upload File: 164 : 103.2.146.20', 'files', '2013-04-22 15:08:54', 0),
(289, 2, 'Upload File: 165 : 103.2.146.20', 'files', '2013-04-22 15:08:54', 0),
(290, 2, 'Upload File: 166 : 103.2.146.20', 'files', '2013-04-22 15:08:54', 0),
(291, 2, 'Created record with ID: 25 : 103.2.146.20', 'news', '2013-04-22 15:10:55', 0),
(292, 2, 'Updated record with ID: 24 : 103.2.146.20', 'news', '2013-04-22 15:11:57', 0),
(293, 2, 'Upload File: 167 : 103.2.146.20', 'files', '2013-04-22 15:12:45', 0),
(294, 2, 'Upload File: 168 : 103.2.146.20', 'files', '2013-04-22 15:12:45', 0),
(295, 2, 'Upload File: 169 : 103.2.146.20', 'files', '2013-04-22 15:12:46', 0),
(296, 2, 'Upload File: 170 : 103.2.146.20', 'files', '2013-04-22 15:12:49', 0),
(297, 2, 'Created record with ID: 26 : 103.2.146.20', 'news', '2013-04-22 15:13:53', 0),
(298, 2, 'Upload File: 171 : 103.2.146.20', 'files', '2013-04-22 15:15:43', 0),
(299, 2, 'Upload File: 172 : 103.2.146.20', 'files', '2013-04-22 15:15:43', 0),
(300, 2, 'Upload File: 173 : 103.2.146.20', 'files', '2013-04-22 15:15:43', 0),
(301, 2, 'Created record with ID: 27 : 103.2.146.20', 'news', '2013-04-22 15:16:39', 0),
(302, 2, 'Upload File: 174 : 103.2.146.20', 'files', '2013-04-22 15:18:24', 0),
(303, 2, 'Upload File: 175 : 103.2.146.20', 'files', '2013-04-22 15:18:25', 0),
(304, 2, 'Upload File: 176 : 103.2.146.20', 'files', '2013-04-22 15:18:25', 0),
(305, 2, 'Upload File: 177 : 103.2.146.20', 'files', '2013-04-22 15:18:25', 0),
(306, 2, 'Upload File: 178 : 103.2.146.20', 'files', '2013-04-22 15:18:25', 0),
(307, 2, 'Upload File: 179 : 103.2.146.20', 'files', '2013-04-22 15:18:25', 0),
(308, 2, 'Created record with ID: 28 : 103.2.146.20', 'news', '2013-04-22 15:19:32', 0),
(309, 2, 'Upload File: 180 : 103.2.146.20', 'files', '2013-04-22 15:20:32', 0),
(310, 2, 'Upload File: 181 : 103.2.146.20', 'files', '2013-04-22 15:20:33', 0),
(311, 2, 'Upload File: 182 : 103.2.146.20', 'files', '2013-04-22 15:20:33', 0),
(312, 2, 'Upload File: 183 : 103.2.146.20', 'files', '2013-04-22 15:20:34', 0),
(313, 2, 'Upload File: 184 : 103.2.146.20', 'files', '2013-04-22 15:20:34', 0),
(314, 2, 'Upload File: 185 : 103.2.146.20', 'files', '2013-04-22 15:20:34', 0),
(315, 2, 'Upload File: 186 : 103.2.146.20', 'files', '2013-04-22 15:20:35', 0),
(316, 2, 'Upload File: 187 : 103.2.146.20', 'files', '2013-04-22 15:20:36', 0),
(317, 2, 'Upload File: 188 : 103.2.146.20', 'files', '2013-04-22 15:20:37', 0),
(318, 2, 'Upload File: 189 : 103.2.146.20', 'files', '2013-04-22 15:20:38', 0),
(319, 2, 'Created record with ID: 29 : 103.2.146.20', 'news', '2013-04-22 15:25:27', 0),
(320, 2, 'Upload File: 190 : 103.2.146.20', 'files', '2013-04-22 15:27:26', 0),
(321, 2, 'Upload File: 191 : 103.2.146.20', 'files', '2013-04-22 15:27:26', 0),
(322, 2, 'Upload File: 192 : 103.2.146.20', 'files', '2013-04-22 15:27:26', 0),
(323, 2, 'Upload File: 193 : 103.2.146.20', 'files', '2013-04-22 15:27:26', 0),
(324, 2, 'Upload File: 194 : 103.2.146.20', 'files', '2013-04-22 15:27:26', 0),
(325, 2, 'Upload File: 195 : 103.2.146.20', 'files', '2013-04-22 15:27:26', 0),
(326, 2, 'Upload File: 196 : 103.2.146.20', 'files', '2013-04-22 15:27:28', 0),
(327, 2, 'Upload File: 197 : 103.2.146.20', 'files', '2013-04-22 15:27:28', 0),
(328, 2, 'Upload File: 198 : 103.2.146.20', 'files', '2013-04-22 15:27:29', 0),
(329, 2, 'Created record with ID: 30 : 103.2.146.20', 'news', '2013-04-22 15:29:33', 0),
(330, 2, 'Updated record with ID: 29 : 103.2.146.20', 'news', '2013-04-22 15:29:48', 0),
(331, 2, 'Upload File: 199 : 103.2.146.20', 'files', '2013-04-22 15:31:41', 0),
(332, 2, 'Upload File: 200 : 103.2.146.20', 'files', '2013-04-22 15:31:42', 0),
(333, 2, 'Upload File: 201 : 103.2.146.20', 'files', '2013-04-22 15:31:42', 0),
(334, 2, 'Upload File: 202 : 103.2.146.20', 'files', '2013-04-22 15:31:42', 0),
(335, 2, 'Upload File: 203 : 103.2.146.20', 'files', '2013-04-22 15:31:42', 0),
(336, 2, 'Upload File: 204 : 103.2.146.20', 'files', '2013-04-22 15:31:42', 0),
(337, 2, 'Upload File: 205 : 103.2.146.20', 'files', '2013-04-22 15:31:43', 0),
(338, 2, 'Upload File: 206 : 103.2.146.20', 'files', '2013-04-22 15:31:44', 0),
(339, 2, 'Created record with ID: 31 : 103.2.146.20', 'news', '2013-04-22 15:33:03', 0),
(340, 2, 'Updated record with ID: 31 : 103.2.146.20', 'news', '2013-04-22 15:33:36', 0),
(341, 2, 'Upload File: 208 : 103.2.146.20', 'files', '2013-04-22 15:35:11', 0),
(342, 2, 'Upload File: 207 : 103.2.146.20', 'files', '2013-04-22 15:35:11', 0),
(343, 2, 'Upload File: 209 : 103.2.146.20', 'files', '2013-04-22 15:35:11', 0),
(344, 2, 'Upload File: 210 : 103.2.146.20', 'files', '2013-04-22 15:35:11', 0),
(345, 2, 'Upload File: 211 : 103.2.146.20', 'files', '2013-04-22 15:35:11', 0),
(346, 2, 'Created record with ID: 32 : 103.2.146.20', 'news', '2013-04-22 15:36:01', 0),
(347, 1, 'Created record with ID: 1 : 103.2.146.20', 'project', '2013-04-22 15:36:59', 0),
(348, 2, 'Updated record with ID: 5 : 103.2.146.20', 'news', '2013-04-22 15:37:03', 0),
(349, 2, 'Updated record with ID: 6 : 103.2.146.20', 'news', '2013-04-22 15:37:34', 0),
(350, 2, 'Updated record with ID: 7 : 103.2.146.20', 'news', '2013-04-22 15:38:09', 0),
(351, 2, 'Updated record with ID: 8 : 103.2.146.20', 'news', '2013-04-22 15:38:39', 0),
(352, 2, 'Updated record with ID: 9 : 103.2.146.20', 'news', '2013-04-22 15:39:16', 0),
(353, 2, 'Updated record with ID: 10 : 103.2.146.20', 'news', '2013-04-22 15:39:38', 0),
(354, 2, 'Updated record with ID: 11 : 103.2.146.20', 'news', '2013-04-22 15:40:18', 0),
(355, 2, 'Updated record with ID: 12 : 103.2.146.20', 'news', '2013-04-22 15:40:51', 0),
(356, 2, 'Updated record with ID: 13 : 103.2.146.20', 'news', '2013-04-22 15:41:21', 0),
(357, 2, 'Updated record with ID: 28 : 103.2.146.20', 'news', '2013-04-22 15:44:20', 0),
(358, 2, 'Created record with ID: 3 : 103.2.146.20', 'marketing', '2013-04-22 16:10:39', 0),
(359, 2, 'Created record with ID: 4 : 103.2.146.20', 'marketing', '2013-04-22 16:11:44', 0),
(360, 2, 'Created record with ID: 5 : 103.2.146.20', 'marketing', '2013-04-22 16:12:28', 0),
(361, 2, 'Created record with ID: 6 : 103.2.146.20', 'marketing', '2013-04-22 16:13:07', 0),
(362, 2, 'Created record with ID: 7 : 103.2.146.20', 'marketing', '2013-04-22 16:13:39', 0),
(363, 1, 'logged in from: 103.2.146.20', 'users', '2013-04-22 18:24:04', 0),
(364, 1, 'Create File Folder: 13 : 103.2.146.20', 'files folders', '2013-04-22 18:26:28', 0),
(365, 1, 'Upload File: 212 : 103.2.146.20', 'files', '2013-04-22 18:26:49', 0),
(366, 1, 'Upload File: 213 : 103.2.146.20', 'files', '2013-04-22 18:26:49', 0),
(367, 1, 'Upload File: 214 : 103.2.146.20', 'files', '2013-04-22 18:26:49', 0),
(368, 1, 'Upload File: 215 : 103.2.146.20', 'files', '2013-04-22 18:26:55', 0),
(369, 1, 'Upload File: 216 : 103.2.146.20', 'files', '2013-04-22 18:26:55', 0),
(370, 1, 'Upload File: 217 : 103.2.146.20', 'files', '2013-04-22 18:26:55', 0),
(371, 1, 'Upload File: 218 : 103.2.146.20', 'files', '2013-04-22 18:27:01', 0),
(372, 1, 'Updated record with ID: 3 : 103.2.146.20', 'project', '2013-04-22 18:32:55', 0),
(373, 1, 'Updated record with ID: 1 : 103.2.146.20', 'banner', '2013-04-22 19:01:13', 0),
(374, 1, 'Updated record with ID: 2 : 103.2.146.20', 'banner', '2013-04-22 19:01:52', 0),
(375, 1, 'Created record with ID: 3 : 103.2.146.20', 'banner', '2013-04-22 19:02:32', 0),
(376, 1, 'logged in from: ::1', 'users', '2013-04-23 07:39:31', 0),
(377, 1, 'logged in from: ::1', 'users', '2013-04-24 05:54:50', 0),
(378, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 05:57:42', 0),
(379, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 05:59:10', 0),
(380, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:01:44', 0),
(381, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:21:50', 0),
(382, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:23:59', 0),
(383, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:28:19', 0),
(384, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:28:28', 0),
(385, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:28:48', 0),
(386, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:29:52', 0),
(387, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:30:10', 0),
(388, 1, 'Delete File: 15 : ::1', 'files', '2013-04-24 06:33:33', 0),
(389, 1, 'Delete File: 21 : ::1', 'files', '2013-04-24 06:33:37', 0),
(390, 1, 'Delete File: 25 : ::1', 'files', '2013-04-24 06:33:38', 0),
(391, 1, 'Delete File: 43 : ::1', 'files', '2013-04-24 06:33:39', 0),
(392, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 06:35:49', 0),
(393, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:42:28', 0),
(394, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:43:17', 0),
(395, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:45:18', 0),
(396, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:47:05', 0),
(397, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:47:19', 0),
(398, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:47:29', 0),
(399, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:48:04', 0),
(400, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:48:12', 0),
(401, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:48:17', 0),
(402, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:48:40', 0),
(403, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:49:47', 0),
(404, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:49:56', 0),
(405, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:50:13', 0),
(406, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:50:23', 0),
(407, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:51:16', 0),
(408, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:51:31', 0),
(409, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:51:54', 0),
(410, 1, 'Updated record with ID: 5 : ::1', 'news', '2013-04-24 11:52:09', 0),
(411, 1, 'Updated record with ID: 3 : ::1', 'project', '2013-04-24 10:35:33', 0),
(412, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-24 10:36:50', 0),
(413, 1, 'Updated record with ID: 5 : ::1', 'project', '2013-04-24 10:51:30', 0),
(414, 1, 'Updated record with ID: 6 : ::1', 'project', '2013-04-24 10:51:40', 0),
(415, 1, 'Updated record with ID: 1 : ::1', 'project', '2013-04-24 10:51:49', 0),
(416, 1, 'Updated record with ID: 2 : ::1', 'project', '2013-04-24 10:55:53', 0),
(417, 1, 'Updated record with ID: 4 : ::1', 'project', '2013-04-24 10:55:59', 0),
(418, 1, 'Updated record with ID: 5 : ::1', 'project', '2013-04-24 10:56:16', 0),
(419, 2, 'logged in from: 39.195.27.47', 'users', '2013-04-24 20:58:44', 0),
(420, 2, 'logged in from: 118.99.83.168', 'users', '2013-04-25 10:51:04', 0),
(421, 2, 'logged in from: 118.99.83.168', 'users', '2013-04-25 11:54:26', 0),
(422, 2, 'logged in from: 103.2.146.20', 'users', '2013-04-25 12:10:29', 0),
(423, 2, 'Updated record with ID: 1 : 103.2.146.20', 'banner', '2013-04-25 12:22:44', 0),
(424, 2, 'Updated record with ID: 3 : 103.2.146.20', 'banner', '2013-04-25 12:23:43', 0),
(425, 2, 'Updated record with ID: 4 : 118.99.83.168', 'about', '2013-04-25 12:28:54', 0),
(426, 2, 'Updated record with ID: 1 : 118.99.83.168', 'banner', '2013-04-25 12:38:23', 0),
(427, 2, 'Updated record with ID: 2 : 118.99.83.168', 'banner', '2013-04-25 12:39:53', 0),
(428, 2, 'Updated record with ID: 6 : 118.99.83.168', 'project', '2013-04-25 12:48:40', 0),
(429, 2, 'Updated record with ID: 6 : 118.99.83.168', 'project', '2013-04-25 13:19:50', 0),
(430, 2, 'Created record with ID: 7 : 118.99.83.168', 'project', '2013-04-25 13:26:33', 0),
(431, 2, 'Updated record with ID: 6 : 118.99.83.168', 'project', '2013-04-25 13:27:19', 0),
(432, 2, 'Updated record with ID: 7 : 118.99.83.168', 'project', '2013-04-25 13:45:48', 0),
(433, 2, 'Created record with ID: 8 : 118.99.83.168', 'project', '2013-04-25 13:48:18', 0),
(434, 2, 'Created record with ID: 8 : 118.99.83.168', 'project', '2013-04-25 13:52:58', 0),
(435, 2, 'Updated record with ID: 8 : 118.99.83.168', 'project', '2013-04-25 13:53:30', 0),
(436, 2, 'logged in from: 118.99.83.168', 'users', '2013-04-26 06:42:58', 0),
(437, 2, 'Updated record with ID: 1 : 118.99.83.168', 'about', '2013-04-26 06:46:05', 0),
(438, 2, 'Updated record with ID: 4 : 118.99.83.168', 'about', '2013-04-26 06:46:22', 0),
(439, 2, 'Created record with ID: 9 : 118.99.83.168', 'project', '2013-04-26 07:00:52', 0),
(440, 2, 'Updated record with ID: 9 : 118.99.83.168', 'project', '2013-04-26 07:01:51', 0),
(441, 2, 'Updated record with ID: 9 : 118.99.83.168', 'project', '2013-04-26 07:05:36', 0),
(442, 2, 'Updated record with ID: 9 : 118.99.83.168', 'project', '2013-04-26 07:06:24', 0),
(443, 2, 'Updated record with ID: 4 : 118.99.83.168', 'project', '2013-04-26 07:06:52', 0),
(444, 2, 'Updated record with ID: 5 : 118.99.83.168', 'project', '2013-04-26 07:18:29', 0),
(445, 2, 'Updated record with ID: 5 : 118.99.83.168', 'project', '2013-04-26 07:19:33', 0),
(446, 2, 'Updated record with ID: 5 : 118.99.83.168', 'project', '2013-04-26 07:26:01', 0),
(447, 2, 'Updated record with ID: 3 : 118.99.83.168', 'banner', '2013-04-26 07:26:41', 0),
(448, 2, 'Updated record with ID: 4 : 118.99.83.168', 'project', '2013-04-26 07:32:12', 0),
(449, 2, 'Updated record with ID: 4 : 118.99.83.168', 'project', '2013-04-26 07:32:22', 0),
(450, 2, 'Deleted record with ID: 3 : 118.99.83.168', 'project', '2013-04-26 07:46:41', 0),
(451, 2, 'Updated record with ID: 1 : 118.99.83.168', 'project', '2013-04-26 07:56:39', 0),
(452, 2, 'Updated record with ID: 1 : 118.99.83.168', 'project', '2013-04-26 07:56:54', 0),
(453, 2, 'Deleted record with ID: 20 : 118.99.83.168', 'news', '2013-04-26 08:03:14', 0),
(454, 2, 'Deleted record with ID: 19 : 118.99.83.168', 'news', '2013-04-26 08:03:28', 0),
(455, 2, 'Deleted record with ID: 23 : 118.99.83.168', 'news', '2013-04-26 08:04:15', 0),
(456, 2, 'Deleted record with ID: 25 : 118.99.83.168', 'news', '2013-04-26 08:04:47', 0),
(457, 2, 'Deleted record with ID: 26 : 118.99.83.168', 'news', '2013-04-26 08:05:21', 0),
(458, 2, 'Updated record with ID: 3 : 118.99.83.168', 'career', '2013-04-26 08:07:34', 0),
(459, 2, 'Updated record with ID: 3 : 118.99.83.168', 'career', '2013-04-26 08:08:44', 0),
(460, 2, 'Updated record with ID: 3 : 118.99.83.168', 'career', '2013-04-26 08:08:55', 0),
(461, 2, 'Updated record with ID: 2 : 118.99.83.168', 'career', '2013-04-26 08:10:26', 0),
(462, 2, 'Updated record with ID: 2 : 118.99.83.168', 'career', '2013-04-26 08:11:00', 0),
(463, 2, 'Updated record with ID: 2 : 118.99.83.168', 'career', '2013-04-26 08:11:12', 0),
(464, 2, 'Updated record with ID: 1 : 118.99.83.168', 'career', '2013-04-26 08:12:38', 0),
(465, 2, 'Updated record with ID: 1 : 118.99.83.168', 'career', '2013-04-26 08:13:15', 0),
(466, 2, 'Updated record with ID: 1 : 118.99.83.168', 'career', '2013-04-26 08:13:59', 0),
(467, 2, 'Updated record with ID: 1 : 118.99.83.168', 'career', '2013-04-26 08:14:07', 0),
(468, 2, 'Updated record with ID: 1 : 118.99.83.168', 'career', '2013-04-26 08:14:57', 0),
(469, 2, 'Updated record with ID: 3 : 118.99.83.168', 'career', '2013-04-26 08:15:27', 0),
(470, 2, 'Updated record with ID: 3 : 118.99.83.168', 'career', '2013-04-26 08:15:41', 0),
(471, 2, 'Updated record with ID: 3 : 118.99.83.168', 'career', '2013-04-26 08:15:55', 0),
(472, 2, 'Updated record with ID: 2 : 118.99.83.168', 'career', '2013-04-26 08:16:26', 0),
(473, 2, 'Updated record with ID: 2 : 118.99.83.168', 'career', '2013-04-26 08:16:38', 0),
(474, 1, 'logged in from: 103.2.146.20', 'users', '2013-04-26 11:39:22', 0),
(475, 1, 'Updated record with ID: 6 : 103.2.146.20', 'project', '2013-04-26 11:40:17', 0),
(476, 1, 'Updated record with ID: 8 : 103.2.146.20', 'project', '2013-04-26 11:40:26', 0),
(477, 1, 'Updated record with ID: 8 : 103.2.146.20', 'project', '2013-04-26 11:42:18', 0),
(478, 1, 'Updated record with ID: 9 : 103.2.146.20', 'project', '2013-04-26 11:44:24', 0),
(479, 1, 'Updated record with ID: 2 : 103.2.146.20', 'project', '2013-04-26 11:45:36', 0),
(480, 1, 'Updated record with ID: 5 : 103.2.146.20', 'project', '2013-04-26 11:46:07', 0),
(481, 1, 'Updated record with ID: 6 : 103.2.146.20', 'project', '2013-04-26 11:46:25', 0),
(482, 1, 'Updated record with ID: 4 : 103.2.146.20', 'project', '2013-04-26 11:46:52', 0),
(483, 1, 'Updated record with ID: 1 : 103.2.146.20', 'project', '2013-04-26 11:48:00', 0),
(484, 2, 'logged in from: 202.77.113.220', 'users', '2013-04-26 13:41:58', 0),
(485, 2, 'Updated record with ID: 4 : 202.77.113.220', 'project', '2013-04-26 13:46:09', 0),
(486, 2, 'Updated record with ID: 4 : 202.77.113.220', 'project', '2013-04-26 13:49:14', 0),
(487, 2, 'Updated record with ID: 7 : 202.77.113.220', 'marketing', '2013-04-26 13:50:04', 0),
(488, 2, 'Updated record with ID: 6 : 202.77.113.220', 'project', '2013-04-26 13:52:08', 0),
(489, 2, 'Updated record with ID: 4 : 202.77.113.220', 'project', '2013-04-26 13:52:59', 0),
(490, 2, 'Updated record with ID: 4 : 202.77.113.220', 'project', '2013-04-26 13:53:33', 0),
(491, 2, 'Updated record with ID: 7 : 202.77.113.220', 'project', '2013-04-26 13:54:15', 0),
(492, 2, 'Updated record with ID: 8 : 202.77.113.220', 'project', '2013-04-26 13:55:09', 0),
(493, 2, 'Updated record with ID: 2 : 202.77.113.220', 'project', '2013-04-26 13:57:31', 0),
(494, 2, 'Updated record with ID: 6 : 202.77.113.220', 'marketing', '2013-04-26 13:57:48', 0),
(495, 2, 'Updated record with ID: 1 : 202.77.113.220', 'project', '2013-04-26 13:59:03', 0),
(496, 2, 'Updated record with ID: 5 : 202.77.113.220', 'project', '2013-04-26 14:01:30', 0),
(497, 2, 'Updated record with ID: 5 : 202.77.113.220', 'marketing', '2013-04-26 14:02:22', 0),
(498, 2, 'Created record with ID: 8 : 202.77.113.220', 'marketing', '2013-04-26 14:03:29', 0),
(499, 2, 'Updated record with ID: 9 : 202.77.113.220', 'project', '2013-04-26 14:04:40', 0),
(500, 2, 'Updated record with ID: 3 : 202.77.113.220', 'career', '2013-04-26 14:12:43', 0),
(501, 2, 'Updated record with ID: 2 : 202.77.113.220', 'career', '2013-04-26 14:13:57', 0),
(502, 2, 'Updated record with ID: 1 : 202.77.113.220', 'career', '2013-04-26 14:18:02', 0),
(503, 1, 'logged in from: 139.228.152.223', 'users', '2013-04-28 00:54:57', 0),
(504, 1, 'modified user: Administrator', 'users', '2013-04-28 00:56:34', 0),
(505, 1, 'logged out from: 139.228.152.223', 'users', '2013-04-28 00:56:40', 0),
(506, 2, 'logged in from: 139.228.152.223', 'users', '2013-04-28 00:56:51', 0),
(507, 2, 'logged out from: 139.228.152.223', 'users', '2013-04-28 00:57:14', 0),
(508, 1, 'logged in from: 139.228.152.223', 'users', '2013-04-28 00:57:36', 0),
(509, 1, 'logged in from: 103.2.146.20', 'users', '2013-04-29 18:30:55', 0),
(510, 2, 'logged in from: 103.2.146.20', 'users', '2013-05-01 11:11:51', 0),
(511, 2, 'Updated record with ID: 3 : 103.2.146.20', 'career', '2013-05-01 11:13:03', 0),
(512, 2, 'Updated record with ID: 2 : 103.2.146.20', 'career', '2013-05-01 11:14:25', 0),
(513, 2, 'Updated record with ID: 1 : 103.2.146.20', 'career', '2013-05-01 11:17:32', 0),
(514, 2, 'Updated record with ID: 1 : 103.2.146.20', 'career', '2013-05-01 12:26:45', 0),
(515, 2, 'logged in from: 118.99.82.37', 'users', '2013-05-15 13:39:02', 0),
(516, 1, 'logged in from: ::1', 'users', '2013-05-25 19:55:56', 0),
(517, 1, 'Migrate Type: member_ to Version: 0 from: ::1', 'migrations', '2013-05-25 20:05:51', 0),
(518, 1, 'Migrate Type: member_ to Version: 1 from: ::1', 'migrations', '2013-05-25 20:06:03', 0),
(519, 1, 'Migrate Type: member_ to Version: 2 from: ::1', 'migrations', '2013-05-25 20:06:08', 0),
(520, 1, 'Migrate Type: member_ Uninstalled Version: 0 from: ::1', 'migrations', '2013-05-25 20:19:50', 0),
(521, 1, 'Deleted Module: Member : ::1', 'builder', '2013-05-25 20:19:57', 0),
(522, 1, 'Created Module: Member : ::1', 'modulebuilder', '2013-05-25 20:32:44', 0),
(523, 1, 'Blocked record with ID: 1 : ::1', 'member', '2013-05-25 21:08:19', 0),
(524, 1, 'Unblocked record with ID: 1 : ::1', 'member', '2013-05-25 21:09:06', 0),
(525, 1, 'Deleted record with ID: 1 : ::1', 'member', '2013-05-25 21:12:37', 0),
(526, 1, 'Blocked record with ID: 1 : ::1', 'member', '2013-05-25 21:12:55', 0),
(527, 1, 'Unblocked record with ID: 1 : ::1', 'member', '2013-05-25 21:13:02', 0),
(528, 1, 'Blocked record with ID: 1 : ::1', 'member', '2013-05-25 21:23:23', 0),
(529, 1, 'Unblocked record with ID: 1 : ::1', 'member', '2013-05-25 21:23:29', 0),
(530, 1, 'Blocked record with ID: 1 : ::1', 'member', '2013-05-25 21:26:21', 0),
(531, 1, 'Unblocked record with ID: 1 : ::1', 'member', '2013-05-25 21:26:30', 0),
(532, 1, 'Blocked record with ID: 1 : ::1', 'member', '2013-05-25 21:29:05', 0),
(533, 1, 'Unblocked record with ID: 1 : ::1', 'member', '2013-05-25 21:29:13', 0),
(534, 1, 'logged in from: ::1', 'users', '2013-06-02 09:31:16', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cv_banner`
--

INSERT INTO `cv_banner` (`id`, `group_id`, `title`, `summary`, `image_id`, `url`, `position`, `publish`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, 'Setiabudi Sky Garden', '<p>\n Setiabudi Sky Gardens</p>', 219, 'project/detail/setia-budi-sky-garden/setiabudi-sky-garden', 1, 'Y', 0, '2013-04-16 09:47:05', '2013-04-25 12:38:23'),
(2, 1, 'One Balmoral', '<p>\n One Balmoral</p>', 220, 'project/detail/one-balmoral/one-balmoral', 2, 'Y', 0, '2013-04-16 09:58:18', '2013-04-25 12:39:53'),
(3, 1, 'Izzara', '<p>\n Izzaras</p>', 239, 'project/detail/izzara/izzara', 99, 'Y', 0, '2013-04-22 19:02:32', '2013-04-26 07:26:41');

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
(1, 'Marketing Executive', '<p>\n -</p>', '<p>\n -</p>', '<ol>\n <li>\n  <div background="" div="" font-size:="" marketing="" memerlukan="" tidak="">\n   Any background of marketing experience&nbsp;are welcome to apply</div>\n </li>\n <li>\n  <div background="" div="" font-size:="" marketing="" memerlukan="" tidak="">\n   Minimum&nbsp;S1 from any major university</div>\n </li>\n <li>\n  <div background="" div="" font-size:="" marketing="" memerlukan="" tidak="">\n   <span 27="" background="" berusia="" div="" font-size:="" marketing="" max="" memerlukan="" min="" pendidikan="" span="" tidak="">Maximum age: 27 years old</span></div>\n </li>\n <li>\n  <div 27="" berusia="" div="" font-size:="" max="">\n   Fluent in English both oral and written</div>\n </li>\n <li>\n  <div berpenampilan="" div="" font-size:="">\n   Good looking and interactive</div>\n </li>\n <li>\n  <div berpenampilan="" div="" font-size:="">\n   Good communication and interpersonal skills</div>\n </li>\n</ol>\n<div berpenampilan="" div="" font-size:="">\n Submit CV &amp; Photo to career@cavaproperty.com</div>\n<p>\n &nbsp;</p>', 'marketing-executive', 0, '2013-04-14 23:03:49', '2013-05-01 12:26:45'),
(2, 'Junior Accounting / Finance', '<p>\n -</p>', '<p>\n -</p>', '<ol>\n <li>\n  <div 1="" berpengalaman="" div="" font-size:="">\n   Minimum 1 year&nbsp;work experience</div>\n </li>\n <li>\n  <div 1="" berpengalaman="" div="" font-size:="">\n   Minimum S1 Accounting</div>\n </li>\n <li>\n  <div 1="" berpengalaman="" div="" font-size:="">\n   Maximum age: 25&nbsp;years old</div>\n </li>\n <li>\n  <div 25="" berusia="" div="" font-size:="" maximum="">\n   Fluent in English both oral and written</div>\n </li>\n <li>\n  Good interpersonal skill</li>\n</ol>\n<p>\n <span a="" color:="" cv="" font-size:="" href="mailto:career@cavaproperty.com" photo="" submit="" target="_blank">Submit CV &amp; Photo to career@cavaproperty.com</span></p>', 'junior-accounting-finance', 0, '2013-04-14 23:04:49', '2013-05-01 11:14:25'),
(3, 'Senior Accounting / Finance', '<p>\n -</p>', '<p>\n -</p>', '<ol>\n <li>\n  <div 5="" div="" experience="" font-size:="" min="">\n   Minimum 5 years work experience</div>\n </li>\n <li>\n  <div 5="" div="" experience="" font-size:="" min="">\n   Minimum S1 Accounting</div>\n </li>\n <li>\n  <div 30="" div="" font-size:="" max="" usia="">\n   Maximum age: 30 years old</div>\n </li>\n <li>\n  <div 30="" div="" font-size:="" max="" usia="">\n   Fluent in English both oral and written</div>\n </li>\n <li>\n  Good interpersonal skill</li>\n</ol>\n<p>\n <span a="" color:="" cv="" font-size:="" href="mailto:career@cavaproperty.com" photo="" submit="" target="_blank">Submit CV &amp; Photo to career@cavaproperty.com</span></p>', 'senior-accounting-finance', 0, '2013-04-14 23:05:49', '2013-05-01 11:13:03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cv_contact_mail`
--

INSERT INTO `cv_contact_mail` (`id`, `name`, `email`, `subject`, `message`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Andhika', 'andhikanovandi@gmail.com', 'test', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum eros, consectetur eu eleifend quis, egestas aliquet massa. Curabitur orci odio, volutpat a vestibulum eu, hendrerit sed nunc. Ut sit amet lacus vitae tortor tincidunt fringilla. In vel sapien ut nisl consectetur tincidunt ut non lorem. Maecenas at ullamcorper metus. Phasellus et odio nec lacus faucibus consectetur sit amet ut turpis. Ut a risus in tellus suscipit malesuada.</p>', 0, '2013-04-14 23:54:26', '0000-00-00 00:00:00'),
(2, 'Andhika', 'andhikanovandi@gmail.com', 'test', 'test', 0, '2013-04-18 11:45:01', '0000-00-00 00:00:00'),
(3, 'reynolds', 'reynoldsdarmadi@gmail.com', 'testing', 'testing', 0, '2013-04-25 20:35:30', '0000-00-00 00:00:00'),
(4, 'sisca afriany sari', 'sisca.a.sari@gmail.com', 'brochure n pricelist izzara n cassamora', 'Dear Sir/ Madam,\n\nI would like to know more about the izzara apartment n cassamora units, would you pls send me their brochures n pricelists? \n\nThanks a lot', 0, '2013-05-24 10:37:42', '0000-00-00 00:00:00'),
(5, 'Denny', 'denny@pthree.co.id', 'Kerjasama Project Property Villatel @ Nusa 2 Bali & Condotel @ Benoa Bali', 'Kepada Yth.\nCAVA PROPERTY\ndi tempat.\n\nSalam Sejahtera,\n\nSaya Denny Planner & Event Marketing Manager  dari PT. Prima Propertindo Group, mau menawarkan kerjasama penjualan project yang sedang kami bangun.\n\nApabila tertarik dan bisa bertemu untuk berkenalan mohon saya di hubungi kembali di alamat :\n\nWISMA ADR PLUIT\nJln. Pluit Raya 1 No. 1 Jakarta Utara 14440\n021 669308 / 0856 888 4959\ndenny@pthree.co.id\nwww.primapropertindogroup.com\n\nDemikian email dari saya atas perhatiannya saya ucapkan terima kasih.', 0, '2013-05-24 13:37:41', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=266 ;

--
-- Dumping data for table `cv_file`
--

INSERT INTO `cv_file` (`id`, `folder_id`, `user_id`, `type`, `name`, `filename`, `description`, `extension`, `mimetype`, `width`, `height`, `filesize`, `date_added`, `sort`) VALUES
(3, 3, 1, 'i', 'p-1.jpg', '1365953856_27e37efff7bca80a6e195055256cdcae.jpg', '', '.jpg', 'image/jpeg', 180, 180, 13, 1365953856, 0),
(4, 3, 1, 'i', 'p-3.jpg', '1365953856_c6089052af56c4ab6f7ed69bec96f01e.jpg', '', '.jpg', 'image/jpeg', 180, 180, 10, 1365953856, 0),
(5, 3, 1, 'i', 'p-2.jpg', '1365953856_ddc5b2162ae573b96488c0c1b142df9d.jpg', '', '.jpg', 'image/jpeg', 180, 180, 12, 1365953856, 0),
(6, 3, 1, 'i', 'p-4.jpg', '1365953856_41f568bba0094b20232a725caf979ac7.jpg', '', '.jpg', 'image/jpeg', 180, 180, 11, 1365953856, 0),
(7, 3, 1, 'i', 'p-5.jpg', '1365953856_4c5a3abbaa482e228229e9a58081ec16.jpg', '', '.jpg', 'image/jpeg', 180, 180, 11, 1365953856, 0),
(8, 4, 1, 'i', 'slide-1.jpg', '1366098397_ba8defeb3a3c29f314c65ba3d5fe9d19.jpg', '', '.jpg', 'image/jpeg', 900, 360, 93, 1366098397, 0),
(9, 4, 1, 'i', 'slide-2.jpg', '1366098397_3582e4141094b915b18962e5947ed3b1.jpg', '', '.jpg', 'image/jpeg', 900, 360, 116, 1366098397, 0),
(10, 1, 1, 'i', 'news-a.jpg', 'news-a.jpg', '', '.jpg', 'image/jpeg', 680, 360, 99, 0, 0),
(11, 1, 2, 'i', 'Syukuran-Project-Izzara-29-November-2012-3.jpg', 'Syukuran-Project-Izzara-29-November-2012-3.jpg', '', '.jpg', 'image/jpeg', 680, 360, 91, 0, 0),
(12, 1, 2, 'i', 'Syukuran Project Izzara 29 November 2012 1.jpg', 'Syukuran_Project_Izzara_29_November_2012_1.jpg', '', '.jpg', 'image/jpeg', 640, 480, 30, 0, 0),
(13, 1, 2, 'i', 'Syukuran Project Izzara 29 November 2012 2.jpg', 'Syukuran_Project_Izzara_29_November_2012_2.jpg', '', '.jpg', 'image/jpeg', 640, 480, 34, 0, 0),
(14, 1, 2, 'i', 'Syukuran Project Izzara 29 November 2012 4.jpg', 'Syukuran_Project_Izzara_29_November_2012_4.jpg', '', '.jpg', 'image/jpeg', 640, 480, 40, 0, 0),
(16, 1, 2, 'i', 'Serenia-Hills-Project-Progress-as-of-November-2012-5.jpg', 'Serenia-Hills-Project-Progress-as-of-November-2012-51.jpg', '', '.jpg', 'image/jpeg', 680, 360, 90, 0, 0),
(17, 1, 2, 'i', 'Serenia Hills Project Progress as of November 2012 1.jpg', 'Serenia_Hills_Project_Progress_as_of_November_2012_1.jpg', '', '.jpg', 'image/jpeg', 640, 480, 55, 0, 0),
(18, 1, 2, 'i', 'Serenia Hills Project Progress as of November 2012 2.jpg', 'Serenia_Hills_Project_Progress_as_of_November_2012_2.jpg', '', '.jpg', 'image/jpeg', 640, 480, 54, 0, 0),
(19, 1, 2, 'i', 'Serenia Hills Project Progress as of November 2012 3.jpg', 'Serenia_Hills_Project_Progress_as_of_November_2012_3.jpg', '', '.jpg', 'image/jpeg', 640, 480, 57, 0, 0),
(20, 1, 2, 'i', 'Serenia Hills Project Progress as of November 2012 4.jpg', 'Serenia_Hills_Project_Progress_as_of_November_2012_4.jpg', '', '.jpg', 'image/jpeg', 640, 480, 42, 0, 0),
(22, 1, 2, 'i', 'Serenia Hills Project Progress as of November 2012 5.jpg', 'Serenia_Hills_Project_Progress_as_of_November_2012_51.jpg', '', '.jpg', 'image/jpeg', 640, 480, 63, 0, 0),
(23, 1, 2, 'i', 'Serenia Hills Project Progress as of November 2012 6.jpg', 'Serenia_Hills_Project_Progress_as_of_November_2012_6.jpg', '', '.jpg', 'image/jpeg', 640, 480, 47, 0, 0),
(24, 1, 2, 'i', 'Serenia Hills Project Progress as of November 2012 7.jpg', 'Serenia_Hills_Project_Progress_as_of_November_2012_7.jpg', '', '.jpg', 'image/jpeg', 640, 480, 75, 0, 0),
(26, 1, 2, 'i', 'Casamora-Project-Progress-as-of-November-2012-1.jpeg', 'Casamora-Project-Progress-as-of-November-2012-11.jpeg', '', '.jpeg', 'image/jpeg', 680, 360, 66, 0, 0),
(27, 1, 2, 'i', 'Casamora Project Progress as of November 2012 2.jpeg', 'Casamora_Project_Progress_as_of_November_2012_2.jpeg', '', '.jpeg', 'image/jpeg', 640, 480, 65, 0, 0),
(28, 1, 2, 'i', 'Casamora Project Progress as of November 2012 3.jpeg', 'Casamora_Project_Progress_as_of_November_2012_3.jpeg', '', '.jpeg', 'image/jpeg', 640, 480, 54, 0, 0),
(29, 1, 2, 'i', 'Casamora Project Progress as of November 2012 4.jpeg', 'Casamora_Project_Progress_as_of_November_2012_4.jpeg', '', '.jpeg', 'image/jpeg', 640, 480, 43, 0, 0),
(30, 1, 2, 'i', 'Casamora Project Progress as of November 2012 5.jpeg', 'Casamora_Project_Progress_as_of_November_2012_5.jpeg', '', '.jpeg', 'image/jpeg', 640, 480, 57, 0, 0),
(31, 1, 2, 'i', 'Serenia-Hills-Project-Progress-as-of-October-2012_7.jpg', 'Serenia-Hills-Project-Progress-as-of-October-2012_7.jpg', '', '.jpg', 'image/jpeg', 680, 360, 94, 0, 0),
(32, 1, 2, 'i', 'Serenia Hills Project Progress as of October 2012_1.jpg', 'Serenia_Hills_Project_Progress_as_of_October_2012_1.jpg', '', '.jpg', 'image/jpeg', 640, 480, 50, 0, 0),
(33, 1, 2, 'i', 'Serenia Hills Project Progress as of October 2012_2.jpg', 'Serenia_Hills_Project_Progress_as_of_October_2012_2.jpg', '', '.jpg', 'image/jpeg', 640, 480, 59, 0, 0),
(34, 1, 2, 'i', 'Serenia Hills Project Progress as of October 2012_3.jpg', 'Serenia_Hills_Project_Progress_as_of_October_2012_3.jpg', '', '.jpg', 'image/jpeg', 640, 480, 49, 0, 0),
(35, 1, 2, 'i', 'Serenia Hills Project Progress as of October 2012_4.jpg', 'Serenia_Hills_Project_Progress_as_of_October_2012_4.jpg', '', '.jpg', 'image/jpeg', 640, 480, 51, 0, 0),
(36, 1, 2, 'i', 'Serenia Hills Project Progress as of October 2012_5.jpg', 'Serenia_Hills_Project_Progress_as_of_October_2012_5.jpg', '', '.jpg', 'image/jpeg', 640, 480, 51, 0, 0),
(37, 1, 2, 'i', 'Serenia Hills Project Progress as of October 2012_8.jpg', 'Serenia_Hills_Project_Progress_as_of_October_2012_8.jpg', '', '.jpg', 'image/jpeg', 640, 480, 74, 0, 0),
(38, 1, 2, 'i', 'Izzara-Project-Progress-as-of-October-2012_3.jpg', 'Izzara-Project-Progress-as-of-October-2012_3.jpg', '', '.jpg', 'image/jpeg', 680, 360, 68, 0, 0),
(39, 1, 2, 'i', 'Izzara Project Progress as of October 2012_Marketing Office.jpg', 'Izzara_Project_Progress_as_of_October_2012_Marketing_Office.jpg', '', '.jpg', 'image/jpeg', 640, 480, 40, 0, 0),
(40, 1, 2, 'i', 'Izzara Project Progress as of October 2012_1.jpg', 'Izzara_Project_Progress_as_of_October_2012_1.jpg', '', '.jpg', 'image/jpeg', 640, 480, 37, 0, 0),
(41, 1, 2, 'i', 'Izzara Project Progress as of October 2012_2.jpg', 'Izzara_Project_Progress_as_of_October_2012_2.jpg', '', '.jpg', 'image/jpeg', 640, 480, 45, 0, 0),
(42, 1, 2, 'i', 'Serenia-Hills-Project-Progress-As-of-September-2012_cluster-regent-Blok-U-T.jpg', 'Serenia-Hills-Project-Progress-As-of-September-2012_cluster-regent-Blok-U-T.jpg', '', '.jpg', 'image/jpeg', 680, 360, 76, 0, 0),
(44, 1, 2, 'i', 'Serenia Hills Project Progress As of September 2012_active-park.jpg', 'Serenia_Hills_Project_Progress_As_of_September_2012_active-park1.jpg', '', '.jpg', 'image/jpeg', 640, 480, 47, 0, 0),
(45, 1, 2, 'i', 'Serenia Hills Project Progress As of September 2012_enterance-dr-Jl.-pertanian.jpg', 'Serenia_Hills_Project_Progress_As_of_September_2012_enterance-dr-Jl.-pertanian_.jpg', '', '.jpg', 'image/jpeg', 640, 480, 45, 0, 0),
(46, 1, 2, 'i', 'Serenia Hills Project Progress As of September 2012_progress-Blok-Q-Regent.jpg', 'Serenia_Hills_Project_Progress_As_of_September_2012_progress-Blok-Q-Regent.jpg', '', '.jpg', 'image/jpeg', 640, 480, 50, 0, 0),
(47, 1, 2, 'i', 'Serenia-Hills-Exhibition-Pondok-Indah-Mall-1.jpg', 'Serenia-Hills-Exhibition-Pondok-Indah-Mall-1.jpg', '', '.jpg', 'image/jpeg', 680, 360, 101, 0, 0),
(48, 1, 2, 'i', 'Serenia Hills Exhibition Pondok Indah Mall 1.jpg', 'Serenia_Hills_Exhibition_Pondok_Indah_Mall_1.jpg', '', '.jpg', 'image/jpeg', 459, 640, 53, 0, 0),
(49, 1, 2, 'i', 'Project-Progress-as-of-September-2012_7.jpg', 'Project-Progress-as-of-September-2012_7.jpg', '', '.jpg', 'image/jpeg', 680, 360, 98, 0, 0),
(50, 1, 2, 'i', 'Project Progress as of September 2012_3.jpg', 'Project_Progress_as_of_September_2012_3.jpg', '', '.jpg', 'image/jpeg', 640, 427, 55, 0, 0),
(51, 1, 2, 'i', 'Project Progress as of September 2012_4.jpg', 'Project_Progress_as_of_September_2012_4.jpg', '', '.jpg', 'image/jpeg', 640, 427, 54, 0, 0),
(52, 1, 2, 'i', 'Project Progress as of September 2012_5.jpg', 'Project_Progress_as_of_September_2012_5.jpg', '', '.jpg', 'image/jpeg', 640, 427, 54, 0, 0),
(53, 1, 2, 'i', 'Project Progress as of September 2012_2.jpg', 'Project_Progress_as_of_September_2012_2.jpg', '', '.jpg', 'image/jpeg', 427, 640, 83, 0, 0),
(54, 1, 2, 'i', 'Casamora-Project-Progress-as-of-September-2012_casamora-Square-Blok-AA.jpg', 'Casamora-Project-Progress-as-of-September-2012_casamora-Square-Blok-AA.jpg', '', '.jpg', 'image/jpeg', 680, 360, 101, 0, 0),
(55, 1, 2, 'i', 'Casamora Project Progress as of September 2012_show-unit-CJ.jpg', 'Casamora_Project_Progress_as_of_September_2012_show-unit-CJ.jpg', '', '.jpg', 'image/jpeg', 640, 480, 63, 0, 0),
(56, 1, 2, 'i', 'Casamora Project Progress as of September 2012_showunit-CJ.jpg', 'Casamora_Project_Progress_as_of_September_2012_showunit-CJ.jpg', '', '.jpg', 'image/jpeg', 640, 480, 58, 0, 0),
(57, 1, 2, 'i', 'Casamora Project Progress as of September 2012_gate-casamora-house-landed.jpg', 'Casamora_Project_Progress_as_of_September_2012_gate-casamora-house-landed.jpg', '', '.jpg', 'image/jpeg', 640, 480, 56, 0, 0),
(58, 1, 2, 'i', 'Casamora Project Progress as of September 2012_2.jpg', 'Casamora_Project_Progress_as_of_September_2012_2.jpg', '', '.jpg', 'image/jpeg', 640, 480, 59, 0, 0),
(59, 1, 2, 'i', 'Casamora-Project-Progress-as-of-August-2012_3.jpg', 'Casamora-Project-Progress-as-of-August-2012_3.jpg', '', '.jpg', 'image/jpeg', 680, 360, 109, 0, 0),
(60, 1, 2, 'i', 'Casamora Project Progress as of August 2012_8.jpg', 'Casamora_Project_Progress_as_of_August_2012_8.jpg', '', '.jpg', 'image/jpeg', 640, 480, 46, 0, 0),
(61, 1, 2, 'i', 'Casamora Project Progress as of August 2012_7.jpg', 'Casamora_Project_Progress_as_of_August_2012_7.jpg', '', '.jpg', 'image/jpeg', 640, 480, 50, 0, 0),
(62, 1, 2, 'i', 'Casamora Project Progress as of August 2012_6.jpg', 'Casamora_Project_Progress_as_of_August_2012_6.jpg', '', '.jpg', 'image/jpeg', 640, 480, 53, 0, 0),
(63, 1, 2, 'i', 'Casamora Project Progress as of August 2012_5.jpg', 'Casamora_Project_Progress_as_of_August_2012_5.jpg', '', '.jpg', 'image/jpeg', 640, 480, 45, 0, 0),
(64, 1, 2, 'i', 'Casamora Project Progress as of August 2012_2.jpg', 'Casamora_Project_Progress_as_of_August_2012_2.jpg', '', '.jpg', 'image/jpeg', 640, 480, 55, 0, 0),
(65, 1, 2, 'i', 'Casamora Project Progress as of August 2012_1.jpg', 'Casamora_Project_Progress_as_of_August_2012_1.jpg', '', '.jpg', 'image/jpeg', 620, 220, 30, 0, 0),
(66, 8, 1, 'i', 'harris_beach-front.jpg', '1366615197_a14c5b645064f990564fce5992175803.jpg', '', '.jpg', 'image/jpeg', 900, 360, 129, 1366615197, 0),
(67, 8, 1, 'i', 'Harris_facade-morning_highlight.jpg', '1366615197_169cc525895849e70566c15739ed1aa8.jpg', '', '.jpg', 'image/jpeg', 900, 360, 131, 1366615197, 0),
(68, 8, 1, 'i', 'harris_Bedroom.jpg', '1366615197_e303b0fc6b9000ef1ec7be7d69addeaf.jpg', '', '.jpg', 'image/jpeg', 900, 360, 103, 1366615197, 0),
(69, 8, 1, 'i', 'harris_pool-morning.jpg', '1366615198_41412a0dad7b6df7c85185b7f0afe4b4.jpg', '', '.jpg', 'image/jpeg', 900, 360, 112, 1366615198, 0),
(70, 8, 1, 'i', 'harris_aerial.jpg', '1366615198_2f6847804c0a0775dc16b6fc881c9e71.jpg', '', '.jpg', 'image/jpeg', 900, 360, 189, 1366615198, 0),
(71, 8, 1, 'i', 'harris_entrance.jpg', '1366615198_d36eec5650ed78649089b6bef49a0fae.jpg', '', '.jpg', 'image/jpeg', 900, 360, 208, 1366615198, 0),
(72, 8, 1, 'i', 'harris_roof-pool.jpg', '1366615200_3a71eb2feb3314d88cb788fb5815f1b5.jpg', '', '.jpg', 'image/jpeg', 900, 360, 143, 1366615200, 0),
(73, 9, 1, 'i', 'Izzara-Living-and-Dining-Room.jpg', '1366615257_5b8346a9bd20071aa269aded8bfaa8b5.jpg', '', '.jpg', 'image/jpeg', 900, 360, 86, 1366615257, 0),
(74, 9, 1, 'i', 'Izzara-1.jpg', '1366615258_e354b16b77170aa170d9941e2348bcd7.jpg', '', '.jpg', 'image/jpeg', 900, 360, 137, 1366615258, 0),
(75, 5, 1, 'i', 'One-Balmoral.jpg', '1366615305_ce75def4456f0700d91a1eed7fb060fe.jpg', '', '.jpg', 'image/jpeg', 900, 360, 145, 1366615305, 0),
(76, 5, 1, 'i', 'One-Balmoral-1.jpg', '1366615309_bfb0f9334add6f827a0638ca95b8fdf4.jpg', '', '.jpg', 'image/jpeg', 900, 360, 121, 1366615309, 0),
(77, 12, 2, 'i', 'Test Piling Izzara on July 16, 2012_1.jpg', '1366615426_2196973226ee2b827b21b52521a0aeb3.jpg', '', '.jpg', 'image/jpeg', 620, 220, 23, 1366615426, 0),
(78, 12, 2, 'i', 'Test Piling Izzara on July 16, 2012_6.jpg', '1366615429_c80c3b71d314c4a2933e845cd376df9e.jpg', '', '.jpg', 'image/jpeg', 427, 640, 66, 1366615429, 0),
(79, 12, 2, 'i', 'Test Piling Izzara on July 16, 2012_2.jpg', '1366615430_73862b18ea484fe46d7c246fc06fcdbe.jpg', '', '.jpg', 'image/jpeg', 640, 427, 55, 1366615430, 0),
(80, 12, 2, 'i', 'Test Piling Izzara on July 16, 2012_4.jpg', '1366615431_68c7d221244bb0fc44db196371f52c10.jpg', '', '.jpg', 'image/jpeg', 640, 427, 69, 1366615431, 0),
(81, 12, 2, 'i', 'Test Piling Izzara on July 16, 2012_3.jpg', '1366615431_0dcd9f0e8c42617c2952b1074e6018bf.jpg', '', '.jpg', 'image/jpeg', 640, 427, 65, 1366615431, 0),
(82, 12, 2, 'i', 'Test Piling Izzara on July 16, 2012_5.jpg', '1366615431_fa3fe51294a0fbcef8ec6c56ded05a67.jpg', '', '.jpg', 'image/jpeg', 427, 640, 69, 1366615431, 0),
(83, 10, 1, 'i', 'Serenia-Hills-6.jpg', '1366615434_891e0f1d1443956b8243ddc3e544a162.jpg', '', '.jpg', 'image/jpeg', 900, 360, 49, 1366615434, 0),
(84, 10, 1, 'i', 'Serenia-Hills-4.jpg', '1366615435_1bd61dd9875ff58e92131f0aa21abcfa.jpg', '', '.jpg', 'image/jpeg', 900, 360, 130, 1366615435, 0),
(85, 10, 1, 'i', 'Serenia-Hills-2.jpg', '1366615435_ef39e98592ac6b4f9140528fbbfc88ca.jpg', '', '.jpg', 'image/jpeg', 900, 360, 128, 1366615435, 0),
(86, 10, 1, 'i', 'Serenia-Hills-3.jpg', '1366615435_b34b6a9a678bbf265db3a8e68f73e7ac.jpg', '', '.jpg', 'image/jpeg', 900, 360, 125, 1366615435, 0),
(87, 10, 1, 'i', 'Serenia-Hills.jpg', '1366615436_6bdbd4854fc0a431d1b0cdcaf57f32a0.jpg', '', '.jpg', 'image/jpeg', 900, 360, 154, 1366615436, 0),
(88, 10, 1, 'i', 'Serenia-Hills-5.jpg', '1366615436_a6ec46e2bd6ac67b901c8264aeee1a94.jpg', '', '.jpg', 'image/jpeg', 900, 360, 175, 1366615436, 0),
(89, 10, 1, 'i', 'Serenia-Hills-map.jpg', '1366615437_dcb9c95620277a9c6f13574ac973b523.jpg', '', '.jpg', 'image/jpeg', 900, 360, 85, 1366615437, 0),
(90, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Map.jpg', '1366615481_22469254f7841ead58e1bcfd90bf84b3.jpg', '', '.jpg', 'image/jpeg', 900, 360, 43, 1366615481, 0),
(91, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Site-Map.jpg', '1366615483_2403af6631e04fd635abb90e97296b66.jpg', '', '.jpg', 'image/jpeg', 900, 360, 109, 1366615483, 0),
(92, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Interior.jpg', '1366615483_3a45444ad69398afbba911f5286a3bfb.jpg', '', '.jpg', 'image/jpeg', 900, 360, 123, 1366615483, 0),
(93, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Bathroom.jpg', '1366615484_4c9e98d480373b4ca7f57296af0719ba.jpg', '', '.jpg', 'image/jpeg', 900, 360, 130, 1366615484, 0),
(94, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Kamar.jpg', '1366615484_a42f5511c79e4d1fe89d95fc9387654f.jpg', '', '.jpg', 'image/jpeg', 900, 360, 126, 1366615484, 0),
(95, 11, 1, 'i', 'setia-budi-sky-garden_highlight.jpg', '1366615484_53089f66769aed1e1813f18cb011da03.jpg', '', '.jpg', 'image/jpeg', 900, 360, 148, 1366615484, 0),
(96, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Tampak-Depan.jpg', '1366615486_ee5fb82e63cc78c049af1cf743e5ea93.jpg', '', '.jpg', 'image/jpeg', 900, 360, 153, 1366615486, 0),
(97, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Unit-Layout.jpg', '1366615487_47dffd7786eb2fc6a2f4b82a48b46a6f.jpg', '', '.jpg', 'image/jpeg', 900, 360, 53, 1366615487, 0),
(98, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Unit-Layout_2.jpg', '1366615487_e413e683e10bed38e3029d112ab803bd.jpg', '', '.jpg', 'image/jpeg', 900, 360, 54, 1366615487, 0),
(99, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Unit-Layout-J.jpg', '1366615488_3207971064d367da593a9b37da455fff.jpg', '', '.jpg', 'image/jpeg', 900, 360, 42, 1366615488, 0),
(100, 11, 1, 'i', 'Setia-Budi-Sky-Garden-Unit-Layout_h.jpg', '1366615488_92ac064eeb461fb903426d4488ecf816.jpg', '', '.jpg', 'image/jpeg', 900, 360, 59, 1366615488, 0),
(101, 12, 2, 'i', 'Test-Piling-Izzara-on-July-16,-2012_4.jpg', 'Test-Piling-Izzara-on-July-16,-2012_4.jpg', '', '.jpg', 'image/jpeg', 680, 360, 122, 0, 0),
(102, 12, 2, 'i', 'Setiabudi-Sky-Garden-Project-Progress-as-of-July-2012_2.jpg', '1366615776_e3c8256e4e9fae2487b4011313041bfb.jpg', '', '.jpg', 'image/jpeg', 680, 360, 142, 1366615776, 0),
(103, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of July 2012_1.jpg', '1366615852_ad181ff21b21809135b312cdfad8fb57.jpg', '', '.jpg', 'image/jpeg', 620, 220, 28, 1366615852, 0),
(104, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of July 2012_3.jpg', '1366615853_b4fe3e0bcd1f8fb205094f011c9e32ca.jpg', '', '.jpg', 'image/jpeg', 640, 427, 65, 1366615853, 0),
(105, 12, 2, 'i', 'Serenia Hills Project Progress as of July 2012_1.jpg', '1366616043_b171b65c65f1e55b345d2d30fb6d3a47.jpg', '', '.jpg', 'image/jpeg', 620, 220, 24, 1366616043, 0),
(106, 12, 2, 'i', 'Serenia Hills Project Progress as of July 2012_3.jpg', '1366616043_616183a500dc1d2f8cb15755510e7e04.jpg', '', '.jpg', 'image/jpeg', 640, 427, 54, 1366616043, 0),
(107, 12, 2, 'i', 'Serenia Hills Project Progress as of July 2012_5.jpg', '1366616043_1b9c179921bffba9f99312ddda7ddd21.jpg', '', '.jpg', 'image/jpeg', 640, 427, 48, 1366616043, 0),
(108, 12, 2, 'i', 'Serenia Hills Project Progress as of July 2012_2.jpg', '1366616044_92389a1b568a05c83edc7064f2a23528.jpg', '', '.jpg', 'image/jpeg', 640, 427, 71, 1366616044, 0),
(109, 12, 2, 'i', 'Serenia-Hills-Project-Progress-as-of-July-2012_4.jpg', '1366616044_bc3afd9d4e6f8dd699caf561b0031dc7.jpg', '', '.jpg', 'image/jpeg', 680, 360, 85, 1366616044, 0),
(110, 12, 2, 'i', 'Serenia Hills Project Progress as of July 2012_6.jpg', '1366616044_edd2e69436821d4617e4dacaa303d4c0.jpg', '', '.jpg', 'image/jpeg', 640, 427, 61, 1366616044, 0),
(111, 12, 2, 'i', 'Izzara Project Progress as of July 2012_1.jpg', '1366616306_e65f7cca829b219f7695572bb6ea851a.jpg', '', '.jpg', 'image/jpeg', 610, 416, 54, 1366616306, 0),
(112, 12, 2, 'i', 'Izzara Project Progress as of July 2012_3.jpg', '1366616309_37d9af5f1e7f5e9850a58a68e7a0b499.jpg', '', '.jpg', 'image/jpeg', 640, 427, 71, 1366616309, 0),
(113, 12, 2, 'i', 'Izzara-Project-Progress-as-of-July-2012_2.jpg', '1366616312_9ef45056916ec3cf4223bf4968d69f3a.jpg', '', '.jpg', 'image/jpeg', 680, 360, 93, 1366616312, 0),
(114, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of June 2012_1.jpg', '1366616526_3b35a897d618de21ce55257bc276dfd0.jpg', '', '.jpg', 'image/jpeg', 620, 220, 25, 1366616526, 0),
(115, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of June 2012_4.jpg', '1366616527_765f45a8c9f7f396c3bb3c6d0192c708.jpg', '', '.jpg', 'image/jpeg', 640, 427, 37, 1366616527, 0),
(116, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of June 2012_5.jpg', '1366616527_59104afa5ce6dec446ebbfc179670269.jpg', '', '.jpg', 'image/jpeg', 640, 427, 35, 1366616527, 0),
(117, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of June 2012_3.jpg', '1366616527_c11eba207ecd5d5dbfabd104bcd6007f.jpg', '', '.jpg', 'image/jpeg', 640, 427, 39, 1366616527, 0),
(118, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of June 2012_2.jpg', '1366616527_ab3a1e7264767871d296b8fd7352d6e5.jpg', '', '.jpg', 'image/jpeg', 640, 427, 49, 1366616527, 0),
(119, 12, 2, 'i', 'Setiabudi Sky Garden Project Progress as of June 2012_6.jpg', '1366616531_53806c9262fc96082aaa2cc1ef617098.jpg', '', '.jpg', 'image/jpeg', 640, 958, 94, 1366616531, 0),
(120, 12, 2, 'i', 'Setiabudi-Sky-Garden-Project-Progress-as-of-June-2012_7.jpg', '1366616539_5032e6121e0e228d074dedf3fc1b3725.jpg', '', '.jpg', 'image/jpeg', 680, 360, 157, 1366616539, 0),
(121, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_1.jpg', '1366616732_63ad259642ce4ea6222766a7abbcc5b4.jpg', '', '.jpg', 'image/jpeg', 620, 220, 19, 1366616732, 0),
(122, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_Blok-V-W.jpg', '1366616733_54b9a36c9de9481371dc29bceafc2cee.jpg', '', '.jpg', 'image/jpeg', 640, 427, 25, 1366616733, 0),
(123, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_2.jpg', '1366616733_81634c4e3ee8be64b7c440423ee7731b.jpg', '', '.jpg', 'image/jpeg', 640, 427, 26, 1366616733, 0),
(124, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_3.jpg', '1366616733_91765e8aab988c46d684b029dff280af.jpg', '', '.jpg', 'image/jpeg', 640, 427, 34, 1366616733, 0),
(125, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_Blok-U-T.jpg', '1366616734_e331be881c01a993642dfa2378756df1.jpg', '', '.jpg', 'image/jpeg', 640, 427, 35, 1366616734, 0),
(126, 12, 2, 'i', 'Serenia-Hills-Project-Progress-as-of-June-2012_Blok-U.jpg', '1366616739_d967588ee218f055d4180eeff6afebec.jpg', '', '.jpg', 'image/jpeg', 680, 360, 116, 1366616739, 0),
(127, 12, 2, 'i', 'Izzara Project Progress as of June 2012_1.jpg', '1366616933_4108e5ffe52213b516123adb87db71c5.jpg', '', '.jpg', 'image/jpeg', 640, 480, 34, 1366616933, 0),
(128, 12, 2, 'i', 'Izzara Project Progress as of June 2012_2.jpg', '1366616933_c01c85256c3768c979d351e5dd3a0a6c.jpg', '', '.jpg', 'image/jpeg', 640, 480, 41, 1366616933, 0),
(129, 12, 2, 'i', 'Izzara Project Progress as of June 2012_3.jpg', '1366616933_1d7af18a9035660c23e6efb1bc38ac27.jpg', '', '.jpg', 'image/jpeg', 640, 480, 29, 1366616933, 0),
(130, 12, 2, 'i', 'Izzara-Project-Progress-as-of-June-2012_4.jpg', '1366616933_f745e7a529860bf62e73bb15e4002be1.jpg', '', '.jpg', 'image/jpeg', 680, 360, 74, 1366616933, 0),
(131, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_3.jpg', '1366617309_91765e8aab988c46d684b029dff280af.jpg', '', '.jpg', 'image/jpeg', 640, 480, 39, 1366617309, 0),
(132, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_2.jpg', '1366617310_81634c4e3ee8be64b7c440423ee7731b.jpg', '', '.jpg', 'image/jpeg', 640, 480, 41, 1366617310, 0),
(133, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_5.jpg', '1366617310_0bb87faa76d88ac83a7b1944df5d88b7.jpg', '', '.jpg', 'image/jpeg', 640, 480, 42, 1366617310, 0),
(134, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_4.jpg', '1366617311_78426b866ddec35c53a53c3251bb5b25.jpg', '', '.jpg', 'image/jpeg', 640, 480, 43, 1366617311, 0),
(135, 12, 2, 'i', 'Serenia Hills Project Progress as of June 2012_1.jpg', '1366617315_63ad259642ce4ea6222766a7abbcc5b4.jpg', '', '.jpg', 'image/jpeg', 640, 480, 56, 1366617315, 0),
(136, 12, 2, 'i', 'Serenia-Hills-Project-Progress-as-of-June-2012_2.jpg', '1366617319_81634c4e3ee8be64b7c440423ee7731b.jpg', '', '.jpg', 'image/jpeg', 680, 360, 77, 1366617319, 0),
(137, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_2.jpg', '1366617331_becd4b2af4c17fe42a73c0d5332818b7.jpg', '', '.jpg', 'image/jpeg', 640, 480, 38, 1366617331, 0),
(138, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_1.jpg', '1366617332_aa1aef208059d0d302ea4454a73bdcca.jpg', '', '.jpg', 'image/jpeg', 640, 480, 42, 1366617332, 0),
(139, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_3.jpg', '1366617339_c4f9ae350d0e5a1c2ba0d76aa7583002.jpg', '', '.jpg', 'image/jpeg', 640, 480, 38, 1366617339, 0),
(140, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_4.jpg', '1366617340_d7419fb32b5a85a02bb39519b426434a.jpg', '', '.jpg', 'image/jpeg', 640, 480, 36, 1366617340, 0),
(141, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_6.jpg', '1366617342_a501d3ae9d719961932ebc856d8fb182.jpg', '', '.jpg', 'image/jpeg', 640, 480, 44, 1366617342, 0),
(142, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_5.jpg', '1366617351_bf4d60052380a86fca6a49041457e6ff.jpg', '', '.jpg', 'image/jpeg', 640, 480, 53, 1366617351, 0),
(143, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_7.jpg', '1366617365_a9a3250b3e2dbe145edef0aa07242d54.jpg', '', '.jpg', 'image/jpeg', 640, 480, 65, 1366617365, 0),
(144, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_9.jpg', '1366617366_7ed1ea1ec454043bd0340e605f620dc3.jpg', '', '.jpg', 'image/jpeg', 640, 480, 38, 1366617366, 0),
(145, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_8.jpg', '1366617367_8f03fcdfee0cf95fc3925bda8afa2e69.jpg', '', '.jpg', 'image/jpeg', 640, 480, 56, 1366617367, 0),
(146, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_12.jpg', '1366617369_825ea722a7bc672b3d0fe6182cbad536.jpg', '', '.jpg', 'image/jpeg', 640, 480, 43, 1366617369, 0),
(147, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_11.jpg', '1366617370_eb78426349d7f3d51b82d0b8b5b3bd1f.jpg', '', '.jpg', 'image/jpeg', 640, 480, 45, 1366617370, 0),
(148, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_10.jpg', '1366617370_9f3a844c125d09502287545a5d74e3c8.jpg', '', '.jpg', 'image/jpeg', 640, 480, 49, 1366617370, 0),
(149, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_13.jpg', '1366617388_39ac4f7436d607585244df58d7d1f5eb.jpg', '', '.jpg', 'image/jpeg', 640, 480, 35, 1366617388, 0),
(150, 12, 2, 'i', 'Serenia Hills Project Progress as of May 2012_14.jpg', '1366617402_a528e2abdf151c5bf749f8bfe2d84f05.jpg', '', '.jpg', 'image/jpeg', 640, 480, 45, 1366617402, 0),
(151, 12, 2, 'i', 'Ground Breaking of Setiabudi Sky Garden_1.jpg', '1366617787_5d10db5a55fd259b1f3cf174862119ee.jpg', '', '.jpg', 'image/jpeg', 640, 480, 34, 1366617787, 0),
(152, 12, 2, 'i', 'Ground Breaking of Setiabudi Sky Garden_2.jpg', '1366617788_88267905ee21bbbb46dc5b17ddec3138.jpg', '', '.jpg', 'image/jpeg', 640, 480, 30, 1366617788, 0),
(153, 12, 2, 'i', 'Ground Breaking of Setiabudi Sky Garden_4.jpg', '1366617788_0af1e9897750aa7cf2233d59e9734722.jpg', '', '.jpg', 'image/jpeg', 640, 480, 40, 1366617788, 0),
(154, 12, 2, 'i', 'Ground Breaking of Setiabudi Sky Garden_3.jpg', '1366617788_f7aa98d72fdcc6ef5d1e88c8e445b9c8.jpg', '', '.jpg', 'image/jpeg', 640, 853, 91, 1366617788, 0),
(155, 12, 2, 'i', 'Ground Breaking of Setiabudi Sky Garden_5.jpg', '1366617788_97d9c57ac48b81b11296d7ed02050288.jpg', '', '.jpg', 'image/jpeg', 640, 853, 78, 1366617788, 0),
(156, 12, 2, 'i', 'Ground-Breaking-of-Setiabudi-Sky-Garden_6.jpg', '1366617788_0aac3638284a7bc88701435b7cb6879d.jpg', '', '.jpg', 'image/jpeg', 680, 360, 114, 1366617788, 0),
(157, 12, 2, 'i', 'Serenia Hills Project Progress As of April 2012_4.jpg', '1366617923_922689014ae03d54c6a8dcfbd7b4766c.jpg', '', '.jpg', 'image/jpeg', 640, 480, 45, 1366617923, 0),
(158, 12, 2, 'i', 'Serenia Hills Project Progress As of April 2012_6.jpg', '1366617924_943c0252b46ae490dcceb5d35f066926.jpg', '', '.jpg', 'image/jpeg', 640, 480, 36, 1366617924, 0),
(159, 12, 2, 'i', 'Serenia Hills Project Progress As of April 2012_2.jpg', '1366617924_85cfccbf0ccf939950fbf25b74438788.jpg', '', '.jpg', 'image/jpeg', 640, 480, 45, 1366617924, 0),
(160, 12, 2, 'i', 'Serenia Hills Project Progress As of April 2012_1.jpg', '1366617924_246fd7e5faa1914dcb30ca23114d7bb0.jpg', '', '.jpg', 'image/jpeg', 640, 480, 46, 1366617924, 0),
(161, 12, 2, 'i', 'Serenia Hills Project Progress As of April 2012_5.jpg', '1366617924_c351b0860017101229629d433c4229fb.jpg', '', '.jpg', 'image/jpeg', 640, 480, 58, 1366617924, 0),
(162, 12, 2, 'i', 'Serenia-Hills-Project-Progress-As-of-April-2012_2.jpg', '1366617924_85cfccbf0ccf939950fbf25b744387881.jpg', '', '.jpg', 'image/jpeg', 680, 360, 124, 1366617924, 0),
(163, 12, 2, 'i', 'Serenia Hills Project Progress as of March 2012_Blok-V-W.jpg', '1366618134_60c4725e5b876a610ab07402f7d03051.jpg', '', '.jpg', 'image/jpeg', 640, 360, 23, 1366618134, 0),
(164, 12, 2, 'i', 'Serenia Hills Project Progress as of March 2012_Active-Park.jpg', '1366618134_8333bd291eefdf8c294d35dbe8710f31.jpg', '', '.jpg', 'image/jpeg', 640, 360, 38, 1366618134, 0),
(165, 12, 2, 'i', 'Serenia Hills Project Progress as of March 2012_Blok-U.jpg', '1366618134_241b8821fb908f48e64fc1f31ef2141d.jpg', '', '.jpg', 'image/jpeg', 640, 360, 30, 1366618134, 0),
(166, 12, 2, 'i', 'Serenia-Hills-Project-Progress-as-of-March-2012_Blok-U-T.jpg', '1366618134_98c1b950bf666ccbb92930585f4f0816.jpg', '', '.jpg', 'image/jpeg', 680, 360, 92, 1366618134, 0),
(167, 12, 2, 'i', 'Serenia Hills Project Progress as of February 2012_3.jpg', '1366618365_1d885a04b0c2aaec9718cb4920cf6e08.jpg', '', '.jpg', 'image/jpeg', 640, 360, 36, 1366618365, 0),
(168, 12, 2, 'i', 'Serenia Hills Project Progress as of February 2012_4.jpg', '1366618365_36bd8398477313d48d720def97cb71ab.jpg', '', '.jpg', 'image/jpeg', 640, 360, 31, 1366618365, 0),
(169, 12, 2, 'i', 'Serenia Hills Project Progress as of February 2012_1.jpg', '1366618366_61c14720582f68f99fd8683451284c94.jpg', '', '.jpg', 'image/jpeg', 640, 360, 31, 1366618366, 0),
(170, 12, 2, 'i', 'Serenia-Hills-Project-Progress-as-of-February-2012_2.jpg', '1366618369_71fdf408ab3b9e40ac2792c50397677c.jpg', '', '.jpg', 'image/jpeg', 680, 360, 96, 1366618369, 0),
(171, 12, 2, 'i', 'Setiabudi Sky Garden Project progress As of February 2012_3.jpg', '1366618543_8ed97502f45421f3709c0c274778fdaa.jpg', '', '.jpg', 'image/jpeg', 640, 480, 43, 1366618543, 0),
(172, 12, 2, 'i', 'Setiabudi Sky Garden Project progress As of February 2012_1.jpg', '1366618543_cce4e3018d99f6a7dda5dec7741a7286.jpg', '', '.jpg', 'image/jpeg', 640, 480, 54, 1366618543, 0),
(173, 12, 2, 'i', 'Setiabudi-Sky-Garden-Project-progress-As-of-February-2012_2.jpg', '1366618543_e1eb788b630804b3bbb1b568aa73a165.jpg', '', '.jpg', 'image/jpeg', 680, 360, 117, 1366618543, 0),
(174, 12, 2, 'i', 'Serenia Hills Pre Sale Phase 1_6.jpg', '1366618704_aa6aad2ad69ae41435b4e6f98c41a3af.jpg', '', '.jpg', 'image/jpeg', 620, 465, 54, 1366618704, 0),
(175, 12, 2, 'i', 'Serenia Hills Pre Sale Phase 1_4.jpg', '1366618705_1cf6308788d7bca372cf0a93ba430df1.jpg', '', '.jpg', 'image/jpeg', 620, 465, 53, 1366618705, 0),
(176, 12, 2, 'i', 'Serenia Hills Pre Sale Phase 1_2.jpg', '1366618705_2023640a98f4ef24e5896dc23991dd80.jpg', '', '.jpg', 'image/jpeg', 465, 620, 44, 1366618705, 0),
(177, 12, 2, 'i', 'Serenia Hills Pre Sale Phase 1_1.jpg', '1366618705_f49fcbd91ef22da374a9f6b97c15ea6d.jpg', '', '.jpg', 'image/jpeg', 620, 465, 45, 1366618705, 0),
(178, 12, 2, 'i', 'Serenia Hills Pre Sale Phase 1_5.jpg', '1366618705_747c623b2fe7929a597fde2b1a7d8d85.jpg', '', '.jpg', 'image/jpeg', 620, 465, 54, 1366618705, 0),
(179, 12, 2, 'i', 'Serenia-Hills-Pre-Sale-Phase-1_3.jpg', '1366618705_a126167800141f1c9d53117c1ea1c06e.jpg', '', '.jpg', 'image/jpeg', 680, 360, 86, 1366618705, 0),
(180, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_5.jpg', '1366618832_8bfd6f7ab5173ae8a8fdf7a24229b13e.jpg', '', '.jpg', 'image/jpeg', 640, 360, 18, 1366618832, 0),
(181, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_2.jpg', '1366618833_8a123613f155d1f6ca2d3feb5657d568.jpg', '', '.jpg', 'image/jpeg', 640, 360, 41, 1366618833, 0),
(182, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_6.jpg', '1366618833_e132e1bc59145a92ae20870ea457d041.jpg', '', '.jpg', 'image/jpeg', 640, 360, 36, 1366618833, 0),
(183, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_3.jpg', '1366618833_f7f2b74a5ce3a452815240f500c28ca6.jpg', '', '.jpg', 'image/jpeg', 640, 360, 35, 1366618834, 0),
(184, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_7.jpg', '1366618834_8754ba7de9146330f631224660917b49.jpg', '', '.jpg', 'image/jpeg', 640, 427, 26, 1366618834, 0),
(185, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_8.jpg', '1366618834_043f3e2d28a838e4d02de842a4df3e8c.jpg', '', '.jpg', 'image/jpeg', 640, 427, 26, 1366618834, 0),
(186, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_9.jpg', '1366618835_a45869caa389e34022a1c57ae60c5307.jpg', '', '.jpg', 'image/jpeg', 640, 427, 37, 1366618835, 0),
(187, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_10.jpg', '1366618836_20a8844a6d3978953d43c62e6322e657.jpg', '', '.jpg', 'image/jpeg', 640, 360, 31, 1366618836, 0),
(188, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_12.jpg', '1366618837_e7886aa09a56f8b876936eb017c1ba2f.jpg', '', '.jpg', 'image/jpeg', 640, 360, 36, 1366618837, 0),
(189, 12, 2, 'i', 'Setiabudi Sky Garden Agent Gathering_2.jpg', '1366618838_8a123613f155d1f6ca2d3feb5657d568.jpg', '', '.jpg', 'image/jpeg', 680, 360, 115, 1366618838, 0),
(190, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_3.jpg', '1366619246_b8219e3e18bc7a6b69dc193d6c2eee46.jpg', '', '.jpg', 'image/jpeg', 640, 427, 40, 1366619246, 0),
(191, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_1.jpg', '1366619246_be125a967939f118a53d216b569cbc39.jpg', '', '.jpg', 'image/jpeg', 640, 360, 34, 1366619246, 0),
(192, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_4.jpg', '1366619246_5a37e7806b208a0d3a72f99b36747883.jpg', '', '.jpg', 'image/jpeg', 640, 360, 28, 1366619246, 0),
(193, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_5.jpg', '1366619246_c9b2ec190a187a0ad808fc6ce519d288.jpg', '', '.jpg', 'image/jpeg', 640, 360, 33, 1366619246, 0),
(194, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_2.jpg', '1366619246_ede62ec4a00b7600c62b27598b226190.jpg', '', '.jpg', 'image/jpeg', 595, 842, 75, 1366619246, 0),
(195, 12, 2, 'i', 'Soft-Launching-Serenia-Hills-Townhouse-at-Lebak-Bulus_9.jpg', '1366619246_0807ce8c52e2ec7934476c480675bbc5.jpg', '', '.jpg', 'image/jpeg', 680, 360, 112, 1366619246, 0),
(196, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_6.jpg', '1366619248_75c399c11a0fdf309fdc34d09ab8fa52.jpg', '', '.jpg', 'image/jpeg', 640, 360, 30, 1366619248, 0),
(197, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_8.jpg', '1366619248_79a77b8e9757ec4859870e3e8f7179f1.jpg', '', '.jpg', 'image/jpeg', 640, 360, 29, 1366619248, 0),
(198, 12, 2, 'i', 'Soft Launching Serenia Hills Townhouse at Lebak Bulus_7.jpg', '1366619249_b4d749e18033e6417a97d8c12e71c2d2.jpg', '', '.jpg', 'image/jpeg', 640, 431, 45, 1366619249, 0),
(199, 12, 2, 'i', 'Setiabudi Sky Garden Show Unit_3.jpg', '1366619501_4827c01860e777b7c0a46e89ad99c4da.jpg', '', '.jpg', 'image/jpeg', 640, 480, 23, 1366619501, 0),
(200, 12, 2, 'i', 'Setiabudi Sky Garden Show Unit_7.jpg', '1366619502_bee52e52eefa386334e3a7ffb06c4233.jpg', '', '.jpg', 'image/jpeg', 640, 480, 36, 1366619502, 0),
(201, 12, 2, 'i', 'Setiabudi Sky Garden Show Unit_2.jpg', '1366619502_c8180d7a7eeb89388c3067f8d40b9aa3.jpg', '', '.jpg', 'image/jpeg', 640, 480, 31, 1366619502, 0),
(202, 12, 2, 'i', 'Setiabudi Sky Garden Show Unit_4.jpg', '1366619502_94b153c0bcd69d830d0aed9af90ada5a.jpg', '', '.jpg', 'image/jpeg', 640, 480, 41, 1366619502, 0),
(203, 12, 2, 'i', 'Setiabudi Sky Garden Show Unit_5.jpg', '1366619502_d92dd9f5020224fc011486f54bcd7b79.jpg', '', '.jpg', 'image/jpeg', 640, 480, 35, 1366619502, 0),
(204, 12, 2, 'i', 'Setiabudi Sky Garden Show Unit_6.jpg', '1366619502_cf6a118ac8bc831eaf899add194e1da0.jpg', '', '.jpg', 'image/jpeg', 640, 480, 28, 1366619502, 0),
(205, 12, 2, 'i', 'Setiabudi Sky Garden Show Unit_8.jpg', '1366619503_8af4119fb61853ad226aaccaf949f203.jpg', '', '.jpg', 'image/jpeg', 640, 480, 29, 1366619503, 0),
(206, 12, 2, 'i', 'Setiabudi-Sky-Garden-Show-Unit_1.jpg', '1366619504_aa8b83a88d7be3775a83b407dee2cc05.jpg', '', '.jpg', 'image/jpeg', 680, 360, 94, 1366619504, 0),
(207, 12, 2, 'i', 'Landscape concept at Serenia Hills_presentation_landscape.jpg', '1366619711_7bf1f1385a7d7bfc22c1f60cc666898a.jpg', '', '.jpg', 'image/jpeg', 640, 452, 52, 1366619711, 0),
(208, 12, 2, 'i', 'Landscape concept at Serenia Hills_map.jpg', '1366619711_91f384066b2305ddb36c5468b98d9a71.jpg', '', '.jpg', 'image/jpeg', 489, 480, 27, 1366619711, 0),
(209, 12, 2, 'i', 'Landscape-concept-at-Serenia-Hills_1.jpg', '1366619711_076b7f2881f6dcacb117c9082444f247.jpg', '', '.jpg', 'image/jpeg', 680, 360, 77, 1366619711, 0),
(210, 12, 2, 'i', 'Landscape concept at Serenia Hills_Tanaman-di-Serenia-Hills-.jpg', '1366619711_299f1aaad237b2eed185fda3695cf727.jpg', '', '.jpg', 'image/jpeg', 640, 452, 63, 1366619711, 0),
(211, 12, 2, 'i', 'Landscape concept at Serenia Hills_Preview-of-presentation_landscap.jpg', '1366619711_ec8ae00e928023236ed6668fabe2d1e4.jpg', '', '.jpg', 'image/jpeg', 640, 452, 51, 1366619711, 0),
(212, 13, 1, 'i', 'Senopati-Suites-3.jpg', '1366630009_ee97a8e3cd909abb3a4140ba5276f794.jpg', '', '.jpg', 'image/jpeg', 900, 360, 87, 1366630009, 0),
(213, 13, 1, 'i', 'Senopati-Suites-2.jpg', '1366630009_69ba259b86fd9487f90d2e0fd75b890b.jpg', '', '.jpg', 'image/jpeg', 900, 360, 100, 1366630009, 0),
(214, 13, 1, 'i', 'Senopati-Suites.jpg', '1366630009_8c367fad732650cfe9cc4b4c5a7a2de6.jpg', '', '.jpg', 'image/jpeg', 900, 360, 124, 1366630009, 0),
(215, 13, 1, 'i', 'Senopati-Suites-6.jpg', '1366630015_fb2ad7982e8f9c0d8576a31e6af1cfda.jpg', '', '.jpg', 'image/jpeg', 900, 360, 87, 1366630015, 0),
(216, 13, 1, 'i', 'Senopati-Suites-4.jpg', '1366630015_01a9dbd2953eb67cfe5c7d11037b2214.jpg', '', '.jpg', 'image/jpeg', 900, 360, 77, 1366630015, 0),
(217, 13, 1, 'i', 'Senopati-Suites-5.jpg', '1366630015_ab4c669e36ca75e85489b52b4b3e0aba.jpg', '', '.jpg', 'image/jpeg', 900, 360, 116, 1366630015, 0),
(218, 13, 1, 'i', 'Senopati-Suites-Highlight.jpg', '1366630021_3e06cd9a61f39769685acc5998470c72.jpg', '', '.jpg', 'image/jpeg', 900, 360, 150, 1366630021, 0),
(219, 4, 2, 'i', 'RasunaSkyGarden_Birdeye1_R4.jpg', 'RasunaSkyGarden_Birdeye1_R4.jpg', '', '.jpg', 'image/jpeg', 900, 360, 177, 0, 0),
(220, 4, 2, 'i', 'One Balmoral Singapore.jpg', 'One_Balmoral_Singapore.jpg', '', '.jpg', 'image/jpeg', 900, 360, 154, 0, 0),
(221, 4, 2, 'i', 'One Balmoral_Singapore 1.jpg', 'One_Balmoral_Singapore_1.jpg', '', '.jpg', 'image/jpeg', 900, 360, 108, 0, 0),
(222, 4, 2, 'i', 'One Balmoral_Singapore 2.jpg', 'One_Balmoral_Singapore_2.jpg', '', '.jpg', 'image/jpeg', 900, 360, 164, 0, 0),
(223, 4, 2, 'i', 'One Balmoral_Singapore 3.jpg', 'One_Balmoral_Singapore_3.jpg', '', '.jpg', 'image/jpeg', 900, 360, 166, 0, 0),
(224, 4, 2, 'i', 'One Balmoral_Singapore 4.jpg', 'One_Balmoral_Singapore_4.jpg', '', '.jpg', 'image/jpeg', 900, 360, 163, 0, 0),
(225, 4, 2, 'i', 'One Balmoral_Singapore 5.jpg', 'One_Balmoral_Singapore_5.jpg', '', '.jpg', 'image/jpeg', 900, 360, 159, 0, 0),
(226, 4, 2, 'i', 'Alila Bintan 2-Bedroom-Pool.jpg', 'Alila_Bintan_2-Bedroom-Pool.jpg', '', '.jpg', 'image/jpeg', 900, 360, 155, 0, 0),
(227, 4, 2, 'i', 'Alila Bintan Sea-Tree.jpg', 'Alila_Bintan_Sea-Tree.jpg', '', '.jpg', 'image/jpeg', 900, 360, 160, 0, 0),
(228, 4, 2, 'i', 'Alila Bintan Public-Area-Pool.jpg', 'Alila_Bintan_Public-Area-Pool.jpg', '', '.jpg', 'image/jpeg', 900, 360, 102, 0, 0),
(229, 4, 2, 'i', 'Alila Bintan Gorge.jpg', 'Alila_Bintan_Gorge.jpg', '', '.jpg', 'image/jpeg', 900, 360, 229, 0, 0),
(230, 4, 2, 'i', 'Alila-Villas-Uluwatu-05.jpg', 'Alila-Villas-Uluwatu-05.jpg', '', '.jpg', 'image/jpeg', 900, 360, 132, 0, 0),
(231, 4, 2, 'i', 'Alila-Uluwatu.jpg', 'Alila-Uluwatu.jpg', '', '.jpg', 'image/jpeg', 900, 360, 123, 0, 0),
(232, 4, 2, 'i', 'Alila Uluwatu.jpg', 'Alila_Uluwatu.jpg', '', '.jpg', 'image/jpeg', 900, 360, 161, 0, 0),
(233, 4, 2, 'i', 'BoulevardJAGAKARSA8.jpg', 'BoulevardJAGAKARSA8.jpg', '', '.jpg', 'image/jpeg', 900, 360, 260, 0, 0),
(234, 4, 2, 'i', 'interior-350.jpg', 'interior-350.jpg', '', '.jpg', 'image/jpeg', 900, 360, 116, 0, 0),
(235, 4, 2, 'i', 'Cassamora Jagakarsa type-350.jpg', 'Cassamora_Jagakarsa_type-350.jpg', '', '.jpg', 'image/jpeg', 900, 360, 158, 0, 0),
(236, 4, 2, 'i', 'Cassamora Jagakarsa Ruko.jpg', 'Cassamora_Jagakarsa_Ruko.jpg', '', '.jpg', 'image/jpeg', 900, 360, 160, 0, 0),
(237, 4, 2, 'i', 'Cassamora Jagakarsa Interior.jpg', 'Cassamora_Jagakarsa_Interior.jpg', '', '.jpg', 'image/jpeg', 900, 360, 116, 0, 0),
(238, 4, 2, 'i', 'Cassamora Boulevard Jagakarsa.jpg', 'Cassamora_Boulevard_Jagakarsa.jpg', '', '.jpg', 'image/jpeg', 900, 360, 260, 0, 0),
(239, 4, 2, 'i', 'Izzara.jpg', 'Izzara.jpg', '', '.jpg', 'image/jpeg', 900, 360, 195, 0, 0),
(240, 4, 2, 'i', 'Izzara4.jpg', 'Izzara4.jpg', '', '.jpg', 'image/jpeg', 900, 360, 176, 0, 0),
(241, 4, 2, 'i', 'Izzara3.jpg', 'Izzara3.jpg', '', '.jpg', 'image/jpeg', 900, 360, 208, 0, 0),
(242, 4, 2, 'i', 'Izzara2.jpg', 'Izzara2.jpg', '', '.jpg', 'image/jpeg', 900, 360, 162, 0, 0),
(243, 4, 2, 'i', 'Izzara1.jpg', 'Izzara1.jpg', '', '.jpg', 'image/jpeg', 900, 360, 151, 0, 0),
(244, 4, 2, 'i', 'Izzara lobby.jpg', 'Izzara_lobby.jpg', '', '.jpg', 'image/jpeg', 900, 360, 152, 0, 0),
(245, 4, 2, 'i', 'Izzara 3bedrooms-living-and-dining-normal-02.jpg', 'Izzara_3bedrooms-living-and-dining-normal-02.jpg', '', '.jpg', 'image/jpeg', 900, 360, 100, 0, 0),
(246, 4, 2, 'i', 'Izzara 3bedrooms-living-and-dining-normal.jpg', 'Izzara_3bedrooms-living-and-dining-normal.jpg', '', '.jpg', 'image/jpeg', 900, 360, 116, 0, 0),
(247, 4, 2, 'i', 'Izzara 3bedrooms-living-and-dining.jpg', 'Izzara_3bedrooms-living-and-dining.jpg', '', '.jpg', 'image/jpeg', 900, 360, 97, 0, 0),
(248, 4, 2, 'i', 'Izzara 3bedroom.jpg', 'Izzara_3bedroom.jpg', '', '.jpg', 'image/jpeg', 900, 360, 89, 0, 0),
(249, 4, 2, 'i', 'Izzara 2 bedrooms-living-and-dining.jpg', 'Izzara_2_bedrooms-living-and-dining.jpg', '', '.jpg', 'image/jpeg', 900, 360, 102, 0, 0),
(250, 4, 2, 'i', 'Serenia Hills 3.jpg', 'Serenia_Hills_3.jpg', '', '.jpg', 'image/jpeg', 900, 360, 192, 0, 0),
(251, 4, 2, 'i', 'Serenia Hills 2.jpg', 'Serenia_Hills_2.jpg', '', '.jpg', 'image/jpeg', 900, 360, 161, 0, 0),
(252, 4, 2, 'i', 'Serenia Hills 1.jpg', 'Serenia_Hills_1.jpg', '', '.jpg', 'image/jpeg', 900, 360, 156, 0, 0),
(253, 4, 2, 'i', 'Serenia Hills ACTIVE-PARK.jpeg', 'Serenia_Hills_ACTIVE-PARK.jpeg', '', '.jpeg', 'image/jpeg', 900, 360, 206, 0, 0),
(254, 4, 2, 'i', 'Serenia Hills c.jpg', 'Serenia_Hills_c.jpg', '', '.jpg', 'image/jpeg', 900, 360, 177, 0, 0),
(255, 4, 2, 'i', 'Serenia Hills b.jpg', 'Serenia_Hills_b.jpg', '', '.jpg', 'image/jpeg', 900, 360, 157, 0, 0),
(256, 4, 2, 'i', 'Serenia Hills a.jpg', 'Serenia_Hills_a.jpg', '', '.jpg', 'image/jpeg', 900, 360, 214, 0, 0),
(257, 4, 2, 'i', 'Setiabudi Sky Garden 2.jpg', 'Setiabudi_Sky_Garden_2.jpg', '', '.jpg', 'image/jpeg', 900, 360, 177, 0, 0),
(258, 4, 2, 'i', 'Setiabudi Sky Garden 6.jpg', 'Setiabudi_Sky_Garden_6.jpg', '', '.jpg', 'image/jpeg', 900, 360, 233, 0, 0),
(259, 4, 2, 'i', 'Setiabudi Sky Garden 5.jpg', 'Setiabudi_Sky_Garden_5.jpg', '', '.jpg', 'image/jpeg', 900, 360, 215, 0, 0),
(260, 4, 2, 'i', 'Setiabudi Sky Garden 4.jpg', 'Setiabudi_Sky_Garden_4.jpg', '', '.jpg', 'image/jpeg', 900, 360, 169, 0, 0),
(261, 4, 2, 'i', 'Setiabudi Sky Garden 3.jpg', 'Setiabudi_Sky_Garden_3.jpg', '', '.jpg', 'image/jpeg', 900, 360, 143, 0, 0),
(262, 4, 2, 'i', 'Setiabudi Sky Garden 2.jpg', 'Setiabudi_Sky_Garden_21.jpg', '', '.jpg', 'image/jpeg', 900, 360, 177, 0, 0),
(263, 4, 2, 'i', 'Setiabudi Sky Garden 1.jpg', 'Setiabudi_Sky_Garden_1.jpg', '', '.jpg', 'image/jpeg', 900, 360, 180, 0, 0),
(264, 4, 2, 'i', 'Setiabudi Sky Garden.jpg', 'Setiabudi_Sky_Garden.jpg', '', '.jpg', 'image/jpeg', 900, 360, 130, 0, 0),
(265, 4, 2, 'i', 'RasunaSkyGarden_Playground_R4.jpg', 'RasunaSkyGarden_Playground_R4.jpg', '', '.jpg', 'image/jpeg', 900, 360, 226, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cv_file_folders`
--

INSERT INTO `cv_file_folders` (`id`, `parent_id`, `slug`, `name`, `date_added`, `sort`) VALUES
(1, 0, 'default', 'Default Folder', 1365203367, 0),
(2, 0, 'property-image', 'Property Image', 1365353213, 0),
(3, 0, 'people-image', 'People Image', 1365953789, 0),
(4, 0, 'banner-image', 'Banner Image', 1366098292, 0),
(5, 2, 'one-balmoral', 'One Balmoral', 1366615033, 0),
(6, 2, 'alila', 'Alila', 1366615055, 0),
(7, 2, 'cassamora', 'Cassamora', 1366615066, 0),
(8, 2, 'harris', 'Harris', 1366615075, 0),
(9, 2, 'izzara', 'Izzara', 1366615084, 0),
(10, 2, 'serenia-hills', 'Serenia Hills', 1366615111, 0),
(11, 2, 'setia-budi-sky-garden', 'Setia Budi Sky Garden', 1366615124, 0),
(12, 0, 'news', 'News', 1366615316, 0),
(13, 2, 'senopati', 'Senopati', 1366629988, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cv_marketing_agent`
--

INSERT INTO `cv_marketing_agent` (`id`, `name`, `phone`, `email`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Agent 1', '+62812 3456 789', 'agent1@cavaproperty.com', 1, '2013-04-14 19:35:09', '0000-00-00 00:00:00'),
(2, 'Agent 2', '+62812 3456 789', 'agent2@cavaproperty.com', 1, '2013-04-14 19:36:09', '0000-00-00 00:00:00'),
(3, 'Reynolds Darmadi', '081381404040', 'Reynolds.Darmadi@cavaproperty.com', 0, '2013-04-22 16:10:39', '0000-00-00 00:00:00'),
(4, 'Benigna Maria', '081381404040', 'Benigna.Maria@cavaproperty.com', 0, '2013-04-22 16:11:44', '0000-00-00 00:00:00'),
(5, 'Vanessa Natalia', '0812 1063 103 / 021 25558994', 'vanessa@cavaproperty.com', 0, '2013-04-22 16:12:28', '2013-04-26 14:02:22'),
(6, 'Laura Loe', '0815 8356 568 / 021 2555 8994', 'laura.loe@cavaproperty.com', 0, '2013-04-22 16:13:07', '2013-04-26 13:57:48'),
(7, 'David Tan', '0817 999 199 / 021 2555 8994', 'david@cavaproperty.com', 0, '2013-04-22 16:13:39', '2013-04-26 13:50:04'),
(8, 'Andi', '0817 0818 124 / 021 25558994', 'andi@cavaproperty.com', 0, '2013-04-26 14:03:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_member`
--

DROP TABLE IF EXISTS `cv_member`;
CREATE TABLE IF NOT EXISTS `cv_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `mobile_phone` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_code` varchar(255) NOT NULL,
  `block` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cv_member`
--

INSERT INTO `cv_member` (`id`, `title`, `first_name`, `last_name`, `dob`, `address`, `city`, `postal_code`, `email`, `phone`, `mobile_phone`, `password`, `forgot_code`, `block`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'Mr', 'Lorem', 'Ipsum', '1989-11-08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Jakarta', 15145, 'lorem@ipsum.com', 123456, 654321, 'd2e16e6ef52a45b7468f1da56bba1953', 'kMyw0y4D', 'N', 0, '2013-05-25 21:03:00', '2013-05-25 21:03:00');

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
  `post_date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `cv_news`
--

INSERT INTO `cv_news` (`id`, `title`, `description`, `image_id`, `slug`, `month`, `year`, `post_date`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'News 1', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-1', 4, 2013, '2013-04-22', 1, '2013-04-18 16:08:27', '2013-04-21 16:30:53'),
(2, 'News 2', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-2', 5, 2013, '2013-04-22', 1, '2013-05-19 16:08:27', '2013-04-21 01:32:58'),
(3, 'News 3', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-3', 6, 2014, '2013-04-22', 1, '2014-06-20 16:08:27', '2013-04-21 01:32:58'),
(4, 'News 4', '<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu metus non diam consectetur accumsan sit amet a lorem. Ut nisl est, tempus eget imperdiet a, convallis at orci. Nullam eu ante odio. Curabitur ut massa nec quam pulvinar laoreet vel ut leo.</p>\r\n<p>\r\n Sed in tristique nisl. Sed lobortis faucibus pretium. Vestibulum volutpat vehicula elementum. Fusce sed dapibus lectus. Quisque sapien justo, tincidunt in bibendum at, tempus a lectus. Curabitur elit urna, aliquam vel tincidunt a, tincidunt in mauris.</p>\r\n<p>\r\n Cras tellus tellus, scelerisque ut condimentum ac, feugiat vel lorem. Cras porttitor nisi a augue feugiat sed rhoncus tortor condimentum.</p>', 10, 'news-4', 7, 2014, '2013-04-22', 1, '2014-07-21 16:08:27', '2013-04-21 03:40:55'),
(5, 'Syukuran Project Izzara', '<p>\r\n Pada hari ini, 29 November 2012, telah diadakan acara syukuran project apartemen Izzara yang berlokasi di Jl. TB Simatupang, Jakarta Selatan, Pada hari ini telah dimulai pengerjaan tiang pancang dan normalisasi sungai. Alat-alat berat pun sudah mulai masuk ke area lokasi dan beroperasi untuk pengerjaan penggalian untuk pemancangan tiang pertama.</p>', 11, 'syukuran-project-izzara', 11, 2012, '2012-11-07', 0, '2013-04-22 11:26:59', '2013-04-24 11:52:09'),
(6, 'Serenia Hills Project Progress as of Oktober 2012', '<p>\n Serenia Hills Project Progress as of Oktober 2012. For further information, please call: +62-813-14511111 +62-815-8356 568 +62-817-0818124</p>', 16, 'serenia-hills-project-progress-as-of-oktober-2012', 11, 2012, '2012-11-05', 0, '2013-04-22 11:37:30', '2013-04-22 15:37:34'),
(7, 'Casamora Project Progress as of November 2012', '<p>\n Casamora Project Progress as of November 2012</p>', 26, 'casamora-project-progress-as-of-november-2012', 11, 2012, '2012-11-05', 0, '2013-04-22 11:42:51', '2013-04-22 15:38:09'),
(8, 'Serenia Hills Project Progress as of November 2012', '<p>\n Serenia Hills Project Progress as of november 2012. For further information, please call: +62-813-14511111 +62-857-15761617 +62-817-0818124</p>', 31, 'serenia-hills-project-progress-as-of-november-2012', 11, 2012, '2012-11-05', 0, '2013-04-22 12:03:24', '2013-04-22 15:38:39'),
(9, 'Izzara Project Progress as of October 2012', '<p>\n Project Progress as of October 2012. For further information, please contact +62-812-8280280 , +62-812-1063103</p>', 38, 'izzara-project-progress-as-of-october-2012', 10, 2012, '2012-10-01', 0, '2013-04-22 12:08:15', '2013-04-22 15:39:16'),
(10, 'Serenia Hills Project Progress as of September 2012', '<p>\n Serenia Hills Project Progress as of September 2012.</p>\n<p>\n For further information, please call: +62-813-14511111 +62-857-15761617 +62-817-0818124</p>', 42, 'serenia-hills-project-progress-as-of-september-2012', 9, 2012, '2012-09-01', 0, '2013-04-22 12:13:43', '2013-04-22 15:39:38'),
(11, 'Serenia Hills Exhibition Pondok Indah Mall Sept 2012', '<p>\n For further information,</p>\n<p>\n please call: +62-813-14511111 +62-857-15761617 +62-817-0818124</p>', 47, 'serenia-hills-exhibition-pondok-indah-mall-sept-2012', 9, 2012, '2012-09-02', 0, '2013-04-22 12:16:58', '2013-04-22 15:40:18'),
(12, 'Izzara Project progress As of September 2012', '<p>\n Project Progress as of September 2012.</p>\n<p>\n For further information, please contact +62-812-8280280 , +62-812-1063103</p>', 49, 'izzara-project-progress-as-of-september-2012', 9, 2012, '2012-09-04', 0, '2013-04-22 12:52:58', '2013-04-22 15:40:51'),
(13, 'Casamora Project Progress as of September 2012', '<p>\n Casamora Project Progress as of September 2012.</p>\n<p>\n For further information, please call: +62-817-0818124 , or +62-8128280280</p>', 54, 'casamora-project-progress-as-of-september-2012', 9, 2012, '2012-09-03', 0, '2013-04-22 13:06:40', '2013-04-22 15:41:21'),
(14, 'Casamora Project Progress as of August 2012', '<p>\n Casamora Project Progress as of August 2012.</p>\n<p>\n For further information, please call: +62-815-13600524 +62-8128280280</p>', 59, 'casamora-project-progress-as-of-august-2012', 8, 2012, '2012-08-01', 0, '2013-04-22 14:18:05', '0000-00-00 00:00:00'),
(15, 'Test Piling Izzara on July 2012', '<p>\n Test Piling Izzara on July 16, 2012. For more information,</p>\n<p>\n please contact +62-812-8280280</p>', 101, 'test-piling-izzara-on-july-2012', 7, 2012, '2012-07-01', 0, '2013-04-22 14:29:11', '0000-00-00 00:00:00'),
(16, 'Setiabudi Sky Garden Project Progress as of July 2012', '<p>\n Setiabudi Sky Garden Project Progress as of July 2012.</p>\n<p>\n For further information, please call +62-815-13600524</p>', 102, 'setiabudi-sky-garden-project-progress-as-of-july-2012', 7, 2012, '2012-07-01', 0, '2013-04-22 14:32:06', '2013-04-22 14:32:25'),
(17, 'Serenia Hills Project Progress as of July 2012', '<p>\n Serenia Hills Project Progress as of July 2012.</p>\n<p>\n For further information,</p>\n<p>\n please call +62-815-13600524 +62-813-14511111 +62-857-15761617 +62-817-0818124</p>', 109, 'serenia-hills-project-progress-as-of-july-2012', 7, 2012, '2012-07-02', 0, '2013-04-22 14:36:54', '0000-00-00 00:00:00'),
(18, 'Izzara Project Progress as of July 2012', '<p>\n Izzara Project Progress as of July 2012.</p>\n<p>\n For further information,</p>\n<p>\n please contact +62-812-8280280</p>', 111, 'izzara-project-progress-as-of-july-2012', 7, 2012, '2012-07-02', 0, '2013-04-22 14:40:44', '0000-00-00 00:00:00'),
(19, 'Setiabudi Sky Garden Project Progress as of June 2012', '<p>\n Setiabudi Sky Garden Project Progress as of June 2012.</p>\n<p>\n For further information, please call +62-815-13600524</p>', 120, 'setiabudi-sky-garden-project-progress-as-of-june-2012', 6, 2012, '2012-06-01', 1, '2013-04-22 14:44:33', '0000-00-00 00:00:00'),
(20, 'Serenia Hills Project Progress as of June 2012', '<p>\n Serenia Hills Project Progress as of June 2012.</p>\n<p>\n For further information, please call:+62-815-13600524 +62-813-14511111 +62-857-15761617 +62-817-0818124</p>', 126, 'serenia-hills-project-progress-as-of-june-2012', 6, 2012, '2012-06-02', 1, '2013-04-22 14:47:57', '0000-00-00 00:00:00'),
(21, 'Izzara Project Progress as of June 2012', '<p>\n Izzara Project Progress as of June 2012.</p>\n<p>\n For further information, please contact +62-812-8280280</p>', 130, 'izzara-project-progress-as-of-june-2012', 6, 2012, '2012-06-04', 0, '2013-04-22 14:50:25', '0000-00-00 00:00:00'),
(22, 'Serenia Hills Project Progress as of May 2012', '<p>\n &nbsp;</p>\n<div>\n Serenia Hills Project Progress as of May 2012.</div>\n<div>\n For further information, please call: +62-815-13600524 +62-813-14511111 +62-857-15761617 +62-817-0818124</div>', 136, 'serenia-hills-project-progress-as-of-may-2012', 5, 2012, '2012-05-01', 0, '2013-04-22 15:01:12', '0000-00-00 00:00:00'),
(23, 'Ground Breaking of Setiabudi Sky Garden held on 15th March 2012', '<p>\n Ground Breaking of Setiabudi Sky Garden held on 15th March 2012.</p>\n<p>\n The project will be completed on Q4-2014.</p>', 156, 'ground-breaking-of-setiabudi-sky-garden-held-on-15th-march-2012', 3, 2012, '2012-03-01', 1, '2013-04-22 15:04:11', '0000-00-00 00:00:00'),
(24, 'Serenia Hills Project Progress As of April 2012', '<p>\n Serenia Hills Project Progress As of April 2012</p>', 162, 'serenia-hills-project-progress-as-of-april-2012', 4, 2012, '2012-04-01', 0, '2013-04-22 15:07:40', '2013-04-22 15:11:57'),
(25, 'Serenia Hills Project Progress as of March 2012', '<p>\n Serenia Hills Project Progress as of March 2012.</p>\n<p>\n For further information, please call +62-815-13600524</p>', 166, 'serenia-hills-project-progress-as-of-march-2012', 3, 2012, '2012-03-03', 1, '2013-04-22 15:10:55', '0000-00-00 00:00:00'),
(26, 'Serenia Hills Project Progress as of February 2012', '<p>\n Serenia Hills Project Progress as of February 2012.</p>\n<p>\n For further information, please call +62-815-13600524</p>', 170, 'serenia-hills-project-progress-as-of-february-2012', 2, 2012, '2012-02-01', 1, '2013-04-22 15:13:53', '0000-00-00 00:00:00'),
(27, 'Setiabudi Sky Garden Project Progress as of February 2012', '<p>\n Setiabudi Sky Garden Project Progress as of February 2012. The Ground Breaking ceremony will be held on 15 March 2012 (to be confirmed).</p>\n<p>\n For further information, please call +62-815-13600524</p>', 173, 'setiabudi-sky-garden-project-progress-as-of-february-2012', 2, 2012, '2012-02-03', 0, '2013-04-22 15:16:39', '0000-00-00 00:00:00'),
(28, 'Serenia Hills Pre Sale Phase 1', '<p>\n Cava Property has been appointed as a Lead Marketing Agent for Serenia Hills and we are welcoming you to our &nbsp;temporary marketing office, located at Villa Delima&rsquo;s club house, Lebak Bulus.</p>\n<p>\n Our marketing temporary office will be open from 09.00 &ndash; 17.00 Monday &ndash; Sunday except on public holiday.</p>\n<p>\n Up to August, we have sold up to 90% of the phase 1. Another great success from great project.</p>', 179, 'serenia-hills-pre-sale-phase-1', 12, 2011, '2011-12-01', 0, '2013-04-22 15:19:32', '2013-04-22 15:44:20'),
(29, 'setiabudi sky garden agent gathering november 2011', '<p>\n Setiabudi Sky Garden Agent Gathering Friday, November 11th, 2011 02.00 pm onwards</p>\n<p>\n Sky lounge Setiabudi Residences Apartment, Tower 2, 30th floor</p>', 189, 'setiabudi-sky-garden-agent-gathering-november-2011', 11, 2011, '2011-11-01', 0, '2013-04-22 15:25:27', '2013-04-22 15:29:48'),
(30, 'Soft Launching Serenia Hills Townhouse at Lebak Bulus 10 2011', '<p>\n We invite all prospective buyers to come and join our Soft Launching event on the project&rsquo;s site (Villa Delima).</p>\n<p>\n The event will be held on 9 October 2011 at 10.00 am &ndash; 04.00 pm. All prospective buyers are required to bring invitation,</p>\n<p>\n please call us for further information at +62 815 13600524</p>', 195, 'soft-launching-serenia-hills-townhouse-at-lebak-bulus-10-2011', 11, 2011, '2011-11-01', 0, '2013-04-22 15:29:33', '0000-00-00 00:00:00'),
(31, 'Setiabudi Sky Garden Show Unit', '<p>\n Marketing Gallery and show unit for Setiabudi Sky Garden now is open for public. Prospective buyers can find 3 show units consist of 2 units of 2 bedroom and 1 unit of 3 bedroom.</p>\n<p>\n The marketing gallery is open for public from Monday &ndash; Sunday on 09.00 &ndash; 19.00.</p>\n<p>\n For show unit visit, please make your appointment at 0812-8280280</p>', 206, 'setiabudi-sky-garden-show-unit', 10, 2011, '2011-10-01', 0, '2013-04-22 15:33:03', '2013-04-22 15:33:36'),
(32, 'Landscape concept at Serenia Hills', '<p>\n Landscape concept at Serenia Hills. For further information,</p>\n<p>\n please call: +62-815-13600524 +62-813-14511111 +62-857-15761617 +62-817-0818124 For further information</p>\n<p>\n &nbsp;</p>', 209, 'landscape-concept-at-serenia-hills', 10, 2011, '2011-10-01', 0, '2013-04-22 15:36:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv_news_gallery`
--

DROP TABLE IF EXISTS `cv_news_gallery`;
CREATE TABLE IF NOT EXISTS `cv_news_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `caption` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `cv_news_gallery`
--

INSERT INTO `cv_news_gallery` (`id`, `news_id`, `file_id`, `caption`) VALUES
(1, 1, 10, NULL),
(2, 1, 8, NULL),
(3, 5, 12, ''),
(4, 5, 13, ''),
(5, 5, 14, ''),
(6, 6, 17, NULL),
(7, 6, 18, NULL),
(8, 6, 19, NULL),
(9, 6, 20, NULL),
(10, 6, 22, NULL),
(11, 6, 23, NULL),
(12, 6, 24, NULL),
(13, 7, 27, NULL),
(14, 7, 28, NULL),
(15, 7, 29, NULL),
(16, 7, 30, NULL),
(17, 8, 37, NULL),
(18, 8, 36, NULL),
(19, 8, 35, NULL),
(20, 8, 34, NULL),
(21, 8, 33, NULL),
(22, 8, 32, NULL),
(23, 9, 39, NULL),
(24, 9, 40, NULL),
(25, 9, 41, NULL),
(26, 10, 44, NULL),
(27, 10, 45, NULL),
(28, 10, 46, NULL),
(29, 11, 48, NULL),
(30, 12, 50, NULL),
(31, 12, 51, NULL),
(32, 12, 52, NULL),
(33, 12, 53, NULL),
(34, 13, 55, NULL),
(35, 13, 56, NULL),
(36, 13, 57, NULL),
(37, 13, 58, NULL),
(38, 14, 60, NULL),
(39, 14, 61, NULL),
(40, 14, 62, NULL),
(41, 14, 63, NULL),
(42, 14, 64, NULL),
(43, 14, 65, NULL),
(44, 15, 81, NULL),
(45, 15, 82, NULL),
(46, 15, 79, NULL),
(47, 15, 78, NULL),
(48, 15, 77, NULL),
(49, 16, 104, NULL),
(50, 16, 103, NULL),
(51, 17, 108, NULL),
(52, 17, 110, NULL),
(53, 17, 105, NULL),
(54, 17, 106, NULL),
(55, 17, 107, NULL),
(56, 18, 113, NULL),
(57, 18, 112, NULL),
(58, 19, 114, NULL),
(59, 19, 118, NULL),
(60, 19, 117, NULL),
(61, 19, 115, NULL),
(62, 19, 116, NULL),
(63, 19, 119, NULL),
(64, 20, 125, NULL),
(65, 20, 122, NULL),
(66, 20, 123, NULL),
(67, 20, 124, NULL),
(68, 20, 121, NULL),
(69, 21, 127, NULL),
(70, 21, 128, NULL),
(71, 21, 129, NULL),
(72, 22, 150, NULL),
(73, 22, 149, NULL),
(74, 22, 147, NULL),
(75, 22, 148, NULL),
(76, 22, 146, NULL),
(77, 22, 145, NULL),
(78, 22, 142, NULL),
(79, 22, 144, NULL),
(80, 22, 141, NULL),
(81, 22, 139, NULL),
(82, 22, 138, NULL),
(83, 22, 137, NULL),
(84, 23, 152, NULL),
(85, 23, 153, NULL),
(86, 23, 154, NULL),
(87, 23, 155, NULL),
(88, 23, 151, NULL),
(89, 24, 160, NULL),
(90, 24, 157, NULL),
(91, 24, 158, NULL),
(92, 24, 161, NULL),
(93, 25, 165, NULL),
(94, 25, 164, NULL),
(95, 25, 163, NULL),
(96, 26, 169, NULL),
(97, 26, 167, NULL),
(98, 26, 168, NULL),
(99, 27, 172, NULL),
(100, 27, 171, NULL),
(101, 28, 177, NULL),
(102, 28, 176, NULL),
(103, 28, 175, NULL),
(104, 28, 178, NULL),
(105, 28, 174, NULL),
(106, 29, 181, NULL),
(107, 29, 180, NULL),
(108, 29, 182, NULL),
(109, 29, 183, NULL),
(110, 29, 185, NULL),
(111, 29, 184, NULL),
(112, 29, 186, NULL),
(113, 29, 187, NULL),
(114, 29, 188, NULL),
(115, 30, 191, NULL),
(116, 30, 194, NULL),
(117, 30, 190, NULL),
(118, 30, 192, NULL),
(119, 30, 193, NULL),
(120, 30, 196, NULL),
(121, 30, 198, NULL),
(122, 30, 197, NULL),
(123, 31, 201, NULL),
(124, 31, 199, NULL),
(125, 31, 202, NULL),
(126, 31, 203, NULL),
(127, 31, 204, NULL),
(128, 31, 200, NULL),
(129, 31, 205, NULL),
(130, 32, 207, NULL),
(131, 32, 211, NULL),
(132, 32, 210, NULL),
(133, 32, 208, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

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
(95, 'Banner.Content.Delete', '', 'active'),
(100, 'Member.Content.View', '', 'active'),
(101, 'Member.Content.Create', '', 'active'),
(102, 'Member.Content.Edit', '', 'active'),
(103, 'Member.Content.Delete', '', 'active'),
(104, 'Member.Content.Block', '', 'active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cv_project_developer`
--

INSERT INTO `cv_project_developer` (`id`, `title`, `description`, `highlight`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 'One Balmoral', '<p>\r\n One Balmoral</p>', 'yes', 'one-balmoral', 0, '2013-04-14 18:44:02', '2013-04-20 15:53:41'),
(2, 'Setia Budi Sky Garden', '<p>\r\n Setia Budi Sky Garden</p>', 'yes', 'setia-budi-sky-garden', 0, '2013-04-20 15:37:50', '2013-04-20 15:53:46'),
(3, 'Izzara', '<p>\r\n Izzara</p>', 'yes', 'izzara', 0, '2013-04-20 15:38:28', '2013-04-20 15:53:33'),
(4, 'Casamora', '<p>\n Cassamora</p>', 'no', 'casamora', 0, '2013-04-20 15:38:42', '2013-04-26 07:06:52'),
(5, 'Serenia Hills', '<p>\r\n Serenia Hills</p>', 'no', 'serenia-hills', 0, '2013-04-20 15:38:52', '2013-04-24 10:56:16'),
(6, 'Alila Bintan', '<p>\n Alila Bintan</p>', 'no', 'alila-bintan', 0, '2013-04-20 15:39:04', '2013-04-26 11:40:17'),
(7, 'Harris', '<p>\r\n Harris</p>', 'no', 'harris', 0, '2013-04-20 15:39:17', '0000-00-00 00:00:00'),
(8, 'Alila Uluwatu', '<p>\n Alila Uluwatu</p>', 'no', 'alila-uluwatu', 0, '2013-04-25 13:48:18', '2013-04-26 11:40:26');

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
  `address` text,
  `size` varchar(255) DEFAULT NULL,
  `bedroom` int(11) NOT NULL DEFAULT '0',
  `facility` text,
  `condition` varchar(255) DEFAULT NULL,
  `additional` text,
  `youtube` varchar(255) DEFAULT NULL,
  `vimeo` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `highlight` enum('yes','no') NOT NULL DEFAULT 'no',
  `slug` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cv_project_property`
--

INSERT INTO `cv_project_property` (`id`, `type_id`, `developer_id`, `location_id`, `marketing_id`, `title`, `address`, `size`, `bedroom`, `facility`, `condition`, `additional`, `youtube`, `vimeo`, `image_id`, `highlight`, `slug`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, 2, 1, 6, 'Setiabudi Sky Garden', 'Jl. HR. Rasuna Said Kav. 62, Kuningan, Jakarta Selatan', '19,775 sqm', 0, '<p>\n Setiabudi Sky Garden is strategically located in Setiabudi area, which has now become one of the most developed neighborhood community in CBD area.</p>\n<p>\n Providing you with fast and easy access to CBD main roads (Jl. Sudirman, Jl. Gatot Subroto, Jl. MH Thamrin) and complete sorruonding amenities (major office towers, shopping malls, hotels, hospitals, and &nbsp;schools)</p>\n<p>\n The brilliant collaboration of PT Jakarta Setiabudi International, Tbk (JSI) and TOKYULAND , one of the biggest international property developer from Japan, with architectual design by SHIMIZU, world&rsquo;s renowned design and construction company known for its earthquake resistant structural design, and FRASER HOSPITALITY, one of the most successful service operator of first-class residential world wide.</p>\n<p>\n A residential comprising of 2 luxurious condominiumm towers adjacent to a service apartment. Featuring the largest Open Air are in Jakarta CBD, where nature integrates as a vital part of quality living.</p>\n<p>\n Designed with an advance earthquake-prove structural model, built along international standard, making it a safe place to live.</p>\n<p>\n Complimented with complete set of health &amp; leisure facilities, so you can enjoy your personal and family time in comfort</p>\n<p>\n &nbsp;</p>\n<p>\n Please visit our marketing gallery&nbsp;in &ldquo; SETIABUDI ATRIUM&nbsp; 8TH FLOOR.</p>\n<p>\n Jl. HR. Rasuna Said Kav. 62, Kuningan, Jakarta Selatan</p>\n<p>\n &nbsp;</p>\n<p>\n <strong>Facilities:</strong></p>\n<ul>\n <li>\n  Swimming pool</li>\n <li>\n  Children pool</li>\n <li>\n  Jogging track</li>\n <li>\n  Gym</li>\n <li>\n  Children indoor &amp; outdoor playground</li>\n <li>\n  BBQ area</li>\n <li>\n  Thematic garden</li>\n <li>\n  Basketball court</li>\n <li>\n  Restaurants</li>\n <li>\n  Open terraace</li>\n <li>\n  Function &amp; meeting room</li>\n <li>\n  Business center</li>\n <li>\n  ATM Center</li>\n <li>\n  Mini Market</li>\n <li>\n  Laundry</li>\n <li>\n  Concierge</li>\n</ul>\n<p>\n &nbsp;</p>\n<p>\n <strong>Total units :</strong></p>\n<ul>\n <li>\n  SKY TOWER : 426 unit</li>\n <li>\n  GARDEN TOWER : 160 unit</li>\n <li>\n  FRASERS TOWER : 151 unit</li>\n</ul>', '', '<p>\n <span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">For more detail, please contact Laura Loe 0815 8356 568 / 021 2555 8994 or email laura.loe@cavaproperty.com</span></p>', '', '', 257, 'yes', 'setiabudi-sky-garden', 0, '2013-04-22 11:08:20', '2013-04-26 13:59:03'),
(2, 1, 7, 1, 6, 'Harris Nusa Dua', 'Nusa Dua, Bali', '', 0, '', '', '<p>\n <span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">For more detail, please contact Laura Loe 0815 8356 568 / 021 2555 8994 or email laura.loe@cavaproperty.com</span></p>\n<p>\n &nbsp;</p>', '', '', 67, 'no', 'harris-nusa-dua', 0, '2013-04-22 11:11:36', '2013-04-26 13:57:31'),
(3, 1, 2, 1, 4, 'Senopati Suites 2', '', '', 0, '<p>\r\n Coming Soon-for more details.</p>', '', '<p>\r\n Please contact us at +62 815 13600524.</p>', '', '', 218, 'no', 'senopati-suites-2', 1, '2013-04-22 13:11:09', '2013-04-24 10:35:33'),
(4, 3, 5, 1, 7, 'Serenia Hills', 'South Jakarta', 'Serenia Hills 1: 10 Ha, Serenia Hills 2: 12 Ha', 0, '<p>\n Enter Serenia Hills, enter a world of peace and serenity. A place that offers none other than the very best in living and memorable experience.</p>\n<p>\n Nestled in a secluded part of South Jakarta, Serenia Hills is a luxury gated community. Serenia Hills offers the very essence of living in a peaceful suburban environment, that is perfect to spend the quality of living with your family. Situated minutes from TB Simatupang, with its numerous shopping centrres, hospitals and other essential amenities, that make living in Serenia Hills so remarkable.</p>\n<ul>\n <li>\n  Concept : Urban Resort Design</li>\n <li>\n  Total Land Size : 10 Ha</li>\n <li>\n  Type : Regent (phase 1), Signature (phase 2) and Future Development (apartment &ndash; phase 3)</li>\n <li>\n  Regent Type (LS/BS) : 160/170, 162/180, 200/200, 276/230</li>\n <li>\n  Features : Center Park, basket ball court, mini soccer, walkable neighborhood, gated cluster, CCTV, Club house &amp; mini club house, swimming pool</li>\n</ul>\n<p>\n <strong>TYPE:</strong></p>\n<ul>\n <li>\n  <strong>Serenia Hills 1: </strong>Regent, Signature</li>\n <li>\n  <strong>Serenia HIlls 2:&nbsp;</strong>Titan (153/145), Ultimate (LT/LB: 162/145, 180/185, 200/220)</li>\n</ul>', '', '<p>\n For more detail, please contact David Tan 0817 999 199 / 021 2555 8994 or email david@cavaproperty.com</p>\n<p>\n &nbsp;</p>', '', '', 250, 'yes', 'serenia-hills', 0, '2013-04-22 13:14:50', '2013-04-26 13:53:33'),
(5, 1, 3, 1, 5, 'Izzara', 'Jl. TB. Simatupang, intersection of Antasari - Simatupang, South Jakarta.', '', 0, '<p>\n Presenting IZZARA, a top - notch residential investment opportunity in Jl. TB. Simatupang, intersection of Antasari - Simatupang, South Jakarta.</p>\n<p>\n IZZARA is surrounded by commercial buildings of mostly oil &amp; gas companies and every convenience you can think of, such as supermarkets, medical clinics, hospitals, and international schools.</p>\n<p>\n Developed by the same developer for luxury and superb hotels &amp; villas Alila Uluwatu Bali, Alila Ubud Bali, Alila Manggis Bali, Hotel Amanjiwo Yogyakarta, Amankila Bali, IZZARA fuses all the elements of quality lifestyle and investment in the most sought-after locations.</p>\n<p>\n They offer a versatile choice of one, two or three bedroom apartments, as follows:</p>\n<ul>\n <li>\n  1 bedroom : 64 - 71 sqm</li>\n <li>\n  2 bedroom : 99 - 147 sqm</li>\n <li>\n  3 bedroom : 176 - 199 sqm</li>\n</ul>\n<p>\n Supported by the following high calibre international team behind the development : IAW (Bangkok), Mitani (Japan), LPA (Japan), Shimizu Corporation (Japan).</p>\n<p>\n &nbsp;</p>', '', '<p>\n <span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">For more detail, please contact Vanessa 0812 1063 103 / 021 2555 8994 or email vanessa@cavaproperty.com</span></p>\n<p>\n &nbsp;</p>\n<div>\n &nbsp;</div>', '', '', 239, 'yes', 'izzara', 0, '2013-04-22 13:17:44', '2013-04-26 14:01:30'),
(6, 1, 1, 2, 7, 'One Balmoral', 'Balmoral Road (District 10)', '6157m2', 4, '<p>\n Developed by Hong Leong Holdings Ltd, twin blocks of 12 storey apartments comprising of 91 apartments to be built on an approximately 6157m2 land. It offers a choice of 1, 2, 3 and 4 bedrooms, equipped with imported finishings.</p>\n<p>\n One Balmoral is strategically located at Balmoral Road (District 10) and within the greenery of neighbouring Goodwood Hill. One of Singapore&rsquo;s premier schools, Raffles Girls&#39; Secondary School, is a stone&rsquo;s throw away and you will be spoilt for choice with the private clubs available nearby, namely The Pines, the Tanglin Club and the American Club. One Balmoral is just minutes&rsquo; drive away from ION Orchard and the shopping belt of Orchard Road.</p>\n<p>\n Currently, the piling is near completion and anticipated handing over is March 2015.</p>\n<p>\n Brief details on the project as follows:</p>\n<ul>\n <li>\n  Total no. of units &ndash; 91</li>\n <li>\n  Twin towers of 12 storeys plus attic</li>\n <li>\n  Car park lots &ndash; 103, inclusive of 2 handicap lots at basement and first storey</li>\n <li>\n  Facilities &ndash; Lap pool, clubhouse, meditation garden, gym, BBQ pavilions amongst others.</li>\n</ul>', '', '<p>\n <span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">For more detail, please contact David Tan 0817 999 199 / 021 2555 8994 or email david@cavaproperty.com</span></p>', '', '', 220, 'yes', 'one-balmoral', 0, '2013-04-22 13:20:14', '2013-04-26 13:52:08'),
(7, 4, 6, 1, 7, 'Alila Bintan', 'Pulau Bintan, Riau', '14.4–hectare', 2, '<p>\n Alila Villas Bintan presents the opportunity to own your dream home within an integrated residential, resort and village community on the beautiful Indonesian island of Bintan, in a secure zone along the northern coast. Imagine a tropical retreat less than an hour from Singapore, a world away from the busy metropolis yet close enough to be your regular weekend home.</p>\n<p>\n At its scenic hillside location, meandering down towards sandy white beaches, this 14.4&ndash;hectare gated development comprises of 12 beach&ndash;front residences available for sale, and a luxury 52&ndash;villa boutique hotel, designed and constructed to EarthCheck&#39;s rigorous environmental standards. In addition, another four hectares are devoted to a village with a museum, gallery, spa, and retail and dining locations. An unprecedented concept, Alila Villas Bintan is centered on celebrating Asia&#39;s rich arts and cultural heritage, superb hospitality and contemporary lifestyle.</p>', '', '<p>\n <span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">For more detail, please contact David Tan 0817 999 199 / 021 2555 8994 or email david@cavaproperty.com</span></p>', '', '', 226, 'yes', 'alila-bintan', 0, '2013-04-25 13:26:33', '2013-04-26 13:54:15'),
(8, 4, 8, 1, 7, 'Alila Uluwatu', 'Uluwatu, Bali', '', 2, '<p>\n Designed by award-winning architectural firm, WOHA, in accordance with Green Globe 21 standards, the resort is a stunning expression of contemporary sustainable design inspired by the savannah landscape that is unique to this region of Bali.</p>\n<p 15px="" 40px="" align="justify" alila="" and="" background-color:="" border:="" boutique="" by="" color:="" complete="" comprises="" development="" facilities.="" five-star="" font-family:="" font-size:="" guest="" hotel="" hotels="" is="" it="" leading="" line-height:="" maintained="" managed="" management="" of="" one-bedroom="" outline:="" p="" padding:="" private="" professionally="" residential="" resort="" s="" the="" three-bedroom="" villas="">\n Indulge in the creative culinary delights of CIRE fine dining restaurant, plus the authentic Indonesian and Balinese cuisine in The Warung. Discover pure relaxation at the spectacular clifftop pool and sunset cabana, and in the sanctuary of Spa Alila. Relish the attention of a personal butler to cater to your every whim.</p>', '', '<p>\n <span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">For more detail, please contact David Tan 0817 999 199 / 021 2555 8994 or email david@cavaproperty.com</span></p>', '', '', 230, 'yes', 'alila-uluwatu', 0, '2013-04-25 13:52:58', '2013-04-26 13:55:09'),
(9, 3, 4, 1, 8, 'Casamora', 'Jagakarsa, Jakarta Selatan', '', 2, '<p>\n Choose from two house designs,&nbsp;Tranquil living in a shaded woodland.&nbsp;Our green philosophy creates a healthy living environment. Well laid out walk-ways and a well shaded jogging track.&nbsp;Escape the hustle and bustle of city life and the ever increasing pollution.</p>\n<p>\n Various shops, cafes and restaurants are planned nearby to fulfill the different needs of each family member.&nbsp;A SAFE INVESTMENT.</p>\n<p>\n Cinere - Jagorawi. Easy access to Jakarta&#39;s growing business areas in south Jakarta,&nbsp;a strategic investment go hand-in-hand.</p>', '', '<p>\n <span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">For more detail, please contact Andi 0817 0818 124</span><span  rgb(99, 99, 99); font-family: arial, ''Helvetica Neue'', Helvetica, Helvetica, sans-serif; line-height: 18px;">&nbsp;/ 021 2555 8994 or email andi@cavaproperty.com</span></p>', '', '', 238, 'yes', 'casamora', 0, '2013-04-26 07:00:52', '2013-04-26 14:04:40');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `cv_project_property_gallery`
--

INSERT INTO `cv_project_property_gallery` (`id`, `property_id`, `file_id`, `caption`) VALUES
(11, 2, 70, ''),
(12, 2, 71, ''),
(13, 2, 68, ''),
(14, 2, 69, ''),
(15, 2, 72, ''),
(16, 2, 66, ''),
(35, 6, 221, 'One Balmoral Singapore'),
(36, 6, 222, 'One Balmoral Singapore'),
(37, 6, 223, 'One Balmoral Singapore'),
(38, 6, 224, 'One Balmoral Singapore'),
(39, 6, 225, 'One Balmoral Singapore'),
(40, 7, 227, 'Alila Bintan'),
(41, 7, 228, 'Alila Bintan'),
(42, 7, 229, 'Alila Bintan'),
(43, 8, 231, 'Alila Uluwatu'),
(44, 8, 232, 'Alila Uluwatu'),
(45, 9, 235, 'Cassamora Jagakarsa - Type 350'),
(46, 9, 236, 'Cassamora Jagakarsa - Ruko'),
(47, 9, 237, 'Cassamora Jagakarsa - Interior'),
(48, 5, 240, 'Izzara - Pool'),
(49, 5, 241, 'Izzara - Pool'),
(50, 5, 242, 'Izzara - Pool'),
(51, 5, 243, 'Izzara '),
(52, 5, 244, 'Izzara - Lobby'),
(53, 5, 245, 'Izzara - Living and Dining Room (3BR)'),
(54, 5, 246, 'Izzara - Living and Dining Room (3BR)'),
(55, 5, 247, 'Izzara - Living and Dining Room (3BR)'),
(56, 5, 248, 'Izzara - Bed Room (3BR)'),
(57, 5, 249, 'Izzara - Living and Dining Room (2BR)'),
(58, 4, 251, 'Serenia Hills'),
(59, 4, 252, 'Serenia Hills'),
(60, 4, 253, 'Serenia Hills - Active Park'),
(61, 4, 254, 'Serenia Hills'),
(62, 4, 255, 'Serenia Hills'),
(63, 1, 258, 'Setiabudi Sky Garden'),
(64, 1, 259, 'Setiabudi Sky Garden'),
(65, 1, 260, 'Setiabudi Sky Garden'),
(66, 1, 261, 'Setiabudi Sky Garden'),
(67, 1, 263, 'Setiabudi Sky Garden'),
(68, 1, 264, 'Setiabudi Sky Garden'),
(69, 1, 265, 'Setiabudi Sky Garden - Playground');

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
(2, 'Editor', 'Can handle day-to-day management, but does not have full power.', 0, 1, 'admin/content', 0, 'content'),
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
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(2, 1),
(2, 2),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
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
('member_', 2),
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
(1, 1, 'andhikanovandi@gmail.com', 'andhika', 'd8db64dfb1062b9200c4e57c51d0b736d5f57692', NULL, 'Seqx4Rm', '2013-06-02 09:31:16', '::1', '0000-00-00 00:00:00', 0, 0, NULL, NULL, 'Andhika Novandi Patria', NULL, 'UM6', 'english', 1, ''),
(2, 2, 'admin@bonfire.com', 'admin', '874911bfdde3730f29bcca311401e09f47fb2d4f', NULL, 'uQaZOiU', '2013-05-15 13:39:02', '118.99.82.37', '2013-04-07 09:59:19', 0, 0, NULL, NULL, 'Administrator', NULL, 'UM6', 'english', 1, '');

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
