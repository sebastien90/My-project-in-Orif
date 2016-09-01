-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Juin 2016 à 09:11
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `w3b_all`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_note`
--

DROP TABLE IF EXISTS `t_note`;
CREATE TABLE IF NOT EXISTS `t_note` (
  `noteId` int(11) NOT NULL AUTO_INCREMENT,
  `txtNote` text CHARACTER SET utf8 NOT NULL,
  `userNote` varchar(150) CHARACTER SET utf8 NOT NULL,
  `statutNote` int(3) NOT NULL,
  `dateNote` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModifNote` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`noteId`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_note`
--

INSERT INTO `t_note` (`noteId`, `txtNote`, `userNote`, `statutNote`, `dateNote`, `dateModifNote`) VALUES
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, libero a pretium viverra, ligula ligula tempus dui, a vestibulum nibh enim a arcu. Suspendisse potenti. Nulla eget magna vitae metus fringilla tincidunt ut a tellus. Nulla faucibus ligula pulvinar, tempor metus euismod, vestibulum dolor. Donec tellus turpis, semper et pharetra at, varius eu velit. Aenean pharetra commodo lorem eget condimentum. Morbi ut nulla vel arcu egestas varius eu ac risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas mollis augue egestas arcu sollicitudin, eget convallis nulla maximus. Aliquam pulvinar sollicitudin lobortis. In hac habitasse platea dictumst. Ut viverra tellus quis ex tempus accumsan. Quisque dictum vitae augue eu dignissim. Donec nulla ante, suscipit at dolor a, accumsan dictum risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec id ligula id felis porttitor pulvinar a quis ex.\r\n<br /><br />\r\nCras quis lobortis turpis, id maximus erat. Aenean in fringilla neque. Donec lacinia dictum sapien ac efficitur. Nulla iaculis, ligula ut scelerisque efficitur, nibh sapien commodo ligula, et aliquet sapien neque sed sem. Vivamus imperdiet nibh a blandit laoreet. Etiam a justo neque. Quisque accumsan dui elit, vel molestie arcu convallis semper. Nulla nec aliquet justo. Integer eleifend felis in bibendum maximus.\r\n<br /><br />\r\nCurabitur consequat scelerisque ipsum vitae tempus. Vivamus nec sapien ex. Nulla vestibulum augue sit amet magna sollicitudin sagittis. Sed magna tortor, laoreet id convallis id, scelerisque sed lectus. Ut nec nisl semper, eleifend orci at, auctor ante. Phasellus ullamcorper massa at arcu rutrum, nec suscipit felis ultricies. Morbi non metus sit amet dui pulvinar convallis et a justo.', 'Sébastien', 1, '2016-05-19 11:32:27', NULL),
(28, 'Il est le 26 mai 2016, je travaille debout! <br /><br />\r\nIl faut utilisé les balise html pour mettre en forme le texte.', 'Sébastien', 1, '2016-05-26 11:31:22', '2016-05-26 11:50:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
