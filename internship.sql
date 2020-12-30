-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 déc. 2020 à 10:46
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `internship`
--
CREATE DATABASE IF NOT EXISTS `internship` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `internship`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'MPA'),
(2, 'ACE');

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `title` varchar(70) NOT NULL COMMENT 'Movie Title',
  `year` int NOT NULL COMMENT 'Year of Production',
  `studio` int NOT NULL COMMENT 'FK Studio ID',
  `imdb_id` int NOT NULL COMMENT 'IMDB ID without ''tt'''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `content`
--

INSERT INTO `content` (`id`, `title`, `year`, `studio`, `imdb_id`) VALUES
(1, 'Deadpool', 2016, 2, 1431045),
(2, 'It', 2017, 3, 1396484),
(3, 'Sandy Wexler', 2017, 7, 5893332),
(4, 'Madagascar', 2005, 6, 351283),
(5, 'Jurassic Park', 1993, 5, 107290),
(6, 'The Social Network', 2010, 4, 1285016),
(7, 'Toy Story 3', 2010, 1, 435761),
(8, 'The Lost City of Z', 2016, 8, 1212428),
(9, 'Paddington 2', 2017, 9, 4468740),
(10, 'Beautiful Boy', 2018, 8, 1226837),
(11, 'The OA: Part II', 2019, 7, 4635282),
(12, 'Looking For Alaska Season 1', 2019, 6, 3829868),
(13, '12 Monkeys', 2015, 5, 3148266),
(14, 'Breaking Bad Season 2', 2009, 4, 903747),
(15, 'Friends', 1994, 3, 108778),
(16, 'Family Guy Season 9', 2009, 2, 1327801),
(17, 'Hannah Montana', 2006, 1, 493093);

--
-- Déclencheurs `content`
--
DELIMITER $$
CREATE TRIGGER `insertContent` BEFORE INSERT ON `content` FOR EACH ROW Insert into content(login,password,email, level) values (login,password,email, level)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `domain`
--

CREATE TABLE `domain` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domain`
--

INSERT INTO `domain` (`id`, `name`) VALUES
(1, 'openload.co'),
(2, 'm1x.vidcloud9.com'),
(3, 'gounlimited.to'),
(4, 'fembed.com'),
(5, 'streamhoe.online');

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE `link` (
  `id` int NOT NULL,
  `domain` int NOT NULL COMMENT 'FK domain',
  `url` varchar(240) NOT NULL COMMENT 'URL',
  `content` int NOT NULL COMMENT 'FK movie'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `link`
--

INSERT INTO `link` (`id`, `domain`, `url`, `content`) VALUES
(1, 1, 'iframe_player.php?vid=888114987', 1),
(2, 5, 'v/Fe56R92d0', 2),
(3, 4, 'video/?v=798041656', 3),
(4, 1, 'iframe_player.php?vid=114955912', 4),
(5, 3, 'v/Fme973jDFN', 5),
(6, 2, 'video/98531023', 6),
(7, 1, 'v/?id=D56Epm20rFV', 16);

-- --------------------------------------------------------

--
-- Structure de la table `studio`
--

CREATE TABLE `studio` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Studio''s Name',
  `category` int NOT NULL COMMENT 'MPA or ACE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `studio`
--

INSERT INTO `studio` (`id`, `name`, `category`) VALUES
(1, 'Disney Enterprises, Inc.', 1),
(2, 'Twentieth Century Fox Film Corporation', 1),
(3, 'Warner Bros. Entertainment Inc.', 1),
(4, 'Sony Pictures Entertainment Inc.', 1),
(5, 'Universal City Studios Productions LLLP', 1),
(6, 'Paramount Pictures Corporation', 1),
(7, 'Netflix', 1),
(8, 'Amazon', 1),
(9, 'CANAL+', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `link`
--
ALTER TABLE `link`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
--
-- Base de données : `projint`
--
CREATE DATABASE IF NOT EXISTS `projint` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `projint`;
--
-- Base de données : `´internship´`
--
CREATE DATABASE IF NOT EXISTS `´internship´` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `´internship´`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
