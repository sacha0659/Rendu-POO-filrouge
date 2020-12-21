-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 21 déc. 2020 à 19:27
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `sondage_rouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `iduser_1` varchar(255) NOT NULL,
  `iduser_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `iduser_1`, `iduser_2`) VALUES
(2, 'alex', 'test'),
(5, 'alexandre', 'alex'),
(28, 'test2', 'alex'),
(29, 'test2', 'alex'),
(30, 'Sacha', 'alex');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_id` int(11) NOT NULL,
  `sondages_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `users_id`, `sondages_id`) VALUES
(1, 'coucou', '2020-11-29 13:51:20', 1, '0');

-- --------------------------------------------------------

--
-- Structure de la table `reponses_sondages`
--

CREATE TABLE `reponses_sondages` (
  `id` int(11) NOT NULL,
  `name_questions` varchar(255) NOT NULL,
  `sondage_id` int(11) NOT NULL,
  `nb_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponses_sondages`
--

INSERT INTO `reponses_sondages` (`id`, `name_questions`, `sondage_id`, `nb_vote`) VALUES
(1, 'Chinois', 1, 6),
(2, 'Italien', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `sondages`
--

CREATE TABLE `sondages` (
  `id` int(11) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `_url` varchar(255) NOT NULL,
  `date_fin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sondages`
--

INSERT INTO `sondages` (`id`, `questions`, `creator_id`, `_url`, `date_fin`) VALUES
(1, 'Qu\'est ce que je mange ce soir ?', 1, 'db7f66cb', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `isconnected` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `pseudo`, `isconnected`) VALUES
(1, 'alexe.delafe@outlook.fr', '$2y$10$z3oX5gzk8dZMiqQt7yf8mei7whanwBCUA7IUjAd.HEuTwiaVeV2nq', 'alexandre', 0),
(2, 'alexandre.delafosse@edu.devinci.fr', '$2y$10$KF0Yi1mMYQe1DP0lAbzzBe0y9BRkGM1ZeU4Teem8uu4ZNfkcLZ4ba', 'alex', 0),
(4, 'sabine.wong@groupe3F.fr', '$2y$10$SOjnyaMyYLX0OzWm2r4LwuYBLG4542wSAk.5K/t.p6JbiwHO.rpkO', 'test', 0),
(5, 'sachagaleuzzi@gmail.com', '$2y$10$wkAV6AjRCYWZOw9FdfKooeTv9z1/ok4WWwPgNh/B1OylTURuVkuya', 'Sacha', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `reponses_sondages`
--
ALTER TABLE `reponses_sondages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sondages`
--
ALTER TABLE `sondages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reponses_sondages`
--
ALTER TABLE `reponses_sondages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sondages`
--
ALTER TABLE `sondages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
