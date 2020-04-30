DROP SCHEMA IF EXISTS webvillas;
CREATE SCHEMA webvillas CHARACTER SET utf8 COLLATE utf8_general_ci;
USE webvillas;

 CREATE TABLE users (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(25) NOT NULL,
        `email` VARCHAR(100) NOT NULL,
        `password` VARCHAR(100) NOT NULL,
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
        `address` VARCHAR(50) NOT NULL,
        `postal_code` MEDIUMINT UNSIGNED NOT NULL,
        `lat` VARCHAR(50) NOT NULL,
        `long` VARCHAR(50) NOT NULL,
        `capacity` TINYINT UNSIGNED NOT NULL,
        `building_area` MEDIUMINT UNSIGNED NOT NULL,
        `plot_area` MEDIUMINT UNSIGNED NOT NULL,
        `type` VARCHAR(50) NOT NULL,
        `style` VARCHAR(50) NOT NULL,
        `zone` VARCHAR(50) NOT NULL,
        `construction` VARCHAR(50) NOT NULL,
        `bedrooms` TINYINT UNSIGNED NOT NULL,
        `bathrooms` TINYINT UNSIGNED NOT NULL,
        `WC` TINYINT UNSIGNED NOT NULL,
        `kitchen` TINYINT UNSIGNED NOT NULL,
        `living_room` TINYINT UNSIGNED NOT NULL,
        `rating` ENUM('1','2','3') NOT NULL,
        `wifi` BOOLEAN,
		`pool` BOOLEAN,
        `sea_view` BOOLEAN,
        `air_condition` BOOLEAN,
        `fireplace` BOOLEAN,
        `playroom` BOOLEAN,
        `jacuzzi` BOOLEAN,
        `elevator` BOOLEAN,
        `stairway` BOOLEAN,
        `balcony` BOOLEAN,
        `parking` BOOLEAN,
        `garden` BOOLEAN,
        `storage` BOOLEAN,
        `safety_door` BOOLEAN,
        `furnished` BOOLEAN,
        `attic` BOOLEAN,
        `solar_panel` BOOLEAN,
        `price` MEDIUMINT UNSIGNED NOT NULL,
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
