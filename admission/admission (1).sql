-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 05:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmapplications`
--

CREATE TABLE `tbladmapplications` (
  `ID` int(11) NOT NULL,
  `uid` char(10) NOT NULL,
  `coursename` varchar(120) DEFAULT NULL,
  `fname` varchar(120) DEFAULT NULL,
  `lname` varchar(120) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `residential` varchar(200) DEFAULT NULL,
  `application` varchar(200) DEFAULT NULL,
  `reservation` varchar(200) DEFAULT NULL,
  `special` varchar(200) DEFAULT NULL,
  `coradd` varchar(350) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zipcode` int(200) NOT NULL,
  `peradd` varchar(350) NOT NULL,
  `percity` varchar(200) NOT NULL,
  `perstate` varchar(200) NOT NULL,
  `perzipcode` int(200) NOT NULL,
  `ug` varchar(200) DEFAULT NULL,
  `grauni` varchar(120) DEFAULT NULL,
  `grayop` int(120) DEFAULT NULL,
  `graper` decimal(10,0) DEFAULT NULL,
  `grastream` varchar(120) DEFAULT NULL,
  `graclass` varchar(200) NOT NULL,
  `pg` varchar(200) DEFAULT NULL,
  `pguni` varchar(120) DEFAULT NULL,
  `pgyop` int(120) DEFAULT NULL,
  `pgper` decimal(10,0) DEFAULT NULL,
  `pgstream` varchar(120) DEFAULT NULL,
  `pggraclass` varchar(200) NOT NULL,
  `experience` varchar(200) DEFAULT NULL,
  `institution` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `service` varchar(200) NOT NULL,
  `institutionone` varchar(200) NOT NULL,
  `designationone` varchar(200) NOT NULL,
  `serviceone` varchar(200) NOT NULL,
  `institutiontwo` varchar(200) NOT NULL,
  `designationtwo` varchar(200) NOT NULL,
  `servicetwo` varchar(200) NOT NULL,
  `sign` varchar(200) DEFAULT NULL,
  `CourseApplieddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` varchar(255) DEFAULT NULL,
  `AdminStatus` varchar(20) DEFAULT NULL,
  `AdminRemarkDate` timestamp NULL DEFAULT NULL,
  `upic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmapplications`
--

INSERT INTO `tbladmapplications` (`ID`, `uid`, `coursename`, `fname`, `lname`, `dob`, `gender`, `residential`, `application`, `reservation`, `special`, `coradd`, `city`, `state`, `zipcode`, `peradd`, `percity`, `perstate`, `perzipcode`, `ug`, `grauni`, `grayop`, `graper`, `grastream`, `graclass`, `pg`, `pguni`, `pgyop`, `pgper`, `pgstream`, `pggraclass`, `experience`, `institution`, `designation`, `service`, `institutionone`, `designationone`, `serviceone`, `institutiontwo`, `designationtwo`, `servicetwo`, `sign`, `CourseApplieddate`, `AdminRemark`, `AdminStatus`, `AdminRemarkDate`, `upic`) VALUES
(114, '2', 'CHE', 'Rajesh', 'R', '2021-12-02', 'Male', 'Other State', 'Full Time', 'open category', 'Person with Disabilities (PwD)', '56', 'Viilianur', 'Pondicherry (Puducherry)', 605110, '56', 'Viilianur', 'Pondicherry (Puducherry)', 605110, 'B.E', 'pondicherry', 2014, '89', 'cse', 'First Class', 'M.Tech', 'pondicherry', 2016, '89', 'Computer Science', 'Second Class', '1 Year', 'pondicherry', 'software', '20-12-2020 to 20-12-2021', 'TCS', 'so', '20-12-2020 to 20-12-2021', 'TCS', 'soft', '20-12-2020 to 20-12-2021', 'monkey2.jpg', '2021-12-11 05:06:55', NULL, NULL, NULL, 'joker2.jpg'),
(116, '3', 'CHE', 'Rajesh', 'R', '2021-12-02', 'Male', 'Other State', 'Full Time', 'open category', 'Not Applicable', '56', 'Viilianur', 'Pondicherry (Puducherry)', 605110, '56', 'Viilianur', 'Pondicherry (Puducherry)', 605110, 'B.E', 'pondicherry', 2014, '89', 'Computer Science & Engineering', 'First Class', 'M.E', 'pondicherry', 2016, '90', 'Computer Science', 'First Class', 'one', 'pondicherry', 'Software Development', '20-12-2020 to 20-12-2021', 'pondicherry', 'so', '20-12-2020 to 20-12-2021', '', '', '', '0002.jpg', '2021-12-15 23:56:06', NULL, NULL, NULL, '8a64ea7a1756fdf5993772ceeace6eb7.jpg'),
(117, '5', 'ECE', 'Rajesh', 'R', '2021-12-01', 'Male', 'Other State', 'Part Time (Internal)', 'OBC', 'Not Applicable', '56', 'Viilianur', 'Pondicherry (Puducherry)', 605110, '56', 'Viilianur', 'Pondicherry (Puducherry)', 605110, 'B.E', 'Pondicherry', 2014, '89', 'Computer Science & Engineering', 'First Class with Distinction', 'M.C.A', 'pondicherry', 2016, '90', 'Computer Science', 'First Class', '1 Year', 'pondicherry', 'Software Development', '20-12-2020 to 20-12-2021', '', '', '', '', '', '', 'flow2.jpg', '2021-12-22 05:10:18', NULL, NULL, NULL, 'firehen2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'Ph.D(2021-22)', 'Admin', 876545789, 'admin@gmail.com', 'ae1a055c8bf7f462137da829627f6f84', '2021-05-18 04:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `ID` int(11) NOT NULL,
  `CourseName` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`ID`, `CourseName`) VALUES
(13, 'CE'),
(14, 'CHE'),
(15, 'CSE'),
(16, 'ECE'),
(17, 'EIE'),
(18, 'EEE'),
(19, 'IT'),
(20, 'ME'),
(21, 'CS'),
(22, 'MA'),
(23, 'PHY');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE `tbldocument` (
  `ID` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dateofbirthdoc` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `residencedoc` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `nationalitydoc` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `communitydoc` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `specialdoc` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `experiencedoc` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `gramarksheet` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `pgmarksheet` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `AdminStatus` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `UploadDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`ID`, `uid`, `dateofbirthdoc`, `residencedoc`, `nationalitydoc`, `communitydoc`, `specialdoc`, `experiencedoc`, `gramarksheet`, `pgmarksheet`, `AdminStatus`, `UploadDate`) VALUES
(14, 3, 'banana.jpg', 'cuckoo.jpg', 'firehen.jpg', 'do.jpg', 'food.jpg', 'hen.jpg', 'lorry.jpg', 'pen.jpg', NULL, '2021-12-17 10:27:44'),
(15, 5, 'watermelon2.jpg', 'tomatos2.jpg', 'lorry2.jpg', 'mang2.jpg', 'market2.jpg', 'monkey2.jpg', 'greenpillar2.jpg', 'gresshopper2.jpg', NULL, '2021-12-22 05:11:07'),
(16, 2, 'award2.jpg', 'dog2.jpg', 'fl2.jpg', '2d79742cb12a89d029dfc398a2961cc3', 'd41d8cd98f00b204e9800998ecf8427e', '10744e6ec28a16678fc9e33634ae42e3', 'hen2.jpg', 'cuckoo2.jpg', NULL, '2021-12-22 06:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(11) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `Decription` varchar(350) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `uid` int(11) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `receipt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`uid`, `transactionid`, `receipt`) VALUES
(2, '745683475683475', 'fee0a108ffbf537b79d37588081a0ed0.pdf'),
(3, '745683475683475', 'fee0a108ffbf537b79d37588081a0ed0.pdf'),
(5, '7456834756834756834756834', 'fee0a108ffbf537b79d37588081a0ed0.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `Email` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `Password` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`ID`, `Name`, `Email`, `Password`, `PostingDate`) VALUES
(1, 'Rajesh R', 'rajesai3456@gmail.com', 'ea2bfa79cd221f1e88a9bf39ea155cd8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `PostingDate`) VALUES
(2, 'Rajesh', 'R', 8678925240, 'rajesai3456@gmail.com', 'ea2bfa79cd221f1e88a9bf39ea155cd8', '2021-11-28 21:31:16'),
(3, 'Arun', 'R', 7458376875, 'arun@gmail.com', 'ea2bfa79cd221f1e88a9bf39ea155cd8', '2021-12-14 10:00:27'),
(5, 'an', 'a', 7687687687, 'a@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-12-22 05:08:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmapplications`
--
ALTER TABLE `tbladmapplications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmapplications`
--
ALTER TABLE `tbladmapplications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbldocument`
--
ALTER TABLE `tbldocument`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
