-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 02 sep. 2020 à 03:30
-- Version du serveur :  10.4.14-MariaDB-1:10.4.14+maria~focal
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `performer`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `form_survey` varchar(255) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `projet_survey` varchar(255) NOT NULL,
  `nomprojet` varchar(50) NOT NULL,
  `tic_survey` varchar(255) NOT NULL,
  `info_survey` varchar(255) NOT NULL,
  `projet_desc` text NOT NULL,
  `lien` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `datenaissance`, `email`, `phone`, `commune`, `form_survey`, `genre`, `projet_survey`, `nomprojet`, `tic_survey`, `info_survey`, `projet_desc`, `lien`, `reg_date`) VALUES
(1, 's', 't', '2020-09-25', 'komenan.konan@uvci.edu.ca', '59842878', 'abidjan', 'Suivre la formation', 'M', 'Non', 'test', '', 'reseaux sociaux', 'test', 'https://google.ci', '2020-09-02 03:24:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
