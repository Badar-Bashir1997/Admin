-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 03:15 PM
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

--
-- Dumping data for table `bags_sales`
--

INSERT INTO `bags_sales` (`id`, `Farm_id`, `flock_id`, `qnty_of_bags`, `price`, `b_date`, `p_method`) VALUES
(2, 'badar(sahiwal)', ' Layer2(20/10/2021)', 100, 10000, '2021-10-20', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `broiler_sales`
--

CREATE TABLE `broiler_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `f_id` int(11) NOT NULL,
  `nob_sale` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `desiel`
--

INSERT INTO `desiel` (`id`, `Farm_id`, `flock_id`, `qnty_desiel`, `price`, `d_date`, `p_method`) VALUES
(3, 'badar(sahiwal)', ' Layer2(20/10/2021)', 40, 6000, '2021-10-20', 'Cash');

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
(1, '123_barket(barketmarkeet)', ' Layer(19/10/2021)', '2021-10-20', 400),
(2, '123_barket(barketmarkeet)', ' Layer(19/10/2021)', '2021-10-21', 400),
(3, 'badar(sahiwal)', ' Layer2(20/10/2021)', '2021-10-20', 400),
(4, 'badar(sahiwal)', ' Layer2(20/10/2021)', '2021-10-21', 400);

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
(17, '123_barket(barketmarkeet)', ' Layer(19/10/2021)', '2021-10-20', 200, 'Cash', 4000),
(18, 'badar(sahiwal)', ' Layer2(20/10/2021)', '2021-10-20', 200, 'Cash', 4000);

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
(561, '123_barket(barketmarkeet)', 'Barket', 'barket markeet', 'Layer', '030000000000', 'bdr@gmail.com'),
(562, '123_bdr(bdr,sahiwal)', 'bdr', 'sahiwal', 'Broiler', '030000000000', 'bdr@gmail.com'),
(563, 'badar(sahiwal)', 'badar', 'sahiwal', 'Layer', '030000000000', 'bdr@gmail.com');

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
(5, 'Layer(19/10/2021)', 'Layer', '2021-10-19', '2023-10-19', 666, 66666, '123_barket(barketmarkeet)', 'Layer'),
(6, 'Layer2(20/10/2021)', 'Layer2', '2021-10-20', '2023-10-20', 666, 66666, 'badar(sahiwal)', 'Layer'),
(8, 'xyz(20/10/2021)', 'xyz', '2021-10-20', '2024-11-20', 666, 66666, '123_barket(barketmarkeet)', 'Layer');

-- --------------------------------------------------------

--
-- Table structure for table `layer_sales`
--

CREATE TABLE `layer_sales` (
  `id` int(11) NOT NULL,
  `Farm_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `f_id` int(11) NOT NULL,
  `nob_sale` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `p_method` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL
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
(1, '123_barket_barketmarkeet', 'Layer(19/10/2021)', 20, 5000, '2021-10-13', 'Cash'),
(2, 'badar(sahiwal)', ' Layer2(20/10/2021)', 20, 5000, '2021-10-20', 'Cash');

-- --------------------------------------------------------

--
-- Stand-in structure for view `remaning_eggs`
-- (See below for the actual view)
--
CREATE TABLE `remaning_eggs` (
`flock_id` varchar(100)
,`remaning` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totel_production`
-- (See below for the actual view)
--
CREATE TABLE `totel_production` (
`flock_id` varchar(100)
,`production` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totel_sales`
-- (See below for the actual view)
--
CREATE TABLE `totel_sales` (
`flock_id` varchar(100)
,`sales` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `remaning_eggs`
--
DROP TABLE IF EXISTS `remaning_eggs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remaning_eggs`  AS SELECT `totel_production`.`flock_id` AS `flock_id`, `totel_production`.`production`- `totel_sales`.`sales` AS `remaning` FROM (`totel_production` join `totel_sales` on(`totel_production`.`flock_id` = `totel_sales`.`flock_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `totel_production`
--
DROP TABLE IF EXISTS `totel_production`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totel_production`  AS SELECT `egg_production`.`flock_id` AS `flock_id`, sum(`egg_production`.`noe_p`) AS `production` FROM `egg_production` GROUP BY `egg_production`.`flock_id` ;

-- --------------------------------------------------------

--
-- Structure for view `totel_sales`
--
DROP TABLE IF EXISTS `totel_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totel_sales`  AS SELECT `egg_sales`.`flock_id` AS `flock_id`, sum(`egg_sales`.`noe`) AS `sales` FROM `egg_sales` GROUP BY `egg_sales`.`flock_id` ;

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
-- Indexes for table `menure_sales`
--
ALTER TABLE `menure_sales`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `broiler_sales`
--
ALTER TABLE `broiler_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desiel`
--
ALTER TABLE `desiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `egg_production`
--
ALTER TABLE `egg_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `egg_sales`
--
ALTER TABLE `egg_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=564;

--
-- AUTO_INCREMENT for table `flock`
--
ALTER TABLE `flock`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layer_sales`
--
ALTER TABLE `layer_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menure_sales`
--
ALTER TABLE `menure_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
