-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fiot_acts_en
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isinsystem` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hasmasters` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('1','root','mail@mail.ru','$2y$10$xHsJcOTUwyg4I2jX6tqft.oPQdA15/GjkRyKe4uvMVVlGBA1aBETa',0,0,'Zt9QWDF7ewWq9Qc1nQ9J1GPo3JTpciYhL53FdcD3F9GPcBxzpYYCY4MlcLv5','2017-06-17 09:33:03','2017-06-22 15:21:30',0),('13','telenik','person5@mail.ru','$2y$10$1Z4PDPebYqOWR6u3mtZvFu1W6Diovea8ejrJRFOGluYwVSKLJs7XW',0,0,'Vb1zSDgcJYV1HN4SgQDwbe3UI0DvXdPXYBiQtlt92BAGC4b2tu9KD8C5mdtN',NULL,'2017-06-19 05:34:36',0),('16','repnikova','person2@mail.ru','$2y$10$EFvwyVDxbp9X9DV1jRnbpOa1hMkSktIioCvPYwaLq3mmzh2PrYhSi',0,0,'0rpmx0AsKYHrivgkQ5kl7gyrQvNNAkA0JK5e5vmaC1Szz0iFpbxGV8xwMr01',NULL,'2017-06-22 13:10:01',0),('2','admin','admin@acts.ua','$2y$10$KZizJI0nlHqRdj8X0zhQPeSUwRLtPWo1PunOoFwUmWBXD0q.3TQ62',0,0,'Hvwk17Qa71aQLdByPr55bRrMCqRaugKp6qxtZXOe7wGavVFcJh8d6LulDKTW','2017-06-18 10:12:24','2017-06-18 11:36:12',0),('21','author','person8@mail.ru','$2y$10$xdouT/BxCNzQzER/PvAM7ODd0b8k3z4Q9dMUO0/jnU9XQN5fbz.B6',0,0,'tMHPkKbVLriUQI9UdXxBowU3SrbkIGCKIInkCv70Ft3MmxYxYaKNsrr7JNp6',NULL,'2017-06-22 15:34:32',0),('599b138b48ebb','root','vsd@f.f','$2y$10$kxBcIJndjiplMC/fT0a2Fu7YNVmxwo7xYLojmXu1i05FO3Ak61uOW',0,0,NULL,NULL,NULL,0),('599b13af77613','root1','dfgddf@gg.g','$2y$10$ZIZTKCwdBfQImYk71/u9cOkEm2ShKfZQHx9YjAsZWgVYUwUs/MnXa',0,0,NULL,NULL,NULL,0),('599b1931cfb5d','admin2332','mail@mailfdf.ru','$2y$10$nZqkVcnoLxbbpkC4EbY4tOSYzG045Fw.8aZUvzhvdsFMCKIAefWG6',0,0,NULL,NULL,NULL,0);
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

-- Dump completed on 2017-08-22  0:31:16
