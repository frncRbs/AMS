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
-- Table structure for table `farmerguardians`
--

DROP TABLE IF EXISTS `farmerguardians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmerguardians` (
  `id` int NOT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `mobileNumber` varchar(45) DEFAULT NULL,
  KEY `farmerId` (`id`),
  CONSTRAINT `fk_farmerguardians_farmers1` FOREIGN KEY (`id`) REFERENCES `farmers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmerguardians`
--

LOCK TABLES `farmerguardians` WRITE;
/*!40000 ALTER TABLE `farmerguardians` DISABLE KEYS */;
INSERT INTO `farmerguardians` VALUES (185,'Halee Boyd','6565555555'),(186,'Halee Boyd','6565555554'),(187,'Dieter Powell','5454545454'),(190,'Dawn Williams','7676767767'),(191,'Karina Watts','0977303233'),(192,'Germane Gibson','0977303000'),(193,'Quin Fulton','0911103322'),(202,'Curran Johnson','9742342342'),(203,'Odessa Bond','0432432422'),(204,'Odessa Bond','0432432400'),(210,'Charles Washington','4524524355'),(211,'Calista Ochoa','5345345345'),(213,'Calista Ochoa','5345345255'),(214,'Calista Ochoa','5345345229'),(215,'Denise Mcdaniel','0999999999'),(216,'Whitney Dillard','5342523222'),(217,'Yvonne Welch','0000000000'),(218,'Gary James','4321232222'),(219,'Brett Reeves','5235245235'),(220,'Anjolie Morales','0000000007'),(221,'Stuart Terry','3222222222'),(222,'Kylynn Willis','2223333333'),(223,'Noel Park','9996666666'),(224,'Erin Hall','7777777776'),(225,'Price Gilbert','9666666666'),(226,'Ishmael Lott','4344444444'),(227,'Winter Luna','6745563454'),(228,'Ivana Martinez','7577777777'),(229,'Fulton Alston','7654767675'),(230,'Seth Stokes','2122222222'),(231,'Edan Fleming','5666666666'),(233,'Alana Cunningham','5654444444'),(234,'Iola Todd','0543534534'),(235,'Darrel Fields','09773032821'),(236,'Luke Sherman','09775255363'),(239,'Allegra Smith','09552555555'),(240,'Allegra Smith','09552555550'),(241,'Allegra Smith','09552555551'),(242,'43','09444443333');
/*!40000 ALTER TABLE `farmerguardians` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 21:41:55
