-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 03:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eid` int(2) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `edesc` text NOT NULL,
  `elimit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `ename`, `date`, `edesc`, `elimit`) VALUES
(3, 'Cricket', '2017-03-25', 'Play Cricket', 2),
(6, 'Carrom', '2017-04-05', 'Play Carrom', 2);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `pid` int(5) NOT NULL,
  `p_uname` varchar(20) NOT NULL,
  `p_ename` varchar(50) NOT NULL,
  `pdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`pid`, `p_uname`, `p_ename`, `pdate`) VALUES
(5, 'jacky', 'Cricket', '2017-03-21'),
(7, 'pinkz', 'Cricket', '2017-03-21'),
(8, 'manu123', 'Carrom', '2017-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(5) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `full_name`, `uname`, `password`, `email_id`, `phone`) VALUES
(2, 'Mansi Khamkar', 'manu123', 'manu1997', 'manu@gm.com', 9980899890),
(3, 'Ronak Hinduja', 'jacky', 'jackson', 'rhj@gmail.com', 9191919191),
(4, 'Pinky Rathod', 'pinkz', 'priya1997', 'pr@yahoo.com', 9291929192),
(5, 'Ruchita Yeole', 'ruchi', 'ruchi123', 'ry@gmail.com', 9333933399),
(9, 'Bill Gates', 'billy', 'bill123', 'billg@yahoo.com', 1234567890),
(10, 'Ankita Rauth', 'ankitar', 'ankita1998', 'ankitar@gmail.com', 9969969969);

-- --------------------------------------------------------

--
-- Table structure for table `wait_list`
--

CREATE TABLE `wait_list` (
  `wid` int(5) NOT NULL,
  `w_uname` varchar(20) NOT NULL,
  `w_ename` varchar(50) NOT NULL,
  `wdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wait_list`
--

INSERT INTO `wait_list` (`wid`, `w_uname`, `w_ename`, `wdate`) VALUES
(1, 'manu123', 'Cricket', '2017-03-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eid`,`ename`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `p_uname` (`p_uname`),
  ADD KEY `p_ename` (`p_ename`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`,`uname`),
  ADD UNIQUE KEY `email` (`email_id`);

--
-- Indexes for table `wait_list`
--
ALTER TABLE `wait_list`
  ADD PRIMARY KEY (`wid`),
  ADD KEY `w_uname` (`w_uname`),
  ADD KEY `w_ename` (`w_ename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wait_list`
--
ALTER TABLE `wait_list`
  MODIFY `wid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
