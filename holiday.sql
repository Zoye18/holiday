-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2021 at 09:29 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holiday`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeeRelationship`
--

CREATE TABLE `employeeRelationship` (
  `id` int(16) NOT NULL,
  `employee_id` int(16) NOT NULL,
  `manager_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employeeRelationship`
--

INSERT INTO `employeeRelationship` (`id`, `employee_id`, `manager_id`) VALUES
(1, 2, 3),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `empoyeeForm`
--

CREATE TABLE `empoyeeForm` (
  `id` int(16) NOT NULL,
  `employee_id` int(16) NOT NULL,
  `form_id` int(16) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `approved_by` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidayForm`
--

CREATE TABLE `holidayForm` (
  `id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(16) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(16) DEFAULT '0',
  `send` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `holidayForm`
--

INSERT INTO `holidayForm` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone_number`, `start_date`, `end_date`, `remarks`, `active`, `send`) VALUES
(2, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-03-31 00:00:00', '2021-04-01 00:00:00', NULL, 0, 0),
(3, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-03-31 00:00:00', '2021-04-01 00:00:00', NULL, 0, 0),
(4, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-03-31 00:00:00', '2021-04-01 00:00:00', NULL, 0, 0),
(5, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-05 00:00:00', NULL, 0, 0),
(6, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-05 00:00:00', NULL, 0, 0),
(7, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-05 00:00:00', NULL, 0, 0),
(8, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-20 00:00:00', NULL, 0, 0),
(9, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-28 00:00:00', NULL, 0, 0),
(10, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-18 00:00:00', NULL, 0, 0),
(11, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-13 00:00:00', NULL, 0, 0),
(12, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-04-05 00:00:00', NULL, 0, 0),
(13, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-29 00:00:00', NULL, 0, 0),
(14, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-29 00:00:00', NULL, 0, 0),
(15, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-29 00:00:00', NULL, 0, 0),
(16, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-30 00:00:00', NULL, 0, 0),
(17, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-29 00:00:00', 'test', 0, 0),
(18, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-28 00:00:00', 'test', 0, 0),
(19, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-30 00:00:00', 'test', 0, 0),
(20, 2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 2147483647, '2021-04-04 00:00:00', '2021-03-28 00:00:00', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(16) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Manager'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `userRoles`
--

CREATE TABLE `userRoles` (
  `id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `role_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(16) NOT NULL,
  `user_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_email` tinyint(1) NOT NULL DEFAULT '0',
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `confirm_email`, `user_name`, `user_pass`, `hash_pass`) VALUES
(2, 'Zorica', 'Arsova', 'zorica.c.arsova@gmail.com', 1, 'Zorica', '7122e6d1238ad067cad1b478b454385c736c9d3345acf683f4499236a505f467873e79813ffead9a80d35d9c9f153ea43a21776401d1db85ae4527529543e2e8/avq2h2KNiXVIodE0YglqzrdjaUCfaSUhIibhCuFeYE=', 'd460b972bd520ad0d8620eccbdd8c46b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeeRelationship`
--
ALTER TABLE `employeeRelationship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empoyeeForm`
--
ALTER TABLE `empoyeeForm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidayForm`
--
ALTER TABLE `holidayForm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `userRoles`
--
ALTER TABLE `userRoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeeRelationship`
--
ALTER TABLE `employeeRelationship`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empoyeeForm`
--
ALTER TABLE `empoyeeForm`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holidayForm`
--
ALTER TABLE `holidayForm`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `userRoles`
--
ALTER TABLE `userRoles`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
