
CREATE DATABASE `rdv` /*!40100 DEFAULT CHARACTER SET utf8 */;
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

INSERT INTO `patient` (`id`, `nomComplet`, `adresse`, `telephone`, `motif`) VALUES
(1,	'Dovi Aristide',	'Liberté 5 villa 5508',	'778580286',	'sfffgs'),
(2,	'Dovi Aristide kangni',	'Liberté 5 villa 5508',	'778580286',	'edfdfd'),
(3,	'fatou thiam',	'yoff',	'776040467',	'efevfevve'),
(4,	'Rama ba',	'pc',	'772523030',	'dfsdfdf'),
(5,	'Dalan ba',	'grand Dakar',	'779990623',	'qsdfsdfsdfsqds'),
(6,	'Dalan ba',	'grand Dakar',	'778582525',	'fdqdfdsf'),
(7,	'Dalan ba',	'grand dakar',	'778754454',	'dfcdfqfqdfqf'),
(8,	'yassine diagne',	'grand yoof',	'775550220',	'fdsfdfsf'),
(9,	'diop',	'pc',	'770250202',	'zefzefzefz'),
(10,	'fatou',	'yoff',	'774000404',	'sqsdf'),
(11,	'yassine diagne',	'yoff',	'774000404',	'sqsdf'),
(12,	'yassine diagne',	'yoff',	'774000404',	'sqsdf'),
(13,	'Dovi Aristide',	'Liberté 5 villa 5508',	'778580286',	'sgefgef'),
(14,	'zdcd',	'zdfzd',	'778580286',	'dzfdzfc'),
(15,	'dsds',	'fvdf',	'778580286',	'vqsd'),
(16,	'sd',	's',	'778580286',	'svfdsv'),
(17,	'dgfd',	'f',	'778580286',	'vdfsvdv'),
(18,	'ddc',	'sds',	'778580286',	'dfdf'),
(19,	'ddc',	'sds',	'778580286',	'dfdf'),
(20,	'Dalan',	'yoof',	'770420404',	'sfsdfvsfd'),
(21,	'qfdsf',	'sdff',	'778580275',	'sqdfsd'),
(22,	'Dovi Aristide',	'Liberté 5 villa 5508',	'778580286',	'fsdqfsdf'),
(23,	'Dovi Aristide',	'Liberté 5 villa 5508',	'778580286',	'vsvsvfs'),
(24,	'vcvs',	'svdv',	'778580286',	'svsdvsd'),
(25,	'rzr',	'rfezr',	'778580267',	'ezfgefg'),
(26,	'sdds',	'sdsd',	'775200101',	'dcdcdcdc'),
(27,	'Ousmane',	'grand yoof',	'772042703',	'iugkhsfughlqfjvfiujhkgjdoigjd'),
(28,	'aristide',	'dfdf',	'778580286',	'dsfdfdfdf'),
(29,	'fatout thiam',	'liberté',	'776040467',	'fqsfsdf'),
(30,	'Dovi Aristide',	'Liberté 5 villa 5508',	'778580286',	'fe\"f\"ef\"ffff\"r'),
(31,	'Dovi Aristide',	'Liberté 5 villa 5508',	'778580286',	'ggfrfgdr');

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

INSERT INTO `rendezVous` (`id`, `dateRendezVous`, `heureRendezVous`, `priseEnCharge`, `id_patient`, `id_domaine`, `id_etat_rendez_vous`, `id_medecin`) VALUES
(1,	'2019-10-17',	'2019-10-17 15:10:20',	'dqcdfqdfdsvfsvsgvfs',	1,	3,	4,	4),
(2,	'2019-10-19',	'2019-10-19 12:10:20',	'gdgdgdgdgdgd',	2,	3,	4,	4),
(3,	'2019-10-20',	'2019-10-20 12:10:20',	'',	3,	5,	4,	0),
(4,	'2019-10-25',	'2019-10-25 14:25:00',	'',	4,	10,	4,	0),
(7,	'2019-10-18',	'2019-10-18 15:20:00',	'',	7,	5,	1,	0),
(20,	'2019-10-22',	'2019-10-22 15:00:00',	'svdvvds',	20,	3,	4,	4),
(21,	'2019-10-22',	'2019-10-22 21:00:00',	'uigiy_ujoikp\r\n',	21,	3,	4,	4),
(22,	'2019-10-22',	'2019-10-22 15:00:00',	'',	22,	9,	1,	0),
(23,	'2019-10-22',	'2019-10-22 16:00:00',	'',	23,	9,	1,	0),
(24,	'2019-10-21',	'2019-10-21 21:55:00',	'',	24,	3,	1,	0),
(25,	'2019-10-21',	'2019-10-21 23:00:00',	'',	25,	5,	1,	0),
(26,	'2019-10-21',	'2019-10-21 23:00:00',	'',	26,	10,	1,	0),
(27,	'2019-10-25',	'2019-10-25 18:40:00',	'',	27,	5,	1,	0),
(28,	'2019-10-26',	'2019-10-26 16:20:00',	'defddfd',	29,	5,	4,	9),
(29,	'2019-10-27',	'2019-10-27 19:42:00',	NULL,	30,	3,	1,	NULL),
(30,	'2019-10-30',	'2019-10-30 15:15:00',	'prise en charge avec succes',	31,	3,	4,	4);

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

-- 2019-11-01 09:34:56