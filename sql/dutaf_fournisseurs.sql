-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 mai 2018 à 14:11
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `basemmi17c14`
--

-- --------------------------------------------------------

--
-- Structure de la table `dutaf_fournisseurs`
--

DROP TABLE IF EXISTS `dutaf_fournisseurs`;
CREATE TABLE IF NOT EXISTS `dutaf_fournisseurs` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_nom` varchar(50) DEFAULT NULL,
  `f_tel` varchar(14) DEFAULT NULL,
  `f_ville` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dutaf_fournisseurs`
--

INSERT INTO `dutaf_fournisseurs` (`f_id`, `f_nom`, `f_tel`, `f_ville`) VALUES
(1, 'BigBoss', '03.25.41.41.41', 'Troyes'),
(2, 'TopMatos', '04.22.41.43.43', 'Sens'),
(3, 'Bluecheap', '01.13.55.41.22', 'Paris'),
(4, 'minigrole', '07.21.11.41.66', 'Lyon'),
(5, 'Maxiboutique', '03.25.33.44.55', 'Troyes'),
(6, 'MadeInPasCher', '01.12.41.11.26', 'Paris'),
(7, 'PilouSport', '09.25.12.13.14', 'Sens'),
(8, 'BolDair', '03.25.22.33.11', 'Troyes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
