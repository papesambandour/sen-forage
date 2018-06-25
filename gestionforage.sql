-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 25 juin 2018 à 13:00
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionforage`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `idabonnement` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` text NOT NULL,
  `id_client` int(11) NOT NULL,
  `etat_abonnement` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`idabonnement`, `numero`, `date_creation`, `description`, `id_client`, `etat_abonnement`) VALUES
(1, 1, '2018-06-06 22:36:03', 'Ipem upso cotrat d\'abonnement Ipem upso cotrat d\'abonnement Ipem upso cotrat d\'abonnement Ipem upso cotrat d\'abonnement Ipem upso cotrat d\'abonnement Ipem upso cotrat d\'abonnement Ipem upso cotrat d\'abonnement ', 1, 1),
(2, 2, '2018-06-15 21:26:48', 'Contrat d\'abonnement de ameth thiaré 							', 19, 1),
(7, 2, '2018-06-15 21:28:00', 'Contrat dàbonnement pour modou Faye', 20, 1),
(8, 3, '2018-06-15 21:45:20', 'Abonnement Darou sene', 22, 1),
(9, 4, '2018-06-15 22:10:49', 'Contrat pour moussa ndour Contrat pour moussa ndour Contrat pour moussa ndour Contrat pour moussa ndour Contrat pour moussa ndour Contrat pour moussa ndour Contrat pour moussa ndour Contrat pour moussa ndour ', 11, 1),
(10, 5, '2018-06-15 22:28:02', 'Contrat pour mame diarra fal Contrat pour mame diarra fal Contrat pour mame diarra fal Contrat pour mame diarra fal Contrat pour mame diarra fal Contrat pour mame diarra fal Contrat pour mame diarra fal Contrat pour mame diarra fal ', 23, 1),
(11, 6, '2018-06-15 22:38:35', 'Contrat d\'abonnement pour Youssou Niaye Contrat d\'abonnement pour Youssou Niaye Contrat d\'abonnement pour Youssou Niaye Contrat d\'abonnement pour Youssou Niaye Contrat d\'abonnement pour Youssou Niaye ', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `nomcomplet` varchar(50) NOT NULL,
  `estabonne` int(1) NOT NULL DEFAULT '0',
  `tel` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `etat_client` int(1) NOT NULL DEFAULT '1',
  `id_chefvillage` int(11) DEFAULT NULL,
  `id_village` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nomcomplet`, `estabonne`, `tel`, `adresse`, `etat_client`, `id_chefvillage`, `id_village`) VALUES
(1, 'Pape Samba Ndour', 1, '0777293282', 'Foire rue 24', 1, 11, 1),
(2, 'Youssou Ndiaye', 1, '0777293282', 'Foire rue 29', 1, NULL, 2),
(3, 'Baba Dieng', 0, '777688766', 'Kaon', 1, NULL, 3),
(4, 'Mamadou Niang', 0, '775643543', 'Dakar 2', 1, NULL, 4),
(5, 'Fatou Fall', 0, '0777293282', 'Foire rue 29', 1, NULL, 5),
(6, 'Ameth Mbodj', 0, '776545665', 'Kamp ba', 1, NULL, 11),
(7, 'Samba Ndour', 0, '773435490', 'Wardiakhal', 1, NULL, 12),
(8, 'Babou Ba', 0, '0777293282', 'Foire rue 29', 1, 8, 13),
(9, 'Prince Ndao', 0, '0777293282', 'Foire rue 29', 1, NULL, 14),
(10, 'Youssou Diallo', 0, '0777293282', 'Foire rue 29', 1, NULL, 15),
(11, 'Moussa Ndour', 1, '0777293282', 'Foire rue 29', 1, NULL, 1),
(12, 'Amadou Ndour', 0, '0777293282', 'Foire r', 1, 11, 1),
(13, 'Modou Wane', 0, '0777293282', 'Foire rue 29', 1, 11, 1),
(14, 'Tening Ndour', 0, '0777293282', 'Foire rue 29', 1, 11, 1),
(16, 'Serigne Bassirou', 0, '', '', 1, NULL, 16),
(17, 'PAPE NDIAYE', 0, '0777293282', 'Foire rue 29', 1, NULL, 17),
(18, 'Raby Diop', 0, '777028905', 'Koutal kaolack', 1, 11, 1),
(19, 'Ameth Thiaré', 1, '0777293282', 'Foire rue 29', 1, NULL, 18),
(20, 'Modou Faye', 1, '787564345', 'Thiare thionane 4', 1, 19, 18),
(21, 'Ousseynou Ndour', 0, '776325144', 'Koutal renaissance', 1, 11, 1),
(22, 'Darou sene', 1, '77656787', 'Thiaré', 1, 19, 18),
(23, 'Mane diarra Fall', 1, '77765543', 'Fatick', 1, 11, 1),
(24, 'Alioune Badara', 0, '77345445', 'Medine', 1, NULL, 19);

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE `compteur` (
  `idcompteur` int(11) NOT NULL,
  `numerocompteur` int(11) NOT NULL,
  `consommationl` varchar(100) NOT NULL,
  `consommationc` float NOT NULL,
  `conso_encours` float NOT NULL,
  `id_abonnement` int(11) NOT NULL,
  `etat_compteur` int(1) NOT NULL DEFAULT '1',
  `estcoupe` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compteur`
--

INSERT INTO `compteur` (`idcompteur`, `numerocompteur`, `consommationl`, `consommationc`, `conso_encours`, `id_abonnement`, `etat_compteur`, `estcoupe`) VALUES
(1, 1, 'Cent vingt-cinq', 125, 125, 1, 1, 0),
(2, 2, 'zero', 0, 0, 2, 1, 0),
(5, 2, 'zero', 0, 0, 7, 1, 0),
(6, 3, 'zero', 0, 0, 8, 1, 0),
(7, 4, 'Deux cent trente-quatre', 234, 234, 9, 1, 0),
(8, 5, 'Cent neuf', 109, 109, 10, 1, 0),
(9, 6, 'zero', 0, 0, 11, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `config`
--

INSERT INTO `config` (`id`, `label`, `value`) VALUES
(24, 'LAST_ID_VILLAGE_IN_CLIENT', '1'),
(25, 'NUMERO_COMPTEUR', '7'),
(26, 'NUMERO_FACTURE', '0'),
(27, 'NUMERO_ABONNEMENT', '7'),
(28, 'PRIX_UNITAIRE_LITRE', '200');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idfacture` int(11) NOT NULL,
  `mois` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `consommation` float NOT NULL,
  `prixunitaire` float NOT NULL,
  `compteur_id` int(11) NOT NULL,
  `payee` int(1) NOT NULL DEFAULT '0',
  `payeenretart` int(1) NOT NULL DEFAULT '0',
  `etat_facture` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idfacture`, `mois`, `annee`, `consommation`, `prixunitaire`, `compteur_id`, `payee`, `payeenretart`, `etat_facture`) VALUES
(1, 6, 2018, 125, 200, 1, 0, 0, 1),
(8, 6, 2018, 109, 200, 8, 0, 0, 1),
(9, 6, 2018, 234, 200, 7, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `village`
--

CREATE TABLE `village` (
  `idvillage` int(11) NOT NULL,
  `nomvillage` varchar(50) NOT NULL,
  `etat_village` int(1) NOT NULL DEFAULT '1',
  `chefdevillage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `village`
--

INSERT INTO `village` (`idvillage`, `nomvillage`, `etat_village`, `chefdevillage_id`) VALUES
(1, 'Koutal', 1, 11),
(2, 'Mbour village', 1, 2),
(3, 'Kaone', 1, 3),
(4, 'Koubal', 1, 4),
(5, 'Wakanda', 1, 5),
(11, 'Kamp ba', 1, 6),
(12, 'Wardiakhale', 1, 7),
(13, 'SIka tourou', 1, 8),
(14, 'Sanguil', 1, 9),
(15, 'Thiawando', 1, 10),
(16, 'Prokhane', 1, 16),
(17, 'Djeubel Village', 1, 17),
(18, 'Thiaré', 1, 19),
(19, 'Maka village', 1, 24);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`idabonnement`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
  ADD PRIMARY KEY (`idcompteur`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label` (`label`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idfacture`);

--
-- Index pour la table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`idvillage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `idabonnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
  MODIFY `idcompteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idfacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `village`
--
ALTER TABLE `village`
  MODIFY `idvillage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
