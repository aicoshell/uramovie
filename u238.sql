-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2019 at 06:52 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u238`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_by_web`
--

DROP TABLE IF EXISTS `data_by_web`;
CREATE TABLE IF NOT EXISTS `data_by_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(64) DEFAULT NULL,
  `lang_browser` tinytext,
  `user_agent` tinytext,
  `host_domain` tinytext,
  `client_port` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT 'NO COUNTRY',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_by_web`
--

INSERT INTO `data_by_web` (`id`, `ip_address`, `lang_browser`, `user_agent`, `host_domain`, `client_port`, `country`) VALUES
(1, '::1', NULL, NULL, NULL, NULL, NULL),
(2, '::1', NULL, NULL, NULL, NULL, NULL),
(3, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53031', NULL),
(4, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53104', NULL),
(5, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53190', NULL),
(6, '127.0.0.1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53438', NULL),
(7, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53465', NULL),
(8, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53473', NULL),
(9, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53635', NULL),
(10, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '53704', NULL),
(11, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '55659', NULL),
(12, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '55964', 'NO COUNTRY'),
(13, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56053', ''),
(14, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56180', ''),
(15, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56196', ''),
(16, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56314', ''),
(17, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56444', ''),
(18, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56451', ''),
(19, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56468', ''),
(20, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56483', ''),
(21, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '56522', ''),
(22, '::1', 'fr-FR,fr;q=0.8,en-GB;q=0.6,en-US;q=0.4,en;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', 'localhost', '57389', ''),
(23, '::1', 'fr-FR,fr;q=0.8,en-GB;q=0.6,en-US;q=0.4,en;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko', 'localhost', '57418', ''),
(24, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '60453', ''),
(25, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '60500', ''),
(26, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '60916', ''),
(27, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '58818', ''),
(28, '::1', 'en-GB,en;q=0.9,fr-FR;q=0.8,fr;q=0.7,es-ES;q=0.6,es;q=0.5,ar-AE;q=0.4,ar;q=0.3,en-US;q=0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'localhost', '58825', ''),
(29, '::1', 'fr-FR', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36 Maxthon/5.2.7.5000', 'localhost', '56202', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `last_ame` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
