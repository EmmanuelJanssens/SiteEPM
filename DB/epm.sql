-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Octobre 2017 à 08:18
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epm`
--

-- --------------------------------------------------------

--
-- Structure de la table `chemin_donnees`
--

CREATE TABLE `chemin_donnees` (
  `idChemin_donnees` int(11) NOT NULL,
  `Chemin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `idClasse` int(11) NOT NULL,
  `Annee` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `Annee`) VALUES
(1, '1ere'),
(2, '2eme'),
(3, '3eme');

-- --------------------------------------------------------

--
-- Structure de la table `contenu_pedagogique`
--

CREATE TABLE `contenu_pedagogique` (
  `Classe_idClasse` int(11) NOT NULL,
  `Type_contenu_pedagogique_idType_contenu_pedagogique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `divers`
--

CREATE TABLE `divers` (
  `idDivers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `document_enseignant`
--

CREATE TABLE `document_enseignant` (
  `idDocument_enseignant` int(11) NOT NULL,
  `Document` varchar(45) NOT NULL,
  `Chemin_donnees_idChemin_donnees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `Classe_idClasse` int(11) NOT NULL,
  `Type_film_idType_film` int(11) NOT NULL,
  `Chemin_donnees_idChemin_donnees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `idUser` int(11) NOT NULL,
  `login` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pwd` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `type` varchar(45) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`idUser`, `login`, `pwd`, `admin`, `type`) VALUES
(1, 'EPM3', '$2y$10$pKRfhiUk8KjLActXYNXIP.Eq8KlZISNe47ejATL0tBu9gwoIpWY1u', 0, 'Eleve'),
(2, 'prof', '$2y$10$pKRfhiUk8KjLActXYNXIP.Eq8KlZISNe47ejATL0tBu9gwoIpWY1u', 1, 'Enseignant');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `Type_photo_idType_photo` int(11) NOT NULL,
  `Chemin_donnees_idChemin_donnees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `Titre` varchar(45) NOT NULL,
  `Type_idType` int(11) NOT NULL,
  `Chemin_donnees_idChemin_donnees` int(11) NOT NULL,
  `Type_Recette_idType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `repertoire_principal`
--

CREATE TABLE `repertoire_principal` (
  `idRepertoire_principal` int(11) NOT NULL,
  `Chemin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_contenu_pedagogique`
--

CREATE TABLE `type_contenu_pedagogique` (
  `idType_contenu_pedagogique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_film`
--

CREATE TABLE `type_film` (
  `idType_film` int(11) NOT NULL,
  `Nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_photo`
--

CREATE TABLE `type_photo` (
  `idType_photo` int(11) NOT NULL,
  `Nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_recette`
--

CREATE TABLE `type_recette` (
  `idType` int(11) NOT NULL,
  `Nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chemin_donnees`
--
ALTER TABLE `chemin_donnees`
  ADD PRIMARY KEY (`idChemin_donnees`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idClasse`);

--
-- Index pour la table `contenu_pedagogique`
--
ALTER TABLE `contenu_pedagogique`
  ADD PRIMARY KEY (`Classe_idClasse`,`Type_contenu_pedagogique_idType_contenu_pedagogique`),
  ADD KEY `fk_Contenu_pedagogique_Classe1_idx` (`Classe_idClasse`),
  ADD KEY `fk_Contenu_pedagogique_Type_contenu_pedagogique1_idx` (`Type_contenu_pedagogique_idType_contenu_pedagogique`);

--
-- Index pour la table `divers`
--
ALTER TABLE `divers`
  ADD PRIMARY KEY (`idDivers`);

--
-- Index pour la table `document_enseignant`
--
ALTER TABLE `document_enseignant`
  ADD PRIMARY KEY (`idDocument_enseignant`),
  ADD KEY `fk_Document_enseignant_Chemin_donnees1_idx` (`Chemin_donnees_idChemin_donnees`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`Classe_idClasse`,`Type_film_idType_film`,`Chemin_donnees_idChemin_donnees`),
  ADD KEY `fk_Film_Classe1_idx` (`Classe_idClasse`),
  ADD KEY `fk_Film_Type_film1_idx` (`Type_film_idType_film`),
  ADD KEY `fk_Film_Chemin_donnees1_idx` (`Chemin_donnees_idChemin_donnees`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `fk_Photo_Type_photo1_idx` (`Type_photo_idType_photo`),
  ADD KEY `fk_Photo_Chemin_donnees1_idx` (`Chemin_donnees_idChemin_donnees`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `fk_Recette_Chemin_donnees1_idx` (`Chemin_donnees_idChemin_donnees`),
  ADD KEY `fk_Recette_Type_Recette1_idx` (`Type_Recette_idType`);

--
-- Index pour la table `repertoire_principal`
--
ALTER TABLE `repertoire_principal`
  ADD PRIMARY KEY (`idRepertoire_principal`);

--
-- Index pour la table `type_contenu_pedagogique`
--
ALTER TABLE `type_contenu_pedagogique`
  ADD PRIMARY KEY (`idType_contenu_pedagogique`);

--
-- Index pour la table `type_film`
--
ALTER TABLE `type_film`
  ADD PRIMARY KEY (`idType_film`);

--
-- Index pour la table `type_photo`
--
ALTER TABLE `type_photo`
  ADD PRIMARY KEY (`idType_photo`);

--
-- Index pour la table `type_recette`
--
ALTER TABLE `type_recette`
  ADD PRIMARY KEY (`idType`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contenu_pedagogique`
--
ALTER TABLE `contenu_pedagogique`
  ADD CONSTRAINT `fk_Contenu_pedagogique_Classe1` FOREIGN KEY (`Classe_idClasse`) REFERENCES `classe` (`idClasse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contenu_pedagogique_Type_contenu_pedagogique1` FOREIGN KEY (`Type_contenu_pedagogique_idType_contenu_pedagogique`) REFERENCES `type_contenu_pedagogique` (`idType_contenu_pedagogique`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `document_enseignant`
--
ALTER TABLE `document_enseignant`
  ADD CONSTRAINT `fk_Document_enseignant_Chemin_donnees1` FOREIGN KEY (`Chemin_donnees_idChemin_donnees`) REFERENCES `chemin_donnees` (`idChemin_donnees`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_Film_Chemin_donnees1` FOREIGN KEY (`Chemin_donnees_idChemin_donnees`) REFERENCES `chemin_donnees` (`idChemin_donnees`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Film_Classe1` FOREIGN KEY (`Classe_idClasse`) REFERENCES `classe` (`idClasse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Film_Type_film1` FOREIGN KEY (`Type_film_idType_film`) REFERENCES `type_film` (`idType_film`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_Photo_Chemin_donnees1` FOREIGN KEY (`Chemin_donnees_idChemin_donnees`) REFERENCES `chemin_donnees` (`idChemin_donnees`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Photo_Type_photo1` FOREIGN KEY (`Type_photo_idType_photo`) REFERENCES `type_photo` (`idType_photo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_Recette_Chemin_donnees1` FOREIGN KEY (`Chemin_donnees_idChemin_donnees`) REFERENCES `chemin_donnees` (`idChemin_donnees`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recette_Type_Recette1` FOREIGN KEY (`Type_Recette_idType`) REFERENCES `type_recette` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
