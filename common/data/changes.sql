
DROP TABLE IF EXISTS `ingredient_measurement`;
CREATE TABLE `ingredient_measurement` (
  `id` INT(20) NOT NULL AUTO_INCREMENT,
  `ing_id` BIGINT(20) NOT NULL,
  `measure_id` INT(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ing_id` (`ing_id`),
  KEY `measure_id` (`measure_id`),
  CONSTRAINT `ingredient_measurement_ibfk_2` FOREIGN KEY (`measure_id`) REFERENCES `measurements` (`id`),
  CONSTRAINT `ingredient_measurement_ibfk_1` FOREIGN KEY (`ing_id`) REFERENCES `ingredients` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*ALTER INGREDINE TABLE*/
ALTER TABLE `ingredients` DROP `measure_unit` ;
ALTER TABLE `ingredients` ADD `measurement` INT NOT NULL AFTER `updated_at` ;