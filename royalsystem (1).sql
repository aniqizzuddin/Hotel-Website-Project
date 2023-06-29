-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 02:22 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_Id` int(11) NOT NULL,
  `Guest_Id` varchar(10) NOT NULL,
  `Room_Id` varchar(10) NOT NULL,
  `Date_In` date NOT NULL,
  `Date_Out` date NOT NULL,
  `total_price` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_Id`, `Guest_Id`, `Room_Id`, `Date_In`, `Date_Out`, `total_price`) VALUES
(1, 'aniq10', 'SG01', '2023-06-07', '2023-06-09', 228.00),
(2, 'samad', 'DT01', '2023-06-07', '2023-06-08', 198.00),
(4, 'aniq10', 'FM01', '2023-06-14', '2023-06-15', 396.00),
(6, 'aniq10', 'FM01', '2023-06-17', '2023-06-18', 396.00),
(8, 'aniq10', 'DD01', '2023-06-18', '2023-06-19', 198.00),
(9, 'naim', 'DD40', '2023-06-20', '2023-06-21', 198.00),
(10, 'naim', 'FM01', '2023-06-20', '2023-06-21', 396.00),
(11, 'naim', 'DD06', '2023-06-26', '2023-06-27', 198.00),
(13, 'naim', 'SUT20', '2023-06-29', '2023-06-30', 342.00);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_Id` varchar(10) NOT NULL,
  `Property_Code` varchar(10) NOT NULL,
  `Emp_Name` varchar(50) NOT NULL,
  `Emp_PhoneNo` varchar(14) NOT NULL,
  `Emp_Password` varchar(50) NOT NULL,
  `Emp_DOB` date NOT NULL,
  `Role_Id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_Id`, `Property_Code`, `Emp_Name`, `Emp_PhoneNo`, `Emp_Password`, `Emp_DOB`, `Role_Id`) VALUES
('aniq03', 'H001', 'Muhammad Aniq Izzuddin bin Mohamad Salleh', '195184033', 'aniq03', '2003-10-18', 'AD'),
('wanaim', 'H001', 'Wan Muhammad Naim bin Wan Anas Ibrahim Solehuddin', '128319324', 'wan03', '2003-10-12', 'AD'),
('wanpiz', 'R001', 'Ikhwan Hafiz bin Abd Rahman', '017882335', 'wanpiz05', '2003-03-28', 'AD');

-- --------------------------------------------------------

--
-- Table structure for table `employee_roles`
--

CREATE TABLE `employee_roles` (
  `Role_Id` varchar(10) NOT NULL,
  `Role_Title` varchar(20) NOT NULL,
  `Role_Desc` varchar(100) NOT NULL,
  `Role_Salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_roles`
--

INSERT INTO `employee_roles` (`Role_Id`, `Role_Title`, `Role_Desc`, `Role_Salary`) VALUES
('AD', 'Admin', 'Admin', '12000.00');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `Guest_Id` varchar(10) NOT NULL,
  `Guest_Name` varchar(50) NOT NULL,
  `Guest_Password` varchar(50) NOT NULL,
  `Contact_No` varchar(14) NOT NULL,
  `Guest_Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`Guest_Id`, `Guest_Name`, `Guest_Password`, `Contact_No`, `Guest_Email`) VALUES
('2021208706', 'darwish amanie azmi', 'darwish5g', '01121085279', 'darwishamanieazmi@gmail.com'),
('aniq10', 'aniq', 'aniq10', '01229812', 'aniq@gmail.com'),
('cytrium', 'Ilman bin Fahmi Idris', 'cytrium', '0128319831', 'ilman@gmail.com'),
('darwish', 'amanie', 'Darwish5g', '01121085279', 'azmi@gmail.com'),
('mukh', 'mukh messy', '123', '0921686331', 'mukh@gmail.com'),
('naim', 'wan', 'naim', '232123212', 'wan@gmail.com'),
('samad', 'samadiq', '111', '918563246', 'samadiq@gmail.com'),
('WanPizz', 'Ikhwan', '000', '0123134211', 'wanpizz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `Property_Code` varchar(10) NOT NULL,
  `Hotel_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`Property_Code`, `Hotel_No`) VALUES
('H001', '1');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `Property_Code` varchar(10) NOT NULL,
  `Property_Type` varchar(50) NOT NULL,
  `Property_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`Property_Code`, `Property_Type`, `Property_Address`) VALUES
('H001', 'Hotel', 'Kuah, Langkawi'),
('R001', 'Resort', 'Chenang, Langkawi');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Invoice_No` int(11) NOT NULL,
  `Booking_Id` int(11) NOT NULL,
  `Receipt_Price` decimal(10,2) NOT NULL,
  `Receipt_RoomDetail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Invoice_No`, `Booking_Id`, `Receipt_Price`, `Receipt_RoomDetail`) VALUES
(1, 1, '228.00', '1 Single bed, HDTV with City view'),
(2, 2, '198.00', '2 Single bed, LCD TV, Free WiFi and parking with C'),
(4, 4, '396.00', '1 King bed and 2 Single beds, LCD TV, Free Wifi an'),
(6, 6, '396.00', '1 King bed and 2 Single beds, LCD TV, Free Wifi an'),
(8, 8, '198.00', '1 King bed, LCD TV, Free WiFi and parking with Cit'),
(9, 9, '198.00', '1 King bed, LCD TV, Free WiFi and parking with Cit'),
(10, 10, '396.00', '1 King bed and 2 Single beds, LCD TV, Free Wifi an'),
(11, 11, '198.00', '1 King bed, LCD TV, Free WiFi and parking with Cit'),
(13, 13, '342.00', '1 King bed and 1 single bed, LCD TV, Free Wifi and');

-- --------------------------------------------------------

--
-- Table structure for table `resorts`
--

CREATE TABLE `resorts` (
  `Property_Code` varchar(10) NOT NULL,
  `Resort_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resorts`
--

INSERT INTO `resorts` (`Property_Code`, `Resort_No`) VALUES
('R001', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Room_Id` varchar(10) NOT NULL,
  `Room_No` int(3) DEFAULT NULL,
  `Room_Type` varchar(20) NOT NULL,
  `Property_Code` varchar(10) NOT NULL,
  `Occupancy` int(11) NOT NULL,
  `Room_Image` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Room_Id`, `Room_No`, `Room_Type`, `Property_Code`, `Occupancy`, `Room_Image`) VALUES
('DD01', 241, 'Deluxe Double', 'H001', 2, 'dd1.png'),
('DD06', 246, 'Deluxe Double', 'H001', 2, 'dd1.png'),
('DD40', 241, 'Deluxe Double', 'R001', 2, 'dd1.png'),
('DT01', 231, 'Deluxe Twin', 'H001', 2, 'dt1.jpg'),
('DT40', 231, 'Deluxe Twin', 'R001', 2, 'dt1.jpg'),
('FM01', 261, 'Family', 'H001', 4, 'fam1.jpg'),
('FM40', 261, 'Family', 'R001', 4, 'fam1.jpg'),
('SD01', 121, 'Superior Double', 'H001', 2, 'sd.jpg'),
('SD40', 121, 'Superior Double', 'R001', 2, 'sd.jpg'),
('SG01', 101, 'Single', 'H001', 1, 'single.png'),
('SG40', 101, 'Single', 'R001', 1, 'single.png'),
('ST01', 111, 'Superior Twin', 'H001', 2, 'st1.jpg'),
('ST40', 111, 'Superior Twin', 'R001', 2, 'st1.jpg'),
('SUT01', 381, 'Suite', 'H001', 3, 'suite.jpg'),
('SUT20', 381, 'Suite', 'R001', 3, 'suite.jpg'),
('TS01', 271, 'Triple Single', 'H001', 3, 'ts.jpg'),
('TS40', 271, 'Triple Single', 'H001', 3, 'ts.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `Room_Type` varchar(20) NOT NULL,
  `Room_Price` decimal(10,2) NOT NULL,
  `Room_Desc` varchar(200) DEFAULT NULL,
  `Room_View` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`Room_Type`, `Room_Price`, `Room_Desc`, `Room_View`) VALUES
('Deluxe Double', '198.00', '1 King bed, LCD TV, Free WiFi and parking', 'City view'),
('Deluxe Twin', '198.00', '2 Single bed, LCD TV, Free WiFi and parking', 'City view'),
('Family', '396.00', '1 King bed and 2 Single beds, LCD TV, Free Wifi and parking', 'City view'),
('Single', '114.00', '1 Single bed, HDTV', 'City view'),
('Suite', '342.00', '1 King bed and 1 single bed, LCD TV, Free Wifi and parking', 'Sea view'),
('Superior Double', '148.00', '1 King bed, HD TV', 'City view'),
('Superior Twin', '148.00', '2 Single bed, HD TV', 'City view'),
('Triple Single', '248.00', '3 Single bed, LCD TV, Free WiFi and parking', 'City view');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_Id`),
  ADD KEY `Guest_Id` (`Guest_Id`),
  ADD KEY `Room_Id` (`Room_Id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_Id`),
  ADD KEY `Property_Code` (`Property_Code`),
  ADD KEY `Role_Id` (`Role_Id`);

--
-- Indexes for table `employee_roles`
--
ALTER TABLE `employee_roles`
  ADD PRIMARY KEY (`Role_Id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`Guest_Id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`Property_Code`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`Property_Code`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Invoice_No`),
  ADD KEY `Booking_Id` (`Booking_Id`);

--
-- Indexes for table `resorts`
--
ALTER TABLE `resorts`
  ADD PRIMARY KEY (`Property_Code`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Room_Id`),
  ADD KEY `Property_Code` (`Property_Code`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`Room_Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Invoice_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `Guest_Id` FOREIGN KEY (`Guest_Id`) REFERENCES `guests` (`Guest_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Room_Id` FOREIGN KEY (`Room_Id`) REFERENCES `rooms` (`Room_Id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`Property_Code`) REFERENCES `properties` (`Property_Code`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`Role_Id`) REFERENCES `employee_roles` (`Role_Id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`Property_Code`) REFERENCES `properties` (`Property_Code`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `Booking_Id` FOREIGN KEY (`Booking_Id`) REFERENCES `bookings` (`Booking_Id`) ON DELETE CASCADE;

--
-- Constraints for table `resorts`
--
ALTER TABLE `resorts`
  ADD CONSTRAINT `resorts_ibfk_1` FOREIGN KEY (`Property_Code`) REFERENCES `properties` (`Property_Code`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`Property_Code`) REFERENCES `properties` (`Property_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
