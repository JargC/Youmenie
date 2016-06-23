-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
<<<<<<< Updated upstream
-- Généré le :  Jeu 23 Juin 2016 à 15:24
=======
<<<<<<< Updated upstream
-- Généré le :  Mer 22 Juin 2016 à 18:33
=======
-- Généré le :  Mar 21 Juin 2016 à 13:22
>>>>>>> Stashed changes
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_publication` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `id_oeuvre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `description`, `url`, `date`, `id_oeuvre`) VALUES
(1, 'artist', 'Super belle vidÃ©o ! Au top :)', 'artiste.php?ID=1', '23/06/2016, 15:04', 3);

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE IF NOT EXISTS `coordonnees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` varchar(255) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `oeuvre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`id`, `user`, `oeuvre_id`) VALUES
(1, 'artist', 1);

-- --------------------------------------------------------

--
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
  `genre` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
=======
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
>>>>>>> Stashed changes

--
-- Contenu de la table `oeuvres`
--

<<<<<<< Updated upstream
INSERT INTO `oeuvres` (`id`, `type`, `titre`, `description`, `user`, `fichier`, `icone`, `genre`, `likes`) VALUES
(1, 'Musiques', 'Lil Wayne', 'Lolilol', 'artist', 'Musiques/artist.Lil Wayne - Love Me (Explicit) ft. Drake, Future.mp3', 'Musiques/artist.footer.jpg', '', 11),
(2, 'Images', 'Le Titre', 'La Description', 'artist', 'Images/artist.code_1.png', 'Images/artist.code_1.png', '', 0),
(3, 'Videos', 'DJ Drama - So Many Girls', 'Allo le monde', 'artist', 'Videos/artist.DJ Drama - So Many Girls (Feat. Wale_ Tyga & Roscoe Dash).mp4', 'Videos/artist.WoWScrnShot_061916_201234.jpg', '', 0),
(4, 'Musiques', 'La musique', 'Donald', 'artist', 'Musiques/artist.Mac Miller - Donald Trump.mp3', 'Musiques/artist.edt.jpg', '', 0),
(7, 'Textes', 'Test du texte', 'Sa description', 'artist', 'Hello tout le monde, Ã§a va ?', 'Textes/text.jpg', '', 0);
=======
INSERT INTO `oeuvres` (`id`, `type`, `titre`, `description`, `user`, `fichier`, `icone`, `likes`) VALUES
(1, 'Musiques', 'Lil Wayne', 'Lolilol', 'artist', 'Musiques/artist.Lil Wayne - Love Me (Explicit) ft. Drake, Future.mp3', 'Musiques/artist.footer.jpg', 10),
(2, 'Images', 'Le Titre', 'La Description', 'artist', 'Images/artist.code_1.png', 'Images/artist.code_1.png', 0),
(3, 'Videos', 'DJ Drama - So Many Girls', 'Allo le monde', 'artist', 'Videos/artist.DJ Drama - So Many Girls (Feat. Wale_ Tyga & Roscoe Dash).mp4', 'Videos/artist.WoWScrnShot_061916_201234.jpg', 0);
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
  `age` int(11) NOT NULL,
  `biographie` text NOT NULL,
=======
>>>>>>> Stashed changes
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user_artist`
--

<<<<<<< Updated upstream
INSERT INTO `user_artist` (`id`, `login`, `mdp`, `email`, `nom`, `prenom`, `age`, `biographie`) VALUES
(1, 'artist', 'artist', 'test@test.fr', 'nom', 'prenom', 0, ''),
(2, 'test', 'test', 'test@tester.com', 'Grosso', 'Terry', 0, ''),
(3, 'test', 'test', 'test@tester.com', 'Grosso', 'Terry', 0, '');
=======
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
>>>>>>> Stashed changes

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
