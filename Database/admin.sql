-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 03:06 PM
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
  `Password` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Email`, `Password`) VALUES
(1, 'admin@gmail.com', '123');

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
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nob_sale` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broiler_sales`
--

INSERT INTO `broiler_sales` (`id`, `Farm_id`, `flock_id`, `nob_sale`, `sale_date`, `p_method`, `price`) VALUES
(3, '123_barket_barketmarkeet', 'broiler1(21/10/2021)', 100, '2021-10-30', 'Cash', 30000),
(4, '123_barket_barketmarkeet', 'broiler1(21/10/2021)', 50, '2021-10-27', 'Cash', 15000);

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
-- Table structure for table `desiel`
--

CREATE TABLE `desiel` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty_desiel` double NOT NULL,
  `price` double NOT NULL,
  `d_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL
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
  `noe_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `egg_production`
--

INSERT INTO `egg_production` (`id`, `Farm_id`, `flock_id`, `e_date`, `noe_p`) VALUES
(7, 'xyz(sahiwal)', 'Layer(19/10/2021)', '2021-10-30', 400),
(8, 'xyz(sahiwal)', 'Layer(19/10/2021)', '2021-10-31', 400),
(9, 'xy(cc)', 'Layer3(01/10/2021)', '2021-10-30', 400),
(10, 'xyz(sahiwal)', 'Layer(19/10/2021)', '2021-10-28', 400),
(11, '123_Lahore', 'Layer2(20/10/2021)', '2021-10-28', 400);

-- --------------------------------------------------------

--
-- Table structure for table `egg_sales`
--

CREATE TABLE `egg_sales` (
  `id` int(11) NOT NULL,
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

INSERT INTO `egg_sales` (`id`, `Farm_id`, `flock_id`, `Sale_Date`, `noe`, `payment_method`, `price`) VALUES
(31, '123_Lahore', 'Layer2(20/10/2021)', '2021-10-28', 200, 'Cash', 4000),
(32, 'xyz(sahiwal)', 'Layer(19/10/2021)', '2021-10-28', 400, 'Cash', 8000);

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
  `status` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `Farm_id`, `name`, `phone_no`, `email`, `address`, `join_date`, `salary`, `status`) VALUES
(2, '123_barket_barketmarkeet', 'ccc', '+923486332584', 'bdr@gmail.com', 'ccc', '2021-10-28', 10000, 'Active');

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
  `email` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`f_id`, `Farm_id`, `name`, `location`, `Breed_type`, `phone_no`, `email`) VALUES
(568, '123_barket_barketmarkeet', 'Barket', 'barket markeet', 'Broiler', '030000000000', 'bdr@gmail.com'),
(569, 'badar(sahiwal)', 'badar', 'sahiwal', 'Broiler', '030000000000', 'bdr@gmail.com'),
(570, 'xyz(sahiwal)', 'xyz', 'sahiwal', 'Layer', '030000000000', 'bdr@gmail.com'),
(571, '123_Lahore', 'bb', 'lahore', 'Both', '030000000000', 'bdr@gmail.com'),
(572, 'xy(cc)', 'xy', 'cc', 'Layer', '030000000000', 'bdr@gmail.com'),
(574, '(mmm)(sahiwal)', 'mmm', 'sahiwal', 'Layer', '030000000000', 'bdr@gmail.com');

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
  `Breed_type` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flock`
--

INSERT INTO `flock` (`f_id`, `flock_id`, `Flock_name`, `start_date`, `end_date`, `nob`, `Purchase_cost`, `Farm_id`, `Breed_type`) VALUES
(15, 'Layer(19/10/2021)', 'Layer', '2021-10-19', '2023-10-31', 666, 66666, 'xyz(sahiwal)', 'Layer'),
(16, 'Layer2(20/10/2021)', 'Layer2', '2021-10-20', '2023-10-31', 666, 66666, '123_Lahore', 'Layer'),
(17, 'broiler1(21/10/2021)', 'broiler1', '2021-10-21', '2021-12-08', 666, 66666, '123_barket_barketmarkeet', 'Broiler'),
(18, 'broiler2(21/10/2021)', 'broiler2', '2021-10-21', '2021-12-08', 666, 66666, 'badar(sahiwal)', 'Broiler'),
(19, 'flock2(26/10/2021)', 'flock2', '2021-10-26', '2023-10-31', 666, 66666, '123_Lahore', 'Layer'),
(20, 'Layer3(01/10/2021)', 'Layer3', '2021-10-01', '2023-10-26', 666, 66666, 'xy(cc)', 'Layer'),
(21, '(Layer)(2021-10-25)', 'Layer', '2021-10-25', '2023-10-26', 666, 66666, '(mmm)(sahiwal)', 'Layer');

-- --------------------------------------------------------

--
-- Table structure for table `layer_sales`
--

CREATE TABLE `layer_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nob_sale` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `medicine_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL,
  `m_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menure_sales`
--

CREATE TABLE `menure_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty_of_menure` double NOT NULL,
  `price` int(11) NOT NULL,
  `m_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menure_sales`
--

INSERT INTO `menure_sales` (`id`, `Farm_id`, `flock_id`, `qnty_of_menure`, `price`, `m_date`, `p_method`) VALUES
(7, '123_barket_barketmarkeet', 'broiler1(21/10/2021)', 20, 2000, '2021-10-27', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE `misc` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL,
  `m_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `vehicals`
--

CREATE TABLE `vehicals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `model` varchar(100) CHARACTER SET latin1 NOT NULL,
  `reg_no` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicals`
--

INSERT INTO `vehicals` (`id`, `name`, `model`, `reg_no`) VALUES
(1, 'bmw', '2019', '2019-abc');

-- --------------------------------------------------------

--
-- Table structure for table `wood`
--

CREATE TABLE `wood` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `flock_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qnty_wood` double NOT NULL,
  `price` double NOT NULL,
  `w_date` date NOT NULL,
  `payment_method` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`f_id`);

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
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menure_sales`
--
ALTER TABLE `menure_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bags_sales`
--
ALTER TABLE `bags_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `desiel`
--
ALTER TABLE `desiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `egg_production`
--
ALTER TABLE `egg_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `egg_sales`
--
ALTER TABLE `egg_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT for table `flock`
--
ALTER TABLE `flock`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `layer_sales`
--
ALTER TABLE `layer_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menure_sales`
--
ALTER TABLE `menure_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `misc`
--
ALTER TABLE `misc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
