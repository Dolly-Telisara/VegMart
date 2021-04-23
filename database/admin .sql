-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 07:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(6, 26, '::1', 4, 1),
(10, 11, '::1', 7, 1),
(11, 45, '::1', 7, 1),
(44, 5, '::1', 3, 0),
(49, 60, '::1', 8, 1),
(50, 61, '::1', 8, 1),
(52, 5, '::1', 9, 1),
(55, 5, '::1', 14, 1),
(71, 61, '127.0.0.1', -1, 1),
(148, 71, '::1', 6, 2),
(179, 18, '::1', 205, 1),
(206, 47, '::1', -1, 1),
(214, 16, '::1', -1, 1),
(215, 17, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Pulses');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy_master`
--

CREATE TABLE `deliveryboy_master` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile_no` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Creation_date` varchar(50) NOT NULL,
  `Creation_Time` varchar(50) NOT NULL,
  `Stamp_userid` int(10) NOT NULL,
  `Stamp_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryboy_master`
--

INSERT INTO `deliveryboy_master` (`Id`, `Name`, `Mobile_no`, `Email`, `Picture`, `Status`, `Creation_date`, `Creation_Time`, `Stamp_userid`, `Stamp_username`) VALUES
(7, 'john', 2147483647, 'john@gmail.com', '20022021043504.jpg', 'Y', '20-Feb-2021', '04:35:04 pm', 12, 'dolly'),
(8, 'Tom', 2147483647, 'tom@gmail.com', '20022021043605.jpg', 'Y', '20-Feb-2021', '04:36:05 pm', 12, 'dolly'),
(9, 'Sam', 1234567890, 'sam@gmail.com', '20022021043636.jpg', 'Y', '20-Feb-2021', '04:36:36 pm', 12, 'dolly'),
(11, 'Mack', 1234567890, 'mack@yahoo.com', '20022021043807.jpg', 'Y', '20-Feb-2021', '04:38:07 pm', 12, 'dolly');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `p_status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(8, 207, 17, 1, 'trx243e567', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 12, 'Puneeth', 'puneethreddy951@gmail.com', 'Bangalore, Kumbalagodu, Karnataka', 'Bangalore', 'Karnataka', 560074, 'pokjhgfcxc', '4321 2345 6788 7654', '12/90', 3, 77000, 1234),
(2, 16, 'venky vs', 'venkey@gmail.com', 'snhdgvajfehyfygv', 'asdjbhfkeur', 'hydrebad', 411011, 'abhishek', '245564576980', '05/25', 1, 3500, 343),
(3, 16, 'venky vs', 'venkey@gmail.com', 'snhdgvajfehyfygv', 'asdjbhfkeur', 'hydrebad', 411011, 'abhishek', '3645 7879 5788', '05/25', 1, 25000, 342),
(4, 205, 'John Mathew', 'john@yahoo.com', 'pune', 'Pune', 'Maharashtra', 411011, 'john', '3432 156789 076', '10/32', 3, 315, 987),
(5, 205, 'John Mathew', 'john@yahoo.com', 'pune', 'Pune', 'Maharashtra', 411011, 'john', '123456789087', '12/32', 1, 120, 765),
(6, 206, 'john', 'john@gmail.com', 'oddisa', 'london', 'hydrebad', 411011, 'john', '123456789098', '07/34', 2, 230, 987),
(7, 206, 'Tom Louis', 'tom@yahoo.com', 'mumbai', 'mumbai', 'Maharashtra', 411022, 'Tom', '123456789009', '12/34', 1, 100, 543),
(8, 207, 'Sam T', 'sam@yahoo.com', 'chennai', 'chennai', 'Tamil Nadu', 411033, 'sam', '1234567890123456', '10/30', 1, 100, 987),
(9, 207, 'Sam T', 'sam@yahoo.com', 'chennai', 'chennai', 'Tamil Nadu', 411033, 'sam', '1234567890123456', '10/32', 1, 50, 456),
(10, 211, 'joshua Mathew', 'joshua@gmail.com', 'Mumbai', 'Mumbai', 'Maharashtra', 411002, 'joshua', '123456789098', '12/34', 2, 75, 345),
(11, 207, 'Sam T', 'sam@yahoo.com', 'chennai', 'chennai', 'Tamil Nadu', 411033, 'sam', '1234567890123456', '10/30', 1, 130, 987),
(12, 206, 'Tom Louis', 'tom@yahoo.com', 'mumbai', 'mumbai', 'Maharashtra', 411002, 'Tom', '5678 9043 2134', '12/32', 1, 100, 645),
(13, 206, 'Tom Louis', 'tom@yahoo.com', 'mumbai', 'mumbai', 'Maharashtra', 411002, 'Tom', '987654321012', '12/32', 1, 260, 345),
(14, 206, 'Tom Louis', 'tom@yahoo.com', 'mumbai', 'mumbai', 'Maharashtra', 411002, 'Tom', '6789 0543 2134', '10/32', 3, 450, 654);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(73, 1, 1, 1, 5000),
(74, 1, 4, 2, 64000),
(75, 1, 8, 1, 40000),
(91, 2, 73, 1, 3500),
(92, 3, 2, 1, 25000),
(93, 5, 23, 1, 60),
(94, 5, 22, 1, 120),
(95, 6, 21, 1, 40),
(96, 6, 19, 1, 150),
(97, 4, 19, 1, 150),
(98, 4, 17, 1, 120),
(99, 4, 20, 1, 45),
(100, 5, 17, 1, 120),
(101, 6, 17, 1, 100),
(102, 6, 19, 1, 130),
(103, 7, 17, 1, 100),
(104, 8, 17, 1, 100),
(105, 9, 23, 1, 50),
(106, 10, 31, 1, 30),
(107, 10, 29, 1, 45),
(108, 11, 19, 1, 130),
(109, 12, 22, 1, 100),
(110, 13, 16, 1, 260),
(111, 14, 16, 1, 260),
(112, 14, 40, 1, 80),
(113, 14, 49, 1, 110);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `Cat_name` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `Status` varchar(255) NOT NULL,
  `product_keywords` text NOT NULL,
  `Stamp_userid` int(10) NOT NULL,
  `Stamp_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `Cat_name`, `product_title`, `product_price`, `product_discount`, `product_desc`, `product_image`, `Status`, `product_keywords`, `Stamp_userid`, `Stamp_username`) VALUES
(16, 1, 'Fruit', 'strawberry', 300, 260, '', '1612032744_pexels-pixabay-89778.jpg', 'Y', 'strawberry', 12, 'dolly'),
(17, 1, 'Fruit', 'kiwi', 120, 100, '', '1612033135_engin-akyurt-jPVcZsxRGJo-unsplash.jpg', 'Y', 'kiwi', 12, 'dolly'),
(18, 1, 'Fruit', 'Grapes', 90, 75, '', '1612033197_pexels-pixabay-65872.jpg', 'Y', 'grapes', 12, 'dolly'),
(19, 1, 'Fruit', 'Apple', 150, 130, '', '1612033265_matheus-cenali-wXuzS9xR49M-unsplash.jpg', 'Y', 'Apple', 12, 'dolly'),
(20, 1, 'Fruit', 'Banana', 45, 40, '', '1612033352_29.png', 'Y', 'banana', 12, 'dolly'),
(21, 1, 'Fruit', 'Melon', 40, 30, '', '1612033441_pexels-karolina-grabowska-4397750.jpg', 'Y', 'melon', 12, 'dolly'),
(22, 1, 'Fruit', 'Litchi', 120, 100, '', '1612033489_pexels-manoj-patil-5097676.jpg', 'Y', 'litchi', 12, 'dolly'),
(23, 1, 'Fruit', 'Orange', 60, 50, '', '1612033545_pexels-pixabay-327098.jpg', 'Y', 'orange', 12, 'dolly'),
(24, 1, 'Fruit', 'Pineapple', 50, 40, '', '1612033591_miguel-andrade-nAOZCYcLND8-unsplash.jpg', 'Y', 'pineapple', 12, 'dolly'),
(25, 1, 'Fruit', 'Watermelon', 60, 50, '', '1612033662_pexels-engin-akyurt-2894205.jpg', 'Y', 'watermelon', 12, 'dolly'),
(26, 1, 'Fruit', 'Pear', 150, 120, '', '1612033707_jonathan-mast-RW6Wz9QaoKk-unsplash.jpg', 'Y', 'pear', 12, 'dolly'),
(27, 1, 'Fruit', 'Papaya', 40, 30, '', '1612033808_pexels-alleksana-4113834.jpg', 'Y', 'papaya', 12, 'dolly'),
(29, 2, 'Vegetable', 'Carrot', 50, 45, '', '1612033928_pexels-chokniti-khongchum-2280550.jpg', 'Y', 'carrot', 12, 'dolly'),
(30, 2, 'Vegetable', 'Cabbage', 40, 35, '', '1612034044_natasha-skov-ujh4hU9S-KA-unsplash.jpg', 'Y', 'cabbage', 12, 'dolly'),
(31, 2, 'Vegetable', 'Potato', 35, 30, '', '1612034115_monika-grabkowska-ECxiHN817xE-unsplash.jpg', 'Y', 'potato', 12, 'dolly'),
(32, 2, 'Vegetable', 'spinach', 20, 15, '', '1612034153_elianna-friedman-4jpNPu7IW8k-unsplash.jpg', 'Y', 'spinach', 12, 'dolly'),
(33, 2, 'Vegetable', 'Tomato', 20, 18, '', '1612034213_pexels-pixabay-248420.jpg', 'Y', 'tomato', 12, 'dolly'),
(34, 1, 'Fruit', 'Custard apple', 80, 70, '', '1612034323_pexels-iconcom-214168.jpg', 'Y', 'custard apple', 12, 'dolly'),
(35, 2, 'Vegetable', 'Okra', 30, 25, '', '1612034411_fresh-lady-finger-500x500.jpg', 'Y', 'lady finger', 12, 'dolly'),
(36, 3, 'Pulses', 'Moong', 40, 35, '', '1612034503_Sprout-Mung-Bean-500x500.jpg', 'Y', 'moong', 12, 'dolly'),
(37, 3, 'Pulses', 'Matki', 60, 55, '', '1612034549_Sprouted-Matki.jpg', 'Y', 'matki', 12, 'dolly'),
(38, 3, 'Pulses', 'Lentil sprouts', 45, 40, '', '1612034606_how-to-sprout-lentils-sprouted-lentils-picture.jpg', 'Y', 'lentil sprouts', 12, 'dolly'),
(39, 3, 'Pulses', 'Kidney beans', 80, 70, '', '1612034647_45944e6a0e1f49ad784648d9483d2d3b.jpg', 'Y', 'kidney beans', 12, 'dolly'),
(40, 2, 'Vegetable', 'Brocoli', 90, 80, '', '1612034715_12.png', 'Y', 'brocoli', 12, 'dolly'),
(41, 1, 'Fruit', 'Sweet lime', 50, 40, '', '1612034789_32.png', 'Y', 'lime', 12, 'dolly'),
(42, 3, 'Pulses', 'Green pea', 75, 70, '', '1612034841_depositphotos_14662083-stock-photo-germinated-peas.jpg', 'Y', 'green pea', 12, 'dolly'),
(43, 1, 'Fruit', 'Pomegranate', 60, 55, '', '1612034990_pexels-iryna-ilieva-3570410.jpg', 'Y', 'pomegranate', 12, 'dolly'),
(44, 2, 'Vegetable', 'Brinjal', 120, 110, '', '1612035068_31.png', 'Y', 'brinjal', 12, 'dolly'),
(45, 3, 'Pulses', 'soyabean', 50, 40, '', '1612035122_soybean-933026_1920.jpg', 'Y', 'soya bean', 12, 'dolly'),
(48, 3, 'Pulses', 'kidney beans', 40, 30, '', '1614510945_Kidney-bean-seeds.jpg', 'Y', 'kidney bean', 12, 'dolly'),
(49, 3, 'Pulses', 'dal', 120, 110, '', '1614511519_pic19.jpg', 'Y', 'dal', 12, 'dolly');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Creation_date` varchar(100) NOT NULL,
  `Creation_Time` varchar(100) NOT NULL,
  `Stamp_userid` int(11) NOT NULL,
  `Stamp_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `Picture`, `Status`, `Creation_date`, `Creation_Time`, `Stamp_userid`, `Stamp_username`) VALUES
(2, '7122020120739.png', '', '07-Dec-2020', '12:07:39 am', 24, 'pooja'),
(3, '7122020120750.jpg', 'Y', '07-Dec-2020', '12:21:19 am', 24, 'pooja'),
(5, '27012021115553.jpg', 'Y', '27-Jan-2021', '11:55:53 pm', 12, 'dolly'),
(6, '27012021115645.jpg', 'Y', '27-Jan-2021', '11:56:45 pm', 12, 'dolly'),
(7, '28012021122530.jpg', 'Y', '28-Jan-2021', '12:25:30 am', 12, 'dolly');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_master`
--

CREATE TABLE `supplier_master` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Mobile_No` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gst_No` varchar(15) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Creationdate` varchar(50) NOT NULL,
  `CreationTime` varchar(50) NOT NULL,
  `stampid` int(11) NOT NULL,
  `stampusername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_master`
--

INSERT INTO `supplier_master` (`Id`, `Name`, `Address`, `Mobile_No`, `Email`, `Gst_No`, `Status`, `Creationdate`, `CreationTime`, `stampid`, `stampusername`) VALUES
(3, 'brent', 'banglore', '6789054321', 'brent@gmail.com', '12bcdef3456i3z7', 'Y', '27-Nov-2020', '12:18:26 am', 0, ''),
(23, 'tom', 'kerala', '5432167890', 'tom@gmail.com', '41abcde2345h2z6', 'Y', '06-Dec-2020', '11:32:12 pm', 0, ''),
(24, 'emily', 'mubai', '7788990022', 'emily@gmail.com', '41abcde2345h2z6', 'Y', '07-Dec-2020', '12:27:38 am', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(12, 'puneeth', 'Reddy', 'puneethreddy951@gmail.com', 'puneeth', '9448121558', '123456789', 'sdcjns,djc'),
(15, 'hemu', 'ajhgdg', 'puneethreddy951@gmail.com', '346778', '536487276', ',mdnbca', 'asdmhmhvbv'),
(16, 'venky', 'vs', 'venkey@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(19, 'abhishek', 'bs', 'abhishekbs@gmail.com', 'asdcsdcc', '9871236534', 'bangalore', 'hassan'),
(21, 'prajval', 'mcta', 'prajvalmcta@gmail.com', '1234545662', '202-555-01', 'bangalore', 'kumbalagodu'),
(22, 'puneeth', 'v', 'hemu@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(23, 'hemanth', 'reddy', 'hemanth@gmail.com', 'Puneeth@123', '9876543234', 'Bangalore', 'Kumbalagodu'),
(24, 'newuser', 'user', 'newuser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(203, 'Peter', 'DSouza', 'peter@yahoo.com', '123456789', '9876543210', 'Camp', 'Pune'),
(204, 'Emma', 'Watson', 'emma@yahoo.com', 'emma12345', '9087654321', 'Bund Garden road', 'Pune'),
(205, 'John', 'Mathew', 'john@yahoo.com', '123456789', '9123456708', 'pune', 'Pune'),
(206, 'Tom', 'Louis', 'tom@yahoo.com', '123456789', '9023145678', 'mumbai', 'mumbai'),
(207, 'Sam', 'T', 'sam@yahoo.com', '123456789', '9043215678', 'chennai', 'chennai'),
(208, 'suz', 'T', 'suz@yahoo.com', '123456789', '9043215678', 'chennai', 'chennai'),
(209, 'som', 'T', 'som@yahoo.com', '123456789', '9043215678', 'chennai', 'chennai'),
(210, 'Pat', 'S', 'pat@yahho.com', '123456789', '8907654321', 'kolkatta', 'kolkatta'),
(211, 'joshua', 'Mathew', 'joshua@gmail.com', '123456789', '8790654321', 'Mumbai', 'Mumbai');

--
-- Triggers `user_info`
--
DELIMITER $$
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info` FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_backup`
--

CREATE TABLE `user_info_backup` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(12, 'puneeth', 'Reddy', 'puneethreddy951@gmail.com', '123456789', '9448121558', '123456789', 'sdcjns,djc'),
(14, 'hemanthu', 'reddy', 'hemanthreddy951@gmail.com', '123456788', '6526436723', 's,dc wfjvnvn', 'b efhfhvvbr'),
(15, 'hemu', 'ajhgdg', 'keeru@gmail.com', '346778', '536487276', ',mdnbca', 'asdmhmhvbv'),
(16, 'venky', 'vs', 'venkey@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(19, 'abhishek', 'bs', 'abhishekbs@gmail.com', 'asdcsdcc', '9871236534', 'bangalore', 'hassan'),
(20, 'pramod', 'vh', 'pramod@gmail.com', '124335353', '9767645653', 'ksbdfcdf', 'sjrgrevgsib'),
(21, 'prajval', 'mcta', 'prajvalmcta@gmail.com', '1234545662', '202-555-01', 'bangalore', 'kumbalagodu'),
(22, 'puneeth', 'v', 'hemu@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(23, 'hemanth', 'reddy', 'hemanth@gmail.com', 'Puneeth@123', '9876543234', 'Bangalore', 'Kumbalagodu'),
(24, 'newuser', 'user', 'newuser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(25, 'otheruser', 'user', 'otheruser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(203, 'Peter', 'DSouza', 'peter@yahoo.com', '123456789', '9876543210', 'Camp', 'Pune'),
(204, 'Emma', 'Watson', 'emma@yahoo.com', 'emma12345', '9087654321', 'Bund Garden road', 'Pune'),
(205, 'John', 'Mathew', 'john@yahoo.com', '123456789', '9123456708', 'pune', 'Pune'),
(206, 'Tom', 'Louis', 'tom@yahoo.com', '123456789', '9023145678', 'mumbai', 'mumbai'),
(207, 'Sam', 'T', 'sam@yahoo.com', '123456789', '9043215678', 'chennai', 'chennai'),
(208, 'suz', 'T', 'suz@yahoo.com', '123456789', '9043215678', 'chennai', 'chennai'),
(209, 'som', 'T', 'som@yahoo.com', '123456789', '9043215678', 'chennai', 'chennai'),
(210, 'Pat', 'S', 'pat@yahho.com', '123456789', '8907654321', 'kolkatta', 'kolkatta'),
(211, 'joshua', 'Mathew', 'joshua@gmail.com', '123456789', '8790654321', 'Mumbai', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile_No` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Role` int(10) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Creationdate` varchar(50) NOT NULL,
  `CreationTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`Id`, `Name`, `Mobile_No`, `Email`, `Password`, `Role`, `Status`, `Creationdate`, `CreationTime`) VALUES
(12, 'dolly', '123456789', 'dolly@gmail.com', 'dolly', 3, 'Y', '23-Nov-2020', '09:55:57 am'),
(24, 'pooja', '5643212534', 'pooja123@gmail.com', 'pooja', 1, 'Y', '23-Nov-2020', '09:57:16 am'),
(30, 'anam', '9876543210', 'anam@gmail.com', 'dnam', 2, 'Y', '04-Dec-2020', '03:52:58 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `deliveryboy_master`
--
ALTER TABLE `deliveryboy_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_master`
--
ALTER TABLE `supplier_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveryboy_master`
--
ALTER TABLE `deliveryboy_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier_master`
--
ALTER TABLE `supplier_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`);

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
