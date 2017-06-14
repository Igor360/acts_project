-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fiot_acts
-- ------------------------------------------------------
-- Server version	5.5.56

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
-- Table structure for table `textstyle`
--

DROP TABLE IF EXISTS `textstyle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `textstyle` (
  `idtext` int(20) NOT NULL,
  `idtextelement` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `id_text_idx` (`idtext`),
  KEY `id_text_element_idx` (`idtextelement`),
  CONSTRAINT `id_text` FOREIGN KEY (`idtext`) REFERENCES `text` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_text_element` FOREIGN KEY (`idtextelement`) REFERENCES `textelements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `textstyle`
--

LOCK TABLES `textstyle` WRITE;
/*!40000 ALTER TABLE `textstyle` DISABLE KEYS */;
INSERT INTO `textstyle` VALUES (6,4,1),(6,6,2),(9,3,3),(10,1,4),(11,1,5),(13,2,6),(14,1,7),(15,2,8),(16,1,9),(18,6,10),(21,3,11),(23,3,12),(25,3,13),(27,3,14),(29,3,15),(32,1,16),(34,4,17),(35,3,18),(36,4,19),(37,3,20),(38,4,21),(40,4,22),(41,3,23),(43,3,24),(47,4,25),(49,4,26),(52,4,27),(53,1,28),(54,4,29),(55,3,30),(56,4,31),(57,3,32),(58,4,33),(59,3,34),(61,3,35),(63,3,36),(69,2,37),(71,2,38),(73,3,39),(75,3,40),(82,3,41),(85,3,42),(31,7,43),(12,3,44),(12,4,47);
/*!40000 ALTER TABLE `textstyle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-14  9:54:25
