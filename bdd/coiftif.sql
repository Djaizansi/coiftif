-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 20 oct. 2019 à 13:01
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
-- Base de données :  `coiftif`
--

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `type` varchar(40) NOT NULL,
  `prix` int(3) NOT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `utilisateur_id`, `nom`, `prenom`, `sexe`, `type`, `prix`, `date`, `heure`) VALUES
(1, 12, 'Jean', 'Bernard', 'Homme', 'Homme : Coiffure + Shampoing', 10, '2019-01-13', '11:20:00'),
(2, 12, 'Bardito', 'Jacklino', 'Homme', 'Homme : Coiffure + Shampoing', 10, '2019-01-13', '14:25:07'),
(5, 13, 'Jallali', 'Youcef', 'Homme', 'Homme : Coiffure + Barbe + Shampoing', 15, '2019-01-13', '14:50:00'),
(6, 12, 'Moha', 'Lasquale', 'Homme', 'Homme : Coiffure + Shampoing', 10, '2019-01-14', '14:45:00'),
(7, 13, 'Moi', 'tamere', 'Homme', 'Homme : Coiffure + Barbe + Shampoing', 15, '2019-01-14', '14:48:00'),
(8, 13, 'Dalida', 'Emilia', 'Femme', 'Femme : Coiffure + Shampoing + Brushing', 16, '2019-01-14', '12:58:00'),
(9, 12, 'ahmed', 'dubois', 'Homme', 'Homme : Coiffure + Shampoing', 10, '2019-01-17', '15:45:00'),
(16, 12, 'Jean', 'Youcef', 'Homme', 'Homme : Barbe', 5, '2019-01-29', '14:45:00'),
(17, 12, 'Jean', 'ahmed', 'Homme', 'Homme : Coiffure + Shampoing', 10, '2019-01-29', '14:58:00'),
(18, 12, 'Jallali', 'Youcef', 'Homme', 'Homme : Coiffure + Shampoing', 10, '2019-01-31', '13:30:00'),
(19, 12, 'aa', 'bb', 'Homme', 'Homme : Coiffure + Shampoing', 10, '2019-01-31', '14:25:00');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int(5) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(5) NOT NULL,
  `id_employer` int(5) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `etat` varchar(10) NOT NULL DEFAULT 'prendre',
  PRIMARY KEY (`id_rdv`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `fk_employer` (`id_employer`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_rdv`, `id_utilisateur`, `id_employer`, `date`, `heure`, `etat`) VALUES
(10, 15, 12, '2019-01-23', '18:45:00', 'terminer'),
(18, 15, 12, '2019-01-31', '20:51:00', 'terminer'),
(20, 15, 14, '2019-02-22', '14:55:00', 'terminer'),
(21, 15, 12, '2019-02-11', '14:55:00', 'terminer'),
(22, 15, 12, '2019-03-20', '15:55:00', 'terminer');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `cat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `nom`, `prenom`, `mdp`, `mail`, `cat`) VALUES
(4, 'djaizansi', 'cksqd', 'cknscs', 'ab4f63f9ac65152575886860dde480a1', 'youcef.jallali@gmail.com', 'admin'),
(12, 'employer1', 'a', 'b', 'ab4f63f9ac65152575886860dde480a1', 'employer1@gmail.com', 'employe'),
(13, 'employer2', 'c', 'c', 'ab4f63f9ac65152575886860dde480a1', 'employer2@gmail.com', 'employe'),
(14, 'employer3', 'd', 'e', 'ab4f63f9ac65152575886860dde480a1', 'employer3@gmail.com', 'employe'),
(15, 'Zoro98', 'Jallali', 'Youcef', 'ab4f63f9ac65152575886860dde480a1', 'youyous123@gmail.com', 'client');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `utilisateur_fk` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_employer` FOREIGN KEY (`id_employer`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
