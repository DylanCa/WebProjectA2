-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 04:03 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--
  DROP DATABASE IF EXISTS webproject;

  CREATE DATABASE webproject;

  USE webproject;
-- --------------------------------------------------------

--
-- Table structure for table `admin_votes`
--

CREATE TABLE `admin_votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `clubID` int(11) NOT NULL,
  `isLiked` int(11) NOT NULL,
  `isDisliked` int(11) NOT NULL,
  `setAvailable` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_votes`
--

INSERT INTO `admin_votes` (`id`, `userID`, `eventID`, `clubID`, `isLiked`, `isDisliked`, `setAvailable`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 3, 1, 0, 0, '2017-04-20 13:16:53', '2017-04-20 13:16:53'),
(2, 1, 0, 1, 0, 0, 1, '2017-04-20 13:16:54', '2017-04-20 13:16:54'),
(3, 1, 0, 2, 0, 0, 1, '2017-04-20 13:16:56', '2017-04-20 13:16:56'),
(4, 1, 2, 0, 0, 0, 1, '2017-04-20 13:17:02', '2017-04-20 13:17:02'),
(5, 1, 3, 0, 0, 0, 1, '2017-04-20 13:18:01', '2017-04-20 13:18:01'),
(6, 1, 1, 0, 0, 1, 0, '2017-04-20 13:18:08', '2017-04-20 13:18:08'),
(7, 1, 0, 4, 0, 0, 1, '2017-04-20 13:24:50', '2017-04-20 13:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `bdes`
--

CREATE TABLE `bdes` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bdes`
--

INSERT INTO `bdes` (`id`, `userID`, `upvote`, `downvote`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 2, 7, 3, NULL, '2017-04-20 13:16:29', '2017-04-20 13:22:47'),
(5, 1, 0, 0, NULL, '2017-04-20 13:22:54', '2017-04-20 13:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clubCreator` int(11) NOT NULL,
  `short_descr` text COLLATE utf8_unicode_ci NOT NULL,
  `long_descr` text COLLATE utf8_unicode_ci NOT NULL,
  `clubimage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg',
  `budget` decimal(2,2) NOT NULL,
  `totalAmount` decimal(2,2) NOT NULL,
  `upvote_admin` int(11) NOT NULL,
  `downvote_admin` int(11) NOT NULL,
  `isAvailable` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `clubCreator`, `short_descr`, `long_descr`, `clubimage`, `budget`, `totalAmount`, `upvote_admin`, `downvote_admin`, `isAvailable`, `created_at`, `updated_at`) VALUES
(1, 'Robot', 2, 'This is the Robot Club', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'https://image.freepik.com/free-vector/coloured-robot-design_1148-9.jpg', '0.99', '0.00', 0, 0, 1, '2017-04-20 13:13:03', '2017-04-20 13:16:54'),
(2, 'Jeu de rôle', 2, 'This is the Role Play club', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://a133.idata.over-blog.com/4/08/29/56/Materiel-pour-articles-10/jdr-mag-logo.jpg', '0.00', '0.00', 0, 0, 1, '2017-04-20 13:13:35', '2017-04-20 13:16:56'),
(3, 'Waiting for approval club', 2, 'This is the short Description.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg', '0.00', '0.00', 1, 0, 0, '2017-04-20 13:13:54', '2017-04-20 13:16:53'),
(4, 'Admin test club', 1, 'This is the short Description.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg', '0.00', '0.00', 0, 0, 1, '2017-04-20 13:24:45', '2017-04-20 13:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `club_members`
--

CREATE TABLE `club_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `clubID` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `club_members`
--

INSERT INTO `club_members` (`id`, `userID`, `clubID`, `rank`, `role`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '', '2017-04-20 13:13:03', '2017-04-20 13:13:03'),
(2, 2, 2, 1, '', '2017-04-20 13:13:35', '2017-04-20 13:13:35'),
(3, 2, 3, 1, '', '2017-04-20 13:13:54', '2017-04-20 13:13:54'),
(4, 1, 2, 2, '', '2017-04-20 13:17:33', '2017-04-20 13:17:33'),
(5, 1, 4, 2, '', '2017-04-20 13:24:45', '2017-04-20 13:24:45'),
(7, 1, 1, 0, '', '2017-04-20 13:35:00', '2017-04-20 13:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventCreator` int(11) NOT NULL,
  `short_descr` text COLLATE utf8_unicode_ci NOT NULL,
  `long_descr` text COLLATE utf8_unicode_ci NOT NULL,
  `eventDate` date NOT NULL,
  `eventimage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg',
  `clubID` int(11) NOT NULL,
  `upvote_admin` int(11) NOT NULL,
  `downvote_admin` int(11) NOT NULL,
  `isAvailable` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `eventCreator`, `short_descr`, `long_descr`, `eventDate`, `eventimage`, `clubID`, `upvote_admin`, `downvote_admin`, `isAvailable`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(1, 'ergh', 1, 'ergj', 'edfh', '2017-12-31', 'http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg', 0, 0, 1, 0, 0, 1, '2017-04-20 13:07:39', '2017-04-20 13:18:08'),
(2, 'Event #1 without Club, with Image', 2, 'This is the short Description.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-31', 'https://images-na.ssl-images-amazon.com/images/G/01/img15/pet-products/small-tiles/23695_pets_vertical_store_dogs_small_tile_8._CB312176604_.jpg', 0, 0, 0, 1, 0, 1, '2017-04-20 13:11:44', '2017-04-20 13:31:59'),
(3, 'Event #2 - With club, without image', 1, 'This is the short Description.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-31', 'http://dev.meilleures-licences.com/logo_ecole/logoexiainge-1449052490.jpg', 2, 0, 0, 1, 0, 0, '2017-04-20 13:17:55', '2017-04-20 13:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `event_likes`
--

CREATE TABLE `event_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `isLiked` int(11) NOT NULL,
  `isDisliked` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_likes`
--

INSERT INTO `event_likes` (`id`, `userID`, `eventID`, `isLiked`, `isDisliked`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, '2017-04-20 13:18:04', '2017-04-20 13:18:04'),
(2, 2, 2, 0, 1, '2017-04-20 13:31:59', '2017-04-20 13:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `event_members`
--

CREATE TABLE `event_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `isAdmin` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_members`
--

INSERT INTO `event_members` (`id`, `userID`, `eventID`, `isAdmin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2017-04-20 13:07:39', '2017-04-20 13:07:39'),
(2, 2, 2, 2, '2017-04-20 13:11:44', '2017-04-20 13:11:44'),
(3, 1, 3, 2, '2017-04-20 13:17:55', '2017-04-20 13:17:55'),
(4, 1, 2, 0, '2017-04-20 13:40:27', '2017-04-20 13:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `event_message_boards`
--

CREATE TABLE `event_message_boards` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_message_boards`
--

INSERT INTO `event_message_boards` (`id`, `userID`, `eventID`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'A message', '2017-04-20 13:30:53', '2017-04-20 13:30:53'),
(2, 1, 2, 'Another message', '2017-04-20 13:31:05', '2017-04-20 13:31:05'),
(3, 2, 2, 'A message', '2017-04-20 13:32:06', '2017-04-20 13:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2017_04_14_195746_create_events_table', 1),
('2017_04_14_212508_create_club_members_table', 1),
('2017_04_14_212514_create_event_members_table', 1),
('2017_04_14_212526_create_store_table', 1),
('2017_04_14_212537_create_clubs_table', 1),
('2017_04_14_212604_create_event_message_boards_table', 1),
('2017_04_16_020008_create_event_likes_table', 1),
('2017_04_17_015228_create_admin_votes_table', 1),
('2017_04_20_145522_create_bdes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `pictureID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `price`, `description`, `stock`, `pictureID`, `created_at`, `updated_at`) VALUES
(23, 'Balle Vert', 2, 'Balle antistress de 50 mm de diametre', 10, 1, '2017-04-20 13:59:31', '2017-04-20 13:59:31'),
(22, 'Balle Bleu', 2, 'Balle antistress de 50 mm diam', 10, 2, '2017-04-20 13:59:26', '2017-04-20 13:59:26'),
(20, 'Polo 2', 19, 'Polo en jersey CESI. Logo brod', 10, 8, '2017-04-20 13:59:17', '2017-04-20 13:59:17'),
(19, 'Polo 1', 19, 'Polo en jersey CESI. Logo brod', 10, 7, '2017-04-20 13:59:14', '2017-04-20 13:59:14'),
(18, 'Sweat 1', 25, 'Elastique de maintien au niveau de la taille et des poignets Etiquette Uniplay cousue au niveau du col. Mod', 10, 6, '2017-04-20 13:59:00', '2017-04-20 13:59:00'),
(17, 'Sweat 1', 25, 'Elastique de maintien au niveau de la taille et des poignets Etiquette Uniplay cousue au niveau du col. Mod', 10, 6, '2017-04-20 13:58:43', '2017-04-20 13:58:43'),
(24, 'Stylo', 9, 'Super Stylo bille inspir', 10, 5, '2017-04-20 13:59:37', '2017-04-20 13:59:37'),
(25, 'Dark Cookie', 1, 'Petit biscuit sec et rond aux p', 10, 10, '2017-04-20 13:59:43', '2017-04-20 13:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catchPhrase` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `schoolLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL,
  `isBDE` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `avatar`, `catchPhrase`, `schoolLocation`, `isAdmin`, `isBDE`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Account', 'admin.account@cesi.fr', 'admin', '', '', '', 1, 1, NULL, '2017-04-20 13:09:39', '2017-04-20 13:23:01'),
(2, 'User', 'Account', 'user.account@viacesi.fr', 'user', '', '', '', 0, 0, NULL, '2017-04-20 13:09:52', '2017-04-20 13:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_votes`
--
ALTER TABLE `admin_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bdes`
--
ALTER TABLE `bdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_members`
--
ALTER TABLE `club_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_likes`
--
ALTER TABLE `event_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_members`
--
ALTER TABLE `event_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_message_boards`
--
ALTER TABLE `event_message_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_votes`
--
ALTER TABLE `admin_votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bdes`
--
ALTER TABLE `bdes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `club_members`
--
ALTER TABLE `club_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event_likes`
--
ALTER TABLE `event_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event_members`
--
ALTER TABLE `event_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event_message_boards`
--
ALTER TABLE `event_message_boards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
