-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 07:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `phone`, `email`, `password`, `status`, `address`, `description`, `id`) VALUES
('asdfg@sxdcvb', 5105852, 'hassanmattar2002@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'dcsvdbn', 'dcvbngmhgjmnfb', 17),
('asdfg@sxdcvb', 5105852, 'zsxdcfvgb@sxdcv', 'b762db77babcd3afb80d68e3e51f8fe9', 1, 'dcsvdbn', 'dcvbngmhgjmnfb', 18),
('hassanmattar2002@gmail.com', 5105852, 'hassanmattar2002@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'dcsvdbn', 'dcvbngmhgjmnfb', 19),
('hassanmattar2002@gmail.com', 5105852, 'hassanmattar2002@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 'dcsvdbn', 'dcvbngmhgjmnfb', 20),
('hassanmattar2002@gmail.com', 5105852, 'hassanmattar2002@gmail.com', 'b762db77babcd3afb80d68e3e51f8fe9', 1, 'dcsvdbn', 'dcvbngmhgjmnfb', 21);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `time`, `status`) VALUES
(6, 'laptop', 'asdfghbnm', '2022-05-19 09:20:51', 0),
(7, 'computer', 'mattar', '2022-05-19 09:21:17', 0),
(8, 'rating', 'asdfghbnm', '2022-05-19 09:21:28', 0),
(9, 'Hassan Abd Al -hamid  Mattar', 'vgbnm,nbv', '2022-05-19 09:21:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `num_rating` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `mac_user` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`num_rating`, `store_id`, `mac_user`, `id`) VALUES
(4, 27, 0, 54),
(3, 26, 0, 55),
(3, 29, 0, 56),
(3, 28, 0, 57);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `description` varchar(255) NOT NULL,
  `Adress` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`description`, `Adress`, `phone`, `Image`, `name`, `id`, `categoryName`) VALUES
('oyui8y', 'hg_degy_dfhj', 5105852, '1652957855.gif', 'rock', 26, 'laptop'),
('oyui8y', 'iugyuigyg', 5105852, '1652965762.png', '5105852', 27, 'computer'),
('qwertyujkl', 'wertgh_dftgy', 5105852, '1652963529.jpg', 'remal', 28, 'computer'),
('dcvbngmhgjmnfb', 'xdfvbn', 5105852, '1652958123.jpg', '5105852', 29, 'laptop'),
('dcvbngmhgjmnfb', 'iugyuigyg', 5105852, '1652963028.jpg', '5105852', 30, 'laptop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`store_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
