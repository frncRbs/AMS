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
-- Table structure for table `farmerlanddescriptions`
--

DROP TABLE IF EXISTS `farmerlanddescriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmerlanddescriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `farmerId` int NOT NULL,
  `barangay` text,
  `municipality` text,
  `totalFarmArea` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `farmerId_idx` (`farmerId`),
  CONSTRAINT `fk_farmerslanddescriptions_farmers1` FOREIGN KEY (`id`) REFERENCES `farmers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmerlanddescriptions`
--

LOCK TABLES `farmerlanddescriptions` WRITE;
/*!40000 ALTER TABLE `farmerlanddescriptions` DISABLE KEYS */;
INSERT INTO `farmerlanddescriptions` VALUES (186,0,'Deserunt eum officia','Id quo quia soluta r',0),(187,0,'Ipsum a distinctio ','Dolores nulla ab vel',0),(190,0,'Cillum nemo autem nu','Voluptatem quos volu',0),(191,0,'Cupiditate ea quis l','Id quo asperiores t',0),(192,0,'Sint culpa do dolor','Est cum iusto fugiat',0),(193,0,'Error cillum adipisc','Qui et proident in ',0),(202,0,'Duis voluptatem Lab','Ab aliqua Facilis i',0),(203,0,'Voluptates est offic','Earum atque qui sint',0),(204,0,'Voluptates est offic','Earum atque qui sint',0),(210,0,'Eos nulla harum reru','Reprehenderit accusa',0),(211,0,'Eligendi voluptate a','Est qui temporibus e',0),(213,0,'Eligendi voluptate a','Est qui temporibus e',0),(214,0,'Eligendi voluptate a','Est qui temporibus e',0),(215,0,'Quis sapiente ducimu','Eum illo cupiditate ',0),(216,0,'Aliquid nulla dolore','Maxime illum maxime',545),(217,0,'Aperiam sit quos nem','Id magna repudiandae',0),(218,0,'Accusantium fugiat a','Veniam pariatur Nu',0),(219,0,'Delectus id amet ','Assumenda velit inci',0),(220,0,'Ut voluptas ut susci','Praesentium aliqua ',0),(221,0,'Similique esse veni','Aut sed ut iste inci',0),(222,0,'Perspiciatis in sit','Et tempora excepturi',0),(223,0,'Sunt harum dignissim','Perspiciatis recusa',0),(224,0,'Reiciendis aut qui h','Eos provident nisi',0),(225,0,'Eum tenetur veniam ','In autem aut aute ac',0),(226,0,'Magnam et autem accu','Rem sunt tempor temp',0),(227,0,'In maxime odio cillu','Non officia autem fu',0),(228,0,'Enim vero expedita o','Commodo ut totam ips',0),(229,0,'Nostrud magni delect','Non omnis aliqua So',0),(230,0,'Rerum sint est esse','Nam ut fuga Qui non',0),(231,0,'Neque culpa iusto ei','Possimus delectus ',0),(233,0,'Aut deserunt volupta','Officia quam aut sin',0),(234,0,'In officiis nulla ar','Id sint doloribus e',87),(235,0,'Id dignissimos labo','Adipisci odio ab non',432),(236,0,'Ut exercitation aut ','Nam itaque eos earu',432),(239,0,'Vero dolores tempora','Sed maxime obcaecati',0),(240,0,'Vero dolores tempora','Sed maxime obcaecati',0),(241,0,'Vero dolores tempora','Sed maxime obcaecati',0),(242,0,'dsda','dsad',434);
/*!40000 ALTER TABLE `farmerlanddescriptions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 21:41:50
