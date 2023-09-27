-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 sep. 2023 à 23:48
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jobboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `image` varchar(535) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `intitule` varchar(535) NOT NULL,
  `societe` int(11) NOT NULL,
  `datePublication` date NOT NULL,
  `dateMaj` date NOT NULL,
  `lieu` int(11) NOT NULL,
  `contrat` int(11) NOT NULL,
  `metier` int(11) NOT NULL,
  `description` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `image`, `intitule`, `societe`, `datePublication`, `dateMaj`, `lieu`, `contrat`, `metier`, `description`) VALUES
(1, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Développeur front-end', 1, '2023-09-24', '0000-00-00', 1, 1, 1, ''),
(2, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Enseignant en maternelle', 8, '2023-09-24', '0000-00-00', 1, 1, 6, ''),
(3, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Développeur web en alternance', 1, '2023-09-27', '0000-00-00', 1, 4, 1, ''),
(4, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Designer UI/UX', 2, '2023-09-24', '0000-00-00', 5, 5, 5, ''),
(5, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Consultant en marketing', 2, '2023-09-24', '0000-00-00', 3, 1, 10, ''),
(6, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Ingénieur en logiciel', 7, '2023-09-27', '0000-00-00', 2, 2, 2, ''),
(7, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Mécanicien automobile', 4, '2023-09-24', '0000-00-00', 1, 1, 8, ''),
(8, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Enseignant', 5, '2023-09-24', '0000-00-00', 8, 2, 6, ''),
(9, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Développeur fullstack', 2, '2023-09-27', '0000-00-00', 3, 1, 1, ''),
(10, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Plongeur', 9, '2023-09-24', '0000-00-00', 1, 7, 7, ''),
(11, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Designer graphique en alternance', 6, '2023-09-24', '0000-00-00', 1, 4, 3, ''),
(12, '{\"id\":12,\"image\":\"https://i.some-random-api.ml/07jjUxQKNf.png\",\"caption\":\"Ooof\",\"category\":\"random\"}', 'Plongeur', 9, '2023-09-27', '0000-00-00', 5, 7, 7, '');

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id` int(11) NOT NULL,
  `libelle` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`id`, `libelle`) VALUES
(0, 'Tous les contrats'),
(1, 'CDI'),
(2, 'CDD'),
(3, 'Stage'),
(4, 'Alternance'),
(5, 'Freelance'),
(6, 'Temps partiel'),
(7, 'Saisonnier');

-- --------------------------------------------------------

--
-- Structure de la table `metiers`
--

CREATE TABLE `metiers` (
  `id` int(11) NOT NULL,
  `libelle` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `metiers`
--

INSERT INTO `metiers` (`id`, `libelle`) VALUES
(0, 'Tous les métiers'),
(1, 'Développeur web'),
(2, 'Ingénieur en logiciel'),
(3, 'Designer graphique'),
(4, 'Analyste financier'),
(5, 'Designer UI/UX'),
(6, 'Enseignant'),
(7, 'Plongeur'),
(8, 'Mécanicien automobile'),
(9, 'Architecte'),
(10, 'Consultant en marketing'),
(11, 'Pharmacien'),
(12, 'Electricien'),
(13, 'Journaliste'),
(14, 'Vendeur'),
(15, 'Comptable'),
(16, 'Secrétaire'),
(17, 'Technicien de maintenance'),
(18, 'Caissier'),
(19, 'Serveur/serveuse'),
(20, 'Chauffeur-livreur'),
(21, 'Assistant administratif'),
(22, 'Électricien résidentiel'),
(23, 'Agent de sécurité'),
(24, 'Plombier-chauffagiste'),
(25, 'Professeur des écoles'),
(26, 'Conseiller clientèle');

-- --------------------------------------------------------

--
-- Structure de la table `societes`
--

CREATE TABLE `societes` (
  `id` int(11) NOT NULL,
  `nom` varchar(535) NOT NULL,
  `adresse` varchar(535) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `societes`
--

INSERT INTO `societes` (`id`, `nom`, `adresse`, `dateCreation`) VALUES
(1, 'Tech Solutions', '789 Boulevard Tech Solutions', '2015-11-10'),
(2, 'Innovatech Co.', '1010 Rue de Innovatech Co.', '2019-08-03'),
(3, 'NexGen Enterprises', '222 Avenue NexGen Enterprises', '2017-03-17'),
(4, 'InnoSoft Solutions', '789 Rue des Innovations', '2016-02-25'),
(5, 'MegaTech Group', '555 Avenue MegaTech', '2014-09-08'),
(6, 'Global Innovations Ltd.', '987 Boulevard des Technologies', '2021-04-12'),
(7, 'DataXpert Inc.', '333 Rue DataXpert', '2013-07-19'),
(8, 'WebWizards LLC', '222 Avenue WebWizards', '2012-11-30'),
(9, 'Tech Innovators Inc.', '123 Rue de lInnovation', '2019-06-10'),
(10, 'Visionary Ventures', '456 Avenue Visionary', '2017-08-22');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `libelle` varchar(535) NOT NULL,
  `codePostal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `libelle`, `codePostal`) VALUES
(0, 'Toutes les villes', 0),
(1, 'Paris', 75000),
(2, 'Marseille', 13000),
(3, 'Lyon', 69000),
(4, 'Toulouse', 31000),
(5, 'Bordeaux', 33000),
(6, 'Lille', 59000),
(7, 'Nantes', 44000),
(8, 'Strasbourg', 67000),
(9, 'Nice', 6000),
(10, 'Montpellier', 34000),
(11, 'Rennes', 35000),
(12, 'Grenoble', 38000),
(13, 'Toulon', 83000),
(14, 'Le Havre', 76600),
(15, 'Dijon', 21000),
(16, 'Angers', 49000),
(17, 'Nancy', 54000),
(18, 'Avignon', 84000),
(19, 'Brest', 29200),
(20, 'Reims', 51100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `societes`
--
ALTER TABLE `societes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
