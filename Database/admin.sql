-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 02:52 PM
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
-- Database: `admin`
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
(1, 'admin@gmail.com', '123', 'upload/IMG-20210120-WA0018_1635850049.jpg');

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

--
-- Dumping data for table `bags_sales`
--

INSERT INTO `bags_sales` (`id`, `Farm_id`, `flock_id`, `qnty_of_bags`, `price`, `b_date`, `p_method`) VALUES
(4, 'xy(sahiwal)', 'ahmad(2021-11-06)', 100, 20, '2021-11-08', 'Cash');

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

--
-- Dumping data for table `broiler_sales`
--

INSERT INTO `broiler_sales` (`id`, `Farm_id`, `v_id`, `flock_id`, `nob_sale`, `sale_date`, `p_method`, `price`) VALUES
(15, 'xy(sahiwal)', 3, 'ahmad(2021-11-06)', 50, '2021-11-08', 'Bank', 350);

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

--
-- Dumping data for table `brokers`
--

INSERT INTO `brokers` (`id`, `name`, `phone_no`, `email`, `Address`) VALUES
(1, 'ccc', '+923486332584', 'bdr@gmail.com', 'ccc');

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

--
-- Dumping data for table `brokers_payment`
--

INSERT INTO `brokers_payment` (`id`, `b_id`, `p_id`, `payment_option`, `name`, `balance`, `remaning`, `amount`, `card_no`, `Bank_name`, `Account_no`) VALUES
(6, 1, '6feed', 'Cash', 'ccc', 0, 0, 22000, '', '', ''),
(7, 1, '7feed', 'Cash', 'ccc', 0, 0, 18000, '', '', ''),
(8, 1, '8feed', 'Cash', 'ccc', 0, 0, 20000, '', '', ''),
(9, 1, '13desiel', 'Cash', 'ccc', 0, 0, 6000, '', '', ''),
(11, 1, '3wood', 'Cash', 'ccc', 0, 0, 6000, '', '', ''),
(12, 1, '2medicine', 'Cash', 'ccc', 0, 0, 16000, '', '', ''),
(13, 1, '3medicine', 'Cash', 'ccc', 0, 0, 1600, '', '', ''),
(14, 1, '2misc', 'Cash', 'ccc', 0, 0, 1600, '', '', ''),
(15, 1, '3misc', 'Cash', 'ccc', 0, 0, 1600, '', '', '');

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
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desiel`
--

INSERT INTO `desiel` (`id`, `qnty_desiel`, `remaining`, `price`, `d_date`, `p_method`, `image`) VALUES
(13, 40, 40, 150, '2021-11-08', 'Cash', 'upload/1nf_1636363616.png'),
(14, 45, 40, 150, '2021-11-08', 'Cash', 'upload/1nf_1636363616.png'),
(15, 45, 0, 150, '2021-11-08', 'Cash', 'upload/1nf_1636363616.png');

-- --------------------------------------------------------

--
-- Table structure for table `egg_production`
--

CREATE TABLE `egg_production` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_date` date NOT NULL,
  `noe_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `egg_production`
--

INSERT INTO `egg_production` (`id`, `Farm_id`, `flock_id`, `e_date`, `noe_p`) VALUES
(13, 'Barket(barket markeet)', 'Layer(2021-11-02)', '2021-11-27', 400),
(14, 'Barket(barket markeet)', 'Layer(2021-11-02)', '2021-11-30', 400),
(15, 'Barket(barket markeet)', 'Layer(2021-11-02)', '2021-11-12', 400),
(16, 'Barket(barket markeet)', 'Layer(2021-11-02)', '2021-11-03', 400),
(17, 'badar(sahiwal)', 'Layer2(2021-11-03)', '2021-11-03', 400);

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

--
-- Dumping data for table `egg_sales`
--

INSERT INTO `egg_sales` (`id`, `v_id`, `Farm_id`, `flock_id`, `Sale_Date`, `noe`, `payment_method`, `price`) VALUES
(21, 3, 'Barket(barket markeet)', 'Layer(2021-11-02)', '2021-11-08', 400, 'Bank', 20);

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

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `Farm_id`, `name`, `phone_no`, `email`, `address`, `join_date`, `salary`, `status`, `image`) VALUES
(7, 'badar(sahiwal)', 'bmw', '+923486332584', 'bdr@gmail.com', 'ccc', '2021-11-01', 12000, 'Active', 'upload/_1635749083.'),
(8, 'Barket(barket markeet, lahore)', 'ccc', '+923486332584', 'bdr@gmail.com', 'ccc', '2021-11-01', 12000, 'Active', 'upload/a_1635749427.png'),
(9, 'bb(lahore)', 'ccc', '+923486332584', 'bdr@gmail.com', 'ccc', '2021-11-02', 2222, 'Active', 'upload/IMG-20210120-WA0018_1635850049.jpg'),
(10, 'xy(sahiwal)', 'bmw', '+923486332584', 'bdr@gmail.com', 'ccc', '2021-11-08', 20000, 'Active', 'upload/not normalize_1636360048.png');

-- --------------------------------------------------------

--
-- Table structure for table `expences`
--

CREATE TABLE `expences` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(150) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_date` date NOT NULL,
  `e_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `e_qnty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `f_id` int(11) NOT NULL,
  `Farm_id` varchar(50) NOT NULL,
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
(586, 'xy(sahiwal)', 'xy', 'sahiwal', 'Broiler', '+923000000000', 'bdr@gmail.com', 'ongoing', 1000, '2021-11-02'),
(587, 'Barket(barket markeet)', 'Barket', 'barket markeet', 'Layer', '+923000000000', 'bdr@gmail.com', 'ongoing', 1000, NULL),
(588, 'badar(sahiwal)', 'badar', 'sahiwal', 'Layer', '+923000000000', 'bdr@gmail.com', 'ongoing', 2000, NULL),
(589, 'mmm(lahore)', 'mmm', 'lahore', 'Both', '+923000000000', 'bdr@gmail.com', 'Closed', 2000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `feed_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `f_date` date NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`feed_id`, `name`, `qnty`, `price`, `p_method`, `f_date`, `image`) VALUES
(6, 'ccc', 40, 550, 'Cash', '2021-11-08', 'upload/_1636360629.'),
(7, 'ccc', 30, 600, 'Cash', '2021-11-08', 'upload/normalize_1636360755.png'),
(8, 'ccc', 40, 500, 'Cash', '2021-11-08', 'upload/not normalize_1636360854.png');

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
  `Purchase_cost` double NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Breed_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Status` varchar(100) CHARACTER SET latin1 NOT NULL,
  `closed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flock`
--

INSERT INTO `flock` (`f_id`, `flock_id`, `Flock_name`, `start_date`, `end_date`, `nob`, `Purchase_cost`, `Farm_id`, `Breed_type`, `Status`, `closed_date`) VALUES
(48, 'ahmad(2021-11-02)', 'ahmad', '2021-11-02', '2021-12-09', 666, 66666, 'xy(sahiwal)', 'Broiler', 'Soled', '2021-11-02'),
(49, 'ahmad(2021-11-06)', 'ahmad', '2021-11-06', '2021-12-10', 666, 66666, 'xy(sahiwal)', 'Broiler', 'ongoing', NULL),
(50, 'Layer(2021-11-02)', 'Layer', '2021-11-02', '2023-11-30', 666, 66666, 'Barket(barket markeet)', 'Layer', 'ongoing', NULL),
(51, 'Layer2(2021-11-03)', 'Layer2', '2021-11-03', '2023-11-22', 666, 66666, 'badar(sahiwal)', 'Layer', 'ongoing', NULL),
(52, 'hhh(2021-11-04)', 'hhh', '2021-11-04', '2021-12-11', 666, 66666, 'mmm(lahore)', 'Broiler', 'ongoing', NULL);

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

--
-- Dumping data for table `layer_sales`
--

INSERT INTO `layer_sales` (`id`, `Farm_id`, `v_id`, `flock_id`, `nob_sale`, `s_date`, `p_method`, `price`) VALUES
(3, 'Barket(barket markeet)', 3, 'Layer(2021-11-02)', 50, '2021-11-08', 'Cash', 300),
(4, 'Barket(barket markeet)', 3, 'Layer(2021-11-02)', 50, '2021-11-08', 'Cash', 300);

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

--
-- Dumping data for table `manure_sales`
--

INSERT INTO `manure_sales` (`id`, `Farm_id`, `flock_id`, `qnty_of_manure`, `price`, `m_date`, `p_method`) VALUES
(8, 'xy(sahiwal)', 'ahmad(2021-11-06)', 20, 200, '2021-11-08', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `qnty` int(11) NOT NULL,
  `price` double NOT NULL,
  `m_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `qnty`, `price`, `m_date`, `payment_method`, `image`) VALUES
(2, 'xyz', 0, 400, '2021-11-08', 'Cash', 'upload/_1636365891.'),
(3, 'xyz', 0, 40, '2021-11-08', 'Cash', 'upload/normalize_1636366039.png');

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
  `price` double NOT NULL,
  `m_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `misc`
--

INSERT INTO `misc` (`id`, `b_id`, `name`, `qnty`, `price`, `m_date`, `payment_method`, `image`) VALUES
(2, '1', 'ccc', 40, 40, '2021-11-08', 'Cash', 'upload/_1636368640.'),
(3, '1', 'ccc', 40, 40, '2021-11-08', 'Cash', 'upload/normalize_1636368771.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `remaning_eggs`
-- (See below for the actual view)
--
CREATE TABLE `remaning_eggs` (
`flock_id` varchar(100)
,`re` decimal(33,0)
);

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

--
-- Dumping data for table `vandors`
--

INSERT INTO `vandors` (`v_id`, `name`, `phone_no`, `email`, `Address`) VALUES
(3, 'bdr', '03486332584', 'bdr@gmail.com', '');

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

--
-- Dumping data for table `vandors_payment`
--

INSERT INTO `vandors_payment` (`id`, `v_id`, `s_id`, `payment_option`, `name`, `balance`, `remaning`, `amount`, `card_no`, `Bank_name`, `Account_no`) VALUES
(18, 3, '21egg', 'Bank', 'bdr', 0, 0, 8000, '', 'ubl', '55555'),
(20, 3, '15Broiler', 'Bank', 'bdr', 0, 0, 17500, '', 'ubl', '555555'),
(22, 3, '0Layer', 'Cradit', 'bdr', 0, 0, 15000, '3333', '', ''),
(23, 3, '4Layer', 'Cash', 'bdr', 0, 0, 15000, '', '', '');

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
  `price` double NOT NULL,
  `w_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wood`
--

INSERT INTO `wood` (`id`, `qnty_wood`, `price`, `w_date`, `payment_method`, `image`) VALUES
(2, 10, 600, '2021-11-08', 'Cash', 'upload/2nf_1636364567.png'),
(3, 10, 600, '2021-11-08', 'Cash', 'upload/2nf_1636364592.png');

-- --------------------------------------------------------

--
-- Structure for view `remaning_eggs`
--
DROP TABLE IF EXISTS `remaning_eggs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remaning_eggs`  AS SELECT `egg_production`.`flock_id` AS `flock_id`, ifnull(sum(`egg_production`.`noe_p`),0) - (select ifnull(sum(`egg_sales`.`noe`),0) from `egg_sales` where `egg_sales`.`flock_id` = `egg_production`.`flock_id`) AS `re` FROM `egg_production` GROUP BY `egg_production`.`flock_id` ;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brokers_payment`
--
ALTER TABLE `brokers_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `v_id` (`b_id`);

--
-- Indexes for table `desiel`
--
ALTER TABLE `desiel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egg_production`
--
ALTER TABLE `egg_production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egg_sales`
--
ALTER TABLE `egg_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expences`
--
ALTER TABLE `expences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `flock`
--
ALTER TABLE `flock`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `layer_sales`
--
ALTER TABLE `layer_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manure_sales`
--
ALTER TABLE `manure_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `v_id` (`v_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bags_sales`
--
ALTER TABLE `bags_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brokers_payment`
--
ALTER TABLE `brokers_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `desiel`
--
ALTER TABLE `desiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `egg_production`
--
ALTER TABLE `egg_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `egg_sales`
--
ALTER TABLE `egg_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expences`
--
ALTER TABLE `expences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=590;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flock`
--
ALTER TABLE `flock`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `layer_sales`
--
ALTER TABLE `layer_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manure_sales`
--
ALTER TABLE `manure_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc`
--
ALTER TABLE `misc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vandors`
--
ALTER TABLE `vandors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vandors_payment`
--
ALTER TABLE `vandors_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vandors_payment`
--
ALTER TABLE `vandors_payment`
  ADD CONSTRAINT `vandors_payment_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vandors` (`v_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
