-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 12:42 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_name` ()   BEGIN
  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `user_id` int(11) NOT NULL,
  `result` int(11) DEFAULT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`user_id`, `result`, `subject`) VALUES
(8, 7, 'front_end'),
(26, 1, 'front_end'),
(37, 0, 'front_end');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `speciality_id` int(11) NOT NULL,
  `speciality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`speciality_id`, `speciality`) VALUES
(2, 'dev ops'),
(1, 'full stack'),
(3, 'mobile developper');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `groupe_id` tinyint(1) NOT NULL,
  `register_date` date DEFAULT NULL,
  `user_img` varchar(100) DEFAULT NULL,
  `speciality_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `number` char(15) DEFAULT NULL,
  `voteOn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `full_name`, `email`, `password`, `groupe_id`, `register_date`, `user_img`, `speciality_id`, `address`, `description`, `country`, `number`, `voteOn`) VALUES
(8, 'admin', 'amine elbziwid', 'admin@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 1, '2023-05-13', 'imageProfile-647b2aefec0646.31280929.png', 3, '65 darb mifta7 ra7a', 'ove probleme solving and learn from building wesites', 'safi', '0691156400', 17),
(23, 'eeeee', 'amine elbziwi', 'amine@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37),
(25, 'wwwww', 'amine elbziwi', 'a@g.c', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, 'ashraf', 'ddddddedxxd', 'ashraf@gmail.codmf', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, 'imageProfile-647b412f6cc448.40112411.png', 3, '5 darb mifta7 ra7adf', 'ddddxdd', 'jjjjjjjjxdddedxd', '4343444433', 0),
(27, 'ddddddd', NULL, 'dddd@dd.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(28, 'sfasdfasdf', NULL, 'asdf@dfa.fd', '07e5fa2c86a506584591c5731fce0ad5bf69562e', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, 'sdfgasd', NULL, 'fasdf@dff.da', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, 'dfasdf', NULL, 'fSDF@F.DC', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(31, 'newww', '', 'amine@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, NULL, NULL, 2, '', '', '', '', NULL),
(32, 'userr', '', 'amine@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, NULL, NULL, 2, '', '', '', '', NULL),
(35, 'userr4', '', 'amine@gmail.com', NULL, 0, '2023-06-04', NULL, 2, '', '', '', '', NULL),
(36, 'amine6', NULL, 'amine@g.c', '8cb2237d0679ca88db6464eac60da96345513964', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'amine7773', 'amine elbziwid', 'a@a.aq', '8cb2237d0679ca88db6464eac60da96345513964', 0, '2023-06-04', 'imageProfile-647c63a71265e1.13728214.png', NULL, '', 'i love programming with php and javascript also csss', 'jjjjjjjj', '343423', 25);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `candidate` int(11) NOT NULL,
  `project` varchar(255) DEFAULT NULL,
  `description_project` varchar(255) DEFAULT NULL,
  `vote_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`candidate`, `project`, `description_project`, `vote_count`) VALUES
(23, 'https://amine-elgaini.github.io/quiz_application/', 'I built A School Website. Using Html, Css, Js. I tried Also To Make It Responsive On Pc And Phones And Other Devices', 0),
(25, 'https://amine-elgaini.github.io/quiz_application/', 'I built A School Website. Using Html, Css, Js. I tried Also To Make It Responsive On Pc And Phones And Other Devices', 1),
(37, 'https://amine-elgaini.github.io/quiz_application/', 'i love programming so i bult this project', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`user_id`,`subject`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`speciality_id`),
  ADD UNIQUE KEY `work` (`speciality`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `usernam` (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `work_id` (`speciality_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`candidate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `specialties` (`speciality_id`) ON DELETE SET NULL;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `FK_candidate` FOREIGN KEY (`candidate`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
