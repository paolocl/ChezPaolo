-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 13 Janvier 2016 à 17:55
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `Booking`
--

INSERT INTO `Booking` (`Id`, `Customer_Id`, `BookingDate`, `BookingTime`, `CreationTimestamp`, `NumberOfSeats`) VALUES
(1, 1, '2016-01-08', '22:01:00', '2016-01-13 00:00:00', 5),
(2, 1, '2016-01-08', '22:01:00', '2016-01-13 12:27:12', 5),
(3, 1, '2016-01-08', '22:01:00', '2016-01-13 12:31:29', 5),
(4, 1, '2016-01-08', '22:01:00', '2016-01-13 12:31:49', 5),
(5, 1, '0000-00-00', '00:00:00', '2016-01-13 12:33:25', 0),
(6, 1, '0000-00-00', '00:00:22', '2016-01-13 13:10:56', 4),
(7, 1, '0000-00-00', '00:00:22', '2016-01-13 13:11:07', 4),
(8, 1, '0000-00-00', '00:00:15', '2016-01-13 13:13:09', 1),
(9, 1, '0000-00-00', '00:00:15', '2016-01-13 13:13:31', 1),
(10, 1, '0000-00-00', '00:00:11', '2016-01-13 14:18:43', 127),
(11, 1, '0000-00-00', '00:00:04', '2016-01-13 16:13:59', 1),
(12, 1, '0000-00-00', '00:00:04', '2016-01-13 16:16:54', 1),
(13, 1, '0000-00-00', '00:00:08', '2016-01-13 16:19:14', 5),
(14, 1, '0000-00-00', '00:00:08', '2016-01-13 16:19:25', 5),
(15, 1, '0000-00-00', '00:00:08', '2016-01-13 16:20:13', 5),
(16, 1, '0000-00-00', '00:00:08', '2016-01-13 16:20:26', 5),
(17, 1, '0000-00-00', '00:00:08', '2016-01-13 16:20:58', 5),
(18, 1, '0000-00-00', '00:00:08', '2016-01-13 16:21:04', 5),
(19, 1, '0000-00-00', '15:35:00', '2016-01-13 16:35:49', 5),
(20, 1, '0000-00-00', '15:35:00', '2016-01-13 16:37:11', 5),
(21, 1, '0000-00-00', '15:35:00', '2016-01-13 16:49:19', 5),
(22, 1, '0000-00-00', '15:35:00', '2016-01-13 16:49:34', 5),
(23, 1, '0000-00-00', '15:35:00', '2016-01-13 16:50:40', 5),
(24, 1, '0000-00-00', '02:55:00', '2016-01-13 16:54:02', 6),
(25, 1, '0000-00-00', '02:55:00', '2016-01-13 16:55:02', 6),
(26, 1, '0000-00-00', '02:55:00', '2016-01-13 16:56:40', 6),
(27, 1, '0000-00-00', '02:55:00', '2016-01-13 16:57:05', 6),
(28, 1, '0000-00-00', '02:55:00', '2016-01-13 16:57:30', 6),
(29, 1, '0000-00-00', '02:55:00', '2016-01-13 16:57:37', 6),
(30, 1, '0000-00-00', '08:10:00', '2016-01-13 17:11:55', 45),
(31, 1, '0000-00-00', '08:10:00', '2016-01-13 17:15:35', 45),
(32, 1, '2016-01-22', '08:10:00', '2016-01-13 17:16:21', 45);

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
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `ZipCode` int(5) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `LastLoginTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Customer List' AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Customer`
--

INSERT INTO `Customer` (`Id`, `FirstName`, `LastName`, `Birthdate`, `Email`, `Password`, `Phone`, `Address`, `Address2`, `City`, `ZipCode`, `CreationTimestamp`, `LastLoginTimestamp`) VALUES
(1, 'Paolo', 'Paolo', '2016-01-20', 'paolo@yahoo.fr', '$2y$10$F0baUBMomW0qCrMIOlvq/eGWU1sZcwa9kil6qryXKD.klMy3tJg2a', '0625588996', '85, rue des boulers', '3eme etages gauche', 'Paris', 750018, '2016-01-12 10:20:19', '2016-01-30 13:26:28');

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
(1, 'Coca-Cola', 'Mmmm, le Coca-Cola avec 10 morceaux de sucres et tout plein de caféine !', 'coca.jpg', 72, 0.6, 3),
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
  `Customer_Id` int(11) DEFAULT NULL,
  `TotalAmount` float NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `CompliteTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Customer_Id` (`Customer_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `OrderLine`
--

CREATE TABLE IF NOT EXISTS `OrderLine` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Order-Id` int(5) DEFAULT NULL,
  `Meal-Id` int(5) DEFAULT NULL,
  `Quantity` tinyint(10) NOT NULL,
  `Unitprice` float NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Order-Id` (`Order-Id`),
  KEY `Meal-Id` (`Meal-Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `FK_BOOKING_CUSTOMER_ID` FOREIGN KEY (`Customer_Id`) REFERENCES `Customer` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `FK_ORDER_CUSTOMER_ID` FOREIGN KEY (`Customer_Id`) REFERENCES `Customer` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `OrderLine`
--
ALTER TABLE `OrderLine`
  ADD CONSTRAINT `FK_ORDERLINE_MEAL` FOREIGN KEY (`Meal-Id`) REFERENCES `Meal` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDERLINE_ORDER` FOREIGN KEY (`Order-Id`) REFERENCES `Order` (`Id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
