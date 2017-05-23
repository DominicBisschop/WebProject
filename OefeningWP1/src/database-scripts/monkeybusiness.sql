SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `Evenementen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `klantnummer` int(11) NOT NULL,
  `bezetting` varchar(2048) NOT NULL,
  `kost` double NOT NULL,
  `materialen` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Evenementen` (`id`, `naam`, `begindatum`, `einddatum`, `klantnummer`, `bezetting`, `kost`, `materialen`) VALUES
(1, 'Verjaardag Dominic', '2017-05-29', '2017-05-29', 1, 'Werknemer 1 + 2', 200, 'Bier + hapjes'),
(2, 'Communie', '2017-05-28', '2017-05-28', 3, 'Werknemer 2 + 4', 200, 'Drank + Hapjes'),
(3, 'BBQ na de examens', '2017-07-01', '2017-07-01', 2, 'Werknemer 5 + 6', 300, 'Bier + Vlees + Drank');

CREATE TABLE `Klanten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `gemeente` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Klanten` (`id`, `naam`, `voornaam`, `postcode`, `gemeente`, `straat`, `huisnummer`, `telefoonnummer`, `mail`) VALUES
(1, 'Bisschop', 'Dominic', '6039RA', 'STRAMPROY (WEERT)', 'Amentstraat', '11', '+31652276104', 'dominicbisschop@hotmail.com'),
(2, 'Smeets', 'Michiel', '3960', 'BREE', 'Roterstraat', '27', '+32499132724', 'smeetsmichiel@gmail.com'),
(3, 'Stieners', 'Laurens', '3640', 'KINROOI', 'Breeersteenweg', '313a', '+32471393811', 'stienerslaurens@gmail.com'),
(4, 'Leenders', 'Andy', '3960', 'OPITTER', 'Maaseikerbaan', '10', '+32498305874', 'leendersandy@gmail.com');

ALTER TABLE `Evenementen`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Klanten`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Evenementen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
