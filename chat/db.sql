/*
SQLyog Community Edition- MySQL GUI v6.15
MySQL - 5.6.17 : Database - chatapplication
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `chatapplication`;

USE `chatapplication`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `chat_info` */

DROP TABLE IF EXISTS `chat_info`;

CREATE TABLE `chat_info` (
  `chat_id` int(10) NOT NULL AUTO_INCREMENT,
  `useri_id` int(10) NOT NULL,
  `message` text,
  `friend_id` int(10) DEFAULT NULL,
  `chat_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `chat_info` */

/*Table structure for table `logininfo` */

DROP TABLE IF EXISTS `logininfo`;

CREATE TABLE `logininfo` (
  `login_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `last_login` timestamp NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `logininfo` */

insert  into `logininfo`(`login_id`,`username`,`password`,`last_login`,`user_id`) values (1,'test@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-26 17:56:26',1),(2,'test1@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-26 16:26:16',2),(3,'test3@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-26 17:29:13',3),(4,'Test4@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-26 17:49:35',4);

/*Table structure for table `userinfo` */

DROP TABLE IF EXISTS `userinfo`;

CREATE TABLE `userinfo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `userinfo` */

insert  into `userinfo`(`id`,`f_name`,`l_name`,`email`,`password`) values (1,'test','one','test@gmail.com','0192023a7bbd73250516f069df18b500'),(2,'test','two','test1@gmail.com','0192023a7bbd73250516f069df18b500'),(3,'Test','Two','test3@gmail.com','0192023a7bbd73250516f069df18b500'),(4,'test','four','Test4@gmail.com','0192023a7bbd73250516f069df18b500');

/*Trigger structure for table `userinfo` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_login_info` */$$

/*!50003 CREATE TRIGGER `update_login_info` AFTER INSERT ON `userinfo` FOR EACH ROW insert into logininfo (username, password, user_id, last_login) values (new.email, new.password, new.id, now()) */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
