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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  `position` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `mobileNumber` varchar(34) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `isActivated` tinyint unsigned DEFAULT '0',
  `accountStatus` varchar(20) DEFAULT 'pending',
  `accessToken` varchar(255) DEFAULT NULL,
  `refreshToken` varchar(255) DEFAULT NULL,
  `resetPasswordToken` varchar(255) DEFAULT NULL,
  `birthDate` varchar(45) DEFAULT NULL,
  `placeOfBirth` text,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `dateActive` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (237,'admin','admin','Edward','Lee','Stack','09552536888','edward','$2a$10$NCfii4ruZMPbf16Xp6zwJeE5vTIj2Xq0CrVh4Voa2JfhjMqLeI6BO','male',0,'activated',NULL,NULL,NULL,'03-01-2002','Ayala City','0000-00-00',NULL,'2022-06-16'),(238,'personnel','High Value Crops','Chiquita','Karly Powell','Francis','093443433333','personnel_01','$2a$10$gubmOfDLyxBA7PzQVuVabOUw.IsKCHsJHXCMfkMPqUJx8OqBAfKCS','female',1,'activated',NULL,NULL,NULL,'1980-05-16','Pariatur Nostrum si','2022-05-05',NULL,'2022-06-09'),(239,'farmer','High Value Crops','Jonah','Christen Padilla','Warren','09775555555','farmer_01','$2a$10$ouUgNnktdwM8GH2MIhlnHebLlVxuqSoum2VBBG2pQlMcwieYcmdd2','female',0,'pending',NULL,NULL,NULL,'1997-08-02','Dolorum do nisi anim','2022-05-05',NULL,'2022-06-09'),(240,'farmer','High Value Crops','Joe','Christen Padilla','Warren','9775555549','farmer_02','$2a$10$ZQWgygZ4OIKE03MEJhozuOFG.tNHqsYDkqI0Y3ew2JIjOf.0Wxnce','female',0,'activated',NULL,NULL,NULL,'1997-08-02','Dolorum do nisi anim','2022-05-05',NULL,'2022-06-09'),(241,'farmer','High Value Crops','Doe','Christen Padilla','Warren','9775555509','farmer_03','$2a$10$OjO/XOCqCIN.s4UkTtvtpe00KcLvtXDrCjkhUNLDigahcONa./Ksy','female',0,'activated',NULL,NULL,NULL,'1997-08-02','Dolorum do nisi anim','2022-05-05',NULL,'2022-06-09'),(242,'farmer','High Value Crops','Mark Anthony','Mark','Pelinggon','09332322222','anthony','$2a$10$Xcfp8o.BvW7JA4qGK.S9EOQkVo9M52IhVky.LdbbfOM6/JAE76C5.','female',0,'activated',NULL,NULL,NULL,'2022-05-18','Paliparan','2022-05-18',NULL,'2022-05-18');
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

-- Dump completed on 2022-06-19 21:41:53
