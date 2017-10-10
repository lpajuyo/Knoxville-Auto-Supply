-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 05:50 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knoxville`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `client_name`, `address`, `contact_no`) VALUES
(1, 'dsa', 'dsad', '123');

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

CREATE TABLE `client_order` (
  `orderID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `due` date NOT NULL,
  `userID` varchar(20) NOT NULL,
  `clientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_order`
--

INSERT INTO `client_order` (`orderID`, `date`, `time`, `due`, `userID`, `clientID`) VALUES
(16, '2017-03-02', '12:30:00', '2017-03-02', 'admin', 1),
(17, '2017-09-30', '23:55:00', '2017-10-07', 'admin', 1),
(18, '2017-09-30', '00:08:00', '2017-10-08', 'admin', 1),
(19, '2017-09-30', '00:12:00', '2017-10-08', 'admin', 1),
(20, '2017-09-30', '01:50:00', '2017-10-08', 'admin', 1),
(21, '2017-10-07', '15:53:00', '2017-10-14', 'admin', 1),
(22, '2017-10-07', '15:54:00', '2017-10-14', 'admin', 1),
(23, '2017-10-08', '17:27:00', '2017-10-15', 'admin', 1),
(24, '2017-10-08', '18:10:00', '2017-10-15', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `delivererID` int(11) NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `assigned` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliverer`
--

INSERT INTO `deliverer` (`delivererID`, `vehicle`, `contact_no`, `assigned`) VALUES
(2, 'motor', 1232, 'daddy');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `item_desc` varchar(30) NOT NULL,
  `stocks` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `item_desc`, `stocks`) VALUES
(1, 'Hydraulic', 0),
(2, 'Motorcycle Shock', 20);

-- --------------------------------------------------------

--
-- Table structure for table `sales_agent`
--

CREATE TABLE `sales_agent` (
  `userID` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_agent`
--

INSERT INTO `sales_agent` (`userID`, `password`, `birthdate`, `email`, `contact_no`, `fullname`, `isAdmin`) VALUES
('admin', '1234', '2017-09-01', 'lala', '123', 'lala', 1),
('auds', '1234', '1998-11-12', 'anwaje@yahoo.com', '0919123456', 'Audrey Waje', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `shipID` int(11) NOT NULL,
  `delivererID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`shipID`, `delivererID`, `orderID`) VALUES
(1, 2, 23),
(2, 2, 23),
(4, 2, 23),
(5, 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_status`
--

CREATE TABLE `shipment_status` (
  `statusID` int(11) NOT NULL,
  `shipID` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_status`
--

INSERT INTO `shipment_status` (`statusID`, `shipID`, `status`, `location`, `date`, `time`) VALUES
(4, 5, 'Scheduled', '', '2017-10-10', '23:28:00.000000'),
(6, 5, 'Forwarded to', 'dsad', '2017-10-10', '23:40:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(10) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `itemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transID`, `date`, `time`, `status`, `unit_price`, `quantity`, `itemID`, `orderID`) VALUES
(4, '2017-03-02', '12:30:00', 'quoted', 2, 3, 2, 16),
(5, '2017-09-30', '23:55:00', 'Purchased', 1300, 12, 1, 17),
(6, '2017-09-30', '23:55:00', 'Purchased', 1500, 15, 2, 17),
(7, '2017-09-30', '00:08:00', 'Purchased', 1200, 100, 1, 18),
(8, '2017-09-30', '00:08:00', 'Purchased', 1300, 50, 2, 18),
(9, '2017-09-30', '00:12:00', 'Quoted', 5000, 50, 1, 19),
(10, '2017-09-30', '01:17:00', 'Purchased', 5000, 50, 2, 19),
(11, '2017-09-30', '01:17:00', 'Purchased', 1200, 12, 2, 19),
(12, '2017-09-30', '01:19:00', 'Purchased', 5000, 50, 2, 19),
(13, '2017-09-30', '01:19:00', 'Purchased', 1200, 100, 2, 19),
(14, '2017-09-30', '01:25:00', 'Purchased', 5000, 50, 2, 19),
(15, '2017-09-30', '01:25:00', 'Purchased', 12, 12, 2, 19),
(18, '2017-09-30', '01:56:00', 'Purchased', 12, 120, 2, 20),
(19, '2017-10-02', '23:12:00', 'Returned', 1300, 12, 1, 17),
(30, '2017-10-07', '15:41:00', 'Purchased', 5000, 50, 1, 19),
(31, '2017-10-07', '15:53:00', 'Purchased', 100, 20, 2, 21),
(32, '2017-10-07', '15:54:00', 'Quoted', 100, 10, 2, 22),
(33, '2017-10-08', '17:27:00', 'Quoted', 12, 120, 1, 23),
(34, '2017-10-08', '17:28:00', 'Purchased', 12, 120, 1, 23),
(35, '2017-10-08', '18:10:00', 'Quoted', 4, 2, 1, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `client_order`
--
ALTER TABLE `client_order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD PRIMARY KEY (`delivererID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `sales_agent`
--
ALTER TABLE `sales_agent`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`shipID`,`orderID`),
  ADD KEY `delivererID` (`delivererID`),
  ADD KEY `orderID` (`orderID`) USING BTREE;

--
-- Indexes for table `shipment_status`
--
ALTER TABLE `shipment_status`
  ADD PRIMARY KEY (`statusID`),
  ADD KEY `ship_id` (`shipID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transID`,`itemID`,`orderID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `orderID` (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client_order`
--
ALTER TABLE `client_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `delivererID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shipment_status`
--
ALTER TABLE `shipment_status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_order`
--
ALTER TABLE `client_order`
  ADD CONSTRAINT `client id cascade` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `sales_agent` (`userID`);

--
-- Constraints for table `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`delivererID`) REFERENCES `deliverer` (`delivererID`),
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `client_order` (`orderID`);

--
-- Constraints for table `shipment_status`
--
ALTER TABLE `shipment_status`
  ADD CONSTRAINT `shipment_status_ibfk_1` FOREIGN KEY (`shipID`) REFERENCES `shipment` (`shipID`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `client_order` (`orderID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
