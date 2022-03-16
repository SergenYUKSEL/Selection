-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 15 mars 2022 à 13:39
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `selection`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `chl` longtext NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `lastname`, `firstname`, `email`, `password`, `confirm_password`, `role`, `chl`, `active`) VALUES
(9, 'YUKSEL', 'Sergen', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrator', 'R6CGXV33327SCFZEIUAM5DUPMJTTBTOSOPTQZOUJJMMAAKZS7BOH3HV4PDFH6LZXPJY3AS6RFRLCLMNPOTHUNE4CY3VMHTKQBB3VIWA', 'true'),
(10, 'Xavier', 'Duval', 'secretary@gmail.com', '9248e701086509b4bc618df734ef8e273db66ea0', '9248e701086509b4bc618df734ef8e273db66ea0', 'secretary', 'SOFVY3GRQAXSYNOVDPYHLIBN4OZ2USGOA72D352EDHQ7H2J6GYEOXQKUIEGPSSNBZPSEC2LMVITLSYZ6OBACVBEHJBKRU5YKPR6DJVA', 'true'),
(11, 'Vernadeau', 'Morgana', 'teacher@gmail.com', '4a82cb6db537ef6c5b53d144854e146de79502e8', '4a82cb6db537ef6c5b53d144854e146de79502e8', 'teacher', 'OTGFBUVWZYOYU3S5H42JFVR7HZQEZKRS3BRKUQVFYRF5WEMR446JO24DK3TKJQXEE35RTNV65JHG5ZXJL4UWJ3ZPNBL4SM4JGBOZIXQ', 'false'),
(12, 'YUKSEL', 'Sergen', 'sergensango@gmail.com', 'b7ef6bc321c64f8e8437b119390bbf82b4d3b43c', 'b7ef6bc321c64f8e8437b119390bbf82b4d3b43c', 'administrator', 'JMCHU446A3RTXWLQ2TYJ5C4UFO773PQDRZVWIJ2TERUZUGGYIY4B7OEV57MQSTU7T55ENU5MG6VRMOTGPKCEKZAGDP754KRK33NS66I', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `grid`
--

CREATE TABLE `grid` (
  `id` int(11) NOT NULL,
  `candidat_number` int(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `serious` varchar(50) NOT NULL,
  `absence` varchar(50) NOT NULL,
  `behavior` varchar(50) NOT NULL,
  `higher_education` varchar(50) NOT NULL,
  `avis_pp` varchar(50) NOT NULL,
  `avis_principal` varchar(50) NOT NULL,
  `motivation_letter` varchar(50) NOT NULL,
  `notice` text NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `grid`
--

INSERT INTO `grid` (`id`, `candidat_number`, `lastname`, `firstname`, `serie`, `serious`, `absence`, `behavior`, `higher_education`, `avis_pp`, `avis_principal`, `motivation_letter`, `notice`, `note`) VALUES
(1, 377272737, 'JEAN', 'Pierre', 'ES_S', 'vrai', 'faux', 'faux', 'vrai', 'B', 'B', 'B', 'Très sérieux, continuez ainsi', 20),
(5, 282299390, 'KHART', 'Lucas', 'STMG', 'vrai', 'vrai', 'faux', 'faux', 'AB', 'AB', 'AB', 'Tout juste ... à voir au début du premier semestre comment cela évolue.', 13),
(6, 238929299, 'LAMBO', 'Twing', 'STMG', 'vrai', 'faux', 'faux', 'faux', 'B', 'B', 'B', 'Très bien, élève motivé.', 18);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `grid`
--
ALTER TABLE `grid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `grid`
--
ALTER TABLE `grid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
