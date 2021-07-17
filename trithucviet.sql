-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 12:56 PM
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
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `postBy` int(11) DEFAULT NULL,
  `postOn` datetime DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `voteCount` int(11) DEFAULT NULL,
  `isSpam` int(2) DEFAULT NULL,
  `totalSpam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 15, NULL, NULL, NULL, '1999-08-06', 'Hai Le', 'Nguyen', 'https://i.ibb.co/jTBKR75/Wallpaper-4-K-dep-9.jpg', 'https://i.ibb.co/4ZKQhPv/apple-pro-display-xdr-lt.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', '', '', '', '', '', '', '', ''),
(2, 16, NULL, NULL, NULL, '1999-08-01', 'Bach Viet', 'Nguyen', 'https://i.ibb.co/gRVMZL8/and1s6vyo4s31.png', 'https://i.ibb.co/r6tB5y2/1774719.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', '', '', '', '', '', '', '', ''),
(3, 17, NULL, NULL, NULL, '1986-10-01', 'Tien', 'Le Ba', 'https://i.ibb.co/7j3kjS9/lyly.jpg', 'https://i.ibb.co/gRVMZL8/and1s6vyo4s31.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `postBy` int(11) DEFAULT NULL,
  `postOn` datetime DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `voteCount` int(11) DEFAULT NULL,
  `answerCount` int(11) DEFAULT NULL,
  `isSpam` int(2) DEFAULT NULL,
  `totalSpam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `user_id`, `postBy`, `postOn`, `title`, `tags`, `content`, `voteCount`, `answerCount`, `isSpam`, `totalSpam`) VALUES
(6, 17, 17, '2021-05-07 12:29:19', 'Definition and Usage', 'html,css,W3School,7wks', '<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: rgb(255, 255, 255);\">The&nbsp;<code class=\"w3-codespan\" style=\"box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 15.75px; color: crimson; background-color: rgba(222, 222, 222, 0.3); padding-left: 4px; padding-right: 4px;\">join()</code>&nbsp;method returns the array as a string.</p><p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: rgb(255, 255, 255);\">The elements will be separated by a specified separator. The default separator is comma (,).</p><p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: inherit; font-weight: bolder;\">Note:</span>&nbsp;this method will not change the original array.</p>', 1, 5, 0, 10),
(7, 16, 16, '2021-05-07 12:42:01', 'Hello Cô Ba', 'Hello,Cô,Ba', 'adfaosfjasfhjkahfjkasfhkjasdhfas<div>dfas</div><div>df</div><div>à</div><div>sf</div><div>afffffffffasdfsdafasdfsadfsafsadf</div>', 20, 4, 0, 9),
(10, 16, 16, '2021-05-07 19:01:03', 'Chè ngon sáng tạo Chang Hi', 'ChangHi,Che,ThaiLan', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">RỦ NHAU ĐẾN THIÊN ĐƯỜNG CÁC LOẠI&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">CHÈ</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;NGON Ở&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">THỦ ĐỨC</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">.&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Chè</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;ở đây món nào cũng độc đáo, sáng tạo, bạn</span>', 2, 2, 0, 10),
(11, 16, 16, '2021-05-07 19:05:05', 'DalaLand Đà Lạt - Thánh địa triew view', 'Dalaland,Dalat,coffee,songao', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Review&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Dalaland</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;Đà Lạt – Tiểu Bali thu nhỏ tuyệt đẹp. Khi nhắc đến những địa điểm sống ảo triệu like ở Đà Lạt. Không thể không nhắc đến</span>', 1, 1, 0, 2),
(12, 16, 16, '2021-05-07 19:17:23', 'Definition and Usage', 'html,css', '<div style=\"\"><span style=\"font-size: 12px;\">If you focus the input then try to click on the link, the link won\'t work, and I want this working. I have no idea how to achieve this.</span></div><div style=\"\"><span style=\"font-size: 12px;\"><a href=\"https://stackoverflow.com/questions/67439195/prioritize-a-click-to-a-blur-event\" target=\"_blank\">https://stackoverflow.com/questions/67439195/prioritize-a-click-to-a-blur-event</a><br></span></div><div style=\"\"><img src=\"https://i.ibb.co/hWSjFVV/Hai-Tu.jpg\" style=\"max-width: 350px; max-height: 350px;\"></div><div style=\"\"><ol><li>một&nbsp;</li><li>hai&nbsp;</li><li>ba</li></ol></div><div style=\"\"><ul><li>bồn&nbsp;</li><li>năm&nbsp;</li><li>sáu</li></ul></div>', 0, 0, 0, 1),
(26, 16, 16, '2021-05-07 20:16:06', 'Viet Đẹp Trai', 'toi,ep,vl,ra', 'sdfasdfasdfasdfsdfasdfsdaf', 0, 6, 0, 5),
(28, 16, 16, '2021-05-07 20:28:12', 'opencv reduces red luminance when writing jpeg', 'openCV,luminance', '<p style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing); margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; clear: both; color: rgb(36, 39, 41); background-color: rgb(255, 255, 255);\">I\'m running into an interesting issue with opencv in python. I noticed that the luminance in the red channel is significantly reduced when I load an image using opencv and immediately save it without doing any further processing.</p><ul style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing); margin-left: 30px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; box-sizing: inherit; color: rgb(36, 39, 41); background-color: rgb(255, 255, 255);\"><li style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing-condensed); margin-left: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word;\">I know that jpeg is a lossy format, and that I should expect quality to degrade if I read/write a bunch of times. However, if I open the image in preview (mac) and export from there, I don\'t see a difference, even if I export to the lowest possible quality. If I use openCV to do the exact same thing, the difference in red channel is enormous (much more than you would expect due to the compression).</li><li style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing-condensed); margin-left: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word;\">I tried to change all the flags (imwrite_jpeg_quality, imwrite_jpeg_luma_quality, imread_anycolor, imread_unchanged, etc). I could not find any combination that prevents this effect.</li><li style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing-condensed); margin-left: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word;\">To test whether it was just the red channel, I tried this with a picture of a green apple (no difference), and a picture of an orange (red reduction noticable by eye). To make sure it has nothing to do with the image file itself (corrupted?), I also took a screenshot of the orange, exported it as a new jpeg file, and tried to read/write with python, and again the color was changed.</li><li style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing-condensed); margin-left: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word;\">I attached the images before/after of the orange. The difference becomes very clear if you open both images in their own tab and switch back and forth.</li><li style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word;\">If I read an already processed image (with reduced red) using opencv, and export it a second time, the red is not reduced any further. It only happens when the image is processed by opencv the first time.</li></ul><p style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing); margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; clear: both; color: rgb(36, 39, 41); background-color: rgb(255, 255, 255);\">this is my code:</p><p style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing); margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; clear: both; color: rgb(36, 39, 41); background-color: rgb(255, 255, 255);\"><img src=\"https://i.ibb.co/Vp29mfs/lyly.jpg\" style=\"max-width: 400px; max-height: 400px;\"></p><p style=\"margin-top: 0px; margin-right: 0px; margin-bottom: var(--s-prose-spacing); margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; clear: both; color: rgb(36, 39, 41); background-color: rgb(255, 255, 255);\">link here:&nbsp;<a href=\"https://stackoverflow.com/questions/67439935/opencv-reduces-red-luminance-when-writing-jpeg\" target=\"_blank\">https://stackoverflow.com/questions/67439935/opencv-reduces-red-luminance-when-writing-jpeg</a></p>', 0, 1, 0, 4),
(30, 16, 16, '2021-05-08 12:27:57', 'Redis on windows server: no config file specified', 'window,Redis,chocolately', '<div style=\"\"><span style=\"font-size: 12px;\">I installed redis using chocolaty. Then, It was working normally, however I cannot start it again.</span></div><div style=\"\"><span style=\"font-size: 12px;\"><br></span></div><div style=\"\"><span style=\"font-size: 12px;\"><b>Running redis-server:</b> reports a problem in config file</span></div><div style=\"\"><span style=\"font-size: 12px;\"><br></span></div><div style=\"\"><span style=\"font-size: 12px;\">link:&nbsp;<a href=\"https://stackoverflow.com/questions/41384626/redis-on-windows-server-no-config-file-specified\" target=\"_blank\">https://stackoverflow.com/questions/41384626/redis-on-windows-server-no-config-file-specified</a></span></div><div style=\"\"><br></div><div style=\"\">image:&nbsp;<img src=\"https://i.ibb.co/GVR5xV4/Wallpaper-4-K-dep-9.jpg\" style=\"max-width: 400px; max-height: 400px;\"></div><div style=\"\"><br></div><div style=\"\">But the problem persists, if I try connecting to the client:</div><div style=\"\"><br></div><div style=\"\">image2:&nbsp;<img src=\"https://i.ibb.co/HghDT6F/and1s6vyo4s31.png\" style=\"max-width: 400px; max-height: 400px;\"></div>', 0, 0, 0, 0);

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
(46, '7b826d146c6a6ad41177b507d709fb3c6c47c677', 16),
(47, 'cf8131d2dbd8b4148f03b6c61d61de10f37a3cba', 16),
(48, 'ce1a7029d34cd96c8e89dae216b5b79a137d06b4', 16),
(49, 'b6d8f9a0fc302e335e793bb7e51abf086a6f581b', 16),
(50, 'a7109a220ba6d7985b630c6ae60c2e8920f1783e', 16),
(51, '3b8a0d6c2213070880f993c830ba9f3f0df649b6', 15),
(52, '5ace1e0d2939391d8fb4604aa3ec38e4c26ca56c', 15),
(53, '8d253a88c26e7ad1bfcfefd4678eb9ca6a19a5ae', 16),
(54, 'd55d0691c512a2157a2689f6a43aa28d6aa28aad', 15),
(55, 'd226ada41fc50720d20289ec9d7ae63ebe989149', 16),
(56, '9bcc6819d8de6a14d436d36c1ab3312a9c52e941', 17),
(57, '7ad618f4914c5ddeb82692c80392732c8ca2e4f9', 17),
(58, '2fad998529715eb02c254350b2580cab0e57c9f5', 16),
(59, 'b830ce95b48d6b966c89b99ef73058c00fafa005', 16),
(60, '20cec6ee2748ea2547535090470cde96ea997901', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
(16, 'Bach Viet', 'Nguyen', 'Bach Viet_Nguyen', 'Bach Viet_Nguyen', 'bachviet@gmail.com', NULL, '$2y$10$JQaoWq9rj/LGJVRuRgkumOu0ngpL/2Rqzrm0eZqH7Xm8UAM7lN6se', '1999-08-01', 'male'),
(17, 'Tien', 'Le Ba', 'Tien_Le Ba', 'Tien_Le Ba', 'baletien@gmail.com', NULL, '$2y$10$RHCH3CCUmdgX.G7HR0YZ7uKDMU4eNa0hVf3h1PqD.DZwXy121yE2q', '1986-10-01', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `answer_user_fk` (`user_id`),
  ADD KEY `answer_question_fk` (`question_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profileForeign` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_user_fk` (`user_id`);

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
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `reactId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answerUserForeign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_question_fk` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profileForeign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
