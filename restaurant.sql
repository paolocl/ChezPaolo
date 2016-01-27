-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 27 Janvier 2016 à 09:36
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(255) NOT NULL,
  `Password` char(255) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Admin`
--

INSERT INTO `Admin` (`AdminId`, `Name`, `Password`) VALUES
(1, 'paolo', '$2y$11$pepepdu77estunouf$1cduMdibPsCdlOXzYmaC4UR3D9OnHV67YuO');

-- --------------------------------------------------------

--
-- Structure de la table `Booking`
--

CREATE TABLE IF NOT EXISTS `Booking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_Id` int(11) DEFAULT NULL,
  `BookingDate` date NOT NULL,
  `BookingTime` time NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `NumberOfSeats` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Customer_Id` (`Customer_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Contenu de la table `Booking`
--

INSERT INTO `Booking` (`Id`, `Customer_Id`, `BookingDate`, `BookingTime`, `CreationTimestamp`, `NumberOfSeats`) VALUES
(39, 1, '2016-02-26', '17:15:00', '2016-01-19 10:16:11', 4),
(40, 1, '2016-01-31', '08:00:00', '2016-01-19 10:16:58', 5),
(41, 1, '2016-02-20', '15:25:00', '2016-01-19 10:24:00', 4),
(42, 1, '2016-02-09', '07:45:00', '2016-01-19 10:44:55', 2),
(43, 1, '2016-01-27', '09:50:00', '2016-01-19 10:49:55', 4),
(45, 1, '2016-02-22', '15:15:00', '2016-01-19 11:17:01', 4),
(46, 1, '2016-01-07', '00:00:15', '0000-00-00 00:00:00', 5),
(47, 1, '2016-01-07', '00:00:15', '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Phone` char(8) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `ZipCode` char(5) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `LastLoginTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Customer List' AUTO_INCREMENT=29 ;

--
-- Contenu de la table `Customer`
--

INSERT INTO `Customer` (`Id`, `FirstName`, `LastName`, `Birthdate`, `Email`, `Password`, `Phone`, `Address`, `Address2`, `City`, `ZipCode`, `CreationTimestamp`, `LastLoginTimestamp`) VALUES
(1, 'Paolo', 'Paolo', '2016-01-20', 'paolo@yahoo.fr', '$2y$10$F0baUBMomW0qCrMIOlvq/eGWU1sZcwa9kil6qryXKD.klMy3tJg2a', '06255889', '85, rue des boulers', '3eme etages gauche', 'Paris', '75001', '2016-01-12 10:20:19', '2016-01-26 09:30:33'),
(27, 'jean', 'jardin', '1990-03-04', 'apo@oiu.fr', '$2y$11$pepepdu77estunouf$cdfOjwSrzaDME/tT7kdt/kdM8dIZ2NwlPXW', '06258954', '02eljh', '', 'appo', '15478', '2016-01-15 16:40:59', '2016-01-15 16:40:59'),
(28, 'august', 'renoir', '1988-02-01', 'august@renoir.fr', '$2y$11$pepepdu77estunouf$af0uKR172UmjiCZV5c96FWLgZD/uQ1y2PR6', '06255852', '78 rue des alysées', '', 'paris', '75017', '2016-01-20 10:05:29', '2016-01-25 14:13:18');

-- --------------------------------------------------------

--
-- Structure de la table `Login`
--

CREATE TABLE IF NOT EXISTS `Login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `LoginIp` char(16) NOT NULL,
  `LoginTime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: failed 1:success',
  `Customer_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Customer_Id` (`Customer_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Contenu de la table `Login`
--

INSERT INTO `Login` (`Id`, `LoginIp`, `LoginTime`, `status`, `Customer_Id`) VALUES
(45, '::1', '2016-01-22 09:52:48', 0, NULL),
(46, '::1', '2016-01-22 09:52:49', 0, NULL),
(47, '::1', '2016-01-22 09:52:51', 0, NULL),
(48, '::1', '2016-01-22 09:52:53', 0, NULL),
(49, '::1', '2016-01-22 09:52:59', 0, NULL),
(50, '::1', '2016-01-22 09:53:01', 0, NULL),
(51, '::1', '2016-01-22 10:07:09', 1, 1),
(52, '::1', '2016-01-22 14:40:44', 1, 1),
(53, '::1', '2016-01-22 15:40:31', 1, 1),
(54, '::1', '2016-01-22 15:41:39', 1, 1),
(55, '::1', '2016-01-25 09:42:30', 0, NULL),
(56, '::1', '2016-01-25 09:42:33', 0, NULL),
(57, '::1', '2016-01-25 09:42:35', 0, NULL),
(58, '::1', '2016-01-25 09:42:36', 0, NULL),
(59, '::1', '2016-01-25 09:42:37', 0, NULL),
(60, '::1', '2016-01-25 09:42:39', 0, NULL),
(61, '::1', '2016-01-25 09:48:03', 1, 1),
(62, '::1', '2016-01-25 14:13:18', 1, 28),
(63, '::1', '2016-01-26 09:30:33', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Meal`
--

CREATE TABLE IF NOT EXISTS `Meal` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `Description` text NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `QuantityInStock` tinyint(4) NOT NULL,
  `BuyPrice` float NOT NULL,
  `SalePrice` float NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Products of the restaurant' AUTO_INCREMENT=8 ;

--
-- Contenu de la table `Meal`
--

INSERT INTO `Meal` (`Id`, `Name`, `Description`, `Photo`, `QuantityInStock`, `BuyPrice`, `SalePrice`) VALUES
(1, 'Coca-Cola', 'Mmmm, le Coca-Cola avec 10 morceaux de sucres et tout plein de caféine !', 'coca.jpg', 100, 0.6, 3),
(2, 'Bagel Thon', 'Notre bagel est constitué d''un pain moelleux avec des grains de sésame et du thon albacore, accompagné de feuilles de salade fraîche du jour  et d''une sauce renversante :-)', 'bagel_thon.jpg', 18, 2.75, 5.5),
(3, 'Bacon Cheeseburger', 'Ce délicieux cheeseburger contient un steak haché viande française de 150g ainsi que d''un buns grillé juste comme il faut, le tout accompagné de frites fraîches maison !', 'bacon_cheeseburger.jpg', 14, 6, 12.5),
(4, 'Carrot Cake', 'Le carrot cake maison ravira les plus gourmands et les puristes : tous les ingrédients sont naturels !\r\nÀ consommer sans modération', 'carrot_cake.jpg', 9, 3, 6.75),
(5, 'Donut Chocolat', 'Les donuts sont fabriqués le matin même et sont recouvert d''une délicieuse sauce au chocolat !', 'chocolate_donut.jpg', 16, 3, 6.2),
(6, 'Dr. Pepper', 'Son goût sucré avec de l''amande vous ravira !', 'drpepper.jpg', 53, 0.5, 2.9),
(7, 'Milkshake', 'Notre milkshake bien crémeux contient des morceaux d''Oréos et est accompagné de crème chantilly et de smarties en guise de topping. Il éblouira vos papilles !', 'milkshake.jpg', 12, 2, 5.35);

-- --------------------------------------------------------

--
-- Structure de la table `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_Id` int(11) NOT NULL,
  `TaxeRate` float NOT NULL,
  `TaxeAmount` float DEFAULT NULL,
  `TotalAmount` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `CreationTimestamp` datetime NOT NULL,
  `CompliteTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Cutomer_Id` (`Customer_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Contenu de la table `Order`
--

INSERT INTO `Order` (`Id`, `Customer_Id`, `TaxeRate`, `TaxeAmount`, `TotalAmount`, `status`, `CreationTimestamp`, `CompliteTimestamp`) VALUES
(74, 1, 0.2, NULL, NULL, 0, '2016-01-25 12:22:35', NULL),
(75, 1, 0.2, NULL, NULL, 0, '2016-01-25 12:23:18', NULL),
(76, 1, 0.2, NULL, NULL, 0, '2016-01-25 12:24:11', NULL),
(77, 1, 0.2, NULL, NULL, 0, '2016-01-25 12:27:04', NULL),
(78, 1, 0.2, NULL, NULL, 0, '2016-01-25 12:41:41', NULL),
(79, 1, 0.2, 15.48, 77.4, 0, '2016-01-25 12:51:24', NULL),
(80, 1, 0.2, 15.48, 77.4, 0, '2016-01-25 12:51:53', NULL),
(81, 1, 0.2, 15.48, 77.4, 0, '2016-01-25 12:52:09', NULL),
(82, 1, 0.2, 22.22, 111.1, 0, '2016-01-25 12:52:24', NULL),
(83, 1, 0.2, 22.22, 111.1, 0, '2016-01-25 13:02:31', NULL),
(84, 1, 0.2, 6.2, 31, 0, '2016-01-25 13:06:22', NULL),
(85, 28, 0.2, 14.04, 70.2, 0, '2016-01-25 14:13:36', '2016-01-25 14:13:36'),
(86, 28, 20, 14.04, 70.2, 0, '2016-01-25 14:15:24', '2016-01-25 14:15:24'),
(87, 28, 20, 14.04, 70.2, 0, '2016-01-25 14:15:56', '2016-01-25 14:15:56'),
(88, 28, 20, 14.04, 70.2, 0, '2016-01-25 14:16:59', '2016-01-25 14:16:59'),
(89, 28, 20, 14.04, 70.2, 0, '2016-01-25 14:58:15', '2016-01-25 14:58:15'),
(90, 28, 20, 14.04, 70.2, 0, '2016-01-25 14:59:49', '2016-01-25 14:59:49'),
(91, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:00:06', '2016-01-25 15:00:06'),
(92, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:00:49', '2016-01-25 15:00:49'),
(93, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:00:52', '2016-01-25 15:00:52'),
(94, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:00:56', '2016-01-25 15:00:56'),
(95, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:01:02', '2016-01-25 15:01:02'),
(96, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:01:20', '2016-01-25 15:01:20'),
(97, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:05:22', '2016-01-25 15:05:22'),
(98, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:11:51', '2016-01-25 15:11:51'),
(99, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:15:56', '2016-01-25 15:15:56'),
(100, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:25:31', '2016-01-25 15:25:31'),
(101, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:25:51', '2016-01-25 15:25:51'),
(102, 28, 20, 14.04, 70.2, 0, '2016-01-25 15:52:17', '2016-01-25 15:52:17'),
(103, 28, 20, 38.04, 190.2, 0, '2016-01-25 17:16:46', '2016-01-25 17:16:46'),
(104, 28, 20, 60.29, 301.45, 0, '2016-01-25 17:26:11', '2016-01-25 17:26:11'),
(105, 28, 20, 60.29, 301.45, 0, '2016-01-25 17:29:16', '2016-01-25 17:29:16'),
(106, 1, 20, 1.65, 8.25, 0, '2016-01-26 09:40:27', '2016-01-26 09:40:27');

-- --------------------------------------------------------

--
-- Structure de la table `OrderLine`
--

CREATE TABLE IF NOT EXISTS `OrderLine` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Order_Id` int(5) DEFAULT NULL,
  `Meal_Id` int(5) DEFAULT NULL,
  `Quantite` tinyint(10) NOT NULL,
  `Unitprice` float NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Order-Id` (`Order_Id`),
  KEY `Meal-Id` (`Meal_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=189 ;

--
-- Contenu de la table `OrderLine`
--

INSERT INTO `OrderLine` (`Id`, `Order_Id`, `Meal_Id`, `Quantite`, `Unitprice`) VALUES
(37, 77, 5, 5, 6.2),
(38, 77, 3, 2, 12.5),
(39, 77, 7, 4, 5.35),
(40, 78, 5, 5, 6.2),
(41, 78, 3, 2, 12.5),
(42, 78, 7, 4, 5.35),
(43, 79, 5, 5, 6.2),
(44, 79, 3, 2, 12.5),
(45, 79, 7, 4, 5.35),
(46, 80, 5, 5, 6.2),
(47, 80, 3, 2, 12.5),
(48, 80, 7, 4, 5.35),
(49, 81, 5, 5, 6.2),
(50, 81, 3, 2, 12.5),
(51, 81, 7, 4, 5.35),
(52, 82, 6, 1, 2.9),
(53, 82, 5, 6, 6.2),
(54, 82, 3, 3, 12.5),
(55, 82, 7, 5, 5.35),
(56, 82, 4, 1, 6.75),
(57, 83, 6, 1, 2.9),
(58, 83, 5, 6, 6.2),
(59, 83, 3, 3, 12.5),
(60, 83, 7, 5, 5.35),
(61, 83, 4, 1, 6.75),
(62, 84, 5, 5, 6.2),
(63, 85, 6, 1, 2.9),
(64, 85, 5, 6, 6.2),
(65, 85, 3, 1, 12.5),
(66, 85, 7, 1, 5.35),
(67, 85, 4, 1, 6.75),
(68, 85, 2, 1, 5.5),
(69, 86, 6, 1, 2.9),
(70, 86, 5, 6, 6.2),
(71, 86, 3, 1, 12.5),
(72, 86, 7, 1, 5.35),
(73, 86, 4, 1, 6.75),
(74, 86, 2, 1, 5.5),
(75, 87, 6, 1, 2.9),
(76, 87, 5, 6, 6.2),
(77, 87, 3, 1, 12.5),
(78, 87, 7, 1, 5.35),
(79, 87, 4, 1, 6.75),
(80, 87, 2, 1, 5.5),
(81, 88, 6, 1, 2.9),
(82, 88, 5, 6, 6.2),
(83, 88, 3, 1, 12.5),
(84, 88, 7, 1, 5.35),
(85, 88, 4, 1, 6.75),
(86, 88, 2, 1, 5.5),
(87, 89, 6, 1, 2.9),
(88, 89, 5, 6, 6.2),
(89, 89, 3, 1, 12.5),
(90, 89, 7, 1, 5.35),
(91, 89, 4, 1, 6.75),
(92, 89, 2, 1, 5.5),
(93, 90, 6, 1, 2.9),
(94, 90, 5, 6, 6.2),
(95, 90, 3, 1, 12.5),
(96, 90, 7, 1, 5.35),
(97, 90, 4, 1, 6.75),
(98, 90, 2, 1, 5.5),
(99, 91, 6, 1, 2.9),
(100, 91, 5, 6, 6.2),
(101, 91, 3, 1, 12.5),
(102, 91, 7, 1, 5.35),
(103, 91, 4, 1, 6.75),
(104, 91, 2, 1, 5.5),
(105, 92, 6, 1, 2.9),
(106, 92, 5, 6, 6.2),
(107, 92, 3, 1, 12.5),
(108, 92, 7, 1, 5.35),
(109, 92, 4, 1, 6.75),
(110, 92, 2, 1, 5.5),
(111, 93, 6, 1, 2.9),
(112, 93, 5, 6, 6.2),
(113, 93, 3, 1, 12.5),
(114, 93, 7, 1, 5.35),
(115, 93, 4, 1, 6.75),
(116, 93, 2, 1, 5.5),
(117, 94, 6, 1, 2.9),
(118, 94, 5, 6, 6.2),
(119, 94, 3, 1, 12.5),
(120, 94, 7, 1, 5.35),
(121, 94, 4, 1, 6.75),
(122, 94, 2, 1, 5.5),
(123, 95, 6, 1, 2.9),
(124, 95, 5, 6, 6.2),
(125, 95, 3, 1, 12.5),
(126, 95, 7, 1, 5.35),
(127, 95, 4, 1, 6.75),
(128, 95, 2, 1, 5.5),
(129, 96, 6, 1, 2.9),
(130, 96, 5, 6, 6.2),
(131, 96, 3, 1, 12.5),
(132, 96, 7, 1, 5.35),
(133, 96, 4, 1, 6.75),
(134, 96, 2, 1, 5.5),
(135, 97, 6, 1, 2.9),
(136, 97, 5, 6, 6.2),
(137, 97, 3, 1, 12.5),
(138, 97, 7, 1, 5.35),
(139, 97, 4, 1, 6.75),
(140, 97, 2, 1, 5.5),
(141, 98, 6, 1, 2.9),
(142, 98, 5, 6, 6.2),
(143, 98, 3, 1, 12.5),
(144, 98, 7, 1, 5.35),
(145, 98, 4, 1, 6.75),
(146, 98, 2, 1, 5.5),
(147, 99, 6, 1, 2.9),
(148, 99, 5, 6, 6.2),
(149, 99, 3, 1, 12.5),
(150, 99, 7, 1, 5.35),
(151, 99, 4, 1, 6.75),
(152, 99, 2, 1, 5.5),
(153, 100, 6, 1, 2.9),
(154, 100, 5, 6, 6.2),
(155, 100, 3, 1, 12.5),
(156, 100, 7, 1, 5.35),
(157, 100, 4, 1, 6.75),
(158, 100, 2, 1, 5.5),
(159, 101, 6, 1, 2.9),
(160, 101, 5, 6, 6.2),
(161, 101, 3, 1, 12.5),
(162, 101, 7, 1, 5.35),
(163, 101, 4, 1, 6.75),
(164, 101, 2, 1, 5.5),
(165, 102, 6, 1, 2.9),
(166, 102, 5, 6, 6.2),
(167, 102, 3, 1, 12.5),
(168, 102, 7, 1, 5.35),
(169, 102, 4, 1, 6.75),
(170, 102, 2, 1, 5.5),
(171, 103, 6, 21, 2.9),
(172, 103, 5, 16, 6.2),
(173, 103, 3, 1, 12.5),
(174, 103, 7, 1, 5.35),
(175, 103, 4, 1, 6.75),
(176, 103, 2, 1, 5.5),
(177, 104, 5, 19, 6.2),
(178, 104, 3, 12, 12.5),
(179, 104, 7, 4, 5.35),
(180, 104, 4, 1, 6.75),
(181, 104, 2, 1, 5.5),
(182, 105, 5, 19, 6.2),
(183, 105, 3, 12, 12.5),
(184, 105, 7, 4, 5.35),
(185, 105, 4, 1, 6.75),
(186, 105, 2, 1, 5.5),
(187, 106, 6, 1, 2.9),
(188, 106, 7, 1, 5.35);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `FK_BOOKING_CUSTOMER_ID` FOREIGN KEY (`Customer_Id`) REFERENCES `Customer` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `Login`
--
ALTER TABLE `Login`
  ADD CONSTRAINT `FK_LOGIN_CUSTOMERID` FOREIGN KEY (`Customer_Id`) REFERENCES `Customer` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `Order_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `Customer` (`Id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `OrderLine`
--
ALTER TABLE `OrderLine`
  ADD CONSTRAINT `OrderLine_ibfk_1` FOREIGN KEY (`Order_Id`) REFERENCES `Order` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `OrderLine_ibfk_2` FOREIGN KEY (`Meal_Id`) REFERENCES `Meal` (`Id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
