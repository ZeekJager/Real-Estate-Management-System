-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2024 at 08:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ethiohomes_data_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_table`
--

CREATE TABLE `chat_table` (
  `id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `message` varchar(100) NOT NULL,
  `to_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `house_rating_table`
--

CREATE TABLE `house_rating_table` (
  `id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `house_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `house_review`
--

CREATE TABLE `house_review` (
  `id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `house_review` varchar(100) NOT NULL,
  `house_id` int(10) NOT NULL,
  `to_user_id` int(10) NOT NULL,
  `viewed` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `house_table`
--

CREATE TABLE `house_table` (
  `house_id` int(10) NOT NULL,
  `house_image` varchar(100) NOT NULL,
  `image_1` varchar(100) NOT NULL,
  `image_2` varchar(100) NOT NULL,
  `image_3` varchar(100) NOT NULL,
  `image_4` varchar(100) NOT NULL,
  `image_5` varchar(100) NOT NULL,
  `house_name` varchar(100) NOT NULL,
  `house_price` varchar(1000) NOT NULL,
  `house_location` varchar(100) NOT NULL,
  `house_bedroom` int(10) NOT NULL,
  `house_bathroom` int(10) NOT NULL,
  `house_area` int(10) NOT NULL,
  `house_status` tinyint(1) NOT NULL,
  `house_promotion` tinyint(1) NOT NULL,
  `house_rating` float NOT NULL,
  `house_review_number` int(10) NOT NULL,
  `buy_or_sale` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_table`
--

INSERT INTO `house_table` (`house_id`, `house_image`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `house_name`, `house_price`, `house_location`, `house_bedroom`, `house_bathroom`, `house_area`, `house_status`, `house_promotion`, `house_rating`, `house_review_number`, `buy_or_sale`, `date`, `user_id`) VALUES
(27, 'h4.webp', 'h4.webp', '', '', '', '', 'House for sale at bulgaria', '100000', 'ayat', 5, 3, 200, 1, 0, 0, 0, 1, '2024-06-24', 1),
(28, 'h11.jpg', 'h11.jpg', '', '', '', '', 'New duplex', '98,000', 'Mexico', 6, 4, 150, 1, 0, 0, 0, 1, '2024-06-24', 1),
(29, 'h12.webp', 'h12.webp', '', '', '', '', 'Luxury House', '99,000', 'Bole', 5, 3, 175, 1, 0, 0, 0, 1, '2024-06-24', 1),
(30, 'h5.jpg', 'h5.jpg', '', '', '', '', 'Modern house', '60,000', 'Kera', 3, 1, 94, 1, 0, 2.5, 0, 1, '2024-06-24', 1),
(32, 'h13.jpg', 'h13.jpg', '', '', '', '', 'Urgent house for sale', '40,000', 'Jemo', 5, 3, 94, 1, 0, 2, 1, 1, '2024-06-24', 2),
(33, 'h17.jpg', 'h17.jpg', '', '', '', '', 'Villa', '56,000', 'Merkato', 3, 2, 250, 1, 0, 0, 0, 1, '2024-06-24', 2),
(34, 'h6.jpg', 'h6.jpg', '', '', '', '', 'Two story house', '60,000', 'Summit', 5, 2, 150, 1, 0, 0, 0, 1, '2024-06-24', 2),
(35, 'h18.webp', 'h18.webp', '', '', '', '', 'Country side compound', '100', 'country side', 4, 3, 150, 1, 0, 0, 0, 1, '2024-06-24', 2),
(36, 'h3.webp', 'h3.webp', '', '', '', '', 'Dark color house', '50,000', 'Alem gena', 6, 3, 140, 1, 0, 0, 0, 1, '2024-06-24', 2),
(38, 'h15.jpg', 'h15.jpg', '', '', '', '', 'House from the coldes', '55,000', '22 mazoria', 5, 2, 120, 1, 0, 0, 0, 1, '2024-06-24', 3),
(39, 'h2.webp', 'h2.webp', '', '', '', '', 'Finished duplex', '80,000', 'Bole', 5, 2, 220, 1, 0, 0, 0, 1, '2024-06-24', 3),
(40, 'h1.webp', 'h1.webp', '', '', '', '', 'Lake side residential', '40,000', 'Ayat', 4, 2, 120, 1, 0, 2.5, 1, 1, '2024-06-24', 3),
(41, 'h14.jpg', 'h14.jpg', '', '', '', '', 'Modern two story house', '96,000', 'Megnaga', 7, 5, 150, 1, 0, 0, 0, 1, '2024-06-24', 3),
(42, 'h8.jpeg', 'h8.jpeg', '', '', '', '', 'Big House', '78,000', 'Betel', 5, 3, 110, 1, 0, 0, 0, 1, '2024-06-24', 3),
(44, 'h10.jpg', 'h10.jpg', '', '', '', '', 'Mansion', '99,000', 'Bole', 7, 15, 150, 1, 0, 0, 0, 1, '2024-06-24', 4),
(46, 'h19.jpg', 'h19.jpg', 'h20.png', '', '', '', 'Modern house', '100', 'Kera', 5, 3, 150, 1, 0, 5, 9, 1, '2024-06-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_comment_table`
--

CREATE TABLE `post_comment_table` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `to_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_like_table`
--

CREATE TABLE `post_like_table` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `liked` tinyint(1) NOT NULL,
  `to_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `video_title` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `number_of_likes` int(10) NOT NULL,
  `number_of_comments` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`post_id`, `user_id`, `video_title`, `video`, `number_of_likes`, `number_of_comments`) VALUES
(9, 2, 'House for sale at ayat', 'ethiohomes_promotion_video.mp4', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_table`
--

CREATE TABLE `subscriber_table` (
  `subscriber_id` int(10) NOT NULL,
  `subscriber_email` varchar(100) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table`
--

CREATE TABLE `transaction_table` (
  `id` int(10) NOT NULL,
  `house_id` int(10) NOT NULL,
  `house_price` int(10) NOT NULL,
  `saler_user_id` int(10) NOT NULL,
  `buyer_user_id` int(10) NOT NULL,
  `tx_ref` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_report_table`
--

CREATE TABLE `user_report_table` (
  `id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `report_reason` varchar(100) NOT NULL,
  `to_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(10) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_phone` int(10) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_national_id` int(20) NOT NULL,
  `user_chapa_api_key` varchar(100) NOT NULL,
  `user_online` tinyint(1) NOT NULL,
  `house_sold` int(10) NOT NULL,
  `house_rented` int(10) NOT NULL,
  `house_bought` int(10) NOT NULL,
  `house_rented_from_others` int(10) NOT NULL,
  `total_sales` int(10) NOT NULL,
  `total_expense` int(10) NOT NULL,
  `user_report` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_image`, `first_name`, `last_name`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_address`, `user_national_id`, `user_chapa_api_key`, `user_online`, `house_sold`, `house_rented`, `house_bought`, `house_rented_from_others`, `total_sales`, `total_expense`, `user_report`, `date`) VALUES
(1, 'pp2.jpg', 'Abebe', 'Kebede', 'Eyasu', 'nebil@gmail.com', 'eyasu12345', 908653456, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 2147483647, 'chapa-12345', 1, 0, 0, 0, 0, 0, 0, 0, '2024-06-04'),
(2, 'pp8.jpg', 'Ali', 'Seid', 'Ali Seid', 'aliseid@gmail.com', 'ali12345', 987841234, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 987165437, 'chapa-75675', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-03'),
(3, 'pp3.jpg', 'Ekram', 'Nurahmed', 'Ekram', 'ekramnurahmed@gmsil.com', 'ekram12345', 923678543, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 456732185, 'chapa-68796', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-17'),
(4, 'pp4.webp', 'Hanah', 'Girma', 'Hanah Girma', 'hanahteshome@gmail.com', 'hanah12345', 987654321, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 746519834, 'chapa-78654', 1, 10, 4, 5, 1, 5000000, 1000000, 5, '2024-06-30'),
(5, 'pp5.webp', 'Belay', 'Kebede', 'Belay Kebede', 'belaykebede@gmail.com', 'belay12345', 934765812, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 567183478, 'chapa-56732', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-14'),
(6, 'pp6.jpeg', 'Saron', 'Alemu', 'Saron Alemu', 'saronalemu@gmail.com', 'saron12345', 956784194, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 842749736, 'chapa-45395', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-24'),
(7, 'pp7.jpg', 'Nahom', 'Abebe', 'Nahom Abebe', 'nahomabebe@gmail.com', 'nahom12345', 967326825, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 843487179, 'chapa19453', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-19'),
(8, 'pp2.jpg', 'Kidist', 'Melese', 'Kidist Melese', 'kidistmelese@gmail.com', 'kidist12345', 978342674, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 561845673, 'chapa-82916', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-17'),
(9, 'pp9.webp', 'Biruk', 'Girum', 'Biruk Girum', 'birukgirum@gmail.com', 'biruk12345', 927641849, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 194373854, 'chapa-47383', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-20'),
(10, 'pp10.jpg', 'Abel', 'Mola', 'Abel Mola', 'yosephzelelew@gmail.com', 'yoseph12345', 912895645, 'Longtiude: 38.7439 and Latitude: 9.026 , Addis Ababa , AA , Ethiopia', 385631764, 'chapa-54839', 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_table`
--
ALTER TABLE `chat_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `house_rating_table`
--
ALTER TABLE `house_rating_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `from_user_id` (`from_user_id`);

--
-- Indexes for table `house_review`
--
ALTER TABLE `house_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `house_table`
--
ALTER TABLE `house_table`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_comment_table`
--
ALTER TABLE `post_comment_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `post_like_table`
--
ALTER TABLE `post_like_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscriber_table`
--
ALTER TABLE `subscriber_table`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD UNIQUE KEY `subscriber_email` (`subscriber_email`),
  ADD KEY `subscriber_id` (`subscriber_id`);

--
-- Indexes for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `house_id` (`house_id`),
  ADD KEY `house_id_2` (`house_id`),
  ADD KEY `saler_user_id` (`saler_user_id`),
  ADD KEY `buyer_user_id` (`buyer_user_id`);

--
-- Indexes for table `user_report_table`
--
ALTER TABLE `user_report_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD UNIQUE KEY `user_national_id` (`user_national_id`),
  ADD UNIQUE KEY `user_chapa_api_key` (`user_chapa_api_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_table`
--
ALTER TABLE `chat_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `house_rating_table`
--
ALTER TABLE `house_rating_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `house_review`
--
ALTER TABLE `house_review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `house_table`
--
ALTER TABLE `house_table`
  MODIFY `house_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `post_comment_table`
--
ALTER TABLE `post_comment_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_like_table`
--
ALTER TABLE `post_like_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscriber_table`
--
ALTER TABLE `subscriber_table`
  MODIFY `subscriber_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `user_report_table`
--
ALTER TABLE `user_report_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_table`
--
ALTER TABLE `chat_table`
  ADD CONSTRAINT `chat_table_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_table_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house_rating_table`
--
ALTER TABLE `house_rating_table`
  ADD CONSTRAINT `house_rating_table_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `house_table` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_rating_table_ibfk_2` FOREIGN KEY (`from_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house_review`
--
ALTER TABLE `house_review`
  ADD CONSTRAINT `house_review_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `house_table` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_review_ibfk_2` FOREIGN KEY (`from_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_review_ibfk_3` FOREIGN KEY (`to_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house_table`
--
ALTER TABLE `house_table`
  ADD CONSTRAINT `house_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_comment_table`
--
ALTER TABLE `post_comment_table`
  ADD CONSTRAINT `post_comment_table_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_table` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comment_table_ibfk_2` FOREIGN KEY (`from_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comment_table_ibfk_3` FOREIGN KEY (`to_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_like_table`
--
ALTER TABLE `post_like_table`
  ADD CONSTRAINT `post_like_table_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_like_table_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_like_table_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post_table` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_table`
--
ALTER TABLE `post_table`
  ADD CONSTRAINT `post_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriber_table`
--
ALTER TABLE `subscriber_table`
  ADD CONSTRAINT `subscriber_table_ibfk_1` FOREIGN KEY (`subscriber_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_report_table`
--
ALTER TABLE `user_report_table`
  ADD CONSTRAINT `user_report_table_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_report_table_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
