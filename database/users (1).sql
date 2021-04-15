-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2021 at 08:29 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shield`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Mahender Singh', 'mahendersingh2706@gmail.com', '$2y$10$4wa4A0fBX9g6CGSUgT.XWezZJDLBRGF8ovC8NUHCskD7yQZIFak6C'),
(2, 'jhon', 'hoh@gmail.com', '123456'),
(3, 'new name', 'ena@gmail.com', 'mahender'),
(4, 'ccqidhfm', 'sample@email.tst', 'g00dPa$$w0rD'),
(5, 'tester', 'ms@gmail.com', '$2y$10$KvqQxbcsp91NRwlc/AjdQul/Lwn.iHizIF.UWI2a93jsb5GaCMEeK'),
(6, 'Mahender Singh', 'ms141018@gmail.com', '$2y$10$v18jaLOkuMdpyRICtr4zrOy.NrilKv.unykHfO3zomDe4WL6f81su');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
