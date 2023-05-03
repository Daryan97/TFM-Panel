-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 03:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_users`
--

CREATE TABLE `assign_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `printer_id` int(11) NOT NULL,
  `students` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `credits_left` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_assigned` int(11) DEFAULT NULL,
  `date_revoked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_users`
--

INSERT INTO `assign_users` (`id`, `user_id`, `printer_id`, `students`, `type`, `credits_left`, `status`, `date_assigned`, `date_revoked`) VALUES
(1, 1, 2, 36, 0, 500, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dep_name` text NOT NULL,
  `dep_full_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_name`, `dep_full_name`) VALUES
(1, 'AC', 'Accounting'),
(2, 'BA', 'Business Administration'),
(3, 'CS', 'Computer Science'),
(4, 'ED', 'Decor Engineering'),
(5, 'DM', 'Digital Media'),
(6, 'IT', 'Information Technology'),
(7, 'ML', 'Medical laboratory'),
(8, 'N', 'Nursing'),
(9, 'PD', 'Petroleum'),
(10, 'PH', 'Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `printer` tinyint(1) NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `reason_suspended` text,
  `date_created` int(11) NOT NULL,
  `department` text,
  `groups` text,
  `phone` text NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `price_per_paper` tinyint(4) DEFAULT NULL,
  `money_type` tinyint(4) NOT NULL DEFAULT '0',
  `has_delivery` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `admin`, `printer`, `suspended`, `reason_suspended`, `date_created`, `department`, `groups`, `phone`, `expire`, `price_per_paper`, `money_type`, `has_delivery`) VALUES
(1, 'Daryan', 'Latif', 'daryan.latif@hotmail.com', '$2y$10$Q76NMCo5TFtUmu8M728WNuAn9RlDpfFrmkcffkq7ZcLmC9UgckDmK', 1, 0, 0, NULL, 0, 'CS', 'A', '+9647702170491', 1893456000, NULL, 0, 0),
(2, 'Test', 'User', 'admin@daryan.technology', '$2y$10$wk8iEcbpkEVL6CnjOekpJu9MWkavtsqppHjSnT8jFnwvejcdyKUuO', 0, 1, 0, NULL, 1600475364, NULL, NULL, '+9647702170491', 1648418400, 15, 1, 1),
(3, 'Daryan', 'New', 'daryan@test.com', '$2y$10$auLcqdjHUJ.gIbc32wWAFupw3u6s/MVPFYm7Kj61M.q8ju/wtP/ha', 0, 1, 0, NULL, 1600483287, NULL, NULL, '+96407702170491', 1893456000, 15, 3, 1),
(4, 'Hello', 'World', 'daryan@new.com', '$2y$10$QT.KeoY6mnmQgbXRnHdj2uCR3uXGW0odIa0sSNZQ7aK0t8tCyFzBW', 0, 1, 0, NULL, 1600483536, NULL, NULL, '+96403333333333', 1893456000, 20, 2, 0),
(5, 'Hello', 'World', 'test@test.com', '$2y$10$brUD0gplH5KsmnYbdf1zLOWf7nqWh34gngtcbYNZgs3EFh5eJaTmS', 0, 0, 0, NULL, 1600484090, NULL, NULL, '+9647777777777', 1893456000, NULL, 0, 0),
(6, 'Hedi', 'Soran', 'abc@yahoo.com', '$2y$10$dgCIbWM.t9bQYLmlv8PP.um4MJycaLilZMAynkQLyBioos./sy9Ba', 1, 1, 0, NULL, 1601151347, 'CS', 'A', '+9647777777777', 1893452400, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_users`
--
ALTER TABLE `assign_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_users`
--
ALTER TABLE `assign_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
