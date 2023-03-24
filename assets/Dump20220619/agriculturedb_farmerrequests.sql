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
-- Table structure for table `farmerrequests`
--

DROP TABLE IF EXISTS `farmerrequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmerrequests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `requestCropId` int DEFAULT NULL,
  `requestHelpId` int DEFAULT NULL,
  `requestServiceId` int DEFAULT NULL,
  `farmerId` int NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `isApproved` tinyint DEFAULT NULL,
  `reasonOfDeclined` text,
  `referenceId` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referenceId_UNIQUE` (`referenceId`),
  KEY `requestCropId_idx` (`requestCropId`),
  KEY `requestServiceId_idx` (`requestServiceId`),
  KEY `farmerId_idx` (`farmerId`),
  KEY `fk_farmerrequests_requestHelps1_idx` (`requestHelpId`),
  CONSTRAINT `fk_farmerrequests_farmers1` FOREIGN KEY (`farmerId`) REFERENCES `farmers` (`id`),
  CONSTRAINT `fk_farmerrequests_requestHelps1` FOREIGN KEY (`requestHelpId`) REFERENCES `requesthelps` (`id`),
  CONSTRAINT `requestCropId` FOREIGN KEY (`requestCropId`) REFERENCES `requestcrops` (`id`),
  CONSTRAINT `requestServiceId` FOREIGN KEY (`requestServiceId`) REFERENCES `requestservices` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmerrequests`
--

LOCK TABLES `farmerrequests` WRITE;
/*!40000 ALTER TABLE `farmerrequests` DISABLE KEYS */;
INSERT INTO `farmerrequests` VALUES (40,22,NULL,NULL,235,'2022-05-05 16:08:02',NULL,'REQUEST DOESN\'T EXIST ','92c5c9d2f6'),(41,25,NULL,NULL,3,'2022-05-05 16:12:10',NULL,'KILL OUT OF RANGE ','77cfcbf8'),(42,26,NULL,NULL,3,'2022-05-05 16:15:32',0,'KILL OUT OF RANGE ','9828bdfa'),(43,NULL,NULL,16,3,'2022-05-05 16:40:51',NULL,'YEY!','216f40a9'),(44,NULL,NULL,17,3,'2022-05-05 16:41:20',NULL,'REQUEST DOESN\'T EXIST ','5b57bc4a'),(45,27,NULL,NULL,3,'2022-05-05 16:46:04',NULL,'YEY!','d3bd7df8'),(46,28,NULL,NULL,3,'2022-05-05 16:47:53',1,'YEY!','035589a1'),(47,29,NULL,NULL,241,'2022-05-05 21:37:24',NULL,NULL,'ab951d99'),(48,30,NULL,NULL,241,'2022-05-05 21:48:56',NULL,NULL,'7bc753e6'),(49,31,NULL,NULL,241,'2022-05-05 21:52:14',NULL,NULL,'bec5f27c'),(50,32,NULL,NULL,241,'2022-05-05 21:58:46',NULL,NULL,'6a545462'),(51,33,NULL,NULL,241,'2022-05-05 22:01:48',0,'KILL OUT OF RANGE ','e3902ab3'),(52,34,NULL,NULL,241,'2022-05-05 22:05:33',1,'YEY!','545a9922'),(53,35,NULL,NULL,241,'2022-05-05 22:09:07',NULL,NULL,'b173ab97'),(54,36,NULL,NULL,241,'2022-05-05 22:11:01',NULL,NULL,'1f064003'),(55,NULL,NULL,18,241,'2022-05-05 23:20:49',NULL,NULL,'ca5db547'),(56,37,NULL,NULL,241,'2022-05-05 23:27:10',NULL,NULL,'9ccb793b'),(57,38,NULL,NULL,241,'2022-05-05 23:29:56',NULL,NULL,'330298c7'),(58,NULL,NULL,19,241,'2022-05-05 23:32:39',NULL,NULL,'ca2d4d3d'),(59,NULL,NULL,20,241,'2022-05-05 23:34:02',NULL,NULL,'b29b1f89'),(60,NULL,NULL,21,241,'2022-05-05 23:36:50',NULL,NULL,'f571e581'),(61,39,NULL,NULL,241,'2022-05-06 07:06:44',NULL,NULL,'09d1c1c4'),(62,40,NULL,NULL,241,'2022-05-06 07:25:10',NULL,NULL,'9717d81d'),(63,41,NULL,NULL,241,'2022-05-06 07:26:43',NULL,NULL,'26b4badc'),(64,42,NULL,NULL,241,'2022-05-06 08:04:12',NULL,NULL,'6f1aebdf'),(65,43,NULL,NULL,241,'2022-05-06 08:11:24',NULL,NULL,'44e0fc9c'),(66,44,NULL,NULL,241,'2022-05-06 08:56:03',NULL,NULL,'69776959'),(67,45,NULL,NULL,241,'2022-05-06 10:11:45',NULL,NULL,'dba04c91'),(68,46,NULL,NULL,241,'2022-05-06 10:13:18',NULL,NULL,'b100c40a'),(69,NULL,NULL,22,241,'2022-05-06 10:17:46',NULL,NULL,'7f5079c5'),(70,NULL,NULL,23,241,'2022-05-06 10:18:00',NULL,NULL,'ee607d0b'),(71,47,NULL,NULL,241,'2022-05-06 10:19:18',NULL,NULL,'6f60812a'),(72,48,NULL,NULL,241,'2022-05-06 10:19:19',NULL,NULL,'d145415f'),(73,49,NULL,NULL,241,'2022-05-06 10:22:47',NULL,NULL,'aa78d137'),(74,50,NULL,NULL,241,'2022-05-06 10:58:15',NULL,NULL,'18426d7b'),(75,51,NULL,NULL,241,'2022-05-06 12:57:29',NULL,NULL,'165c6c36'),(76,52,NULL,NULL,241,'2022-05-06 13:03:26',NULL,NULL,'415244d7'),(77,53,NULL,NULL,241,'2022-05-06 13:11:26',NULL,NULL,'c65ffa8f'),(78,54,NULL,NULL,241,'2022-05-06 14:50:30',NULL,NULL,'b36a3c2a'),(79,55,NULL,NULL,241,'2022-05-06 14:51:49',NULL,NULL,'77c02a9c'),(80,56,NULL,NULL,241,'2022-05-06 14:53:10',NULL,NULL,'716adadc'),(81,57,NULL,NULL,241,'2022-05-06 15:00:43',NULL,NULL,'05f83042'),(82,58,NULL,NULL,241,'2022-05-06 15:10:14',NULL,NULL,'893bb601'),(83,59,NULL,NULL,241,'2022-05-06 21:19:05',NULL,NULL,'891a2ab4'),(84,NULL,NULL,24,241,'2022-05-06 21:19:26',NULL,NULL,'c0fd674a'),(85,NULL,NULL,25,241,'2022-05-06 21:19:45',0,'KILL OUT OF RANGE ','65c4c43d'),(86,NULL,NULL,26,241,'2022-05-06 21:19:57',0,'KILL OUT OF RANGE ','c71a04ec'),(87,60,NULL,NULL,241,'2022-05-12 12:25:51',NULL,NULL,'1d07801f'),(88,61,NULL,NULL,241,'2022-05-18 00:27:02',NULL,NULL,'b6182a5d'),(89,62,NULL,NULL,242,'2022-05-18 00:49:15',1,'YEY!','464b8c59'),(90,63,NULL,NULL,241,'2022-06-09 14:51:01',NULL,NULL,'b2f83159');
/*!40000 ALTER TABLE `farmerrequests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 21:41:58