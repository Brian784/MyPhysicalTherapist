-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 11:52 AM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u738774436_mypt`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(20) UNSIGNED NOT NULL,
  `User_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_Time` time NOT NULL,
  `Location` text COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_ID`, `User_ID`, `Therapist_ID`, `Appointment_Date`, `Appointment_Time`, `Location`, `isApproved`) VALUES
(1, 500000002, 1, '2018-06-07', '06:00:00', 'H.V Dela Costa, Makati City', 1),
(2, 500000000, 2, '2018-06-01', '06:00:00', 'Quezon City, Metro Manila', 1),
(3, 500000002, 3, '2018-06-13', '09:12:00', 'Pasay, Metro Manila', 0),
(4, 500000003, 5, '2018-07-06', '04:30:00', 'Makati, Kalakhang Maynila', 1),
(5, 500000000, 6, '2018-06-06', '02:34:00', 'Manila, Metro Manila', 1);

-- --------------------------------------------------------

--
-- Table structure for table `arcticle_comments`
--

CREATE TABLE `arcticle_comments` (
  `Article_Comment_ID` int(20) UNSIGNED NOT NULL,
  `Account_ID` int(20) UNSIGNED NOT NULL,
  `Article_ID` int(10) UNSIGNED NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `arcticle_comments`
--

INSERT INTO `arcticle_comments` (`Article_Comment_ID`, `Account_ID`, `Article_ID`, `Time_Stamp`, `Comment`, `isApproved`) VALUES
(1, 500000001, 3, '2018-05-28 08:14:40', 'Wow, this is such a helpful article!', 1),
(2, 500000002, 5, '2018-05-28 08:14:44', 'Interesting!', 1),
(3, 500000003, 2, '2018-05-28 08:14:48', 'Thank you for giving this information!', 1),
(4, 500000004, 2, '2018-05-28 08:14:51', 'I really liked this article. Also, would like to clarify how about this certain topic? how long does it take for a sprain to heal?. Thank you!', 0),
(10, 500000000, 5, '2018-06-01 06:55:30', ':) thank you', 1),
(11, 500000000, 5, '2018-06-01 06:57:41', ':) tnx', 1),
(12, 500000000, 5, '2018-06-01 07:00:50', 'aasdsa', 1),
(13, 500000000, 5, '2018-06-01 07:01:42', 'aasdsa', 1),
(14, 500000000, 5, '2018-06-01 07:20:36', ':)', 1),
(15, 1, 5, '2018-06-01 07:27:44', 'XD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_ID` int(10) UNSIGNED NOT NULL,
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Article_Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Article` text COLLATE utf8_unicode_ci NOT NULL,
  `TimePublished` datetime NOT NULL DEFAULT current_timestamp(),
  `Article_Picture` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_ID`, `Therapist_ID`, `Article_Title`, `Article`, `TimePublished`, `Article_Picture`) VALUES
(1, '1', 'The Seven Most Common Sports Injuries', '\r\n\r\nAfter a sedentary work week, end-zone catches and 36-hole weekends can take their toll in common sports injuries. The seven most common sports injuries are:\r\n\r\n    Ankle sprain\r\n    Groin pull\r\n    Hamstring strain\r\n    Shin splints\r\n    Knee injury: ACL tear\r\n    Knee injury: Patellofemoral syndrome — injury resulting from the repetitive movement of your kneecap against your thigh bone\r\n    Tennis elbow (epicondylitis)\r\n\r\n\r\nTo see how to prevent and treat these common sports injuries — and to learn when it\'s time to look further than your medicine cabinet to treat sports injuries— read on.\r\nThe most common sports injuries are strains and sprains\r\n\r\n\r\n\r\nSprains are injuries to ligaments, the tough bands connecting bones in a joint. Suddenly stretching ligaments past their limits deforms or tears them. Strains are injuries to muscle fibers or tendons, which anchor muscles to bones. Strains are called “pulled muscles” for a reason: Over-stretching or overusing a muscle causes tears in the muscle fibers or tendons.\r\n\r\n\r\n“Think of ligaments and muscle-tendon units like springs,” says William Roberts, MD, sports medicine physician at the University of Minnesota and spokesman for the American College of Sports Medicine. “The tissue lengthens with stress and returns to its normal length — unless it is pulled too far out of its normal range.”', '2018-05-08 00:00:00', 'article2.png'),
(5, '1', 'Common Physiotherapy Treatment Techniques', '<p>&nbsp; &nbsp; Physiotherapy Treatment Techniques physiotherapy brisbane There are well over 20 different treatment approaches commonly used by your physiotherapist. Hands-on Physiotherapy Techniques Your physiotherapist may be trained in hands-on physiotherapy techniques such as: Joint mobilisation (gentle gliding) techniques, Joint manipulation, Physiotherapy Instrument Mobilisation (PIM). Minimal Energy Techniques (METs), Muscle stretching, Neurodynamics, Massage and soft tissue techniques In fact, your physiotherapist has training that includes techniques used by most hands-on professions such as chiropractors, osteopaths, massage therapists, and kinesiologists.&nbsp;</p><p>&nbsp; &nbsp; Physiotherapy Taping Your physiotherapist is a highly skilled professional who utilises strapping and taping techniques to prevent injuries. Some physiotherapists are also skilled in the use of kinesiology taping. Acupuncture and Dry Needling Many physiotherapists have acquired additional training in the field of acupuncture and dry needling to assist pain relief and muscle function. Physiotherapy Exercises Physiotherapists have been trained in the use of exercise therapy to strengthen your muscles and improve your function. Physiotherapy exercises have been scientifically proven to be one of the most effective ways that you can solve or prevent pain and injury.&nbsp;</p><p>&nbsp; &nbsp; Your physiotherapist is an expert in the prescription of the \"best exercises\" for you and the most appropriate \"exercise dose\" for you depending on your rehabilitation status. Your physiotherapist will incorporate essential components of pilates, yoga and exercise physiology to provide you with the best result. They may even use Real-Time Ultrasound Physiotherapy so that you can watch your muscles contract on a screen as you correctly retrain them. Biomechanical Analysis Biomechanical assessment, observation and diagnostic skills are paramount to the best treatment. Your physiotherapist is a highly skilled health professional with superb diagnostic skills to detect and ultimately avoid musculoskeletal and sports injuries. Poor technique or posture is one of the most common sources of repeat injury.&nbsp;</p><p>&nbsp; &nbsp; Sports Physiotherapy Sports physio requires an extra level of knowledge and physiotherapy skill to assist injury recovery, prevent injury and improve performance. For the best advice, consult a Sports Physiotherapist. Workplace Physiotherapy Not only can your physiotherapist assist you at sport, they can also assist you at work. Ergonomics looks at the best postures and workstation set up for your body at work. Whether it be lifting technique improvement, education programs or workstation setups, your physiotherapist can help you.</p>', '2018-05-16 00:00:00', 'article5.png');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_account`
--

CREATE TABLE `therapist_account` (
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `License_Id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `isValidated` tinyint(1) NOT NULL,
  `License_Type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Profile_Picture` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `therapist_account`
--

INSERT INTO `therapist_account` (`Therapist_ID`, `Email`, `Password`, `First_Name`, `Last_Name`, `License_Id`, `isValidated`, `License_Type`, `Profile_Picture`, `Contact_Number`, `Description`) VALUES
(1, 'rod.brouhard@gmail.com', '123454', 'Rod', 'Brouhard', '122346', 1, 'Paramedic', '1.png', '092826273', 'Rod Brouhard is a paramedic, journalist, researcher, educator and advocate for emergency medical service providers and patients. He started as a volunteer firefighter in 1987 and fell in love with emergency medical services. Rod\'s been viewing life through the flashing glow of emergency lights ever since. Today, Rod leads a team of dedicated EMS professionals in San Francisco, California.'),
(2, 'kellymaura1@gmail.com', 'spraintrain', 'Maura', 'Kelly', '123', 1, 'Therapist', '2.jpg', '8976654', 'A well known therapist'),
(3, 'omar.khalid@gmail.com', '987654', 'Omar', 'Khalid', '5678', 1, 'Surgeon', '3.png', '098734562', 'Im a surgeon who knows about physiotherapy.'),
(4, 'john.miller@gmail.com', '0987654edfg 	', 'John', 'Miller', '3456', 1, 'Therapist', '4.png', '0987653793', 'John Miller is a clinical physiotherapist with almost 30 years experience in sports injury and musculoskeletal management.\r\n\r\nJohn graduated as a physiotherapist from the University of Queensland in 1988. He has worked locally and abroad gaining hospital and private practice experience. During his time in the UK, he was a Senior Physiotherapist at The Royal London Hospital Musculoskeletal and Sports Injury Unit.\r\n\r\nHe was appointed as a Physiotherapist for the 2018 Commonwealth Games supporting the Athletics, Beach Volleyball, Cycling, Hockey, Triathlon, Para-triathlon, Marathon and Para-marathon programs.'),
(5, 'jeremy.duvall@gmail.com', 'dkadkal', 'Jeremey', 'Duvall', '324567', 1, 'Therapist', '5.png', '0987634562', 'Jeremey is a personal trainer and fitness writer based out of the outdoor mecca of Boulder, Colorado. When he’s not helping to inform, inspire, and educate others through writing, he’s usually covering the mountains either by foot, two wheels, or skis. He’s known for having a strong love for coffee and cooking - sometimes combining the two.'),
(6, 'DocsHaveMercy@ypmail.com', 'infinity', 'Doc', 'Mercy', '555', 1, 'Surgeon', '6.png', '921221', 'A skilled doctor with his own technique'),
(7, 'mathew.hoffman@gmail.com', '12345', 'Matthew', 'Hoffman', '12345', 1, 'Therapist', '0.png', '0908932324', 'The Physiotherapy Board has today launched the first-ever comprehensive set of standards for the profession in New Zealand.');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_saved_videos`
--

CREATE TABLE `therapist_saved_videos` (
  `Record_ID` int(11) UNSIGNED NOT NULL,
  `Video_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Time_Saved` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `therapist_saved_videos`
--

INSERT INTO `therapist_saved_videos` (`Record_ID`, `Video_ID`, `Therapist_ID`, `Time_Saved`) VALUES
(4, 7, 1, '2018-05-31 19:27:03'),
(6, 5, 3, '2018-06-01 12:39:42'),
(9, 7, 3, '2018-06-01 16:03:33'),
(10, 8, 3, '2018-06-01 23:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_schedule`
--

CREATE TABLE `therapist_schedule` (
  `Schedule_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Working_Day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Hospital_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `therapist_schedule`
--

INSERT INTO `therapist_schedule` (`Schedule_ID`, `Therapist_ID`, `Working_Day`, `Start_Time`, `End_Time`, `Hospital_Name`) VALUES
(2, 0, 'Monday', '06:00:00', '12:20:00', 'Bondoc Peninsula District Hospital'),
(3, 3, 'Friday', '04:00:00', '14:00:00', 'Cebu City Medical Center'),
(4, 2, 'Thursday', '10:34:13', '03:00:00', 'Balamban District Hospital'),
(5, 2, 'Wednesday', '05:00:00', '12:00:00', 'Badian District Hospital '),
(6, 1, 'Monday', '12:00:00', '05:00:00', 'Dumdum Medical Clinic');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `User_ID` int(20) UNSIGNED NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Profile_Picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Age` tinyint(3) UNSIGNED NOT NULL,
  `Gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`User_ID`, `Email`, `Password`, `First_Name`, `Last_Name`, `Profile_Picture`, `Contact_Number`, `Age`, `Gender`) VALUES
(500000000, 'martin.jackson123@gmail.com', 'ownjdewba', 'Martin', 'Jackson', '500000000.jpg', '0936276183', 34, 'M'),
(500000001, 'ironman@yahoo.com', 'abc123', 'Tony', 'Stark', '500000001.jpg', '09213781263', 45, 'M'),
(500000002, 'brianxu784@Gmail.com', 'Havanaunana', 'Ryan', 'Reynolds', '500000006.jpg', '09152016010', 21, 'M'),
(500000003, 'jamesraynor@gmail.com', 'marine', 'James', 'Raynor', 'default.jpg', '0998 888 9432', 40, 'M'),
(500000004, 'amera.ayman@gmail.com', 'hduwomsa', 'Amera', 'Ibrahim', '500000004.jpg', '0987654352', 18, 'F'),
(500000005, 'sarah.james@gmail.com', 'oijaewhsfs', 'Sarah', 'James', '500000005.jpg', '09874526223', 30, 'F'),
(500000006, 'coco.loco@gmail.com', 'dajsdeosdfad245543', 'Coco', 'Loco', '500000002.jpg', '0987345623', 23, 'M'),
(500000007, 'alaa.elrawi@gmail.com', 'asojdwqnd312jnda', 'Alaa', 'Elrawi', '500000007.jpg', '09845672324', 26, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `user_saved_videos`
--

CREATE TABLE `user_saved_videos` (
  `Record_ID` int(20) UNSIGNED NOT NULL,
  `Video_ID` int(20) UNSIGNED NOT NULL,
  `User_ID` int(20) UNSIGNED NOT NULL,
  `Time_Saved` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_saved_videos`
--

INSERT INTO `user_saved_videos` (`Record_ID`, `Video_ID`, `User_ID`, `Time_Saved`) VALUES
(2, 7, 500000000, '2018-06-01 16:02:30'),
(3, 8, 0, '2018-06-01 22:59:42'),
(4, 8, 0, '2018-06-01 23:00:00'),
(6, 6, 500000002, '2018-06-02 01:12:06'),
(7, 7, 500000002, '2018-06-02 02:15:48'),
(8, 3, 500000000, '2018-06-02 08:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `Video_Comment_ID` int(10) UNSIGNED NOT NULL,
  `Account_ID` int(20) UNSIGNED NOT NULL,
  `Video_ID` int(20) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApprove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_comments`
--

INSERT INTO `video_comments` (`Video_Comment_ID`, `Account_ID`, `Video_ID`, `Time_Stamp`, `Comment`, `isApprove`) VALUES
(1, 500000000, 4, '2018-05-28 08:13:07', 'It\'s a very helpful video', 1),
(3, 3, 4, '2018-05-28 08:17:23', 'what a nice video', 1),
(5, 500000004, 4, '2018-05-28 08:13:23', 'I like the way that you explain', 1),
(8, 500000006, 4, '2018-05-28 08:13:39', 'WATCH NOW!', 1),
(12, 500000007, 3, '2018-05-28 08:13:35', 'Why so serious?', 1),
(14, 500000001, 4, '2018-05-28 08:13:11', 'Hi tony! ', 1),
(19, 500000003, 7, '2018-05-28 08:13:19', ':) Nice video', 1),
(20, 4, 6, '2018-05-28 11:06:34', 'I learned a lot', 1),
(21, 500000000, 7, '2018-05-29 16:18:19', 'She is so beautiful', 1),
(22, 500000000, 7, '2018-05-31 19:03:05', ':)', 1),
(23, 500000000, 7, '2018-05-31 19:08:34', ':) Give me your number', 1),
(24, 1, 7, '2018-05-31 19:13:40', 'No she is mine!', 1),
(25, 500000000, 7, '2018-05-31 19:18:56', 'get away!', 1),
(26, 500000000, 7, '2018-05-31 19:19:27', ':<', 1),
(27, 1, 7, '2018-05-31 19:26:41', 'she is my dauther', 1),
(28, 500000002, 8, '2018-06-01 23:02:14', ':)', 1),
(29, 500000000, 7, '2018-06-02 08:16:28', 'hello:>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_library`
--

CREATE TABLE `video_library` (
  `Video_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
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
(3, 2, 'Instant Headache Relief in Seconds with Self Massage Technique', 'The majority of all headaches are tension related headaches. The blockage of blood circulation along with contraction/shortening of muscles is what causes this condition. This simple technique can take away most tension related headaches in seconds.', '3.mp4', 'upper', '2018-05-15 03:00:00'),
(4, 3, 'Amazing Technique for Upper Neck Pain - MUST WATCH!', ':) Guys try this out', '4.mp4', 'upper', '2018-05-16 05:17:00'),
(5, 1, 'Plica syndrome: Signs, symptoms and treatment of this uncomfortable knee pain', 'Please note: I don\'t respond to questions and requests for specific medical advice left in the comments to my videos. I receive too many to keep up (several hundred per week), and legally I can\'t offer specific medical advice to people who aren\'t my patients (see below). If you want to ask a question about a specific injury you have, leave it in the comments below, and I might answer it in an upcoming Ask Dr. Geier video. If you need more detailed information on your injury, go to my Resources page: https://www.drdavidgeier.com/resources/', '5.mp4', 'lower', '2018-05-16 00:18:31'),
(6, 4, 'Best Ankle Rehabilitation Exercises For Those Recovering From Ankle Injury', 'As someone who has engaged in exercise and athletic activity for most of my life, I\'ve put quite a few miles on my feet. I\'m sure I\'m not alone when saying that decades of pounding and abuse have added up to more than a few ankle injuries. The same mantra I\'m given by doctors and physical therapists is \'make sure you continue to do your exercises.’', '6.mp4', 'lower', '2018-05-25 08:00:19'),
(7, 5, 'Top 5 Wrist Pain Relief Tips', 'Sponsored Content: Have a wrist injury or pain from arthritis, carpal tunnel syndrome, sprains, or overuse injuries? Here are some ways to help relieve the pain. Use code DOCTORJOX to get $30.50 OFF the Thermotex Platinum + FREE shipping at https://www.thermotex.com/us/product/... Here are my top five ways to relieve wrist pain. The first stretch is for your wrist flexors and extensors. Start off with your arm straight out in front of you. Bring your wrists upward to stretch your wrist flexors. If you need more of a stretch, push up with the other hand. Now bring your wrists downward or into flexion to stretch the wrist extensors. Hold each stretch for 30 seconds and do them three times each. The second way to relieve pain is to use Far Infrared Heat. Far infrared heats the area with light vs. actual heat, so it can penetrate deeper into the area. A traditional heating pad usually only heats about 0.25 cm, but far infrared can go up to 6 cm, or 2.36 inches. It helps increase the circulation to the area to provide temporary relief. ', '7.mp4', 'upper', '2018-05-16 00:00:00'),
(8, 1, 'how to ease headache', '<p>:)</p>', '8.mp4', 'upper', '2018-06-02 08:27:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`);

--
-- Indexes for table `arcticle_comments`
--
ALTER TABLE `arcticle_comments`
  ADD PRIMARY KEY (`Article_Comment_ID`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`);

--
-- Indexes for table `therapist_account`
--
ALTER TABLE `therapist_account`
  ADD PRIMARY KEY (`Therapist_ID`);

--
-- Indexes for table `therapist_saved_videos`
--
ALTER TABLE `therapist_saved_videos`
  ADD PRIMARY KEY (`Record_ID`);

--
-- Indexes for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  ADD PRIMARY KEY (`Schedule_ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_saved_videos`
--
ALTER TABLE `user_saved_videos`
  ADD PRIMARY KEY (`Record_ID`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`Video_Comment_ID`);

--
-- Indexes for table `video_library`
--
ALTER TABLE `video_library`
  ADD PRIMARY KEY (`Video_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `arcticle_comments`
--
ALTER TABLE `arcticle_comments`
  MODIFY `Article_Comment_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `therapist_account`
--
ALTER TABLE `therapist_account`
  MODIFY `Therapist_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500000008;

--
-- AUTO_INCREMENT for table `therapist_saved_videos`
--
ALTER TABLE `therapist_saved_videos`
  MODIFY `Record_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  MODIFY `Schedule_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `User_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500000008;

--
-- AUTO_INCREMENT for table `user_saved_videos`
--
ALTER TABLE `user_saved_videos`
  MODIFY `Record_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `Video_Comment_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `video_library`
--
ALTER TABLE `video_library`
  MODIFY `Video_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
