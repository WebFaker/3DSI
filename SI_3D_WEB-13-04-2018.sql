CREATE DATABASE  IF NOT EXISTS `si_3d_web` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `si_3d_web`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: si_3d_web
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `idMembers` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `privilege` tinyint(4) NOT NULL,
  PRIMARY KEY (`idMembers`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'ladmin','toto','toto@gmail.com','',1),(2,'toto','toto','toto@gmail.com','',1);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `idOrders` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMembers` int(10) unsigned NOT NULL,
  `idRings` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idOrders`),
  KEY `idRings_idx` (`idRings`),
  KEY `idMembers_idx` (`idMembers`),
  CONSTRAINT `idMember` FOREIGN KEY (`idMembers`) REFERENCES `members` (`idMembers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idRing` FOREIGN KEY (`idRings`) REFERENCES `rings` (`idRings`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (7,1,11);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rings`
--

DROP TABLE IF EXISTS `rings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rings` (
  `idRings` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMembers` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(10) NOT NULL,
  `src` varchar(2048) NOT NULL,
  `shapeRing` varchar(45) NOT NULL,
  `shapeProp` varchar(45) NOT NULL,
  `colorRing` varchar(45) NOT NULL,
  `colorProp` varchar(45) NOT NULL,
  PRIMARY KEY (`idRings`),
  KEY `id_idx` (`idMembers`),
  CONSTRAINT `idMembers` FOREIGN KEY (`idMembers`) REFERENCES `members` (`idMembers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rings`
--

LOCK TABLES `rings` WRITE;
/*!40000 ALTER TABLE `rings` DISABLE KEYS */;
INSERT INTO `rings` VALUES (10,1,'Bague mer','16,28','Ring1.jpg','Single Ring','Sea Prop','Green Wood','Yellow'),(11,1,'Bague dorée','17,80','Ring2.jpg','Single Ring','stoned Prop','steel','Blue Stone'),(12,1,'Bague pomme','11,80','Ring3.jpg','Single Ring','apple Prop','plastic','Red plastic'),(13,1,'Bague goldé','24,80','Ring4.jpg','Single Ring','Stoned Prop','plastic Ring','Cheap Gold');
/*!40000 ALTER TABLE `rings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-13  1:08:02
