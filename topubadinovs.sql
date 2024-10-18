-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 18 oct. 2024 à 17:59
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
-- Base de données : `topubadinovs`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int UNSIGNED NOT NULL,
  `nom_entreprise` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apropos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `services` json NOT NULL,
  `localisations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `carousel_images` text COLLATE utf8mb4_general_ci NOT NULL,
  `primary_color` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `button_color` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `icon_color` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `text_color` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `title_size` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `paragraph_size` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `title_font` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `paragraph_font` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `service_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `whatsapp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom_entreprise`, `apropos`, `services`, `localisations`, `image`, `carousel_images`, `primary_color`, `button_color`, `icon_color`, `text_color`, `title_size`, `paragraph_size`, `title_font`, `paragraph_font`, `service_description`, `whatsapp`, `instagram`, `tiktok`, `created_at`, `updated_at`) VALUES
(9, 'IGC', 'Influence Groupe Communication est une agence de communication, publicité, production audiovisuelle, évènementielle et digital. Une agence  dynamique qui met son savoir et savoir-faire au service de ses clients et partenaires pour donner de la valeur à le', '[{\"service_name\": \"Communication\", \"service_image\": \"1729127618_42cb57b1ccea02ffb6d1.png\"}]', '<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3972.4167308084748!2d-4.005125625452049!3d5.353200435656597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eb6e99d40dfb%3A0x956c0fa146065035!2sPalm%20Club%20H%C3%B4tel!5e0!3m2!1sfr!2sci!4v1729126729226!5m2!1sfr!2sci\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>', '1729127618_50e7249bfa00ac23f73b.jpg', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(10, 'tyyy', 'trezeefdsfbgh,jkjv,cgnvbffbg', '[]', '[]', '1729131976_928114bcff71bac28825.png', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(11, 'tyrsf', 'dfghjknbvc', '[{\"service_name\": \"ogfkvxckvcxn\", \"service_image\": \"1729156767_2221dda1f359d985e8cb.jpg\"}]', '[]', '1729156767_d15d1f0ba45886bc19b1.jpg', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(12, 'ADINOVs', 'DIGITAL MARKETING, PRINT', '[{\"service_name\": \"MARKETING\", \"service_image\": \"1729158564_bd15b8056e14d8c8a7e8.jpg\"}, {\"service_name\": \"FORMATION\", \"service_image\": \"1729158564_1dd765feddddb7e83bfd.jpg\"}]', '[\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3972.4167308084748!2d-4.005125625452049!3d5.353200435656597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eb6e99d40dfb%3A0x956c0fa146065035!2sPalm%20Club%20H%C3%B4tel!5e0!3m2!1sfr!2sci!4v1729158506913!5m2!1sfr!2sci\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>\"]', '1729158564_9c5fdf8a44f5476bd0a9.jpg', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(13, 'test', 'tests', '[]', '[]', '1729165517_d11b44290eb30d83ce8f.jpg', '[\"1729165517_a5b9d43c5ebc74e1932d.jpg\",\"1729165517_c301fa819698433da4f7.jpg\"]', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(14, 'Topub', '[Nom de l\'entreprise] est une boutique en ligne spécialisée dans la vente de [produits ou services spécifiques]. Nous offrons à nos clients une large gamme de produits de qualité, allant de [catégories de produits spécifiques, ex. : vêtements, électroniqu', '[{\"service_name\": \"Communication\", \"service_image\": \"1729191052_35aa0ab0c72d1cda4755.jpg\"}, {\"service_name\": \"Marketing Digital\", \"service_image\": \"1729191052_9f10187470cdc8440490.jpg\"}]', '[]', '1729191052_b892d718775d61490517.jpg', '[]', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-10-15-191107', 'App\\Database\\Migrations\\Entreprises', 'default', 'App', 1729020566, 1),
(2, '2024-10-17-023753', 'App\\Database\\Migrations\\CreateEntrepriseTables', 'default', 'App', 1729132884, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
