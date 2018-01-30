-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2017 at 07:51 AM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES
(1, 2123232323, 'Yo YO', 'yoyo.yoyo', 4, 'yoyo@gmail.com', 'www.yoyo.com', 'profile-pic.png', 'this is a demo commentthis is a demo comment this is a demo comment this is a demo comment', 'approve'),
(2, 2121232323, 'harry', 'harry.yes', 3, 'harry.yes@gmail.com', 'www.harry.com', 'pp3.png', 'this is another333 comment. this is another333 comment. this is another333 comment.', 'approve'),
(5, 2034343434, 'heena hoho', 'heena.hoho', 2, 'hena.hoho@gmail.com', 'www.heena.com', 'profile-pic.png', 'hey this is heena hoh hoho kjbkjbkjv', 'unapprove'),
(6, 1487061315, 'heman', 'user', 4, 'hhgg@gmail.com', 'www.heman.com', 'profile-pic.png', 'hey its human....stop looking at me', 'unapprove'),
(7, 1487068894, 'cool man', 'user', 4, 'coolman@hjh.com', 'www.coolman.com', 'profile-pic.png', 'yo yo cool man is here', 'approve'),
(14, 1487604327, 'naval jassi', 'njassi', 4, 'njassi@hh.ss', '', 'pp4.png', 'demo comment', 'approve'),
(15, 1487604512, 'naval jassi', 'njassi', 4, 'njassi@hh.ss', '', 'pp4.png', 'demo comment', 'approve'),
(16, 2123232323, 'Yo YO', 'again.again', 4, 'yoyo@gmail.com', 'www.yoyo.com', 'profile-pic.png', 'this is a demo commentthis is a demo comment this is a demo comment this is a demo comment', 'approve'),
(17, 1487607560, 'rooo tttttt', 'user', 4, 'roooo.ttt@gg.nbb', 'jhggjkgkg', 'profile-pic.png', 'australia', 'unapprove');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
