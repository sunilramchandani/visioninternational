-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 01:27 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visionin_international`
--

-- --------------------------------------------------------

--
-- Table structure for table `featuredimage`
--

CREATE TABLE `featuredimage` (
  `id` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `main_image_description` longtext,
  `sub_image1` varchar(255) DEFAULT NULL,
  `sub_image1_description` longtext,
  `sub_image2` varchar(255) DEFAULT NULL,
  `sub_image2_description` longtext,
  `sub_image3` varchar(255) DEFAULT NULL,
  `sub_image3_title` varchar(200) NOT NULL,
  `sub_image3_description` longtext,
  `sub_image3_validity` date NOT NULL,
  `sub_image4` varchar(255) DEFAULT NULL,
  `sub_image4_description` longtext,
  `sub_image4_sender` varchar(200) NOT NULL,
  `sub_image4_sender_title` varchar(200) NOT NULL,
  `sub_image5` varchar(255) DEFAULT NULL,
  `sub_image5_description` longtext,
  `link` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `featuredimage`
--

INSERT INTO `featuredimage` (`id`, `page_name`, `main_image`, `main_image_description`, `sub_image1`, `sub_image1_description`, `sub_image2`, `sub_image2_description`, `sub_image3`, `sub_image3_title`, `sub_image3_description`, `sub_image3_validity`, `sub_image4`, `sub_image4_description`, `sub_image4_sender`, `sub_image4_sender_title`, `sub_image5`, `sub_image5_description`, `link`, `created_at`, `updated_at`, `description`, `deleted_at`) VALUES
(3, 'home', 'Internship.jpg', 'dadada', 'home-left.png', NULL, 'home-right.png', NULL, 'APPLICATION.jpg', 'FLY TO FLORIDA', 'We have a special promo on our WAT programs. Enjoy this generous discount when you apply with VIP today. This offer is for current students and fresh graduates looking to explore opportunities in the US.', '2017-12-25', 'home-right.png', 'This program is really a huge help for studens like me because I was able to do a lot of things I never would have imagined myself doing. This program also made me independent and help me gain new friends with different nationalities. This is a heck of an experience you can\'t just buy with money. I learned, I gained experience, and I grew.', 'Love Joy Adviento', 'Work & Travel Program, Califonia', NULL, NULL, 'internship', '2018-02-01 10:47:08', '2018-02-01 02:47:08', '', '0000-00-00 00:00:00'),
(4, 'internship', 'Internship.jpg', 'dadada', NULL, NULL, NULL, NULL, NULL, '', NULL, '0000-00-00', NULL, NULL, '', '', NULL, NULL, '', '2018-02-01 12:13:28', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 'application', 'Internship.jpg', 'application', NULL, NULL, NULL, NULL, NULL, '', NULL, '0000-00-00', NULL, NULL, '', '', NULL, NULL, '', '2018-02-01 12:13:28', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 'contact_us', 'Internship.jpg', 'kontakin moko', NULL, NULL, NULL, NULL, NULL, '', NULL, '0000-00-00', NULL, NULL, '', '', NULL, NULL, '', '2018-02-01 12:13:28', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `featuredimage`
--
ALTER TABLE `featuredimage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `featuredimage`
--
ALTER TABLE `featuredimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
