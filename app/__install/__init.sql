CREATE DATABASE IF NOT EXISTS `derpbook`;

USE `derpbook`;

CREATE TABLE IF NOT EXISTS `derpbook`.`members` (
	`id` INT NOT NULL,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`password` VARCHAR(8) NOT NULL,
	`avatar_url` VARCHAR(255) DEFAULT NULL,
	`date_added` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY (`email`)
);




