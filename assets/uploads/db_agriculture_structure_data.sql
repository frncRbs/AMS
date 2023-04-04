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
  `crop_type` varchar(255) DEFAULT NULL,
  `crop_name` varchar(255) NOT NULL,
  `crop_description` text DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`crop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `crops` */

insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (2,NULL,'Mustasa seed','',0,'2023-03-28 07:37:30');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (3,NULL,'Pechay seed','',0,'2023-03-28 07:39:14');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (11,NULL,'Malunggay seed',NULL,1,'0000-00-00 00:00:00');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (23,NULL,'Calabasa seed',NULL,1,'0000-00-00 00:00:00');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (35,NULL,'Kiki',NULL,1,'0000-00-00 00:00:00');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (36,NULL,'Pukeke',NULL,1,'0000-00-00 00:00:00');

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
  `request_type` varchar(255) DEFAULT NULL,
  `crops_kilo` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `crop_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT 0,
  `service_remarks` text DEFAULT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`request_id`),
  KEY `user_id` (`user_id`),
  KEY `crop_id` (`crop_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `requests_registry_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `requests_registry_ibfk_2` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`crop_id`),
  CONSTRAINT `requests_registry_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `requests_registry` */

insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`date_requested`) values (27,'Crop','69',32,3,NULL,0,NULL,'2023-04-01 17:26:57');
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`date_requested`) values (28,'Service',NULL,32,NULL,2,0,'Exterminator','2023-04-01 17:27:12');
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`date_requested`) values (29,'Crop','69',33,2,NULL,0,NULL,'2023-04-01 17:39:09');
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`date_requested`) values (30,'Service',NULL,33,NULL,3,0,'For shabu onle','2023-04-01 17:39:22');
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`date_requested`) values (34,'Crop','2',32,35,NULL,0,NULL,'2023-04-03 23:39:25');

/*Table structure for table `services` */

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(255) DEFAULT NULL,
  `service_name` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `services` */

insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (2,NULL,'Technical Assistance',1,'2023-03-28 07:44:56');
insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (3,NULL,'Financial Assistance',1,'2023-03-28 07:45:14');
insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (6,NULL,'Soil Sampling',1,'0000-00-00 00:00:00');
insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (7,NULL,'Exterminator',1,'0000-00-00 00:00:00');

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
  `status` tinyint(1) NOT NULL,
  `secret_phrase` text NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (8,'Charissa','Stuart Snyder','Jackson','3','1996-04-18','1','2','110','Reiciendis error ill','Do est omnis exceptu','Quam nisi nulla ipsu','Nobis fugiat tenetu','Quisquam debitis sin','fred','OBpBeG7/baVVBS2N2emSeJh40FnC4mVaFHv026DxNhIYCjTkVTyMippI92Fd02C6vxlwpqbY/W5Wh0phBqgOBA==','16549','Emerald Mccullough','448','1','Dolor eos voluptate ','Cumque enim id dese','40','Farmer',0,'0fp4w3h7t1MW6vagcodwxRk+e6LaOJIUcesQEHyo9jO8XeaVhbrMANRvjADYCkHTVLGfwiisz3fv3mou7cx4DQ==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (9,'Blake','Kyra Griffith','Roberson','2','2003-05-27','1','1','57','Ullam nihil in nisi ','Enim aperiam duis ul','Doloribus corrupti ','Ipsum eum exercitati','Quam delectus quaer','france','ubgDK7nTPYa6SZLIPp3lh9TToQKXbNzbANKSlPIJp3XPGR5JR3Q6/Q7yr6ICX3zQ6ea33c31/9gpg8uqkghM2A==','23488','Paki Ball','556','1','Eaque ullam at ipsum','Anim et ut adipisci ','445','Farmer',1,'QSqEPdvKqu4fVYm8baJ1YSifLg8ay1drKCMNAsxBe5dWuXnZtMxY7ShcIf7MwVKNLpURgly7mx006FP57rNZsw==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (10,'Vivian','Declan Greer','Le','1','1944-04-05','2','2','414','Atque veritatis aut ','Impedit excepturi d','Nisi sint aut saepe ','Consequatur Consequ','Quibusdam veritatis ','abby','ubgDK7nTPYa6SZLIPp3lh9TToQKXbNzbANKSlPIJp3XPGR5JR3Q6/Q7yr6ICX3zQ6ea33c31/9gpg8uqkghM2A==','24561','Abel Parks','253','2','Molestiae sit labor','Culpa voluptatem m','62','Admin',1,'H/vAuEsF3K982Uv+BqSkTM5TSYV7EoVXgq1o5pNiRwid3B4yMzDPhbPz5Y5kI/HdM36jJkWJ6G5+/KB0XcwUYQ==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (11,'Castor','Harper Price','Butler','2','1913-11-12','1','2','820','Nihil in molestias l','Voluptas minus accus','Id irure nostrud ir','Molestias et cupidat','Nisi qui quis numqua','john','Yn/bVn9Jbn91LxgEYzoK3JHikJrKsjyOvL1wjppbDzkkK44JLprWhy1NurZj4qslgWUoRsG5FrlyoZNvY4/ulQ==','40504','Mariko Aguilar','891','2','Optio in omnis in d','Officia saepe placea','12','Farmer',1,'ear2qY1osW2Mrkg9qZgVH/3cMjNzhg/ZQENNqmFEEEDw/zUqcjVtX5f09BScuivQbRVVAiSoI4/MJI2IMUkC5Q==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (12,'Timothy','August Blevins','Finley','3','1983-02-14','1','2','949','Non laborum Commodi','Maxime sit nostrud q','Consequatur vitae a','Voluptate qui enim l','Ad ad dignissimos of','trevor','d/KyEHWWefFw5zx27y1WZgU5Gxq3D4rYin1W1As+B5s3ygaGEF4UXHl+5w8emR4FLE0IwTuJ/eQWM5mVliKf2Q==','97721','Kamal Richard','847','1','Excepteur neque nisi','Sint voluptatem at','99','Farmer',1,'fYtyXNOcWDtZKbHmpw9WzoaK7v62B1JMe4KpeLEUZjyB969Xgxx6U0lyDaxApitEh4qDajecysQ0sWfKnj9IRw==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (13,'Ray','Kalia Navarro','Johns','2','1971-03-18','1','1','224','Officiis sit eligen','Nemo dolore eu sit a','Quasi fugit id et ','Quia commodo accusan','Deserunt ea sunt asp','jethro','Uqapa39Wph/ZLfYRbLG3ZfgazP7HMFmlKswDDNKwQhgQC0pl2inoh5+ACMjrfX1Ozgi324WDcYfaerQ1pLjmZA==','79258','Amaya Noel','38','3','Veniam dolores duis','Consectetur labore e','74','Farmer',1,'t6gu5mqyS2GJJvmy55hz9QAEVqVFYZXib04d4yPynLfORV4Q5LoaxgcJ2kqlkYQyvJTMU50QmHnFcBv3Wme1jw==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (14,'Ashely','Hedwig Lopez','Cabrera','1','1927-07-04','1','1','532','Ipsum ea fuga Dign','Itaque irure aliqua','Hic consequatur volu','Reiciendis optio qu','Obcaecati tenetur do','oscar','m0+INZubHhE5jvJufNw3Co0EurftgQzIOemEeDrxLAOZir+Is3/hB4L/PA4u/QVbvAto6TdyTaUshGtJNRUUzA==','28967','Orson Sharp','171','2','Quae aperiam officia','Accusantium corrupti','22','Farmer',1,'YtQOlNbAv1+LXYdcMflq1Dn4reRAGxNVsGKnm3bQSHm/+Jk1Ohl6lxUs9D4UIKXh0ioVLAERmT0FNlKaaZ74vg==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (15,'Ivy','Yvonne Gilliam','Burns','3','1953-02-20','1','2','554','Est sint molestias ','Blanditiis minim nis','Est voluptatem Adip','Qui doloribus alias ','Iusto autem est inci','zoxiqenym','V4lzKSrhDyhSR+7wjjBdMdDWYW2Nga4mgg5noZNmOK8VVUzQnQE214ODpOFHGdr4TQtaFgLRhYTpyEsmDMHrgg==','20325','Pandora Davidson','925','1','Irure impedit moles','Anim veritatis enim ','44','Farmer',1,'qEaKPJJCRKB4a3qUpCTWsHezFZc3ZA8bN8+3Dk6AmMetvcZeLSHZvw7UNjrum3xBCkcwpgYMg4mk0Wyqs3SiOg==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (16,'Chastity','Aurelia Hays','Greene','3','2020-08-26','','2','694','Mollitia aliquip sin','Repudiandae et adipi','Laborum occaecat inc','Sed atque sint volup','Enim porro vel dolor','jifred','2ZTa9KHlt9S9r0diS3uFwEbuUt9EVhrlabUXsNsw6ASm4l9+1UeISgyxOYISvotuLVsMWfqBDjtP3CGTDOAF5w==','','','','','','','','Personnel',1,'uO7RPDmBbY4TsQ0F/8oDuB+upb7h91kOEyqluOjtL9QjM711SSKRQvS8fqUDeWx7lssAAJao7kCSEEseOHsHfQ==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (17,'Katelyn','Grace Sullivan','Dale','2','1998-03-28','','1','171','In vel consequatur h','Labore sit delectus','Qui qui officiis qui','Laboris ducimus vol','At quidem harum esse','davoz','jwbNqKwGz9yXH9Idpr1po5fnKtS8iWkQ5PDpE/5Z/Szjxp34EoQvnRlqEZNuIZd4xoqRxWpJvxkPLMBYgU6ySw==','','','','','','','','Personnel',1,'Je4hpBJWPLJtRuKZju4+5aUOklswR0EovVBE7rsyL8ghE0cImnQKym2nTDYr8PbUaqMcRuE1TeMy0HLHH8kFag==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (18,'Tasha','Eaton Blanchard','Rowe','2','1981-06-29','','2','772','Nostrum saepe eaque ','In nulla voluptatem ','Quis in provident q','Reprehenderit cillu','Reprehenderit quia t','sikesyj','h2j8G5Ddyb+ASmsLYUZeqqnM7HuI1YqQRrXcIOdHZIPkJIU7WK2oqkxq2FyP7GwHkc53y7JAmdCN5u0t45wuzA==','','','','','','','','Personnel',1,'fxF8b0n40phsNITNInCPUXRa4BnOHVJ4VVXumFvxjdOQlHtNnWbJCW7ktF2029q2jatip0JBbSykPiDMR+hwKA==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (19,'Shay','Timon Melendez','Coffey','3','1983-04-10','','2','744','Tempora autem sunt e','Eos fugit commodi a','Quas veniam asperna','Pariatur Labore lau','Libero nihil dolorem','cabiv','eUy+682D+f5qvDJHju2KKiz9uuUpAF9DpKIqal05RA8ehuiiIZjJH9K0lYk7qr0AESIIrX/J/vRAqszWpIpndw==','','','','','','','','Personnel',1,'tEEjKiUGv7vFSRIqAmeBT3Du7xkk2s3DUhl3h4kNK3BewPr+3b7KT13rHKXXAeRp4B5sKjHN2nRh+w8dqTZu6ebqvFvdAkOc/enl/desEv4=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (20,'Neve','Ebony Mayer','Gill','3','1978-08-15','','2','872','Ratione ipsum tempo','Est labore perferen','Aliquid et do vitae ','Voluptatem magni dol','Id dolorem sed exerc','xojecefari','ZBkVeW9A4CdBT4v1uKXaXUe1nguw9bfv3KD52/PNXvFBzSZWI/cIs4x54uc+rKEiyPmstpdmebcF0lbLcIOoxg==','','','','','','','','Personnel',1,'npmN/yLBi1dcHGB71HF4ueQwUsqUswaYexTqMbgspeWwT1JtYXGReA6IOBscPEgKR+yVpnTKkj61WPenKHWi7anhFK1iR2usXdssmAgslR4=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (21,'Rama','Cynthia Hernandez','Russo','2','1958-12-20','2','1','116','Impedit excepturi a','Qui iure illum itaq','Recusandae Veniam ','In impedit non sunt','Anim exercitationem ','bifim','dwiogt8mKRGvhCcs1v9+DZWQusUfe48W65yZzgDg3oEd1uq9sK5FM625NdG2sGZWOyQkH6lkZsT5AADEQwlmKw==','45968','Susan Workman','310','1','Sunt eveniet labor','Minim et commodo aut','75','Farmer',1,'9tuFWWEW1LotXcsW//aZni0QPgkoX3UxX1t4BVh3ggkJNfxXL1iRrzsle6OmCURDgSwSEO+vTdIBclYaL246ZQ==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (22,'Leah','Florence Stark','Dickerson','3','2026-05-12','','1','958','Velit nobis sit eni','Nesciunt ut esse o','Excepturi impedit v','Quia culpa ratione o','Quis molestias ipsum','gevecyv','PjYo/fiFmzNpymM8EHwmSkGOKPk3W8E4BxXWDm27UcxKA3fOesj5QoJ7iuy3v5QidFCcyLKHSfF1Y4TE6VcCIg==','','','','','','','','Personnel',0,'a985UGOxO7DXL6uC9OA2zqhs1OUNv0E039FfmaoT7HhHWdsCqZjqlTve0NXreonCDS1TdjApL0ybB0WrjNN1ZEWCv0hZQY6bEx2TgXJbU6k=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (23,'Trevor','Alea Conley','Quinn','1','1905-01-25','','1','693','Sunt voluptatum rem ','Aut error quia conse','Mollitia earum maxim','Quae qui dolore nesc','Dolor nulla qui in e','jukykot','Br9H9P6dWFGS2w9sI+E5hNc6H14am6X3DiQrW71CcxETTWfyB28WSN9KzfV3C4H4ahGO9X6dyyL2/t3bY7N0qA==','','','','','','','','Personnel',0,'JuYH/I9qtfc5FitVZZWh5e/CHVpVU/qcZvCCSEMtgCpSirnEm3mvqhbBLaW6RlsmSoLQ1YxnPzi28VUJkiGsejLZ8KO7utVuzodXNj12wt4=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (24,'Zahir','Hayfa Deleon','Dennis','2','1931-02-24','','2','715','Quia aliquam itaque ','Quia dolor doloremqu','In commodi itaque vo','Assumenda officia es','Et hic veniam labor','miwini','NOqnDcVFt9xTRQsyhH4cuJb/fUiz9x0MILaa+eeq0tqciPICL1DcRj/9DBZSmCDUVzgposEWCQFMzjToEnREsQ==','','','','','','','','Personnel',0,'eIO3BGZs/oMSSsKrpdDmpicdSQoeHjmbgRche/oUn25HX0YCpHtp3nbTqjn8Fs/clQGfosnFj42or6BH7i9nAituPJ2Z+FzjguVGUuPeL6g=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (25,'Hadley','Maile Fletcher','Fry','2','1991-09-17','','2','560','Nostrud accusantium ','Sapiente assumenda s','Non quas optio accu','Ad dolor voluptas nu','Aut commodi quia sit','soqokowi','QGXwhSZODRFE9aSE4tSbn4xjuQ6kX3NcwUL5veKym1764xW2VBT7lAprpox6UPhjtbzcAadibuY8CT2aO8mDrA==','','','','','','','','Personnel',0,'puo42nic5/GSXfACljP9JYsVqq1MVHTL/2yXGCmua1c8waMSzFupsSTJzNWYh++mVyqhxrm824omyyKxCW1Vfym59D2xhG5BPNptsL5B4xU=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (26,'Demetria','Willa Patterson','Bryant','1','2040-08-01','','1','231','Voluptatem nisi dol','Consequat Esse Nam','Magna ut minim lorem','Error minima nihil v','Voluptate reprehende','gunowakap','Bmw+l1YCirvy8rPqCCgQt0ciUZwGEQCYXQLFWnLUKXbQrK365xTTplu4yx4L4qzr2H66PjTV4HpOzRTVrrznNw==','','','','','','','','Personnel',0,'cnDL2tpd34PZ+Cbmxih2mT+XWlNbr7SV6YbQl1czKV/m9lzvaeSq7Ny94LHZ9K4YKxIh/wR1cnF1Ym2NPGB1MZwSebxgABMtE2G37D08T34=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (27,'Kirsten','Naomi Morrow','Miranda','1','1937-05-06','','2','896','Consequuntur dolorem','Et dolorum voluptate','Quasi facere eiusmod','Magna dolorum consec','Porro ratione velit ','denoqyrula','YlwgX5HDsYdFd6R03a5Pl65hPzmvOnZkGpYHPwj/kryodaJ7Ad/1VkYdXs9rdbkhzud4m3q0k2ndKJEHLwdpBQ==','','','','','','','','Personnel',0,'hI5UnUtWA0B5KoqxodWC3y4ofEyOCH14osVykhfSmLQgmo+rvfX7kxOHapRnC5kKJJHes4nab+GU6KmAN9QXVeRPEg9jE5vVXLSImblX/3Q=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (28,'George','Nicole Good','Patton','1','1949-02-27','','2','840','Nesciunt dolore Nam','Beatae beatae nihil ','Assumenda praesentiu','Exercitation non dol','Nihil sit sit nesci','tasyveb','4Bp1putkNWQANZbvE9Q3zHzqcoWilEzlaz7ND92YuMdP9mE67O0FphoxI1n89P8N88IDlwaYIs3P/7u03x4/qg==','','','','','','','','Personnel',0,'t6pzso9+8yyIo6+AqYTo1YlmrNtv8lEeRmkfuJLCAuO5y+ZVHj37Id7EVOElPxZCxsdHsKd6dofHsUt6cN4EBA4nWE+ZuBw2B4tYli9qrQ4=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (29,'Alice','Wynne Rose','Mckenzie','3','2008-06-29','','2','134','Sapiente qui nostrud','Velit cillum magni a','Dolorem ad voluptate','Non quod sit molest','Odio sint dolorem om','mopaked','5+i2qsC/bDzPcLODgY8VYD38Eh/Yug0iWB9C2+bsIeXKrsm4QxtMGKMWiKKgDqhOD2EkDhzRyC0w42n++ro1oQ==','','','','','','','','Personnel',0,'grKE7m/8uP+JbUMCDMGHFaQqGrxX4Q+m9MgBNvFNpA50DTXDGR5vMUzpwTtvQ+tulFBRzaeLT4YW2+1hw8kQVg==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (30,'Olivia','Penelope Prince','Daugherty','1','2048-04-24','','1','450','Asperiores vitae nem','Neque doloremque est','Exercitationem verit','Animi alias beatae ','Voluptatem sunt min','taquxahe','ei/pwsF/HSe/eNkp9oC+vy5ia4fLJlrWlJ4OI84APCWQ/uKxxPxUfKdKzUPljB7Fozrdnd/CWvtK9vlsKq7qMQ==','','','','','','','','Personnel',0,'+TtsLGeAQdfHJEKV5S5Sz+U9MayrodxzkQL4TEhawjK3sWQJcGhWPs/LLCdb0HiO2Z6nJTyzuYn+ZAd7+R2vUg==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (31,'Wanda','Indigo Lewis','Camacho','2','1937-05-06','','2','372','Sunt ex nisi fugiat','Totam qui doloremque','Velit obcaecati vol','Illo dolor id omnis','Culpa velit invento','symow','/UT7IxhlDyhGLP+EoVEjMTT1uLvlWhqku8Pe83lGA7DInGJJyAmadKkMdUFNNIenTfYK6BTR+Yx82GMEAQDZFg==','','','','','','','','Personnel',0,'whxK29k220prrHL88fb+C6Z1WMEyLOB4np/NcJd6hKVdl+q3HVaX/apRzjG6rBtwN9jrf9NG1B5gRrXf/wka1g==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (32,'Divine','Obatay','Ybañez ','1','1998-01-13','3','2','09551458112','SDA','Zamboanga City','kaliwa','BoGO','Pagadian','vine44','dPCBGi8dcEOk5zHb47EB9SFte527PszIXmshSXJ4BEkfOE2gW9PGHQKyjtki29gna2z7dlsSjIlz9eNJGtH83Q==','7004','Juana','09174847125','1','Bogo','Pagadian','5000','Farmer',1,'j1RyicPneJ3GKXglyXjuMlflgH0/gilp6DzAHzLZvEY8yhNKVJJgO4TB2XBmOBEC2zKEZKaVKYipB8bv9pUPQA==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (33,'Igor','Avye Harding','Kane','2','1975-08-14','1','1','360','Iusto dolorum except','Molestiae quaerat vo','Laborum excepteur no','Sit blanditiis totam','Irure officia quisqu','france123','UwnuHTI7QvTgT2p0NmqqNCT6NKUa4sHMDAY1XxgeY2emK0S2pXQu9JlzdDG7c8e/POoYV+LtcsqsaqsNQ684Vg==','25663','France Rebollos','454','1','Veritatis voluptatem','Id sunt aut unde acc','54','Farmer',1,'A9v2U2J42xNV7C5F6X6MgVHJoqcXovrc/RMlDEEBhbmTsxAUfaqFW9uPSG98rxwUD4YRVgklbWWeS4GHOj+Tuw==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (34,'MacKensie','Sage Rollins','Mejia','1','1959-10-15','','1','914','Eius omnis animi ac','Quidem in autem offi','Autem iusto eum cons','Ipsam commodo conseq','Quibusdam quisquam l','tykyd','43UkFTolF44CaozrPRfj5eVdewcukoIwCaQjIVZnbuzZN1u8MsaFnPXU6oRFeAy9IoTzqOsgokmsG5ikHy6MDg==','','','','','','','','Personnel',0,'NiR9vLTFlCzjnKophGF9OOhzRScXUvzV8FXDaSii8h09XKXsUNn11+UvOWWctQhj+MazW2LIm3AK9BBzYZw6GD/kso+6xIdsjZDXSjuZzkw=','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (35,'Perry','Kenyon Dillon','Buck','2','1952-10-17','','1','358','Assumenda eiusmod se','Aut nesciunt laboru','Ipsam quis fugit la','Vel esse ipsum modi ','Libero ipsum tempor','byxogizuc','InYleJs7LRxkHEtWVk2M/QQDT8VkbCQ1sBbqzO4Fslt3x8qdo5HZcO3F45xWvT0PHoYLrdGNasbNxt+vnKglLQ==','','','','','','','','Personnel',1,'vdqzh8GneXKz0qT+Z7zfUcSqaZWklpLH2A+e3s2pQbushhsITbrMKgszlxtqH+IFan/gaN2iws2gSvJLL03c9w==','');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`secret_phrase`,`image`) values (36,'Kyle','Dorothy James','Maxwell','1','1992-07-31','','1','913','Repudiandae ea neces','Temporibus deserunt ','Culpa excepturi non ','Ut et in mollit nece','Eos sit ut animi ','gedijila','G9BcRIwg2M+8qBK1LClQRxK6q+wEUk4+Mb9GthDapNYvo+pVoK4fU/y2bSSWLDYDontMSVEOEaNQcjLnRwT+5g==','','','','','','','','Personnel',1,'pPnnjXadEWRewQNrAVo8hXdIfRUo4Ujp53e3arigATypQSexc6fENW/iPTiSaJCwxNyPA5Uq90EmxCLV0ut6v+yWEEnPY2/hFuR1rKnNqSQ=','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
