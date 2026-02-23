-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 fév. 2026 à 19:45
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marchesbenin`
--

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
CREATE TABLE IF NOT EXISTS `emplacement` (
  `idEmplacement` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(50) NOT NULL,
  `idMarche` int DEFAULT NULL,
  `idType` int DEFAULT NULL,
  PRIMARY KEY (`idEmplacement`),
  KEY `idMarche` (`idMarche`),
  KEY `idType` (`idType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marche`
--

DROP TABLE IF EXISTS `marche`;
CREATE TABLE IF NOT EXISTS `marche` (
  `idMarche` int NOT NULL AUTO_INCREMENT,
  `nomMarche` varchar(255) NOT NULL,
  `description` text,
  `capacite` int DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idVille` int DEFAULT NULL,
  PRIMARY KEY (`idMarche`),
  KEY `idVille` (`idVille`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `marche`
--

INSERT INTO `marche` (`idMarche`, `nomMarche`, `description`, `capacite`, `adresse`, `telephone`, `image`, `idVille`) VALUES
(7, 'Gbégamey', 'efr,gernejlrgjjh;kjtosrmkhsroi', 20000, 'Benin', '0144885983', 'marche tokplégbé.jpg', NULL),
(8, 'Mènontin', ',eurhoznjrgzz;ùrlyjzh,r_ljnk;', 2000, '', '', 'menontin.jpeg', NULL),
(9, 'Wologuèdè', 'lui,uyjhrthsvdfbjgunk,iujfhvtesxg', 8000, '', '', 'wologuede.jpeg', NULL),
(10, 'Ouando ', 'Description', 400, 'Porto Novo', '0144885983', 'marche tokplégbé.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typeemplacement`
--

DROP TABLE IF EXISTS `typeemplacement`;
CREATE TABLE IF NOT EXISTS `typeemplacement` (
  `idType` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(255) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`idVille`, `nomVille`) VALUES
(6, 'cotonou'),
(2, 'Porto-Novo'),
(5, 'ouando');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
