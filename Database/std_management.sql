-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 01:17 PM
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
-- Database: `std_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@std.com', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_teacher` varchar(255) NOT NULL,
  `class_limit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_teacher`, `class_limit`) VALUES
(1, 'Class 1', 'Malahim Ansari', 2),
(2, 'Class 2', 'ayanansari', 4),
(3, 'Class 3', 'John Doe', 200);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_contact` int(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_img` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `father_name`, `father_contact`, `student_id`, `class`, `student_address`, `student_img`, `attendance`) VALUES
(1, 'John', 'Doe', 'Robert', 12312321, 'Student10001', 'Class 1', 'Los Santos', '1680830850DummyTech8855_crazy_instagram_tech_profile_picture_man_0624c26b-8a34-454c-86f3-6d78d0e8bd58.png', 'Not Specified'),
(2, 'Malahim', 'Ansari', 'Waseem Ahmed', 1232321, 'Student10002', 'Class 1', 'xyz', '1680960307Firefly_cat+and rabbit hacking on computers using kali linux_photo,cyberpunk,synthwave_54304.jpg', 'Not Specified'),
(3, 'Ayan', 'Ansari', 'Waseem Ahmed Ansari', 2147483647, 'Student10003', 'Class 2', 'Liaquatabad, Karachi', '1681665184My click.jpg', 'Not Specified');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `att_id` int(255) NOT NULL,
  `att_class` varchar(255) NOT NULL,
  `att_date` varchar(255) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `attend` varchar(255) NOT NULL,
  `att_stdID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`att_id`, `att_class`, `att_date`, `std_name`, `attend`, `att_stdID`) VALUES
(1, 'Class 1', '2023-05-15', 'John Doe', 'leave', 'Student10001'),
(2, 'Class 1', '2023-05-15', 'Malahim Ansari', 'absent', 'Student10002'),
(3, 'Class 1', '2023-05-16', 'John Doe', 'leave', 'Student10001'),
(4, 'Class 1', '2023-05-16', 'Malahim Ansari', 'absent', 'Student10002'),
(5, 'Class 1', '2023-05-17', 'John Doe', 'leave', 'Student10001'),
(6, 'Class 1', '2023-05-17', 'Malahim Ansari', 'absent', 'Student10002'),
(7, 'Class 2', '2023-05-18', 'Ayan Ansari', 'present', 'Student10003'),
(8, 'Class 1', '2023-05-18', 'John Doe', 'leave', 'Student10001'),
(9, 'Class 1', '2023-05-18', 'Malahim Ansari', 'present', 'Student10002'),
(10, 'Class 1', '2023-05-19', 'John Doe', 'leave', 'Student10001'),
(11, 'Class 1', '2023-05-19', 'Malahim Ansari', 'absent', 'Student10002');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(255) NOT NULL,
  `teacher_uid` int(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `subject_specialist` varchar(255) DEFAULT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_contact` int(50) NOT NULL,
  `teacher_salary` int(50) NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `teacher_pic` varchar(255) NOT NULL,
  `teacher_attendance` decimal(65,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_uid`, `teacher_name`, `subject_specialist`, `teacher_email`, `teacher_contact`, `teacher_salary`, `teacher_address`, `teacher_password`, `teacher_pic`, `teacher_attendance`) VALUES
(1, 74810646, 'Malahim Ansari', 'Computer Science', 'malahimtech@std.com', 2147483647, 45000, 'Los Angeles, United States', '11828b0203ca7b7bd57eb53b4b97a934', '1679469614My click.jpg', '20.0'),
(2, 784820506, 'ayanansari', '', 'ayan@gmail.com', 9090898, 234, 'fdsjlk', '0b2cfd4581fbe8b7195bc16ae5e2b92c', '1679470084qu-nh-le-m-nh-dp3CS405UZM-unsplash.jpg', '100.0'),
(5, 1455617753, 'John Doe', 'Mathematics', 'johndoe@gmail.com', 12345688, 40000, 'los santos', '123', '1683086930qu-nh-le-m-nh-dp3CS405UZM-unsplash.jpg', '50.0');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `att_id` int(11) NOT NULL,
  `att_class` varchar(255) NOT NULL,
  `att_date` date NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `attend` varchar(255) NOT NULL,
  `att_teacherUID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`att_id`, `att_class`, `att_date`, `teacher_name`, `attend`, `att_teacherUID`) VALUES
(1, 'Class 2', '2023-05-03', 'ayanansari', 'present', '784820506'),
(2, 'Class 2', '2023-11-30', 'ayanansari', 'present', '784820506'),
(3, 'Class 2', '2023-12-29', 'ayanansari', 'present', '784820506'),
(4, 'Class 1', '2023-05-03', 'Malahim Ansari', 'absent', '74810646'),
(5, 'Class 1', '2023-05-04', 'Malahim Ansari', 'absent', '74810646'),
(6, 'Class 1', '2023-05-05', 'Malahim Ansari', 'absent', '74810646'),
(7, 'Class 1', '2023-05-09', 'Malahim Ansari', 'absent', '74810646'),
(8, 'Class 1', '2023-05-18', 'Malahim Ansari', 'present', '74810646'),
(9, 'Class 3', '2023-05-18', 'John Doe', 'present', '1455617753'),
(10, 'Class 3', '2023-05-19', 'John Doe', 'absent', '1455617753');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_email` (`teacher_email`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `att_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
