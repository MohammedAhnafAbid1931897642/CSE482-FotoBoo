-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 10:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotoboo`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `pic`, `category`, `email`, `location`, `profile_pic`, `name`) VALUES
(1, 'listings/svetlanavodka2@protonmail.com/port8-8.jpg', 'Wildlife', 'svetlanavodka2@protonmail.com', 'Rangpur', 'uploads/svetlanavodka2@protonmail.com/p1(1).jpg', 'Svetlana'),
(2, 'listings/svetlanavodka2@protonmail.com/port8-4.jpg', 'Wildlife', 'svetlanavodka2@protonmail.com', 'Rangpur', 'uploads/svetlanavodka2@protonmail.com/p1(1).jpg', 'Svetlana'),
(3, 'listings/svetlanavodka2@protonmail.com/port8-5.jpg', 'Wildlife', 'svetlanavodka2@protonmail.com', 'Rangpur', 'uploads/svetlanavodka2@protonmail.com/p1(1).jpg', 'Svetlana'),
(4, 'listings/ahnaf.abid22@gmail.com/port2-1.jpg', 'Wedding', 'ahnaf.abid22@gmail.com', 'Dhaka', 'uploads/ahnaf.abid22@gmail.com/port7-1.jpg', 'Ahnaf'),
(5, 'listings/ahnaf.abid22@gmail.com/port2-3.jpg', 'Wedding', 'ahnaf.abid22@gmail.com', 'Dhaka', 'uploads/ahnaf.abid22@gmail.com/port7-1.jpg', 'Ahnaf'),
(6, 'listings/ahnaf.abid22@gmail.com/port2-4.jpg', 'Wedding', 'ahnaf.abid22@gmail.com', 'Dhaka', 'uploads/ahnaf.abid22@gmail.com/port7-1.jpg', 'Ahnaf'),
(7, 'listings/ieatcake2018@gmail.com/port11-4.jpg', 'Food', 'ieatcake2018@gmail.com', 'Khulna', 'uploads/ieatcake2018@gmail.com/g1.png', 'John'),
(8, 'listings/ieatcake2018@gmail.com/port11-1.jpg', 'Food', 'ieatcake2018@gmail.com', 'Khulna', 'uploads/ieatcake2018@gmail.com/g1.png', 'John'),
(9, 'listings/ieatcake2018@gmail.com/port10-1.jpeg', 'Food', 'ieatcake2018@gmail.com', 'Khulna', 'uploads/ieatcake2018@gmail.com/g1.png', 'John');

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`id`, `email`, `status`) VALUES
(1, 'ahnaf.abid22@gmail.com', 'YES'),
(2, 'svetlanavodka2@protonmail.com', 'YES'),
(3, 'ahnafrocks22@gmail.com', 'YES'),
(4, 'ahnafrocks22@gmail.com', 'YES'),
(6, 'wowwow@gmail.com', 'YES'),
(7, 'ieatcake2018@gmail.com', 'YES'),
(8, 'example1@gmail.com', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_pic`, `email`, `uname`) VALUES
(1, 'uploads/ahnaf.abid22@gmail.com/6892.jpg', 'ahnaf.abid22@gmail.com', 'Ahnaf'),
(2, 'uploads/ahnaf.abid22@gmail.com/6892.jpg', 'ahnaf.abid22@gmail.com', 'Ahnaf'),
(3, 'uploads/ahnaf.abid22@gmail.com/6892.jpg', 'ahnaf.abid22@gmail.com', 'Ahnaf'),
(4, 'uploads/svetlanavodka2@protonmail.com/Chico.jpg', 'svetlanavodka2@protonmail.com', 'Svetlana22'),
(5, 'uploads/ahnafrocks22@gmail.com/Essence.PNG', 'ahnafrocks22@gmail.com', 'AhnafRocks232'),
(6, 'uploads/wowwow@gmail.com/gboq7s0ky.gif', 'wowwow@gmail.com', 'Agent47'),
(7, 'uploads/ieatcake2018@gmail.com/g1.png', 'ieatcake2018@gmail.com', 'John'),
(8, 'uploads/example1@gmail.com/g4.png', 'example1@gmail.com', 'Tiger007'),
(9, 'uploads/ahnaf.abid22@gmail.com/p10.jpg', 'ahnaf.abid22@gmail.com', 'Ahnaf'),
(10, 'uploads/ahnaf.abid22@gmail.com/p2_bw.jpg', 'ahnaf.abid22@gmail.com', 'Ahnaf'),
(11, 'uploads/ahnaf.abid22@gmail.com/port7-1.jpg', 'ahnaf.abid22@gmail.com', 'Ahnaf'),
(12, 'uploads/svetlanavodka2@protonmail.com/p3.jpg', 'svetlanavodka2@protonmail.com', 'Svetlana22'),
(13, 'uploads/svetlanavodka2@protonmail.com/p1(1).jpg', 'svetlanavodka2@protonmail.com', 'Svetlana22'),
(14, 'uploads/ieatcake2018@gmail.com/p2.jpg', 'ieatcake2018@gmail.com', 'John');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `email`, `pass`) VALUES
(5, 'ahnaf.abid22@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(14, 'svetlanavodka@protonmail.com', 'f5f091a697cd91c4170cda38e81f4b1a'),
(15, 'walamail@mail.com', '39b5177e82858ecc5661a2077b58edc3'),
(16, 'walakom2@gmail.com', '3354045a397621cd92406f1f98cde292'),
(17, 'shalakom@gmail.com', 'bffe3392125f97ce84cb3942afe27b64'),
(18, 'shakalakaboomboom@gmail.com', 'fbe82b93c071bedda31afded400cca52'),
(19, 'svetlanavodka2@protonmail.com', '25d55ad283aa400af464c76d713c07ad'),
(20, 'ahnafrocks22@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(21, 'wowwow@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(22, 'ieatcake2018@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(23, 'example1@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
