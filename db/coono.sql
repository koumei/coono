-- MySQL dump 10.13  Distrib 5.5.16, for Win64 (x86)
--
-- Host: localhost    Database: coono
-- ------------------------------------------------------
-- Server version	5.5.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sync_dev`
--

DROP TABLE IF EXISTS `sync_dev`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sync_dev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sync_dev_name` varchar(32) NOT NULL,
  `sync_content` text,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `disabled` bit(1) NOT NULL DEFAULT b'0',
  `sync_usr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sync_usr_dev_id` (`sync_usr_id`),
  CONSTRAINT `sync_usr_dev_id` FOREIGN KEY (`sync_usr_id`) REFERENCES `sync_usr` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sync_dev`
--

LOCK TABLES `sync_dev` WRITE;
/*!40000 ALTER TABLE `sync_dev` DISABLE KEYS */;
/*!40000 ALTER TABLE `sync_dev` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sync_usr`
--

DROP TABLE IF EXISTS `sync_usr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sync_usr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sync_usr_login` varchar(256) DEFAULT NULL,
  `sync_password` varchar(256) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `disabled` bit(1) DEFAULT b'0',
  `updated_date` datetime DEFAULT NULL,
  `logged_in_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sync_usr`
--

LOCK TABLES `sync_usr` WRITE;
/*!40000 ALTER TABLE `sync_usr` DISABLE KEYS */;
INSERT INTO `sync_usr` VALUES (1,'koumeibb@gmail.com','696d29e0940a4957748fe3fc9efd22a3','0000-00-00 00:00:00','\0','0000-00-00 00:00:00',0),(2,'koumeibb1@gmail.com','696d29e0940a4957748fe3fc9efd22a3','0000-00-00 00:00:00','\0','0000-00-00 00:00:00',0),(3,'koumeibb2@gmail.com','696d29e0940a4957748fe3fc9efd22a3','0000-00-00 00:00:00','\0','0000-00-00 00:00:00',0),(4,'koumeibb3@gmail.com','696d29e0940a4957748fe3fc9efd22a3','0000-00-00 00:00:00','\0','0000-00-00 00:00:00',0),(5,'koumeibb5@gmail.com','696d29e0940a4957748fe3fc9efd22a3','0000-00-00 00:00:00','\0','0000-00-00 00:00:00',0),(6,'koumeibb6@gmail.com','696d29e0940a4957748fe3fc9efd22a3','0000-00-00 00:00:00','\0','0000-00-00 00:00:00',0),(7,'koumeibb7@gmail.com','696d29e0940a4957748fe3fc9efd22a3','0000-00-00 00:00:00','\0','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `sync_usr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-17 23:50:20
