-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Apr 2018 um 10:32
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
  `EName` varchar(30) NOT NULL,
  `EAbteilung` varchar(30) NOT NULL,
  `EBerichtsnummer` int(10) NOT NULL,
  `TextBetrieblich` text NOT NULL,
  `TextTheorie` text NOT NULL,
  `AusbildungsWocheBeginn` date NOT NULL,
  `AusbildungsWocheEnde` date NOT NULL,
  `DatumUnterschrift` date NOT NULL,
  `TNr` int(11) NOT NULL,
  `ANr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `ENr` int(30) NOT NULL AUTO_INCREMENT;

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
