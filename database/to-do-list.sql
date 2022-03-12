-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 12 mrt 2022 om 19:28
-- Serverversie: 5.7.34
-- PHP-versie: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `to-do-list`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lijsten`
--

CREATE TABLE `lijsten` (
  `id` int(11) NOT NULL,
  `list` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `lijsten`
--

INSERT INTO `lijsten` (`id`, `list`) VALUES
(12, 'lijst'),
(13, 'jasd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taken`
--

CREATE TABLE `taken` (
  `id` int(11) NOT NULL,
  `task` varchar(125) NOT NULL,
  `description` text NOT NULL,
  `time` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL DEFAULT 'pending',
  `idList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `taken`
--

INSERT INTO `taken` (`id`, `task`, `description`, `time`, `status`, `idList`) VALUES
(1, 'test', 'sdsd', '20:56', 'done', 12),
(2, 'sdsdsd', 'Geen beschrijving', '18:56', 'done', 12),
(3, 'sdsdsd', 'Geen beschrijving', '18:57', 'done', 12),
(4, 'sdsdsd', 'Geen beschrijving', '20:57', 'done', 13),
(5, 'sdsdsd', 'Geen beschrijving', '09:56', 'done', 13);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lijsten`
--
ALTER TABLE `lijsten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `lijsten`
--
ALTER TABLE `lijsten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `taken`
--
ALTER TABLE `taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
