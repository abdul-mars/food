-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 09:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `aid` int(11) NOT NULL,
  `afname` varchar(20) DEFAULT NULL,
  `alname` varchar(20) DEFAULT NULL,
  `aemail` varchar(255) DEFAULT NULL,
  `aphone` varchar(10) DEFAULT NULL,
  `apassword` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`aid`, `afname`, `alname`, `aemail`, `aphone`, `apassword`) VALUES
(1, 'Ronaldo', 'Cristiano', 'cr7@gmail.com', '0247777777', '$2y$10$w0kLhuqdAeP6i.ss088y2e3uIknciLr7cZQeSpbiIDcVQ0AiPKyNe'),
(2, 'Casillas', 'Iker', 'iker@gmail.com', '1111111111', '$2y$10$gtx24lOlj5nqG4W0D.Inn.dBQKDiB1PdKIdCwyWBAbn9O6YfbOk8m');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `mid` int(11) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `mdesc` varchar(255) DEFAULT NULL,
  `mprice` decimal(10,2) DEFAULT NULL,
  `mimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`mid`, `mname`, `mdesc`, `mprice`, `mimage`) VALUES
(1, 'Chilly Chicken', 'Chicken marinated with herbs with batter and gravy made with Chinese sauces ', 235.00, 'assets/foods/6658ee75c655f.jpg'),
(2, 'Burger', 'Burger king with onions', 20.00, 'assets/foods/6659b60094fcf.jpg'),
(3, 'Fried Rice', 'Wholesome stir-fried rice topped with juicy chicken chunks', 70.00, 'assets/foods/6659b63f07db5.jpg'),
(4, 'Chicken Madeira', 'Chicken Madeira, like Chicken Marsala, is made with chicken, mushrooms,', 40.00, 'assets/foods/6659b681d013d.jpg'),
(5, 'Mashed Potatos', 'Deliciously Cheesy Mashed Potato. The ultimate mash for your Thanksgiving table or', 30.00, 'assets/foods/6659b6be6fe3b.jpg'),
(6, 'Butter Chicken', 'Perfectly cooked tendered pieces of chicken with a rich tomato and onion ', 45.00, 'assets/foods/6659b70c7947e.jpg'),
(7, 'Sushi', 'Very delicious sushi ', 5.00, 'assets/foods/665aa6d1ec302.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `onum` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `onum`, `sid`, `mid`, `quantity`, `amount`, `date`, `status`) VALUES
(1, 3477849, 1, 2, 3, 60.00, '2024-05-31', 'Delivered'),
(2, 1258520, 1, 2, 5, 100.00, '2024-05-31', 'Cancelled'),
(3, 3541300, 1, 1, 3, 705.00, '2024-05-31', 'Dispatch'),
(4, 7330243, 3, 6, 3, 135.00, '2024-05-31', 'On The Way'),
(5, 9861849, 3, 4, 1, 40.00, '2024-05-31', 'Cancelled'),
(6, 2670165, 3, 5, 1, 36.00, '2024-05-31', 'Dispatch'),
(7, 3579282, 5, 1, 3, 705.00, '2024-05-31', 'Delivered'),
(8, 6949887, 5, 2, 6, 120.00, '2024-06-01', 'Dispatch'),
(9, 1725663, 5, 5, 4, 120.00, '2024-06-01', 'Dispatch');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sid` int(11) NOT NULL,
  `sfname` varchar(20) DEFAULT NULL,
  `slname` varchar(20) DEFAULT NULL,
  `semail` varchar(255) DEFAULT NULL,
  `sphone` varchar(10) DEFAULT NULL,
  `saddress` varchar(255) DEFAULT NULL,
  `spassword` text DEFAULT NULL,
  `regdate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sid`, `sfname`, `slname`, `semail`, `sphone`, `saddress`, `spassword`, `regdate`) VALUES
(1, 'Vinicious', 'Junior', 'vini@gmail.com', '0989999999', 'madrid', '$2y$10$2hgdFPNX/jXl5qmAVgUeQ.HQhlkhbS/4QDluXm0P4aQdSi5tS9f8W', '2024-05-30'),
(3, 'Rodrygo', 'Goes', 'goes@gmail.com', '3435453454', 'brazil avenue', '$2y$10$buYfazZVUu5rBlddFkxMuuR.4jlAqQgUL7wmPlzn2BakEb5YAkZa.', '2024-05-31'),
(4, 'Benzima', 'Karim', 'karim@gmail.com', '3423424243', 'france high street 99', '$2y$10$9e//zoTmwf0Ze7HlKM.C4.17xBuzbvOMHHMTfyziBhe3yrPJWnROO', '2024-05-31'),
(5, 'Abdul-rashid', 'Mustapha', 'mustapha@gmail.com', '0551731827', 'Z.104. sang', '$2y$10$zrG4VA7mXoP28GJa18apXOlVz8BrWVNlhadBVgOjhGOd1WlbMEltO', '2024-05-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `users` (`sid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `menus` (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
