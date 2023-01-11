-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 07:20 AM
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
-- Database: `centrinova`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentId` int(11) NOT NULL,
  `CommentName` varchar(256) NOT NULL,
  `CommentEmail` varchar(256) NOT NULL,
  `CommentContent` text NOT NULL,
  `CommentPostId` int(11) NOT NULL,
  `CommentPostTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentId`, `CommentName`, `CommentEmail`, `CommentContent`, `CommentPostId`, `CommentPostTime`) VALUES
(45, 'Sumbai Distapratama', 'Sumbaidp@gmail.com', 'Quisque pellentesque neque a commodo viverra. Proin convallis risus vel dui congue, sed elementum dolor condimentum.', 28, '2023-01-11 06:18:31'),
(46, 'Sumbai Distapratama', 'Sumbaidp@gmail.com', 'Sed dignissim a magna vel scelerisque. Vestibulum porta vulputate dignissim. Proin venenatis, ex ut luctus iaculis, elit tortor aliquet mauris, nec ornare mi metus id nulla.', 28, '2023-01-11 06:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-01-07-155841', 'App\\Database\\Migrations\\Posts', 'default', 'App', 1673107908, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostId` int(5) UNSIGNED NOT NULL,
  `Username` varchar(25) NOT NULL,
  `PostTitle` varchar(256) NOT NULL,
  `PostTitleSEO` varchar(256) NOT NULL,
  `PostStatus` enum('active','inactive') NOT NULL DEFAULT 'active',
  `PostType` enum('article','page') NOT NULL DEFAULT 'article',
  `PostThumbnail` varchar(256) NOT NULL,
  `PostDescription` varchar(256) NOT NULL,
  `PostContent` longtext NOT NULL,
  `PostTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostId`, `Username`, `PostTitle`, `PostTitleSEO`, `PostStatus`, `PostType`, `PostThumbnail`, `PostDescription`, `PostContent`, `PostTime`) VALUES
(16, 'flicklicious', 'Judul 2', 'judul-2', 'active', 'article', '1673191765_0601a6ec8b88b881dd5e.png', 'Nunc pulvinar sapien et ligula ullamcorper. Magna fermentum iaculis eu non diam phasellus. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus a. A diam ', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Porttitor lacus luctus accumsan tortor posuere ac ut. Congue eu consequat ac felis. Velit scelerisque in dictum non consectetur a erat. Vestibulum sed arcu non odio euismod lacinia at quis risus. Orci porta non pulvinar neque. Facilisis volutpat est velit egestas dui id. A scelerisque purus semper eget. Vestibulum rhoncus est pellentesque elit ullamcorper. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. In massa tempor nec feugiat. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Lobortis scelerisque fermentum dui faucibus in ornare. Nam aliquam sem et tortor consequat id porta. Nulla facilisi cras fermentum odio. Ut sem viverra aliquet eget sit. Quisque id diam vel quam. Nunc non blandit massa enim nec dui nunc. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit.</p><p style=\"text-align: justify; \"><br></p><p style=\"text-align: justify; \">Felis bibendum ut tristique et egestas quis ipsum. Vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Est velit egestas dui id ornare arcu. Rhoncus dolor purus non enim praesent elementum facilisis leo. Adipiscing elit ut aliquam purus sit. Pharetra et ultrices neque ornare aenean euismod. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam. Eu turpis egestas pretium aenean pharetra magna ac. Quam id leo in vitae turpis massa sed elementum tempus. Tortor consequat id porta nibh venenatis. Venenatis cras sed felis eget velit aliquet. Egestas purus viverra accumsan in. Molestie a iaculis at erat pellentesque adipiscing commodo elit.</p><p style=\"text-align: justify; \"><br></p><p style=\"text-align: justify; \">Pretium fusce id velit ut tortor pretium viverra suspendisse. Augue neque gravida in fermentum et. Erat nam at lectus urna duis convallis. Vulputate mi sit amet mauris commodo. Adipiscing elit duis tristique sollicitudin nibh sit amet. Justo laoreet sit amet cursus sit amet. Viverra nibh cras pulvinar mattis nunc. Tortor at risus viverra adipiscing at in tellus. Placerat in egestas erat imperdiet sed euismod nisi porta lorem. Nisi est sit amet facilisis magna etiam tempor. Elementum nibh tellus molestie nunc non blandit massa enim nec. Arcu risus quis varius quam quisque id diam vel. Convallis aenean et tortor at risus viverra. Nibh sed pulvinar proin gravida hendrerit. Mauris pharetra et ultrices neque ornare. In hendrerit gravida rutrum quisque non tellus orci ac auctor. Arcu non sodales neque sodales ut etiam sit amet.</p><p style=\"text-align: justify; \"><br></p><p style=\"text-align: justify; \">Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Leo a diam sollicitudin tempor id eu nisl nunc. Rhoncus mattis rhoncus urna neque viverra. Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Turpis massa sed elementum tempus. Ut morbi tincidunt augue interdum velit euismod in. A iaculis at erat pellentesque adipiscing commodo. Ornare aenean euismod elementum nisi quis. Ut faucibus pulvinar elementum integer enim. Mattis nunc sed blandit libero volutpat sed cras ornare. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Rhoncus aenean vel elit scelerisque mauris.</p><p style=\"text-align: justify; \"><br></p><p style=\"text-align: justify; \">Nunc pulvinar sapien et ligula ullamcorper. Magna fermentum iaculis eu non diam phasellus. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus a. A diam maecenas sed enim ut sem viverra. Purus in mollis nunc sed id semper risus in hendrerit. Augue interdum velit euismod in. Senectus et netus et malesuada fames ac turpis egestas integer. Aliquet enim tortor at auctor urna nunc id. Enim blandit volutpat maecenas volutpat blandit aliquam. Vulputate ut pharetra sit amet. Quis hendrerit dolor magna eget est lorem ipsum. Risus nullam eget felis eget nunc. Scelerisque purus semper eget duis at tellus at urna. Cursus vitae congue mauris rhoncus aenean.</p>', '2023-01-08 15:29:25'),
(17, 'flicklicious', 'Judul 3', 'judul-3', 'active', 'article', '1673286732_c0fcaf6a71147642c057.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:52:12'),
(18, 'flicklicious', 'Judul 4', 'judul-4', 'active', 'article', '1673286775_1cf91e87a278255c7adc.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:52:55'),
(19, 'flicklicious', 'Judul 5', 'judul-5', '', 'article', '1673286846_6a4dab8df26d49de8a7f.png', 'sunt in culpa qui officia deserunt mollit anim id est laborum.', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:53:18'),
(20, 'flicklicious', 'Judul 6', 'judul-6', '', 'article', '1673287071_33f7b88c0f0cfee9beed.png', 'sunt in culpa qui officia deserunt mollit anim id est laborum.', '<p><span style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '2023-01-09 17:53:44'),
(21, 'flicklicious', 'Judul 7', 'judul-6-2', 'active', 'article', '1673287140_acba7518528b220b1950.png', 'sunt in culpa qui officia deserunt mollit anim id est laborum.', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:54:36'),
(22, 'flicklicious', 'Judul 8', 'judul-7', '', 'article', '1673286907_064fa3aabf94bf59f51e.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:55:07'),
(23, 'flicklicious', 'Judul 9', 'judul-8', 'active', 'article', '1673287093_77284c5b90322c734e52.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:55:48'),
(24, 'flicklicious', 'Judul 10', 'judul-9', '', 'article', '1673286976_4f184db5dfffa4961700.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:56:16'),
(25, 'flicklicious', 'Judul 11', 'judul-10', '', 'article', '1673286996_84937c5a68ab48426139.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p style=\"text-align: justify; \"><font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif\"><span style=\"font-size: 19px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br></p>', '2023-01-09 17:56:37'),
(26, 'flicklicious', 'Judul 12', 'judul-11', '', 'article', '1673287016_8e0ee91decdafc9271c6.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '2023-01-09 17:56:56'),
(28, 'flicklicious', 'Judul 14', 'judul-13', 'active', 'article', '1673316863_46a3a2065ac49973f429.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet porta est, sit amet vestibulum augue. Aliquam ut nisi a justo imperdiet venenatis. Vivamus ac erat sapien. Vestibulum gravida tellus ipsum, eu vestibulum augue dignissim eget. Maec', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet porta est, sit amet vestibulum augue. Aliquam ut nisi a justo imperdiet venenatis. Vivamus ac erat sapien. Vestibulum gravida tellus ipsum, eu vestibulum augue dignissim eget. Maecenas vel ligula et orci commodo posuere. Vivamus quis purus sem. Donec ultricies neque sed lacinia molestie. Fusce ac risus justo.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Mauris auctor mi nisl, a efficitur metus pellentesque vitae. Proin rutrum egestas feugiat. Aliquam erat volutpat. Praesent a faucibus libero. Maecenas et tellus nisi. Morbi tortor nibh, pretium sit amet imperdiet nec, cursus id ligula. Aliquam vitae sem vel neque porta facilisis in ut erat. Sed ullamcorper lacus purus, at viverra libero viverra nec. Aliquam maximus, quam non facilisis aliquet, turpis lectus egestas leo, ac blandit nibh purus in velit. Donec facilisis euismod turpis in eleifend. Curabitur eu orci tellus. Fusce sed sagittis massa. Donec nunc enim, suscipit a hendrerit et, condimentum vitae ante. Nulla a ligula ut velit porta facilisis. Proin nisl est, accumsan sit amet enim et, molestie rhoncus nisi. Aenean sit amet tortor quis ante tincidunt dictum eget id magna.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Quisque pellentesque neque a commodo viverra. Proin convallis risus vel dui congue, sed elementum dolor condimentum. Praesent quis velit finibus, suscipit dolor at, cursus tellus. Donec auctor risus et purus scelerisque, sed gravida tortor cursus. Sed dignissim a magna vel scelerisque. Vestibulum porta vulputate dignissim. Proin venenatis, ex ut luctus iaculis, elit tortor aliquet mauris, nec ornare mi metus id nulla.</p>', '2023-01-10 02:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` text NOT NULL,
  `FullName` varchar(128) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Token` text NOT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedBy` varchar(64) DEFAULT NULL,
  `EditedDate` datetime DEFAULT NULL,
  `EditedBy` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `Username`, `Password`, `FullName`, `Email`, `Token`, `LastLogin`, `CreatedDate`, `CreatedBy`, `EditedDate`, `EditedBy`) VALUES
(1, 'flicklicious', '$2y$10$nfvY4c7Bkqweg0BESjC6Gewykm9QGc7cMiFWWYPMCsUR1G0qkDw6m', 'Sumbai', 'sumbaidp@gmail.com', 'b2265ab5e7e9a9af9cd8ee18b2ec7967', '2023-01-10 22:28:37', '2022-12-16 11:09:23', 'flicklicious', '2023-01-10 22:23:24', 'flicklicious');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `Username` (`Username`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostId` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
