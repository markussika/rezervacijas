-- CREATE DATABASE HotelManagement;

USE HotelManagement;

/*
CREATE TABLE rooms (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(10) NOT NULL,
    room_type VARCHAR(50),
    description TEXT
);


CREATE TABLE availability (
    availability_id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    date DATE,
    is_available BOOLEAN,
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);


CREATE TABLE pricing (
    pricing_id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    start_date DATE,
    end_date DATE,
    price DECIMAL(10, 2),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);


CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    username VARCHAR(100),
    password VARCHAR(20)
);


CREATE TABLE reservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    user_id INT,
    check_in_date DATE,
    check_out_date DATE,
    total_price DECIMAL(10, 2),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
*/

-- ALTER TABLE rooms ADD COLUMN photo VARCHAR(255);

-- ALTER TABLE users MODIFY password VARCHAR(255);

-- ALTER TABLE users ADD isAdmin boolean;

SELECT  `user_id`,  `username`,  `password`, 'isadmin' FROM `hotelmanagement`.`users`





