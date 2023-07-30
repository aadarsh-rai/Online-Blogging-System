-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 10:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Gaming', 'This is a gaming category'),
(2, 'Travel ', 'This is a travel category\r\n'),
(3, 'Anime', 'This is a Anime category'),
(4, 'Science &amp; Technology', 'This is a Science &amp; Technology category'),
(5, 'Wildlife', 'This is a Wildlife category '),
(6, 'Food ', 'This is a Food category'),
(7, 'Uncategorized', 'This is a uncategorized category\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(2, 'What does the Koalas eat?', 'The koala feeds very selectively on the leaves of certain eucalyptus trees. Generally solitary, individuals move within a home range of more than a dozen trees, one of which is favoured over the others. If koalas become too numerous in a restricted area, they defoliate preferred food trees and, unable to subsist on even closely related species, decline rapidly. To aid in digesting as much as 1.3 kg (3 pounds) of leaves daily, the koala has an intestinal pouch (cecum) about 2 metres (7 feet) long, where symbiotic bacteria degrade the tannins and other toxic and complex substances abundant in eucalyptus. This diet is relatively poor in nutrients and provides the koala little spare energy, so the animal spends long hours simply sitting or sleeping in tree forks, exposed to the elements but insulated by thick fur. Although placid most of the time, koalas produce loud, hollow grunts.', '1690628630koalas.jpg', '2023-07-29 11:03:50', 5, 2, 0),
(3, 'Vagabond', 'great anime', '1690707165vagabond.jpg', '2023-07-30 08:52:45', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Sponge', 'Bob', 'Spongebob', 'Spongebob@gmail.com', '$2y$10$GpmcpSQhHkHX3LI9/ycdYOzG/xtoB1v1QXTQEcsRSrbZv13hTuk1K', '1686382167avatar-5.jpg', 1),
(2, 'Mob ', 'Psycho', 'Kageyama', 'Kageyama@gmail.com', '$2y$10$qyzXEe9F1HFh4iiuPwQ4ge7wOFFFFbj19DCulB8eP2mbLM/3kNq5O', '1686413122avatar-9.jpg', 0),
(3, 'Squid', 'ward', 'Squidward', 'Squidward123@gmail.com', '$2y$10$VNtmaU/HYEyw2/2WBkp2VOyUBe/cwiieWjiUmvkKVMbFT8aVQq9MW', '1686644518avatar-1.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
