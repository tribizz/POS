-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 09:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `prod_name`, `expected_date`, `note`) VALUES
(15, 'vjvj', 'jjjjdd', 'jjdj', 'jdjjdj', 'jjjdj', '2020-06-26', 'jjdj');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `qty_sold`, `expiry_date`, `date_arrival`) VALUES
(58, 'Bread', 'Mkate', ' Food ', '', '50', '56', '6', '', 0, -3, 10, '2020-07-11', '2020-06-04'),
(59, 'Pampers', 'Baby products', ' Baby products  ', '', '120', '150', '30', '', 0, -23, 30, '2020-06-20', '2020-06-03'),
(60, 'Pampeers', 'baby pamper', ' 3-9 kgs ', '', '63', '150', '87', '', 0, 13, 15, '2020-06-19', '2020-06-18'),
(61, '', 'ksks', ' ', '', '40', '55', '15', '', 0, 10, 10, '', ''),
(62, 'jajaj', 'ksks', '   ', '', '40', '55', '15', '', 0, 7, 10, '', ''),
(63, 'Bread', 'Mkate', ' Food  ', '', '50', '56', '6', '', 0, 3, 10, '2020-07-11', '2020-06-04'),
(64, 'Bread', 'Mkate', ' Food   ', '', '50', '56', '6', '', 0, 10, 10, '2020-07-11', '2020-06-04'),
(65, 'Bread', 'Mkate', ' Food     ', '', '50', '56', '6', 'Kariara wholesalers', 0, 18, 10, '2020-07-11', '2020-06-04'),
(66, 'jjjd', 'qjddjddjq', 'jjjdd   ', '', '60', '79', '19', 'Kariara wholesalers', 0, 10, 10, '2020-07-11', '2020-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `balance`) VALUES
(142, 'RS-32524233', 'Admin', '2006-04-20', 'cash', '8456', '1686', '10000', '', ''),
(143, 'RS-3525322', 'Admin', '2006-07-20', 'cash', '150', '30', '600', '', ''),
(144, 'RS-327332', 'Admin', '2006-07-20', 'cash', '300', '60', '900', '', ''),
(145, 'RS-4359420', 'Admin', '2006-07-20', 'cash', '936', '156', '1000', '', ''),
(146, 'RS-32220320', 'Admin', '2006-07-20', 'cash', '150', '30', '200', '', ''),
(147, 'RS-02323233', 'Admin', '2006-07-20', 'cash', '168', '18', '200', '', ''),
(148, 'RS-393042', 'Admin', '2006-11-20', 'cash', '', '', '100', '', ''),
(149, 'RS-2202322', 'Admin', '2006-11-20', 'cash', '150', '30', '500', '', ''),
(150, 'RS-82029', 'Admin', '2006-11-20', 'cash', '150', '30', '200', '', ''),
(151, 'RS-2323228', 'Admin', '2006-12-20', 'cash', '600', '120', '700', '', ''),
(152, 'RS-9800322', 'Admin', '2020-06-19', 'cash', '300', '60', '400', '', ''),
(153, 'RS-3030432', 'user', '2020-06-19', 'cash', '300', '117', '500', '', ''),
(154, 'RS-33332', 'you', '2020-06-19', 'cash', '150', '30', '200', '', ''),
(155, 'RS-2332332', 'you', '2020-06-19', 'cash', '450', '90', '500', '', ''),
(156, 'RS-393433', 'admin', '2020-06-19', 'cash', '356', '66', '400', '', ''),
(157, 'RS-32800260', 'admin', '0000-00-00', 'cash', '900', '180', '1000', '', ''),
(158, 'RS-5233320', 'admin', '0000-00-00', 'cash', '168', '18', '500', '', ''),
(159, 'RS-22303252', 'admin', '0000-00-00', 'cash', '450', '90', '500', '', ''),
(160, 'RS-033806', 'admin', '0000-00-00', 'cash', '150', '30', '200', '', ''),
(161, 'RS-0023032', 'admin', '2020-06-19', 'cash', '150', '87', '150', '', ''),
(162, 'RS-52272', 'admin', '2020-06-19', 'cash', '56', '6', '56', '', ''),
(163, 'RS-337234', 'admin', '2020-06-19', 'cash', '150', '30', '200', '', ''),
(164, 'RS-2402330', 'user', '0000-00-00', 'cash', '450', '90', '500', '', ''),
(165, 'RS-3304033', 'user', '0000-00-00', 'cash', '450', '90', '500', '', ''),
(166, 'RS-3276303', 'user', '2020-06-19', 'cash', '150', '30', '200', '', ''),
(167, 'RS-22222270', 'user', '2020-06-19', 'cash', '165', '45', '165', '', ''),
(168, 'RS-05034023', 'user', '2020-06-19', 'cash', '168', '18', '168', '', ''),
(169, 'RS-305320', 'admin', '2020-06-19', 'cash', '262', '42', '300', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(315, 'RS-32524233', '58', '1', '56', '6', 'Bread', 'Mkate', ' Food', '56', '', '2006-04-20'),
(316, 'RS-32524233', '59', '56', '8400', '1680', 'Pampers', 'Baby products', ' Baby products', '150', '', '2006-04-20'),
(317, 'RS-9632230', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products', '150', '', '2006-04-20'),
(318, 'RS-3525322', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products', '150', '', '2006-07-20'),
(319, 'RS-327332', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products', '150', '', '2006-07-20'),
(320, 'RS-327332', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products', '150', '', '2006-07-20'),
(321, 'RS-4359420', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products', '150', '', '2006-07-20'),
(323, 'RS-4359420', '58', '5', '280', '30', 'Bread', 'Mkate', ' Food', '56', '', '2006-07-20'),
(324, 'RS-4359420', '58', '1', '56', '6', 'Bread', 'Mkate', ' Food', '56', '', '2006-07-20'),
(325, 'RS-4359420', '59', '3', '450', '90', 'Pampers', 'Baby products', ' Baby products', '150', '', '2006-07-20'),
(326, 'RS-2322720', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2006-07-20'),
(327, 'RS-32220320', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2006-07-20'),
(329, 'RS-02323233', '58', '3', '168', '18', 'Bread', 'Mkate', ' Food ', '56', '', '2006-07-20'),
(330, 'RS-2202322', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2006-11-20'),
(331, 'RS-82029', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2006-11-20'),
(332, 'RS-203530', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2006-11-20'),
(333, 'RS-2323228', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2006-12-20'),
(334, 'RS-2323228', '59', '3', '450', '90', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2006-12-20'),
(335, 'RS-2332333', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(336, 'RS-9800322', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(337, 'RS-9800322', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(338, 'RS-3030432', '60', '1', '150', '87', 'Pampeers', 'baby pamper', ' 3-9 kgs ', '150', '', '0000-00-00'),
(339, 'RS-3030432', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(340, 'RS-33332', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(341, 'RS-2332332', '59', '3', '450', '90', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(342, 'RS-393433', '59', '2', '300', '60', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(343, 'RS-393433', '63', '1', '56', '6', 'Bread', 'Mkate', ' Food  ', '56', '', '0000-00-00'),
(344, 'RS-32800260', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(345, 'RS-32800260', '59', '5', '750', '150', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(346, 'RS-5233320', '58', '3', '168', '18', 'Bread', 'Mkate', ' Food ', '56', '', '0000-00-00'),
(347, 'RS-22303252', '59', '3', '450', '90', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(348, 'RS-033806', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(349, 'RS-0023032', '60', '1', '150', '87', 'Pampeers', 'baby pamper', ' 3-9 kgs ', '150', '', '0000-00-00'),
(350, 'RS-52272', '63', '1', '56', '6', 'Bread', 'Mkate', ' Food  ', '56', '', '0000-00-00'),
(351, 'RS-337234', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2020-06-19'),
(352, 'RS-2402330', '59', '3', '450', '90', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(353, 'RS-3304033', '59', '3', '450', '90', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '0000-00-00'),
(354, 'RS-3276303', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2020-06-19'),
(355, 'RS-22222270', '62', '3', '165', '45', 'jajaj', 'ksks', '  ', '55', '', '2020-06-19'),
(356, 'RS-05034023', '63', '3', '168', '18', 'Bread', 'Mkate', ' Food  ', '56', '', '2020-06-19'),
(357, 'RS-305320', '59', '1', '150', '30', 'Pampers', 'Baby products', ' Baby products  ', '150', '', '2020-06-19'),
(358, 'RS-305320', '63', '1', '56', '6', 'Bread', 'Mkate', ' Food  ', '56', '', '2020-06-19'),
(359, 'RS-305320', '65', '1', '56', '6', 'Bread', 'Mkate', ' Food     ', '56', '', '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `stat` tinyint(5) NOT NULL DEFAULT 1,
  `category` tinyint(5) NOT NULL DEFAULT 0,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `stat`, `category`, `email`, `contact`, `date`, `name`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, 'admin@fanaka.com', '071345679', '2020-06-10', 'Administrator '),
(2, 'cashier', 'a5b42198e3fb950b5ab0d0067cbe077a41da1245', 1, 0, 'cashier@fanaka.com', '07459679', '2020-06-17', 'Cashier'),
(3, 'user', '12dea96fec20593566ab75692c9949596833adc9', 1, 0, 'user@fanaka.com', '0771857200', '2020-06-17', 'User User'),
(4, 'hkwarui', 'bd91594cec062f81e3e8bc4c3c7b7fede125767a', 1, 0, 'warui.henry@gmail.com', '071349554', '2020-06-19', 'henry warui'),
(5, 'muriuki', '7c222fb2927d828af22f592134e8932480637c0d', 1, 0, 'henry@gmail.com', '0275554567', '2020-06-18', 'James Muriuki'),
(6, 'jkrake', '7c222fb2927d828af22f592134e8932480637c0d', 1, 0, 'jkrake@gmail.com', '0713456789', '2020-06-18', 'Jake rake'),
(7, 'mose', '7c222fb2927d828af22f592134e8932480637c0d', 1, 0, 'mose@gmail.com', '0745632145', '2020-06-10', 'Moses Makoha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
