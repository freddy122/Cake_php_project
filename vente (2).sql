-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 10 Juin 2014 à 04:18
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `vente`
--
CREATE DATABASE IF NOT EXISTS `vente` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vente`;

----------------------------------------------------------

--
-- Structure de la table `auditvendeurs`
--

CREATE TABLE IF NOT EXISTS `auditvendeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
 
  `quand` datetime NOT NULL,
  `qui` varchar(50) NOT NULL,
  `quoi` varchar(30) NOT NULL,
  `ancien_salaire` int(11) NOT NULL,
  `new_salaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `auditvendeurs`
--

INSERT INTO `auditvendeurs` (`id`, `quand`, `qui`, `quoi`, `ancien_salaire`, `new_salaire`) VALUES
(13, '2014-06-06 00:00:00', 'fred', 'Modification', 445, 446),
(14, '2014-06-06 00:00:00', 'fred', 'Suppression', 446, 0),
(17, '2014-06-07 00:00:00', 'orimbato', 'Suppression', 666, 0),
(18, '2014-06-09 00:00:00', 'der', 'Modification', 6, 7),
(19, '2014-06-09 00:00:00', 'nom1', 'Modification', 30002, 30001);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendeur_id` int(11) NOT NULL,
  `date_recette` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vendeur_id` (`vendeur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `recettes`
--

INSERT INTO `recettes` (`id`, `vendeur_id`, `date_recette`, `montant`) VALUES
(18, 6, '2014-07-16 00:00:00', 55);

--
-- Déclencheurs `recettes`
--
DROP TRIGGER IF EXISTS `recettes_delete`;
DELIMITER //
CREATE TRIGGER `recettes_delete` AFTER DELETE ON `recettes`
 FOR EACH ROW BEGIN
		UPDATE recettejours SET montant_recette = montant_recette - OLD.montant WHERE date_recette = DATE(OLD.date_recette);
		UPDATE recettemois SET montant = montant - OLD.montant WHERE rc_mois = MONTH(OLD.date_recette)
		AND rc_an = YEAR(OLD.date_recette);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `recettes_insert`;
DELIMITER //
CREATE TRIGGER `recettes_insert` BEFORE INSERT ON `recettes`
 FOR EACH ROW BEGIN
		DECLARE v_i INT(11);
		DECLARE v_verif_mois INT(11);
		
		SELECT COUNT(*) INTO v_verif_mois FROM recettes WHERE YEAR(date_recette) = YEAR(NEW.date_recette) AND MONTH(date_recette) = MONTH(NEW.date_recette);
		SELECT COUNT(*) INTO v_i FROM recettejours WHERE date_recette = DATE(NEW.date_recette);
		IF v_i != 0 THEN
			UPDATE recettejours SET montant_recette = montant_recette + NEW.montant WHERE date_recette = DATE(NEW.date_recette);
		ELSE
			INSERT INTO recettejours(date_recette, montant_recette) VALUES (DATE(NEW.date_recette), NEW.montant);
		END IF;
		
		IF v_verif_mois THEN
			UPDATE recettemois SET montant = montant + NEW.montant WHERE rc_mois = MONTH(NEW.date_recette) AND rc_an = YEAR(NEW.date_recette);
		ELSE
			INSERT INTO recettemois(rc_mois, rc_an, montant) VALUES (MONTH(NEW.date_recette), YEAR(NEW.date_recette), NEW.montant);
		END IF;	
		
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `recettes_update`;
DELIMITER //
CREATE TRIGGER `recettes_update` AFTER UPDATE ON `recettes`
 FOR EACH ROW BEGIN
		IF OLD.montant != NEW.montant THEN
			UPDATE recettejours SET montant_recette = montant_recette - OLD.montant + NEW.montant WHERE date_recette = DATE(OLD.date_recette);
			UPDATE recettemois SET montant = montant - OLD.montant + NEW.montant WHERE rc_mois = MONTH(NEW.date_recette)
			AND rc_an = YEAR(NEW.date_recette);
		END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `recette_jours`
--

CREATE TABLE IF NOT EXISTS `recettejours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_recette` date NOT NULL,
  `montant_recette` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `recette_jours`
--

INSERT INTO `recettejours` (`id`, `date_recette`, `montant_recette`) VALUES
(6, '2014-06-06', 0),
(7, '2014-07-16', 55);

-- --------------------------------------------------------

--
-- Structure de la table `recette_mois`
--

CREATE TABLE IF NOT EXISTS `recettemois` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rc_mois` int(11) NOT NULL,
  `rc_an` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `recette_mois`
--

INSERT INTO `recettemois` (`id`, `rc_mois`, `rc_an`, `montant`) VALUES
(5, 6, 2014, 0),
(6, 7, 2014, 55);

-- --------------------------------------------------------

--
-- Structure de la table `recettevendeurmois`
--

CREATE TABLE IF NOT EXISTS `recettevendeurmois` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rc_mois` int(11) NOT NULL,
  `rc_an` int(11) NOT NULL,
  `vendeur_id` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vendeur_id` (`vendeur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `recettevendeurmois`
--

INSERT INTO `recettevendeurmois` (`id`, `rc_mois`, `rc_an`, `vendeur_id`, `montant`) VALUES
(5, 6, 2014, 6, 30001),
(6, 6, 2014, 7, 54);

-- --------------------------------------------------------

--
-- Structure de la table `vendeurs`
--

CREATE TABLE IF NOT EXISTS `vendeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `salaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `vendeurs`
--

INSERT INTO `vendeurs` (`id`, `name`, `salaire`) VALUES
(6, 'nom1', 30001),
(7, 'fee', 54);

--
-- Déclencheurs `vendeurs`
--
DROP TRIGGER IF EXISTS `vendeurs_before_delete`;
DELIMITER //
CREATE TRIGGER `vendeurs_before_delete` BEFORE DELETE ON `vendeurs`
 FOR EACH ROW begin
	DELETE FROM recettevendeurmois WHERE vendeur_id = OLD.id;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `vendeurs_delete`;
DELIMITER //
CREATE TRIGGER `vendeurs_delete` AFTER DELETE ON `vendeurs`
 FOR EACH ROW BEGIN
	UPDATE recettevendeurmois SET montant = montant - OLD.salaire WHERE vendeur_id = OLD.id;
	INSERT INTO auditvendeurs(user,quand, qui, quoi, ancien_salaire, new_salaire) 
	VALUES ('root',CURDATE(), OLD.name, 'Suppression', OLD.salaire, 0);	
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `vendeurs_insert`;
DELIMITER //
CREATE TRIGGER `vendeurs_insert` AFTER INSERT ON `vendeurs`
 FOR EACH ROW BEGIN
	DECLARE v_verif INT(11);
	
	SELECT COUNT(*) INTO v_verif FROM recettevendeurmois WHERE vendeur_id = NEW.id;
	
	INSERT INTO auditvendeurs(user,quand, qui, quoi, ancien_salaire, new_salaire) 
	VALUES ('root',CURDATE(), NEW.name, 'Ajout', 0, NEW.salaire);
	
	IF v_verif < 1 THEN
		INSERT INTO recettevendeurmois(vendeur_id,rc_mois, rc_an, montant) VALUES	(NEW.id, MONTH(CURDATE()), YEAR(CURDATE()), NEW.salaire);
	ELSE
		UPDATE recettevendeurmois SET montant = salaire + NEW.salaire WHERE vendeur_id = NEW.id;
	END IF;	
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `vendeurs_update`;
DELIMITER //
CREATE TRIGGER `vendeurs_update` AFTER UPDATE ON `vendeurs`
 FOR EACH ROW BEGIN
	
	IF OLD.salaire != NEW.salaire THEN
		UPDATE recettevendeurmois SET montant = montant - OLD.salaire + NEW.salaire WHERE vendeur_id = NEW.id;
	END IF;
	IF OLD.salaire != NEW.salaire OR OLD.name != NEW.name THEN
		INSERT INTO auditvendeurs(user,quand, qui, quoi, ancien_salaire, new_salaire) 
		VALUES ('root',CURDATE(), NEW.name, 'Modification', OLD.salaire, NEW.salaire);
	END IF;
END
//
DELIMITER ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `recettevendeurmois`
--
ALTER TABLE `recettevendeurmois`
  ADD CONSTRAINT `recettevendeurmoisibfk_1` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
