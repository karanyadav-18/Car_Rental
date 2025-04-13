SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Create agencies table
CREATE TABLE `agencies` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email_id` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    `gst` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into agencies
INSERT INTO `agencies` (`id`, `company`, `name`, `email_id`, `password`, `mobile`, `gst`) 
VALUES 
(4, 'Code OS', 'Sajeed', 'saj@gmail.com', '12345', '1234567', 'GST123'),
(5, 'Test', 'Testing', 'test@gmail.com', '12345', '9867543', 'test123'),
(6, 'test', 'test', 'test@gmail.com', '12345', '09999999999', '43214321');

-- Create booked_car table
CREATE TABLE `booked_car` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `customer_id` INT(11) NOT NULL,
    `car_id` INT(11) NOT NULL,
    `pickup` VARCHAR(255) NOT NULL,
    `dropl` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    `no_of_days` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into booked_car
INSERT INTO `booked_car` (`id`, `customer_id`, `car_id`, `pickup`, `dropl`, `date`, `no_of_days`) 
VALUES 
(3, 4, 6, 'Koparkharine', 'Vashi', '2023-03-26', 2),
(4, 6, 7, 'Navi mumbai', 'Kurla', '2023-04-09', 4),
(5, 8, 8, 'sd', 'asd', '2023-03-30', 2);

-- Create cars table
CREATE TABLE `cars` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `agent_id` INT(11) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `model` VARCHAR(255) NOT NULL,
    `car_number` VARCHAR(255) NOT NULL,
    `seats` INT NOT NULL,
    `rent` DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into cars
INSERT INTO `cars` (`id`, `agent_id`, `image`, `model`, `car_number`, `seats`, `rent`) 
VALUES 
(5, 4, 'hundai1.avif', 'Hundai', 'MH 43 BF 6786', 7, 4000.00),
(6, 4, 'maruti2.jpg', 'Maruti', 'MH 43 BF 0786', 6, 4500.00),
(7, 5, 'hundai2.avif', 'Hundai', 'MH 43 TE 8769', 5, 2000.00),
(8, 5, 'cardummy.jpeg', 'test', '1234', 3, 1111.00);

-- Create customer table
CREATE TABLE `customer` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email_id` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into customer
INSERT INTO `customer` (`id`, `name`, `email_id`, `password`, `mobile`) 
VALUES 
(1, 'abc', 'abc@gmail.com', 'abc', '123456789'),
(4, 'Sajeed Ansari', 'Sajeedans.333@gmail.com', '123456', '9172716786'),
(5, 'Harry', 'harry@gmail.com', 'harry', '876543442'),
(6, 'test', 'testing@gmail.com', '12345', '8674532'),
(7, 'Kalim khan', 'kalim@gmail.com', 'kalim@1234', '87654457879'),
(8, 'rest', 'rest@gmail.com', '12345', '8765432190');

COMMIT;
