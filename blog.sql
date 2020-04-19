-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 10:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `postID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `commentDesc` varchar(500) NOT NULL,
  `commentAuthor` varchar(500) NOT NULL,
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`postID`, `commentID`, `commentDesc`, `commentAuthor`, `commentTime`) VALUES
(21, 25, '          Sounds Good.', 'admin', '2020-04-19 18:55:15'),
(21, 26, '          Amazing, wow.', 'sanuj', '2020-04-19 18:59:15'),
(21, 27, '          Thank You guys.', 'nitin', '2020-04-19 18:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL,
  `postDesc` varchar(10000) NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `postTag` varchar(40) NOT NULL,
  `postAuthor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postTime`, `postTag`, `postAuthor`) VALUES
(19, 'commnetsd', '<p>sfsdfsf</p>\r\n', '2020-04-19 10:58:29', 'sdf', 'nitu'),
(21, 'Pasta', '<p>What You Need?</p>\r\n\r\n<ul>\r\n	<li>water</li>\r\n	<li>large pot</li>\r\n	<li>pasta</li>\r\n	<li>salt</li>\r\n	<li>tongs</li>\r\n	<li>colander</li>\r\n</ul>\r\n\r\n<p>Steps:</p>\r\n\r\n<ol>\r\n	<li><strong>Boil water in a large pot</strong><br />\r\n	To make sure pasta&nbsp;doesn&rsquo;t stick together, use at least 4 quarts of water for every pound of noodles.</li>\r\n	<li><strong>Salt the water with at least a tablespoon&mdash;more is fine</strong><br />\r\n	The salty water adds flavor to the pasta.</li>\r\n	<li><strong>Add pasta</strong><br />\r\n	Pour pasta into boiling water. Don&rsquo;t break the pasta; it will soften up within 30 seconds and fit into the pot.</li>\r\n	<li><strong>Stir the pasta</strong><br />\r\n	As the pasta starts to cook, stir it well with the tongs so the noodles don&rsquo;t stick to each other (or the pot).</li>\r\n	<li><strong>Test the pasta by tasting it</strong><br />\r\n	Follow the cooking time on the package, but always taste pasta before draining to make sure the texture is right. Pasta cooked properly should be al dente&mdash;a little chewy.</li>\r\n	<li><strong>Drain the pasta</strong><br />\r\n	Drain cooked pasta well in a colander. If serving hot, add sauce right away; if you&rsquo;re making a pasta salad, run noodles under cold water to stop the cooking.</li>\r\n</ol>\r\n', '2020-04-19 18:54:42', 'Italian', 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `posts_buffer`
--

CREATE TABLE `posts_buffer` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(100) NOT NULL,
  `postDesc` varchar(5000) NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `postTag` varchar(20) NOT NULL,
  `postAuthor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usertype` varchar(50) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `password`, `emailid`, `createdon`, `usertype`) VALUES
(6, 'admin', 'admin', '2fc662c51a12e7445b4435528a52fca9', 'admin@admin.com', '2020-04-19 17:33:19', 'admin'),
(8, 'nitu', 'Nit', '5f4dcc3b5aa765d61d8327deb882cf99', 'nit@nit.nit', '2020-04-19 20:02:05', 'normal'),
(9, 'chinu', 'Chimni', 'password', 'susususu@nitin.com', '2020-04-19 17:18:49', 'normal'),
(10, 'ncirl', 'Ncirl', 'ncirl', 'nci@nci', '2020-04-19 17:18:53', 'normal'),
(11, 'nitin', 'nitin', '5f4dcc3b5aa765d61d8327deb882cf99', 'nitin@ncirl.ie', '2020-04-19 17:33:51', 'normal'),
(12, 'sanuj', 'Sanuj K', '5f4dcc3b5aa765d61d8327deb882cf99', 'sanujk@gmail.com', '2020-04-19 18:56:58', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `users_buffer`
--

CREATE TABLE `users_buffer` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `usertype` varchar(20) NOT NULL DEFAULT 'nornal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `postAuthor` varchar(40) NOT NULL,
  `postID` int(11) NOT NULL,
  `postLikes` int(11) NOT NULL DEFAULT 0,
  `postDisLikes` int(11) NOT NULL,
  `postComments` int(11) NOT NULL DEFAULT 0,
  `postViews` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User and Post relation Table';

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`postAuthor`, `postID`, `postLikes`, `postDisLikes`, `postComments`, `postViews`) VALUES
('nitu', 18, 0, 0, 0, 25),
('nitu', 19, 0, 0, 0, 12),
('nitin', 21, 0, 0, 0, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `commentID` (`commentID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postTitle` (`postTitle`);

--
-- Indexes for table `posts_buffer`
--
ALTER TABLE `posts_buffer`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_buffer`
--
ALTER TABLE `users_buffer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`emailid`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postID` (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts_buffer`
--
ALTER TABLE `posts_buffer`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_buffer`
--
ALTER TABLE `users_buffer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
