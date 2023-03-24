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
-- Table structure for table `personneladdresses`
--

DROP TABLE IF EXISTS `personneladdresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personneladdresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `provincial` text,
  `barangay` text,
  `municipality` text,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_personnelsaddresses_personnels1` FOREIGN KEY (`id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personneladdresses`
--

LOCK TABLES `personneladdresses` WRITE;
/*!40000 ALTER TABLE `personneladdresses` DISABLE KEYS */;
INSERT INTO `personneladdresses` VALUES (2,'Dasma Cavite','Dasma','Municip 3'),(189,'Ea at quia saepe cor','Est ut cupidatat vol','Eu occaecat sint ali'),(194,'Aut in laboriosam i','Quia quaerat ipsum ','Expedita non natus q'),(195,'Aliquid nostrum volu','Voluptas sit facili','Distinctio Animi q'),(196,'Dolore illum et dol','Dicta ipsa blanditi','Delectus sed eius i'),(197,'Nobis quam eos repud','Voluptas beatae temp','Modi omnis odit dolo'),(198,'A ratione sit est s','Anim voluptate et cu','Ipsam do deserunt ut'),(199,'Ea eum minima in cum','Tempore ex suscipit','Quam ut eum rerum qu'),(200,'Doloremque voluptas ','Velit animi explic','Pariatur Dolores se'),(232,'Officia ratione itaq','Nisi magnam sapiente','Nostrum deserunt tem'),(238,'Qui enim quidem cons','Numquam blanditiis l','Deserunt et sint et ');
/*!40000 ALTER TABLE `personneladdresses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 21:41:56
