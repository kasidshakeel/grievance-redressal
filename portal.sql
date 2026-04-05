-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2026 at 10:28 AM
-- Server version: 8.4.7
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

DROP TABLE IF EXISTS `assigned`;
CREATE TABLE IF NOT EXISTS `assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `complain_id` int NOT NULL,
  `officer_id` int NOT NULL,
  `officer_name` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`id`, `complain_id`, `officer_id`, `officer_name`, `complain_status`) VALUES
(3, 6312, 7356, 'Kasid Shakeel', 3),
(4, 3180, 1993, 'Apoorv Tiwari', 2),
(6, 2574, 7356, 'Kasid Shakeel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int NOT NULL AUTO_INCREMENT,
  `complain_id` int NOT NULL,
  `complain_title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_name` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_phone` int NOT NULL,
  `complain_email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_status` int NOT NULL,
  `complain_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `complain_addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_added_on` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_done_on` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `complain_id`, `complain_title`, `complain_descr`, `complain_name`, `complain_phone`, `complain_email`, `complain_status`, `complain_file`, `complain_addr`, `complain_added_on`, `complain_done_on`) VALUES
(8, 7564, 'Road Issue', 'Many holes are there', 'Talha', 2147483647, 'ks@gmail.com', 0, NULL, 'Kalyanpur, Aadil Nagar', '2026-03-24', NULL),
(6, 6312, 'Health', 'Hospitals nhi shi hai', 'Rabbani', 2147483647, 'rv@gmail.com', 3, 'Right.jpg', 'Sadar, Azamgarh', '2026-03-18', NULL),
(4, 3180, 'Kachda', 'har taraf kachda', 'Zafar', 2147483647, 'mz@gmail.com', 3, 'Sign.jpg', 'Rahmat Nagar, Azamgarh', '2026-03-18', NULL),
(5, 2574, 'Road', 'tuti sadke', 'Akhzar', 2147483647, 'mk@gmail.com', 1, 'Left.jpg', 'Takia, Azamgarh', '2026-03-18', NULL),
(9, 7775, 'Road Issue', 'Many holes are there', 'Kasid', 2147483647, 'ks@gmail.com', 0, NULL, 'Kalyanpur, Aadil Nagar', '2026-03-24', NULL),
(10, 8118, 'Road Issue', 'Many holes are there', 'Apoorv', 2147483647, 'ks@gmail.com', 0, NULL, 'Kalyanpur, Aadil Nagar', '2026-03-24', NULL),
(11, 9962, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(12, 5938, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(13, 7631, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(14, 3599, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(15, 9285, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(16, 6035, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(17, 4637, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(18, 7671, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(19, 9620, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(20, 8631, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(21, 2328, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(22, 7407, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(23, 9777, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(24, 7310, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL),
(25, 1152, 'Road', 'Road issues', 'Kingpin', 2147483647, 'ks@gmail.com', 0, NULL, 'Lucknow', '2026-03-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
CREATE TABLE IF NOT EXISTS `officers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `officer_id` int NOT NULL,
  `officer_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_phone` int NOT NULL,
  `officer_password` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_on` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `officer_id`, `officer_name`, `officer_email`, `officer_phone`, `officer_password`, `added_on`) VALUES
(1, 7356, 'Kasid Shakeel', 'kasid@gmail.com', 1234567890, '12345678', '2026-03-16'),
(2, 5771, 'Admin', 'it@gmail.com', 1234567890, '123456', '2026-03-16'),
(6, 1993, 'Apoorv Tiwari', 'apt@gmail.com', 2147483647, '654321', '2026-03-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
