-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 13 fév. 2021 à 11:12
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
-- Base de données : `bdd_liliruche`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `description`) VALUES
(1, 'Miels', 'Des miels de tous les horizons, avec un goût, une texture, et des bienfaits propres à chacun.'),
(2, 'Épicerie Fine', 'Une gamme de produits fins au miel, rigoureusement sélectionnés.'),
(3, 'Bien-être', 'Découvrez nos produits soin et bien être a base de miel et d\'extraits concentrés de plantes.'),
(4, 'Coffrets Cadeaux', 'Des coffrets cadeaux pour découvrir nos produits !!!');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `description`) VALUES
(1, 'test', 'test', 'test@gmail.fr', 'Sesame snaps cupcake cotton candy. Liquorice apple pie fruitcake candy canes. Gummies sweet danish oat cake. Jelly pastry tiramisu macaroon jelly-o chupa chups jelly beans brownie cotton candy. Cake carrot cake sweet sugar plum. Liquorice halvah tiramisu pie. Cheesecake dessert bonbon liquorice fruitcake sugar plum muffin candy canes cookie.'),
(6, 'test', 'test', 'tes@gmail.com', 'je voudrais savoir ou en est arrivé pas livraison .'),
(7, 'test', 'truc', 'ylia@outlook.fr', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210203114828', '2021-02-03 11:48:50', 1425),
('DoctrineMigrations\\Version20210203115826', '2021-02-03 11:58:37', 2404);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E01FBE6A4584665A` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `product_id`, `titre`) VALUES
(39, 1, '42b13453ee0fec3dcdbddb2f269e6cb1.jpeg'),
(40, 2, 'db2dc94d24db8703d296f36f5143339d.jpeg'),
(41, 3, '9a3fad6ef4aaf8b5faad9e8f95bcdb02.jpeg'),
(42, 4, 'b8b3bb3bd6b0a765a97cf6c57edca8dc.jpeg'),
(43, 5, '6c9f945b8b8dd2718d9ff8eb4d2492f1.jpeg'),
(44, 6, '4544bc0c53797f30c3beb55eedf28293.jpeg'),
(45, 7, '854f9189db9f812d8ae221f4879c3963.jpeg'),
(46, 8, 'a5a20b39be19a05a7e72b3b552260283.jpeg'),
(47, 9, '6f1b174d489a9503ef326996e2b23b2d.jpeg'),
(48, 10, '0316e77834b693b24310b4967d08a818.jpeg'),
(49, 11, '64521766353a46462563b144b0d35211.jpeg'),
(50, 12, '7beb4c29ae92575a9363470ddb9a2263.jpeg'),
(51, 13, 'c813533cbb7e2d71fca54d8c327e79d3.jpeg'),
(52, 14, '9223ffa7fa15dbb8f0fd06b07c1bad77.jpeg'),
(53, 15, 'ff53409c940b01cb9a465a39f279ad78.png'),
(54, 16, 'cfc74b6a5317624820a1ca9c53a2d164.png'),
(55, 17, 'b681717f4a147d747cd4f8d9a8312861.png'),
(56, 18, 'ffb82189fb98e9355da9085909754c91.png'),
(57, 19, '954433505c519946ba024af758087e77.png'),
(58, 21, '81ef825c912bceef1473b3b10cad2574.jpeg'),
(59, 20, '3edaf6c1677c4c3bc8bc16574970b31b.jpeg'),
(60, 22, '85d492976c5d495d9056d75787f74592.jpeg'),
(61, 23, '23cc05bf70adbb89be795506d79af74a.jpeg'),
(62, 24, '0cfb84f1ece7181e2a7e5a92fca78b16.jpeg'),
(63, 25, 'd1c9d6b7bede4ba808ae41af4d53d327.jpeg'),
(64, 26, '8bd4a266be818ba930e999b5dbef076a.jpeg'),
(65, 27, 'f0b629ae0e8988b5374c2a5762ccd77e.jpeg'),
(66, 28, '9656e8fd34bfff6c45fd12be20b72a64.jpeg'),
(67, 29, 'aff50099a9e8caa222145e7c1338bf00.jpeg'),
(68, 30, '090a73b684fc944270ab5e54900f377c.jpeg'),
(69, 31, 'ff00cd37574e6baf8dd4846041500150.jpeg'),
(70, 32, '17b1cad4e2a448dff9ca3552d1d0d062.png'),
(71, 33, '5525b4a019ce31f36d1d4a5abf2732dd.jpeg'),
(72, 34, '140285c1c4a212be16205c709ddef4b9.jpeg'),
(73, 35, '0253f57a811d8a0acd75ca1314859438.jpeg'),
(74, 36, 'a4841af1a025e058657fbe9fc7052628.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `nom_de_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `nom_de_produit`, `description`, `prix`) VALUES
(1, 1, 'Miel de Romarin', 'Le miel de Romarin BIO Bleu Blanc Ruche est principalement travaillé sous un aspect crémeux et onctueux. De couleur jaune doré, qui reflète les heures d\'ensoleillement de la garrigue provençale, le miel de romarin BIO est très parfumé, aux senteurs d\'aromates (légèrement balsamique), avec de subtiles notes végétales.', 8),
(2, 1, 'Le miel de Ronce', 'un miel aussi rare qu\'original : doux et fruité, il rappelle la saveur d’une confiture. Sa persistance en bouche prolonge le plaisir de ce miel unique, que quiconque l’ayant goûté ne saurait oublier.', 7.5),
(3, 1, 'Le miel de Lavande', 'un classique dont on ne se lasse jamais. Ce miel frais et fleuri, aux arômes de Provence, révèle des notes florales que l’on oublie rarement. Néophytes comme passionnés apprécieront son goût délicat, sa texture crémeuse, et son parfum d’été.', 8.2),
(4, 1, 'Le miel de fleurs d\'été', 'résulté principalement du butinage des fleurs de tournesol par les abeilles. Ce miel, facile à tartiner, est vif et frais en bouche. Très abordable, le miel de fleurs d’été est celui qu’il faut garder à portée de main pour une utilisation au quotidien.', 5.49),
(5, 1, 'Miel de Foret', 'Respirez la bonne odeur de la forêt avec des senteurs de sous-bois et de feuilles mortes. Le miel de forêt est le plus souvent brun foncé et liquide avec un parfum tannique, atypique et boisé. Le miel de forêt est une alternative économique aux miels BIO.', 6.59),
(6, 1, 'Le miel d\'Acacia', 'un miel Bleu Blanc Ruche origine France garantie. Facile et savoureux, capable de séduire les petits comme les grands. Sa douceur charmera les néophytes comme les passionnés de miel, qui l’utiliseront notamment pour son pouvoir sucrant, afin de remplacer le sucre dans leurs desserts ou leurs boissons chaudes.', 8.89),
(7, 1, 'Le miel français de tilleul', 'un miel surprenant : on le reconnaît en bouche à son goût frais et mentholé. Certains lui reconnaissent des vertus apaisantes et recommandent sa consommation le soir, avec une infusion. D’autres préfèreront associer sa fraîcheur à des recettes fruitées. Le miel de tilleul Bleu Blanc Ruche est Origine France Garantie.', 7.59),
(8, 1, 'Le miel français de châtaignier', 'fait partie des grands classiques apicoles. Délice parmi les délices, il est à la fois puissant et corsé. Le miel bio de châtaignier est recommandé à tous ceux qui souhaitent se lancer dans la découverte des miels de France.', 8.59),
(9, 1, 'Le miel de bourdaine', 'est à la fois fruité, délicat et persistant en bouche. Ses saveurs légères en font un miel typique du petit-déjeuner, pour commencer la journée sur une note douce et plaisante. Le miel de bourdaine saura séduire les amateurs de confiture. Il s\'agit d\'un miel rare car sa production est faible.', 7.79),
(10, 1, 'Le miel de Bruyère', 'un miel de caractère. Il tire sa force des forêts des Landes où il est produit au plein cœur de l’été. Conseillé aux connaisseurs et amateurs de sensations fortes, il est prisé des gastronomes pour son amertume et ses notes salées.', 7.29),
(11, 1, 'Le miel d\'Arbousier', 'réservé aux amateurs de sensations fortes et de miels corsés. Ce miel présente de nombreuses particularités : récolté à l\'automne, il est le plus amer de tous les miels. Il présente un léger goût de brûlé à la limite du caramel, qui séduira les passionnés.Miel rare, le miel français d\'arbousier est prisé pour son goût aussi unique que puissant.', 7.49),
(12, 1, 'Le miel français de fleurs sauvages', 'est produit par des abeilles butinant dans des prairies ou des garrigues des fleurs non cultivées par l’homme. Il est par définition changeant, reflétant la terre dont il est issu. Fin et floral, il peut être légèrement plus amer qu’un miel de printemps, ce qui lui confère un caractère unique. Ce miel Bleu Blanc Ruche est à tester pour apprécier sa douceur subtile et versatile. Miel de France.', 9.99),
(13, 1, 'Le miel de fleurs de printemps', 'l\'un des premiers récoltés dans l’année. Ce miel \"passe-partout\" présente de multiples atouts. Facile à tartiner, on s\'en délecte au petit-déjeuner, sur des tartines ou dans un café. Doux et d’un goût assez neutre, il se cuisine très facilement : il remplacera élégamment le sucre dans vos préparations.', 5.79),
(14, 1, 'Le miel du bruyère callune', 'un miel très original et au goût très prononcé. Particulièrement astringent, il est réservé aux aficionados du miel qui l’apprécieront pour son amertume ou le réserveront à la réalisation de pains d’épices maison. Le miel de callune est rare et très apprécié dans les pays germaniques et dans l\'Est de la France.', 6.99),
(15, 2, 'pain d\'épices à l\'orange et pépites de chocolat', 'Du miel et des épices…Le choix d’un miel de toute première qualité, un subtil équilibre entre 7 épices dont la liste est tenue secrète. Voilà ce qui donne son goût inimitable à un bon pain d’épices.', 8.99),
(16, 2, 'Pain d\'épices aux amandes et noisettes', 'Pain d\'épices garni d\'inclusions généreuses d\'amandes et de noisettes qui apportent une délicieuse texture croquante. Irrésistible !', 9.99),
(17, 2, 'Pain d\'épices à la myrtille', 'Un pain d\'épices gourmand en version fruitée. Les inserts de myrtille rajoutent une saveur originale à la douceur du miel et des épices. Un délice !', 7.5),
(18, 2, 'Pain d\'épices à la mirabelle', 'Un goût inimitable !!!', 5.25),
(19, 2, 'Pain d\'épices pur miel', 'Ce pain d’épices est composé de 55% de miel pur sans sirop de sucre ou agent sucrant.', 7.35),
(20, 2, 'Mini Tartelette au miel bio', 'Une pâte sablée à la noisette et aux noix avec en son cœur une touche de confiture à la framboise.', 5.5),
(21, 2, 'Sablés au miel bio et citron', 'Petit gâteau au beurre et aux écorces de citron, fabriqué selon une recette authentique.', 4.5),
(22, 2, 'SABLÉS SPÉCULOOS', 'BIO À LA CANNELLE ET AU MIEL', 4.5),
(23, 2, 'Confiture extra orange banane', 'La confiture extra de banane orange sucrée au miel possède un goût fruité supérieur. Lorsqu\'on a goûté une confiture sucrée au miel, on ne désire plus goûter une autre.', 7.5),
(24, 2, 'Confiture extra de figues', 'La confiture extra de figues sucrée au miel possède un goût fruité supérieur. Lorsqu\'on a goûté une confiture sucrée au miel, on ne désire plus goûter une autre.', 5.99),
(25, 2, 'Confiture Fraises au miel de romarin', 'Une confiture créer exclusivement pour Lili ruche et élaborée avec notre miel de romarin.', 6.5),
(26, 2, 'Confiture extra d\'abricots sucrée au miel', 'Une confiture sucrée au miel possède un goût fruité supérieur.', 4.5),
(27, 2, 'Confiture Poires au miel de tilleul', 'Une confiture créer exclusivement pour Lili ruche et élaborée avec notre miel de tilleul.', 4.5),
(28, 2, 'Moutarde douce saveur Pain d\'épices au miel', 'Moutarde fine et aromatique, idéale pour accompagner vos plats de tous les jours mais également vos plats les plus festifs !', 5.25),
(29, 2, 'Vinaigre de miel et balsamique', 'Vinaigre balsamique a base de miel bio .', 4.5),
(30, 2, 'Vinaigre de miel', 'Vinaigre de Miel aromatisé au Romarin', 5.25),
(31, 3, 'L’infusion bio nuit', 'verveine et tilleul, camomille, une délicieuse infusion pour se préparer à une bonne nuit', 4.5),
(32, 3, 'L’infusion lavande', 'Comment améliorer la qualité et la durée de son sommeil ? En un geste simple : se faire une bonne infusion de lavande fine.', 5.25),
(33, 3, 'Savon végétale au miel', 'Doux et parfumé, vous ne pourrez plus vous en passer !', 4.5),
(34, 4, 'Valisette 3 pots', 'Valisette de 3 post de miels bio de 125g', 19.9),
(35, 4, 'Petit coffret', 'Petit coffret pour découvrir une sélection de nos produits .', 16.99),
(36, 4, 'Coffret Gourmand', '1 miel de lavande 125g , une boite infusion menthe poivré , une boite de mini Tartelette au miel bio', 21.99);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `datedenaissance` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `prenom`, `nom`, `telephone`, `datedenaissance`) VALUES
(7, 'test@hotmail.com', '[]', '$2y$13$yudHxR7D5zB/oyUgSoazceBALnmH1tsNnUh30ZMtgnl6RhbELdKVC', 'test', 'test', 123242526, '1997-12-12'),
(8, 'lili@hotmail.fr', '[]', '$2y$13$kMetvmeN9aGFGR1Wy4iVeOR1ihECzf4ngXflVuVCN7bIsC/rLfQ02', 'lili', 'lili', 111121315, '1998-12-17'),
(9, 'admin@gmail.fr', '[]', '$2y$13$jc15rISlahMMxe0jf.dRwug06JhsXmrKORZasL3nmscp/z2/SLW8y', 'admin', 'admin', 112141516, '1999-12-10'),
(10, 'lili@gmail.fr', '[]', '$2y$13$4ZlS3SdG8cYeNdd7jndTfePttjqonsF9VtqH/7yl.hasmi19Tlyby', 'test', 'test', 611121314, '2016-02-12'),
(14, 'dada@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$xkiYvPlLJIfyUuxvU3NynughsWBIsQxGWj4KpcNq5YaINQ.fbPT9i', 'dada', 'dada', 7, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_E01FBE6A4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
