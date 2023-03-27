/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.27-MariaDB : Database - db_agriculture
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `crops` */

CREATE TABLE `crops` (
  `crop_id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_type` varchar(255) NOT NULL,
  `crop_name` varchar(255) NOT NULL,
  `crop_description` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`crop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `crops` */

/*Table structure for table `home_content` */

CREATE TABLE `home_content` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `content11` varchar(250) NOT NULL,
  `content12` varchar(250) NOT NULL,
  `content21` varchar(250) NOT NULL,
  `content22` varchar(250) NOT NULL,
  `content31` varchar(250) NOT NULL,
  `content32` varchar(250) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `home_content` */

insert  into `home_content`(`id`,`content11`,`content12`,`content21`,`content22`,`content31`,`content32`,`image1`,`image2`,`image3`,`date_created`) values (3,'Ayala District City','Agriculturist','Ayala District City','Agriculture','Ayala District City','Agriculturers','4ff3fff9ff22befe22ba3a71a161ae7dphoto-1522202176988-66273c2fd55f.jpg','4ff3fff9ff22befe22ba3a71a161ae7dMomoring.jpg','4ff3fff9ff22befe22ba3a71a161ae7ddep_building.jpg','2023-03-21 22:07:37');

/*Table structure for table `home_imgs` */

CREATE TABLE `home_imgs` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `home_imgs` */

insert  into `home_imgs`(`id`,`image1`,`image2`,`image3`) values (7,'images/4ff3fff9ff22befe22ba3a71a161ae7dphoto-1522202176988-66273c2fd55f.jpg','images/4ff3fff9ff22befe22ba3a71a161ae7dMomoring.jpg','images/4ff3fff9ff22befe22ba3a71a161ae7ddep_building.jpg');

/*Table structure for table `requests_registry` */

CREATE TABLE `requests_registry` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crop_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `date_requested` datetime NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `user_id` (`user_id`),
  KEY `crop_id` (`crop_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `requests_registry_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `requests_registry_ibfk_2` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`crop_id`),
  CONSTRAINT `requests_registry_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `requests_registry` */

/*Table structure for table `services` */

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `services` */

/*Table structure for table `user` */

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `role_service` varchar(50) NOT NULL,
  `birth_date` varchar(150) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `address_street` varchar(150) NOT NULL,
  `address_barangay` varchar(150) NOT NULL,
  `address_municipality` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `address_zip` varchar(150) NOT NULL,
  `guardian_fname` varchar(150) NOT NULL,
  `guardian_contact` varchar(150) NOT NULL,
  `farm_type` varchar(150) NOT NULL,
  `farm_barangay` varchar(150) NOT NULL,
  `farm_municipality` varchar(150) NOT NULL,
  `farm_area` varchar(150) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `secret_phrase` text NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (8,'Charissa','Stuart Snyder','Jackson','3','1996-04-18','1','2','110','Reiciendis error ill','Do est omnis exceptu','Quam nisi nulla ipsu','Nobis fugiat tenetu','Quisquam debitis sin','fred','OBpBeG7/baVVBS2N2emSeJh40FnC4mVaFHv026DxNhIYCjTkVTyMippI92Fd02C6vxlwpqbY/W5Wh0phBqgOBA==','16549','Emerald Mccullough','448','1','Dolor eos voluptate ','Cumque enim id dese','40','Farmer','Pending','0fp4w3h7t1MW6vagcodwxRk+e6LaOJIUcesQEHyo9jO8XeaVhbrMANRvjADYCkHTVLGfwiisz3fv3mou7cx4DQ==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (9,'Blake','Kyra Griffith','Roberson','2','2003-05-27','1','1','57','Ullam nihil in nisi ','Enim aperiam duis ul','Doloribus corrupti ','Ipsum eum exercitati','Quam delectus quaer','france','V6oNy/BijhyBkmHsmuhz4uRk6i6h07q7PQYzG3udg48+FaiGXPex1ojJamFCV9f+OhB1nWijm3bM99iKx6vOkA==','23488','Paki Ball','556','1','Eaque ullam at ipsum','Anim et ut adipisci ','445','Farmer','Pending','QSqEPdvKqu4fVYm8baJ1YSifLg8ay1drKCMNAsxBe5dWuXnZtMxY7ShcIf7MwVKNLpURgly7mx006FP57rNZsw==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (10,'Vivian','Declan Greer','Le','1','1944-04-05','2','2','414','Atque veritatis aut ','Impedit excepturi d','Nisi sint aut saepe ','Consequatur Consequ','Quibusdam veritatis ','abby','4tCgFvs/QNNOBlx45lrQbKShD0XBCdJ64ML3Y1gwAFjQEPwlEmYKkuJrFBHz1SXwxo+T8efEgMbScwwkPwiXIA==','24561','Abel Parks','253','2','Molestiae sit labor','Culpa voluptatem m','62','Farmer','Pending','H/vAuEsF3K982Uv+BqSkTM5TSYV7EoVXgq1o5pNiRwid3B4yMzDPhbPz5Y5kI/HdM36jJkWJ6G5+/KB0XcwUYQ==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (11,'Castor','Harper Price','Butler','2','1913-11-12','1','2','820','Nihil in molestias l','Voluptas minus accus','Id irure nostrud ir','Molestias et cupidat','Nisi qui quis numqua','john','Yn/bVn9Jbn91LxgEYzoK3JHikJrKsjyOvL1wjppbDzkkK44JLprWhy1NurZj4qslgWUoRsG5FrlyoZNvY4/ulQ==','40504','Mariko Aguilar','891','2','Optio in omnis in d','Officia saepe placea','12','Farmer','Pending','ear2qY1osW2Mrkg9qZgVH/3cMjNzhg/ZQENNqmFEEEDw/zUqcjVtX5f09BScuivQbRVVAiSoI4/MJI2IMUkC5Q==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (12,'Timothy','August Blevins','Finley','3','1983-02-14','1','2','949','Non laborum Commodi','Maxime sit nostrud q','Consequatur vitae a','Voluptate qui enim l','Ad ad dignissimos of','trevor','d/KyEHWWefFw5zx27y1WZgU5Gxq3D4rYin1W1As+B5s3ygaGEF4UXHl+5w8emR4FLE0IwTuJ/eQWM5mVliKf2Q==','97721','Kamal Richard','847','1','Excepteur neque nisi','Sint voluptatem at','99','Farmer','Pending','fYtyXNOcWDtZKbHmpw9WzoaK7v62B1JMe4KpeLEUZjyB969Xgxx6U0lyDaxApitEh4qDajecysQ0sWfKnj9IRw==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (13,'Ray','Kalia Navarro','Johns','2','1971-03-18','1','1','224','Officiis sit eligen','Nemo dolore eu sit a','Quasi fugit id et ','Quia commodo accusan','Deserunt ea sunt asp','jethro','Uqapa39Wph/ZLfYRbLG3ZfgazP7HMFmlKswDDNKwQhgQC0pl2inoh5+ACMjrfX1Ozgi324WDcYfaerQ1pLjmZA==','79258','Amaya Noel','38','3','Veniam dolores duis','Consectetur labore e','74','Farmer','Pending','t6gu5mqyS2GJJvmy55hz9QAEVqVFYZXib04d4yPynLfORV4Q5LoaxgcJ2kqlkYQyvJTMU50QmHnFcBv3Wme1jw==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (14,'Ashely','Hedwig Lopez','Cabrera','1','1927-07-04','1','1','532','Ipsum ea fuga Dign','Itaque irure aliqua','Hic consequatur volu','Reiciendis optio qu','Obcaecati tenetur do','oscar','m0+INZubHhE5jvJufNw3Co0EurftgQzIOemEeDrxLAOZir+Is3/hB4L/PA4u/QVbvAto6TdyTaUshGtJNRUUzA==','28967','Orson Sharp','171','2','Quae aperiam officia','Accusantium corrupti','22','Farmer','Pending','YtQOlNbAv1+LXYdcMflq1Dn4reRAGxNVsGKnm3bQSHm/+Jk1Ohl6lxUs9D4UIKXh0ioVLAERmT0FNlKaaZ74vg==','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
