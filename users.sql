-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 07:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooked`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(13) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other','Prefer not to say') NOT NULL,
  `email` varchar(255) NOT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_picture_url` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `occupation`, `password`, `role`, `created_at`, `profile_picture_url`, `birthday`, `description`) VALUES
('681bb36a791ce', 'Josh', 'Doe', 'Male', 'ganzonralpht@gmail.com', 'Home Cook', '$2y$10$o3EGJF3lPndvexFhqmBU7.rP2TDqtwY51VxLsM9IPL6PQsKisBYc2', 'User', '2025-05-07 19:24:26', NULL, NULL, 'Hello I am Ralph Justine I am a Home Cook who likes to post for hobby.'),
('681bceeb9ae94', 'Hello', 'Guys', 'Male', 'ganzon.ralphjustine@auf.edu.ph', NULL, '$2y$10$o3EGJF3lPndvexFhqmBU7.rP2TDqtwY51VxLsM9IPL6PQsKisBYc2', 'User', '2025-05-07 21:21:47', NULL, NULL, NULL),
('681bd0994c064', 'James', 'Bond', 'Male', 'yourname@example.com', NULL, '$2y$10$o3EGJF3lPndvexFhqmBU7.rP2TDqtwY51VxLsM9IPL6PQsKisBYc2', 'User', '2025-05-07 21:28:57', NULL, NULL, NULL),
('681bd593eb7d0', 'Hey', 'Ya', 'Male', 'aljames@gmail.com', NULL, '$2y$10$o3EGJF3lPndvexFhqmBU7.rP2TDqtwY51VxLsM9IPL6PQsKisBYc2', 'User', '2025-05-07 21:50:11', NULL, NULL, NULL),
('681c37ec132aa', 'Nig', 'Her', 'Male', 'nigher@gmail.com', 'Actor', '$2y$10$e22CdeZBfT3ORxoK1U.6LOL647IVvB0YhTLGZMVSoi9rlQrwyUTlG', 'User', '2025-05-08 04:49:48', '../assets/images/profile_pictures/681c37ec132aa.jpg', '0000-00-00', 'Hello I am Ralph Justine I am a Home Cook who likes to post for hobby.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
