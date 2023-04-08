-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 02:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_betaace`
--

-- --------------------------------------------------------

--
-- Table structure for table `tablecomment`
--

CREATE TABLE `tablecomment` (
  `comment_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `comment_description` varchar(255) NOT NULL,
  `comment_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablecomment`
--

INSERT INTO `tablecomment` (`comment_id`, `user_username`, `comment_description`, `comment_created`, `post_id`, `user_id`) VALUES
(1, 'RamTheGreat', 'Lagi ako natutulog dyan', '2022-07-19 12:21:06', 2, 2),
(2, 'RamTheGreat', 'Ba\'t ang linis', '2022-07-19 12:21:34', 2, 2),
(3, 'chrsitan99', 'truee ako din eh ', '2022-07-19 12:21:51', 2, 3),
(4, 'haroldpogi', 'oiii count me in!', '2022-07-19 12:26:57', 3, 4),
(5, 'haroldpogi', 'ubos palagi pwesto diyan eh! umai', '2022-07-19 12:27:40', 2, 4),
(6, 'haroldpogi', 'Penge naman ako niyan', '2022-07-19 12:27:57', 1, 4),
(7, 'RamTheGreat', 'Sir thank you po', '2022-07-19 12:29:21', 5, 2),
(8, 'haroldpogi', 'THANK YOU SIR!!!', '2022-07-19 12:29:21', 5, 4),
(9, 'RamTheGreat', 'Yehey', '2022-07-19 12:29:34', 4, 2),
(10, 'chrsitan99', 'THANK YOU PO SIR!', '2022-07-19 12:30:06', 5, 3),
(11, 'RamTheGreat', 'syempre', '2022-07-19 12:31:44', 1, 2),
(12, 'RamTheGreat', 'hi', '2022-08-04 09:11:28', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tablepost`
--

CREATE TABLE `tablepost` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` varchar(255) NOT NULL,
  `post_photo` varchar(255) NOT NULL,
  `post_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_username` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablepost`
--

INSERT INTO `tablepost` (`post_id`, `post_title`, `post_description`, `post_photo`, `post_created`, `user_username`, `user_id`) VALUES
(1, 'Coffee is Life!', 'Today\'s good mood is sponsored by coffee.', 'coffee.gif', '2022-07-17 12:18:52', 'RamTheGreat', 2),
(2, 'I miss FEU TECH', 'nakakamiss tumambay dito oh', 'feu.jpg', '2022-07-19 12:20:46', 'chrsitan99', 3),
(3, 'VACATION IS COMING', 'comment na sa mga gusto sumama!', '94a2dc91-92fe-42d6-abbb-3a2517e9803a.jpg', '2022-07-19 12:21:33', 'chrsitan99', 3),
(4, 'Feeling Relieved!', 'FINALLY TAPOS NA DIN PROJECT NAMIN!!!', 'NULL', '2022-07-19 12:26:39', 'haroldpogi', 4),
(5, 'Thank you po Sir. Calleja', 'We the group of Beta Ace are humbly grateful to your teachings.', 'thanks.gif', '2022-07-19 12:28:56', 'RamTheGreat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tableusers`
--

CREATE TABLE `tableusers` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_state` varchar(25) NOT NULL,
  `email_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tableusers`
--

INSERT INTO `tableusers` (`user_id`, `user_firstname`, `user_lastname`, `user_username`, `user_email`, `user_password`, `user_status`, `user_state`, `email_code`) VALUES
(1, 'Admin', 'User', 'admin', 'adminuser@email.com', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'ACTIVE', '7079c72c21415131774625ba1d64f4b0'),
(2, 'Ram Emerson', 'Goria', 'RamTheGreat', 'ramemersongoria.13.versus@gmail.com', '623a758a6d569b64a4ff4c9bfb7cf681', 'USER', 'ACTIVE', '623a758a6d569b64a4ff4c9bfb7cf681'),
(3, 'Christian', 'Shi', 'chrsitan99', 'Christianshi99@gmail.com', '2484b2d1aec71de2ca87f88af401a6af', 'USER', 'ACTIVE', '5501906f1d01230525fc0c8ef222f0b4'),
(4, 'Harold', 'Añonuevo', 'haroldpogi', 'hahaharold500@gmail.com', '4871c341acf3a376d943d7d337ba6e82', 'USER', 'ACTIVE', 'a8993fc6c89b4cd015585e57b0638e5a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tablecomment`
--
ALTER TABLE `tablecomment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `tablecomment_ibfk_1` (`user_id`),
  ADD KEY `tablecomment_ibfk_2` (`post_id`);

--
-- Indexes for table `tablepost`
--
ALTER TABLE `tablepost`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `tablepost_ibfk_1` (`user_id`);

--
-- Indexes for table `tableusers`
--
ALTER TABLE `tableusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tablecomment`
--
ALTER TABLE `tablecomment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tablepost`
--
ALTER TABLE `tablepost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tableusers`
--
ALTER TABLE `tableusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tablecomment`
--
ALTER TABLE `tablecomment`
  ADD CONSTRAINT `tablecomment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tableusers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tablecomment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `tablepost` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tablepost`
--
ALTER TABLE `tablepost`
  ADD CONSTRAINT `tablepost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tableusers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
