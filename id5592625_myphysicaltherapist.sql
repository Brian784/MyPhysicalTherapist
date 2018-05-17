-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2018 at 04:01 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5592625_myphysicaltherapist`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(20) NOT NULL,
  `User_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_Time` time NOT NULL,
  `Location` text COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arcticle_comments`
--

CREATE TABLE `arcticle_comments` (
  `Article_Comment_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Account_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Article_ID` int(10) UNSIGNED NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_ID` int(10) UNSIGNED NOT NULL,
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Article_Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Article` text COLLATE utf8_unicode_ci NOT NULL,
  `TimePublished` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_videos`
--

CREATE TABLE `saved_videos` (
  `Video_ID` int(20) NOT NULL,
  `User_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Time_Saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapist_account`
--

CREATE TABLE `therapist_account` (
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `License_Id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `isValidated` tinyint(1) NOT NULL,
  `License_Type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Profile_Picture` longblob NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `therapist_account`
--

INSERT INTO `therapist_account` (`Therapist_ID`, `Password`, `First_Name`, `Last_Name`, `License_Id`, `isValidated`, `License_Type`, `Profile_Picture`, `Contact_Number`, `Email`, `Description`) VALUES
('1', 'spraintrain', 'Maura', 'Kelly', '123', 1, 'therapist', 0x74686572617069737470696374757265, '8976654', 'kellymaura1@gmail.com', 'A well known therapist'),
('777', 'infinity', 'Doc', 'Mercy', '555', 1, 'Surgeon', 0x616e6f746865722070696374757265, '921221', 'DocsHaveMercy@ypmail.com', 'A skilled doctor with his own technique'),
('892', 'timestone', 'Doctor', 'Strange', '8722', 1, 'Doctor', 0x612070696374757265, '9021122', 'DocStrange78@gmail.com', 'Keeper and protector of the time stone.');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_schedule`
--

CREATE TABLE `therapist_schedule` (
  `Schedule_ID` int(20) NOT NULL,
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Working_Day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Hospital_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `User_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Profile_Picture` longblob NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Age` tinyint(3) UNSIGNED NOT NULL,
  `Gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`User_ID`, `Password`, `First_Name`, `Last_Name`, `Profile_Picture`, `Email`, `Contact_Number`, `Age`, `Gender`) VALUES
('1', 'Havanaunana', 'Ryan', 'Connor', '', 'brianxu784@Gmail.com', '09152016010', 21, 'M'),
('111', 'abc123', 'Tony', 'Stark', 0x612070696374757265, 'ironman@yahoo.com', '87000', 45, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `Video_Comment_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Account_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Video_ID` int(20) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApprove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_library`
--

CREATE TABLE `video_library` (
  `Video_ID` int(20) NOT NULL,
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Video_Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Video_Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Video_URL` text COLLATE utf8_unicode_ci NOT NULL,
  `Body_Part` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TimePublished` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_library`
--

INSERT INTO `video_library` (`Video_ID`, `Therapist_ID`, `Video_Title`, `Video_Description`, `Video_URL`, `Body_Part`, `TimePublished`) VALUES
(3, '892', 'Sprain, Quick Relief', 'A quick tutorial on how to relieve spran pain.', 'www.youtube.com', 'feet', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Therapist_ID` (`Therapist_ID`);

--
-- Indexes for table `arcticle_comments`
--
ALTER TABLE `arcticle_comments`
  ADD PRIMARY KEY (`Article_Comment_ID`),
  ADD KEY `Account_ID` (`Account_ID`),
  ADD KEY `Article_ID` (`Article_ID`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`),
  ADD KEY `Therapist_ID` (`Therapist_ID`);

--
-- Indexes for table `saved_videos`
--
ALTER TABLE `saved_videos`
  ADD PRIMARY KEY (`Video_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `therapist_account`
--
ALTER TABLE `therapist_account`
  ADD PRIMARY KEY (`Therapist_ID`),
  ADD KEY `Therapist_ID` (`Therapist_ID`);

--
-- Indexes for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  ADD PRIMARY KEY (`Schedule_ID`),
  ADD KEY `Therapist_ID` (`Therapist_ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`Video_Comment_ID`),
  ADD KEY `Account_ID` (`Account_ID`),
  ADD KEY `Video_ID` (`Video_ID`);

--
-- Indexes for table `video_library`
--
ALTER TABLE `video_library`
  ADD PRIMARY KEY (`Video_ID`),
  ADD KEY `Therapist_ID` (`Therapist_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_videos`
--
ALTER TABLE `saved_videos`
  MODIFY `Video_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  MODIFY `Schedule_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_library`
--
ALTER TABLE `video_library`
  MODIFY `Video_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `Therapist_ID_Appointments` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapist_account` (`Therapist_ID`),
  ADD CONSTRAINT `User_ID_Appointments` FOREIGN KEY (`User_ID`) REFERENCES `user_account` (`User_ID`);

--
-- Constraints for table `arcticle_comments`
--
ALTER TABLE `arcticle_comments`
  ADD CONSTRAINT `Account_ID_Therapist` FOREIGN KEY (`Account_ID`) REFERENCES `therapist_account` (`Therapist_ID`),
  ADD CONSTRAINT `Account_ID_User` FOREIGN KEY (`Account_ID`) REFERENCES `user_account` (`User_ID`),
  ADD CONSTRAINT `Article_ID_Comments` FOREIGN KEY (`Article_ID`) REFERENCES `article` (`Article_ID`);

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `Therapist_ID_Article` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapist_account` (`Therapist_ID`);

--
-- Constraints for table `saved_videos`
--
ALTER TABLE `saved_videos`
  ADD CONSTRAINT `User_ID_Saved_Videos` FOREIGN KEY (`User_ID`) REFERENCES `user_account` (`User_ID`);

--
-- Constraints for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  ADD CONSTRAINT `Therapist_ID` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapist_account` (`Therapist_ID`);

--
-- Constraints for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD CONSTRAINT `Account_ID_Video_Comments_Therapist` FOREIGN KEY (`Account_ID`) REFERENCES `therapist_account` (`Therapist_ID`),
  ADD CONSTRAINT `Account_ID_Video_Comments_User` FOREIGN KEY (`Account_ID`) REFERENCES `user_account` (`User_ID`),
  ADD CONSTRAINT `Video_ID_Viceo_Comments` FOREIGN KEY (`Video_ID`) REFERENCES `video_library` (`Video_ID`);

--
-- Constraints for table `video_library`
--
ALTER TABLE `video_library`
  ADD CONSTRAINT `Therapist_ID_Video_Library` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapist_account` (`Therapist_ID`),
  ADD CONSTRAINT `Video_Id_Video_Library` FOREIGN KEY (`Video_ID`) REFERENCES `saved_videos` (`Video_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
