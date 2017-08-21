-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fiot_acts
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `article_id` int(20) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text CHARACTER SET cp1251,
  `isText` tinyint(1) NOT NULL DEFAULT '0',
  `page_id` int(10) NOT NULL,
  `texttype_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `pages_idx` (`page_id`),
  KEY `type_idx` (`texttype_id`),
  FULLTEXT KEY `title_index` (`title`),
  CONSTRAINT `pages` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `type` FOREIGN KEY (`texttype_id`) REFERENCES `texttype` (`texttype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Про кафедру АУТС','2017-06-03 20:29:04','img/about.jpg',0,1,3,'2017-06-19 18:34:43',NULL),(2,'Історія кафедри АУТС','2017-06-03 20:50:07','img/fict.jpg',0,1,3,'2017-06-19 18:40:42',NULL),(3,'Про кафедру','2017-06-03 22:15:43',NULL,0,2,3,'2017-06-19 18:41:20',NULL),(4,'Види навчання: денна та заочна (бюджет та контракт)','2017-06-03 22:21:27',NULL,0,2,3,'2017-06-19 18:41:58',NULL),(5,'Кафедра АУТС оснащена сучасною технікою.','2017-06-03 22:22:21',NULL,0,2,3,'2017-06-19 18:42:13',NULL),(6,'Основні науково-технічні напрями кафедри:','2017-06-03 22:23:12',NULL,0,2,3,'2017-06-19 18:44:49',NULL),(7,'За останні роки на кафедрі створені нові лабораторії:','2017-06-03 22:23:54',NULL,0,2,3,'2017-06-19 18:45:19',NULL),(8,'Компанії, в яких працюють наші випускники:','2017-06-03 22:29:51',NULL,0,2,3,'2017-06-19 19:49:33',NULL),(9,'Наша адреса:','2017-06-03 22:36:25',NULL,0,2,3,'2017-06-19 18:43:09',NULL),(10,'Історія кафедри','2017-06-03 22:49:54',NULL,0,3,3,'2017-06-19 19:50:43',NULL),(11,'Педагогічні школи кафедри','2017-06-03 22:50:32',NULL,0,3,3,'2017-06-19 19:51:10',NULL),(12,'Студентські організації та медіа ресурси','2017-06-03 22:55:53',NULL,0,4,3,'2017-06-19 20:00:57',NULL),(13,'Студмісто НТУУ “КПІ”','2017-06-03 22:56:23',NULL,0,4,3,'2017-06-19 19:52:05',NULL),(14,'Дипломні роботи','2017-06-03 23:08:38',NULL,0,5,3,'2017-06-19 19:56:06',NULL),(15,'Працевлашування','2017-06-03 23:15:16',NULL,0,6,3,NULL,NULL),(16,'Практика','2017-06-03 23:23:26',NULL,0,7,3,NULL,NULL),(17,'Спорт в університеті','2017-06-05 17:41:44',NULL,0,12,3,'2017-06-24 12:52:53',NULL),(18,'Спортивні клуби','2017-06-05 17:43:53',NULL,0,12,3,'2017-06-19 20:13:23',NULL),(19,'Наукові напрямки','2017-06-05 17:45:30',NULL,1,11,3,'2017-06-20 08:00:06',NULL),(20,'Наукові лабораторії','2017-06-05 17:47:25',NULL,0,11,3,'2017-06-19 20:11:37',NULL),(21,'Наукові розробки','2017-06-05 17:48:03',NULL,0,11,3,'2017-06-19 20:11:55',NULL),(22,'Студентська наука','2017-06-05 17:48:42',NULL,0,11,3,'2017-06-19 20:12:33',NULL),(23,'Розробки','2017-06-05 17:54:46',NULL,0,10,3,'2017-06-19 20:10:57',NULL),(24,'Аспірантам','2017-06-05 18:17:42',NULL,0,9,3,'2017-06-19 20:09:54',NULL),(25,'Студентам','2017-06-05 18:20:40',NULL,0,8,3,'2017-06-24 14:24:19',NULL),(26,'Вступ на 1 курс (за сертифікатами ЗНО)','2017-06-05 18:30:17',NULL,0,13,3,'2017-06-24 16:04:12',NULL),(27,'Вступ на 5 курс (магістратура)','2017-06-05 19:34:17',NULL,0,14,3,'2017-06-19 20:02:50',NULL),(28,'Перелік спеціальностей:','2017-06-05 19:34:50',NULL,0,14,3,'2017-06-19 20:15:03',NULL),(29,'Кориснi посилання:','2017-06-05 19:35:56',NULL,0,14,3,'2017-06-19 20:03:40',NULL),(30,'Офіційні документи','2017-06-05 19:39:15',NULL,0,15,3,'2017-06-19 20:04:12',NULL),(31,'Навчання на АУТС','2017-06-05 19:41:22',NULL,0,16,3,'2017-06-19 20:04:41',NULL),(32,'Вступ на 1 курс','2017-06-05 19:42:39',NULL,0,16,3,'2017-06-19 20:06:49',NULL),(33,'Подвійний диплом','2017-06-05 19:43:18',NULL,0,16,3,'2017-06-19 20:07:12',NULL),(34,'Змiна порядку подачi документів','2017-06-05 20:27:42',NULL,0,17,3,'2017-06-19 20:07:58',NULL),(35,'Як отримати запрошення на навчання?','2017-06-05 20:30:51',NULL,0,17,3,'2017-06-19 20:08:23',NULL),(37,'Як нас знайти','2017-06-05 20:33:34',NULL,0,18,3,'2017-06-19 20:08:44',NULL),(38,'Розклад занять другого семестру','2017-02-14 22:00:00','http://fiot.kpi.ua/wp-content/uploads/2014/02/3-680x330.jpg',1,19,4,'2017-06-27 19:04:36',NULL),(39,'Кафедра АУТС є головним партнером Мережевої Академії “CISCO”','2017-02-28 22:00:00','http://acts.kpi.ua/app/uploads/2017/03/cisco.png',1,19,4,'2017-06-27 18:52:36',NULL),(40,'Наука','2017-03-05 22:00:00','http://acts.kpi.ua/app/uploads/2017/03/%D1%84%D0%BE%D1%80%D0%BC%D0%B0-%D0%BE%D0%B1%D1%83%D1%87%D0%B5%D0%BD%D0%B8%D1%8F.jpg',1,19,4,'2017-06-27 19:03:54',NULL),(42,'Дні відкритих дверей ','2017-06-24 15:33:40',NULL,0,1,3,'2017-06-24 13:18:16','2017-06-24 12:33:40');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-22  0:31:20
