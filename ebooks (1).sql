-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2019 at 06:15 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.3.1-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addresses`
--

CREATE TABLE `tbl_addresses` (
  `user_id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `house_number` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `barangay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_addresses`
--

INSERT INTO `tbl_addresses` (`user_id`, `country`, `region`, `city`, `house_number`, `street`, `zip`, `created_at`, `updated_at`, `barangay`) VALUES
(1, 'au', 'State of New South Wales', 'Albury Municipality', '1048-E', 'F. Castillo Street', '13123123', '2019-02-11 02:23:21', '2019-02-20 07:56:35', 'Bambang'),
(2, 'ph', 'Bicol', 'Legaspi City', '#34 B', 'Bonifacio Street', '13123123', '2019-02-08 07:45:23', '2019-02-08 09:04:13', 'Sta. ana');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `file`, `title`, `price`, `description`, `category`, `author`, `user_id`, `created_at`, `updated_at`, `cover`, `status`, `deleted_at`) VALUES
(1, NULL, 'Harry Potter', '200', 'Note: The titles of novels in Filipino or Tagalog are not real, specific, or accurate translations! These are only short versions of the original English-language novel.', 'Fiction', 'J.K Rowlings', 3, '2019-03-18 06:23:59', '2019-05-06 17:20:40', 'harry-potter.jpg', 1, NULL),
(2, NULL, 'Thanks to college rivals Jalalon, Scottie, \'Clasico\' turns into real classic', '600', 'JIO Jalalon and Scottie Thompson relived their college rivalry by taking it to the next level on Sunday night in a gripping PBA Philippine Cup game between Barangay Ginebra and Magnolia at the Smart Araneta Coliseum.\r\n\r\nThompson had the last laugh in the face-off as he shook off cramps to steer the Kings to a hard-earned 97-93 overtime win over the Hotshots by scoring a career-high 27 points, grabbing 11 rebounds, and dishing off five assists.\r\n\r\nJalalon didn’t do bad either as he exploded for 22 second-half points including two booming triples in the waning seconds of regulation that set the stage for extra time.\r\n\r\nThe Magnolia guard added six rebounds and two assists in a losing cause for the Hotshots.\r\n\r\nBut Jalalon was quick to play down the personal competition, stressing it was really more of a battle between two teams badly wanting to win.\r\n\r\n“Laro lang din talaga. Pareho lang naman kaming nagtatrabaho lang,” said Jalalon. “Maganda naman yung laban kasi walang gustong matalo.”', 'Sports', 'Gilas', 3, '2019-03-18 06:26:36', '2019-05-06 17:20:34', 'thanks-to-college-rivals-jalalon-scottie-clasico-turns-into-real-classic.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_carts`
--

INSERT INTO `tbl_carts` (`id`, `item_id`, `customer_id`, `created_at`, `updated_at`, `quantity`) VALUES
(1, 2, NULL, '2019-04-10 09:52:32', '2019-04-10 09:52:32', 2),
(2, 2, NULL, '2019-04-11 06:55:50', '2019-04-11 06:55:50', 5),
(3, 1, NULL, '2019-04-29 03:11:30', '2019-04-29 03:11:30', 3),
(4, 1, NULL, '2019-04-29 03:11:36', '2019-04-29 03:11:36', 7),
(5, 2, NULL, '2019-05-06 17:19:26', '2019-05-06 17:19:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_favorites`
--

CREATE TABLE `tbl_item_favorites` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item_favorites`
--

INSERT INTO `tbl_item_favorites` (`id`, `item_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 18, 1, '2019-03-11 07:21:04', '2019-03-11 07:21:04'),
(2, 19, 1, '2019-03-14 02:13:11', '2019-03-14 02:13:11'),
(3, 13, 1, '2019-03-14 02:13:32', '2019-03-14 02:13:32'),
(4, 22, 1, '2019-03-14 02:14:09', '2019-03-14 02:14:09'),
(5, 25, 1, '2019-03-14 02:15:20', '2019-03-14 02:15:20'),
(6, 12, 1, '2019-03-14 02:15:48', '2019-03-14 02:15:48'),
(7, 7, 1, '2019-03-14 03:48:57', '2019-03-14 03:48:57'),
(8, 24, 1, '2019-03-14 03:49:34', '2019-03-14 03:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `verified` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `verified`) VALUES
(1, 'Mark', 'admin@ebooks.com', '$2y$10$CZVH2QCW5lQZng9C.x9bPu56LOFr20nkZwI7DbeVc.u1xoPWM92aK', '2019-01-31 06:07:55', '2019-01-31 06:07:55', 0),
(2, 'Jonathan Doe', 'customer@ebook.com', '$2y$10$F7tbhSy1ChScZhLBq6QpxeMa2RjY5uSfaJjIEZiftbbekpEl07AV2', '2019-02-07 02:23:46', '2019-02-07 02:23:46', 0),
(3, 'Mark', 'mark@test.com', '$2y$10$8ufksN5orjpUTEizRVPgFe6kr6BEu1/Gjs3cLT.zh4COFJ.A8uPjW', '2019-03-18 05:26:50', '2019-03-18 05:26:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verify_users`
--

CREATE TABLE `tbl_verify_users` (
  `user_id` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addresses`
--
ALTER TABLE `tbl_addresses`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item_favorites`
--
ALTER TABLE `tbl_item_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_item_favorites`
--
ALTER TABLE `tbl_item_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
