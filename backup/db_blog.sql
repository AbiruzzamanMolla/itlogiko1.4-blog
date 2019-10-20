-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2019 at 11:13 AM
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
  `cat_status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_description`, `cat_status`, `created_at`) VALUES
(1, 'PlainJS', 'fdsafffdf', 1, '2019-10-15 04:48:43'),
(10, 'Python', 'Python is a sap', 1, '2019-10-15 04:48:43'),
(3, 'HTML5', 'HTML is a Programming Language', 1, '2019-10-15 04:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment_body` text NOT NULL,
  `report` int(10) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `post_id`, `username`, `comment_body`, `report`, `status`) VALUES
(1, 2, 'asliabir', 'fda asdf ff ad afh dkjfa kadshf kasj fhkajfh fhd khafkjf hajfh ksjafhkhadskf hkfa hfldahf ', 0, 1),
(2, 1, 'asliabir', 'fdsafsd', 0, 1),
(3, 1, 'abir', 'fdsafdsfd', 0, 1),
(4, 14, 'asliabir', 'fdafd daffdsfaf fsa sf', 0, 1),
(5, 14, 'asliabir', 'fdafd daffdsfaf fsa sf', 0, 1),
(6, 14, 'asliabir', 'fdafd daffdsfaf fsa sf', 0, 1),
(7, 14, 'asliabir', 'fdafd daffdsfaf fsa sf', 0, 1),
(8, 14, 'fdfadsf', 'asfsdfdsaf', 0, 0),
(13, 19, 'asliabir', 'sdaffadf fds', 0, 0),
(14, 19, 'asliabir', 'sdaffadf fds', 0, 0),
(15, 11, 'tgr', 'yrtyrty', 0, 0),
(16, 12, 'fghd', 'gfghfghsdfsdf', 0, 0);

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
(1, 1, 'Hello World', 'Abir', 'Fri, October 11, 2019 - 08:38:16 AM', 'post1.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui iusto quis, temporibus assumenda possimus ab veritatis dignissimos corporis blanditiis porro ea est fugiat. Mollitia itaque distinctio voluptatum est voluptate cum veritatis culpa placeat voluptatibus quisquam minima consequatur maxime fuga minus laudantium similique nemo, nobis modi magnam porro, deleniti ipsa eaque! Nemo fuga iste quam ea. Dicta, ab illo nam iste dignissimos aliquam consectetur perferendis iure! Maxime fugit, necessitatibus veniam eligendi mollitia atque consequatur laboriosam culpa quo, iusto minus aliquam, debitis possimus incidunt optio ullam porro? Quas praesentium perspiciatis nulla, et quae officia repellendus ex molestias dicta odit magni quaerat mollitia? dfds a fdaf', 'google, php, java, php7, css3', 0, 0, 0),
(2, 10, 'Daff', 'Daffi', 'Sat, October 12, 2019 - 09:26:45 AM', '20683047.png', 'fsdafsfdf', 'fdsafsd', 0, 1, 0),
(3, 3, 'Hello from java', 'asliabir', 'Thu, October 10, 2019 - 04:59:13 AM', 'screenshot-ajaxcrud.test-2019.10.05-17_09_50.png', 'loram fdlaksdkfd dfkjsfkdsjf fsdaf fdfdsfsd', 'java,hello,world', 0, 1, 0),
(21, 10, 'fadfsd', 'dafsdf', 'Sun, October 20, 2019 - 07:25:27 AM', 'Annotation 2019-10-17 113854.png', 'fadsfdsfsda', 'google, php, java', 0, 1, 0),
(6, 3, 'Hello World', 'Abir', 'Thu, October 17, 2019 - 05:48:45 AM', 'post1.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui iusto quis, temporibus assumenda possimus ab veritatis dignissimos corporis blanditiis porro ea est fugiat. Mollitia itaque distinctio voluptatum est voluptate cum veritatis culpa placeat voluptatibus quisquam minima consequatur maxime fuga minus laudantium similique nemo, nobis modi magnam porro, deleniti ipsa eaque! Nemo fuga iste quam ea. Dicta, ab illo nam iste dignissimos aliquam consectetur perferendis iure! Maxime fugit, necessitatibus veniam eligendi mollitia atque consequatur laboriosam culpa quo, iusto minus aliquam, debitis possimus incidunt optio ullam porro? Quas praesentium perspiciatis nulla, et quae officia repellendus ex molestias dicta odit magni quaerat mollitia? dfds a fdaf', 'image, new, post, make, imp', 0, 1, 0),
(7, 10, 'Daff', 'Daffi', 'Sat, October 12, 2019 - 09:26:45 AM', '20683047.png', 'fsdafsfdf', 'fdsafsd', 0, 1, 0),
(8, 3, 'Hello from java', 'Abir', 'Fri, October 11, 2019 - 04:59:13 AM', 'screenshot-ajaxcrud.test-2019.10.05-17_09_50.png', 'loram fdlaksdkfd dfkjsfkdsjf fsdaf fdfdsfsd', 'java,hello,world', 0, 1, 0),
(10, 1, 'Hello World', 'Admin', 'Sat, October 12, 2019 - 09:26:25 AM', 'post1.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui iusto quis, temporibus assumenda possimus ab veritatis dignissimos corporis blanditiis porro ea est fugiat. Mollitia itaque distinctio voluptatum est voluptate cum veritatis culpa placeat voluptatibus quisquam minima consequatur maxime fuga minus laudantium similique nemo, nobis modi magnam porro, deleniti ipsa eaque! Nemo fuga iste quam ea. Dicta, ab illo nam iste dignissimos aliquam consectetur perferendis iure! Maxime fugit, necessitatibus veniam eligendi mollitia atque consequatur laboriosam culpa quo, iusto minus aliquam, debitis possimus incidunt optio ullam porro? Quas praesentium perspiciatis nulla, et quae officia repellendus ex molestias dicta odit magni quaerat mollitia? dfds a fdaf', 'php, java', 0, 1, 0),
(11, 10, 'Daff', 'Admin', 'Sat, October 12, 2019 - 09:26:45 AM', '20683047.png', 'fsdafsfdf', 'fdsafsd', 0, 1, 0),
(12, 3, 'Hello from java', 'Abir', 'Thu, October 10, 2019 - 04:59:13 AM', 'screenshot-ajaxcrud.test-2019.10.05-17_09_50.png', 'loram fdlaksdkfd dfkjsfkdsjf fsdaf fdfdsfsd', 'java,hello,world', 0, 1, 0),
(19, 3, 'Wellcome to blog', 'abir', 'Thu, October 17, 2019 - 06:19:25 AM', 'Untitled_design.png', 'fdafsdds fdafd ffaf sa', 'google, php, java', 0, 1, 0),
(22, 10, 'ffdsafds', 'asliabir', 'Sun, October 20, 2019', 'Annotation 2019-10-17 113854.png', 'fadfdsfasf', 'google, php', 0, 1, 0),
(23, 10, 'ffdsafds', 'asliabir', 'Sun, October 20, 2019', 'Annotation 2019-10-17 113854.png', 'fadfdsfasf', 'google, php', 0, 1, 0),
(24, 3, 'i am i', 'asliabir', 'Sun, October 20, 2019', 'Untitled.png', 'fdsaff fsd ff afs ff afsd fa', 'java', 0, 1, 0),
(15, 10, 'Daff', 'Daffi', 'Sat, October 12, 2019 - 09:26:45 AM', '20683047.png', 'fsdafsfdf', 'fdsafsd', 0, 1, 0),
(16, 3, 'Hello from java', 'Abir', 'Thu, October 10, 2019 - 04:59:13 AM', 'screenshot-ajaxcrud.test-2019.10.05-17_09_50.png', 'loram fdlaksdkfd dfkjsfkdsjf fsdaf fdfdsfsd', 'java,hello,world', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `tag_id` int(10) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`tag_id`, `tags`) VALUES
(1, 'python'),
(2, 'google'),
(3, 'php'),
(4, 'java'),
(5, 'php7'),
(6, 'css3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uid` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullName` varchar(60) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `bio` varchar(5000) DEFAULT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `username`, `fullName`, `image`, `title`, `email`, `password`, `bio`, `role`) VALUES
(1, 'asliabir', '', 'abir.png', 'Intern JSE', 'abiruzzaman.molla@gmail.com', '123456', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 0),
(8, 'admin', 'Md Abiruzzaman Molla', 'abir.png', 'Intern JSE', 'abiruzzaman@gmail.com', '123456', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n', 1),
(9, 'mollahomar', '', NULL, '', 'mollah@gmail.com', '1234', 'fdasfdsf adsfdsfdf fasf ', 0),
(10, 'mollahdfdaf', '', NULL, '', 'dafdasfd@fdsafd.ff', '1234567', 'fdfaf fsf fasFd asdf', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`tag_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `tag_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
