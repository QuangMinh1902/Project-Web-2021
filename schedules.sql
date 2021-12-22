-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 22 Décembre 2021 à 21:58
-- Version du serveur :  10.0.38-MariaDB-0ubuntu0.16.04.1
-- Version de PHP :  7.0.33-47+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `c4stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `cours`
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

CREATE TABLE `cours_users` (
  `cours_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `cours_users`
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

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `formations`
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

CREATE TABLE `plannings` (
  `id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `plannings`
--

INSERT INTO `plannings` (`id`, `cours_id`, `date_debut`, `date_fin`) VALUES
(1, 1, '2021-12-21 14:52:20', '2022-02-22 11:52:20'),
(3, 2, '2022-02-22 08:56:04', '2022-04-22 12:56:04'),
(5, 3, '2022-01-18 10:10:02', '2022-02-25 03:30:02'),
(7, 4, '2022-03-15 06:30:13', '2022-05-15 07:33:13'),
(9, 5, '2021-12-29 16:01:42', '2022-02-23 07:27:42'),
(10, 5, '2022-01-05 07:33:42', '2022-02-09 07:28:42'),
(25, 8, '2021-12-22 02:09:23', '2021-07-16 07:12:54'),
(17, 6, '2022-02-23 10:33:44', '2022-03-12 08:30:44'),
(24, 7, '2021-12-22 02:09:23', '2021-06-12 07:12:54'),
(14, 5, '2022-03-15 09:37:42', '2022-03-24 09:31:42'),
(18, 6, '2021-12-25 16:04:44', '2022-04-27 09:36:44'),
(19, 6, '2022-01-26 05:33:44', '2022-02-28 07:34:44'),
(20, 6, '2022-01-30 15:17:44', '2021-12-21 15:04:34'),
(21, 6, '2022-02-23 10:33:44', '2022-03-12 08:30:44'),
(23, 7, '2021-12-22 02:09:23', '2021-05-12 07:12:54'),
(26, 8, '2021-12-22 02:09:23', '2021-06-22 07:12:54'),
(27, 9, '2021-12-22 02:09:23', '2021-12-21 07:12:54'),
(28, 9, '2021-12-22 02:09:23', '2021-10-01 07:12:54'),
(29, 9, '2021-12-22 02:09:23', '2021-11-02 07:12:54'),
(30, 10, '2021-12-22 02:09:23', '2021-12-25 07:12:54'),
(31, 10, '2021-12-22 02:09:23', '2021-12-11 07:12:54'),
(32, 11, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(33, 11, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(34, 1, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(35, 2, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(36, 12, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(37, 12, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(38, 13, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(39, 13, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(40, 13, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(41, 14, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(42, 14, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(43, 15, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(44, 15, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(45, 16, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(46, 17, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(47, 18, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(48, 19, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(49, 20, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(50, 20, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(51, 20, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(52, 18, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(53, 17, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(54, 16, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(55, 15, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(56, 13, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(57, 14, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(58, 12, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(59, 11, '2021-12-22 02:09:23', '2021-07-21 07:12:54'),
(60, 10, '2021-12-22 02:09:23', '2021-07-21 07:12:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `users`
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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `formation_id` (`formation_id`);

--
-- Index pour la table `cours_users`
--
ALTER TABLE `cours_users`
  ADD PRIMARY KEY (`cours_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_id` (`cours_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `formation_id` (`formation_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
