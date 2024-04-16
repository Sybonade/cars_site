-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 10:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2024_cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_body_style`
--

CREATE TABLE `table_body_style` (
  `body_style_id` int(11) NOT NULL,
  `body_style_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_body_style`
--

INSERT INTO `table_body_style` (`body_style_id`, `body_style_name`) VALUES
(1, 'Sport'),
(2, 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `table_cars`
--

CREATE TABLE `table_cars` (
  `cars_id` int(11) NOT NULL,
  `cars_model` varchar(255) NOT NULL,
  `cars_brand` varchar(255) NOT NULL,
  `cars_milage` int(11) NOT NULL,
  `cars_model_year` year(4) NOT NULL,
  `cars_price` decimal(10,2) NOT NULL,
  `cars_hp` int(11) NOT NULL,
  `cars_dicplacement` decimal(4,2) NOT NULL,
  `cars_licence` varchar(255) NOT NULL,
  `cars_inpsection_date` date NOT NULL,
  `cars_cunsumption` decimal(3,1) NOT NULL,
  `cars_emission` int(11) NOT NULL,
  `cars_weight` int(11) NOT NULL,
  `cars_description` text NOT NULL,
  `cars_technical` text NOT NULL,
  `cars_img` varchar(255) NOT NULL,
  `cars_owner_fk` int(11) NOT NULL,
  `cars_fuel_fk` int(11) NOT NULL,
  `cars_trans_fk` int(11) NOT NULL,
  `cars_body_fk` int(11) NOT NULL,
  `cars_drive_fk` int(11) NOT NULL,
  `cars_sold_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_cars`
--

INSERT INTO `table_cars` (`cars_id`, `cars_model`, `cars_brand`, `cars_milage`, `cars_model_year`, `cars_price`, `cars_hp`, `cars_dicplacement`, `cars_licence`, `cars_inpsection_date`, `cars_cunsumption`, `cars_emission`, `cars_weight`, `cars_description`, `cars_technical`, `cars_img`, `cars_owner_fk`, `cars_fuel_fk`, `cars_trans_fk`, `cars_body_fk`, `cars_drive_fk`, `cars_sold_status`) VALUES
(1, 'Mustang', 'Ford', 12000, 1998, '25000.00', 320, '5.00', 'abc-123', '2024-04-01', '32.2', 25, 300, 'The best car on the market', 'Very fast', 'car-hero-img.jpg', 13, 1, 1, 1, 2, 0),
(56, 'Supra', 'Toyota', 220000, 1992, '13400.00', 180, '3.00', 'STI-671', '2024-03-30', '10.0', 10, 1660, 'A nice red car. Fast and fun to drive. It has been in my family for genreations.', 'Ilmastointi: Manuaalinen Keskuslukitus: Avaimella Penkinlämmittimet Sähkökäyttöiset ikkunat Sähköpeilit Vakionopeudensäädin: Perinteinen', 'supra.jpg', 14, 2, 1, 1, 2, 0),
(57, 'Supra', 'Toyota', 220000, 1992, '13400.00', 180, '3.00', 'STI-671', '2024-03-30', '10.0', 10, 1660, 'A nice red car. Fast and fun to drive. It has been in my family for genreations.', 'Ilmastointi: Manuaalinen Keskuslukitus: Avaimella Penkinlämmittimet Sähkökäyttöiset ikkunat Sähköpeilit Vakionopeudensäädin: Perinteinen', 'supra.jpg', 14, 2, 1, 1, 2, 0),
(58, 'AE86', 'Toyota', 25000, 1985, '27000.00', 315, '4.00', 'ABC-123', '2024-03-07', '10.0', 20, 315, 'The best car on the market, good and fast', 'Broom Broom', 'ae86.jpg', 13, 2, 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_drivetrain`
--

CREATE TABLE `table_drivetrain` (
  `drive_id` int(11) NOT NULL,
  `drive_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_drivetrain`
--

INSERT INTO `table_drivetrain` (`drive_id`, `drive_name`) VALUES
(1, 'Front Wheel'),
(2, 'Back Wheel'),
(3, 'All Wheel');

-- --------------------------------------------------------

--
-- Table structure for table `table_fueltype`
--

CREATE TABLE `table_fueltype` (
  `fuel_id` int(11) NOT NULL,
  `fuel_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_fueltype`
--

INSERT INTO `table_fueltype` (`fuel_id`, `fuel_name`) VALUES
(1, 'Diesel'),
(2, 'Gas');

-- --------------------------------------------------------

--
-- Table structure for table `table_owner`
--

CREATE TABLE `table_owner` (
  `owner_id` int(11) NOT NULL,
  `owner_fname` varchar(255) NOT NULL,
  `owner_lname` varchar(255) NOT NULL,
  `owner_adress` varchar(255) NOT NULL,
  `owner_city` varchar(255) NOT NULL,
  `owner_zip` varchar(255) NOT NULL,
  `owner_phone` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_owner`
--

INSERT INTO `table_owner` (`owner_id`, `owner_fname`, `owner_lname`, `owner_adress`, `owner_city`, `owner_zip`, `owner_phone`, `owner_email`) VALUES
(13, 'Axel', 'P', 'päläpälä', 'Hanko', '10300', '12341234', 'axelp@gmail.com'),
(14, 'Jim', 'Smith', 'Karjaankatu 51', 'Hanko', '10900', '0401234567', 'jim.smith@gmail.com'),
(15, 'John', 'Doe', 'Kivipellonkatu 2', 'Karjaa', '10300', '0401234567', 'john.doe@example.com'),
(16, 'John', 'Doe', 'Kivipellonkatu 2', 'Karjaa', '10300', '0401234567', 'john.doe@example.com'),
(17, 'John', 'Doe', 'Kivipellonkatu 2', 'Karjaa', '10300', '0401234567', 'john.doe@example.com'),
(18, 'John', 'Doe', 'Kivipellonkatu 2', 'Karjaa', '10300', '0401234567', 'john.doe@example.com'),
(19, 'John', 'Doe', 'Kivipellonkatu 2', 'Karjaa', '10300', '0401234567', 'john.doe@example.com'),
(20, 'John', 'Doe', 'Kivipellonkatu 2', 'Karjaa', '10300', '0401234567', 'john.doe@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `table_trans_type`
--

CREATE TABLE `table_trans_type` (
  `trans_id` int(11) NOT NULL,
  `trans_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_trans_type`
--

INSERT INTO `table_trans_type` (`trans_id`, `trans_name`) VALUES
(1, 'Manual'),
(2, 'Automatic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_body_style`
--
ALTER TABLE `table_body_style`
  ADD PRIMARY KEY (`body_style_id`);

--
-- Indexes for table `table_cars`
--
ALTER TABLE `table_cars`
  ADD PRIMARY KEY (`cars_id`),
  ADD KEY `cars_owner_fk` (`cars_owner_fk`,`cars_fuel_fk`,`cars_trans_fk`,`cars_body_fk`,`cars_drive_fk`),
  ADD KEY `cars_body_fk` (`cars_body_fk`),
  ADD KEY `cars_trans_fk` (`cars_trans_fk`),
  ADD KEY `cars_drive_fk` (`cars_drive_fk`),
  ADD KEY `cars_fuel_fk` (`cars_fuel_fk`);

--
-- Indexes for table `table_drivetrain`
--
ALTER TABLE `table_drivetrain`
  ADD PRIMARY KEY (`drive_id`);

--
-- Indexes for table `table_fueltype`
--
ALTER TABLE `table_fueltype`
  ADD PRIMARY KEY (`fuel_id`);

--
-- Indexes for table `table_owner`
--
ALTER TABLE `table_owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `table_trans_type`
--
ALTER TABLE `table_trans_type`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_body_style`
--
ALTER TABLE `table_body_style`
  MODIFY `body_style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_cars`
--
ALTER TABLE `table_cars`
  MODIFY `cars_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `table_drivetrain`
--
ALTER TABLE `table_drivetrain`
  MODIFY `drive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_fueltype`
--
ALTER TABLE `table_fueltype`
  MODIFY `fuel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_owner`
--
ALTER TABLE `table_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_trans_type`
--
ALTER TABLE `table_trans_type`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_cars`
--
ALTER TABLE `table_cars`
  ADD CONSTRAINT `table_cars_ibfk_1` FOREIGN KEY (`cars_body_fk`) REFERENCES `table_body_style` (`body_style_id`),
  ADD CONSTRAINT `table_cars_ibfk_2` FOREIGN KEY (`cars_trans_fk`) REFERENCES `table_trans_type` (`trans_id`),
  ADD CONSTRAINT `table_cars_ibfk_3` FOREIGN KEY (`cars_drive_fk`) REFERENCES `table_drivetrain` (`drive_id`),
  ADD CONSTRAINT `table_cars_ibfk_4` FOREIGN KEY (`cars_fuel_fk`) REFERENCES `table_fueltype` (`fuel_id`),
  ADD CONSTRAINT `table_cars_ibfk_5` FOREIGN KEY (`cars_owner_fk`) REFERENCES `table_owner` (`owner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
