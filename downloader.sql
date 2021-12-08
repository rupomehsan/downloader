-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2021 at 02:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `downloader`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobile_adds`
--

CREATE TABLE `tbl_mobile_adds` (
  `id` int(11) NOT NULL,
  `gg_admob_id` varchar(250) NOT NULL,
  `gg_add_type` varchar(250) NOT NULL,
  `gg_interesticial_admob_id` varchar(250) NOT NULL,
  `gg_interesticial_admob_click` int(11) NOT NULL,
  `gg_native_admob_id` varchar(250) NOT NULL,
  `gg_native_ad_per_video_like` int(11) NOT NULL,
  `gg_native_ad_per_video_series` int(11) NOT NULL,
  `fb_admob_id` varchar(250) NOT NULL,
  `fb_add_type` varchar(250) NOT NULL,
  `fb_interesticial_admob_id` varchar(250) NOT NULL,
  `fb_interesticial_admob_click` int(11) NOT NULL,
  `fb_native_admob_id` varchar(250) NOT NULL,
  `fb_native_ad_per_video_like` int(11) NOT NULL,
  `fb_native_ad_per_video_series` int(11) NOT NULL,
  `cs_banner_image` varchar(250) NOT NULL,
  `cs_add_type` varchar(250) NOT NULL,
  `cs_interesticial_image` varchar(250) NOT NULL,
  `cs_banner_admob_link` varchar(250) NOT NULL,
  `cs_interesticial_ad_link` varchar(250) NOT NULL,
  `cs_native_image` varchar(250) NOT NULL,
  `cs_Interesticial_admob_click` int(11) NOT NULL,
  `cs_native_ad_link` varchar(250) NOT NULL,
  `cs_native_ad_per_video_like` int(11) NOT NULL,
  `cs_native_ad_per_video_series` int(11) NOT NULL,
  `startup_ad_id` varchar(250) NOT NULL,
  `startup_add_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `noti_desc` text NOT NULL,
  `link` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `title`, `noti_desc`, `link`, `image`) VALUES
(1, 'asdfasdfasdfasdf', 'asdfasdfasdfasdf', 'asdfasdfasdfasdf', 'uploads/34b8e643ff.jpg'),
(2, 'adfasdfasdf', 'asdfasdfasd', 'adfasdfasdf', 'uploads/1647028abd.jpg'),
(3, 'asdfasdfasdf', 'asdfasdfasdf', 'asdfasdfasdf', 'uploads/007fd74b62.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mobile_adds`
--
ALTER TABLE `tbl_mobile_adds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mobile_adds`
--
ALTER TABLE `tbl_mobile_adds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
