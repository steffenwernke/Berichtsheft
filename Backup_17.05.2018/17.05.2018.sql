-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Mai 2018 um 14:59
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `berichtsheft`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ausbilder`
--

CREATE TABLE `ausbilder` (
  `ANr` int(10) NOT NULL,
  `AName` varchar(30) NOT NULL,
  `APasswort` varchar(30) NOT NULL,
  `BNr` int(10) NOT NULL,
  `GNr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ausbilder`
--

INSERT INTO `ausbilder` (`ANr`, `AName`, `APasswort`, `BNr`, `GNr`) VALUES
(1, 'kubillus', '123', 1, 1),
(2, 'treubel', '123', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `berufsbild`
--

CREATE TABLE `berufsbild` (
  `BNr` int(10) NOT NULL,
  `BBezeichnung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `berufsbild`
--

INSERT INTO `berufsbild` (`BNr`, `BBezeichnung`) VALUES
(1, 'Anwendungsentwicklung'),
(2, 'Fisi');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eintraege`
--

CREATE TABLE `eintraege` (
  `ENr` int(30) NOT NULL,
  `EStatus` int(1) NOT NULL,
  `EName` varchar(30) DEFAULT NULL,
  `EAbteilung` varchar(30) DEFAULT NULL,
  `EBerichtsnummer` int(10) DEFAULT '0',
  `TextBetrieblich` text,
  `TextTheorie` text,
  `AusbildungsWocheBeginn` date DEFAULT NULL,
  `AusbildungsWocheEnde` date DEFAULT NULL,
  `DatumUnterschrift` date DEFAULT NULL,
  `TNr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `eintraege`
--

INSERT INTO `eintraege` (`ENr`, `EStatus`, `EName`, `EAbteilung`, `EBerichtsnummer`, `TextBetrieblich`, `TextTheorie`, `AusbildungsWocheBeginn`, `AusbildungsWocheEnde`, `DatumUnterschrift`, `TNr`) VALUES
(2553, 1, 'Steffen Wernke', 'IT', 1, 'IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII', 'hhhhhhhhhhhhhhhhhhh', '2018-04-02', '2018-04-06', '2018-04-06', 3),
(2554, 1, 'Steffen Wernke', 'IT', 2, 'Hallo ich bin Steffen!\r\nich habe gleich feierabend :D\r\n\r\nttttttt', 'jhvgdafh', '2018-04-02', '2018-04-06', '2018-04-06', 3),
(2555, 1, 'Steffen Wernke', 'IT', 3, 'IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII', 'IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII', '2018-04-09', '2018-04-13', '2018-04-13', 3),
(2556, 2, 'Steffen Wernke', 'IT', 4, 'hfshfgdhfgdhfgdh', 'fdghfdghfdgh', '2018-04-23', '2018-04-27', '2018-04-27', 3),
(2562, 2, 'Steffen Wernke', 'IT', 5, 'hallo', 'hallo', '2018-04-30', '2018-05-04', '0000-00-00', 3),
(2565, 0, '', '', 6, '<p>HALLO</p>', '!\"Â§$%&/()=?`', '2018-05-07', '2018-05-11', '2018-05-11', 3),
(2566, 0, 'Rene Treichel', 'IT', 1, 'hhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhhhh', '2018-04-02', '2018-04-06', '2018-04-06', 4),
(2567, 0, NULL, NULL, 2, NULL, NULL, '2018-04-09', '2018-04-13', '2018-04-13', 4),
(2568, 0, NULL, NULL, 3, NULL, NULL, '2018-04-16', '2018-04-20', '2018-04-20', 4),
(2569, 0, NULL, NULL, 4, NULL, NULL, '2018-04-23', '2018-04-27', '2018-04-27', 4),
(2570, 0, NULL, NULL, 5, NULL, NULL, '2018-04-30', '2018-05-04', '2018-05-04', 4),
(2571, 0, NULL, NULL, 6, NULL, NULL, '2018-05-07', '2018-05-11', '2018-05-11', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gruppe`
--

CREATE TABLE `gruppe` (
  `GNr` int(10) NOT NULL,
  `Berufsgruppe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `gruppe`
--

INSERT INTO `gruppe` (`GNr`, `Berufsgruppe`) VALUES
(1, 'IT'),
(2, 'Kaufmaennisch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teilnehmer`
--

CREATE TABLE `teilnehmer` (
  `TNr` int(10) NOT NULL,
  `TName` varchar(30) NOT NULL,
  `TPasswort` varchar(30) NOT NULL,
  `TSemester` int(10) NOT NULL,
  `BNr` int(10) NOT NULL,
  `GNr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `teilnehmer`
--

INSERT INTO `teilnehmer` (`TNr`, `TName`, `TPasswort`, `TSemester`, `BNr`, `GNr`) VALUES
(3, 'wernke', '123', 1708, 1, 1),
(4, 'treichel', '123', 1708, 1, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ausbilder`
--
ALTER TABLE `ausbilder`
  ADD PRIMARY KEY (`ANr`),
  ADD KEY `BNr` (`BNr`),
  ADD KEY `GNr` (`GNr`);

--
-- Indizes für die Tabelle `berufsbild`
--
ALTER TABLE `berufsbild`
  ADD PRIMARY KEY (`BNr`);

--
-- Indizes für die Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD PRIMARY KEY (`ENr`),
  ADD KEY `TNr` (`TNr`);

--
-- Indizes für die Tabelle `gruppe`
--
ALTER TABLE `gruppe`
  ADD PRIMARY KEY (`GNr`);

--
-- Indizes für die Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD PRIMARY KEY (`TNr`),
  ADD KEY `BNr` (`BNr`),
  ADD KEY `GNr` (`GNr`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ausbilder`
--
ALTER TABLE `ausbilder`
  MODIFY `ANr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `berufsbild`
--
ALTER TABLE `berufsbild`
  MODIFY `BNr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  MODIFY `ENr` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2572;

--
-- AUTO_INCREMENT für Tabelle `gruppe`
--
ALTER TABLE `gruppe`
  MODIFY `GNr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `TNr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ausbilder`
--
ALTER TABLE `ausbilder`
  ADD CONSTRAINT `ausbilder_ibfk_1` FOREIGN KEY (`BNr`) REFERENCES `berufsbild` (`BNr`),
  ADD CONSTRAINT `ausbilder_ibfk_2` FOREIGN KEY (`GNr`) REFERENCES `gruppe` (`GNr`);

--
-- Constraints der Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD CONSTRAINT `eintraege_ibfk_1` FOREIGN KEY (`TNr`) REFERENCES `teilnehmer` (`TNr`);

--
-- Constraints der Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD CONSTRAINT `teilnehmer_ibfk_1` FOREIGN KEY (`BNr`) REFERENCES `berufsbild` (`BNr`),
  ADD CONSTRAINT `teilnehmer_ibfk_2` FOREIGN KEY (`GNr`) REFERENCES `gruppe` (`GNr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
