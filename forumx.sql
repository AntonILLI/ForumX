-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 11:14 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumx`
--

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user` varchar(100) NOT NULL,
  `time` int(11) DEFAULT NULL,
  `power` int(11) DEFAULT '0',
  `topic_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `content`, `user`, `time`, `power`, `topic_id`) VALUES
(40, 'Hello', 'Tony', 1567735839, 30, 14),
(41, 'What is going on ?', 'Bob', 1567735887, 20, 14),
(42, 'Use the Force, Luke', 'John', 1567738213, 40, 15),
(43, 'I love that one', 'Jane', 1567739876, 60, 15),
(44, 'Awesome!', 'Jason', 1567740019, 20, 15),
(45, 'Kawabanga', 'Tony', 1567809316, 30, 14),
(46, 'Go Go Go!', 'Jane', 1567810148, 60, 15),
(47, 'Hallelujah', 'Bob', 1567824668, 20, 14),
(48, 'NIce!', 'Tony', 1567993422, 40, 14),
(51, 'I am not J name but I prefer this over others', 'Kelly', 1568326999, 10, 15),
(52, 'This one is pretty cool', 'Cindy', 1568373721, 10, 13),
(53, 'I like special effects', 'Bob', 1568409611, 10, 13),
(54, 'Was not too bad', 'Kelly', 1568416977, 20, 13),
(55, 'I like this one', 'Lian', 1568427801, 10, 15),
(56, 'Magnificent', 'Bob', 1568521187, 20, 14),
(59, 'Can`t wait for the last episode', 'Andrew', 1568585936, 20, 14),
(60, 'R2D2 Forever!', 'Alex', 1568586044, 10, 13),
(61, 'Awesome!', 'Masashi', 1568589672, 10, 14);

-- --------------------------------------------------------

--
-- Table structure for table `xadmin`
--

CREATE TABLE `xadmin` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xadmin`
--

INSERT INTO `xadmin` (`id`, `title`, `description`, `image`) VALUES
(13, 'Star Wars: Episodes I - III', 'Three years into the Clone Wars, the Jedi rescue Palpatine from Count Dooku. As Obi-Wan pursues a new threat, Anakin acts as a double agent between the Jedi Council and Palpatine and is lured into a sinister plan to rule the galaxy.', 'Revenge_of_the_Sith.jpg'),
(14, 'Star Wars: Episodes VII â€“ IX ', 'Three decades after the Empire defeat, a new threat arises in the militant First Order. Defected stormtrooper Finn and the scavenger Rey are caught up in the Resistance search for the missing Luke Skywalker.', 'star-tag.jpg'),
(15, 'Star Wars: Episodes IV â€“ VI', 'Two Jedi escape a hostile blockade to find allies and come across a young boy who may bring balance to the Force, but the long dormant Sith resurface to claim their old glory.', 'maxresdefault1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `xusers`
--

CREATE TABLE `xusers` (
  `x_id` int(11) NOT NULL,
  `x_username` varchar(100) NOT NULL,
  `x_email` varchar(100) NOT NULL,
  `x_password` varchar(100) NOT NULL,
  `x_power` int(11) DEFAULT NULL,
  `x_description` text NOT NULL,
  `x_userimage` varchar(255) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xusers`
--

INSERT INTO `xusers` (`x_id`, `x_username`, `x_email`, `x_password`, `x_power`, `x_description`, `x_userimage`) VALUES
(1, 'admin', 'admin@forumx.com', '$2y$10$yUt2Nupdf47M.vonEiK9l.jaqvYFSfGoWvFpINQyOdczANtryatqq', 10, '', 'profile.png'),
(14, 'Kelly', 'kelly@xmail.com', '$2y$10$YKYljJdxk0UoxcYgPztUQefO1gJmXJToZB3IYa/qyac0YwKM7HLse', 30, '', 'profile.png'),
(16, 'Cindy', 'cindy@gmail.com', '$2y$10$RM/X72ooQUqYCqxI./Te6eAj1XfsyDkP9BC8KjWg4bQFE/FPDRsGm', 20, '', 'profile.png'),
(17, 'Bob', 'mrbob@gmail.com', '$2y$10$yL8tDh1QmLyMNF1FsUOv5OCzyBP5svYgNCd1LVqhHDDk23XtJlI8K', 30, '', 'profile.png'),
(18, 'Lian', 'lian@xmail.com', '$2y$10$6rZrdIKJU.eN52xsqRoCtuWb4ip2NsA6xsxT9zAWAsp0Jozae.d2K', 20, '', 'profile.png'),
(19, 'Superman', 'superman@superman.info', '$2y$10$1D6cGjAJtMWHw044leCF8uUjNx5Vqs8RUDlG7Ol0m4aPiHVUBYl66', 1030, '', 'profile.png'),
(20, 'Andrew', 'andrew@email.com', '$2y$10$PlptwckVW20ZhactPlIupe1Zb5G3SEuuwqATMFIT5N8D4pgbEwYa.', 30, '', 'profile.png'),
(21, 'Alex', 'alex@gmail.com', '$2y$10$9OWxge3jh9IgBqADt3VWoOnli3Q/ulKLGwBi6TwFyi/7xpyo5uBWK', 20, '', 'profile.png'),
(22, 'Masashi', 'masa@xmail.com', '$2y$10$XhPNozLUdyi9egMr8MP3jOob.3biY6AqR2n3LJmBfSK6OB3quWhBG', 20, '', 'profile.png'),
(23, 'Jack', 'jack@hotmail.com', '$2y$10$UBB5X8U8qlnEHDiA6mH3iO9T8YHoGFFrSSjyh/A/YpdfjqofXl/Zu', 10, '', 'profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `xadmin`
--
ALTER TABLE `xadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xusers`
--
ALTER TABLE `xusers`
  ADD PRIMARY KEY (`x_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `xusers`
--
ALTER TABLE `xusers`
  MODIFY `x_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `xadmin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
