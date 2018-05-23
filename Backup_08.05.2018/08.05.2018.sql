-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Mai 2018 um 13:26
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
  `ANr` int(30) NOT NULL,
  `AName` varchar(30) NOT NULL,
  `APasswort` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ausbilder`
--

INSERT INTO `ausbilder` (`ANr`, `AName`, `APasswort`) VALUES
(1, 'kubillus', '123'),
(2, 'treubel', '123');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `berufsbild`
--

CREATE TABLE `berufsbild` (
  `BNr` int(20) NOT NULL,
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
  `EBerichtsnummer` int(10) DEFAULT NULL,
  `TextBetrieblich` text,
  `TextTheorie` text,
  `AusbildungsWocheBeginn` date DEFAULT NULL,
  `AusbildungsWocheEnde` date DEFAULT NULL,
  `DatumUnterschrift` date DEFAULT NULL,
  `TNr` int(11) NOT NULL,
  `ANr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `eintraege`
--

INSERT INTO `eintraege` (`ENr`, `EStatus`, `EName`, `EAbteilung`, `EBerichtsnummer`, `TextBetrieblich`, `TextTheorie`, `AusbildungsWocheBeginn`, `AusbildungsWocheEnde`, `DatumUnterschrift`, `TNr`, `ANr`) VALUES
(1, 2, 'wer', 'IT', 1337, 'NIX', 'NIX', '2018-01-29', '2018-02-02', '2018-02-02', 3, 1),
(5, 0, NULL, NULL, NULL, NULL, NULL, '2018-02-05', '2018-02-09', NULL, 3, 1),
(6, 0, NULL, NULL, NULL, NULL, NULL, '2018-02-12', '2018-02-16', NULL, 3, 1),
(7, 0, NULL, NULL, NULL, NULL, NULL, '2018-02-19', '2018-02-23', NULL, 3, 1),
(8, 0, NULL, NULL, NULL, NULL, NULL, '2018-02-26', '2018-03-02', NULL, 3, 1),
(9, 0, NULL, NULL, NULL, NULL, NULL, '2018-03-05', '2018-03-09', NULL, 3, 1),
(10, 0, NULL, NULL, NULL, NULL, NULL, '2018-03-12', '2018-03-16', NULL, 3, 1),
(11, 0, NULL, NULL, NULL, NULL, NULL, '2018-03-19', '2018-03-23', NULL, 3, 1),
(12, 0, NULL, NULL, NULL, NULL, NULL, '2018-03-26', '2018-03-30', NULL, 3, 1),
(13, 0, NULL, NULL, NULL, NULL, NULL, '2018-04-02', '2018-04-06', NULL, 3, 1),
(14, 0, NULL, NULL, NULL, NULL, NULL, '2018-04-09', '2018-04-13', NULL, 3, 1),
(15, 0, NULL, NULL, NULL, NULL, NULL, '2018-04-16', '2018-04-20', NULL, 3, 1),
(16, 0, NULL, NULL, NULL, NULL, NULL, '2018-04-23', '2018-04-27', NULL, 3, 1),
(17, 0, NULL, NULL, NULL, NULL, NULL, '2018-04-30', '2018-05-04', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gruppe`
--

CREATE TABLE `gruppe` (
  `BNr` int(11) NOT NULL,
  `ANr` int(11) NOT NULL,
  `Berufsgruppe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teilnehmer`
--

CREATE TABLE `teilnehmer` (
  `TNr` int(20) NOT NULL,
  `TName` varchar(30) NOT NULL,
  `TPasswort` varchar(30) NOT NULL,
  `TSemester` int(10) NOT NULL,
  `BNr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `teilnehmer`
--

INSERT INTO `teilnehmer` (`TNr`, `TName`, `TPasswort`, `TSemester`, `BNr`) VALUES
(3, 'wernke', '123', 1708, 1),
(4, 'treichel', '123', 1708, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ausbilder`
--
ALTER TABLE `ausbilder`
  ADD PRIMARY KEY (`ANr`);

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
  ADD KEY `TNr` (`TNr`),
  ADD KEY `ANr` (`ANr`);

--
-- Indizes für die Tabelle `gruppe`
--
ALTER TABLE `gruppe`
  ADD KEY `BNr` (`BNr`),
  ADD KEY `ANr` (`ANr`);

--
-- Indizes für die Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD PRIMARY KEY (`TNr`),
  ADD KEY `BNr` (`BNr`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ausbilder`
--
ALTER TABLE `ausbilder`
  MODIFY `ANr` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `berufsbild`
--
ALTER TABLE `berufsbild`
  MODIFY `BNr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  MODIFY `ENr` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `TNr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD CONSTRAINT `eintraege_ibfk_1` FOREIGN KEY (`TNr`) REFERENCES `teilnehmer` (`TNr`),
  ADD CONSTRAINT `eintraege_ibfk_2` FOREIGN KEY (`ANr`) REFERENCES `ausbilder` (`ANr`);

--
-- Constraints der Tabelle `gruppe`
--
ALTER TABLE `gruppe`
  ADD CONSTRAINT `gruppe_ibfk_1` FOREIGN KEY (`BNr`) REFERENCES `berufsbild` (`BNr`),
  ADD CONSTRAINT `gruppe_ibfk_2` FOREIGN KEY (`ANr`) REFERENCES `ausbilder` (`ANr`);

--
-- Constraints der Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD CONSTRAINT `teilnehmer_ibfk_1` FOREIGN KEY (`BNr`) REFERENCES `berufsbild` (`BNr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
