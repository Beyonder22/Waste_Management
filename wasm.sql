-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 09:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wasm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_mail` varchar(40) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_mail`, `admin_pass`) VALUES
('admin@admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`) VALUES
(560047, 'Vivek Nagar'),
(560048, 'Domlur');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(11) NOT NULL,
  `complain_date` date NOT NULL,
  `complain_message` varchar(255) NOT NULL,
  `complain_resolve_date` date NOT NULL,
  `complain_status` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `complain_date`, `complain_message`, `complain_resolve_date`, `complain_status`, `user_id`) VALUES
(4, '2022-02-03', 'garbage colector not coming', '2022-03-13', 'Resolved', 22),
(5, '2022-02-02', 'some', '2022-02-24', 'Resolve', 22),
(6, '2022-02-04', 'try', '0000-00-00', '', 22),
(7, '2022-02-18', 'sadas', '0000-00-00', '', 22),
(8, '2022-03-04', 'asdasda', '0000-00-00', '', 22),
(9, '2022-02-17', 'asdasdasd', '0000-00-00', '', 22),
(10, '2022-02-10', 'asdasdasd', '0000-00-00', '', 22),
(11, '2022-02-19', 'asdasdasd', '0000-00-00', '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `u_mobile` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `u_name`, `email_id`, `u_mobile`, `occupation`, `age`, `gender`, `password`, `address`, `area_id`) VALUES
(22, 'try', 'try@try', '2132332131', 'teacher', 23, 'Male', '080f651e3fcca17df3a47c2cecfcb880', '23,Vivek nagar', 560047),
(23, 'test', 'test@test', '1234567890', 'test1', 18, 'Male', '098f6bcd4621d373cade4e832627b4f6', 'domlur', 560048);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` varchar(10) NOT NULL,
  `driver_name` varchar(25) NOT NULL,
  `driver_contact` char(10) NOT NULL,
  `helper_name` varchar(25) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `driver_name`, `driver_contact`, `helper_name`, `area_id`) VALUES
('KA123BL22', 'Amarnath ', '8072388965', 'Chakro', 560047);

-- --------------------------------------------------------

--
-- Table structure for table `waste_collected`
--

CREATE TABLE `waste_collected` (
  `user_id` int(11) NOT NULL,
  `w_date` date NOT NULL,
  `bio_weight` int(11) DEFAULT NULL,
  `non_bio_weight` int(11) DEFAULT NULL,
  `total_waste_weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waste_collected`
--

INSERT INTO `waste_collected` (`user_id`, `w_date`, `bio_weight`, `non_bio_weight`, `total_waste_weight`) VALUES
(22, '2022-02-01', 23, 22, 45),
(22, '2022-02-02', 24, 24, 48);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_mail`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`),
  ADD KEY `raises` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `lives_in` (`area_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `has_a` (`area_id`);

--
-- Indexes for table `waste_collected`
--
ALTER TABLE `waste_collected`
  ADD PRIMARY KEY (`user_id`,`w_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `raises` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `lives_in` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `has_a` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waste_collected`
--
ALTER TABLE `waste_collected`
  ADD CONSTRAINT `generates` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
