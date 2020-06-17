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
	`title` VARCHAR(255) NOT NULL,
        `excerpt` TEXT NOT NULL,
        `description` TEXT NOT NULL,
        `state` VARCHAR(50) NOT NULL,
        `city` VARCHAR(50) NOT NULL,
        `address` VARCHAR(50),
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
        `living_room` TINYINT UNSIGNED NOT NULL,
        `rating` ENUM('1','2','3') NOT NULL,
        `extras` VARCHAR(255),
        `price` MEDIUMINT UNSIGNED NOT NULL,
        `name` VARCHAR(25) NOT NULL,
        `surname` VARCHAR(25) NOT NULL,
        `phone` VARCHAR(10) NOT NULL,
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

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('nefeli', 'nefikaranikola@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('dimitris', 'dimitrisgan97@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '66666', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('kleanthis', 'kleanthis@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('klearxos', 'klearxos@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('alex', 'alex@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('aggeliki', 'aggeliki@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('maria', 'maria@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('jason', 'jason@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');

 INSERT INTO users (`username`, `email`, `password`, `activation_code`, `status`) VALUES ('vasilis', 'bas@gmail.com', '$6$je658dfgf%25Zhr!$oOR/pfC2NtU5rXekduou8GEa8pKNgOd/4DwuCFSC6kvzG1wKBkNsBuAiejB8j/IjFF6v5cqL9mgbcTYeGHeUv1', '555555', '1');



INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('1', 'Villa Crystallia', 'Villa Crystallia stands majestically on a cliff offering breathtaking panoramic views incorporating Vasilikos and Alykes bay', 'The villa is situated on private land of over 40.000 m2, part of a group of 6 independent villas, just above the famous Blue Caves and 20 minutes boat ride to the famous Navagio – the Shipwreck. The area is 30 km from the main town and airport and 2.5 km from the small port of Agios Nikolaos, which connects Zakynthos with Kefalonia (1 hour by ferry boat). Villa Crystallia has direct access to the sea by way of a stone path constructed with great care leading down to the sea and to the impressive Priest\'s Cave. The villa is a traditionally designed Zakynthian stone house covering 140m2 and can comfortably accommodate 6 adults and 2 children. It has 3 air-conditioned bedrooms with en-suite bathrooms, comfortable sitting/dining room with traditional stone fireplace, open plan fully equipped kitchen, covered veranda with dining table overlooking the sea, private infinity pool with hydro-massage spot (massaging & swimming against the stream), sun loungers and outside barbecue. Villa Crystallia is tastefully designed and offers wonderful sea views.', 'Zakynthos', 'Zakynthos', '', '', '6', '125', '50', '', '', '', '3', '3', '1', '1', '2', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Internal stairway\",\"Garden\"]', '1850', 'Nikolaos', 'Stergiou', '6953245889', 'ster@gmail.gr');

INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('2', 'Villa Sanida', 'A mindfully curated Villa, sets the tone for a unique holiday experience in unpretentious elegance at the north-east coast of Ios.', 'Sanida Villa that shines in bohemian breeze, reflecting the joyful energy and the impeccable views of the well-known Santa Maria beach. It is a spacious, comfortable villa of 240 m2, that can host up to 11 guests; ideal to let go, relax and nourish from the breath-taking view. A calming soft white palette is selected for the indoor areas, that embrace artistic temperament with island style customized decorations, while the outdoor living areas underline its elegant-minimalistic spirit: The Sanida1 Villa pergola shaded lounge area, creates an ideal setting for dreamy moments of relaxed conversations with friends and family.On the ground level, Sanida1 villa features two spacious light filled bedrooms (15 m2 and 16 m2); a soothing ambience that is completed by one comfortable bathroom and one guest bathroom.', 'Cyclades', 'Ios', '', '', '2', '125', '50', '', '', '', '1', '1', '0', '0', '0', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Internal stairway\",\"Garden\"]', '700', 'Nikolaos', 'Stergiou', '6953245889', 'ster@gmail.gr');

INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('3', 'Villa Calyon', 'Villa Calyon, on the island of Rhodes is an exclusive villa, which provides comfort and luxury in a private environment', 'The property is centrally located between the city of Rhodes (23 km) and Lindos town (29 km). Shops and restaurants are available within five minutes by car, as are the many beautiful beaches. The Faliraki nightlife is at 3 km, with also the largest water park in Europe.The villa was designed modern and stylish. From the terrace runs the light blue waters of the infinity pool over the azure waters of the sea. Guests can enjoy the endless sea view from every terrace of each bedroom.A fully equipped kitchen with all modern conveniences offers everything you need to strike the blow. A microwave oven, dishwasher, large fridge with ice maker, freezer, toaster, kettle, a full white china plates, cutlery, wine glasses, water - and champagne glasses. Everything is new.', 'Dodecanese', 'Rhodes', '', '', '2', '125', '50', '', '', '', '1', '1', '0', '0', '0', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Internal stairway\",\"Garden\"]', '700', 'Nikolaos', 'Stergiou', '6953245889', 'ster@gmail.gr');

INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('4', 'Villa Ollivia', 'Villa Ollivia is situated in a convenient setting at the edge of Kontomari village allowing quietness and privacy', 'The villa is part of a group of three independent villas in the same terrain. The villas are built in a rich colorful stone that emphasizes the more modern Cretan architecture of today. The villas offer sun flooded areas with shades of different colors during the day periods that leaves a lasting impression from every angle. They are designed with high ceilings, spacious rooms and large patio windows. The wooden structure, the marble and glass features and metal fixtures blend offering a high aesthetic result in design. High quality indoor and outdoor furnishings designed specifically for the villas complete its comfortable environment for sheer relaxation.Each Villa has its own private overflow swimming pool that can be entered by its yacht style wooden deck. The pools are made of Diamond Brilliance finishes with quartz aggregates that give a ray of stunning rainbow like colors (iridescences) during different periods of the day. The surrounding garden areas should be specifically mentioned, as the owners managed to maintain the original orange and olive trees in their original place during the Villas construction, adding flowers and bushes. Oranges are ready to be picked up by the guests during the spring and summer periods to taste the best Cretan juices.', 'Chania', 'Chania', '', '', '5', '125', '50', '', '', '', '2', '2', '1', '1', '1', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Internal stairway\",\"Garden\"]', '980', 'Vasilis', 'Karanikolas', '6953245889', 'karan@gmail.gr');

INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('5', 'Villa Almond', 'Villa Almond is a luxurious vacation retreat with amazing front line views and just 2 minutes walking distance to a sandy beach', 'Perfectly designed , these luxurious villa in Andros is fully equipped, autonomous and ideal for families and friends or even couples that wish to stay in a secluded seafront paradise and still feel like home. This paradise is the ultimate escape who want to experience its unique atmosphere. Inside an open-space combines a living and dining area with a fully equiped kitchen with big opening extending to the large pool terrace.', 'Corfu', 'Corfu', '', '', '2', '125', '50', '', '', '', '1', '1', '0', '0', '0', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Internal stairway\",\"Garden\"]', '700', 'Nikolaos', 'Stergiou', '6953245889', 'ster@gmail.gr');

INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('6', 'Villa Elounda', 'Spend your precious vacay days in Elounda Villa and enjoy the most relaxed stay! In the meantime explore Crete!', 'Perfectly designed , these luxurious villa in Andros is fully equipped, autonomous and ideal for families and friends or even couples that wish to stay in a secluded seafront paradise and still feel like home. This paradise is the ultimate escape who want to experience its unique atmosphere. Inside an open-space combines a living and dining area with a fully equiped kitchen with big opening extending to the large pool terrace.', 'Lassithi', 'Agios Nikolaos', '', '', '4', '125', '50', '', '', '', '2', '2', '1', '1', '1', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Safety door\",\"Garden\"]', '650', 'Nikolaos', 'Stergiou', '6953245889', 'ster@gmail.gr');

INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('7', 'Villa Maria', 'This Villa is characterized by exclusive privacy as it is the last one up the hill', 'Villa Maria is a private luxury estate of a total 500m², uniquely featuring one pool with stunning views at the Aegean Sea and the mystical Delos island. Located in Kanalia near Ornos bay, this outstanding property features 4 bedrooms which can comfortably accommodate 8 guests. This elegant property situated on an ideal location, generously promotes the Mykonian lifestyle at its finest. This Villa is characterized by exclusive privacy as it is the last one up the hill.Villa Maria is divided into three levels.The lower level: features 1 sea-view Master bedroom with king-size bed, A/C and unobstructed sea views. In front of the bedrooms lies a seating area with the garden.The ground or pool level: features an ample-sized living with a cozy fireplace, two dining areas – one indoor & one outdoor -, one fully equipped kitchens with all modern appliances as well as one guest’s W/C.The stylish pool level also consists of one spacious living rooms, as well as of an outdoor BBQ.The upper level: features 1 sea-view Master bedroom with balcony overlooking at the sea. Also, on the upper level there are 2 more double bedrooms with 1 shared bathrooms.', 'Cyclades', 'Mykonos', '', '', '2', '125', '50', '', '', '', '1', '1', '1', '1', '1', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Gym\",\"Garden\"]', '700', 'Maria', 'Zarifi', '6953245889', 'maraki@gmail.gr');

INSERT INTO villas (`user_id`, `title`, `excerpt`, `description`, `state`, `city`, `lat`, `long`, `capacity`, `building_area`, `plot_area`, `style`, `zone`, `construction`, `bedrooms`, `bathrooms`, `WC`, `kitchen`, `living_room`, `rating`, `extras`, `price`, `name`, `surname`, `phone`, `email`) VALUES ('8', 'Oia Thea', 'Oia Thea is a meticulously renovated cave house in the heart of world famous Oia, very close to the main square of the village', 'Villa Oia Thea has all one can wish for: stunning, expansive views inside and out; bright, airy rooms and modern amenities seamlessly blended with the carefully preserved details of an authentic Santorini cave house. The feeling here is open as the sky and layered and deep as the caldera. No surrounding buildings impede the light and air around, and the breathtaking views are an endless feast for the eyes in every direction.The simplicity of the newly renovated villa highlights the restored historical details of the original cave house. New plaster covers the original forms of the curving walls, vaulted ceilings and deep archways that were carved by hand years ago from the caldera cliffs. The interior palette of soothing neutrals gracefully complements the many views of nature’s own palette of brilliant blue and earthy ochre and deep reds. Bright blue wood shutters finish original interior and exterior windows. These charming uniquely Santorini elements combine with traditional Cycladic style furnishings and tastefully selected antiques and art. The result is an atmosphere of warmth, charm and island comfort.', 'Cyclades', 'Santorine', '', '', '8', '150', '65', '', '', '', '4', '3', '1', '1', '1', '3', '[\"Wifi\",\"Pool\",\"Sea view\",\"Aircondition\",\"Balcony\",\"Garden\"]', '2000', 'Rania', 'Baka', '6953245889', 'baka@gmail.gr');


INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('1', '1', '15923314164565ee90c980dd29.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('2', '1', '15923314169435ee90c980f1dd.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('3', '1', '15923314164155ee90c981035a.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('4', '1', '15923314169935ee90c9812b61.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('5', '1', '15923314169435ee90c9814732.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('6', '1', '15923314165845ee90c98161f5.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('7', '1', '15923314164695ee90c9817a9b.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('8', '1', '15923314165915ee90c9818db9.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('9', '1', '15923314165395ee90c9819e52.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('10', '1', '15923314161735ee90c981af4a.jpg', 'desc');


INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('11', '2', '15923325914635ee9112fe7351.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('12', '2', '15923325917135ee9112fe9b41.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('13', '2', '15923325919155ee9112feaf75.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('14', '2', '15923325913325ee9112fec03c.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('15', '2', '15923325915995ee9112fee766.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('16', '2', '15923325915095ee9112fefae3.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('17', '2', '15923325914045ee9112ff0fb0.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('18', '2', '15923325911905ee9112ff1fd7.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('19', '2', '15923325917565ee9112ff30fc.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('20', '2', '15923325914645ee9112ff4187.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('21', '2', '15923325928295ee91130012ff.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('22', '2', '15923325921805ee91130024e8.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('23', '2', '15923325926555ee911300353b.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('24', '2', '15923325926645ee911300464b.jpg', 'desc');


INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('25', '3', '15923330318905ee912e70d8e2.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('26', '3', '15923330319085ee912e70ecd4.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('27', '3', '15923330318055ee912e70ff2b.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('28', '3', '15923330316555ee912e71106f.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('29', '3', '15923330315455ee912e712061.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('30', '3', '15923330314675ee912e7146a4.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('31', '3', '15923330317015ee912e7156fe.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('32', '3', '15923330317695ee912e716825.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('33', '3', '15923330319205ee912e7179d0.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('34', '3', '15923330311165ee912e718c2e.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('35', '3', '15923330319445ee912e719e76.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('36', '3', '15923330312755ee912e71b05d.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('37', '3', '15923330317125ee912e71c17d.jpg', 'desc');


INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('38', '4', '15923339898025ee916a5b92f1.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('39', '4', '15923339896655ee916a5bbe3f.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('40', '4', '15923339897375ee916a5bd5c6.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('41', '4', '15923339892865ee916a5be7d9.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('42', '4', '15923339897815ee916a5bfbe8.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('43', '4', '15923339897625ee916a5c0ffe.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('44', '4', '15923339891865ee916a5c219f.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('45', '4', '15923339895045ee916a5c4937.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('46', '4', '15923339897965ee916a5c5ac7.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('47', '4', '15923339897695ee916a5c6b65.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('48', '4', '15923339899575ee916a5c7d76.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('49', '4', '15923339898455ee916a5c9f6d.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('50', '4', '15923339891625ee916a5caeb6.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('51', '4', '15923339899285ee916a5ce78d.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('52', '4', '15923339899495ee916a5cf539.jpg', 'desc');

INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('53', '5', '15923420722795ee936384d206.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('55', '5', '15923420728835ee936384faf4.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('56', '5', '15923420721985ee9363851445.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('58', '5', '15923420728165ee9363853a5d.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('59', '5', '15923420722715ee9363855090.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('60', '5', '15923420721945ee93638564ba.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('61', '5', '15923420722135ee93638594fb.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('62', '5', '15923420728395ee936385a9f8.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('63', '5', '15923420721495ee936385bfb3.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('64', '5', '15923420728625ee936385d368.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('65', '5', '15923420729005ee936385e4ea.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('67', '5', '15923420723905ee9363860654.jpg', 'desc');

INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('68', '6', '15923453173195ee942e50dcef.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('69', '6', '15923453175585ee942e50ef21.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('70', '6', '15923453176845ee942e5100e9.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('71', '6', '15923453171145ee942e511215.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('72', '6', '15923453171105ee942e512427.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('73', '6', '15923453174805ee942e51351a.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('74', '6', '15923453171985ee942e514685.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('75', '6', '15923453175195ee942e515826.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('76', '6', '15923453172125ee942e516899.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('77', '6', '15923453174365ee942e517bc3.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('78', '6', '15923453176495ee942e51a218.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('79', '6', '15923453179695ee942e51b45f.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('80', '6', '15923453176135ee942e51c794.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('81', '6', '15923453174435ee942e51d91e.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('82', '6', '15923453174475ee942e51ea8f.jpg', 'desc');

INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('83', '7', '15923463421875ee946e6937a7.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('84', '7', '15923463427365ee946e694cf6.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('85', '7', '15923463423175ee946e696307.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('86', '7', '15923463428535ee946e6997e3.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('87', '7', '15923463425145ee946e69ac0f.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('88', '7', '15923463421855ee946e69be92.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('89', '7', '15923463421035ee946e69d028.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('90', '7', '15923463424685ee946e69e12d.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('91', '7', '15923463429695ee946e69f373.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('92', '7', '15923463423325ee946e6a097a.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('93', '7', '15923463423605ee946e6a1f2d.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('94', '7', '15923463424295ee946e6a4c57.jpg', 'desc');

INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('95', '8', '15923471725485ee94a2471eb5.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('96', '8', '15923471729005ee94a247337a.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('97', '8', '15923471724045ee94a247468e.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('98', '8', '15923471726285ee94a247599f.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('99', '8', '15923471721405ee94a2476e35.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('100', '8', '15923471728575ee94a2478ca4.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('101', '8', '15923471727865ee94a2479f01.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('102', '8', '15923471721955ee94a247b156.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('103', '8', '15923471725635ee94a247c51a.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('104', '8', '15923471722045ee94a247d78c.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('105', '8', '15923471721995ee94a247e9d6.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('106', '8', '15923471728885ee94a247fd82.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('107', '8', '15923471724545ee94a2480ef5.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('108', '8', '15923471727315ee94a2483908.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('109', '8', '15923471725775ee94a2484ab5.jpg', 'desc');
INSERT INTO media (`id`, `villa_id`, `name`, `description`) VALUES ('110', '8', '15923471723555ee94a248596c.jpg', 'desc');
