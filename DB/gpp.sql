-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2018 at 07:01 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `afbeeldingen`
--

CREATE TABLE `afbeeldingen` (
  `afbeelding_id` int(10) UNSIGNED NOT NULL,
  `afbeelding_path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bios_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `afbeeldingen`
--

INSERT INTO `afbeeldingen` (`afbeelding_id`, `afbeelding_path`, `bios_id`) VALUES
(1, '5bc6db024c8f1.jpg', 1),
(2, '5bc6db024ccc9.jpg', 1),
(3, '5bc6db024cfbf.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bereikbaarheid`
--

CREATE TABLE `bereikbaarheid` (
  `bereikbaarheid_id` int(10) UNSIGNED NOT NULL,
  `bereikbaarheid_naam` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bereikbaarheid_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bios_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bereikbaarheid`
--

INSERT INTO `bereikbaarheid` (`bereikbaarheid_id`, `bereikbaarheid_naam`, `bereikbaarheid_content`, `bios_id`) VALUES
(1, 'auto', 'Met de auto bereikt u Kinepolis Almere door richting \'Centrum\' te volgen. Rondom Kinepolis Almere is volop parkeergelegenheid. De P6 Hospitaalgarage of P7 Schippersgarage zijn het gunstigst gelegen t.o.v. de bioscoop. Parkeert u na 18:00 uur, dan geldt het maximale avondtarief van €5,25 voor de hele avond. ', 1),
(2, 'ov', 'U kunt ons met de trein en bus zeer makkelijk bereiken. Vanaf station Almere Centrum loopt u in circa 5 minuten in zuidelijke richting richting naar Almere Citymall. Kinepolis Almere is tevens goed bereikbaar per bus via haltes Passage (buslijn M1 & M4) en Flevoziekenhuis (buslijn M5 en M7). Voor actuele bustijden kijkt u op 9292.nl.', 1),
(3, 'fiets', 'Citymall Almere heeft diverse (bewaakte) fietsenstallingen, bijvoorbeeld aan de Hospitaaldreef.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bioscopen`
--

CREATE TABLE `bioscopen` (
  `bios_id` int(10) UNSIGNED NOT NULL,
  `bios_naam` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bios_straatnaam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bios_huisnummer` int(11) NOT NULL,
  `bios_toevoeging` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bios_woonplaats` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bios_provincie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bios_beschrijving` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bios_voorwaarden` text COLLATE utf8mb4_unicode_ci,
  `bios_rolstoeltoegankelijkheid` text COLLATE utf8mb4_unicode_ci,
  `bios_postcode` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bioscopen`
--

INSERT INTO `bioscopen` (`bios_id`, `bios_naam`, `bios_straatnaam`, `bios_huisnummer`, `bios_toevoeging`, `bios_woonplaats`, `bios_provincie`, `bios_beschrijving`, `bios_voorwaarden`, `bios_rolstoeltoegankelijkheid`, `bios_postcode`, `user_id`) VALUES
(1, 'Kinepolis Almere', 'Forum', 16, '', 'Almere', 'Nederland', 'Kinepolis Almere is sinds 2004 gevestigd in het levendige centrum van Almere. Het ontwerp van het imposante gebouw is van de bekroonde architect Rem Koolhaas. De megabioscoop telt 8 zalen met in totaal 2137 comfortabele stoelen. Bij binnenkomst is de trap die diagonaal door het gebouw loopt, de eerste blikvanger. Kinepolis Almere is sinds november 2017 verbouwd om meer aan te sluiten bij de look-and-feel van Kinepolis. Dit betekent dat alle zetels zijn vernieuwd,  dat er automatische ticket machines (ATM’s) op de trap zijn geplaatst en er een volledige nieuwe shop met een ruimer assortiment is gekomen.', 'N.B. Bovenstaande prijzen zijn per persoon, zijn niet geldig bij evenementen, speciale voorstellingen of besloten voorstellingen en altijd exclusief toeslagen.', 'Kinepolis Almere heeft in elke zaal mindervalide plaatsen. Tevens zijn er mindervalide toiletten en een lift aanwezig.', '1315TH', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cms_id` int(10) UNSIGNED NOT NULL,
  `cms_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cms_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cms_path` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `cms_content`, `cms_name`, `cms_path`) VALUES
(1, '\n<div class=\"container\">\n    <section class=\"hero\">\n        <div class=\"hero-body\">\n            <div class=\"container\">\n                <h1 class=\"title\">\n                    Over GamplayParty\n                </h1>\n                <h2 class=\"subtitle\">\n                    Lorem ipsum dolor sit?\n                </h2>\n            </div>\n        </div>\n    </section>\n    <div class=\"tile is-parent\">\n            <article class=\"tile is-child box\">\n                <div class=\"content\">\n                    <p class=\"title\">Tall column</p>\n                    <p class=\"subtitle\">With even more content</p>\n                    <div class=\"content\">\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut. Morbi maximus, leo sit amet vehicula eleifend, nunc dui porta orci, quis semper odio felis ut quam.</p>\n                        <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>\n                        <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>\n                        <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed, gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>\n                        <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>\n                        <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed, gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>\n                        <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed, gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>\n                    </div>\n                </div>\n            </article>\n    </div>\n</div>\n<section class=\"hero\">\n    <div class=\"hero-body\">\n        <div class=\"container has-text-centered\">\n            <h3 class=\"title is-1\">\n                Lorem, ipsum.\n            </h3>\n            <p class=\"subtitle\">\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis modi aut mollitia tempore. Animi, tempora?\n            </p>\n        </div>\n    </div>\n</section>\n', 'over ons', 'overons'),
(2, '\n<section class=\"hero\">\n  <div class=\"hero-body\">\n    <div class=\"container has-text-centered\">\n      <h1 class=\"title\">\n        Contact\n      </h1>\n      <h2 class=\"subtitle\">\n        Dit is de contact pagina.\n      </h2>\n    </div>\n  </div>\n</section>\n\n<section class=\"section\">\n\n<div class=\"columns\">\n\n    <div class=\"column is-desktop\"></div>\n\n    <div class=\"column is-half-tablet is-one-third-desktop\">\n\n        <div class=\"card\">\n            <header class=\"card-header\">\n                <h2 class=\"card-header-title\">\n                    Contact\n                </h2>\n            </header>\n            <div class=\"card-content\">\n                <div class=\"content\">\n                    \n                    <form action=\"/contact\" method=\"post\">\n                        <div class=\"field\">\n                            <label for=\"naam\" class=\"label\">Naam:</label>\n                            <div class=\"control\">\n                                <input id=\"naam\" name=\"naam\" class=\"input\" type=\"text\" placeholder=\"Naam\">\n                            </div>\n                        </div>\n\n                        <div class=\"field\">\n                            <label for=\"email\" class=\"label\">E-mail:</label>\n                            <div class=\"control\">\n                                <input id=\"email\" name=\"email\" class=\"input\" type=\"email\" placeholder=\"E-mail\">\n                            </div>\n                        </div>\n\n                        <div class=\"field\">\n                            <label for=\"bericht\" class=\"label\">Bericht:</label>\n                            <div class=\"control\">\n                                <textarea id=\"bericht\" name=\"bericht\" class=\"textarea\"></textarea>\n                            </div>\n                        </div>\n\n                        <div class=\"control\">\n                            <input name=\"submit\" class=\"button is-primary\" type=\"submit\" value=\"Verzend\">\n                        </div>\n                    </form>\n\n                </div>\n            </div>\n        </div>\n\n    </div>\n\n    <div class=\"column is-desktop\"></div>\n\n</div>\n\n</section>\n', 'contact', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `klant_id` int(10) UNSIGNED NOT NULL,
  `klant_geslacht` tinyint(4) NOT NULL,
  `klant_voorletter` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klant_achternaam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klant_straatnaam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klant_huisnummer` int(11) NOT NULL,
  `klant_toevoeging` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klant_postcode` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klant_woonplaats` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klant_provincie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klant_telefoonnummer` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservering`
--

CREATE TABLE `reservering` (
  `reservering_id` int(10) UNSIGNED NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reservering_tijd` int(10) UNSIGNED NOT NULL,
  `klant_id` int(10) UNSIGNED NOT NULL,
  `zaal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservering_tarieven`
--

CREATE TABLE `reservering_tarieven` (
  `reservering_id` int(10) UNSIGNED NOT NULL,
  `tarief_id` int(10) UNSIGNED NOT NULL,
  `aantal_personen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'bioscoop'),
(3, 'redacteur');

-- --------------------------------------------------------

--
-- Table structure for table `tarieven`
--

CREATE TABLE `tarieven` (
  `tarief_id` int(10) UNSIGNED NOT NULL,
  `prijs` decimal(9,2) NOT NULL,
  `naam` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toeslag` tinyint(4) NOT NULL,
  `bios_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarieven`
--

INSERT INTO `tarieven` (`tarief_id`, `prijs`, `naam`, `toeslag`, `bios_id`) VALUES
(1, '11.00', 'Normaal', 0, 1),
(2, '2.00', '3D-toeslag', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tijden`
--

CREATE TABLE `tijden` (
  `tijd_id` int(10) UNSIGNED NOT NULL,
  `begindatum` datetime NOT NULL,
  `einddatum` datetime NOT NULL,
  `zaal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tijden`
--

INSERT INTO `tijden` (`tijd_id`, `begindatum`, `einddatum`, `zaal_id`) VALUES
(1, '2018-10-18 20:00:00', '2018-10-18 23:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id`) VALUES
(1, 'test', '$2y$10$hRGDvVyEgqMv.gBMKHlpauW/Vzzu/dK/qwJs7.J4KElDfMII1C0nu', 1),
(2, 'test2', '$2y$10$hRGDvVyEgqMv.gBMKHlpauW/Vzzu/dK/qwJs7.J4KElDfMII1C0nu', 2),
(3, 'test3', '$2y$10$hRGDvVyEgqMv.gBMKHlpauW/Vzzu/dK/qwJs7.J4KElDfMII1C0nu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `zalen`
--

CREATE TABLE `zalen` (
  `zaal_id` int(10) UNSIGNED NOT NULL,
  `zaalnummer` int(11) NOT NULL,
  `aantal_stoelen` int(11) NOT NULL,
  `rolstoelplaatsen` int(11) DEFAULT NULL,
  `schermgrootte` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faciliteiten` text COLLATE utf8mb4_unicode_ci,
  `versies` text COLLATE utf8mb4_unicode_ci,
  `bios_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zalen`
--

INSERT INTO `zalen` (`zaal_id`, `zaalnummer`, `aantal_stoelen`, `rolstoelplaatsen`, `schermgrootte`, `faciliteiten`, `versies`, `bios_id`) VALUES
(1, 1, 517, 2, '21.00m x 9.00m', 'Toegankelijk voor andersvaliden\r\nCosy zone', 'Dolby 7.1\r\n3D', 1),
(2, 2, 369, 2, '	17.20m x 7.30m	', 'Toegankelijk voor andersvaliden\r\nCosy zone', 'Dolby 5.1\r\n3D', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  ADD PRIMARY KEY (`afbeelding_id`),
  ADD KEY `fk_afbeeldingen_bioscopen1_idx` (`bios_id`);

--
-- Indexes for table `bereikbaarheid`
--
ALTER TABLE `bereikbaarheid`
  ADD PRIMARY KEY (`bereikbaarheid_id`),
  ADD KEY `fk_bereikbaarheid_bioscopen1_idx` (`bios_id`);

--
-- Indexes for table `bioscopen`
--
ALTER TABLE `bioscopen`
  ADD PRIMARY KEY (`bios_id`),
  ADD KEY `fk_bioscopen_users1_idx` (`user_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexes for table `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`reservering_id`),
  ADD KEY `fk_reservering_tijden1_idx` (`reservering_tijd`),
  ADD KEY `fk_reservering_klanten1_idx` (`klant_id`),
  ADD KEY `fk_reservering_zalen1_idx` (`zaal_id`);

--
-- Indexes for table `reservering_tarieven`
--
ALTER TABLE `reservering_tarieven`
  ADD PRIMARY KEY (`reservering_id`,`tarief_id`),
  ADD KEY `fk_reservering_has_tarieven_tarieven1_idx` (`tarief_id`),
  ADD KEY `fk_reservering_has_tarieven_reservering1_idx` (`reservering_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tarieven`
--
ALTER TABLE `tarieven`
  ADD PRIMARY KEY (`tarief_id`),
  ADD KEY `fk_tarieven_bioscopen1_idx` (`bios_id`);

--
-- Indexes for table `tijden`
--
ALTER TABLE `tijden`
  ADD PRIMARY KEY (`tijd_id`),
  ADD KEY `fk_tijden_zalen1_idx` (`zaal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_users_roles_idx` (`role_id`);

--
-- Indexes for table `zalen`
--
ALTER TABLE `zalen`
  ADD PRIMARY KEY (`zaal_id`),
  ADD KEY `fk_zalen_bioscopen1_idx` (`bios_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  MODIFY `afbeelding_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bereikbaarheid`
--
ALTER TABLE `bereikbaarheid`
  MODIFY `bereikbaarheid_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bioscopen`
--
ALTER TABLE `bioscopen`
  MODIFY `bios_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `cms_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klant_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservering`
--
ALTER TABLE `reservering`
  MODIFY `reservering_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarieven`
--
ALTER TABLE `tarieven`
  MODIFY `tarief_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tijden`
--
ALTER TABLE `tijden`
  MODIFY `tijd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zalen`
--
ALTER TABLE `zalen`
  MODIFY `zaal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  ADD CONSTRAINT `fk_afbeeldingen_bioscopen1` FOREIGN KEY (`bios_id`) REFERENCES `bioscopen` (`bios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bereikbaarheid`
--
ALTER TABLE `bereikbaarheid`
  ADD CONSTRAINT `fk_bereikbaarheid_bioscopen1` FOREIGN KEY (`bios_id`) REFERENCES `bioscopen` (`bios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bioscopen`
--
ALTER TABLE `bioscopen`
  ADD CONSTRAINT `fk_bioscopen_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `fk_reservering_klanten1` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`klant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservering_tijden1` FOREIGN KEY (`reservering_tijd`) REFERENCES `tijden` (`tijd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservering_zalen1` FOREIGN KEY (`zaal_id`) REFERENCES `zalen` (`zaal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservering_tarieven`
--
ALTER TABLE `reservering_tarieven`
  ADD CONSTRAINT `fk_reservering_has_tarieven_reservering1` FOREIGN KEY (`reservering_id`) REFERENCES `reservering` (`reservering_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservering_has_tarieven_tarieven1` FOREIGN KEY (`tarief_id`) REFERENCES `tarieven` (`tarief_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tarieven`
--
ALTER TABLE `tarieven`
  ADD CONSTRAINT `fk_tarieven_bioscopen1` FOREIGN KEY (`bios_id`) REFERENCES `bioscopen` (`bios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tijden`
--
ALTER TABLE `tijden`
  ADD CONSTRAINT `fk_tijden_zalen1` FOREIGN KEY (`zaal_id`) REFERENCES `zalen` (`zaal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zalen`
--
ALTER TABLE `zalen`
  ADD CONSTRAINT `fk_zalen_bioscopen1` FOREIGN KEY (`bios_id`) REFERENCES `bioscopen` (`bios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
