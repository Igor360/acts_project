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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isinsystem` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hasmasters` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user','mail@mail.ru','$2y$10$xHsJcOTUwyg4I2jX6tqft.oPQdA15/GjkRyKe4uvMVVlGBA1aBETa',0,0,'Pe9OquphJSQWBXZiV9eMshaNQLwnOGV4r9sEPMrlHXjInMqjyTtcHl36FqBj','2017-06-17 09:33:03','2017-06-18 17:19:26',0),(2,'admin','admin@acts.ua','$2y$10$KZizJI0nlHqRdj8X0zhQPeSUwRLtPWo1PunOoFwUmWBXD0q.3TQ62',1,0,'i4s4jRnwehsY7mPYanzUk50ab6O727AXnQVvTSIcFSDUdaEh6gvGcZyFaKEv','2017-06-18 10:12:24','2017-06-18 11:36:12',0),(13,'try','person5@mail.ru','$2y$10$1Z4PDPebYqOWR6u3mtZvFu1W6Diovea8ejrJRFOGluYwVSKLJs7XW',0,0,'Vb1zSDgcJYV1HN4SgQDwbe3UI0DvXdPXYBiQtlt92BAGC4b2tu9KD8C5mdtN',NULL,'2017-06-18 15:21:52',0),(16,'erre','person2@mail.ru','$2y$10$EFvwyVDxbp9X9DV1jRnbpOa1hMkSktIioCvPYwaLq3mmzh2PrYhSi',0,0,'BvYJfyuyUuZo8mKaOCPK6t9M7bBNtKuuXulMG6b9916i2qVUy3AIzRmcqHzp',NULL,'2017-06-18 17:59:05',1),(17,'author','person3@mail.ru','$2y$10$1XpgYW/EbGWxJyDTC3Qj/.BUvCc4kGhChBnGzhz.zbgjVA2EwKplW',0,0,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-19  1:22:52
