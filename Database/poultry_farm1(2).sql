-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 03:03 PM
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
-- Database: `poultry_farm1`
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
(2, 'admin@gmail.com', '123', 'upload/IMG-20210120-WA0018_16358500491.png');

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
-- Table structure for table `blns_rmng_mata`
--

CREATE TABLE `blns_rmng_mata` (
  `id` int(11) NOT NULL,
  `v_b_id` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mata_key` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mata_value` int(11) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `broiler_sales`
--

CREATE TABLE `broiler_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `b_id` int(11) NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nob_sale` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `broker`
--

CREATE TABLE `broker` (
  `b_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(100) CHARACTER SET latin1 NOT NULL,
  `id_card` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `remaining` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `bank_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `account_number` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brokers_payment`
--

CREATE TABLE `brokers_payment` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
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
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `join_date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `image` varchar(400) CHARACTER SET latin1 NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `activity` varchar(50) CHARACTER SET latin1 DEFAULT NULL
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
  `b_id` int(11) NOT NULL,
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
  `farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `e_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sub_type` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_qnty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expences`
--

INSERT INTO `expences` (`id`, `farm_id`, `flock_id`, `e_date`, `e_name`, `sub_type`, `e_qnty`, `price`) VALUES
(1, '1', '1', '2021-11-30 19:00:00.000000', 'Flock', 'No', 100000, 4000000),
(2, '4', '2', '2021-11-30 19:00:00.000000', 'Flock', 'No', 100000, 4500000);

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farm_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Breed_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(15) CHARACTER SET latin1 NOT NULL,
  `Status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bird_capacity` int(11) NOT NULL,
  `Closed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farm_id`, `name`, `location`, `Breed_type`, `phone_no`, `Status`, `bird_capacity`, `Closed_date`) VALUES
(1, 'bdr', 'ddd', 'Broiler', '+923000000000', 'ongoing', 100000, NULL),
(2, 'bb', 'bb', 'Broiler', '+923000000000', 'Available', 100000, NULL),
(3, 'cc', 'cc', 'Broiler', '+923000000000', 'Available', 100000, NULL),
(4, 'mmm', 'mmm', 'Layer', '+923000000000', 'ongoing', 999999, NULL),
(5, 'nnn', 'nnn', 'Broiler', '+923480000000', 'Available', 88888, NULL);

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
  `flock_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `Flock_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `nob` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `mortality` int(11) NOT NULL,
  `Purchase_cost` double NOT NULL,
  `Breed_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Status` varchar(100) CHARACTER SET latin1 NOT NULL,
  `closed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flock`
--

INSERT INTO `flock` (`flock_id`, `farm_id`, `Flock_name`, `start_date`, `end_date`, `nob`, `remaining`, `mortality`, `Purchase_cost`, `Breed_type`, `Status`, `closed_date`) VALUES
(1, 1, 'Broiler1', '2021-12-01', '2022-01-07', 100000, 100000, 0, 40, 'Broiler', 'ongoing', NULL),
(2, 4, 'Layer2', '2021-12-01', '2022-12-23', 100000, 99000, 0, 45, 'Layer', 'ongoing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flock_mata`
--

CREATE TABLE `flock_mata` (
  `id` int(11) NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mata_key` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mata_value` varchar(200) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layer_sales`
--

CREATE TABLE `layer_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `b_id` int(11) NOT NULL,
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
  `v_id` varchar(50) CHARACTER SET latin1 NOT NULL,
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
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `flock_id` int(11) NOT NULL,
  `p_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `p_date` date NOT NULL,
  `qnty` int(11) NOT NULL,
  `remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `flock_id`, `p_name`, `p_date`, `qnty`, `remaining`) VALUES
(1, 2, 'Egg', '2021-12-01', 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `price_per_unit` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `remaining_amount` int(11) NOT NULL,
  `balance_amount` int(11) NOT NULL,
  `payment_method` varchar(20) CHARACTER SET latin1 NOT NULL,
  `purchase_date` date NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL,
  `v_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `name`, `type`, `qnty`, `remaining`, `price_per_unit`, `total_price`, `paid_amount`, `remaining_amount`, `balance_amount`, `payment_method`, `purchase_date`, `image`, `v_id`) VALUES
(1, 'Feed', 'ddd', 333, 333, 333, 110889, 0, 0, 0, 'Cash', '2021-12-01', 'upload/Feed/_1639466237.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `flock_id` int(11) NOT NULL,
  `sale_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sale_type` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sale_qnty` int(11) NOT NULL,
  `price_per_unit` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `recived_amount` int(11) NOT NULL,
  `payment_method` varchar(20) CHARACTER SET latin1 NOT NULL,
  `b_id` int(11) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `sale_date` date NOT NULL,
  `remaining` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `flock_id`, `sale_name`, `sale_type`, `sale_qnty`, `price_per_unit`, `total_price`, `recived_amount`, `payment_method`, `b_id`, `d_id`, `sale_date`, `remaining`, `balance`) VALUES
(1, 2, 'Bird', 'per_bird', 1000, 200, 200000, 2000, 'Cash', 0, 0, '2021-12-14', 198000, 0);

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
(2, 'qweqweqw', '+923000000000', 'xyz@gmail.com', 'sahiqwal', 'upload/settings/brokersbroiler_1637733167_1638336690.png', 'upload/settings/broiler_1638277179.png');

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
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `v_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_card` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bank_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `account_number` varchar(50) CHARACTER SET latin1 NOT NULL,
  `balance` int(11) DEFAULT NULL,
  `remaining` int(11) DEFAULT NULL,
  `image` varchar(150) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payment`
--

CREATE TABLE `vendor_payment` (
  `id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
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
-- Indexes for table `blns_rmng_mata`
--
ALTER TABLE `blns_rmng_mata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Farm_id` (`Farm_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `broker`
--
ALTER TABLE `broker`
  ADD PRIMARY KEY (`b_id`);

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
-- Indexes for table `driver`
--
ALTER TABLE `driver`
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
  ADD KEY `Farm_id` (`farm_id`,`flock_id`),
  ADD KEY `flock_id` (`flock_id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`farm_id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `flock`
--
ALTER TABLE `flock`
  ADD PRIMARY KEY (`flock_id`);

--
-- Indexes for table `flock_mata`
--
ALTER TABLE `flock_mata`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `broker`
--
ALTER TABLE `broker`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brokers_payment`
--
ALTER TABLE `brokers_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desiel`
--
ALTER TABLE `desiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `egg_production`
--
ALTER TABLE `egg_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `egg_sales`
--
ALTER TABLE `egg_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expences`
--
ALTER TABLE `expences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flock`
--
ALTER TABLE `flock`
  MODIFY `flock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flock_mata`
--
ALTER TABLE `flock_mata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
