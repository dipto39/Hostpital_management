-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2022 at 02:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '6512bd43d9caa6e02c990b0a82652dca', '2022-11-14 11:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `PatientName` varchar(255) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `appstatus` int(11) DEFAULT 0,
  `userStatus` int(11) NOT NULL DEFAULT 0,
  `doctorStatus` int(11) NOT NULL DEFAULT 0,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `sms` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `PatientName`, `gender`, `doctorId`, `userId`, `appointmentDate`, `appointmentTime`, `postingDate`, `appstatus`, `userStatus`, `doctorStatus`, `updationDate`, `sms`) VALUES
(32, 'dipto biswas', NULL, 18, 19, '2022-11-19', NULL, '2022-11-16 08:58:45', 0, 0, 1, '2022-11-17 06:50:25', 'simple fever'),
(33, 'tanmoy halder', NULL, 18, 19, '2022-11-19', NULL, '2022-11-16 09:02:17', 0, 0, 2, '2022-11-17 06:50:39', 'testing'),
(34, 'dipto biswas', NULL, 18, 19, '2022-11-22', NULL, '2022-11-17 07:01:33', 0, 0, 0, NULL, 'fdas'),
(35, 'dipto biswas', NULL, 20, 19, '2022-11-24', NULL, '2022-11-17 09:13:59', 0, 0, 1, '2022-11-17 09:14:17', 'simple fever');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `docnoti`
--

CREATE TABLE `docnoti` (
  `id` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sms` varchar(100) DEFAULT NULL,
  `Ntime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docnoti`
--

INSERT INTO `docnoti` (`id`, `docid`, `userid`, `status`, `sms`, `Ntime`) VALUES
(1, 18, 33, 1, 'Your appointment was canceled by authority', '2022-11-16 15:08:16'),
(2, 18, 33, 1, 'Your appointment was canceled by authority', '2022-11-16 15:08:46'),
(3, 18, 33, 1, 'Your appointment was canceled by authority', '2022-11-16 15:17:21'),
(4, 18, 33, 1, 'Your appointment was canceled by authority', '2022-11-16 15:17:27'),
(5, 18, 33, 1, 'Your appointment was canceled by authority', '2022-11-16 15:27:32'),
(6, 18, 32, 1, 'Your appointment was canceled by authority', '2022-11-17 05:41:09'),
(7, 18, 19, 1, 'Your appointment was confirmed by authority', '2022-11-17 05:57:06'),
(8, 18, 19, 1, 'Your have a New appointment', '2022-11-17 07:01:33'),
(9, 20, 19, 1, 'Your have a New appointment', '2022-11-17 09:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` int(11) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` int(11) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pp` varchar(100) DEFAULT 'demo.jpg',
  `qual` varchar(300) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `pp`, `qual`, `about`, `creationDate`, `updationDate`) VALUES
(18, 1, 'Sojib Bose', 'khulna medical hospital ', 900, 1944975991, 'sojib@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'sojib.jpg', 'MBBS in Dhaka Medical Collage & Hospital', 'Image result for about doctor\r\nA doctor is someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health. A doctor is tasked with interacting with patients, diagnosing medical problems and successfully treating illness or injury.', '2022-11-16 08:56:38', NULL),
(19, 2, 'Jannatul', 'Khulna medical ', 800, 123456789, 'jannatul@gmail.com', '3b712de48137572f3849aabd5666a4e3', 'd3.jpeg', 'MBBS in Dhaka Medical Collage & Hospital', 'A doctor is someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health. A doctor is tasked with interacting with patients, diagnosing medical problems and successfully treating illness or injury.', '2022-11-17 08:11:05', '2022-11-17 08:50:54'),
(20, 3, 'Example 1', 'khlulna', 200, 123456789, 'doctor@email.com', '3b712de48137572f3849aabd5666a4e3', 'd1.jpeg', 'MBBS in Dhaka Medical Collage & Hospital', 'A doctor is someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health. A doctor is tasked with interacting with patients, diagnosing medical problems and successfully treating illness or injury.', '2022-11-17 08:12:56', '2022-11-17 12:57:42'),
(21, 4, 'Example 2', 'khulna', 700, 123456789, 'example2@email.com', '3b712de48137572f3849aabd5666a4e3', 'd2.jpeg', 'MBBS in Dhaka Medical Collage & Hospital', 'A doctor is someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health. A doctor is tasked with interacting with patients, diagnosing medical problems and successfully treating illness or injury.', '2022-11-17 08:15:23', NULL),
(22, 6, 'Example 3', 'khulna', 500, 123456789, 'example3@email.com', '3b712de48137572f3849aabd5666a4e3', 'd4.jpeg', 'MBBS in Dhaka Medical Collage & Hospital', 'A doctor is someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health. A doctor is tasked with interacting with patients, diagnosing medical problems and successfully treating illness or injury.', '2022-11-17 08:17:03', NULL),
(23, 7, 'Example 4', 'khulna', 400, 12345678, 'example4@email.com', '3b712de48137572f3849aabd5666a4e3', 'd5.jpeg', 'MBBS in Dhaka Medical Collage & Hospital', 'A doctor is someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health. A doctor is tasked with interacting with patients, diagnosing medical problems and successfully treating illness or injury.', '2022-11-17 08:19:20', NULL),
(24, 12, 'Example 5', 'khulna', 1200, 2345678908, 'example5@email.com', '3b712de48137572f3849aabd5666a4e3', 'd6.jpeg', 'MBBS in Dhaka Medical Collage & Hospital', 'A doctor is someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health. A doctor is tasked with interacting with patients, diagnosing medical problems and successfully treating illness or injury.', '2022-11-17 08:20:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(53, NULL, 'sojib@gmial.com', 0x3a3a3100000000000000000000000000, '2022-11-16 09:05:00', NULL, 0),
(54, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 09:05:52', NULL, 0),
(55, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 09:06:10', NULL, 0),
(56, 18, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 09:06:17', NULL, 1),
(57, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 15:31:43', NULL, 0),
(58, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 15:31:57', NULL, 0),
(59, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 15:32:09', NULL, 0),
(60, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 15:32:47', NULL, 0),
(61, 18, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 15:33:46', NULL, 1),
(62, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 17:59:07', NULL, 0),
(63, NULL, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 17:59:13', NULL, 0),
(64, 18, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 17:59:25', NULL, 1),
(65, 18, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-16 17:59:56', NULL, 1),
(66, 18, 'sojib@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-17 05:25:24', NULL, 1),
(67, NULL, 'example1@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-17 08:50:24', NULL, 0),
(68, 20, 'email@email.com', 0x3a3a3100000000000000000000000000, '2022-11-17 08:52:38', NULL, 1),
(69, 20, 'email@email.com', 0x3a3a3100000000000000000000000000, '2022-11-17 09:12:18', NULL, 1),
(70, NULL, 'email@email.com', 0x3a3a3100000000000000000000000000, '2022-11-17 12:10:51', NULL, 0),
(71, 20, 'email@email.com', 0x3a3a3100000000000000000000000000, '2022-11-17 12:10:56', NULL, 1),
(72, NULL, 'gmail@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-17 12:55:36', NULL, 0),
(73, 20, 'email@email.com', 0x3a3a3100000000000000000000000000, '2022-11-17 12:55:44', NULL, 1),
(74, NULL, 'doctor@gmial.com', 0x3a3a3100000000000000000000000000, '2022-11-17 12:58:04', NULL, 0),
(75, 20, 'doctor@email.com', 0x3a3a3100000000000000000000000000, '2022-11-17 12:58:58', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `dis` longtext DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `fee`, `dis`, `img`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist', 700, 'A gynecologist is a doctor who specializes in female reproductive health. They diagnose and treat issues related to the female reproductive tract. This includes the uterus, fallopian tubes, and ovaries and breasts.  Anyone with female organs may see a gynecologist.  80% of those who see one are between 15 to 45 years old.   What Does a Gynecologist Do? Gynecologists give reproductive and sexual health services that include pelvic exams, Pap tests, cancer screenings, and testing and treatment for vaginal infections.  They diagnose and treat reproductive system disorders such as endometriosis, infertility, ovarian cysts, and pelvic pain. They may also care for people with ovarian, cervical, and other reproductive cancers.  Some gynecologists also practice as obstetricians, who give care during pregnancy and birth. If a gynecologist has expertise in obstetrics, they’re called an OB-GYN.', 'Gynecologist.jpeg', '2016-12-28 06:37:25', '2022-11-14 09:02:53'),
(2, 'General Physician', 900, 'General Physicians are highly trained specialists who provide a range of non-surgical health care to adult patients. They care for difficult, serious or unusual medical problems and continue to see the patient until these problems have resolved or stabilised.  Much of their work takes place with hospitalised patients and most general physicians also see patients in their consulting rooms.  Their broad range of expertise differentiates General Physicians from other specialists who limit their medical practice to problems involving only one body system or to a special area of medical knowledge.', 'General Physician.jpeg', '2016-12-28 06:38:12', '2022-11-12 06:47:32'),
(3, 'Dermatologist', 700, 'Dermatologists also understand that a skin condition can have a serious impact on your health and well-being. Sometimes, a skin condition is a sign of a serious underlying health issue, and your dermatologist may be the first one to notice it. For example, signs of diabetes and heart disease can show up on the skin.  Your dermatologist knows that a skin condition doesn’t have to be life-threatening to reduce a person’s quality of life. A skin condition can cause sleep loss, poor self-image, serious depression, or lost productivity. Eczema (aka atopic dermatitis), hair loss that causes scarring, and psoriasis are some conditions that can do this.', 'Dermatologists.jpeg', '2016-12-28 06:38:48', '2022-11-12 06:47:27'),
(4, 'Homeopath', 600, 'Homeopathy achieved its greatest popularity in the 19th century. It was introduced to the United States in 1825 with the first homeopathic school opening in 1835. Throughout the 19th century, dozens of homeopathic institutions appeared in Europe and the United States. During this period, homeopathy was able to appear relatively successful, as other forms of treatment could be harmful and ineffective. By the end of the century the practice began to wane, with the last exclusively homeopathic medical school in the US closing in 1920. During the 1970s, homeopathy made a significant comeback, with sales of some homeopathic products increasing tenfold. The trend corresponded with the rise of the New Age movement, and may be in part due to chemophobia, an irrational preference for \"natural\" products, and the longer consultation times homeopathic practitioners provided.', 'Homeopath.jpeg', '2016-12-28 06:39:26', '2022-11-12 06:47:24'),
(6, 'Dentist', 600, 'Most Americans today enjoy excellent oral health and are keeping their natural teeth throughout their lives. But this is not the case for everyone. Cavities are still the most prevalent chronic disease of childhood and millions of Americans did not see a dentist in the past year, even though regular dental examinations and good oral hygiene can prevent most dental disease.  Too many people mistakenly believe that they need to see a dentist only if they are in pain or think something is wrong, but they’re missing the bigger picture. A dental visit means being examined by a doctor of oral health capable of diagnosing and treating conditions that can range from routine to extremely complex.  The American Dental Association believes that a better understanding of the intensive academic and clinical education that dentists undergo, their role in delivering oral health care and, most important, the degree to which dental disease is almost entirely preventable is essential to ensuring that more Americans enjoy the lifelong benefits of good oral health.', 'dentists.jpeg', '2016-12-28 06:40:08', '2022-11-12 06:47:41'),
(7, 'Neurosciences', 900, 'Neuroscientists focus on the brain and its impact on behavior and cognitive functions. Not only is neuroscience concerned with the normal functioning of the nervous system, but also what happens to the nervous system when people have neurological, psychiatric and neurodevelopmental disorders.  Neuroscience is often referred to in the plural, as neurosciences.  Neuroscience has traditionally been classed as a subdivision of biology. These days, it is an interdisciplinary science which liaises closely with other disciplines, such as mathematics, linguistics, engineering, computer science, chemistry, philosophy, psychology, and medicine.  Many researchers say that neuroscience means the same as neurobiology. However, neurobiology looks at the biology of the nervous system, while neuroscience refers to anything to do with the nervous system.  Neuroscientists are involved in a much wider scope of fields today than before. They study the cellular, functional, evolutionary, computational, molecular, cellular and medical aspects of the nervous system.', 'Neurosciences.jpeg', '2016-12-28 06:41:18', '2022-11-12 06:47:50'),
(10, 'Orthopedics', 690, 'A person who specializes in orthopedics is known as an orthopedist. Orthopedists use surgical and nonsurgical approaches to treat musculoskeletal issues, such as sports injuries, joint pain, and back problems.  This article provides an overview of orthopedics. It outlines the different conditions that orthopedists treat and explains what a person can expect during an orthopedic appointment.  The article also covers the qualifications necessary to become an orthopedist.', 'Orthopedics.jpeg', '2017-01-07 08:07:53', '2022-11-12 06:47:45'),
(12, 'Gastroenterology', 800, 'Gastroenterology is the study of the normal function and diseases of the esophagus, stomach, small intestine, colon and rectum, pancreas, gallbladder, bile ducts and liver. It involves a detailed understanding of the normal action (physiology) of the gastrointestinal organs including the movement of material through the stomach and intestine (motility), the digestion and absorption of nutrients into the body, removal of waste from the system, and the function of the liver as a digestive organ. It includes common and important conditions such as colon polyps and cancer, hepatitis, gastroesophageal reflux (heartburn), peptic ulcer disease, colitis, gallbladder and biliary tract disease, nutritional problems, Irritable Bowel Syndrome (IBS), and pancreatitis. In essence, all normal activity and disease of the digestive organs is part of the study of Gastroenterology.', 'Gastroenterology.jpeg', '2019-11-10 18:36:36', '2022-11-12 06:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` longtext DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0,
  `feed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `author`, `did`, `date`, `status`, `feed`) VALUES
(6, 'Your appointment was confirmed by Doctor', 19, 18, '2022-11-17 06:50:25', 1, 2),
(7, 'Your appointment was canceled by Doctor', 19, 18, '2022-11-17 06:50:39', 1, 1),
(8, 'Your appointment was confirmed by Doctor', 19, 20, '2022-11-17 09:14:17', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `did` int(11) NOT NULL,
  `patname` varchar(40) DEFAULT NULL,
  `patcontact` varchar(100) DEFAULT NULL,
  `patemail` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `pataddress` varchar(100) DEFAULT NULL,
  `patage` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `medhis` varchar(100) DEFAULT NULL,
  `cDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `appDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `aid`, `did`, `patname`, `patcontact`, `patemail`, `gender`, `pataddress`, `patage`, `status`, `medhis`, `cDate`, `appDate`, `updateDate`) VALUES
(3, 32, 18, 'dipto biswas', '1723763714', 'dip@gmail.com', 'm', 'khulna ', 21, 1, NULL, '2022-11-16 16:34:17', '2022-11-16 08:58:46', '2022-11-17 06:50:25'),
(4, 33, 18, 'tanmoy halder', '1723763715', 'tan@gmail.com', 'f', 'khulna ', 21, 0, NULL, '2022-11-16 16:34:17', '2022-11-16 09:02:17', '2022-11-17 06:50:06'),
(5, 34, 18, 'dipto biswas', '1723763714', 'dip@gmail.com', 'm', 'khulnafdsa', 21, 0, NULL, '2022-11-17 07:01:33', '2022-11-17 07:01:33', '0000-00-00 00:00:00'),
(6, 35, 20, 'dipto biswas', '1723763714', 'user@gmail.com', 'm', 'khulna', 21, 1, NULL, '2022-11-17 09:13:59', '2022-11-17 09:13:59', '2022-11-17 09:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(9, 3, '120/80 mmhg', '140 mg/dl', '68 kg', '99 F', 'Napa Extra (1-0-1)', '2022-11-17 06:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(4333) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'dipto'),
(2, 'dipto'),
(3, 'dipto'),
(4, 'dipto'),
(5, 'dipto'),
(6, 'dipto');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(2) NOT NULL,
  `age` int(11) NOT NULL,
  `phn` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pp` varchar(80) NOT NULL DEFAULT 'user.png',
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `age`, `phn`, `email`, `password`, `pp`, `regDate`, `updationDate`) VALUES
(19, 'dipto biswas', 'khulna', NULL, 'm', 21, 1723763714, 'user@gmail.com', '3b712de48137572f3849aabd5666a4e3', 'download.jpeg', '2022-11-16 08:09:12', '2022-11-17 08:47:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docnoti`
--
ALTER TABLE `docnoti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `docnoti`
--
ALTER TABLE `docnoti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `appointment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
