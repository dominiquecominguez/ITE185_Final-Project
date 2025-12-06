-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2025 at 07:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_title` varchar(255) DEFAULT NULL,
  `task_description` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_title`, `task_description`, `status`, `created_at`, `user_id`) VALUES
(1, 'Review for ENT101 Midterm Exam', 'ENT101 Midterm Exam: December 5, 2025', 'Completed', '2025-12-01 11:13:26', 1),
(2, 'Compile Notes for ITE184 Exam 2', 'ITE184 Exam 2 Coverage:\r\n- Data Privacy Act\r\n- Cybercrime Act\r\n- Exam Date: December 12, 2025', 'In Progress', '2025-12-05 17:05:49', 1),
(4, 'Make NRM Hosting Script', '- NRM Outreach Date: December 4, 2025\r\n- Finalize program flow', 'Completed', '2025-12-06 04:09:12', 1),
(5, 'Study for 3rd Quarter Exam', '- Exam Date: December 10, 2025\r\n- Make notes for Earth Science', 'Pending', '2025-12-06 05:05:54', 2),
(6, 'Answer Entrep Quiz 3', 'Quiz Deadline: December 10, 2025', 'Pending', '2025-12-06 05:46:02', 1),
(7, 'Review for Physics', '- Make notes\r\n- Answer practice quizzes', 'In Progress', '2025-12-06 05:49:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Nikki Cominguez', 'nikkicominguez@gmail.com', '$2y$10$kgVAkz62BjtSjbPcAaCy1.SLFQ/eNAB7.CyMbIXT9EYY3ghgyFI1.', '2025-12-01 08:05:33'),
(2, 'Tyron Martinez', 'tyronmartinez@gmail.com', '$2y$10$.mmjjdeliU.ozV.pooCDh.9j3seVVAxCJN9ePpSZl/7w.xaLz8dBW', '2025-12-06 05:04:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
