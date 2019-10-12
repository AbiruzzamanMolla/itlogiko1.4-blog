-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2019 at 10:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `cat_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_description`, `cat_status`) VALUES
(1, 'PlainJS', 'VanillaJS is sweet', 1),
(10, 'Python', 'fadf a af dsaf', 1),
(3, 'HTML5', 'HTML is a Programming Language', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` tinyint(4) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_author` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `post_image` text COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_tags` text COLLATE utf8_unicode_ci NOT NULL,
  `post_comment_count` int(3) NOT NULL,
  `post_status` tinyint(2) NOT NULL DEFAULT '0',
  `post_views_count` int(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'Hello World', 'Abir', 'Sat, October 12, 2019 - 09:26:25 AM', 'post1.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui iusto quis, temporibus assumenda possimus ab veritatis dignissimos corporis blanditiis porro ea est fugiat. Mollitia itaque distinctio voluptatum est voluptate cum veritatis culpa placeat voluptatibus quisquam minima consequatur maxime fuga minus laudantium similique nemo, nobis modi magnam porro, deleniti ipsa eaque! Nemo fuga iste quam ea. Dicta, ab illo nam iste dignissimos aliquam consectetur perferendis iure! Maxime fugit, necessitatibus veniam eligendi mollitia atque consequatur laboriosam culpa quo, iusto minus aliquam, debitis possimus incidunt optio ullam porro? Quas praesentium perspiciatis nulla, et quae officia repellendus ex molestias dicta odit magni quaerat mollitia? dfds a fdaf', 'image, new, post, make', 0, 1, 0),
(2, 10, 'Daff', 'Daffi', 'Sat, October 12, 2019 - 09:26:45 AM', '20683047.png', 'fsdafsfdf', 'fdsafsd', 0, 1, 0),
(3, 3, 'Hello from java', 'Abir', 'Thu, October 10, 2019 - 04:59:13 AM', 'screenshot-ajaxcrud.test-2019.10.05-17_09_50.png', 'loram fdlaksdkfd dfkjsfkdsjf fsdaf fdfdsfsd', 'java,hello,world', 0, 0, 0),
(4, 3, 'Hwllo ', 'Abir', 'Sat, October 12, 2019 - 06:59:38 AM', 'fasfsf.jpg', 'fdafsd af f af f ', 'fdf', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uid` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `username`, `email`, `password`, `bio`, `role`) VALUES
(1, 'asliabir', 'abiruzzaman.molla@gmail.com', '123456', 'Admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
