-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2020 at 07:37 PM
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
-- Database: `pt_thassertsolutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_card` varchar(40) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_card`, `fname`, `lname`, `phone`, `address`) VALUES
(1, '2684543937', 'Leanne', 'Graham', '7463781537', 'Cl 68SUR No. 45-17, C.P 05631'),
(2, '6001448742', 'Ervin', 'Howell', '8006831732', 'Cr 52 No. 48-45 L 152, Medellín'),
(3, '3776525650', 'Clementine', 'Bauch', '4511829614	', 'Cl 103 No. 49-63, C.P 11001'),
(4, '8592585775', 'Patricia', 'Lebsack', '6460382069', 'Cl 72 No. 1 F-07, C.P 76001'),
(5, '7723462782', 'Chelsey', 'Dietrich', '9145137863', 'Tr 21 No. 60-94, C.P 11001'),
(6, '4442020324', 'Dennis', 'Schulist', '5624774312', 'Cl 91 No. 13A-14 L 6, C.P 11001');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
