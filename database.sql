-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 06:15 AM
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
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `ID` varchar(15) NOT NULL,
  `post` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `email`, `password`, `ID`, `post`) VALUES
('admin', 'admin@gmail.com', '1234', 'J4NF830IM2RBT', 'admin'),
('saifulla', 'saifulla@gmail.com', '1234', 'LY09DWABNVG5M', ''),
('salam', 'salam@gmail.com', '123', 'KVYD9HQU54OEL', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `ID` varchar(15) DEFAULT NULL,
  `Payment_method` varchar(20) DEFAULT NULL,
  `bk_num` int(11) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `acc_name` varchar(255) DEFAULT NULL,
  `acc_type` varchar(30) DEFAULT NULL,
  `acc_num` varchar(20) DEFAULT NULL,
  `routing_num` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Name`, `email`, `password`, `ID`, `Payment_method`, `bk_num`, `bank_name`, `branch_name`, `acc_name`, `acc_type`, `acc_num`, `routing_num`) VALUES
('aa', 'aa@gmail.com', '123', 'Q605T23LSUZYO', 'Bank', NULL, 'sfdjs', 'dsfdsf', 'sssfa', 'Personal', '3243535', ''),
('assaa', 'asaa@gmail.com', '1234', '9TA5W2IURVJ6Y', 'Bank', NULL, 'sdbbs', 'vsbdvcsc', '354354', 'Savings', '545445', ''),
('bb', 'bb@gmail.com', '123', 'GT2DS3JPZC7E9', 'Bank', NULL, 'nbvnv', 'fvcxvc', 'cscs', 'Personal', '6576576568', ''),
('bijoy', 'bijoy@gmail.com', '1234', 'IEUTW0VM5HCA9', 'Bkash', 2094223, NULL, NULL, NULL, NULL, NULL, NULL),
('cc', 'cc@gmail.com', '123', 'YCEBR3GN9Z16T', 'Bkash', 2147483647, NULL, NULL, NULL, NULL, NULL, NULL),
('dd,M6WY2AOH34D50', 'dd@gmail.com', '123', 'M6WY2AOH34D50', 'Bank', NULL, 'nbvnv', 'fvcxvc', 'cscs', 'Personal', '6576576568', ''),
('ee', 'ee@gmail.com', '123', '7I5RUHKNFZE4J', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ff', 'ff@gmail.com', '123', 'OAMK56RUD7ZY1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('titas', 'support@unishopr.com', '12345', 'MUX62TS35OR9H', 'Bkash', 1308986610, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `my_location`
--

CREATE TABLE `my_location` (
  `ID` varchar(15) NOT NULL,
  `Shop_name` varchar(100) NOT NULL,
  `Pick_up_address` text NOT NULL,
  `Phone_num` varchar(11) DEFAULT NULL,
  `select_address` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_location`
--

INSERT INTO `my_location` (`ID`, `Shop_name`, `Pick_up_address`, `Phone_num`, `select_address`) VALUES
('GT2DS3JPZC7E9', 'sadsd', '32/1,ywtywjd', '65261537', NULL),
('GT2DS3JPZC7E9', 'tretretr', 'rdr,fjffj', '7676', 'Selected'),
('GT2DS3JPZC7E9', 'bvbdfd', 'bvxfdf', '75776567', NULL),
('GT2DS3JPZC7E9', 'dsds', '212/12,bvcc,sbdvs', '323231', NULL),
('GT2DS3JPZC7E9', 'dfsdfs', '1212/12,sdbsjdb,csdj', '3423131', NULL),
('GT2DS3JPZC7E9', 'fdsfdsre', 'dfadas,fsdfs', '653543546', NULL),
('GT2DS3JPZC7E9', 'nfddrdtrsr', 'fftftyty.uuyuyf', '65675675', NULL),
('Q605T23LSUZYO', 'sjdfsf', 'sds,sduys,sdsy', '01222222222', 'Selected'),
('M6WY2AOH34D50', 'dssmfbds', 'sdf,sdysuyd,sds', '34242', 'Selected'),
('YCEBR3GN9Z16T', 'bvfdrser', '32/1,fdfd,fsfdf,dfdf', '56434237', 'Selected'),
('9TA5W2IURVJ6Y', 'nmbnmdb', '32/2,sdvsj,sdsjd', '234234', NULL),
('9TA5W2IURVJ6Y', 'sds', 'sdsd', '324324', NULL),
('9TA5W2IURVJ6Y', 'sds', 'asas,afsdafs', '234244', 'Selected'),
('Q605T23LSUZYO', 'fvdvfdf', '42/3,dsfdsf,fdfd', '01343433242', NULL),
('Q605T23LSUZYO', 'sjdfsf', 'fdsfds,fdfdfd,fbvvfd', '01343543542', NULL),
('7I5RUHKNFZE4J', 'eeeefs', '31/2,bvszf,dfsfd,sdads', '43545355', 'Selected'),
('IEUTW0VM5HCA9', 'unishopr', 'mirpur-12', '01768722387', 'Selected'),
('MUX62TS35OR9H', 'unishpr', 'uttara', '01308986610', 'Selected');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `date` date NOT NULL,
  `ID` varchar(15) NOT NULL,
  `Product_id` varchar(15) DEFAULT NULL,
  `Shop_name` varchar(50) NOT NULL,
  `Phone_num` varchar(11) DEFAULT NULL,
  `C_name` varchar(200) NOT NULL,
  `Pick_up_address` text NOT NULL,
  `Delivery_address` text NOT NULL,
  `Product_weight` int(11) NOT NULL,
  `Cash_collection` int(11) NOT NULL,
  `delivery_charge` int(11) NOT NULL,
  `Payment_method` text NOT NULL,
  `Instructions` text NOT NULL,
  `agent_name` varchar(200) DEFAULT NULL,
  `agent_phone` varchar(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `Payment_status` varchar(30) NOT NULL,
  `Action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`date`, `ID`, `Product_id`, `Shop_name`, `Phone_num`, `C_name`, `Pick_up_address`, `Delivery_address`, `Product_weight`, `Cash_collection`, `delivery_charge`, `Payment_method`, `Instructions`, `agent_name`, `agent_phone`, `status`, `Payment_status`, `Action`) VALUES
('2021-03-01', 'M6WY2AOH34D50', '23KHUBX1ELFZW', 'sadsd', '324441', '', '', '23/2,Dhaka,Dhaka', 2312, 213, 0, '', '--', '', '0', 'Not picked up yet', 'settled', '--'),
('2021-03-01', 'M6WY2AOH34D50', 'QZKP61T4LBM5W', 'sdsd', '324441', '', '', '23/2,Narayangonj,Dhaka', 1212, 1212, 0, '', '--', '', '0', 'Not picked up yet', 'settled', '--'),
('2021-03-01', 'M6WY2AOH34D50', 'Y5QGESIBZ92HW', 'sadsd', '324441', '', '', '23/2,Barishal,Barishal', 2312, 213, 0, '', '--', '', '0', 'Not picked up yet', 'settled', '--'),
('2021-03-01', '9TA5W2IURVJ6Y', '3DZ0VKJ2OLTAI', 'sadsd', '65261537', '', '', '23/2,Narayangonj,Dhaka', 1000, 100, 0, '', '--', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-08', 'YCEBR3GN9Z16T', 'I8JKWQXCBEUD1', 'bvfdrser', '4534545', '', '32/1,fdfd,fsfdf,dfdf', 'reter,hght,fg,Narayangonj,Dhaka', 10000, 10000, 0, 'Bkash Number : 23222342342', 'ghfhgfhf,dfgdfg', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-08', 'YCEBR3GN9Z16T', '7ON9FVDKSX406', 'bvfdrser', '1234567890', 'hello', '32/1,fdfd,fsfdf,dfdf', '12/1,shdgshj,shdgj,Narayangonj,Dhaka', 1000, 100, 0, 'Bkash Number : 2147483647', 'ererw', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-08', 'YCEBR3GN9Z16T', 'ZTI7P2N013KSA', 'bvfdrser', '125343688', 'hello2', '32/1,fdfd,fsfdf,dfdf', 'ewwygdgd,dygsuyd,Gazipur,Dhaka', 1002, 1234, 0, 'Bkash Number : 2147483647', 'cfdfdfwe', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-10', 'Q605T23LSUZYO', '3NZYS1MXI9AK8', 'sjdfsf', '4535456', 'dffsd fdf', 'sds,sduys,sdsy', 'fffdfd,Patuakhali,Barishal', 1500, 1400, 320, 'Bkash Number : 232223', 'hjghjgj,ffdf', '', '0', 'Not picked up yet', 'Not settled', '--'),
('2021-03-10', 'Q605T23LSUZYO', 'O8K3XWYNG5TZF', 'sjdfsf', '454546', 'retetjf vcff', 'sds,sduys,sdsy', 'fdfd,jjf,Barishal,Barishal', 400, 1000, 160, 'Bkash Number : 232223', 'dfdsfs', '', '0', 'Not picked up yet', 'Not settled', '--'),
('2021-03-09', 'Q605T23LSUZYO', '48D3AKSVY6BO5', 'sjdfsf', '545656', 'fdfs', 'sds,sduys,sdsy', 'ytutyu,Dhaka,Dhaka', 100, 200, 0, 'Bkash Number : 232223', 'ghfhfh', 'saifulla', '01232313223', 'Delivered', 'Settled', 'Complete'),
('2021-03-09', 'Q605T23LSUZYO', 'T32I9XGEOJK0L', 'sjdfsf', '54646', 'fdgfd', 'sds,sduys,sdsy', 'ddfgd,,Dhaka', 200, 100, 0, 'Bkash Number : 232223', 'dfdsfsda', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-09', 'Q605T23LSUZYO', '857BQTXKRMNY2', 'sjdfsf', '232344', 'dfsf', 'sds,sduys,sdsy', 'jhghyhtgyt,Narayangonj,Dhaka', 200, 200, 60, 'Bkash Number : 232223', 'yfryty', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-09', '9TA5W2IURVJ6Y', '9JPK35CXFVZTM', 'nmbnmdb', '34235', 'xccxcs', '32/2,sdvsj,sdsjd', '30/1,8c#4 pallabi,Mirpur,Dhaka,Dhaka', 200, 200, 60, 'Bkash Number : 12345', 'sdsdfsd,dfdf', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-09', 'Q605T23LSUZYO', '0BNKSV715GUPC', 'sjdfsf', '1235467282', 'zuma', 'sds,sduys,sdsy', 'alubdi,Narayangonj,Dhaka', 500, 100, 60, 'Bkash Number : 232223', '', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-09', 'Q605T23LSUZYO', '83S0ELGITR1QK', 'sjdfsf', '1256373822', 'bijoy', 'sds,sduys,sdsy', 'jhilpar,Narayangonj,Dhaka', 300, 200, 60, 'Bkash Number : 232223', '', '', '0', 'Not picked up yet', 'Settled', 'Complete'),
('2021-03-10', 'Q605T23LSUZYO', 'YN63QJ8E7H9PV', 'sjdfsf', '2412424', 'cvdfffs', 'sds,sduys,sdsy', '32/1,sd,sadfsa,Narayangonj,Dhaka', 500, 100, 60, 'Bank Name : sfadj, Branch Name : sbbdvsd sdfsdfj, Account Holder Name : 3432432, Account Type : Personal, Account Number : 6576576568, Routing Number : 33243453 ', 'sdsdbb,sfjdjs', '', '0', 'Not picked up yet', 'Not settled', '--'),
('2021-03-10', 'Q605T23LSUZYO', 'RNDYM94F872T1', 'sjdfsf', '4535456', 'dffsdjjfjj', 'sds,sduys,sdsy', 'fdfdf,jjff,Gazipur,Dhaka', 400, 4000, 60, 'Bkash Number : 645654646', 'hjghjgj', '', '0', 'Not picked up yet', 'Not settled', '--'),
('2021-03-10', 'Q605T23LSUZYO', '8UDNWBV20TAQO', 'sjdfsf', '4535456', 'dffsdjjfjj', 'sds,sduys,sdsy', 'fdfdf,jjff,Gazipur,Dhaka', 400, 4000, 60, 'Bkash Number : 645654646', 'hjghjgj', '', '0', 'Not picked up yet', 'Not settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', 'XJS9P7KCNA5LO', 'sjdfsf', '12345', 'dsdsd', 'sds,sduys,sdsy', 'wew,Patuakhali,Barishal', 123, 1212, 160, 'Bkash Number : 645654646', '', 'salam', '213230', 'Not picked up yet', 'Settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', 'Y0ZFKUQMINR7T', 'sjdfsf', '1234', '323123', 'sds,sduys,sdsy', 'wewqe,Dhaka,Dhaka', 123, 213, 60, 'Bkash Number : 645654646', '', 'saifulla', '01343546764', 'Picked Up', 'Settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', 'K6VNS0MZQY4PJ', 'sjdfsf', '1234', '12313', 'sds,sduys,sdsy', 'dsfds,Narayangonj,Dhaka', 123, 2131, 60, 'Bkash Number : 645654646', '', 'dsfdsfsd', '435434325', 'Not picked up yet', 'Settled', 'Canceled'),
('2021-03-12', 'Q605T23LSUZYO', 'OT2WQJCSKD1M9', 'sjdfsf', '1234', 'sd', 'sds,sduys,sdsy', 'edewd,Narayangonj,Dhaka', 123, 23, 60, 'Bkash Number : 645654646', '', 'saifulla', '01234533254', 'On the way', 'Settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', '78SFKEQPBUM6O', 'sjdfsf', '1233333332', '2wewe', 'sds,sduys,sdsy', 'dewde,Narayangonj,Dhaka', 123, 123, 60, 'Bkash Number : 645654646', '', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', '3XH8ROLW41JPF', 'sjdfsf', '1234', '32', 'sds,sduys,sdsy', 'dsfdsf,Narayangonj,Dhaka', 2323, 212, 180, 'Bkash Number : 645654646', '', 'salam', '213230', 'Delivered', 'Settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', 'BAL8NDUXER2H3', 'sjdfsf', '32432', 'dsad', 'sds,sduys,sdsy', 'sfdsdf,Narayangonj,Dhaka', 232, 23, 60, 'Bkash Number : 645654646', '', 'salam', '213230', 'Not picked up yet', 'Settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', '69XD3BUNV8KLS', 'sjdfsf', '1111111', 'ddddd', 'sds,sduys,sdsy', 'wwwww,Dhaka,Dhaka', 1111, 1111, 120, 'Bkash Number : 645654646', 'sdwdwd', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-12', 'Q605T23LSUZYO', 'GWDB3YEV9MNXJ', 'sjdfsf', '2222', 'bbbb', 'sds,sduys,sdsy', 'sss,Dhaka,Dhaka', 2222, 222, 180, 'Bkash Number : 645654646', '', '', '0', 'Not picked up yet', 'Settled', '--'),
('2021-03-19', 'Q605T23LSUZYO', 'KEF109LR4DNPI', 'sjdfsf', '01234456796', 'fjf', 'sds,sduys,sdsy', 'jfffj,Narayangonj,Dhaka', 54, 67567, 60, 'Bkash Number : 645654646', '', 'salam', '01356934345', 'Not picked up yet', 'Not settled', '--'),
('2021-03-22', 'IEUTW0VM5HCA9', 'V1I97T6PFALHN', 'unishopr', '01343434434', 'nayem', 'mirpur-12', 'sfjds,Narayangonj,Dhaka', 200, 200, 60, 'Bkash Number : 2094223', 'sdsfff', 'salam', '01233434332', 'Picked Up', 'Not settled', '--'),
('2021-03-22', 'MUX62TS35OR9H', 'SN69CYMBFUVP4', 'unishpr', '01961165474', 'sumon', 'uttara', 'mirpur-12, Dhaka,Dhaka,Dhaka', 500, 3280, 60, 'Bkash Number : 1308986610', 'Call before delivery', 'saifulla', '01873522975', 'Delivered', 'Settled', '--');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `Product_id` varchar(15) NOT NULL,
  `picked_up` varchar(100) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `delivered` varchar(100) NOT NULL,
  `payments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`Product_id`, `picked_up`, `medium`, `delivered`, `payments`) VALUES
('3XH8ROLW41JPF', 'Mar, 14 2021 04:38 PM', 'Mar, 14 2021 04:58 PM', 'Mar, 14 2021 04:59 PM', ''),
('48D3AKSVY6BO5', 'Mar, 23 2021 05:59 AM', 'Mar, 23 2021 05:59 AM', 'Mar, 23 2021 05:59 AM', 'Mar, 23 2021 05:57 AM'),
('BAL8NDUXER2H3', '', '', '', ''),
('KEF109LR4DNPI', '', '', '', ''),
('OT2WQJCSKD1M9', 'Mar, 22 2021 06:58 PM', 'Mar, 23 2021 05:10 AM', '', ''),
('SN69CYMBFUVP4', 'Mar, 22 2021 07:25 PM', 'Mar, 22 2021 07:25 PM', 'Mar, 22 2021 07:26 PM', ''),
('V1I97T6PFALHN', 'Mar, 22 2021 06:48 PM', '', '', ''),
('XJS9P7KCNA5LO', '', '', '', ''),
('Y0ZFKUQMINR7T', 'Mar, 14 2021 04:57 PM', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `my_location`
--
ALTER TABLE `my_location`
  ADD UNIQUE KEY `Pick_up_address` (`Pick_up_address`) USING HASH;

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD UNIQUE KEY `Product id` (`Product_id`) USING BTREE;

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`Product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
