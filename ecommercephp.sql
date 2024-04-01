-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 avr. 2024 à 06:28
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
-- Base de données : `ecommercephp`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `produits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`produits`)),
  `isverif` tinyint(1) NOT NULL DEFAULT 0,
  `msg` text NOT NULL,
  `date` date DEFAULT NULL,
  `date_reponse` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_user`, `produits`, `isverif`, `msg`, `date`, `date_reponse`) VALUES
(10, 13, '{\"30\":{\"quantite\":\"1\",\"couleur\":\"gray\"}}', 2, 'couleur non disponible pour le moment ', '2024-04-01', '2024-04-01'),
(11, 13, '{\"37\":{\"quantite\":\"1\",\"couleur\":\"Bleu\"},\"71\":{\"quantite\":\"1\",\"couleur\":\"noir\"},\"76\":{\"quantite\":\"1\",\"couleur\":\"Rouge\"}}', 1, 'Votre commande a été acceptée avec succès', '2024-04-01', '2024-04-01'),
(12, 13, '{\"79\":{\"quantite\":\"1\",\"couleur\":\"noir\"}}', 1, 'Votre commande a été acceptée avec succès', '2024-04-01', '2024-04-01');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `quantite` int(3) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `prix` float NOT NULL,
  `solde` int(2) NOT NULL,
  `couleur` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `categorie`, `quantite`, `image`, `description`, `prix`, `solde`, `couleur`, `date`) VALUES
(30, 'frigidaire', 'electromenager', 5, 'fridge.jfif', 'frigidaire ta3mel 66 kif', 3000, 20, 'gray', '2024-03-27'),
(37, 't-short', 'vetement', 19, 'dbach.jfif', 'malla 9at3a yalatif', 50, 0, 'Bleu,Jaune,noir', '2024-03-27'),
(71, 'pc dell', 'informatique', 4, 'pc.jfif', 'dfsd', 750, 0, 'noir', '2024-03-28'),
(73, 'frigidaire', 'electromenager', 5, 'fridge.jfif', 'frigidaire ta3mel 66 kif', 3000, 20, 'gray', '2024-03-27'),
(74, 't-short', 'vetement', 20, 'dbach.jfif', 'malla 9at3a yalatif', 50, 0, 'Bleu,Jaune,noir', '2024-03-27'),
(75, 'pc dell', 'informatique', 5, 'pc.jfif', 'dfsd', 750, 0, 'noir', '2024-03-28'),
(76, 'ballon de football Adidas Tango', 'sport', 49, 'ballon.jfif', 'Le ballon de football Adidas Tango est l\'accessoire essentiel pour les amateurs de football qui cherchent à améliorer leur jeu. Avec sa conception de haute qualité et ses performances supérieures, ce ballon est apprécié par les joueurs de tous niveaux, des débutants aux professionnels.', 250, 10, 'Rouge,Jaune', '2024-03-23'),
(77, 'frigidaire', 'electromenager', 5, 'fridge.jfif', 'frigidaire ta3mel 66 kif', 3000, 20, 'gray', '2024-03-27'),
(78, 't-short', 'vetement', 20, 'dbach.jfif', 'malla 9at3a yalatif', 50, 0, 'Bleu,Jaune,noir', '2024-03-27'),
(79, 'pc dell', 'informatique', 4, 'pc.jfif', 'dfsd', 750, 0, 'noir', '2024-03-28'),
(80, 'ballon de football Adidas Tango', 'sport', 50, 'ballon.jfif', 'Le ballon de football Adidas Tango est l\'accessoire essentiel pour les amateurs de football qui cherchent à améliorer leur jeu. Avec sa conception de haute qualité et ses performances supérieures, ce ballon est apprécié par les joueurs de tous niveaux, des débutants aux professionnels.', 250, 10, 'Rouge,Jaune', '2024-03-23'),
(81, 'frigidaire', 'electromenager', 5, 'fridge.jfif', 'frigidaire ta3mel 66 kif', 3000, 20, 'gray', '2024-03-27'),
(82, 't-short', 'vetement', 20, 'dbach.jfif', 'malla 9at3a yalatif', 50, 0, 'Bleu,Jaune,noir', '2024-03-27'),
(83, 'pc dell', 'informatique', 5, 'pc.jfif', 'dfsd', 750, 0, 'noir', '2024-03-28');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(8) NOT NULL,
  `role` varchar(8) NOT NULL DEFAULT 'user',
  `image` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `tel`, `role`, `image`, `password`) VALUES
(13, 'heni', 'kenoun', 'kenounheni4@gmail.com', 25874581, 'admin', '376914450_2039742199694345_3822375879017748320_n.jpg', 'Css12345'),
(15, 'heni', 'kenoun', 'kenounheni@gmail.com', 25874581, 'user', '376914450_2039742199694345_3822375879017748320_n.jpg', 'Css12345');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
