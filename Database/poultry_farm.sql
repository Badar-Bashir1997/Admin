-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 02:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poultry_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Email`, `Password`, `image`) VALUES
(2, 'admin@gmail.com', '123', 'upload/IMG-20210120-WA0018_1635850049.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bags_sales`
--

CREATE TABLE `bags_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty_of_bags` int(11) NOT NULL,
  `price` double NOT NULL,
  `b_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `broiler_sales`
--

CREATE TABLE `broiler_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_id` int(11) NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nob_sale` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brokers_payment`
--

CREATE TABLE `brokers_payment` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `p_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_option` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `balance` int(11) NOT NULL,
  `remaning` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `card_no` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Bank_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Account_no` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `desiel`
--

CREATE TABLE `desiel` (
  `id` int(11) NOT NULL,
  `qnty_desiel` double NOT NULL,
  `remaining` int(11) NOT NULL,
  `price` double NOT NULL,
  `d_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `egg_production`
--

CREATE TABLE `egg_production` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_date` date NOT NULL,
  `noe_p` int(11) NOT NULL,
  `remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `egg_sales`
--

CREATE TABLE `egg_sales` (
  `id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Sale_Date` date NOT NULL,
  `noe` int(11) NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `join_date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expences`
--

CREATE TABLE `expences` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_date` date NOT NULL,
  `e_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sub_type` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_qnty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expences`
--

INSERT INTO `expences` (`id`, `Farm_id`, `flock_id`, `e_date`, `e_name`, `sub_type`, `e_qnty`, `price`) VALUES
(14, 'Barket(sahiwal)', 'broiler1(2021-11-15)', '2021-11-15', 'Flock', 'No', 9999, 449955),
(15, 'Barket(lahore)', 'ahmad(2021-11-15)', '2021-11-15', 'Flock', 'No', 20000, 900000);

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `f_id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Breed_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bird_capacity` int(11) NOT NULL,
  `Closed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`f_id`, `Farm_id`, `name`, `location`, `Breed_type`, `phone_no`, `email`, `Status`, `bird_capacity`, `Closed_date`) VALUES
(18, 'Barket(sahiwal)', 'Barket', 'sahiwal', 'Broiler', '+923000000000', 'test@test.com', 'ongoing', 40000, NULL),
(19, 'Barket(lahore)', 'Barket', 'lahore', 'Broiler', '+923000000000', 'test@test.com', 'ongoing', 40000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `feed_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `f_date` date NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flock`
--

CREATE TABLE `flock` (
  `f_id` int(11) NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Flock_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `nob` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `Purchase_cost` double NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Breed_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Status` varchar(100) CHARACTER SET latin1 NOT NULL,
  `closed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flock`
--

INSERT INTO `flock` (`f_id`, `flock_id`, `Flock_name`, `start_date`, `end_date`, `nob`, `remaining`, `Purchase_cost`, `Farm_id`, `Breed_type`, `Status`, `closed_date`) VALUES
(14, 'broiler1(2021-11-15)', 'broiler1', '2021-11-15', '2021-12-23', 9999, 9999, 45, 'Barket(sahiwal)', 'Broiler', 'Delete', NULL),
(15, 'ahmad(2021-11-15)', 'ahmad', '2021-11-15', '2021-12-30', 20000, 20000, 45, 'Barket(lahore)', 'Broiler', 'Delete', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `layer_sales`
--

CREATE TABLE `layer_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_id` int(11) NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nob_sale` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manure_sales`
--

CREATE TABLE `manure_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty_of_manure` double NOT NULL,
  `price` int(11) NOT NULL,
  `m_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `qnty` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `price` double NOT NULL,
  `m_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menure_production`
--

CREATE TABLE `menure_production` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `m_date` date NOT NULL,
  `manure_p` int(11) NOT NULL,
  `remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `u_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date_time` datetime NOT NULL,
  `u_image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `m_status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `message` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE `misc` (
  `id` int(11) NOT NULL,
  `b_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `price` double NOT NULL,
  `m_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sale_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `s_qnty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `s_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `favicon` varchar(100) CHARACTER SET latin1 NOT NULL,
  `logo` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `phone_no`, `email`, `Address`, `favicon`, `logo`) VALUES
(2, 'badar', '+923000000000', 'xyz@gmail.com', 'sahiwal', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `u_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL,
  `join_date` date NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vandors`
--

CREATE TABLE `vandors` (
  `v_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vandors_payment`
--

CREATE TABLE `vandors_payment` (
  `id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `s_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_option` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `balance` int(11) NOT NULL,
  `remaning` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `card_no` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Bank_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Account_no` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicals`
--

CREATE TABLE `vehicals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `model` varchar(100) CHARACTER SET latin1 NOT NULL,
  `reg_no` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wood`
--

CREATE TABLE `wood` (
  `id` int(11) NOT NULL,
  `qnty_wood` double NOT NULL,
  `remaining` int(11) NOT NULL,
  `price` double NOT NULL,
  `w_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bags_sales`
--
ALTER TABLE `bags_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brokers_payment`
--
ALTER TABLE `brokers_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desiel`
--
ALTER TABLE `desiel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egg_production`
--
ALTER TABLE `egg_production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `egg_sales`
--
ALTER TABLE `egg_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`);

--
-- Indexes for table `expences`
--
ALTER TABLE `expences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`,`flock_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `Farm_id` (`Farm_id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `flock`
--
ALTER TABLE `flock`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `Farm_id` (`Farm_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `layer_sales`
--
ALTER TABLE `layer_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`,`flock_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `manure_sales`
--
ALTER TABLE `manure_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`,`flock_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menure_production`
--
ALTER TABLE `menure_production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`,`flock_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`,`flock_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vandors`
--
ALTER TABLE `vandors`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vandors_payment`
--
ALTER TABLE `vandors_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wood`
--
ALTER TABLE `wood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bags_sales`
--
ALTER TABLE `bags_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brokers_payment`
--
ALTER TABLE `brokers_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `desiel`
--
ALTER TABLE `desiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `egg_production`
--
ALTER TABLE `egg_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `egg_sales`
--
ALTER TABLE `egg_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expences`
--
ALTER TABLE `expences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flock`
--
ALTER TABLE `flock`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `layer_sales`
--
ALTER TABLE `layer_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manure_sales`
--
ALTER TABLE `manure_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menure_production`
--
ALTER TABLE `menure_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc`
--
ALTER TABLE `misc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vandors`
--
ALTER TABLE `vandors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vandors_payment`
--
ALTER TABLE `vandors_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bags_sales`
--
ALTER TABLE `bags_sales`
  ADD CONSTRAINT `bags_sales_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bags_sales_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  ADD CONSTRAINT `broiler_sales_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `broiler_sales_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `egg_production`
--
ALTER TABLE `egg_production`
  ADD CONSTRAINT `egg_production_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `egg_production_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `egg_sales`
--
ALTER TABLE `egg_sales`
  ADD CONSTRAINT `egg_sales_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `egg_sales_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expences`
--
ALTER TABLE `expences`
  ADD CONSTRAINT `expences_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expences_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flock`
--
ALTER TABLE `flock`
  ADD CONSTRAINT `flock_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layer_sales`
--
ALTER TABLE `layer_sales`
  ADD CONSTRAINT `layer_sales_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layer_sales_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manure_sales`
--
ALTER TABLE `manure_sales`
  ADD CONSTRAINT `manure_sales_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manure_sales_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menure_production`
--
ALTER TABLE `menure_production`
  ADD CONSTRAINT `menure_production_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menure_production_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Farm_id`) REFERENCES `farm` (`Farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`flock_id`) REFERENCES `flock` (`flock_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
