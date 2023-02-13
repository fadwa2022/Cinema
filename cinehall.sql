-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 fév. 2023 à 12:21
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinehall`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id`, `name`, `image`) VALUES
(1, 'Sandra Bullock', 'assets/img/SandraBullock.jpg'),
(2, 'Tom Hank', 'assets/img/TomHanks.webp'),
(3, 'Will Smith', 'assets/img/WillSmith.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `halls`
--

INSERT INTO `halls` (`id`, `label`, `movie`) VALUES
(3, 'dfghj', 11),
(4, 'dfghj', 2),
(5, 'fghj', 9);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id_movie`, `title`, `image`, `description`) VALUES
(1, 'The Imitation Game', 'https://m.media-amazon.com/images/M/MV5BOTgwMzFiMWYtZDhlNS00ODNkLWJiODAtZDVhNzgyNzJhYjQ4L2ltYWdlXkEyXkFqcGdeQXVyNzEzOTYxNTQ@._V1_.jpg', 'Benedict Cumberbatch, Keira Knightley'),
(2, 'Game Night', 'https://m.media-amazon.com/images/M/MV5BMjI3ODkzNDk5MF5BMl5BanBnXkFtZTgwNTEyNjY2NDM@._V1_.jpg', 'Jason Bateman, Rachel McAdams'),
(3, 'Game of Thrones', 'https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_.jpg', 'Emilia Clarke, Peter Dinklage'),
(4, 'The Game', 'https://m.media-amazon.com/images/M/MV5BNWQ2ODFhNWItNTA4NS00MzkyLTgyYzUtZjlhYWE5MmEzY2Q1XkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_.jpg', 'Michael Douglas, Deborah Kara Unger'),
(5, 'Squid Game', 'https://m.media-amazon.com/images/M/MV5BYWE3MDVkN2EtNjQ5MS00ZDQ4LTliNzYtMjc2YWMzMDEwMTA3XkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_.jpg', 'Lee Jung-jae, Park Hae-soo'),
(6, 'Game-Show', 'https://m.media-amazon.com/images/I/314t8YNB69L.png', 'Top 50 Game-Show Movies and TV Shows'),
(7, 'The Game', 'https://m.media-amazon.com/images/M/MV5BZjYyMDVhMzEtNmM4ZS00YzliLWExOWEtMzRjZmFkZTk2YjI0XkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_.jpg', 'Wendy Raquel Robinson, Hosea Chanchez'),
(8, 'Molly\'s Game', 'https://m.media-amazon.com/images/M/MV5BNTkzMzRlYjEtMTQ5Yi00OWY3LWI0NzYtNGQ4ZDkzZTU0M2IwXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg', 'Jessica Chastain, Idris Elba'),
(9, 'How to Train Your Dragon', 'https://m.media-amazon.com/images/M/MV5BMjA5NDQyMjc2NF5BMl5BanBnXkFtZTcwMjg5ODcyMw@@._V1_.jpg', 'Jay Baruchel, Gerard Butler'),
(10, 'How to Train Your Dragon: Homecoming', 'https://m.media-amazon.com/images/M/MV5BMTlkZjM1MDctZTZlOC00NDQwLTg3ZGEtNTJhMWQ2YWIxNGViXkEyXkFqcGdeQXVyMjQ5MjYwNDE@._V1_.jpg', 'Jay Baruchel, America Ferrera'),
(11, 'How to Train Your Dragon 2', 'https://m.media-amazon.com/images/M/MV5BMzMwMTAwODczN15BMl5BanBnXkFtZTgwMDk2NDA4MTE@._V1_.jpg', 'Jay Baruchel, Cate Blanchett'),
(12, 'How to Train Your Dragon: Snoggletog Log', 'https://m.media-amazon.com/images/M/MV5BNDhjZWY0ZTMtOGY0Yy00ZWY2LTg1MzMtNjE0YzhjZmUyY2Y2XkEyXkFqcGdeQXVyMTEwNTU2NzM3._V1_.jpg', ''),
(13, 'How to Train Your Dragon: The Hidden World', 'https://m.media-amazon.com/images/M/MV5BMjIwMDIwNjAyOF5BMl5BanBnXkFtZTgwNDE1MDc2NTM@._V1_.jpg', 'Jay Baruchel, America Ferrera'),
(14, 'Dreamworks How to Train Your Dragon Legends', 'https://m.media-amazon.com/images/M/MV5BMTQzMjE5NDQwMl5BMl5BanBnXkFtZTgwMjI2NzA2MDE@._V1_.jpg', 'Jay Baruchel, Gerard Butler'),
(15, 'Dreamworks How to Train Your Dragon Legends', 'https://m.media-amazon.com/images/M/MV5BODdhMzNjNGItYmUzMC00NWM5LTgyYmEtNzI3YjFlNGY5MTkyXkEyXkFqcGdeQXVyNTM3MDMyMDQ@._V1_.jpg', 'Christopher Mintz-Plasse, Jay Baruchel'),
(16, 'How to Train Your Dragon: Viking-Sized Cast', 'https://m.media-amazon.com/images/M/MV5BYzY1M2RjZGEtMGI5NS00YmJjLWFiN2MtMDgxYTk1ODNkNzljXkEyXkFqcGdeQXVyNDQ5MDYzMTk@._V1_.jpg', 'Bonnie Arnold, Jay Baruchel');

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `reserver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`id`, `hall`, `reserver`) VALUES
(1, 3, 1),
(2, 3, NULL),
(3, 3, NULL),
(4, 3, NULL),
(5, 3, NULL),
(6, 3, NULL),
(7, 3, NULL),
(8, 3, NULL),
(9, 3, NULL),
(10, 3, NULL),
(11, 4, 0),
(12, 4, NULL),
(13, 4, NULL),
(14, 4, NULL),
(15, 4, NULL),
(16, 4, NULL),
(17, 4, NULL),
(18, 4, NULL),
(19, 4, NULL),
(20, 4, NULL),
(21, 5, NULL),
(22, 5, NULL),
(23, 5, NULL),
(24, 5, NULL),
(25, 5, NULL),
(26, 5, NULL),
(27, 5, NULL),
(28, 5, NULL),
(29, 5, NULL),
(35, 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `costumer` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `costumer`, `seat`, `hall`, `movie`, `date`) VALUES
(9, 1, 1, 3, 11, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `identifier`, `full_name`, `email`, `password`, `role`) VALUES
(1, 'eec47fc02ccbda3f1bca255e6be99efc', 'Fadwa', 'Fadwa@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', NULL),
(3, '1cc3ae3f697c3ac2029b6caf1e967772', 'fadwa', 'fadwa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movie`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall` (`hall`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costumer` (`costumer`),
  ADD KEY `hall` (`hall`),
  ADD KEY `movie` (`movie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id_movie`);

--
-- Contraintes pour la table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`hall`) REFERENCES `halls` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`costumer`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`hall`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`movie`) REFERENCES `movies` (`id_movie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
