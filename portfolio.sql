-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Mai 2017 à 23:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `titre`) VALUES
(1, 'Programmation'),
(2, 'Développement Web'),
(3, 'Système'),
(4, 'Réseau'),
(5, 'RÃ©seau');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `id_comp` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`id_comp`, `titre`, `libelle`) VALUES
(1, 'A1.1.1', 'Analyse du cahier des charges d''un service à produire'),
(2, 'A1.1.2', 'Étude de l''impact de l''intégration d''un service sur le système informatique'),
(3, 'A1.1.3', 'Étude des exigences liées à la qualité attendue d''un service'),
(4, 'A1.2.1', 'Élaboration et présentation d''un dossier de choix de solution technique'),
(5, 'A1.2.2', 'Rédaction des spécifications techniques de la solution retenue'),
(6, 'A1.2.3', 'Évaluation des risques liés à l''utilisation d''un service'),
(7, 'A1.2.4', 'Détermination des tests nécessaires à la validation d''un service'),
(8, 'A1.2.5', 'Définition des niveaux d''habilitation associés à un service'),
(9, 'A1.3.1', 'Test d''intégration et d''acceptation d''un service'),
(10, 'A1.3.2', 'Définition des éléments nécessaires à la continuité d''un service'),
(11, 'A1.3.3', 'Accompagnement de la mise en place d''un nouveau service'),
(12, 'A1.3.4', 'Déploiement d''un service'),
(13, 'A1.4.1', 'Participation à un projet'),
(14, 'A1.4.2', 'Évaluation des indicateurs de suivi d''un projet et justification des écarts'),
(15, 'A1.4.3', 'Gestion des ressources'),
(16, 'A2.1.1', 'Accompagnement des utilisateurs dans la prise en main d''un service'),
(17, 'A2.1.2', 'Évaluation et maintien de la qualité d''un service'),
(18, 'A2.2.1', 'Suivi et résolution d''incidents'),
(19, 'A2.2.2', 'Suivi et réponse à des demandes d''assistance'),
(20, 'A2.2.3', 'Réponse à une interruption de service'),
(21, 'A2.3.1', 'Identification, qualification et évaluation d''un problème'),
(22, 'A2.3.2', 'Proposition d''amélioration d''un service'),
(23, 'A3.2.1', 'Installation et configuration d''éléments d''infrastructure'),
(24, 'A3.2.2', 'Remplacement ou mise à jour d''éléments défectueux ou obsolètes'),
(25, 'A4.1.1', 'Proposition d''une solution applicative'),
(26, 'A4.1.2', 'Conception ou adaptation de l''interface utilisateur d''une solution applicative'),
(27, 'A4.1.3', 'Conception ou adaptation d''une base de données'),
(28, 'A4.1.4', 'Définition des caractéristiques d''une solution applicative'),
(29, 'A4.1.5', 'Prototypage de composants logiciels'),
(30, 'A4.1.6', 'Gestion d''environnements de développement et de test'),
(31, 'A4.1.7', 'Développement, utilisation ou adaptation de composants logiciels'),
(32, 'A4.1.8', 'Réalisation des tests nécessaires à la validation d''éléments adaptés ou développés'),
(33, 'A4.1.9', 'Rédaction d''une documentation technique'),
(34, 'A4.1.10', 'Rédaction d''une documentation d''utilisation'),
(35, 'A4.2.1', 'Analyse et correction d''un dysfonctionnement, d''un problème de qualité de …'),
(36, 'A4.2.2', 'Adaptation d''une solution applicative aux évolutions de ses composants'),
(37, 'A4.2.3', 'Réalisation des tests nécessaires à la mise en production d''éléments mis à jour'),
(38, 'A4.2.4', 'Mise à jour d''une documentation technique'),
(39, 'A5.1.1', 'Mise en place d''une gestion de configuration'),
(40, 'A5.1.2', 'Recueil d''informations sur une configuration et ses éléments'),
(41, 'A5.1.3', 'Suivi d''une configuration et de ses éléments'),
(42, 'A5.1.4', 'Étude de propositions de contrat de service (client, fournisseur)'),
(43, 'A5.1.5', 'Évaluation d''un élément de configuration ou d''une configuration'),
(44, 'A5.1.6', 'Évaluation d''un investissement informatique'),
(45, 'A5.2.1', 'Exploitation des référentiels, normes et standards adoptés par le prestataire'),
(46, 'A5.2.2', 'Veille technologique'),
(47, 'A5.2.3', 'Repérage des compléments de formation ou d''auto-formation ...'),
(48, 'A5.2.4', 'Étude d''une technologie, d''un composant, d''un outil ou d''une méthode');

-- --------------------------------------------------------

--
-- Structure de la table `englober`
--

CREATE TABLE IF NOT EXISTS `englober` (
  `id_p` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL,
  PRIMARY KEY (`id_p`,`id_comp`),
  KEY `FK_Englober_id_comp` (`id_comp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `englober`
--

INSERT INTO `englober` (`id_p`, `id_comp`) VALUES
(1, 1),
(14, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(1, 2),
(15, 2),
(1, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(39, 26),
(38, 47),
(38, 48);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `nom_img` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_img`),
  KEY `FK_IMAGE_id_p` (`id_p`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id_img`, `nom_img`, `active`, `id_p`) VALUES
(1, '21.jpg', NULL, 21),
(2, '21.jpg', NULL, 21),
(3, '22.jpg', NULL, 22),
(4, '22.jpg', NULL, 22),
(5, '23.jpg', NULL, 23),
(6, '23.jpg', NULL, 23),
(7, '24.jpg', NULL, 24),
(8, '24.jpg', NULL, 24),
(9, '25.jpg', NULL, 25),
(10, '25.jpg', NULL, 25),
(11, '26.jpg', NULL, 26),
(12, '26.jpg', NULL, 26),
(13, '27.jpg', NULL, 27),
(14, '27.jpg', NULL, 27),
(15, '28.jpg', NULL, 28),
(16, '28.jpg', NULL, 28),
(17, '29.jpg', NULL, 29),
(18, '29.jpg', NULL, 29),
(19, '30.jpg', NULL, 30),
(20, '30.jpg', NULL, 30),
(21, '31.jpg', NULL, 31),
(22, '31.jpg', NULL, 31),
(23, '32.jpg', NULL, 32),
(24, '32.jpg', NULL, 32),
(25, '33.jpg', NULL, 33),
(26, '33.jpg', NULL, 33),
(27, '34.jpg', NULL, 34),
(28, '34.jpg', NULL, 34),
(29, '35.jpg', NULL, 35),
(30, '35.jpg', NULL, 35),
(31, '36.jpg', NULL, 36),
(32, '36.jpg', NULL, 36),
(33, '37.jpg', NULL, 37),
(34, '37.jpg', NULL, 37);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `photo_principale` varchar(255) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_p`),
  KEY `FK_PROJET_id_cat` (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_p`, `titre`, `description`, `date_start`, `date_end`, `photo_principale`, `id_cat`) VALUES
(1, 'Projet 1', 'test', '2016-11-02', '2019-12-24', '14.jpg', 1),
(2, 'Projet 2', 'test', '0000-00-00', '0000-00-00', '', 2),
(3, 'Projet 3', 'test', '2014-01-01', '2018-01-01', '', 1),
(10, 'Projet 4', 'vzegfez', '2016-02-21', '2020-11-20', '', 2),
(11, 'Projet 4', 'vzegfez', '2016-02-21', '2020-11-20', '', 2),
(12, 'Projet 4', 'vzegfez', '2016-02-21', '2020-11-20', '', 2),
(13, 'Titre 5', 'zgrefz', '0000-00-00', '2018-01-01', '', 1),
(14, 'szdegr', 'zeger', '0000-00-00', '2019-12-24', '', 1),
(15, 'Projet 3', 'fhjh', '0000-00-00', '0000-00-00', '', 1),
(16, 'Projet 1', 'gjk', '0000-00-00', '2020-11-20', '', 1),
(17, 'Projet 1', 'aeffez', '2014-01-01', '2020-11-20', '', 1),
(18, 'La grande muraille', 'LE FILM de l''année', '2016-11-20', '2020-11-20', '', 2),
(19, 'La grande muraille', 'De chine', '2016-11-02', '2019-12-24', '', 2),
(20, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(21, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(22, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(23, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(24, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(25, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(26, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(27, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(28, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(29, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(30, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(31, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(32, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(33, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(34, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(35, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(36, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(37, 'La grande muraille', 'De chine', '2016-02-21', '2019-12-24', '', 2),
(38, 'Youkoulele', 'erzgrg', '2016-01-02', '2017-02-01', '', 4),
(39, 'gzrerzg', 'grzegerz', '2016-01-02', '2017-02-01', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_u`, `login`, `email`, `mdp`) VALUES
(1, 'Andy', 'andydub1@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `englober`
--
ALTER TABLE `englober`
  ADD CONSTRAINT `FK_Englober_id_comp` FOREIGN KEY (`id_comp`) REFERENCES `competence` (`id_comp`),
  ADD CONSTRAINT `FK_Englober_id_p` FOREIGN KEY (`id_p`) REFERENCES `projet` (`id_p`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_IMAGE_id_p` FOREIGN KEY (`id_p`) REFERENCES `projet` (`id_p`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `FK_PROJET_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
