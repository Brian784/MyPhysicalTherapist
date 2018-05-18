-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2018 at 12:26 PM
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

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_ID`, `Therapist_ID`, `Article_Title`, `Article`, `TimePublished`) VALUES
(1, '777', 'sadsa', 'asdas', '0000-00-00 00:00:00');

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
  `Profile_Picture` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `therapist_account`
--

INSERT INTO `therapist_account` (`Therapist_ID`, `Password`, `First_Name`, `Last_Name`, `License_Id`, `isValidated`, `License_Type`, `Profile_Picture`, `Contact_Number`, `Email`, `Description`) VALUES
('33', 'spraintrain', 'Maura', 'Kelly', '123', 1, 'therapist', 'therapistpicture', '8976654', 'kellymaura1@gmail.com', 'A well known therapist'),
('777', 'infinity', 'Doc', 'Mercy', '555', 1, 'Surgeon', 'another picture', '921221', 'DocsHaveMercy@ypmail.com', 'A skilled doctor with his own technique'),
('892', 'timestone', 'Doctor', 'Strange', '8722', 1, 'Doctor', 'a picture', '9021122', 'DocStrange78@gmail.com', 'Keeper and protector of the time stone.');

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
  `Profile_Picture` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Age` tinyint(3) UNSIGNED NOT NULL,
  `Gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`User_ID`, `Password`, `First_Name`, `Last_Name`, `Profile_Picture`, `Email`, `Contact_Number`, `Age`, `Gender`) VALUES
('1', 'Havanaunana', 'Ryan', 'Reynolds', 'userprofilepictures/1.jpg', 'brianxu784@Gmail.com', '09152016010', 21, 'M'),
('111', 'abc123', 'Tony', 'Stark', 'userprofilepictures/111.jpg', 'ironman@yahoo.com', '87000', 45, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `Video_Comment_ID` int(10) UNSIGNED NOT NULL,
  `Account_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Video_ID` int(20) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApprove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_comments`
--

INSERT INTO `video_comments` (`Video_Comment_ID`, `Account_ID`, `Video_ID`, `Time_Stamp`, `Comment`, `isApprove`) VALUES
(1, '1', 4, '2018-05-09 00:00:00', 'It\'s a very helpful video', 1),
(3, '111', 4, '2018-05-18 11:21:20', 'what a nice video', 1),
(4, '111', 4, '2018-05-18 11:27:45', 'very well explaination', 1),
(5, '111', 4, '2018-05-18 11:29:30', 'I like the way that you explain', 1),
(6, '111', 4, '2018-05-18 12:12:09', 'Hi tony!', 1);

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
  `TimePublished` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_library`
--

INSERT INTO `video_library` (`Video_ID`, `Therapist_ID`, `Video_Title`, `Video_Description`, `Video_URL`, `Body_Part`, `TimePublished`) VALUES
(3, '892', 'Instant Headache Relief in Seconds with Self Massage Technique', 'The majority of all headaches are tension related headaches. The blockage of blood circulation along with contraction/shortening of muscles is what causes this condition. This simple technique can take away most tension related headaches in seconds.', '../therapist/videos/3.mp4', 'upper', '2018-05-15 03:00:00'),
(4, '777', 'Amazing Technique for Upper Neck Pain - MUST WATCH!', ':) Guys try this out', '../therapist/videos/4.mp4', 'upper', '2018-05-16 05:17:00');

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
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `Video_Comment_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video_library`
--
ALTER TABLE `video_library`
  MODIFY `Video_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `Account_ID_User` FOREIGN KEY (`Account_ID`) REFERENCES `user_account` (`User_ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
