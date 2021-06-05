-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 mai 2021 à 13:52
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `techplus`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `table` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `user_id`, `quantity`, `total`) VALUES
(3, 12, 2, 3880),
(4, 12, 6, 6980),
(5, 12, 1, 600),
(6, 12, 4, 6530),
(7, 12, 2, 4700),
(11, 12, 3, 4150);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id_c` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `id_table` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id_c`, `id_u`, `id_p`, `id_table`, `quantity`) VALUES
(3, 12, 2, 2, 1),
(3, 12, 10, 1, 1),
(4, 12, 9, 1, 1),
(4, 12, 10, 1, 1),
(4, 12, 11, 1, 1),
(4, 12, 6, 2, 1),
(4, 12, 3, 2, 1),
(4, 12, 2, 2, 1),
(5, 12, 16, 4, 1),
(6, 12, 2, 2, 1),
(6, 12, 9, 1, 1),
(6, 12, 6, 3, 1),
(6, 12, 17, 4, 1),
(7, 12, 9, 1, 1),
(7, 12, 3, 2, 1),
(11, 12, 7, 3, 1),
(11, 12, 9, 1, 1),
(11, 12, 16, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `imprimante`
--

CREATE TABLE `imprimante` (
  `id` int(11) NOT NULL,
  `nom_i` varchar(30) NOT NULL,
  `image_i` longblob NOT NULL,
  `marque` varchar(20) NOT NULL,
  `prix_i` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `imprimante`
--

INSERT INTO `imprimante` (`id`, `nom_i`, `image_i`, `marque`, `prix_i`, `quantite`, `keywords`, `description`) VALUES
(15, 'printer epson', 0x6570736f6e207072696e7465722e6a706567, 'epson', 600, 100, 'printer epson', 'Printer epson'),
(16, 'printer hp', 0x4850207072696e7465722e6a7067, 'HP', 600, 100, 'printer hp', 'printer hp'),
(17, 'printer hp', 0x68702d7072696e7465722e6a7067, 'HP', 700, 200, 'printer hp', 'printer hp'),
(18, 'printer canon', 0x696d7072696d616e74652063616e6f6e2e6a7067, 'canon', 500, 100, 'printer canon', 'printer canon'),
(19, 'printer canon', 0x696d7072696d616e74652d63616e6f6e2e6a7067, 'canon', 700, 100, 'printer conan', 'printer canon'),
(20, 'printer epson', 0x696d7072696d616e74652d6570736f6e2e6a7067, 'epson', 800, 400, 'printer epson', 'printer epson'),
(21, 'printer hp', 0x696d7072696d616e74652d68702e6a7067, 'HP', 900, 400, 'printer hp', 'printer hp'),
(22, 'printer laser', 0x6c617365722d7072696e7465722e6a7067, 'laser', 900, 400, 'printer laser', 'printer laser'),
(23, 'printer', 0x7072696e7465722e706e67, 'epson', 1000, 400, 'printer epson', 'printer epson'),
(24, 'printer canon', 0x7072696e7465722d63616e6f6e2e706e67, 'canon', 1200, 400, 'printer canon', 'printer canon');

-- --------------------------------------------------------

--
-- Structure de la table `ordinateur`
--

CREATE TABLE `ordinateur` (
  `id` int(11) NOT NULL,
  `nom_o` varchar(30) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `prix_o` double NOT NULL,
  `couleur_o` varchar(20) NOT NULL,
  `image_o` longblob NOT NULL,
  `quantite_o` int(11) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ordinateur`
--

INSERT INTO `ordinateur` (`id`, `nom_o`, `marque`, `prix_o`, `couleur_o`, `image_o`, `quantite_o`, `keywords`, `description`) VALUES
(2, 'PC Gamer ', 'Asus', 2680, '', 0x4f49502e6a7067, 10, 'pc gamer asus', 'PC Gamer Asus'),
(3, 'Macbook', 'Apple', 3500, '', 0x6d6163626f6f6b2d73656c6563742d676f6c642d3230313730365f47454f5f55532e6a7067, 5, 'macbook apple', 'Macbook Apple'),
(6, 'Acer Laptop', 'Acer', 800, '', 0x61636572206c6170746f702e6a7067, 100, 'acer laptop', 'Acer Laptop'),
(7, 'Acer Computer', 'acer', 900, '', 0x616365722e6a7067, 400, 'acer computer pc laptop', 'acer computer'),
(9, 'Notebook Laptop', 'Notebook', 600, '', 0x6c6170746f702d6e6f7465626f6f6b2e6a7067, 100, 'laptop notebook', 'Notebook Laptop'),
(10, 'Lenovo PC', 'lenovo', 1200, '', 0x6c656e6f766f2e6a7067, 500, 'lenovo pc ', 'Lenovo computer'),
(13, 'Gaming Laptop', 'Mi', 1300, '', 0x6d692d67616d696e672d6c6170746f702e6a7067, 400, 'mi laptop gamer', 'Mi Gaming Laptop'),
(15, 'walmart pc', 'walmart', 1700, '', 0x77616c6d6172742d70632e6a7067, 600, 'walmart pc', 'walmart pc');

-- --------------------------------------------------------

--
-- Structure de la table `root`
--

CREATE TABLE `root` (
  `id` int(11) NOT NULL,
  `nom_r` varchar(20) NOT NULL,
  `mail_r` varchar(30) NOT NULL,
  `password_r` varchar(20) NOT NULL,
  `prenom_r` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `root`
--

INSERT INTO `root` (`id`, `nom_r`, `mail_r`, `password_r`, `prenom_r`) VALUES
(1, 'hachaichi', 'zeineb.hach@gmail.com', '0000', 'zeineb'),
(14, 'Chtioui', 'skander.chtioui@gmail.com', '0000', 'Skander'),
(15, 'Maatallah', 'oumaima.maatallah@gmail.com', '0000', 'Oumaima');

-- --------------------------------------------------------

--
-- Structure de la table `smartphone`
--

CREATE TABLE `smartphone` (
  `id` int(11) NOT NULL,
  `nom_s` varchar(30) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `prix_s` int(11) NOT NULL,
  `couleur_s` varchar(20) NOT NULL,
  `image_s` longblob NOT NULL,
  `quantite` int(11) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `smartphone`
--

INSERT INTO `smartphone` (`id`, `nom_s`, `marque`, `prix_s`, `couleur_s`, `image_s`, `quantite`, `keywords`, `description`) VALUES
(9, 'Huawei phone', 'huawei', 1200, '', 0x6875617765692e6a7067, 400, 'Huawei phone', 'huawei phone'),
(10, 'iphone', 'apple', 1200, '', 0x6970686f6e652e6a7067, 400, 'iphone apple', 'iphone apple'),
(11, 'iphone 12', 'apple', 1300, '', 0x6970686f6e652d31322d70726f2d636f6e636570742d6e6f69722e6a7067, 400, 'iphone 12 apple', 'iphone apple');

-- --------------------------------------------------------

--
-- Structure de la table `tablette`
--

CREATE TABLE `tablette` (
  `id` int(11) NOT NULL,
  `nom_t` varchar(30) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `prix_t` double NOT NULL,
  `couleur_t` varchar(20) NOT NULL,
  `image_t` longblob NOT NULL,
  `quantite_t` int(11) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tablette`
--

INSERT INTO `tablette` (`id`, `nom_t`, `marque`, `prix_t`, `couleur_t`, `image_t`, `quantite_t`, `keywords`, `description`) VALUES
(6, 'Tablet Acer', 'Acer', 2650, '', 0x61636572205461626c65742e6a7067, 500, 'tablet acer', 'Tablet acer'),
(7, 'Tablet', 'HP', 2350, '', 0x4850205461626c65742e6a7067, 800, 'tablet windows ', 'Tablet with windows as an operating system'),
(9, 'Tablet Ezpad', 'Ezpad', 900, '', 0x7461626c657420657a7061642e6a7067, 400, 'tablet ezpad', 'Ezpad-7s-10-8-Windows-Tablet-PC-HDMI-Laptop-Intel-Z8350'),
(10, 'Tablet', 'apple', 900, '', 0x7461626c65742e6a7067, 400, 'tablet apple', 'Tablet apple');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_u` int(11) NOT NULL,
  `prenom_u` varchar(20) NOT NULL,
  `nom_u` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zip` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `prenom_u`, `nom_u`, `email`, `password`, `city`, `state`, `zip`, `address`, `address2`, `tel`) VALUES
(1, 'zeineb', 'hachaichi', 'zeineb.hach@gmail.com', '0000', 'Ariana', 'Ariana', 2058, 'Ariana', '', '29 846 834'),
(3, 'Oumaima', 'Maatallah', 'oumaima@gmail.com', '0000', 'Ariana', 'State', 2058, '', '', ''),
(6, 'User', 'User', 'user@gmail.com', '0000', 'Ariana', 'State', 2058, '', '', ''),
(11, 'mariem', 'rouissi', 'm@gmail.com', '0000', 'Ariana', 'State', 2058, 'Ariana', '', '29 846 834'),
(12, 'Skander', 'Chtioui', 'skander.chtioui@gmail.com', '0000', 'Ariana', 'State', 2058, '', '', ''),
(13, 'abc', 'abc', 'abc@gmail.com', '0000', 'aa', 'Ariana', 1234, '', '', ''),
(14, 'aa', 'aa', 'aa@gmail.com', '0000', 'aa', 'Ariana', 20165, '', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `imprimante`
--
ALTER TABLE `imprimante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `smartphone`
--
ALTER TABLE `smartphone`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tablette`
--
ALTER TABLE `tablette`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `imprimante`
--
ALTER TABLE `imprimante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `root`
--
ALTER TABLE `root`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `smartphone`
--
ALTER TABLE `smartphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tablette`
--
ALTER TABLE `tablette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
