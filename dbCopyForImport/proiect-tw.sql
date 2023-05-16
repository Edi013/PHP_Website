-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 14, 2023 la 03:21 PM
-- Versiune server: 10.4.27-MariaDB
-- Versiune PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiect-tw`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `credentials`
--

CREATE TABLE `credentials` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Eliminarea datelor din tabel `credentials`
--

INSERT INTO `credentials` (`Username`, `Password`) VALUES
('admin', '$2y$10$mAq4.nXghledqm/dpSpf6.Wddu/eTIa7nhdGyYKGLuCpathBId2Qa');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `membrii`
--

CREATE TABLE `membrii` (
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `program`
--

CREATE TABLE `program` (
  `BeginningHour` tinyint(2) NOT NULL,
  `SubjectName` varchar(40) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Day` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Eliminarea datelor din tabel `program`
--

INSERT INTO `program` (`BeginningHour`, `SubjectName`, `Duration`, `Day`) VALUES
(13, 'Marvel', 200, 'Wednesday'),
(24, 'The Puyks', 200, 'Thursday');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `repertorii`
--

CREATE TABLE `repertorii` (
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Eliminarea datelor din tabel `repertorii`
--

INSERT INTO `repertorii` (`Name`) VALUES
('&lt;h1&gt;sal&lt;/h1&gt;'),
('&lt;h1&gt;sal2&lt;/h1&gt;'),
('Eduard'),
('Alba ca Zapada');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
