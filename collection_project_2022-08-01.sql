# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.8.3-MariaDB-1:10.8.3+maria~jammy)
# Database: collection_project
# Generation Time: 2022-08-01 09:45:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table characters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `characters`;

CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `charname` varchar(50) NOT NULL DEFAULT '',
  `class` varchar(20) NOT NULL DEFAULT '',
  `level` tinyint(2) NOT NULL,
  `strength` tinyint(2) NOT NULL,
  `dexterity` tinyint(2) NOT NULL,
  `constitution` tinyint(2) NOT NULL,
  `intelligence` tinyint(2) NOT NULL,
  `wisdom` tinyint(2) NOT NULL,
  `charisma` tinyint(2) NOT NULL,
  `link` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;

INSERT INTO `characters` (`id`, `username`, `charname`, `class`, `level`, `strength`, `dexterity`, `constitution`, `intelligence`, `wisdom`, `charisma`, `link`)
VALUES
	(1,'chris','Lilen','Sorcerer',6,8,12,14,13,12,18,NULL),
	(2,'chris','Itsuki','Paladin',9,20,8,14,12,11,15,NULL),
	(3,'chris','Ce\'nedra','Warlock',4,8,12,14,12,11,18,NULL),
	(4,'chris','Locke','Rogue',6,8,18,12,13,11,14,NULL),
	(5,'chris','Gale','Wizard',6,11,12,8,18,14,10,NULL),
	(6,'chris','Lae\'zel','Fighter',4,18,12,14,11,13,8,NULL);

/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
