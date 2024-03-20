-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 02:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_airline_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'Skyline Admin', 'admin', 'Skylineairways@gmail.com', '2024-03-20 06:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `res_records`
--

CREATE TABLE `res_records` (
  `res_id` int(11) NOT NULL,
  `res_fname` varchar(100) NOT NULL,
  `res_lname` varchar(100) NOT NULL,
  `res_email` varchar(100) NOT NULL,
  `res_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res_records`
--

INSERT INTO `res_records` (`res_id`, `res_fname`, `res_lname`, `res_email`, `res_pass`) VALUES
(2, 'Earl', 'Sepida', 'earlsepida63@gmail.com', '$2y$10$gvggz01lgcQZ8dK9TABS0e1QISjhtUaE5fI91LUKbK0uepecisbAO');

-- --------------------------------------------------------

--
-- Table structure for table `sf_records`
--

CREATE TABLE `sf_records` (
  `sf_id` int(11) NOT NULL,
  `sf_departure_location` varchar(200) NOT NULL,
  `sf_arrival_location` varchar(200) NOT NULL,
  `sf_departure_datetime` datetime NOT NULL,
  `sf_arrival_datetime` datetime NOT NULL,
  `sf_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_records`
--

INSERT INTO `sf_records` (`sf_id`, `sf_departure_location`, `sf_arrival_location`, `sf_departure_datetime`, `sf_arrival_datetime`, `sf_price`) VALUES
(1, 'Cagayan De Oro', 'Palawan', '2024-04-09 15:00:00', '2024-04-09 19:10:00', 4000.00),
(2, 'Cagayan De Oro', 'Palawan', '2024-04-09 04:00:00', '2024-04-09 06:00:00', 3500.00),
(3, 'Cagayan De Oro', 'Palawan', '2024-04-09 10:00:00', '2024-04-09 15:00:00', 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_records`
--
ALTER TABLE `res_records`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `sf_records`
--
ALTER TABLE `sf_records`
  ADD PRIMARY KEY (`sf_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `res_records`
--
ALTER TABLE `res_records`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sf_records`
--
ALTER TABLE `sf_records`
  MODIFY `sf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
