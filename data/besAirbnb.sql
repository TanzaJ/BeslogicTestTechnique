-- besAirbnb db creation
DROP SCHEMA IF EXISTS besAirbnb_db;
CREATE SCHEMA besAirbnb_db;
USE besAirbnb_db;

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `amenity_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `img_url` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `location` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `total_likes` int DEFAULT 0,
  `guests_num` int DEFAULT 0,
  `bedrooms_num` int DEFAULT 0,
  `bathrooms_num` int DEFAULT 0,
  `property_id` int,
  `language_id` int,
  FOREIGN KEY (`property_id`) REFERENCES `property`(`property_id`),
  FOREIGN KEY (`language_id`) REFERENCES `language`(`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `check_in` date NOT NULL,
  `final_cost` float NOT NULL,
  `house_id` int,
  `user_id` int,  
  FOREIGN KEY (`house_id`) REFERENCES `house`(`house_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `amenityList`
--

CREATE TABLE `amenityList` (
    `house_id` int(11) not null,
    `amenity_id` int(11) not null,
    PRIMARY KEY (`house_id`, `amenity_id`),
    FOREIGN KEY  (`house_id`) references `house`(`house_id`),
    FOREIGN KEY  (`amenity_id`) references `amenity`(`amenity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `userSavedHouse`
--

CREATE TABLE `userSavedHouse` (
    `user_id` int(11) not null,
    `house_id` int(11) not null,
    PRIMARY KEY (`user_id`, `house_id`),
    FOREIGN KEY  (`user_id`) references `user`(`user_id`),
    FOREIGN KEY  (`house_id`) references `house`(`house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Insert table values in `amenity`
--
INSERT IGNORE INTO amenity (name)
VALUES ('Pool'),
('Wifi'),
('Kitchen'),
('Free parking'),
('Jacuzzi'),
('A washer or dryer'),
('Air conditioning or heating'),
('Self check-in'),
('Laptop-friendly workspace '),
('Pets allowed');

--
-- Insert table values in `property`
--
INSERT IGNORE INTO property (name)
VALUES ('Luxe'),
('Cabins'),
('Domes'),
('Lakefront'),
('Tiny Homes'),
('Countryside'),
('Mansions'),
('Beach'),
('A-Frames'),
('Camping');

--
-- Insert table values in `language`
--
INSERT IGNORE INTO language (name)
VALUES ('English'),
('French'),
('Spanish'),
('Japanese'),
('Mandarin'),
('Dutch'),
('German'),
('Swedish'),
('Korean');

--
-- Insert table values in `user`
--
INSERT INTO user (username, email, password)
VALUES ('James','jk@gmail.com', 'hello123');

--
-- Insert table values in `house`
--
INSERT IGNORE INTO house (img_url, name, description, location, price, total_likes, guests_num, bedrooms_num, bathrooms_num,
property_id, language_id)
VALUES ('https://images.unsplash.com/photo-1601918774946-25832a4be0d6?ixid=M3w1MTAyODF8MHwxfHNlYXJjaHwxfHxhaXJibmJ8ZW58MHx8fHwxNjk2MjEyNzA2fDA&ixlib=rb-4.0.3','Karsten Winegeart', 'Coffee and A-Frames', "Austin Texas", 5555, 643, 4, 3, 2, 9, 1),
('https://images.unsplash.com/photo-1553444836-bc6c8d340ba7?ixid=M3w1MTAyODF8MHwxfHNlYXJjaHwyfHxhaXJibmJ8ZW58MHx8fHwxNjk2MjEyNzA2fDA&ixlib=rb-4.0.3','Filios Sazeides', 'white bedspread inside room', "Cyprus", 2133, 72, 5, 1, 1, 2, 2),
('https://images.unsplash.com/photo-1553444836-bc6c8d340ba7?ixid=M3w1MTAyODF8MHwxfHNlYXJjaHwyfHxhaXJibmJ8ZW58MHx8fHwxNjk2MjEyNzA2fDA&ixlib=rb-4.0.3','Filios Sazeides', 'white bedspread inside room', "Cyprus", 2133, 72, 5, 1, 1, 2, 2),
('https://images.unsplash.com/photo-1591825729269-caeb344f6df2?ixid=M3w1MTAyODF8MHwxfHNlYXJjaHwzfHxhaXJibmJ8ZW58MHx8fHwxNjk2MjEyNzA2fDA&ixlib=rb-4.0.3','Andrea Davis', 'Living room interior design', "Portland, Maine", 1112, 312, 6, 4, 2, 9, 4);

--
-- Insert table values in `houamenityListse`
--
INSERT IGNORE INTO amenityList (house_id, amenity_id)
VALUES (1, 2),
(1, 3),
(1, 5),
(1, 1),
(1, 6);

INSERT IGNORE INTO amenityList (house_id, amenity_id)
VALUES (2, 1),
(2, 3),
(2, 4),
(2, 6),
(2, 9);