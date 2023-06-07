-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 11:45 AM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `blog_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `approve` tinyint(1) DEFAULT 0,
  `like_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `author`, `blog_date`, `img`, `title`, `text`, `approve`, `like_count`) VALUES
(25, 8, '2023-06-07 09:33:57', 'imageArticle-647f02bf12b656.94228577.jpg', 'Evenement', 'vous trouvez ici les projets de fin formation des stagiaires de ntic safi.', 1, 2),
(26, 8, '2023-06-07 09:33:53', 'imageArticle-64804ee67121f4.68803504.jpg', 'computers', 'be carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj k\r\nbe carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj k\r\nbe carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj kbe carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj k\r\nbe carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj k\r\nbe carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj k\r\nbe carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj k\r\nbe carful with using compure so  kjk jkj j kj kj k jk jk jkj kj kj kjkjkjk jkj kj k jkj kj kj kj kj k', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_like`
--

CREATE TABLE `blog_like` (
  `like_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_like`
--

INSERT INTO `blog_like` (`like_id`, `blog_id`, `user_id`) VALUES
(113, 25, 36),
(116, 26, 8),
(117, 25, 8);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `blog_id`, `user_id`, `comment_date`) VALUES
(29, 'kkkkk', 25, 36, '2023-06-06 10:48:40'),
(30, 'kokok', 25, 36, '2023-06-06 10:48:48'),
(31, 'dd', 25, 32, '2023-06-07 09:04:31'),
(32, 'dd', 25, 32, '2023-06-07 09:05:33'),
(33, 'i love this article it describe the event, good.', 25, 32, '2023-06-07 09:08:14'),
(34, 'i love this article it describe the event, good.', 25, 32, '2023-06-07 09:08:53'),
(35, 'nice bro', 25, 8, '2023-06-07 09:34:03'),
(36, 'fin kat skon', 25, 8, '2023-06-07 09:34:18'),
(37, 'la makanskonsh', 25, 8, '2023-06-07 09:34:45');

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
(36, 4, 'front_end');

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
(8, 'admin', 'amine elbziwidd', 'admin@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 1, '2023-05-13', 'imageProfile-647f06a0cde8a0.71152252.jpg', 2, '65 darb mifta7 ra7a', 'ove probleme solving and learn from building wesites', 'safie', '0691156400', 8),
(26, 'ashraf', 'ddddddedxxd', 'ashraf@gmail.codmf', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, 'imageProfile-647f06e6a47c48.80917875.png', 3, '5 darb mifta7 ra7adf', 'ddddxdd', 'jjjjjjjjxdddedxd', '4343444433', 30),
(28, 'sfasdfasdf', NULL, 'asdf@dfa.fd', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, 'sdfgasd', NULL, 'fasdf@dff.da', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, 'dfasdf', NULL, 'fSDF@F.DC', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(31, 'newww', '', 'amine@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, 2, '', '', '', '', 8),
(32, 'userr', '', 'amine@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, NULL, 2, '', '', '', '', 30),
(35, 'userr4', '', 'amine@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, '2023-06-04', NULL, 2, '', '', '', '', 30),
(36, 'amine6', '', 'amine@g.c', '356a192b7913b04c54574d18c28d46e6395428ab', 0, NULL, 'imageProfile-647f0f2c77ad10.75725473.png', NULL, '', '', '', '06911564044', 8),
(37, 'amine7773', 'amine elbziwid', 'a@a.aq', '356a192b7913b04c54574d18c28d46e6395428ab', 0, '2023-06-04', 'imageProfile-647c63a71265e1.13728214.png', NULL, '', 'i love programming with php and javascript also csss', 'jjjjjjjj', '343423', 0);

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
(8, 'https://amine-elgaini.github.io/quiz_application/', 'js project', 3),
(30, 'https://amine-elgaini.github.io/quiz_application/', 'php project', 3),
(32, 'https://amine-elgaini.github.io/quiz_application/', 'laravel and react blog app, with dashboard.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `blog_like`
--
ALTER TABLE `blog_like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `fk_b` (`blog_id`),
  ADD KEY `fk_u` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `blog_like`
--
ALTER TABLE `blog_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `blog_like`
--
ALTER TABLE `blog_like`
  ADD CONSTRAINT `fk_b` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_u` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

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
