-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Mrz 2021 um 16:40
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mitarbeiter`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(11) NOT NULL,
  `employee_username` varchar(45) NOT NULL,
  `employee_firstname` varchar(30) NOT NULL,
  `employee_lastname` varchar(45) NOT NULL,
  `employee_photo` text NOT NULL,
  `employee_email` varchar(50) NOT NULL,
  `employee_pwd` text NOT NULL,
  `rights_name` varchar(45) NOT NULL COMMENT 'employee, lead, admin',
  `team_name` varchar(50) DEFAULT NULL COMMENT 'Horizon, Raspberry, Steal, admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `employee`
--

INSERT INTO `employee` (`employee_ID`, `employee_username`, `employee_firstname`, `employee_lastname`, `employee_photo`, `employee_email`, `employee_pwd`, `rights_name`, `team_name`) VALUES
(7, 'el', 'Eva', 'Liebmann', '', 'evaliebmann@gmx.at', '202cb962ac59075b964b07152d234b70', 'admin', 'admin'),
(8, 'sunnysu', 'Susi', 'Sonnenschein', 'images/WIN_20210202_15_25_04_Pro.jpg', 'susi@sonnenschein.at', '250cf8b51c773f3f8dc8b4be867a9a02', 'lead', 'Raspberry'),
(12, 'rudi', 'Rudi', 'Regenbogen', '', 'rudi@rainbow', 'd41d8cd98f00b204e9800998ecf8427e', 'employee', 'Raspberry');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `note_text` text NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `notes`
--

INSERT INTO `notes` (`note_id`, `note_text`, `employee_ID`, `team_name`) VALUES
(26, '1235', 8, 'Horizon'),
(28, 'ein Versuch', 8, 'Steal'),
(29, '321', 8, 'Steal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rights`
--

CREATE TABLE `rights` (
  `rights_name` varchar(45) NOT NULL COMMENT 'employee, lead, admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rights`
--

INSERT INTO `rights` (`rights_name`) VALUES
('admin'),
('employee'),
('lead');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE `team` (
  `team_name` varchar(50) NOT NULL COMMENT 'admin, Horizon, Raspberry, Steal',
  `team_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `team`
--

INSERT INTO `team` (`team_name`, `team_color`) VALUES
('', ''),
('admin', ''),
('Horizon', ''),
('Raspberry', ''),
('Steal', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`),
  ADD KEY `rights_name` (`rights_name`),
  ADD KEY `FOREIGN` (`team_name`) USING BTREE;

--
-- Indizes für die Tabelle `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `notes_ibfk_FK` (`employee_ID`),
  ADD KEY `FK` (`team_name`);

--
-- Indizes für die Tabelle `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`rights_name`),
  ADD KEY `rights_name` (`rights_name`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_name`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`rights_name`) REFERENCES `rights` (`rights_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`team_name`) REFERENCES `team` (`team_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `FK` FOREIGN KEY (`team_name`) REFERENCES `team` (`team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes_ibfk_FK` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`employee_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
