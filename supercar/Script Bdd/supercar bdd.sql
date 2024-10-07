-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 sep. 2024 à 04:44
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `supercar`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
CREATE TABLE IF NOT EXISTS `accueil` (
  `id_partie` int NOT NULL,
  `titre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `texte` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bouton` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_partie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accueil`
--

INSERT INTO `accueil` (`id_partie`, `titre`, `texte`, `video`, `img`, `img2`, `bouton`) VALUES
(0, 'SUPERCAR', '', 'route.mp4', '', '', 'DEMANDE D\'ESSAI'),
(1, ' Votre Destination Automobile de reve', 'Chez Supercar, notre passion pour l\'automobile va au-delà de la simple vente de voitures. <br>\r\n                        Nous nous engageons à offrir à nos clients une expérience exceptionnelle, de l\'achat initial aux services après-vente incomparables. <br>\r\n                        En tant que leader incontesté dans l\'industrie automobile, nous redéfinissons les normes en matière de qualité, de performance et de service.', 'accueil-dm.mp4\r\n', '', '', ''),
(2, 'Nos Voitures d\'exception ', 'Parcourez notre showroom exclusif où l\'élégance rencontre la puissance. <br>\r\n                        Super Car vous propose une sélection méticuleusement choisie de voitures de prestige, <br>\r\n                        des bolides emblématiques aux véhicules de luxe les plus récents. Chaque modèle incarne l\'innovation, <br>\r\n                        la technologie de pointe et le design avant-gardiste. Chez Super Car, la perfection ne fait pas que se conduire, elle se ressent.', '', '', '', ''),
(3, 'MERCEDES, CHEZ SUPERCAR', 'Mercedes-Benz, une icône intemporelle de l\'élégance et du raffinement, incarne depuis plus d\'un siècle le summum du luxe et de l\'ingénierie automobile. <br>\r\n                        Fondée en 1926, cette marque allemande évoque un héritage de prestige et d\'innovation, symbolisant le mariage parfait entre tradition et modernité. <br>\r\n                        Avec ses lignes gracieuses, ses performances inégalées et son souci méticuleux du détail, <br>\r\n                        chaque modèle Mercedes-Benz offre une expérience de conduite empreinte de sophistication et de confort. <br>\r\n                        En tant que pionnier de nombreuses avancées technologiques, Mercedes-Benz continue d\'établir de nouveaux standards d\'excellence, <br>\r\n                        guidant ses conducteurs vers un monde où le luxe et la performance se fondent harmonieusement pour créer une expérience inoubliable sur la route.', 'mercedes-accueil.mp4\r\n', '', '', 'VOIR MERCEDES'),
(4, 'BMW, CHEZ SUPERCAR', 'BMW, symbole d\'excellence et d\'innovation dans l\'industrie automobile, incarne depuis des décennies la quintessence du luxe et de la performance. <br>\r\n                        Fondée en 1916, cette marque allemande a su conquérir le cœur des passionnés de conduite à travers le monde grâce à ses véhicules élégants, puissants et technologiquement avancés. <br>\r\n                        Avec un héritage riche en histoire et une vision tournée vers l\'avenir, BMW continue de repousser les limites de l\'ingénierie automobile, <br>\r\n                        offrant à ses conducteurs une expérience de conduite incomparable où chaque virage devient une invitation à l\'exaltation.', 'bmw-acc.mp4\r\n', '', '', 'VOIR BMW'),
(5, 'PORSCHE, CHEZ SUPERCAR', 'Porsche, une légende vivante dans le monde de l\'automobile, incarne l\'essence même de la passion et de la performance depuis sa fondation en 1931. <br>\r\n                        Symbole de sophistication et d\'excellence, cette marque allemande évoque un héritage de course automobile inégalé, <br>\r\n                        forgé par des décennies de succès sur les circuits les plus prestigieux. Chaque véhicule Porsche est le fruit d\'un artisanat méticuleux et d\'une ingénierie de pointe, <br>\r\n                        offrant une expérience de conduite incomparable où chaque virage devient une fusion parfaite entre puissance, précision et adrénaline. À la croisée entre tradition et innovation,<br>\r\n                            Porsche continue de repousser les limites de l\'ingéniosité technique, inspirant les conducteurs à vivre leur passion au volant d\'une voiture conçue pour exceller sur route comme sur piste.', 'porsche-acc.mp4\r\n', '', '', 'VOIR PORSCHE'),
(6, 'AUDI, CHEZ SUPERCAR', 'Audi, synonyme d\'élégance et d\'avant-garde dans l\'univers automobile, captive les esprits depuis sa fondation en 1909 en Allemagne. <br>\r\n                        Cette marque prestigieuse incarne une fusion parfaite entre design innovant, technologie de pointe et performances remarquables. <br>\r\n                        Chaque modèle Audi est le fruit d\'un savoir-faire exceptionnel et d\'une passion pour l\'excellence, offrant aux conducteurs une expérience <br>\r\n                        de conduite incomparable où le luxe se marie à la performance. Avec un héritage riche en succès sur les circuits de course et une présence dominante sur les routes du monde entier, <br>\r\n                        Audi continue de repousser les limites de l\'ingénierie automobile, façonnant ainsi l\'avenir de la mobilité avec audace et détermination.', 'audi-acc.mp4\r\n', '', '', 'VOIR AUDI'),
(7, 'DES EVENEMENTS, CHEZ SUPERCAR', 'Sentez-vous cette électricité dans l\'air, cette palpitation qui annonce une expérience hors du commun ? <br>\r\n                        Bienvenue dans l\'univers envoûtant d\'un carmeet organisé, où chaque moteur vrombissant résonne comme une symphonie de passion et de puissance. <br>\r\n                        Imaginez-vous entouré des plus prestigieuses supercars, alignées telles des œuvres d\'art vivantes,<br>\r\n                         chacune racontant sa propre histoire de vitesse et de luxe.', '', 'image1.jpg', 'image2.jpg', 'PLUS D\'INFOS'),
(8, ' NOTRE HISTOIRE', 'Notre histoire débute avec une simple idée : offrir aux amateurs de voitures une opportunité unique d\'essayer les modèles les plus prestigieux du marché,\r\n                        dans le confort de leur propre vie. C\'est ainsi qu\'est née Supercar. Guidés par notre amour pour les marques emblématiques telles que Porsche,\r\n                        BMW, Audi et Mercedes, nous nous sommes engagés à créer une plateforme qui incarne le luxe, la performance et l\'innovation.', '', '', '', ''),
(9, 'NOTRE MISSION', 'Chez Supercar, nous croyons que chaque passionné d\'automobile mérite de vivre l\'émotion pure de conduire des véhicules d\'exception.\r\n                        Notre mission est donc de rendre cette expérience accessible à tous, en mettant à disposition notre sélection exclusive de voitures\r\n                        de rêve pour des essais sur mesure.', '', '', '', ''),
(10, 'NOTRE ENGAGEMENT', 'En tant qu\'entrepreneurs, nous sommes animés par l\'ambition de toujours dépasser les attentes.\r\n                        C\'est pourquoi nous nous engageons à offrir à nos clients un service irréprochable, une transparence\r\n                        totale et une expérience inoubliable à chaque étape de leur parcours avec nous. De la réservation en ligne\r\n                        à la livraison de la voiture à votre porte, nous mettons tout en œuvre pour rendre votre essai aussi simple et agréable que possible.', '', '', '', ''),
(11, 'milieu entre qsn et rendez vous ', 'Rejoignez-nous chez Supercar et découvrez le plaisir de conduire les voitures de vos rêves, avec passion et authenticité !', '', '', '', ''),
(12, 'Notre Équipe à Votre Service', 'Notre équipe dévouée chez Super Car ne se contente pas de vendre des voitures ; \r\n                        elle construit des relations durables. Nos experts vous guideront à travers chaque étape du processus d\'achat, \r\n                        en s\'assurant que vous trouviez le véhicule parfait pour correspondre à votre style de vie. \r\n                        Notre engagement envers la transparence et l\'intégrité garantit une expérience d\'achat en toute confiance.', '', 'conclure.jpg', '', 'RENDEZ-VOUS'),
(13, 'QUI SOMMES NOUS ?', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_admin` int NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_admin`, `identifiant`, `mot_de_passe`, `date`) VALUES
(1, 'dshaan', '15112005', '2024-03-17 20:00:00'),
(3, 'msteve', '12345', '2024-03-17 20:00:00'),
(6, 'rmahery', '54321', '2024-03-17 20:00:00'),
(7, 'mouzafar2.0', '0000', '2024-03-26 20:00:00'),
(8, 'nasser', '4321', '2024-03-26 20:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `client_inscrit`
--

DROP TABLE IF EXISTS `client_inscrit`;
CREATE TABLE IF NOT EXISTS `client_inscrit` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `e_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mots_de_passe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `confirmation_mots_de_passe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_client` date DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client_inscrit`
--

INSERT INTO `client_inscrit` (`id_client`, `nom`, `prenom`, `nom_utilisateur`, `e_mail`, `mots_de_passe`, `confirmation_mots_de_passe`, `date_client`) VALUES
(1, 'Da Encarnacao', 'Shaan', 'shaan15', 'shaan@gmail.com', '123456789', '123456789', '2024-02-22'),
(2, 'Freecs', 'Gon', 'gonf', 'gonfreecs@gmail.com', '12345678', '12345678', '2024-02-29'),
(5, 'Mirija', 'Steve', 'mouzafar', 'mouz@gmail.com', '12', '12', '2024-03-04');

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `id_evenement` int NOT NULL,
  `id_voiture` int NOT NULL,
  PRIMARY KEY (`id_evenement`,`id_voiture`),
  KEY `id_voiture` (`id_voiture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `sexe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_contact` date DEFAULT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `sexe`, `nom`, `prenom`, `email`, `message`, `date_contact`) VALUES
(1, 'homme', 'Da Encarnacao', 'Shaan', 'shaan@gmail.com', 'je teste ', '2024-02-22'),
(2, 'homme', 'Da', 'Shaan', 'shaan@gmail.com', 'bonjour', '2024-02-29');

-- --------------------------------------------------------

--
-- Structure de la table `demande_essai`
--

DROP TABLE IF EXISTS `demande_essai`;
CREATE TABLE IF NOT EXISTS `demande_essai` (
  `id_demande_essai` int NOT NULL AUTO_INCREMENT,
  `date_demande` date DEFAULT NULL,
  `nom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_modele` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `heure_arriver` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'en attente',
  PRIMARY KEY (`id_demande_essai`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_essai`
--

INSERT INTO `demande_essai` (`id_demande_essai`, `date_demande`, `nom_utilisateur`, `nom_modele`, `heure_arriver`, `etat`) VALUES
(3, '1212-12-12', 'mouzafar', 'Mercedes-Benz C63s', '21:21', 'terminer'),
(4, '2024-12-12', 'shaan15', 'Mercedes-Benz', '12:12', 'terminer'),
(9, '2024-03-02', 'mouzafar', 'Porsche 911 gt2 rs', '16:50', 'terminer'),
(27, '2024-04-10', 'mouzafar', 'Porsche 911 Carrera s', '07:08', 'terminer'),
(28, '2024-05-31', 'mouzafar', 'BMW X6m', '15:30', 'terminer');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id_evenement` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_evenement` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `lieu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_voiture` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id_evenement`, `titre`, `date_evenement`, `heure`, `lieu`, `type_voiture`, `description`, `photo`) VALUES
(1, '\"CarMeet de Prestige à Grand Baie\" ', '2024-04-02', '15:56:00', 'Grand Baie, Île Maurice', 'Porsche, BMW, Audi, Mercedes', 'Rejoignez-nous pour un CarMeet exclusif à Grand Baie, l\'une des destinations les plus prisées de l\'île Maurice. Sur fond de palmiers et de lagon turquoise, découvrez les joyaux de l\'automobile de luxe avec les marques renommées telles que Porsche, BMW, Audi et Mercedes. Imprégnez-vous de l\'atmosphère élégante et décontractée de l\'île tout en admirant les lignes racées et les performances impressionnantes de ces bolides d\'exception. Un événement à ne pas manquer pour les passionnés de voitures et les amoureux de vacances tropicales.', 'images/image4.jpg'),
(2, '\"Exposition de BMW : Rassemblement de Luxe à Bell', '2024-05-01', '00:17:00', 'Belle Mare, Île Maurice', 'BMW', '          Joignez-vous à nous pour un CarMeet exclusif à Belle Mare, sur la côte Est de l\'île Maurice. \n                    Venez admirer les modèles emblématiques de BMW dans un cadre tropical enchanteur. \n                    Plongez-vous dans l\'univers de l\'automobile de luxe sous le soleil radieux de Maurice, \n                    où la beauté naturelle se marie à la sophistication mécanique. \n                    Ne manquez pas cette occasion unique de découvrir les voitures les plus prestigieuses dans un cadre paradisiaque. \n', 'images/road-trip-BMW.jpg'),
(3, '\"CarMeet de Luxe à l Île Maurice : Tamarin en Vede', '2024-05-31', '09:00:00', 'Plage de Tamarin, Île Maurice', 'Audi', '                    Découvrez l\'élégance automobile sur la plage de Tamarin lors de notre CarMeet exclusif. \n                    Les bolides prestigieux Audi se réuniront pour une journée ensoleillée \n                    placée sous le signe de la sophistication mécanique. Rejoignez-nous pour une expérience unique, \n                    où le sable fin rencontre la puissance luxueuse des voitures de prestige. Une journée inoubliable de \n                    vrombissements moteurs et de style raffiné dans le cadre enchanteur de l\'île Maurice.\n', 'images/audi.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_marque` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom_marque`, `description_marque`) VALUES
(1, 'BMW', 'Supercar vous invite à plonger dans l\'univers incomparable de BMW, où la passion pour la conduite se traduit par des lignes dynamiques, une technologie de pointe et une performance inégalée. Chaque modèle BMW offre une fusion harmonieuse entre luxe et agilité, redéfinissant ainsi l\'expérience de conduite ultime.'),
(2, 'Mercedes', 'Explorez le sommet du luxe automobile avec les voitures Mercedes-Benz chez Supercar. L\'élégance intemporelle rencontre la performance de pointe dans chaque modèle. Conduisez avec style et raffinement, tandis que la qualité artisanale et les technologies de pointe se combinent pour créer une expérience de conduite incomparable.'),
(3, 'Audi', 'Laissez-vous séduire par l\'alliance parfaite entre design avant-gardiste et technologie de pointe avec Audi. Super Car met à votre disposition une sélection impressionnante de voitures où le luxe raffiné rencontre l\'innovation intelligente. Vivez une expérience de conduite exceptionnelle avec les modèles Audi, où chaque détail est une expression de perfection.'),
(4, 'Porsche', 'Sentez l\'adrénaline à chaque virage avec les légendaires voitures de sport de Porsche. Super vous propose une gamme exclusive de modèles qui capturent l\'essence de la performance pure. Des lignes sculpturales à la puissance brutale du moteur, chaque Porsche incarne l\'émotion et l\'excitation de la conduite à son paroxysme.');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id_modele` int NOT NULL AUTO_INCREMENT,
  `nom_modele` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_marque` int NOT NULL,
  PRIMARY KEY (`id_modele`),
  KEY `id_marque` (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`id_modele`, `nom_modele`, `id_marque`) VALUES
(1, 'BMW X6m', 1),
(2, 'BMW M8', 1),
(3, 'BMW M5', 1),
(4, 'BMW M2', 1),
(5, 'Mercedes AMG GTS', 2),
(6, 'Mercedes C63s', 2),
(7, 'Mercedes G63', 2),
(8, 'Mercedes GLE 63', 2),
(9, 'Audi RS6', 3),
(10, 'Audi RS3', 3),
(11, 'Audi RS5', 3),
(12, 'Audi Q8', 3),
(13, 'Porsche 911 gt2 rs', 4),
(14, 'Porsche 718 gt4 rs', 4),
(15, 'Porsche Cayenne s', 4),
(16, 'Porsche 911 Carrera s', 4);

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id_voiture` int NOT NULL AUTO_INCREMENT,
  `id_modele` int NOT NULL,
  `marque` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_modele` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `annee` int NOT NULL,
  `transmission` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sieges` int NOT NULL,
  `prix` int NOT NULL,
  `vitesse_max` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `moteur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `consommation` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `puissance` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `photo_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `photo_3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `photo_4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_voiture`),
  KEY `id_modele` (`id_modele`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id_voiture`, `id_modele`, `marque`, `nom_modele`, `annee`, `transmission`, `sieges`, `prix`, `vitesse_max`, `moteur`, `consommation`, `puissance`, `description`, `photo_1`, `photo_2`, `photo_3`, `photo_4`) VALUES
(1, 1, 'BMW', 'BMW X6m', 2022, 'Automatique', 5, 139000, '305km/h', 'xDrive50i 8 cylindres', '15 L/100', '625 Chevaux', 'La BMW X6 incarne l\'alliance parfaite entre puissance dynamique et design sophistiqué, redéfinissant l\'élégance automobile avec sa silhouette audacieuse et ses lignes aérodynamiques, et propulsant son SUV sportif grâce à une motorisation haute performance.', 'https://www.edmunds.com/assets/m/for-sale/d6-5ymcy0c01p9p78516/img-1-600x400.jpg', 'https://static0.carbuzzimages.com/wordpress/wp-content/uploads/gallery-images/original/633000/200/633286.jpg', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhANzVGXEsCKpRJd3PMVPgSc3WSPg8pK7k3RoCgENvhmbqKmQTKK08ba1U76nG8rfjMp6dN94_eJ3zhPQcDMacX96fwGxZyV_SxEPz-dYSWz_FTtVcIcqPPww9VZVdV9T7Yu937IjKHijvF/s2048/BMW-X6-M-2022-Brasil+%25281%2529.jpg', 'https://www.topgear.com/sites/default/files/cars-car/carousel/2019/10/134_bmw_x6_m50i.jpg'),
(2, 2, 'BMW', 'BMW M8', 2022, 'Automatique', 4, 164, '320km/h', 'V8 Biturbo 4.4L', '15 L/100', '617 Chevaux', 'La BMW M8, propulsée par un moteur V8 TwinPower Turbo délivrant environ 600 chevaux, offre une puissance remarquable. Cette berline sportive accelère de 0 à 100 km/h en seulement 3,2 secondes, grâce à un couple impressionnant de 750 Newton-mètre.', 'https://bringatrailer.com/wp-content/uploads/2023/08/2022_bmw_m8-competition-gran-coupe_img_3889-7-60134.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdAsIRgfJL2ZAVbjzaRAkKBx3MHUN6rxK3bw&s', 'https://www.bmw.mu/content/dam/bmw/common/all-models/m-series/m8-gran-coupe/2022/onepager/bmw-m8-gran-coupe-onepager-gallery-m8-gc-wallpaper-04.jpg.asset.1638370186011.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbfCNoHMOb51xV5yCeBp7POaOxIQGHNOL-2g&s'),
(3, 3, 'BMW', 'BMW M5', 2022, 'Automatique', 5, 132, '305km/h', 'V8 Biturbo 4.4L', '14L/100', '617 Chevaux', 'La BMW M5 F90 est propulsée par un puissant moteur V8 TwinPower Turbo, offrant une puissance impressionnante d\'environ 600 chevaux. Cette berline sportive atteint une accélération de 0 à 100 km/h en seulement 3,4 secondes, grâce à son couple robuste.', 'https://www.usnews.com/object/image/00000182-a537-dc41-a1db-a57f29600000/M5CS_1.jpg?update-time=&size=responsive640', 'https://www.topgear.com/sites/default/files/cars-car/carousel/2020/10/p90403645_highres_bmw-m5-competition.jpg', 'https://media.ed.edmunds-media.com/bmw/m5-cs/2022/oem/2022_bmw_m5-cs_sedan_base_shf_oem_1_300.jpg', 'https://o.aolcdn.com/images/dims3/GLOB/legacy_thumbnail/1600x900/format/jpg/quality/85/https://s.aolcdn.com/os/ab/_cms/2021/11/04112250/M5CS_CT3_1594.jpg'),
(4, 4, 'BMW', 'BMW M2', 2022, 'Automatique', 4, 66, '270km/h', 'L6 3.0L', '11L/100', '405 Chevaux', 'La BMW M2 incarne l\'esprit de conduite dynamique dans un format agile. Sous son capot se trouve un moteur six cylindres en ligne TwinPower Turbo, délivrant une puissance d\'environ 410 chevaux. Cette sportive offre une accélération remarquable de 0 à 100 km/h en seulement 4,2 secondes, offrant une expérience de conduite excitante et réactive.', 'https://image-cdn.hypb.st/https%3A%2F%2Fhypebeast.com%2Fimage%2F2022%2F02%2Fmanhart-mh2-630-bmw-m2-competition-track-car-tuned-roll-cage-germany-0.jpg?w=960&cbr=1&q=90&fit=max', 'https://mediapool.bmwgroup.com/cache/P9/202209/P90481832/P90481832-the-all-new-bmw-m2-interieur-10-2022-2249px.jpg', 'https://www.bmw.co.za/content/dam/bmw/common/all-models/m-series/m2-coupe/2022/Highlights/bmw-m-series-m2-coupe-gallery-image-impressions-04_890.jpg', 'https://media.evo.co.uk/image/private/s--lsikaO7P--/f_auto,t_content-image-full-mobile@1/v1665499714/evo/2022/10/UWE_1078_01_u3qxkf.jpg'),
(5, 5, 'MERCEDES ', 'MERCEDES AMG GTS', 2022, 'Automatique', 2, 162, '310km/h', 'V8 Biturbo 4.0L', '13L/100', '522 Chevaux', 'La Mercedes AMG GT S allie passion automobile et ingénierie de pointe avec ses lignes sculpturales et son allure agressive. Propulsée par un moteur V8 biturbo, elle redéfinit les standards de l\'élégance et de la performance, offrant une expérience de conduite dynamique et palpitante.', 'https://di-uploads-pod3.dealerinspire.com/fletcherjonesmbnewport/uploads/2022/12/AMG-GT-Overview-Engine-Power-Mobile.jpg', 'https://images.carexpert.com.au/resize/3000/-/app/uploads/2021/11/2022-Mercedes-AMG-GT-Black-Series-Review-9.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyJq4q_TTtwE571s5ZeJiggugOO2nCt90K1g&s', 'https://di-uploads-pod3.dealerinspire.com/fletcherjonesmbnewport/uploads/2021/12/2022_GT-4-Door_MLP_Performance_Mobile-Engine.jpg'),
(6, 6, 'MERCEDES ', 'MERCEDES C63s', 2022, 'Automatique', 5, 108, '290km/h', 'V8 Biturbo 4.0L', '12L/100', '503 Chevaux', 'La Mercedes C63 S incarne l\'essence même de la performance automobile. Son design dynamique et ses courbes élégantes lui confèrent une présence impressionnante sur la route. Sous son capot se cache un moteur V8 biturbo, délivrant une puissance impressionnante qui propulse cette berline sportive vers des performances exceptionnelles.', 'https://cdn.motor1.com/images/mgl/xqZRMk/s3/2024-mercedes-amg-c63-s-e-performance-exterior.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE2PeeKQ_y1S9Ak8SRPeRdT-P66arUi2zHmA&s', 'https://images.carexpert.com.au/resize/3000/-/app/uploads/2021/09/Mercedes-AMG-C63-S3368.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzjoPLaXPvzvroKwBWRhcfB5wi20KyiX4Xmg&s'),
(7, 7, 'MERCEDES ', 'MERCEDES G63', 2022, 'Automatique', 5, 187, '240km/h', 'V8 Biturbo 4.0L', '16L/100', '577 Chevaux', 'Le Mercedes G63 est bien plus qu\'un simple SUV, c\'est une icône de la route. Son design robuste et sa silhouette imposante incarnent la puissance et la présence. Doté d\'un moteur V8 biturbo, le G63 offre des performances impressionnantes qui défient les terrains les plus exigeants, faisant de lui un véhicule tout-terrain de premier choix pour les passionnés d\'aventure.', 'https://www.motortrend.com/uploads/2022/02/2022-Mercedes-Benz-G-Class-AMG-G63-22.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5STwGyiCOr9C62rcHC83CuIsoGdAylIWHtQ&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQym_lRQzJvGJgkVxVE_gToMMjmMT0zbASJLQ&s', 'https://hips.hearstapps.com/hmg-prod/images/mercedes-amg-gle-63-s-41-source-1628986485.jpg'),
(8, 8, 'MERCEDES ', 'MERCEDES GLE 63', 2022, 'Automatique', 5, 132, '280km/h', 'V8 Biturbo 4.0L', '14L/100', '603 Chevaux', 'Le Mercedes GLE 63 associe le confort d\'un SUV haut de gamme à la performance d\'une voiture de sport. Son design élégant et ses lignes dynamiques attirent tous les regards. Sous son capot se trouve un moteur V8 biturbo, offrant un mélange parfait de puissance et de raffinement, assurant des performances exceptionnelles sur la route.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6pTYtdABtvgqNwooTqIcbHIIntrnxGKD1Dg&s', 'https://friendscarrental.com/frontend/image/mercedes-amg-gle-63s-2022-1713162891947.jpg', 'https://i.ytimg.com/vi/DnVaK-T0YbU/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCpx8jjvZo6zX_ovtj6W4VMHOKkeg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScjvyemth00O-Hg0ftfNKowmhT7HrqK1PG6A&s'),
(9, 9, 'AUDI ', 'AUDI RS6', 2022, 'Automatique', 5, 133, '305km/h', 'V8 Biturbo 4.0L TFSI', '14L/100', '630 Chevaux', 'La Audi RS6 incarne la fusion parfaite entre élégance luxueuse et performances exceptionnelles au sein de la gamme RS. Animée par un moteur V8 biturbo TFSI de 4.0 litres, cette sportive polyvalente délivre une puissance impressionnante de plus de 600 chevaux, offrant une expérience de conduite dynamique et exaltante.', 'https://cdn.motor1.com/images/mgl/jboxl/s3/audi-rs6-avant-by-mansory-and-mtm.jpg', 'https://hips.hearstapps.com/hmg-prod/images/2022-audi-rs6-avant-mmp-3-1620074142.jpg', 'https://cdn.motor1.com/images/mgl/VzzwO9/s3/2022-audi-rs6-avant.webp', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCPeKZgjVCttkC0Df-s7tU3fB83xy5bhihIA&s'),
(10, 10, 'AUDI ', 'AUDI RS3', 2022, 'Automatique', 5, 69, '280km/h', 'L5 2.5L', '10L/100', '400 Chevaux', 'La Audi RS3 incarne l\'alliance entre agilité, puissance et sophistication dans une compacte sportive de haute performance. Propulsée par un moteur cinq cylindres turbocompressé, elle délivre une puissance impressionnante d\'environ 400 chevaux, offrant une expérience de conduite dynamique et passionnante.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgz09l3jpRZ67hqyqeLsYiC7Ch7DMwFOxnaA&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0GopJON4pWBTwTpZ9XH5oj5tKv6LK57MeGg&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeXiRtXuZc3CGZMLNdkHU-O1BsfMoKWO-5ww&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTb8rJr-vsySQH1PoYSEPHue0cPkbvm0thRuQ&s'),
(11, 11, 'AUDI ', 'AUDI RS5', 2022, 'Automatique', 5, 86, '300km/h', 'V6 Biturbo 2.9L', '11L/100', '450 Chevaux', 'La Audi RS5 incarne l\'excellence en matière de performance, alliant puissance brute, élégance et technologie de pointe. Animée par un moteur V6 biturbo, la RS5 délivre une puissance impressionnante de plus de 450 chevaux, offrant des performances dynamiques incomparables sur la route.', 'https://media.carsandbids.com/cdn-cgi/image/width=2080,quality=70/7a0a3c6148108c9c64425dd85e0181fa3cccb652/photos/rEjP6VxV-CVyzLSaDKB-(edit).jpg?t=169611065807', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOibXs0wQJULd-3xt9UcJvCShRDWhP-iwfNw&s', 'https://hips.hearstapps.com/autoweek/assets/s3fs-public/2019-rs-5-sportback-2018-new-york-international-auto-show-4005.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcoGw6bv0yHbnFb6iDilv9ki5o4NkBYpffXw&s'),
(12, 12, 'AUDI ', 'AUDI Q8', 2022, 'Automatique', 5, 146, '305km/h', 'V8 Biturbo 4.0L', '14L/100', '592 Chevaux', 'L\'Audi RS Q8 incarne le summum du luxe et de la performance dans le segment des SUV. Animé par un puissant moteur V8 biturbo dépassant les 600 chevaux, il offre des performances exceptionnelles, avec une accélération de 0 à 100 km/h en environ 3,8 secondes, combinant puissance brute et élégance sophistiquée pour une expérience de conduite inégalée.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt9O7sp2AkXpV1DjNwp7B9rfQ1qNiNkgDyIQ&s', 'https://hips.hearstapps.com/hmg-prod/images/2019-audi-q8-280-1544802618.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnsZ3-TN0Q1oS2SkCpsF9alL50sO0tJgtxZg&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxECFF1wXjTMU8qQhHym3U_IJJssz79EKr7g&s'),
(13, 13, 'PORSCHE ', 'PORSCHE 911 gt2 rs', 2022, 'Automatique', 2, 311, '340km/h', 'Flat-6 Biturbo 3.8L', '15L/100', '700 Chevaux', 'La Porsche 911 GT2 RS, une supercar emblématique, incarne la performance ultime et l\'ingénierie de pointe. Animée par un moteur flat-six biturbo, elle développe une puissance impressionnante de plus de 700 chevaux. Cette bête de piste offre des performances inégalées, propulsant de 0 à 100 km/h en moins de 3 secondes, démontrant ainsi l\'engagement de Porsche envers l\'excellence et l\'innovation dans le monde de l\'automobile.', 'https://cdn.motor1.com/images/mgl/XkqEV/s1/porsche-911-gt2-rs-clubsport-25.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8QayIDj4--wZrlLgDTPJfADv11fhhU2OYQQ&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjw4YXm3L4MFakMvRvF3Dcj-HdGDPs38yO2w&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMGQkIPIWNBEpShHYleK0vwBuW2Oq0MoF6ug&s'),
(14, 14, 'PORSCHE ', 'PORSCHE 718 gt4 rs', 2022, 'Automatique', 2, 136, '304km/h', 'Flat-6 4.0L', '12L/100', '500 Chevaux', 'La Porsche 718 Cayman GT4 RS incarne l\'essence même de la conduite sportive. Son design agressif et ses performances de haut niveau redéfinissent les standards de la performance sur piste. Dotée d\'un moteur atmosphérique flat-six, cette voiture offre une expérience de conduite pure et dynamique, exprimant la passion de Porsche pour l\'ingénierie et le plaisir de conduire.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZt43_ruA1ylLF9vqvvgJdSPVUBWgIVgnlfg&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqm1QLHwGeZ1SNPNKUGgU_5dQj2BzPNdUENg&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSePc7ZEmEEcaGprKwLGEFz4u_1byn2Sk1QhA&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRbt8zrevAp-qZ3nYex6SW4DKM9Q19BC6rug&s'),
(15, 15, 'PORSCHE ', 'PORSCHE Cayenne s', 2022, 'Automatique', 5, 97, '265km/h', 'V6 Biturbo 2.9L', '12L/100', '434 Chevaux', 'Le Porsche Cayenne S incarne le mariage entre le luxe et la performance au sein de la gamme des SUV sportifs du constructeur allemand. Sous le capot de ce modèle se trouve généralement un moteur V6 biturbo, délivrant une puissance remarquable pour une expérience de conduite dynamique et raffinée.', 'https://www.motortrend.com/uploads/2022/02/2022-Porsche-Cayenne-Turbo-GT-Coupe-PVOTY22-21.jpg', 'https://media.ed.edmunds-media.com/porsche/cayenne/2022/fd/2022_porsche_cayenne_dsh_fd_724211_1600.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPHRkT4LDVlr9KF-9sLzwEeEoCUBTrplvYOA&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaS7qEhDc1GIE91ztrV2gZdvL82OJOCbij8g&s'),
(16, 16, 'PORSCHE ', 'PORSCHE 911 Carrera s', 2022, 'Automatique', 4, 131, '308km/h', 'Flat-6 3.0L', '10L/100', '450 Chevaux', 'La Porsche 911 Carrera S est une icône de l\'automobile, incarnant le mariage exceptionnel entre la performance sportive et l\'élégance. Sous le capot arrière de cette légende se trouve un moteur six cylindres à plat, généralement turbocompressé, délivrant des performances extraordinaires et un son distinctif, faisant de chaque trajet une expérience inoubliable.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMZqXDaBnHMkeqq03_Qkv5YOhRucLwJrNTvg&s', 'https://press.porsche.com/download/prod/presse_pag/PressBasicData.nsf/Download?OpenAgent&attachmentid=1494111', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpVFmX60fxSyBrI9EVqJ43IPG14RtPFtA-qw&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2OiVDcQIL-km2lCfbgQVG_HyjQ9kkTnrw1g&s');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `concerner_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`id_evenement`);

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`);

--
-- Contraintes pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD CONSTRAINT `voitures_ibfk_1` FOREIGN KEY (`id_modele`) REFERENCES `modele` (`id_modele`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
