-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 16 avr. 2024 à 20:21
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `systeme_de_recrutement`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `CINcandidat` varchar(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numTel` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `libellePoste` varchar(20) NOT NULL,
  `etat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`CINcandidat`, `nom`, `prenom`, `dateNaissance`, `numTel`, `email`, `libellePoste`, `etat`) VALUES
('00000001', 'nomc', 'prenomc', '2000-02-15', '    1234', 'nomc@gmail.com', 'designer', 'accepte'),
('09865789', 'candidat1', 'candidat1', '2013-09-10', '12112121', 'cand1@gmail.com', 'back', 'accepte'),
('09876541', '  azer', '  azer', '2024-01-09', '  098765', '  azer@gmail.com', 'front', 'accepte'),
('11111000', 'candidat3', 'prenom', '2024-02-28', '77777778', 'cand3@gmail.com', 'data', 'en attente'),
('11111202', 'abdi', 'sami', '2024-02-05', '09876543', 'semi@gmail.com', 'full', 'accepte'),
('11111234', 'amri', 'amir', '2024-02-10', '99999999', 'amir@kkk.com', 'poste4', 'en attente'),
('11234567', ' candidaat', ' candidat', '2024-01-03', ' 9999999', ' candidat@gmail.com', 'front', 'refuse'),
('11345678', 'med moutia', 'htira', '2024-01-24', '25481364', 'medmoutiabenhtira@gmail.com', 'back', 'en attente'),
('11675764', 'moutia', 'htira', '2024-01-09', '12321425', 'med@gmail.com', 'front', 'accepte'),
('12343256', 'aziza', 'aa', '2024-02-15', '12093498', 'aziz@kkk.com', 'poste1', 'en attente'),
('12344355', 'aaaa', 'bbbb', '2024-03-22', '25481364', 'aaa@kkk.com', 'full', 'accepte'),
('12345675', 'nomm', 'prenom', '2024-02-14', '12345677', 'nom@gmail.com', 'designer', 'en attente'),
('12345677', 'candidat2', 'cand2', '2024-02-17', '11112239', 'cand2@gmail.com', 'poste1', 'refuse'),
('1237710', 'aa', 'aa', '2024-01-03', '12345678', 'aafvdbg@gmail.com', 'front', 'en attente'),
('21444444', 'maya', 'zahaar', '2024-02-29', '36524198', 'mma@kkk.com', 'back', 'refuse'),
('22117865', 'htiraa', 'moataz', '2024-02-19', '33339998', 'moataz@gmail.com', 'front', 'en attente'),
('77777777', 'zahar', 'maya', '2024-01-26', '11111111', 'maya@gmail.com', 'data', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `libelleCompetence` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`libelleCompetence`, `description`, `active`) VALUES
('anglais', 'anglais', 1),
('arabe', 'ar', 1),
('communication', 'communication', 1),
('competence', 'competence', 1),
('competence1', '1Â²', 0),
('competence2', '2', 1),
('competence3', '3', 1),
('css', 'C', 0),
('django', 'dj', 1),
('fr', 'fr', 1),
('html', 'html', 1),
('italien', 'itt', 1),
('javascript', 'js', 1),
('laravel', 'lar', 1),
('python', 'python', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ficheevaluation`
--

CREATE TABLE `ficheevaluation` (
  `CINrecruteur` varchar(8) NOT NULL,
  `CINcandidat` varchar(8) NOT NULL,
  `libelleModele` varchar(30) NOT NULL,
  `competenceList` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ficheevaluation`
--

INSERT INTO `ficheevaluation` (`CINrecruteur`, `CINcandidat`, `libelleModele`, `competenceList`) VALUES
('00000000', '77777777', 'modele2', '{\"communication\":\"-\",\"fr\":\"B2\",\"python\":\"intemediaire\"}'),
('00000001', '11345678', 'model100', '{\"communication\":\"+\",\"html\":\"good\",\"python\":\"beginner\"}'),
('00000001', '12345677', 'model100', '{\"communication\":\"+\",\"html\":\"good\",\"python\":\"intemediaire\"}'),
('00000001', '22117865', 'mod11', '{\"anglais\":\"a1\",\"communication\":\"+\",\"python\":\"beginner\"}'),
('00001222', '11111202', 'model9', '{\"anglais\":\"c2\",\"django\":\"moyen\"}'),
('11111229', '12343256', 'modeel9', '{\"anglais\":\"a1\",\"communication\":\"-\",\"italien\":\"A\",\"laravel\":\"super\"}'),
('11675764', '00000001', 'model8', '{\"anglais\":\"a1\",\"communication\":\"-\",\"html\":\"good\"}'),
('11675764', '09865789', 'modele8', '{\"communication\":\"-\"}'),
('11675764', '1237710', 'modelefront', '{\"anglais\":\"a1\",\"communication\":\"+\",\"css\":\"good\",\"html\":\"good\"}'),
('12323434', '11111000', 'modeel5', '{\"competence2\":\"2\",\"competence3\":\"B\"}'),
('12346666', '11111234', 'modeel4', '{\"anglais\":\"c2\",\"competence\":\"competence\",\"html\":\"bad\"}'),
('12346666', '11234567', 'mod11', '{\"anglais\":\"a1\",\"communication\":\"+\",\"python\":\"beginner\"}'),
('12346666', '11234567', 'modele1', '{\"anglais\":\"c2\",\"communication\":\"+\"}'),
('1234678', '11345678', 'model7', '{\"communication\":\"-\",\"python\":\"intemediaire\"}'),
('1234679', '00000001', 'model8', '[]'),
('54782111', '09876541', 'modele1', '{\"anglais\":\"a1\",\"communication\":\"+\"}'),
('54782111', '11111202', 'modele3', '[]');

-- --------------------------------------------------------

--
-- Structure de la table `modelecompetence`
--

CREATE TABLE `modelecompetence` (
  `niveauMin` varchar(30) NOT NULL,
  `ponderation` float NOT NULL,
  `libelleModele` varchar(30) NOT NULL,
  `libellecompetence` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `modelecompetence`
--

INSERT INTO `modelecompetence` (`niveauMin`, `ponderation`, `libelleModele`, `libellecompetence`) VALUES
('a1', 20, 'mod11', 'anglais'),
('+', 10, 'mod11', 'communication'),
('intemediaire', 10, 'mod11', 'python'),
('c2', 30, 'modeel4', 'anglais'),
('competence', 22, 'modeel4', 'competence'),
('bad', 0, 'modeel4', 'html'),
('2', 40, 'modeel5', 'competence2'),
('B', 40, 'modeel5', 'competence3'),
('b2', 20, 'modeel9', 'anglais'),
('-', 0, 'modeel9', 'communication'),
('A', 20, 'modeel9', 'italien'),
('+', 20, 'model100', 'communication'),
('good', 20, 'model100', 'html'),
('beginner', 4, 'model100', 'python'),
('+', 20, 'model7', 'communication'),
('bad', 1, 'model7', 'html'),
('nice', 20, 'model7', 'javascript'),
('intemediaire', 10, 'model7', 'python'),
('b1', 20, 'model8', 'anglais'),
('+', 10, 'model8', 'communication'),
('good', 20, 'model8', 'html'),
('c1', 30, 'model9', 'anglais'),
('bien', 10, 'model9', 'django'),
('a1', 11, 'modele1', 'anglais'),
('+', 22, 'modele1', 'communication'),
('c2', 80, 'modele13', 'anglais'),
('+', 20, 'modele2', 'communication'),
('C1', 20, 'modele2', 'fr'),
('beginner', 20, 'modele2', 'python'),
('b2', 20, 'modele3', 'anglais'),
('B2', 20, 'modele3', 'fr'),
('intemediaire', 20, 'modele3', 'python'),
('c1', 20, 'modele4', 'anglais'),
('+', 20, 'modele4', 'communication'),
('C1', 20, 'modele4', 'fr'),
('+', 20, 'modele8', 'communication'),
('a2', 5, 'modelefront', 'anglais'),
('-', 1, 'modelefront', 'communication'),
('good', 10, 'modelefront', 'css'),
('good', 10, 'modelefront', 'html');

-- --------------------------------------------------------

--
-- Structure de la table `modeleevaluation`
--

CREATE TABLE `modeleevaluation` (
  `libelleModele` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `libelleposte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `modeleevaluation`
--

INSERT INTO `modeleevaluation` (`libelleModele`, `description`, `libelleposte`) VALUES
('mod11', 'mm', 'front'),
('modeel', 'mmod', 'designer'),
('modeel4', '4', 'poste4'),
('modeel5', '5', 'data'),
('modeel9', 'MO9', 'poste1'),
('model100', '100', 'poste1'),
('model7', 'm7', 'back'),
('model8', '8', 'designer'),
('model9', 'M9', 'full'),
('modele1', 'mooood', 'front'),
('modele13', 'modele13', 'data'),
('modele2', 'modele2', 'data'),
('modele3', 'modele3', 'full'),
('modele4', 'modele4', 'rh'),
('modele5', 'modele5', 'rh'),
('modele8', 'modele8', 'back'),
('modelefront', 'mf', 'front');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `libelleCompetence` varchar(30) NOT NULL,
  `note` float NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `niveau`, `description`, `libelleCompetence`, `note`, `active`) VALUES
(1, '+', '+', 'communication', 10, 1),
(2, '-', '-', 'communication', 11, 1),
(3, 'A1', '---', 'fr', 12, 1),
(4, 'A2', '--', 'fr', 20, 1),
(5, 'B1', '-+', 'fr', 0, 1),
(6, 'B2', '+', 'fr', 0, 1),
(7, 'C1', '++', 'fr', 0, 1),
(8, 'C2', '+++', 'fr', 0, 1),
(9, 'beginner', 'beginner', 'python', 0, 1),
(10, 'intemediaire', 'intemediaire', 'python', 0, 1),
(24, 'a1', 'a1', 'anglais', 0, 1),
(25, 'a2', 'a2', 'anglais', 0, 1),
(26, 'b1', 'b1', 'anglais', 0, 1),
(27, 'b2', 'b2', 'anglais', 0, 1),
(28, 'c1', 'c1', 'anglais', 0, 1),
(29, 'c2', 'c2', 'anglais', 0, 1),
(34, 'competence', 'competence', 'competence', 0, 1),
(35, 'competence', 'competence', 'competence', 0, 1),
(36, 'A', 'a', 'italien', 11, 1),
(37, 'B', 'b', 'italien', 20, 1),
(45, '1', '1', 'arabe', 11, 1),
(46, '2', '2', 'arabe', 22, 1),
(47, 'bien', 'b', 'laravel', 10, 1),
(48, 'moyen', 'm', 'laravel', 5, 1),
(49, 'refuse', 'r', 'laravel', 0, 1),
(50, 'good', 'gg', 'html', 10, 1),
(51, 'bad', 'bb', 'html', 1, 1),
(52, 'good', 'g', 'css', 10, 0),
(53, 'bad', 'b', 'css', 1, 0),
(54, 'nice', 'n', 'javascript', 10, 1),
(55, 'bad', 'b', 'javascript', 0, 1),
(56, '1', '1', 'competence1', 10, 0),
(57, '2', '2', 'competence1', 10, 0),
(58, '3', '3', 'competence1', 10, 0),
(59, '1', '1', 'competence2', 10, 1),
(60, '2', '2', 'competence2', 20, 1),
(61, 'A', 'A', 'competence3', 10, 1),
(62, 'B', 'B', 'competence3', 20, 1),
(63, 'bien', 'b', 'django', 10, 1),
(64, 'moyen', 'm', 'django', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `libellePoste` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `CINrecruteur` varchar(8) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`libellePoste`, `description`, `CINrecruteur`, `active`) VALUES
('aa', 'aa', '1234679', 0),
('back', 'backend dev', '1234678', 1),
('data', 'dt', '1234678', 1),
('designer', 'designer', '12346666', 1),
('front', 'front dev', '1234678', 1),
('full', 'FULL', '1234678', 1),
('poste1', 'poste11', '11675764', 0),
('poste10', 'p10', '00001222', 0),
('poste3', '3', '11111229', 0),
('poste4', '4', '11675764', 1),
('poste6', '66', '54782111', 0),
('poste9', '99', '1234678', 0),
('rh', 'rh', '1234678', 0);

-- --------------------------------------------------------

--
-- Structure de la table `recruteur`
--

CREATE TABLE `recruteur` (
  `CINrecruteur` varchar(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numTel` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recruteur`
--

INSERT INTO `recruteur` (`CINrecruteur`, `nom`, `prenom`, `dateNaissance`, `numTel`, `email`, `login`, `mdp`, `active`, `role`) VALUES
('00000000', ' recruteur2', ' recruteur', '2024-01-03', ' 1234567', ' recruteur@gmail.com', 'recruteur@gmail.com', 'admin', 0, 'recruteur'),
('00000001', 'ounii', 'saleeh', '2024-02-27', '12344322', 'saleeh@gmail.com', 'saleeh@gmail.com', 'admiin', 0, 'admin'),
('00001222', 'ali', 'ali', '2024-02-23', ' 4111223', 'ali@kkk.com', 'ali@kkk.com', 'admin', 0, 'admin'),
('11111228', 'xxx', 'yyyy', '2024-03-15', '09876543', 'xxx@kkk.com', 'xxx@kkk.com', 'admin', 1, 'recruteur'),
('11111229', 'ayarii', ' seemi', '2024-11-03', ' 1111223', ' semii@kkk.com', ' semii@kkk.com', ' admin', 1, 'admin'),
('11111277', 'hamemi', 'ahmed', '2024-02-20', '11112230', 'ahmed@gmail.com', 'ahmed@gmail.com', 'recruteur', 0, 'admin'),
('11675764', 'moutia', 'ben htira', '2024-01-30', '12321425', 'moutiaht@gmail.com', 'moutiaht@gmail.com', 'admin', 1, 'admin'),
('12323434', 'recruteur7', 'reeec', '2024-02-14', '12340999', 'rec7@gmailcom', 'rec7@gmailcom', 'recr', 1, 'recruteur'),
('12345670', 'xxxx', 'yyyy', '2024-03-26', '12345677', 'aaaaaa', 'aaaa', 'aaaa', 1, 'admin'),
('12346666', ' recruteur3', ' recruteur3', '2024-01-04', ' 1234567', 'foulenfouleni@gmail.com', 'foulenfouleni@gmail.com', 'admin', 1, 'recruteur'),
('1234671', 'recru8', 'recru8', '2024-01-04', '12345678', 'recru8@gmail.com', 'recru8@gmail.com', 'admin', 0, 'recruteur'),
('1234678', '   zahar', '   maya', '2024-01-11', '   12345', 'maya@gmail.com', 'maya@gmail.com', 'admin', 1, 'admin'),
('1234679', 'abid', 'aa', '2024-01-03', '12345678', 'aa@gmail.com', 'a1@gmail.com', 'admin', 0, 'recruteur'),
('1237777', '  chebbi', '  amal', '2024-01-05', '  123456', 'amal.chebbi@gmail.com', '1waydev@gmail.com', 'admin', 0, 'admin'),
('54782111', 'amin', 'aaaa', '2024-03-04', '12369696', 'amin@kkk.com', 'amin@kkk.com', '1234', 0, 'admin'),
('74859612', 'recru5', 'recru5', '2024-01-04', '12345678', 'recru5@gmail.com', 'recru5@gmail.com', 'admin', 0, 'recruteur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`CINcandidat`),
  ADD KEY `fkposte` (`libellePoste`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`libelleCompetence`);

--
-- Index pour la table `ficheevaluation`
--
ALTER TABLE `ficheevaluation`
  ADD PRIMARY KEY (`CINrecruteur`,`CINcandidat`,`libelleModele`),
  ADD KEY `CINcandidat` (`CINcandidat`),
  ADD KEY `libelleModele` (`libelleModele`);

--
-- Index pour la table `modelecompetence`
--
ALTER TABLE `modelecompetence`
  ADD PRIMARY KEY (`libelleModele`,`libellecompetence`),
  ADD KEY `fkmod` (`libelleModele`),
  ADD KEY `fkc` (`libellecompetence`);

--
-- Index pour la table `modeleevaluation`
--
ALTER TABLE `modeleevaluation`
  ADD PRIMARY KEY (`libelleModele`),
  ADD KEY `libposte` (`libelleposte`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fklib` (`libelleCompetence`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`libellePoste`) USING BTREE,
  ADD KEY `fk` (`CINrecruteur`);

--
-- Index pour la table `recruteur`
--
ALTER TABLE `recruteur`
  ADD PRIMARY KEY (`CINrecruteur`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `fkposte` FOREIGN KEY (`libellePoste`) REFERENCES `poste` (`libellePoste`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ficheevaluation`
--
ALTER TABLE `ficheevaluation`
  ADD CONSTRAINT `CINcandidat` FOREIGN KEY (`CINcandidat`) REFERENCES `candidat` (`CINcandidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CINrecruteur` FOREIGN KEY (`CINrecruteur`) REFERENCES `recruteur` (`CINrecruteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libelleModele` FOREIGN KEY (`libelleModele`) REFERENCES `modeleevaluation` (`libelleModele`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `modelecompetence`
--
ALTER TABLE `modelecompetence`
  ADD CONSTRAINT `fkc` FOREIGN KEY (`libellecompetence`) REFERENCES `competence` (`libelleCompetence`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmod` FOREIGN KEY (`libelleModele`) REFERENCES `modeleevaluation` (`libelleModele`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `modeleevaluation`
--
ALTER TABLE `modeleevaluation`
  ADD CONSTRAINT `libposte` FOREIGN KEY (`libelleposte`) REFERENCES `poste` (`libellePoste`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `fklib` FOREIGN KEY (`libelleCompetence`) REFERENCES `competence` (`libelleCompetence`);

--
-- Contraintes pour la table `poste`
--
ALTER TABLE `poste`
  ADD CONSTRAINT `fk` FOREIGN KEY (`CINrecruteur`) REFERENCES `recruteur` (`CINrecruteur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
