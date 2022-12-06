-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 04:21 PM
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
(6, 'Julaften', '2022-12-24', 'Nå er det jul igjen. Her blir det opptredner fra musikklinja på UiA.', 'Kristiansand sentrum', 'samling');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
