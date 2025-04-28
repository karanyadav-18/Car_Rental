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

-- Create agents table (added fix)
CREATE TABLE `agents` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `company` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data into agents (for testing)
INSERT INTO `agents` (`id`, `name`, `email`, `password`, `company`) 
VALUES 
(1, 'Sajeed Ansari', 'saj@gmail.com', '12345', 'Code OS'),
(2, 'Testing User', 'test@company.com', 'password', 'Test Company');

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
    `status` ENUM('Available', 'Rented') NOT NULL DEFAULT 'Available',  -- Track car status
    `rental_start_date` DATE DEFAULT NULL,  -- Track rental start date
    `rental_end_date` DATE DEFAULT NULL,    -- Track rental end date
    `total_earnings` DECIMAL(10, 2) DEFAULT 0.00,  -- Track total earnings from this car
    PRIMARY KEY (`id`),
    FOREIGN KEY (`agent_id`) REFERENCES `agents`(`id`)  -- Foreign key relation with agents table
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cars` ADD COLUMN `location` VARCHAR(255) NOT NULL;
-- Insert data into cars

INSERT INTO `cars` (`agent_id`, `image`, `model`, `car_number`, `seats`, `rent`, `status`, `rental_start_date`, `rental_end_date`, `total_earnings`) 
VALUES
(1, 'car1.jpg', 'Toyota Corolla', 'ABC1234', 5, 2000.00, 'Available', NULL, NULL, 0.00),
(1, 'car2.jpg', 'Honda Civic', 'XYZ5678', 4, 2500.00, 'Available', NULL, NULL, 0.00),
(1, 'car3.jpg', 'Ford Focus', 'MNO1122', 5, 1800.00, 'Rented', '2025-04-01', '2025-04-10', 18000.00);

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

-- Create rentals table
CREATE TABLE `rentals` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `car_id` INT NOT NULL,
    `agent_id` INT NOT NULL,
    `customer_name` VARCHAR(100) NOT NULL,
    `rent_date` DATE NOT NULL,
    `return_date` DATE,
    `total_amount` DECIMAL(10,2),
    `status` ENUM('Rented', 'Returned') DEFAULT 'Rented',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`car_id`) REFERENCES `cars`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`agent_id`) REFERENCES `agents`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
