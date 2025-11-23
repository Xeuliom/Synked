-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3309
-- Generation Time: Jun 25, 2025 at 01:33 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(11, 78, 1, 'trallalelo tralalala a7sen 7ota', '2025-06-24 21:55:14'),
(12, 78, 1, 'wld drbna lay tlok sra7o', '2025-06-24 21:55:33'),
(13, 78, 1, 'l7anana❤️', '2025-06-24 21:55:50'),
(14, 91, 1, 'cdfghdfhr', '2025-06-25 00:11:09'),
(15, 91, 2, 'ye man i luv tall girls too', '2025-06-25 01:41:37'),
(16, 78, 4, 'amin', '2025-06-25 11:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `like_count` int(11) DEFAULT '0',
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`, `like_count`, `media`) VALUES
(75, 1, '&é\"', '2025-06-24 18:17:46', 0, NULL),
(78, 3, 'i am mr beast with big fish, avec trallelo tralala', '2025-06-24 20:49:33', 0, '685b0f5d821b6_Funny-Indian-Photoshop-skills-2.jpg'),
(79, 2, 'fxghn', '2025-06-24 22:39:36', 0, NULL),
(80, 2, 'bro this is crezy a bit hh', '2025-06-24 22:44:29', 0, '685b2a4d16ecb_600x200.png'),
(91, 1, 'man iluv this girl', '2025-06-24 22:56:43', 0, '685b2d2b91eac_b5930dbe-30a9-4785-ba5d-bd46f73f8466.jpg'),
(92, 4, 'im here now hh', '2025-06-25 10:23:54', 0, NULL),
(93, 5, 'iran best', '2025-06-25 10:43:48', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_reactions`
--

CREATE TABLE `post_reactions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emoji` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_reactions`
--

INSERT INTO `post_reactions` (`id`, `post_id`, `user_id`, `emoji`, `created_at`) VALUES
(1, 78, 1, '😡', '2025-06-24 22:30:09'),
(6, 78, 2, '😢', '2025-06-24 22:30:31'),
(10, 75, 2, '😡', '2025-06-24 22:30:41'),
(11, 75, 1, '❤️', '2025-06-24 22:30:47'),
(14, 79, 2, '❤️', '2025-06-24 22:39:46'),
(21, 91, 1, '😂', '2025-06-24 22:56:50'),
(22, 91, 2, '❤️', '2025-06-24 23:13:22'),
(23, 93, 5, '❤️', '2025-06-25 10:43:51'),
(26, 75, 5, '❤️', '2025-06-25 12:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `profile_image`) VALUES
(1, 'Ismail', 'Kotbi', 'iskb1995@gmail.com', '$2y$10$IRMWLagpQK.WGdDBg/YJF.0heSBR3IptgcO/HvKS4sve1lol7fCn2', '685ad10f5230c_artworks-E6jyeTG9Ya9hzzlb-AvxmIQ-t500x500.jpg'),
(2, 'is', 'kb', 'iskb@gmail.com', '$2y$10$1rc5dAWkQM2kPDP5403FKu7xYgyOysI5UGfuI1JSQewNzdGSqk.ke', '685b1dc964917_artworks-000078413027-0yux89-t500x500.jpg'),
(3, 'adnane', 'morchid', 'admor@gmail.com', '$2y$10$55nqfzy5dR0eQAlBQk/6C.Ic521Sz.hCZRQk2RcAMsuTAaJXbwKPW', '685b0f467ebeb_Funny-Indian-Photoshop-skills-2.jpg'),
(4, 'hi', 'ho', 'hiho@gmail.com', '$2y$10$PeYzpG/JYCGt84tuqI9cW.M0l86Ltw1FdyHH9ubj0of1vGy1GhuZC', '685bcde68e128_Untitled design.png'),
(5, 'hap', 'hey', 'haphey@mail.com', '$2y$10$0S.EOjdllJyAwXXkV3VASO3WstQnaoNCqv7anpH3iw8LNdm3C/y7m', '685bd2d71a601_Operation_Upshot-Knothole_-_Badger_001.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD CONSTRAINT `post_reactions_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_reactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
