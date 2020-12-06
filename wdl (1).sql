-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 09:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ID` int(11) NOT NULL,
  `AUTHOR_NAME` varchar(40) NOT NULL,
  `AUTHOR_ADDRESS` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ID`, `AUTHOR_NAME`, `AUTHOR_ADDRESS`) VALUES
(1, 'Bhakti Raul', 'Nagpur'),
(2, 'Bharat Acharya', 'Mumbai'),
(3, 'Dilip Kumar Sultania', 'Mumbai'),
(4, 'Harish Narula', 'Mumbai'),
(5, 'I.A Shaikh', 'Mumbai'),
(6, 'J.S Katre', 'Pune'),
(7, 'Jayshree parikh', 'Nagpur'),
(8, 'Kumbhojkar', 'Wadala'),
(9, 'M. A Ansari', 'Mumbai'),
(10, 'Mahesh Goyani', 'Ulhasnagar'),
(11, 'Mahesh Mali', 'Pune'),
(12, 'Manish Nadkarni', 'Pune'),
(13, 'ND Bhat', NULL),
(14, 'Pradip dey', 'Kolkata'),
(15, 'raja', NULL),
(16, 'Rajesh Kadu', 'Mumbai'),
(17, 'Reema Thareja', 'Wadala'),
(18, 'Sangeeta Sharma', 'Mumbai'),
(19, 'Sanjesh Pawale', 'Mumbai'),
(20, 'Shweta Loonkar', 'Pune'),
(21, 'Suhas Kadu', NULL),
(22, 'Tom M.Mitchell', 'Mumbai'),
(23, 'Vaishali Joshi', 'Mumbai'),
(24, 'William Stallings', 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` int(4) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `YEAR` decimal(4,0) NOT NULL,
  `BRANCH` varchar(20) NOT NULL,
  `SEMESTER` int(1) NOT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `PRICE` int(4) NOT NULL,
  `EMAIL_ID` varchar(100) DEFAULT NULL,
  `AUTHOR_NAME` varchar(40) NOT NULL,
  `PUBLISHER_NAME` varchar(40) DEFAULT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `TITLE`, `YEAR`, `BRANCH`, `SEMESTER`, `IMAGE`, `PRICE`, `EMAIL_ID`, `AUTHOR_NAME`, `PUBLISHER_NAME`, `product_status`) VALUES
(1001, 'Applied Mathematics-1', '2019', 'COMMON', 1, 'math-1.jpg', 500, '2017.raju@ves.ac.in', 'Kumbhojkar', 'Jamnadas LLP', '1'),
(1002, 'Applied Physics-1', '2018', 'COMMON', 1, 'phy-1.jpg', 300, '2018.shreeja@ves.ac.in', 'I.A Shaikh', 'Techmax', '1'),
(1003, 'Applied Chemistry-1', '2019', 'COMMON', 1, 'chem-1.jpg', 350, NULL, 'Jayshree parikh', 'Techmax', '1'),
(1004, 'Basic Electrical Engg', '2018', 'COMMON', 1, 'bee.jpg', 350, '2018.manoj@ves.ac.in', 'Harish Narula', 'Techmax', '1'),
(1005, 'Engg Mechanics', '2018', 'COMMON', 1, 'mech.jpg', 250, '2017.shardul@ves.ac.in', 'Manish Nadkarni', 'Techmax', '1'),
(1006, 'Environmental Studies', '2019', 'COMMON', 1, 'evs.jpg', 200, NULL, 'Jayshree parikh', 'Techmax', '1'),
(1007, 'Applied Mathematics-2', '2018', 'COMMON', 2, 'math-2.jpg', 400, '2017.rekha@ves.ac.in', 'Kumbhojkar', 'Jamnadas LLP', '1'),
(1008, 'Applied Physics-2', '2019', 'COMMON', 2, 'phy-2.jpg', 300, NULL, 'I.A Shaikh', 'Techmax', '1'),
(1009, 'Applied Chemistry-2', '2019', 'COMMON', 2, 'chem-2.jpg', 350, '2018.manoj@ves.ac.in', 'Jayshree parikh', 'Techmax', '1'),
(1010, 'Engg Drawing', '2017', 'COMMON', 2, 'ed.jpg', 400, NULL, 'ND Bhat', 'Charotar', '1'),
(1011, 'SPA', '2019', 'COMMON', 2, 'spa.jpg', 370, NULL, 'Pradip dey', 'Oxford Publications', '1'),
(1012, 'Communication Skills', '2019', 'COMMON', 2, 'cs.jpg', 400, NULL, 'Sangeeta Sharma', 'Oxford Publications', '1'),
(1013, 'Applied Mathematics-3', '2019', 'CMPN', 3, 'maths-3.jpg', 400, NULL, 'Kumbhojkar', 'Jamnadas LLP', '1'),
(1014, 'Data Structures with C', '2018', 'CMPN', 3, 'das.jpg', 360, NULL, 'Reema Thareja', 'Oxford Publications', '1'),
(1015, 'ECCF', '2018', 'CMPN', 3, 'ECCF.jpg', 280, NULL, 'J.S Katre', 'TechKnowledge', '1'),
(1016, 'DLDA', '2018', 'CMPN', 3, 'DLDA.jpg', 460, '2018.manoj@ves.ac.in', 'Vaishali Joshi', 'Techmax', '1'),
(1017, 'Discrete Mathematics', '2018', 'CMPN', 3, 'dis.jpg', 360, NULL, 'Bhakti Raul', 'TechKnowledge', '1'),
(1018, 'OOPM', '2019', 'CMPN', 3, 'oopm.jpg', 260, NULL, 'Sanjesh Pawale', 'Charotar', '1'),
(1019, 'Applied Mathematics-4', '2019', 'CMPN', 4, 'math-4.jpg', 450, '2018.akash@ves.ac.in', 'Kumbhojkar', 'Jamnadas LLP', '1'),
(1020, 'Computer Graphics', '2019', 'CMPN', 4, 'cg-4.jpg', 180, NULL, 'Rajesh Kadu', 'Techmax', '1'),
(1021, 'Operating Systems', '2019', 'CMPN', 4, 'os.jpg', 170, '2018.akash@ves.ac.in', 'Sanjesh Pawale', 'TechKnowledge', '1'),
(1022, 'Analysis Of Algorithm', '2019', 'CMPN', 4, 'aoa.jpg', 220, NULL, 'Mahesh Goyani', 'TechKnowledge', '1'),
(1023, 'COA', '2019', 'CMPN', 4, 'coa-4.jpg', 200, '2017.raju@ves.ac.in', 'Harish Narula', 'Charotar', '1'),
(1024, 'Microprocessor', '2020', 'CMPN', 5, 'mp.jpg', 400, NULL, 'Bharat Acharya', 'TechKnowledge', '1'),
(1025, 'DBMS', '2019', 'CMPN', 5, 'dbms.jpg', 250, '2018.manoj@ves.ac.in', 'Mahesh Mali', 'Techmax', '1'),
(1026, 'Computer Network', '2019', 'CMPN', 5, 'cn.jpg', 360, NULL, 'J.S Katre', 'Charotar', '1'),
(1027, 'TCS', '2020', 'CMPN', 5, 'tcs.jpg', 340, '2018.shreeja@ves.ac.in', 'Dilip Kumar Sultania', 'Techmax', '1'),
(1028, 'Advanced AOA', '2019', 'CMPN', 5, 'aaoa.jpg', 400, NULL, 'Mahesh Goyani', 'Oxford Publications', '1'),
(1029, 'SPCC', '2019', 'CMPN', 6, 'spcc.jpg', 325, NULL, 'Shweta Loonkar', 'Techmax', '1'),
(1030, 'Software Engineering', '2019', 'CMPN', 6, 'se.jpg', 375, '2018.manoj@ves.ac.in', 'M. A Ansari', 'Techmax', '1'),
(1049, 'Artificial Intelligence', '2018', 'CMPN', 7, 'mathsss-2.jpg', 370, '2018.rik@ves.ac.in', 'Suhas Kadu', 'Techmax', '1'),
(1050, 'Applied Physics', '2020', 'EXTC', 6, 'mathsss-2.jpg', 400, '2018.shreeja@ves.ac.in', 'Kumbhojkar', 'Techmax', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(5) NOT NULL,
  `ISBN` int(4) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `EMAIL_ID` varchar(100) NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `ISBN`, `TITLE`, `QUANTITY`, `EMAIL_ID`, `PRICE`) VALUES
(1, 1001, 'Applied Mathematics-1', 1, '2018.shreeja@ves.ac.in', 500),
(2, 1008, 'Applied Physics-2', 1, '2018.shreeja@ves.ac.in', 300),
(3, 1008, 'Applied Physics-2', 1, '2018.shreeja@ves.ac.in', 300),
(4, 1014, 'Data Structures with C', 1, '2018.shreeja@ves.ac.in', 360),
(5, 1005, 'Engg Mechanics', 1, '2018.shreeja@ves.ac.in', 250),
(6, 1008, 'Applied Physics-2', 1, '2018.shreeja@ves.ac.in', 300),
(7, 1003, 'Applied Chemistry-1', 1, '2018.shreeja@ves.ac.in', 350),
(8, 1007, 'Applied Mathematics-2', 1, '2018.shreeja@ves.ac.in', 400),
(9, 1003, 'Applied Chemistry-1', 1, '2018.shreeja@ves.ac.in', 350),
(10, 1003, 'Applied Chemistry-1', 1, '2018.shreeja@ves.ac.in', 350),
(11, 1003, 'Applied Chemistry-1', 1, '2018.shreeja@ves.ac.in', 350),
(12, 1006, 'Environmental Studies', 1, '2018.shreeja@ves.ac.in', 200),
(13, 1027, 'TCS', 1, '2018.shreeja@ves.ac.in', 340),
(14, 1026, 'Computer Network', 1, '2018.shreeja@ves.ac.in', 360),
(15, 1022, 'Analysis Of Algorithm', 1, '2018.shreeja@ves.ac.in', 220),
(16, 1018, 'OOPM', 1, '2018.shreeja@ves.ac.in', 260),
(17, 1004, 'Basic Electrical Engg', 1, '2018.shreyas.v@ves.ac.in', 350),
(18, 1006, 'Environmental Studies', 1, '2018.shreyas.v@ves.ac.in', 200),
(19, 1024, 'Microprocessor', 1, '2018.shreyas.v@ves.ac.in', 400),
(20, 1004, 'Basic Electrical Engg', 1, '2018.shreyas.v@ves.ac.in', 350),
(21, 1002, 'Applied Physics-1', 1, '2018.shreeja@ves.ac.in', 300),
(22, 1009, 'Applied Chemistry-2', 1, '2018.shreeja@ves.ac.in', 350),
(23, 1002, 'Applied Physics-1', 1, '2018.shreeja@ves.ac.in', 300),
(24, 1003, 'Applied Chemistry-1', 1, '2018.shreeja@ves.ac.in', 350),
(25, 1008, 'Applied Physics-2', 1, '2018.manoj@ves.ac.in', 300),
(26, 1012, 'Communication Skills', 1, '2018.manoj@ves.ac.in', 400),
(27, 1002, 'Applied Physics-1', 1, '2018.shreeja@ves.ac.in', 300),
(28, 1003, 'Applied Chemistry-1', 1, '2018.shreeja@ves.ac.in', 350),
(29, 1024, 'Microprocessor', 1, '2018.rik@ves.ac.in', 400),
(30, 1026, 'Computer Network', 1, '2018.rik@ves.ac.in', 360),
(31, 1013, 'Applied Mathematics-3', 1, '2018.shreeja@ves.ac.in', 400),
(32, 1003, 'Applied Chemistry-1', 1, '2018.shreeja@ves.ac.in', 350);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `Name`, `Email`, `Subject`, `Comment`, `Created_at`) VALUES
(1, 'Muskaan', '2017.muskaan@ves.ac.in', 'late delivery', 'my order has been delayed by almost 2 weeks,. please look into it.', '2020-12-04 10:19:43'),
(4, 'Shreyas Udupa', '2018.shreyas.v@ves.ac.in', 'Quantity', 'less books delivered', '2020-12-04 11:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `EMAIL_ID` varchar(100) NOT NULL,
  `TRANSACTION_ID` int(5) NOT NULL,
  `AMOUNT` int(5) NOT NULL,
  `PAYMENT_MODE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `EMAIL_ID`, `TRANSACTION_ID`, `AMOUNT`, `PAYMENT_MODE`) VALUES
(1, '2018.shreeja@ves.ac.in', 1015, 650, 'CASH'),
(2, '2018.manoj@ves.ac.in', 1016, 700, 'CASH'),
(3, '2018.shreeja@ves.ac.in', 1017, 650, 'CASH'),
(4, '2018.rik@ves.ac.in', 1018, 760, 'CASH'),
(5, '2018.shreeja@ves.ac.in', 1019, 750, 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PUBLISHER_NAME` varchar(40) NOT NULL,
  `PUBLISHER_ADDRESS` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PUBLISHER_NAME`, `PUBLISHER_ADDRESS`) VALUES
('Charotar', 'Kota'),
('Jamnadas LLP', 'Nashik'),
('Jamnadas Publications', NULL),
('McGraw Hill', 'Delhi'),
('Oxford Publications', 'Delhi'),
('ramesh', NULL),
('TechKnowledge', 'Mumbai'),
('Techmax', 'Pune'),
('Wiley india', 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `EMAIL_ID` varchar(100) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `BRANCH` varchar(20) NOT NULL,
  `YEAR` varchar(2) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `MOBILE_NO` decimal(10,0) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `EMAIL_ID`, `NAME`, `BRANCH`, `YEAR`, `ADDRESS`, `MOBILE_NO`, `PASSWORD`) VALUES
(9, '2017.muskaan@ves.ac.in', 'Muskaan', 'IT', 'BE', 'Akola', '9484911949', '$2y$10$h9D1GsULC9Q1MfwyOKzcwusdtzuRpBDxtxI4kPtyLzJYKKhfGog1W'),
(1, '2017.raju@ves.ac.in', 'Shriram', 'INST', 'TE', 'Akola', '6588447123', '$2y$10$FoxzPkn72qAuzJCf4/qxxOa2efGqT81fY4GAVI6SzU.rpLPLp8cZK'),
(2, '2017.rekha@ves.ac.in', 'Rekha', 'ETRX', 'SE', 'Delhi', '7845596631', '$2y$10$VpUhYezQthvL0o6FqnOkveoGUnuIq6MpNziT6.lJtEiBOZKtmm1LW'),
(3, '2017.shardul@ves.ac.in', 'Shardul', 'EXTC', 'BE', 'PUNE', '9584623175', '$2y$10$XqrhMjIStQH.tv72z4ZnLuirRBpH.viCpGW1vtyGZO1f9ernhn5Fi'),
(4, '2018.akash@ves.ac.in', 'Aakash', 'IT', 'FE', 'Mumbai', '9561321879', '$2y$10$ysD1WUL4O2VotOIzdzx7newrg0VJ/yOn6LqyztUICBC.yQ4SQ.E7S'),
(5, '2018.kunal@ves.ac.in', 'Kunal', 'CMPN', 'TE', 'Sobo', '9993335580', '$2y$10$/fAcihlur0dtFvqQ.e.pf.6cHKvBZbQ4aGg3rqDiq/UOxBEMLS4Ay'),
(6, '2018.manoj@ves.ac.in', 'Manoj', 'CMPN', 'TE', 'Kalyan', '9002145683', '$2y$10$xuYVjBOKSQzN5FKahmeuc.W0IXznaO5H45wziTk9O0XCIAvWV5fV2'),
(10, '2018.rik@ves.ac.in', 'rik', 'INST', 'FE', 'Andheri', '9891597956', '$2y$10$M/trtJmW1NPBNmL.13a.5u8ZiMnnwQzx5EKUf8GHfz1d2b2no32ae'),
(7, '2018.shreeja@ves.ac.in', 'Shreeja', 'CMPN', 'TE', 'Powai', '9463258982', '$2y$10$q2UKIEZXr2unjFW8xnzyQu361PVdi.zBZtepD6htFChYiK3lmL6ym'),
(8, '2018.shreyas.v@ves.ac.in', 'Shreyas', 'CMPN', 'TE', 'KK', '8797908047', '$2y$10$/Z2DS3hjfbPmzL8oolMl9uSWh5kxQJjGd7n8hsUamFo.bfNU2UnYy');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANSACTION_ID` int(5) NOT NULL,
  `EMAIL_ID` varchar(100) NOT NULL,
  `AMOUNT` int(5) NOT NULL,
  `DATE_OF_PURCHASE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TRANSACTION_ID`, `EMAIL_ID`, `AMOUNT`, `DATE_OF_PURCHASE`) VALUES
(1000, '2018.shreeja@ves.ac.in', 630, '2020-12-03 09:46:15'),
(1001, '2018.shreeja@ves.ac.in', 800, '2020-12-03 09:50:34'),
(1002, '2018.shreeja@ves.ac.in', 660, '2020-12-03 10:04:44'),
(1003, '2018.shreeja@ves.ac.in', 550, '2020-12-03 10:05:38'),
(1004, '2018.shreeja@ves.ac.in', 750, '2020-12-03 10:07:20'),
(1005, '2018.shreeja@ves.ac.in', 350, '2020-12-03 10:09:19'),
(1006, '2018.shreeja@ves.ac.in', 350, '2020-12-03 10:10:15'),
(1007, '2018.shreeja@ves.ac.in', 350, '2020-12-03 10:12:59'),
(1008, '2018.shreeja@ves.ac.in', 200, '2020-12-03 10:14:17'),
(1009, '2018.shreeja@ves.ac.in', 700, '2020-12-03 10:17:42'),
(1010, '2018.shreeja@ves.ac.in', 480, '2020-12-03 18:12:43'),
(1011, '2018.shreyas.v@ves.ac.in', 550, '2020-12-03 19:08:31'),
(1012, '2018.shreyas.v@ves.ac.in', 750, '2020-12-03 19:39:30'),
(1013, '2018.shreeja@ves.ac.in', 300, '2020-12-03 19:45:50'),
(1014, '2018.shreeja@ves.ac.in', 350, '2020-12-03 20:27:15'),
(1015, '2018.shreeja@ves.ac.in', 650, '2020-12-04 10:23:28'),
(1016, '2018.manoj@ves.ac.in', 700, '2020-12-04 10:54:16'),
(1017, '2018.shreeja@ves.ac.in', 650, '2020-12-04 11:24:10'),
(1018, '2018.rik@ves.ac.in', 760, '2020-12-04 16:40:29'),
(1019, '2018.shreeja@ves.ac.in', 750, '2020-12-05 03:49:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AUTHOR_NAME`),
  ADD UNIQUE KEY `id` (`ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `BOOK_fk1` (`AUTHOR_NAME`),
  ADD KEY `BOOK_fk2` (`PUBLISHER_NAME`),
  ADD KEY `book_fk3` (`EMAIL_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CART_FK2` (`ISBN`),
  ADD KEY `CART_FK1` (`EMAIL_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD UNIQUE KEY `id` (`ID`),
  ADD KEY `PAYMENT_FK1` (`EMAIL_ID`),
  ADD KEY `PAYMENT_FK2` (`TRANSACTION_ID`,`AMOUNT`) USING BTREE;

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PUBLISHER_NAME`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`EMAIL_ID`),
  ADD UNIQUE KEY `unique` (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD UNIQUE KEY `TRANSACTION_ID` (`TRANSACTION_ID`),
  ADD KEY `transaction_fk1` (`EMAIL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `ISBN` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1051;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANSACTION_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `BOOK_fk1` FOREIGN KEY (`AUTHOR_NAME`) REFERENCES `author` (`AUTHOR_NAME`),
  ADD CONSTRAINT `BOOK_fk2` FOREIGN KEY (`PUBLISHER_NAME`) REFERENCES `publisher` (`PUBLISHER_NAME`),
  ADD CONSTRAINT `book_fk3` FOREIGN KEY (`EMAIL_ID`) REFERENCES `student` (`EMAIL_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `CART_FK1` FOREIGN KEY (`EMAIL_ID`) REFERENCES `student` (`EMAIL_ID`),
  ADD CONSTRAINT `CART_FK2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `PAYMENT_FK1` FOREIGN KEY (`TRANSACTION_ID`) REFERENCES `transaction` (`TRANSACTION_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_fk1` FOREIGN KEY (`EMAIL_ID`) REFERENCES `student` (`EMAIL_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
