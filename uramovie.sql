-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2019 at 09:43 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uramovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Liste des acteurs';

--
-- Dumping data for table `acteurs`
--

INSERT INTO `acteurs` (`id`, `nom`, `description`) VALUES
(1, 'Leonardo DiCaprio', ''),
(2, 'Jim Carrey', ''),
(3, 'Tom Hawks', ''),
(4, 'Tom Hanks', ''),
(5, 'Gnakouri Okou', '');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(128) NOT NULL,
  `synopsis` text NOT NULL,
  `url_Jacket` text NOT NULL,
  `duree` time NOT NULL,
  `url_bande_annonce` text NOT NULL,
  `acteur_s` text NOT NULL,
  `realisateur_s` text NOT NULL,
  `genre_s` text NOT NULL,
  `date_sortie` date NOT NULL,
  `ajouter_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COMMENT='Liste des films';

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `titre`, `synopsis`, `url_Jacket`, `duree`, `url_bande_annonce`, `acteur_s`, `realisateur_s`, `genre_s`, `date_sortie`, `ajouter_le`, `lang`) VALUES
(1, 'Avengers : Endgame', 'Avengers : Endgame  streaming, ou Avengers : Phase finale au Qu&eacute;bec est un film am&eacute;ricain r&eacute;alis&eacute; par Anthony et Joe Russo, sorti en 2019. Il met en sc&egrave;ne l&rsquo;&eacute;quipe de super-h&eacute;ros des comics Marvel, les Avengers.\r\n\r\nLe Titan Thanos ayant r&eacute;ussi &agrave; s&rsquo;approprier les six Pierres d&rsquo;Infinit&eacute; et &agrave; les r&eacute;unir sur le Gantelet dor&eacute;, il a pu r&eacute;aliser son objectif de pulv&eacute;riser la moiti&eacute; de la population de l&rsquo;Univers d&rsquo;un claquement de doigts. Les quelques Avengers et Gardiens de la Galaxie ayant surv&eacute;cu, Captain America, Thor, Natasha Romanoff, Bruce Banner, War Machine, N&eacute;bula et Rocket, esp&egrave;rent r&eacute;parer le m&eacute;fait de Thanos. Ils le retrouvent mais il s&rsquo;av&egrave;re que ce dernier a d&eacute;truit les pierres et Thor le d&eacute;capite. Cinq ans plus tard, alors que chacun essaie de continuer sa vie et d&rsquo;oublier les nombreuses pertes dramatiques, Scott Lang, alias Ant-Man, parvient &agrave; s&rsquo;&eacute;chapper de la dimension subatomique o&ugrave; il &eacute;tait coinc&eacute; depuis la disparition du Docteur Hank Pym, de sa femme Janet Van Dyne et de sa fille Hope Van Dyne. Lang propose aux Avengers une solution pour faire revenir &agrave; la vie tous les &ecirc;tres disparus, dont leurs alli&eacute;s et co&eacute;quipiers : r&eacute;cup&eacute;rer les Pierres d&rsquo;Infinit&eacute; dans le pass&eacute; gr&acirc;ce &agrave; l&rsquo;univers quantique. Pour ce faire, &agrave; l&rsquo;aide des connaissances scientifiques de Bruce Banner et de Tony Stark, ils vont se scinder en plusieurs groupes pour partir chercher les gemmes dans diverses &eacute;poques pass&eacute;es&hellip;', '5d428e27dce3a1.68893366.jpg', '00:00:00', 'https://www.youtube.com/watch?v=wV-Q0o2OQjQ', 'Jim Carrey,Tom Hanks,Leonardo DiCaprio', 'Anthony Russo, Chris Castaldi, Edward Catley, Joe Russo, Mark Johnston, Simon Downes', 'Action, Aventure, Science-Fiction', '2019-04-24', '2019-08-20 09:10:53', ''),
(3, 'Aquaman', 'Aquaman streaming, En 1985 dans le Maine, le gardien de phare Tom Curry d&eacute;couvre Atlanna, une Atlante bless&eacute;e, qu&rsquo;il recueille et soigne. L&rsquo;homme de la terre et la femme de la mer tombent vite amoureux. De leur amour na&icirc;t un fils, Arthur. Lorsque les hommes du roi de l&rsquo;Atlantide retrouvent sa promise Atlanna, celle-ci doit retourner dans son royaume et laisser son fils &agrave; Tom, craignant que les Atlantes ne les tuent tous les trois si elle ne revient pas.', '5d428fa1a9c7c7.79950189.jpg', '00:00:00', 'https://www.youtube.com/watch?v=wV-Q0o2OQjQ', 'Jim Carrey,Tom Hanks,Leonardo DiCaprio', 'James Wan', 'Action, Aventure, Fantastique, Science-Fiction', '2018-12-07', '2019-08-20 09:43:09', ''),
(5, 'Captain America', 'Captain America  Civil War streaming,  Le Soldat de l&rsquo;Hiver (alias Bucky Barnes) a autrefois &eacute;t&eacute; reconditionn&eacute; dans une base militaire sovi&eacute;tique sib&eacute;rienne et hypnotis&eacute; &agrave; l&rsquo;aide de certains mots. Quiconque prononce ces mots en russe plonge le Soldat de l&rsquo;Hiver en transe et peut lui donner n&rsquo;importe quel ordre sans qu&rsquo;il puisse d&eacute;sob&eacute;ir. C&rsquo;est ainsi qu&rsquo;en 1991, le Soldat de l&rsquo;Hiver a provoqu&eacute; l&rsquo;arr&ecirc;t brutal d&rsquo;une voiture pour s&rsquo;emparer dans son coffre d&rsquo;une valise avec un &eacute;trange contenu.\r\n\r\nAujourd&rsquo;hui, &agrave; Lagos au Nigeria, les Avengers essaient de neutraliser un commando de mercenaires dirig&eacute; par Brock Rumlow (alias Crossbones, un vieil ennemi de Captain America, en train d&rsquo;attaquer un institut pour maladies infectieuses. Rumlow s&rsquo;empare d&rsquo;une arme biologique et la confie &agrave; l&rsquo;un de ses &eacute;quipiers. Les mercenaires tentent de s&rsquo;&eacute;chapper mais sont rattrap&eacute;s par les Avengers. Rumlow pr&eacute;f&egrave;re rester pour combattre Captain America. Apr&egrave;s le combat, Rumlow distrait Rogers en lui parlant de Bucky Barnes pour tenter de d&eacute;clencher une ceinture d&rsquo;explosifs qu&rsquo;il porte en cachette. Afin d&rsquo;emp&ecirc;cher que Rumlow ne mette des civils en danger, Wanda Maximoff cr&eacute;e un champ de force autour de lui et l&rsquo;envoie dans les airs, mais il explose pr&egrave;s d&rsquo;un immeuble habit&eacute; et provoque la mort de nombreux civils.\r\n\r\nAux &Eacute;tats-Unis, Tony Stark se pr&eacute;sente &agrave; une conf&eacute;rence du MIT pour annoncer &agrave; des jeunes &eacute;tudiants (ayant des projets pour am&eacute;liorer l&rsquo;avenir) que la Fondation Septembre (dont Pepper Potts est la pr&eacute;sidente) leur accorde sa premi&egrave;re bourse, mais pense de plus en plus &agrave; ses d&eacute;funts parents qui lui manquent et &agrave; Pepper qui a rompu avec lui. Il croise alors une femme venue le confronter &agrave; ses responsabilit&eacute;s : elle avait un fils que les Avengers ont tu&eacute; par accident lors de la bataille contre Ultron en Sokovie.', '5d429246579a19.95226496.jfif', '02:27:00', 'https://www.youtube.com/watch?v=tdFmJ8LR2PQ', 'Jim Carrey,Leonardo DiCaprio', 'Anthony Russo, Joe Russo', 'Action, Aventure, Science-Fiction, Thriller', '2016-04-27', '2019-08-20 09:43:18', ''),
(6, 'Creed 2', 'Creed 2 streaming, La vie est devenue un num&eacute;ro d&rsquo;&eacute;quilibriste pour Adonis Creed. Entre obligations personnelles et entra&icirc;nement pour son prochain grand combat, il est &agrave; la hauteur du d&eacute;fi de sa vie. Affronter un adversaire qui a des liens avec le pass&eacute; de sa famille ne fait qu&rsquo;intensifier son combat imminent sur le ring. Rocky Balboa est l&agrave; &agrave; ses c&ocirc;t&eacute;s tout au long de sa vie et, ensemble, Rocky et Adonis vont affronter leur h&eacute;ritage commun, se demander pour quoi il vaut la peine de se battre et d&eacute;couvrir que rien n&rsquo;est plus important que la famille. Creed II, c&rsquo;est un retour aux sources pour red&eacute;couvrir ce qui a fait de vous un champion et se rappeler que, peu importe o&ugrave; vous allez, vous ne pouvez pas &eacute;chapper &agrave; votre histoire.', '5d42956e4643e0.97690429.jpg', '00:00:00', 'https://www.youtube.com/watch?v=AdS5ux3G-Gc', 'Jim Carrey,Leonardo DiCaprio', 'Steven Caple Jr.', 'Action, Drame', '2018-11-21', '2019-08-20 09:43:19', ''),
(23, 'test', 'test', '5d43f5d90e0c37.14987987.jpg', '00:00:00', 'test', '', 'test', 'test', '2019-08-08', '2019-08-20 08:17:16', ''),
(24, 'test', 'test', '5d43f6cf994731.18340632.jpg', '00:00:00', 'test', 'Gnakouri Okou', 'Steven Spielberg', 'test', '2019-08-15', '2019-08-02 08:39:43', ''),
(25, 'test', 'tes', '5d43f78e4af4b4.60212124.jpg', '00:00:00', 'https://www.youtube.com/watch?v=wV-Q0o2OQjQ', 'Jim Carrey,Leonardo DiCaprio', 'Steven Spielberg', 'Action, Aventure, Science-Fiction', '2019-08-08', '2019-08-20 09:43:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`, `description`) VALUES
(1, 'Action', ''),
(2, 'Romance', '');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Film` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Film` (`id_Film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `realisateurs`
--

DROP TABLE IF EXISTS `realisateurs`;
CREATE TABLE IF NOT EXISTS `realisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Liste des réalisateurs';

--
-- Dumping data for table `realisateurs`
--

INSERT INTO `realisateurs` (`id`, `nom`, `description`) VALUES
(1, 'Steven Spielberg', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_Film`) REFERENCES `films` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
