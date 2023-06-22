-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 juin 2023 à 00:57
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_wizkitchen`
--

-- --------------------------------------------------------

--
-- Structure de la table `ateliers`
--

CREATE TABLE `ateliers` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ateliers`
--

INSERT INTO `ateliers` (`id`, `label`, `description`, `date_add`, `image_url`) VALUES
(1, ' 	Mangez sain au quotidien devient simple et motivant !', 'Manger sain ne vous demandera plus des heures de préparation et de réflexion sur ce que vous pouvez ou ne pouvez pas manger. On ne vous prépare que des plats équilibrés avec des ingrédients riches en nutriments pour une alimentation saine et simple! ', '2023-06-21 09:19:27', '1383132.png'),
(2, 'Votre plat maison sera bien plus réconfortant qu’un plat commandé !', 'Plus sain, et plus fier, vous serez en dégustant vos plats, élaborés par vous-même, avec des ingrédients frais et respectueux de votre corps ainsi que de la planète. ', '2023-06-21 09:20:24', '9839341 (1).png'),
(3, 'Plus on est de fou plus on ris', 'La cuisine c’est bien, mais en groupe c’est mieux ! Retrouvez-vous autour d’un plan de travail pour rire et apprendre tout en gagnant du temps sur votre vie perso. ', '2023-06-21 09:24:39', '4836103.png'),
(4, 'Nos producteurs', 'L’équipe Wiz s\'implique au maximum pour respecter les 2 choses les plus importantes à nos yeux, votre corps et notre planète ! C’est pourquoi nous collaborons avec de petits producteurs qui proposent des produits bio, des associations ou organismes locaux qui souhaitent faire évoluer les habitudes de consommation avec nous.\r\n\r\n', '2023-06-21 09:26:26', '4407153.png'),
(5, 'Pas d’inspiration pour vos plats ?', 'Cessez de vous prendre la tête à construire des listes de courses en essayant de ne rien oublier, nous pensons et rassemblons tous les produits nécessaires pour vous…', '2023-06-21 09:27:37', '3698934.png');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `subject` varchar(156) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `image_url`, `author`, `rating`, `subject`, `content`, `date_add`) VALUES
(1, NULL, 'Maggie L', 4, 'Pas d’iUn gain de temps', '\"Le batch-cooking a complètement trans formé ma routine culinaire. Des repas savoureux, une organisation simplifiée et un gain de temps précieux. Je ne peux plus m\'en passer !\" ', '2023-06-21 09:35:04'),
(3, NULL, 'William G', 5, 'Des plats équilibrés', 'Grâce au batch-cooking proposé par WIZKITCHEN , je redécouvre le plaisir de manger sainement sans passer des heures en cuisine. Une solution pratique et délicieuse pour des repas équilibrés au quotidien.', '2023-06-21 09:38:07'),
(4, NULL, 'Jeanne T', 5, 'Économique et écologique !', 'Les services de batch-cooking de WIZKITCHEN ont révolutionné ma façon de cuisiner. Des plats délicieux prêts en un clin d\'œil, parfait pour les journées chargées ! ', '2023-06-21 09:43:02');

-- --------------------------------------------------------

--
-- Structure de la table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_like` tinyint(1) DEFAULT NULL,
  `date_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blogs`
--

INSERT INTO `blogs` (`id`, `label`, `image_url`, `description`, `is_like`, `date_add`) VALUES
(1, 'Nos astuces et recettes', '46861116 (1).png', 'Nous partageons tout notre savoir sur la cuisine pour vous aider à vous tourner vers une alimentation saine et bonne. Conseils, recettes, études, interview… Trouvez ici tout ce dont vous avez besoin pour comprendre votre alimentation. Retrouvez également toutes les infos sur nos ateliers et événements.', NULL, '2023-06-21 20:00:59'),
(2, 'Ou trouver ces ingrédients', '35779016 (1).png', 'Nous partageons tout notre savoir sur la cuisine pour vous aider à vous tourner vers une alimentation saine et bonne. Conseils, recettes, études, interview… Trouvez ici tout ce dont vous avez besoin pour comprendre votre alimentation. Retrouvez également toutes les infos sur nos ateliers et événements.', NULL, '2023-06-21 20:03:03'),
(3, 'Ou trouver ces ingrédients', '84820522.png', 'Nous travaillons en collaboration avec des acteurs locaux qui, comme nous, respectent leur environnement afin de mieux vous servir.', NULL, '2023-06-21 20:05:50'),
(4, 'Les gestes que nous soutenons ', '73665321.png', 'Nous sommes à une époque où chacun doit montrer l’exemple et chaque bon geste mérite d’être mit sous la lumière, alors voici les initiatives de partenaires qui nous donnent le sourire.', NULL, '2023-06-21 20:06:24'),
(5, 'Des questions ? ', '86204622.png', 'Vous souhaitez en savoir plus sur nous, nos services ou de comment nous est venu l’idée et comment nous avons monté tout ça ? N’hésitez pas à nous poser vos questions et on y répondra le plus rapidement possible. ', NULL, '2023-06-21 20:06:56'),
(6, 'Nos astuces et recettes', '53589619.png', 'Vous souhaitez en savoir plus sur nous, nos services ou de comment nous est venu l’idée et comment nous avons monté tout ça ? N’hésitez pas à nous poser vos questions et on y répondra le plus rapidement possible.', NULL, '2023-06-21 20:10:24'),
(7, 'Les gestes que nous soutenons ', '22386023.png', 'Vous souhaitez en savoir plus sur nous, nos services ou de comment nous est venu l’idée et comment nous avons monté tout ça ? N’hésitez pas à nous poser vos questions et on y répondra le plus rapidement possible.', NULL, '2023-06-21 20:14:35'),
(8, 'Les gestes que nous soutenons', '35556422.png', 'Vous souhaitez en savoir plus sur nous, nos services ou de comment nous est venu l’idée et comment nous avons monté tout ça ? N’hésitez pas à nous poser vos questions et on y répondra le plus rapidement possible.', NULL, '2023-06-21 22:35:13'),
(9, 'Les gestes que nous soutenons', '18456222.png', 'Vous souhaitez en savoir plus sur nous, nos services ou de comment nous est venu l’idée et comment nous avons monté tout ça ? N’hésitez pas à nous poser vos questions et on y répondra le plus rapidement possible.', NULL, '2023-06-21 22:52:52');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(126) NOT NULL,
  `date_add` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date_add`, `active`) VALUES
(1, 'ngoualemariel1@gmail.com', '2023-06-21 12:09:17', 1);

-- --------------------------------------------------------

--
-- Structure de la table `producteurs`
--

CREATE TABLE `producteurs` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `producteurs`
--

INSERT INTO `producteurs` (`id`, `label`, `description`, `date_add`, `image_url`) VALUES
(1, 'Les partenariats', 'Des associations et coopératives qui comme nous souhaitent faire évoluer les habitudes alimentaires, nous aident en nous fournissant des produits qui respectent la terre et votre santé.', '2023-06-21 09:49:52', '648098.png'),
(2, 'Nos producteurs', 'Que diriez-vous de savoir ce qu’il y a dans votre assiette ? Voici nos petits producteurs locaux de longue date. Et maintenant, vous savez tout !', '2023-06-21 09:53:00', '7610439.png'),
(3, 'Nos producteurs', 'Que diriez-vous de savoir ce qu’il y a dans votre assiette ? Voici nos petits producteurs locaux de longue date. Et maintenant, vous savez tout !', '2023-06-21 09:54:30', '2401710.png'),
(4, 'Nos producteurs', 'Que diriez-vous de savoir ce qu’il y a dans votre assiette ? Voici nos petits producteurs locaux de longue date. Et maintenant, vous savez tout !', '2023-06-21 09:55:32', '96634311.png'),
(5, 'Où trouver leurs produits ?', 'Découvrez les fiches descriptives de chaque producteur local avec qui nous collaborons pour découvrir où nous allons chercher les ingrédients de vos plats.', '2023-06-21 10:00:02', '9544225.png'),
(6, 'Nos partenaires', 'Découvrez également les associations et coopératives qui nous aident dans notre projet…', '2023-06-21 10:02:13', '38873410.png'),
(7, 'ÉCOLE - RESTAURANT DES TULIPES', 'Découvrez également les associations et coopératives qui nous aident dans notre projet…', '2023-06-21 10:05:22', '7136359.png'),
(8, 'LA CANTINE DU 11', 'Découvrez également les associations et coopératives qui nous aident dans notre projet…', '2023-06-21 10:06:24', '27306612.png'),
(9, 'GROUND CONTROL', 'Découvrez également les associations et coopératives qui nous aident dans notre projet…', '2023-06-21 10:07:37', '12505113.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ateliers`
--
ALTER TABLE `ateliers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `producteurs`
--
ALTER TABLE `producteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ateliers`
--
ALTER TABLE `ateliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `producteurs`
--
ALTER TABLE `producteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
