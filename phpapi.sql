SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `friends` (
  `fb_id` varchar(255) NOT NULL,
  `friend_id` varchar(255) NOT NULL,
  `friend_name` varchar(255) NOT NULL,
  UNIQUE KEY `fb_id` (`fb_id`,`friend_id`),
  KEY `fb_id_2` (`fb_id`),
  KEY `friend_id` (`friend_id`),
  KEY `friend_name_2` (`friend_name`),
  FULLTEXT KEY `friend_name` (`friend_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `fb_id` varchar(255) NOT NULL,
  `fb_name` varchar(255) NOT NULL,
  `fb_username` varchar(255) NOT NULL,
  PRIMARY KEY  (`fb_id`),
  KEY `fb_id_2` (`fb_id`),
  KEY `fb_name` (`fb_name`),
  KEY `fb_username` (`fb_username`),
  KEY `fb_username_2` (`fb_username`),
  FULLTEXT KEY `fb_name_2` (`fb_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
