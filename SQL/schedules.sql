-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 déc. 2021 à 17:39
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `schedules`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `formation_id` (`formation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `intitule`, `user_id`, `formation_id`, `created_at`, `updated_at`) VALUES
(1, 'Analyse Match', 13, 1, '2021-12-20 21:09:31', '2021-12-20 21:09:31'),
(2, 'Algebrique', 6, 1, '2021-12-20 21:09:48', '2021-12-20 21:09:48'),
(3, 'Electronic', 14, 2, '2021-12-20 21:10:17', '2021-12-20 21:10:17'),
(4, 'Programmation en C', 15, 4, '2021-12-20 21:10:39', '2021-12-20 21:10:39'),
(5, 'Marketing digital', 14, 3, '2021-12-20 21:11:07', '2021-12-20 21:11:07'),
(6, 'Microeconomie', 4, 3, '2021-12-20 21:17:16', '2021-12-20 21:17:16'),
(7, 'Comptabilite analytique', 14, 3, '2021-12-20 21:18:17', '2021-12-20 21:18:17'),
(8, 'Histoire des faits economiques', 17, 3, '2021-12-20 21:19:37', '2021-12-20 21:19:37'),
(9, 'Conception objet java', 15, 4, '2021-12-20 21:33:07', '2021-12-20 21:33:07'),
(10, 'Intelligence artificiel et big data', 13, 4, '2021-12-20 21:33:46', '2021-12-20 21:33:46'),
(11, 'Resaux', 6, 4, '2021-12-20 21:34:06', '2021-12-20 21:34:06'),
(12, 'Histoire', 17, 5, '2021-12-20 21:34:31', '2021-12-20 21:34:31'),
(13, 'Geographie', 6, 5, '2021-12-20 21:34:45', '2021-12-20 21:34:45'),
(14, 'Culture professionnel', 14, 5, '2021-12-20 21:35:14', '2021-12-20 21:35:14'),
(15, 'Mecanique des solides deformables', 13, 2, '2021-12-20 21:36:03', '2021-12-20 21:36:03'),
(16, 'Lasers et rayonnements', 13, 2, '2021-12-20 21:36:27', '2021-12-20 21:36:27'),
(17, 'Dynamique et vibrations', 15, 2, '2021-12-20 21:36:51', '2021-12-20 21:36:51'),
(18, 'Calcul differentiel et courbes', 14, 1, '2021-12-20 21:37:30', '2021-12-20 21:37:30'),
(19, 'Equations differentielles', 6, 1, '2021-12-20 21:38:08', '2021-12-20 21:38:08'),
(20, 'Topologie des espaces metriques', 4, 1, '2021-12-20 21:38:34', '2021-12-20 21:38:34');

-- --------------------------------------------------------

--
-- Structure de la table `cours_users`
--

DROP TABLE IF EXISTS `cours_users`;
CREATE TABLE IF NOT EXISTS `cours_users` (
  `cours_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`cours_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours_users`
--

INSERT INTO `cours_users` (`cours_id`, `user_id`) VALUES
(1, 4),
(1, 13),
(2, 4),
(2, 14),
(2, 17),
(3, 4),
(3, 14),
(3, 16),
(5, 3),
(5, 6),
(5, 15),
(6, 3),
(6, 4),
(7, 3),
(7, 6),
(7, 13),
(7, 15),
(8, 3),
(8, 13),
(8, 15),
(8, 17),
(16, 16),
(17, 16),
(18, 4);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `intitule`, `created_at`, `updated_at`) VALUES
(1, 'Math', '2021-12-20 20:50:15', '2021-12-20 20:50:15'),
(2, 'SPI', '2021-12-20 20:50:23', '2021-12-20 20:50:23'),
(3, 'Economie', '2021-12-20 20:50:28', '2021-12-20 20:50:28'),
(4, 'Informatique', '2021-12-20 20:50:36', '2021-12-20 20:50:36'),
(5, 'Litterature', '2021-12-20 20:50:52', '2021-12-20 20:50:52');

-- --------------------------------------------------------

--
-- Structure de la table `plannings`
--

DROP TABLE IF EXISTS `plannings`;
CREATE TABLE IF NOT EXISTS `plannings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cours_id` int(11) NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cours_id` (`cours_id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plannings`
--

INSERT INTO `plannings` (`id`, `cours_id`, `date_debut`, `date_fin`) VALUES
(53, 7, '2022-01-03 00:00:00', '2022-01-03 10:00:00'),
(54, 7, '2022-05-01 00:00:00', '2022-05-01 23:59:54'),
(55, 8, '2021-11-15 00:00:00', '2021-11-15 23:59:54'),
(56, 8, '2022-03-12 00:00:00', '2022-03-12 23:59:54'),
(57, 9, '2022-02-20 00:00:00', '2022-02-20 23:59:54'),
(58, 9, '2022-02-12 00:00:00', '2022-02-12 23:59:54'),
(59, 9, '2022-03-08 00:00:00', '2022-03-08 23:59:54'),
(60, 10, '2022-01-07 00:00:00', '2022-01-07 23:59:54'),
(61, 10, '2022-01-03 00:00:00', '2022-01-03 23:59:54'),
(62, 11, '2022-03-05 00:00:00', '2022-03-05 23:59:54'),
(63, 11, '2022-04-13 00:00:00', '2022-04-13 23:59:54'),
(64, 1, '2022-01-28 00:00:00', '2022-01-28 23:59:54'),
(65, 2, '2022-01-29 00:00:00', '2022-01-29 23:59:54'),
(66, 12, '2022-03-14 00:00:00', '2022-03-14 23:59:54'),
(67, 12, '2021-11-22 00:00:00', '2021-11-22 23:59:54'),
(68, 13, '2022-06-21 00:00:00', '2022-06-21 23:59:54'),
(69, 13, '2022-02-16 00:00:00', '2022-02-16 23:59:54'),
(70, 13, '2022-10-10 00:00:00', '2022-10-10 23:59:54'),
(71, 14, '2022-06-22 00:00:00', '2022-06-22 23:59:54'),
(72, 14, '2022-05-20 00:00:00', '2022-05-20 23:59:54'),
(73, 15, '2022-01-02 00:00:00', '2022-01-02 23:59:54'),
(74, 15, '2022-04-22 00:00:00', '2022-04-22 23:59:54'),
(75, 16, '2022-05-11 00:00:00', '2022-05-11 23:59:54'),
(76, 17, '2022-03-03 00:00:00', '2022-03-03 23:59:54'),
(77, 18, '2022-02-22 00:00:00', '2022-02-22 23:59:54'),
(78, 19, '2022-01-11 00:00:00', '2022-01-11 23:59:54'),
(79, 20, '2022-09-11 00:00:00', '2022-09-11 23:59:54'),
(80, 20, '2022-01-12 00:00:00', '2022-01-12 23:59:54'),
(81, 20, '2022-02-20 00:00:00', '2022-02-20 23:59:54'),
(82, 18, '2022-07-17 00:00:00', '2022-07-17 23:59:54'),
(83, 17, '2022-05-14 00:00:00', '2022-05-14 23:59:54'),
(84, 16, '2022-04-21 00:00:00', '2022-04-21 23:59:54'),
(85, 15, '2022-01-01 00:00:00', '2022-01-01 23:59:54'),
(86, 13, '2022-02-02 00:00:00', '2022-02-02 23:59:54'),
(87, 14, '2022-09-09 00:00:00', '2022-09-09 23:59:54'),
(88, 12, '2022-11-21 00:00:00', '2022-11-21 23:59:54'),
(89, 11, '2022-08-10 00:00:00', '2022-08-10 23:59:54'),
(90, 10, '2022-02-10 00:00:00', '2022-02-10 23:59:54'),
(91, 1, '2022-01-10 00:00:00', '2022-01-10 23:59:54'),
(92, 1, '2022-01-10 00:00:00', '2022-01-10 23:59:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `formation_id` (`formation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `login`, `mdp`, `formation_id`, `type`) VALUES
(1, 'Admin', 'User', 'admin', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu', NULL, 'admin'),
(3, 'Tran', 'ThienAn', 'user1', '$2y$10$LWXwvbsCQjFyQBXqOf8abuPvSdcvV2/8/o5XKzDwyW5rvDFfVCAtS', 3, 'etudiant'),
(4, 'Pham', 'ThuThuy', 'user2', '$2y$10$5KZdDUspJUi3ac03kHo5A.bT.zCndkPp8C7T80M8z19jbSVTlbN1G', NULL, 'enseignant'),
(5, 'Tran', 'HaPhuong', 'user3', '$2y$10$JWI9iO.D/GBTaqeerJakCOn70ZUrCsj/8cFcAyU2yO4B3TcY.3qDm', 5, 'etudiant'),
(6, 'Vu', 'VanSinh', 'user4', '$2y$10$GHvjx9N09qWc1T1mkyiVVOgi9NLAllZDnLC/KJCzesdv/RuDQRq/S', NULL, 'enseignant'),
(7, 'Nguyen', 'ThienThanh', 'user5', '$2y$10$JikS6YYcF1xyOtYWfJR8cee71fUvK4T0P20V0m64s8Li1ozpv/62S', 1, 'etudiant'),
(8, 'Phan', 'VanDuy', 'user6', '$2y$10$r5OROZDSIzyBdx7lDmAFPeXR5AC/HoZ6bnZKoa.VjvC7avAN5veKu', 1, 'etudiant'),
(9, 'Tran', 'Binh', 'user7', '$2y$10$C7W/tx9DlDpDIAGkyJwyvOL8CUKH7Y7FnZj6LobfsLDAgYy8RfpiO', 3, 'etudiant'),
(10, 'Thuy', 'Vy', 'user8', '$2y$10$USiMXXzds7aFF.tq/dSDu.86fqEtCPcAy6.HzsehWSGv0cll3gXm.', 4, 'etudiant'),
(11, 'Trinh', 'VanQuy', 'user9', '$2y$10$.XAUVYlYYqT1aZk50hHmGeNUOcTjwel6ESgfD2HjPq4Am4xNTzXZm', 5, 'etudiant'),
(12, 'Pham', 'ThiBichHuyen', 'user10', '$2y$10$2/e7WDIPq6Yjl4UKRpcIk.MnNYcLggnPOygS5W4tABbEwLpFmaiTu', 2, 'etudiant'),
(13, 'Ngo', 'QuyCan', 'user11', '$2y$10$kOYRxqqg.g1PTrbDVGyAVe9IZmks8f7AMKcNHCbvgvBjHh/LkP4yS', NULL, 'enseignant'),
(14, 'Tran', 'PhuongAnh', 'user14', '$2y$10$TosYZBDVbQ3ORGirzpcwJeLDAh7eBNwUSPVhbXIoi8hSlfeKe9LUO', NULL, 'enseignant'),
(15, 'Pham', 'QuangMinh', 'user15', '$2y$10$HFIDnOpXz81.fTg1lEOxq.82STYOmnlzkgs3R311x62UcvxZjcrZe', NULL, 'enseignant'),
(16, 'Bui', 'MaiUyen', 'user16', '$2y$10$FyH539fgnPEgfJ7tFT8kMug6snq91W4RlfWPaBqkQepmzwTIQ2LC2', 2, 'etudiant'),
(17, 'Nguyen', 'BichNgoc', 'user17', '$2y$10$lsAl6trKxkt/J5CAxpVD1uyxhVQ0/kFFbMdsQ0/zPk0FT.5QlmWrK', NULL, 'enseignant'),
(18, 'Tran', 'Federique', 'user18', '$2y$10$i7HfEe3owHXu/mBXMaN5COpH40.rVvtfQUFaAoTUELs/zIuwJP2Oa', 2, NULL),
(19, 'Nguyen', 'Paul', 'user19', '$2y$10$jE.V8fxtppDdk0CjV/2Gkeqcz7WwZwBFc0JuAPvdqx6YbwL.mhjfG', 4, NULL),
(20, 'Pham', 'Lisa', 'user20', '$2y$10$jKNybNynjOQDV4pv28O8/ONz0J.FfEiKxyxmUV3TRKHlSwcl1DChG', 1, NULL),
(21, 'Vu', 'Sandra', 'user21', '$2y$10$8q0s.jTFrmZALfee4Em0IutFOO8B5iJyL0w06VT4F9FbbJAty5D72', NULL, NULL),
(22, 'Vuong', 'PhuongLinh', 'user22', '$2y$10$JtQYZsbFZEREAgm.diRzueuobXhT5pLFwHUpU0zqnX.zesKJRHojy', NULL, NULL),
(23, 'Robinson', 'Mialy', 'user23', '$2y$10$5IWwjDC2zCfyyIC7qN/so.A5fXlMRDFJWu9wk3Pz4KFTCkZrTQCi6', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
