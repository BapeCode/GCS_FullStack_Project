-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 05 déc. 2024 à 14:42
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cybernova`
--

-- --------------------------------------------------------

--
-- Structure de la table `certifications`
--

CREATE TABLE `certifications` (
  `id` int NOT NULL,
  `collaborateur_id` int NOT NULL,
  `certification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `certifications`
--

INSERT INTO `certifications` (`id`, `collaborateur_id`, `certification`) VALUES
(1, 5, 'Certified ScrumMaster (CSM)'),
(2, 5, 'AWS Certified Solutions Architect'),
(3, 6, 'Google Ads Certification'),
(4, 6, 'HubSpot Content Marketing Certification'),
(5, 7, 'Google UX Design Certificate'),
(6, 7, 'Adobe Certified Expert (ACE)'),
(7, 8, 'Google Associate Android Developer'),
(8, 8, 'AWS Certified Developer');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `email`, `message`) VALUES
(8, 'Mathieu Forest', 'forest.mathieu69270@gmail.com', 'Bonjour,\r\nJe vous transmet ce contact afin que vous m\'envoyez la facture n° 592892.'),
(9, 'Bape', 'bapeoff.official@gmail.com', 'Test'),
(10, 'Mathieu Pro', 'mforest@guardiaschool.fr', 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int NOT NULL,
  `collaborateur_id` int NOT NULL,
  `poste` varchar(255) NOT NULL,
  `entreprise` varchar(255) DEFAULT NULL,
  `description` text,
  `periode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `collaborateur_id`, `poste`, `entreprise`, `description`, `periode`) VALUES
(1, 5, 'Développeur Full Stack', 'Cherli', 'Développement d\'applications web avec React et Node.js.', 'Jan 2022 - Présent'),
(2, 5, 'Chef de projet IT', 'Forets', 'Coordination d\'une l\'équipe dans un environnement Agile.', 'Mars 2020 - Décembre 2021'),
(3, 6, 'Responsable Marketing Digital', 'Arriba', 'Gestion des campagnes publicitaires et optimisation SEO.', 'Jan 2021 - Présent'),
(4, 6, 'Consultant SEO', 'Arriba', 'Audits SEO et mise en oeuvre de stratégies d\'optimisation.', 'Juin 2019 - Décembre 2020'),
(5, 7, 'Designer UX/UI', 'Hellowork', 'Création de wireframes, maquettes et prototypes interactifs.', 'Juin 2021 - Présent'),
(6, 7, 'Chef de projet Design', 'Apple', 'Gestion d\'une équipe de designers pour des projets numériques.', 'Mars 2019 - Mai 2021'),
(7, 8, 'Développeur Mobile Senior', 'Supercell', 'Développement d\'applications mobiles multiplateformes.', 'Jan 2022 - Présent'),
(8, 8, 'Responsable Technique', 'MIMI ', 'Management d\'équipe et supervision d\'architectures techniques.', 'Juin 2020 - Décembre 2021');

-- --------------------------------------------------------

--
-- Structure de la table `informations_basics`
--

CREATE TABLE `informations_basics` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `langue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `informations_basics`
--

INSERT INTO `informations_basics` (`id`, `nom`, `prenom`, `langue`) VALUES
(5, 'Gerard', 'Maxime', 'Français , Anglais '),
(6, 'Chaudhry', 'Taha', 'Français ,  Anglais , Urdu '),
(7, 'Forest', 'Mathieu', 'Français , Anglais '),
(8, 'Brehin', 'Eliott', 'Français , Anglais ');

-- --------------------------------------------------------

--
-- Structure de la table `informations_pro`
--

CREATE TABLE `informations_pro` (
  `id` int NOT NULL,
  `collaborateur_id` int NOT NULL,
  `projet` varchar(255) DEFAULT NULL,
  `experience_pro` longtext,
  `skills` varchar(255) DEFAULT NULL,
  `tools` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'admin@cybernova.org', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `collaborateur_id` int NOT NULL,
  `skill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `collaborateur_id`, `skill`) VALUES
(1, 5, 'JavaScript'),
(2, 5, 'Node.js'),
(3, 5, 'React'),
(4, 5, 'Linux'),
(5, 5, 'Docker'),
(6, 5, 'Kubernetes'),
(7, 5, 'Power BI'),
(8, 6, 'SEO'),
(9, 6, 'SEM'),
(10, 6, 'Social Media Marketing'),
(11, 6, 'Salesforce'),
(12, 6, 'Google Analytics'),
(13, 7, 'UX/UI Design'),
(14, 7, 'Figma'),
(15, 7, 'Sketch'),
(16, 7, 'Adobe XD'),
(17, 7, 'Recherche utilisateur'),
(18, 8, 'React Native'),
(19, 8, 'Swift'),
(20, 8, 'Kotlin'),
(21, 8, 'Jenkins'),
(22, 8, 'CI/CD');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborateur_id` (`collaborateur_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborateur_id` (`collaborateur_id`);

--
-- Index pour la table `informations_basics`
--
ALTER TABLE `informations_basics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `informations_pro`
--
ALTER TABLE `informations_pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborateur_id` (`collaborateur_id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborateur_id` (`collaborateur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `informations_basics`
--
ALTER TABLE `informations_basics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `informations_pro`
--
ALTER TABLE `informations_pro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_ibfk_1` FOREIGN KEY (`collaborateur_id`) REFERENCES `informations_basics` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`collaborateur_id`) REFERENCES `informations_basics` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `informations_pro`
--
ALTER TABLE `informations_pro`
  ADD CONSTRAINT `informations_pro_ibfk_1` FOREIGN KEY (`collaborateur_id`) REFERENCES `informations_basics` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`collaborateur_id`) REFERENCES `informations_basics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
