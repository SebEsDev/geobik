-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 juil. 2018 à 09:36
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_geobik`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'sebastien.fellenberg@gmail.com', 'password'),
(2, 'geobik.seb@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `metiers`
--

CREATE TABLE `metiers` (
  `id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `metiers`
--

INSERT INTO `metiers` (`id`, `intitule`) VALUES
(1, 'PDG'),
(2, 'Cadre'),
(3, 'Employé de la fonction publique'),
(4, 'Militaire'),
(5, 'Aviateur'),
(6, 'Astronaute');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `metier` varchar(40) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `date_naissance`, `sexe`, `email`, `pays`, `metier`, `date_creation`) VALUES
(24, 'Pomme', 'Julie', '2018-06-04', 'Femme', 'juliepomme123@gmail.com', 'United Kingdom', 'Astronaute', '2018-06-29'),
(25, 'Pamplemousse', 'Jean', '2018-06-03', 'Homme', 'jeanpamplemousse123@gmail.com', 'Germany', 'Militaire', '2018-06-29'),
(26, 'Cerise', 'Alban', '2018-06-06', 'Homme', 'cerisealban@gmail.com', 'Germany', 'Militaire', '2018-06-29'),
(28, 'Kiwi', 'Félix', '0265-12-12', 'Homme', 'kiwi@gmai.com', 'Italy', 'Astronaute', '2018-06-29'),
(29, 'Goyave', 'Jean', '2000-02-21', 'Homme', 'jeangoyave@gmaiil.com', 'Spain', 'Aviateur', '2018-06-29'),
(30, 'Litchi', 'Jean', '1212-12-12', 'Homme', 'lichi@gmoil.com', 'Switzerland', 'Aviateur', '2018-06-29'),
(36, 'Diables', 'Rouges', '2018-07-02', 'Homme', 'diablerouge@aol.com', 'Belgium', 'Aviateur', '2018-07-03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
