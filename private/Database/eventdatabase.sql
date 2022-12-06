-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2022 at 12:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(13) NOT NULL,
  `eventNavn` varchar(128) NOT NULL,
  `dato` date NOT NULL,
  `beskrivelse` varchar(200) NOT NULL,
  `bilde` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventNavn`, `dato`, `beskrivelse`, `bilde`) VALUES
(1, 'SnikkSnakk', '2023-11-09', 'Praesent id lorem elementum, bibendum quam sit amet, pulvinar turpis. Aliquam ornare tortor nisl, at vulputate purus scelerisque dictum. Aenean sed ipsum neque. ', NULL),
(2, 'Halloween', '2022-10-31', 'knask eller knep. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean posuere, ipsum ut eleifend pulvinar, elit leo vestibulum odio, sed placerat tortor leo nec ex.', NULL),
(3, 'Eksamen', '2022-12-14', 'Nunc sit amet neque sed libero ornare finibus. Donec euismod odio eget mauris egestas imperdiet. Proin iaculis, augue ac feugiat gravida, velit ligula dictum massa, vitae auctor erat felis eget nisl.', NULL),
(4, 'Fest hos Daniel', '2022-11-21', 'Cras vitae venenatis nisi. Pellentesque commodo nisi nec arcu rutrum imperdiet. Ut at ipsum eu felis tempus convallis in vel nibh. Donec sed congue neque.', NULL),
(5, 'Nyttår', '2022-12-31', 'Proin quam massa, semper in lacinia nec, rhoncus eu felis. Sed erat est, varius eu ex sit amet, aliquam vestibulum risus. ', NULL),
(6, 'Julaften', '2022-12-24', 'Nå er det jul igjen. Mauris accumsan lacus ac libero tristique laoreet. Quisque enim neque, eleifend efficitur mattis ut, aliquet vitae nisl. Maecenas eu efficitur odio. Nullam ac faucibus elit.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `myevent`
--

CREATE TABLE `myevent` (
  `myEventID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myevent`
--

INSERT INTO `myevent` (`myEventID`, `eventID`, `userID`) VALUES
(11, 1, 26),
(12, 2, 26),
(13, 5, 26),
(15, 1, 18),
(16, 6, 18),
(18, 2, 18),
(19, 3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(13) NOT NULL,
  `Fornavn` varchar(46) NOT NULL,
  `Etternavn` varchar(46) DEFAULT NULL,
  `Epost` varchar(62) NOT NULL,
  `Tlf` varchar(8) NOT NULL,
  `City` varchar(35) NOT NULL,
  `Zip` int(4) NOT NULL,
  `Passord` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `Fornavn`, `Etternavn`, `Epost`, `Tlf`, `City`, `Zip`, `Passord`) VALUES
(18, 'Chris', 'Martinos', 'Chris@mail.com', '12345678', 'Hamar', 2315, 'sdvvrug123'),
(21, 'Hello', 'Games', 'HeGe@mail.com', '87654321', 'Oslo', 10, 'sdvvrug123'),
(26, 'Marty', 'Smith', 'MS@mail.com', '11223344', 'Kristiansand', 4623, 'sdvvrug123'),
(28, 'Daniel', 'Danielsen', 'Dansen@mail.com', '88776655', 'Kristiansand', 4623, 'sdvvrug123'),
(29, 'John', 'Snow', 'GoT@mail.com', '12345679', 'Kristiansand', 4623, 'ghwwhhuhwsdvvrug');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `myevent`
--
ALTER TABLE `myevent`
  ADD PRIMARY KEY (`myEventID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `Tlf` (`Tlf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `myevent`
--
ALTER TABLE `myevent`
  MODIFY `myEventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
