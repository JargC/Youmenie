-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Juin 2016 à 13:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `talent`
--

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

CREATE TABLE IF NOT EXISTS `oeuvres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `icone` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id`, `type`, `titre`, `description`, `user`, `fichier`, `icone`, `likes`) VALUES
(1, 'Musiques', 'Lil Wayne', 'Lolilol', 'artist', 'Musiques/artist.Lil Wayne - Love Me (Explicit) ft. Drake, Future.mp3', 'Musiques/artist.footer.jpg', 10),
(2, 'Images', 'Le Titre', 'La Description', 'artist', 'Images/artist.code_1.png', 'Images/artist.code_1.png', 0),
(3, 'Videos', 'DJ Drama - So Many Girls', 'Allo le monde', 'artist', 'Videos/artist.DJ Drama - So Many Girls (Feat. Wale_ Tyga & Roscoe Dash).mp4', 'Videos/artist.WoWScrnShot_061916_201234.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_artist`
--

CREATE TABLE IF NOT EXISTS `user_artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user_artist`
--

INSERT INTO `user_artist` (`id`, `login`, `mdp`, `email`, `nom`, `prenom`) VALUES
(1, 'artist', 'artist', 'test@test.fr', 'nom', 'prenom'),
(2, 'test', 'test', 'test@tester.com', 'Grosso', 'Terry'),
(3, 'test', 'test', 'test@tester.com', 'Grosso', 'Terry');

-- --------------------------------------------------------

--
-- Structure de la table `user_like`
--

CREATE TABLE IF NOT EXISTS `user_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `oeuvre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Structure de la table `user_public`
--

CREATE TABLE IF NOT EXISTS `user_public` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user_public`
--

INSERT INTO `user_public` (`id`, `login`, `mdp`, `email`, `nom`, `prenom`) VALUES
(1, 'test', 'test', 'test@tester.com', 'test', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
