-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 07 dec 2021 om 01:23
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
-- Database: `Rent-a-Car`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `carname` varchar(45) NOT NULL,
  `cardailyprice` double NOT NULL,
  `carimg` varchar(45) DEFAULT NULL,
  `carseats` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `car`
--

INSERT INTO `car` (`id`, `carname`, `cardailyprice`, `carimg`, `carseats`) VALUES
(1, 'Ford Fiesta', 65, './img/fiesta.jpeg', 4),
(2, 'Toyota Aygo', 45, './img/aygo.jpeg', 4),
(3, 'BMW 3 Series', 110, './img/3_series.jpeg', 5),
(4, 'Peugot 208', 45, './img/208.jpeg', 4),
(5, 'Audi Q2', 120, './img/q2.jpeg', 5),
(6, 'Kia Stonic', 95, './img/stonic_lrg.jpeg', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservering`
--

CREATE TABLE `reservering` (
  `idreservering` int(11) NOT NULL,
  `startdatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `userid` int(11) NOT NULL,
  `carid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reservering`
--

INSERT INTO `reservering` (`idreservering`, `startdatum`, `einddatum`, `userid`, `carid`) VALUES
(14, '2021-12-09', '2021-12-10', 5, 3),
(15, '2021-12-08', '2021-12-09', 5, 1),
(16, '2021-12-10', '2021-12-23', 6, 2),
(17, '2021-12-09', '2021-12-10', 6, 3),
(18, '2021-12-17', '2021-12-18', 5, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `status`, `role`) VALUES
(4, 'sander@rentacar.nl', '$2y$10$t2GT.65NBzz9ECjuXTqrgO/uBI12mAPyVIlUC1HsslQU3VNNRAtge', 0, 1),
(5, 'test@test.com', '$2y$10$9DJJH8gr4ULJ0gquh0IlpeH4vfteIGl.zoL.JYfXv67R2KQmxq5v.', 0, 0),
(6, 'info@info.info', '$2y$10$KbXyGRPCpVtJjYfn1rCgIOZV/jJbl4QsCNw1gzOQDQoUCTA3/BeGa', 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`idreservering`),
  ADD KEY `fk_reservering_user1_idx` (`userid`),
  ADD KEY `fk_reservering_car1_idx` (`carid`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `reservering`
--
ALTER TABLE `reservering`
  MODIFY `idreservering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `fk_reservering_car1` FOREIGN KEY (`carid`) REFERENCES `car` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservering_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
