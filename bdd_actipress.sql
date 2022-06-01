-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour actipress
CREATE DATABASE IF NOT EXISTS `actipress` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `actipress`;

-- Listage de la structure de la table actipress. destiner
CREATE TABLE IF NOT EXISTS `destiner` (
  `CODE_MESSAGE` int(2) NOT NULL,
  `CODE_MEMBRE` int(2) NOT NULL,
  `DATE_HEURE_RECU` datetime DEFAULT NULL,
  `email_destinataire` tinytext NOT NULL,
  PRIMARY KEY (`CODE_MESSAGE`,`CODE_MEMBRE`),
  KEY `I_FK_DESTINER_MESSAGE` (`CODE_MESSAGE`),
  KEY `I_FK_DESTINER_MEMBRE` (`CODE_MEMBRE`),
  CONSTRAINT `FK_DESTINER_MEMBRE` FOREIGN KEY (`CODE_MEMBRE`) REFERENCES `membre` (`CODE_MEMBRE`),
  CONSTRAINT `FK_DESTINER_MESSAGE` FOREIGN KEY (`CODE_MESSAGE`) REFERENCES `message` (`CODE_MESSAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table actipress.destiner : ~0 rows (environ)
/*!40000 ALTER TABLE `destiner` DISABLE KEYS */;
/*!40000 ALTER TABLE `destiner` ENABLE KEYS */;

-- Listage de la structure de la table actipress. formation
CREATE TABLE IF NOT EXISTS `formation` (
  `CODE_FORMATION` int(2) NOT NULL AUTO_INCREMENT,
  `DESIGNATION` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_FORMATION`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table actipress.formation : ~0 rows (environ)
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` (`CODE_FORMATION`, `DESIGNATION`) VALUES
	(1, NULL);
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;

-- Listage de la structure de la table actipress. membre
CREATE TABLE IF NOT EXISTS `membre` (
  `CODE_MEMBRE` int(2) NOT NULL AUTO_INCREMENT,
  `CODE_PROFIL` int(2) NOT NULL,
  `CODE_MISSION` int(2) NOT NULL,
  `CODE_STATUT` int(2) NOT NULL,
  `CODE_FORMATION` int(2) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `TELEPHONE` bigint(10) DEFAULT NULL,
  `EMAIL` varchar(128) DEFAULT NULL,
  `PSEUDO` varchar(128) DEFAULT NULL,
  `MOT_DE_PASSE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`CODE_MEMBRE`),
  KEY `I_FK_MEMBRE_PROFIL` (`CODE_PROFIL`),
  KEY `I_FK_MEMBRE_MISSION` (`CODE_MISSION`),
  KEY `I_FK_MEMBRE_STATUT` (`CODE_STATUT`),
  KEY `I_FK_MEMBRE_FORMATION` (`CODE_FORMATION`),
  CONSTRAINT `FK_MEMBRE_FORMATION` FOREIGN KEY (`CODE_FORMATION`) REFERENCES `formation` (`CODE_FORMATION`),
  CONSTRAINT `FK_MEMBRE_MISSION` FOREIGN KEY (`CODE_MISSION`) REFERENCES `mission` (`CODE_MISSION`),
  CONSTRAINT `FK_MEMBRE_PROFIL` FOREIGN KEY (`CODE_PROFIL`) REFERENCES `profil` (`CODE_PROFIL`),
  CONSTRAINT `FK_MEMBRE_STATUT` FOREIGN KEY (`CODE_STATUT`) REFERENCES `statut` (`CODE_STATUT`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table actipress.membre : ~5 rows (environ)
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` (`CODE_MEMBRE`, `CODE_PROFIL`, `CODE_MISSION`, `CODE_STATUT`, `CODE_FORMATION`, `NOM`, `PRENOM`, `TELEPHONE`, `EMAIL`, `PSEUDO`, `MOT_DE_PASSE`) VALUES
	(1, 3, 1, 1, 1, 'Gerbaud', 'Guilhem', 674824715, 'gebaudguilhem@gmail.com', 'Oreste', 'azerty'),
	(3, 3, 1, 1, 1, 'Girardin', 'Killian', 684594561, 'killian.girardin500@gmail.com', 'killian', 'azerty'),
	(5, 3, 1, 1, 1, 'girardin', 'lucie', 705623598, 'lucie.girardin@gmail.com', 'lucie', 'azerty'),
	(6, 1, 1, 1, 1, 'Administrateur', 'Administrateur', 0, '111@gmail.com', 'admin', 'admin'),
	(7, 2, 1, 1, 1, 'Gestionnaire', 'Gestionnaire', 0, '222@gmail.com', 'gest', 'gest');
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;

-- Listage de la structure de la table actipress. message
CREATE TABLE IF NOT EXISTS `message` (
  `CODE_MESSAGE` int(2) NOT NULL AUTO_INCREMENT,
  `CODE_MEMBRE` int(2) NOT NULL,
  `EMETTEUR` tinytext,
  `DATE_HEURE_D_ENVOIE` datetime DEFAULT NULL,
  `LOCALISATION` tinytext,
  `SUJET` tinytext,
  `TEXT` text,
  `DATE_HEURE_DE_SUPPRESSION` datetime DEFAULT NULL,
  `ETAT` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CODE_MESSAGE`),
  KEY `I_FK_MESSAGE_MEMBRE` (`CODE_MEMBRE`),
  CONSTRAINT `FK_MESSAGE_MEMBRE` FOREIGN KEY (`CODE_MEMBRE`) REFERENCES `membre` (`CODE_MEMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table actipress.message : ~0 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table actipress. mission
CREATE TABLE IF NOT EXISTS `mission` (
  `CODE_MISSION` int(2) NOT NULL AUTO_INCREMENT,
  `LIBELLE` varchar(128) DEFAULT NULL,
  `THEME_D_ACTUALITE` varchar(128) DEFAULT NULL,
  `RECHERCHE_ANNEXE` varchar(128) DEFAULT NULL,
  `PAYS` char(32) DEFAULT NULL,
  `ADRESSE` varchar(128) DEFAULT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL,
  PRIMARY KEY (`CODE_MISSION`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table actipress.mission : ~0 rows (environ)
/*!40000 ALTER TABLE `mission` DISABLE KEYS */;
INSERT INTO `mission` (`CODE_MISSION`, `LIBELLE`, `THEME_D_ACTUALITE`, `RECHERCHE_ANNEXE`, `PAYS`, `ADRESSE`, `DATE_DEBUT`, `DATE_FIN`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `mission` ENABLE KEYS */;

-- Listage de la structure de la table actipress. profil
CREATE TABLE IF NOT EXISTS `profil` (
  `CODE_PROFIL` int(2) NOT NULL AUTO_INCREMENT,
  `RANG` char(32) DEFAULT NULL,
  `FONCTIONNALITE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`CODE_PROFIL`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table actipress.profil : ~2 rows (environ)
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` (`CODE_PROFIL`, `RANG`, `FONCTIONNALITE`) VALUES
	(1, 'Admin', NULL),
	(2, 'Gestionnaire', NULL),
	(3, 'Collaborateur', NULL);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;

-- Listage de la structure de la table actipress. statut
CREATE TABLE IF NOT EXISTS `statut` (
  `CODE_STATUT` int(2) NOT NULL AUTO_INCREMENT,
  `STATUT_MEMBRE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_STATUT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table actipress.statut : ~1 rows (environ)
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO `statut` (`CODE_STATUT`, `STATUT_MEMBRE`) VALUES
	(1, NULL);
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
