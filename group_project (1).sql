-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 26, 2023 at 02:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `tax_id` varchar(50) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `firstname`, `middlename`, `lastname`, `contact_no`, `address`, `email`, `tax_id`, `date_created`) VALUES
(1, 'John', 'C', 'Smith', '+16554 454654', 'Sample address', 'jsmith@sample.com', '789845-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `loan_type` varchar(30) NOT NULL DEFAULT 'Emergency',
  `loan_plan` varchar(30) NOT NULL DEFAULT '3_months',
  `loan_amount` int(20) NOT NULL,
  `interest` int(20) NOT NULL,
  `balance` int(6) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'waiting approval',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `email`, `loan_type`, `loan_plan`, `loan_amount`, `interest`, `balance`, `status`, `date`) VALUES
(3, 'Codex World', 'Emergency', '3_months', 2000, 0, 0, 'waiting approval', '2023-04-03 21:00:00'),
(4, 'Peter Kim', 'Emergency', '3_months', 2000, 0, 0, 'waiting approval', '2023-04-03 21:00:00'),
(5, 'clinton Odwor', 'Business', '1_year', 3000, 0, 0, 'waiting approval', '2023-04-04 21:00:00'),
(6, 'mkulima@gmail.com', 'Emergency', '3_months', 7000, 0, 0, 'waiting approval', '2023-04-12 12:22:03'),
(7, 'mkulima@gmail.com', 'Other Plans', '3_months', 8888, 1155, 10043, 'Denied', '2023-04-12 12:29:52'),
(8, 'mkulima@gmail.com', 'Emergency', '3_months', 8887, 1155, 542, 'Repaying', '2023-04-12 13:17:34'),
(9, 'faithk@gmail.com', 'Other Plans', '3_months', 5000, 650, 3650, 'Repaying', '2023-04-12 13:50:53'),
(10, 'faithk@gmail.com', 'Emergency', '3_months', 400000, 52000, 452000, 'waiting approval', '2023-04-12 13:55:05'),
(11, 'faithk@gmail.com', 'Emergency', '3_months', 88800, 11544, 100344, 'waiting approval', '2023-04-12 13:58:48'),
(12, 'faithk@gmail.com', 'Emergency', '3_months', 2000, 260, 2260, 'waiting approval', '2023-04-12 13:59:25'),
(13, 'klint@gmail.com', 'Business', '1_year', 2147483647, 390000000, 2147283647, 'Approved', '2023-04-12 14:03:32'),
(14, 'mkulima@gmail.com', 'Business', '3_months', 2000, 260, 2260, 'Approved', '2023-04-19 10:27:48'),
(15, 'mkulima@gmail.com', 'Emergency', '3_months', 46000, 5980, 51980, 'waiting approval', '2023-04-19 11:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `loan_list`
--

CREATE TABLE `loan_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `loan_type_id` int(30) NOT NULL,
  `borrower_id` int(30) NOT NULL,
  `purpose` text NOT NULL,
  `amount` double NOT NULL,
  `plan_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= request, 1= confrimed,2=released,3=complteted,4=denied\r\n',
  `date_released` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_list`
--

INSERT INTO `loan_list` (`id`, `ref_no`, `loan_type_id`, `borrower_id`, `purpose`, `amount`, `plan_id`, `status`, `date_released`, `date_created`) VALUES
(3, '81409630', 1, 1, 'Sample Only', 100000, 1, 2, '2020-09-26 09:06:00', '2020-09-26 15:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `loan_plan`
--

CREATE TABLE `loan_plan` (
  `id` int(30) NOT NULL,
  `months` int(11) NOT NULL,
  `interest_percentage` float NOT NULL,
  `penalty_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_plan`
--

INSERT INTO `loan_plan` (`id`, `months`, `interest_percentage`, `penalty_rate`) VALUES
(1, 36, 8, 3),
(2, 24, 5, 2),
(3, 27, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loan_schedules`
--

CREATE TABLE `loan_schedules` (
  `id` int(30) NOT NULL,
  `loan_id` int(30) NOT NULL,
  `date_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_schedules`
--

INSERT INTO `loan_schedules` (`id`, `loan_id`, `date_due`) VALUES
(2, 3, '2020-10-26'),
(3, 3, '2020-11-26'),
(4, 3, '2020-12-26'),
(5, 3, '2021-01-26'),
(6, 3, '2021-02-26'),
(7, 3, '2021-03-26'),
(8, 3, '2021-04-26'),
(9, 3, '2021-05-26'),
(10, 3, '2021-06-26'),
(11, 3, '2021-07-26'),
(12, 3, '2021-08-26'),
(13, 3, '2021-09-26'),
(14, 3, '2021-10-26'),
(15, 3, '2021-11-26'),
(16, 3, '2021-12-26'),
(17, 3, '2022-01-26'),
(18, 3, '2022-02-26'),
(19, 3, '2022-03-26'),
(20, 3, '2022-04-26'),
(21, 3, '2022-05-26'),
(22, 3, '2022-06-26'),
(23, 3, '2022-07-26'),
(24, 3, '2022-08-26'),
(25, 3, '2022-09-26'),
(26, 3, '2022-10-26'),
(27, 3, '2022-11-26'),
(28, 3, '2022-12-26'),
(29, 3, '2023-01-26'),
(30, 3, '2023-02-26'),
(31, 3, '2023-03-26'),
(32, 3, '2023-04-26'),
(33, 3, '2023-05-26'),
(34, 3, '2023-06-26'),
(35, 3, '2023-07-26'),
(36, 3, '2023-08-26'),
(37, 3, '2023-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(30) NOT NULL,
  `type_name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `type_name`, `description`) VALUES
(1, 'Small Business', 'Small Business Loans'),
(2, 'Mortgages', 'Mortgages'),
(3, 'Personal Loans', 'Personal Loans');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `loan_id` int(30) NOT NULL,
  `payee` text NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `penalty_amount` float NOT NULL DEFAULT 0,
  `overdue` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=no , 1 = yes',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `loan_id`, `payee`, `amount`, `penalty_amount`, `overdue`, `date_created`) VALUES
(2, 3, 'Smith, John C', 3000, 0, 0, '2020-09-26 15:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `email` varchar(50) NOT NULL,
  `amount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`email`, `amount`) VALUES
('mkulima@gmail.com', 29274),
('faithk@gmail.com', 2000),
('klint@gmail.com', 0),
('admin@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(100) NOT NULL,
  `deposit` int(100) NOT NULL,
  `withdraw` int(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `youths`
--

CREATE TABLE `youths` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(10) NOT NULL,
  `age` int(2) NOT NULL,
  `national_id` int(8) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youths`
--

INSERT INTO `youths` (`id`, `name`, `email`, `contact`, `age`, `national_id`, `password`, `user_type`, `image`) VALUES
(4, 'Faith Karuga', 'faith@gmail.com', 741470884, 22, 32356263, '2e65f2f2fdaf6c699b223c61b1b5ab89', 'admin', 'Malick.jpg'),
(5, 'Leaky', 'leaky@gmail.com', 741470789, 22, 32356241, '22ac3c5a5bf0b520d281c122d1490650', 'user', 'mohammad.jpg'),
(6, 'clinton Odwor', 'clinton@gmail.com', 741471234, 23, 32355263, '22ac3c5a5bf0b520d281c122d1490650', 'user', 'Malick.jpg'),
(7, 'wacio', 'wacio@gmail.com', 78887656, 33, 654345678, 'cc03e747a6afbbcbf8be7668acfebee5', 'user', ''),
(8, 'mkulima', 'mkulima@gmail.com', 788754444, 56, 2147483647, 'cc03e747a6afbbcbf8be7668acfebee5', 'user', ''),
(9, 'Faith K', 'faithk@gmail.com', 756890342, 22, 34567890, '81dc9bdb52d04dc20036dbd8313ed055', 'user', ''),
(10, 'klint@gmail.com', 'klint@gmail.com', 795613200, 10, 38107363, '81dc9bdb52d04dc20036dbd8313ed055', 'user', ''),
(11, 'admin', 'admin@gmail.com', 767737383, 24, 98377377, 'cc03e747a6afbbcbf8be7668acfebee5', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_list`
--
ALTER TABLE `loan_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_plan`
--
ALTER TABLE `loan_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_schedules`
--
ALTER TABLE `loan_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youths`
--
ALTER TABLE `youths`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `loan_list`
--
ALTER TABLE `loan_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_plan`
--
ALTER TABLE `loan_plan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_schedules`
--
ALTER TABLE `loan_schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `youths`
--
ALTER TABLE `youths`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
