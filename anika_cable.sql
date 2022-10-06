-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 04:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anika_cable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `admin_pass`) VALUES
(1, 'rakib', '451636'),
(2, 'rameem', '451638'),
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `internet_user`
--

CREATE TABLE `internet_user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `ip_pass` varchar(255) NOT NULL,
  `speed` int(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bill` int(255) NOT NULL,
  `due_bill` int(255) NOT NULL,
  `advance_bill` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `signature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internet_user`
--

INSERT INTO `internet_user` (`id`, `name`, `ip_add`, `ip_pass`, `speed`, `phone`, `address`, `bill`, `due_bill`, `advance_bill`, `status`, `date`, `signature`) VALUES
(1, 'Mahmood Hassan Rameem', '192.168.0.1', '44444', 5, '01409029641', 'Mirpur, Dhaka', 500, 0, 0, 'paid', '2022-10-05', 'ram'),
(2, 'Mahmood Hassan Rameem', '192.168.0.1', '44444', 5, '01409029641', 'Mirpur, Dhaka', 500, 0, 0, 'paid', '2022-10-06', 'E');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internet_user`
--
ALTER TABLE `internet_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `internet_user`
--
ALTER TABLE `internet_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
