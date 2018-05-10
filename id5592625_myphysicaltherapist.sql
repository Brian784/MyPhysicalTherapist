-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 02:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_ID`, `User_ID`, `Therapist_ID`, `Appointment_Date`, `Appointment_Time`, `Location`, `isApproved`) VALUES
(1, '111', '892', '1000-01-01', '03:14:07', 'Capitol MED, Quezon Avenue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_ID` int(10) UNSIGNED NOT NULL,
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Article_Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Article` text COLLATE utf8_unicode_ci NOT NULL,
  `Comment_Log_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_ID`, `Therapist_ID`, `Article_Title`, `Article`, `Comment_Log_ID`) VALUES
(0, '1', 'When Physical Therapy Can Help', 'It all started with a pothole. I was almost at the end of a four-mile run, focused on finishing and getting on with my day, when suddenly I was tripped up by a large crack in the asphalt and landed hard, smack on my right knee. Even though the knee throbbed for days afterward, I pushed through my usual workout routine, figuring it would get better on its own. Only, it didn\'t.....', 1),
(1, '777', 'Relieving Back Pain', 'When you have back pain, sleeping can be hard. It can be a vicious cycle because when you don\'t get enough sleep, your back pain may feel worse. A poor sleep position can also aggravate back pain. Try lying on your side. Place a pillow between your knees to keep your spine in a neutral position and relieve strain on your back. If you need to sleep on your back, slide a pillow under your knees. Be sure to sleep on a comfortably firm mattress.Woman sitting in chair with laptop1 / 15Back Pain and Your PostureGrandma was right! Slouching is bad for you. And poor posture can make back pain worse, especially if you sit for long periods. Don\'t slump over your keyboard. Sit upright, with your shoulders relaxed and your body supported against the back of your chair. Try putting a pillow or a rolled towel between your lower back and your seat. Keep your feet flat on the floor.Pharmacist discussing pain relief with customer1 / 15Back Pain MedicationThere are two kinds of over-the-counter pain relievers that frequently help with back pain: nonsteroidal anti-inflammatory drugs (NSAIDs) and acetaminophen. Both have some side effects, and some people may not be able to take them. Talk to your doctor before taking pain relievers. And don\'t expect medication alone to solve your pain problem. Studies show you\'ll probably need more than one type of treatment.Doctor writing prescription for woman1 / 15Prescription Back Pain RelieversSome people may need prescription-strength NSAIDs or opioid medications to help with pain. It is important to talk to your doctor or pharmacist if you are taking any other medications -- including over-the-counter medicines -- to avoid overdosing on certain active ingredients. Your doctor may also prescribe muscle relaxants to help ease painful muscle spasms.Close shot of antidepressants1 / 15Antidepressant MedicationsEven if you\'re not depressed, your doctor may prescribe antidepressant medications as part of the treatment for chronic low back pain. It\'s not clear how antidepressants help relieve chronic pain. It is believed that antidepressants\' influence on chemical messengers may affect pain signals in the body.Woman training with physical therapist1 / 15See a Physical TherapistPhysical therapists can teach you how to sit, stand, and move in a way that keeps your spine in proper alignment and alleviates strain on your back. They also can teach you specialized exercises that strengthen the core muscles that support your back. A strong core is one of the best ways to prevent more back pain in the future. Studies show that when you increase your strength, flexibility, and endurance, back pain decreases -- but it takes time.Woman walking across paved patio1 / 15Don\'t Rest an Achy BackDoctors used to prescribe bed rest for back pain. But now we know that lying still is one of the worst things you can do. It can make back pain worse and lead to other complications. Don\'t rest for more than a day or two. It\'s important to get up and slowly start moving again. Exercise has been found to be one of the most effective ways to relieve back pain quickly. Try swimming, walking, or yoga.Woman lying with ice pack on back1 / 15Ice and Heat to Ease Back PainRegular applications of ice to the painful areas on your back may help reduce pain and inflammation from an injury. Try this several times a day for up to 20 minutes each time. Wrap the ice pack in a thin towel to protect your skin. After a few days, switch to heat. Apply a heating pad or warm pack to help relax your muscles and increase blood flowing to the affected area. You also can try warm baths to help with relaxation. To avoid burns and tissue damage, never sleep on a heating pad.Woman having back massage1 / 15Hands-On Therapy for Back PainDoes massage really ease back pain once you leave the table? A recent study found that one weekly massage over a 10 week period improved pain and functioning for people with chronic back pain. Benefits lasted about six months but dwindled after a year. Another hands-on approach is spinal manipulation. Performed by a licensed specialist, this treatment can help relieve structural problems of the spine and restore lost mobility.Woman easing back pain with tens unit1 / 15Nerve Stimulation for Back PainResearch is being conducted on certain treatments that stimulate nerves to reduce chronic back pain. Your doctor may consider adding acupuncture to your treatment plan if you aren\'t finding relief with more conservative care. Another method your doctor might suggest is transcutaneous electrical nerve stimulation (TENS), during which mild electric pulses are delivered to the nerves to block incoming pain signals.Woman in therapy session1 / 15Therapy for Back PainIt may seem strange to see a psychologist for back pain. But studies show that cognitive behavioral therapy is very effective in the short and long term at helping chronic back pain. For example, CBT may target how people with back pain think about physical activity -- and why they may be avoiding it -- to help change the way they respond to being active. People who do CBT have reported significant decreases in pain and disability.Man Undergoing Biofeedback Monitoring1 / 15Back Pain and BiofeedbackBiofeedback uses a special machine that helps you train your brain to control your response to pain. You learn to moderate your breathing, heart rate, blood flow, and muscle tension. Some studies have found that it is better than medication in easing back pain, reducing pain intensity by about 30%. The best part: it has no side effects.Doctor preparing spinal injection1 / 15Spinal Injections for Back PainA doctor may recommend a spinal injection to help reduce your back pain. There are different types of injections that doctors specializing in pain relief may use. For example, an injection of a corticosteroid can help relieve inflammation that is causing the pain. Depending on the kind of injection, your doctor may limit your number of doses per year to avoid possible side effects.Couple discussing spine with doctor1 / 15Back SurgeryIf a bulging disc is putting pressure on a nerve, your surgeon might recommend a discectomy to remove some disc material. Or a laminectomy might be recommended to decompress an area where there is pressure on the nerves or spinal cord. Spinal fusion may be done to help stabilize the spine. Like all surgeries, these carry risks and aren\'t always successful. So they should be options of last resort.Up NextNext Slideshow Title', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment_log`
--

CREATE TABLE `comment_log` (
  `Comment_Log_ID` int(20) NOT NULL,
  `Account_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_log`
--

INSERT INTO `comment_log` (`Comment_Log_ID`, `Account_ID`, `Time_Stamp`, `Comment`, `isApproved`) VALUES
(1, '111', '2018-05-10 10:03:58', 'A very brief and good article.', 1),
(2, '777', '2018-05-10 11:04:03', 'This video is very good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saved_videos`
--

CREATE TABLE `saved_videos` (
  `Video_ID` int(20) NOT NULL,
  `User_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Time_Saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saved_videos`
--

INSERT INTO `saved_videos` (`Video_ID`, `User_ID`, `Time_Saved`) VALUES
(3, '111', '2018-05-21 21:00:21');

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

--
-- Dumping data for table `therapist_schedule`
--

INSERT INTO `therapist_schedule` (`Schedule_ID`, `Therapist_ID`, `Working_Day`, `Start_Time`, `End_Time`, `Hospital_Name`) VALUES
(87, '892', 'M/W/F', '10:34:13', '11:45:23', 'Mercy Hospital');

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
('111', 'abc123', 'Tony', 'Stark', 0x612070696374757265, 'ironMan@yahoo.com', '87000', 45, 'M');

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
  `Comment_Log_ID` int(20) NOT NULL,
  `Body_Part` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_library`
--

INSERT INTO `video_library` (`Video_ID`, `Therapist_ID`, `Video_Title`, `Video_Description`, `Video_URL`, `Comment_Log_ID`, `Body_Part`) VALUES
(3, '892', 'Sprain, Quick Relief', 'A quick tutorial on how to relieve spran pain.', 'www.youtube.com', 2, 'feet');

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
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`),
  ADD KEY `Therapist_ID` (`Therapist_ID`),
  ADD KEY `Comment_Log_ID` (`Comment_Log_ID`);

--
-- Indexes for table `comment_log`
--
ALTER TABLE `comment_log`
  ADD PRIMARY KEY (`Comment_Log_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

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
-- Indexes for table `video_library`
--
ALTER TABLE `video_library`
  ADD PRIMARY KEY (`Video_ID`),
  ADD KEY `Comment_Log_ID` (`Comment_Log_ID`),
  ADD KEY `Therapist_ID` (`Therapist_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment_log`
--
ALTER TABLE `comment_log`
  MODIFY `Comment_Log_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saved_videos`
--
ALTER TABLE `saved_videos`
  MODIFY `Video_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  MODIFY `Schedule_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `Comment_Log_ID_Article` FOREIGN KEY (`Comment_Log_ID`) REFERENCES `comment_log` (`Comment_Log_ID`),
  ADD CONSTRAINT `Therapist_ID_Article` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapist_account` (`Therapist_ID`);

--
-- Constraints for table `saved_videos`
--
ALTER TABLE `saved_videos`
  ADD CONSTRAINT `User_ID` FOREIGN KEY (`User_ID`) REFERENCES `user_account` (`User_ID`);

--
-- Constraints for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  ADD CONSTRAINT `Therapist_ID` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapist_account` (`Therapist_ID`);

--
-- Constraints for table `video_library`
--
ALTER TABLE `video_library`
  ADD CONSTRAINT `Comment_Log_ID_Video_Library` FOREIGN KEY (`Comment_Log_ID`) REFERENCES `comment_log` (`Comment_Log_ID`),
  ADD CONSTRAINT `Therapist_ID_Video_Library` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapist_account` (`Therapist_ID`),
  ADD CONSTRAINT `Video_Id_Video_Library` FOREIGN KEY (`Video_ID`) REFERENCES `saved_videos` (`Video_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
