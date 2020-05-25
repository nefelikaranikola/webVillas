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


/* Inserts */
INSERT INTO `webvillas`.`users` (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('nefeli', 'nefikaranikola@gmail.com', '10071989', '555555', '1');

INSERT INTO `webvillas`.`villas` (`user_id`, `title`,`excerpt`, `description`, `state`, `address`, `postal_code`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `type`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `wifi`,`pool`,`sea_view`,`air_condition`,`fireplace`,`playroom`,`jacuzzi`,`elevator`,`stairway`,`balcony`,`parking`,`garden`,`storage`,`safety_door`,`furnished`,`attic`,`solar_panel`, `price`) VALUES
	('1', 'Exotic Villa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, consequatur voluptate! Tenetur culpa facere sequi.', 'D',  'Macedonia', 'Chalkidiki', '34300', '1234', '1234', '6', '350', '2000', 'Maisonete', 'Neoclassic', 'Countryside', '2000','3', '3', '2', '2', '2', '3', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '1', '0', '0', '5000'),
	('1', 'Skyfall Villa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, consequatur voluptate! Tenetur culpa facere sequi.', 'D',  'Attiki', 'Parnitha', '36700', '4567', '567', '6', '350', '2000', 'Maisonete', 'Neoclassic', 'Countryside', '1990','3', '3', '2', '2', '2', '3', '1', '1', '0', '0', '1', '0', '1', '0', '1', '1', '1', '0', '1', '1', '1', '0', '0',  '10000'),
	('1', 'Wood & Stone', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, consequatur voluptate! Tenetur culpa facere sequi.', 'D',  'Trikala', 'Pertouli', '36500', '654', '841', '4', '200', '1500', 'Dublex', 'New Built', 'Residential', '2010', '1', '2', '1', '1', '1', '3', '1', '1', '0', '0', '1', '1', '1', '0', '0', '0', '1', '1', '1', '0', '1', '1', '1',  '10000'),
	('1', 'Oia Villa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, consequatur voluptate! Tenetur culpa facere sequi.', 'D',  'Cyclades', 'Oia', '33033', '8523', '3258', '2', '150', '400', 'Ground Floor', 'Luxury', 'Countryside', '2010', '337433', '21', '22', '69', '1', '3', '1', '1', '1', '1', '0', '0', '1', '0', '1', '1', '0', '0', '0', '0', '1', '0', '1',  '333'),
	('1', 'Pelion Paradise', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, consequatur voluptate! Tenetur culpa facere sequi.', 'D',  'Magnisia', 'Tsagarada', '37300', '6587', '12345', '8', '630', '5000', 'Maisonete', 'New Built', 'Countryside', '2010', '4', '4', '3', '3', '3', '3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',  '7100'),
	('1', 'Santorine Villa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, consequatur voluptate! Tenetur culpa facere sequi.', 'D',  'Cyclades', 'Santorine', '33033', '6589', '9856', '2', '120', '100', 'Ground Floor', 'Luxury', 'Residential', '2000', '1', '1', '1', '1', '1', '2', '1', '1', '1', '1', '0', '0', '1', '0', '1', '1', '0', '0', '0', '0', '1', '0', '1',  '2500')
;
