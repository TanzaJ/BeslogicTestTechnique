-- besAirbnb db creation
DROP SCHEMA IF EXISTS besAirbnb_db;
CREATE SCHEMA besAirbnb_db;
USE besAirbnb_db;

--
-- Table structure for table `amenity_type`
--

CREATE TABLE `amenity_type` (
  `amenity_type_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
  `check_out` date NOT NULL,
  `check_in` date NOT NULL,
  `final_cost` float NOT NULL,
  `house_id` int,
  `user_id` int,  
  FOREIGN KEY (`house_id`) REFERENCES `house`(`house_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `amenity_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL,
  `amenity_type_id` int,  
  FOREIGN KEY (`amenity_type_id`) REFERENCES `amenity_type`(`amenity_type_id`)
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


