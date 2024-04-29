-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 20 Avril 2024 à 17:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `etablissement`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nom`, `prenom`, `date_naissance`, `lieu`, `telephone`) VALUES
(6, '12345', 'ghomsi', 'kahm', '2024-04-17', 'kotto', '655156794'),
(8, '12345', 'ghomsi', 'kahm', '2024-04-17', 'kotto', '655156794'),
(12, 'eeee2122', 'paul', 'kamgang', '2024-04-03', 'kotto', '0655156794'),
(14, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(15, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(16, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(17, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(18, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(19, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(20, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(21, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(22, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(23, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(24, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(25, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(26, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(27, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794'),
(28, 'bost', 'paul', 'kamgang', '2024-04-18', 'rr', '0655156794');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `code_inscription` varchar(50) NOT NULL,
  `date_inscription` date NOT NULL,
  `annee_academique` varchar(50) NOT NULL,
  `option` varchar(50) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `code_specialite` varchar(50) NOT NULL,
  PRIMARY KEY (`code_inscription`),
  KEY `matricule` (`matricule`),
  KEY `date_inscription` (`date_inscription`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `code_specialite` int(50) NOT NULL,
  `intitule_specialite` varchar(50) NOT NULL,
  PRIMARY KEY (`code_specialite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
