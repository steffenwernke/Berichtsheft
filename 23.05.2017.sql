-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Mai 2018 um 16:29
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
(2748, 0, '', '', 1, NULL, NULL, '2017-08-07', '2017-08-11', '2017-08-11', 3),
(2749, 0, '', '', 2, NULL, NULL, '2017-08-14', '2017-08-18', '2017-08-18', 3),
(2750, 2, '', '', 3, NULL, NULL, '2017-08-21', '2017-08-25', '2017-08-25', 3),
(2751, 0, '', '', 4, NULL, NULL, '2017-08-28', '2017-09-01', '2017-09-01', 3),
(2752, 1, '', '', 5, NULL, NULL, '2017-09-04', '2017-09-08', '2017-09-08', 3),
(2753, 0, '', '', 6, NULL, NULL, '2017-09-11', '2017-09-15', '2017-09-15', 3),
(2754, 0, '', '', 7, NULL, NULL, '2017-09-18', '2017-09-22', '2017-09-22', 3),
(2755, 0, '', '', 8, NULL, NULL, '2017-09-25', '2017-09-29', '2017-09-29', 3),
(2756, 0, '', '', 9, NULL, NULL, '2017-10-02', '2017-10-06', '2017-10-06', 3),
(2757, 0, '', '', 10, NULL, NULL, '2017-10-09', '2017-10-13', '2017-10-13', 3),
(2758, 0, '', '', 11, NULL, NULL, '2017-10-16', '2017-10-20', '2017-10-20', 3),
(2759, 0, '', '', 12, NULL, NULL, '2017-10-23', '2017-10-27', '2017-10-27', 3),
(2760, 0, '', '', 13, NULL, NULL, '2017-10-30', '2017-11-03', '2017-11-03', 3),
(2761, 0, '', '', 14, NULL, NULL, '2017-11-06', '2017-11-10', '2017-11-10', 3),
(2762, 0, '', '', 15, NULL, NULL, '2017-11-13', '2017-11-17', '2017-11-17', 3),
(2763, 0, '', '', 16, NULL, NULL, '2017-11-20', '2017-11-24', '2017-11-24', 3),
(2764, 0, '', '', 17, NULL, NULL, '2017-11-27', '2017-12-01', '2017-12-01', 3),
(2765, 0, '', '', 18, NULL, NULL, '2017-12-04', '2017-12-08', '2017-12-08', 3),
(2766, 0, '', '', 19, NULL, NULL, '2017-12-11', '2017-12-15', '2017-12-15', 3),
(2767, 0, '', '', 20, NULL, NULL, '2017-12-18', '2017-12-22', '2017-12-22', 3),
(2768, 0, '', '', 21, NULL, NULL, '2017-12-25', '2017-12-29', '2017-12-29', 3),
(2769, 0, '', '', 22, NULL, NULL, '2018-01-01', '2018-01-05', '2018-01-05', 3),
(2770, 0, '', '', 23, NULL, NULL, '2018-01-08', '2018-01-12', '2018-01-12', 3),
(2771, 0, '', '', 24, NULL, NULL, '2018-01-15', '2018-01-19', '2018-01-19', 3),
(2772, 0, '', '', 25, NULL, NULL, '2018-01-22', '2018-01-26', '2018-01-26', 3),
(2773, 0, '', '', 26, NULL, NULL, '2018-01-29', '2018-02-02', '2018-02-02', 3),
(2774, 0, '', '', 27, NULL, NULL, '2018-02-05', '2018-02-09', '2018-02-09', 3),
(2775, 0, '', '', 28, NULL, NULL, '2018-02-12', '2018-02-16', '2018-02-16', 3),
(2776, 0, '', '', 29, NULL, NULL, '2018-02-19', '2018-02-23', '2018-02-23', 3),
(2777, 0, '', '', 30, NULL, NULL, '2018-02-26', '2018-03-02', '2018-03-02', 3),
(2778, 0, '', '', 31, NULL, NULL, '2018-03-05', '2018-03-09', '2018-03-09', 3),
(2779, 0, '', '', 32, NULL, NULL, '2018-03-12', '2018-03-16', '2018-03-16', 3),
(2780, 0, '', '', 33, NULL, NULL, '2018-03-19', '2018-03-23', '2018-03-23', 3),
(2781, 1, 'wernke', 'IT', 34, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', '1\r\n2\r\n3\r\n   4 \r\n     5\r\n      6\r\n7\r\n78945qweq32qdfsdf\r\n\r\n2\r\n21\r\n312\r\n3\r\n12\r\n312\r\n3\r\n12\r\n312\r\n3\r\n12\r\n3\r\n12\r\n31\r\n23\r\n12\r\n3\r\n123\r\n21\r\n312\r\n3\r\n12\r\n3\r\n12\r\n31\r\n23\r\n12\r\n3', '2018-03-26', '2018-03-30', '2018-03-30', 3),
(2782, 1, 'wernke', 'IT', 35, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', '1\r\n2\r\n3\r\n   4 \r\n     5\r\n      6\r\n7\r\n78945qweq32qdfsdf\r\n', '2018-04-02', '2018-04-06', '2018-04-06', 3),
(2783, 1, 'wernke', 'IT', 36, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', '1\r\n2\r\n3\r\n   4 \r\n     5\r\n      6\r\n7\r\n78945qweq32qdfsdf\r\n', '2018-04-09', '2018-04-13', '2018-04-13', 3),
(2784, 1, 'wernke', 'IT', 37, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', '1\r\n2\r\n3\r\n   4 \r\n     5\r\n      6\r\n7\r\n78945qweq32qdfsdf\r\n', '2018-04-16', '2018-04-20', '2018-04-20', 3),
(2785, 1, 'wernke', 'IT', 38, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', '1\r\n2\r\n3\r\n   4 \r\n     5\r\n      6\r\n7', '2018-04-23', '2018-04-27', '2018-04-27', 3),
(2786, 1, 'wernke', 'IT', 39, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', '1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n10\r\n11\r\n12\r\n13\r\n14', '2018-04-30', '2018-05-04', '2018-05-04', 3),
(2787, 2, 'wernke', 'IT', 40, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labor', '2018-05-07', '2018-05-11', '2018-05-11', 3),
(2789, 0, '', '', 1, NULL, NULL, '2017-08-07', '2017-08-11', '2017-08-11', 4),
(2790, 0, '', '', 2, NULL, NULL, '2017-08-14', '2017-08-18', '2017-08-18', 4),
(2791, 0, '', '', 3, NULL, NULL, '2017-08-21', '2017-08-25', '2017-08-25', 4),
(2792, 0, '', '', 4, NULL, NULL, '2017-08-28', '2017-09-01', '2017-09-01', 4),
(2793, 0, '', '', 5, NULL, NULL, '2017-09-04', '2017-09-08', '2017-09-08', 4),
(2794, 0, '', '', 6, NULL, NULL, '2017-09-11', '2017-09-15', '2017-09-15', 4),
(2795, 0, '', '', 7, NULL, NULL, '2017-09-18', '2017-09-22', '2017-09-22', 4),
(2796, 0, '', '', 8, NULL, NULL, '2017-09-25', '2017-09-29', '2017-09-29', 4),
(2797, 0, '', '', 9, NULL, NULL, '2017-10-02', '2017-10-06', '2017-10-06', 4),
(2798, 0, '', '', 10, NULL, NULL, '2017-10-09', '2017-10-13', '2017-10-13', 4),
(2799, 0, '', '', 11, NULL, NULL, '2017-10-16', '2017-10-20', '2017-10-20', 4),
(2800, 0, '', '', 12, NULL, NULL, '2017-10-23', '2017-10-27', '2017-10-27', 4),
(2801, 0, '', '', 13, NULL, NULL, '2017-10-30', '2017-11-03', '2017-11-03', 4),
(2802, 0, '', '', 14, NULL, NULL, '2017-11-06', '2017-11-10', '2017-11-10', 4),
(2803, 0, '', '', 15, NULL, NULL, '2017-11-13', '2017-11-17', '2017-11-17', 4),
(2804, 0, '', '', 16, NULL, NULL, '2017-11-20', '2017-11-24', '2017-11-24', 4),
(2805, 0, '', '', 17, NULL, NULL, '2017-11-27', '2017-12-01', '2017-12-01', 4),
(2806, 0, '', '', 18, NULL, NULL, '2017-12-04', '2017-12-08', '2017-12-08', 4),
(2807, 0, '', '', 19, NULL, NULL, '2017-12-11', '2017-12-15', '2017-12-15', 4),
(2808, 0, '', '', 20, NULL, NULL, '2017-12-18', '2017-12-22', '2017-12-22', 4),
(2809, 0, '', '', 21, NULL, NULL, '2017-12-25', '2017-12-29', '2017-12-29', 4),
(2810, 0, '', '', 22, NULL, NULL, '2018-01-01', '2018-01-05', '2018-01-05', 4),
(2811, 0, '', '', 23, NULL, NULL, '2018-01-08', '2018-01-12', '2018-01-12', 4),
(2812, 0, '', '', 24, NULL, NULL, '2018-01-15', '2018-01-19', '2018-01-19', 4),
(2813, 0, '', '', 25, NULL, NULL, '2018-01-22', '2018-01-26', '2018-01-26', 4),
(2814, 0, '', '', 26, NULL, NULL, '2018-01-29', '2018-02-02', '2018-02-02', 4),
(2815, 0, '', '', 27, NULL, NULL, '2018-02-05', '2018-02-09', '2018-02-09', 4),
(2816, 0, '', '', 28, NULL, NULL, '2018-02-12', '2018-02-16', '2018-02-16', 4),
(2817, 0, '', '', 29, NULL, NULL, '2018-02-19', '2018-02-23', '2018-02-23', 4),
(2818, 0, '', '', 30, NULL, NULL, '2018-02-26', '2018-03-02', '2018-03-02', 4),
(2819, 0, '', '', 31, NULL, NULL, '2018-03-05', '2018-03-09', '2018-03-09', 4),
(2820, 1, '', '', 32, NULL, NULL, '2018-03-12', '2018-03-16', '2018-03-16', 4),
(2821, 1, '', '', 33, NULL, NULL, '2018-03-19', '2018-03-23', '2018-03-23', 4),
(2822, 2, '', '', 34, NULL, NULL, '2018-03-26', '2018-03-30', '2018-03-30', 4),
(2823, 2, '', '', 35, NULL, NULL, '2018-04-02', '2018-04-06', '2018-04-06', 4),
(2824, 0, '', '', 36, NULL, NULL, '2018-04-09', '2018-04-13', '2018-04-13', 4),
(2825, 0, '', '', 37, NULL, NULL, '2018-04-16', '2018-04-20', '2018-04-20', 4),
(2826, 0, '', '', 38, NULL, NULL, '2018-04-23', '2018-04-27', '2018-04-27', 4),
(2827, 0, '', '', 39, NULL, NULL, '2018-04-30', '2018-05-04', '2018-05-04', 4),
(2828, 0, '', '', 40, NULL, NULL, '2018-05-07', '2018-05-11', '2018-05-11', 4),
(2829, 0, '', '', 41, NULL, NULL, '2018-05-14', '2018-05-18', '2018-05-18', 4),
(2830, 0, '', '', 41, NULL, NULL, '2018-05-14', '2018-05-18', '2018-05-18', 3);

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
  `AusbildungStartDatum` date NOT NULL,
  `AusbildungEndeDatum` date NOT NULL,
  `BNr` int(10) NOT NULL,
  `GNr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `teilnehmer`
--

INSERT INTO `teilnehmer` (`TNr`, `TName`, `TPasswort`, `TSemester`, `AusbildungStartDatum`, `AusbildungEndeDatum`, `BNr`, `GNr`) VALUES
(3, 'wernke', '123', 1708, '2017-08-07', '2019-07-26', 1, 1),
(4, 'treichel', '123', 1708, '2017-08-07', '2019-07-26', 1, 1);

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
  MODIFY `ENr` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2831;

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
