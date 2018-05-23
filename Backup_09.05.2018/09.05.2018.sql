-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mai 2018 um 16:18
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
  `TNr` int(11) NOT NULL,
  `ANr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `eintraege`
--

INSERT INTO `eintraege` (`ENr`, `EStatus`, `EName`, `EAbteilung`, `EBerichtsnummer`, `TextBetrieblich`, `TextTheorie`, `AusbildungsWocheBeginn`, `AusbildungsWocheEnde`, `DatumUnterschrift`, `TNr`, `ANr`) VALUES
(2553, 1, 'Steffen Wernke', 'IT', 1, 'hhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhhhh', '2018-04-02', '2018-04-06', '2018-04-06', 3, 1),
(2554, 1, 'Steffen Wernke', 'IT', 2, 'Hallo ich bin Steffen!\r\nich habe gleich feierabend :D\r\n\r\nttttttt', 'jhvgdafh', '2018-04-02', '2018-04-06', '2018-04-06', 3, NULL),
(2555, 0, 'Steffen Wernke', 'IT', 3, '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'jhvgdafh', '2018-04-09', '2018-04-13', '2018-04-13', 3, NULL),
(2556, 2, 'Steffen Wernke', 'IT', 4, 'hfshfgdhfgdhfgdh', 'fdghfdghfdgh', '2018-04-23', '2018-04-27', '2018-04-27', 3, NULL),
(2562, 1, 'Steffen Wernke', 'IT', 5, 'hallo', 'hallo', '2018-04-30', '2018-05-04', '0000-00-00', 3, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD PRIMARY KEY (`ENr`),
  ADD KEY `TNr` (`TNr`),
  ADD KEY `ANr` (`ANr`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  MODIFY `ENr` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2563;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD CONSTRAINT `eintraege_ibfk_1` FOREIGN KEY (`TNr`) REFERENCES `teilnehmer` (`TNr`),
  ADD CONSTRAINT `eintraege_ibfk_2` FOREIGN KEY (`ANr`) REFERENCES `ausbilder` (`ANr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
