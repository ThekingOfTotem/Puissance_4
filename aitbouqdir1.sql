-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 mars 2023 à 00:03
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aitbouqdir1`
--

-- --------------------------------------------------------

--
-- Structure de la table `coup`
--

CREATE TABLE `coup` (
  `ID_partie` int(11) NOT NULL,
  `ID_joueur` int(11) NOT NULL,
  `Colonne` int(11) NOT NULL,
  `Ligne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `ID_joueur` int(11) NOT NULL,
  `Nom_joueur` varchar(30) NOT NULL,
  `Mot_de_passe` varchar(30) NOT NULL,
  `Victoire` int(11) NOT NULL DEFAULT 0,
  `Egalite` int(11) NOT NULL DEFAULT 0,
  `Defaite` int(11) NOT NULL DEFAULT 0,
  `Parties_jouees` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`ID_joueur`, `Nom_joueur`, `Mot_de_passe`, `Victoire`, `Egalite`, `Defaite`, `Parties_jouees`) VALUES
(22, 'toto', '$2y$10$vHwZorfBpn0IjHB8p2MBkuG', 0, 0, 0, 0),
(23, 'titi', '$2y$10$rtuVBx44fBpy6ueW611OduU', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `partielocal`
--

CREATE TABLE `partielocal` (
  `id` int(11) NOT NULL,
  `nomjoueur` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `record` int(11) NOT NULL DEFAULT 0,
  `nbvictoire` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `partielocal`
--

INSERT INTO `partielocal` (`id`, `nomjoueur`, `record`, `nbvictoire`) VALUES
(18, 'titi', 0, 2),
(17, 'toto', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE `parties` (
  `ID_partie` int(11) NOT NULL,
  `Nom_Joueur1` varchar(50) NOT NULL,
  `Nom_Joueur2` varchar(50) NOT NULL,
  `Statut` varchar(50) NOT NULL,
  `Tour` varchar(50) NOT NULL,
  `Resultat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`ID_partie`, `Nom_Joueur1`, `Nom_Joueur2`, `Statut`, `Tour`, `Resultat`) VALUES
(117, 'titi', 'toto', 'en cours', 'Joueur1', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`ID_joueur`);

--
-- Index pour la table `partielocal`
--
ALTER TABLE `partielocal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`ID_partie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `ID_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `partielocal`
--
ALTER TABLE `partielocal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `ID_partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
