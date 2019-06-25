-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 24 juin 2019 à 14:08
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `itss_global`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

DROP TABLE IF EXISTS `acces`;
CREATE TABLE IF NOT EXISTS `acces` (
  `id_acces` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(100) NOT NULL,
  `id_dossier` int(3) NOT NULL,
  `lecture` varchar(3) NOT NULL DEFAULT 'oui',
  `ecriture` varchar(3) NOT NULL DEFAULT 'non',
  `suppression` varchar(3) NOT NULL DEFAULT 'non',
  `dateajout` date NOT NULL,
  PRIMARY KEY (`id_acces`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`id_acces`, `id_user`, `id_dossier`, `lecture`, `ecriture`, `suppression`, `dateajout`) VALUES
(5, '2', 54, 'non', 'non', 'non', '2019-06-18'),
(6, '2', 65, 'oui', 'non', 'non', '2019-06-11'),
(7, '2', 66, 'non', 'non', 'non', '2019-06-18'),
(8, '2', 57, 'non', 'non', 'non', '2019-06-18'),
(9, '2', 67, 'non', 'non', 'non', '2019-06-18'),
(10, '2', 68, 'non', 'non', 'non', '2019-06-18'),
(11, '2', 69, 'non', 'non', 'non', '2019-06-18'),
(12, '2', 70, 'non', 'non', 'non', '2019-06-18'),
(13, '2', 62, 'non', 'non', 'oui', '2019-06-10'),
(14, '2', 72, 'non', 'non', 'oui', '2019-06-10'),
(15, '2', 74, 'non', 'non', 'oui', '2019-06-10'),
(16, '2', 75, 'non', 'non', 'oui', '2019-06-10'),
(17, '2', 79, 'non', 'non', 'oui', '2019-06-10'),
(18, '2', 73, 'non', 'non', 'oui', '2019-06-10'),
(19, '2', 76, 'non', 'non', 'oui', '2019-06-10'),
(20, '2', 77, 'non', 'non', 'oui', '2019-06-10'),
(21, '2', 78, 'non', 'non', 'oui', '2019-06-10'),
(22, '2', 61, 'non', 'non', 'oui', '2019-06-10'),
(23, '2', 55, 'non', 'non', 'oui', '2019-06-10'),
(24, '2', 60, 'non', 'non', 'oui', '2019-06-10'),
(25, '2', 63, 'non', 'non', 'oui', '2019-06-10'),
(26, '2', 64, 'non', 'non', 'oui', '2019-06-10'),
(27, '2', 56, 'non', 'non', 'non', '2019-06-18'),
(28, '2', 58, 'non', 'non', 'non', '2019-06-18'),
(29, '2', 59, 'non', 'non', 'non', '2019-06-18'),
(30, 'a', 55, 'oui', 'oui', 'oui', '2019-06-11'),
(31, 'a', 60, 'oui', 'oui', 'oui', '2019-06-11'),
(32, 'a', 62, 'oui', 'oui', 'oui', '2019-06-11'),
(33, 'a', 63, 'oui', 'oui', 'oui', '2019-06-11'),
(34, 'a', 72, 'oui', 'oui', 'oui', '2019-06-11'),
(35, 'a', 74, 'oui', 'oui', 'oui', '2019-06-11'),
(36, 'a', 75, 'oui', 'oui', 'oui', '2019-06-11'),
(37, 'a', 64, 'oui', 'oui', 'oui', '2019-06-11'),
(38, 'a', 79, 'oui', 'oui', 'oui', '2019-06-11'),
(39, 'a', 73, 'oui', 'oui', 'oui', '2019-06-11'),
(40, 'a', 76, 'oui', 'oui', 'oui', '2019-06-11'),
(41, 'a', 77, 'oui', 'oui', 'oui', '2019-06-11'),
(42, 'a', 78, 'oui', 'oui', 'oui', '2019-06-11'),
(43, 'a', 61, 'oui', 'oui', 'oui', '2019-06-11'),
(44, 'william', 54, 'oui', 'non', 'non', '2019-06-12'),
(45, 'william', 56, 'oui', 'non', 'non', '2019-06-12'),
(46, 'william', 65, 'oui', 'non', 'non', '2019-06-12'),
(47, 'william', 66, 'oui', 'non', 'non', '2019-06-12'),
(48, 'william', 57, 'oui', 'non', 'non', '2019-06-12'),
(49, 'william', 58, 'oui', 'non', 'non', '2019-06-12'),
(50, 'william', 67, 'oui', 'non', 'non', '2019-06-12'),
(51, 'william', 68, 'oui', 'non', 'non', '2019-06-12'),
(52, 'william', 59, 'oui', 'non', 'non', '2019-06-12'),
(53, 'william', 69, 'oui', 'non', 'non', '2019-06-12'),
(54, 'william', 70, 'oui', 'non', 'non', '2019-06-12'),
(55, '3', 80, 'oui', 'oui', 'oui', '2019-06-13'),
(56, '3', 81, 'oui', 'oui', 'oui', '2019-06-13'),
(57, '3', 83, 'oui', 'oui', 'oui', '2019-06-13'),
(58, '3', 84, 'oui', 'oui', 'oui', '2019-06-13'),
(59, '3', 86, 'oui', 'oui', 'oui', '2019-06-13'),
(60, '3', 87, 'oui', 'oui', 'oui', '2019-06-13'),
(61, '3', 88, 'oui', 'oui', 'oui', '2019-06-13'),
(62, '3', 85, 'oui', 'oui', 'oui', '2019-06-13'),
(63, '3', 89, 'oui', 'oui', 'oui', '2019-06-13'),
(64, '3', 90, 'oui', 'oui', 'oui', '2019-06-13'),
(65, '3', 91, 'oui', 'oui', 'oui', '2019-06-13'),
(66, '3', 82, 'oui', 'oui', 'oui', '2019-06-13'),
(67, 'ar', 54, 'oui', 'oui', 'non', '2019-06-17'),
(68, 'ar', 56, 'oui', 'oui', 'non', '2019-06-17'),
(69, 'ar', 65, 'oui', 'non', 'non', '2019-06-14'),
(70, 'ar', 66, 'oui', 'oui', 'non', '2019-06-17'),
(71, 'ar', 57, 'oui', 'oui', 'non', '2019-06-17'),
(72, 'ar', 58, 'oui', 'oui', 'non', '2019-06-17'),
(73, 'ar', 67, 'oui', 'oui', 'non', '2019-06-17'),
(74, 'ar', 68, 'oui', 'oui', 'non', '2019-06-17'),
(75, 'ar', 59, 'oui', 'oui', 'non', '2019-06-17'),
(76, 'ar', 69, 'oui', 'oui', 'non', '2019-06-17'),
(77, 'ar', 70, 'oui', 'oui', 'non', '2019-06-17'),
(78, 'ar', 93, 'oui', 'oui', 'non', '2019-06-17'),
(79, 'ar', 102, 'oui', 'oui', 'oui', '2019-06-17'),
(80, '2', 101, 'oui', 'oui', 'oui', '2019-06-17'),
(81, 'ar', 101, 'oui', 'oui', 'oui', '2019-06-17'),
(82, '2', 93, 'non', 'non', 'non', '2019-06-18'),
(83, 'ar', 113, 'oui', 'non', 'oui', '2019-06-19'),
(84, 'ar', 115, 'oui', 'non', 'non', '2019-06-19'),
(85, 'ar', 123, 'oui', 'non', 'non', '2019-06-21'),
(86, 'arthking17', 113, 'oui', 'non', 'non', '2019-06-21'),
(87, 'arthking17', 115, 'oui', 'oui', 'oui', '2019-06-21'),
(88, 'arthking17', 117, 'oui', 'oui', 'oui', '2019-06-21'),
(89, 'arthking17', 126, 'oui', 'oui', 'oui', '2019-06-21'),
(90, 'arthking17', 127, 'oui', 'oui', 'oui', '2019-06-21'),
(91, 'arthking17', 118, 'oui', 'oui', 'oui', '2019-06-21'),
(92, 'arthking17', 119, 'oui', 'oui', 'oui', '2019-06-21'),
(93, 'arthking17', 128, 'oui', 'oui', 'oui', '2019-06-21'),
(94, 'arthking17', 129, 'oui', 'oui', 'oui', '2019-06-21'),
(95, 'arthking17', 120, 'oui', 'oui', 'oui', '2019-06-21'),
(96, 'arthking17', 130, 'oui', 'oui', 'oui', '2019-06-21'),
(97, 'arthking17', 131, 'oui', 'oui', 'oui', '2019-06-21');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

DROP TABLE IF EXISTS `dossier`;
CREATE TABLE IF NOT EXISTS `dossier` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `sur_dossier` int(3) DEFAULT NULL,
  `dateajout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`id`, `nom`, `sur_dossier`, `dateajout`) VALUES
(113, 'Gestion finance', -1, '2019-06-18'),
(115, 'gestion RH', -1, '2019-06-18'),
(117, 'Gestion de la paie', 115, '2019-06-21'),
(118, 'Document administratif', 115, '2019-06-21'),
(119, 'Avantages en nature', 115, '2019-06-21'),
(120, 'Gestion des congÃ©s', 115, '2019-06-21'),
(121, 'ComptabilitÃ©', 113, '2019-06-21'),
(122, 'Caisse', 113, '2019-06-21'),
(123, 'DÃ©penses salaires', 121, '2019-06-21'),
(124, 'Dossier comptable', 121, '2019-06-21'),
(125, 'Factures', 121, '2019-06-21'),
(126, '2018', 117, '2019-06-21'),
(127, '2019', 117, '2019-06-21'),
(128, 'Assurance', 119, '2019-06-21'),
(129, 'Tickets restaurants', 119, '2019-06-21'),
(130, '2018', 120, '2019-06-21'),
(131, '2019', 120, '2019-06-21'),
(132, 'RV (Dinars)', 124, '2019-06-21'),
(133, 'RV (Devise)', 124, '2019-06-21'),
(134, 'Pieces justificatives', 124, '2019-06-21'),
(135, 'Achats', 125, '2019-06-21'),
(136, 'Ventes', 125, '2019-06-21'),
(137, 'Caisse', 125, '2019-06-21');

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `dossier` int(3) NOT NULL,
  `dateajout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`id`, `nom`, `url`, `dossier`, `dateajout`) VALUES
(6, 'java', 'cv.pdf', 113, '2019-06-19'),
(7, 'willis', 'cv.pdf', 115, '2019-06-19'),
(8, 'cv', 'cv.pdf', 115, '2019-06-21'),
(10, 'BUZ10', 'uploads/BUZ10.pdf', 113, '2019-06-21'),
(11, 'DS_FdR_mars2019_VF_corrigÃ©', 'uploads/DS_FdR_mars2019_VF_corrigÃ©.pdf', 134, '2019-06-24');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` text NOT NULL,
  `profil` varchar(255) NOT NULL,
  `nom` text NOT NULL,
  `date_modif` datetime NOT NULL,
  `type_modif` text NOT NULL,
  `type_obj` text NOT NULL,
  `adresse` text NOT NULL,
  `ancien_nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `nom_user`, `profil`, `nom`, `date_modif`, `type_modif`, `type_obj`, `adresse`, `ancien_nom`) VALUES
(1, '1', 'uploads/profil.png', 'Gestion RH', '2019-06-17 00:00:00', 'renommer', 'dossier', '/Gestion RH', 'Gestion RH'),
(2, '1', 'uploads/profil.png', 'Test', '2019-06-17 00:00:00', 'ajouter', 'dossier', '/Test', ''),
(3, '1', 'uploads/profil.png', 'Gestion RH', '2019-06-17 10:09:24', 'renommer', 'dossier', '/Gestion RH', 'Gestion RH'),
(4, '1', 'uploads/profil.png', 'Test', '2019-06-17 10:12:58', 'ajouter', 'dossier', '/Test', ''),
(5, '1', 'uploads/profil.png', 'Test', '2019-06-17 10:16:24', 'ajouter', 'dossier', '/Test', ''),
(6, '1', 'uploads/profil.png', 'Test', '2019-06-17 10:29:53', 'ajouter', 'dossier', '/Test', ''),
(7, '1', 'uploads/profil.png', 'willi', '2019-06-17 10:35:15', 'ajouter', 'dossier', '/willi', ''),
(8, '1', 'uploads/profil.png', 'willi', '2019-06-17 10:37:25', 'supprimer', 'dossier', '/willi', ''),
(9, '1', 'uploads/profil.png', 'willi', '2019-06-17 10:38:09', 'ajouter', 'dossier', '/willi', ''),
(10, '1', 'uploads/profil.png', 'willi', '2019-06-17 10:38:21', 'supprimer', 'dossier', '/willi', ''),
(11, 'ar', 'uploads/a.jpg', 'estion RH', '2019-06-17 10:43:14', 'renommer', 'dossier', '/estion RH', 'estion RH'),
(12, 'ar', 'uploads/a.jpg', 'Gestion RH', '2019-06-17 10:43:36', 'renommer', 'dossier', '/Gestion RH', 'estion RH'),
(13, 'ar', 'uploads/a.jpg', 'willi', '2019-06-17 10:44:29', 'ajouter', 'dossier', '/Gestion RH/Gestion des congÃ©s/2019/willi', ''),
(14, 'ar', 'uploads/a.jpg', 'willi', '2019-06-17 10:55:00', 'ajouter', 'dossier', '/Gestion RH/willi', ''),
(15, 'ar', 'uploads/a.jpg', 'willi', '2019-06-17 10:55:47', 'supprimer', 'dossier', '/Gestion RH/willi', ''),
(16, 'ar', 'uploads/a.jpg', 'Willi', '2019-06-17 10:57:04', 'renommer', 'dossier', '/Gestion RH/Gestion des congÃ©s/2019/Willi', 'willi'),
(17, 'ar', 'uploads/a.jpg', 'Willi', '2019-06-17 10:57:23', 'supprimer', 'dossier', '/Gestion RH/Gestion des congÃ©s/2019/Willi', ''),
(18, 'ar', 'uploads/a.jpg', 'willis', '2019-06-17 10:58:56', 'ajouter', 'fichier', '/Gestion RH', ''),
(19, 'ar', 'uploads/a.jpg', 'willi', '2019-06-17 11:08:13', 'renommer', 'fichier', '/Gestion RH', 'willi'),
(20, 'ar', 'uploads/a.jpg', 'willis', '2019-06-17 11:08:43', 'renommer', 'fichier', '/Gestion RH', 'willi'),
(21, '1', 'uploads/profil.png', 'willis', '2019-06-17 11:11:11', 'ajouter', 'fichier', '/Gestion RH', ''),
(22, '1', 'uploads/profil.png', 'willis', '2019-06-17 11:12:05', 'ajouter', 'fichier', '/Gestion RH', ''),
(23, '1', 'uploads/profil.png', 'willis', '2019-06-17 11:12:11', 'supprimer', 'fichier', '/Gestion RH', ''),
(24, '1', 'uploads/profil.png', 'willi', '2019-06-17 11:15:49', 'ajouter', 'dossier', '/willi', ''),
(25, '1', 'uploads/profil.png', 'willi', '2019-06-17 11:15:58', 'supprimer', 'dossier', '/willi', ''),
(26, '1', 'uploads/profil.png', 'java', '2019-06-18 09:29:02', 'ajouter', 'fichier', '/Gestion RH', ''),
(27, '1', 'uploads/profil.png', 'java', '2019-06-18 09:29:14', 'renommer', 'fichier', '/Gestion RH', 'java'),
(28, 'arthur william', 'uploads/a.jpg', 'DÃ©penses salaires', '2019-06-18 15:09:14', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/DÃ©penses salaires', ''),
(29, 'arthur william', 'uploads/a.jpg', 'RV (Dinars)', '2019-06-18 15:10:55', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Dossier comptable/RV (Dinars)', ''),
(30, 'arthur william', 'uploads/a.jpg', 'RV (Devise)', '2019-06-18 15:10:55', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Dossier comptable/RV (Devise)', ''),
(31, 'arthur william', 'uploads/a.jpg', 'Pieces justificatives', '2019-06-18 15:10:55', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Dossier comptable/Pieces justificatives', ''),
(32, 'arthur william', 'uploads/a.jpg', 'Dossier comptable', '2019-06-18 15:11:02', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Dossier comptable', ''),
(33, 'arthur william', 'uploads/a.jpg', 'Achats', '2019-06-18 15:11:14', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Factures/Achats', ''),
(34, 'arthur william', 'uploads/a.jpg', 'Ventes', '2019-06-18 15:11:14', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Factures/Ventes', ''),
(35, 'arthur william', 'uploads/a.jpg', 'Caisse', '2019-06-18 15:11:14', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Factures/Caisse', ''),
(36, 'arthur william', 'uploads/a.jpg', 'willi', '2019-06-18 15:17:51', 'ajouter', 'dossier', '/willi', ''),
(37, 'arthur william', 'uploads/a.jpg', 'java', '2019-06-18 15:17:58', 'supprimer', 'fichier', '/Gestion RH', ''),
(38, 'arthur william', 'uploads/a.jpg', '2019', '2019-06-18 15:17:58', 'supprimer', 'dossier', '/Gestion RH/Gestion de la paie/2019', ''),
(39, 'arthur william', 'uploads/a.jpg', 'Document administratif', '2019-06-18 15:17:58', 'supprimer', 'dossier', '/Gestion RH/Document administratif', ''),
(40, 'arthur william', 'uploads/a.jpg', 'assurance', '2019-06-18 15:17:58', 'supprimer', 'dossier', '/Gestion RH/Avantages en nature/assurance', ''),
(41, 'arthur william', 'uploads/a.jpg', 'tickets restaurants', '2019-06-18 15:17:59', 'supprimer', 'dossier', '/Gestion RH/Avantages en nature/tickets restaurants', ''),
(42, 'arthur william', 'uploads/a.jpg', '2018', '2019-06-18 15:17:59', 'supprimer', 'dossier', '/Gestion RH/Gestion des congÃ©s/2018', ''),
(43, 'arthur william', 'uploads/a.jpg', '2019', '2019-06-18 15:17:59', 'supprimer', 'dossier', '/Gestion RH/Gestion des congÃ©s/2019', ''),
(44, 'arthur william', 'uploads/a.jpg', 'Gestion des billets', '2019-06-18 15:17:59', 'supprimer', 'dossier', '/Gestion RH/Gestion des billets', ''),
(45, 'arthur william', 'uploads/a.jpg', 'Gestion de la paie', '2019-06-18 15:18:08', 'supprimer', 'dossier', '/Gestion RH/Gestion de la paie', ''),
(46, 'arthur william', 'uploads/a.jpg', 'Avantages en nature', '2019-06-18 15:18:08', 'supprimer', 'dossier', '/Gestion RH/Avantages en nature', ''),
(47, 'arthur william', 'uploads/a.jpg', 'Gestion des congÃ©s', '2019-06-18 15:18:08', 'supprimer', 'dossier', '/Gestion RH/Gestion des congÃ©s', ''),
(48, 'arthur william', 'uploads/a.jpg', 'Gestion RH', '2019-06-18 15:19:14', 'supprimer', 'dossier', '/Gestion RH', ''),
(49, 'arthur william', 'uploads/a.jpg', 'Factures', '2019-06-18 15:19:30', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©/Factures', ''),
(50, 'arthur william', 'uploads/a.jpg', 'Caisse', '2019-06-18 15:19:30', 'supprimer', 'dossier', '/Gestion financiÃ¨re/Caisse', ''),
(51, 'arthur william', 'uploads/profil.png', 'ComptabilitÃ©', '2019-06-18 15:19:44', 'supprimer', 'dossier', '/Gestion financiÃ¨re/ComptabilitÃ©', ''),
(52, 'arthur william', 'uploads/profil.png', 'Gestion financiÃ¨re', '2019-06-18 15:21:17', 'supprimer', 'dossier', '/Gestion financiÃ¨re', ''),
(53, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:21:21', 'supprimer', 'dossier', '/willi', ''),
(54, 'arthur william', 'uploads/profil.png', 'Gestion RH', '2019-06-18 15:23:32', 'ajouter', 'dossier', '/Gestion RH', ''),
(55, 'arthur william', 'uploads/profil.png', 'Gestion FinanciÃ¨re', '2019-06-18 15:25:21', 'ajouter', 'dossier', '/Gestion FinanciÃ¨re', ''),
(56, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:25:38', 'ajouter', 'dossier', '/willi', ''),
(57, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:26:24', 'ajouter', 'dossier', '/willi', ''),
(58, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:26:49', 'ajouter', 'dossier', '/willi', ''),
(59, 'arthur william', 'uploads/profil.png', 'Gestion RH', '2019-06-18 15:34:31', 'supprimer', 'dossier', '/Gestion RH', ''),
(60, 'arthur william', 'uploads/profil.png', 'Gestion FinanciÃ¨re', '2019-06-18 15:34:34', 'supprimer', 'dossier', '/Gestion FinanciÃ¨re', ''),
(61, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:35:24', 'supprimer', 'dossier', '/willi', ''),
(62, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:35:32', 'supprimer', 'dossier', '/willi', ''),
(63, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:35:35', 'supprimer', 'dossier', '/willi', ''),
(64, 'arthur william', 'uploads/profil.png', 'gestion finance', '2019-06-18 15:35:44', 'ajouter', 'dossier', '/gestion finance', ''),
(65, 'arthur william', 'uploads/profil.png', 'gestion RH', '2019-06-18 15:35:54', 'ajouter', 'dossier', '/gestion RH', ''),
(66, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:36:01', 'ajouter', 'dossier', '/willi', ''),
(67, 'arthur william', 'uploads/profil.png', 'gestion finance', '2019-06-18 15:36:13', 'supprimer', 'dossier', '/gestion finance', ''),
(68, 'arthur william', 'uploads/profil.png', 'gestion RH', '2019-06-18 15:38:51', 'supprimer', 'dossier', '/gestion RH', ''),
(69, 'arthur william', 'uploads/profil.png', 'gestion finance', '2019-06-18 15:41:00', 'ajouter', 'dossier', '/gestion finance', ''),
(70, 'arthur william', 'uploads/profil.png', 'gestion RH', '2019-06-18 15:41:05', 'ajouter', 'dossier', '/gestion RH', ''),
(71, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:41:12', 'supprimer', 'dossier', '/willi', ''),
(72, 'arthur william', 'uploads/profil.png', 'gestion RH', '2019-06-18 15:45:05', 'supprimer', 'dossier', '/gestion RH', ''),
(73, 'arthur william', 'uploads/profil.png', 'gestion RH', '2019-06-18 15:45:16', 'ajouter', 'dossier', '/gestion RH', ''),
(74, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:45:21', 'ajouter', 'dossier', '/willi', ''),
(75, 'arthur william', 'uploads/profil.png', 'willi', '2019-06-18 15:45:27', 'supprimer', 'dossier', '/willi', ''),
(76, 'arthur william', 'uploads/profil.png', 'Gestion finance', '2019-06-19 12:46:37', 'renommer', 'dossier', '/Gestion finance', 'gestion finance'),
(77, 'arthur william', 'uploads/profil.png', 'Gestion finance', '2019-06-19 12:48:27', 'renommer', 'dossier', '/Gestion finance', 'Gestion finance'),
(78, 'arthur william', 'uploads/profil.png', 'java', '2019-06-19 13:31:37', 'ajouter', 'fichier', '/Gestion finance', ''),
(79, 'arthur william', 'uploads/profil.png', 'java', '2019-06-19 14:57:18', 'supprimer', 'fichier', '/Gestion finance', ''),
(80, 'arthur william', 'uploads/profil.png', 'java', '2019-06-19 15:09:49', 'ajouter', 'fichier', '/Gestion finance', ''),
(81, 'arthur william', 'uploads/profil.png', 'willis', '2019-06-19 15:10:07', 'ajouter', 'fichier', '/gestion RH', ''),
(82, 'arthur william', 'uploads/profil.png', 'Gestion de la paie', '2019-06-21 11:28:16', 'ajouter', 'dossier', '/gestion RH/Gestion de la paie', ''),
(83, 'arthur william', 'uploads/profil.png', 'Document administratif', '2019-06-21 11:28:29', 'ajouter', 'dossier', '/gestion RH/Document administratif', ''),
(84, 'arthur william', 'uploads/profil.png', 'Avantages en nature', '2019-06-21 11:28:40', 'ajouter', 'dossier', '/gestion RH/Avantages en nature', ''),
(85, 'arthur william', 'uploads/profil.png', 'Gestion des congÃ©s', '2019-06-21 11:28:56', 'ajouter', 'dossier', '/gestion RH/Gestion des congÃ©s', ''),
(86, 'arthur william', 'uploads/profil.png', 'ComptabilitÃ©', '2019-06-21 11:29:12', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©', ''),
(87, 'arthur william', 'uploads/profil.png', 'Caisse', '2019-06-21 11:29:24', 'ajouter', 'dossier', '/Gestion finance/Caisse', ''),
(88, 'arthur william', 'uploads/profil.png', 'DÃ©penses salaires', '2019-06-21 11:29:54', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/DÃ©penses salaires', ''),
(89, 'arthur william', 'uploads/profil.png', 'Dossier comptable', '2019-06-21 11:30:05', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Dossier comptable', ''),
(90, 'arthur william', 'uploads/profil.png', 'Factures', '2019-06-21 11:30:14', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Factures', ''),
(91, 'arthur william', 'uploads/profil.png', '2018', '2019-06-21 11:30:28', 'ajouter', 'dossier', '/gestion RH/Gestion de la paie/2018', ''),
(92, 'arthur william', 'uploads/profil.png', '2019', '2019-06-21 11:30:36', 'ajouter', 'dossier', '/gestion RH/Gestion de la paie/2019', ''),
(93, 'arthur william', 'uploads/profil.png', 'Assurance', '2019-06-21 11:30:50', 'ajouter', 'dossier', '/gestion RH/Avantages en nature/Assurance', ''),
(94, 'arthur william', 'uploads/profil.png', 'Tickets restaurants', '2019-06-21 11:31:04', 'ajouter', 'dossier', '/gestion RH/Avantages en nature/Tickets restaurants', ''),
(95, 'arthur william', 'uploads/profil.png', '2018', '2019-06-21 11:31:14', 'ajouter', 'dossier', '/gestion RH/Gestion des congÃ©s/2018', ''),
(96, 'arthur william', 'uploads/profil.png', '2019', '2019-06-21 11:31:20', 'ajouter', 'dossier', '/gestion RH/Gestion des congÃ©s/2019', ''),
(97, 'arthur william', 'uploads/profil.png', 'RV (Dinars)', '2019-06-21 11:31:49', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Dossier comptable/RV (Dinars)', ''),
(98, 'arthur william', 'uploads/profil.png', 'RV (Devise)', '2019-06-21 11:32:10', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Dossier comptable/RV (Devise)', ''),
(99, 'arthur william', 'uploads/profil.png', 'Pieces justificatives', '2019-06-21 11:32:26', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Dossier comptable/Pieces justificatives', ''),
(100, 'arthur william', 'uploads/profil.png', 'Achats', '2019-06-21 11:32:47', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Factures/Achats', ''),
(101, 'arthur william', 'uploads/profil.png', 'Ventes', '2019-06-21 11:32:56', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Factures/Ventes', ''),
(102, 'arthur william', 'uploads/profil.png', 'Caisse', '2019-06-21 11:33:04', 'ajouter', 'dossier', '/Gestion finance/ComptabilitÃ©/Factures/Caisse', ''),
(103, 'arthur william', 'uploads/profil.png', 'willis', '2019-06-21 14:33:37', 'supprimer', 'fichier', '/Gestion finance', ''),
(104, 'arthur william', 'uploads/profil.png', 'BUZ10', '2019-06-21 14:36:52', 'ajouter', 'fichier', '/Gestion finance', ''),
(105, 'arthur william', 'uploads/profil.png', 'DS_FdR_mars2019_VF_corrigÃ©', '2019-06-24 09:30:20', 'ajouter', 'fichier', '/Gestion finance/ComptabilitÃ©/Dossier comptable/Pieces justificatives', '');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_sender` varchar(100) NOT NULL,
  `id_receiver` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `date_envoie` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_sender`, `id_receiver`, `msg`, `date_envoie`) VALUES
(1, 'ar', '1', '^pdzpesldgfde', '2019-06-21 00:00:00'),
(2, 'arthking17', 'ar', 'dfsdgfhghngdbzaegrnngdfbsg', '2019-06-12 00:00:00'),
(3, 'arthking17', 'ar', 'zaeaze', '2019-06-21 16:03:02'),
(4, 'arthking17', 'ar', 'zaeazezaeaze', '2019-06-21 16:03:42'),
(5, 'arthking17', 'ar', 'bonjour', '2019-06-21 16:04:43'),
(6, 'ar', 'arthking17', 'zaeaze', '2019-06-21 16:08:52'),
(7, 'ar', 'arthking17', 'bonjour*', '2019-06-21 16:09:00'),
(8, 'arthking17', 'ar', 'cmt?', '2019-06-21 16:09:14'),
(9, 'ar', 'arthking17', 'cava', '2019-06-21 16:09:21');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 pour admin / 2 pour user',
  `datei` date NOT NULL,
  `profil` varchar(255) DEFAULT 'uploads/profil.png',
  PRIMARY KEY (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `email`, `nom`, `password`, `type`, `datei`, `profil`) VALUES
('1', 'nguesseuarthur17@gmail.com', 'william', '1', 1, '2019-06-12', 'uploads/profil.png'),
('2', '2@f.hgf', 'qdsfhhgfh', '2', 2, '2019-06-09', 'uploads/profil.png'),
('3', 'zefre@gfg.ygv', 'ngassa', '3', 2, '2019-06-11', 'uploads/profil.png'),
('ar', 'arthurwilliam.ngassanguesseu@esprit.tn', 'ar', 'ar', 2, '2019-06-14', 'uploads/a.jpg'),
('arthking17', 'nguesseuarthur17@outlook.com', 'arthur william', 'Arthking.17', 2, '2019-06-21', 'uploads/a.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
