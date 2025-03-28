-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2025 at 10:36 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beveiligd_wachtwoord_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstname`, `lastname`, `password`, `role`) VALUES
(1, 'Abd', 'Abd@gmail.com', 'Abd', 'Abd', '$2y$10$.q/3DiQiRYWGI8qNRaad/.sO7w8mYbbld2MUl.B.svCw6Nh0Hratu', 1),
(4, 'aa', 'a.alyouins17200@gmail.com', 'aa', 'aa', '$2y$10$76LmpF4tO3AlkAYk72TfRuqKlGklDFiUwAIiWRcf8k1JtAYAkPqby', 1),
(3, 'tt', 'tt@gamil.com', 'tt', 'tt', '$2y$10$P7oFcu/by4FapTceMvxH8.WO3ila2zZ0AIJJfWbupnwAXSzRcWJ/O', 1),
(5, 'serbaker', 'vlasov.nik45@yandex.ru', 'Nikita', 'Vlasov', '$2y$10$da7vGsq7xJFvh79zp7hCRujCfRULCkEpj7XRDnFkzoi.Cyh/MBtC.', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
