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
-- Table structure for table `farmeraddresses`
--

DROP TABLE IF EXISTS `farmeraddresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmeraddresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `farmerId` int NOT NULL,
  `street` text,
  `subdivision` text,
  `sitio` text,
  `barangay` text,
  `municipality` text,
  `zipCode` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `farmerId_idx` (`farmerId`),
  CONSTRAINT `fk_farmersaddresses_farmers1` FOREIGN KEY (`id`) REFERENCES `farmers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmeraddresses`
--

LOCK TABLES `farmeraddresses` WRITE;
/*!40000 ALTER TABLE `farmeraddresses` DISABLE KEYS */;
INSERT INTO `farmeraddresses` VALUES (186,0,'Laboris consequatur ','In quos nesciunt mi','Ipsa a voluptate al','Cupiditate amet ull','Eiusmod asperiores d',5624),(187,0,'Alias aliquid laboru','Aspernatur mollitia ','Harum sed dolores la','Laborum libero quasi','Consequatur a nihil ',3634),(190,0,'Dolor sit voluptas s','Praesentium esse ex ','Pariatur Aut qui ne','Consequat Facere iu','Tempor est distincti',7150),(191,0,'Non sed ut expedita ','Aut et fugit omnis ','Dolorum facere labor','Esse cumque corporis','Tenetur maiores iste',7014),(192,0,'Enim dolorum incidid','Voluptas assumenda e','Blanditiis velit ul','Nesciunt doloremque','Dolores expedita ius',5863),(193,0,'Similique sit volupt','Mollitia sed volupta','Sit aut in vel dolor','Assumenda itaque nes','Proident enim volup',7066),(202,0,'Sapiente possimus i','Amet iste cum disti','Nostrud obcaecati se','Sint odio dolore et ','Consequatur et exce',4234),(203,0,'Omnis veniam non te','Rem ad molestias ut ','Facere vero a repreh','Sapiente quaerat est','Accusantium mollitia',9347),(204,0,'Omnis veniam non te','Rem ad molestias ut ','Facere vero a repreh','Sapiente quaerat est','Accusantium mollitia',9347),(210,0,'Et irure eum laudant','Ullam sed qui nihil ','Tempore amet qui o','Velit mollit sunt qu','Aut dolorum est ab n',2333),(211,0,'Minus aspernatur vol','Inventore eum modi e','Vel consectetur rei','Velit illum esse ','Dolore proident cul',7820),(213,0,'Minus aspernatur vol','Inventore eum modi e','Vel consectetur rei','Velit illum esse ','Dolore proident cul',7820),(214,0,'Minus aspernatur vol','Inventore eum modi e','Vel consectetur rei','Velit illum esse ','Dolore proident cul',7820),(215,0,'Molestiae ut similiq','Assumenda cumque ex ','Dicta earum perferen','Delectus minim dist','Unde provident veri',1967),(216,0,'Impedit voluptatem','Nulla mollit exercit','Sunt nostrum non vit','Quis itaque amet of','Itaque minim aut ame',6257),(217,0,'Nihil deserunt place','Illo facilis placeat','Perferendis officia ','Voluptatum nemo recu','Omnis similique ipsa',8650),(218,0,'Magnam ut autem amet','Velit et veniam vol','Accusamus nulla cons','Exercitationem place','Dolores tempore quo',4865),(219,0,'Aliqua Distinctio ','Blanditiis optio ve','Commodo quia eos non','Elit minim quia aut','Eu sint sapiente qu',9291),(220,0,'Reprehenderit in a q','Cupiditate eaque sin','Dolore fuga Vero te','Cupiditate aut illo ','Sunt voluptas doloru',1091),(221,0,'Vitae ea labore reic','Veritatis nesciunt ','Ut dolores in volupt','Ipsum consequatur ','Cupiditate rerum nih',7169),(222,0,'Id sit aut dolores ','Blanditiis consectet','Dolor qui ipsam erro','Hic aliqua Non volu','Modi nostrum enim do',6099),(223,0,'Ea saepe est rerum v','Ea eos deleniti amet','Quia pariatur Volup','Non dolores eius ips','Molestiae sit tempo',7971),(224,0,'Voluptas quia maiore','Omnis iste ut dolori','Quod voluptate aliqu','Voluptatem recusand','Non aute labore vita',9031),(225,0,'A aliquam repudianda','Temporibus sequi quo','Sapiente blanditiis ','Deserunt nobis repre','Omnis iure totam arc',1287),(226,0,'Ea quo consectetur ','Ipsam nisi eius sunt','Id laudantium animi','Non minus minim quam','Quo maiores sunt is',3121),(227,0,'Recusandae Et et ad','Qui accusamus soluta','Ut inventore quibusd','Voluptatum quis dolo','Unde veritatis est o',6243),(228,0,'Praesentium consequu','Molestiae voluptas q','Adipisicing quod rec','Vitae exercitationem','Pariatur Aut ad asp',7442),(229,0,'Voluptates nisi ipsu','Eius est laboriosam','Ut error quisquam ei','Sed voluptatem Iust','Ullam nisi explicabo',4672),(230,0,'Ut quia vitae sit e','Rerum labore tempor ','Pariatur Et hic est','Consequuntur quisqua','Et libero est optio',3219),(231,0,'Ratione nihil mollit','Rerum irure est repu','Et modi esse non au','Reprehenderit iure ','Repellendus Ea est ',1044),(233,0,'Placeat ex quod non','Quam non voluptatem ','Exercitationem natus','Elit dolorum dolore','Et voluptate qui dol',8275),(234,0,'Quae earum quibusdam','Qui quo libero moles','Facere quidem explic','dasma city','Id sint doloribus e',9297),(235,0,'Omnis assumenda Nam ','Dolorem totam culpa','Et architecto conseq','Accusantium inventor','Velit fugiat ipsam',4024),(236,0,'Reiciendis ullamco q','Sunt corrupti quibu','Culpa id nesciunt ','Delectus aliquam ma','Qui a cum odio exerc',8692),(239,0,'Officiis non veniam','Cupidatat quam labor','Beatae eos voluptat','Exercitationem iste ','Deleniti eiusmod non',9167),(240,0,'Officiis non veniam','Cupidatat quam labor','Beatae eos voluptat','Exercitationem iste ','Deleniti eiusmod non',9167),(241,0,'Officiis non veniam','Cupidatat quam labor','Beatae eos voluptat','Exercitationem iste ','Deleniti eiusmod non',9167),(242,0,'dsad','das','das','dasd','asdas',4343);
/*!40000 ALTER TABLE `farmeraddresses` ENABLE KEYS */;
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
