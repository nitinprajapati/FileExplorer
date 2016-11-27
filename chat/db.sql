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
  `user_id` int(10) NOT NULL,
  `message` text,
  `friend_id` int(10) DEFAULT NULL,
  `chat_time` timestamp NULL DEFAULT NULL,
  `message_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `chat_info` */

insert  into `chat_info`(`chat_id`,`user_id`,`message`,`friend_id`,`chat_time`,`message_by`) values (1,1,'bthrjm',2,'2016-11-26 22:52:01',1),(2,2,'fdhbhfjng',1,'2016-11-26 22:55:10',2),(3,3,'abc',2,'2016-11-26 23:19:50',3),(4,3,'wfcgvet',2,'2016-11-26 23:20:45',3),(5,3,'etbhehevbyjbnyki',2,'2016-11-26 23:20:54',3),(6,3,'test',1,'2016-11-26 23:21:19',3),(7,2,'%20dhdfnn%20fk,',1,'2016-11-26 23:26:22',2),(8,2,'j%20fkglxg3w456498t708970-8690-680-980-708',1,'2016-11-26 23:27:16',2),(9,2,'s%20gshry',1,'2016-11-26 23:28:20',2),(10,2,'%20htd%20jydtk',1,'2016-11-26 23:29:35',2),(11,1,'/lkj;o;;',4,'2016-11-27 14:53:51',1),(12,2,'Hi%20test%20user',1,'2016-11-27 15:39:58',2),(13,1,'From%20test%20user%20to%20test%20user1',2,'2016-11-27 16:26:05',1),(14,1,'from%20test%20user%20to%20test%20user%201',2,'2016-11-27 16:27:50',1),(15,1,'brhrwsnjyegdh',2,'2016-11-27 16:28:29',1),(16,1,'fwregtewhy',2,'2016-11-27 16:30:41',1),(17,2,'567',1,'2016-11-27 16:30:55',2),(18,1,'yes%20%20have%20done',2,'2016-11-27 16:33:54',1),(19,1,'test4',4,'2016-11-27 16:34:07',1),(20,1,'test%20hello%0A',2,'2016-11-27 16:45:22',1),(21,1,'hello%0A',2,'2016-11-27 16:45:48',1),(22,2,'hi%0A',1,'2016-11-27 16:46:04',2),(23,2,'r%20u%20there',1,'2016-11-27 16:46:08',2),(24,1,'yesg%0A',2,'2016-11-27 16:46:14',1),(25,2,'It%20looks%20fine?',1,'2016-11-27 16:46:24',2),(26,1,'aaya%20koi%20msg%0A',2,'2016-11-27 16:46:26',1),(27,2,'Yes',1,'2016-11-27 16:46:32',2),(28,2,'Its%20not%20real%20time',1,'2016-11-27 16:46:47',2),(29,2,'123',1,'2016-11-27 17:13:31',2),(30,1,'1234',2,'2016-11-27 17:14:41',1),(31,2,'123456',1,'2016-11-27 17:14:56',2),(32,1,'1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A1232548961e457d60i67552345u156f4dw4571d65w344575683e%0A',2,'2016-11-27 17:15:19',1);

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

insert  into `logininfo`(`login_id`,`username`,`password`,`last_login`,`user_id`) values (1,'test@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-27 17:13:51',1),(2,'test1@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-27 16:45:53',2),(3,'test3@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-26 23:20:24',3),(4,'Test4@gmail.com','0192023a7bbd73250516f069df18b500','2016-11-26 17:49:35',4);

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
