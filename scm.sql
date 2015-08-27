-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2015 at 11:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(80) NOT NULL,
  `state` varchar(80) NOT NULL,
  `postal` int(5) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `email` varchar(10) NOT NULL,
  `fax` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `state`, `postal`, `contact`, `email`, `fax`) VALUES
(2, 'Costco', 'Anywhere', 'New York', 'NY', 10021, '2125551212', 'sales@cost', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`itemid` int(11) NOT NULL,
  `itemname` varchar(80) NOT NULL,
  `category` int(11) NOT NULL,
  `purchasingprice` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sellingprice` decimal(10,2) NOT NULL,
  `description` longtext NOT NULL,
  `dateofpurchasing` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `category`, `purchasingprice`, `quantity`, `sellingprice`, `description`, `dateofpurchasing`) VALUES
(2, 'Eggs', 0, '2.71', 30, '0.68', 'Eggs', '2015-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0' COMMENT '9=admin, 0=minimum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `access`) VALUES
('pingle', 'heather', 0),
('admin', 'password', 9);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
`purchaseid` int(11) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemname` varchar(80) NOT NULL,
  `category` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchaseperunit` double NOT NULL,
  `purchasingdate` date NOT NULL,
  `receivingdate` date NOT NULL,
  `returningdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `supplierid`, `itemid`, `itemname`, `category`, `quantity`, `purchaseperunit`, `purchasingdate`, `receivingdate`, `returningdate`) VALUES
(1, 2, 2, 'Eggs', 1, 23, 0.68, '2015-08-26', '2015-09-01', '2015-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `itemname` varchar(80) NOT NULL,
  `quantityofitem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `priceperunit` double NOT NULL,
  `orderdate` date NOT NULL,
  `deliverydate` date NOT NULL,
  `returningdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`orderid`, `customerid`, `itemid`, `category`, `itemname`, `quantityofitem`, `quantity`, `priceperunit`, `orderdate`, `deliverydate`, `returningdate`) VALUES
(1, 2, 2, 0, 'Eggs', 30, 25, 0.68, '2015-08-19', '2015-08-29', '2015-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`supplierid` int(11) NOT NULL,
  `companyname` varchar(80) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(80) NOT NULL,
  `postalcode` int(5) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `emailid` varchar(80) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `state` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierid`, `companyname`, `address`, `city`, `postalcode`, `contactno`, `emailid`, `fax`, `state`) VALUES
(2, 'Sams Club', 'Kingston, NY', 'Kingston', 12345, '8455551212', 'kingston@samsclub.com', '8455551212', 'NY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`supplierid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `supplierid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
