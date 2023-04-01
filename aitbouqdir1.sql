-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 01 avr. 2023 à 18:01
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aitbouqdir1`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `ID_joueur` int(11) NOT NULL,
  `Nom_joueur` varchar(30) NOT NULL,
  `Mot_de_passe` varchar(256) NOT NULL,
  `Victoire` int(11) NOT NULL DEFAULT 0,
  `Egalite` int(11) NOT NULL DEFAULT 0,
  `Defaite` int(11) NOT NULL DEFAULT 0,
  `Parties_jouees` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`ID_joueur`, `Nom_joueur`, `Mot_de_passe`, `Victoire`, `Egalite`, `Defaite`, `Parties_jouees`) VALUES
(22, 'toto', '$2y$10$vHwZorfBpn0IjHB8p2MBkuG', 0, 0, 0, 0),
(23, 'titi', '$2y$10$rtuVBx44fBpy6ueW611OduU', 0, 0, 0, 0),
(24, 'zzzzzee', '$2y$10$gs.BJzAsS9we0EbXJZ5Pu.v', 0, 0, 0, 0),
(25, 'azertyz', '$2y$10$Oy3rEO1m4GL/ZBw2zNtALuE', 0, 0, 0, 0),
(26, 'tata', '$2y$10$5RuG7mc1RpQImcG3ETVohettMVA2EmrGS55qMo4P5cZNgJLwdd6IG', 0, 0, 0, 0),
(27, 'test', '$2y$10$6X0iayFmOVMWd9JnjpR77OiTygeY5.vHFsOOnfuLKZCmhjPLpIcHW', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `partielocal`
--

CREATE TABLE `partielocal` (
  `id` int(11) NOT NULL,
  `nomjoueur` varchar(30) CHARACTER SET utf8 NOT NULL,
  `record` int(11) NOT NULL DEFAULT 0,
  `nbvictoire` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partielocal`
--

INSERT INTO `partielocal` (`id`, `nomjoueur`, `record`, `nbvictoire`) VALUES
(18, 'titi', 0, 2),
(17, 'toto', 0, 0),
(19, 'flo', 0, 3),
(20, 'younes', 0, 3);

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
  `Resultat` varchar(50) NOT NULL,
  `grille` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`ID_partie`, `Nom_Joueur1`, `Nom_Joueur2`, `Statut`, `Tour`, `Resultat`, `grille`) VALUES
(117, 'titi', 'toto', 'en cours', 'Joueur1', '', ''),
(118, 'titi', 'toto', 'en cours', 'Joueur1', '', ''),
(119, 'toto', 'titi', 'en cours', 'Joueur1', '', ''),
(120, 'toto', 'titi', 'en cours', 'Joueur1', '', ''),
(121, 'zzzzzee', 'azertyz', 'en cours', 'Joueur1', '', ''),
(122, 'azertyz', 'titi', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(123, 'azertyz', 'toto', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(124, 'test', 'azertyz', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(125, 'titi', 'azertyz', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(126, 'titi', 'test', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(127, 'zzzzzee', 'azertyz', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(128, 'zzzzzee', 'test', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(129, 'tata', 'toto', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(130, 'toto', 'test', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(131, 'test', 'azertyz', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(132, 'titi', 'toto', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(133, 'titi', 'zzzzzee', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(134, 'azertyz', 'zzzzzee', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(135, 'azertyz', 'toto', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(136, 'azertyz', 'test', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(137, 'titi', 'toto', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(138, 'titi', 'test', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(139, 'zzzzzee', 'toto', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]'),
(140, 'test', 'zzzzzee', 'en cours', 'Joueur1', '', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,0,0,0,0,0,0]]');

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
  MODIFY `ID_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `partielocal`
--
ALTER TABLE `partielocal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `ID_partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
