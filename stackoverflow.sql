-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 08:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stackoverflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currentCity` varchar(255) DEFAULT NULL,
  `shortBio` text DEFAULT NULL,
  `aboutYou` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `profilePic` text DEFAULT NULL,
  `coverPic` text DEFAULT NULL,
  `policticalViews` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `highSchool` text DEFAULT NULL,
  `university` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `workplace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `profession` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `otherPlace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `socialLink` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `relationship` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `quotes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `otherName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `lifeEvent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `currentCity`, `shortBio`, `aboutYou`, `birthday`, `firstName`, `lastName`, `profilePic`, `coverPic`, `policticalViews`, `religion`, `highSchool`, `university`, `country`, `website`, `language`, `hometown`, `gender`, `workplace`, `profession`, `otherPlace`, `address`, `socialLink`, `relationship`, `quotes`, `otherName`, `lifeEvent`) VALUES
(1, 15, NULL, NULL, NULL, '1999-08-06', 'Hai Le', 'Nguyen', '../user/15/profilePhoto/Hai Tu.jpg', '../user/15/coverPhoto/sport.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', '', '', '', '', '', '', '', ''),
(2, 16, NULL, NULL, NULL, '1999-08-01', 'Bach Viet', 'Nguyen', '../user/16/profilePhoto/Hai Tu.jpg', '../user/16/coverPhoto/coverphoto.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `reactId` int(11) NOT NULL,
  `reactBy` int(11) NOT NULL,
  `reactOn` int(11) NOT NULL,
  `reactCommentOn` int(11) NOT NULL,
  `reactReplyOn` int(11) NOT NULL,
  `reactType` enum('like','love','haha','wow','sad','angry') CHARACTER SET utf8 NOT NULL,
  `reactTimeOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`, `user_id`) VALUES
(20, '3580882f62d9ff4ea9e53af51863f41c427f230b', 15),
(21, '81ff098be1746f926ce146f62a2ca7ca5610a111', 15),
(22, 'b84be3675be3207c306ceb823a09a590a0332eeb', 15),
(23, '998d887b9b7eb652c073cf470e12ae189f6d11b0', 15),
(24, '83161d25586a2b30d5ad6959489c83fe8a2221a0', 15),
(25, '2074657089c3890d3994019aca2620fcc18d4ffe', 16),
(26, '25df139a7c6f5febd902161f87e609934a2f17b4', 16),
(27, '2769fa9b118957a00a21266ce48aa372de8409e3', 16),
(28, '2efd2b3198ae8baeabb462ba6928799cb4383b96', 16),
(29, 'c11af3a65d3baba99fec00a144706056f0a5e3d8', 16),
(30, '7f8e78f65c4e6821acb4e3b17c9940e17b97a0e9', 16),
(31, 'f6d809d3022aeb015e990ea19c119c8f305caf8f', 16),
(32, 'f96be1521a23b5cc8d6a26df61ed51c453198abf', 16),
(33, '145b18104935731ff2794da40e5e530dd097ce87', 16),
(34, 'b0cbc5d613f7c88e2c162db073261aea6433a011', 16),
(35, '131e865ceebb0ed09836b873c76f175f995b48ce', 15),
(36, '73c4e4204ea90ba3ebd08c94621b0d3a1ff5ef77', 16),
(37, '9ddfdca7aa47e2ca0c503109696bad34a1b84fb2', 15),
(38, '3ecce87cb9b620c5ea01449a6353591645589e73', 16),
(39, 'ce9e59d2b2de5ad778c55c6dc8683d4442478dd0', 16),
(40, 'b81c21715e012dec41dcd5f90626b8b9fa68fccf', 16),
(41, 'a98653875ffec8aad029ef7f016e9fa3b32b331e', 16),
(42, '25e07f0bd3cec89e5b9510eeeba15d47ba2e1fa4', 16),
(43, 'de2fa32fea0f58307fed86e2996a88eef7ef5f2b', 16),
(44, '3a885fa3be29b1a6d87b25d8fadcf4c0d52ea826', 16),
(45, 'fbadda4cddfd7b9a882e4b9fd9b92f8cd048d100', 16),
(46, '7b826d146c6a6ad41177b507d709fb3c6c47c677', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

use `bitgqltbcw1nl6jid2u2`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `screen_name` varchar(255) NOT NULL,
  `userLink` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `screen_name`, `userLink`, `email`, `mobile`, `password`, `birthday`, `gender`) VALUES
(15, 'Hai Le', 'Nguyen', 'Hai Le_Nguyen', 'Hai Le_Nguyen1139060398', 'nohackerjustdev1234@gmail.com', NULL, '$2y$10$vfSpwrM2UVSquDW3njp7w.BZF8S1q.jWwD.0s.n1rAV3ThaB/pueu', '1999-08-06', 'male'),
(16, 'Bach Viet', 'Nguyen', 'Bach Viet_Nguyen', 'Bach Viet_Nguyen', 'bachviet@gmail.com', NULL, '$2y$10$JQaoWq9rj/LGJVRuRgkumOu0ngpL/2Rqzrm0eZqH7Xm8UAM7lN6se', '1999-08-01', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profileForeign` (`user_id`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`reactId`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `reactId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profileForeign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
