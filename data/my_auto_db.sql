-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 juin 2020 à 18:30
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_auto_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `forfait_id` int(11) NOT NULL,
  `credit_card` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`id`, `user_id`, `forfait_id`, `credit_card`, `created_at`) VALUES
(9, 1, 1, '605294', '2020-06-10 20:15:48');

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_card` varchar(50) NOT NULL,
  `solde` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`id`, `number_card`, `solde`) VALUES
(1, '605294', 8000),
(2, '378675', 4385),
(3, '839771', 4168),
(4, '726490', 200),
(5, '546510', 1899),
(6, '423343', 3663),
(7, '268223', 2492),
(8, '665632', 1299),
(9, '757677', 4335),
(10, '596119', 3469);

-- --------------------------------------------------------

--
-- Structure de la table `forfait`
--

DROP TABLE IF EXISTS `forfait`;
CREATE TABLE IF NOT EXISTS `forfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_forfait` varchar(100) NOT NULL,
  `prix_forfait` int(11) NOT NULL,
  `number_heure` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forfait`
--

INSERT INTO `forfait` (`id`, `nom_forfait`, `prix_forfait`, `number_heure`) VALUES
(1, 'Code + Conduite AccompagnÃ©e', 1250, 45),
(2, 'Code Uniquement', 600, 20),
(3, 'Code + Conduite (permis auto)', 1900, 60);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id`, `date_debut`, `date_fin`, `adresse`, `ville`, `code_postal`, `type`, `monitor_id`, `created_at`) VALUES
(1, '2020-05-30 00:00:00', '2020-05-30 00:00:00', '14 rue de la place ', 'Paris', '75012', 'CONDUITE', 4, '2020-05-30 11:22:05');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_code` varchar(255) DEFAULT NULL,
  `password_date` datetime DEFAULT NULL,
  `date_naissance` datetime NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `reference` varchar(200) NOT NULL,
  `number_heure` int(255) NOT NULL DEFAULT 0,
  `number_disponible` int(255) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `telephone`, `role`, `password`, `password_code`, `password_date`, `date_naissance`, `adresse`, `ville`, `photo`, `code_postal`, `reference`, `number_heure`, `number_disponible`, `active`, `update_at`, `created_at`, `delete_at`) VALUES
(1, 'john', 'light', 'john@gmail.com', NULL, 'ROLE_USER', '$2y$10$8eGQ1.jcRY/NGmnXWUlH5OqIqY8V9xd.0ovfyABLfV4yFI9oABFYS', NULL, NULL, '2020-05-22 00:00:00', NULL, NULL, NULL, NULL, '5EC8028FA5CCD', 0, 0, 1, '2020-05-22 18:49:19', '2020-05-22 18:49:19', NULL),
(3, 'admin', 'test', 'admin@gmail.com', NULL, 'ROLE_ADMIN', '$2y$10$8zYxRYLXd9gpZHXFI8ZKyO0liAP6JPhrMksEMjNeWkdIicjaSZtv6', NULL, NULL, '2020-05-22 00:00:00', NULL, NULL, NULL, NULL, '5EC8043839F93', 0, 0, 1, '2020-05-22 18:56:24', '2020-05-22 18:56:24', NULL),
(4, 'paul', 'jean', 'paul@gmail.com', NULL, 'ROLE_USER', '$2y$10$/cDxiaFSCZSbCztDnn3Ky.Z8XcGVLGrkLkwcCWRc40.Bg8mRZ67XG', NULL, NULL, '1989-05-21 00:00:00', NULL, NULL, NULL, NULL, '5ECD56073A0F8', 0, 0, 1, '2020-05-26 19:46:47', '2020-05-26 19:46:47', NULL),
(5, 'marie', 'janne', 'mariejanne@gmail.com', NULL, 'ROLE_USER', '$2y$10$9jH43EKQy10dG3pYMqNsEeLL9cqKIhRRWx2E0btpGIOIRHovapoFq', NULL, NULL, '2020-05-15 00:00:00', NULL, NULL, NULL, NULL, '5ECD5622E3D8A', 0, 0, 1, '2020-05-26 19:47:14', '2020-05-26 19:47:14', NULL),
(6, 'antoine', 'martin', 'antoine@gmail.com', NULL, 'ROLE_USER', '$2y$10$OEcqB2dSN.yzHXHxnfk2EufbOQh2XMZ2ZnCCiNpJbTYDCBAqjQyFe', NULL, NULL, '2020-05-29 00:00:00', NULL, NULL, NULL, NULL, '5ECD564349156', 0, 0, 1, '2020-05-26 19:47:47', '2020-05-26 19:47:47', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
