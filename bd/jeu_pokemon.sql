-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 31 Juillet 2019 à 11:36
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeu_pokemon`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `pv` int(11) DEFAULT NULL,
  `fk_id_dresseur` int(11) DEFAULT NULL,
  `fk_id_pokemon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dresseur`
--

CREATE TABLE `dresseur` (
  `id_dresseur` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mdp` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `dresseur`
--

INSERT INTO `dresseur` (`id_dresseur`, `name`, `mdp`) VALUES
(11, 'Noel', '1'),
(16, 'Pierre', '1');

-- --------------------------------------------------------

--
-- Structure de la table `pokemonDesk`
--

CREATE TABLE `pokemonDesk` (
  `id_pokemon` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_image_d1` text COLLATE utf8_unicode_ci,
  `url_image_d2` text COLLATE utf8_unicode_ci,
  `evol` int(1) DEFAULT NULL,
  `pv` int(11) DEFAULT NULL,
  `fk_id_att1` int(11) NOT NULL,
  `fk_id_att2` int(11) NOT NULL,
  `fk_id_att3` int(11) NOT NULL,
  `fk_id_att4` int(11) NOT NULL,
  `pv_max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pokemonDesk`
--

INSERT INTO `pokemonDesk` (`id_pokemon`, `name`, `url_image_d1`, `url_image_d2`, `evol`, `pv`, `fk_id_att1`, `fk_id_att2`, `fk_id_att3`, `fk_id_att4`, `pv_max`) VALUES
(1, 'bulbizarre', 'image/bulbizarre_d1.gif', 'image/bulbizarre_d2.gif', 1, 5, 1, 2, 3, 4, 5),
(2, 'herbizarre', 'image/herbizarre_d1.gif', 'image/herbizarre_d2.gif', 2, 47, 3, 4, 5, 6, 47),
(3, 'florizarre', 'image/florizarre_d1.gif', 'image/florizarre_d2.gif', 3, 82, 6, 7, 8, 9, 82),
(4, 'carapuce', 'image/carapuce_d1.gif', 'image/carapuce_d2.gif', 1, 7, 1, 10, 11, 12, 7),
(5, 'carabaffe', 'image/carabaffe_d1.gif', 'image/carabaffe_d2.gif', 2, 53, 11, 12, 13, 14, 53),
(6, 'tortank', 'image/tortank_d1.gif', 'image/tortank_d2.gif', 3, 99, 14, 15, 16, 17, 99),
(7, 'salamèche', 'image/salameche_d1.gif', 'image/salameche_d2.gif', 1, 6, 18, 2, 19, 20, 6),
(8, 'reptincel', 'image/reptincel_d1.gif', 'image/reptincel_d2.gif', 2, 50, 19, 20, 21, 22, 50),
(9, 'dracaufeu', 'image/dracaufeu_d1.gif', 'image/dracaufeu_d2.gif', 3, 87, 22, 23, 24, 25, 87),
(10, 'fantominus', 'image/fantominus_d1.gif', 'image/fantominus_d2.gif', 1, 4, 26, 27, 28, 29, 4),
(11, 'spectrum', 'image/spectrum_d1.gif', 'image/spectrum_d2.gif', 2, 45, 28, 29, 30, 31, 45),
(12, 'ectoplasma', 'image/ectoplasma_d1.gif', 'image/ectoplasma_d2.gif', 3, 78, 31, 32, 33, 34, 78);

-- --------------------------------------------------------

--
-- Structure de la table `typeAttaque`
--

CREATE TABLE `typeAttaque` (
  `id_typeAttaque` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degat` int(5) DEFAULT NULL,
  `pp` int(5) DEFAULT NULL,
  `genreAttaque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `typeAttaque`
--

INSERT INTO `typeAttaque` (`id_typeAttaque`, `name`, `degat`, `pp`, `genreAttaque`) VALUES
(1, 'charge', 1, 35, 1),
(2, 'rugissement', 1, 40, 3),
(3, 'vampigraine', 1, 10, 2),
(4, 'fouets lianes', 1, 25, 1),
(5, 'poudre toxik', 1, 15, 3),
(6, 'bêlier', 1, 30, 1),
(7, 'tranch herbe', 1, 25, 1),
(8, 'mégasangsue', 1, 10, 2),
(9, 'lance soleil', 1, 5, 1),
(10, 'mimi_queue', 1, 40, 3),
(11, 'pistolet à O', 1, 15, 1),
(12, 'écume', 1, 25, 1),
(13, 'morsure', 1, 15, 1),
(14, 'abri', 1, 15, 3),
(15, 'coudkrane', 1, 30, 1),
(16, 'bulle dO', 1, 15, 1),
(17, 'hydrocanon', 1, 5, 1),
(18, 'griffe', 1, 35, 1),
(19, 'flammèche', 1, 15, 1),
(20, 'tranche', 1, 20, 1),
(21, 'lance flamme', 1, 15, 1),
(22, 'grimace', 1, 20, 3),
(23, 'croc feu', 1, 10, 1),
(24, 'éclate roc', 1, 15, 1),
(25, 'déflagration', 1, 5, 1),
(26, 'lèchouille', 1, 35, 1),
(27, 'onde folie', 1, 30, 3),
(28, 'ball ombre', 1, 35, 1),
(29, 'cauchemard', 1, 25, 1),
(30, 'gaz toxik', 1, 15, 3),
(31, 'dévorève', 1, 15, 2),
(32, 'psyko', 1, 25, 1),
(33, 'tourmente', 1, 10, 1),
(34, 'rafale psy', 1, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `valeursPokemon`
--

CREATE TABLE `valeursPokemon` (
  `id_valeursPokemon` int(11) NOT NULL,
  `pv_max` int(4) DEFAULT NULL,
  `xp` int(15) DEFAULT NULL,
  `lvl` int(3) DEFAULT NULL,
  `fk_id_pokemon` int(11) NOT NULL,
  `fk_id_dresseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `valeursPokemon`
--

INSERT INTO `valeursPokemon` (`id_valeursPokemon`, `pv_max`, `xp`, `lvl`, `fk_id_pokemon`, `fk_id_dresseur`) VALUES
(1, 5, 0, 1, 1, NULL),
(2, 47, 0, 1, 2, NULL),
(3, 82, 0, 1, 3, NULL),
(4, 7, 0, 1, 4, NULL),
(5, 53, 0, 1, 5, NULL),
(6, 99, 0, 1, 6, NULL),
(7, 6, 0, 1, 7, NULL),
(8, 50, 0, 1, 8, NULL),
(9, 87, 0, 1, 9, NULL),
(10, 4, 0, 1, 10, NULL),
(11, 45, 0, 1, 11, NULL),
(12, 78, 0, 1, 12, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`),
  ADD KEY `fk_id_dresseur` (`fk_id_dresseur`),
  ADD KEY `fk_id_pokemon` (`fk_id_pokemon`);

--
-- Index pour la table `dresseur`
--
ALTER TABLE `dresseur`
  ADD PRIMARY KEY (`id_dresseur`);

--
-- Index pour la table `pokemonDesk`
--
ALTER TABLE `pokemonDesk`
  ADD PRIMARY KEY (`id_pokemon`);

--
-- Index pour la table `typeAttaque`
--
ALTER TABLE `typeAttaque`
  ADD PRIMARY KEY (`id_typeAttaque`);

--
-- Index pour la table `valeursPokemon`
--
ALTER TABLE `valeursPokemon`
  ADD PRIMARY KEY (`id_valeursPokemon`),
  ADD KEY `fk_id_pokemon` (`fk_id_pokemon`),
  ADD KEY `fk_id_dresseur` (`fk_id_dresseur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `dresseur`
--
ALTER TABLE `dresseur`
  MODIFY `id_dresseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `pokemonDesk`
--
ALTER TABLE `pokemonDesk`
  MODIFY `id_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `typeAttaque`
--
ALTER TABLE `typeAttaque`
  MODIFY `id_typeAttaque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `valeursPokemon`
--
ALTER TABLE `valeursPokemon`
  MODIFY `id_valeursPokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`fk_id_dresseur`) REFERENCES `dresseur` (`id_dresseur`),
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`fk_id_pokemon`) REFERENCES `pokemonDesk` (`id_pokemon`);

--
-- Contraintes pour la table `valeursPokemon`
--
ALTER TABLE `valeursPokemon`
  ADD CONSTRAINT `fk_id_dresseur` FOREIGN KEY (`fk_id_dresseur`) REFERENCES `dresseur` (`id_dresseur`),
  ADD CONSTRAINT `fk_id_pokemon` FOREIGN KEY (`fk_id_pokemon`) REFERENCES `pokemonDesk` (`id_pokemon`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
