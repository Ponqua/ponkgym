-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 02:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponk_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `username`, `profile_image`, `comment_text`, `date`) VALUES
(1, 17, 7, 'Onions', 'Onions_pic.png', 'comment!', '2022-03-20 19:09:59'),
(2, 17, 7, 'Onions', 'Onions_pic.png', 'this is crazy that this actually works', '2022-03-20 19:29:53'),
(3, 17, 7, 'Onions', 'Onions_pic.png', 'dsds', '2022-03-20 19:30:01'),
(4, 17, 7, 'Onions', 'Onions_pic.png', 'asdasd', '2022-03-20 19:30:03'),
(5, 17, 7, 'Onions', 'Onions_pic.png', 'wdwdwdw', '2022-03-20 19:30:04'),
(6, 17, 7, 'Onions', 'Onions_pic.png', 'this is cool', '2022-03-20 19:30:12'),
(7, 16, 7, 'Onions', 'Onions_pic.png', 'wow crazy', '2022-03-20 19:30:21'),
(8, 17, 7, 'Onions', 'Onions_pic.png', 'penis', '2022-03-20 19:31:12'),
(9, 17, 7, 'Onions', 'Onions_pic.png', 'nevemind', '2022-03-20 19:31:19'),
(10, 17, 7, 'Onions', 'Onions_pic.png', 'hello', '2022-03-20 19:32:43'),
(11, 19, 7, 'Onions', 'Onions_pic.png', 'lol', '2022-03-21 10:51:59'),
(12, 22, 7, 'Onions', 'Onions_pic.png', 'yeah man', '2022-03-21 19:48:33'),
(13, 23, 7, 'Onions', 'Onions_pic.png', 'hello', '2022-03-21 20:02:04'),
(15, 25, 9, 'Joro66', 'Joro66_pic.png', 'cool', '2022-03-21 20:20:49'),
(16, 25, 7, 'Onions', 'Onions_pic.png', 'poo', '2022-03-21 20:45:36'),
(25, 35, 7, 'Onions', 'Onions_pic.png', 'yoooo no way', '2022-03-24 13:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE `followings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `other_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`id`, `user_id`, `other_user_id`) VALUES
(4, 8, 7),
(6, 9, 8),
(7, 9, 7),
(20, 7, 8),
(25, 11, 7),
(29, 7, 6),
(31, 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(18, 7, 25),
(19, 7, 35);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `caption` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `likes`, `caption`, `date`, `username`, `profile_image`, `image`) VALUES
(24, 7, 0, 'Poggi', '2022-03-21 20:10:53', 'Onions', 'Onions_pic.png', 'Workout1.png'),
(25, 8, 1, 'Big arms', '2022-03-21 20:17:33', 'Ponk', 'Ponk_pic.png', 'Workout3.png'),
(35, 11, 1, 'hasboola', '2022-03-24 13:02:26', 'Hasbulla', 'Hasbulla_pic.png', 'Workout2.png'),
(40, 7, 0, 'core', '2022-03-24 17:30:10', 'Onions', 'Onions_pic.png', 'Workout5.png'),
(48, 7, 0, 'i did an arm workout', '2022-03-25 08:57:29', 'Onions', 'Onions_pic.png', 'Workout3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT 'pfp-template.png',
  `followers` int(11) DEFAULT 0,
  `following` int(11) DEFAULT 0,
  `posts` int(11) DEFAULT 0,
  `bio` text COLLATE utf8_unicode_ci DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `image`, `followers`, `following`, `posts`, `bio`) VALUES
(6, 'Jamie Hilburn', '9271d6eecedd55fcfa6143a33029d496', 'jamie@hilburn.co.uk', 'Jamie Hilburn_pic.png', 1, 0, 0, 'Hello my name is jamie hilburn and i like going ot the gym :)'),
(7, 'Onions', '05a671c66aefea124cc08b76ea6d30bb', 'test@mail.com', 'Onions_pic.png', 3, 3, 3, 'I am the Test user of this platform, Ponk\'s Gym.'),
(8, 'Ponk', 'f5bb0c8de146c67b44babbf4e6584cc0', 'ponkyponk123@gmail.com', 'Ponk_pic.png', 2, 1, 1, 'Ponch'),
(9, 'Joro66', '1716cfc96ba99141cd7398991f2ba307', 'mail@johnrowley.com', 'Joro66_pic.png', 1, 2, 0, 'Hi im john'),
(10, 'username1', 'f5bb0c8de146c67b44babbf4e6584cc0', 'testaccount1@email.com', 'pfp-template.png', 1, 0, 0, 'none'),
(11, 'Hasbulla', '4a79da0b315b3e48c288a46dd88339c9', 'liam3frey@gmail.com', 'Hasbulla_pic.png', 1, 1, 1, 'Abdu Rozik <3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `followings`
--
ALTER TABLE `followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
