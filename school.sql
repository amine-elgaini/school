-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 03:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `sp_name`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_name` ()   BEGIN
  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `user_id` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`user_id`, `note`, `subject`) VALUES
(7, 0, 'front_end'),
(21, 4, 'front_end');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `groupe_id` tinyint(1) NOT NULL,
  `register_date` date DEFAULT NULL,
  `user_img` varchar(100) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `number` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `groupe_id`, `register_date`, `user_img`, `work_id`, `address`, `description`, `country`, `number`) VALUES
(7, 'user', 'user@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, '2023-05-13', NULL, 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(8, 'admin', 'admin@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 1, '2023-05-13', NULL, 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(9, 'user1', 'user1@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, '2023-05-14', 'IMG-6464038bae0090.26213082.png', 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(10, 'amine1', NULL, '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(12, 'amine2', NULL, '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(13, 'amine3', NULL, '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(15, 'amine4', NULL, '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(17, 'amine5', NULL, '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, 1, '65 darb mifta7 ra7a', 'i love probleme solving and learn from building wesites', 'safi', '0691156400'),
(21, 'ddddd', 'aamine@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, 'imageProfile-6477cebfa340f8.33345202.jpg', 3, '5 darb mifta7 ra7a', 'i loffve probleme solving and learn from building wesites', '', '691156400'),
(22, 'ffffff', 'adfk@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'eeeee', 'amine@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'aaaaa', 'amine@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'wwwww', 'a@g.c', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `work_id` int(11) NOT NULL,
  `work` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`work_id`, `work`) VALUES
(2, 'dev ops'),
(1, 'full stack'),
(3, 'mobile developper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`user_id`,`subject`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `usernam` (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `work_id` (`work_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`work_id`),
  ADD UNIQUE KEY `work` (`work`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `works` (`work_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
