-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 juil. 2024 à 18:11
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet-stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('saliha@gmail.com|127.0.0.1', 'i:1;', 1722065401),
('saliha@gmail.com|127.0.0.1:timer', 'i:1722065401;', 1722065401);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Reunion', '2024-07-24 08:24:34', '2024-07-24 08:24:34'),
(5, 'Autres', '2024-07-24 08:24:36', '2024-07-24 08:24:36'),
(6, 'Demande de document', '2024-07-24 08:24:39', '2024-07-24 08:24:39');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_courriers`
--

CREATE TABLE `categorie_courriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `Courriel_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_courriers`
--

INSERT INTO `categorie_courriers` (`id`, `categories_id`, `Courriel_id`, `created_at`, `updated_at`) VALUES
(10, 5, 17, '2024-07-24 13:51:10', '2024-07-24 13:51:10'),
(11, 5, 37, '2024-07-24 15:27:37', '2024-07-24 15:27:37');

-- --------------------------------------------------------

--
-- Structure de la table `courriels`
--

CREATE TABLE `courriels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expediteur_id` bigint(20) UNSIGNED NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `date_du_courrier` date NOT NULL,
  `description` text NOT NULL,
  `destinataire` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `importance` varchar(255) NOT NULL,
  `urgence` varchar(255) NOT NULL,
  `courrier` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courriels`
--

INSERT INTO `courriels` (`id`, `expediteur_id`, `sujet`, `date_du_courrier`, `description`, `destinataire`, `categorie`, `importance`, `urgence`, `courrier`, `created_at`, `updated_at`) VALUES
(1, 2, 'asd', '2024-07-26', 'asd', '3', 'Reunion', 'Important', 'Urgence modere', 'Rapport_de_stage.pdf', '2024-07-26 09:19:30', '2024-07-26 09:19:30'),
(2, 3, 'asd23', '2024-07-26', 'asd', '2', 'Reunion', 'Importance modere', 'Tres Urgent', 'exemple Rapport des tâches.docx', '2024-07-26 09:29:34', '2024-07-26 09:29:34'),
(3, 3, 'a2', '2024-07-26', 'tst', '2', 'Reunion', 'Tres Important', 'Urgence modere', 'AnyDesk.exe', '2024-07-26 09:33:37', '2024-07-26 09:33:37'),
(4, 2, 's', '2024-07-26', 'test', '3', 'Reunion', 'Tres Important', 'Tres Urgent', 'Rapport.docx', '2024-07-26 09:56:05', '2024-07-26 09:56:05'),
(5, 2, 'test', '2024-07-26', 'test', '3', 'Reunion', 'Tres Important', 'Urgence modere', 'courriels (1).sql', '2024-07-26 10:09:33', '2024-07-26 10:09:33'),
(6, 3, 'lkhr', '2024-07-26', 'test', '2', 'Reunion', 'Tres Important', 'Tres Urgent', 'apps-ecommerce-shopping-cart.html', '2024-07-26 13:05:49', '2024-07-26 13:05:49'),
(7, 3, 'lkhr', '2024-07-26', 'test', '2', 'Reunion', 'Tres Important', 'Urgence modere', 'apps-email-read.html', '2024-07-26 13:06:46', '2024-07-26 13:06:46'),
(8, 3, 'lkhr', '2024-07-26', 'rtes', '2', 'Reunion', 'Tres Important', 'Tres Urgent', 'apps-email-read.html', '2024-07-26 13:22:25', '2024-07-26 13:22:25');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files_courrier`
--

CREATE TABLE `files_courrier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `Courriel_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `importance`
--

CREATE TABLE `importance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `importance`
--

INSERT INTO `importance` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Important', '2024-07-17 14:36:52', '2024-07-17 14:36:52'),
(8, 'Importance modere', '2024-07-25 13:53:54', '2024-07-25 13:53:54'),
(9, 'Tres Important', '2024-07-27 09:16:08', '2024-07-27 09:16:08');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2024_07_06_101500_create__courriels_table', 2),
(5, '2024_07_06_101805_create__courriels_table', 3),
(6, '2024_07_06_101833_create_courriels_table', 4),
(11, '2024_07_08_105730_categorie_table', 8),
(12, '2024_07_08_110030_categorie_table', 9),
(16, '2024_07_17_142454_create_files', 12),
(17, '0001_01_01_000000_create_users_table', 13),
(18, '0001_01_01_000001_create_cache_table', 13),
(19, '0001_01_01_000002_create_jobs_table', 13),
(20, '2024_07_08_082025_create_courriels_table', 13),
(24, '2024_07_08_084818_urgences_table', 14),
(25, '2024_07_08_094203_importance_table', 14),
(26, '2024_07_08_110419_create_categories_table', 14),
(27, '2024_07_17_145947_create_destinataire', 15),
(28, '2024_07_17_150333_categorie__courriel', 16),
(29, '2024_07_23_152115_destinataire_courrier', 17),
(30, '2024_07_23_152746_categorie_courriers', 18),
(31, '2024_07_23_153128_files_courrier', 19),
(32, '2024_07_26_101329_courriels', 20);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2rwAnSEHZ3sdcXBhGotyoP6ScGIDA5AWAnpIacQ7', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo1OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiYnljSllJRDg3aGdmcElhak1OV29YcXNYcmZVaDU3WHM5NnlaRjlkYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Vc2VyL1NlbnRNYWlscyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzIyMjY1NzQyO319', 1722265750),
('UjZdfol3tlEY2qTyLWHGUG226nhzLWmulHDuLGT4', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoid0dHSHNLak9HaHRvS0NXU3lnZHd3c1Z5NlJaUGk1eUo3cVlxV3VrbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Qcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MjIyNjAxOTA7fX0=', 1722269279);

-- --------------------------------------------------------

--
-- Structure de la table `urgences`
--

CREATE TABLE `urgences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `urgences`
--

INSERT INTO `urgences` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Urgent', '2024-07-17 14:41:40', '2024-07-17 14:41:40'),
(2, 'Urgence modere', '2024-07-17 14:41:45', '2024-07-17 14:41:45'),
(3, 'Tres Urgent', '2024-07-17 14:41:47', '2024-07-17 14:41:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$12$glKsVrnwgNZcDClO5z8rO.Qnbj8G6fQKfhxZaji1xldE6/g7v9T7a', 1, NULL, '2024-07-17 14:27:06', '2024-07-17 14:27:06'),
(3, 'Ilyas', 'ilyas@gmail.com', NULL, '$2y$12$dh4MWopSYvMPlmOmzDF/IOO1yFMbKfW/QgPvPIOJeuNfLlnCBD/mC', 2, NULL, '2024-07-17 14:30:57', '2024-07-17 14:30:57'),
(7, 'test', 'test@gmail.com', NULL, '$2y$12$TPlmmwJo/IMHAHkxslcgh.Ogi.Y5/5O/g46OYk7mpuK/RE7heqjXa', 1, NULL, '2024-07-27 10:38:06', '2024-07-27 10:38:06'),
(11, 'NouveauTest1234', 'TestNouveau@gmail.com', NULL, '$2y$12$LoKzmbjYO6FCAq5h4QonvexJLI0nF7jgVtvaagTK2tmyDQUg3y/A.', 2, NULL, '2024-07-29 14:39:18', '2024-07-29 14:49:08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_courriers`
--
ALTER TABLE `categorie_courriers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courriels`
--
ALTER TABLE `courriels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courriels_expediteur_id_foreign` (`expediteur_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `files_courrier`
--
ALTER TABLE `files_courrier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `importance`
--
ALTER TABLE `importance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `urgences`
--
ALTER TABLE `urgences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categorie_courriers`
--
ALTER TABLE `categorie_courriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `courriels`
--
ALTER TABLE `courriels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `files_courrier`
--
ALTER TABLE `files_courrier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `importance`
--
ALTER TABLE `importance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `urgences`
--
ALTER TABLE `urgences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courriels`
--
ALTER TABLE `courriels`
  ADD CONSTRAINT `courriels_expediteur_id_foreign` FOREIGN KEY (`expediteur_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
