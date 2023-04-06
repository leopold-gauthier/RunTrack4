-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 avr. 2023 à 15:47
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bigjob`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `ask` text COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `accepted` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `date`, `ask`, `name`, `accepted`) VALUES
(37, '2023-04-22 17:41:00', 'dadjkazdddddddddzaajdakjdazjkdakljdalkjdazjkdkajzdjkazdlkjazlkjddjkazjkdazjdalkjdlkjazdlkjazdjlkazldjkazlkjdelkjdzlkdlkjazkjl', 'red', 2),
(36, '2023-04-06 17:19:00', 'je suis présent', 'mama', 2),
(35, '2222-01-01 00:01:00', '2222', 'mama', 1),
(34, '2023-04-06 15:42:00', 'dakdzkdakdazlkdlkdlklzkdlkzlkdkazkdldzdlkazkldlkdlkazdlkazklzd', 'mama', 2),
(33, '2023-04-06 15:43:00', 'jdoaijdzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzjdakdazkdkzd toz', 'mama', 1),
(31, '2023-04-07 15:36:00', 'Je suis actullement la', 'mama', 1),
(32, '2023-04-06 15:40:00', 'pas en retard', 'mama', 2),
(29, '2023-04-08 13:06:00', 'kk', 'mama', 2),
(30, '2023-04-07 14:55:00', 'ff', 'mama', 2),
(38, '2023-04-09 17:41:00', 'ijoadjadlkjazdlkjazdlkjazdlkjazkdjazkdjazdjkazlkjdzlkjdazlkjdazjkldazkjldazlkjd', 'red', 2),
(39, '2023-04-06 17:45:00', 'j\'adore le systeme', 'red', 1),
(40, '2023-04-16 17:43:00', 'je suis al', 'red', 1),
(41, '2023-04-06 17:46:00', 'abesent', 'red', 2),
(42, '2023-04-06 17:46:00', 'tjr présent', 'red', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(15, 'red', 'red', 'red@laplateforme.io', 'red', 1),
(10, 'mama', 'mama', 'mama@laplateforme.io', 'mama', 0),
(13, 'admin', 'admin', 'admin@laplateforme.io', 'ad', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
