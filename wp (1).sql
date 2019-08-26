-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2019. Aug 25. 18:54
-- Kiszolgáló verziója: 5.7.24
-- PHP verzió: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `wp`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id_answer` int(11) NOT NULL AUTO_INCREMENT,
  `id_poll` int(11) NOT NULL,
  `text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id_answer`),
  KEY `id_poll` (`id_poll`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `answer`
--

INSERT INTO `answer` (`id_answer`, `id_poll`, `text`, `amount`) VALUES
(1, 1, 'Nice!', 45),
(2, 1, 'Okay.', 43),
(3, 1, 'Meh!', 35),
(4, 1, 'Ugly', 58);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `log`
--

INSERT INTO `log` (`id`, `data`, `time`) VALUES
(1, 'ip: ::1, user:valami@valami.com, password: 123456, id: 4', '2019-08-23 08:58:15'),
(2, 'ip: ::1, user:alex, password: asd123, id: ', '2019-08-23 08:58:21'),
(3, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 08:58:25'),
(4, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 08:58:33'),
(5, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:12:54'),
(6, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:16:36'),
(7, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:17:40'),
(8, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:21:51'),
(9, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:23:13'),
(10, 'ip: ::1, user:asd, password: hflgglg, id: ', '2019-08-23 09:23:21'),
(11, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:24:20'),
(12, 'ip: ::1, user:asd, password: k, id: ', '2019-08-23 09:24:25'),
(13, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(14, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(15, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(16, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(17, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(18, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(19, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(20, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(21, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:25'),
(22, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(23, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(24, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(25, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(26, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(27, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(28, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(29, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(30, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(31, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:24:26'),
(32, 'ip: ::1, user:, password: , id: ', '2019-08-23 09:25:19'),
(33, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:25:21'),
(34, 'ip: ::1, user:asd, password: h, id: ', '2019-08-23 09:25:26'),
(35, 'ip: ::1, user:asd, password: h, id: ', '2019-08-23 09:25:39'),
(36, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:25:43'),
(37, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-23 09:38:24'),
(38, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-25 17:31:32'),
(39, 'ip: ::1, user:asd, password: asdasd, id: ', '2019-08-25 17:31:38'),
(40, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-25 17:34:32'),
(41, 'ip: ::1, user:asd, password: 123456, id: 3', '2019-08-25 17:50:04');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `poll`
--

DROP TABLE IF EXISTS `poll`;
CREATE TABLE IF NOT EXISTS `poll` (
  `id_poll` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_poll`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `poll`
--

INSERT INTO `poll` (`id_poll`, `question`) VALUES
(1, 'Hogy tetszik a weboldal?');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

DROP TABLE IF EXISTS `termekek`;
CREATE TABLE IF NOT EXISTS `termekek` (
  `id` int(3) NOT NULL,
  `marka` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(70) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `fajta` varchar(30) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(5) NOT NULL,
  `raktaron` tinyint(1) NOT NULL,
  `evjarat` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `marka`, `nev`, `fajta`, `ar`, `raktaron`, `evjarat`) VALUES
(5, 'Albert Bichot ', 'Chablis Grand Cru Moutonne Monopole', 'FehÃ©r bor', 3000, 1, 2013),
(6, 'Albert Bichot', 'Chablis 1er Cru Vaillons', 'FehÃ©r bor', 4700, 1, 2015),
(7, 'Alain Jaume&Fils', 'Domaine Grand Veneur Cotes du Rhone Blanc Reserve', 'FehÃ©r bor', 4760, 1, 2014),
(8, 'Bjelica ', 'Saga ', 'FehÃ©r bor', 1320, 1, 2017),
(9, 'Bjelica ', 'Babaroga ', 'FehÃ©r bor', 2520, 1, 2017),
(10, 'Bodegas Muga', 'Muga Blanco', 'FehÃ©r bor', 1575, 1, 2017),
(11, 'Alain Jaume&Fils', 'Domaine Grand Veneur Chateauneuf du Pape', 'VÃ¶rÃ¶s bor', 2840, 1, 2013),
(12, 'Alain Jaume&Fils', 'Domaine Grand Veneur Cotes du Rhone Rouge Reserve', 'VÃ¶rÃ¶s bor', 2720, 1, 2014),
(13, 'Albert Bichot', 'Vosne Romanee Domaine du Clos Frantin', 'VÃ¶rÃ¶s bor', 1430, 1, 2012),
(14, 'AleksandroviÄ‡', 'Regent Reserve', 'VÃ¶rÃ¶s bor', 1700, 1, 2013),
(15, 'AleksandroviÄ‡', 'Rodoslov Grand Reserve', 'VÃ¶rÃ¶s bor', 3717, 1, 2013),
(16, 'AleksandroviÄ‡', 'Trijumf Noir', 'VÃ¶rÃ¶s bor', 1700, 1, 2012),
(17, 'AleksiÄ‡', 'Amanet ', 'VÃ¶rÃ¶s bor', 1134, 1, 2013),
(18, 'Altesino ', 'Brunello Di Montalcino Montosoli', 'VÃ¶rÃ¶s bor', 8380, 1, 2013),
(19, 'Babich ', 'Pinot Noir ', 'VÃ¶rÃ¶s bor', 2080, 1, 2016),
(20, 'Altesino ', 'Brunello Di Montalcino Vendemmia', 'VÃ¶rÃ¶s bor', 4390, 1, 2013),
(21, 'Temet ', 'Tri Morave Rose', 'Rose', 908, 1, 2017),
(23, 'Bjelica ', 'Grafiti Rose', 'Rose', 1065, 1, 2015),
(24, 'BraÄ‡a ', 'Chateaux', 'Rose', 630, 1, 2016),
(26, 'Domaines Ott', 'By Ott Rose Cotes de Provence', 'Rose', 1850, 1, 2017);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `user` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'Alex', 'fe5c070b3d32516f5bd1fe190a6ccc27'),
(2, 'Edvin', '66183f64626062555f7bdda2d1b04927'),
(3, 'asd', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'valami@valami.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `poll` (`id_poll`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
