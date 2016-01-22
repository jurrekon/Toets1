-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 22 jan 2016 om 11:07
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `phptoets`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `activiteiten`
--

CREATE TABLE IF NOT EXISTS `activiteiten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(50) NOT NULL DEFAULT '0',
  `beschrijving` varchar(250) NOT NULL DEFAULT '0',
  `datum` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `categorie` int(11) NOT NULL DEFAULT '0',
  `kosten` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden geëxporteerd voor tabel `activiteiten`
--

INSERT INTO `activiteiten` (`id`, `titel`, `beschrijving`, `datum`, `categorie`, `kosten`) VALUES
(1, 'Voetbal', 'Gezellig met zijn alle een balletje trappen hier in de omgeving. Kom gezellig langs en doen mee!', '2016-01-28 10:00:00', 1, '0.00'),
(2, 'Rave', 'Boem boem pong pong hakken en zagen. Je kent het wel en voor een klein extra bedrag krijg je een gratis pillen goodybag erbij (informatie bij de begeleiding).', '2016-01-27 23:23:23', 1, '12.50'),
(3, 'Rijksmuseum', 'Dagje naar het rijksmuseum. Kom kijken wat het beste museum van Nederland te bieden heeft.', '2016-02-14 09:00:00', 2, '22.50'),
(4, 'Bezoek moskee', 'Kijkje in een echt moskee. Maak kennis met de Islam. NIET VOOR WILDERS!', '2016-02-16 11:00:00', 2, '0.00'),
(5, 'Trip 2e kamer', 'Kijken bij de 2e kamer en kennismaking met politicus. Gezellig voor jong en oud.', '2016-02-21 10:30:00', 3, '15.00'),
(6, 'Discussie dag', 'Met zijn allen discusseren over verschillende onderwerpen die momenteel in het nieuws zijn. Kom erachter wat uw buurt denkt.', '2016-02-26 13:30:00', 3, '5.00'),
(7, 'Soep uitdelen', 'Soep uitdelen aan zwervers. Help ons hun te helpen.', '2016-02-29 11:00:00', 4, '0.00'),
(8, 'Dierenasiel', 'Help een het dierenasiel voor een dag. Hoe kun je nu nee zeggen tegen al die lieve snoetjes?', '2016-03-03 08:30:00', 4, '0.00'),
(12, 'Wandelen met bejaarden', 'Kom gezellig een middag met ons een middag wandelen door de wilde natuur. Aan het eind nemen we nog een kopje koffie met een gebakje. We hopen u snel te zien.', '2016-01-22 12:00:00', 4, '0.00'),
(13, 'Straaten', 'We hebben een nieuwe stoep en pad nodig dus kom straten. Wij zorgen zelf voor koffie en een gebakje. Ook krijgt u na afloop een klein cadeautje van ons. We hopen u snel te zien.', '2016-01-27 08:00:00', 4, '0.00'),
(14, 'Blikken sorteren bij de voedselbank', 'Help een stadsgenoot de winter door!', '2016-02-29 12:00:00', 4, '0.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`id`, `naam`) VALUES
(1, 'Sport'),
(2, 'Cultuur'),
(3, 'Politiek'),
(4, 'Vrijwilligerswerk');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persooninschrijving`
--

CREATE TABLE IF NOT EXISTS `persooninschrijving` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(50) DEFAULT NULL,
  `achternaam` varchar(50) DEFAULT NULL,
  `telefoon` varchar(50) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `activiteit_id` int(11) DEFAULT NULL,
  `datum_inschrijving` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `datum_betaald` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden geëxporteerd voor tabel `persooninschrijving`
--

INSERT INTO `persooninschrijving` (`id`, `voornaam`, `achternaam`, `telefoon`, `adres`, `email`, `activiteit_id`, `datum_inschrijving`, `datum_betaald`) VALUES
(1, 'Jan', 'Jankerd', '0123456789', 'fantasielaan 7 Neverland', 'troll@live.nl', 6, '2016-01-08 09:14:13', '0000-00-00 00:00:00'),
(2, 'Magriet', 'Mokker', '1234567890', 'fantasielaan 5 Neverland', 'troll@gmail.com', 7, '2016-01-08 09:15:56', NULL),
(3, 'Klaas', 'Klager', '2345678901', 'fantasielaan 3 Neverland', 'troll@hotmail.com', 2, '2016-01-08 09:16:53', NULL),
(4, 'Tommy', 'Teringlijer', '3456789012', 'fantasielaan 1 Neverland', 'troll@bing.com', 4, '2016-01-08 09:19:34', NULL),
(10, 'Dennis', 'Blokland', '0123456789', 'Hoornaar', 'derp@derpmail.derp', 8, '2016-01-08 13:30:41', NULL),
(11, 'Lenny', 'Lolbroek', '7894561230', 'Fantasielaan 9 Neverland', 'error404@notfound.com', 5, '2016-01-11 09:20:09', NULL),
(12, 'Gerrit', 'Grapjas', '09000165', 'Sexylaan 5 Sexytown', 'sexy@smexy.com', 3, '2016-01-13 11:49:02', NULL),
(21, 'Tristan', 'de Jager', '4564566464', 'Sexylaan 7 Sexytown', 'huppel@kut.com', 2, '2016-01-14 09:13:26', NULL),
(22, 'Peter', 'Snek', '06010225', 'Molleburgseweg 82', 'snp@davinci.nl', 14, '2016-01-22 09:47:47', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
