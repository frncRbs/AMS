-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: agriculturedb
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `requestcrops`
--

DROP TABLE IF EXISTS `requestcrops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requestcrops` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `kilo` int NOT NULL,
  `purposeOfRequest` text,
  `type` varchar(45) DEFAULT 'crop',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requestcrops`
--

LOCK TABLES `requestcrops` WRITE;
/*!40000 ALTER TABLE `requestcrops` DISABLE KEYS */;
INSERT INTO `requestcrops` VALUES (22,'Petchay',43,'Your purpose...','crop'),(23,'Petchay',10,'Your purpose...','crop'),(24,'Kangkon',43,'Your purpose...','crop'),(25,'Kangkong',10,'kangkong please!\n','crop'),(26,'Kangkong',32,'someeee','crop'),(27,'Petchay',34,'Your purpose...','crop'),(28,'Petchay',432,'Your purpose...','crop'),(29,'Kangkong',32,'kaonggggggggggggg','crop'),(30,'Petchay',32,'Your purpose...','crop'),(31,'Petchay',32,'Your purpose...','crop'),(32,'Kangkong',232,'Your purpose...','crop'),(33,'Kangkong',566,'Your purpos5e...','crop'),(34,'Petchay',34,'Your purpose...','crop'),(35,'Petchay',543,'Your purpos54e...','crop'),(36,'Kangkong',43,'Your purpose...32','crop'),(37,'Petchay',545,'Your purp432ose...','crop'),(38,'Petchay',545,'Your purp432ose...','crop'),(39,'Kangkong',432,'Your purpose...','crop'),(40,'Kangkong',432,'Your purpose...','crop'),(41,'Petchay',3424,'Your purpose...','crop'),(42,'Petchay',423,'Your purpose...','crop'),(43,'Kangkong',32,'Your purpose...','crop'),(44,'Petchay',432,'Your purpose...','crop'),(45,'Kangkong',432,'Your purpos43e...','crop'),(46,'Petchay',43,'Your purpose...','crop'),(47,'Kangkong',43,'Your purpose...','crop'),(48,'Kangkong',43,'Your purpose...','crop'),(49,'Kangkong',43,'Your purpose...','crop'),(50,'Kangkong',434,'Your purpose...','crop'),(51,'Petchay',434,'dasdas','crop'),(52,'Petchay',432,'Your purpose...','crop'),(53,'Kangkong',432,'Your purpose432...','crop'),(54,'Petchay',43,'Your pur43pose...','crop'),(55,'Petchay',434,'Your pur43pose...','crop'),(56,'Petchay',434,'Your pur43pose...','crop'),(57,'Kangkong',55,'Your purpose...','crop'),(58,'Petchay',4234,'Your purpose...','crop'),(59,'Petchay',43,'someeee\n','crop'),(60,'Grape',534,'Your purpose...54','crop'),(61,'Mango',34232,'Your purpose...','crop'),(62,'Papaya',32,'tessssssssssst','crop'),(63,'Singkamas',23,'something that you don\'t want to see','crop');
/*!40000 ALTER TABLE `requestcrops` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 21:41:54
