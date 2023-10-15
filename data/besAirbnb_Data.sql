USE besAirbnb_db;

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