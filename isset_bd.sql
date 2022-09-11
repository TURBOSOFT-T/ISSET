-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 mars 2022 à 14:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `isset_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `id_user`, `matricule`, `name`, `prenom`, `fonction`, `email`, `created_at`, `updated_at`) VALUES
(12, 11, 'MKER', 'KOUASSI', 'KARINE', NULL, 'agent1@gmail.com', '2021-12-14 13:39:25', '2021-12-15 15:40:02'),
(13, 11, 'MVGT', 'PENAH', 'POLAI EMILIE', NULL, 'agent2@gmail.com', '2021-12-14 13:51:12', '2021-12-15 15:35:05'),
(14, 11, 'kjhjkhjk', 'DOUMBIA', 'YAYA', NULL, 'agent3@gmail.com', '2021-12-14 13:51:52', '2021-12-15 15:39:49'),
(15, 11, 'zzerr', 'BEKOIN', 'VICTORINE', NULL, 'kssks@gmail.com', '2021-12-15 15:36:25', '2021-12-15 15:36:25'),
(16, 11, 'khdjhksdf', 'YAO', 'ALOU HENRI', NULL, 'mskdlsmdkm@gmail.com', '2021-12-15 15:37:24', '2021-12-15 15:37:24'),
(17, 11, 'dskhfksfhskj', 'KOUADIO', 'BOZAME', NULL, 'lsjdjsl@gmail.com', '2021-12-15 15:37:54', '2021-12-15 15:37:54'),
(18, 11, 'ehrthrhr', 'DJENEB', 'MATOGOMA', NULL, 'trhrhtr@gmail.com', '2021-12-15 15:38:36', '2021-12-15 15:38:36'),
(19, 11, 'ezhfksvkjf', 'BAHINCHI', 'BEATRICE', NULL, 'lnfjksljf@gmail.com', '2021-12-15 15:39:08', '2021-12-15 15:39:08');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

DROP TABLE IF EXISTS `rapports`;
CREATE TABLE IF NOT EXISTS `rapports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nomcomplet` varchar(255) DEFAULT NULL,
  `nbre_tf_impactes` int(11) DEFAULT '0',
  `nbre_inscription` int(11) DEFAULT '0',
  `nbre_tf_crees` int(11) DEFAULT '0',
  `date_save` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rapports`
--

INSERT INTO `rapports` (`id`, `date`, `id_agent`, `id_user`, `nomcomplet`, `nbre_tf_impactes`, `nbre_inscription`, `nbre_tf_crees`, `date_save`, `created_at`, `updated_at`) VALUES
(6, '2021-12-14', 12, 11, 'KOUASSI KARINE', 3, 2, 3, NULL, '2021-12-14 13:47:40', '2021-12-14 13:47:40'),
(7, '2021-12-15', 13, 11, 'PENAH POLAI EMILIE', 30, 45, 30, NULL, '2021-12-14 14:27:13', '2021-12-14 15:01:42'),
(8, '2021-12-14', 12, 11, 'KOUASSI KARINE', 6, 10, 6, NULL, '2021-12-14 15:12:56', '2021-12-14 15:12:56'),
(9, '2021-12-15', 13, 11, 'PENAH POLAI EMILIE', 5, 3, 11, NULL, '2021-12-15 14:43:52', '2021-12-15 14:43:52'),
(10, '2021-12-16', 13, 11, 'PENAH POLAI EMILIE', 5, 3, 12, NULL, '2021-12-15 14:45:18', '2021-12-15 14:45:18'),
(11, '2021-12-16', 13, 11, 'PENAH POLAI EMILIE', 1, 1, 1, NULL, '2021-12-15 14:49:59', '2021-12-15 14:49:59'),
(12, '2021-12-16', 13, 11, 'PENAH POLAI EMILIE', 4, 3, 3, NULL, '2021-12-15 15:13:06', '2021-12-15 15:13:06'),
(13, '2021-12-16', 13, 11, 'PENAH POLAI EMILIE', 1, 1, 11, NULL, '2021-12-15 15:18:14', '2021-12-15 15:18:14'),
(14, '2021-12-23', 14, 11, 'DOUMBIA YAYA', 1, 1, 1, NULL, '2021-12-15 15:18:39', '2021-12-15 15:18:39'),
(17, '2021-12-16', 14, 11, 'DOUMBIA YAYA', 4, 4, 4, NULL, '2021-12-15 15:41:35', '2021-12-15 15:41:35'),
(18, '2021-12-16', 12, 11, 'KOUASSI KARINE', 6, 7, 6, NULL, '2021-12-16 14:28:39', '2021-12-16 14:28:39'),
(29, '2021-12-20', 19, 11, 'BAHINCHI BEATRICE', 2, 3, 2, '2021-12-20', '2021-12-20 10:06:52', '2021-12-20 10:06:52'),
(31, '2021-12-21', 13, 11, 'PENAH POLAI EMILIE', 6, 10, 6, '2021-12-21', '2021-12-21 16:01:53', '2021-12-21 16:01:53'),
(32, '2021-12-21', 16, 11, 'YAO ALOU HENRI', 3, 6, 3, '2021-12-21', '2021-12-21 16:02:18', '2021-12-21 16:02:18'),
(33, '2021-12-23', 12, 11, 'KOUASSI KARINE', 6, 6, 2, '2021-12-23', '2021-12-23 10:46:17', '2021-12-23 10:55:24');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `telephone`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Gagne', 'Ocladd', '0767123451', 'Administrateur', 'admin@gmail.com', NULL, '$2y$10$hh1Tpm91zzWkDUWODeWKFuJlyxxOmftStuV4ilExLr1Mp05SbIrzS', NULL, '2021-12-10 15:01:39', '2021-12-23 11:06:32'),
(11, 'Kouli', 'Serge', '0656125521', 'Agent', 'agent@gmail.com', NULL, '$2y$10$Rtmm36xL4Ke8Iz/RnYzehuy/rObUOKqdeFbL/DTqUUlpmaqW6CLvS', NULL, '2021-12-13 18:49:42', '2022-01-10 14:02:58'),
(12, 'Kouamé', 'Genevieve', '6125588', 'Chef de service', 'chefdeservice@gmail.com', NULL, '$2y$10$BBeGD8wAi4XxEkEwlfiqf.DXxc5D6sd5dGnFOarkbS90rm53.Glyu', NULL, '2021-12-13 18:50:45', '2022-01-10 14:22:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
