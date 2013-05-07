-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 07 mei 2013 om 14:13
-- Serverversie: 5.5.29-30.0-log
-- PHP-versie: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `deb14232n4_lg`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int(25) NOT NULL AUTO_INCREMENT,
  `soort_game` enum('quiz','woordzoeker','woord') NOT NULL,
  `naam` varchar(255) NOT NULL,
  `aantal_vragen` int(25) NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `games`
--

INSERT INTO `games` (`game_id`, `soort_game`, `naam`, `aantal_vragen`) VALUES
(1, 'quiz', 'test quiz', 2),
(2, 'woord', 'Raad het woord', 2),
(10, 'woordzoeker', 'test', 13);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `leerlingennummer` int(25) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `afbeelding` varchar(255) NOT NULL,
  `score` int(25) NOT NULL DEFAULT '0',
  `credits` int(25) NOT NULL DEFAULT '10',
  `actief` int(1) NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `leerlingennummer`, `naam`, `email`, `wachtwoord`, `afbeelding`, `score`, `credits`, `actief`, `admin`) VALUES
(7, 91121012, 'Tim Luigjes', 'tim@pictor.ws', 'ac87684bbd48ac6e4e081927ab0e76a3', '3f823bda13a93e66682eba2106d15319.jpg', 300, 10, 1, 1),
(13, 101291, 'Peter Smith', 'some@email.com', '098f6bcd4621d373cade4e832627b4f6', '4a72483cd6a4f37cbe8ad678608bf7df.jpg', 6, 3, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int(5) NOT NULL AUTO_INCREMENT,
  `game_id` int(5) NOT NULL,
  `vraag` varchar(255) NOT NULL,
  `antwoord_1` varchar(255) NOT NULL,
  `antwoord_2` varchar(255) NOT NULL,
  `antwoord_3` varchar(255) NOT NULL,
  `antwoord_4` varchar(255) NOT NULL,
  `soort_vraag` enum('tekst','afbeelding') NOT NULL,
  `goede_antwoord` int(1) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `game_id`, `vraag`, `antwoord_1`, `antwoord_2`, `antwoord_3`, `antwoord_4`, `soort_vraag`, `goede_antwoord`) VALUES
(1, 1, 'Wat is het molecule voor water?', 'H2O', 'H3O', 'H2O2', 'HO2', 'tekst', 1),
(2, 1, 'Wat is de derde dag van de week?', 'Dinsdag', 'Maandag', 'Woensdag', 'Donderdag', 'tekst', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `raad_het_woord`
--

CREATE TABLE IF NOT EXISTS `raad_het_woord` (
  `woord_id` int(3) NOT NULL AUTO_INCREMENT,
  `game_id` int(3) NOT NULL,
  `afbeelding` varchar(255) NOT NULL,
  `woord` varchar(255) NOT NULL,
  PRIMARY KEY (`woord_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `raad_het_woord`
--

INSERT INTO `raad_het_woord` (`woord_id`, `game_id`, `afbeelding`, `woord`) VALUES
(1, 2, 'pikachu.png', 'pikachu'),
(6, 2, 'linkedin.jpg', 'linkedin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `woordzoeker`
--

CREATE TABLE IF NOT EXISTS `woordzoeker` (
  `woordzoeker_id` int(10) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `woord` varchar(255) NOT NULL,
  PRIMARY KEY (`woordzoeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Gegevens worden uitgevoerd voor tabel `woordzoeker`
--

INSERT INTO `woordzoeker` (`woordzoeker_id`, `game_id`, `woord`) VALUES
(1, 10, 'test'),
(2, 10, 'aarde'),
(3, 10, 'neowin'),
(4, 10, 'leergame'),
(5, 10, 'sleutel'),
(6, 10, 'webhosting'),
(7, 10, 'quiz'),
(8, 10, 'home'),
(9, 10, 'robyn'),
(10, 10, 'stop'),
(11, 10, 'robot'),
(12, 10, 'night'),
(18, 10, 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
