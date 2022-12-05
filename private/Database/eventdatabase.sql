-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 10:55 AM
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
  `bilde` blob DEFAULT NULL,
  `besøkende` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventNavn`, `dato`, `beskrivelse`, `bilde`, `besøkende`) VALUES
(1, 'Julebord', '2023-12-20', 'Bli med på julebord sammen med jobben', NULL, NULL),
(2, 'Nyttårsfest', '2023-11-30', 'Feir nyåret sammen med venner ', NULL, NULL),
(3, 'Trening', '2023-11-14', 'Bli med på fellestrening og kom i form før jul', NULL, NULL),
(4, 'Pepperkakebaking', '2023-12-18', 'Ta med eget utstyr og kom i julestemming med julebaking', NULL, NULL),
(5, 'Fellesmiddag', '2022-12-25', 'Middag med familien først juledsg', NULL, NULL);

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
(1, 2, 18),
(8, 4, 18),
(10, 2, 21),
(13, 1, 21),
(14, 1, 18);

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
  `Passord` varchar(128) NOT NULL,
  `Kjønn` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `Fornavn`, `Etternavn`, `Epost`, `Tlf`, `City`, `Zip`, `Passord`, `Kjønn`) VALUES
(18, 'Chrissdfsdgsdffdsddsf', 'Martinos', 'Chris@mail.com', '12345678', 'Kristiansandnes', 4623, '1234', 'Mann'),
(21, 'Hello', 'Games', 'HeGe@mail.com', '87654321', 'Oslo', 4623, '1234', NULL);

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
  MODIFY `eventID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `myevent`
--
ALTER TABLE `myevent`
  MODIFY `myEventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
