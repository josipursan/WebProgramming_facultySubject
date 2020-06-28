-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 12:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_projektnizadatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `driverdetails`
--

CREATE TABLE `driverdetails` (
  `abbreviation` char(3) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `firstGP` varchar(40) DEFAULT NULL,
  `numberOfGP` smallint(255) DEFAULT NULL,
  `numberOfWins` tinyint(255) DEFAULT NULL,
  `numberOfPolePositions` smallint(255) DEFAULT NULL,
  `numberOfPodiums` smallint(255) DEFAULT NULL,
  `numberOfRetirements` tinyint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driverdetails`
--

INSERT INTO `driverdetails` (`abbreviation`, `name`, `firstGP`, `numberOfGP`, `numberOfWins`, `numberOfPolePositions`, `numberOfPodiums`, `numberOfRetirements`) VALUES
('ALB', 'Alexander Albon', 'Australia, 2019', 21, 0, 0, 0, 1),
('BOT', 'Valtteri Bottas', 'Australia, 2013', 139, 7, 11, 45, 12),
('GAS', 'Pierre Gasly', 'Malaysia, 2017', 47, 0, 0, 1, 8),
('GIO', 'Antonio Giovinazzi', 'Australia, 2017', 23, 0, 0, 0, 3),
('GRO', 'Romain Grosjean', 'Europe, 2009', 164, 0, 0, 10, 47),
('HAM', 'Lewis Hamilton', 'Australia, 2007', 250, 84, 88, 151, 26),
('KVY', 'Daniil Kvyat', 'Australia, 2014', 93, 0, 0, 3, 20),
('LAT', 'Nicholas Latifi', '/', 0, 0, 0, 0, 0),
('LEC', 'Charles Leclerc', 'Australia, 2018', 42, 2, 7, 10, 9),
('MAG', 'Kevin Magnussen', 'Australia, 2014', 102, 0, 0, 1, 16),
('NOR', 'Lando Norris', 'Australia, 2019', 21, 0, 0, 0, 6),
('OCO', 'Esteban Ocon', 'Belgium 2016', 55, 0, 0, 0, 6),
('PER', 'Sergio Perez', 'Australia, 2011', 176, 0, 0, 8, 23),
('RAI', 'Kimi Räikkönen', 'Australia, 2011', 313, 21, 18, 103, 69),
('RIC', 'Daniel Ricciardo', 'Britain, 2001', 171, 7, 3, 29, 32),
('RUS', 'George Russell', 'Australia, 2019', 21, 0, 0, 0, 2),
('SAI', 'Carlos Sainz', 'Australia, 2015', 102, 0, 0, 1, 25),
('STR', 'Lance Stroll', 'Australia, 2017', 62, 0, 0, 1, 11),
('VER', 'Max Verstappen', 'Australia, 2015', 105, 8, 2, 31, 21),
('VET', 'Sebastian Vettel', 'USA, 2007', 240, 53, 57, 120, 35);

-- --------------------------------------------------------

--
-- Table structure for table `driverlist`
--

CREATE TABLE `driverlist` (
  `driverID` char(3) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) DEFAULT NULL,
  `racingNumber` tinyint(255) DEFAULT NULL,
  `nationality` varchar(40) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `team` varchar(30) DEFAULT NULL,
  `firstSeason` smallint(255) DEFAULT NULL,
  `wins` smallint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driverlist`
--

INSERT INTO `driverlist` (`driverID`, `name`, `lastName`, `racingNumber`, `nationality`, `dateOfBirth`, `team`, `firstSeason`, `wins`) VALUES
('ALB', 'Alex', 'Albon', 23, 'Thai', '1996-03-23', 'Red Bull Racing', 2019, 0),
('BOT', 'Valtteri', 'Bottas', 77, 'Finnish', '1989-08-28', 'Mercedes', 2013, 7),
('GAS', 'Pierre', 'Gasly', 10, 'French', '1996-02-07', 'AlphaTauri', 2017, 0),
('GIO', 'Antonio', 'Giovinazzi', 99, 'Italian', '1993-12-14', 'Alfa Romeo', 2019, 0),
('GRO', 'Romain', 'Grosjean', 8, 'French', '1986-04-17', 'Haas', 2012, 0),
('HAM', 'Lewis', 'Hamilton', 44, 'British', '1985-01-07', 'Mercedes', 2007, 84),
('KVY', 'Daniil', 'Kvyat', 26, 'Russian', '1994-04-26', 'AlphaTauri', 2014, 0),
('LAT', 'Nicholas', 'Latifi', 6, 'Canadian', '1995-06-29', 'Williams', 2020, 0),
('LEC', 'Charles', 'Leclerc', 16, 'Monegasque', '1997-10-16', 'Ferrari', 2018, 2),
('MAG', 'Kevin', 'Magnussen', 20, 'Danish', '1992-10-05', 'Haas', 2014, 0),
('NOR', 'Lando', 'Norris', 4, 'British', '1999-11-13', 'McLaren', 2019, 0),
('OCO', 'Esteban', 'Ocon', 31, 'French', '1996-09-17', 'Renault', 2017, 0),
('PER', 'Sergio', 'Perez', 11, 'Mexican', '1990-01-26', 'Racing Point', 2011, 0),
('RAI', 'Kimi', 'Räikkönen', 7, 'Finnish', '1979-10-17', 'Alfa Romeo', 2001, 21),
('RIC', 'Daniel', 'Ricciardo', 3, 'Australian', '1989-07-01', 'Renault', 2012, 7),
('RUS', 'George', 'Russell', 63, 'British', '1998-02-15', 'Williams', 2019, 0),
('SAI', 'Carlos', 'Sainz', 55, 'Spanish', '1994-09-01', 'McLaren', 2015, 0),
('STR', 'Lance', 'Stroll', 18, 'Canadian', '1998-10-29', 'Racing Point', 2017, 0),
('VER', 'Max', 'Verstappen', 33, 'Dutch', '1997-09-30', 'Red Bull Racing', 2015, 8),
('VET', 'Sebastian', 'Vettel', 5, 'German', '1987-07-03', 'Ferrari', 2008, 53);

-- --------------------------------------------------------

--
-- Table structure for table `seasonracelist`
--

CREATE TABLE `seasonracelist` (
  `countryAbbreviation` char(3) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `circuit` varchar(60) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seasonracelist`
--

INSERT INTO `seasonracelist` (`countryAbbreviation`, `country`, `location`, `circuit`, `date`) VALUES
('AUT', 'Austria', 'Spielberg', 'Spielberg', '2020-07-03'),
('AUT', 'Austria', 'Spielberg', 'Spielberg', '2020-07-10'),
('HUN', 'Hungary', 'Budapest', 'Hungaroring', '2020-07-17'),
('GBR', 'Great Britain', 'Silverston', 'Silverstone', '2020-07-31'),
('GBR', 'Great Britain', 'Silverstone', 'Silverstone', '2020-08-07'),
('SPA', 'Spain', 'Montmeló', 'Circuit de Barcelona-Catlunya', '2020-08-14'),
('BEL', 'Belgium', 'Stavelot', 'Circuit de Spa-Francorchamps', '2020-08-28'),
('ITA', 'Italy', 'Monza', 'Monza', '2020-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `teamdetails`
--

CREATE TABLE `teamdetails` (
  `abbreviation` char(3) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `predecessor` varchar(45) DEFAULT NULL,
  `country` varchar(35) DEFAULT NULL,
  `firstGP` varchar(45) DEFAULT NULL,
  `numberOfGP` smallint(255) DEFAULT NULL,
  `numberOfWins` smallint(255) DEFAULT NULL,
  `numberOfPolePositions` smallint(255) DEFAULT NULL,
  `numberOfPodiums` smallint(255) DEFAULT NULL,
  `numberOfWCC` tinyint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teamdetails`
--

INSERT INTO `teamdetails` (`abbreviation`, `name`, `predecessor`, `country`, `firstGP`, `numberOfGP`, `numberOfWins`, `numberOfPolePositions`, `numberOfPodiums`, `numberOfWCC`) VALUES
('ALF', 'Alfa Romeo', 'Sauber', 'Italy', 'Britain, 1950', 131, 10, 12, 26, 0),
('ATR', 'AlphaTauri', 'Toro Rosso', 'Italy', '/', 0, 0, 0, 0, 0),
('FER', 'Ferrari', '/', 'Italy', 'Monaco, 1950', 991, 238, 228, 770, 16),
('HAS', 'Haas', '/', 'USA', 'Australia, 2016', 83, 0, 0, 0, 0),
('MCL', 'McLaren', '/', 'United Kingdom', 'Monaco, 1966', 863, 182, 155, 486, 8),
('MER', 'Mercedes', '/', 'Germany', 'France, 1954', 210, 102, 111, 211, 6),
('RBR', 'Red Bull Racing', 'Jaguar', 'Austria', 'Australia, 2005', 286, 62, 62, 170, 4),
('RCP', 'Racing Point', 'Force India', 'United Kingdom', 'Australia, 2019', 21, 0, 0, 0, 0),
('REN', 'Renault', 'Lotus', 'France', 'Britain, 1977', 383, 35, 51, 100, 2),
('WIL', 'Williams', 'Wolf', 'United Kingdom', 'Argentina, 1975', 744, 114, 128, 312, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driverdetails`
--
ALTER TABLE `driverdetails`
  ADD PRIMARY KEY (`abbreviation`);

--
-- Indexes for table `driverlist`
--
ALTER TABLE `driverlist`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `teamdetails`
--
ALTER TABLE `teamdetails`
  ADD PRIMARY KEY (`abbreviation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
