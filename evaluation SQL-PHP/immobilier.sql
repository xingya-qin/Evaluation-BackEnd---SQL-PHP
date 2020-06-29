-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 juin 2020 à 20:50
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `cp` int(5) NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `type` enum('v','l') NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(3, 'Vente Appartement 59,44m² Maurepas - Bois Nogent Agiot', '4 Rue de Bresse', ' Maurepas', 78310, 60, 173200, 'http://localhost/php/evaluation/photo/logement_1591382580.jpg', 'v', 'RARE GRAND 2 pièces traversant en dernier étage de 60 m² avec terrasse et balcon, situé proches des commerces, écoles et transports, gare à pied, il vous offre une entrée avec placard, un séjour de 29 m² exposé Est avec accès à la terrasse, une cuisine à aménager, un WC, une salle de bains avec baignoire et fenêtre, une grande chambre avec balcon et accès terrasse exposée Ouest.'),
(4, 'Vente Appartement 106m² Saint-Germain-en-Laye - Général Leclerc', '10 Rue Wauthier', 'Saint-Germain-en-Laye', 78100, 106, 430000, 'http://localhost/php/evaluation/photo/logement_1591382715.jpg', 'v', ' A 15 minutes à pied du RER, dans une résidence sécurisée, un très bel appartement de 5 pièces de 106 m²: entrée, grand séjour avec vue dégagée, cuisine indépendante avec cellier, 3 chambres, 2 salle de bains, 2 dressing, 2 WC séparés. Cave et parking. Charges 214 euros/mois.'),
(5, 'Location Appartement 62,1m² Saint-Germain-en-Laye - Place Louis XIV', '5 Rue de Tourville', 'Saint-Germain-en-Laye', 78100, 62, 1800, 'http://localhost/php/evaluation/photo/logement_1591382793.jpg', 'l', 'Proche RER charmant 3 pièces meublé de 62.10 m² offrant: une entrée, un séjour avec cuisine ouverte aménagée et équipée, deux chambre avec placard, une salle de bains, WC indépendant. En dépendance: une cave. Possibilité de louer une place de stationnement dans la résidence au prix de 110 euros/mois.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
