-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 08:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `meta_field`, `meta_value`) VALUES
(1, 'firstname', 'Mark'),
(1, 'middlename', 'D'),
(1, 'lastname', 'Cooper'),
(1, 'gender', 'Male'),
(1, 'dob', '1997-06-23'),
(1, 'contact', '0912345679'),
(1, 'email', 'mcooper@gmail.com'),
(1, 'address', 'Over There, Down Here Street, There City, Everywhere, 2306'),
(1, 'type', 'Others'),
(1, 'cost', '500'),
(1, 'storing_days', '14'),
(1, 'other_info', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non nibh velit. Nullam in mattis enim. Vestibulum sed iaculis purus, sed ultricies velit. Praesent mattis volutpat tincidunt. Curabitur eget mollis nibh. Sed suscipit nisi justo, vel malesuada ligula lacinia ac. Vivamus tempus quam at augue lacinia rutrum.'),
(1, 'remarks', 'Sed dapibus vestibulum quam, et pretium dui sodales vel. Cras ornare placerat mauris, feugiat blandit lorem elementum at. Fusce consequat, eros a imperdiet accumsan, erat neque laoreet odio, vel bibendum risus elit vel erat.'),
(2, 'firstname', 'Samantha Jane'),
(2, 'middlename', 'C'),
(2, 'lastname', 'Anthony'),
(2, 'gender', 'Female'),
(2, 'dob', '1997-10-14'),
(2, 'contact', '09456987123'),
(2, 'email', 'sja@gmail.com'),
(2, 'address', 'Block 10, Lot 14, Over here Subd., Here City, There Province, 1014'),
(2, 'type', 'Fruits'),
(2, 'cost', '550'),
(2, 'storing_days', '12'),
(2, 'other_info', 'Donec et viverra nisl, vel malesuada lectus. Vestibulum rutrum mauris sed nibh iaculis tempor. Donec auctor elit justo, a porttitor ligula malesuada eget.'),
(2, 'remarks', 'Sample Only');

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` int(30) NOT NULL,
  `book_code` varchar(100) NOT NULL,
  `client_name` text NOT NULL,
  `storage_id` int(30) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `book_code`, `client_name`, `storage_id`, `amount`, `date_from`, `date_to`, `status`, `date_created`, `date_updated`) VALUES
(1, 'GMA-2021120001', 'Cooper, Mark D', 5, 7000, '2021-12-17', '2021-12-31', 1, '2021-12-15 13:59:22', '2021-12-15 14:13:01'),
(2, 'WQO-2021120001', 'Anthony, Samantha Jane C', 6, 6600, '2021-12-20', '2022-01-01', 0, '2021-12-15 14:19:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE `message_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_list`
--

INSERT INTO `message_list` (`id`, `fullname`, `contact`, `email`, `message`, `status`, `date_created`) VALUES
(1, 'John Smith', '09123456789', 'jsmith@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non nibh velit. Nullam in mattis enim. Vestibulum sed iaculis purus, sed ultricies velit. Praesent mattis volutpat tincidunt. Curabitur eget mollis nibh. Sed suscipit nisi justo, vel malesuada ligula lacinia ac. Vivamus tempus quam at augue lacinia rutrum. Donec et viverra nisl, vel malesuada lectus. Vestibulum rutrum mauris sed nibh iaculis tempor. Donec auctor elit justo, a porttitor ligula malesuada eget.', 1, '2021-12-15 14:42:56'),
(2, 'Claire Blake', '097894561423', 'cblake@sample.com', 'Aliquam eget nunc vulputate, condimentum tortor in, posuere ante. Nunc vehicula tempor rhoncus. Duis eu risus quis est hendrerit molestie. Sed lorem ligula, tempor sit amet nisi eget, condimentum feugiat ligula. Aliquam pharetra tincidunt libero. Sed tristique viverra enim, at luctus felis pharetra eget. Cras et semper lorem. Phasellus ultrices, ipsum vitae interdum porttitor, neque nisl bibendum dui, sed fermentum orci dolor eu est. Integer congue arcu a elit tincidunt, at ornare felis fringilla. Sed neque urna, eleifend et pharetra et, mattis non magna. Curabitur finibus commodo enim, ac aliquet justo ultricies vitae.', 1, '2021-12-15 14:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `storage_list`
--

CREATE TABLE `storage_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `cost` float NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `thumbnail_path` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage_list`
--

INSERT INTO `storage_list` (`id`, `name`, `cost`, `description`, `thumbnail_path`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Storage 101', 250, '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non nibh velit. Nullam in mattis enim. Vestibulum sed iaculis purus, sed ultricies velit. Praesent mattis volutpat tincidunt. Curabitur eget mollis nibh. Sed suscipit nisi justo, vel malesuada ligula lacinia ac. Vivamus tempus quam at augue lacinia rutrum. Donec et viverra nisl, vel malesuada lectus. Vestibulum rutrum mauris sed nibh iaculis tempor. Donec auctor elit justo, a porttitor ligula malesuada eget.&lt;/span&gt;', 'uploads/storages/1.png?v=1639535391', 1, '2021-12-15 10:15:47', '2021-12-15 10:48:23'),
(2, 'Storage 102', 350, '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci elit, posuere a turpis sit amet, aliquet varius nulla. Duis vitae massa facilisis enim bibendum congue. Nam non erat eget nibh volutpat efficitur. Donec orci velit, viverra in magna in, egestas luctus dui. Ut ultricies mi vel lobortis vehicula. Etiam luctus sed felis nec ultricies. In quis leo sem. Sed porta nisi erat, sit amet fermentum lorem viverra quis. Vivamus finibus justo a ultricies vehicula. Pellentesque efficitur eget lacus id condimentum. Vestibulum consectetur, nibh et ultricies pretium, leo arcu euismod diam, sed eleifend sem purus non dui. Aenean ac sem tortor. Mauris nec arcu lorem. Cras pulvinar mauris dolor, et tincidunt turpis laoreet vel. Nulla at urna quam.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/storages/2.png?v=1639537498', 1, '2021-12-15 11:04:58', '2021-12-15 11:04:58'),
(3, 'Storage 103', 280, '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Etiam aliquam quam sed venenatis tempor. Cras sed nulla lacus. Donec ac purus dictum, finibus tortor eu, porttitor nunc. Mauris in felis id turpis vehicula porta. Integer auctor ante feugiat, finibus odio sed, molestie metus. Ut consequat metus sit amet scelerisque elementum. Integer congue metus iaculis, gravida orci ut, pretium est. Suspendisse mauris arcu, sollicitudin ac ullamcorper at, consectetur vel tortor. Aenean lacinia nulla augue, ut maximus tortor imperdiet sed. Pellentesque aliquam commodo urna, at maximus metus commodo at. Nulla facilisi. Proin dictum metus sed bibendum volutpat.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/storages/3.png?v=1639537520', 1, '2021-12-15 11:05:20', '2021-12-15 11:05:20'),
(4, 'Storage 104', 450, '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Nunc ultricies maximus tempor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras eget odio non nunc iaculis malesuada. Donec feugiat eros nisl, nec placerat ex accumsan quis. Nam aliquam erat id nisi egestas, vitae dapibus nisi elementum. Ut sagittis dolor velit, vitae finibus purus dapibus convallis. Mauris sit amet mollis tortor. Etiam consectetur vel eros pretium vehicula. Nunc rhoncus in sem et varius. Proin dignissim nibh non lacus volutpat, ut imperdiet nulla aliquam. Nulla at varius leo, eget placerat massa.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/storages/4.png?v=1639537554', 1, '2021-12-15 11:05:54', '2021-12-15 11:05:54'),
(5, 'Storage 105', 500, '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Sed dapibus vestibulum quam, et pretium dui sodales vel. Cras ornare placerat mauris, feugiat blandit lorem elementum at. Fusce consequat, eros a imperdiet accumsan, erat neque laoreet odio, vel bibendum risus elit vel erat. Morbi sed massa vitae est pulvinar vulputate pretium nec tellus. Ut vel dui commodo, rutrum est et, euismod nulla. Donec viverra rutrum tortor mollis sollicitudin. Morbi cursus feugiat ornare. Donec augue felis, rhoncus eget molestie vel, vehicula sed lorem. Aliquam sed velit sit amet orci volutpat rhoncus vel a arcu.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/storages/5.png?v=1639537655', 1, '2021-12-15 11:07:35', '2021-12-15 11:07:35'),
(6, 'Storage 106', 550, '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Maecenas efficitur vel felis vel rutrum. Phasellus sagittis sed eros eget cursus. Duis vitae lectus vitae velit pellentesque viverra ut at purus. Morbi in posuere nibh, quis rhoncus elit. Proin justo nisi, venenatis in erat id, ornare ullamcorper libero. Quisque sed augue ac lectus tempor dictum. Vivamus eu nunc velit. Quisque porttitor purus ultricies lobortis varius. Duis blandit varius ipsum, eu aliquam nibh faucibus nec. Etiam in ipsum egestas, finibus dui eget, commodo ligula.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/storages/6.png?v=1639537682', 1, '2021-12-15 11:08:02', '2021-12-15 11:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'XYZ Cold Storage Management System - PHP'),
(6, 'short_name', 'XYZ CSMS'),
(11, 'logo', 'uploads/logo-1639532633.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1639532633.png'),
(15, 'content', 'Array'),
(16, 'email', 'info@XYZcoldstorage.com'),
(17, 'contact', '09854698789 / 78945632'),
(18, 'from_time', '11:00'),
(19, 'to_time', '21:30'),
(20, 'address', 'XYZ Street, There City, Here, 2306');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1639468007', NULL, 1, 1, '2021-01-20 14:02:37', '2021-12-14 15:47:08'),
(3, 'Claire', NULL, 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', 'uploads/avatar-3.png?v=1639467985', NULL, 2, 1, '2021-12-14 15:46:25', '2021-12-14 15:46:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storage_id` (`storage_id`);

--
-- Indexes for table `message_list`
--
ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_list`
--
ALTER TABLE `storage_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message_list`
--
ALTER TABLE `message_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `storage_list`
--
ALTER TABLE `storage_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD CONSTRAINT `booking_list_ibfk_1` FOREIGN KEY (`storage_id`) REFERENCES `storage_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
