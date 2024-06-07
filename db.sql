CREATE DATABASE HotelManagement;

USE HotelManagement;


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


CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    phone_number VARCHAR(20)
);


CREATE TABLE reservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    customer_id INT,
    check_in_date DATE,
    check_out_date DATE,
    total_price DECIMAL(10, 2),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id),
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);
