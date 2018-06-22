-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 6 月 23 日 02:43
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mini_bbs`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `picture`, `created`, `modified`) VALUES
(9, 'yohei', 'sa.lwr.178@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '20180622174838', '2018-06-22 17:48:40', '2018-06-22 08:48:40'),
(10, '白井', 'yoheiyohei@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '20180622174934', '2018-06-22 17:49:35', '2018-06-22 08:49:35'),
(11, '白井　陽平', 'good@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '20180622175642', '2018-06-22 17:56:45', '2018-06-22 08:56:45'),
(12, 'shiraiyohei', 'yoheiyoheiyohei@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '20180622234836', '2018-06-22 23:48:38', '2018-06-22 14:48:38'),
(13, 'test2', 'test2@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '20180623023627', '2018-06-23 02:36:29', '2018-06-22 17:36:29');

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `message` text NOT NULL,
  `member_id` int(11) NOT NULL,
  `reply_post_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `message`, `member_id`, `reply_post_id`, `created`, `modified`) VALUES
(1, 'うぉい', 2, 0, '2018-06-21 07:41:44', '2018-06-20 22:41:44'),
(2, 'a', 2, 0, '2018-06-21 07:43:08', '2018-06-20 22:43:08'),
(3, 'a', 3, 0, '2018-06-21 08:04:37', '2018-06-20 23:04:37'),
(4, 'うぉい\r\n', 3, 0, '2018-06-21 08:04:43', '2018-06-20 23:04:43'),
(5, 'aa', 4, 0, '2018-06-22 17:36:39', '2018-06-22 08:36:39'),
(6, 'aaaa\r\n', 4, 0, '2018-06-22 17:36:44', '2018-06-22 08:36:44'),
(7, 'よしよし\r\n', 4, 0, '2018-06-22 17:36:55', '2018-06-22 08:36:55'),
(8, 'a', 4, 0, '2018-06-22 17:37:41', '2018-06-22 08:37:41'),
(9, 'a', 7, 0, '2018-06-22 17:43:05', '2018-06-22 08:43:05'),
(10, 'aaa', 7, 0, '2018-06-22 17:44:20', '2018-06-22 08:44:20'),
(11, 'a', 9, 0, '2018-06-22 17:50:49', '2018-06-22 08:50:49'),
(12, 'a', 9, 0, '2018-06-22 17:56:49', '2018-06-22 08:56:49'),
(13, 'a', 9, 0, '2018-06-22 17:56:54', '2018-06-22 08:56:54'),
(14, 'aiueo', 12, 0, '2018-06-22 23:51:20', '2018-06-22 14:51:20'),
(15, 'aaa', 12, 0, '2018-06-23 02:36:50', '2018-06-22 17:36:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
