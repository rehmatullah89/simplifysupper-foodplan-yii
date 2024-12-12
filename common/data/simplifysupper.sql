/*
SQLyog Ultimate v10.42 
MySQL - 5.6.12-log : Database - simplifysupper
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`simplifysupper` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `simplifysupper`;

/*Table structure for table `ads` */

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `ad_details` text NOT NULL,
  `url` text NOT NULL,
  `aimg` varchar(255) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `status` enum('Inactive','Active') NOT NULL DEFAULT 'Inactive',
  `cat_id` int(20) NOT NULL,
  `viewed` bigint(20) NOT NULL,
  `clicked` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(20) DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ads` */

/*Table structure for table `ads_categories` */

DROP TABLE IF EXISTS `ads_categories`;

CREATE TABLE `ads_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ad_id` bigint(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_id` (`ad_id`),
  KEY `cat_id` (`cat_id`),
  KEY `cat_id_2` (`cat_id`),
  CONSTRAINT `FK_ads_categories` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ads_categories_cats` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ads_categories` */

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `back_url` text NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_type` enum('Admin','Member') NOT NULL DEFAULT 'Admin',
  `owner` varchar(255) NOT NULL,
  `owner_phone` varchar(30) NOT NULL DEFAULT '',
  `owner_email` varchar(100) NOT NULL DEFAULT '',
  `btype` enum('text','main','lightbox','box') NOT NULL DEFAULT 'box',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `clicks` bigint(20) NOT NULL,
  `views` bigint(20) NOT NULL,
  `clicked` bigint(20) NOT NULL,
  `viewed` bigint(20) NOT NULL,
  `status` enum('Active','Expired','New') NOT NULL DEFAULT 'New',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_by` int(20) DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `FK_banners_members` FOREIGN KEY (`created_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `banners` */

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(20) NOT NULL,
  `status` enum('InActive','Active') NOT NULL DEFAULT 'InActive',
  `meta_keywords` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `created_by_2` (`created_by`),
  CONSTRAINT `FK_articles_members` FOREIGN KEY (`created_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `blog` */

insert  into `blog`(`id`,`title`,`description`,`created_at`,`created_by`,`status`,`meta_keywords`,`meta_title`,`meta_desc`) values (32,'asdf','<p>asdf</p>','2014-05-02 12:47:47',1,'InActive','asdf','asdf','asdf'),(33,'asdf','<p>asdfasdf</p>','2014-05-02 12:47:56',1,'Active','asdf','asdf','asdf'),(34,'sadf','<p>asdfasdfsadfasdf</p>','2014-05-02 12:48:07',1,'Active','asdf','asdf','asdf'),(35,'dfgh','<p>sdfgasdfsa</p>','2014-05-02 12:48:18',1,'Active','dfasdf','asdfasdf','asdf');

/*Table structure for table `blog_category` */

DROP TABLE IF EXISTS `blog_category`;

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `blog_category_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  CONSTRAINT `blog_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

/*Data for the table `blog_category` */

insert  into `blog_category`(`id`,`blog_id`,`cat_id`) values (89,32,1),(90,32,2),(91,32,3);

/*Table structure for table `blog_media` */

DROP TABLE IF EXISTS `blog_media`;

CREATE TABLE `blog_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media` text,
  `blog_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `blog_media_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `blog_media` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL DEFAULT '',
  `cat_desc` text NOT NULL,
  `cat_type` enum('Grocery','Articles','Recipe','Blog','Ingredient') NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(100) NOT NULL,
  `video` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `seo_url` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_desc` text NOT NULL,
  `rating` double NOT NULL,
  `rater` int(11) NOT NULL,
  `viewed` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`cat_name`,`cat_desc`,`cat_type`,`parent`,`photo`,`video`,`status`,`seo_url`,`meta_keyword`,`meta_title`,`meta_desc`,`rating`,`rater`,`viewed`,`created_by`,`created_at`,`modified_at`,`modified_by`) values (1,'Chicken','sadf','Recipe',0,'asdf','','Inactive','sadf','asdf','sadf','sdaf',3,3,3,3,'2014-04-17 11:55:55','2014-04-01 00:00:00',NULL),(2,'Beef','kjh','Recipe',0,'lkj','lkj','Inactive','kjh','jkhk','kjh','kjh',0,0,1,1,'2014-04-22 10:39:14','2014-04-15 00:00:00',NULL),(3,'Dessert','kjh','Recipe',0,'lkj','lkj','Inactive','kjh','jkhk','kjh','kjh',0,0,1,1,'2014-04-22 10:39:36','2014-04-15 00:00:00',NULL),(4,'Fish','kjh','Recipe',0,'lkj','lkj','Inactive','kjh','jkhk','kjh','kjh',0,0,1,1,'2014-04-22 10:39:53','2014-04-15 00:00:00',NULL),(5,'Vegetarian','','Grocery',0,'','','Inactive','','','','',0,0,0,0,'2014-04-25 15:16:34','0000-00-00 00:00:00',NULL),(6,'Fried Chicken','','Recipe',1,'','','Inactive','','','','',0,0,0,0,'2014-04-28 12:11:05','0000-00-00 00:00:00',NULL),(7,'Grilled Chicken','','Recipe',1,'','','Inactive','','','','',0,0,0,0,'2014-04-28 12:22:18','0000-00-00 00:00:00',NULL),(8,'Grilled Beef','','Grocery',2,'','','Inactive','','','','',0,0,0,0,'2014-04-28 12:37:28','0000-00-00 00:00:00',NULL);

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `parent_type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) unsigned DEFAULT NULL,
  `status` enum('New','Approved','Declined') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comments_member` (`modified_by`),
  KEY `FK_comments_articles` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`id`,`title`,`description`,`parent_id`,`parent_type`,`created_at`,`created_by`,`modified_at`,`modified_by`,`status`) values (132,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,0,'Declined'),(133,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'Declined'),(134,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'Declined'),(135,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New'),(136,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New'),(137,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New'),(138,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New'),(139,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'Approved'),(141,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'Approved'),(142,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New'),(143,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New'),(144,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New'),(145,'testcomm','lkjlk',1,'parenty_type','2014-04-09 00:00:00',1,NULL,NULL,'New');

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(16) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `coupon_details` text NOT NULL,
  `url` text NOT NULL,
  `cimg` varchar(255) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `coupon_type` enum('Percentage','Fixed') NOT NULL DEFAULT 'Percentage',
  `discount` double(10,4) NOT NULL,
  `status` enum('Inactive','Active') NOT NULL DEFAULT 'Inactive',
  `viewed` bigint(20) NOT NULL,
  `clicked` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(20) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `FK_coupons_members` FOREIGN KEY (`created_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `coupons` */

/*Table structure for table `coupons_categories` */

DROP TABLE IF EXISTS `coupons_categories`;

CREATE TABLE `coupons_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` bigint(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_id` (`coupon_id`,`cat_id`),
  KEY `FK_coupons_cats` (`cat_id`),
  CONSTRAINT `FK_coupons_categories` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_coupons_cats` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `coupons_categories` */

/*Table structure for table `friends` */

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `request_date` datetime NOT NULL,
  `requested_by` int(20) NOT NULL,
  `requested_to` bigint(20) NOT NULL,
  `status` enum('Pending','Accepted','Declined') NOT NULL DEFAULT 'Pending',
  `response_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `requested_by` (`requested_by`),
  KEY `requested_by_2` (`requested_by`),
  CONSTRAINT `FK_friends_members` FOREIGN KEY (`requested_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `friends` */

/*Table structure for table `ingredients` */

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(50) NOT NULL,
  `ingredient` varchar(255) NOT NULL DEFAULT '',
  `pantry` tinyint(1) NOT NULL DEFAULT '0',
  `catid` int(20) NOT NULL DEFAULT '0',
  `measure_unit` enum('g','mg','ug','oz','lb') NOT NULL DEFAULT 'g',
  `ingweight` double(10,2) NOT NULL,
  `weight` float(10,2) NOT NULL,
  `water` float(10,2) NOT NULL,
  `kcal` double(12,2) NOT NULL DEFAULT '0.00',
  `protein` float(10,2) NOT NULL,
  `fat` float(10,2) NOT NULL,
  `sat_fat` float(10,2) NOT NULL,
  `mono_unsat_fat` float(10,2) NOT NULL,
  `poly_unsat_fat` float(10,2) NOT NULL,
  `cholesterol` float(10,2) NOT NULL,
  `carbohydrate` float(10,2) NOT NULL,
  `dietry_fiber` float(10,2) NOT NULL,
  `calcium` double(10,2) NOT NULL,
  `iron` double(10,2) NOT NULL,
  `potassium` bigint(20) NOT NULL,
  `sodium` bigint(20) NOT NULL,
  `suger` double(10,2) NOT NULL,
  `vit_a_iu` double(10,3) NOT NULL,
  `vit_a_re` double(10,3) NOT NULL,
  `thiamin` float(10,3) NOT NULL,
  `flavin` float(10,3) NOT NULL,
  `niacin` float(10,3) NOT NULL,
  `vit_c` double(10,3) NOT NULL,
  `vit_e` double(10,3) NOT NULL,
  `refuse_pct` double(10,2) NOT NULL,
  `updated_by` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `catid_2` (`catid`),
  CONSTRAINT `FK_ingredients_cats` FOREIGN KEY (`catid`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ingredients` */

insert  into `ingredients`(`id`,`barcode`,`ingredient`,`pantry`,`catid`,`measure_unit`,`ingweight`,`weight`,`water`,`kcal`,`protein`,`fat`,`sat_fat`,`mono_unsat_fat`,`poly_unsat_fat`,`cholesterol`,`carbohydrate`,`dietry_fiber`,`calcium`,`iron`,`potassium`,`sodium`,`suger`,`vit_a_iu`,`vit_a_re`,`thiamin`,`flavin`,`niacin`,`vit_c`,`vit_e`,`refuse_pct`,`updated_by`,`created_at`,`created_by`,`updated_at`) values (1,'barcod','ingerelkjl',0,1,'g',22.00,2.00,2.00,0.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2.00,2,2,2.00,2.000,2.000,2.000,2.000,22.000,2.000,2.000,2.00,NULL,'2014-04-15 19:00:00',NULL,NULL);

/*Table structure for table `measurements` */

DROP TABLE IF EXISTS `measurements`;

CREATE TABLE `measurements` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `measurement` varchar(100) NOT NULL DEFAULT '',
  `weight` float(10,2) NOT NULL,
  `unit` enum('g','mg','ug','oz','lb') NOT NULL DEFAULT 'g',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `measurements` */

insert  into `measurements`(`id`,`measurement`,`weight`,`unit`) values (1,'gm',3.00,'mg');

/*Table structure for table `member_calendar` */

DROP TABLE IF EXISTS `member_calendar`;

CREATE TABLE `member_calendar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `recipeid` int(11) NOT NULL,
  `servings` bigint(20) NOT NULL,
  `dateadded` date NOT NULL,
  `memberid` int(20) NOT NULL,
  `sidedishid` bigint(20) NOT NULL,
  `sidedish` enum('Yes','No') NOT NULL DEFAULT 'No',
  `mc_type` enum('Breakfast','Lunch','Dinner','Brunch') NOT NULL DEFAULT 'Dinner',
  PRIMARY KEY (`id`),
  KEY `recipeid` (`recipeid`),
  KEY `memberid` (`memberid`),
  KEY `recipeid_2` (`recipeid`),
  CONSTRAINT `FK_member_calendar` FOREIGN KEY (`memberid`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `member_calendar_ibfk_1` FOREIGN KEY (`recipeid`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `member_calendar` */

/*Table structure for table `memberingredients` */

DROP TABLE IF EXISTS `memberingredients`;

CREATE TABLE `memberingredients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ingredient_id` bigint(20) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `measurement_id` int(20) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `memberid` int(20) NOT NULL,
  `ingdesc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `memberid` (`memberid`),
  KEY `cat_id` (`cat_id`),
  KEY `ingredient_id` (`ingredient_id`),
  KEY `FK_memberingredients_measures` (`measurement_id`),
  CONSTRAINT `FK_memberingredients_cats` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_memberingredients_ing` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_memberingredients_measures` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_member_ingredients` FOREIGN KEY (`memberid`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `memberingredients` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `memberid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL,
  `password` varchar(66) NOT NULL,
  `about` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL DEFAULT 'United States',
  `phone` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','Prefer not to mention') NOT NULL DEFAULT 'Prefer not to mention',
  `status` enum('Active','New','Blocked','Inactive') NOT NULL DEFAULT 'Inactive',
  `signed_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usertype` enum('member','admin') NOT NULL,
  `recipes` bigint(20) NOT NULL,
  `articles` bigint(20) NOT NULL,
  `photos` bigint(20) NOT NULL,
  `videos` bigint(20) NOT NULL,
  `testimonials` bigint(20) NOT NULL,
  `friends` int(11) NOT NULL,
  `viewed` bigint(20) NOT NULL,
  `spclicks` bigint(20) NOT NULL,
  `spviews` bigint(20) NOT NULL,
  `howto` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `meta_keywords` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  PRIMARY KEY (`memberid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`memberid`,`firstname`,`lastname`,`email`,`username`,`password`,`about`,`photo`,`address`,`city`,`state`,`zip`,`country`,`phone`,`dob`,`age`,`gender`,`status`,`signed_up`,`usertype`,`recipes`,`articles`,`photos`,`videos`,`testimonials`,`friends`,`viewed`,`spclicks`,`spviews`,`howto`,`meta_keywords`,`meta_title`,`meta_desc`) values (1,'fahad','akram','fahad@yahoo.com','fahad','e10adc3949ba59abbe56e057f20f883e','asdf','sadf','asdf','sadf','asdf','2332','United States','2342332','2014-04-01',33,'Prefer not to mention','Active','2014-04-17 12:18:55','admin',0,0,0,0,0,0,0,0,0,'Yes','','','');

/*Table structure for table `myfavorites` */

DROP TABLE IF EXISTS `myfavorites`;

CREATE TABLE `myfavorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipeid` int(11) NOT NULL DEFAULT '0',
  `fav_type` enum('Article','Recipe') NOT NULL DEFAULT 'Recipe',
  `memberid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `memberid` (`memberid`),
  KEY `recipeid` (`recipeid`),
  CONSTRAINT `FK_myfavorites_members` FOREIGN KEY (`memberid`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `myfavorites_ibfk_1` FOREIGN KEY (`recipeid`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `myfavorites` */

/*Table structure for table `recipe_categories` */

DROP TABLE IF EXISTS `recipe_categories`;

CREATE TABLE `recipe_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`,`cat_id`),
  KEY `FK_recipe_categories` (`cat_id`),
  CONSTRAINT `FK_recipe_categories` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recipe_categories_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `recipe_categories` */

insert  into `recipe_categories`(`id`,`recipe_id`,`cat_id`) values (37,59,1),(38,59,3),(39,61,1),(40,61,2),(12,62,3),(13,64,4),(14,65,1),(15,66,1),(16,67,1),(17,68,1),(18,68,2),(19,68,6),(20,68,7),(21,68,8),(22,69,1),(23,69,2),(24,69,6),(25,69,7),(26,69,8),(27,70,1),(28,70,2),(29,70,6),(30,70,7),(31,70,8),(32,71,1),(33,71,2),(34,71,6),(35,71,7),(36,71,8),(41,73,1),(42,74,1),(43,74,6),(44,75,1),(45,75,6),(46,76,2),(47,77,2),(48,77,8);

/*Table structure for table `recipe_nutritions` */

DROP TABLE IF EXISTS `recipe_nutritions`;

CREATE TABLE `recipe_nutritions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `recipeid` int(11) NOT NULL DEFAULT '0',
  `measure_unit` enum('g','mg','ug','oz','lb') NOT NULL DEFAULT 'g',
  `weight` float(10,2) NOT NULL,
  `water` float(10,2) NOT NULL,
  `kcal` double(12,2) NOT NULL,
  `protein` float(10,2) NOT NULL,
  `fat` float(10,2) NOT NULL,
  `sat_fat` float(10,2) NOT NULL,
  `mono_unsat_fat` float(10,2) NOT NULL,
  `poly_unsat_fat` float(10,2) NOT NULL,
  `cholesterol` float(10,2) NOT NULL,
  `carbohydrate` float(10,2) NOT NULL,
  `dietry_fiber` float(10,2) NOT NULL,
  `calcium` double(10,2) NOT NULL,
  `iron` double(10,2) NOT NULL,
  `potassium` bigint(20) NOT NULL,
  `sodium` bigint(20) NOT NULL,
  `suger` double(10,2) NOT NULL,
  `vit_a_iu` double(10,3) NOT NULL,
  `vit_a_re` double(10,3) NOT NULL,
  `thiamin` float(10,3) NOT NULL,
  `flavin` float(10,3) NOT NULL,
  `niacin` float(10,3) NOT NULL,
  `vit_c` double(10,3) NOT NULL,
  `vit_e` double(10,3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipeid` (`recipeid`),
  KEY `weight` (`weight`),
  KEY `weight_2` (`weight`),
  KEY `measure_unit` (`measure_unit`),
  KEY `recipeid_2` (`recipeid`),
  CONSTRAINT `recipe_nutritions_ibfk_1` FOREIGN KEY (`recipeid`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `recipe_nutritions` */

/*Table structure for table `recipeingredients` */

DROP TABLE IF EXISTS `recipeingredients`;

CREATE TABLE `recipeingredients` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `ingredient_id` bigint(20) NOT NULL,
  `ingcat` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `weight` double(10,2) NOT NULL,
  `weight_unit` enum('g','mg','ug','oz','lb') NOT NULL DEFAULT 'g',
  `recipe_id` int(11) NOT NULL,
  `ingdesc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredient_id` (`ingredient_id`),
  KEY `ingcat` (`ingcat`),
  KEY `measure_id` (`measure_id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `recipe_id_2` (`recipe_id`),
  CONSTRAINT `FK_recipeingredients_cat` FOREIGN KEY (`ingcat`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_recipeingredients_ing` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_recipeing_measure` FOREIGN KEY (`measure_id`) REFERENCES `measurements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recipeingredients_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `recipeingredients` */

insert  into `recipeingredients`(`id`,`ingredient_id`,`ingcat`,`measure_id`,`amount`,`weight`,`weight_unit`,`recipe_id`,`ingdesc`) values (7,1,1,1,'4',4.00,'g',62,'4'),(8,1,1,1,'5',5.00,'g',64,'5'),(9,1,1,1,'6',6.00,'g',65,'6'),(10,1,1,1,'5',5.00,'g',66,'5'),(11,1,1,1,'7',7.00,'g',67,'7'),(15,1,1,1,'7',7.00,'g',71,'7dfghdfgh'),(16,1,1,1,'3',3.00,'g',61,'3');

/*Table structure for table `recipes` */

DROP TABLE IF EXISTS `recipes`;

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `meal_for_breakfast` tinyint(1) NOT NULL DEFAULT '0',
  `meal_for_lunch` tinyint(1) NOT NULL DEFAULT '0',
  `meal_for_dinner` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `directions` text NOT NULL,
  `nutritions` text NOT NULL,
  `recipe_type` enum('Main','Sub') NOT NULL DEFAULT 'Main',
  `meta_keywords` varchar(250) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_desc` varchar(500) NOT NULL,
  `sidedish` tinyint(1) NOT NULL DEFAULT '0',
  `serving_size` int(11) NOT NULL,
  `video` text NOT NULL,
  `videourl` varchar(500) NOT NULL,
  `status` enum('New','Approved','Declined') NOT NULL DEFAULT 'New',
  `featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `rating` double(4,2) NOT NULL,
  `viewed` bigint(20) NOT NULL,
  `owner_type` enum('Admin','Member') NOT NULL DEFAULT 'Admin',
  `created_by` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `approved_by` bigint(20) NOT NULL,
  `approved_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `FK_recipes_members` FOREIGN KEY (`created_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

/*Data for the table `recipes` */

insert  into `recipes`(`id`,`title`,`meal_for_breakfast`,`meal_for_lunch`,`meal_for_dinner`,`photo`,`description`,`directions`,`nutritions`,`recipe_type`,`meta_keywords`,`meta_title`,`meta_desc`,`sidedish`,`serving_size`,`video`,`videourl`,`status`,`featured`,`rating`,`viewed`,`owner_type`,`created_by`,`created_at`,`modified_at`,`modified_by`,`approved_by`,`approved_on`) values (59,'Sweet Apple Chicken Sausage, Endive & Blueberry Salad with Toasted Pecans',0,1,1,'5233-01-rec-741-mc.png','\"This salad combines savory chicken sausage, sweet blueberries, and a tangy vinaigrette with goat cheese and pecans. Serve it as a side dish, light dinner, or simple and satisfying lunch.\"','    Saute chicken sausage in canola oil over medium-high heat until browned, about 2 minutes. Set aside.\r\n    Combine endive, gourmet salad greens, blueberries and chicken sausage in a large bowl.\r\n    In a small bowl, combine vinegar, honey, salt, and pepper and stir with a whisk.\r\n    Add dressing to endive mixture; toss gently.\r\n    Sprinkle with cheese and pecans.\r\n','Testing \r\nTesting \r\nTesting Testing \r\nTesting \r\nTesting \r\nTesting ','Main','','','',0,4,'','','New','No',0.00,0,'Admin',1,'2014-04-25 15:22:00','0000-00-00 00:00:00',1,0,'0000-00-00 00:00:00'),(61,'Honey-Mustard Chicken with Plums',1,1,1,'2761-01-Honey-Mustard Chicken with Plums.jpg','Brown sausage on stove top and set aside. Stir together cream and eggs.  Put one handful of spinach in bottom of each pie crust. Pour egg mixture over spinach then add sausage, mushrooms and top with cheese.  Bake about 30 minutes at 375 degrees.  Quiche should not wiggle when you shake it.','test direction','test nutritions','Main','','','',0,4,'','','New','No',0.00,0,'Admin',1,'2014-04-25 15:38:34','0000-00-00 00:00:00',1,0,'0000-00-00 00:00:00'),(62,'Pumpkin Spice Cake Comments',0,1,0,'2768-01-Pumpkin Spice Cake.jpg','Blend all ingredients in a large bowl and then beat on medium about 2 minutes.','testing direction','testing nutritions','Main','','','',0,8,'','','New','No',0.00,0,'Admin',1,'2014-04-25 15:44:56','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(64,'Crispy Fish Tacos',0,0,1,'8799-01-Crispy Fish Tacos.jpg','test desc','test direction','test nutritions','Main','','','',0,8,'','','New','No',0.00,0,'Admin',1,'2014-04-25 15:48:14','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(65,'Cranberry Chicken ',0,1,1,'93-01-Cranberry Chicken c.png','test desc','test direciont','test nutritions','Main','','','',0,6,'','','New','No',0.00,0,'Admin',1,'2014-04-25 15:50:46','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(66,'Baked Chicken Parmesan Sliders ',0,1,0,'9223-01-Baked Chicken Parmesan Sliders .jpg','TEST DESC','TEST DIRCTION','TEST NUTRITIONS','Main','','','',0,9,'','','New','No',0.00,0,'Admin',1,'2014-04-25 15:52:39','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(67,'Chickend Poppy Seed',1,1,1,'516-01-CHICKEN POPPY SEED.jpg','test desc','test direction','test nutritions','Main','','','',0,8,'','','New','No',0.00,0,'Admin',1,'2014-04-25 15:54:09','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(68,'Grilled Meat',0,1,0,'1365-01-','Testing','Cook it yourself. ','Big cow and small chicken','Main','','','',0,20,'','','New','No',0.00,0,'Admin',1,'2014-04-28 14:20:05','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(69,'Crispy Fish Tacos',0,1,1,'35-01-','asdfa','asdfasdf','sdfasdfasd','Main','','','',0,4,'','','New','No',0.00,0,'Admin',1,'2014-04-28 14:25:59','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(70,'Crispy Fish Tacos',0,1,1,'2155-01-','sdfasdfasdf','asdfasdfasd','asdfasdf','Main','','','',0,4,'','','New','No',0.00,0,'Admin',1,'2014-04-28 14:30:54','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(71,'test here',1,1,0,'5499-01-','asdfklj','lkjasd','laksdjf','Main','','','',0,6,'','','New','No',0.00,0,'Admin',1,'2014-04-28 14:52:14','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(72,'test',0,1,0,'9259-01-','sadf','asdfasdf','asdf','Main','','','',0,4,'','','New','No',0.00,0,'Admin',1,'2014-04-29 10:44:48','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(73,'tessssssss',0,1,0,'7377-01-','asdf','asdf','asdf','Main','','','',0,6,'','','New','No',0.00,0,'Admin',1,'2014-04-29 10:56:18','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(74,'te4',0,0,0,'2080-01-','asdf','asdf','asdf','Main','','','',0,5,'','','New','No',0.00,0,'Admin',1,'2014-04-29 10:56:50','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(75,'asdfasdf',0,0,0,'3421-01-','asdf','asdf','asdf','Main','','','',0,4,'','','New','No',0.00,0,'Admin',1,'2014-04-29 11:04:29','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(76,'asdf',0,0,0,'7596-01-','asdf','asdf','asdf','Main','','','',0,5,'','','New','No',0.00,0,'Admin',1,'2014-04-29 11:07:19','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00'),(77,'asdf',0,0,0,'9194-01-','asdf','asdf','asdf','Main','','','',0,4,'','','New','No',0.00,0,'Admin',1,'2014-04-29 11:11:45','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00');

/*Table structure for table `recipes_of_day` */

DROP TABLE IF EXISTS `recipes_of_day`;

CREATE TABLE `recipes_of_day` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rod_day` date NOT NULL,
  `recipeid` int(11) NOT NULL,
  `servingsize` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rod_day` (`rod_day`),
  KEY `recipeid` (`recipeid`),
  CONSTRAINT `recipes_of_day_ibfk_1` FOREIGN KEY (`recipeid`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `recipes_of_day` */

insert  into `recipes_of_day`(`id`,`rod_day`,`recipeid`,`servingsize`) values (23,'2014-04-10',64,4),(24,'2014-04-10',59,4);

/*Table structure for table `recipiedates` */

DROP TABLE IF EXISTS `recipiedates`;

CREATE TABLE `recipiedates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recipe_id` int(11) NOT NULL DEFAULT '0',
  `servings` bigint(20) NOT NULL,
  `sidedish` enum('Yes','No') NOT NULL DEFAULT 'No',
  `mc_type` enum('Breakfast','Lunch','Dinner','Brunch') NOT NULL DEFAULT 'Dinner',
  `created_by` int(20) DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipeid` (`recipe_id`),
  KEY `recipeid_2` (`recipe_id`),
  KEY `FK_recipiedates_mems` (`created_by`),
  CONSTRAINT `FK_recipiedates_mems` FOREIGN KEY (`created_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recipiedates_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `recipiedates` */

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_by` int(20) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_email` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('New','Approved','Declined') NOT NULL,
  `approved_on` datetime DEFAULT NULL,
  `approved_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `FK_testimonials_members` FOREIGN KEY (`created_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `testimonials` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
