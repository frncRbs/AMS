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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`crop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `crops` */

insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (2,NULL,'Mustasa seed','',1,'2023-03-28 07:37:30');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (3,NULL,'Pechay seed','',1,'2023-04-10 21:23:27');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (11,NULL,'Malunggay seed',NULL,1,'2023-04-04 15:18:25');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (23,NULL,'Calabasa seed',NULL,0,'2023-04-05 15:18:21');
insert  into `crops`(`crop_id`,`crop_type`,`crop_name`,`crop_description`,`is_available`,`date_created`) values (45,NULL,'Alugbati seed',NULL,1,'2023-04-10 00:49:11');

/*Table structure for table `home_content` */

CREATE TABLE `home_content` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `content11` text NOT NULL,
  `content12` text NOT NULL,
  `content21` text NOT NULL,
  `content22` text NOT NULL,
  `content31` text NOT NULL,
  `content32` text NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `home_content` */

insert  into `home_content`(`id`,`content11`,`content12`,`content21`,`content22`,`content31`,`content32`,`date_created`) values (3,'Test First Slide Up Dharma','Test First Slide Down','Test Second Slide Up','Test Second Slide Down','Test Third Slide Up','Test Third Slide Down','2023-03-21 22:07:37');

/*Table structure for table `home_imgs` */

CREATE TABLE `home_imgs` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `home_imgs` */

insert  into `home_imgs`(`id`,`image1`,`image2`,`image3`) values (7,'ff82bd5aa835f99508c6bccc5d9c42d465d28f1f686874f1191de92c6dd6133881c6178eb95418ae8a886498e81c61a2agriBack.jpg','ff82bd5aa835f99508c6bccc5d9c42d465d28f1f686874f1191de92c6dd6133881c6178eb95418ae8a886498e81c61a2agriBack1.jpg','ff82bd5aa835f99508c6bccc5d9c42d465d28f1f686874f1191de92c6dd6133881c6178eb95418ae8a886498e81c61a2agriBack2.jpg');

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
  `declination_message` text DEFAULT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_cancelled` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`request_id`),
  KEY `user_id` (`user_id`),
  KEY `crop_id` (`crop_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `requests_registry_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `requests_registry_ibfk_2` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`crop_id`),
  CONSTRAINT `requests_registry_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `requests_registry` */

insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (64,'Service',NULL,59,NULL,2,0,'Yes please',NULL,'2023-04-11 02:24:40',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (65,'Crop','12',59,11,NULL,0,NULL,'wala stock boss','2023-04-11 01:28:18',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (66,'Service',NULL,59,NULL,6,0,'Test','Walay kinsay mag test sir sorry','2023-04-11 01:28:10',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (67,'Crop','23',59,2,NULL,0,NULL,'Wala nay stock bossing','2023-04-11 01:28:16',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (68,'Crop','12',62,11,NULL,0,NULL,'Sorry out of stock!','2023-04-11 01:40:38',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (69,'Service',NULL,62,NULL,2,0,'Need assistance bai',NULL,'2023-04-11 01:41:22',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (70,'Service',NULL,62,NULL,2,0,'Need assistance bai',NULL,'2023-04-11 01:28:34',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (71,'Crop','12',62,23,NULL,0,NULL,NULL,'2023-04-11 01:28:35',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (72,'Crop','69',62,2,NULL,0,NULL,NULL,'2023-04-11 02:13:24',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (73,'Service',NULL,62,NULL,2,0,'Test TEST',NULL,'2023-04-11 01:28:35',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (74,'Crop','12',62,11,NULL,0,NULL,NULL,'2023-04-11 01:28:35',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (75,'Crop','12',62,11,NULL,0,NULL,NULL,'2023-04-11 02:24:31',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (76,'Service',NULL,62,NULL,23,0,'Ambot',NULL,'2023-04-11 01:28:37',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (77,'Crop','2',62,45,NULL,0,NULL,NULL,'2023-04-11 02:14:09',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (78,'Crop','12',62,45,NULL,0,NULL,NULL,'2023-04-11 02:22:53',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (79,'Service',NULL,62,NULL,23,0,'Hey',NULL,'2023-04-11 02:23:16',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (80,'Crop','2',70,45,NULL,0,NULL,NULL,'2023-04-11 02:28:43',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (81,'Crop','12',70,2,NULL,0,NULL,NULL,'2023-04-11 02:32:43',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (82,'Service',NULL,70,NULL,3,1,'test',NULL,'2023-04-11 03:26:14',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (83,'Crop','12',72,45,NULL,0,NULL,NULL,'2023-04-11 04:35:54',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (84,'Service',NULL,72,NULL,23,1,'Yes',NULL,'2023-04-11 04:32:07',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (85,'Crop','2',72,45,NULL,1,NULL,NULL,'2023-04-11 05:19:36',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (86,'Service',NULL,72,NULL,23,2,'12','','2023-04-11 05:28:40',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (87,'Service',NULL,72,NULL,3,2,'Test','','2023-04-11 05:32:40',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (88,'Service',NULL,72,NULL,23,2,'test','','2023-04-11 05:35:59',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (89,'Crop','12',72,45,NULL,0,NULL,NULL,'2023-04-11 05:37:03',1);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (90,'Crop','2',72,2,NULL,2,NULL,'','2023-04-11 05:38:47',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (91,'Service',NULL,72,NULL,6,2,'test','','2023-04-11 05:42:01',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (92,'Service',NULL,72,NULL,6,2,'Test','','2023-04-11 05:46:00',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (93,'Crop','69',72,45,NULL,2,NULL,'','2023-04-11 05:56:03',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (94,'Crop','69',72,45,NULL,0,NULL,NULL,'2023-04-11 05:58:15',0);
insert  into `requests_registry`(`request_id`,`request_type`,`crops_kilo`,`user_id`,`crop_id`,`service_id`,`request_status`,`service_remarks`,`declination_message`,`date_requested`,`is_cancelled`) values (95,'Service',NULL,72,NULL,23,2,'69 na pod','France walay tuli','2023-04-11 06:03:56',0);

/*Table structure for table `services` */

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(255) DEFAULT NULL,
  `service_name` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `services` */

insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (2,NULL,'Technical Assistance',0,'2023-04-10 21:26:49');
insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (3,NULL,'Financial Assistance',1,'2023-04-10 00:49:36');
insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (6,NULL,'Soil Sampling',1,'2023-04-10 00:49:30');
insert  into `services`(`service_id`,`service_type`,`service_name`,`is_available`,`date_created`) values (23,NULL,'Pest Exterminator',1,'2023-04-10 00:49:25');

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
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `secret_phrase` text NOT NULL,
  `image` text DEFAULT 'admin.jpg',
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (58,'France','Perez','Rebollos','2','1994-09-21','2','1','09661573159','Roman Alcoholic','Zamboanga City','Zamboanga Peninsula','Guiwan','Zamboanga City','frncrebollos@gmail.com','f+vFxZQt/KCAtQRHte7UX/uT5c2SLXr0yKNSvyu1+zB6SEd0lISPAD9xaxTXPTF28ie2jqLIQeTvKr8ojcRbag==','94698','Fatima Rebollos','09661573159','2','Proident eum volupt','Voluptate corrupti ','63','Admin',1,1,'y4gXbS+zDp83DLfyZuhpyGvzwR/YdpuIme3VSN7+CvfYjtC88iV5RXhi566AGEaFJWPFc+ZJplD8mMwfnp3jiw==','admin.jpg','2023-04-11 02:42:39');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (59,'freddy','Antoine','Canser','3','1962-11-28','2','1','09661573159','Cum molestias et vol','Aute eum magna quis ','Ex nulla blanditiis ','Quis provident sed ','Occaecat adipisicing','freddy434@gmail.com','cJag9W54aGnuCfGZygRe5lazRhZ+b3Y6KKpCRtUv9pDs3ZhhWjUUGMGVViwZ7dMp2GIvN+YsrF4G7y66J8DA4g==','76804','Kim Rowe','09661573159','2','Vero molestias volup','Asperiores omnis min','27','Farmer',1,1,'upkaAkkqoweEpnx/Jya86AajzvGbCsoHwja2QQdaLlLq52M9naRALpM9Uj3QYJ/89Py2Hpf0A95n+ZdueOTnHQ==','farmer.jpg','2023-04-11 04:50:07');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (60,'Renee','Colby Alexander','Rivers','1','2034-01-10','3','2','09661573158','Reprehenderit ipsum','Nulla quam dolores e','Cumque voluptas dele','Sit eos nesciunt n','Magni necessitatibus','gixymyk@gmail.com','UlXH/djVZLQH07cLYH/C5YdKAJjIlcg8Pei+NP+20ywuMVX5hjrOO/A1daRrnbq2EqKeRqGxVfKA//1I5bNZag==','56498','Ariel Rice','09661573158','2','In quas quisquam neq','Beatae consequuntur ','6','Farmer',1,1,'zcW3pV5kP23WhwITMTEV4DdTWfslHr5Jeo9XXMxxR7Td7FH3HsqrpVCdx/+Y3+yTYzTGsxpCM1l0hyiDXqvlDw==','farmer.jpg','2023-04-10 01:30:14');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (61,'Lucy','Rose Hutchinson','Green','3','1982-09-13','3','2','09661573159','Cum in error neque s','Consectetur non dol','Quia consectetur non','Odio perspiciatis e','Ea animi quae volup','puzosa@gmail.com','4/YqTLlMBGaSeemDZe2hJZp6AItlZ50sxCWQ9sAAjszeGJYGGBV1HmA5Qv9cJUS6fwQfzdrMDBovIDlSpQ5y4Q==','95738','Kirby Juarez','09661573159','3','Commodo distinctio ','Quaerat sunt aliqui','47','Farmer',1,1,'IWXytPuhJRpzlr+Jsu4/b21Cw9pRl2grlOETQR57YtoQaDe8agg8No3WgG+pWOXywh7+ESZXmHPdV3I+5Tqalw==','farmer.jpg','2023-04-10 20:59:37');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (62,'Abbigail','Aircon','Quintanas','1','2000-01-21','2','2','09661573159','Roman Alcoholic','March 19, 1999','Sed nulla sequi quas','Adipisicing numquam ','Sed modi possimus o','beetoot.a@gmail.com','cNHGtIvQVlVmuL+6eQJPY7ai5DiB+KxhhWvs3ktppU06uV+5GrCcUQsmTWEImGU3NpOShGcd7ar3Ps2lcxakOg==','38375','Orla Bonner','09661573159','2','Ex optio deserunt d','Laborum doloremque c','34','Farmer',1,1,'88Zcl7zibx8USdSfWWi28DFZniPqjSBL4Hr0y3t1F9fXES8f0mqXpey4mEgdKFKQ66NBhB5c3MR+IGp1rNcZzg==','admin.jpg','2023-04-11 05:12:47');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (63,'Nathan','Christen Estrada','Simon','1','2050-06-23','1','1','09661573158','Laudantium enim eli','Voluptas voluptatum ','Rerum corrupti ipsa','Harum explicabo Non','Doloremque nesciunt','zozagyg@gmail.com','tiNQ4BdZhKzP0RnKrfP4KTt4dznu4AgKr8pHHizxCoPFkCVz8VIJ6aYKDGjnh4gRhEEcnoTh5oajKM9MEOjhKA==','66444','Georgia Avila','09661573158','2','Harum aut enim vero ','Debitis corrupti pr','11','Farmer',1,1,'3EPFzptdkKvz/DsIY0RQoOxpFRKHHbbB0/kNqS5zh0h13Xf6DQ4nwM+4gJ/U1zD89gxMdfVI2qAjQNMuma3keg==','admin.jpg','2023-04-10 20:50:52');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (64,'Ginger','Derek Mckinney','Lawrence','2','1961-12-08','1','2','09661583159','Dolorem debitis omni','Ea sint soluta neque','Distinctio Ea adipi','Voluptas debitis in ','Nihil omnis ipsum la','france123@gmail.com','X3jwiJIDXfnmImHAPNXnbBZYHMN8jM0MHFAEKSWDzdkprOlFhxXnayfsASfRunrgJHGylt+VpHNNjtI9HOEGSw==','14129','Aphrodite Richardson','09661583159','2','Guiwan','Zamboanga City','21','Farmer',1,1,'zrWrHigAUnkKfbR9g8GeLvq7e1eG3NWfmLGj93IpDi6zqOBwu/lLSJrwzabtw/v4jdAyfkpwCm3dALpvFGxw9Q==','admin.jpg','2023-04-10 20:50:54');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (65,'Abbot','Candace Townsend','Dillon','3','1901-01-17','1','1','09661573157','Et velit sit non nu','Fugiat qui facilis ','Velit magna et et te','Facere provident qu','Dolorum repudiandae ','nubik123@gmail.com','jwLawAde476Q0p7uTdJ7CFLK2P+odSC79mOm2i/OyLcYwTf7J8GYH5VdoAZNmpbOB/iqvP5w/aYwWKzVI/bK0g==','55223','Nomlanga Mathews','09661573157','2','Qui autem deserunt e','Commodo repudiandae ','59','Farmer',1,0,'YYMj/Qbz3xzlJzVJrTcOXMuxmAETWa0z2jLo08pY6Y4GzSxBgGcALv55LdqzE3NmcwstrDM9rppi+pGLFt/dGg==','admin.jpg','2023-04-10 21:01:35');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (66,'Shana','Ifeoma Potter','Dillon','1','2027-01-14','3','2','09661573159','Id consequatur digni','Ea enim vel placeat','Qui fuga Sit deleni','Ut laboriosam quis ','Natus a ullamco labo','kylefudusi@gmail.com','2B3VRVxblarroX92zPdswR35yWo4K7SRbtwE2XquRKXndKLFKyh3Di+0E08Ph642Rviv+ksD/9wf3RJYGksKgA==','53673','Micah Kelley','09661573159','1','Quas explicabo Cons','Exercitationem aut e','97','Farmer',1,1,'sI5eO6Pm/Cuv7MUZF3LOSu83vXdAirvPvhgKPwRmho/nPLVXgTw5PHXGwQSCBpewx1KRd37K2N1EKWWVA/i2xA==','admin.jpg','2023-04-10 20:51:58');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (67,'Ainsley','Angelica Hardy','Gutierrez','3','2044-03-11','1','1','09661573159','Nisi eum inventore e','Harum eum consequunt','Beatae placeat quis','Voluptatem Porro et','Praesentium dolor ni','rifakuk@gmail.com','nevTE4TC+bidX653vlW3Ln4YcBJBuBJxDgRp8YSogj3m61vn2xfAsnZYPv2QYsX68ySYWaq3gY6By5ElMTz2xw==','95411','Raphael Mcconnell','09661573159','2','Dolor odio saepe pla','Quis consectetur in','8','Farmer',1,1,'TfWtbrCGSXQpIJXG9S+eXrfwgHWdNI5zp2Fm+xVeQ9YOSCnlGRbzZWId1Ka/Oho6kJjU51DfjLozaO32E+bquQ==','admin.jpg','2023-04-10 23:07:06');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (68,'Ignatius','Lacota Vincent','Munoz','1','1930-05-14','','2','09661573195','Ut eiusmod sint accu','Commodi laborum Cil','Incidunt id quia co','Eum vel dolor dolore','Enim quo minima aliq','zowovuxyzy@gmail.com','H2e+CWvpwggEc5W0TuD3yCDxj4s6hlvCnOuv3f5gE3KhHxu/MPVo5Prt3dnX5A1ZTPhUEQOECoj7zfPVtq99gw==','','','','','','','','Personnel',1,1,'4bsUBWLToHdMfJhPU46jnD3nS1Am6GjL9+MLDSZzY8/nbXGVDQQeTCwri9i1lAoS0KNpS/3ycMba1m04Q5ge/A==','admin.jpg','2023-04-11 01:15:32');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (69,'Hanna','Sylvester Blackburn','Hubbard','1','1901-03-02','1','2','09551456678','Ipsum velit duis qui','Deleniti iste quis s','Nihil non autem sint','Quaerat eum ut excep','Voluptatem sed cill','jabuhov@gmail.com','Gam3Um3u3TgCpab7WaVmB9Qp15vauntph5y8epkbTpRpVVtDrg3yoSS7JudPyDVomSu+02Drw7/r67DYYYnDqQ==','14413','Brent Schwartz','09551456678','2','Consequatur enim co','Voluptatibus excepte','43','Farmer',1,1,'ZHNlna6H1FqE+55mqIhJbUtFGZhdDHgHVqN2U6GA8WcahGqQPayhSGtzfWhRkqM9dmi9gOs/IKVfwY2/oj1q9g==','admin.jpg','2023-04-11 01:23:35');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (70,'Zena','Malachi Guthrie','Henson','3','2037-11-27','3','1','09661573159','Cupidatat odit labor','Rerum dolor veniam ','Sunt labore amet es','Duis cupiditate aut ','Adipisci irure sint','qobamemis@gmail.com','9ZQxg6PK5w/2UW1kEIAUgaspwuhAIes1HhoVR+s0tjI59e94t8tsnu4ZCxS1HcryJhGTNgRZxdMk2P9UakImAw==','27819','Anastasia Hancock','09661573159','3','Commodi molestiae do','Expedita aut natus m','15','Farmer',1,1,'t2jEs3qMNJp6L75iENlF0ZWMDAPsmzAhUVuXtzneP4J2pFHwTf3i5a9bKLh2+yEh208oQLgfHCZWeF4e/Qp9+Q==','admin.jpg','2023-04-11 02:28:02');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (71,'Beatrice','Mark Reid','Bright','3','2006-02-28','1','2','09661573159','Maiores nihil quam i','Ea corporis ut volup','Quia hic eius iusto ','Est ullamco ut asper','Aut nihil modi dolor','bertos123@gmail.com','lIt2pFfetT7ZIb/OxfoN7ktTO89dYPGaR/0DlgBiV6xRjxKgdPYStaLy487NhflbsAjxu5Z470ZAwHDyjPIVeQ==','89099','Armando Hodges','09661573159','2','Ipsam sint magna eum','Laudantium blanditi','85','Farmer',1,1,'kji6dSwpjMZlUeG2W8Zi6jgpI/Pp/hYmeZ2xVk0j/xkx3KdAHHlxIu8FsZzlM15UQxeLh12Fbd7m51zJOBVy0Q==','admin.jpg','2023-04-11 03:36:01');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (72,'Dacey','Ethan Bradshaw','Haney','3','2042-11-02','3','2','09661573159','Non anim esse deseru','Ipsam soluta minus o','Id molestias sunt e','Consequatur magnam ','Asperiores dolorum o','gameguardian0072@gmail.com','tXM0IubCF1w964MTd6q+gmhhD53byawXuJOyIjVQFxZPRGnRgAkyxccMbx0ac64d5r2kDwrE+J8MIvj18DQziuq29ANVGofW4eSyWjtZesE=','42659','Harriet Sexton','09661573159','2','Eos qui autem cum pe','Aut sit anim consequ','36','Farmer',1,1,'bRd9XrNL0G0EBIumYjzo50DZ36fxZhFJUPm0UqSO+FVRuOW9WQvpqVkkJXIlDp2zlG7Gp7OExq9Ra/S4fn7tzg==','admin.jpg','2023-04-11 04:30:54');
insert  into `user`(`id`,`first_name`,`middle_name`,`last_name`,`role_service`,`birth_date`,`civil_status`,`sex`,`contact_no`,`religion`,`birth_place`,`address_street`,`address_barangay`,`address_municipality`,`username`,`password`,`address_zip`,`guardian_fname`,`guardian_contact`,`farm_type`,`farm_barangay`,`farm_municipality`,`farm_area`,`role`,`status`,`is_active`,`secret_phrase`,`image`,`date_registered`) values (73,'Aristotle','Alexander Potts','Monroe','2','1999-08-24','3','2','09661573159','Nulla autem laborios','Ipsum tempora sit e','Magnam voluptas ex d','Sequi doloremque fac','Sunt qui doloribus n','abby123@gmail.com','XQxuGJ+vLQK0Oh+E7BlA63sqViP+LDUMGxkYT2WQJzgKP8E6CPD0KcmRkzvfYfAJoL4d7JPO6X60E41XTQ1e6A==','78315','Wynne Jennings','09661573159','1','Ipsam et enim minima','Quam adipisci beatae','49','Farmer',1,1,'lACOtO04APxs8WlKFyMTokNKhedAG/l2Afpz0oBMpIyKvhohjvUN4Y8xMsn/pUj5YBUdz89IOlJ8EaLvDNr/uUKHy+tGHF6lkd5tdzV24i8=','admin.jpg','2023-04-11 04:49:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
