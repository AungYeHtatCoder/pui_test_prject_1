-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 07:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pui_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'First Category Update', '2022-08-26 14:44:37', '2022-08-26 09:44:57'),
(2, 'Second Category', '2022-08-26 07:45:16', '2022-08-26 09:44:57'),
(3, 'Second Category', '2022-08-26 08:03:34', '2022-08-26 14:33:34'),
(5, 'Second Category edit', '2022-10-06 10:35:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_code` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_code`, `created_at`, `updated_at`) VALUES
(1, 'KG', 001, '2022-09-17 03:27:05', '2022-09-17 05:27:05'),
(2, 'Grade 1', 002, '2022-09-17 03:27:18', '2022-09-17 05:27:17'),
(3, 'Grade 2', 003, '2022-09-17 03:27:36', '2022-09-17 05:27:36'),
(4, 'Grade 3', 004, '2022-09-17 03:27:55', '2022-09-17 05:27:55'),
(5, 'Grade 4', 005, '2022-09-17 03:28:10', '2022-09-17 05:28:10'),
(6, 'Grade 5', 006, '2022-09-17 03:28:28', '2022-09-17 05:28:28'),
(7, 'Grade 6', 007, '2022-09-17 03:28:49', '2022-09-17 05:28:49'),
(8, 'Grade 7', 008, '2022-09-17 03:29:10', '2022-09-17 05:29:10'),
(9, 'Grade 8', 009, '2022-09-17 03:29:26', '2022-09-17 05:29:26'),
(10, 'Grade 9', 010, '2022-09-17 03:29:45', '2022-09-17 05:29:45'),
(11, 'Grade 11', 011, '2022-09-17 03:30:13', '2022-09-17 05:30:13'),
(12, 'Wyman Heathcote DDS', 017, '2016-12-11 11:48:28', '0000-00-00 00:00:00'),
(13, 'Cassandra Kerluke', 003, '1988-06-06 19:25:02', '0000-00-00 00:00:00'),
(14, 'Tiffany Hand', 006, '1994-08-07 03:24:36', '0000-00-00 00:00:00'),
(15, 'Fabiola Okuneva', 017, '1973-10-29 05:12:13', '0000-00-00 00:00:00'),
(16, 'Flo Stokes', 018, '1993-12-17 01:04:52', '0000-00-00 00:00:00'),
(17, 'Peggie Bailey', 007, '1979-01-13 13:08:45', '0000-00-00 00:00:00'),
(18, 'Gaylord Hagenes', 004, '2017-09-25 13:26:37', '0000-00-00 00:00:00'),
(19, 'Georgianna Pfeffer', 012, '1999-06-01 07:19:41', '0000-00-00 00:00:00'),
(20, 'Mariano Kutch', 017, '2008-07-05 01:51:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 11, 18, 'ould really like to try to solve this instead of creating a new image. Thanks again', '2022-10-26 11:03:40', '2022-10-26 17:33:40'),
(2, 11, 18, 'ld really like to try to solve this instead of creating a new image. Thanks again', '2022-10-26 11:05:00', '2022-10-26 17:35:00'),
(3, 11, 18, 'mage. Thanks again\r\n\r\n', '2022-10-27 10:40:05', '2022-10-27 17:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `examintions`
--

CREATE TABLE `examintions` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examintions`
--

INSERT INTO `examintions` (`id`, `exam_name`, `created_at`, `updated_at`) VALUES
(1, 'First Weekly Exam', '2022-09-22 13:43:55', '2022-09-22 13:43:55'),
(2, 'Second Weekly Exam', '2022-09-22 13:44:28', '2022-09-22 13:44:28'),
(3, 'Third Weekly Exam', '2022-09-22 13:45:17', '2022-09-22 13:45:17'),
(4, 'Fourth Weekly Exam', '2022-09-22 13:48:30', '2022-09-22 13:48:30'),
(5, 'Fifth Weekly Exam', '2022-09-26 16:47:04', '2022-09-26 16:47:04'),
(6, 'Sixth Weekly exam', '2022-09-26 16:57:45', '2022-09-26 16:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sub_myanmar` int(11) NOT NULL,
  `sub_eng` int(11) NOT NULL,
  `sub_math` int(11) NOT NULL,
  `sub_scient` int(11) NOT NULL,
  `sub_geo` int(11) NOT NULL,
  `sub_history` int(11) NOT NULL,
  `examination_id` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `academic_year` varchar(200) NOT NULL,
  `tr_infos_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `program_id`, `student_id`, `class_id`, `sub_myanmar`, `sub_eng`, `sub_math`, `sub_scient`, `sub_geo`, `sub_history`, `examination_id`, `exam_date`, `exam_time`, `academic_year`, `tr_infos_id`, `created_at`, `updated_at`) VALUES
(2, 24, 2, 20, 23, 34, 45, 45, 43, 33, 6, '2022-10-04', '01:30:00', '2022-2023', 28, '2022-10-04 10:00:34', '2022-10-04 16:30:34'),
(3, 2, 1, 1, 33, 33, 33, 44, 44, 44, 1, '0000-00-00', '03:05:00', '2022-2023', 3, '2022-09-25 03:35:34', '2022-09-24 10:53:05'),
(4, 6, 2, 4, 11, 22, 22, 22, 22, 22, 4, '0000-00-00', '10:05:00', '2022', 28, '2022-09-25 03:36:10', '2022-09-24 10:59:36'),
(5, 7, 2, 5, 21, 22, 22, 22, 22, 22, 3, '0000-00-00', '07:05:00', '2022', 3, '2022-09-25 03:35:39', '2022-09-24 11:01:13'),
(6, 2, 1, 1, 12, 23, 32, 22, 12, 23, 3, '2022-09-24', '10:55:00', '2022', 28, '2022-09-24 05:00:04', '2022-09-24 11:30:04'),
(7, 2, 1, 1, 23, 32, 21, 12, 23, 34, 2, '2022-09-24', '07:05:00', '2022-2023', 3, '2022-09-24 05:03:40', '2022-09-24 11:33:40'),
(8, 2, 1, 1, 23, 34, 45, 43, 32, 22, 2, '2022-09-22', '04:00:00', '2022-2023', 28, '2022-09-24 05:04:45', '2022-09-24 11:34:45'),
(9, 24, 2, 20, 100, 20, 20, 20, 20, 20, 6, '2022-09-20', '10:05:00', '2022-2023', 28, '2022-10-04 09:58:17', '2022-10-04 16:28:17'),
(10, 24, 2, 20, 50, 40, 45, 55, 30, 52, 6, '2022-09-30', '10:05:00', '2022', 28, '2022-09-30 14:35:59', '2022-09-30 21:05:59'),
(11, 2, 1, 1, 52, 58, 58, 32, 12, 35, 1, '2022-09-27', '10:05:00', '2022-2023', 3, '2022-09-27 10:26:46', '2022-09-27 16:56:46'),
(12, 2, 1, 1, 54, 45, 55, 22, 56, 54, 2, '2022-09-27', '10:05:00', '2022-2023', 3, '2022-09-27 10:29:37', '2022-09-27 16:59:37'),
(13, 2, 1, 1, 65, 25, 12, 32, 85, 25, 2, '2022-09-27', '10:05:00', '2022-2023', 3, '2022-09-27 10:36:13', '2022-09-27 17:06:13'),
(14, 24, 2, 20, 23, 34, 45, 0, 32, 22, 6, '1970-01-01', '04:00:00', '2022-2023', 28, '2022-10-03 11:21:36', '2022-10-03 04:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category_id`, `description`, `file_name`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 'Thank You for Quering', 5, '<p>&nbsp;</p>\r\n\r\n<p>Thank You for Quering.... Let see below code and reply me</p>\r\n\r\n<p>&nbsp;</p>\r\n', '105974829_718310912317439_7853040374253940808_n.jpg', 11, '2022-10-21 10:07:58', '2022-10-21 16:37:58'),
(18, 'Hello World', 1, 'Thanks for looking into this. So I tried with your unlinks, nothing happens, I also used var_dump and the return is: bool(false), any tips from their ? I would really like to try to solve this instead of creating a new image. Thanks again\r\n', '108169343_728177877997409_5997762319807010534_n.jpg', 11, '2022-10-21 10:07:39', '2022-10-21 16:37:39'),
(19, 'About This Lesson', 1, 'About This Lesson\r\n\r\ná€’á€®á€žá€„á€ºá€á€”á€ºá€¸á€…á€¬á€™á€¾á€¬á€á€±á€¬á€· PDO database connection á€›á€±á€¸á€á€²á€·á€á€²á€· code á€á€½á€±á€€á€­á€¯ refactor á€œá€¯á€•á€ºá€€á€¼á€›á€¡á€±á€¬á€„á€ºá‹á€á€á€«á€á€Šá€ºá€¸á€•á€² Query Builder á€¡á€€á€¼á€±á€¬á€„á€ºá€¸á€œá€² á€‘á€Šá€ºá€·á€•á€¼á€±á€¬á€•á€±á€¸á€‘á€¬á€¸á€•á€«á€á€šá€ºá‹\r\n', 'photo_2022-08-12_20-21-46.jpg', 11, '2022-10-31 11:03:23', '0000-00-00 00:00:00'),
(20, 'About This Lesson ', 2, 'About This Lesson\r\n\r\ná€’á€®á€žá€„á€ºá€á€”á€ºá€¸á€…á€¬á€™á€¾á€¬á€á€±á€¬á€· PDO database connection á€›á€±á€¸á€á€²á€·á€á€²á€· code á€á€½á€±á€€á€­á€¯ refactor á€œá€¯á€•á€ºá€€á€¼á€›á€¡á€±á€¬á€„á€ºá‹á€á€á€«á€á€Šá€ºá€¸á€•á€² Query Builder á€¡á€€á€¼á€±á€¬á€„á€ºá€¸á€œá€² á€‘á€Šá€ºá€·á€•á€¼á€±á€¬á€•á€±á€¸á€‘á€¬á€¸á€•á€«á€á€šá€ºá‹\r\n', '311664305_671642757737384_565613112950767286_n.jpg', 11, '2022-10-31 11:04:09', '0000-00-00 00:00:00'),
(21, 'About This Lesson ', 5, 'About This Lesson\r\n\r\ná€’á€®á€žá€„á€ºá€á€”á€ºá€¸á€…á€¬á€™á€¾á€¬á€á€±á€¬á€· PDO database connection á€›á€±á€¸á€á€²á€·á€á€²á€· code á€á€½á€±á€€á€­á€¯ refactor á€œá€¯á€•á€ºá€€á€¼á€›á€¡á€±á€¬á€„á€ºá‹á€á€á€«á€á€Šá€ºá€¸á€•á€² Query Builder á€¡á€€á€¼á€±á€¬á€„á€ºá€¸á€œá€² á€‘á€Šá€ºá€·á€•á€¼á€±á€¬á€•á€±á€¸á€‘á€¬á€¸á€•á€«á€á€šá€ºá‹\r\n', '84336335_618635615618303_4413823682623832064_n.jpg', 11, '2022-10-31 11:04:50', '0000-00-00 00:00:00'),
(22, 'About This Lesson ', 3, 'About This Lesson\r\n\r\ná€’á€®á€žá€„á€ºá€á€”á€ºá€¸á€…á€¬á€™á€¾á€¬á€á€±á€¬á€· PDO database connection á€›á€±á€¸á€á€²á€·á€á€²á€· code á€á€½á€±á€€á€­á€¯ refactor á€œá€¯á€•á€ºá€€á€¼á€›á€¡á€±á€¬á€„á€ºá‹á€á€á€«á€á€Šá€ºá€¸á€•á€² Query Builder á€¡á€€á€¼á€±á€¬á€„á€ºá€¸á€œá€² á€‘á€Šá€ºá€·á€•á€¼á€±á€¬á€•á€±á€¸á€‘á€¬á€¸á€•á€«á€á€šá€ºá‹\r\n', '49900275_1976557919127663_557297183754289152_n.jpg', 11, '2022-10-31 11:05:25', '0000-00-00 00:00:00'),
(23, 'About This Lesson', 2, 'About This Lesson\r\n\r\ná€’á€®á€žá€„á€ºá€á€”á€ºá€¸á€…á€¬á€™á€¾á€¬á€á€±á€¬á€· PDO database connection á€›á€±á€¸á€á€²á€·á€á€²á€· code á€á€½á€±á€€á€­á€¯ refactor á€œá€¯á€•á€ºá€€á€¼á€›á€¡á€±á€¬á€„á€ºá‹á€á€á€«á€á€Šá€ºá€¸á€•á€² Query Builder á€¡á€€á€¼á€±á€¬á€„á€ºá€¸á€œá€² á€‘á€Šá€ºá€·á€•á€¼á€±á€¬á€•á€±á€¸á€‘á€¬á€¸á€•á€«á€á€šá€ºá‹\r\n', '89870900_643097479838783_2949822356807221248_n.jpg', 11, '2022-10-31 11:06:01', '0000-00-00 00:00:00'),
(24, 'About This Lesson', 3, 'About This Lesson\r\n\r\ná€’á€®á€žá€„á€ºá€á€”á€ºá€¸á€…á€¬á€™á€¾á€¬á€á€±á€¬á€· PDO database connection á€›á€±á€¸á€á€²á€·á€á€²á€· code á€á€½á€±á€€á€­á€¯ refactor á€œá€¯á€•á€ºá€€á€¼á€›á€¡á€±á€¬á€„á€ºá‹á€á€á€«á€á€Šá€ºá€¸á€•á€² Query Builder á€¡á€€á€¼á€±á€¬á€„á€ºá€¸á€œá€² á€‘á€Šá€ºá€·á€•á€¼á€±á€¬á€•á€±á€¸á€‘á€¬á€¸á€•á€«á€á€šá€ºá‹\r\n', 'images_1.jpg', 11, '2022-10-31 11:06:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `program_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`, `created_at`, `updated_at`) VALUES
(2, 'Education ', '2022-09-03 03:55:53', '2022-09-03 05:55:53'),
(3, 'test program updated', '2022-09-03 03:56:08', '2022-09-03 05:56:08'),
(4, 'Education updated EDE dfw', '2022-09-03 03:52:21', '0000-00-00 00:00:00'),
(5, 'Prof. Thaddeus Zemlak IV', '1992-08-11 20:32:38', '0000-00-00 00:00:00'),
(6, 'Prof. Ona Walker IV', '1974-04-20 19:50:41', '0000-00-00 00:00:00'),
(7, 'Maryjane Hayes', '1996-02-14 09:04:05', '0000-00-00 00:00:00'),
(8, 'Nat Howell', '2007-10-25 10:55:59', '0000-00-00 00:00:00'),
(9, 'Ilene Brown', '1971-11-22 16:11:10', '0000-00-00 00:00:00'),
(10, 'Mr. Luigi Waters', '1989-12-29 05:10:59', '0000-00-00 00:00:00'),
(11, 'Geovanny Hills I', '1970-04-12 03:26:24', '0000-00-00 00:00:00'),
(12, 'Prof. Terrell Conroy', '1996-09-12 11:51:43', '0000-00-00 00:00:00'),
(13, 'Dr. Melisa Considine', '2004-07-14 21:09:29', '0000-00-00 00:00:00'),
(14, 'Stewart Shields', '1976-04-05 15:34:51', '0000-00-00 00:00:00'),
(15, 'Karelle Bergnaum II', '1973-10-22 18:58:06', '0000-00-00 00:00:00'),
(16, 'Declan Monahan', '1976-01-18 02:34:41', '0000-00-00 00:00:00'),
(17, 'Dr. Jeramie Weimann', '2002-09-08 00:41:20', '0000-00-00 00:00:00'),
(18, 'Lowell Robel', '2014-02-09 10:19:03', '0000-00-00 00:00:00'),
(19, 'Ms. Ava Berge', '1973-04-26 16:56:14', '0000-00-00 00:00:00'),
(20, 'Yadira Dare', '1972-06-07 01:55:23', '0000-00-00 00:00:00'),
(21, 'Veda Pacocha', '1991-06-05 02:37:27', '0000-00-00 00:00:00'),
(22, 'Marjorie Hand', '1997-12-13 07:42:25', '0000-00-00 00:00:00'),
(23, 'Dr. Grayce Von', '2016-11-22 17:39:39', '0000-00-00 00:00:00'),
(24, 'Alexys Rutherford', '1987-08-27 21:31:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `value` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `value`) VALUES
(1, 'User Update', 1),
(2, 'Manager', 2),
(3, 'Admin', 3),
(4, 'Teacher', 4),
(10, 'Student', 5),
(11, 'Super Viser', 6);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL,
  `father_id_card_no` varchar(250) NOT NULL,
  `mother_id_card_no` varchar(255) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class_id` tinyint(6) NOT NULL,
  `user_id` tinyint(6) NOT NULL,
  `attach_file` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `father_name`, `mother_name`, `father_id_card_no`, `mother_id_card_no`, `phone`, `address`, `academic_year`, `class_id`, `user_id`, `attach_file`, `created_at`, `updated_at`) VALUES
(1, 'New Student ', 'MG GM', 'Hla Hla', 'p-p-p/201234', 'p-p-p/201234', '09257031942', 'Myanmar', '2022-2023', 1, 24, 'to_printHow Technology has affected us.pdf', '2022-09-22 09:48:38', '2022-09-20 14:50:18'),
(2, 'Mustafa Emard e', 'MG GM MY', 'Hla Hla', 'p-p-p/201234', 'p-p-p/201234', '09257031942', 'nnhhvg', '2022-2023', 1, 24, 'ebook6.pdf', '2022-09-20 10:27:35', '2022-09-20 16:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `subject_code`, `created_at`, `updated_at`) VALUES
(1, 'English', 001, '2022-09-05 11:11:47', '0000-00-00 00:00:00'),
(2, 'Myanmar', 002, '2022-09-08 02:47:13', '0000-00-00 00:00:00'),
(3, 'Bio', 003, '2022-09-08 02:47:29', '0000-00-00 00:00:00'),
(4, 'Physis', 004, '2022-09-08 02:47:46', '0000-00-00 00:00:00'),
(5, 'Chelsey Kozey', 039, '2000-05-26 00:18:33', '0000-00-00 00:00:00'),
(6, 'Prof. Neha Brown', 025, '1983-12-08 09:30:21', '0000-00-00 00:00:00'),
(7, 'Alysha Heathcote', 024, '1973-03-09 13:22:32', '0000-00-00 00:00:00'),
(8, 'Tom Walsh', 003, '2000-10-03 22:53:32', '0000-00-00 00:00:00'),
(9, 'Gracie Gutmann Jr.', 009, '1973-07-18 04:05:18', '0000-00-00 00:00:00'),
(10, 'Mrs. Twila Hoppe', 027, '2013-07-26 21:16:48', '0000-00-00 00:00:00'),
(11, 'Dr. Rozella Gutkowski', 047, '1998-04-18 03:11:10', '0000-00-00 00:00:00'),
(12, 'Mitchell Lockman', 015, '2001-05-09 20:07:53', '0000-00-00 00:00:00'),
(13, 'Dr. Sabina Daugherty Jr.', 016, '1978-02-01 22:06:59', '0000-00-00 00:00:00'),
(14, 'Alexander Hansen IV', 050, '1972-03-22 18:43:23', '0000-00-00 00:00:00'),
(15, 'Layla Wisoky PhD', 008, '1994-12-07 12:16:56', '0000-00-00 00:00:00'),
(16, 'Miss Bryana Smitham', 042, '1985-05-26 23:18:50', '0000-00-00 00:00:00'),
(17, 'Dawn Bernier', 010, '2022-05-17 14:29:08', '0000-00-00 00:00:00'),
(18, 'Melody Johnson', 018, '1974-09-02 18:56:44', '0000-00-00 00:00:00'),
(19, 'Prof. Chad Lueilwitz', 027, '2015-08-01 11:22:04', '0000-00-00 00:00:00'),
(20, 'Pattie Fay DVM', 032, '1980-10-14 03:36:56', '0000-00-00 00:00:00'),
(21, 'Elroy Macejkovic', 021, '1975-10-05 15:16:37', '0000-00-00 00:00:00'),
(22, 'Donny Bernier Jr.', 019, '1986-10-16 03:02:48', '0000-00-00 00:00:00'),
(23, 'Ceasar Mills', 008, '1973-04-04 12:06:12', '0000-00-00 00:00:00'),
(24, 'Prof. Kaylie Dooley', 041, '1973-09-27 22:29:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tr_infos`
--

CREATE TABLE `tr_infos` (
  `id` int(11) NOT NULL,
  `tr_name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `secondary_phone` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `fix_address` text NOT NULL,
  `experience` text NOT NULL,
  `academic_year` varchar(200) NOT NULL,
  `program_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_infos`
--

INSERT INTO `tr_infos` (`id`, `tr_name`, `phone`, `secondary_phone`, `address`, `fix_address`, `experience`, `academic_year`, `program_id`, `class_id`, `subject_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'KG Ashin updated', '09257031942', '345', 'Myanmar', 'Mandalay', '54', '2022-2023', 2, 1, 1, 11, '2022-09-22 10:30:17', '2022-09-22 17:00:17'),
(5, 'Aung Myo Khing ', '09257031942', '345', 'Myanmar', 'Mandalay', '2', '2022-2023', 2, 2, 1, 17, '2022-09-22 10:30:30', '2022-09-22 17:00:30'),
(6, 'Ashin Updated', '09257031942', '345', 'Myanmar', 'kghi', '54', '2022-2023', 2, 8, 1, 11, '2022-09-09 11:16:28', '2022-09-09 17:46:28'),
(7, 'TR KG New Teacher', '09257031942', '345', 'Myanmar', 'Mandalay', '2', '2022-2023', 2, 2, 2, 17, '2022-09-10 06:08:10', '2022-09-10 12:38:10'),
(8, 'TR KG New Teacher', '09257031942', '345', 'mm', 'md', '2', '2022-2023', 3, 2, 3, 17, '2022-09-10 06:11:57', '2022-09-10 12:41:57'),
(12, 'Paige Fritsch', '1-561-173-2762', '(397)684-3921', '717 Nikolaus Radial Suite 078\nNorth Angelo, CO 69547-6615', '2868 Kub Streets Apt. 528\nLoweview, TN 48264', '7', '2022', 1, 13, 14, 19, '1998-04-12 01:59:46', '2022-09-17 12:35:50'),
(13, 'Anne Graham DVM', '(602)621-5122x907', '744.871.5583', '86956 Wiegand Extension\nLake Shanel, AL 12389-3931', '6048 Alysha Forks Apt. 382\nEast Miabury, DE 49556', '10', '2009', 3, 13, 19, 72, '2017-03-31 05:24:27', '2022-09-17 12:35:50'),
(14, 'Ena Cole', '024.639.0108x215', '748.819.1766', '4113 Cremin Way\nKirstenstad, UT 32979', '0796 Janelle Locks\nKochhaven, NV 65126-4433', '7', '2004', 3, 20, 2, 88, '2010-03-16 23:41:44', '2022-09-17 12:35:50'),
(15, 'Brooke Paucek', '(584)922-5636x8932', '819-545-4657', '35352 Magdalen Well\nNorth Cynthiaview, HI 26626-7311', '0625 Nannie Forks Suite 964\nEast Abbey, OK 98158-4369', '9', '2007', 10, 10, 11, 48, '1984-12-27 22:33:35', '2022-09-17 12:35:50'),
(16, 'Ms. Sheila Goyette', '(700)984-5171', '+92(8)5301517147', '578 Janie Springs\nEast Leonemouth, DC 20299-2560', '849 Providenci Greens Suite 668\nEast Frederickbury, NH 03361', '9', '2007', 3, 2, 3, 99, '2016-08-07 10:54:07', '2022-09-17 12:35:50'),
(17, 'Hayden Tillman', '509.674.5872x5345', '1-784-657-1858x387', '7464 Jacinthe Mount Apt. 037\nGoyettefurt, CA 61147-7499', '948 Mayra Overpass\nPort Pattiemouth, IN 14441', '7', '2009', 5, 20, 18, 1, '1996-02-27 05:29:10', '2022-09-17 12:35:50'),
(18, 'Dr. Heath Hayes I', '+96(4)7221208202', '231.127.5119x989', '69588 Kuhic Hollow\nNorth Coby, AR 18081', '6197 Keebler Summit Suite 964\nThielborough, KY 04549-3990', '2', '2013', 1, 12, 8, 18, '1984-06-26 02:21:42', '2022-09-17 12:35:50'),
(19, 'Joanie Trantow', '(765)716-5812', '534-069-1229', '27813 Reagan Stravenue Suite 583\nHyattmouth, WY 61260', '1501 Irwin Hill\nNorth Mia, MN 57721', '10', '2012', 5, 14, 13, 74, '2005-08-19 13:07:22', '2022-09-17 12:35:50'),
(20, 'Krista Spencer', '764-642-6286', '345-160-5657', '1020 Albertha Squares Apt. 608\nLake Baileyshire, GA 45217-3807', '5888 Laron Light Suite 145\nCortneyberg, WV 86145-6406', '3', '2014', 5, 4, 17, 69, '2001-12-04 05:16:33', '2022-09-17 12:35:50'),
(21, 'Dr. Jamey Rau', '914.279.5229x82222', '1-265-045-1324x2236', '504 Homenick Harbors Apt. 372\nEast Fay, NV 68900', '39979 Hermiston Parkways\nKierahaven, MS 85407-4841', '10', '2013', 9, 6, 10, 53, '2021-01-30 04:24:07', '2022-09-17 12:35:50'),
(22, 'Ms. Delphine Smith', '232-102-3487x292', '(723)143-5771', '1753 Bruen Camp Suite 229\nGleasontown, MA 61239-8569', '263 Janae Divide\nSouth Quintenmouth, DC 77176', '10', '2010', 5, 7, 1, 57, '1984-07-19 20:26:36', '2022-09-17 12:35:50'),
(23, 'Shawn Bashirian', '04410773478', '020.496.3926x726', '1212 Lamar Squares Apt. 701\nKatherineberg, TN 52684', '367 Morar Ville Apt. 496\nDaughertyhaven, CA 19978', '4', '2016', 1, 15, 4, 40, '1994-03-28 13:37:27', '2022-09-17 12:35:50'),
(24, 'Merle Berge', '06394824552', '(049)608-3581x0843', '54418 Jamarcus Plains\nWest Busterbury, NM 19974-1742', '573 Mann Inlet Suite 279\nFavianview, NC 12814-7596', '10', '2003', 5, 13, 17, 100, '2005-10-28 18:04:57', '2022-09-17 12:35:50'),
(25, 'Onie Kovacek', '081.218.4129x5493', '493-328-5084x679', '1521 Samantha Knoll Suite 842\nLake Hettiefort, NV 56996', '936 Aufderhar Trail\nNorth Rolandofurt, OH 91447', '8', '2000', 8, 15, 11, 109, '1980-04-07 20:43:24', '2022-09-17 12:35:50'),
(26, 'Prof. Alvah Roob', '999-817-7877', '013-094-6800', '0104 Rossie Plaza Suite 450\nOletaland, VT 99542-2436', '92470 Glover Coves Suite 053\nChristiansenstad, DC 25406-9501', '7', '2021', 6, 15, 5, 54, '2014-04-13 02:25:14', '2022-09-17 12:35:50'),
(27, 'Kaylee Walsh', '214.147.4039', '(067)764-8005x14114', '617 Creola Square Suite 150\nCronachester, TX 45680', '5527 Izaiah Drives\nCaleighmouth, SC 09994', '7', '2007', 5, 14, 3, 83, '1972-05-21 21:52:17', '2022-09-17 12:35:50'),
(28, 'Vivienne DuBuque', '1-576-521-4834x29322', '(777)823-9892', '100 Barton Key\nPort Brian, WV 05385', '35209 Keira Trace Suite 548\nMarionburgh, IL 88139', '5', '2013', 4, 1, 11, 95, '1998-02-16 09:02:08', '2022-09-17 12:35:50'),
(29, 'Darius Daugherty', '1-345-903-3198', '734.494.8668', '556 Cummerata Fields\nWest Anderson, AR 06114', '969 Charlie Island Apt. 963\nKeatonton, KS 86034-3145', '6', '2004', 6, 19, 20, 103, '2008-08-08 20:57:22', '2022-09-17 12:35:50'),
(30, 'Lou O\'Reilly', '164-794-8717x114', '1-623-566-3808', '790 Hartmann Keys\nWest Greenland, MO 58553-6621', '7909 Becker Avenue\nKingfort, NE 96099-6724', '7', '2015', 6, 14, 4, 98, '2009-01-28 05:18:17', '2022-09-17 12:35:50'),
(31, 'Maxwell Beier', '674.213.2326', '410-445-1105x182', '64575 Frieda Dale\nWest Albert, WI 00658', '5570 Corkery Ports\nKristaview, NC 16639', '2', '2004', 2, 19, 1, 73, '1980-04-10 17:30:28', '2022-09-17 12:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `tr_upload_lessons`
--

CREATE TABLE `tr_upload_lessons` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `program_id` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `academic_year` varchar(250) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_upload_lessons`
--

INSERT INTO `tr_upload_lessons` (`id`, `title`, `program_id`, `class_id`, `subject_id`, `description`, `academic_year`, `file_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'new lesson', '3', 2, 15, 'dfadsfa', '2022', 'á€™á€„á€ºá€¸á€™á€›á€¾á€­á€á€²á€·á€”á€±á€¬á€€á€º - Annie.mp4', 14, '2022-11-08 10:26:26', '2022-11-08 16:56:26'),
(2, 'dfadsf', '2', 3, 15, 'dfadfad', '', 'á€™á€„á€ºá€¸á€™á€›á€¾á€­á€á€²á€·á€”á€±á€¬á€€á€º - Annie.mp4', 14, '2022-11-08 10:28:16', '2022-11-08 16:58:16'),
(4, 'dfadfa', '2', 2, 15, 'dfadfadf', '2022', 'hello - Annie.mp4', 14, '2022-11-08 11:20:41', '2022-11-08 17:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `suspended` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `photo`, `role_id`, `suspended`, `created_at`, `updated_at`) VALUES
(9, 'User', 'user@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', 'photo_2022-08-12_20-21-00.jpg', 1, 0, '2022-08-26 10:17:23', '0000-00-00 00:00:00'),
(10, 'Manager', 'manager@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', 'photo_2022-08-24_21-15-08.jpg', 2, 0, '2022-08-26 10:18:47', '0000-00-00 00:00:00'),
(11, 'Admin', 'admin@gmail.com', '18a39a80772f937523e29ba93e0d3ce2', '09257031942', 'Myanmar', 'photo_2022-08-24_21-15-08.jpg', 3, 0, '2022-08-31 10:20:29', '0000-00-00 00:00:00'),
(12, 'New User', 'newuser@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', '108169343_728177877997409_5997762319807010534_n.jpg', 1, 0, '2022-10-21 10:10:02', '0000-00-00 00:00:00'),
(13, 'TestRoleChange', 'testrolechange@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', '', 1, 0, '2022-08-24 09:52:44', '0000-00-00 00:00:00'),
(14, 'New Teacher ', 'tr@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', 'images_2.jpg', 4, 0, '2022-09-01 09:59:06', '0000-00-00 00:00:00'),
(16, 'Teacher 2', 'tr_2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', 'mm.jpg', 4, 0, '2022-09-09 02:29:42', '0000-00-00 00:00:00'),
(17, 'Teacher 3', 'tr_3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', 'photo_2022-08-22_14-04-49 (2).jpg', 4, 0, '2022-09-13 09:53:15', '0000-00-00 00:00:00'),
(18, 'Teacher 4', 'tr_4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', '', 4, 0, '2022-09-10 04:13:16', '0000-00-00 00:00:00'),
(19, 'KG Teacher_1', 'kg_1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', 'photo_2022-08-26_20-53-19.jpg', 4, 0, '2022-09-13 10:47:23', '0000-00-00 00:00:00'),
(20, 'First Student', 'st_1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', '', 5, 0, '2022-09-13 14:02:25', '0000-00-00 00:00:00'),
(21, 'Second Student', 'st_2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', '', 5, 0, '2022-09-13 14:16:53', '0000-00-00 00:00:00'),
(22, 'New Second Student', 'st_3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', '', 5, 0, '2022-09-13 14:31:58', '0000-00-00 00:00:00'),
(23, 'Test Student', 'st_4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', 'photo_2022-09-03_23-07-53 (4).jpg', 10, 0, '2022-09-13 14:35:22', '0000-00-00 00:00:00'),
(24, 'New First Student', 'st_5@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09257031942', 'Myanmar', '305817995_5474080389341126_9010978213990218846_n.jpg', 10, 0, '2022-09-20 08:19:31', '0000-00-00 00:00:00'),
(25, 'Bo Aufderhar DDS', 'Kaitlyn.Yost@Dach.org', '7sS#zq^V#t1D6`E;DO40', '656-541-9245', '12939 Jazmyne Isle\nEast Alexanne, AL 94669-8343', 'http://lorempixel.com/640/480/?17003', 6, 0, '1976-11-02 20:33:35', '0000-00-00 00:00:00'),
(26, 'Ms. Amaya Hoeger Sr.', 'Blake10@Corkery.com', '%MsS)ZI$*', '(673)278-2446', '2676 Kaycee Row Apt. 374\nLake Antonetteville, MO 23830-7642', 'http://lorempixel.com/640/480/?34293', 4, 0, '2009-11-28 20:50:52', '0000-00-00 00:00:00'),
(27, 'Webster Feil', 'Goldner.Ward@White.com', '`*.lESV6SZje', '457-572-4695', '877 Schoen Highway Suite 086\nAnnabellefurt, NC 26062', 'http://lorempixel.com/640/480/?38553', 9, 0, '2015-06-30 19:50:26', '0000-00-00 00:00:00'),
(28, 'Davion Ernser V', 'Betty85@hotmail.com', '>[<YnxMcRFpTB:;Y', '(587)487-1998x275', '23864 Conn Locks\nKulasburgh, NJ 50608-6079', 'http://lorempixel.com/640/480/?33932', 8, 0, '2014-08-01 18:37:19', '0000-00-00 00:00:00'),
(29, 'Wilson Rowe', 'Willms.Amira@Franecki.biz', '@|x-d?/&)jPj:omf;X.]', '903-552-5474x1979', '86863 Olaf Bypass\nClotildeshire, DC 96330-9793', 'http://lorempixel.com/640/480/?27128', 8, 0, '2012-02-01 15:48:39', '0000-00-00 00:00:00'),
(30, 'Vern Turner', 'Mayra.Balistreri@yahoo.com', 'o-D({}:hLuvAQ,\"bWa0M', '1-400-239-3156x9661', '27980 Stark Lake Suite 870\nLarissamouth, TX 76723-1477', 'http://lorempixel.com/640/480/?96059', 6, 0, '1986-02-07 05:09:52', '0000-00-00 00:00:00'),
(31, 'Roxane Hammes', 'Branson.Kozey@hotmail.com', '8[82@2H;?*Xg,bIdbqPZ', '(243)040-8546', '1376 Juana Lane\nWest Bailee, NH 23280-8657', 'http://lorempixel.com/640/480/?79343', 4, 0, '1976-08-27 15:18:11', '0000-00-00 00:00:00'),
(32, 'Gwen Labadie', 'Joe.McKenzie@Goldner.net', 'E<jK_<Q7;\"uj', '893.095.1736x19037', '974 Dulce Spur Suite 922\nLake Henri, AL 43526', 'http://lorempixel.com/640/480/?31585', 4, 0, '2010-09-09 18:29:39', '0000-00-00 00:00:00'),
(33, 'Mafalda Simonis', 'Travis82@hotmail.com', '[nMQuTsc0\\[', '130.766.4778x445', '171 Runolfsson Way\nCharleneside, SD 07748-3649', 'http://lorempixel.com/640/480/?66001', 7, 0, '2000-10-02 02:47:11', '0000-00-00 00:00:00'),
(34, 'Betsy Kautzer', 'bMills@hotmail.com', 'V?v`@Oyrp', '1-183-425-6717', '073 Leannon Mount Apt. 853\nNorth Marcland, FL 36982', 'http://lorempixel.com/640/480/?20339', 8, 0, '1970-08-06 01:28:49', '0000-00-00 00:00:00'),
(35, 'Ryder Schaden', 'Creola.Haley@Kub.info', 'A5ex(eJJN8V]#f', '539-769-4707x03525', '310 Neha Hill Suite 961\nGussiefort, NM 00276', 'http://lorempixel.com/640/480/?24408', 10, 0, '1989-03-06 01:32:58', '0000-00-00 00:00:00'),
(36, 'Dr. Emanuel Denesik', 'Rosie.Zulauf@Wolff.com', '3(!e>\'t~h7r', '+17(8)7586028265', '48149 Schultz Summit\nWest Bellamouth, LA 86410', 'http://lorempixel.com/640/480/?26342', 3, 0, '1986-04-14 18:25:46', '0000-00-00 00:00:00'),
(37, 'Elise Stehr', 'Raymundo.Mueller@Sawayn.com', 'MUVj1PevrRzaKqG#', '04595110536', '619 Christine Brook\nDuBuquemouth, NC 88627-1644', 'http://lorempixel.com/640/480/?78034', 4, 0, '2006-11-10 15:37:54', '0000-00-00 00:00:00'),
(38, 'Prof. Conrad Wunsch', 'Denesik.Delpha@Bogan.com', ')yZ4PH{}O5xxg(.^{t}', '1-746-675-4133x74560', '943 Kilback Shores\nHarberchester, KS 18240-0439', 'http://lorempixel.com/640/480/?15062', 9, 0, '1986-03-21 03:58:54', '0000-00-00 00:00:00'),
(39, 'Mrs. Hailee Daniel PhD', 'German.Lesch@hotmail.com', 'AS}gcPy\'GqnM', '+22(2)8930343836', '6348 Neal Meadow\nPort Jody, ND 70379-1010', 'http://lorempixel.com/640/480/?97951', 4, 0, '1994-05-25 00:53:33', '0000-00-00 00:00:00'),
(40, 'Ms. Eden O\'Kon DDS', 'Margie84@gmail.com', '(S~R<uaQ-~', '1-319-185-1266', '343 Kieran Turnpike Suite 749\nLake Desmondtown, AL 77188', 'http://lorempixel.com/640/480/?70478', 3, 0, '1975-04-26 11:18:15', '0000-00-00 00:00:00'),
(41, 'Santina Flatley', 'hRatke@Cruickshank.com', 'YY-|D<\'eF', '272.127.6993x973', '673 Boyle Orchard\nWest Erin, WV 44876-1471', 'http://lorempixel.com/640/480/?74342', 6, 0, '1983-03-14 22:41:30', '0000-00-00 00:00:00'),
(42, 'Jacquelyn Dooley DDS', 'Noemie66@DAmore.biz', '#7qj--E$DOf36\\W', '1-865-521-8098x60792', '50361 Kshlerin Loaf\nLake Julie, MI 12914', 'http://lorempixel.com/640/480/?68369', 10, 0, '1995-11-17 09:31:07', '0000-00-00 00:00:00'),
(43, 'Melany Barton III', 'Elwin.Glover@White.com', 's>|>L>CEG4&LCUD`&_hs', '865-701-7612', '220 Ian Club Suite 408\nHirthebury, KS 79264-5219', 'http://lorempixel.com/640/480/?28858', 7, 0, '1992-10-28 07:38:54', '0000-00-00 00:00:00'),
(44, 'Duane Gerlach DDS', 'fMuller@Fritsch.com', 'GYa8++^\\<<VMY', '1-299-962-6717x7621', '37587 Jovani Pass\nMyrltown, GA 53368', 'http://lorempixel.com/640/480/?15745', 5, 0, '2004-11-14 01:23:37', '0000-00-00 00:00:00'),
(45, 'Shawna Schmeler', 'Marta79@gmail.com', 'lN8~mnt]r', '(980)090-2579x7554', '0618 Green Estate\nMertzfurt, IL 54226', 'http://lorempixel.com/640/480/?75508', 10, 0, '1990-09-29 14:42:31', '0000-00-00 00:00:00'),
(46, 'Lazaro Kozey Jr.', 'Malvina.Stokes@yahoo.com', '(oMQ@&4}', '920.513.1530x877', '4360 Callie Haven\nWest William, ID 72803', 'http://lorempixel.com/640/480/?40365', 6, 0, '2012-06-08 21:55:23', '0000-00-00 00:00:00'),
(47, 'Prof. Irma Hilpert', 'Lyric90@hotmail.com', 'J~/S`,}Tk$Mp;s$p`F', '+04(9)9125890204', '0588 Turcotte Lodge Suite 329\nJohannaville, AK 74125', 'http://lorempixel.com/640/480/?72713', 5, 0, '1991-02-28 23:14:10', '0000-00-00 00:00:00'),
(48, 'Ms. Kailee Johnston', 'William.Will@Bayer.biz', '*ClS^-&PDyA:oT', '678-783-1396', '639 Fritsch Ways Apt. 912\nKendrickmouth, SD 02217-7876', 'http://lorempixel.com/640/480/?63502', 3, 0, '1984-03-19 03:00:33', '0000-00-00 00:00:00'),
(49, 'Ms. Constance Maggio PhD', 'Moen.Jasmin@gmail.com', '+v?M3q{6yps>o%Y#', '(036)791-3718', '493 Schimmel Fords Suite 014\nSouth Ociestad, NE 74086', 'http://lorempixel.com/640/480/?32245', 6, 0, '2004-05-17 20:58:01', '0000-00-00 00:00:00'),
(50, 'Jason Daugherty', 'Pearlie47@Waelchi.info', 'W$2b&C9]y', '1-299-812-2771x769', '632 Berneice Parks Apt. 798\nSkyeville, AL 78881-6345', 'http://lorempixel.com/640/480/?20177', 7, 0, '1980-09-17 10:53:15', '0000-00-00 00:00:00'),
(51, 'Jeremie Bauch', 'Breanne11@hotmail.com', '8dY\",}<.B7@|', '1-664-188-1178x416', '4017 Spinka Mountains\nPort Ansel, RI 96671', 'http://lorempixel.com/640/480/?84942', 8, 0, '1997-05-31 23:53:44', '0000-00-00 00:00:00'),
(52, 'Dr. Selmer Anderson', 'Rosario.OKon@Thompson.com', 'OFJwsSP-`m\\VA4Wju', '655-511-4829', '0303 Nicholaus Path\nChristinastad, CO 45420-1187', 'http://lorempixel.com/640/480/?44330', 4, 0, '2009-12-07 11:16:30', '0000-00-00 00:00:00'),
(53, 'Regan Terry', 'Velma06@yahoo.com', '`Es$Pr:_Nj210bF?y', '152-571-7972x0753', '277 Marques Prairie Suite 630\nChristiansenbury, WY 74481-2385', 'http://lorempixel.com/640/480/?85854', 5, 0, '2014-10-02 03:59:30', '0000-00-00 00:00:00'),
(54, 'Sally Zemlak', 'Cordie91@Heidenreich.com', 'BH%_8?>#S', '09035032899', '23377 Rowe Vista Suite 936\nNicolasmouth, OR 57526', 'http://lorempixel.com/640/480/?95949', 2, 0, '1997-02-26 13:31:17', '0000-00-00 00:00:00'),
(55, 'Meda Kreiger', 'Leta.Kessler@Carroll.net', 'ld;mgt{C&1', '+43(2)7330924168', '5793 Cronin Trace Apt. 408\nPort Madalyn, CT 47546', 'http://lorempixel.com/640/480/?48461', 7, 0, '2010-12-05 17:07:40', '0000-00-00 00:00:00'),
(56, 'Juwan Monahan', 'kBlick@Crona.info', 'Z`=?Z+A+P.jK\\%YO_CHT', '+03(3)8146664536', '79971 Dare Extensions Suite 508\nWest Mohamed, RI 18592-2766', 'http://lorempixel.com/640/480/?51573', 5, 0, '1984-05-24 05:25:51', '0000-00-00 00:00:00'),
(57, 'Mac Stokes DDS', 'Ryder.Welch@gmail.com', '(c@k:0jN', '177.889.5264', '694 Ozella Stream\nEast Chelseastad, ND 55924', 'http://lorempixel.com/640/480/?46215', 7, 0, '2012-06-28 00:21:18', '0000-00-00 00:00:00'),
(58, 'Meghan Schneider III', 'Brad.Yost@yahoo.com', 'qr]DA\"$Tc\\F:>', '767.737.2224', '80205 Turner Prairie\nLake Harryport, MD 19839', 'http://lorempixel.com/640/480/?93203', 7, 0, '1992-07-05 00:42:12', '0000-00-00 00:00:00'),
(59, 'Mrs. Ashly Kertzmann MD', 'Buster48@yahoo.com', 'J}T^`D4Ls2,dLsbW', '000.567.5054x6238', '854 Nickolas Squares Suite 456\nJaskolskishire, DE 90893', 'http://lorempixel.com/640/480/?81692', 9, 0, '1985-10-27 17:59:03', '0000-00-00 00:00:00'),
(60, 'Reagan Daniel', 'xSenger@hotmail.com', '[KZlBlmfOm,\"', '(265)898-6934x28932', '1155 Breanne Fords\nLake Fritzfort, SD 36138', 'http://lorempixel.com/640/480/?49615', 4, 0, '1979-07-17 16:08:02', '0000-00-00 00:00:00'),
(61, 'Mrs. Michelle Heidenreich MD', 'Quinn39@hotmail.com', 'Pu6;z;o4L7o#mhf*7', '1-742-883-0906x71174', '1648 Tess Meadow Suite 101\nNorth Garfield, NM 20964', 'http://lorempixel.com/640/480/?41020', 1, 0, '2004-06-16 16:03:38', '0000-00-00 00:00:00'),
(62, 'Justyn Veum', 'Rickie40@Wiza.com', '%tQxm8iKE1G(', '1-480-638-1785x45175', '92297 Olen Turnpike Suite 840\nDamionhaven, MD 42592-7530', 'http://lorempixel.com/640/480/?44478', 9, 0, '2003-04-15 18:47:25', '0000-00-00 00:00:00'),
(63, 'Ms. Peggie Bogan', 'Leone53@Goodwin.com', 'u1BiizLN', '482.644.6140', '544 Sanford Village\nChamplinmouth, AK 20340', 'http://lorempixel.com/640/480/?54889', 10, 0, '1986-06-18 09:57:26', '0000-00-00 00:00:00'),
(64, 'Era McClure', 'kBrakus@Metz.com', 'LP`T#&@y%lN', '1-039-187-0230x225', '3381 Crist Valleys\nMayerttown, IN 40440-2924', 'http://lorempixel.com/640/480/?12019', 9, 0, '1970-09-15 13:01:41', '0000-00-00 00:00:00'),
(65, 'Miss Estrella Pagac', 'Mann.Pedro@Parker.com', 'ZVdMW>3\"=:#hfKO06', '994-934-7722x946', '27846 Breanne Squares Apt. 758\nNew Camronmouth, OH 63231-3460', 'http://lorempixel.com/640/480/?89043', 5, 0, '1980-08-05 19:36:11', '0000-00-00 00:00:00'),
(66, 'Dexter Gottlieb', 'gBlanda@yahoo.com', '?*!}917l~@', '460.889.9261', '2247 Kutch Passage Suite 814\nDemarcushaven, ME 25282', 'http://lorempixel.com/640/480/?32739', 2, 0, '1996-03-20 01:51:14', '0000-00-00 00:00:00'),
(67, 'Ally Corwin Sr.', 'Prosacco.Brain@yahoo.com', '4gU;+u`HW,SDe', '614-149-9141x81042', '5402 Drake Mews Apt. 078\nSchusterville, OK 05358', 'http://lorempixel.com/640/480/?90577', 3, 0, '2016-08-04 17:50:58', '0000-00-00 00:00:00'),
(68, 'Freida Klein', 'Monroe93@yahoo.com', '{r`[XEJu\'gf', '09704904354', '661 Greenfelder Extension Apt. 149\nNorth Carrieview, NM 78045', 'http://lorempixel.com/640/480/?89853', 1, 0, '1977-04-02 14:22:34', '0000-00-00 00:00:00'),
(69, 'Marley Kunze', 'yWolf@hotmail.com', '!jao9=eLhFEr{(Vm', '1-723-011-6422x2598', '35365 Jackie Pines Suite 680\nWest Coleborough, SC 98019-3857', 'http://lorempixel.com/640/480/?29875', 6, 0, '2013-08-25 10:35:36', '0000-00-00 00:00:00'),
(70, 'Connor Murazik IV', 'Darwin.McKenzie@Gibson.com', 'jOZ.?d]3xh^V?7p', '(558)072-7057x7764', '2291 Gutmann Pines Apt. 966\nLake Lavinaport, HI 94724', 'http://lorempixel.com/640/480/?68250', 3, 0, '1986-09-24 15:18:22', '0000-00-00 00:00:00'),
(71, 'Guido Bosco', 'Lawson.Nader@Koss.com', 'Wnj%r?susohzeJ+r#By\\', '+73(0)6361346479', '79124 Auer Mountains Suite 170\nJonesmouth, MO 40166-6157', 'http://lorempixel.com/640/480/?83990', 7, 0, '2000-11-19 17:50:32', '0000-00-00 00:00:00'),
(72, 'Adela Schiller', 'Felipe09@Huels.com', 'jrO[rc^k*F/W', '1-322-916-6580x834', '609 Doyle Brooks\nWest Ameliastad, RI 31585-9305', 'http://lorempixel.com/640/480/?81636', 9, 0, '1977-10-30 02:00:15', '0000-00-00 00:00:00'),
(73, 'Mr. Brice Heller', 'zLebsack@gmail.com', 'RUkfoVI`]g', '(623)233-5061x18150', '20539 Therese Point\nEast Gaetano, MO 23533', 'http://lorempixel.com/640/480/?44897', 2, 0, '2014-03-12 14:48:48', '0000-00-00 00:00:00'),
(74, 'Jack Johns', 'Fahey.Garrett@Smith.com', 'N}T(pG=G+8$2', '578-557-8113x519', '3025 Molly Rapids\nBergnaumtown, DC 48643', 'http://lorempixel.com/640/480/?39560', 8, 0, '2019-12-04 22:37:39', '0000-00-00 00:00:00'),
(75, 'Tristin VonRueden', 'Prince.Ritchie@gmail.com', 'DoV*pcO._;=', '(323)111-2374x769', '2899 Sydni Drive\nNew Bradenburgh, MA 55644-0233', 'http://lorempixel.com/640/480/?55359', 7, 0, '1983-08-19 17:34:10', '0000-00-00 00:00:00'),
(76, 'Mr. Toni Waters', 'Jennings.Bosco@Romaguera.net', '3IE\\F5/&{u[%&Jrj(p;', '105-206-0973x10942', '7137 Green Unions\nFlomouth, KY 64320-4389', 'http://lorempixel.com/640/480/?86363', 5, 0, '2020-10-25 23:48:09', '0000-00-00 00:00:00'),
(77, 'Richie Powlowski', 'Gottlieb.Emery@Schultz.info', 'v7Eh8W7tMy', '01489319602', '239 Hartmann Mission Suite 464\nDemariotown, DE 18592', 'http://lorempixel.com/640/480/?38504', 10, 0, '2002-10-22 04:23:39', '0000-00-00 00:00:00'),
(78, 'Kaylin Cassin', 'Hudson98@Gottlieb.com', '(<O\'\\StP$#4(]Ie|', '1-581-299-4720x1697', '50312 Ervin Island Suite 130\nLemketown, IL 37087-7002', 'http://lorempixel.com/640/480/?32795', 2, 0, '2007-12-16 13:18:54', '0000-00-00 00:00:00'),
(79, 'Gianni O\'Keefe I', 'Viva40@hotmail.com', 'I>E~HJ\'|j`D\\qK4=', '473-999-6145x617', '8830 Bobbie Walks Suite 840\nNew Cloyd, NH 10750', 'http://lorempixel.com/640/480/?83032', 8, 0, '1979-02-04 18:45:44', '0000-00-00 00:00:00'),
(80, 'Makenna Johns V', 'Alek.Kirlin@gmail.com', 'CbE<rZA}D>^M:%SX6', '(785)054-0071x76323', '5894 Dante Island\nNorth Antonette, KY 24541-6731', 'http://lorempixel.com/640/480/?33473', 2, 0, '2010-04-11 07:52:26', '0000-00-00 00:00:00'),
(81, 'Percy Haag II', 'Dasia.Durgan@gmail.com', 'j\"{6EbOh}Mk_\'q[*A`$k', '601-610-0661x514', '324 Rollin Loaf Apt. 772\nGottliebburgh, KS 85545-0782', 'http://lorempixel.com/640/480/?70006', 8, 0, '2004-11-22 09:52:05', '0000-00-00 00:00:00'),
(82, 'Luther Miller', 'Walton55@hotmail.com', 'D9|BZvvY[!Gtk`J', '1-061-075-7937x46810', '0225 King Drive Apt. 991\nSouth Kurtis, FL 33544-1814', 'http://lorempixel.com/640/480/?46082', 5, 0, '1992-07-07 11:55:52', '0000-00-00 00:00:00'),
(83, 'Verner Lueilwitz', 'Bode.Dimitri@Raynor.com', '.F8;dm4a#', '428.106.6009', '798 Cartwright Forges\nLake Chaz, OK 14569-1304', 'http://lorempixel.com/640/480/?88335', 1, 0, '2008-08-08 19:07:44', '0000-00-00 00:00:00'),
(84, 'Sylvia Veum', 'Durward.Wolff@Ruecker.com', 'seg<*=9M\"1Bp6p3|', '+99(3)6235666016', '8050 Harris Valley Apt. 178\nRoslynville, MA 03764', 'http://lorempixel.com/640/480/?33769', 8, 0, '1981-06-15 09:34:01', '0000-00-00 00:00:00'),
(85, 'Hardy Dooley', 'Ilene38@Kemmer.biz', '58uYfEPCWr-Z', '(816)603-1276x4048', '11939 VonRueden Row\nNorth Alexandre, OK 72679-8755', 'http://lorempixel.com/640/480/?74911', 4, 0, '2011-11-22 10:28:27', '0000-00-00 00:00:00'),
(86, 'Doyle Marquardt', 'Macey.Koch@Spencer.com', 'gI\'\'dm8p^gkkHh{=Pyv', '616.950.7583x36932', '9117 Tyshawn Gardens\nNorth Birdiefort, NJ 12602-2454', 'http://lorempixel.com/640/480/?96018', 10, 0, '1989-01-27 21:52:59', '0000-00-00 00:00:00'),
(87, 'Mrs. Eugenia O\'Reilly I', 'aPredovic@yahoo.com', '<FPptK_Qzk20j', '1-717-480-4929', '9176 Joe Spur Apt. 726\nDarrellfort, KS 41873', 'http://lorempixel.com/640/480/?59648', 8, 0, '1982-08-23 00:25:06', '0000-00-00 00:00:00'),
(88, 'Rebeka Mohr', 'bAbernathy@Runolfsdottir.com', '?kw9w*^V|GLk)', '1-651-954-4653x82674', '131 Abelardo Trail Apt. 578\nPort Mittie, MI 41045', 'http://lorempixel.com/640/480/?39710', 1, 0, '2006-09-26 00:29:05', '0000-00-00 00:00:00'),
(89, 'Paolo Kerluke', 'iWiegand@Ankunding.com', 'J46vI\"A2o%', '526.812.0280x01596', '6882 Hauck Keys\nNorth Helena, LA 18454-2009', 'http://lorempixel.com/640/480/?14672', 6, 0, '1990-05-14 15:38:26', '0000-00-00 00:00:00'),
(90, 'Ivy Roob', 'Ortiz.Betty@Kertzmann.com', 'KPDmKQPMcUw$', '780.906.6067x19004', '7564 Jacobs Mountains Suite 181\nCartwrightside, VA 64226', 'http://lorempixel.com/640/480/?30767', 3, 0, '1972-12-24 09:38:11', '0000-00-00 00:00:00'),
(91, 'Ms. Estefania Wehner', 'Elfrieda61@Bauch.info', 'J)D#ihA.S8jtYo~', '1-289-933-3319x92040', '49622 Prudence Road Apt. 415\nHarveytown, NH 09663-2504', 'http://lorempixel.com/640/480/?25178', 1, 0, '2021-11-30 21:52:52', '0000-00-00 00:00:00'),
(92, 'Mr. Muhammad Brekke', 'Gleason.Keeley@gmail.com', 'l\'jHx)0~dRWu;V', '848-246-4546', '4915 Fadel Ways Suite 682\nOndrickamouth, MI 52686-2882', 'http://lorempixel.com/640/480/?50977', 9, 0, '1971-01-07 18:07:53', '0000-00-00 00:00:00'),
(93, 'Jess Ankunding', 'tBechtelar@hotmail.com', '#sjM[\\Y3jqz', '672.027.8691x7227', '4515 Jones Plaza Apt. 244\nWest Heath, MO 33501-3891', 'http://lorempixel.com/640/480/?63424', 5, 0, '1992-04-16 21:56:14', '0000-00-00 00:00:00'),
(94, 'Humberto DuBuque Jr.', 'Cathryn.Waelchi@Mohr.biz', '1@tAol!GW5/h9=|', '01427433332', '04386 Julius Run Apt. 072\nKeeganmouth, NM 02110-0717', 'http://lorempixel.com/640/480/?89882', 6, 0, '1987-07-22 13:26:20', '0000-00-00 00:00:00'),
(95, 'Efren Grimes', 'Mayert.Emmanuel@Block.com', '\'n3>.%Da(b{', '1-564-543-1605x548', '069 Beer Divide Apt. 364\nEast Amber, AK 37545-1529', 'http://lorempixel.com/640/480/?74314', 6, 0, '2013-08-19 05:19:32', '0000-00-00 00:00:00'),
(96, 'Akeem Fahey', 'Derrick.Ziemann@yahoo.com', 'C7q-X-JHH0TTr', '+59(4)9840634575', '348 Grady Heights Suite 264\nRoobberg, NV 98669-4592', 'http://lorempixel.com/640/480/?80333', 5, 0, '1990-12-14 08:29:13', '0000-00-00 00:00:00'),
(97, 'Filiberto Emard II', 'eKeeling@Schumm.com', 'b4E~&IM=', '(941)244-2223x07797', '1414 Ansel Stravenue Suite 602\nLubowitzbury, DE 21724-8736', 'http://lorempixel.com/640/480/?14616', 5, 0, '1983-11-05 01:36:02', '0000-00-00 00:00:00'),
(98, 'Leonora Wisozk', 'Eino.Oberbrunner@Bailey.net', '|V2(\"JThu#^.2ym(G\"', '686-038-3810x95581', '2713 Veum Rapid Apt. 941\nPort Tressabury, KY 33393', 'http://lorempixel.com/640/480/?69170', 10, 0, '1990-02-18 06:21:58', '0000-00-00 00:00:00'),
(99, 'Immanuel Jacobson', 'sJerde@gmail.com', 'Mzf17zg;', '451.250.3488x5299', '7679 Brekke Mount\nCorwinborough, MN 46135', 'http://lorempixel.com/640/480/?98475', 2, 0, '1986-04-25 14:33:03', '0000-00-00 00:00:00'),
(100, 'Clotilde Ernser', 'Elbert27@yahoo.com', 'e6;,{F*u\\(;ZntA', '(636)469-9194', '0178 Austen Park Apt. 431\nAufderharfurt, CT 61432-7608', 'http://lorempixel.com/640/480/?48337', 5, 0, '1971-12-26 20:31:58', '0000-00-00 00:00:00'),
(101, 'Prof. Crawford Luettgen III', 'yCorkery@Leannon.net', '>]b.t(Z0CPP^w9?XKvaW', '04068666957', '4641 Cordia Inlet Suite 513\nTylerton, CA 30768', 'http://lorempixel.com/640/480/?20435', 5, 0, '1979-05-03 21:53:07', '0000-00-00 00:00:00'),
(102, 'Frank Kulas', 'Charlene75@Barton.com', 'j(wH\">!/RpQW7', '1-883-263-9717', '15580 Sabina Avenue\nAdeleburgh, HI 65006-8900', 'http://lorempixel.com/640/480/?67977', 10, 0, '1971-09-27 13:05:19', '0000-00-00 00:00:00'),
(103, 'Dr. Jerel Zemlak PhD', 'Bell.Wilderman@yahoo.com', 'sNBb`*,l', '471-069-5701x21255', '69686 Glover Run Suite 282\nAbeshire, AL 56023-3118', 'http://lorempixel.com/640/480/?45932', 10, 0, '2016-04-20 00:13:15', '0000-00-00 00:00:00'),
(104, 'Myrtice Hessel', 'Dariana80@yahoo.com', 'l.0o5\\xpYbb\\|g', '(466)284-3871x40941', '132 Mike Fork\nPort Carlotta, AK 34935', 'http://lorempixel.com/640/480/?71588', 7, 0, '1973-04-23 19:29:40', '0000-00-00 00:00:00'),
(105, 'Reba Kuhlman', 'Jaren.Koss@gmail.com', 'tL4<ZWl@U&s`ZRomc0~[', '(534)233-6922', '084 Roberts Junctions\nWest Keely, IA 30239', 'http://lorempixel.com/640/480/?57029', 8, 0, '2014-09-09 20:31:11', '0000-00-00 00:00:00'),
(106, 'Linnie Gleason MD', 'Cummings.Joey@yahoo.com', '@!*U~(q^s(S|q<\\BEUm', '(070)059-5405x483', '169 Weber Mill Apt. 698\nPort Joanne, VA 12035-3854', 'http://lorempixel.com/640/480/?24029', 2, 0, '2009-03-10 07:03:23', '0000-00-00 00:00:00'),
(107, 'Jada Lubowitz', 'Stroman.Neva@Morar.biz', '3\'7^0(3K$MSY`U', '610.368.3680x3404', '672 Will Turnpike Suite 405\nEast Cristian, AK 63463-1325', 'http://lorempixel.com/640/480/?24680', 8, 0, '1984-10-10 06:19:32', '0000-00-00 00:00:00'),
(108, 'Chloe Kassulke', 'Virginia.Bradtke@Wisoky.com', 'hJU5#8Ggh96IP', '1-784-835-3364', '075 Jaylin Mountain\nNew Emelieberg, MA 67322', 'http://lorempixel.com/640/480/?64918', 10, 0, '2007-08-01 14:33:44', '0000-00-00 00:00:00'),
(109, 'Audreanne Hickle', 'Raven36@hotmail.com', ',o<f0Fg6iY.Y\"uou}T', '097-058-3191x44934', '65901 Dicki Park\nJoesphfurt, ID 95130-3543', 'http://lorempixel.com/640/480/?92322', 7, 0, '1985-11-12 20:26:37', '0000-00-00 00:00:00'),
(110, 'Barbara Will', 'dRuecker@yahoo.com', '%og}I^*t', '793.429.3685', '6371 Lavada Views\nCarmeloside, MD 42659', 'http://lorempixel.com/640/480/?79933', 3, 0, '1994-02-18 21:24:48', '0000-00-00 00:00:00'),
(111, 'Selmer Maggio DVM', 'Alena11@Walker.info', 'Q(J,0`^FA;7t3', '172-835-2757', '7840 Labadie Fords Apt. 839\nEast Keyshawn, VT 13303-8068', 'http://lorempixel.com/640/480/?61274', 7, 0, '2016-04-28 23:11:37', '0000-00-00 00:00:00'),
(112, 'Prof. Dangelo McGlynn III', 'eHaag@Abernathy.info', 'lIc5-JbTsE-.Wz{|KFZ\'', '+47(2)2335263021', '065 Franecki Locks Apt. 385\nGeorgeshire, MN 85619', 'http://lorempixel.com/640/480/?81797', 1, 0, '1977-02-17 00:14:15', '0000-00-00 00:00:00'),
(113, 'Thomas Little', 'Zemlak.Xavier@Little.biz', 'M\\3Oxx{\"2', '06505377092', '16464 Benton Plains Apt. 321\nMadgetown, NV 65655', 'http://lorempixel.com/640/480/?90823', 4, 0, '2010-06-14 10:42:12', '0000-00-00 00:00:00'),
(114, 'Laisha Beer', 'Andrew29@yahoo.com', '>9`(6?Yz3]Z$C(]Pl)|Y', '04051784065', '579 Raquel Hollow\nWest Jammie, MI 65748-9357', 'http://lorempixel.com/640/480/?74086', 1, 0, '2006-12-25 16:31:51', '0000-00-00 00:00:00'),
(115, 'Miss Talia Kunze V', 'Liza.Kulas@gmail.com', 'SJ;O.M>.QU62L', '236-377-8108x2110', '294 Aurore Forks Suite 053\nSouth Eliane, KS 01086-1176', 'http://lorempixel.com/640/480/?47808', 5, 0, '2018-02-14 22:18:23', '0000-00-00 00:00:00'),
(116, 'Mr. Jamarcus Kovacek', 'Koch.Shakira@OReilly.com', '3sn7k$Nb+Jp', '(594)816-4502', '10273 Kshlerin Cape\nTremblayville, WA 23419', 'http://lorempixel.com/640/480/?39816', 3, 0, '2021-04-13 12:47:15', '0000-00-00 00:00:00'),
(117, 'Dr. Lauretta Langworth', 'Rosendo.Greenfelder@hotmail.com', '-IkadfSZHCzXBGp<nsl', '230.512.8723x323', '56586 Abshire Forge Suite 423\nSunnyfurt, GA 91278-7363', 'http://lorempixel.com/640/480/?60761', 5, 0, '2014-05-31 16:00:30', '0000-00-00 00:00:00'),
(118, 'Sylvia Yost', 'aUllrich@hotmail.com', '$-7G(aPfjl5~8EkCZw', '634.748.8554x44454', '483 Satterfield Coves\nGrayceton, LA 27155-0093', 'http://lorempixel.com/640/480/?30035', 6, 0, '1975-05-04 17:25:16', '0000-00-00 00:00:00'),
(119, 'Aurelie Frami PhD', 'Maegan53@hotmail.com', '&0ozKsJ2j>p~tu1U', '1-131-675-8788x29039', '080 Eichmann Trail Apt. 652\nEast Stellaburgh, GA 46871', 'http://lorempixel.com/640/480/?47534', 9, 0, '2004-02-02 02:58:27', '0000-00-00 00:00:00'),
(120, 'Lincoln Harris Jr.', 'Stehr.Korey@gmail.com', '\"xG}|*9.', '+09(7)5456838956', '921 Little Hollow Suite 570\nMcLaughlinborough, MA 63798-0648', 'http://lorempixel.com/640/480/?92481', 3, 0, '1995-05-12 04:01:41', '0000-00-00 00:00:00'),
(121, 'Luciano Aufderhar', 'Dooley.Jarod@Goyette.com', 'W)L^outs/d%H7.G[4=)', '1-686-728-1814', '07333 Pearl Well\nSouth Addieburgh, DC 20439-3809', 'http://lorempixel.com/640/480/?92182', 3, 0, '2022-09-19 10:47:43', '0000-00-00 00:00:00'),
(122, 'Ms. Domenica Beier', 'Dayana72@Larkin.biz', 'AA:~9T@/zC', '1-741-098-0602x7079', '0134 Dare Forks Apt. 600\nCarsonburgh, IN 82669-4609', 'http://lorempixel.com/640/480/?98154', 4, 0, '1989-11-19 02:36:30', '0000-00-00 00:00:00'),
(123, 'Bart Will', 'Montana.McLaughlin@Kutch.com', '|D{PY;};^AbSh?fD', '857.081.8019x446', '78248 Ashly Ramp Apt. 580\nWest Carmen, IN 91963-9475', 'http://lorempixel.com/640/480/?55593', 10, 0, '1983-05-01 16:57:04', '0000-00-00 00:00:00'),
(124, 'Antoinette Trantow', 'cZulauf@yahoo.com', 'RLb\\LJI!nbQzYp', '1-387-367-5518', '023 Stamm Highway Suite 658\nWhitefurt, UT 69633-4686', 'http://lorempixel.com/640/480/?69846', 1, 0, '1983-03-27 16:16:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `video_lesson_comments`
--

CREATE TABLE `video_lesson_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` enum('present','absent','late','half_day') NOT NULL,
  `attendance_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `events` (  
  `id` int(11) NOT NULL,  
  `title` varchar(255) COLLATE utf8_bin NOT NULL,  
  `start` datetime NOT NULL,  
  `end` datetime DEFAULT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;  

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examintions`
--
ALTER TABLE `examintions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_infos`
--
ALTER TABLE `tr_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_upload_lessons`
--
ALTER TABLE `tr_upload_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_lesson_comments`
--
ALTER TABLE `video_lesson_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `examintions`
--
ALTER TABLE `examintions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tr_infos`
--
ALTER TABLE `tr_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tr_upload_lessons`
--
ALTER TABLE `tr_upload_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `video_lesson_comments`
--
ALTER TABLE `video_lesson_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
