
CREATE DATABASE IF NOT EXISTS `simplifysupper` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simplifysupper`;

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(16) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_details` text NOT NULL,
  `url` text NOT NULL,
  `photo` varchar(255) NOT NULL,
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
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;



CREATE TABLE IF NOT EXISTS `coupons_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` bigint(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_id` (`coupon_id`,`cat_id`),
  KEY `FK_coupons_cats` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;


CREATE TABLE IF NOT EXISTS `store_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `store_logo` text,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;


CREATE TABLE IF NOT EXISTS `storead_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storad_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `storad_id` (`storad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;




ALTER TABLE `coupon`
  ADD CONSTRAINT `FK_coupons_members` FOREIGN KEY (`created_by`) REFERENCES `members` (`memberid`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `coupons_category`
  ADD CONSTRAINT `FK_coupons_categories` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_coupons_cats` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `storead_category`
  ADD CONSTRAINT `storead_category_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `storead_category_ibfk_3` FOREIGN KEY (`storad_id`) REFERENCES `store_ad` (`id`);

