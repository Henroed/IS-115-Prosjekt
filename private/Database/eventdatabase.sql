-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 04:44 PM
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
  `lokasjon` varchar(50) NOT NULL,
  `eventType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventNavn`, `dato`, `beskrivelse`, `lokasjon`, `eventType`) VALUES
(1, 'Julebaking', '2023-11-09', 'Her blir det juestemning med baking og julemusikk. Ta med eget utstyr', 'SiA Kjøkken', 'fest'),
(2, 'Halloween', '2022-10-31', 'Knask eller knepp! Her blir det opptredner fra danseskolen.', 'Rundt Kristiansand', 'samling'),
(3, 'Eksamen', '2022-12-14', 'Les deg opp på forhånd for her blir det hjernenøtter', 'UiA', 'konferanse'),
(4, 'Fest hos Daniel', '2022-11-21', 'Ta med egen drikke. Her ble det fest og moro', 'Hos Daniel', 'fest'),
(5, 'Nyttår', '2022-12-31', 'Alle er invitert', 'Kristiansand sentrum', 'samling'),
(6, 'Julaften', '2022-12-24', 'Nå er det jul igjen. Her blir det opptredner fra musikklinja på UiA.', 'Kristiansand sentrum', 'samling'),
(22, 'Hjem til jul', '2022-12-17', 'Nora reiser hjem for jul', 'Larvik', 'fest');

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
(21, 3, 18),
(22, 22, 18);

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
(18, 'chris', 'Martinos', 'Chris@mail.com', '12345678', 'Hamar', 2315, '1234'),
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
  MODIFY `eventID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `myevent`
--
ALTER TABLE `myevent`
  MODIFY `myEventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;