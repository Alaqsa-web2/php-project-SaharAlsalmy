-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 11:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_social_media_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(11) NOT NULL,
  `comment` varchar(20) DEFAULT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`) VALUES
(135, 'sahar\r\n', 244204098, 4831945586376);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `post` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `has_image` tinyint(1) DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `post`, `image`, `has_image`, `parent`, `date`, `user_id`, `likes`, `comments`) VALUES
(14, 572175294, 'صلى على حبيبنا محمد ❤', NULL, NULL, NULL, '2022-06-29 18:47:48', 737025970, NULL, NULL),
(15, 6169329146, 'بسم الله نبدأ سعادة جديدة 🥰💙', NULL, NULL, NULL, '2022-06-29 20:05:42', 232342, NULL, NULL),
(16, 780298, 'اللهم إني اسألك خير هذا اليوم، وأعوذ بك من شر ما فيه و شر ما بعده.', NULL, NULL, NULL, '2022-06-29 20:09:39', 4852608, NULL, NULL),
(17, 567834675989143113, 'new img', '', 0, NULL, '2022-06-29 22:28:22', 4852608, NULL, NULL),
(18, 605212075121406, 'hi', '', 0, NULL, '2022-06-29 22:39:42', 14616847517348, NULL, NULL),
(22, 7512, 'إِنَّ اللَّهَ وَمَلَائِكَتَهُ يُصَلُّونَ عَلَى النَّبِيِّ ۚ يَا أَيُّهَا الَّذِينَ آمَنُوا صَلُّوا عَلَيْهِ وَسَلِّمُوا تَسْلِيمًا (56)\r\n💖', '', 0, NULL, '2022-07-02 11:29:20', 545728, NULL, NULL),
(23, 401915590, 'new comment', '', 0, NULL, '2022-07-02 11:42:42', 14616847517348, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `url_address` varchar(100) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `email`, `password`, `url_address`, `date`) VALUES
(9, 14616847517348, 'shatha', 'abas', 'Female', 'sahath@gmail.com', ' 1111', 'shatha.abas', '2022-05-16 09:13:33'),
(29, 448704551481865, 'layla', 'jad', 'Female', 'Layla@gmail.com', ' 4040', 'layla@v.ahmad@m', '2022-06-29 15:06:50'),
(30, 737025970, 'samar', 'ali', 'Female', 'samar@gmail.com', ' 3333', 'samar@n.ali@g.com', '2022-06-29 15:46:19'),
(31, 232342, 'sahar', 'alsalmy', 'Female', 'sahar@gmail.com', '0000', 'sahar@alslamy', '2022-06-29 17:01:46'),
(32, 4852608, 'mosbah', 'mosa', 'Male', 'mosbah@gmail.com', '9999', 'mosbah@mousa', '2022-06-29 17:03:00'),
(33, 6266, 'noor@s', 'ali@d', 'Female', 'noor@gmail.com', ' noor', 'noor@s.ali@d', '2022-07-02 07:53:27'),
(34, 545728, 'frah', 'omer', 'Female', 'farah@gmail.com', ' 1111', 'frah.omer', '2022-07-02 08:19:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment` (`comment`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `date` (`date`),
  ADD KEY `parent` (`parent`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `likes` (`likes`),
  ADD KEY `comments` (`comments`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `date` (`date`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `email` (`email`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
