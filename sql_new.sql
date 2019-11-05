-- Adminer 4.7.2 MySQL dump

--SET NAMES utf8;
--SET time_zone = '+00:00';
--SET foreign_key_checks = 0;
--SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `rdv`;
USE `rdv`;

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `domaine_service_FK` (`id_service`),
  CONSTRAINT `domaine_service_FK` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `domaine` (`id`, `libelle`, `id_service`) VALUES
(1,	'administation',	1),
(2,	'secrétariat',	2),
(3,	'Génétique',	9),
(5,	'Anatomie pathologique',	9),
(6,	'Cardiologie',	10),
(7,	'Chirurgie cardiaque',	10),
(8,	'Dermatologie',	10),
(9,	'Radiologie',	12),
(10,	'Imagerie médicale',	12),
(11,	'Pédiatrie',	10),
(12,	'Neurologie',	10),
(13,	'pharmacie',	11);

DROP TABLE IF EXISTS `employer`;
CREATE TABLE `employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomComplet` varchar(250) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `id_type_employer` int(11) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `first_login` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `employer_type_employer_FK` (`id_type_employer`),
  KEY `employer_domaine0_FK` (`id_domaine`),
  CONSTRAINT `employer_domaine0_FK` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id`),
  CONSTRAINT `employer_type_employer_FK` FOREIGN KEY (`id_type_employer`) REFERENCES `typeEmployer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `employer` (`id`, `nomComplet`, `telephone`, `email`, `password`, `adresse`, `id_type_employer`, `id_domaine`, `id_service`, `first_login`) VALUES
(2,	'Jeanne corine',	'776040467',	'fatou@gmail.com',	'fatouthiam',	'golf',	2,	2,	9,	1),
(4,	'rama ba',	'778008080',	'rama@gmail.com',	'ba1',	'pc',	3,	3,	9,	1),
(5,	'Dalan ba',	'779006060',	'dalan@gmail.com',	'dalan',	'Liberté 5 villa 5508',	2,	2,	12,	0),
(7,	'Dovi Aristide kangni',	'778580286',	'dovi.aristide@gmail.com',	'aristide2',	'Liberté 5 villa 5508',	1,	1,	1,	1),
(9,	'rama',	'770020202',	'rama@gmail.com',	'ba2',	'pc',	3,	5,	9,	1),
(10,	'moi',	'775000505',	'moi@gmail.com',	'aristide228',	'Liberté 5 villa 5508',	1,	1,	1,	1),
(11,	'antoine',	'771448212',	'antoine@gmail.com',	'antoine',	'Liberté 5 villa 5508',	1,	1,	1,	1),
(12,	'Ousmane',	'772046703',	'diengkorrou88@gmail.com',	'ousmane',	'grand yoof',	3,	11,	3,	1),
(13,	'Abdoulaye Ka',	'770803827',	'abdoulaye@gmail.com',	'abdoulaye',	'pc',	2,	2,	11,	1);

DROP TABLE IF EXISTS `etatRendezVous`;
CREATE TABLE `etatRendezVous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `etatRendezVous` (`id`, `libelle`) VALUES
(1,	'accorder'),
(2,	'reporter'),
(3,	'annuler'),
(4,	'éffectuer');

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomComplet` varchar(250) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `motif` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `planning`;
CREATE TABLE `planning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datePlanning` date NOT NULL,
  `heurePlanning` datetime NOT NULL,
  `id_employer` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `planning_employer_FK` (`id_employer`),
  CONSTRAINT `planning_employer_FK` FOREIGN KEY (`id_employer`) REFERENCES `employer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rendezVous`;
CREATE TABLE `rendezVous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateRendezVous` date NOT NULL,
  `heureRendezVous` datetime NOT NULL,
  `priseEnCharge` text,
  `id_patient` int(11) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_etat_rendez_vous` int(11) NOT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rendez_vous_patient_FK` (`id_patient`),
  KEY `rendez_vous_etat_rendez_vous1_FK` (`id_etat_rendez_vous`),
  KEY `id_domaine` (`id_domaine`),
  CONSTRAINT `rendezVous_ibfk_1` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id`),
  CONSTRAINT `rendez_vous_etat_rendez_vous1_FK` FOREIGN KEY (`id_etat_rendez_vous`) REFERENCES `etatRendezVous` (`id`),
  CONSTRAINT `rendez_vous_patient_FK` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `service` (`id`, `libelle`) VALUES
(1,	'administation'),
(2,	'secrétariat'),
(9,	'Laboratoires'),
(10,	'Service médicaux'),
(11,	'Pharmaceutiques'),
(12,	'Imagerie');

DROP TABLE IF EXISTS `typeEmployer`;
CREATE TABLE `typeEmployer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `typeEmployer` (`id`, `libelle`) VALUES
(1,	'admin'),
(2,	'secretaire'),
(3,	'médecin');

-- 2019-11-01 09:32:49