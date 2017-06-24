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
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `MiddleName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `LastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `Department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ФІОТ АУТС',
  `Profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `Photo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/img/Photo.png',
  `TimeDay` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `Room` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `Phone` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `Mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Дані відсутні',
  `ProfInterest` longtext COLLATE utf8mb4_unicode_ci,
  `Discipline` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) NOT NULL,
  `position_id` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `isteacher` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `user_id_UNIQUgE` (`user_id`),
  KEY `position_id_idx` (`position_id`),
  CONSTRAINT `id_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `position_id` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'Олександр','Іванович ','Ролік','ФІОТ АУТС','відповідальний за проектно-конструкторську роботу відповідальний за технічну політику\nі розвиток директор ННЦ \"Неткрекер-КПІ\" д.т.н., професор','http://127.0.0.1:8000/files/get/image/phpE31C.tmp.jpg','Чт, 16-00','526-18','Дані відсутні','Дані відсутні','<ul style=\"margin-bottom: 11px; color: #636b6f; font-family: Raleway, sans-serif; background-color: #ffffff; list-style-type: circle;\">\r\n<li>Системи і мережі передачі даних.</li>\r\n<li>Системи управління ІТ-інфраструктурами.</li>\r\n</ul>','<ul><li>Комп’ютерні мережі.</li> <li>Телекомунікаційні системи та мережі.</li> <li>Проектування та моделювання комп’ютерних мереж.</li> <li>Технології та обладнання комп’ютерних мереж.</li></ul>',1,0,'2017-06-22 15:21:30',1),(10,'Сергій','Федорович','Теленик','ФІОТ АУТС','голова НМК МОН України \"Автоматика та управління\" керівник циклу математичних дисциплін д.т.н., професор','http://acts.kpi.ua/app/uploads/2015/07/%D0%A2%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%BA.jpg','Дані відсутні','Дані відсутні','Дані відсутні','Дані відсутні',NULL,NULL,13,1,'2017-06-19 05:34:37',1),(13,'Наталія','Борисівна','Репнікова','ФІОТ АУТС','секретар НМК МОН України \"Автоматика та управління\" керівник циклу \"Теорія та систкми управління\" к.т.н., доцент','http://acts.kpi.ua/app/uploads/2015/07/%D0%A0%D0%B5%D0%BF%D0%BD%D0%B8%D0%BA%D0%BE%D0%B2%D0%B0.jpg','Дані відсутні','Дані відсутні','Дані відсутні','Дані відсутні',NULL,NULL,16,0,'2017-06-22 13:10:01',1),(16,'Дані відсутні','Дані відсутні','Дані відсутні','ФІОТ АУТС','Дані відсутні','http://127.0.0.1:8000/files/get/image/php5098.tmp.jpg','Дані відсутні','Дані відсутні','Дані відсутні','Дані відсутні',NULL,NULL,21,2,'2017-06-22 15:34:32',1);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-25  0:18:24
