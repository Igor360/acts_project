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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text CHARACTER SET cp1251,
  `page_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_idx` (`page_id`),
  CONSTRAINT `pages` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'Про кафедру АУТС','2017-06-03 20:29:04','img/about.jpg',1),(2,'Історія кафедри АУТС','2017-06-03 20:50:07','img/fict.jpg',1),(3,'Про кафедру','2017-06-03 22:15:43',NULL,2),(4,'Види навчання: денна та заочна (бюджет та контракт)','2017-06-03 22:21:27',NULL,2),(5,'Кафедра АУТС оснащена сучасною технікою.','2017-06-03 22:22:21',NULL,2),(6,'Основні науково-технічні напрями кафедри:','2017-06-03 22:23:12',NULL,2),(7,'За останні роки на кафедрі створені нові лабораторії:','2017-06-03 22:23:54',NULL,2),(8,'Компанії, в яких працюють наші випускники:','2017-06-03 22:29:51',NULL,2),(9,'Наша адреса:','2017-06-03 22:36:25',NULL,2),(10,'Історія кафедри','2017-06-03 22:49:54',NULL,3),(11,'Педагогічні школи кафедри','2017-06-03 22:50:32',NULL,3),(12,'Студентські організації та медіа ресурси','2017-06-03 22:55:53',NULL,4),(13,'Студмісто НТУУ “КПІ”','2017-06-03 22:56:23',NULL,4),(14,'Дипломні роботи','2017-06-03 23:08:38',NULL,5),(15,'Працевлашування','2017-06-03 23:15:16',NULL,6),(16,'Практика','2017-06-03 23:23:26',NULL,7),(17,'Спорт в університеті','2017-06-05 17:41:44',NULL,12),(18,'Спортивні клуби','2017-06-05 17:43:53',NULL,12),(19,'Наукові напрямки','2017-06-05 17:45:30',NULL,11),(20,'Наукові лабораторії','2017-06-05 17:47:25',NULL,11),(21,'Наукові розробки','2017-06-05 17:48:03',NULL,11),(22,'Студентська наука','2017-06-05 17:48:42',NULL,11),(23,'Розробки','2017-06-05 17:54:46',NULL,10),(24,'Аспірантам','2017-06-05 18:17:42',NULL,9),(25,'Студентам','2017-06-05 18:20:40',NULL,8),(26,'Вступ на 1 курс (за сертифікатами ЗНО)','2017-06-05 18:30:17',NULL,13),(27,'Вступ на 5 курс (магістратура)','2017-06-05 19:34:17',NULL,14),(28,'Перелік спеціальностей:','2017-06-05 19:34:50',NULL,14),(29,'Кориснi посилання:','2017-06-05 19:35:56',NULL,14),(30,'Офіційні документи','2017-06-05 19:39:15',NULL,15),(31,'Навчання на АУТС','2017-06-05 19:41:22',NULL,16),(32,'Вступ на 1 курс','2017-06-05 19:42:39',NULL,16),(33,'Подвійний диплом','2017-06-05 19:43:18',NULL,16),(34,'Змiна порядку подачi документів','2017-06-05 20:27:42',NULL,17),(35,'Як отримати запрошення на навчання?','2017-06-05 20:30:51',NULL,17),(37,'Як нас знайти','2017-06-05 20:33:34',NULL,18);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-12 20:13:00
