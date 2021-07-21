-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 05:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `iss_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `iss_tracker` text NOT NULL,
  `iss_description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`iss_id`, `project_id`, `iss_tracker`, `iss_description`, `status`) VALUES(20, 7, 'bug', 'Loop issue on project module', 0);
INSERT INTO `issues` (`iss_id`, `project_id`, `iss_tracker`, `iss_description`, `status`) VALUES(21, 7, 'feature', 'Filter Search', 0);
INSERT INTO `issues` (`iss_id`, `project_id`, `iss_tracker`, `iss_description`, `status`) VALUES(22, 7, 'feature', 'Ajax Search', 0);
INSERT INTO `issues` (`iss_id`, `project_id`, `iss_tracker`, `iss_description`, `status`) VALUES(23, 8, 'feature', 'Search Functionality', 0);
INSERT INTO `issues` (`iss_id`, `project_id`, `iss_tracker`, `iss_description`, `status`) VALUES(24, 8, 'feature', 'validation', 0);
INSERT INTO `issues` (`iss_id`, `project_id`, `iss_tracker`, `iss_description`, `status`) VALUES(25, 8, 'bug', 'Syntax error', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pro_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_description` text NOT NULL,
  `pro_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pro_id`, `pro_name`, `pro_description`, `pro_status`) VALUES(7, 'Project Management System', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '0');
INSERT INTO `projects` (`pro_id`, `pro_name`, `pro_description`, `pro_status`) VALUES(8, 'Tracking System', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `uacc_status` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `uacc_status`, `ip`) VALUES(1, 'admin', '55a4467479f965655036eec4812d4602a5dd83c5d5a1859d928e1f23c9a3f3c056c8f3782fef1237aa8d03e13f0b9a1e233610c8eeb9b189d51f9b3ceb71cbde', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`iss_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `iss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
