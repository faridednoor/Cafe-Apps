-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 02:16 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(125) NOT NULL,
  `admin_user` varchar(125) NOT NULL,
  `admin_pass` varchar(125) NOT NULL,
  `admin_email` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_user`, `admin_pass`, `admin_email`) VALUES
(1, 'admin', 'admin123', 'admin123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `drink_id` int(11) NOT NULL,
  `drink_name` varchar(255) NOT NULL,
  `drink_price` decimal(4,2) NOT NULL,
  `drink_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`drink_id`, `drink_name`, `drink_price`, `drink_image`) VALUES
(2, 'Teh Ais', '1.50', 'teh ais.jpg'),
(3, 'Milo O Ais', '2.00', 'milo ais.jpg'),
(4, 'Kopi O Ais', '1.00', 'kopi o ais.jpg'),
(5, 'Kopi Ais', '2.00', 'kopi ais.jpg'),
(6, 'Sirap Ais', '1.00', 'sirap ais.jpg'),
(7, 'Orange Juice', '2.00', 'Jus Oren.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` decimal(4,2) NOT NULL,
  `food_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`, `food_image`) VALUES
(2, 'Nasi Goreng Ayam', '5.00', 'nasi goreng ayam.jpg'),
(3, 'Mee Goreng + Telur Mata', '3.50', 'mee goreng.JPG'),
(4, 'Bihun Goreng +Telur Mata', '3.50', 'bihun goreng.jpg'),
(5, 'Kuey Teow Goreng', '3.50', 'kuey teow goreng.jpg'),
(6, 'Maggi Goreng', '3.50', 'maggi goreng.jpg'),
(9, 'Spaghetti Carbonara', '5.50', 'spaghetti meatball.jpg'),
(10, 'Nasi Goreng + Telur Mata', '3.50', 'nasi goreng telur mata.jpg'),
(12, 'Nasi Lemak Ayam', '5.50', 'nasi lemak ayam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `detail_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `deliver` int(11) NOT NULL,
  `food` int(11) NOT NULL,
  `num_food` int(11) NOT NULL,
  `drink` int(11) NOT NULL,
  `num_drink` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`detail_id`, `stud_id`, `order_time`, `deliver`, `food`, `num_food`, `drink`, `num_drink`, `total`) VALUES
(79, 9, '2019-05-30 06:03:28', 1, 3, 2, 0, 0, '7.00'),
(81, 9, '2019-05-30 06:06:06', 7, 9, 2, 3, 2, '15.00'),
(82, 9, '2019-05-30 06:07:25', 6, 2, 4, 1, 4, '24.00'),
(83, 11, '2019-05-30 06:08:13', 5, 10, 2, 4, 1, '8.00'),
(85, 11, '2019-05-30 06:09:42', 7, 12, 1, 3, 1, '7.50'),
(86, 11, '2019-05-30 06:10:29', 2, 3, 1, 6, 1, '4.50'),
(87, 11, '2019-05-30 06:11:09', 3, 12, 3, 1, 2, '18.50'),
(88, 11, '2019-05-30 06:11:56', 4, 5, 2, 7, 3, '13.00'),
(89, 10, '2019-05-30 06:12:49', 7, 2, 2, 2, 1, '11.50'),
(90, 10, '2019-05-30 06:13:09', 1, 3, 2, 1, 2, '9.00'),
(91, 10, '2019-05-30 06:13:39', 3, 4, 1, 0, 0, '3.50'),
(92, 10, '2019-05-30 06:14:00', 6, 9, 5, 6, 5, '32.50'),
(93, 12, '2019-05-30 06:14:38', 5, 4, 2, 5, 1, '9.00'),
(94, 12, '2019-05-30 06:14:55', 7, 4, 4, 3, 2, '18.00'),
(95, 12, '2019-05-30 06:15:07', 2, 3, 2, 1, 2, '9.00'),
(96, 9, '2019-05-30 07:11:27', 6, 5, 3, 1, 2, '12.50'),
(97, 13, '2019-05-30 12:16:28', 3, 2, 1, 2, 1, '6.50');

-- --------------------------------------------------------

--
-- Table structure for table `place_deliver`
--

CREATE TABLE `place_deliver` (
  `deliver_id` int(11) NOT NULL,
  `place` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_deliver`
--

INSERT INTO `place_deliver` (`deliver_id`, `place`, `time`) VALUES
(1, 'FKEKK', '11:00 AM'),
(2, 'FKE', '11:20 AM'),
(3, 'Pusat Sukan', '11:40 AM'),
(4, 'PPP', '12:00 PM'),
(5, 'PBPI', '12:20 PM'),
(6, 'FKP/PPS', '12:40 PM'),
(7, 'FTMK', '1:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(125) NOT NULL,
  `staff_user` varchar(125) NOT NULL,
  `staff_pass` varchar(125) NOT NULL,
  `staff_email` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_user`, `staff_pass`, `staff_email`) VALUES
(6, 'Amir', 'amirr123', '4e72fc71d6afe049572655387d0f5346', 'amir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_name` varchar(125) NOT NULL,
  `stud_matrix` varchar(125) NOT NULL,
  `stud_user` varchar(125) NOT NULL,
  `stud_pass` varchar(125) NOT NULL,
  `stud_email` varchar(125) NOT NULL,
  `stud_depart` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_name`, `stud_matrix`, `stud_user`, `stud_pass`, `stud_email`, `stud_depart`) VALUES
(9, 'Husni Muiz', 'B031710332', 'husni123', '4c909c3b5540e24b2ca2b6cfbbfa72d9', 'husnuzon@gmail.com', 'FTMK'),
(10, 'Fitri Sultan', 'B031610932', 'fitri123', '8ac99bb12b7c18e27d06fd34fe1203fc', 'fitrisultan@gmail.com', 'FTMK'),
(11, 'Azhan Mazlan', 'B031412033', 'azhan_123', '32c0fe5c9863ebf79bb793a710eab3de', 'azhanmazlan@gmail.com', 'FTMK'),
(12, 'Syazwan Basiron', 'B031711003', 'wansyaz123', 'c9d329c0765777980e7c77dfb06ecccb', 'syazwan97@gmail.com', 'FTMK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`drink_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `place_deliver`
--
ALTER TABLE `place_deliver`
  ADD PRIMARY KEY (`deliver_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `drink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `place_deliver`
--
ALTER TABLE `place_deliver`
  MODIFY `deliver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
