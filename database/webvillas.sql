DROP SCHEMA IF EXISTS webvillas;
CREATE SCHEMA webvillas CHARACTER SET utf8 COLLATE utf8_general_ci;
USE webvillas;

 CREATE TABLE users (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(25) NOT NULL,
        `email` VARCHAR(100) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `activation_code` MEDIUMINT NOT NULL,
        `status` BOOLEAN NOT NULL,
        PRIMARY KEY (id)
 );

 CREATE TABLE villas (
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `user_id` INT UNSIGNED NOT NULL,
		`title` VARCHAR(150) NOT NULL,
        `excerpt` TEXT NOT NULL,
        `description` TEXT NOT NULL,
        `state` VARCHAR(50) NOT NULL,
        `address` VARCHAR(50),
        `postal_code` MEDIUMINT UNSIGNED NOT NULL,
        `lat` VARCHAR(50) NOT NULL,
        `long` VARCHAR(50) NOT NULL,
        `capacity` TINYINT UNSIGNED NOT NULL,
        `building_area` MEDIUMINT UNSIGNED NOT NULL,
        `plot_area` MEDIUMINT UNSIGNED NOT NULL,
        `type` VARCHAR(50),
        `style` VARCHAR(50),
        `zone` VARCHAR(50),
        `construction` VARCHAR(50),
        `bedrooms` TINYINT UNSIGNED NOT NULL,
        `bathrooms` TINYINT UNSIGNED NOT NULL,
        `WC` TINYINT UNSIGNED,
        `kitchen` TINYINT UNSIGNED,
        `living_room` TINYINT UNSIGNED,
        `rating` ENUM('1','2','3') NOT NULL,
        `extras` VARCHAR(255),
        `price` MEDIUMINT UNSIGNED NOT NULL,
        `name` VARCHAR(25) NOT NULL,
        `surname` VARCHAR(25) NOT NULL,
        `phone` INT NOT NULL,
        `email` VARCHAR(100) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (user_id) REFERENCES users(id)
 );

 CREATE TABLE media(
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `villa_id` INT UNSIGNED NOT NULL,
		`name` VARCHAR(30) NOT NULL,
        `description` TEXT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (villa_id) REFERENCES villas(id)
 );
