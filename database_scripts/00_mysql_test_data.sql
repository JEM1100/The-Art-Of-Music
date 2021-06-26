-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jun 2021 um 10:16
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `the_art_of_music`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `songs_chords`
--

CREATE TABLE `songs_chords` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `BPM` int(11) DEFAULT NULL,
  `Song_Key` varchar(255) DEFAULT NULL,
  `I` varchar(255) DEFAULT NULL,
  `II` varchar(255) DEFAULT NULL,
  `III` varchar(255) DEFAULT NULL,
  `IV` varchar(255) DEFAULT NULL,
  `V` varchar(255) DEFAULT NULL,
  `VI` varchar(255) DEFAULT NULL,
  `VII` varchar(255) DEFAULT NULL,
  `VIII` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `songs_chords`
--

INSERT INTO `songs_chords` (`id`, `name`, `BPM`, `Song_Key`, `I`, `II`, `III`, `IV`, `V`, `VI`, `VII`, `VIII`) VALUES
(1, 'Virtual Insanity', 184, 'Gb/Ebm', 'Ebm7', 'Ab9', 'Db9', 'Gbmaj7', 'Cm7b5', 'Bmaj7', 'Bb7#5', NULL),
(2, 'Baila (Sexy Thing)', 120, 'Bb/Gm', 'Gm7', 'C7', 'Cm7', 'F', 'Gm', 'Bb', 'D7#9', 'Eb'),
(3, 'Lonely Boy', 166, 'G/Em', 'E', 'G', 'A', 'E5', NULL, NULL, NULL, NULL),
(4, 'Take Me Out', 105, 'G/Em', 'Em', 'Am', 'A#m', 'Bm', NULL, NULL, NULL, NULL),
(5, 'Back in Black', 184, 'G/Em', 'E5', 'D5', 'A5', 'B5', 'G', NULL, NULL, NULL),
(6, 'Johnny B. Goode', 168, 'Bb/Gm', 'Bb', 'Eb', 'F', NULL, NULL, NULL, NULL, NULL),
(7, 'Voyager', 120, 'G/Em', 'D', 'C#m7 (add 11)', 'Cmaj7', 'C', NULL, NULL, NULL, NULL),
(8, 'You Know How We Do It', 186, 'C#/Bbm', 'Ebm7', 'Bbm7', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Smells Like Teen Spirit', 117, 'Ab/Fm', 'F5', 'Ab5', 'Db5', 'Gb5', NULL, NULL, NULL, NULL),
(10, 'Naive', 103, 'B/G#m', 'Abm', 'Ab7sus4', 'E', 'Gb', 'B', 'Gb7', 'Esus2', 'Ebm7'),
(11, 'Supersonic', 103, 'A/F#m', 'Gbm', 'Am', 'Bm', 'E', 'D', 'Db7', NULL, NULL),
(12, 'La Camisa Negra', 96, 'A/F#m', 'Gbm', 'Db7', 'Bm', 'Gb', 'Abm', 'Bbm', 'B', NULL),
(13, 'Applaus Applaus', 182, 'G/Em', 'G', 'D', 'Em', 'C', NULL, NULL, NULL, NULL),
(14, 'More Than Ever', 145, 'Ab/Fm', 'Fm', 'Bbm', 'Cm', NULL, NULL, NULL, NULL, NULL),
(15, 'Happy', 160, 'Ab/Fm', 'F7', 'Fm7', 'Bb', 'C', 'Dbmaj7', 'Cm7', NULL, NULL),
(16, 'FÃ¼r Elise', 120, 'C/Am', 'Am', 'E', 'C', 'G', NULL, NULL, NULL, NULL),
(17, 'You Give Love A Bad Name', 123, 'Eb/Cm', 'C5', 'Ab5', 'Bb5', 'Eb5', 'Bb', 'F', 'G', NULL),
(18, 'This Love', 190, 'Eb/Cm', 'G7', 'Cm7', 'Fm7', 'Bb7', 'Ebmaj7', 'F7', 'Ab7', NULL),
(19, 'When You Were Young', 130, 'B/G#m', 'E5', 'Gb5', 'Ab5', 'B5', 'E', 'Gb', 'Abm', 'B'),
(20, 'Police Truck', 101, 'G/Em', 'Em7', 'Em6', 'Emb6', 'E', 'B5', 'Bb5', 'A5', 'G5'),
(21, 'Courage to Grow', 140, 'B/G#m', 'Abm', 'Ebm', 'E', 'Dbm', 'Bbm', 'Fm', 'Gbm', NULL),
(22, 'Corazon Espinado', 120, 'D/Bm', 'Bm', 'F#', 'Em', 'D', 'A', NULL, NULL, NULL),
(23, 'Around The World (ATC)', 132, 'C/Am', 'Am', 'Em', 'F', 'G', 'Bbm', 'Fm', 'Gb', 'Ab'),
(24, 'Bright Side of Life', 186, 'F/Dm', 'Dm', 'Bb', 'Am', 'G', 'C', 'Edim', NULL, NULL),
(25, 'Red Flag', 183, 'C/Am', 'Am', 'C', 'Abdim', 'E7', 'F7', 'G7', 'Bb7', 'Fm'),
(26, 'Under the Bridge', 170, 'E/C#m', 'D', 'Gb', 'E', 'B', 'Dbm', 'A', 'Emaj7', 'Gbm');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `songs_chords`
--
ALTER TABLE `songs_chords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `songs_chords`
--
ALTER TABLE `songs_chords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
