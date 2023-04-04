-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 04:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `sub`, `message`, `created_at`) VALUES
(2, 'Md Tufik Hasan', 'ontorattarsondhane1@gmail.com', 'This site can’t be reached', 'fdfd', '2023-04-04 09:54:43'),
(3, 'Md Tufik Hasan', 'rakib@gmail.com', 'This site can’t be reached', 'fdfd', '2023-04-04 10:00:48'),
(4, 'Md Tufik Hasan', 'rakib@gmail.com', 'This site can’t be reached - tufikhasan.com refused to connect.', 'fdfddffd', '2023-04-04 13:19:33'),
(5, 'Md Tufik Hasan', 'tufikhasan05@gmail.com', 'test', 'this test message', '2023-04-04 13:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `author` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `content`, `category`, `author`, `created_at`) VALUES
(1, 'Bitcoin storms toward its strongest quarter in 2 years with a 72% jump, outperforming the Nasdaq and gold', 'https://i.insider.com/6424307ded593e00183f0aad?width=1200&format=jpeg', 'Bitcoin has stormed to a 72% gain over the last three months and is on track for its strongest quarter in two years.\r\n\r\nThe token has outperformed both the Nasdaq 100 and gold, which are up 15% and 9%, respectively, in the same stretch. Bitcoin\'s rally is also exceeding those of other cryptos, including ether\'s 50% jump.', 'Business Insider', 'Towfik Hasan', '2023-04-04'),
(2, 'Jeremy Siegel says bitcoin\'s rush higher will fizzle out once people trust banks again', 'https://i.insider.com/52ed527cecad049a6d4ad89c?width=1200&format=jpeg', 'Wharton professor Jeremy Siegel has weighed in on bitcoin\'s recent rally, spurred on by the recent banking crisis. \\r\\n\\\"My feeling is when people feel they\'re safe in the banks again, bitcoin will go Wharton professor Jeremy Siegel has weighed in on bitcoin\'s recent rally, spurred on by the recent banking crisis. \\r\\n\\\"My feeling is when people feel they\'re safe in the banks again, bitcoin will go b', 'Business Insider', 'Towfik Hasan', '2023-04-04'),
(3, 'Bitcoin plunges under $20,000 to its lowest point in 2 months as Silvergate blow-up and bank fears rattle risk assets', 'https://i.insider.com/5d669bfb2e22af0e7c65d5e8?width=1200&format=jpeg', 'Bitcoin is veering toward a weekly loss as a fresh pain point for the crypto sector emerged from the failure of crypto-friendly Silvergate Bank. Bitcoin slumped to its lowest price in two months Friday as the collapse of crypto depositor Silvergate Bank and the blow-up of tech startup lender Silicon Valley Bank fueled a retreat by investors', 'economy', 'Towfik Hasan', '2023-04-04'),
(7, 'Mike Trout, Shohei Ohtani go back-to-back for 1st HRs of 2023 - MLB.com', 'https://img.mlbstatic.com/mlb-images/image/upload/t_2x1/t_w1536/mlb/gvdsot2tiw4cvdbkiciz.jpg', 'OAKLAND -- While Angels superstars Mike Trout and Shohei Ohtani had been hitting the ball hard early this season, they both came into Sunday’s finale against the A’s without a homer.\\nBut that changed in a hurry in the fifth inning, as they connected on back OAKLAND -- While Angels superstars Mike Trout and Shohei Ohtani had been hitting the ball hard early this season, they both came into Sunday’s finale against the A’s without a homer.\\nBut that changed in a hurry in the fifth inning, as they connected on back', 'sports', 'Towfik Hasan', '2023-04-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
