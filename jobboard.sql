-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 oct. 2022 à 07:52
-- Version du serveur : 10.5.16-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u528377002_jborad_epitech`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_types_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `sector_id`, `name`, `website`, `job_types_id`) VALUES
(1, 9, 'Gogole', NULL, 9),
(2, 8, 'Mamazon', NULL, 11),
(3, 1, 'Société De Gaulle', NULL, 4),
(4, 9, 'Microhard', NULL, 2),
(5, 4, 'Pear', NULL, 3),
(6, 2, 'Ebayz', NULL, 7),
(7, 10, 'Meta Gueule', NULL, 13),
(8, 5, 'Onissan', NULL, 15),
(9, 6, 'Agriglue', NULL, 1),
(10, 7, 'Century42', NULL, 6),
(11, 1, 'Avocado', NULL, 8),
(12, 9, 'Epitecktonik', NULL, 10),
(13, 2, 'Lenovotel', NULL, 12),
(14, 5, 'Platon ik', NULL, 14),
(15, 7, 'Mehdical', NULL, 16),
(16, 10, 'Pierre & Marie Paprika', NULL, 17),
(17, 3, 'schwarzfoghsdoubh', NULL, 18),
(18, 8, 'Basic-fat', NULL, 19);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `start` date DEFAULT NULL COMMENT '(DC2Type:date_immutable)',
  `end` date DEFAULT NULL COMMENT '(DC2Type:date_immutable)',
  `sector_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id`, `job_type_id`, `user_id`, `title`, `description`, `link`, `salary`, `contract_type`, `created_at`, `start`, `end`, `sector_id`) VALUES
(1, 13, 3, 'Développeur HTML', 'L\'entreprise Gogole recherche un développeur HTML pour créer un site dynamique.', NULL, '8226', 'CDI', '2022-09-29 14:08:53', '2023-01-01', NULL, 9),
(2, 13, 4, 'Développeur front-end', 'L\'entreprise Mamazon recherche un développeur front-end pour refaire le visuel de notre site parce qu\'il est nul à chier.', NULL, '42000', 'Freelance', '2022-09-29 13:14:22', '2023-01-11', '2023-02-11', 1),
(3, 1, 3, 'Ouvrier agricole / préparateur en agriculture urbaine', 'Gogole développe des fermes urbaines verticale en intérieur.\nNous sommes spécialisés dans la culture de jeunes pousses et herbes aromatiques.\nNos clients sont des grands nom de la gastronomie française.\n\nPour renforcer notre équipe\nNous recherchons un préparateur de commande polyvalent.e en agriculture urbaine, organisé.e et motivé.e. dynamique qui n\'a pas peur du challenge et qui est prêt à intégrer une équipe jeune.\n\nTes missions seront :\n\nAssister le chef de culture dans les taches de plantation\nD\'assurer l\'entretien du système de production (nettoyage)\nD\'assurer la récolte et le conditionnement des plantes\n\nProfil recherché :\nSens du détail et goût pour les travaux manuels\nMotivé.e, sérieux.se, autonome et organisé.e\n\n', NULL, '1900', 'CDD', '2022-09-30 11:16:22', '2023-01-17', '2023-07-17', 10),
(4, 19, 22, 'Agent d\'accueil (H/F)', 'Avec plus de 2 millions de membres et plus de 1000 clubs, Basic-Fat est leader du Fitness en Europe. En France, Basic-Fat poursuit sa politique de développement soutenue et recrute pour son club de Paris, un Agent d\'accueil polyvalent (H/F) pour un contrat de 35h/semaine.\nMissions :\nL’Agent d’accueil (H/F) d\'un club Basic-Fat est le premier point de contact auquel s\'adressent les membres de ce club de fitness. Il/elle veille à l’ordre et à la tranquillité du club et contrôle la bonne utilisation des équipements mis à la disposition. Il/elle informe les adhérents actuels et futurs et apporte son soutien au niveau informatif et structurel. L’Agent d’accueil (H/F) agit toujours conformément aux valeurs clés du concept Basic-Fat et vise continuellement à contribuer au positionnement de leader sur le marché en tant que partenaire de fitness le plus apprécié.\nRattaché(e) au Responsable du club (Team Leader) ou Responsable Secteur il/elle aura pour missions de :\nAccueillir avec enthousiasme et convivialité les adhérents actuels et futurs\nVendre et conseiller en contribuant à la réalisation des objectifs fixés\nParticiper activement au nettoyage et à l’entretien du club\nAssister le Responsable de club ou Responsable Secteur dans ses tâches administratives\nContribuer aux activités promotionnelles exposées par le responsable du club\nOuvrir et fermer le club dans le respect des horaires et des procédures\nVeiller à la sécurité, à l’ordre et à la tranquillité du club\nListe des missions non exhaustive', NULL, '1357', 'CDI', '2022-09-30 12:53:32', '2023-03-05', NULL, 1),
(5, 18, 21, 'Technicienne spécialisé en extensions de cils', 'schwarzfoghsdoubh est une enseigne spécialisée dans les extensions de cils, dont les instituts sont situés à Reims, et en proche banlieue. Nous proposons toutes les prestations d\'extensions de cils, de la méthode cil à cil, à la méthode volume ; ainsi que le rehaussement de cils.\n\nDepuis 2015, nous mettons à profit notre expertise et notre savoir-faire pour réaliser des prestations haut de gamme et entièrement personnalisées. Nous sommes à la recherche d\'une technicienne en extensions de cils confirmée, notre nouvelle \"pépite\", pour rejoindre notre équipe, pour notre institut de Reims.', NULL, '1800', 'CDI', '2022-09-30 12:57:20', '2022-10-09', NULL, 15),
(6, 17, 20, 'Formateur-trice Mathématiques et Physique/Chimie (H/F)', 'Dans le cadre de son développement pédagogique, le Pierre & Marie Paprika recherche un-e formateur-trice sur la compétence suivante :\n\n- Mathématiques\n- Physique/Chimie\nPour des classes de 1ères et Terminales BAC PRO AMA.', NULL, '2309', 'Freelance', '2022-09-30 13:00:15', '2022-09-01', '2023-06-27', 1),
(7, 16, 19, 'Secrétaire médical(e) H/F', 'Mehdical recherche secrétaire médical(e) expérimenté(e) pour travail multi-tâches en CDI temps plein (35h/semaine).\r\n\r\nPolyvalence, motivation, rigueur, sens de l\'organisation et bonne orthographe nécessaire.\r\n\r\nParler anglais est un plus.', NULL, '2347', 'CDI', '2022-09-30 14:00:41', '2022-10-08', NULL, 26),
(8, 15, 8, 'Mécanicien Freelance toute France H/F', 'Onissan est une société spécialisée dans les métiers de l\'automobile.\r\n\r\nDe l\'inspection à la mécanique, en passant par la carrosserie, leur métier est d\'apporter des solutions innovantes pour les professionnels du marché automobile.\r\n\r\nLa société a lancé son nouveau service Onissan Staff en 2020 et celui-ci connaît un réel succès.\r\n\r\nPour cela, la société recrute des mécaniciens sur des missions partout en France.\r\n\r\nRejoindre Onissan, c\'est avoir la possibilité de réaliser des missions différentes, rencontrer constamment de nouvelles personnes, de nouvelles méthodes de travail et de voir du pays !\r\n\r\nVous êtes intéressé pour avoir les avantages et la stabilité d\'un CDI tout en n\'ayant jamais une journée qui ressemble à une autre ? N\'attendez plus !', NULL, '3650', 'Freelance', '2022-09-30 14:06:14', NULL, NULL, 9),
(9, 14, 18, 'Professeur de Philosophie - télétravail possible', 'Nous recrutons des professeurs de philosophie. Vous donnerez des cours particuliers à des élèves de tous les niveaux en fonction de votre niveau et expérience.\n\nN\'hésitez pas à postuler si vous recherchez un emploi flexible, idéal pour job étudiant.', NULL, '2680', 'Freelance', '2022-09-30 14:08:53', NULL, NULL, 9),
(10, 12, 17, 'Night Auditor H/F', 'L\'hôtel de Lenovotel, 4 étoiles de 100 chambres, vous propose de venir renforcer ses équipes au sein de la Réception.\r\nNous cherchons notre NIGHT AUDITOR (h/f), en charge de la gestion du séjour clients, des réservations, contrôles et clôtures. Rythme 3 nuits/4 nuits hebdomadaire.\r\n\r\nProfessionnel expérimenté, vous maîtrisez les outils hôteliers, PMS, Channel Manager... vous avez un excellent sens du service et de l\'accueil, une présentation irréprochable, anglais et français courant. Nous vous proposons des CDI ou CDD à raison de 39 h/semaine et une rémunération attractive. Venez nous rejoindre, nous vous attendons !', NULL, '2452', 'CDI', '2022-09-30 14:20:28', '2022-10-01', NULL, 16),
(11, 11, 16, 'Collaborateur Comptable pour Cabinet d\'Expertise Comptable', 'RECRUTEMENT D’UN COLLABORATEUR OU COLLABORATRICE DE CABINET D’EXPERTISE COMPTABLE\nNotre cabinet d’expertise comptable recherche actuellement, pour son département comptable, un(e) collaborateur/collaboratrice, sous contrat de travail à durée indéterminée.\n\nPremière expérience cabinet d’expertise comptable souhaitée, mais jeune diplômé accepté. De formation minimum B.T.S. ou équivalent (diplômes obtenus indispensables).\n\nMissions : Sous la supervision d’un chef de mission, le collaborateur ou la collaboratrice aura notamment pour mission de gérer un portefeuille clients (passation des écritures comptables, rapprochements bancaires, déclarations de TVA, réalisation du bilan annuel……contacts clients).', NULL, '2469', 'CDI', '2022-09-30 14:23:45', '2022-12-05', NULL, 20);

-- --------------------------------------------------------

--
-- Structure de la table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `experiences` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job_application`
--

INSERT INTO `job_application` (`id`, `user_id`, `resume`, `motivation`, `firstname`, `lastname`, `phone`, `experiences`, `created_at`, `job_id`) VALUES
(1, 1, NULL, NULL, 'John', 'Aristosa', 766099036, NULL, '2022-09-30 07:53:52', 1),
(2, 2, NULL, NULL, 'Ludovic', 'Debever', 2147483647, NULL, '2022-09-30 14:46:42', 1),
(3, 1, NULL, NULL, 'John', 'Aristosa', 766099036, NULL, '2022-09-30 14:55:01', 2),
(4, 1, NULL, NULL, 'John', 'Aristosa', 766099036, NULL, '2022-09-30 14:55:31', 3),
(5, 1, NULL, NULL, 'John', 'Aristosa', 766099036, NULL, '2022-09-30 14:59:55', 5),
(6, 1, NULL, NULL, 'John', 'Aristosa', 8080808, 'tet', '2022-09-30 15:04:15', 11);

-- --------------------------------------------------------

--
-- Structure de la table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job_types`
--

INSERT INTO `job_types` (`id`, `title`) VALUES
(1, 'Agriculture-Paysage'),
(2, 'Architecture/Décoration'),
(3, 'Armée/Sécurité/Secours'),
(4, 'Banque/Finance/Assurance'),
(5, 'Cinéma/Audiovisuel/Jeux Vidéo'),
(6, 'Commerce/Immobilier'),
(7, 'Communication/Journalisme/Marketing'),
(8, 'Droit/Justice'),
(9, 'Electricité/Electronique/Robotique'),
(10, 'Enseignement/Formation/Insertion'),
(11, 'Gestion/Compatibilité/RH'),
(12, 'Hôtellerie/Restauration/Tourisme'),
(13, 'Informatique/Web/Réseaux'),
(14, 'Lettres/Sciences Humaines/Langues'),
(15, 'Mécanique/Automobile'),
(16, 'Santé/Paramédical'),
(17, 'Sciences physique/Math/Data'),
(18, 'Soins/Esthétique/Coiffure'),
(19, 'Sport/Animation');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:174:\\\"https://127.0.0.1:8000/verify/email?expires=1664449114&signature=8bv4BPou346oCxdJQESlUNwpCkR5t7bZ%2FyEu78LJD9A%3D&token=m%2FcsQraHgmrdlQIrG%2BWfb61EZ2TXR65N%2BsuF8%2BJPzas%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:28:\\\"ballteaserjobboard@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:15:\\\"Ball Teaser Bot\\\";}}s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:25:\\\"john.aristosa@hotmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2022-09-29 09:58:34', '2022-09-29 09:58:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sector`
--

INSERT INTO `sector` (`id`, `name`, `region`) VALUES
(1, 'Paris', 0),
(2, 'Marseille', 0),
(3, 'Bordeaux', 0),
(4, 'Lyon', 0),
(5, 'Toulouse', 0),
(6, 'Lille', 0),
(7, 'Nantes', 0),
(8, 'Ile-De-France', 1),
(9, 'France', 0),
(10, 'Nice', 0),
(11, 'Montpellier', 0),
(12, 'Montpellier', 0),
(13, 'Strasbourg', 0),
(14, 'Rennes', 0),
(15, 'Reims', 0),
(16, 'Saint-Etienne', 0),
(17, 'Le Havre', 0),
(18, 'Toulon', 0),
(19, 'Grenoble', 0),
(20, 'Dijon', 0),
(21, 'Angers', 0),
(22, 'Nîmes', 0),
(23, 'Villeurbanne', 0),
(24, 'Auvergne-Rhône-Alpes', 1),
(25, 'Bourgogne-Franche-Comté', 1),
(26, 'Bretagne', 1),
(27, 'Centre-Val de Loire', 1),
(28, 'Corse', 1),
(29, 'Grand Est', 1),
(30, 'Hauts-de-France', 1),
(31, 'Normandie', 1),
(32, 'Nouvelle-Aquitaine', 1),
(33, 'Occitanie', 1),
(34, 'Pays de la Loire', 1),
(35, 'Provence-Alpes-Côte d\'Azur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `phone`, `resume`, `is_verified`, `company_id`, `sector_id`) VALUES
(1, 'john.aristosa@hotmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'John', 'Aristosa', NULL, NULL, 1, NULL, NULL),
(2, 'ludovic.debever@hotmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Ludovic', 'Debever', NULL, NULL, 1, NULL, NULL),
(3, 'SlainieLaprise@teleworm.us', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 1, NULL),
(4, 'BrunellaRacicot@rhyta.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 2, NULL),
(5, 'AntonSt-Jacques@dayrep.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 3, NULL),
(6, 'MerlinBois@armyspy.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 4, NULL),
(7, 'GabrielleVaillancour@dayrep.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 5, NULL),
(8, 'HollyCharpie@armyspy.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 6, NULL),
(9, 'FerrauAudet@jourrapide.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 7, NULL),
(10, 'LirienneDesforges@jourrapide.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 8, NULL),
(13, 'GemmaMoreau@jourrapide.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 9, NULL),
(14, 'ClarimundaDesruisseaux@teleworm.us', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 10, NULL),
(15, 'HarbinSaucier@rhyta.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 11, NULL),
(16, 'MerlinVeilleux@jourrapide.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 12, NULL),
(17, 'PeverellFerland@armyspy.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 13, NULL),
(18, 'GillesCaisse@armyspy.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 14, NULL),
(19, 'WyattRacine@teleworm.us', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 15, NULL),
(20, 'DelmarOuellet@dayrep.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 16, NULL),
(21, 'EstelleGuimond@rhyta.com', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 17, NULL),
(22, 'DidianeBelisle@teleworm.us', '[\"ROLE_RECRUITER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', '', '', NULL, NULL, 1, 18, NULL),
(23, 'HenrietteLabonte@teleworm.us', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Henriette', 'Labonté', 164082131, NULL, 1, NULL, NULL),
(24, 'GuillaumeMethot@teleworm.us', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Guillaume', 'Méthot', 215690512, NULL, 1, NULL, NULL),
(25, 'DavidGuedry@dayrep.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'David', 'Guédry', 143461778, NULL, 1, NULL, NULL),
(26, 'AudreyGagne@dayrep.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Audrey', 'Gagné', 187422416, NULL, 1, NULL, NULL),
(27, 'AnaisVilleneuve@jourrapide.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Anaïs', 'Villeneuve', 128468143, NULL, 1, NULL, NULL),
(28, 'RoxanneHughes@rhyta.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Roxanne', 'Hughes', 559064378, NULL, 1, NULL, NULL),
(29, 'AdrienSeguin@teleworm.us', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Adrien', 'Séguin', 113702863, NULL, 1, NULL, NULL),
(30, 'ChantalCharpie@rhyta.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Chantal', 'Charpie', 595284766, NULL, 1, NULL, NULL),
(31, 'HamiltonMoreau@teleworm.us', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Hamilton', 'Moreau', 488877150, NULL, 1, NULL, NULL),
(33, 'ArthurOuellet@armyspy.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Arthur', 'Ouellet', 409950250, NULL, 1, NULL, NULL),
(34, 'MillicentEcheverri@jourrapide.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Millicent', 'Echeverri', 417973564, NULL, 1, NULL, NULL),
(35, 'ChristianeBerard@rhyta.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Christiane', 'Bérard', 129597440, NULL, 1, NULL, NULL),
(36, 'CharlineDionne@jourrapide.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Charline', 'Dionne', 328483426, NULL, 1, NULL, NULL),
(37, 'ArianneDuclos@rhyta.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Arianne', 'Duclos', 413666807, NULL, 1, NULL, NULL),
(38, 'GastonLesage@jourrapide.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Gaston', 'Lesage', 157155739, NULL, 1, NULL, NULL),
(39, 'GilbertLabrecque@jourrapide.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Gilbert', 'Labrecque', 132335354, NULL, 1, NULL, NULL),
(40, 'GasparChesnay@armyspy.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Gaspar', 'Chesnay', 219020291, NULL, 1, NULL, NULL),
(41, 'AdeleBlanchard@teleworm.us', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Adèle', 'Blanchard', 425787895, NULL, 1, NULL, NULL),
(42, 'HenryDupont@teleworm.us', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Henry', 'Dupont', 472606808, NULL, 1, NULL, NULL),
(43, 'GaetaneLemieux@jourrapide.com', '[\"ROLE_USER\"]', '$2y$13$HPyVyjQ0Il7W5EkQbBgwhukUmbEaNcChyGrvyYsdUYeodpmNn9Diq', 'Gaetane', 'Lemieux', 119619994, NULL, 1, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4FBF094FDE95C867` (`sector_id`),
  ADD KEY `IDX_4FBF094FE9F5962C` (`job_types_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FBD8E0F85FA33B08` (`job_type_id`),
  ADD KEY `IDX_FBD8E0F8A76ED395` (`user_id`),
  ADD KEY `IDX_FBD8E0F8DE95C867` (`sector_id`);

--
-- Index pour la table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C737C688A76ED395` (`user_id`),
  ADD KEY `IDX_C737C688BE04EA9` (`job_id`);

--
-- Index pour la table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D649979B1AD6` (`company_id`),
  ADD KEY `IDX_8D93D649DE95C867` (`sector_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_4FBF094FDE95C867` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`),
  ADD CONSTRAINT `FK_4FBF094FE9F5962C` FOREIGN KEY (`job_types_id`) REFERENCES `job_types` (`id`);

--
-- Contraintes pour la table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `FK_FBD8E0F85FA33B08` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`),
  ADD CONSTRAINT `FK_FBD8E0F8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_FBD8E0F8DE95C867` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`);

--
-- Contraintes pour la table `job_application`
--
ALTER TABLE `job_application`
  ADD CONSTRAINT `FK_C737C688A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C737C688BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_8D93D649DE95C867` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
