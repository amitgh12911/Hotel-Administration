-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 10:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_administration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `sr_no` int(11) NOT NULL,
  `admin_email_id` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`sr_no`, `admin_email_id`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer_message`
--

CREATE TABLE `customer_message` (
  `sr_no` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `alternate_mobile_number` bigint(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_message`
--

INSERT INTO `customer_message` (`sr_no`, `first_name`, `last_name`, `mobile_number`, `alternate_mobile_number`, `email_id`, `message`, `Date`) VALUES
(16, 'Amit', 'Jha', 9321079531, 7021211857, 'amitdbg007@gmail.com', 'I want to contact the admin.', '2022-04-18 13:05:26'),
(17, 'Ayushi', 'Jain', 9876543210, 9638527410, 'ayushijain@gmail.com', 'The hotel is wonderful and I like to stay forever in the hotel.', '2022-04-18 13:07:23'),
(18, 'Ayushi', 'Jain', 9876543210, 9638527410, 'ayushijain@gmail.com', 'And the food of this hotel is so delicious.', '2022-04-18 13:07:51'),
(19, 'Kiran', 'Rao', 9897656412, 9685741223, 'kiran123@gmail.com', 'The staffs are working as per customer required.', '2022-04-18 13:08:49'),
(20, 'Kiran', 'Rao', 9897656412, 9685741223, 'kiran123@gmail.com', 'But the room is no cleaning well so they should focus on it.', '2022-04-18 13:12:57'),
(21, 'Sumesh', 'Yadav', 8108028845, 9321012451, 'sumeshyadav123@gmail.com', 'It is that hotel which I have required to do my business projects.', '2022-04-18 13:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `sr_no` int(11) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `alternate_mobile_number` varchar(15) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `room_rate` varchar(50) NOT NULL,
  `check_in_value` varchar(50) NOT NULL,
  `check_out_value` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `expiry` varchar(50) NOT NULL,
  `cvv_or_cvc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`sr_no`, `person_name`, `email_id`, `mobile_number`, `alternate_mobile_number`, `room_type`, `room_no`, `room_rate`, `check_in_value`, `check_out_value`, `total_amount`, `card_number`, `expiry`, `cvv_or_cvc`) VALUES
(50, 'Amit Jha', 'amitdbg007@gmail.com', '9321079531', '7021211857', 'Single Room', '101', '1000', '2022-04-23', '2022-05-08', '₹16000', '1234565221233654', '2025-08', '124');

-- --------------------------------------------------------

--
-- Table structure for table `registration_form`
--

CREATE TABLE `registration_form` (
  `sr_no` int(11) NOT NULL,
  `first_name` varchar(11) NOT NULL,
  `last_name` varchar(11) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `alternate_mobile_number` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `residential_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `aadhaar_card_number` varchar(12) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `confirm_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_form`
--

INSERT INTO `registration_form` (`sr_no`, `first_name`, `last_name`, `mobile_number`, `alternate_mobile_number`, `email_id`, `residential_address`, `permanent_address`, `aadhaar_card_number`, `user_password`, `confirm_password`) VALUES
(16, 'Amit', 'Jha', '9321079531', '7021211857', 'amitdbg007@gmail.com', 'Kisan Nagar No. 2 Indira Nagar Chawl Road No.21 Room No. 10 Near Shiv Sena Office Wagle Estate Thane:400604', 'Darbhanga(Bihar)', '654522121545', '123456', '123456'),
(17, 'Kiran', 'Rao', '9897656412', '9685741223', 'kiran123@gmail.com', 'New Mumbai (Panvel)', 'Rajasthan', '121245457878', 'kiranrao', 'kiranrao'),
(18, 'Ayushi', 'Jain', '9876543210', '9638527410', 'ayushijain@gmail.com', 'New Mumbai', 'Rajasthan', '123456789987', 'ayushijain', 'ayushijain'),
(19, 'Sumesh', 'Yadav', '8108028845', '9321012451', 'sumeshyadav123@gmail.com', 'Near Nitin Company', 'Utterpradesh(UP)', '548675846986', 'sumeshyadav', 'sumeshyadav'),
(23, 'Tejas', 'Vinod', '7021211857', '8652659565', 'tejas123@gmail.com', 'Indra Nagar Chawl, Kisan Nagar No. 02 Near Shiv Sena Office', 'Wagle Industrial Estate, Thane(W)-400604', '120100101010', 'tejas', 'tejas');

-- --------------------------------------------------------

--
-- Table structure for table `room_availability`
--

CREATE TABLE `room_availability` (
  `sr_no` int(30) NOT NULL,
  `room_no` int(30) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `rate` double NOT NULL,
  `availability` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_availability`
--

INSERT INTO `room_availability` (`sr_no`, `room_no`, `room_type`, `rate`, `availability`) VALUES
(1, 101, 'Single', 1000, '0'),
(2, 102, 'Double', 2000, '1'),
(3, 103, 'Triple', 3000, '1'),
(4, 104, 'Quad', 4000, '1'),
(5, 105, 'Queen', 5000, '1'),
(6, 106, 'King', 6000, '1'),
(7, 107, 'Twin', 7000, '1'),
(8, 108, 'Double-double', 8000, '1'),
(9, 109, 'Studio', 9000, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `customer_message`
--
ALTER TABLE `customer_message`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `registration_form`
--
ALTER TABLE `registration_form`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `room_availability`
--
ALTER TABLE `room_availability`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_message`
--
ALTER TABLE `customer_message`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `registration_form`
--
ALTER TABLE `registration_form`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `room_availability`
--
ALTER TABLE `room_availability`
  MODIFY `sr_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
