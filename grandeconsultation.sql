-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2016 at 03:18 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grandeconsultation`
--

-- --------------------------------------------------------

--
-- Table structure for table `Advert`
--

CREATE TABLE IF NOT EXISTS `Advert` (
  `AdvertId` int(11) NOT NULL AUTO_INCREMENT,
  `ClubId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ShortDescription` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text COLLATE utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL DEFAULT '0000-00-00',
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Ordering` int(11) NOT NULL,
  PRIMARY KEY (`AdvertId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `Advert`
--

INSERT INTO `Advert` (`AdvertId`, `ClubId`, `Name`, `SeoName`, `EventDate`, `ShortDescription`, `LongDescription`, `CreationDate`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `Ordering`) VALUES
(48, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-06', '2010-06-06', '3434d9296944c85e7d27a7eb6fa6282b.jpg', '', 2),
(49, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-06', '2010-06-06', '195651f1e231f233836e9543816de63c.jpg', '', 3),
(51, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-07', '2010-06-07', '77536abc7a5e095a839914d90ceac7c5.jpg', '', 4),
(52, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-07', '2010-06-07', 'e0eca21421c1ccfb413bf8c62342e352.jpg', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `AdvertPicture`
--

CREATE TABLE IF NOT EXISTS `AdvertPicture` (
  `AdvertPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `AdvertId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `ImgAlt` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `ImgType` varchar(10) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgDriveName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgFileName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgAlt` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgType` varchar(10) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  PRIMARY KEY (`AdvertPictureId`),
  KEY `ClubId` (`AdvertId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `AdvertPicture`
--


-- --------------------------------------------------------

--
-- Table structure for table `Alfa`
--

CREATE TABLE IF NOT EXISTS `Alfa` (
  `AlfaId` int(11) NOT NULL AUTO_INCREMENT,
  `BetaId` int(11) NOT NULL DEFAULT '0',
  `ClubId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `NameTransEN` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `NameTransDE` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `NameTransRU` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Description` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ShortDescription` text COLLATE utf8_polish_ci NOT NULL,
  `VeryShortDescription` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ShortDescriptionTransEN` text COLLATE utf8_polish_ci NOT NULL,
  `ShortDescriptionTransDE` text COLLATE utf8_polish_ci NOT NULL,
  `ShortDescriptionTransRU` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescriptionTransEN` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescriptionTransDE` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescriptionTransRU` text COLLATE utf8_polish_ci NOT NULL,
  `UpdateDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `AlfaOrder` int(11) NOT NULL DEFAULT '0',
  `Status` int(11) NOT NULL DEFAULT '0',
  `StatusEN` int(11) NOT NULL,
  `StatusDE` int(11) NOT NULL,
  `StatusRU` int(11) NOT NULL,
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgDriveNameHeader` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `EventDate` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `EventCalendar` date NOT NULL,
  `YouTube` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`AlfaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Alfa`
--


-- --------------------------------------------------------

--
-- Table structure for table `AlfaPicture`
--

CREATE TABLE IF NOT EXISTS `AlfaPicture` (
  `AlfaPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `AlfaId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgAltName` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY (`AlfaPictureId`),
  KEY `AlfaId` (`AlfaId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `AlfaPicture`
--


-- --------------------------------------------------------

--
-- Table structure for table `Beta`
--

CREATE TABLE IF NOT EXISTS `Beta` (
  `BetaId` int(11) NOT NULL AUTO_INCREMENT,
  `ClubId` int(11) NOT NULL,
  `GamaId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ShortDescription` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text COLLATE utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0000-00-00',
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Status` int(11) NOT NULL DEFAULT '0',
  `BetaOrder` int(11) NOT NULL,
  PRIMARY KEY (`BetaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Beta`
--

INSERT INTO `Beta` (`BetaId`, `ClubId`, `GamaId`, `Name`, `SeoName`, `EventDate`, `ShortDescription`, `LongDescription`, `Keyword`, `Description`, `UpdateDate`, `ImgDriveName`, `Status`, `BetaOrder`) VALUES
(8, 0, 0, 'Postkort', 'postkort', '1', '', '', 'Postkort', '', '2014-12-16', 'db99d4ce3086d3f44c37ead136096ba6.jpg', 0, 2),
(7, 0, 0, 'Dans', 'dans', '1', '', '', 'Dans', '', '2014-12-16', 'b2b035bc545dadd38f25cb0f9ba21887.jpg', 0, 1),
(9, 0, 0, 'Skole / Kontor', 'skole-kontor', '1', '', '', 'Skole / Kontor', '', '2014-12-16', 'cc7ee44cf5b1964feb69f2c4dbeb38a7.jpg', 0, 3),
(10, 0, 0, 'Paraplyer', 'paraplyer', '1', '', '', 'Paraplyer', '', '2014-12-16', 'e2e170a3a0ff477c7a705e7e39eff45a.jpg', 0, 4),
(11, 0, 0, 'Handlenett / Vesker / Kofferter', 'handlenett-vesker-kofferter', '1', '', '', 'Handlenett / Vesker / Kofferter', '', '2014-12-16', '23e3ffd4a6fd147098ac4c39db2029da.jpg', 0, 5),
(12, 0, 0, 'Magneter', 'magneter', '1', '', '', 'Magneter', '', '2014-12-16', '9d891dcfde8af592620080ebd9703f6f.jpg', 0, 6),
(13, 0, 0, 'Pynt / InteriĂ¸r', 'pynt-interior', '1', '', '', 'Pynt / InteriĂ¸r', '', '2014-12-16', '0f7474b8ed7ca73ba3ebf2659e178aa8.jpg', 0, 7),
(14, 0, 0, 'Smykker / VelvĂŚre', 'smykker-velvre', '1', '', '', 'Smykker / VelvĂŚre', '', '2014-12-16', '27d8879f1fc4a147ed7a29c2f923f311.jpg', 0, 8),
(15, 0, 0, 'KjĂ¸kken', 'kjokken', '1', '', '', 'KjĂ¸kken', '', '2014-12-16', '6e802b9ad70733d4fcff3de3752cb3d1.jpg', 0, 9),
(16, 0, 0, 'Spill/ SpilledĂĽser', 'spill-spilledaser', '1', '', '', 'Spill/ SpilledĂĽser', '', '2014-12-16', 'c8c297495cdd2981c5666d35c91e8d3e.jpg', 0, 10),
(17, 0, 0, 'Baby / Graviditet', 'baby-graviditet', '1', '', '', 'Baby / Graviditet', '', '2014-12-16', '0a5f907cff678aef1828573c3730d46c.jpg', 0, 11),
(18, 0, 0, 'Noter / BĂ¸ker / CD / DVD', 'noter-boker-cd-dvd', '1', '', '', 'Noter / BĂ¸ker / CD / DVD', '', '2014-12-16', 'dfcff18cd4bdfd1ebc187255867f66b7.jpg', 0, 12),
(19, 0, 0, 'Instrumenter', 'instrumenter', '1', '', '', 'Instrumenter', '', '2014-12-16', '440b4cc163e66f38bf14b119aaf39e5b.jpg', 0, 13),
(20, 0, 0, 'Gavekort', 'gavekort', '1', '', '', 'Gavekort', '', '2014-12-16', 'b29fae44e83fd880aba5df3ae7c8cc45.jpg', 0, 14),
(21, 0, 0, 'Diverse', 'diverse', '1', '', '', 'Diverse', '', '2014-12-16', '4926e489cb90e3cf468ba652ed01618c.jpg', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `BetaPicture`
--

CREATE TABLE IF NOT EXISTS `BetaPicture` (
  `BetaPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `BetaId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `ImgAltName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `IW` int(11) NOT NULL DEFAULT '0',
  `IH` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`BetaPictureId`),
  KEY `ClubId` (`BetaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `BetaPicture`
--

INSERT INTO `BetaPicture` (`BetaPictureId`, `BetaId`, `ImgDriveName`, `ImgAltName`, `IW`, `IH`) VALUES
(1, 3, '432bc8f71a4b808856f15114a922eabe.jpg', 'img 1', 160, 224),
(2, 3, 'f6084be282c3ca13975a49e85e4d2b5f.jpg', 'img 2', 160, 224),
(3, 3, '3be19bcfae3f335d8510613910b66a73.jpg', 'img 3', 160, 224),
(36, 7, 'b2b035bc545dadd38f25cb0f9ba21887.jpg', '', 0, 0),
(35, 8, 'db99d4ce3086d3f44c37ead136096ba6.jpg', '', 0, 0),
(34, 9, 'cc7ee44cf5b1964feb69f2c4dbeb38a7.jpg', '', 0, 0),
(33, 10, 'e2e170a3a0ff477c7a705e7e39eff45a.jpg', '', 0, 0),
(32, 11, '23e3ffd4a6fd147098ac4c39db2029da.jpg', '', 0, 0),
(31, 12, '9d891dcfde8af592620080ebd9703f6f.jpg', '', 0, 0),
(30, 13, '0f7474b8ed7ca73ba3ebf2659e178aa8.jpg', '', 0, 0),
(29, 14, '27d8879f1fc4a147ed7a29c2f923f311.jpg', '', 0, 0),
(28, 15, '6e802b9ad70733d4fcff3de3752cb3d1.jpg', '', 0, 0),
(27, 16, 'c8c297495cdd2981c5666d35c91e8d3e.jpg', '', 0, 0),
(26, 17, '0a5f907cff678aef1828573c3730d46c.jpg', '', 0, 0),
(25, 18, 'dfcff18cd4bdfd1ebc187255867f66b7.jpg', '', 0, 0),
(24, 19, '440b4cc163e66f38bf14b119aaf39e5b.jpg', '', 0, 0),
(23, 20, 'b29fae44e83fd880aba5df3ae7c8cc45.jpg', '', 0, 0),
(22, 21, '4926e489cb90e3cf468ba652ed01618c.jpg', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `BookId` int(11) NOT NULL AUTO_INCREMENT,
  `SigmaId` int(11) NOT NULL,
  `ParentId` int(11) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `CreateDate` date NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `CompanyName` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `City` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Code` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Street` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Number` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`BookId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`BookId`, `SigmaId`, `ParentId`, `Email`, `CreateDate`, `FirstName`, `LastName`, `CompanyName`, `City`, `Code`, `Street`, `Number`, `Phone`) VALUES
(14, 53, 0, 'tprokop@prothomsoft.com', '2015-08-13', 'Tomasz', 'Prokop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '0', '', '', '', ''),
(15, 53, 14, 'nicolas@gmail.com', '2015-08-13', 'Nicolas', 'Curtelin', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ', '0', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Club`
--

CREATE TABLE IF NOT EXISTS `Club` (
  `ClubId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ShortDescription` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text COLLATE utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Manager` varchar(100) COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `Phone` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Route` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Lat` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Lng` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `IsClub` int(11) NOT NULL,
  `ClubOrder` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`ClubId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Club`
--


-- --------------------------------------------------------

--
-- Table structure for table `ClubPicture`
--

CREATE TABLE IF NOT EXISTS `ClubPicture` (
  `ClubPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `ClubId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `ImgAltName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY (`ClubPictureId`),
  KEY `ProductId` (`ClubId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ClubPicture`
--


-- --------------------------------------------------------

--
-- Table structure for table `CmsCategory`
--

CREATE TABLE IF NOT EXISTS `CmsCategory` (
  `CmsCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `FatherId` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `TransEN` varchar(255) NOT NULL,
  `TransDE` varchar(255) NOT NULL,
  `TransRU` varchar(255) NOT NULL,
  `ListOrder` int(11) NOT NULL DEFAULT '0',
  `Url` varchar(255) NOT NULL,
  `IsModule` int(11) NOT NULL DEFAULT '0',
  `NumberOfItems` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CmsCategoryId`),
  KEY `CmsCategoryId` (`CmsCategoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `CmsCategory`
--

INSERT INTO `CmsCategory` (`CmsCategoryId`, `FatherId`, `Name`, `SeoName`, `TransEN`, `TransDE`, `TransRU`, `ListOrder`, `Url`, `IsModule`, `NumberOfItems`) VALUES
(46, 20, 'Vous et vos expĂŠriences', 'vous-et-vos-experiences', '', '', '', 1, 'http://grandeconsultation.fr/surveys_page/vous-et-vos-experiences.html', 0, 0),
(47, 20, 'Nos ambitions', 'nos-ambitions', '', '', '', 2, 'http://grandeconsultation.fr/surveys_page/nos-ambitions.html', 0, 0),
(48, 20, 'La communication', 'la-communication', '', '', '', 3, 'http://grandeconsultation.fr/surveys_page/la-communication.html', 0, 0),
(18, 0, 'PUBLIC', 'public', '', '', '', 1, '', 1, 0),
(19, 0, 'SECURED USER AREA', 'secured-user-area', '', '', '', 2, '', 1, 0),
(20, 18, 'LA COMMUNAUTE DES ENTREPRENEURS', 'la-communaute-des-entrepreneurs', '', '', '', 1, '#', 1, 0),
(21, 18, 'LES ETUDES', 'les-etudes', '', '', '', 2, '#', 1, 0),
(22, 18, 'REJOINDRE LA COMMUNAUTE', 'rejoindre-la-communaute', '', '', '', 3, '#', 1, 0),
(51, 22, 'Devenir participant, pour quoi faire ?', 'devenir-participant-pour-quoi-faire', '', '', '', 1, 'http://grandeconsultation.fr/surveys_page/devenir-participant-pour-quoi-faire.html', 0, 0),
(71, 18, 'Le Blog', 'le-blog', '', '', '', 4, 'http://grandeconsultation.fr/blog.html', 0, 0),
(49, 21, 'La Grande consultation des entrepreneurs - Sondages OpinionWay pour CCI France / La Tribune / Europe 1', 'la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1', '', '', '', 1, 'http://grandeconsultation.fr/surveys_page/la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1.html', 0, 0),
(41, 19, 'LES CONSULTATIONS EN COURS', 'les-consultations-en-cours', '', '', '', 1, 'http://grandeconsultation.fr/lesConsultationsEnCoursChat.html', 0, 0),
(39, 38, 'Modifier son mot de passe', 'modifier-son-mot-de-passe', '', '', '', 1, 'http://grandeconsultation.fr/changePassword.html', 1, 0),
(37, 19, 'LA BOURSE AUX THĂMATIQUES', 'la-bourse-aux-thematiques', '', '', '', 2, 'http://grandeconsultation.fr/themeMarket.html', 1, 0),
(38, 19, 'MES INFORMATIONS', 'mes-informations', '', '', '', 3, '#', 1, 0),
(59, 36, 'Footer tags', 'footer-tags', '', '', '', 5, '#', 0, 0),
(62, 36, 'Qui sommes nous - CCI France ?', 'qui-sommes-nous-cci-france', '', '', '', 2, 'http://grandeconsultation.fr/surveys_page/qui-sommes-nous-cci-france.html', 0, 0),
(61, 36, 'Qui sommes nous - Opinionway ?', 'qui-sommes-nous-opinionway', '', '', '', 1, 'http://grandeconsultation.fr/surveys_page/qui-sommes-nous-opinionway.html', 0, 0),
(58, 36, 'Conditions de participation', 'conditions-de-participation', '', '', '', 3, 'http://grandeconsultation.fr/surveys_page/conditions-de-participation.html', 0, 0),
(36, 0, 'OTHERS', 'others', '', '', '', 3, '', 1, 0),
(64, 22, 'Conditions', 'conditions', '', '', '', 2, 'http://grandeconsultation.fr/surveys_page/conditions-de-participation.html', 1, 0),
(65, 22, 'S&#039;inscrire', 'sinscrire', '', '', '', 3, 'http://grandeconsultation.fr/register.html', 1, 0),
(60, 38, 'Supprimer son compte', 'supprimer-son-compte', '', '', '', 3, 'http://grandeconsultation.fr/removeAccount.html', 1, 0),
(63, 36, 'Mentions lĂŠgales', 'mentions-legales', '', '', '', 4, 'http://grandeconsultation.fr/surveys_page/mentions-legales.html', 0, 0),
(70, 21, 'La question de l&#039;ĂŠco', 'la-question-de-leco', '', '', '', 3, 'http://grandeconsultation.fr/surveys_page/la-question-de-leco.html', 0, 0),
(68, 38, 'Modifier ses informations', 'modifier-ses-informations', '', '', '', 2, 'http://grandeconsultation.fr/changeDetails.html', 1, 0),
(69, 21, 'Observatoire de la performance des PME/ETI - Banque Palatine/Challenges/iTĂŠlĂŠ', 'observatoire-de-la-performance-des-pmeeti-banque-palatinechallengesitele', '', '', '', 2, 'http://grandeconsultation.fr/surveys_page/observatoire-de-la-performance-des-pmeeti-banque-palatinechallengesitele.html', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `CmsCategoryPlain`
--

CREATE TABLE IF NOT EXISTS `CmsCategoryPlain` (
  `CmsCategoryPlainId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) DEFAULT NULL,
  `CategoryName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `CategorySeoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`CmsCategoryPlainId`),
  KEY `CmsCategoryPlainId` (`CmsCategoryPlainId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=7531 ;

--
-- Dumping data for table `CmsCategoryPlain`
--

INSERT INTO `CmsCategoryPlain` (`CmsCategoryPlainId`, `CategoryId`, `CategoryName`, `CategorySeoName`) VALUES
(7504, 18, 'PUBLIC', 'public'),
(7505, 20, '&nbsp; &nbsp;LA COMMUNAUTE DES ENTREPRENEURS', 'la-communaute-des-entrepreneurs'),
(7506, 46, '&nbsp; &nbsp;&nbsp; &nbsp;Vous et vos expĂŠriences', 'vous-et-vos-experiences'),
(7507, 47, '&nbsp; &nbsp;&nbsp; &nbsp;Nos ambitions', 'nos-ambitions'),
(7508, 48, '&nbsp; &nbsp;&nbsp; &nbsp;La communication', 'la-communication'),
(7509, 21, '&nbsp; &nbsp;LES ETUDES', 'les-etudes'),
(7510, 49, '&nbsp; &nbsp;&nbsp; &nbsp;La Grande consultation des entrepreneurs - Sondages OpinionWay pour CCI France / La Tribune / Europe 1', 'la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1'),
(7511, 69, '&nbsp; &nbsp;&nbsp; &nbsp;Observatoire de la performance des PME/ETI - Banque Palatine/Challenges/iTĂŠlĂŠ', 'observatoire-de-la-performance-des-pmeeti-banque-palatinechallengesitele'),
(7512, 70, '&nbsp; &nbsp;&nbsp; &nbsp;La question de l&#039;ĂŠco', 'la-question-de-leco'),
(7513, 22, '&nbsp; &nbsp;REJOINDRE LA COMMUNAUTE', 'rejoindre-la-communaute'),
(7514, 51, '&nbsp; &nbsp;&nbsp; &nbsp;Devenir participant, pour quoi faire ?', 'devenir-participant-pour-quoi-faire'),
(7515, 64, '&nbsp; &nbsp;&nbsp; &nbsp;Conditions', 'conditions'),
(7516, 65, '&nbsp; &nbsp;&nbsp; &nbsp;S&#039;inscrire', 'sinscrire'),
(7517, 71, '&nbsp; &nbsp;Le Blog', 'le-blog'),
(7518, 19, 'SECURED USER AREA', 'secured-user-area'),
(7519, 41, '&nbsp; &nbsp;LES CONSULTATIONS EN COURS', 'les-consultations-en-cours'),
(7520, 37, '&nbsp; &nbsp;LA BOURSE AUX THĂMATIQUES', 'la-bourse-aux-thematiques'),
(7521, 38, '&nbsp; &nbsp;MES INFORMATIONS', 'mes-informations'),
(7522, 39, '&nbsp; &nbsp;&nbsp; &nbsp;Modifier son mot de passe', 'modifier-son-mot-de-passe'),
(7523, 68, '&nbsp; &nbsp;&nbsp; &nbsp;Modifier ses informations', 'modifier-ses-informations'),
(7524, 60, '&nbsp; &nbsp;&nbsp; &nbsp;Supprimer son compte', 'supprimer-son-compte'),
(7525, 36, 'OTHERS', 'others'),
(7526, 61, '&nbsp; &nbsp;Qui sommes nous - Opinionway ?', 'qui-sommes-nous-opinionway'),
(7527, 62, '&nbsp; &nbsp;Qui sommes nous - CCI France ?', 'qui-sommes-nous-cci-france'),
(7528, 58, '&nbsp; &nbsp;Conditions de participation', 'conditions-de-participation'),
(7529, 63, '&nbsp; &nbsp;Mentions lĂŠgales', 'mentions-legales'),
(7530, 59, '&nbsp; &nbsp;Footer tags', 'footer-tags');

-- --------------------------------------------------------

--
-- Table structure for table `CmsContent`
--

CREATE TABLE IF NOT EXISTS `CmsContent` (
  `CmsContentId` int(11) NOT NULL AUTO_INCREMENT,
  `CmsCategoryId` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `NameTransEN` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `NameTransDE` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `NameTransRU` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Description` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ShortDescription` text COLLATE utf8_polish_ci NOT NULL,
  `ShortDescriptionTransEN` text COLLATE utf8_polish_ci NOT NULL,
  `ShortDescriptionTransDE` text COLLATE utf8_polish_ci NOT NULL,
  `ShortDescriptionTransRU` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescriptionTransEN` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescriptionTransDE` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescriptionTransRU` text COLLATE utf8_polish_ci NOT NULL,
  `UpdateDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CmsContentOrder` int(11) NOT NULL DEFAULT '0',
  `Status` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Om1` text COLLATE utf8_polish_ci NOT NULL,
  `Om2` text COLLATE utf8_polish_ci NOT NULL,
  `Om3` text COLLATE utf8_polish_ci NOT NULL,
  `Om4` text COLLATE utf8_polish_ci NOT NULL,
  `Om5` text COLLATE utf8_polish_ci NOT NULL,
  `Om6` text COLLATE utf8_polish_ci NOT NULL,
  `Om7` text COLLATE utf8_polish_ci NOT NULL,
  `Om8` text COLLATE utf8_polish_ci NOT NULL,
  `Om9` text COLLATE utf8_polish_ci NOT NULL,
  `Om10` text COLLATE utf8_polish_ci NOT NULL,
  `Om11` text COLLATE utf8_polish_ci NOT NULL,
  `Om12` text COLLATE utf8_polish_ci NOT NULL,
  `Om13` text COLLATE utf8_polish_ci NOT NULL,
  `Om14` text COLLATE utf8_polish_ci NOT NULL,
  `Om15` text COLLATE utf8_polish_ci NOT NULL,
  `Om16` text COLLATE utf8_polish_ci NOT NULL,
  `Om17` text COLLATE utf8_polish_ci NOT NULL,
  `Om18` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`CmsContentId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `CmsContent`
--

INSERT INTO `CmsContent` (`CmsContentId`, `CmsCategoryId`, `Name`, `NameTransEN`, `NameTransDE`, `NameTransRU`, `SeoName`, `Keyword`, `Description`, `ShortDescription`, `ShortDescriptionTransEN`, `ShortDescriptionTransDE`, `ShortDescriptionTransRU`, `LongDescription`, `LongDescriptionTransEN`, `LongDescriptionTransDE`, `LongDescriptionTransRU`, `UpdateDate`, `CmsContentOrder`, `Status`, `ImgDriveName`, `Om1`, `Om2`, `Om3`, `Om4`, `Om5`, `Om6`, `Om7`, `Om8`, `Om9`, `Om10`, `Om11`, `Om12`, `Om13`, `Om14`, `Om15`, `Om16`, `Om17`, `Om18`) VALUES
(25, 41, 'LES CONSULTATIONS EN COURS', '', '', '', 'les-consultations-en-cours', '', 'LES CONSULTATIONS EN COURS', '', '', '', '', '&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #004379 1.5px;&quot;&gt;\r\n&lt;br /&gt;\r\n&lt;h4&gt;&lt;a class=&quot;black&quot; href=&quot;http://opinionway.talkspirit.com/la-grande-consultation/type/articles&quot;&gt; Pourquoi et comment drainer lâĂŠpargne populaire vers les entreprises ? &lt;/a&gt;&lt;/h4&gt; \r\n\r\n\r\n&lt;h5&gt;&gt; &lt;a class=&quot;black&quot; href=&quot;http://opinionway.talkspirit.com/la-grande-consultation/type/articles&quot;&gt;Participez Ă  cette consultation&lt;/a&gt;&lt;/h5&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;br /&gt;', '', '', '', '2015-05-25 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 49, 'La Grande consultation des entrepreneurs - Sondages OpinionWay pour CCI France / La Tribune / Europe 1', '', '', '', 'la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1', 'La Grande consultation des entrepreneurs - Sondages OpinionWay pour CCI France / La Tribune / Europe 1', 'Etudes OpinionWay auprĂ¨s des chefs dâentreprise', '', '', '', '', '&lt;p&gt;&lt;img src=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/logo_surveys.jpg&quot; height=&quot;40&quot; /&gt; &lt;img src=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/LOGO OW-01.png&quot; height=&quot;30&quot; /&gt;   &lt;img src=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/LATRIBUNE-01.jpg&quot; height=&quot;40&quot; /&gt;    &lt;img src=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/Europe_1_logo.png&quot; height=&quot;40&quot; /&gt; &lt;/p&gt;   &lt;br /&gt;  \r\n&lt;p&gt;&lt;strong&gt;&quot;La Grande consultation des entrepreneurs&quot;&lt;/strong&gt; est un baromĂ¨tre rĂŠalisĂŠ par Opinionway et CCI pour La Tribune et Europe 1 auprĂ¨s d&#039;un ĂŠchantillon de dirigeants dâentreprises reprĂŠsentatif des entreprises franĂ§aises.&lt;/p&gt;\r\n&lt;p&gt;La reprĂŠsentativitĂŠ de lâĂŠchantillon a ĂŠtĂŠ assurĂŠe par un redressement selon le secteur dâactivitĂŠ et la taille, aprĂ¨s stratification par rĂŠgion dâimplantation.&lt;br /&gt;\r\nLâĂŠchantillon est interrogĂŠ par tĂŠlĂŠphone sur systĂ¨me CATI.&lt;/p&gt;\r\n&lt;p&gt;Les rĂŠsultats de cette ĂŠtude sont lâentiĂ¨re propriĂŠtĂŠ dâOpinionWay. Toute publication totale ou partielle de ces chiffres doit impĂŠrativement utiliser la mention complĂ¨te suivante : &quot;BaromĂ¨tre La grande consultation\r\ndes entrepreneurs â OpinionWay/CCI pour La Tribune et Europe 1&quot; et aucune reprise de ces chiffres ne pourra ĂŞtre dissociĂŠe de cet intitulĂŠ.&lt;/p&gt;\r\n\r\n&lt;br /&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #004379 2px; text-align:center;&quot;&gt;\r\n&lt;br /&gt;\r\n&lt;h4&gt;DerniĂ¨re vague publiĂŠe - Janvier 2016 :&lt;/h4&gt;\r\n  \r\n&lt;br /&gt;\r\n&lt;iframe src=&quot;//www.slideshare.net/slideshow/embed_code/key/tV3dZFoe4TXR9f&quot; width=&quot;595&quot; height=&quot;485&quot; frameborder=&quot;0&quot; marginwidth=&quot;0&quot; marginheight=&quot;0&quot; scrolling=&quot;no&quot; style=&quot;border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;&quot; allowfullscreen&gt; &lt;/iframe&gt;  \r\n&lt;br /&gt;  \r\n&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/Opinionway_pour_CCI_Grande-consultation-des-entrepreneurs_Vague6_01-2016.pdf&quot;&gt; &gt; TĂŠlĂŠchargez cette enquĂŞte &lt;/a&gt;\r\n&lt;/br&gt;\r\n&lt;/br&gt;\r\n&lt;/div&gt;\r\n\r\n\r\n\r\n&lt;br /&gt;\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #004379 2px;&quot;&gt;\r\n&lt;br /&gt;\r\n&lt;h4&gt;TĂŠlĂŠchargez ci-dessous les vagues prĂŠcĂŠdentes :&lt;/h4&gt;\r\n&lt;ul&gt;\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/Opinionway_pour_CCI_Grande-consultation-des entrepreneurs_Vague5_11-2015.pdf&quot;&gt; Vague 5 - Novembre 2015&lt;/a&gt;\r\n&lt;/li&gt;\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/Opinionway_pour_CCI_Grande consultation_des_entrepreneurs_Vague4_09-2015.pdf&quot;&gt; Vague 4 - Septembre 2015&lt;/a&gt;\r\n&lt;/li&gt;\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/BJ11643-Opinionway_pour_CCI_Grande-consultation-des-entrepreneurs_Vague3.pdf&quot;&gt; Vague 3 - Juin 2015&lt;/a&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/Opinionway_pour_CCI_Grande_consultation_des_entrepreneurs_Vague2.pdf&quot;&gt; Vague 2 - Avril 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/GrandeConsultationEntrepreneurs/Opinionway_pour_CCI_Grande_consultation_des_entrepreneurs_Vague1_VF.pdf&quot;&gt; Vague 1 - FĂŠvrier 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/br&gt;\r\n&lt;/br&gt;\r\n&lt;/div&gt;', '', '', '', '2016-01-29 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 47, 'Nos ambitions', '', '', '', 'nos-ambitions', '', 'Nos ambitions', '', '', '', '', '&lt;p&gt;Nos ambitions sont de vous donner la parole et de\r\nla diffuser, de crĂŠer une communautĂŠ avec une forte capacitĂŠ Ă  se faire\r\nentendre. Faire ou dire câest bien, mais le faire savoir au plus grand nombre,\r\ncâest mieux. Câest lĂ  lâambition de CCI France en crĂŠant et animant cette plateforme\r\navec Opinion Way. Vous nous dites avec dâautres ce que vous pensez de la\r\nsituation, quelles sont vos attentes, vous rĂŠpondez 5 Ă  7 fois par an Ă  des enquĂŞtes,\r\net CCI France diffuse votre parole. Avec dâautres vous aurez ici une occasion\r\nnouvelle de faire entendre les voix des entrepreneurs Â dâinterpeller les FranĂ§ais et leurs\r\nreprĂŠsentants. Câest un levier de plus et une occasion dâĂŠchanger avec dâautres\r\nchefs dâentrepriseÂ :Â &lt;br /&gt;&lt;br /&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/register.html&quot;&gt;ParticipezÂ !Â &lt;/a&gt;&lt;/p&gt;', '', '', '', '2015-08-13 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 48, 'La communication', '', '', '', 'la-communication', '', 'La communication', '', '', '', '', '&lt;p&gt;AssociĂŠ\r\nĂ  La Tribune, CCI France sâengage Ă  faire\r\nvivre les rĂŠsultats dans tout son rĂŠseau mais aussi par ses reprĂŠsentants\r\nauprĂ¨s de toutes les parties prenantes du dĂŠveloppement ĂŠconomique. Câest Ă  la\r\nfois une matiĂ¨re vivante, vos opinions, et influente, notre relai. Les\r\nrĂŠsultats des enquĂŞtes feront lâobjet de prĂŠsentations mĂŠdiatisĂŠes, les\r\nconclusions seront relayĂŠes auprĂ¨s des responsables politiques. Vous prenez la\r\nparole et nous la diffusons le plus possible&lt;/p&gt;', '', '', '', '2015-08-18 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 46, 'Vous et vos expĂŠriences', '', '', '', 'vous-et-vos-experiences', '', 'Vous et vos expĂŠriences', '', '', '', '', '&lt;p&gt;Faire entendre sa voix, ĂŠchanger sur les\r\nquestions qui animent/ mobilisent/ sur les questions prioritaires pour Â les entrepreneurs, câest le pari de cette\r\nplateforme. CCI France souhaite offrir cette opportunitĂŠ aux plus grand nombre\r\ndâentre vous. Ainsi, en sâassociant avec un Institut spĂŠcialisĂŠ et en servant\r\nde caisse de rĂŠsonance Ă Â  vos\r\nprĂŠoccupations, CCI France vous propose de participer Ă  cette expĂŠrience et\r\ndâen rendre compte dans ses communications.Â &lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/register.html&quot;&gt;Cliquez ici pour vous inscrire !&lt;/a&gt;&lt;/p&gt;', '', '', '', '2015-08-25 00:00:00', 1, 1, '160052c6da8ba66159529dd2cbe5ffe5.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, 71, 'Le Blog', '', '', '', 'le-blog', 'Le Blog', 'Le Blog', '', '', '', '', '', '', '', '', '2015-09-07 00:00:00', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 51, 'Devenir participant, pour quoi faire ?', '', '', '', 'devenir-participant-pour-quoi-faire', '', 'Devenir participant, pour quoi faire ?', '', '', '', '', '&lt;p&gt;Câest simple il suffit &lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/register.html&quot;&gt;de vous inscrireÂ !!&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Comme participant vous aller disposer dâun mot de passe sur\r\nle site de la communautĂŠ. Il vous permettra de vous connecter quand vous le\r\nsouhaitez pour rĂŠpondre Ă  des enquĂŞtes et ĂŠchanger sur des thĂŠmatiques\r\ndâactualitĂŠ. Le site sera animĂŠ et modĂŠrĂŠ en permanence pour relancer les\r\nsujets, en proposer de nouveaux, vous interpeller sur les sujets que vous\r\nsouhaitez voir abordĂŠs. Ce sera simple, interactif, et libre.&lt;/p&gt;&lt;p&gt;Vous pourrez aussi proposer les sujets sur lesquels vous\r\nsouhaitez que la communautĂŠ travaille.&lt;/p&gt;&lt;p&gt;Vous aurez accĂ¨s aux rĂŠsultats dâenquĂŞtes et analyse mais\r\naussi Ă  lâensemble des communications issues de votre participation.&lt;/p&gt;\r\n&lt;p&gt;CliquezÂ &lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/register.html&quot;&gt;ici&lt;/a&gt; pour vous inscrire.&lt;/p&gt;', '', '', '', '2015-04-02 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 59, 'Footer tags', '', '', '', 'footer-tags', '', 'Footer tags', '', '', '', '', '&lt;ul class=&quot;list-inline tagclouds&quot;&gt;\r\n&lt;li&gt;&lt;a href=&quot;http://grandeconsultation.fr/search/confiance.html&quot;&gt;CONFIANCE&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a href=&quot;http://grandeconsultation.fr/search/investissements.html&quot;&gt;INVESTISSEMENTS&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a href=&quot;http://grandeconsultation.fr/search/pme.html&quot;&gt;PME&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a href=&quot;http://grandeconsultation.fr/search/cci.html&quot;&gt;CCI&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a href=&quot;http://grandeconsultation.fr/search/politique&amp;ĂŠconomique.html&quot;&gt;Politique ĂŠconomique&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a href=&quot;http://grandeconsultation.fr/search/consultation.html&quot;&gt;BaromĂ¨tre &quot;La Grande consultation&quot;&lt;/a&gt;&lt;/li&gt;\r\n\r\n\r\n	&lt;/ul&gt;', '', '', '', '2015-08-03 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 58, 'Conditions de participation', '', '', '', 'conditions-de-participation', '', 'Conditions de participation', '', '', '', '', '&lt;p&gt;La\r\nparticipation Ă  la communautĂŠ est libre et lâensemble des donnĂŠes traitĂŠes le\r\nseront de maniĂ¨re anonyme sous forme dâagrĂŠgation statistique ou de verbatim\r\nanonymes.&amp;#160;&lt;/p&gt;', '', '', '', '2015-03-11 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, 63, 'Mentions lĂŠgales', '', '', '', 'mentions-legales', '', 'Mentions lĂŠgales', '', '', '', '', '&lt;p&gt;&lt;strong&gt;Protection\r\ndes donnĂŠes personnellesÂ &lt;/strong&gt;&lt;/p&gt;&lt;p&gt;En\r\nconformitĂŠ avec les dispositions de la loi du 6 janvier 1978 relative Ă  lâinformatique,\r\naux fichiers et aux libertĂŠs, le traitement automatisĂŠ des donnĂŠes nominatives\r\nrĂŠalisĂŠ Ă  partir de ce site web fait lâobjet dâune dĂŠclaration auprĂ¨s de la\r\nCNIL (Commission Nationale de lâInformatique et des LibertĂŠs).&lt;/p&gt;&lt;p&gt;\r\n\r\nLes informations nominatives\r\nconcernant lâutilisateur sont Ă  usage interne de la sociĂŠtĂŠ OpinionWay. En\r\naucun cas, la sociĂŠtĂŠ OpinonWay ne les divulguera Ă  des tiers Ă  des fins de\r\npublicitĂŠ ou de promotion. Lâutilisateur est toutefois informĂŠ que,\r\nconformĂŠment Ă  lâarticle 27 de la loi Informatique et LibertĂŠs du 6 janvier\r\n1978, les rĂŠponses donnĂŠes aux formulaires ĂŠventuellement prĂŠsents sur le site,\r\nnotamment permettant Ă  lâutilisateur dây dĂŠposer ses coordonnĂŠes pour recevoir\r\nde la documentation ou tĂŠlĂŠcharger des brochures, ou encore sâabonner aux\r\nservices proposĂŠs sur le site, pourront ĂŞtre exploitĂŠes par la sociĂŠtĂŠ\r\nOpinionWay et quâil dispose dâun droit dâaccĂ¨s et de rectification sur ces\r\ndonnĂŠes en ĂŠcrivant Ă  :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;strong&gt;ContactÂ :\r\n&lt;/strong&gt;OpinionWayÂ :\r\n15 place de la RĂŠpublique, 75003 ParisÂ ou en adressant sa demande par e-mail Ă  &lt;a href=&quot;mailto:info@opinion-way.com&quot;&gt;info@opinion-way.com&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong&gt;DĂŠcharge de responsabilitĂŠ&lt;br /&gt;\r\n&lt;/strong&gt;OpinionWay, et tous tiers impliquĂŠs dans la crĂŠation de\r\nce site, ne donnent aucune garantie, explicite ou implicite, et nâassument\r\naucune responsabilitĂŠ, relative Ă  lâutilisation de la prĂŠsente publication. A\r\nce titre, ils ne peuvent ĂŞtre redevables Ă  un utilisateur ou une autre partie,\r\ndes dommages directs ou indirects, spĂŠciaux, particuliers ou accessoires\r\ndĂŠcoulant de lâutilisation de ce site ou dâun autre site reliĂŠ par hyperlien.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Droits d&#039;auteur&lt;br /&gt;\r\n&lt;/strong&gt;Les donnĂŠes publiĂŠes et\r\nles marques citĂŠes sur XXXXXXXXX sont la propriĂŠtĂŠ exclusive de leurs\r\ntitulaires respectifs. Toute reproduction totale ou partielle de ces textes,\r\nmarques et/ou logos, effectuĂŠe Ă  partir des ĂŠlĂŠments du site sans\r\nlâautorisation expresse de leurs propriĂŠtaires est donc prohibĂŠe, au sens de\r\nlâarticle L. 713-2 du Code de la propriĂŠtĂŠ intellectuelle.Â &lt;/p&gt;&lt;p&gt;&lt;strong&gt;Etudes de marchĂŠ et d&#039;opinion&lt;/strong&gt;Cette marque prouve la conformitĂŠ Ă  la norme NF X 50-057\r\net au rĂ¨glement de certification NF323.&lt;br /&gt;\r\nElle garantit que le respect de la dĂŠontologie et les bonnes pratiques\r\nprofessionnelles (mĂŠthodologie, recueil, contrĂ´le et analyse de l&#039;information,\r\nrestitution des rĂŠsultats) sont contrĂ´lĂŠs par :&lt;br /&gt;\r\nAFAQ AFNOR Certification&lt;br /&gt;\r\n11 rue Francis de PressensĂŠ&lt;br /&gt;\r\n93571 La Plaine Saint-Denis Cedex â France&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Informations\r\nlĂŠgales : &lt;/strong&gt;&lt;/p&gt;&lt;p&gt;OpinionWay\r\nS.A.S au capital deÂ &lt;strong&gt;65401 âŹuros&lt;/strong&gt;Â &lt;br /&gt;\r\nSiĂ¨ge social: 15 place de la RĂŠpublique 75003 Paris&lt;br /&gt;\r\nR.C.S.: &lt;strong&gt;PARIS&lt;/strong&gt;Â Â &lt;strong&gt;2000 B 05608 430126789&lt;/strong&gt;Â &lt;br /&gt;\r\nSIRET:Â &lt;strong&gt;nÂ°Â 430 126 789 00048&lt;br /&gt;\r\n&lt;/strong&gt;APE:Â Â &lt;strong&gt;741E&lt;/strong&gt;Â &lt;br /&gt;\r\nDĂŠclaration CNIL&lt;strong&gt; nÂ°&lt;/strong&gt;Â &lt;strong&gt;722486&lt;/strong&gt;Â  &lt;/p&gt;&lt;p&gt;&lt;strong&gt;Editeur du site\r\n: OpinionWay&lt;br /&gt;\r\n&lt;/strong&gt;Accessible par le &lt;strong&gt;MĂŠtro 3, 5, 8,\r\n9 et 11 (RĂŠpublique)&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;/strong&gt;NÂ° T.V.A. intra communautaire:&lt;strong&gt; FR&lt;/strong&gt;Â &lt;strong&gt;49430126789&lt;/strong&gt;Â &lt;br /&gt;\r\nR.I.B.:Â Â &lt;strong&gt;14978 00100 46104ECV00A&lt;/strong&gt;Â &lt;br /&gt;\r\nIBAN: &lt;strong&gt;FR94 1497 8001 0046 104E CV00 A19&lt;/strong&gt;&lt;/p&gt;', '', '', '', '2015-03-11 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, 70, 'La question de l&#039;ĂŠco', '', '', '', 'la-question-de-leco', 'La question de l&#039;ĂŠco, gouvernement, politique, ĂŠconomie, ĂŠconomique, investissements, dĂŠficit', 'La question de l&#039;ĂŠco', '', '', '', '', '&lt;p&gt;&lt;img src=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/tilder_7.jpg&quot; height=&quot;40&quot; /&gt;    &lt;img src=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/LCI.jpg&quot; height=&quot;40&quot; /&gt;&lt;/p&gt;\r\n&lt;br /&gt;\r\n&lt;h4&gt; Chaque semaine, Opinionway interroge un ĂŠchantillon reprĂŠsentatif de la population franĂ§aise sur des thĂŠmatiques liĂŠes Ă  l&#039;ĂŠconomie.&lt;/h4&gt;\r\n&lt;br /&gt;\r\n&lt;h4&gt;Retrouvez les rĂŠsultats complets des vagues du baromĂ¨tre :&lt;/h4&gt;\r\n&lt;br /&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/37-Opinionway_tilder_lci_la_question_de_l_eco_28jan.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 28 janvier 2016&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; La prĂŠfĂŠrence entre les rĂŠfĂŠrendums dâentreprises et les nĂŠgociations entre syndicats de salariĂŠs et dâemployeurs &lt;/li&gt;\r\n&lt;li&gt; Le dĂŠveloppement de relations commerciales avec des pays ne respectant pas les droits de lâhomme &lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/36-Opinionway_tilder_lci_la_question_de_l_eco_21jan.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 21 janvier 2016&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; La confiance en EDF pour garantir lâapprovisionnement de la France en ĂŠlectricitĂŠ dans les annĂŠes Ă  venir &lt;/li&gt;\r\n&lt;li&gt; Lâaccord avec la proposition de la Cour des Comptes sur la rĂŠduction du montant des indemnitĂŠs chĂ´mage &lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/35-Opinionway_tilder_lci_la_question_de_l_eco_14jan.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 14 janvier 2016&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Lâimpact du risque dâattentats sur la croissance en 2016&lt;/li&gt;\r\n&lt;li&gt; Lâimpact de lâorganisation de lâEuro 2016 sur la croissance ĂŠconomique&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/34-Opinionway_tilder_lci_la_question_de_l_eco_07jan.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 7 janvier 2016&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; LâadhĂŠsion Ă  la crĂŠation dâun revenu universel pour chaque FranĂ§ais &lt;/li&gt;\r\n&lt;li&gt; Lâinfluence sur le chĂ´mage de la baisse du niveau minimum de qualification requis pour certains mĂŠtiers&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/33-Opinionway_tilder_lci_la_question_de_l_eco_25nov_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 25 novembre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; LâadhĂŠsion aux dĂŠpenses supplĂŠmentaires en faveur de la sĂŠcuritĂŠ &lt;/li&gt;\r\n&lt;li&gt; La prioritĂŠ pour lutter contre le terrorisme&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/32-Opinionway_tilder_lci_la_question_de_l_eco_12nov_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 12 novembre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; La prise en compte du mĂŠrite dans la rĂŠmunĂŠration des fonctionnaires&lt;/li&gt;\r\n&lt;li&gt; Lâorigine principale du dopage&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/31-Opinionway_tilder_lci_la_question_de_l_eco_5nov_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 5 novembre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Le signal envoyĂŠ par les hĂŠsitations fiscales du gouvernement&lt;/li&gt;\r\n&lt;li&gt; La gestion des contrĂ´les routiers par les sociĂŠtĂŠs dâautoroutes&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/30-Opinionway_tilder_lci_la_question_de_l_eco_22oct_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 22 octobre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Lâutilisation de son tĂŠlĂŠphone pour effectuer des paiements&lt;/li&gt;\r\n&lt;li&gt; La suppression de lâavantage de TVA sur le diesel pour les flottes de voitures dâentreprises&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/29-Opinionway_tilder_lci_la_question_de_l_eco_15oct_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 8 octobre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;La situation du dialogue social en France&lt;/li&gt;\r\n&lt;li&gt;Lâeffet de lâimmigration sur la croissance&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/28-Opinionway_tilder_lci_la_question_de_l_eco_8oct_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 8 octobre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lâimpact des rĂŠcents ĂŠvĂŠnements sur lâimage dâAir France&lt;/li&gt;\r\n&lt;li&gt;Lâaugmentation du temps de travail des pilotes dâAir France&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/27-Opinionway_tilder_lci_la_question_de_l_eco_1oct_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 1er octobre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Le respect du dialogue social par le premier Ministre&lt;/li&gt;\r\n&lt;li&gt;Et pensez-vous qu&#039;Emmanuel Macron conduit une politique? &lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/26-Opinionway_tilder_lci_la_question_de_l_eco_24sept_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 24 septembre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lâimpact de lâaffaire Volkswagen sur le regard des FranĂ§ais concernant les voitures roulant au diesel&lt;/li&gt;\r\n&lt;li&gt;La fiabilitĂŠ des informations fournies par les constructeurs concernant les rejets polluants&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/25-Opinionway_tilder_lci_la_question_de_l_eco_17sept_2015.pdf &quot; target=_blank&gt;&lt;strong&gt; Vague du 17 septembre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;La menace dâune ÂŤuberisationÂť de lâĂŠconomie franĂ§aise&lt;/li&gt;\r\n&lt;li&gt;Le sentiment de protection des donnĂŠes bancaires lors dâun achat en ligne&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/24-Opinionway_tilder_lci_la_question_de_l_eco_10sept_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 10 septembre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLa perception dâune rĂŠforme du code du travail permettant dâadapter le temps de travail par secteur &lt;/li&gt;\r\n&lt;li&gt; \r\nLâengagement de FranĂ§ois Hollande sur la fermeture de la centrale nuclĂŠaire de Fessenheim\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/23-Opinionway_tilder_lci_la_question_de_l_eco_3sept_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 3 septembre 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLa perception de la manifestation des agriculteurs&lt;/li&gt;\r\n&lt;li&gt; \r\nLâadhĂŠsion Ă  la dĂŠcision de FranĂ§ois Hollande de supprimer lâaugmentation de la TVA\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/22-Opinionway_tilder_lci_la_question_de_l_eco_2juillet_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 2 juillet 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLe maintien de lâaide financiĂ¨re de lâUE et du FMI en GrĂ¨ce&lt;/li&gt;\r\n&lt;li&gt; \r\nLe rĂ´le jouĂŠ par la France dans la rĂŠsolution de la crise de la dette grecque\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/21-Opinionway_tilder_lci_la_question_de_l_eco_25juin_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 25 juin 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLâimpact des Jeux Olympiques sur lâĂŠconomie franĂ§aise\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLâopinion sur des sanctions suite aux ĂŠcoutes de dirigeants franĂ§ais par les Etats-Unis\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/20-Opinionway_tilder_lci_la_question_de_l_eco_18juin_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 17 juin 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLa sortie de lâeuro comme solution pour rĂŠsoudre la crise grecque\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLa nĂŠcessitĂŠ dâutiliser lâarticle 49-3 pour adopter la loi Macron\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/19-Opinionway_tilder_lci_la_question_de_l_eco_10juin_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 10 juin 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLa perception de la possibilitĂŠ de renouveler les CDD deux fois\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLa perception de la limitation des indemnitĂŠs prudâhomales en cas de licenciement\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/18-Opinionway_tilder_lci_la_question_de_l_eco_4juin_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 4 juin 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLâinfluence de 100 000 nouveaux contrats aidĂŠs sur la situation de lâemploi\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLâopinion sur lâobligation dâaccepter systĂŠmatiquement les paiements par carte&lt;/li&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/17-Opinionway_tilder_lci_la_question_de_l_eco_28mai_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 28 mai 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLa reconnaissance du burn-out comme maladie professionnelle\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLes influences dans le choix du pays organisateur de la coupe du monde de foot\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/16-Opinionway_tilder_lci_la_question_de_l_eco_21mai_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 21 mai 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLa mise en place du prĂŠlĂ¨vement Ă  la source pour lâimpĂ´t sur le revenu\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLa suppression des 35h Ă  lâhĂ´pital et le retour aux 39h\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/15-Opinionway_tilder_lci_la_question_de_l_eco_7mai_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 7 mai 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLâimpact dâune sortie de la Grande-Bretagne de lâUE pour lâĂŠconomie europĂŠenne\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLâĂŠvolution de sa situation financiĂ¨re depuis lâĂŠlection de FranĂ§ois Hollande\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/14-Opinionway_tilder_lci_la_question_de_l_eco_30avril_2015.pdf&quot; target=_blank&gt;&lt;strong&gt; Vague du 30 avril 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; \r\nLâopinion sur le budget de la dĂŠfense nationale\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nSatisfaction Ă  lâĂŠgard de la politique ĂŠconomique et sociale du gouvernement \r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/13-Opinionway_tilder_lci_la_question_de_l_eco_23avril_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 23 avril 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\nLâattitude de lâUnion EuropĂŠenne face aux migrants fuyant des zones de conflit\r\n&lt;/li&gt;\r\n&lt;li&gt; \r\nLâĂŠvolution des moyens allouĂŠs par la France contre le terrorisme\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/12-Opinionway_tilder_lci_la_question_de_l_eco_16avril_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 16 avril 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; La lĂŠgitimitĂŠ de lâUnion europĂŠenne Ă  rĂ¨glementer les pratiques de Google &lt;/li&gt;\r\n&lt;li&gt; Lâopinion sur la suppression de la dĂŠclaration de revenus sous format papier &lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/11-Opinionway_tilder_lci_la_question_de_l_eco_9avril_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 9 avril 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; La lĂŠgitimitĂŠ de lâEtat Ă  empĂŞcher le rachat de Dailymotion par un groupe ĂŠtranger&lt;/li&gt;\r\n&lt;li&gt; PrioritĂŠ pour le gouvernement en matiĂ¨re dâimpĂ´ts dans les mois qui viennent&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/10-Opinionway_tilder_lci_la_question_de_l_eco_2avril_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 2 avril 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; CapacitĂŠ dâun contrat de travail plus flexible Ă  crĂŠer des emplois&lt;/li&gt;\r\n&lt;li&gt; PrioritĂŠ donnĂŠe Ă  une loi favorisant lâinvestissement des entreprises&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/9-Opinionway_tilder_lci_la_question_de_l_eco_19mars_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 19 mars 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Les domaines prioritaires dans son dĂŠpartement Ă  lâissue des ĂŠlections dĂŠpartementales&lt;/li&gt;\r\n&lt;li&gt; AdhĂŠsion Ă  la mise en place du tiers payant gĂŠnĂŠralisĂŠ&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/8-Opinionway_tilder_lci_la_question_de_l_eco_12mars_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 12 mars 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Opinion sur la dĂŠcision du gouvernement de maintenir les dĂŠpartements&lt;/li&gt;\r\n&lt;li&gt; Opinion sur la dĂŠcision de lâUE de donner Ă  la France un dĂŠlai pour revenir sous 3% de dĂŠficit&lt;/li&gt; &lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/7-Opinionway_tilder_lci_la_question_de_l_eco_05mars_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 5 mars 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Perception de lâextension de la prime pour lâactivitĂŠ aux moins de 26 ans&lt;/li&gt;\r\n&lt;li&gt; PrioritĂŠ pour favoriser lâĂŠgalitĂŠ professionnelle homme/femme &lt;/li&gt; &lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/6-Opinionway_tilder_lci_la_question_de_l_eco_26_fev_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 26 fĂŠvrier 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Satisfaction Ă  lâĂŠgard de la politique ĂŠconomique et sociale du gouvernement&lt;/li&gt;\r\n&lt;li&gt; Sentiment que Manuel Valls parviendra Ă  poursuivre sa politique de rĂŠformes &lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/5-Opinionway_tilder_lci_la_question_de_l_eco_19_fev_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 19 fĂŠvrier 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Mesure de la loi Macron la plus importante pour la croissance et lâemploi&lt;/li&gt;\r\n&lt;li&gt; Solution prĂŠfĂŠrĂŠe pour rĂŠformer les retraites complĂŠmentaires &lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/4-Opinionway_tilder_lci_la_question_de_l_eco_12_fev_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 12 fĂŠvrier 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt; Acteur Ă  sanctionner en prioritĂŠ dans les affaires dâĂŠvasion fiscale&lt;/li&gt;\r\n&lt;li&gt; Influence de la durĂŠe lĂŠgale du travail sur le chĂ´mage&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/3-Opinionway_tilder_lci_la_question_de_l_eco_5_fev_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 5 fĂŠvrier 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Type de voiture prĂŠfĂŠrĂŠ en cas de renouvellement &lt;/li&gt;\r\n&lt;li&gt;EfficacitĂŠ dâune prime pour lâachat des vĂŠhicules ĂŠlectriques&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/2-Opinionway_tilder_lci_la_question_de_l_eco_29_janvier_2015.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 29 janvier 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Opinion sur la nationalisation des autoroutes &lt;/li&gt;\r\n&lt;li&gt;Opinion sur lâannulation de la dette grecque&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #B2B2B2 1px;&quot;&gt;\r\n&lt;/br&gt;\r\n&lt;ul&gt;&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/Questiondeleco/1-Opinionway_tilder_lci_la_question_de_l_eco_22_janvier_2014.pdf&quot; target=_blank&gt;&lt;strong&gt;Vague du 22 janvier 2015&lt;/strong&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Sentiment quâun gouvernement dâunion nationale pourrait relancer la croissance &lt;/li&gt;\r\n&lt;li&gt;Satisfaction Ă  lâĂŠgard de la politique ĂŠconomique et sociale du gouvernement&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/br&gt;', '', '', '', '2016-01-29 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 62, 'Qui sommes nous - CCI France ?', '', '', '', 'qui-sommes-nous-cci-france', 'CCI', 'Qui sommes nous - CCI France ?', '', '', '', '', '&lt;p&gt;&lt;strong&gt;CCI FRANCE est\r\nl&#039;ĂŠtablissement national fĂŠdĂŠrateur et animateur des Chambres de Commerce et\r\nd&#039;Industrie. &lt;/strong&gt;&lt;br /&gt;Les\r\nmissions de CCI France sont les suivantes :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;reprĂŠsenter le rĂŠseau et les\r\nintĂŠrĂŞts du commerce, de lâindustrie et des services au plan national, europĂŠen\r\net international,&lt;/li&gt;&lt;li&gt;Â assurer lâanimation de\r\nlâensemble du rĂŠseau des CCI (135 CCI et 27 CCI rĂŠgionales)&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;a href=&quot;http://www.cci.fr/web/organisation-du-reseau/coordonnees-acces&quot;&gt;&lt;em&gt;CCI France est situĂŠe Ă  Paris&lt;/em&gt;&lt;/a&gt;&lt;em&gt;.&lt;/em&gt;&lt;/p&gt;&lt;p&gt;&lt;em&gt;Son PrĂŠsident est ĂŠlu pour 5 ans par ses pairs, chefs d&#039;entreprise\r\net PrĂŠsidents de CCI. L&#039;AssemblĂŠe GĂŠnĂŠrale de CCI France a ĂŠlu leÂ 22\r\nFĂŠvrier 2011,Â &lt;/em&gt;&lt;a href=&quot;http://www.cci.fr/web/organisation-du-reseau/president-de-l-acfci&quot;&gt;&lt;strong&gt;&lt;em&gt;AndrĂŠ Marcon&lt;/em&gt;&lt;/strong&gt;&lt;/a&gt;&lt;em&gt;, Â qui ĂŠtait jusqu&#039;Ă  cette date\r\nvice-prĂŠsident de CCI France, PrĂŠsident de la CCI de la rĂŠgion Auvergne et\r\ninvesti en tant que chef dâentreprise dans le secteur de lâhĂ´tellerie/ tourisme\r\nde nature.&lt;/em&gt;&lt;/p&gt;', '', '', '', '2015-03-18 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 61, 'Qui sommes nous - Opinionway ?', '', '', '', 'qui-sommes-nous-opinionway', '', 'Qui sommes nous - Opinionway ?', '', '', '', '', '&lt;p&gt;&lt;strong&gt;OpinionWay &lt;/strong&gt;est un Institut dâĂŠtudes indĂŠpendant\r\ncrĂŠĂŠ en 2000. PME de 60 salariĂŠs OpinionWay a dĂŠveloppĂŠ une forte expertise\r\ndans lâĂŠcoute et lâaccompagnement des entreprises. A lâissue dâun Appel dâOffre,\r\nOpinionWay a ĂŠtĂŠ choisi par CCI France pour gĂŠrer et animer la plateforme en\r\nprĂŠservant lâanonymat des participants. OpinionWay sera votre interlocuteur\r\ndirect.&lt;/p&gt;', '', '', '', '2015-07-31 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `CmsContent` (`CmsContentId`, `CmsCategoryId`, `Name`, `NameTransEN`, `NameTransDE`, `NameTransRU`, `SeoName`, `Keyword`, `Description`, `ShortDescription`, `ShortDescriptionTransEN`, `ShortDescriptionTransDE`, `ShortDescriptionTransRU`, `LongDescription`, `LongDescriptionTransEN`, `LongDescriptionTransDE`, `LongDescriptionTransRU`, `UpdateDate`, `CmsContentOrder`, `Status`, `ImgDriveName`, `Om1`, `Om2`, `Om3`, `Om4`, `Om5`, `Om6`, `Om7`, `Om8`, `Om9`, `Om10`, `Om11`, `Om12`, `Om13`, `Om14`, `Om15`, `Om16`, `Om17`, `Om18`) VALUES
(45, 69, 'Observatoire de la performance des PME/ETI - Banque Palatine/Challenges/iTĂŠlĂŠ', '', '', '', 'observatoire-de-la-performance-des-pmeeti-banque-palatinechallengesitele', 'Observatoire de la performance des PME/ETI, Banque Palatine/Challenges, iTĂŠlĂŠ, Confiance, Perspectives, dirigeants, ĂŠconomie mondiale, entreprise', 'Observatoire de la performance des PME/ETI - Banque Palatine/Challenges/iTĂŠlĂŠ', '', '', '', '', '&lt;p&gt;&lt;img src=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/Palatine-quad.png&quot; height=&quot;40&quot; /&gt; &lt;img src=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/Logo-Challenges.jpg&quot; height=&quot;40&quot; /&gt;   &lt;img src=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/itele.jpg&quot; height=&quot;50&quot; /&gt; &lt;/p&gt;   &lt;br /&gt;  \r\n&lt;p&gt;L&#039;observatoire de la performance des PME/ETI est un baromĂ¨tre mensuel rĂŠalisĂŠ par Opinionway et Banque Palatine pour Challenges et iTĂŠlĂŠ&lt;/p&gt;\r\n&lt;p&gt; Chaque mois, un ĂŠchantillon de &lt;strong&gt;dirigeants dâentreprises (PDG, DG, DAF, âŚ) dont le chiffre dâaffaires est compris entre 15 et 500 millions dâeuros. &lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;La reprĂŠsentativitĂŠ de lâĂŠchantillon a ĂŠtĂŠ assurĂŠe par un redressement en termes de secteurs dâactivitĂŠ et de chiffre dâaffaires.&lt;br /&gt;\r\nLâĂŠchantillon est interrogĂŠ par tĂŠlĂŠphone sur systĂ¨me CATI.&lt;/p&gt;\r\n&lt;p&gt;Les rĂŠsultats de cette ĂŠtude sont lâentiĂ¨re propriĂŠtĂŠ dâOpinionWay. Toute publication totale ou partielle de ces chiffres doit impĂŠrativement utiliser la mention complĂ¨te suivante : &lt;em&gt;ÂŤ Observatoire de la performance des PME/ETI â OpinionWay/Banque PALATINE pour i&gt;TELE-Challenges Âť&lt;/em&gt; et aucune reprise de ces chiffres ne pourra ĂŞtre dissociĂŠe de cet intitulĂŠ.&lt;/p&gt;\r\n\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #004379 2px; text-align:center;&quot;&gt;\r\n&lt;br /&gt;\r\n&lt;h4&gt;DerniĂ¨re vague publiĂŠe - Janvier 2016 :&lt;/h4&gt;\r\n  \r\n&lt;br /&gt;\r\n&lt;iframe src=&quot;//www.slideshare.net/slideshow/embed_code/key/3Eys9rI288H4IL&quot; width=&quot;595&quot; height=&quot;485&quot; frameborder=&quot;0&quot; marginwidth=&quot;0&quot; marginheight=&quot;0&quot; scrolling=&quot;no&quot; style=&quot;border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;&quot; allowfullscreen&gt; &lt;/iframe&gt; \r\n  \r\n&lt;br /&gt;  \r\n&lt;/div&gt;\r\n\r\n&lt;br /&gt;\r\n&lt;br /&gt;\r\n\r\n&lt;div style=&quot;background-color:#FAFAFA; padding-left: 2%; padding-right: 2%; border:none; border-bottom: dotted #004379 2px;&quot;&gt;\r\n&lt;br /&gt;\r\n&lt;h4&gt;TĂŠlĂŠchargez ci-dessous les vagues prĂŠcĂŠdentes :&lt;/h4&gt;\r\n&lt;ul&gt;\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine-OpinionWay-Observatoire-de-la-performance-des-PME-ETI-Janvier-2016.pdf&quot; target=_blank&gt;Vague de janvier 2016&lt;/a&gt;&lt;/br&gt;  \r\n&lt;/li&gt;\r\n\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/OpinionWay-Observatoire-de-la-performance-des-PME-ETI-Decembre2015.pdf&quot; target=_blank&gt;Vague de dĂŠcembre 2015&lt;/a&gt;&lt;/br&gt;  \r\n&lt;/li&gt;\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine-OpinionWay-Observatoire-de-la-performance-des-PME-ETI-Novembre2015.pdf&quot; target=_blank&gt;Vague de novembre 2015&lt;/a&gt;&lt;/br&gt;  \r\n&lt;/li&gt;\r\n\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine-OpinionWay-Observatoire-de-la-performance-des-PME-ETI-Octobre2015.pdf&quot; target=_blank&gt; Vague d&#039;octobre 2015&lt;/a&gt;&lt;/br&gt;  \r\n&lt;/li&gt;\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/Banque Palatine - OpinionWay_Observatoire_de_la_performance_des_PME-ETI_Septembre2015-Barometrique.pdf&quot;&gt;Septembre 2015&lt;/a&gt;&lt;/br&gt;\r\nQuestions d&#039;actualitĂŠ du mois : &lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/Banque-Palatine-OpinionWay-Observatoire-de-la-performance-des-PME-ETI-Septembre 2015-Questions_dactu.pdf&quot; target=_blank&gt;Focus sur les jeunes diplĂ´mĂŠs.&lt;/a&gt;  \r\n&lt;/li&gt;	\r\n\r\n\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine-OpinionWay-Observatoire-de-la-performance-des-PME-ETI-Juin2015.pdf&quot;&gt;Juin 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine_OpinionWay_Observatoire_de_la_performance_des_PME-ETI_Mai2015.pdf&quot;&gt;Mai 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine_OpinionWay-Observatoire-de-la-performance-des-PME-ETI_04-2015.pdf&quot;&gt;Avril 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine_OpinionWay-Observatoire-de-la-performance-des-PME-ETI_03-2015.pdf&quot;&gt;Mars 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/BanquePalatine-OpinionWay_Observatoire_de_la_performance_des_PME-ETI_Fev2015.pdf&quot;&gt;FĂŠvrier 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/Banque_Palatine-OpinionWay_Observatoire_de_la_performance_des_PME-ETI_Janvier2015.pdf&quot;&gt;Janvier 2015&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/10-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_dec._2014.pdf&quot;&gt;DĂŠcembre 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/9-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_nov_2014.pdf&quot;&gt;Novembre 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/8-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_oct_2014.pdf&quot;&gt;Octobre 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/7-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_sept._2014.pdf&quot;&gt;Septembre 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/6-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_juin_2014.pdf&quot;&gt;Juin 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/5-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_mai_2014.pdf&quot;&gt;Mai 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/4-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti-Avril2014.pdf&quot;&gt;Avril 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/3-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti-_mars_2014.pdf&quot;&gt;Mars 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/2-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_fevrier_2014.pdf&quot;&gt;FĂŠvrier 2014&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a class=&quot;external&quot; href=&quot;http://grandeconsultation.fr/Documents/ObsPMEETI/1-banque_palatine_-_opinionway_-_observatoire_de_la_performance_des_pme-eti_-_janvier_2014.pdf&quot;&gt;Janvier 2014&lt;/a&gt;&lt;/li&gt;\r\n\r\n&lt;/ul&gt;\r\n&lt;/div&gt;', '', '', '', '2016-01-28 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `CmsContentPicture`
--

CREATE TABLE IF NOT EXISTS `CmsContentPicture` (
  `CmsContentPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `CmsContentId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `ImgAltName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgOrder` int(11) NOT NULL,
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY (`CmsContentPictureId`),
  KEY `ProductId` (`CmsContentId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `CmsContentPicture`
--


-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE IF NOT EXISTS `Country` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`CountryId`, `Name`) VALUES
(1, 'Albania'),
(2, 'Algeria'),
(3, 'Andorra'),
(4, 'Angola'),
(5, 'Antigua'),
(6, 'Argentina'),
(7, 'Armenia'),
(8, 'Australia'),
(9, 'Austria'),
(10, 'Azerbaijan'),
(11, 'Bahamas'),
(12, 'Bahrain'),
(13, 'Bangladesh'),
(14, 'Barbados'),
(15, 'Belarus'),
(16, 'Belgium'),
(17, 'Belize'),
(18, 'Benin'),
(19, 'Bermuda'),
(20, 'Bhutan'),
(21, 'Bolivia'),
(22, 'Bosnia Herzegovina'),
(23, 'Botswana'),
(24, 'Brazil'),
(25, 'Brunei Darussalam'),
(26, 'Bulgaria'),
(27, 'Burkina Faso'),
(28, 'Burundi'),
(29, 'Cambodia'),
(30, 'Cameroon'),
(31, 'Canada'),
(32, 'Cape Verde'),
(33, 'Cayman Islands'),
(34, 'Central African Rep'),
(35, 'Chad'),
(36, 'Chile'),
(37, 'China'),
(38, 'Colombia'),
(39, 'Comoros'),
(40, 'Congo'),
(41, 'Costa Rica'),
(42, 'Croatia'),
(43, 'Cuba'),
(44, 'Cyprus'),
(45, 'Czech Republic'),
(46, 'Denmark'),
(47, 'Djibouti'),
(48, 'Dominican Republic'),
(49, 'Ecuador'),
(50, 'Egypt'),
(51, 'El Salvador'),
(52, 'Equatorial Guinea'),
(53, 'Eritrea'),
(54, 'Estonia'),
(55, 'Ethiopia'),
(56, 'EU'),
(57, 'Falkland Islands'),
(58, 'Faroe Islands'),
(59, 'Fiji'),
(60, 'Finland'),
(61, 'France'),
(62, 'Gabon'),
(63, 'Gambia'),
(64, 'Georgia'),
(65, 'Germany'),
(66, 'Ghana'),
(67, 'Gibraltar'),
(68, 'Greece'),
(69, 'Grenada'),
(70, 'Guam'),
(71, 'Guatemala'),
(72, 'Guinea Bissau'),
(73, 'Guinea'),
(74, 'Guyana'),
(75, 'Haiti'),
(76, 'Honduras'),
(77, 'Hong Kong'),
(78, 'Hungary'),
(79, 'Iceland'),
(80, 'India'),
(81, 'Indonesia'),
(82, 'Iran'),
(83, 'Iraq'),
(84, 'Ireland'),
(85, 'Israel'),
(86, 'Italy'),
(87, 'Ivory Coast'),
(88, 'Jamaica'),
(89, 'Japan'),
(90, 'Jordan'),
(91, 'Kazakhstan'),
(92, 'Kenya'),
(93, 'Kosovo'),
(94, 'Kuwait'),
(95, 'Kyrgyzstan'),
(96, 'Laos'),
(97, 'Latvia'),
(98, 'Lebanon'),
(99, 'Lesotho'),
(100, 'Liberia'),
(101, 'Libya'),
(102, 'Liechtenstein'),
(103, 'Lithuania'),
(104, 'Luxembourg'),
(105, 'Macedonia'),
(106, 'Madagascar'),
(107, 'Malawi'),
(108, 'Malaysia'),
(109, 'Maldives'),
(110, 'Mali'),
(111, 'Malta'),
(112, 'Marshall Islands'),
(113, 'Mauritania'),
(114, 'Mauritius'),
(115, 'Mexico'),
(116, 'Micronesia'),
(117, 'Moldavia'),
(118, 'Monaco'),
(119, 'Mongolia'),
(120, 'Morocco'),
(121, 'Mozambique'),
(122, 'Myanmar (Burma)'),
(123, 'Namibia'),
(124, 'Nepal'),
(125, 'Netherlands'),
(126, 'New Zealand'),
(127, 'Nicaragua'),
(128, 'Niger'),
(129, 'Nigeria'),
(130, 'North Korea'),
(131, 'Norway'),
(132, 'Oman'),
(133, 'Pakistan'),
(134, 'Palau'),
(135, 'Panama'),
(136, 'Papua New Guinea'),
(137, 'Paraguay'),
(138, 'Peru'),
(139, 'Philippines'),
(140, 'Poland'),
(141, 'Portugal'),
(142, 'Quatar'),
(143, 'Republic Democratic of Congo'),
(144, 'Romania'),
(145, 'Russia'),
(146, 'Rwanda'),
(147, 'Saint Kitts'),
(148, 'Saint Lucia'),
(149, 'Saint Tome'),
(150, 'Saint Vincent'),
(151, 'Samoa'),
(152, 'San Marino'),
(153, 'Saudi Arabia'),
(154, 'Senegal'),
(155, 'Serbia'),
(156, 'Seychelles'),
(157, 'Sierra Leone'),
(158, 'Singapore'),
(159, 'Slovakia'),
(160, 'Slovenia'),
(161, 'Solomon Islands'),
(162, 'Somalia'),
(163, 'South Africa'),
(164, 'South Korea'),
(165, 'Spain'),
(166, 'Sri Lanka'),
(167, 'Sudan'),
(168, 'Suriname'),
(169, 'Swaziland'),
(170, 'Sweden'),
(171, 'Switzerland'),
(172, 'Syria'),
(173, 'Tadjikistan'),
(174, 'Taiwan'),
(175, 'Tanzania'),
(176, 'Thailand'),
(177, 'Togo'),
(178, 'Trinidad/Tobago'),
(179, 'Tunisia'),
(180, 'Turkey'),
(181, 'Turkmenistan'),
(182, 'Uganda'),
(183, 'Ukraine'),
(184, 'United Arab Emirates'),
(185, 'United Kingdom'),
(186, 'United States'),
(187, 'Uruguay'),
(188, 'Uzbekistan'),
(189, 'Vanuatu'),
(190, 'Vatican City'),
(191, 'Venezuela'),
(192, 'Vietnam'),
(193, 'Virgin Islands'),
(194, 'Yemen'),
(195, 'Zambia'),
(196, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `Delta`
--

CREATE TABLE IF NOT EXISTS `Delta` (
  `DeltaId` int(11) NOT NULL AUTO_INCREMENT,
  `ClubId` int(11) NOT NULL,
  `BetaId` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) NOT NULL,
  `Keyword` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EventDate` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `EventCalendar` date NOT NULL,
  `ShortDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) NOT NULL DEFAULT '0',
  `PictureDescSmall` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `DeltaOrder` int(11) NOT NULL,
  PRIMARY KEY (`DeltaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Delta`
--

INSERT INTO `Delta` (`DeltaId`, `ClubId`, `BetaId`, `Name`, `SeoName`, `Keyword`, `Description`, `EventDate`, `EventCalendar`, `ShortDescription`, `LongDescription`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `PictureDescSmall`, `Status`, `DeltaOrder`) VALUES
(3, 0, 0, 'La Tribune', 'la-tribune', 'La Tribune', '', '', '0000-00-00', '&lt;p&gt;Header 2&lt;/p&gt;', '', '2015-07-27', 'be052f56d794b47020920139e906cf8d.jpg', '0', '', 0, 2),
(4, 0, 0, 'Europe1', 'europe1', 'Europe1', '', '', '0000-00-00', '&lt;p&gt;Header 3&lt;/p&gt;', '', '2015-07-27', '62c6b1b317f120377f4e6c9f1b3e8b15.jpg', '0', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `DeltaPicture`
--

CREATE TABLE IF NOT EXISTS `DeltaPicture` (
  `DeltaPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `DeltaId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgAltName` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY (`DeltaPictureId`),
  KEY `DeltaId` (`DeltaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `DeltaPicture`
--

INSERT INTO `DeltaPicture` (`DeltaPictureId`, `DeltaId`, `ImgDriveName`, `ImgAltName`, `IW`, `IH`) VALUES
(2, 2, '89aa52e98f9b0e71c9a24db901a06abf.jpg', '', 320, 92),
(3, 3, 'be052f56d794b47020920139e906cf8d.jpg', '', 320, 92),
(4, 4, '62c6b1b317f120377f4e6c9f1b3e8b15.jpg', '', 320, 92);

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE IF NOT EXISTS `Event` (
  `EventId` int(11) NOT NULL AUTO_INCREMENT,
  `ClubId` int(11) NOT NULL,
  `PhotoId` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) NOT NULL,
  `EventDate` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `EventCalendar` date NOT NULL,
  `ShortDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL DEFAULT '0000-00-00',
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) NOT NULL DEFAULT '0',
  `PictureDescSmall` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Archived` int(11) NOT NULL,
  `Ordering` int(11) NOT NULL,
  PRIMARY KEY (`EventId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `Event`
--

INSERT INTO `Event` (`EventId`, `ClubId`, `PhotoId`, `Name`, `SeoName`, `EventDate`, `EventCalendar`, `ShortDescription`, `LongDescription`, `CreationDate`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `PictureDescSmall`, `Archived`, `Ordering`) VALUES
(170, 0, 0, 'Anna i Tomasz', 'anna-i-tomasz', '1', '2009-07-25', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-16', '2010-06-13', '', '', '', 0, 2),
(177, 0, 0, 'Magdalena i Micha??', 'magdalena-i-michal', '1', '2009-08-29', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-25', '2010-06-13', '', '', '', 0, 3),
(178, 0, 0, 'Sylwia i Adam ', 'sylwia-i-adam', '1', '2009-05-15', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-30', '2010-06-13', '', '', '', 0, 4),
(179, 0, 0, 'Lenka', 'lenka', '1', '2010-04-25', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-30', '2010-06-13', '', '', '', 0, 5),
(180, 0, 0, 'Weronika i Damian', 'weronika-i-damian', '1', '2010-02-13', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-31', '2010-06-13', '', '', '', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `EventPicture`
--

CREATE TABLE IF NOT EXISTS `EventPicture` (
  `EventPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `EventId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) NOT NULL DEFAULT '0',
  `ImgAlt` varchar(40) NOT NULL DEFAULT '0',
  `ImgType` varchar(10) NOT NULL DEFAULT '0',
  `BigImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `BigImgFileName` varchar(40) NOT NULL DEFAULT '0',
  `BigImgAlt` varchar(40) NOT NULL DEFAULT '0',
  `BigImgType` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`EventPictureId`),
  KEY `ClubId` (`EventId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `EventPicture`
--

INSERT INTO `EventPicture` (`EventPictureId`, `EventId`, `ImgDriveName`, `ImgFileName`, `ImgAlt`, `ImgType`, `BigImgDriveName`, `BigImgFileName`, `BigImgAlt`, `BigImgType`) VALUES
(15, 1, '1ce5d6524d655e63ea5d7666dfb8ecd2.jpg', '', '', '', '', '', '', ''),
(16, 2, '6d361baef55e073a3fd806065a81ff44.jpg', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Gama`
--

CREATE TABLE IF NOT EXISTS `Gama` (
  `GamaId` int(11) NOT NULL AUTO_INCREMENT,
  `ClubId` int(11) NOT NULL,
  `GminaId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Keyword` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ShortDescription` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text COLLATE utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `VideoDriveName` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `GamaOrder` int(11) NOT NULL,
  `YouTube` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`GamaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `Gama`
--

INSERT INTO `Gama` (`GamaId`, `ClubId`, `GminaId`, `Name`, `SeoName`, `Keyword`, `Description`, `EventDate`, `ShortDescription`, `LongDescription`, `UpdateDate`, `ImgDriveName`, `VideoDriveName`, `Status`, `GamaOrder`, `YouTube`) VALUES
(23, 0, 0, 'Bochnia', 'bochnia', 'Bochnia', '', '', '&lt;p&gt;krĂłtki opis miasta&lt;/p&gt;', '', '2012-01-06', '', '', 0, 2, ''),
(22, 0, 0, 'KrakĂłw', 'krakow', 'Krakow', '', '', '&lt;p&gt;to jest krĂłtki opis&lt;/p&gt;', '', '2012-01-06', '', '', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `GamaPicture`
--

CREATE TABLE IF NOT EXISTS `GamaPicture` (
  `GamaPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `GamaId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `ImgAltName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `IW` int(11) NOT NULL DEFAULT '0',
  `IH` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`GamaPictureId`),
  KEY `ClubId` (`GamaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `GamaPicture`
--

INSERT INTO `GamaPicture` (`GamaPictureId`, `GamaId`, `ImgDriveName`, `ImgAltName`, `IW`, `IH`) VALUES
(2, 1, '2d129eb6c167d744462087052b352049.jpg', '', 320, 240),
(3, 20, 'b74b67cf4eb309108618c28131abb094.jpg', '', 320, 246),
(4, 20, '74f624c37b7a3b402036d1a547daa7ca.jpg', '', 320, 243),
(5, 20, '3f6bb1d19ff3b66d49f69b5613685a84.jpg', '', 320, 242),
(6, 20, 'a1bacbdd473ddb6b3209b9fa0c1242d7.jpg', '', 320, 243),
(7, 20, 'fb073067f5b818c7ff32fb14e027c736.jpg', '', 320, 244),
(8, 20, 'bd5e40d6aeeea5aba2c923f760f4068f.jpg', '', 320, 231),
(9, 20, 'f0e671e03fb8fe34337480f649b86533.jpg', '', 320, 214);

-- --------------------------------------------------------

--
-- Table structure for table `Newsletter`
--

CREATE TABLE IF NOT EXISTS `Newsletter` (
  `NewsletterId` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `CreateDate` date NOT NULL,
  PRIMARY KEY (`NewsletterId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Newsletter`
--

INSERT INTO `Newsletter` (`NewsletterId`, `Email`, `CreateDate`) VALUES
(2, 'tprokop@prothomsoft.com', '2014-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` varchar(100) NOT NULL DEFAULT '',
  `CreateDate` datetime DEFAULT NULL,
  `AuthorizeDate` date DEFAULT NULL,
  `AuthorizeStatus` int(11) DEFAULT NULL,
  `AuthorizeMail` int(11) NOT NULL,
  `CustomerInformation` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `Comments` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `Amount` float(8,2) DEFAULT NULL,
  `IsSend` int(1) NOT NULL DEFAULT '0',
  `IsPointed` int(1) NOT NULL DEFAULT '0',
  `PointComment` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ShipName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `PaymentName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ShipPrice` float(8,2) NOT NULL,
  `NameFirst` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `NameLast` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Street` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Number` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Zip` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `City` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Phone1` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Organization` varchar(255) NOT NULL,
  `OrganizationEmail` varchar(255) NOT NULL,
  PRIMARY KEY (`OrderId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderId`, `UserId`, `CreateDate`, `AuthorizeDate`, `AuthorizeStatus`, `AuthorizeMail`, `CustomerInformation`, `Comments`, `Amount`, `IsSend`, `IsPointed`, `PointComment`, `ShipName`, `PaymentName`, `ShipPrice`, `NameFirst`, `NameLast`, `Street`, `Number`, `Zip`, `City`, `Phone1`, `Country`, `Organization`, `OrganizationEmail`) VALUES
(1, '', '2013-10-27 15:10:27', '0000-00-00', 0, 0, 'admin', '', 36000.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 370.00, '1', '2', '3', '4', '5', '6', '7', '', '', ''),
(2, '', '2013-10-27 16:10:58', '0000-00-00', 0, 0, '', '', 2020.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 150.00, 'test', 'test', 'test', 'test', 'test', 'test', 'test', '', '', ''),
(3, '', '2013-10-27 16:10:38', '0000-00-00', 0, 0, '', '', 3243.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 110.00, 'test', 'test', 'test', 'test', 'test', 'test', 'test', '', '', ''),
(4, '', '2013-11-07 12:11:41', '0000-00-00', 0, 0, '', '', 83720.00, 0, 0, '', 'Hent varen selv etter avtale (ta kontakt)', 'Bedrift/skolekunde (faktura)', 0.00, 'Marius', 'SjĂ¸li', 'SjĂ¸li', '1', '2164', 'Skogbygda', '98811568', '', '', ''),
(5, '', '2013-11-07 12:11:03', '0000-00-00', 0, 0, '', '', 1690.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 150.00, 'sk', 'ksk', 'ksk', '6', '6543', 'Skogh', '9286257', '', '', ''),
(6, '', '2013-11-09 18:11:07', '0000-00-00', 0, 0, '', '', 1700.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'Tomasz', 'Prokop', 'Test', 'Test', 'Test', 'Test', 'Test', '', '', ''),
(7, '', '2013-12-12 10:12:24', '0000-00-00', 0, 0, '', '', 1250.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', '95475972', '', '', ''),
(8, '', '2013-12-21 19:12:11', '0000-00-00', 0, 0, '', '', 1.00, 0, 0, '', 'Hent varen selv etter avtale (ta kontakt)', 'Bedrift/skolekunde (faktura)', 0.00, 'Tomasz', 'Prokop', 'test', 'test', 'test', 'test', 'test', '', '', ''),
(9, '', '2013-12-21 19:12:11', '0000-00-00', 0, 0, '', '', 1.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'test', 'test', 'test', 'test', 'test', 'test', 'test', '', '', ''),
(10, '', '2014-02-23 21:02:53', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(11, '', '2014-02-23 21:02:41', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(12, '', '2014-02-23 21:02:49', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(13, '', '2014-02-23 21:02:04', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(14, '', '2014-02-23 21:02:10', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(15, '', '2014-02-23 21:02:16', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(16, '', '2014-02-23 21:02:23', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(17, '', '2014-02-23 21:02:33', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(18, '', '2014-02-23 21:02:44', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(19, '', '2014-02-23 21:02:53', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(20, '', '2014-02-23 21:02:01', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(21, '', '2014-02-23 21:02:14', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(22, '', '2014-02-23 21:02:30', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(23, '', '2014-02-23 21:02:13', '0000-00-00', 0, 0, '', '', 240.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', 'Seniorsaken 12345678', '', '', ''),
(24, '', '2014-02-23 21:02:56', '0000-00-00', 0, 0, '', '', 60.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '12345678Seniorsaken', '', '', ''),
(25, '', '2014-02-23 21:02:47', '0000-00-00', 0, 0, '', '', 60.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '12345678Seniorsaken', '', '', ''),
(26, '', '2014-02-23 21:02:35', '0000-00-00', 0, 0, '', '', 60.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '12345678Seniorsaken', '', '', ''),
(27, '', '2014-02-23 21:02:43', '0000-00-00', 0, 0, '', '', 60.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '12345678Seniorsaken', '', '', ''),
(28, '', '2014-02-23 21:02:51', '0000-00-00', 0, 0, '', '', 60.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '12345678Seniorsaken', '', '', ''),
(29, '', '2014-03-02 17:03:44', '0000-00-00', 0, 0, '', '', 1.00, 0, 0, '', 'Hent varen selv etter avtale (ta kontakt)', 'Privatkunde (betal med kort/paypal)', 0.00, '1', '2', '3', '4', '5', '6', '7', '', '', ''),
(30, '', '2014-03-02 17:03:35', '0000-00-00', 0, 0, '', '', 1.00, 0, 0, '', 'Hent varen selv etter avtale (ta kontakt)', 'Bedrift/skolekunde (faktura)', 0.00, 'faktura', 'faktura', 'faktura', 'faktura', 'faktura', 'faktura', 'faktura', '', '', ''),
(31, '', '2014-03-07 15:03:58', '0000-00-00', 0, 0, '', '', 650.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'Marius', 'SjĂ¸li', 'Stokstadvegen, Stokstad gĂĽrd, En ny test', '00', '2056', 'Testbyen', '', '', '', ''),
(32, '', '2014-03-08 12:03:24', '0000-00-00', 0, 0, '', '', 1500.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(33, '', '2014-03-08 12:03:52', '0000-00-00', 0, 0, '', '', 1500.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(34, '', '2014-03-08 12:03:21', '0000-00-00', 0, 0, '', '', 1500.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(35, '', '2014-03-08 12:03:01', '0000-00-00', 0, 0, '', '', 1500.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(36, '', '2014-03-08 12:03:49', '0000-00-00', 0, 0, '', '', 1500.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen ', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(37, '', '2014-03-08 13:03:37', '0000-00-00', 0, 0, '', '', 1250.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(38, '', '2014-03-08 13:03:14', '0000-00-00', 0, 0, '', '', 1250.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(39, '', '2014-03-08 13:03:54', '0000-00-00', 0, 0, '', '', 1250.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(40, '', '2014-03-09 14:03:11', '0000-00-00', 0, 0, '', '', 450.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 110.00, 'Thorvald Grung ', 'Moe', 'Doktor Holms vei', '13 BN', '0787', 'Oslo', '48150806', '', '', ''),
(41, '', '2014-03-09 21:03:11', '0000-00-00', 0, 0, '', '', 400.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'Marius Test', 'SjĂ¸li Test', 'Test', '9726', '7654', 'Test', '87625563', '', '', ''),
(42, '', '2014-04-17 21:04:29', '0000-00-00', 0, 0, '', '', 500.00, 0, 0, '', 'Hent varen selv etter avtale (ta kontakt)', 'Bedrift/skolekunde (faktura)', 0.00, 'Marius Test', 'SjĂ¸li Test', 'Stokstadveien', '00', '2056', 'Algarheim', '', '', '', ''),
(43, '', '2014-04-17 22:04:19', '0000-00-00', 0, 0, '', '', 850.00, 0, 0, '', 'Hent varen selv etter avtale (ta kontakt)', 'Bedrift/skolekunde (faktura)', 0.00, 'Marius test', 'SjĂ¸li test', 'Test', 'Test', '6789', 'Test', '', '', '', ''),
(44, '', '2014-04-27 17:04:57', '0000-00-00', 0, 0, '', '', 4595.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 110.00, 'Thoresen hytte og renholdstjenester', 'Elizabeth Thoresen', 'Stokkebrynsvegen', '19', '2900', 'Fagernes', '', '', '', ''),
(45, '', '2014-04-28 22:04:56', '0000-00-00', 0, 0, '', '', 9190.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 150.00, 'Valdres musikkskole', 'V. Elizabeth Thoresen', 'stokkebrynsvegen', '19', '2900', 'Fagernes', '90115277', '', '', ''),
(46, '', '2014-05-03 16:05:14', '0000-00-00', 0, 0, '', '', 100.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'Katharine', 'Moegster', 'YstebĂ¸vegen, Emblem', '-', '6013', 'Aalesund', '90360632', '', '', ''),
(47, '', '2014-05-07 00:05:02', '0000-00-00', 0, 0, '', '', 300.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'Gunn-Saimi', 'Laakso-Antonsen', 'Vingromsvn.137', '137', '2608', 'Lillehammer', '41306383', '', '', ''),
(48, '', '2014-06-30 20:06:31', '0000-00-00', 0, 0, '', '', 200.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'Cathrine Vikebakk', 'Stien', 'Krogstien', '13A', '4615', 'Kristiansand', '', '', '', ''),
(49, '', '2014-08-14 13:08:02', '0000-00-00', 0, 0, '', '', 1800.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 150.00, 'Lunde', 'Barneskule', 'Klasavegen', '10', '5208', 'Os', '56575982', '', '', ''),
(50, '', '2014-08-18 14:08:47', '0000-00-00', 0, 0, '', '', 200.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'Solveig', 'Ensby', 'Hougners gate ', '26', '2609', 'Lillehammer', '92821541', '', '', ''),
(51, '', '2014-08-19 19:08:19', '0000-00-00', 0, 0, '', '', 400.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'Anne', 'Lervik', 'AlunsjĂ¸veien ', '34 H', '0957', 'Oslo', '47301189', '', '', ''),
(52, '', '2014-09-14 20:09:18', '0000-00-00', 0, 0, '', '', 2995.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 110.00, 'Vilde', 'Jensen', 'Odderhei PlatĂĽ ', '4', '4639', 'Kristiansand', '46923883', '', '', ''),
(53, '', '2014-10-21 15:10:40', '0000-00-00', 0, 0, '', '', 1700.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 110.00, 'Randi-Merete ', 'Roset', 'RĂ¸dbergveien 21', '21', '0591', 'Oslo', '41421785', '', '', ''),
(54, '', '2014-10-28 15:10:22', '0000-00-00', 0, 0, '', '', 400.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'Liv Marit', 'Sangolt', 'EidesjĂ¸en', 'Pollen skule', '5382', 'SkogsvĂĽg', '', '', '', ''),
(55, '', '2014-10-28 15:10:05', '0000-00-00', 0, 0, '', '', 800.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Bedrift/skolekunde (faktura)', 80.00, 'Blindheim barneskole', 'v/ Merethe Rekdal', 'Ăver Skytterholm ', '45', '6020', 'Ălesund', '70164240 ', '', '', ''),
(56, '', '2014-10-30 20:10:40', '0000-00-00', 0, 0, '', '', 1700.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 110.00, 'Randi-Merete', 'Roset', 'RĂ¸dbergveien 21', '21', '0591', 'Oslo', '', '', '', ''),
(57, '', '2014-11-09 10:11:22', '0000-00-00', 0, 0, '', '', 650.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'Brita', 'Furulund', 'Gina Krogsv.', '1', '1153', 'OSLO', '99354347', '', '', ''),
(58, '', '2014-11-10 15:11:25', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(59, '', '2014-11-10 15:11:34', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(60, '', '2014-11-10 15:11:42', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(61, '', '2014-11-10 15:11:50', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(62, '', '2014-11-10 15:11:56', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(63, '', '2014-11-10 15:11:08', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(64, '', '2014-11-10 15:11:16', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(65, '', '2014-11-10 15:11:24', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(66, '', '2014-11-10 15:11:31', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(67, '', '2014-11-10 15:11:44', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(68, '', '2014-11-10 15:11:50', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(69, '', '2014-11-10 15:11:57', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(70, '', '2014-11-10 15:11:05', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(71, '', '2014-11-10 15:11:16', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(72, '', '2014-11-10 15:11:22', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(73, '', '2014-11-10 15:11:30', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(74, '', '2014-11-10 15:11:38', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(75, '', '2014-11-10 15:11:49', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(76, '', '2014-11-10 15:11:56', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(77, '', '2014-11-10 15:11:04', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(78, '', '2014-11-10 15:11:11', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(79, '', '2014-11-10 15:11:21', '0000-00-00', 0, 0, '', '', 150.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, 'AndrĂĄs', 'Hidas', 'Ekornvegen', '11', '2014', 'Blystadlia', '67908566', '', '', ''),
(80, '', '2014-12-22 15:12:51', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '', '', '', ''),
(81, '', '2014-12-22 18:12:25', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(82, '', '2014-12-22 18:12:35', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(83, '', '2014-12-22 18:12:53', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(84, '', '2014-12-22 18:12:14', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(85, '', '2014-12-22 18:12:59', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(86, '', '2014-12-22 18:12:04', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(87, '', '2014-12-22 18:12:18', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(88, '', '2014-12-22 18:12:40', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(89, '', '2014-12-22 18:12:54', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(90, '', '2014-12-22 18:12:18', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(91, '', '2014-12-22 18:12:50', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', ''),
(92, '', '2014-12-22 18:12:46', '0000-00-00', 0, 0, '', '', 10.00, 0, 0, '', 'Post (porto blir lagt til prisen)', 'Privatkunde (betal med kort/paypal)', 80.00, '1', '2', '3', '4', '5', '6', '7', '', '9', '');

-- --------------------------------------------------------

--
-- Table structure for table `OrdersProduct`
--

CREATE TABLE IF NOT EXISTS `OrdersProduct` (
  `OrdersProductId` int(11) NOT NULL AUTO_INCREMENT,
  `OrderId` int(11) NOT NULL DEFAULT '0',
  `ProductId` int(11) NOT NULL DEFAULT '0',
  `PurchasePrice` float(8,2) NOT NULL DEFAULT '0.00',
  `Quantity` int(11) NOT NULL DEFAULT '0',
  `IsFilled` int(11) NOT NULL DEFAULT '0',
  `ProductCategoryLevelOneName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `ProductCategoryLevelTwoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ImgDriveName` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Points` int(11) NOT NULL,
  `PurchaseWeight` int(11) NOT NULL,
  PRIMARY KEY (`OrdersProductId`,`OrderId`,`ProductId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `OrdersProduct`
--

INSERT INTO `OrdersProduct` (`OrdersProductId`, `OrderId`, `ProductId`, `PurchasePrice`, `Quantity`, `IsFilled`, `ProductCategoryLevelOneName`, `ProductCategoryLevelTwoName`, `ImgDriveName`, `Name`, `Points`, `PurchaseWeight`) VALUES
(1, 1, 8, 850.00, 10, 0, 'Instrumenter', 'Kalimbaer', '232aa9c9e5ecffc4142bca94bd6e3cb7.jpg', 'Sansula', 0, 850),
(2, 1, 9, 1500.00, 10, 0, 'Instrumenter', 'Kalimbaer', 'd178bd7c5ecf9d97d69af0e6528ca8d1.jpg', 'Sansula Deluxe', 0, 1500),
(3, 1, 10, 1250.00, 10, 0, 'Instrumenter', 'Kalimbaer', '36d0a52c71f7906f5eb171af0edc4665.jpg', 'Sansula Renaissance', 0, 1250),
(4, 2, 10, 1250.00, 1, 0, 'Instrumenter', 'Kalimbaer', '36d0a52c71f7906f5eb171af0edc4665.jpg', 'Sansula Renaissance', 0, 1250),
(5, 2, 39, 90.00, 1, 0, 'Musikkgaver', 'Ballett', 'a7ae5b1926fb464942f153b2b919229c.jpg', 'NĂ¸kkelring Ballettsko rosa de luxe 6,5 cm', 0, 7),
(6, 2, 41, 20.00, 1, 0, 'Musikkgaver', 'Ballett', 'd50cd6db30fae2b5e1aa5822ebbfe373.jpg', 'PapirlommetĂ¸rklĂŚr Ballett', 0, 30),
(7, 2, 43, 10.00, 1, 0, 'Musikkgaver', 'Ballett', '290e2d532ae2221d0be609e9886d18f1.jpg', 'Postkort Ballett (DIN A6)', 0, 4),
(8, 2, 133, 650.00, 1, 0, 'Instrumenter', 'Keyboard og el-piano', '2600c5782725e3e677a48b77546f7bfc.jpg', 'Casio Keyboard SA-77 44 minitangenter', 0, 1500),
(9, 3, 48, 50.00, 1, 0, 'Musikkgaver', 'KjĂ¸kken', 'daf3bff1e13fa379335ae8a1ecc4a1fe.jpg', 'Servietter Tangenter 20 stk. 33 x 33 cm', 0, 108),
(10, 3, 137, 3193.00, 1, 0, 'Instrumenter', 'Keyboard og el-piano', '16acf6e509e5ea89ff677295da335f68.jpg', 'Casio Keyboard LK-280', 0, 1500),
(11, 4, 135, 1495.00, 56, 0, 'Instrumenter', 'Keyboard og el-piano', '5b0ac36c6eb95911f9a59f175b6fb1c8.jpg', 'Casio Keyboard CTK-3200', 0, 1500),
(12, 5, 135, 1495.00, 1, 0, 'Instrumenter', 'Keyboard og el-piano', '5b0ac36c6eb95911f9a59f175b6fb1c8.jpg', 'Casio Keyboard CTK-3200', 0, 1500),
(13, 5, 162, 195.00, 1, 0, 'Instrumenter', 'Keyboard-tilbehĂ¸r', '8795da74ca0985a17ad200abfc08ebc3.jpg', '7,5V adapter for Casio keyboard', 0, 1000),
(14, 6, 8, 850.00, 2, 0, 'Instrumenter', 'Kalimbaer', '232aa9c9e5ecffc4142bca94bd6e3cb7.jpg', 'Sansula', 0, 850),
(15, 7, 10, 1250.00, 1, 0, 'Instrumenter', 'Kalimbaer', '36d0a52c71f7906f5eb171af0edc4665.jpg', 'Sansula Renaissance', 0, 1250),
(16, 8, 173, 1.00, 1, 0, 'Instrumenter', 'Kalimbaer', '3d601c8820b0a4778dde7974dbcbe289.jpg', 'Test Product', 0, 100),
(17, 9, 173, 1.00, 1, 0, 'Instrumenter', 'Kalimbaer', '3d601c8820b0a4778dde7974dbcbe289.jpg', 'Test Product', 0, 100),
(18, 10, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(19, 11, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(20, 12, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(21, 13, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(22, 14, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(23, 15, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(24, 16, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(25, 17, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(26, 18, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(27, 19, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(28, 20, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(29, 21, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(30, 22, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(31, 23, 52, 120.00, 2, 0, 'Musikkgaver', 'Spill / SpilledĂĽser', '661e0a655d62e4c3084ee58624e95db5.jpg', 'Musikkbox Ballett &quot;Blomstervals&quot;', 0, 69),
(32, 24, 68, 60.00, 1, 0, 'Musikkgaver', 'Handlenett ', '524652a71adbcba5fbd64f675946e6af.jpg', 'Handlenett Bach svart 2', 0, 57),
(33, 25, 68, 60.00, 1, 0, 'Musikkgaver', 'Handlenett ', '524652a71adbcba5fbd64f675946e6af.jpg', 'Handlenett Bach svart 2', 0, 57),
(34, 26, 68, 60.00, 1, 0, 'Musikkgaver', 'Handlenett ', '524652a71adbcba5fbd64f675946e6af.jpg', 'Handlenett Bach svart 2', 0, 57),
(35, 27, 68, 60.00, 1, 0, 'Musikkgaver', 'Handlenett ', '524652a71adbcba5fbd64f675946e6af.jpg', 'Handlenett Bach svart 2', 0, 57),
(36, 28, 68, 60.00, 1, 0, 'Musikkgaver', 'Handlenett ', '524652a71adbcba5fbd64f675946e6af.jpg', 'Handlenett Bach svart 2', 0, 57),
(37, 29, 175, 1.00, 1, 0, 'Instrumenter', 'Kalimbaer', '', 'Test Product Do Not Buy THIS', 0, 100),
(38, 30, 175, 1.00, 1, 0, 'Instrumenter', 'Kalimbaer', '', 'Test Product Do Not Buy THIS', 0, 100),
(39, 31, 12, 650.00, 1, 0, 'Instrumenter', 'Kalimbaer', '59fb0c07e9a13a0a7039a7692fa17cc0.jpg', 'Kalimba Klassik', 0, 650),
(40, 32, 9, 1500.00, 1, 0, 'Instrumenter', 'Kalimbaer', 'd178bd7c5ecf9d97d69af0e6528ca8d1.jpg', 'Sansula Deluxe', 0, 1500),
(41, 33, 9, 1500.00, 1, 0, 'Instrumenter', 'Kalimbaer', 'd178bd7c5ecf9d97d69af0e6528ca8d1.jpg', 'Sansula Deluxe', 0, 1500),
(42, 34, 9, 1500.00, 1, 0, 'Instrumenter', 'Kalimbaer', 'd178bd7c5ecf9d97d69af0e6528ca8d1.jpg', 'Sansula Deluxe', 0, 1500),
(43, 35, 9, 1500.00, 1, 0, 'Instrumenter', 'Kalimbaer', 'd178bd7c5ecf9d97d69af0e6528ca8d1.jpg', 'Sansula Deluxe', 0, 1500),
(44, 36, 9, 1500.00, 1, 0, 'Instrumenter', 'Kalimbaer', 'd178bd7c5ecf9d97d69af0e6528ca8d1.jpg', 'Sansula Deluxe', 0, 1500),
(45, 37, 10, 1250.00, 1, 0, 'Instrumenter', 'Kalimbaer', '36d0a52c71f7906f5eb171af0edc4665.jpg', 'Sansula Renaissance', 0, 1250),
(46, 38, 10, 1250.00, 1, 0, 'Instrumenter', 'Kalimbaer', '36d0a52c71f7906f5eb171af0edc4665.jpg', 'Sansula Renaissance', 0, 1250),
(47, 39, 10, 1250.00, 1, 0, 'Instrumenter', 'Kalimbaer', '36d0a52c71f7906f5eb171af0edc4665.jpg', 'Sansula Renaissance', 0, 1250),
(48, 40, 164, 450.00, 1, 0, 'Instrumenter', 'Keyboard-tilbehĂ¸r', 'b791309a99db3c6b9da94c8f7fe91be5.jpg', '12V adapter for Casio keyboard', 0, 1000),
(49, 41, 34, 400.00, 1, 0, 'Utgivelser', 'Ăvrige utgivelser', 'a5f91d819f0f5bf376bafc67c911e28e.jpg', 'Lydleker 1 - 2 CD&#039;er', 0, 107),
(50, 42, 171, 500.00, 1, 0, 'Utgivelser', 'Veien til Bokstavene', 'f719be81fe71489446983afee4440a52.jpg', 'Veien til Bokstavene  - Alle bokstavene i postkortstĂ¸rrelse', 0, 126),
(51, 43, 8, 850.00, 1, 0, 'Instrumenter', 'Kalimbaer', '232aa9c9e5ecffc4142bca94bd6e3cb7.jpg', 'Sansula', 0, 850),
(52, 44, 139, 4595.00, 1, 0, 'Instrumenter', 'Keyboard og el-piano', 'eb0095e70e668c293d6ae47386fffdda.jpg', 'Casio Keyboard CTK-7000', 0, 1500),
(53, 45, 139, 4595.00, 2, 0, 'Instrumenter', 'Keyboard og el-piano', 'eb0095e70e668c293d6ae47386fffdda.jpg', 'Casio Keyboard CTK-7000', 0, 1500),
(54, 46, 49, 50.00, 2, 0, 'Musikkgaver', 'KjĂ¸kken', '93e13ea28c067d3a597529eda62caf61.jpg', 'Servietter Bach 33 x  33 cm', 0, 108),
(55, 47, 49, 50.00, 6, 0, 'Musikkgaver', 'KjĂ¸kken', '93e13ea28c067d3a597529eda62caf61.jpg', 'Servietter Bach 33 x  33 cm', 0, 108),
(56, 48, 42, 200.00, 1, 0, 'Musikkgaver', 'Ballett', 'fc04541551677a057aaf9af0e40aef6a.jpg', 'Penal Balletsko rosa 20 cm', 0, 37),
(57, 49, 16, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '3fdd3399dd54ad8c41179b52878c1d98.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 1', 0, 99),
(58, 49, 17, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '7347db0970cdd8a272c030c9bee1dbf4.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 2', 0, 99),
(59, 49, 18, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '9aa9a651a1c65d93f1b7f490302b2828.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 3 - Norsk folkemusikk', 0, 99),
(60, 49, 19, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', 'fd72801a815d95fe6f9d546f51e182be.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 4 - Julestemning', 0, 99),
(61, 49, 20, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '5ec50683cf4267b519c69c68986dd7c9.jpg', 'Spill BlokkflĂ¸yte med Orkester Hefte nr. 1 Enkelteksemplarer', 0, 304),
(62, 49, 23, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '9e7f1347dffd5ff1c29cb993570ee44b.jpg', 'Spill BlokkflĂ¸yte med Orkester Hefte nr. 2 Enkelteksemplar', 0, 350),
(63, 49, 27, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', 'd3ee890f1e3491b3af55a0e9c3561270.jpg', 'Spill BlokkflĂ¸yte med Orkester Hefte nr. 3 Enkelteksemplar', 0, 400),
(64, 49, 29, 200.00, 2, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', 'dd8504b84254c51ce563003c0e92b611.jpg', 'Spill BlokkflĂ¸yte med Orkester Hefte nr. 4 Enkelteksemplar', 0, 283),
(65, 50, 16, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '3fdd3399dd54ad8c41179b52878c1d98.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 1', 0, 99),
(66, 51, 16, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '3fdd3399dd54ad8c41179b52878c1d98.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 1', 0, 99),
(67, 51, 20, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '5ec50683cf4267b519c69c68986dd7c9.jpg', 'Spill BlokkflĂ¸yte med Orkester Hefte nr. 1 Enkelteksemplarer', 0, 304),
(68, 52, 138, 2995.00, 1, 0, 'Instrumenter', 'Keyboard og el-piano', 'edfb1b546fe9005cd336663251eaf523.jpg', 'Casio Keyboard WK-6500', 0, 1500),
(69, 53, 8, 850.00, 2, 0, 'Instrumenter', 'Kalimbaer', '232aa9c9e5ecffc4142bca94bd6e3cb7.jpg', 'Sansula', 0, 850),
(70, 54, 22, 400.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '794c66a1107f81bec5378bd6f6e4ade5.jpg', 'Spill BlokkflĂ¸yte med Orkester uten Noter. 2 CD-er', 0, 100),
(71, 55, 16, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '3fdd3399dd54ad8c41179b52878c1d98.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 1', 0, 99),
(72, 55, 17, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '7347db0970cdd8a272c030c9bee1dbf4.jpg', 'Spill BlokkflĂ¸yte med Orkester CD nr. 2', 0, 99),
(73, 55, 20, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '5ec50683cf4267b519c69c68986dd7c9.jpg', 'Spill BlokkflĂ¸yte med Orkester Hefte nr. 1 Enkelteksemplarer', 0, 304),
(74, 55, 23, 200.00, 1, 0, 'Utgivelser', 'Spill BlokkflĂ¸yte med Orkester', '9e7f1347dffd5ff1c29cb993570ee44b.jpg', 'Spill BlokkflĂ¸yte med Orkester Hefte nr. 2 Enkelteksemplar', 0, 350),
(75, 56, 8, 850.00, 2, 0, 'Instrumenter', 'Kalimbaer', '232aa9c9e5ecffc4142bca94bd6e3cb7.jpg', 'Sansula', 0, 850),
(76, 57, 63, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '7a897457c51ff4d3fb80c6bbc25c1acc.jpg', 'Handlenett Mozart svart', 0, 261),
(77, 57, 84, 250.00, 1, 0, 'Musikkgaver', 'Paraplyer', '89bfdfc8c70aedfc68177214862d664d.jpg', 'Paraply svart / G-nĂ¸kler', 0, 419),
(78, 57, 86, 250.00, 1, 0, 'Musikkgaver', 'Paraplyer', '779a5726c7550800b705eb6022789374.jpg', 'Paraply svart (Sammenleggbar) / Noter 2', 0, 222),
(79, 58, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(80, 59, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(81, 60, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(82, 61, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(83, 62, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(84, 63, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(85, 64, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(86, 65, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(87, 66, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(88, 67, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(89, 68, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(90, 69, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(91, 70, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(92, 71, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(93, 72, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(94, 73, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(95, 74, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(96, 75, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(97, 76, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(98, 77, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(99, 78, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(100, 79, 64, 150.00, 1, 0, 'Musikkgaver', 'Handlenett ', '591c33c8bd5c848b870c25436f70029a.jpg', 'Handlenett Bach svart', 0, 261),
(101, 80, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(102, 81, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(103, 82, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(104, 83, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(105, 84, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(106, 85, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(107, 86, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(108, 87, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(109, 88, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(110, 89, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(111, 90, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(112, 91, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10),
(113, 92, 2, 10.00, 1, 0, '', '', 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', 'Casio Digitalpiano CDP-120 inkl. CS44', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `Photo`
--

CREATE TABLE IF NOT EXISTS `Photo` (
  `PhotoId` int(11) NOT NULL AUTO_INCREMENT,
  `EventId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ShortDescription` text COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text COLLATE utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL DEFAULT '0000-00-00',
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Ordering` int(11) NOT NULL,
  PRIMARY KEY (`PhotoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Photo`
--

INSERT INTO `Photo` (`PhotoId`, `EventId`, `TypeId`, `Name`, `SeoName`, `EventDate`, `ShortDescription`, `LongDescription`, `CreationDate`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `Ordering`) VALUES
(15, 170, 0, 'Wesele', 'wesele', '1', '', '', '2010-05-29', '2010-05-29', '', '', 2),
(14, 177, 0, 'ZdjÄ?cia z wesela', 'zdjecia-z-wesela', '1', '', '', '2010-05-29', '2010-05-29', '', '', 1),
(16, 178, 0, 'SylwiaAdam09', 'sylwiaadam09', '1', '', '', '2010-05-30', '2010-05-30', '', '', 3),
(17, 179, 0, 'Lenka galeria', 'lenka-galeria', '1', '', '', '2010-05-30', '2010-05-30', '', '', 4),
(18, 180, 0, 'Weronika Damian Galeria 1', 'weronika-damian-galeria-1', '1', '', '', '2010-05-31', '2010-06-06', '', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `PhotoPicture`
--

CREATE TABLE IF NOT EXISTS `PhotoPicture` (
  `PhotoPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `PhotoId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `PictureDescBig` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ImgAlt` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `ImgType` varchar(10) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgDriveName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgFileName` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgAlt` varchar(40) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  `BigImgType` varchar(10) CHARACTER SET latin2 NOT NULL DEFAULT '0',
  PRIMARY KEY (`PhotoPictureId`),
  KEY `ClubId` (`PhotoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=297 ;

--
-- Dumping data for table `PhotoPicture`
--

INSERT INTO `PhotoPicture` (`PhotoPictureId`, `PhotoId`, `ImgDriveName`, `ImgFileName`, `PictureDescBig`, `ImgAlt`, `ImgType`, `BigImgDriveName`, `BigImgFileName`, `BigImgAlt`, `BigImgType`) VALUES
(1, 1, 'bcd08889484172ce9b2b51cc61495cb8.jpg', '', 'pom', '', '', '', '', '', ''),
(2, 2, 'c171629e1329dbbbde82f1312f2e7d07.jpg', '', 'kjn', '', '', '', '', '', ''),
(3, 4, '6a1cb54f6117402811a7d7637e50b104.jpg', '', 'rrr', '', '', '', '', '', ''),
(4, 3, 'e5d7fb06debd77f1ba89a285283e099b.jpg', '', '777', '', '', '', '', '', ''),
(55, 5, '41eaca94c46b46e78dcd916c17cd033b.jpg', '150', 'pic9', '', '', '', '', '', ''),
(54, 5, '37f1d0a60b3f450f9e10d7ad89b064f1.jpg', '', 'pic8', '', '', '', '', '', ''),
(53, 5, 'cf1ee0558c10e188f20ac48ea2e02953.jpg', '150', 'pic7', '', '', '', '', '', ''),
(52, 5, '367b9dcabdcd950f6cbe66b7017d4ab4.jpg', '', 'pic6', '', '', '', '', '', ''),
(51, 5, '05a45ea1647dbb60d73801a203770c07.jpg', '', 'pic5', '', '', '', '', '', ''),
(50, 5, 'd048d1f93c1906c05fff2368f4658c97.jpg', '95.5', 'pic4', '', '', '', '', '', ''),
(49, 5, '23bfb4b547e420db4e72d81d58853733.jpg', '108.875', 'pic3', '', '', '', '', '', ''),
(48, 5, '1a9972ec6427ad5e750c6f9c2caab24f.jpg', '150', 'pic2', '', '', '', '', '', ''),
(47, 5, 'afc2cc2d72ea12ee274ad6c15c5b502b.jpg', '150', 'pic 1', '', '', '', '', '', ''),
(46, 6, 'bf1f0a44d70e7d87bd1986c9a10f0f19.jpg', '', '??lub 6', '', '', '', '', '', ''),
(45, 6, '18a9652febd18ad1e58b5ad691586ce8.jpg', '', '??lub 5', '', '', '', '', '', ''),
(44, 6, '6e6406df70ca6abd9fd8be197b99830f.jpg', '', '??lub 4', '', '', '', '', '', ''),
(43, 6, '19044f1e386f131ce5818b7593f5a82f.jpg', '', '??lub 3', '', '', '', '', '', ''),
(42, 6, 'a520ad9c9b7f6ca0f5f72594b909b73f.jpg', '', '??lub 2', '', '', '', '', '', ''),
(41, 6, '40fd49cfe2511b106317a4f9784812e8.jpg', '', '??lub zdjÄ?cie 1', '', '', '', '', '', ''),
(105, 7, '91e0b97da5aa8ab3200f392491fba8f9.jpg', '99.75', '', '', '', '', '', '', ''),
(106, 7, 'cf1a6d078a215c6f180d148be71c5abb.jpg', '150', '', '', '', '', '', '', ''),
(107, 7, 'f8281ce1c58d6319b58eb115d967c125.jpg', '150', '', '', '', '', '', '', ''),
(108, 7, '7cdff9fde44cdd920347ed46244edbaa.jpg', '99.9375', '', '', '', '', '', '', ''),
(109, 7, '25a0ed0e05dbd0748bfd0f0e9634306e.jpg', '99.9375', '', '', '', '', '', '', ''),
(114, 8, '8242cfeed9a92178712444a256b0c92b.jpg', '150', '', '', '', '', '', '', ''),
(113, 8, '6d63dfd3570219823b2fc3c1caae57e1.jpg', '150', '', '', '', '', '', '', ''),
(112, 8, '8d72231fc4ac7b9005a52484c2ba6773.jpg', '99.75', '', '', '', '', '', '', ''),
(111, 8, 'e752d585153954ec0c89f659cc87579e.jpg', '150', '', '', '', '', '', '', ''),
(110, 8, 'aa501486a257fcedec6007530b53d862.jpg', '150', '', '', '', '', '', '', ''),
(120, 9, 'a2fe2bc0f8daa0b13a597eda39a0dc92.jpg', '100.125', '', '', '', '', '', '', ''),
(119, 9, '8316bad64e049dd0233450b5d3cdd616.jpg', '99.5625', '', '', '', '', '', '', ''),
(118, 9, 'fac8b681368fc69c41eacf5d1ee0c3d4.jpg', '150', '', '', '', '', '', '', ''),
(117, 9, '4d9d25eb83ee34a88bbf331b96df273b.jpg', '99.9375', '', '', '', '', '', '', ''),
(116, 9, '82281e3df39b21158953f022b4510311.jpg', '150', '', '', '', '', '', '', ''),
(127, 10, '5d6fb4872f0a595cca806a9665ee5c5c.jpg', '150', '', '', '', '', '', '', ''),
(126, 10, 'ce0a65677ef80642e5f367332f0367b1.jpg', '150', '', '', '', '', '', '', ''),
(125, 10, '42714af10be859fa069f401da7ef4c8b.jpg', '150', '', '', '', '', '', '', ''),
(124, 10, 'cb3d7a1fda250dbd6d22ba77139afa41.jpg', '150', '', '', '', '', '', '', ''),
(123, 10, '41dcad9d11c378a2fd7436b486cb78de.jpg', '150', '', '', '', '', '', '', ''),
(122, 10, 'bca8ad61d3c971325b075037b6dfc822.jpg', '150', '', '', '', '', '', '', ''),
(115, 8, '6595db8e7c1195c4dbdf51e282c84767.jpg', '150', '', '', '', '', '', '', ''),
(104, 7, '6ab26f75befd4127dbaba82a6fbd231e.jpg', '150', '', '', '', '', '', '', ''),
(178, 15, 'ec52c1218f51665d7ad915fd1cceb084.jpg', '249.6875', 'pionowe zdjecie wysrodkowane...', '', '', '', '', '', ''),
(172, 14, 'b8edc5c714f20d10cfb8e08dddcbd898.jpg', '500', 'Podpisanie dokument??w', '', '', '', '', '', ''),
(171, 14, '140bef13257d5e70150e617278fa1a2b.jpg', '500', 'Panna m??oda i kwiatek.', '', '', '', '', '', ''),
(152, 12, '64ca81cacaf5945717e7e0503a63d47b.jpg', '108.75', 'Magdalena i Micha??', '', '', '', '', '', ''),
(121, 9, '8937b98aa39dc99415214285aa5c0ed7.jpg', '150', '', '', '', '', '', '', ''),
(150, 11, '0c11fc3e11a4771d836b224381cdafff.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(151, 12, '03ac733f0b3b142f4c27f2e15c742fc4.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(170, 13, 'a507538c51cc6e2bf571f2e7b5ff6760.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(169, 13, 'a78805743e57a461a7068f725092c2f7.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(167, 13, 'c5051e92f9e0717189fbe3eaae21d0d3.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(168, 13, 'a62cae99fb15136ecc114a75729d4c32.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(166, 13, 'ef3120ac4836a33942d8170422ab27ba.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(165, 13, '2e970b98783ee50cfee8df63ea98f107.jpg', '', 'Magdalena i Micha??', '', '', '', '', '', ''),
(164, 13, '26c38d6ac3484fc078b7ce7a0c5abd6e.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(163, 13, 'cddac8f38ba72e5d77202ee56383bf15.jpg', '', 'Magdalena i Micha??', '', '', '', '', '', ''),
(162, 13, '7f3291098645af95d43cc622077b2252.jpg', '150', 'Magdalena i Micha??', '', '', '', '', '', ''),
(177, 15, 'e6892f605db89f40a081acfad2b52606.jpg', '500', 'i przed ko??cio??em...', '', '', '', '', '', ''),
(176, 15, '1aaa560c05e1a040723d26fdf41c9353.jpg', '490.625', '', '', '', '', '', '', ''),
(187, 16, '2a11ec8228088c653c8e11dbbfff568e.jpg', '500', '', '', '', '', '', '', ''),
(186, 16, 'ed100b041a9d185cbc3b7a02962e2bc9.jpg', '257.5', '', '', '', '', '', '', ''),
(185, 16, '4502479145728f252cbf1dc82c4988f0.jpg', '262.5', '', '', '', '', '', '', ''),
(184, 16, '10bfa21f3a5176ada4491eb72e843956.jpg', '500', '', '', '', '', '', '', ''),
(188, 16, '10c975ce702c0d86737ade1ca832ba44.jpg', '500', '', '', '', '', '', '', ''),
(189, 16, '01d56c50cefab436b15c396dce8964e5.jpg', '285', '', '', '', '', '', '', ''),
(190, 16, '1d27b59726f5f3cc3a4547915c0335d5.jpg', '500', '', '', '', '', '', '', ''),
(191, 16, '38ac1675782ae3ea62d8b7ecd64dc68b.jpg', '238.125', '', '', '', '', '', '', ''),
(192, 16, '35b3d36588f7a375551e9c763945673a.jpg', '271.875', '', '', '', '', '', '', ''),
(193, 16, '14a965920cb1607d963783fccf5066ec.jpg', '500', '', '', '', '', '', '', ''),
(194, 16, '1114be858933f145cb75b3ad90c13436.jpg', '500', '', '', '', '', '', '', ''),
(215, 17, 'abc1c391cb79928b3de8759da903c2af.jpg', '500', '', '', '', '', '', '', ''),
(214, 17, '27968c95b4681e69bf8aa797b1f34ad7.jpg', '500', '', '', '', '', '', '', ''),
(213, 17, 'caed0f922f2090c7c476c8617ccb9c54.jpg', '255', '', '', '', '', '', '', ''),
(212, 17, '4ff637fa7893bd25916b772ed3583157.jpg', '289.375', '', '', '', '', '', '', ''),
(211, 17, '0db92836dc85ff7c486d4e67447d3094.jpg', '500', '', '', '', '', '', '', ''),
(210, 17, '92521fe064dabbbcefb599269280e7dd.jpg', '500', '', '', '', '', '', '', ''),
(209, 17, '90b1a9ffd1012a6f3bf7316f257bc7a8.jpg', '261.875', '', '', '', '', '', '', ''),
(208, 17, 'eb7d014db8737ea7a8535cbbf5ecc180.jpg', '500', 'Ma??a rÄ?czka', '', '', '', '', '', ''),
(207, 17, 'eaf104d069c0a801aad2e9a1088e7745.jpg', '268.75', '', '', '', '', '', '', ''),
(216, 17, '41f72c853124268bf5d717ba9d7bfa0c.jpg', '283.125', '', '', '', '', '', '', ''),
(217, 17, 'afc668b03e1ccb9bd362bf53f3b76764.jpg', '279.375', '', '', '', '', '', '', ''),
(218, 17, 'e823d8aaa472694f9d0552cb6a3abbfc.jpg', '405.625', '', '', '', '', '', '', ''),
(295, 18, 'ef43f4d503ed2d45c57ea32e15ed097f.jpg', '263.125', '', '', '', '', '', '', ''),
(294, 18, '83fda4d47aea71a4874839c346adde0d.jpg', '500', '', '', '', '', '', '', ''),
(293, 18, '159fe8b53c1c71d53ad068cd86689116.jpg', '256.875', '', '', '', '', '', '', ''),
(292, 18, '3bc5199c918f170a359640aff57d8989.jpg', '500', '', '', '', '', '', '', ''),
(291, 18, '8843b6ed0a9d9a18aa8e61a23189533c.jpg', '278.125', '', '', '', '', '', '', ''),
(290, 18, '53566719784e00d49b4ca27eb9ae7d28.jpg', '500', '', '', '', '', '', '', ''),
(289, 18, '6280ed2961a223bc9ffca53b563b94a9.jpg', '266.25', '', '', '', '', '', '', ''),
(288, 18, '207d201d379eb3c4e64deb2408864d2b.jpg', '279.375', '', '', '', '', '', '', ''),
(287, 18, 'a2b9561c2e35a883770987e7860ac726.jpg', '500', '', '', '', '', '', '', ''),
(286, 18, '76f438b95a5dec9e6813767e9290d53c.jpg', '285', '', '', '', '', '', '', ''),
(285, 18, '70c379c88d0a51a1a9f9d29e70d9cc3b.jpg', '500', '', '', '', '', '', '', ''),
(284, 18, 'd3c6e4d798196af225f079de93a82803.jpg', '299.375', '', '', '', '', '', '', ''),
(281, 19, '1eaaf89fdfde75e56c668940c114936d.jpg', '174', 'iuh', '', '', '', '', '', ''),
(283, 18, '575ed8a8f65845e64d3abc1c0f2567b0.jpg', '276.25', '', '', '', '', '', '', ''),
(282, 18, 'c45f9a33b6d39a5df3c7a428389be990.jpg', '318.75', '', '', '', '', '', '', ''),
(296, 18, '5309dcaf079a70bb8ca7b03190575842.jpg', '500', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `PictureOrder`
--

CREATE TABLE IF NOT EXISTS `PictureOrder` (
  `PictureOrderId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `PictureName` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float(5,2) NOT NULL,
  PRIMARY KEY (`PictureOrderId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2329 ;

--
-- Dumping data for table `PictureOrder`
--

INSERT INTO `PictureOrder` (`PictureOrderId`, `UserId`, `PictureName`, `Size`, `Quantity`, `Price`) VALUES
(1955, 258, 'anna_tomasz_prokop_767.jpg', '', 0, 0.00),
(1898, 258, 'anna_tomasz_prokop_357.jpg', '', 0, 0.00),
(2230, 258, 'anna_tomasz_prokop_702.jpg', '', 0, 0.00),
(1616, 258, 'anna_tomasz_prokop_274.jpg', '', 0, 0.00),
(1569, 258, 'anna_tomasz_prokop_067.jpg', '', 0, 0.00),
(1561, 258, 'anna_tomasz_prokop_286.jpg', '', 0, 0.00),
(1558, 258, 'anna_tomasz_prokop_518.jpg', '', 0, 0.00),
(2328, 258, 'anna_tomasz_prokop_554.jpg', '', 0, 0.00),
(2327, 258, 'anna_tomasz_prokop_508.jpg', '', 0, 0.00),
(2326, 258, 'anna_tomasz_prokop_630.jpg', '', 0, 0.00),
(2325, 258, 'anna_tomasz_prokop_644.jpg', '', 0, 0.00),
(2324, 258, 'anna_tomasz_prokop_257.jpg', '', 0, 0.00),
(2323, 258, 'anna_tomasz_prokop_169.jpg', '', 0, 0.00),
(2322, 258, 'anna_tomasz_prokop_151.jpg', '', 0, 0.00),
(2321, 258, 'anna_tomasz_prokop_768.jpg', '', 0, 0.00),
(2320, 258, 'anna_tomasz_prokop_404.jpg', '', 0, 0.00),
(2319, 258, 'anna_tomasz_prokop_544.jpg', '', 0, 0.00),
(2318, 258, 'anna_tomasz_prokop_124.jpg', '', 0, 0.00),
(1565, 258, 'anna_tomasz_prokop_667.jpg', '', 0, 0.00),
(2317, 258, 'anna_tomasz_prokop_137.jpg', '', 0, 0.00),
(2316, 258, 'anna_tomasz_prokop_488.jpg', '', 0, 0.00),
(2315, 258, 'anna_tomasz_prokop_099.jpg', '', 0, 0.00),
(2314, 258, 'anna_tomasz_prokop_651.jpg', '', 0, 0.00),
(2313, 258, 'anna_tomasz_prokop_571.jpg', '', 0, 0.00),
(2312, 258, 'anna_tomasz_prokop_601.jpg', '', 0, 0.00),
(2311, 258, 'anna_tomasz_prokop_416.jpg', '', 0, 0.00),
(2310, 258, 'anna_tomasz_prokop_006.jpg', '10x15', 1, 0.00),
(2309, 258, 'anna_tomasz_prokop_468.jpg', '', 0, 0.00),
(2308, 258, 'anna_tomasz_prokop_654.jpg', '', 0, 0.00),
(2307, 258, 'anna_tomasz_prokop_157.jpg', '', 0, 0.00),
(2306, 258, 'anna_tomasz_prokop_780.jpg', '', 0, 0.00),
(2305, 258, 'anna_tomasz_prokop_664.jpg', '', 0, 0.00),
(2304, 258, 'anna_tomasz_prokop_189.jpg', '', 0, 0.00),
(2303, 258, 'anna_tomasz_prokop_200.jpg', '', 0, 0.00),
(2302, 258, 'anna_tomasz_prokop_523.jpg', '', 0, 0.00),
(2301, 258, 'anna_tomasz_prokop_227.jpg', '', 0, 0.00),
(2300, 258, 'anna_tomasz_prokop_356.jpg', '', 0, 0.00),
(2299, 258, 'anna_tomasz_prokop_304.jpg', '', 0, 0.00),
(2298, 258, 'anna_tomasz_prokop_175.jpg', '', 0, 0.00),
(2297, 258, 'anna_tomasz_prokop_697.jpg', '', 0, 0.00),
(2296, 258, 'anna_tomasz_prokop_296.jpg', '', 0, 0.00),
(2295, 258, 'anna_tomasz_prokop_638.jpg', '', 0, 0.00),
(2294, 258, 'anna_tomasz_prokop_162.jpg', '', 0, 0.00),
(2293, 258, 'anna_tomasz_prokop_273.jpg', '', 0, 0.00),
(2292, 258, 'anna_tomasz_prokop_462.jpg', '', 0, 0.00),
(2291, 258, 'anna_tomasz_prokop_465.jpg', '', 0, 0.00),
(2290, 258, 'anna_tomasz_prokop_341.jpg', '', 0, 0.00),
(2289, 258, 'anna_tomasz_prokop_463.jpg', '', 0, 0.00),
(2288, 258, 'anna_tomasz_prokop_645.jpg', '', 0, 0.00),
(2287, 258, 'anna_tomasz_prokop_710.jpg', '', 0, 0.00),
(2286, 258, 'anna_tomasz_prokop_692.jpg', '', 0, 0.00),
(2285, 258, 'anna_tomasz_prokop_259.jpg', '', 0, 0.00),
(2284, 258, 'anna_tomasz_prokop_170.jpg', '', 0, 0.00),
(2283, 258, 'anna_tomasz_prokop_572.jpg', '', 0, 0.00),
(2282, 258, 'anna_tomasz_prokop_258.jpg', '', 0, 0.00),
(2281, 258, 'anna_tomasz_prokop_750.jpg', '', 0, 0.00),
(2280, 258, 'anna_tomasz_prokop_659.jpg', '', 0, 0.00),
(2279, 258, 'anna_tomasz_prokop_720.jpg', '', 0, 0.00),
(2278, 258, 'anna_tomasz_prokop_474.jpg', '', 0, 0.00),
(2277, 258, 'anna_tomasz_prokop_485.jpg', '', 0, 0.00),
(2276, 258, 'anna_tomasz_prokop_118.jpg', '', 0, 0.00),
(2275, 258, 'anna_tomasz_prokop_217.jpg', '', 0, 0.00),
(2274, 258, 'anna_tomasz_prokop_725.jpg', '', 0, 0.00),
(2273, 258, 'anna_tomasz_prokop_510.jpg', '', 0, 0.00),
(2272, 258, 'anna_tomasz_prokop_599.jpg', '', 0, 0.00),
(2271, 258, 'anna_tomasz_prokop_588.jpg', '', 0, 0.00),
(2270, 258, 'anna_tomasz_prokop_574.jpg', '', 0, 0.00),
(2269, 258, 'anna_tomasz_prokop_354.jpg', '', 0, 0.00),
(2268, 258, 'anna_tomasz_prokop_409.jpg', '', 0, 0.00),
(2267, 258, 'anna_tomasz_prokop_689.jpg', '', 0, 0.00),
(2266, 258, 'anna_tomasz_prokop_165.jpg', '', 0, 0.00),
(2265, 258, 'anna_tomasz_prokop_781.jpg', '', 0, 0.00),
(2264, 258, 'anna_tomasz_prokop_393.jpg', '', 0, 0.00),
(2263, 258, 'anna_tomasz_prokop_228.jpg', '', 0, 0.00),
(2262, 258, 'anna_tomasz_prokop_177.jpg', '', 0, 0.00),
(2261, 258, 'anna_tomasz_prokop_769.jpg', '', 0, 0.00),
(2260, 258, 'anna_tomasz_prokop_502.jpg', '', 0, 0.00),
(2259, 258, 'anna_tomasz_prokop_135.jpg', '', 0, 0.00),
(2258, 258, 'anna_tomasz_prokop_683.jpg', '', 0, 0.00),
(2257, 258, 'anna_tomasz_prokop_074.jpg', '', 0, 0.00),
(2256, 258, 'anna_tomasz_prokop_113.jpg', '', 0, 0.00),
(2255, 258, 'anna_tomasz_prokop_129.jpg', '', 0, 0.00),
(2254, 258, 'anna_tomasz_prokop_733.jpg', '', 0, 0.00),
(2253, 258, 'anna_tomasz_prokop_192.jpg', '', 0, 0.00),
(2252, 258, 'anna_tomasz_prokop_653.jpg', '', 0, 0.00),
(2251, 258, 'anna_tomasz_prokop_513.jpg', '', 0, 0.00),
(2250, 258, 'anna_tomasz_prokop_323.jpg', '', 0, 0.00),
(2249, 258, 'anna_tomasz_prokop_022.jpg', '', 0, 0.00),
(2248, 258, 'anna_tomasz_prokop_556.jpg', '', 0, 0.00),
(2247, 258, 'anna_tomasz_prokop_775.jpg', '', 0, 0.00),
(2246, 258, 'anna_tomasz_prokop_202.jpg', '', 0, 0.00),
(2245, 258, 'anna_tomasz_prokop_288.jpg', '', 0, 0.00),
(2244, 258, 'anna_tomasz_prokop_250.jpg', '', 0, 0.00),
(2243, 258, 'anna_tomasz_prokop_086.jpg', '', 0, 0.00),
(2242, 258, 'anna_tomasz_prokop_360.jpg', '', 0, 0.00),
(2241, 258, 'anna_tomasz_prokop_771.jpg', '', 0, 0.00),
(2240, 258, 'anna_tomasz_prokop_326.jpg', '', 0, 0.00),
(2239, 258, 'anna_tomasz_prokop_303.jpg', '', 0, 0.00),
(2238, 258, 'anna_tomasz_prokop_456.jpg', '', 0, 0.00),
(2237, 258, 'anna_tomasz_prokop_776.jpg', '', 0, 0.00),
(2236, 258, 'anna_tomasz_prokop_719.jpg', '', 0, 0.00),
(2235, 258, 'anna_tomasz_prokop_430.jpg', '', 0, 0.00),
(2234, 258, 'anna_tomasz_prokop_207.jpg', '', 0, 0.00),
(2233, 258, 'anna_tomasz_prokop_636.jpg', '', 0, 0.00),
(2232, 258, 'anna_tomasz_prokop_639.jpg', '', 0, 0.00),
(2231, 258, 'anna_tomasz_prokop_533.jpg', '', 0, 0.00),
(2229, 258, 'anna_tomasz_prokop_486.jpg', '', 0, 0.00),
(2228, 258, 'anna_tomasz_prokop_109.jpg', '', 0, 0.00),
(2227, 258, 'anna_tomasz_prokop_336.jpg', '', 0, 0.00),
(2226, 258, 'anna_tomasz_prokop_270.jpg', '', 0, 0.00),
(2225, 258, 'anna_tomasz_prokop_527.jpg', '', 0, 0.00),
(2224, 258, 'anna_tomasz_prokop_712.jpg', '', 0, 0.00),
(2223, 258, 'anna_tomasz_prokop_053.jpg', '', 0, 0.00),
(2222, 258, 'anna_tomasz_prokop_332.jpg', '', 0, 0.00),
(2221, 258, 'anna_tomasz_prokop_237.jpg', '', 0, 0.00),
(2220, 258, 'anna_tomasz_prokop_316.jpg', '', 0, 0.00),
(2219, 258, 'anna_tomasz_prokop_627.jpg', '', 0, 0.00),
(2218, 258, 'anna_tomasz_prokop_503.jpg', '', 0, 0.00),
(2217, 258, 'anna_tomasz_prokop_536.jpg', '', 0, 0.00),
(2216, 258, 'anna_tomasz_prokop_759.jpg', '', 0, 0.00),
(2215, 258, 'anna_tomasz_prokop_214.jpg', '', 0, 0.00),
(2214, 258, 'anna_tomasz_prokop_071.jpg', '', 0, 0.00),
(2213, 258, 'anna_tomasz_prokop_753.jpg', '', 0, 0.00),
(2212, 258, 'anna_tomasz_prokop_047.jpg', '', 0, 0.00),
(2211, 258, 'anna_tomasz_prokop_184.jpg', '', 0, 0.00),
(2210, 258, 'anna_tomasz_prokop_342.jpg', '', 0, 0.00),
(2209, 258, 'anna_tomasz_prokop_352.jpg', '', 0, 0.00),
(2208, 258, 'anna_tomasz_prokop_051.jpg', '', 0, 0.00),
(2207, 258, 'anna_tomasz_prokop_142.jpg', '', 0, 0.00),
(2206, 258, 'anna_tomasz_prokop_289.jpg', '', 0, 0.00),
(2205, 258, 'anna_tomasz_prokop_703.jpg', '', 0, 0.00),
(2204, 258, 'anna_tomasz_prokop_120.jpg', '', 0, 0.00),
(2203, 258, 'anna_tomasz_prokop_365.jpg', '', 0, 0.00),
(2202, 258, 'anna_tomasz_prokop_417.jpg', '', 0, 0.00),
(2201, 258, 'anna_tomasz_prokop_595.jpg', '', 0, 0.00),
(2200, 258, 'anna_tomasz_prokop_778.jpg', '', 0, 0.00),
(2199, 258, 'anna_tomasz_prokop_549.jpg', '', 0, 0.00),
(2198, 258, 'anna_tomasz_prokop_649.jpg', '', 0, 0.00),
(2197, 258, 'anna_tomasz_prokop_243.jpg', '', 0, 0.00),
(2196, 258, 'anna_tomasz_prokop_194.jpg', '', 0, 0.00),
(2195, 258, 'anna_tomasz_prokop_069.jpg', '', 0, 0.00),
(2194, 258, 'anna_tomasz_prokop_195.jpg', '', 0, 0.00),
(2193, 258, 'anna_tomasz_prokop_321.jpg', '', 0, 0.00),
(2192, 258, 'anna_tomasz_prokop_119.jpg', '', 0, 0.00),
(2191, 258, 'anna_tomasz_prokop_695.jpg', '', 0, 0.00),
(2190, 258, 'anna_tomasz_prokop_647.jpg', '', 0, 0.00),
(2189, 258, 'anna_tomasz_prokop_241.jpg', '', 0, 0.00),
(2188, 258, 'anna_tomasz_prokop_457.jpg', '', 0, 0.00),
(2187, 258, 'anna_tomasz_prokop_014.jpg', '', 0, 0.00),
(2186, 258, 'anna_tomasz_prokop_216.jpg', '', 0, 0.00),
(2185, 258, 'anna_tomasz_prokop_582.jpg', '', 0, 0.00),
(2184, 258, 'anna_tomasz_prokop_230.jpg', '', 0, 0.00),
(2183, 258, 'anna_tomasz_prokop_277.jpg', '', 0, 0.00),
(2182, 258, 'anna_tomasz_prokop_079.jpg', '', 0, 0.00),
(2181, 258, 'anna_tomasz_prokop_561.jpg', '', 0, 0.00),
(2180, 258, 'anna_tomasz_prokop_291.jpg', '', 0, 0.00),
(2179, 258, 'anna_tomasz_prokop_346.jpg', '', 0, 0.00),
(2178, 258, 'anna_tomasz_prokop_787.jpg', '', 0, 0.00),
(2177, 258, 'anna_tomasz_prokop_110.jpg', '', 0, 0.00),
(2176, 258, 'anna_tomasz_prokop_737.jpg', '', 0, 0.00),
(2175, 258, 'anna_tomasz_prokop_405.jpg', '', 0, 0.00),
(2174, 258, 'anna_tomasz_prokop_461.jpg', '', 0, 0.00),
(2173, 258, 'anna_tomasz_prokop_087.jpg', '', 0, 0.00),
(2172, 258, 'anna_tomasz_prokop_646.jpg', '', 0, 0.00),
(2171, 258, 'anna_tomasz_prokop_442.jpg', '', 0, 0.00),
(2170, 258, 'anna_tomasz_prokop_632.jpg', '', 0, 0.00),
(2169, 258, 'anna_tomasz_prokop_197.jpg', '', 0, 0.00),
(2168, 258, 'anna_tomasz_prokop_594.jpg', '', 0, 0.00),
(2167, 258, 'anna_tomasz_prokop_532.jpg', '', 0, 0.00),
(2166, 258, 'anna_tomasz_prokop_534.jpg', '', 0, 0.00),
(2165, 258, 'anna_tomasz_prokop_495.jpg', '', 0, 0.00),
(2164, 258, 'anna_tomasz_prokop_141.jpg', '', 0, 0.00),
(2163, 258, 'anna_tomasz_prokop_168.jpg', '', 0, 0.00),
(2162, 258, 'anna_tomasz_prokop_320.jpg', '', 0, 0.00),
(2161, 258, 'anna_tomasz_prokop_656.jpg', '', 0, 0.00),
(2160, 258, 'anna_tomasz_prokop_234.jpg', '', 0, 0.00),
(2159, 258, 'anna_tomasz_prokop_188.jpg', '', 0, 0.00),
(2158, 258, 'anna_tomasz_prokop_713.jpg', '', 0, 0.00),
(2157, 258, 'anna_tomasz_prokop_358.jpg', '', 0, 0.00),
(2156, 258, 'anna_tomasz_prokop_625.jpg', '', 0, 0.00),
(2155, 258, 'anna_tomasz_prokop_181.jpg', '', 0, 0.00),
(2154, 258, 'anna_tomasz_prokop_196.jpg', '', 0, 0.00),
(2153, 258, 'anna_tomasz_prokop_252.jpg', '', 0, 0.00),
(2152, 258, 'anna_tomasz_prokop_496.jpg', '', 0, 0.00),
(2151, 258, 'anna_tomasz_prokop_375.jpg', '', 0, 0.00),
(2150, 258, 'anna_tomasz_prokop_191.jpg', '', 0, 0.00),
(2149, 258, 'anna_tomasz_prokop_116.jpg', '', 0, 0.00),
(2148, 258, 'anna_tomasz_prokop_762.jpg', '', 0, 0.00),
(2147, 258, 'anna_tomasz_prokop_297.jpg', '', 0, 0.00),
(2146, 258, 'anna_tomasz_prokop_179.jpg', '', 0, 0.00),
(2145, 258, 'anna_tomasz_prokop_596.jpg', '', 0, 0.00),
(2144, 258, 'anna_tomasz_prokop_290.jpg', '', 0, 0.00),
(2143, 258, 'anna_tomasz_prokop_112.jpg', '', 0, 0.00),
(2142, 258, 'anna_tomasz_prokop_722.jpg', '', 0, 0.00),
(2141, 258, 'anna_tomasz_prokop_579.jpg', '', 0, 0.00),
(2140, 258, 'anna_tomasz_prokop_691.jpg', '', 0, 0.00),
(2139, 258, 'anna_tomasz_prokop_201.jpg', '', 0, 0.00),
(2138, 258, 'anna_tomasz_prokop_634.jpg', '', 0, 0.00),
(2137, 258, 'anna_tomasz_prokop_473.jpg', '', 0, 0.00),
(2136, 258, 'anna_tomasz_prokop_492.jpg', '', 0, 0.00),
(2135, 258, 'anna_tomasz_prokop_088.jpg', '', 0, 0.00),
(2134, 258, 'anna_tomasz_prokop_795.jpg', '', 0, 0.00),
(2133, 258, 'anna_tomasz_prokop_337.jpg', '', 0, 0.00),
(2132, 258, 'anna_tomasz_prokop_339.jpg', '', 0, 0.00),
(2131, 258, 'anna_tomasz_prokop_458.jpg', '', 0, 0.00),
(2130, 258, 'anna_tomasz_prokop_180.jpg', '', 0, 0.00),
(2129, 258, 'anna_tomasz_prokop_224.jpg', '', 0, 0.00),
(2128, 258, 'anna_tomasz_prokop_447.jpg', '', 0, 0.00),
(2127, 258, 'anna_tomasz_prokop_128.jpg', '', 0, 0.00),
(2126, 258, 'anna_tomasz_prokop_187.jpg', '', 0, 0.00),
(2125, 258, 'anna_tomasz_prokop_779.jpg', '', 0, 0.00),
(2124, 258, 'anna_tomasz_prokop_212.jpg', '', 0, 0.00),
(2123, 258, 'anna_tomasz_prokop_610.jpg', '', 0, 0.00),
(2121, 258, 'anna_tomasz_prokop_537.jpg', '', 0, 0.00),
(2120, 258, 'anna_tomasz_prokop_249.jpg', '', 0, 0.00),
(2119, 258, 'anna_tomasz_prokop_039.jpg', '', 0, 0.00),
(2118, 258, 'anna_tomasz_prokop_770.jpg', '', 0, 0.00),
(2117, 258, 'anna_tomasz_prokop_125.jpg', '', 0, 0.00),
(2115, 258, 'anna_tomasz_prokop_441.jpg', '', 0, 0.00),
(2114, 258, 'anna_tomasz_prokop_550.jpg', '', 0, 0.00),
(2113, 258, 'anna_tomasz_prokop_182.jpg', '', 0, 0.00),
(2112, 258, 'anna_tomasz_prokop_668.jpg', '', 0, 0.00),
(2111, 258, 'anna_tomasz_prokop_007.jpg', '10x15', 1, 0.00),
(2110, 258, 'anna_tomasz_prokop_318.jpg', '', 0, 0.00),
(2109, 258, 'anna_tomasz_prokop_591.jpg', '', 0, 0.00),
(2108, 258, 'anna_tomasz_prokop_111.jpg', '', 0, 0.00),
(2107, 258, 'anna_tomasz_prokop_104.jpg', '', 0, 0.00),
(2106, 258, 'anna_tomasz_prokop_089.jpg', '', 0, 0.00),
(2105, 258, 'anna_tomasz_prokop_482.jpg', '', 0, 0.00),
(2104, 258, 'anna_tomasz_prokop_782.jpg', '', 0, 0.00),
(2103, 258, 'anna_tomasz_prokop_232.jpg', '', 0, 0.00),
(2102, 258, 'anna_tomasz_prokop_583.jpg', '', 0, 0.00),
(2101, 258, 'anna_tomasz_prokop_723.jpg', '', 0, 0.00),
(2100, 258, 'anna_tomasz_prokop_772.jpg', '', 0, 0.00),
(2099, 258, 'anna_tomasz_prokop_648.jpg', '', 0, 0.00),
(2098, 258, 'anna_tomasz_prokop_671.jpg', '', 0, 0.00),
(2097, 258, 'anna_tomasz_prokop_673.jpg', '', 0, 0.00),
(2096, 258, 'anna_tomasz_prokop_714.jpg', '', 0, 0.00),
(2095, 258, 'anna_tomasz_prokop_525.jpg', '', 0, 0.00),
(2094, 258, 'anna_tomasz_prokop_801.jpg', '', 0, 0.00),
(2093, 258, 'anna_tomasz_prokop_552.jpg', '', 0, 0.00),
(2092, 258, 'anna_tomasz_prokop_754.jpg', '', 0, 0.00),
(2091, 258, 'anna_tomasz_prokop_643.jpg', '', 0, 0.00),
(2090, 258, 'anna_tomasz_prokop_573.jpg', '', 0, 0.00),
(2089, 258, 'anna_tomasz_prokop_362.jpg', '', 0, 0.00),
(2088, 258, 'anna_tomasz_prokop_748.jpg', '', 0, 0.00),
(2087, 258, 'anna_tomasz_prokop_562.jpg', '', 0, 0.00),
(2086, 258, 'anna_tomasz_prokop_746.jpg', '', 0, 0.00),
(2085, 258, 'anna_tomasz_prokop_694.jpg', '', 0, 0.00),
(2084, 258, 'anna_tomasz_prokop_494.jpg', '', 0, 0.00),
(2083, 258, 'anna_tomasz_prokop_136.jpg', '', 0, 0.00),
(2082, 258, 'anna_tomasz_prokop_672.jpg', '', 0, 0.00),
(2081, 258, 'anna_tomasz_prokop_575.jpg', '', 0, 0.00),
(2080, 258, 'anna_tomasz_prokop_029.jpg', '', 0, 0.00),
(2079, 258, 'anna_tomasz_prokop_344.jpg', '', 0, 0.00),
(2078, 258, 'anna_tomasz_prokop_619.jpg', '', 0, 0.00),
(2077, 258, 'anna_tomasz_prokop_097.jpg', '', 0, 0.00),
(2076, 258, 'anna_tomasz_prokop_428.jpg', '', 0, 0.00),
(2075, 258, 'anna_tomasz_prokop_246.jpg', '', 0, 0.00),
(2074, 258, 'anna_tomasz_prokop_315.jpg', '', 0, 0.00),
(2073, 258, 'anna_tomasz_prokop_744.jpg', '', 0, 0.00),
(2072, 258, 'anna_tomasz_prokop_096.jpg', '', 0, 0.00),
(2071, 258, 'anna_tomasz_prokop_438.jpg', '', 0, 0.00),
(2070, 258, 'anna_tomasz_prokop_529.jpg', '', 0, 0.00),
(2069, 258, 'anna_tomasz_prokop_140.jpg', '', 0, 0.00),
(2068, 258, 'anna_tomasz_prokop_538.jpg', '', 0, 0.00),
(2067, 258, 'anna_tomasz_prokop_617.jpg', '', 0, 0.00),
(2066, 258, 'anna_tomasz_prokop_106.jpg', '', 0, 0.00),
(2065, 258, 'anna_tomasz_prokop_075.jpg', '', 0, 0.00),
(2064, 258, 'anna_tomasz_prokop_377.jpg', '', 0, 0.00),
(2063, 258, 'anna_tomasz_prokop_800.jpg', '', 0, 0.00),
(2062, 258, 'anna_tomasz_prokop_016.jpg', '', 0, 0.00),
(2061, 258, 'anna_tomasz_prokop_010.jpg', '10x15', 1, 0.00),
(2060, 258, 'anna_tomasz_prokop_239.jpg', '', 0, 0.00),
(2059, 258, 'anna_tomasz_prokop_253.jpg', '', 0, 0.00),
(2058, 258, 'anna_tomasz_prokop_158.jpg', '', 0, 0.00),
(2057, 258, 'anna_tomasz_prokop_376.jpg', '', 0, 0.00),
(2056, 258, 'anna_tomasz_prokop_708.jpg', '', 0, 0.00),
(2055, 258, 'anna_tomasz_prokop_204.jpg', '', 0, 0.00),
(2054, 258, 'anna_tomasz_prokop_407.jpg', '', 0, 0.00),
(2053, 258, 'anna_tomasz_prokop_676.jpg', '', 0, 0.00),
(2052, 258, 'anna_tomasz_prokop_215.jpg', '', 0, 0.00),
(2051, 258, 'anna_tomasz_prokop_161.jpg', '', 0, 0.00),
(2050, 258, 'anna_tomasz_prokop_349.jpg', '', 0, 0.00),
(2049, 258, 'anna_tomasz_prokop_516.jpg', '', 0, 0.00),
(2048, 258, 'anna_tomasz_prokop_231.jpg', '', 0, 0.00),
(2047, 258, 'anna_tomasz_prokop_522.jpg', '', 0, 0.00),
(2046, 258, 'anna_tomasz_prokop_176.jpg', '', 0, 0.00),
(2045, 258, 'anna_tomasz_prokop_721.jpg', '', 0, 0.00),
(2043, 258, 'anna_tomasz_prokop_631.jpg', '', 0, 0.00),
(2041, 258, 'anna_tomasz_prokop_730.jpg', '', 0, 0.00),
(2040, 258, 'anna_tomasz_prokop_287.jpg', '', 0, 0.00),
(2039, 258, 'anna_tomasz_prokop_688.jpg', '', 0, 0.00),
(2038, 258, 'anna_tomasz_prokop_371.jpg', '', 0, 0.00),
(2037, 258, 'anna_tomasz_prokop_103.jpg', '', 0, 0.00),
(2036, 258, 'anna_tomasz_prokop_325.jpg', '', 0, 0.00),
(2035, 258, 'anna_tomasz_prokop_419.jpg', '', 0, 0.00),
(2034, 258, 'anna_tomasz_prokop_470.jpg', '', 0, 0.00),
(2033, 258, 'anna_tomasz_prokop_070.jpg', '', 0, 0.00),
(2032, 258, 'anna_tomasz_prokop_609.jpg', '', 0, 0.00),
(2031, 258, 'anna_tomasz_prokop_597.jpg', '', 0, 0.00),
(2030, 258, 'anna_tomasz_prokop_340.jpg', '', 0, 0.00),
(2029, 258, 'anna_tomasz_prokop_410.jpg', '', 0, 0.00),
(2028, 258, 'anna_tomasz_prokop_203.jpg', '', 0, 0.00),
(2027, 258, 'anna_tomasz_prokop_624.jpg', '', 0, 0.00),
(2026, 258, 'anna_tomasz_prokop_739.jpg', '', 0, 0.00),
(2025, 258, 'anna_tomasz_prokop_490.jpg', '', 0, 0.00),
(2024, 258, 'anna_tomasz_prokop_581.jpg', '', 0, 0.00),
(2023, 258, 'anna_tomasz_prokop_657.jpg', '', 0, 0.00),
(2022, 258, 'anna_tomasz_prokop_512.jpg', '', 0, 0.00),
(2021, 258, 'anna_tomasz_prokop_226.jpg', '', 0, 0.00),
(2020, 258, 'anna_tomasz_prokop_450.jpg', '', 0, 0.00),
(2019, 258, 'anna_tomasz_prokop_101.jpg', '', 0, 0.00),
(2018, 258, 'anna_tomasz_prokop_426.jpg', '', 0, 0.00),
(2017, 258, 'anna_tomasz_prokop_055.jpg', '', 0, 0.00),
(2016, 258, 'anna_tomasz_prokop_082.jpg', '', 0, 0.00),
(2015, 258, 'anna_tomasz_prokop_749.jpg', '', 0, 0.00),
(2014, 258, 'anna_tomasz_prokop_026.jpg', '', 0, 0.00),
(2013, 258, 'anna_tomasz_prokop_751.jpg', '', 0, 0.00),
(2012, 258, 'anna_tomasz_prokop_072.jpg', '', 0, 0.00),
(2011, 258, 'anna_tomasz_prokop_317.jpg', '', 0, 0.00),
(2010, 258, 'anna_tomasz_prokop_734.jpg', '', 0, 0.00),
(2009, 258, 'anna_tomasz_prokop_445.jpg', '', 0, 0.00),
(2008, 258, 'anna_tomasz_prokop_587.jpg', '', 0, 0.00),
(2007, 258, 'anna_tomasz_prokop_696.jpg', '', 0, 0.00),
(2006, 258, 'anna_tomasz_prokop_205.jpg', '', 0, 0.00),
(2005, 258, 'anna_tomasz_prokop_501.jpg', '', 0, 0.00),
(2004, 258, 'anna_tomasz_prokop_715.jpg', '', 0, 0.00),
(2003, 258, 'anna_tomasz_prokop_065.jpg', '', 0, 0.00),
(2002, 258, 'anna_tomasz_prokop_348.jpg', '', 0, 0.00),
(2001, 258, 'anna_tomasz_prokop_565.jpg', '', 0, 0.00),
(2000, 258, 'anna_tomasz_prokop_745.jpg', '', 0, 0.00),
(1999, 258, 'anna_tomasz_prokop_301.jpg', '', 0, 0.00),
(1998, 258, 'anna_tomasz_prokop_704.jpg', '', 0, 0.00),
(1997, 258, 'anna_tomasz_prokop_440.jpg', '', 0, 0.00),
(1996, 258, 'anna_tomasz_prokop_148.jpg', '', 0, 0.00),
(1995, 258, 'anna_tomasz_prokop_686.jpg', '', 0, 0.00),
(1994, 258, 'anna_tomasz_prokop_576.jpg', '', 0, 0.00),
(1993, 258, 'anna_tomasz_prokop_400.jpg', '', 0, 0.00),
(1992, 258, 'anna_tomasz_prokop_731.jpg', '', 0, 0.00),
(1991, 258, 'anna_tomasz_prokop_132.jpg', '', 0, 0.00),
(1990, 258, 'anna_tomasz_prokop_390.jpg', '', 0, 0.00),
(1989, 258, 'anna_tomasz_prokop_437.jpg', '', 0, 0.00),
(1988, 258, 'anna_tomasz_prokop_443.jpg', '', 0, 0.00),
(1987, 258, 'anna_tomasz_prokop_453.jpg', '', 0, 0.00),
(1986, 258, 'anna_tomasz_prokop_160.jpg', '', 0, 0.00),
(1985, 258, 'anna_tomasz_prokop_298.jpg', '', 0, 0.00),
(1984, 258, 'anna_tomasz_prokop_514.jpg', '', 0, 0.00),
(1983, 258, 'anna_tomasz_prokop_427.jpg', '', 0, 0.00),
(1981, 258, 'anna_tomasz_prokop_729.jpg', '', 0, 0.00),
(1980, 258, 'anna_tomasz_prokop_155.jpg', '', 0, 0.00),
(1979, 258, 'anna_tomasz_prokop_707.jpg', '', 0, 0.00),
(1978, 258, 'anna_tomasz_prokop_263.jpg', '', 0, 0.00),
(1977, 258, 'anna_tomasz_prokop_520.jpg', '', 0, 0.00),
(1976, 258, 'anna_tomasz_prokop_789.jpg', '', 0, 0.00),
(1975, 258, 'anna_tomasz_prokop_059.jpg', '', 0, 0.00),
(1974, 258, 'anna_tomasz_prokop_302.jpg', '', 0, 0.00),
(1973, 258, 'anna_tomasz_prokop_283.jpg', '', 0, 0.00),
(1972, 258, 'anna_tomasz_prokop_497.jpg', '', 0, 0.00),
(1971, 258, 'anna_tomasz_prokop_559.jpg', '', 0, 0.00),
(1970, 258, 'anna_tomasz_prokop_436.jpg', '', 0, 0.00),
(1969, 258, 'anna_tomasz_prokop_061.jpg', '', 0, 0.00),
(1968, 258, 'anna_tomasz_prokop_472.jpg', '', 0, 0.00),
(1967, 258, 'anna_tomasz_prokop_005.jpg', '10x15', 1, 0.00),
(1966, 258, 'anna_tomasz_prokop_383.jpg', '', 0, 0.00),
(1965, 258, 'anna_tomasz_prokop_368.jpg', '', 0, 0.00),
(1964, 258, 'anna_tomasz_prokop_045.jpg', '', 0, 0.00),
(1963, 258, 'anna_tomasz_prokop_515.jpg', '', 0, 0.00),
(1962, 258, 'anna_tomasz_prokop_509.jpg', '', 0, 0.00),
(1961, 258, 'anna_tomasz_prokop_331.jpg', '', 0, 0.00),
(1960, 258, 'anna_tomasz_prokop_398.jpg', '', 0, 0.00),
(1959, 258, 'anna_tomasz_prokop_454.jpg', '', 0, 0.00),
(1958, 258, 'anna_tomasz_prokop_095.jpg', '', 0, 0.00),
(1957, 258, 'anna_tomasz_prokop_670.jpg', '', 0, 0.00),
(1956, 258, 'anna_tomasz_prokop_091.jpg', '', 0, 0.00),
(1954, 258, 'anna_tomasz_prokop_747.jpg', '', 0, 0.00),
(1953, 258, 'anna_tomasz_prokop_122.jpg', '', 0, 0.00),
(1952, 258, 'anna_tomasz_prokop_159.jpg', '', 0, 0.00),
(1951, 258, 'anna_tomasz_prokop_511.jpg', '', 0, 0.00),
(1950, 258, 'anna_tomasz_prokop_164.jpg', '', 0, 0.00),
(1949, 258, 'anna_tomasz_prokop_540.jpg', '', 0, 0.00),
(1948, 258, 'anna_tomasz_prokop_655.jpg', '', 0, 0.00),
(1947, 258, 'anna_tomasz_prokop_186.jpg', '', 0, 0.00),
(1946, 258, 'anna_tomasz_prokop_743.jpg', '', 0, 0.00),
(1945, 258, 'anna_tomasz_prokop_663.jpg', '', 0, 0.00),
(1944, 258, 'anna_tomasz_prokop_578.jpg', '', 0, 0.00),
(1943, 258, 'anna_tomasz_prokop_477.jpg', '', 0, 0.00),
(1942, 258, 'anna_tomasz_prokop_681.jpg', '', 0, 0.00),
(1941, 258, 'anna_tomasz_prokop_455.jpg', '', 0, 0.00),
(1940, 258, 'anna_tomasz_prokop_281.jpg', '', 0, 0.00),
(1939, 258, 'anna_tomasz_prokop_312.jpg', '', 0, 0.00),
(1938, 258, 'anna_tomasz_prokop_370.jpg', '', 0, 0.00),
(1937, 258, 'anna_tomasz_prokop_411.jpg', '', 0, 0.00),
(1936, 258, 'anna_tomasz_prokop_680.jpg', '', 0, 0.00),
(1935, 258, 'anna_tomasz_prokop_563.jpg', '', 0, 0.00),
(1934, 258, 'anna_tomasz_prokop_372.jpg', '', 0, 0.00),
(1933, 258, 'anna_tomasz_prokop_251.jpg', '', 0, 0.00),
(1932, 258, 'anna_tomasz_prokop_359.jpg', '', 0, 0.00),
(1931, 258, 'anna_tomasz_prokop_117.jpg', '', 0, 0.00),
(1930, 258, 'anna_tomasz_prokop_094.jpg', '', 0, 0.00),
(1929, 258, 'anna_tomasz_prokop_641.jpg', '', 0, 0.00),
(1928, 258, 'anna_tomasz_prokop_483.jpg', '', 0, 0.00),
(1927, 258, 'anna_tomasz_prokop_011.jpg', '10x15', 1, 0.00),
(1926, 258, 'anna_tomasz_prokop_335.jpg', '', 0, 0.00),
(1925, 258, 'anna_tomasz_prokop_439.jpg', '', 0, 0.00),
(1924, 258, 'anna_tomasz_prokop_432.jpg', '', 0, 0.00),
(1923, 258, 'anna_tomasz_prokop_235.jpg', '', 0, 0.00),
(1922, 258, 'anna_tomasz_prokop_108.jpg', '', 0, 0.00),
(1921, 258, 'anna_tomasz_prokop_726.jpg', '', 0, 0.00),
(1920, 258, 'anna_tomasz_prokop_185.jpg', '', 0, 0.00),
(1919, 258, 'anna_tomasz_prokop_412.jpg', '', 0, 0.00),
(1918, 258, 'anna_tomasz_prokop_687.jpg', '', 0, 0.00),
(1917, 258, 'anna_tomasz_prokop_605.jpg', '', 0, 0.00),
(1916, 258, 'anna_tomasz_prokop_547.jpg', '', 0, 0.00),
(1915, 258, 'anna_tomasz_prokop_292.jpg', '', 0, 0.00),
(1914, 258, 'anna_tomasz_prokop_603.jpg', '', 0, 0.00),
(1913, 258, 'anna_tomasz_prokop_629.jpg', '', 0, 0.00),
(1912, 258, 'anna_tomasz_prokop_674.jpg', '', 0, 0.00),
(1911, 258, 'anna_tomasz_prokop_361.jpg', '', 0, 0.00),
(1910, 258, 'anna_tomasz_prokop_282.jpg', '', 0, 0.00),
(1909, 258, 'anna_tomasz_prokop_507.jpg', '', 0, 0.00),
(1908, 258, 'anna_tomasz_prokop_208.jpg', '', 0, 0.00),
(1907, 258, 'anna_tomasz_prokop_394.jpg', '', 0, 0.00),
(1906, 258, 'anna_tomasz_prokop_633.jpg', '', 0, 0.00),
(1905, 258, 'anna_tomasz_prokop_308.jpg', '', 0, 0.00),
(1904, 258, 'anna_tomasz_prokop_319.jpg', '', 0, 0.00),
(1903, 258, 'anna_tomasz_prokop_791.jpg', '', 0, 0.00),
(1902, 258, 'anna_tomasz_prokop_433.jpg', '', 0, 0.00),
(1901, 258, 'anna_tomasz_prokop_701.jpg', '', 0, 0.00),
(1900, 258, 'anna_tomasz_prokop_736.jpg', '', 0, 0.00),
(1899, 258, 'anna_tomasz_prokop_498.jpg', '', 0, 0.00),
(1897, 258, 'anna_tomasz_prokop_735.jpg', '', 0, 0.00),
(1896, 258, 'anna_tomasz_prokop_134.jpg', '', 0, 0.00),
(1895, 258, 'anna_tomasz_prokop_600.jpg', '', 0, 0.00),
(1894, 258, 'anna_tomasz_prokop_424.jpg', '', 0, 0.00),
(1893, 258, 'anna_tomasz_prokop_306.jpg', '', 0, 0.00),
(1892, 258, 'anna_tomasz_prokop_322.jpg', '', 0, 0.00),
(1891, 258, 'anna_tomasz_prokop_244.jpg', '', 0, 0.00),
(1890, 258, 'anna_tomasz_prokop_661.jpg', '', 0, 0.00),
(1889, 258, 'anna_tomasz_prokop_569.jpg', '', 0, 0.00),
(1888, 258, 'anna_tomasz_prokop_293.jpg', '', 0, 0.00),
(1887, 258, 'anna_tomasz_prokop_145.jpg', '', 0, 0.00),
(1886, 258, 'anna_tomasz_prokop_555.jpg', '', 0, 0.00),
(1885, 258, 'anna_tomasz_prokop_738.jpg', '', 0, 0.00),
(1884, 258, 'anna_tomasz_prokop_577.jpg', '', 0, 0.00),
(1883, 258, 'anna_tomasz_prokop_757.jpg', '', 0, 0.00),
(1882, 258, 'anna_tomasz_prokop_305.jpg', '', 0, 0.00),
(1881, 258, 'anna_tomasz_prokop_285.jpg', '', 0, 0.00),
(1880, 258, 'anna_tomasz_prokop_724.jpg', '', 0, 0.00),
(1879, 258, 'anna_tomasz_prokop_260.jpg', '', 0, 0.00),
(1878, 258, 'anna_tomasz_prokop_222.jpg', '', 0, 0.00),
(1877, 258, 'anna_tomasz_prokop_741.jpg', '', 0, 0.00),
(1876, 258, 'anna_tomasz_prokop_333.jpg', '', 0, 0.00),
(1875, 258, 'anna_tomasz_prokop_115.jpg', '', 0, 0.00),
(1874, 258, 'anna_tomasz_prokop_343.jpg', '', 0, 0.00),
(1873, 258, 'anna_tomasz_prokop_248.jpg', '', 0, 0.00),
(1872, 258, 'anna_tomasz_prokop_718.jpg', '', 0, 0.00),
(1871, 258, 'anna_tomasz_prokop_012.jpg', '10x15', 1, 0.00),
(1870, 258, 'anna_tomasz_prokop_727.jpg', '', 0, 0.00),
(1869, 258, 'anna_tomasz_prokop_669.jpg', '', 0, 0.00),
(1868, 258, 'anna_tomasz_prokop_127.jpg', '', 0, 0.00),
(1867, 258, 'anna_tomasz_prokop_077.jpg', '', 0, 0.00),
(1866, 258, 'anna_tomasz_prokop_506.jpg', '', 0, 0.00),
(1865, 258, 'anna_tomasz_prokop_548.jpg', '', 0, 0.00),
(1864, 258, 'anna_tomasz_prokop_105.jpg', '', 0, 0.00),
(1863, 258, 'anna_tomasz_prokop_642.jpg', '', 0, 0.00),
(1862, 258, 'anna_tomasz_prokop_493.jpg', '', 0, 0.00),
(1861, 258, 'anna_tomasz_prokop_684.jpg', '', 0, 0.00),
(1860, 258, 'anna_tomasz_prokop_213.jpg', '', 0, 0.00),
(1859, 258, 'anna_tomasz_prokop_233.jpg', '', 0, 0.00),
(1858, 258, 'anna_tomasz_prokop_345.jpg', '', 0, 0.00),
(1857, 258, 'anna_tomasz_prokop_585.jpg', '', 0, 0.00),
(1856, 258, 'anna_tomasz_prokop_530.jpg', '', 0, 0.00),
(1855, 258, 'anna_tomasz_prokop_307.jpg', '', 0, 0.00),
(1854, 258, 'anna_tomasz_prokop_611.jpg', '', 0, 0.00),
(1853, 258, 'anna_tomasz_prokop_756.jpg', '', 0, 0.00),
(1852, 258, 'anna_tomasz_prokop_740.jpg', '', 0, 0.00),
(1851, 258, 'anna_tomasz_prokop_267.jpg', '', 0, 0.00),
(1850, 258, 'anna_tomasz_prokop_221.jpg', '', 0, 0.00),
(1849, 258, 'anna_tomasz_prokop_198.jpg', '', 0, 0.00),
(1848, 258, 'anna_tomasz_prokop_469.jpg', '', 0, 0.00),
(1847, 258, 'anna_tomasz_prokop_568.jpg', '', 0, 0.00),
(1846, 258, 'anna_tomasz_prokop_608.jpg', '', 0, 0.00),
(1845, 258, 'anna_tomasz_prokop_049.jpg', '', 0, 0.00),
(1844, 258, 'anna_tomasz_prokop_334.jpg', '', 0, 0.00),
(1843, 258, 'anna_tomasz_prokop_218.jpg', '', 0, 0.00),
(1842, 258, 'anna_tomasz_prokop_553.jpg', '', 0, 0.00),
(1841, 258, 'anna_tomasz_prokop_024.jpg', '', 0, 0.00),
(1840, 258, 'anna_tomasz_prokop_139.jpg', '', 0, 0.00),
(1838, 258, 'anna_tomasz_prokop_073.jpg', '', 0, 0.00),
(1837, 258, 'anna_tomasz_prokop_602.jpg', '', 0, 0.00),
(1836, 258, 'anna_tomasz_prokop_254.jpg', '', 0, 0.00),
(1835, 258, 'anna_tomasz_prokop_586.jpg', '', 0, 0.00),
(1834, 258, 'anna_tomasz_prokop_152.jpg', '', 0, 0.00),
(1833, 258, 'anna_tomasz_prokop_640.jpg', '', 0, 0.00),
(1832, 258, 'anna_tomasz_prokop_063.jpg', '', 0, 0.00),
(1831, 258, 'anna_tomasz_prokop_085.jpg', '', 0, 0.00),
(1830, 258, 'anna_tomasz_prokop_425.jpg', '', 0, 0.00),
(1829, 258, 'anna_tomasz_prokop_121.jpg', '', 0, 0.00),
(1828, 258, 'anna_tomasz_prokop_387.jpg', '', 0, 0.00),
(1827, 258, 'anna_tomasz_prokop_271.jpg', '', 0, 0.00),
(1826, 258, 'anna_tomasz_prokop_378.jpg', '', 0, 0.00),
(1825, 258, 'anna_tomasz_prokop_102.jpg', '', 0, 0.00),
(1824, 258, 'anna_tomasz_prokop_269.jpg', '', 0, 0.00),
(1823, 258, 'anna_tomasz_prokop_209.jpg', '', 0, 0.00),
(1822, 258, 'anna_tomasz_prokop_247.jpg', '', 0, 0.00),
(1821, 258, 'anna_tomasz_prokop_153.jpg', '', 0, 0.00),
(1820, 258, 'anna_tomasz_prokop_114.jpg', '', 0, 0.00),
(1819, 258, 'anna_tomasz_prokop_484.jpg', '', 0, 0.00),
(1818, 258, 'anna_tomasz_prokop_626.jpg', '', 0, 0.00),
(1817, 258, 'anna_tomasz_prokop_084.jpg', '', 0, 0.00),
(1816, 258, 'anna_tomasz_prokop_448.jpg', '', 0, 0.00),
(1815, 258, 'anna_tomasz_prokop_650.jpg', '', 0, 0.00),
(1814, 258, 'anna_tomasz_prokop_183.jpg', '', 0, 0.00),
(1813, 258, 'anna_tomasz_prokop_327.jpg', '', 0, 0.00),
(1812, 258, 'anna_tomasz_prokop_792.jpg', '', 0, 0.00),
(1811, 258, 'anna_tomasz_prokop_066.jpg', '', 0, 0.00),
(1810, 258, 'anna_tomasz_prokop_395.jpg', '', 0, 0.00),
(1809, 258, 'anna_tomasz_prokop_041.jpg', '', 0, 0.00),
(1808, 258, 'anna_tomasz_prokop_785.jpg', '', 0, 0.00),
(1807, 258, 'anna_tomasz_prokop_475.jpg', '', 0, 0.00),
(1806, 258, 'anna_tomasz_prokop_330.jpg', '', 0, 0.00),
(1805, 258, 'anna_tomasz_prokop_604.jpg', '', 0, 0.00),
(1804, 258, 'anna_tomasz_prokop_784.jpg', '', 0, 0.00),
(1803, 258, 'anna_tomasz_prokop_677.jpg', '', 0, 0.00),
(1802, 258, 'anna_tomasz_prokop_240.jpg', '', 0, 0.00),
(1801, 258, 'anna_tomasz_prokop_402.jpg', '', 0, 0.00),
(1800, 258, 'anna_tomasz_prokop_314.jpg', '', 0, 0.00),
(1799, 258, 'anna_tomasz_prokop_300.jpg', '', 0, 0.00),
(1798, 258, 'anna_tomasz_prokop_406.jpg', '', 0, 0.00),
(1797, 258, 'anna_tomasz_prokop_716.jpg', '', 0, 0.00),
(1796, 258, 'anna_tomasz_prokop_278.jpg', '', 0, 0.00),
(1795, 258, 'anna_tomasz_prokop_471.jpg', '', 0, 0.00),
(1794, 258, 'anna_tomasz_prokop_172.jpg', '', 0, 0.00),
(1793, 258, 'anna_tomasz_prokop_220.jpg', '', 0, 0.00),
(1792, 258, 'anna_tomasz_prokop_765.jpg', '', 0, 0.00),
(1791, 258, 'anna_tomasz_prokop_092.jpg', '', 0, 0.00),
(1790, 258, 'anna_tomasz_prokop_146.jpg', '', 0, 0.00),
(1789, 258, 'anna_tomasz_prokop_584.jpg', '', 0, 0.00),
(1788, 258, 'anna_tomasz_prokop_521.jpg', '', 0, 0.00),
(1787, 258, 'anna_tomasz_prokop_693.jpg', '', 0, 0.00),
(1786, 258, 'anna_tomasz_prokop_699.jpg', '', 0, 0.00),
(1785, 258, 'anna_tomasz_prokop_517.jpg', '', 0, 0.00),
(1784, 258, 'anna_tomasz_prokop_570.jpg', '', 0, 0.00),
(1783, 258, 'anna_tomasz_prokop_351.jpg', '', 0, 0.00),
(1782, 258, 'anna_tomasz_prokop_531.jpg', '', 0, 0.00),
(1781, 258, 'anna_tomasz_prokop_414.jpg', '', 0, 0.00),
(1780, 258, 'anna_tomasz_prokop_558.jpg', '', 0, 0.00),
(1779, 258, 'anna_tomasz_prokop_382.jpg', '', 0, 0.00),
(1778, 258, 'anna_tomasz_prokop_662.jpg', '', 0, 0.00),
(1777, 258, 'anna_tomasz_prokop_353.jpg', '', 0, 0.00),
(1776, 258, 'anna_tomasz_prokop_403.jpg', '', 0, 0.00),
(1774, 258, 'anna_tomasz_prokop_580.jpg', '', 0, 0.00),
(1773, 258, 'anna_tomasz_prokop_589.jpg', '', 0, 0.00),
(1772, 258, 'anna_tomasz_prokop_666.jpg', '', 0, 0.00),
(1771, 258, 'anna_tomasz_prokop_766.jpg', '', 0, 0.00),
(1769, 258, 'anna_tomasz_prokop_593.jpg', '', 0, 0.00),
(1768, 258, 'anna_tomasz_prokop_078.jpg', '', 0, 0.00),
(1767, 258, 'anna_tomasz_prokop_043.jpg', '', 0, 0.00),
(1766, 258, 'anna_tomasz_prokop_392.jpg', '', 0, 0.00),
(1765, 258, 'anna_tomasz_prokop_401.jpg', '', 0, 0.00),
(1764, 258, 'anna_tomasz_prokop_236.jpg', '', 0, 0.00),
(1763, 258, 'anna_tomasz_prokop_396.jpg', '', 0, 0.00),
(1762, 258, 'anna_tomasz_prokop_002.jpg', '', 0, 0.00),
(1761, 258, 'anna_tomasz_prokop_460.jpg', '', 0, 0.00),
(1760, 258, 'anna_tomasz_prokop_564.jpg', '', 0, 0.00),
(1759, 258, 'anna_tomasz_prokop_229.jpg', '', 0, 0.00),
(1758, 258, 'anna_tomasz_prokop_265.jpg', '', 0, 0.00),
(1757, 258, 'anna_tomasz_prokop_311.jpg', '', 0, 0.00),
(1756, 258, 'anna_tomasz_prokop_131.jpg', '', 0, 0.00),
(1755, 258, 'anna_tomasz_prokop_090.jpg', '', 0, 0.00),
(1754, 258, 'anna_tomasz_prokop_211.jpg', '', 0, 0.00),
(1753, 258, 'anna_tomasz_prokop_467.jpg', '', 0, 0.00),
(1752, 258, 'anna_tomasz_prokop_193.jpg', '', 0, 0.00),
(1751, 258, 'anna_tomasz_prokop_389.jpg', '', 0, 0.00),
(1750, 258, 'anna_tomasz_prokop_590.jpg', '', 0, 0.00),
(1749, 258, 'anna_tomasz_prokop_788.jpg', '', 0, 0.00),
(1748, 258, 'anna_tomasz_prokop_592.jpg', '', 0, 0.00),
(1747, 258, 'anna_tomasz_prokop_004.jpg', '10x15', 1, 0.00),
(1746, 258, 'anna_tomasz_prokop_397.jpg', '', 0, 0.00),
(1745, 258, 'anna_tomasz_prokop_790.jpg', '', 0, 0.00),
(1744, 258, 'anna_tomasz_prokop_489.jpg', '', 0, 0.00),
(1743, 258, 'anna_tomasz_prokop_363.jpg', '', 0, 0.00),
(1742, 258, 'anna_tomasz_prokop_018.jpg', '', 0, 0.00),
(1741, 258, 'anna_tomasz_prokop_500.jpg', '', 0, 0.00),
(1740, 258, 'anna_tomasz_prokop_429.jpg', '', 0, 0.00),
(1739, 258, 'anna_tomasz_prokop_328.jpg', '', 0, 0.00),
(1738, 258, 'anna_tomasz_prokop_418.jpg', '', 0, 0.00),
(1737, 258, 'anna_tomasz_prokop_310.jpg', '', 0, 0.00),
(1736, 258, 'anna_tomasz_prokop_628.jpg', '', 0, 0.00),
(1735, 258, 'anna_tomasz_prokop_309.jpg', '', 0, 0.00),
(1734, 258, 'anna_tomasz_prokop_266.jpg', '', 0, 0.00),
(1733, 258, 'anna_tomasz_prokop_505.jpg', '', 0, 0.00),
(1732, 258, 'anna_tomasz_prokop_615.jpg', '', 0, 0.00),
(1731, 258, 'anna_tomasz_prokop_262.jpg', '', 0, 0.00),
(1730, 258, 'anna_tomasz_prokop_338.jpg', '', 0, 0.00),
(1729, 258, 'anna_tomasz_prokop_057.jpg', '', 0, 0.00),
(1728, 258, 'anna_tomasz_prokop_242.jpg', '', 0, 0.00),
(1727, 258, 'anna_tomasz_prokop_764.jpg', '', 0, 0.00),
(1726, 258, 'anna_tomasz_prokop_796.jpg', '', 0, 0.00),
(1725, 258, 'anna_tomasz_prokop_294.jpg', '', 0, 0.00),
(1724, 258, 'anna_tomasz_prokop_130.jpg', '', 0, 0.00),
(1723, 258, 'anna_tomasz_prokop_732.jpg', '', 0, 0.00),
(1722, 258, 'anna_tomasz_prokop_272.jpg', '', 0, 0.00),
(1721, 258, 'anna_tomasz_prokop_255.jpg', '', 0, 0.00),
(1720, 258, 'anna_tomasz_prokop_678.jpg', '', 0, 0.00),
(1719, 258, 'anna_tomasz_prokop_480.jpg', '', 0, 0.00),
(1718, 258, 'anna_tomasz_prokop_728.jpg', '', 0, 0.00),
(1717, 258, 'anna_tomasz_prokop_003.jpg', '13x18', 1, 0.00),
(1716, 258, 'anna_tomasz_prokop_526.jpg', '', 0, 0.00),
(1715, 258, 'anna_tomasz_prokop_539.jpg', '', 0, 0.00),
(1714, 258, 'anna_tomasz_prokop_034.jpg', '', 0, 0.00),
(1713, 258, 'anna_tomasz_prokop_413.jpg', '', 0, 0.00),
(1712, 258, 'anna_tomasz_prokop_367.jpg', '', 0, 0.00),
(1711, 258, 'anna_tomasz_prokop_706.jpg', '', 0, 0.00),
(1710, 258, 'anna_tomasz_prokop_076.jpg', '', 0, 0.00),
(1709, 258, 'anna_tomasz_prokop_373.jpg', '', 0, 0.00),
(1708, 258, 'anna_tomasz_prokop_171.jpg', '', 0, 0.00),
(1707, 258, 'anna_tomasz_prokop_479.jpg', '', 0, 0.00),
(1706, 258, 'anna_tomasz_prokop_620.jpg', '', 0, 0.00),
(1705, 258, 'anna_tomasz_prokop_478.jpg', '', 0, 0.00),
(1704, 258, 'anna_tomasz_prokop_280.jpg', '', 0, 0.00),
(1701, 258, 'anna_tomasz_prokop_598.jpg', '', 0, 0.00),
(1700, 258, 'anna_tomasz_prokop_030.jpg', '', 0, 0.00),
(1699, 258, 'anna_tomasz_prokop_698.jpg', '', 0, 0.00),
(1698, 258, 'anna_tomasz_prokop_690.jpg', '', 0, 0.00),
(1697, 258, 'anna_tomasz_prokop_126.jpg', '', 0, 0.00),
(1696, 258, 'anna_tomasz_prokop_545.jpg', '', 0, 0.00),
(1695, 258, 'anna_tomasz_prokop_020.jpg', '', 0, 0.00),
(1694, 258, 'anna_tomasz_prokop_350.jpg', '', 0, 0.00),
(1693, 258, 'anna_tomasz_prokop_660.jpg', '', 0, 0.00),
(1692, 258, 'anna_tomasz_prokop_299.jpg', '', 0, 0.00),
(1691, 258, 'anna_tomasz_prokop_167.jpg', '', 0, 0.00),
(1690, 258, 'anna_tomasz_prokop_384.jpg', '', 0, 0.00),
(1689, 258, 'anna_tomasz_prokop_637.jpg', '', 0, 0.00),
(1687, 258, 'anna_tomasz_prokop_381.jpg', '', 0, 0.00),
(1686, 258, 'anna_tomasz_prokop_635.jpg', '', 0, 0.00),
(1685, 258, 'anna_tomasz_prokop_623.jpg', '', 0, 0.00),
(1684, 258, 'anna_tomasz_prokop_123.jpg', '', 0, 0.00),
(1683, 258, 'anna_tomasz_prokop_009.jpg', '10x15', 1, 0.00),
(1682, 258, 'anna_tomasz_prokop_324.jpg', '', 0, 0.00),
(1681, 258, 'anna_tomasz_prokop_149.jpg', '', 0, 0.00),
(1680, 258, 'anna_tomasz_prokop_606.jpg', '', 0, 0.00),
(1679, 258, 'anna_tomasz_prokop_755.jpg', '', 0, 0.00),
(1678, 258, 'anna_tomasz_prokop_675.jpg', '', 0, 0.00),
(1677, 258, 'anna_tomasz_prokop_612.jpg', '', 0, 0.00),
(1676, 258, 'anna_tomasz_prokop_621.jpg', '', 0, 0.00),
(1675, 258, 'anna_tomasz_prokop_081.jpg', '', 0, 0.00),
(1674, 258, 'anna_tomasz_prokop_100.jpg', '', 0, 0.00),
(1673, 258, 'anna_tomasz_prokop_163.jpg', '', 0, 0.00),
(1671, 258, 'anna_tomasz_prokop_758.jpg', '', 0, 0.00),
(1670, 258, 'anna_tomasz_prokop_133.jpg', '', 0, 0.00),
(1669, 258, 'anna_tomasz_prokop_566.jpg', '', 0, 0.00),
(1668, 258, 'anna_tomasz_prokop_679.jpg', '', 0, 0.00),
(1667, 258, 'anna_tomasz_prokop_557.jpg', '', 0, 0.00),
(1666, 258, 'anna_tomasz_prokop_793.jpg', '', 0, 0.00),
(1665, 258, 'anna_tomasz_prokop_275.jpg', '', 0, 0.00),
(1664, 258, 'anna_tomasz_prokop_206.jpg', '', 0, 0.00),
(1663, 258, 'anna_tomasz_prokop_466.jpg', '', 0, 0.00),
(1662, 258, 'anna_tomasz_prokop_700.jpg', '', 0, 0.00),
(1661, 258, 'anna_tomasz_prokop_295.jpg', '', 0, 0.00),
(1660, 258, 'anna_tomasz_prokop_682.jpg', '', 0, 0.00),
(1659, 258, 'anna_tomasz_prokop_379.jpg', '', 0, 0.00),
(1658, 258, 'anna_tomasz_prokop_037.jpg', '', 0, 0.00),
(1657, 258, 'anna_tomasz_prokop_464.jpg', '', 0, 0.00),
(1656, 258, 'anna_tomasz_prokop_658.jpg', '', 0, 0.00),
(1655, 258, 'anna_tomasz_prokop_399.jpg', '', 0, 0.00),
(1654, 258, 'anna_tomasz_prokop_567.jpg', '', 0, 0.00),
(1653, 258, 'anna_tomasz_prokop_150.jpg', '', 0, 0.00),
(1652, 258, 'anna_tomasz_prokop_797.jpg', '', 0, 0.00),
(1651, 258, 'anna_tomasz_prokop_783.jpg', '', 0, 0.00),
(1650, 258, 'anna_tomasz_prokop_143.jpg', '', 0, 0.00),
(1649, 258, 'anna_tomasz_prokop_622.jpg', '', 0, 0.00),
(1648, 258, 'anna_tomasz_prokop_705.jpg', '', 0, 0.00),
(1647, 258, 'anna_tomasz_prokop_542.jpg', '', 0, 0.00),
(1646, 258, 'anna_tomasz_prokop_717.jpg', '', 0, 0.00),
(1645, 258, 'anna_tomasz_prokop_420.jpg', '', 0, 0.00),
(1644, 258, 'anna_tomasz_prokop_446.jpg', '', 0, 0.00),
(1643, 258, 'anna_tomasz_prokop_144.jpg', '', 0, 0.00),
(1642, 258, 'anna_tomasz_prokop_798.jpg', '', 0, 0.00),
(1641, 258, 'anna_tomasz_prokop_374.jpg', '', 0, 0.00),
(1640, 258, 'anna_tomasz_prokop_098.jpg', '', 0, 0.00),
(1639, 258, 'anna_tomasz_prokop_388.jpg', '', 0, 0.00),
(1637, 258, 'anna_tomasz_prokop_449.jpg', '', 0, 0.00),
(1636, 258, 'anna_tomasz_prokop_366.jpg', '', 0, 0.00),
(1635, 258, 'anna_tomasz_prokop_276.jpg', '', 0, 0.00),
(1634, 258, 'anna_tomasz_prokop_385.jpg', '', 0, 0.00),
(1633, 258, 'anna_tomasz_prokop_199.jpg', '', 0, 0.00),
(1632, 258, 'anna_tomasz_prokop_093.jpg', '', 0, 0.00),
(1631, 258, 'anna_tomasz_prokop_665.jpg', '', 0, 0.00),
(1630, 258, 'anna_tomasz_prokop_421.jpg', '', 0, 0.00),
(1629, 258, 'anna_tomasz_prokop_618.jpg', '', 0, 0.00),
(1628, 258, 'anna_tomasz_prokop_008.jpg', '10x15', 1, 0.00),
(1627, 258, 'anna_tomasz_prokop_083.jpg', '', 0, 0.00),
(1626, 258, 'anna_tomasz_prokop_138.jpg', '', 0, 0.00),
(1625, 258, 'anna_tomasz_prokop_774.jpg', '', 0, 0.00),
(1624, 258, 'anna_tomasz_prokop_156.jpg', '', 0, 0.00),
(1623, 258, 'anna_tomasz_prokop_616.jpg', '', 0, 0.00),
(1622, 258, 'anna_tomasz_prokop_210.jpg', '', 0, 0.00),
(1621, 258, 'anna_tomasz_prokop_386.jpg', '', 0, 0.00),
(1620, 258, 'anna_tomasz_prokop_652.jpg', '', 0, 0.00),
(1619, 258, 'anna_tomasz_prokop_329.jpg', '', 0, 0.00),
(1618, 258, 'anna_tomasz_prokop_786.jpg', '', 0, 0.00),
(1617, 258, 'anna_tomasz_prokop_264.jpg', '', 0, 0.00),
(1615, 258, 'anna_tomasz_prokop_080.jpg', '', 0, 0.00),
(1614, 258, 'anna_tomasz_prokop_028.jpg', '', 0, 0.00),
(1613, 258, 'anna_tomasz_prokop_064.jpg', '', 0, 0.00),
(1612, 258, 'anna_tomasz_prokop_551.jpg', '', 0, 0.00),
(1611, 258, 'anna_tomasz_prokop_459.jpg', '', 0, 0.00),
(1610, 258, 'anna_tomasz_prokop_347.jpg', '', 0, 0.00),
(1609, 258, 'anna_tomasz_prokop_504.jpg', '', 0, 0.00),
(1608, 258, 'anna_tomasz_prokop_491.jpg', '', 0, 0.00),
(1607, 258, 'anna_tomasz_prokop_174.jpg', '', 0, 0.00),
(1606, 258, 'anna_tomasz_prokop_444.jpg', '', 0, 0.00),
(1605, 258, 'anna_tomasz_prokop_178.jpg', '', 0, 0.00),
(1604, 258, 'anna_tomasz_prokop_524.jpg', '', 0, 0.00),
(1603, 258, 'anna_tomasz_prokop_268.jpg', '', 0, 0.00),
(1602, 258, 'anna_tomasz_prokop_742.jpg', '', 0, 0.00),
(1601, 258, 'anna_tomasz_prokop_408.jpg', '', 0, 0.00),
(1600, 258, 'anna_tomasz_prokop_761.jpg', '', 0, 0.00),
(1599, 258, 'anna_tomasz_prokop_154.jpg', '', 0, 0.00),
(1598, 258, 'anna_tomasz_prokop_541.jpg', '', 0, 0.00),
(1597, 258, 'anna_tomasz_prokop_032.jpg', '', 0, 0.00),
(1596, 258, 'anna_tomasz_prokop_760.jpg', '', 0, 0.00),
(1595, 258, 'anna_tomasz_prokop_225.jpg', '', 0, 0.00),
(1594, 258, 'anna_tomasz_prokop_528.jpg', '', 0, 0.00),
(1593, 258, 'anna_tomasz_prokop_190.jpg', '', 0, 0.00),
(1592, 258, 'anna_tomasz_prokop_261.jpg', '', 0, 0.00),
(1591, 258, 'anna_tomasz_prokop_256.jpg', '', 0, 0.00),
(1590, 258, 'anna_tomasz_prokop_451.jpg', '', 0, 0.00),
(1589, 258, 'anna_tomasz_prokop_279.jpg', '', 0, 0.00),
(1588, 258, 'anna_tomasz_prokop_560.jpg', '', 0, 0.00),
(1587, 258, 'anna_tomasz_prokop_284.jpg', '', 0, 0.00),
(1586, 258, 'anna_tomasz_prokop_107.jpg', '', 0, 0.00),
(1585, 258, 'anna_tomasz_prokop_245.jpg', '', 0, 0.00),
(1584, 258, 'anna_tomasz_prokop_519.jpg', '', 0, 0.00),
(1583, 258, 'anna_tomasz_prokop_543.jpg', '', 0, 0.00),
(1582, 258, 'anna_tomasz_prokop_369.jpg', '', 0, 0.00),
(1581, 258, 'anna_tomasz_prokop_487.jpg', '', 0, 0.00),
(1580, 258, 'anna_tomasz_prokop_711.jpg', '', 0, 0.00),
(1579, 258, 'anna_tomasz_prokop_535.jpg', '', 0, 0.00),
(1578, 258, 'anna_tomasz_prokop_147.jpg', '', 0, 0.00),
(1577, 258, 'anna_tomasz_prokop_173.jpg', '', 0, 0.00),
(1576, 258, 'anna_tomasz_prokop_546.jpg', '', 0, 0.00),
(1575, 258, 'anna_tomasz_prokop_223.jpg', '', 0, 0.00),
(1573, 258, 'anna_tomasz_prokop_476.jpg', '', 0, 0.00),
(1571, 258, 'anna_tomasz_prokop_364.jpg', '', 0, 0.00),
(1572, 258, 'anna_tomasz_prokop_238.jpg', '', 0, 0.00),
(1570, 258, 'anna_tomasz_prokop_391.jpg', '', 0, 0.00),
(1568, 258, 'anna_tomasz_prokop_219.jpg', '', 0, 0.00),
(1567, 258, 'anna_tomasz_prokop_415.jpg', '', 0, 0.00),
(1566, 258, 'anna_tomasz_prokop_685.jpg', '', 0, 0.00),
(1563, 258, 'anna_tomasz_prokop_423.jpg', '', 0, 0.00),
(1564, 258, 'anna_tomasz_prokop_001.jpg', '10x15', 1, 0.00),
(1562, 258, 'anna_tomasz_prokop_499.jpg', '', 0, 0.00),
(1560, 258, 'anna_tomasz_prokop_434.jpg', '', 0, 0.00),
(1559, 258, 'anna_tomasz_prokop_166.jpg', '', 0, 0.00),
(1557, 258, 'anna_tomasz_prokop_799.jpg', '', 0, 0.00),
(1553, 258, 'anna_tomasz_prokop_431.jpg', '', 0, 0.00),
(1554, 258, 'anna_tomasz_prokop_435.jpg', '', 0, 0.00),
(1555, 258, 'anna_tomasz_prokop_380.jpg', '', 0, 0.00),
(1556, 258, 'anna_tomasz_prokop_752.jpg', '', 0, 0.00),
(1672, 258, 'anna_tomasz_prokop_481.jpg', '', 0, 0.00),
(1638, 258, 'anna_tomasz_prokop_068.jpg', '', 0, 0.00),
(1775, 258, 'anna_tomasz_prokop_614.jpg', '', 0, 0.00),
(1770, 258, 'anna_tomasz_prokop_422.jpg', '', 0, 0.00),
(1839, 258, 'anna_tomasz_prokop_709.jpg', '', 0, 0.00),
(1688, 258, 'anna_tomasz_prokop_773.jpg', '', 0, 0.00),
(2116, 258, 'anna_tomasz_prokop_607.jpg', '', 0, 0.00),
(1982, 258, 'anna_tomasz_prokop_313.jpg', '', 0, 0.00),
(2044, 258, 'anna_tomasz_prokop_613.jpg', '', 0, 0.00),
(2042, 258, 'anna_tomasz_prokop_355.jpg', '', 0, 0.00),
(1574, 258, 'anna_tomasz_prokop_763.jpg', '', 0, 0.00),
(2122, 258, 'anna_tomasz_prokop_794.jpg', '', 0, 0.00),
(1702, 258, 'anna_tomasz_prokop_777.jpg', '', 0, 0.00),
(1703, 258, 'anna_tomasz_prokop_452.jpg', '', 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `Points`
--

CREATE TABLE IF NOT EXISTS `Points` (
  `PointId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `AuthorizeDate` datetime DEFAULT NULL,
  `AuthorizeStatus` tinyint(4) DEFAULT NULL,
  `CustomerInformation` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `Comments` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `Amount` int(11) DEFAULT NULL,
  `IsSend` int(1) NOT NULL DEFAULT '0',
  `IsReceived` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PointId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `Points`
--

INSERT INTO `Points` (`PointId`, `UserId`, `OrderId`, `CreateDate`, `AuthorizeDate`, `AuthorizeStatus`, `CustomerInformation`, `Comments`, `Amount`, `IsSend`, `IsReceived`) VALUES
(66, 1645, 197, '2011-06-01 09:06:56', '0000-00-00 00:00:00', 0, 'pompela@poczta.onet.pl', 'Perfumy Luna', 2, 0, 0),
(56, 536, 170, '2011-03-15 14:03:59', '0000-00-00 00:00:00', 0, 'magda_gajos@wp.pl', 'perfumy ines i luna', 3, 0, 0),
(57, 1051, 0, '2011-03-24 20:03:48', '0000-00-00 00:00:00', 0, '  (onlymarami@gazeta.pl)', 'Perfumy Luna wygrana w konkursie', 0, 0, 0),
(58, 536, 0, '2011-04-08 15:04:58', '0000-00-00 00:00:00', 0, 'Magdalena Gajos (magda_gajos@wp.pl)', 'komentarz do dziaĹu opinie/porady', 1, 0, 0),
(64, 1512, 186, '2011-05-18 23:05:36', '0000-00-00 00:00:00', 0, 'jokasta132@op.pl', '', 1, 0, 0),
(60, 1083, 175, '2011-04-18 18:04:05', '0000-00-00 00:00:00', 0, 'plixa@o2.pl', 'zakup perfumy leila', 1, 0, 0),
(65, 1645, 194, '2011-05-25 13:05:51', '0000-00-00 00:00:00', 0, 'pompela@poczta.onet.pl', 'perfumy Luna', 2, 0, 0),
(62, 1793, 182, '2011-05-12 12:05:10', '0000-00-00 00:00:00', 0, 'agnieszka2646@wp.pl', '', 4, 0, 0),
(63, 1750, 179, '2011-05-12 15:05:48', '0000-00-00 00:00:00', 0, 'nataliapq@wp.pl', 'perfumy leila', 1, 0, 0),
(67, 1668, 184, '2011-06-01 09:06:16', '0000-00-00 00:00:00', 0, 'martyna.gierszewska@gmail.com', 'Perfumy Luna', 2, 0, 0),
(68, 1645, 199, '2011-06-07 12:06:29', '0000-00-00 00:00:00', 0, 'pompela@poczta.onet.pl', 'kolejna Luna ;-)', 2, 0, 0),
(69, 1645, 0, '2011-06-09 15:06:29', '0000-00-00 00:00:00', 0, 'BOĹťENA  CZAJKOWSKA (pompela@poczta.onet.pl)', 'Wymiana perfumy Luna', -6, 0, 0),
(70, 1970, 202, '2011-06-16 09:06:19', '0000-00-00 00:00:00', 0, 'basiam1957@wp.pl', '', 2, 0, 0),
(71, 1972, 203, '2011-06-22 13:06:08', '0000-00-00 00:00:00', 0, 'bluma02@gmail.com', '', 1, 0, 0),
(72, 2163, 205, '2011-06-22 13:06:02', '0000-00-00 00:00:00', 0, 'agulacomp@wp.pl', '', 1, 0, 0),
(73, 1512, 204, '2011-06-22 13:06:45', '0000-00-00 00:00:00', 0, 'jokasta132@op.pl', '', 2, 0, 0),
(74, 2243, 212, '2011-07-14 14:07:43', '0000-00-00 00:00:00', 0, 'beata.jurczyga@gmail.com', 'Perfumy Leila,Luna,Noah', 5, 0, 0),
(75, 3058, 214, '2011-07-14 14:07:20', '0000-00-00 00:00:00', 0, 'the.real.nps@gmail.com', 'Perfumy Leila', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Poll`
--

CREATE TABLE IF NOT EXISTS `Poll` (
  `PollId` int(11) NOT NULL AUTO_INCREMENT,
  `Question` varchar(255) NOT NULL DEFAULT '0',
  `OpenQuestion` varchar(255) NOT NULL,
  `CreateDate` date NOT NULL DEFAULT '0000-00-00',
  `Status` int(11) NOT NULL,
  `PollOrder` int(11) NOT NULL,
  PRIMARY KEY (`PollId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `Poll`
--

INSERT INTO `Poll` (`PollId`, `Question`, `OpenQuestion`, `CreateDate`, `Status`, `PollOrder`) VALUES
(35, '', '', '0000-00-00', 0, 0),
(36, 'Et parmi les thĂ¨mes suivants, quel est celui qui aurait votre prĂŠfĂŠrence pour la prochaine consultation ?', 'Quels sont tous les sujets que vous souhaitez voir abordĂŠs dans le cadre de cette consultation ?', '2015-03-18', 1, 8),
(33, '', 'Quels sont tous les sujets que vous souhaitez voir abordĂŠs dans le cadre de cette consultation ?', '2015-03-18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PollAnswer`
--

CREATE TABLE IF NOT EXISTS `PollAnswer` (
  `PollAnswerId` int(11) NOT NULL AUTO_INCREMENT,
  `PollId` int(11) NOT NULL DEFAULT '0',
  `PollAnswer` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `PollAnswerOrder` int(11) NOT NULL,
  PRIMARY KEY (`PollAnswerId`),
  KEY `DeltaId` (`PollId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=306 ;

--
-- Dumping data for table `PollAnswer`
--

INSERT INTO `PollAnswer` (`PollAnswerId`, `PollId`, `PollAnswer`, `PollAnswerOrder`) VALUES
(41, 18, 'This is answer 5', 4),
(40, 18, 'This is answer 4', 3),
(39, 18, 'This is answer 3', 2),
(38, 18, 'This is answer 2', 1),
(37, 18, 'This is answer 1', 0),
(57, 20, 'D', 3),
(56, 20, 'C', 2),
(55, 20, 'B', 1),
(54, 20, 'A', 0),
(49, 21, 'C', 1),
(48, 21, 'B', 0),
(58, 22, '4', 0),
(59, 22, '5', 1),
(60, 22, '6', 2),
(61, 22, '7', 3),
(109, 23, '7', 3),
(108, 23, '6', 2),
(107, 23, '5', 1),
(106, 23, '4', 0),
(149, 24, 'f', 3),
(148, 24, 'd', 2),
(147, 24, 's', 1),
(146, 24, 'a', 0),
(197, 26, '6', 3),
(196, 26, '5', 2),
(195, 26, '4', 1),
(194, 26, '2', 0),
(213, 27, 'Answer to question 3', 3),
(212, 27, 'Answer to question 3', 2),
(210, 27, 'Answer to question 3', 0),
(211, 27, 'Answer to question 3', 1),
(232, 28, 'Tomek pool question answer 5', 4),
(231, 28, 'Tomek pool question answer 4', 3),
(230, 28, 'Tomek pool question answer 3', 2),
(229, 28, 'Tomek pool question answer 2', 1),
(228, 28, 'Tomek pool question answer 1', 0),
(244, 29, 'ThĂŠmatique 5', 4),
(243, 29, 'ThĂŠmatique 4', 3),
(242, 29, 'ThĂŠmatique 3', 2),
(241, 29, 'ThĂŠmatique 2', 1),
(240, 29, 'ThĂŠmatique 1', 0),
(279, 31, 'ThĂŠmatique 5', 4),
(278, 31, 'ThĂŠmatique 4', 3),
(277, 31, 'ThĂŠmatique 3', 2),
(276, 31, 'ThĂŠmatique 2', 1),
(275, 31, 'ThĂŠmatique 1', 0),
(280, 31, 'ThĂŠmatique 6', 5),
(295, 36, 'La fiscalitĂŠ des entreprises', 0),
(293, 34, 'ThĂŠmatique 4', 3),
(294, 34, 'ThĂŠmatique 5', 4),
(292, 34, 'ThĂŠmatique 3', 2),
(291, 34, 'ThĂŠmatique 2', 1),
(290, 34, 'ThĂŠmatique 1', 0),
(296, 36, 'Lâemploi', 1),
(297, 36, 'Lâinnovation', 2),
(298, 36, 'Le droit du travail', 3),
(299, 36, 'Les aides', 4),
(300, 36, 'Les charges', 5),
(301, 36, 'Les ressources humaines', 6),
(302, 36, 'Le financement ', 7),
(303, 36, 'Le made in France', 8),
(304, 36, 'LâEurope', 9),
(305, 36, 'La Croissance', 10);

-- --------------------------------------------------------

--
-- Table structure for table `PollVote`
--

CREATE TABLE IF NOT EXISTS `PollVote` (
  `PollVoteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL DEFAULT '0',
  `PollId` int(11) NOT NULL DEFAULT '0',
  `PollAnswerId` int(11) NOT NULL DEFAULT '0',
  `PollOpenAnswer` text CHARACTER SET utf8 NOT NULL,
  `CreateDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`PollVoteId`),
  KEY `UserId` (`UserId`),
  KEY `PollAnswerId` (`PollAnswerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `PollVote`
--

INSERT INTO `PollVote` (`PollVoteId`, `UserId`, `PollId`, `PollAnswerId`, `PollOpenAnswer`, `CreateDate`) VALUES
(2, 3579, 27, 0, 'anser', '2015-01-10'),
(3, 3579, 27, 212, '', '2015-01-10'),
(4, 3579, 28, 0, 'Answer from user1', '2015-01-10'),
(5, 3579, 28, 229, '', '2015-01-10'),
(6, 3580, 28, 0, 'Answer from user2', '2015-01-10'),
(7, 3580, 28, 231, '', '2015-01-10'),
(8, 3581, 28, 0, 'Answer from user 3', '2015-01-10'),
(9, 3581, 28, 229, '', '2015-01-10'),
(10, 3579, 29, 0, 'Tomek prod open', '2015-01-10'),
(11, 3579, 29, 233, '', '2015-01-10'),
(12, 3580, 29, 0, 'question 3', '2015-01-10'),
(13, 3580, 29, 234, '', '2015-01-10'),
(14, 3581, 29, 233, '', '2015-01-11'),
(15, 3581, 29, 0, 'This is my answer', '2015-01-11'),
(16, 3585, 29, 0, 'cfdjedjh', '2015-01-15'),
(17, 3585, 29, 233, '', '2015-01-15'),
(31, 3580, 31, 277, '', '2015-01-17'),
(30, 3580, 31, 0, 'Please enter Your answer here...', '2015-01-17'),
(32, 3585, 31, 0, 'Please enter Your answer here...', '2015-01-17'),
(33, 3585, 31, 277, '', '2015-01-17'),
(34, 3581, 31, 0, 'this is answer from user 3', '2015-01-17'),
(35, 3581, 31, 280, '', '2015-01-17'),
(39, 3592, 31, 276, '', '2015-01-24'),
(38, 3592, 31, 0, 'ttt', '2015-01-24'),
(40, 3597, 31, 275, '', '2015-03-11'),
(45, 3598, 31, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-03-11'),
(46, 3598, 31, 275, '', '2015-03-11'),
(47, 3612, 36, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-04-03'),
(48, 3612, 36, 297, '', '2015-04-03'),
(49, 3585, 36, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-04-03'),
(50, 3624, 36, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-04-09'),
(51, 3624, 36, 295, '', '2015-04-09'),
(52, 3633, 36, 0, 'cotation des chefs d''entreprises. faut il la rĂŠformer pour ne pas laisser certains entrepreneurs au bord de la route?', '2015-04-27'),
(53, 3633, 36, 302, '', '2015-04-27'),
(54, 3595, 36, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-04-29'),
(55, 3595, 36, 304, '', '2015-04-29'),
(56, 3661, 36, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-06-01'),
(57, 3661, 36, 305, '', '2015-06-01'),
(58, 3675, 36, 0, 'comment donner confiance aux recruteurs', '2015-06-06'),
(59, 3675, 36, 296, '', '2015-06-06'),
(60, 3642, 36, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-06-08'),
(61, 3642, 36, 298, '', '2015-06-08'),
(62, 3691, 36, 0, 'Merci d''entrer votre rĂŠponse ici...', '2015-06-14'),
(63, 3691, 36, 297, '', '2015-06-14'),
(64, 3692, 36, 0, 'Le tĂŠlĂŠtravail\r\nL''emploi\r\nLa fiscalitĂŠ des entreprises', '2015-06-16'),
(65, 3692, 36, 300, '', '2015-06-16'),
(66, 3711, 36, 0, 'tous les sujets en relation avec la progression ĂŠconomique mondiale', '2015-06-24'),
(67, 3711, 36, 297, '', '2015-06-24'),
(68, 3721, 36, 0, 'la refonte du RSI\r\nLe pouvoir d''achat des franĂ§ais\r\nla baisse des charges en faveur de l''investissement', '2015-07-13'),
(69, 3721, 36, 300, '', '2015-07-13'),
(70, 3722, 36, 0, 'Les aides financieres ', '2015-07-17'),
(71, 3722, 36, 299, '', '2015-07-17'),
(72, 3752, 36, 0, 'L''augmentation du plafond Auto-entrepreneur, et donc suppression du du statu d''artisan, ce qui pourrais ĂŞtre une bonnes chose, Ă§Ă  ĂŠquilibrerai.\r\n', '2016-01-29'),
(73, 3752, 36, 300, '', '2016-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `Producer`
--

CREATE TABLE IF NOT EXISTS `Producer` (
  `ProducerId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProducerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `Producer`
--

INSERT INTO `Producer` (`ProducerId`, `Name`) VALUES
(1, 'Close2you'),
(11, 'Barbra'),
(12, 'Pierre Arthes'),
(13, 'Miyoshi Miyagi'),
(14, 'Ziaja'),
(15, 'Soraya'),
(16, 'Garnier'),
(18, 'Dove'),
(19, 'Nivea'),
(20, 'Loreal'),
(21, 'Syoss'),
(22, 'Wella'),
(23, 'Rexona'),
(24, 'Fa'),
(25, 'Palmolive'),
(26, 'AA'),
(30, 'Lady Speed Stick'),
(31, 'Close2you, Barbra'),
(32, 'Close2you, Pierre Arthes'),
(33, 'Drogeria Close2you');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `BetaId` int(11) NOT NULL,
  `ProductCategoryId` int(11) NOT NULL DEFAULT '0',
  `ProductCategoryLevelOneName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ProductCategoryLevelOneSeoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ProductCategoryLevelTwoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ProductCategoryLevelTwoSeoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `UserId` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `ExtName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Code` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ShortDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `PreviewDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ContactDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `HDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL DEFAULT '0000-00-00',
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ProductOrder` int(11) NOT NULL DEFAULT '0',
  `HomeProductOrder` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `IsBestProduct` int(11) NOT NULL DEFAULT '0',
  `IsHomeProduct` int(11) NOT NULL,
  `IsAvailable` int(11) NOT NULL,
  `IsVisible` int(11) NOT NULL,
  `ImgDriveName` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgAlt` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Price` float(10,2) NOT NULL DEFAULT '0.00',
  `PriceOld` float(10,2) NOT NULL DEFAULT '0.00',
  `Weight` int(11) NOT NULL,
  `ProductType` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `ProducerName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ProductIdLink1` int(11) NOT NULL,
  `ProductIdLink2` int(11) NOT NULL,
  `ProductIdLink3` int(11) NOT NULL,
  `ProductIdLink4` int(11) NOT NULL,
  `ProductIdLink5` int(11) NOT NULL,
  `InStock` int(11) NOT NULL DEFAULT '0',
  `Delivery` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Points` int(11) NOT NULL,
  `PointsMinus` int(11) NOT NULL,
  PRIMARY KEY (`ProductId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`ProductId`, `BetaId`, `ProductCategoryId`, `ProductCategoryLevelOneName`, `ProductCategoryLevelOneSeoName`, `ProductCategoryLevelTwoName`, `ProductCategoryLevelTwoSeoName`, `UserId`, `Name`, `SeoName`, `ExtName`, `Code`, `ShortDescription`, `PreviewDescription`, `LongDescription`, `ContactDescription`, `HDescription`, `CreationDate`, `UpdateDate`, `ProductOrder`, `HomeProductOrder`, `Status`, `IsBestProduct`, `IsHomeProduct`, `IsAvailable`, `IsVisible`, `ImgDriveName`, `ImgFileName`, `ImgAlt`, `Price`, `PriceOld`, `Weight`, `ProductType`, `ProducerName`, `ProductIdLink1`, `ProductIdLink2`, `ProductIdLink3`, `ProductIdLink4`, `ProductIdLink5`, `InStock`, `Delivery`, `Points`, `PointsMinus`) VALUES
(1, 8, 0, '', '', '', '', 0, 'Casio Keyboard SA-77 44 minitangenter', 'casio-keyboard-sa-77-44-minitangenter', 'C112', '1', 'Med 44 tangenter gir SA-77 alle musikalske nybegynnere et utgangspunkt som er tilstrekkelig til at de kan spille sine fĂ¸rste melodier. 100 lyder, 50 rytmer og 10 integrerte sanger sĂ¸rger for ekte avveksling. LCD-skjermen bidrar til ĂĽ velge og hente frem et stort musikalsk mangfold. Dessuten har SA-76 5 trommepads med forskjellige trommelyder ĂĽ utforske. KjĂ¸per du dette keyboardet fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.', '', '&lt;p&gt;Med 44 tangenter gir SA-77 alle musikalske nybegynnere et utgangspunkt som er tilstrekkelig til at de kan spille sine fĂ¸rste melodier. 100 lyder, 50 rytmer og 10 integrerte sanger sĂ¸rger for ekte avveksling. LCD-skjermen bidrar til ĂĽ velge og hente frem et stort musikalsk mangfold. Dessuten har SA-76 5 trommepads med forskjellige trommelyder ĂĽ utforske. KjĂ¸per du dette keyboardet fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.&lt;/p&gt;', '', '', '2014-12-02', '2014-12-22', 3, 0, 0, 1, 1, 1, 1, 'd7de3d9da9905c55a0256bcc5ac79679.jpg', '', '', 30.00, 0.00, 2, 'Keyword 1', '1', 0, 0, 0, 0, 0, 10, '(2-3 weeks)', 0, 0),
(2, 7, 0, '', '', '', '', 0, 'Casio Digitalpiano CDP-120 inkl. CS44', 'casio-digitalpiano-cdp-120-inkl-cs44', 'C221', '1', 'Casio Digitalpiano CDP-120 inkl. CS44', '', '&lt;p&gt;CDP-120 er et helt nytt og stilrent instrument, utrustet med et 88 tangenters klaviatur med hammermekanikk, autentiske stereosamplinger og med et pent og brukervennlig design. Aldri fĂ¸r har man fĂĽtt sĂĽ mye piano for pengene!! \r\nCasio CDP-120 leveres komplett med stativ, sustainpedal og notestativ. \r\nPianoet inneholder akustisk flygel og pianolyd, samt elpiano og strykere. \r\nDu kan enkelt ta CDP-120 med deg som et stagepiano med en vekt pĂĽ bare 12kg OG man kan koble det til dataen via USB-tilkoblingen pĂĽ baksiden. Med andre ord fĂĽr man i CDP-120 et mangfoldig og komplett instrument som kan like gjerne brukes i hjemmet, pĂĽ skolen og pĂĽ scenen.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;88 vektede tangenter&lt;/li&gt;\r\n&lt;li&gt;AHL lydkilde&lt;/li&gt;\r\n&lt;li&gt;48 toners polyfoni&lt;/li&gt;\r\n&lt;li&gt;5 lyder&lt;/li&gt;\r\n&lt;li&gt;Layerfunksjon (to lyder pĂĽ hverandre)&lt;/li&gt;\r\n&lt;li&gt;10 forskjellig romklangeffekter&lt;/li&gt;\r\n&lt;li&gt;5 forskjellige choruseffekter&lt;/li&gt;\r\n&lt;li&gt;Transponering&lt;/li&gt;\r\n&lt;li&gt;USB â MIDI-interface&lt;/li&gt;\r\n&lt;li&gt;Hodetelefonutgang/Stereo Lineout (stor jack, 6,3mm)&lt;/li&gt;\r\n&lt;li&gt;Inkl CS-44P understell&lt;/li&gt;\r\n&lt;li&gt;Inkl enkel sustainpedal&lt;/li&gt;\r\n&lt;li&gt;Inkl notestativ&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;KjĂ¸per du dette pianoet, fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.&lt;/p&gt;', '', '', '2014-12-02', '2014-12-22', 4, 0, 0, 1, 1, 1, 1, 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', '', '', 10.00, 0.00, 10, 'Keyword 2', '1', 0, 0, 0, 0, 0, 5, '2 weeks', 0, 0),
(3, 7, 0, '', '', '', '', 0, 'Casio Digitalpiano AP-250BN komplett', 'casio-digitalpiano-ap-250bn-komplett', 'C112', '1', 'Casio Digitalpiano AP-250BN komplett', '', '&lt;ul&gt;\r\n&lt;li&gt;Ny flerdimensjonell AiR lydkilde (128 stemmers polyfoni)&lt;/li&gt;\r\n&lt;li&gt;Tri-Sensor Scaled Hammer Action II&lt;/li&gt;\r\n&lt;li&gt;Damper resonance&lt;/li&gt;\r\n&lt;li&gt;Hammer response&lt;/li&gt;\r\n&lt;li&gt;18 Lyder, 60 melodier&lt;/li&gt;\r\n&lt;li&gt;USB (For datatilkobling)&lt;/li&gt;\r\n&lt;/ul&gt;', '', '', '2014-12-02', '2014-12-22', 5, 0, 0, 1, 1, 1, 1, 'eb9087b9ef031bcd0e6f7a4408e0724d.jpg', '', '', 10.00, 0.00, 10, 'Keyword 3', '1', 0, 0, 0, 0, 0, 4, '1 week', 0, 0),
(4, 8, 0, '', '', '', '', 0, 'Casio Digitalpiano PX-350BK', 'casio-digitalpiano-px-350bk', 'C443', '1', 'Casio Digitalpiano PX-350BK', '', '&lt;p&gt;Ny flerdimensjonell AiR lydkilde (128 stemmers polyfoni)&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Tri-Sensor Scaled Hammer Action II&lt;/li&gt;\r\n&lt;li&gt;Damper resonance&lt;/li&gt;\r\n&lt;li&gt;Hammer response&lt;/li&gt;\r\n&lt;li&gt;250 Lyder,180 rytmer&lt;/li&gt;\r\n&lt;li&gt;Bakbelyst display&lt;/li&gt;\r\n&lt;li&gt;USB (For datatilkobling)&lt;/li&gt;\r\n&lt;li&gt;USB flash memory port (USB-minne)&lt;/li&gt;\r\n&lt;li&gt;Audio Recording&lt;/li&gt;\r\n&lt;li&gt;Lydinnspilling&lt;/li&gt;\r\n&lt;li&gt;MIDI-Interface&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;KjĂ¸per du dette pianoet, fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.&lt;/p&gt;', '', '', '2014-12-02', '2014-12-22', 6, 0, 0, 1, 1, 1, 1, '23b719e001a21a85da2d9d240b12e912.jpg', '', '', 10.00, 0.00, 49, 'Keyword 4', '1', 0, 0, 0, 0, 0, 0, '2 weeks', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ProductCategory`
--

CREATE TABLE IF NOT EXISTS `ProductCategory` (
  `ProductCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `FatherId` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Descr` varchar(255) NOT NULL,
  `SeoName` varchar(255) NOT NULL DEFAULT '',
  `ListOrder` int(11) NOT NULL DEFAULT '0',
  `Img` varchar(40) NOT NULL DEFAULT '0',
  `NumberOfItems` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProductCategoryId`),
  KEY `ProductCategoryId` (`ProductCategoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ProductCategory`
--


-- --------------------------------------------------------

--
-- Table structure for table `ProductCategoryPlain`
--

CREATE TABLE IF NOT EXISTS `ProductCategoryPlain` (
  `ProductCategoryPlainId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCategoryId` int(11) DEFAULT NULL,
  `ProductCategoryName` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `ProductCategorySeoName` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ProductCategoryPlainId`),
  KEY `ProductCategoryPlainId` (`ProductCategoryPlainId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ProductCategoryPlain`
--


-- --------------------------------------------------------

--
-- Table structure for table `ProductPicture`
--

CREATE TABLE IF NOT EXISTS `ProductPicture` (
  `ProductPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) NOT NULL DEFAULT '0',
  `ImgAlt` varchar(40) NOT NULL DEFAULT '0',
  `ImgType` varchar(10) NOT NULL DEFAULT '0',
  `BigImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `BigImgFileName` varchar(40) NOT NULL DEFAULT '0',
  `BigImgAlt` varchar(40) NOT NULL DEFAULT '0',
  `BigImgType` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProductPictureId`),
  KEY `ProductId` (`ProductId`),
  KEY `ProductPictureId` (`ProductPictureId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ProductPicture`
--

INSERT INTO `ProductPicture` (`ProductPictureId`, `ProductId`, `ImgDriveName`, `ImgFileName`, `ImgAlt`, `ImgType`, `BigImgDriveName`, `BigImgFileName`, `BigImgAlt`, `BigImgType`) VALUES
(9, 1, 'd7de3d9da9905c55a0256bcc5ac79679.jpg', '', '', '', '', '', '', ''),
(10, 2, 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', '', '', '', '', '', '', ''),
(11, 3, 'eb9087b9ef031bcd0e6f7a4408e0724d.jpg', '', '', '', '', '', '', ''),
(12, 4, '23b719e001a21a85da2d9d240b12e912.jpg', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `ProvinceId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryId` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(40) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProvinceId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `Province`
--

INSERT INTO `Province` (`ProvinceId`, `CountryId`, `Name`) VALUES
(1, 1, '-'),
(2, 31, 'Alberta'),
(3, 31, 'B.C. (British Columbia)'),
(4, 31, 'Manitoba'),
(5, 31, 'New Brunswick'),
(6, 31, 'Newfoundland'),
(7, 31, 'Nova Scotia'),
(8, 31, 'Nunavut'),
(9, 31, 'Ontario'),
(10, 31, 'P.E.I. (Prince Edward Island)'),
(11, 31, 'Quebec'),
(12, 31, 'Saskatchewan'),
(13, 31, 'Yukon Territories'),
(14, 186, 'Alabama'),
(15, 186, 'Alaska'),
(16, 186, 'Arizona'),
(17, 186, 'Arkansas'),
(18, 186, 'California'),
(19, 186, 'Colorado'),
(20, 186, 'Connecticut'),
(21, 186, 'Delaware'),
(22, 186, 'District of Columbia'),
(23, 186, 'Florida'),
(24, 186, 'Georgia'),
(25, 186, 'Hawaii'),
(26, 186, 'Idaho'),
(27, 186, 'Illinois'),
(28, 186, 'Indiana'),
(29, 186, 'Iowa'),
(30, 186, 'Kansas'),
(31, 186, 'Kentucky'),
(32, 186, 'Louisiana'),
(33, 186, 'Maine'),
(34, 186, 'Maryland'),
(35, 186, 'Massachusetts'),
(36, 186, 'Michigan'),
(37, 186, 'Minnesota'),
(38, 186, 'Mississippi'),
(39, 186, 'Missouri'),
(40, 186, 'Montana'),
(41, 186, 'Nebraska'),
(42, 186, 'Nevada'),
(43, 186, 'New Hampshire'),
(44, 186, 'New Jersey'),
(45, 186, 'New Mexico'),
(46, 186, 'New York'),
(47, 186, 'North Carolina'),
(48, 186, 'North Dakota'),
(49, 186, 'Ohio'),
(50, 186, 'Oklahoma'),
(51, 186, 'Oregon'),
(52, 186, 'Pennsylvania'),
(53, 186, 'Rhode Island'),
(54, 186, 'South Carolina'),
(55, 186, 'South Dakota'),
(56, 186, 'Tennessee'),
(57, 186, 'Texas'),
(58, 186, 'Utah'),
(59, 186, 'Vermont'),
(60, 186, 'Virginia'),
(61, 186, 'Washington'),
(62, 186, 'West Virginia'),
(63, 186, 'Wisconsin'),
(64, 186, 'Wyoming'),
(65, 140, 'dolno?l?skie'),
(66, 140, 'kujawsko-pomorskie'),
(67, 140, '??dzkie'),
(68, 140, 'lubelskie'),
(69, 140, 'lubuskie'),
(70, 140, 'ma?opolskie'),
(71, 140, 'mazowieckie'),
(72, 140, 'opolskie'),
(73, 140, 'podkarpackie'),
(74, 140, 'podlaskie'),
(75, 140, 'pomorskie'),
(76, 140, '?l?skie'),
(77, 140, '?wi?tokrzyskie'),
(78, 140, 'warmi?sko-mazurskie'),
(79, 140, 'wielkopolskie'),
(80, 140, 'zachodnio-pomorskie');

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `RightsId` int(11) NOT NULL AUTO_INCREMENT,
  `Label` varchar(40) NOT NULL DEFAULT '0',
  `Level` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`RightsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Rights`
--

INSERT INTO `Rights` (`RightsId`, `Label`, `Level`) VALUES
(1, 'admin', '0'),
(2, 'access zone 1', '1'),
(3, 'access zone 2', '2'),
(4, 'access zone 3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `RightsUser`
--

CREATE TABLE IF NOT EXISTS `RightsUser` (
  `RightsId` int(11) NOT NULL DEFAULT '0',
  `UserId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`RightsId`,`UserId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `RightsUser`
--

INSERT INTO `RightsUser` (`RightsId`, `UserId`) VALUES
(1, 3),
(2, 3564),
(2, 3581),
(2, 3585),
(2, 3593),
(2, 3594),
(2, 3595),
(2, 3596),
(2, 3599),
(2, 3601),
(2, 3602),
(2, 3604),
(2, 3605),
(2, 3606),
(2, 3607),
(2, 3608),
(2, 3609),
(2, 3610),
(2, 3611),
(2, 3612),
(2, 3613),
(2, 3614),
(2, 3615),
(2, 3616),
(2, 3622),
(2, 3623),
(2, 3624),
(2, 3625),
(2, 3626),
(2, 3627),
(2, 3631),
(2, 3633),
(2, 3634),
(2, 3635),
(2, 3636),
(2, 3637),
(2, 3638),
(2, 3639),
(2, 3640),
(2, 3641),
(2, 3642),
(2, 3643),
(2, 3644),
(2, 3645),
(2, 3646),
(2, 3647),
(2, 3648),
(2, 3649),
(2, 3651),
(2, 3652),
(2, 3653),
(2, 3655),
(2, 3657),
(2, 3658),
(2, 3659),
(2, 3660),
(2, 3661),
(2, 3662),
(2, 3663),
(2, 3664),
(2, 3665),
(2, 3666),
(2, 3667),
(2, 3668),
(2, 3671),
(2, 3672),
(2, 3673),
(2, 3674),
(2, 3675),
(2, 3676),
(2, 3679),
(2, 3680),
(2, 3681),
(2, 3682),
(2, 3683),
(2, 3684),
(2, 3685),
(2, 3686),
(2, 3687),
(2, 3688),
(2, 3691),
(2, 3692),
(2, 3693),
(2, 3694),
(2, 3695),
(2, 3696),
(2, 3697),
(2, 3698),
(2, 3699),
(2, 3700),
(2, 3701),
(2, 3702),
(2, 3703),
(2, 3704),
(2, 3705),
(2, 3706),
(2, 3707),
(2, 3708),
(2, 3709),
(2, 3710),
(2, 3711),
(2, 3712),
(2, 3713),
(2, 3714),
(2, 3715),
(2, 3716),
(2, 3717),
(2, 3718),
(2, 3719),
(2, 3720),
(2, 3721),
(2, 3722),
(2, 3723),
(2, 3724),
(2, 3725),
(2, 3726),
(2, 3727),
(2, 3728),
(2, 3729),
(2, 3730),
(2, 3731),
(2, 3732),
(2, 3733),
(2, 3734),
(2, 3735),
(2, 3736),
(2, 3737),
(2, 3738),
(2, 3739),
(2, 3740),
(2, 3741),
(2, 3742),
(2, 3743),
(2, 3744),
(2, 3745),
(2, 3746),
(2, 3747),
(2, 3748),
(2, 3749),
(2, 3750),
(2, 3751),
(2, 3752);

-- --------------------------------------------------------

--
-- Table structure for table `Search`
--

CREATE TABLE IF NOT EXISTS `Search` (
  `SearchId` int(11) NOT NULL AUTO_INCREMENT,
  `Keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `CreateDate` date NOT NULL,
  PRIMARY KEY (`SearchId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=933 ;

--
-- Dumping data for table `Search`
--

INSERT INTO `Search` (`SearchId`, `Keyword`, `CreateDate`) VALUES
(119, 'szybki kontakt', '2011-01-23'),
(120, 'Ines', '2011-01-23'),
(121, 'Luna', '2011-01-23'),
(122, 'amelia janmare', '2011-01-23'),
(123, 'Luna', '2011-01-27'),
(7, 'armani code', '2010-11-27'),
(8, 'opium', '2010-12-02'),
(9, 'eden', '2010-12-03'),
(124, 'Ines', '2011-01-27'),
(125, 'odzywka do paznokci', '2011-01-27'),
(13, 'kenzo', '2010-12-11'),
(14, 'kenzo', '2010-12-11'),
(185, 'tusz', '2011-02-16'),
(184, 'PROBKI', '2011-02-16'),
(183, 'dior', '2011-02-16'),
(182, 'Giordani Gold', '2011-02-16'),
(181, 'miracle', '2011-02-16'),
(180, 'daisy', '2011-02-15'),
(179, 'marc jacobs', '2011-02-15'),
(178, 'ninarici', '2011-02-15'),
(177, 'perfumy', '2011-02-15'),
(176, 'cacharel', '2011-02-15'),
(175, 'DOLCE GABANE', '2011-02-14'),
(174, 'DOLCE GABANE', '2011-02-14'),
(173, 'sprÄĹźarka', '2011-02-14'),
(172, 'kompresor', '2011-02-14'),
(171, 'gabriela sabatini', '2011-02-14'),
(170, 'ocean sun', '2011-02-14'),
(169, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-02-12'),
(168, 'dior', '2011-02-12'),
(167, 'dune', '2011-02-12'),
(166, 'lancome', '2011-02-12'),
(165, 'guerlain', '2011-02-12'),
(164, 'guerlain', '2011-02-12'),
(163, 'lancome', '2011-02-12'),
(162, 'noa cacharel', '2011-02-11'),
(161, 'revlon colorstay', '2011-02-11'),
(160, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-02-11'),
(159, 'sudocream', '2011-02-11'),
(158, 'christian dior', '2011-02-11'),
(157, 'dior', '2011-02-11'),
(156, 'dior', '2011-02-11'),
(155, 'hipnotik', '2011-02-11'),
(154, 'puder astor', '2011-02-10'),
(153, 'Kredka kosmetyczna do oczu', '2011-02-10'),
(152, 'Kredka kosmetyczna do oczu', '2011-02-10'),
(151, 'kredka do oczu nr 14', '2011-02-10'),
(150, 'Kredka kosmetyczna do oczu', '2011-02-10'),
(149, 'Kredka kosmetyczna do oczu', '2011-02-10'),
(148, 'max mara', '2011-02-10'),
(147, 'max mara', '2011-02-10'),
(146, 'JEAN PAUL GAUTIER', '2011-02-10'),
(145, 'szybki kontakt', '2011-02-08'),
(144, 'tester', '2011-02-08'),
(143, 'prĂłbki', '2011-02-08'),
(142, 'Pierre Arthes', '2011-02-08'),
(141, 'escada', '2011-02-07'),
(140, 'dior', '2011-02-07'),
(139, 'pure poison', '2011-02-07'),
(85, 'escada', '2010-12-18'),
(86, 'calvin klein', '2010-12-18'),
(87, 'calvin klein', '2010-12-18'),
(420, 'chanel chance', '2011-05-09'),
(129, 'emporio', '2011-02-02'),
(421, 'kenzo', '2011-05-09'),
(92, 'L eau par Kenzo Femme', '2010-12-22'),
(138, 'Givenchy Xeryus Rouge', '2011-02-06'),
(96, 'essential', '2011-01-05'),
(97, 'lacoste', '2011-01-05'),
(137, 'Givenchy Xeryus Rouge', '2011-02-06'),
(126, 'rebuild', '2011-01-31'),
(127, 'puma', '2011-02-01'),
(100, 'szminka', '2011-01-07'),
(423, 'promocja', '2011-05-11'),
(422, 'Lanvin ', '2011-05-10'),
(103, 'make up brilance', '2011-01-08'),
(104, 'synergen', '2011-01-08'),
(136, 'givenchy', '2011-02-06'),
(135, 'Maxixe', '2011-02-05'),
(134, 'Pierre Arthes', '2011-02-05'),
(133, 'Pierre Arthes', '2011-02-05'),
(132, 'GUCCI RUSH', '2011-02-04'),
(418, 'Mia tester 10ml', '2011-05-07'),
(419, 'hugo boss pure', '2011-05-09'),
(186, 'd&g', '2011-02-17'),
(187, 'chanel', '2011-02-17'),
(188, 'chanel', '2011-02-17'),
(189, 'Uwodzicielski zapach - Perfumy Luna', '2011-02-17'),
(190, 'barbra', '2011-02-21'),
(191, 'lancome', '2011-02-21'),
(192, 'barbra', '2011-02-22'),
(193, 'SPRAY MAKIJAĹť-UTRWALENIE', '2011-02-23'),
(194, 'chanel', '2011-02-23'),
(195, 'coty', '2011-02-24'),
(196, 'PogrubiajÄcy tusz do rzÄs 300%', '2011-02-24'),
(197, 'dolce', '2011-02-24'),
(198, 'chanel allure vaporisateur', '2011-02-24'),
(199, 'Esencja perfum - Castle Avignon', '2011-02-26'),
(200, 'Esencja perfum - Castle Avignon', '2011-02-26'),
(201, 'Lady Speed Stick', '2011-02-27'),
(202, 'chanell', '2011-02-27'),
(203, 'Lady Speed Stick', '2011-02-27'),
(204, '', '2011-02-28'),
(205, 'barbra', '2011-03-01'),
(206, 'Calvin Klein Euphoria Chanel Codo Mademoiselle Dolce & Gabbana Light Blue Cacharel Amor Givenchy Extravagance D Ama... Calvin Klein In2U Giorgio Armani Code For Women Davidoff Cool Water Giorigi Armani Emprio She 				   Podklady Bourjuois 10 Hour Sleep Ef', '2011-03-02'),
(207, 'perfumy eternity,opium.probki', '2011-03-03'),
(208, 'Cevin Clein', '2011-03-03'),
(209, 'cc', '2011-03-03'),
(210, 'Close2you', '2011-03-03'),
(211, 'bi es', '2011-03-05'),
(212, '    * Ines     * Luna     * Leila     * Mia     * Amelia', '2011-03-05'),
(213, 'Ines tester 10ml', '2011-03-05'),
(214, 'Luna  ', '2011-03-05'),
(215, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-03-05'),
(216, 'leina', '2011-03-05'),
(217, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-03-05'),
(218, 'Leila  tester 10ml', '2011-03-05'),
(219, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-03-05'),
(220, 'Lekki fantazyjny zapach - Perfumy Mia', '2011-03-05'),
(221, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-03-05'),
(222, 'prĂłbki', '2011-03-06'),
(223, 'darmowe', '2011-03-08'),
(224, 'Szampon Syoss profesjonalna pielÄgn. wĹosy suche Ĺamliwe', '2011-03-08'),
(225, 'darmowe', '2011-03-08'),
(226, 'nagel verharder extra sterk', '2011-03-08'),
(227, 'utwardzacz do paznokci Herome extra strong', '2011-03-08'),
(228, 'herome', '2011-03-08'),
(229, 'Perfumy z feromonem Instinct 13ml', '2011-03-09'),
(230, 'moschus', '2011-03-09'),
(231, 'darmowe prĂłbki', '2011-03-09'),
(232, 'darmowe prĂłbki', '2011-03-09'),
(233, 'Ines tester 10ml', '2011-03-09'),
(234, 'darmowe prĂłbki perfum', '2011-03-09'),
(235, 'kontakt', '2011-03-11'),
(236, 'Syoss', '2011-03-11'),
(237, 'probki', '2011-03-11'),
(238, 'prĂłbki', '2011-03-11'),
(239, 'prĂłbki', '2011-03-11'),
(240, 'testery', '2011-03-12'),
(241, 'szybki kontakt', '2011-03-12'),
(242, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-03-13'),
(243, 'probki', '2011-03-13'),
(244, 'prĂłbka', '2011-03-13'),
(245, 'szybki kontakt', '2011-03-13'),
(246, 'Szybki kontakt', '2011-03-13'),
(247, 'PIERRE ARTHES', '2011-03-14'),
(248, 'Ines tester 10ml', '2011-03-14'),
(249, 'boss', '2011-03-14'),
(250, 'leyla', '2011-03-14'),
(251, 'ricci', '2011-03-14'),
(252, '', '2011-03-15'),
(253, '', '2011-03-16'),
(254, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-03-16'),
(255, 'Lekki fantazyjny zapach - Perfumy Mia', '2011-03-16'),
(256, 'Lakier do paznokci', '2011-03-17'),
(257, 'moje konto', '2011-03-17'),
(258, '', '2011-03-18'),
(259, 'WPJ Int.', '2011-03-18'),
(260, 'WPJ Int.', '2011-03-18'),
(261, 'OdĹźywka do paznokci z proteinami jedwabiu', '2011-03-18'),
(262, 'leila', '2011-03-18'),
(263, 'prĂłbki', '2011-03-18'),
(264, 'Colour alike', '2011-03-19'),
(265, 'CK', '2011-03-19'),
(266, 'eternity', '2011-03-19'),
(267, 'darmowe prĂłbki', '2011-03-20'),
(268, 'prĂłbki', '2011-03-21'),
(269, 'prĂłbki', '2011-03-21'),
(270, 'tester perfum', '2011-03-21'),
(271, 'darmowe prĂłbki', '2011-03-21'),
(272, 'prĂłbki', '2011-03-21'),
(273, 'prĂłbki', '2011-03-21'),
(274, 'testery', '2011-03-21'),
(275, 'Leila  tester 10ml', '2011-03-21'),
(276, 'Leila  tester 10ml', '2011-03-21'),
(277, 'cloe2you', '2011-03-21'),
(278, 'prĂłbki', '2011-03-21'),
(279, 'escada', '2011-03-21'),
(280, 'prĂłbki', '2011-03-21'),
(281, '', '2011-03-21'),
(282, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-03-21'),
(283, 'LinnYoung', '2011-03-21'),
(284, 'Ines', '2011-03-22'),
(285, 'Luna', '2011-03-22'),
(286, 'Leila', '2011-03-22'),
(287, 'Mia', '2011-03-22'),
(288, 'Amelia', '2011-03-22'),
(289, '', '2011-03-22'),
(290, 'probki', '2011-03-23'),
(291, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-03-23'),
(292, 'prĂłbki', '2011-03-24'),
(293, '', '2011-03-24'),
(294, 'Krem nawilĹźajÄco-rozĹwietlajÄcy', '2011-03-25'),
(295, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-03-25'),
(296, 'st tropez', '2011-03-26'),
(297, 'Pierre Arthes', '2011-03-26'),
(298, 'amelia', '2011-03-26'),
(299, 'burrbery', '2011-03-27'),
(300, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-03-28'),
(301, '', '2011-03-28'),
(302, '', '2011-03-30'),
(303, 'darmowe prĂłbki', '2011-04-01'),
(304, 'jeanne arthe', '2011-04-02'),
(305, 'jeanne arthes', '2011-04-02'),
(306, 'joe sorrento', '2011-04-02'),
(307, 'joe sorrento', '2011-04-02'),
(308, 'bezpĹatne', '2011-04-02'),
(309, 'probki', '2011-04-03'),
(310, 'revlon', '2011-04-03'),
(311, 'Barbra', '2011-04-04'),
(312, 'noah spo', '2011-04-04'),
(313, 'noah', '2011-04-04'),
(314, 'Mia tester 10ml', '2011-04-04'),
(315, 'Luna tester 10ml', '2011-04-04'),
(316, 'Ines tester 10ml', '2011-04-04'),
(317, 'szybki kontakt', '2011-04-04'),
(318, 'darmowe prĂłbki', '2011-04-04'),
(319, 'Leila  tester 10ml', '2011-04-04'),
(320, 'testery 5x 1ml', '2011-04-04'),
(321, 'testery', '2011-04-04'),
(322, 'barbra', '2011-04-04'),
(323, 'barbra', '2011-04-04'),
(324, 'Barbra', '2011-04-04'),
(325, 'szybki formularz', '2011-04-05'),
(326, 'nuxe', '2011-04-05'),
(327, 'byzance', '2011-04-05'),
(328, 'darmowe', '2011-04-05'),
(329, '', '2011-04-06'),
(330, 'prĂłbki', '2011-04-07'),
(331, '16 testerĂłw', '2011-04-07'),
(332, 'Zestaw testerĂłw Quattro elementi - 16x1,5ml', '2011-04-07'),
(333, 'Zestaw testerĂłw Quattro elementi - 16x1,5ml', '2011-04-07'),
(334, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-04-08'),
(335, 'leila', '2011-04-08'),
(336, 'Luna tester 10ml', '2011-04-08'),
(337, 'lacosta', '2011-04-08'),
(338, 'testery', '2011-04-08'),
(339, 'prĂłbki', '2011-04-08'),
(340, 'Mia tester 10ml', '2011-04-08'),
(341, 'Leila', '2011-04-08'),
(342, 'Mia', '2011-04-08'),
(343, 'Mia', '2011-04-08'),
(344, 'szybki kontakt', '2011-04-08'),
(345, 'szybki kontakt', '2011-04-08'),
(346, 'lacosta', '2011-04-08'),
(347, 'Zestaw testerĂłw Quattro elementi - 16x1,5ml', '2011-04-08'),
(348, 'Zestaw testerĂłw Quattro elementi - 16x1,5ml', '2011-04-08'),
(349, 'noan sport', '2011-04-09'),
(350, 'noah sport', '2011-04-09'),
(351, 'noah', '2011-04-09'),
(352, 'noah', '2011-04-09'),
(353, 'noah', '2011-04-09'),
(354, 'dior', '2011-04-09'),
(355, 'tester', '2011-04-10'),
(356, 'Szybki kontakt', '2011-04-10'),
(357, 'Szybki kontakt', '2011-04-10'),
(358, 'maybelline', '2011-04-10'),
(359, 'Preparat utwardzajÄcy i wzmacniajÄcy paznokcie.', '2011-04-10'),
(360, 'Szybki kontakt', '2011-04-10'),
(361, 'prĂłbki darmowe', '2011-04-11'),
(362, 'Zestaw testerĂłw Close2you - 7x10ml', '2011-04-12'),
(363, 'zestaw testerow close2you 5zapachĂłw', '2011-04-12'),
(364, 'testery', '2011-04-12'),
(365, 'Lakiery do paznokci', '2011-04-12'),
(366, 'darmowe prĂłbki', '2011-04-13'),
(367, 'darmowe prĂłbki', '2011-04-13'),
(368, 'szpilki 1ml', '2011-04-13'),
(369, 'zestaw testerow za darmo', '2011-04-14'),
(370, 'szp', '2011-04-15'),
(371, '', '2011-04-17'),
(372, '', '2011-04-17'),
(373, 'konkurs', '2011-04-17'),
(374, 'konkurs', '2011-04-18'),
(375, 'prĂłbka', '2011-04-18'),
(376, 'kod', '2011-04-18'),
(377, 'kod', '2011-04-18'),
(378, 'kod', '2011-04-18'),
(379, 'kod', '2011-04-18'),
(380, 'kod', '2011-04-18'),
(381, 'kody promocyjne', '2011-04-18'),
(382, 'Zestaw testerĂłw Close2you - 7x10ml', '2011-04-19'),
(383, 'darmowe prĂłbki perfum', '2011-04-19'),
(384, 'Ra1303141', '2011-04-19'),
(385, 'Lakier do paznokci Colour Alike  - Nail Colour', '2011-04-19'),
(386, 'prĂłbki', '2011-04-20'),
(387, '', '2011-04-20'),
(388, 'darmo tester', '2011-04-20'),
(389, 'RA1803335', '2011-04-20'),
(390, 'mirry', '2011-04-21'),
(391, 'luna', '2011-04-21'),
(392, 'isemija', '2011-04-21'),
(393, 'Esencja perfum - Touch of Barbados', '2011-04-22'),
(394, 'Barbra', '2011-04-22'),
(395, 'darmowe prĂłbki', '2011-04-22'),
(396, 'testery', '2011-04-22'),
(397, 'prĂłbki', '2011-04-26'),
(398, 'prĂłbki', '2011-04-26'),
(399, 'darmowy tester', '2011-04-27'),
(400, 'tester', '2011-04-27'),
(401, 'BezpĹatne testery perfum', '2011-04-27'),
(402, 'prĂłbki darmowe', '2011-04-27'),
(403, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-04-28'),
(404, 'Luna tester 10ml', '2011-04-28'),
(405, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-04-28'),
(406, 'Amelia tester 10ml', '2011-04-28'),
(407, 'Tusz do rzÄs pogrubiajÄco - wydĹuĹźajÄcy XXL', '2011-04-28'),
(408, 'colourlike', '2011-04-28'),
(409, 'Tusz wydĹuĹźajÄcy  - wodoodporny', '2011-04-28'),
(410, '', '2011-05-01'),
(411, 'sally hansen', '2011-05-01'),
(412, 'COLOUR ALIKE 450', '2011-05-02'),
(413, 'BARBRA', '2011-05-02'),
(414, 'tom tailor', '2011-05-03'),
(415, 'OdĹźywka do paznokci z proteinami jedwabiu', '2011-05-05'),
(416, 'prĂłbki', '2011-05-05'),
(417, 'prĂłbki', '2011-05-06'),
(424, 'colour alike', '2011-05-11'),
(425, 'bezpĹanne probki', '2011-05-11'),
(426, 'darmowe prĂłbki', '2011-05-11'),
(427, 'dezodoranty', '2011-05-11'),
(428, 'Close2you', '2011-05-11'),
(429, 'testery 1ml', '2011-05-11'),
(430, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-05-12'),
(431, 'Leila  tester 10ml', '2011-05-12'),
(432, 'bezbĹatne', '2011-05-12'),
(433, 'darmowe prĂłbki', '2011-05-12'),
(434, 'Szybki kontakt', '2011-05-12'),
(435, 'bezpĹatne perfumy', '2011-05-12'),
(436, 'Szybki kontakt', '2011-05-13'),
(437, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-13'),
(438, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-13'),
(439, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-13'),
(440, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-05-13'),
(441, 'prĂłbki'' perfum', '2011-05-14'),
(442, 'szpilka za darmo close2you', '2011-05-14'),
(443, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-05-14'),
(444, 'prĂłbki', '2011-05-14'),
(445, 'Zestaw testerĂłw Close2you - 7x10ml', '2011-05-15'),
(446, 'darmowe prĂłbki', '2011-05-15'),
(447, '', '2011-05-15'),
(448, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-15'),
(449, 'prĂłbki ', '2011-05-16'),
(450, 'Pierre Arthes', '2011-05-16'),
(451, 'Pierre Arthes', '2011-05-16'),
(452, 'prĂłbki', '2011-05-16'),
(453, 'BezpĹatne testery perfum - sprawdz nasze zapachy', '2011-05-17'),
(454, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-05-18'),
(455, 'Amelia tester 10ml', '2011-05-18'),
(456, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-05-18'),
(457, 'Barbra', '2011-05-18'),
(458, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-18'),
(459, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-19'),
(460, '7x1ml', '2011-05-20'),
(461, 'Zestaw testerĂłw Close2you - 7x10ml', '2011-05-20'),
(462, 'ines', '2011-05-20'),
(463, 'ines', '2011-05-20'),
(464, 'ĐąĐľŃĐżĐťĐ°ŃĐ˝Đž', '2011-05-21'),
(465, '', '2011-05-22'),
(466, 'darmowe testery', '2011-05-22'),
(467, 'darmowe produkty', '2011-05-23'),
(468, 'Kwiatwy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-05-23'),
(469, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-23'),
(470, 'Krem do rÄk  Dove Intensive Cream', '2011-05-23'),
(471, 'KuszÄce perfumy Diavolo', '2011-05-23'),
(472, 'DOVE', '2011-05-23'),
(473, 'LOREAL', '2011-05-23'),
(474, 'SORAYA', '2011-05-23'),
(475, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-24'),
(476, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-24'),
(477, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-24'),
(478, 'EnergetyzujÄce perfumy Potere Rosso', '2011-05-24'),
(479, '', '2011-05-26'),
(480, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-26'),
(481, '', '2011-05-26'),
(482, 'colour alike', '2011-05-27'),
(483, 'prĂłbki]', '2011-05-27'),
(484, 'Noah Sport tester 10ml men', '2011-05-29'),
(485, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-05-29'),
(486, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-29'),
(487, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-05-29'),
(488, 'Lekki fantazyjny zapach - Perfumy Mia', '2011-05-29'),
(489, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-05-29'),
(490, 'Lekki fantazyjny zapach - Perfumy Mia', '2011-05-29'),
(491, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-30'),
(492, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-05-31'),
(493, 'CA', '2011-05-31'),
(494, 'Pierre Arthes', '2011-05-31'),
(495, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-05-31'),
(496, 'play', '2011-05-31'),
(497, 'play', '2011-05-31'),
(498, 'davidoff', '2011-06-01'),
(499, 'Luna tester 10ml', '2011-06-01'),
(500, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-06-01'),
(501, 'darmowe testery', '2011-06-01'),
(502, 'testery', '2011-06-01'),
(503, 'MIA', '2011-06-01'),
(504, 'prĂłbki za darmo', '2011-06-01'),
(505, 'za darmo', '2011-06-01'),
(506, 'Quattro Elementi', '2011-06-02'),
(507, 'prĂłbki', '2011-06-02'),
(508, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-06-02'),
(509, 'Ines tester 10ml', '2011-06-03'),
(510, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-06-03'),
(511, 'Szybki kontakt', '2011-06-03'),
(512, '', '2011-06-03'),
(513, 'http://www.close2you.pl/wyniki_wyszukiwania.html', '2011-06-03'),
(514, 'Szybki kontakt', '2011-06-03'),
(515, 'Ines tester 10ml', '2011-06-03'),
(516, 'Leila  tester 10ml', '2011-06-03'),
(517, 'Luna tester 10ml', '2011-06-03'),
(518, 'Leila  tester 10ml', '2011-06-03'),
(519, 'Ines tester 10ml', '2011-06-03'),
(520, 'Joopi tani i dobry lakier do zdobienia paznokci', '2011-06-05'),
(521, 'noah ines', '2011-06-05'),
(522, 'noah ines', '2011-06-05'),
(523, 'noah leila', '2011-06-05'),
(524, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-06-05'),
(525, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-06-05'),
(526, 'Ines tester 10ml', '2011-06-06'),
(527, 'prĂłbka', '2011-06-06'),
(528, 'lakier pÄkajÄcy', '2011-06-06'),
(529, 'cracking nail', '2011-06-06'),
(530, 'pÄkajÄcy lakier', '2011-06-07'),
(531, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-06-07'),
(532, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-06-07'),
(533, 'Uwodzicielski zmysĹowy zapach - Perfumy Luna', '2011-06-07'),
(534, 'OdĹźywka do paznokci z proteinami jedwabiu', '2011-06-07'),
(535, 'OdĹźywka do paznokci z proteinami jedwabiu', '2011-06-08'),
(536, 'prĂłbki', '2011-06-08'),
(537, 'szybki kontakt', '2011-06-08'),
(538, 'mia', '2011-06-08'),
(539, 'Leila  tester 10ml', '2011-06-09'),
(540, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-06-09'),
(541, 'darmowe prĂłbki', '2011-06-09'),
(542, 'szbki kontakt', '2011-06-10'),
(543, 'Lekki fantazyjny zapach - Perfumy Mia', '2011-06-11'),
(544, '', '2011-06-12'),
(545, '', '2011-06-12'),
(546, 'Lekki fantazyjny zapach - Perfumy Mia', '2011-06-13'),
(547, 'podkĹad', '2011-06-14'),
(548, 'Noah', '2011-06-15'),
(549, 'Zestaw testerĂłw Close2you - 7x10ml', '2011-06-16'),
(550, 'darmowe testery', '2011-06-16'),
(551, 'Barbra', '2011-06-16'),
(552, 'Luna tester 10ml', '2011-06-16'),
(553, 'darmow peĂłbki perfum', '2011-06-16'),
(554, 'koszulka kibica', '2011-06-16'),
(555, 'lafel', '2011-06-16'),
(556, 'koszulki', '2011-06-16'),
(557, 'prĂłbki', '2011-06-17'),
(558, 'prĂłbki', '2011-06-17'),
(559, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-06-20'),
(560, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-06-23'),
(561, 'Kwiatowy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-06-23'),
(562, 'u6i8tti8u8itk5', '2011-06-24'),
(563, 'rexona', '2011-06-24'),
(564, 'faux', '2011-06-25'),
(565, 'Lakiery do paznokci - kolory specjalne', '2011-06-25'),
(566, 'Testery 1ml - ''szpilka'' ', '2011-06-25'),
(567, 'Leila  tester 10ml', '2011-06-25'),
(568, 'Ines tester 10ml', '2011-06-25'),
(569, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-06-25'),
(570, 'darmowe testery', '2011-06-27'),
(571, 'givenchy play intense', '2011-06-27'),
(572, 'faux', '2011-06-27'),
(573, 'pierre', '2011-06-27'),
(574, 'volume', '2011-06-27'),
(575, 'Pierre Arthes', '2011-06-27'),
(576, 'vipera', '2011-06-27'),
(577, 'kredka', '2011-06-27'),
(578, 'do brwi', '2011-06-27'),
(579, 'korektor', '2011-06-27'),
(580, 'Bezzapachowe perfumy z feromonem Pure 50ml', '2011-06-27'),
(581, 'armani', '2011-06-27'),
(582, ' DARMOWA WYSYĹKA', '2011-06-27'),
(583, 'darmowe probki ', '2011-06-28'),
(584, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-06-28'),
(585, 'Esencja perfum -  Santorini', '2011-06-28'),
(586, 'prĂłbki', '2011-06-29'),
(587, 'yves saint laurent', '2011-06-29'),
(588, 'elle', '2011-06-29'),
(589, 'kenzo', '2011-06-30'),
(590, 'attitude', '2011-06-30'),
(591, 'armani', '2011-06-30'),
(592, 'OdĹźywka do wĹosĂłw Ĺamliwych, bez poĹysku', '2011-07-01'),
(593, 'darmowe prĂłbki', '2011-07-01'),
(594, 'szynko kontakt', '2011-07-01'),
(595, 'Esencja perfum -  Santorini', '2011-07-01'),
(596, 'lacoste', '2011-07-01'),
(597, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-01'),
(598, 'bezpĹatna wysyĹak testerĂłw', '2011-07-01'),
(599, 'darmowe prĂłbki', '2011-07-01'),
(600, 'darmowe', '2011-07-01'),
(601, 'luna', '2011-07-01'),
(602, 'probki', '2011-07-01'),
(603, '', '2011-07-01'),
(604, 'darmowe prĂłbki', '2011-07-01'),
(605, 'darmowe prĂłbki', '2011-07-01'),
(606, 'amelia', '2011-07-01'),
(607, 'Szybki kontakt', '2011-07-02'),
(608, 'darmowe produkty', '2011-07-02'),
(609, 'OdĹźywka do paznokci z ceramidami', '2011-07-02'),
(610, 'TESTERY', '2011-07-02'),
(611, 'darmowe probki perfum', '2011-07-02'),
(612, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-02'),
(613, 'OrzeĹşwiajÄcy zapach mÄski - Perfumy Noah Sport', '2011-07-02'),
(614, 'Amelia tester 10ml', '2011-07-02'),
(615, 'Kwiatowy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-07-02'),
(616, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-02'),
(617, 'testery', '2011-07-02'),
(618, 'tester', '2011-07-02'),
(619, 'szybki kontakt', '2011-07-03'),
(620, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-03'),
(621, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-03'),
(622, 'probki', '2011-07-03'),
(623, 'Noah Sport tester 10ml men', '2011-07-03'),
(624, 'Szminka do ust - Colour Alike', '2011-07-03'),
(625, 'darmowe prĂłbki', '2011-07-03'),
(626, 'testery', '2011-07-03'),
(627, 'szybki kontakt', '2011-07-03'),
(628, 'darmowe prĂłbki', '2011-07-03'),
(629, 'prĂłbki perfum', '2011-07-04'),
(630, 'Zestaw testerĂłw Close2you - 7x10ml', '2011-07-04'),
(631, 'Ines tester 10ml', '2011-07-04'),
(632, 'Noah Sport tester 10ml men', '2011-07-04'),
(633, 'Mia tester 10ml', '2011-07-04'),
(634, 'Drogeria Close2you', '2011-07-04'),
(635, 'Tonik do zmywania paznokci.', '2011-07-04'),
(636, 'Dove', '2011-07-04'),
(637, 'Tonik do zmywania paznokci.', '2011-07-04'),
(638, 'Garnier', '2011-07-04'),
(639, 'Garnier', '2011-07-04'),
(640, 'Pierre Arthes', '2011-07-04'),
(641, 'aqua di gioia', '2011-07-04'),
(642, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-04'),
(643, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-04'),
(644, 'prĂłbki', '2011-07-04'),
(645, 'signature', '2011-07-04'),
(646, 'kontakt', '2011-07-04'),
(647, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-04'),
(648, 'testery bez platne', '2011-07-04'),
(649, 'prĂłbki', '2011-07-04'),
(650, 'prĂłbki', '2011-07-05'),
(651, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-05'),
(652, 'INES', '2011-07-05'),
(653, 'prĂłbki', '2011-07-05'),
(654, 'prĂłbki', '2011-07-05'),
(655, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-05'),
(656, 'prĂłbki', '2011-07-05'),
(657, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-05'),
(658, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-05'),
(659, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-05'),
(660, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-05'),
(661, 'tester', '2011-07-05'),
(662, 'kate moss', '2011-07-06'),
(663, 'kate moss', '2011-07-06'),
(664, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-06'),
(665, 'prĂłbki', '2011-07-06'),
(666, 'paco rabanne', '2011-07-06'),
(667, 'BĹyszczyk Lip Supreme XXL - zmieĹ wyglÄd Twoich ust', '2011-07-06'),
(668, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-07-06'),
(669, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-06'),
(670, 'OrzeĹşwiajÄcy zapach mÄski - Perfumy Noah Sport', '2011-07-07'),
(671, '', '2011-07-07'),
(672, 'Za darmo', '2011-07-07'),
(673, '', '2011-07-07'),
(674, 'szybki kontakt', '2011-07-07'),
(675, 'szybki kontakt', '2011-07-07'),
(676, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-07'),
(677, 'szybki kontakt', '2011-07-07'),
(678, 'prĂłbki', '2011-07-07'),
(679, '', '2011-07-08'),
(680, 'lakiery do paznokci', '2011-07-08'),
(681, 'darmowe prĂłbki', '2011-07-08'),
(682, 'bezpĹatne testery', '2011-07-08'),
(683, 'za darmo', '2011-07-08'),
(684, 'kontakt', '2011-07-08'),
(685, 'darmowe prubki', '2011-07-09'),
(686, 'darmowe', '2011-07-09'),
(687, 'darmowe prubki perfum', '2011-07-09'),
(688, 'darmowe probki', '2011-07-10'),
(689, 'Ines tester 10ml', '2011-07-10'),
(690, 'Kwiatowy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-07-10'),
(691, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-10'),
(692, 'darmowe testery', '2011-07-10'),
(693, 'darmowe', '2011-07-10'),
(694, 'darmowe probki', '2011-07-10'),
(695, 'dolce', '2011-07-11'),
(696, 'adidas', '2011-07-11'),
(697, 'laurent', '2011-07-11'),
(698, 'prĂłbki', '2011-07-12'),
(699, 'prĂłbki', '2011-07-12'),
(700, 'PrĂłbka', '2011-07-12'),
(701, 'Noah Sport tester 10ml men', '2011-07-12'),
(702, 'EnergetyzujÄce perfumy Potere Rosso', '2011-07-12'),
(703, 'TrwaĹe perfumy Liberta', '2011-07-12'),
(704, 'KuszÄce perfumy Diavolo', '2011-07-12'),
(705, 'Esencja perfum -  Santorini', '2011-07-13'),
(706, 'ultraviolet', '2011-07-15'),
(707, 'joopi', '2011-07-15'),
(708, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-16'),
(709, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-17'),
(710, 'Kwiatowy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-07-17'),
(711, '', '2011-07-18'),
(712, 'Mia tester 10ml', '2011-07-18'),
(713, 'Leila  tester 10ml', '2011-07-18'),
(714, 'Leila  tester 10ml', '2011-07-18'),
(715, 'lacoste', '2011-07-18'),
(716, '', '2011-07-18'),
(717, '212', '2011-07-18'),
(718, 'testery', '2011-07-18'),
(719, 'OdĹźywka do paznokci z ekstraktem z koralowca i krzemem', '2011-07-19'),
(720, '212', '2011-07-19'),
(721, 'Preparat  do paznokci podatnych na pÄkanie.', '2011-07-19'),
(722, 'Close2you, Pierre Arthes', '2011-07-19'),
(723, 'ciepĹy korzenny zapach', '2011-07-19'),
(724, 'lakier do wlosĂłw', '2011-07-20'),
(725, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-21'),
(726, 'Ines, Luna, Leila, Mia, Amelia', '2011-07-21'),
(727, 'ziaja sopot spa', '2011-07-22'),
(728, 'Sopot  Spa  - Peeling  myjÄcy z mikroglanulkami', '2011-07-22'),
(729, 'podkĹad', '2011-07-22'),
(730, 'Agropharm Oeparol SCC', '2011-07-22'),
(731, 'grande albero', '2011-07-22'),
(732, 'insesis', '2011-07-22'),
(733, 'inesis', '2011-07-22'),
(734, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-22'),
(735, 'Noah pour homme', '2011-07-22'),
(736, 'Perfumy z feromonem Instinct 13ml - men', '2011-07-22'),
(737, 'Perfumy z feromonem Instinct 13ml - men', '2011-07-22'),
(738, 'davidoff', '2011-07-24'),
(739, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-24'),
(740, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-24'),
(741, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-25'),
(742, 'Luna tester 10ml', '2011-07-25'),
(743, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-25'),
(744, 'OrzeĹşwiajÄcy zapach mÄski - Perfumy Noah Sport', '2011-07-25'),
(745, 'Klasyczny zapach mÄski - Pefumy Noah', '2011-07-25'),
(746, 'OrzeĹşwiajÄcy zapach mÄski - Perfumy Noah Sport', '2011-07-25'),
(747, 'Kwiatowy orzeĹşwiajacy zapach - Perfumy Amelia', '2011-07-25'),
(748, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-25'),
(749, 'Subtelny, kobiecy zapach - Perfumy Leila', '2011-07-25'),
(750, 'leila', '2011-07-25'),
(751, 'PielÄgnacyjny Ĺźel pod prysznic - Mleczko Bambusowe', '2011-07-26'),
(752, 'Lakiery do paznokci - kolory specjalne', '2011-07-26'),
(753, 'Pierre Arthes', '2011-07-26'),
(754, 'probki', '2011-07-27'),
(755, 'hever leger', '2011-07-27'),
(756, 'klain', '2011-07-27'),
(757, 'JADORE', '2011-07-27'),
(758, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-28'),
(759, 'michael kors', '2011-07-28'),
(760, 'lalique', '2011-07-28'),
(761, 'lalique', '2011-07-28'),
(762, 'lalique', '2011-07-28'),
(763, 'michael kors', '2011-07-28'),
(764, 'Lekki fantazyjny zapach na lato - Perfumy Mia', '2011-07-28'),
(765, 'testery', '2011-07-28'),
(766, 'spazio', '2011-07-29'),
(767, 'teranera', '2011-07-29'),
(768, 'terra nera', '2011-07-29'),
(769, 'Perfumy Luna - Uwodzicielskie i zmysĹowe', '2011-07-29'),
(770, 'CLINIQUE EVEN BETTER', '2011-07-29'),
(771, 'ĹwieĹźy orientalny zapach - Perfumy  Ines', '2011-07-31'),
(772, '', '2012-04-11'),
(773, '', '2012-11-11'),
(774, '', '2012-11-14'),
(775, '', '2012-11-23'),
(776, '', '2012-11-23'),
(777, '', '2012-11-26'),
(778, '', '2012-11-26'),
(779, '', '2012-11-28'),
(780, '', '2012-11-28'),
(781, '', '2012-11-28'),
(782, '', '2012-11-30'),
(783, '', '2012-12-01'),
(784, '', '2012-12-01'),
(785, '', '2012-12-01'),
(786, '', '2012-12-01'),
(787, '', '2012-12-01'),
(788, '', '2012-12-01'),
(789, '', '2012-12-01'),
(790, '', '2012-12-01'),
(791, '', '2012-12-03'),
(792, '', '2012-12-03'),
(793, '', '2013-07-07'),
(794, '', '2013-07-07'),
(795, '', '2013-07-07'),
(796, '', '2013-07-07'),
(797, '', '2013-10-10'),
(798, '', '2013-10-24'),
(799, '', '2013-10-24'),
(800, '', '2014-01-10'),
(801, '', '2014-01-11'),
(802, '', '2014-01-11'),
(803, '', '2014-01-11'),
(804, '', '2014-01-11'),
(805, '', '2014-01-17'),
(806, '', '2014-01-17'),
(807, '', '2014-01-17'),
(808, '', '2014-01-17'),
(809, '', '2014-01-26'),
(810, '', '2014-01-26'),
(811, '', '2014-02-08'),
(812, '', '2014-02-10'),
(813, '', '2014-02-14'),
(814, '', '2014-02-17'),
(815, '', '2014-02-18'),
(816, '', '2014-03-01'),
(817, '', '2014-03-03'),
(818, '', '2014-03-04'),
(819, '', '2014-03-04'),
(820, '', '2014-03-05'),
(821, '', '2014-03-09'),
(822, '', '2014-03-12'),
(823, '', '2014-03-12'),
(824, '', '2014-03-23'),
(825, '', '2014-03-27'),
(826, '', '2014-04-05'),
(827, '', '2014-04-05'),
(828, '', '2014-04-05'),
(829, '', '2014-04-05'),
(830, '', '2014-04-05'),
(831, '', '2014-04-05'),
(832, '', '2014-04-06'),
(833, '', '2014-04-06'),
(834, '', '2014-04-06'),
(835, '', '2014-04-06'),
(836, '', '2014-04-07'),
(837, '', '2014-04-08'),
(838, '', '2014-04-13'),
(839, '', '2014-04-13'),
(840, '', '2014-04-13'),
(841, '', '2014-04-13'),
(842, '', '2014-04-13'),
(843, '', '2014-04-13'),
(844, '', '2014-04-16'),
(845, '', '2014-04-17'),
(846, '', '2014-04-18'),
(847, '', '2014-04-23'),
(848, '', '2014-04-26'),
(849, '', '2014-04-26'),
(850, '', '2014-04-27'),
(851, '', '2014-04-27'),
(852, '', '2014-04-27'),
(853, '', '2014-04-27'),
(854, '', '2014-04-27'),
(855, '', '2014-04-27'),
(856, '', '2014-04-27'),
(857, '', '2014-04-27'),
(858, '', '2014-04-28'),
(859, '', '2014-05-03'),
(860, '', '2014-05-03'),
(861, '', '2014-05-10'),
(862, '', '2014-05-11'),
(863, '', '2014-05-11'),
(864, '', '2014-05-11'),
(865, '', '2014-05-18'),
(866, '', '2014-05-21'),
(867, '', '2014-06-14'),
(868, '', '2014-06-14'),
(869, '', '2014-06-20'),
(870, '', '2014-06-21'),
(871, '', '2014-06-23'),
(872, '', '2014-06-23'),
(873, '', '2014-07-02'),
(874, '', '2014-07-03'),
(875, '', '2014-07-03'),
(876, '', '2014-07-03'),
(877, '', '2014-07-09'),
(878, '', '2014-07-15'),
(879, '', '2014-07-17'),
(880, '', '2014-07-21'),
(881, '', '2014-07-23'),
(882, '', '2014-07-23'),
(883, '', '2014-07-23'),
(884, '', '2014-07-27'),
(885, '', '2014-07-28'),
(886, '', '2014-08-01'),
(887, '', '2014-08-01'),
(888, '', '2014-08-02'),
(889, '', '2014-08-03'),
(890, '', '2014-08-05'),
(891, '', '2014-08-05'),
(892, '', '2014-08-05'),
(893, '', '2014-08-05'),
(894, '', '2014-08-05'),
(895, '', '2014-08-10'),
(896, '', '2014-08-10'),
(897, '', '2014-08-10'),
(898, '', '2014-08-10'),
(899, '', '2014-08-14'),
(900, '', '2014-08-14'),
(901, '', '2014-08-14'),
(902, '', '2014-08-14'),
(903, '', '2014-08-15'),
(904, '', '2014-08-15'),
(905, '', '2014-08-18'),
(906, '', '2014-09-11'),
(907, '', '2014-09-11'),
(908, '', '2014-09-13'),
(909, '', '2014-09-13'),
(910, '', '2014-09-13'),
(911, '', '2014-09-16'),
(912, '', '2014-09-22'),
(913, '', '2014-09-24'),
(914, '', '2014-09-24'),
(915, '', '2014-09-24'),
(916, '', '2014-09-25'),
(917, '', '2014-09-27'),
(918, '', '2014-09-27'),
(919, '', '2014-09-27'),
(920, '', '2014-09-30'),
(921, '', '2014-10-06'),
(922, '', '2014-10-06'),
(923, '', '2014-10-07'),
(924, '', '2014-10-10'),
(925, '', '2014-10-10'),
(926, '', '2014-10-24'),
(927, '', '2014-10-26'),
(928, '', '2014-10-28'),
(929, '', '2014-10-28'),
(930, '', '2014-10-28'),
(931, '', '2014-10-28'),
(932, '', '2014-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `Sigma`
--

CREATE TABLE IF NOT EXISTS `Sigma` (
  `SigmaId` int(11) NOT NULL AUTO_INCREMENT,
  `DeltaId` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) NOT NULL,
  `Keyword` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EventDate` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `EventCalendar` date NOT NULL,
  `ShortDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `LongDescription` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `ImgDriveName` varchar(40) NOT NULL DEFAULT '0',
  `ImgFileName` varchar(40) NOT NULL DEFAULT '0',
  `PictureDescSmall` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `SigmaOrder` int(11) NOT NULL,
  PRIMARY KEY (`SigmaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `Sigma`
--

INSERT INTO `Sigma` (`SigmaId`, `DeltaId`, `Name`, `SeoName`, `Keyword`, `Description`, `EventDate`, `EventCalendar`, `ShortDescription`, `LongDescription`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `PictureDescSmall`, `Status`, `SigmaOrder`) VALUES
(47, 1, 'FiscalitĂŠ : FranĂ§ois Hollande douche les espoirs des chefs d&#039;entreprises', 'fiscalite-francois-hollande-douche-les-espoirs-des-chefs-dentreprises', 'Par Fabien Piliu', '1', '07/09/2015', '0000-00-00', 'Si les organisations patronales espĂŠraient un dernier geste fiscal en faveur des entreprises avant la fin du quinquennat, elles en ont ĂŠtĂŠ pour leurs frais. Les allĂ¨gements d&#039;impĂ´ts promis par le chef de l&#039;Etat ne concerneront que les mĂŠnages.', '&lt;/br&gt;\r\n&lt;p align=&quot;center&quot;&gt;&lt;img src=&quot;http://grandeconsultation.fr/Documents/Articles/une-solution-en-syrie-suppose-de-neutraliser-assasd-dit-hollande.jpg&quot; height=&quot;300&quot;/&gt;&lt;/p&gt;\r\n&lt;figcaption align=&quot;center&quot;&gt;(CrĂŠdits photo : ÂŠ Philippe Wojazer / Reuters)&lt;/figcaption&gt;\r\n&lt;/br&gt;\r\n&lt;p align=&quot;justify&quot;&gt;&lt;strong&gt;Si les organisations patronales espĂŠraient un dernier geste fiscal en faveur des entreprises avant la fin du quinquennat, elles en ont ĂŠtĂŠ pour leurs frais. Les allĂ¨gements d&#039;impĂ´ts promis par le chef de l&#039;Etat ne concerneront que les mĂŠnages. En revanche, le patronat a eu la confirmation que le code du travail serait rendu plus lisible.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/br&gt;\r\n&lt;p align=&quot;justify&quot;&gt;Pas un sou de plus ! A un an et demi de la prochaine ĂŠlection prĂŠsidentielle, les entreprises ne profiteront plus des largesses fiscales de l&#039;Etat. C&#039;est trĂ¨s clairement le signal donnĂŠ par FranĂ§ois Hollande lors de la sixiĂ¨me confĂŠrence de presse organisĂŠe depuis le dĂŠbut de son quinquennat. DĂŠjĂ  annoncĂŠs, les allĂ¨gements d&#039;impĂ´ts ne concerneront que les mĂŠnages, et en particulier les plus modestes d&#039;entre eux. Au total, selon les estimations, ce sont 8 millions de contribuables qui devraient en bĂŠnĂŠficier l&#039;annĂŠe prochaine. On en saura plus lors de la prĂŠsentation du projet de loi de finances 2016 prĂŠvue Ă  la fin du mois.&lt;/p&gt;\r\n&lt;/br&gt;\r\n&lt;h3&gt;Une facture IS en baisse grĂ˘ce au crĂŠdit d&#039;impĂ´t pour la compĂŠtitivitĂŠ et l&#039;emploi&lt;/h3&gt;\r\n&lt;p align=&quot;justify&quot;&gt;Dans le domaine fiscal, les entreprises, en revanche, ont ĂŠtĂŠ ignorĂŠes. Si certaines organisations patronales rĂŞvaient d&#039;une baisse de l&#039;impĂ´t sur les sociĂŠtĂŠs (IS) dĂ¨s 2016, soit un an avant celle d&#039;ores et dĂŠjĂ  programmĂŠe, elles ont ĂŠtĂŠ dĂŠĂ§ues. AprĂ¨s celles intĂŠgrĂŠes dans le Pacte de compĂŠtitivitĂŠ parmi lesquelles le crĂŠdit d&#039;impĂ´t pour la compĂŠtitivitĂŠ et l&#039;emploi (CICE) qui permet justement aux entreprises de rĂŠduire leur IS, les entreprises devront se contenter des mesures contenues dans le Pacte de responsabilitĂŠ. Se contenter ?&lt;/p&gt;\r\n&lt;p align=&quot;justify&quot;&gt;Ces derniers mois, l&#039;exĂŠcutif n&#039;a pas vraiment dĂŠlaissĂŠ les entreprises. Au total, le Pacte de responsabilitĂŠ concentre une sĂŠrie de mesures qui, selon les calculs du gouvernement, permettront de rĂŠduire de 41 milliards d&#039;euros d&#039;ici 2017 le poids de la pression fiscale et rĂŠglementaire pesant sur les entreprises, dĂŠclenchant l&#039;ire de l&#039;aile gauche de la majoritĂŠ qui s&#039;est empressĂŠe de dĂŠnoncer ce qu&#039;elle considĂ¨re comme des cadeaux faits au patronat. Parmi les mesures phares dĂŠcidĂŠes par l&#039;exĂŠcutif, citons notamment des allĂ¨gements de cotisations et une simplification administrative. Il comprend ĂŠgalement une suppression en 2016 de la contribution exceptionnelle Ă  l&#039;IS acquittĂŠ par les entreprises rĂŠalisant plus de 250 millions d&#039;euros, dont le taux ĂŠtait passĂŠ de 5% Ă  10,7% en 2013, et de la C3S en 2017. A ce Pacte s&#039;ajoute ĂŠgalement la mesure de suramortissement intĂŠgrĂŠe Ă  la loi sur la croissance et l&#039;activitĂŠ, dite loi Macron.&lt;/p&gt;\r\n&lt;/br&gt;\r\n&lt;h3&gt;Se saisir des opportunitĂŠs offertes par le numĂŠrique&lt;/h3&gt;\r\n&lt;p align=&quot;justify&quot;&gt;Si les entreprises ne bĂŠnĂŠficieront pas de nouveaux cadeaux dans le domaine de la fiscalitĂŠ, elles n&#039;ont pas ĂŠtĂŠ pour autant  ignorĂŠes par le chef de l&#039;Etat. Loin s&#039;en faut. FranĂ§ois Hollande a en effet confirmĂŠ que le code du travail serait rendu plus lisible, via une place accrue accordĂŠe aux accords d&#039;entreprise. Au grand bonheur des organisations patronales.\r\n\r\nIl a ĂŠgalement indiquĂŠ que le ministre de l&#039;Economie, Emmanuel Macron, allait prĂŠparer une loi permettant Ă  l&#039;ĂŠconomie franĂ§aise de se saisir &quot; pleinement &quot; des opportunitĂŠs offertes par le dĂŠveloppement du numĂŠrique.\r\n\r\nSelon le chef de l&#039;Etat, l&#039;ensemble de ces actions, conjuguĂŠes Ă  la reprise en cours, serait suffisant pour restaurer la confiance des chefs d&#039;entreprise, confiance sans laquelle aucune amĂŠlioration sur le front de l&#039;emploi n&#039;est possible.&lt;/p&gt;\r\n&lt;/br&gt;\r\n&lt;p&gt;Retrouvez cet article sur &lt;a class=&quot;external&quot; href=&quot;http://www.latribune.fr/economie/france/fiscalite-francois-hollande-douche-les-espoirs-des-chefs-d-entreprises-503088.html&quot; target=_blank&gt;La Tribune&lt;/a&gt;&lt;/p&gt;\r\n&lt;/br&gt;\r\n&lt;p&gt;(CrĂŠdits photo : ÂŠ Philippe Wojazer / Reuters)\r\n&lt;/br&gt;&lt;/br&gt;', '2015-09-07', 'f3e40ed1f89fc7cac6b50166c4ac1b76.jpg', '0', '', 0, 1),
(56, 1, 'ÂŤ Vous quittez le navire alors que les actionnaires dâAlcatel-Lucent vous ont fait confiance Âť', 'vous-quittez-le-navire-alors-que-les-actionnaires-dalcatel-lucent-vous-ont-fait-confiance', 'Charles-Henri dâAuvigny, prĂŠsident de la F2iC', '1', '14/09/2015', '0000-00-00', '&lt;p align=&quot;justify&quot;&gt;Charles-Henri dâAuvigny, prĂŠsident de la F2iC (FĂŠdĂŠration des Investisseurs Individuels et des Clubs), sâadresse Ă  Michel Combes, le prĂŠsident dâAlcatel-Lucent, sur ses indemnitĂŠs de dĂŠpart et sur lâaffront fait aux actionnaires.&lt;/p&gt;', '&lt;/br&gt;\r\n&lt;p align=&quot;center&quot;&gt;&lt;img src=&quot;http://grandeconsultation.fr/Documents/Articles/PHO1572d2d6-570e-11e5-8f47-f6275d19194b-493x178-01.jpg&quot; height=&quot;300&quot;/&gt;&lt;/p&gt;\r\n&lt;figcaption align=&quot;center&quot;&gt;( CrĂŠdit Photo : ERIC PIERMONT/AFP)&lt;/figcaption&gt;\r\n&lt;/br&gt;\r\n&lt;p align=&quot;justify&quot;&gt;&lt;strong&gt; Charles-Henri dâAuvigny, prĂŠsident de la F2iC (FĂŠdĂŠration des Investisseurs Individuels et des Clubs), sâadresse Ă  Michel Combes, le prĂŠsident dâAlcatel-Lucent, sur ses indemnitĂŠs de dĂŠpart et sur lâaffront fait aux actionnaires.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;Lettre ouverte dâun actionnaire individuel Ă  Michel Combes.&lt;/p&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;Cher Monsieur,&lt;/p&gt;\r\n\r\n&lt;/br&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;Depuis plusieurs semaines, &lt;a class=&quot;external&quot; href=&quot;http://www.lefigaro.fr/economie/le-scan-eco/explicateur/2015/09/01/29004-20150901ARTFIG00259-jackpot-de-michel-combes-tout-comprendre-sur-la-polemique.php?redirect_premium&quot;&gt; les conditions de votre dĂŠpart dâAlcatel-Lucent agitent la presse et les commentateurs. &lt;/a&gt; Permettez Ă  un modeste actionnaire individuel de vous donner son sentiment.&lt;/p&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;A votre entrĂŠe en fonction, le 1er avril 2013, Alcatel-Lucent connaissait de graves difficultĂŠs, qui dataient de nombreuses annĂŠes. En appliquant les mesures engagĂŠes par lâĂŠquipe prĂŠcĂŠdente et avec votre impulsion, lâentreprise se redresse. Cet ĂŠpisode a aussi entraĂŽnĂŠ de nombreuses suppressions dâemplois dans le monde et en France. Elles ĂŠtaient sans doute nĂŠcessaires pour le maintien de lâactivitĂŠ et des autres salariĂŠs. Cette pĂŠriode sâest soldĂŠe par un rapprochement avec Nokia, ce qui prĂŠserve de nombreux emplois chez Alcatel-Lucent, notamment en France. La multiplication du cours de bourse par trois, tĂŠmoigne de la justesse de cette stratĂŠgie. Par ailleurs, je veux bien croire que, vu les erreurs accumulĂŠes dans le passĂŠ, il nây avait probablement pas dâautres alternatives Ă  un mariage.&lt;/p&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;NĂŠanmoins, vous dĂŠcidez de quitter le navire alors que le rapprochement avec Nokia nâest pas encore opĂŠrationnel. Pourquoi? Vous prĂŠfĂŠrez aller vivre une nouvelle aventure chez SFR-NumĂŠricable, alors que les salariĂŠs et les actionnaires dâAlcatel-Lucent vous ont fait confiance pour mener lâentreprise sur ces nouveaux rails avec Nokia. Et câest lĂ  que commence le vrai sujet: celui de vos indemnitĂŠs de dĂŠpart. Je ne vais pas me prononcer au nom du droit ; je laisse ce soin Ă  lâAutoritĂŠ des MarchĂŠs Financiers qui sâest saisi de ce dossier. Je rĂŠagis sur le plan de la morale et sur votre dĂŠfense. Dans une interview dans Les Echos du 1er septembre, vous indiquez que ces indemnitĂŠs sont justifiĂŠes car vous avez supportĂŠ le risque de lâentreprise et que leur montant ĂŠtait liĂŠ au cours de bourse que vous avez fortement valorisĂŠ. Une grande partie de la rĂŠmunĂŠration de ces indemnitĂŠs est liĂŠe aux actions ou aux options dâactions que vous possĂŠdez. Les avez-vous achetĂŠes comme tous les autres actionnaires? Non. On vous les a attribuĂŠes gratuitement. Donc vous nâavez supportĂŠ aucun risque, puisque ce nâĂŠtait pas votre argent, mais celui des actionnaires qui supportent un risque Alcatel-Lucent bien plus rĂŠel depuis de nombreuses annĂŠes.&lt;/p&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;Par ailleurs, il est surprenant que le conseil dâadministration dâAlcatel-Lucent ait revu vos conditions de dĂŠpart alors quâil savait vers quelle entreprise vous alliez diriger. Ce conseil change les attributions dâun administrateur juste avant sa rĂŠunion de fin juillet et quâun autre administrateur a dĂŠmissionnĂŠ en juin peu aprĂ¨s que lâassemblĂŠe gĂŠnĂŠrale lâeut reconduit pour un nouveau mandat. Aucun communiquĂŠ de presse nâest rĂŠdigĂŠ Ă  ce moment-lĂ ! Il nây avait aucune raison de vous accorder une clause de non concurrence alors que les administrateurs savaient au moins par voie de presse que vous partiez diriger SFR-NumĂŠricable qui nâait en aucune faĂ§on concurrent dâAlcatel-Lucent.&lt;/p&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;Alors permettez-moi de citer lâarticle 1er de la DĂŠclaration des Droits de lâHomme rĂŠdigĂŠe en aoĂťt 1789 et qui est inscrite dans la Constitution de la RĂŠpublique franĂ§aise: ÂŤLes distinctions sociales ne peuvent ĂŞtre fondĂŠes que sur lâutilitĂŠ commune.Âť Cet article est un fondement du fonctionnement de notre dĂŠmocratie. Les commentaires et du Haut comitĂŠ du gouvernement dâentreprise de lâAFEP et du Medef vous ont fait part dâun certain nombre de remarques. Sans prĂŠjuger des suites que pourrons donner la saisine de lâAMF et de vos rĂŠponses au Haut comitĂŠ de gouvernement, je peux vous dire que vous mettez Ă  mal ce principe dĂŠmocratique avec le concours de votre conseil dâadministration. Les actionnaires sont prĂŞts Ă  rĂŠcompenser Ă  leur juste valeur du travail des dirigeants des groupes franĂ§ais comme leurs salariĂŠs. Mais il est important que cela soit juste et ĂŠquilibrĂŠ!&lt;/p&gt;\r\n\r\n&lt;p align=&quot;justify&quot;&gt;Charles-Henri dâAuvigny PrĂŠsident de la F2iC (FĂŠdĂŠration des Investisseurs Individuels et des Clubs)&lt;/p&gt;\r\n&lt;/br&gt;\r\n&lt;p&gt;Retrouvez cet article sur &lt;a class=&quot;external&quot; href=&quot;http://bourse.lefigaro.fr/indices-actions/actu-conseils/vous-quittez-le-navire-alors-que-les-actionnaires-d-alcatel-lucent-vous-ont-fait-confiance-4590200&quot; target=_blank&gt;Lefigaro.fr&lt;/a&gt;&lt;/p&gt;\r\n&lt;/br&gt;\r\n&lt;p&gt;( CrĂŠdit Photo : ERIC PIERMONT/AFP)\r\n&lt;/br&gt;&lt;/br&gt;', '2015-09-14', 'd618679cace01faccd68c38cf828d78c.jpg', '0', '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `SigmaPicture`
--

CREATE TABLE IF NOT EXISTS `SigmaPicture` (
  `SigmaPictureId` int(11) NOT NULL AUTO_INCREMENT,
  `SigmaId` int(11) NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ImgAltName` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY (`SigmaPictureId`),
  KEY `SigmaId` (`SigmaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=86 ;

--
-- Dumping data for table `SigmaPicture`
--

INSERT INTO `SigmaPicture` (`SigmaPictureId`, `SigmaId`, `ImgDriveName`, `ImgAltName`, `IW`, `IH`) VALUES
(15, 5, '1f903b63bd07a45887baf19d99b606a5.jpg', 'krakow POST', 160, 160),
(16, 7, '62b7e8cc8cdcdec684f2055d027d0daf.jpg', 'cracow life', 160, 160),
(14, 6, '9f3805045d01a72d0c2b1ba7228cf342.jpg', 'Gazeta Wyborcza', 160, 160),
(33, 8, 'bec4e26eac9f1ed631f10217d3b31d62.jpg', '', 320, 214),
(31, 10, 'e59d9d9a0fb3e4f3b6f087a155344d5d.jpg', '', 320, 214),
(32, 10, '1e614602183a1bd70f30cd36ace2f18c.jpg', '', 320, 213),
(30, 15, '986645a3f195bf938f34fa1db6af01f8.jpg', '', 320, 214),
(22, 16, 'e29c6f046fc9c42b06661ffbec883a54.jpg', 'KTOZ', 320, 214),
(28, 15, '15e7b673c161757f00099d5a0dfa296a.jpg', '', 320, 213),
(29, 15, 'cf819c5e5646adc07c9ba94f889a5f01.jpg', '', 320, 214),
(34, 8, 'd6eeb5981778ed7ae8df571ddbaba01f.jpg', '', 320, 213),
(35, 8, 'ff5aba517b82f03f83a7e8d877206baf.jpg', '', 320, 214),
(36, 20, '8a176682a5b019656b6d81cb22091337.jpg', '', 113, 127),
(43, 23, 'e1a39c4de497b199fc300f31fb3331a6.jpg', '', 0, 0),
(39, 24, 'da431ba314df14edd7ffb520e4cfa4fc.jpg', '', 320, 240),
(40, 24, '65a6f0b9f456267bf2cee905ddce8a2c.jpg', '', 320, 240),
(41, 24, '51221ad9295891bfb252ffc3aa7aee02.jpg', '', 320, 240),
(42, 25, '87ed3dc46da6c36aa0339318e0ea7ad0.jpg', '', 320, 219),
(46, 27, '0dfffc3d9ad00b5f45fb5f743cb41168.jpg', '', 0, 0),
(45, 28, 'bbbc2ef16d58d0f3462a1e09de669966.jpg', '', 0, 0),
(47, 29, '82205f114628acd467e6190c999f3fa9.jpg', '', 0, 0),
(48, 31, '953994670358d918f8864609c2ad07df.jpg', '', 160, 245),
(52, 32, 'd828b35ebd17237115bd01e02da31ddf.jpg', 'AndrĂĄs Hidas', 160, 160),
(51, 34, '4bf3c50d03510bebcc86d1366ae8dbe4.jpg', '', 320, 234),
(53, 35, '8c748352146860851055dabc7e8dee3d.jpg', '', 160, 160),
(54, 35, '0059eb625392e69a097575db48b64057.jpg', '', 160, 160),
(58, 40, '90c2d9f3d587a54e587ace1e99eb304e.jpg', 'Casio El-piano', 160, 160),
(56, 40, '2d14ea9857f95a9182e76ddc4c89664f.jpg', 'Strunal', 160, 442),
(57, 40, '17d32bc0daab82c0aa078c57160426da.jpg', 'Casio LK-280', 160, 224),
(59, 41, '4aea17ba7a83bf7262c89a27a38734e3.jpg', '', 160, 224),
(60, 41, '28df409031c48b25b387fce488c7caa4.jpg', '', 160, 224),
(61, 41, '38435b27995702175a3677799690238c.jpg', '', 160, 224),
(62, 40, '517f0afdab3c81cf68c14309878fcbbe.jpg', 'Kalimba 1', 160, 200),
(63, 40, '48aeef254284811524a7abc029df556c.jpg', 'Kalimba 2', 160, 200),
(64, 40, '1a69e7b68f5ae60618d6fc31be04d7a0.jpg', 'Kalimba 3', 160, 200),
(65, 40, '66b686f23497ad75a2ca181b7aa44067.jpg', 'Musikkgave 1', 160, 200),
(66, 40, 'df425df51794cff14365c719d951d8e0.jpg', 'Musikkgave 2', 160, 200),
(67, 40, '29a1f25741587c718fc494390d82fd6f.jpg', 'Musikkgave 3', 160, 200),
(85, 56, 'd618679cace01faccd68c38cf828d78c.jpg', '', 0, 0),
(77, 53, '8839c13a42732e9271e3029d062be634.jpg', '', 0, 0),
(79, 51, 'e7dac0a316dce7d9147dbd5b5ea01f72.jpg', '', 0, 0),
(78, 52, 'aa32ab1f441dbda669c2eaf172b0ac8a.jpg', '', 0, 0),
(80, 50, '8941cf71be6c6e5ffca0735a993dd429.jpg', '', 0, 0),
(81, 49, '1479027175a4815a20789ab55e4015ac.jpg', '', 0, 0),
(82, 48, 'd4c4d5fa6620cb0466efe58ff3a5686e.jpg', '', 0, 0),
(84, 47, 'f3e40ed1f89fc7cac6b50166c4ac1b76.jpg', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Template`
--

CREATE TABLE IF NOT EXISTS `Template` (
  `TemplateId` int(11) NOT NULL AUTO_INCREMENT,
  `Size` varchar(255) NOT NULL DEFAULT '0',
  `Quantity` varchar(255) NOT NULL DEFAULT '0',
  `Price` float(5,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`TemplateId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `Template`
--

INSERT INTO `Template` (`TemplateId`, `Size`, `Quantity`, `Price`) VALUES
(39, '10x15', '10', 0.70),
(38, '09x13', '10', 0.60),
(40, '13x18', '10', 1.20),
(41, '15x21', '10', 1.50),
(42, '21x30', '50', 4.00),
(43, '25x30', '50', 6.00);

-- --------------------------------------------------------

--
-- Table structure for table `TemplateUser`
--

CREATE TABLE IF NOT EXISTS `TemplateUser` (
  `TemplateUserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Size` varchar(255) NOT NULL DEFAULT '0',
  `Quantity` varchar(255) NOT NULL DEFAULT '0',
  `Price` float(5,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`TemplateUserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `TemplateUser`
--

INSERT INTO `TemplateUser` (`TemplateUserId`, `UserId`, `Size`, `Quantity`, `Price`) VALUES
(49, 248, '19x24', '5', 20.35),
(50, 248, '13x18', '10', 4.26),
(56, 250, '9x13', '10', 0.55),
(55, 250, '10x15', '10', 0.89),
(57, 250, '13x18', '10', 1.39),
(58, 250, '15x21', '10', 1.99),
(70, 256, '15x21', '10', 1.99),
(69, 256, '13x18', '10', 1.39),
(68, 256, '9x13', '10', 0.55),
(67, 256, '10x15', '10', 0.89),
(71, 258, '10x15', '10', 0.89),
(72, 258, '9x13', '10', 0.55),
(73, 258, '13x18', '10', 1.39),
(74, 258, '15x21', '10', 1.99);

-- --------------------------------------------------------

--
-- Table structure for table `Topic`
--

CREATE TABLE IF NOT EXISTS `Topic` (
  `TopicId` int(11) NOT NULL AUTO_INCREMENT,
  `UpdateCategoryId` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL DEFAULT '0',
  `OpenQuestion` varchar(255) NOT NULL,
  `CreateDate` date NOT NULL DEFAULT '0000-00-00',
  `Status` int(11) NOT NULL,
  `TopicOrder` int(11) NOT NULL,
  PRIMARY KEY (`TopicId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Topic`
--

INSERT INTO `Topic` (`TopicId`, `UpdateCategoryId`, `Question`, `OpenQuestion`, `CreateDate`, `Status`, `TopicOrder`) VALUES
(22, 26, 'Article 3 : Et si nous parlons plus prĂŠcisĂŠment du crowdfunding, quâavez-vous envie de dire Ă  ce sujet ?', '', '2015-05-09', 0, 15),
(4, 2, 'Le sur-amortissement un outil utile pour lâinvestissement ?', '', '2015-05-28', 0, 3),
(3, 3, 'Pourquoi et comment drainer lâĂŠpargne populaire vers les entreprises ?', '', '2015-05-28', 0, 4),
(21, 25, 'Article 2 : Quels exemples venant de lâĂŠtranger sont Ă  vos yeux une source dâinspiration pour orienter lâĂŠpargne des FranĂ§ais vers les PME ?', '', '2015-05-09', 0, 14),
(20, 24, 'Article 1 : Alors, pour vous, que faut-il faire pour mieux orienter lâĂŠpargne des FranĂ§ais vers les PME et comment faut-il sây prendre?', '', '2015-05-09', 0, 13),
(15, 19, '...Un gadget qui ne concerne quâune niche de projets ?', '', '2015-05-08', 0, 8),
(16, 20, '...Un moyen supplĂŠmentaire de trouver des financements ?', '', '2015-05-08', 0, 9),
(17, 21, '...Une alternative crĂŠdible aux financements bancaires ?', '', '2015-05-08', 0, 10),
(18, 22, 'Comment pensez-vous y avoir recours ?', '', '2015-05-08', 0, 11),
(19, 23, 'Dans quels dĂŠlais ?', '', '2015-05-08', 0, 12),
(23, 27, 'Entrepreneurs, vous pensez quâavec une croissance molle, la reprise peut durer ?', '', '2015-05-28', 0, 16),
(24, 28, 'Quâest-ce qui pourrait faire penser que la croissance est artificielle ? ', '', '2015-05-28', 0, 17),
(25, 29, 'En dehors du pĂŠtrole pas cher, des taux bas, et de la faiblesse de lâeuroâŚ quâest-ce qui explique la reprise selon vous ? ', '', '2015-05-28', 0, 18),
(26, 30, 'Pour que la croissance bĂŠnĂŠficie Ă  lâemploi ; il faudrait quoi ? ', '', '2015-05-28', 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `TopicMessage`
--

CREATE TABLE IF NOT EXISTS `TopicMessage` (
  `TopicMessageId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL DEFAULT '0',
  `TopicId` int(11) NOT NULL DEFAULT '0',
  `Message` text CHARACTER SET latin2 NOT NULL,
  `CreateDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`TopicMessageId`),
  KEY `UserId` (`UserId`),
  KEY `TopicId` (`TopicId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=59 ;

--
-- Dumping data for table `TopicMessage`
--

INSERT INTO `TopicMessage` (`TopicMessageId`, `UserId`, `TopicId`, `Message`, `CreateDateTime`) VALUES
(35, 3633, 3, 'il faut donner le moyen aux franĂ§ais de crĂŠer un dĂŠveloppement durable en facilitant l''entrĂŠe au capital des PME. les banquiers ne font plus leur travail (dĂŠveloppement de circuits de crownfounding) et il convient de voir une plus grande implication des franĂ§ais dans le  tissu ĂŠconomique', '2015-04-27 16:55:06'),
(7, 3, 4, 'Le sur-amortissement un outil utile pour lâinvestissement ?', '2015-04-22 11:38:33'),
(28, 3, 3, 'Pourquoi et comment drainer lâĂŠpargne populaire vers les entreprises ?', '2015-04-24 10:56:39'),
(34, 3633, 4, 'le sur amortissement ne peut ĂŞtre pertinent que si le rĂŠsultat fiscal de l''entreprise permet de l''envisager. or, la plupart des PME franĂ§aises souffrent d''une baisse de compĂŠtitivitĂŠ dommageable Ă  leur niveau de rentabilitĂŠ. donc sur amortir ne pourra concerner que quelques entreprises et ne rĂŠpondra pas (en aucune maniĂ¨re) aux problĂ¨mes de prise de commandes (niveau du carnet) et des problĂ¨mes de charges trop importantes. on noie le poisson avec de telles lois.', '2015-04-27 16:53:38'),
(29, 3, 3, 'Vous pouvez poster ici toutes vos rĂŠflexions et remarques sur le sujet', '2015-04-24 10:57:23'),
(30, 3, 3, 'N''hĂŠsitez pas Ă  revenir et rĂŠpondre aux autres participants.', '2015-04-24 10:58:01'),
(31, 3, 4, 'Vous pouvez poster ici toutes vos rĂŠflexions et remarques sur le sujet', '2015-04-24 10:58:19'),
(32, 3, 4, 'N''hĂŠsitez pas Ă  revenir sur cette page et rĂŠpondre aux autres participants', '2015-04-24 10:58:44'),
(36, 3, 8, 'Welcome from admin', '2015-05-08 15:49:42'),
(37, 3, 9, 'Welcome from admin', '2015-05-08 15:49:54'),
(38, 3, 20, 'NâhĂŠsitez pas Ă  citer toutes les solutions qui vous semblent pertinentes et envisageables.', '2015-05-09 13:24:22'),
(39, 3, 21, 'DĂŠtaillez bien les exemples que vous citez pour nous permettre de bien comprendre.', '2015-05-09 13:24:46'),
(40, 3, 22, 'Le crowdfunding, autrement appelĂŠ financement participatif, est une autre faĂ§on pour les entreprises, les particuliers de rĂŠcolter des fonds pour leur projets. Dans la plupart des cas, câest lâassociation dâun grand nombre de personnes investissant un petit montant qui permettent aux porteurs de projets de trouver les fonds demandĂŠs. Ce mode de financement est ĂŠgalement un moyen de fĂŠdĂŠrer le plus grand nombre de personnes autour de son projet)  Tout ce que vous avez Ă  dire nous intĂŠresse, nâhĂŠsitez pas Ă  dĂŠvelopper vos opinions.', '2015-05-09 13:25:06'),
(41, 3652, 23, 'la reprise ne sera rĂŠelle que lorsque la dĂŠpense publique sera redescendu en dessous de la moyenne europĂŠenne. ', '2015-05-28 17:52:53'),
(42, 3651, 23, 'La baisse des dĂŠpenses publiques est la condition prĂŠalable Ă  toute reprise durable', '2015-05-28 17:57:13'),
(43, 3, 23, 'en dehors de la dĂŠpense publique qu''est-ce qui explique la reprise malgrĂ¨ tout?', '2015-05-28 18:31:34'),
(44, 3652, 20, 'Il faut supprimer les avantages fiscaux liĂŠs Ă  l''achat, Ă  la dĂŠtention et Ă  la transmission dâĹuvres d''art et transfĂŠrer ces avantages aux dĂŠtenteurs de participations minoritaires dans l''actionnariat du secteur des PME, PMI et ETI. Il faut ĂŠgalement taxer les transactions  boursiĂ¨res de faĂ§on inversement proportionnelle Ă  la durĂŠe de dĂŠtention de l''action.Il faut ĂŠgalement harmoniser les rĂ¨gles fiscales en zone EURO, exclure les pays qui ne les respectent pas, ne pas autoriser les ĂŠtablissements bancaires ayant des agences en zone EURO Ă  avoir des relations commerciales ou des filiales dans les paradis fiscaux. Il faut ĂŠgalement taxer les importations proportionnellement Ă  la distance entre le point de production et le point de vente. Il faut supprimer le dĂŠtachement de salariĂŠs.Il faut que les rapports de la cour des comptes soient considĂŠrĂŠes comme des propositions de loi et que la mise en application des solutions proposĂŠes soient soumises au vote du parlement. Il faut inscrire dans la constitution '''' l''obligation d''ĂŠquilibre budgĂŠtaire annuel de la France'''' sous peine de dissolution du parlement qui l''a votĂŠ.', '2015-05-28 19:14:26'),
(45, 3661, 26, 'Une baisse significative des charges sociales pour les entreprises de - de 20 salariĂŠs', '2015-06-01 14:28:27'),
(46, 3661, 26, 'Favoriser rĂŠellement l''embouche des jeunes. 0 charges pour les - de 26ans', '2015-06-01 14:30:30'),
(47, 3595, 24, 'La reprise du chĂ´mage!!', '2015-06-02 10:28:23'),
(48, 3673, 24, 'La croissance est artificielle, car elle se base sur un indicateur qui est le PIB. Ce dernier prend en compte la production non marchande, donc les dĂŠpenses publiques. Et comme ces derniĂ¨res sont assurĂŠes par l''empreint, cela reprĂŠsente de la dette. Et celle-ci se retrouve dans le PIB. La fonction publique crĂŠer donc artificiellement de la croissance et fausse la rĂŠalitĂŠ des chiffres.', '2015-06-05 13:45:53'),
(49, 3692, 26, 's''ouvrir au tĂŠlĂŠtravail', '2015-06-16 10:19:23'),
(50, 3692, 26, 'que les entreprises s''impliquent un peu plus dans l''insertion des jeunes, qui sont notre avenir, par la prise en compte des contrats d''alternance afin de permettre au jeunes d''accĂŠder Ă  une expĂŠrience qualifiĂŠe. ', '2015-06-16 10:22:07'),
(51, 3692, 22, 'C''est une bonne mĂŠthode pour obtenir des fonds pour son projet et une trĂ¨s bonne faĂ§on, assez radicale, de voir que le projet plaĂŽt ou pas !', '2015-06-16 10:24:54'),
(52, 3711, 16, 'L''un des dĂŠfis les plus difficiles de nos jours : ressources financiĂŠres autres que le capitale de base et les revenus annuels?', '2015-06-24 14:27:53'),
(53, 3721, 26, 'une baisse des charges des pme-pmi-tpe et une refonte complĂ¨te du rsi pour adopter un payement des charges au mois sur la base du CA du mois ', '2015-07-13 16:33:51'),
(54, 3721, 25, 'IL n''y a pas de reprise elle est artificiel(voire la question prĂŠcĂŠdente)', '2015-07-13 16:39:07'),
(55, 3721, 15, 'la rĂŠponse est dans la question!', '2015-07-13 16:49:42'),
(56, 3721, 22, 'le financement participatif ne concerne qu''une partie  d''un projet de petite taille,  c''est bien mais il ne peut en lui seul constituer l''aide qui va sauver l''entreprenariat  ', '2015-07-13 16:59:16'),
(57, 3721, 22, 'C''est ĂŠgalement un outil de marketing!', '2015-07-13 17:00:15'),
(58, 3721, 24, 'La reprise du chĂ´mage et les dĂŠfaillances d''entreprises qui continue', '2015-07-13 17:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `UpdateCategory`
--

CREATE TABLE IF NOT EXISTS `UpdateCategory` (
  `UpdateCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `FatherId` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `SeoName` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `ListOrder` int(11) NOT NULL DEFAULT '0',
  `ContentType` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `NumberOfItems` int(11) NOT NULL DEFAULT '0',
  `IsModule` int(11) NOT NULL,
  PRIMARY KEY (`UpdateCategoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `UpdateCategory`
--

INSERT INTO `UpdateCategory` (`UpdateCategoryId`, `FatherId`, `Name`, `SeoName`, `ListOrder`, `ContentType`, `NumberOfItems`, `IsModule`) VALUES
(1, 0, 'ThĂ¨me', 'theme', 1, '', 0, 1),
(2, 1, 'Le sur-amortissement un outil utile pour lâinvestissement ?', 'le-sur-amortissement-un-outil-utile-pour-linvestissement', 3, '', 0, 0),
(3, 1, 'Pourquoi et comment drainer lâĂŠpargne populaire vers les entreprises ?', 'pourquoi-et-comment-drainer-lepargne-populaire-vers-les-entreprises', 2, '', 0, 0),
(10, 1, 'Drainer lâĂŠpargne populaire vers les entreprises ?', 'drainer-lepargne-populaire-vers-les-entreprises', 4, '', 0, 1),
(26, 10, 'Article 3 : Et si nous parlons plus prĂŠcisĂŠment du crowdfunding, quâavez-vous envie de dire Ă  ce sujet ?', 'article-3-et-si-nous-parlons-plus-precisement-du-crowdfunding-quavez-vous-envie-de-dire-ce-sujet', 3, '', 0, 0),
(25, 10, 'Article 2 : Quels exemples venant de lâĂŠtranger sont Ă  vos yeux une source dâinspiration pour orienter lâĂŠpargne des FranĂ§ais vers les PME ?', 'article-2-quels-exemples-venant-de-letranger-sont-vos-yeux-une-source-dinspiration-pour-orienter-lepargne-des-francais-vers-les-pme', 2, '', 0, 0),
(24, 10, 'Article 1 : Alors, pour vous, que faut-il faire pour mieux orienter lâĂŠpargne des FranĂ§ais vers les PME et comment faut-il sây prendre?', 'article-1-alors-pour-vous-que-faut-il-faire-pour-mieux-orienter-lepargne-des-francais-vers-les-pme-et-comment-faut-il-sy-prendre', 1, '', 0, 0),
(14, 10, 'Article 4 : ConcrĂ¨tement, quâest-ce qui vous fait penser que le crowdfunding (financement participatif) estâŚ ?', 'article-4-concretement-quest-ce-qui-vous-fait-penser-que-le-crowdfunding-financement-participatif-est', 4, '', 0, 1),
(15, 10, 'Article 5 : En tant que chef dâentreprise, envisagez-vous dâavoir recours au crowdfunding (financement participatif) ?', 'article-5-en-tant-que-chef-dentreprise-envisagez-vous-davoir-recours-au-crowdfunding-financement-participatif', 5, '', 0, 1),
(30, 27, 'Pour que la croissance bĂŠnĂŠficie Ă  lâemploi ; il faudrait quoi ? ', 'pour-que-la-croissance-beneficie-lemploi-il-faudrait-quoi', 3, '', 0, 0),
(29, 27, 'En dehors du pĂŠtrole pas cher, des taux bas, et de la faiblesse de lâeuroâŚ quâest-ce qui explique la reprise selon vous ? ', 'en-dehors-du-petrole-pas-cher-des-taux-bas-et-de-la-faiblesse-de-leuro-quest-ce-qui-explique-la-reprise-selon-vous', 2, '', 0, 0),
(27, 1, 'Entrepreneurs, vous pensez quâavec une croissance molle, la reprise peut durer ?', 'entrepreneurs-vous-pensez-quavec-une-croissance-molle-la-reprise-peut-durer', 1, '', 0, 0),
(28, 27, 'Quâest-ce qui pourrait faire penser que la croissance est artificielle ? ', 'quest-ce-qui-pourrait-faire-penser-que-la-croissance-est-artificielle', 1, '', 0, 0),
(19, 14, '...Un gadget qui ne concerne quâune niche de projets ?', 'un-gadget-qui-ne-concerne-quune-niche-de-projets', 1, '', 0, 0),
(20, 14, '...Un moyen supplĂŠmentaire de trouver des financements ?', 'un-moyen-supplementaire-de-trouver-des-financements', 2, '', 0, 0),
(21, 14, '...Une alternative crĂŠdible aux financements bancaires ?', 'une-alternative-credible-aux-financements-bancaires', 3, '', 0, 0),
(22, 15, 'Comment pensez-vous y avoir recours ?', 'comment-pensez-vous-y-avoir-recours', 1, '', 0, 0),
(23, 15, 'Dans quels dĂŠlais ?', 'dans-quels-delais', 2, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `UpdateCategoryPlain`
--

CREATE TABLE IF NOT EXISTS `UpdateCategoryPlain` (
  `UpdateCategoryPlainId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) DEFAULT NULL,
  `CategoryName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `CategorySeoName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`UpdateCategoryPlainId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1399 ;

--
-- Dumping data for table `UpdateCategoryPlain`
--

INSERT INTO `UpdateCategoryPlain` (`UpdateCategoryPlainId`, `CategoryId`, `CategoryName`, `CategorySeoName`) VALUES
(1381, 1, 'ThĂ¨me', 'theme'),
(1382, 27, '&nbsp; &nbsp;Entrepreneurs, vous pensez quâavec une croissance molle, la reprise peut durer ?', 'entrepreneurs-vous-pensez-quavec-une-croissance-molle-la-reprise-peut-durer'),
(1383, 28, '&nbsp; &nbsp;&nbsp; &nbsp;Quâest-ce qui pourrait faire penser que la croissance est artificielle ? ', 'quest-ce-qui-pourrait-faire-penser-que-la-croissance-est-artificielle'),
(1384, 29, '&nbsp; &nbsp;&nbsp; &nbsp;En dehors du pĂŠtrole pas cher, des taux bas, et de la faiblesse de lâeuroâŚ quâest-ce qui explique la reprise selon vous ? ', 'en-dehors-du-petrole-pas-cher-des-taux-bas-et-de-la-faiblesse-de-leuro-quest-ce-qui-explique-la-reprise-selon-vous'),
(1385, 30, '&nbsp; &nbsp;&nbsp; &nbsp;Pour que la croissance bĂŠnĂŠficie Ă  lâemploi ; il faudrait quoi ? ', 'pour-que-la-croissance-beneficie-lemploi-il-faudrait-quoi'),
(1386, 3, '&nbsp; &nbsp;Pourquoi et comment drainer lâĂŠpargne populaire vers les entreprises ?', 'pourquoi-et-comment-drainer-lepargne-populaire-vers-les-entreprises'),
(1387, 2, '&nbsp; &nbsp;Le sur-amortissement un outil utile pour lâinvestissement ?', 'le-sur-amortissement-un-outil-utile-pour-linvestissement'),
(1388, 10, '&nbsp; &nbsp;Drainer lâĂŠpargne populaire vers les entreprises ?', 'drainer-lepargne-populaire-vers-les-entreprises'),
(1389, 24, '&nbsp; &nbsp;&nbsp; &nbsp;Article 1 : Alors, pour vous, que faut-il faire pour mieux orienter lâĂŠpargne des FranĂ§ais vers les PME et comment faut-il sây prendre?', 'article-1-alors-pour-vous-que-faut-il-faire-pour-mieux-orienter-lepargne-des-francais-vers-les-pme-et-comment-faut-il-sy-prendre'),
(1390, 25, '&nbsp; &nbsp;&nbsp; &nbsp;Article 2 : Quels exemples venant de lâĂŠtranger sont Ă  vos yeux une source dâinspiration pour orienter lâĂŠpargne des FranĂ§ais vers les PME ?', 'article-2-quels-exemples-venant-de-letranger-sont-vos-yeux-une-source-dinspiration-pour-orienter-lepargne-des-francais-vers-les-pme'),
(1391, 26, '&nbsp; &nbsp;&nbsp; &nbsp;Article 3 : Et si nous parlons plus prĂŠcisĂŠment du crowdfunding, quâavez-vous envie de dire Ă  ce sujet ?', 'article-3-et-si-nous-parlons-plus-precisement-du-crowdfunding-quavez-vous-envie-de-dire-ce-sujet'),
(1392, 14, '&nbsp; &nbsp;&nbsp; &nbsp;Article 4 : ConcrĂ¨tement, quâest-ce qui vous fait penser que le crowdfunding (financement participatif) estâŚ ?', 'article-4-concretement-quest-ce-qui-vous-fait-penser-que-le-crowdfunding-financement-participatif-est'),
(1393, 19, '&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;...Un gadget qui ne concerne quâune niche de projets ?', 'un-gadget-qui-ne-concerne-quune-niche-de-projets'),
(1394, 20, '&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;...Un moyen supplĂŠmentaire de trouver des financements ?', 'un-moyen-supplementaire-de-trouver-des-financements'),
(1395, 21, '&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;...Une alternative crĂŠdible aux financements bancaires ?', 'une-alternative-credible-aux-financements-bancaires'),
(1396, 15, '&nbsp; &nbsp;&nbsp; &nbsp;Article 5 : En tant que chef dâentreprise, envisagez-vous dâavoir recours au crowdfunding (financement participatif) ?', 'article-5-en-tant-que-chef-dentreprise-envisagez-vous-davoir-recours-au-crowdfunding-financement-participatif'),
(1397, 22, '&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Comment pensez-vous y avoir recours ?', 'comment-pensez-vous-y-avoir-recours'),
(1398, 23, '&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Dans quels dĂŠlais ?', 'dans-quels-delais');

-- --------------------------------------------------------

--
-- Table structure for table `UpdateFile`
--

CREATE TABLE IF NOT EXISTS `UpdateFile` (
  `UpdateFileId` int(11) NOT NULL AUTO_INCREMENT,
  `UpdateCategoryId` int(11) NOT NULL DEFAULT '0',
  `DriveName` varchar(255) NOT NULL DEFAULT '',
  `FileName` varchar(255) NOT NULL DEFAULT '',
  `FileDescription` tinytext NOT NULL,
  `FileType` varchar(10) NOT NULL DEFAULT '',
  `ShortContent` text,
  `LongContent` text NOT NULL,
  `CreateDate` date DEFAULT NULL,
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`UpdateFileId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `UpdateFile`
--

INSERT INTO `UpdateFile` (`UpdateFileId`, `UpdateCategoryId`, `DriveName`, `FileName`, `FileDescription`, `FileType`, `ShortContent`, `LongContent`, `CreateDate`, `UpdateDate`) VALUES
(1, 1, 'andreas_1.jpg', 'i', 'iu', 'jpg', '', '', '2012-12-28', '2012-12-28'),
(2, 1, 'andreas_2.jpg', 'uih', 'iuh', 'jpg', '', '', '2012-12-28', '2012-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryId` int(11) NOT NULL DEFAULT '0',
  `ProvinceId` int(11) NOT NULL DEFAULT '0',
  `Email` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `Password` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `CompanyName` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `NameFirst` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `NameLast` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Street` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Number` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `Zip` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `City` varchar(40) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `Phone1` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `Phone2` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `Fax1` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `Fax2` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `Website1` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `Website2` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `NipPL` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `NipUE` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `Regon` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '1',
  `CreateDate` date NOT NULL DEFAULT '0000-00-00',
  `UpdateDate` date NOT NULL DEFAULT '0000-00-00',
  `Status` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ImgDriveName` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `ActivationToken` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Info` text COLLATE utf8_polish_ci NOT NULL,
  `TesterStatus` int(1) NOT NULL,
  `TesterDate` date NOT NULL,
  PRIMARY KEY (`UserId`),
  KEY `CountryId` (`CountryId`),
  KEY `ProvinceId` (`ProvinceId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3753 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `CountryId`, `ProvinceId`, `Email`, `Password`, `CompanyName`, `NameFirst`, `NameLast`, `Street`, `Number`, `Zip`, `City`, `Phone1`, `Phone2`, `Fax1`, `Fax2`, `Website1`, `Website2`, `NipPL`, `NipUE`, `Regon`, `CreateDate`, `UpdateDate`, `Status`, `ImgDriveName`, `ActivationToken`, `Info`, `TesterStatus`, `TesterDate`) VALUES
(3, 0, 0, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', 'Nicolas', 'Curtelin', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2010-07-06', '2010-07-06', '1', '', '', '', 0, '0000-00-00'),
(3625, 0, 0, 'edouard.cayzacnicolas@sfr.fr', '16a7064be17e848674f9857110540e1f', '', '', '', '', '', '', '', '1 salariĂŠ', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '3', '', '', '', '1', '2015-04-14', '2015-04-14', '0', '', '33a666d8253c0d8e7b4a4c103d6ad4b8', '', 0, '0000-00-00'),
(3693, 0, 0, 'francis.tessier@rhesys.fr', '5a32516db4f216a404f8e0130ae84459', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '8', '', '', '', '1', '2015-06-17', '2015-06-17', '1', '', '', '', 0, '0000-00-00'),
(3694, 0, 0, 'sashock@gmail.com ', 'e29504b5833d80faf23098abc57f0261', '', '', '', '', '', '', '', 'Aucun', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '1', '', '', '', '1', '2015-06-17', '2015-06-17', '1', '', '', '', 0, '0000-00-00'),
(3616, 0, 0, 'nicolas-magnin@orange.fr', '7aabf03892515541badc737a5c3ce0f0', '', '', '', '', '', '', '', '1 salariĂŠ', 'Auvergne et RhĂ´ne-Alpes', '', '', '10', '', '', '', '1', '2015-04-07', '2015-04-07', '1', '', '', '', 0, '0000-00-00'),
(3585, 0, 0, 'ncurtelin@gmail.com', '542b6434f54f67817e722620a28041ba', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '6', '', '', '', '1', '2015-01-15', '2015-01-15', '1', '', '', '', 0, '0000-00-00'),
(3599, 0, 0, 'nicokurt9@yahoo.fr', 'a9c4cef5735770e657b7c25b9dcb807b', '', '', '', '', '', '', '', '1 salariĂŠ', 'Bretagne', '', '', '7', '', '', '', '1', '2015-04-01', '2015-04-01', '1', '', '', '', 0, '0000-00-00'),
(3615, 0, 0, 'caroline.abon@gmail.com', '0935b92d2808922bcac6ba8c0f6e751f', '', '', '', '', '', '', '', 'Aucun', 'Auvergne et RhĂ´ne-Alpes', '', '', '2', '', '', '', '1', '2015-04-06', '2015-04-06', '1', '', '', '', 0, '0000-00-00'),
(3601, 0, 0, 'bernard.jallet@wanadoo.fr', 'c95e659b47fdc32f59b90946b1e66211', '', '', '', '', '', '', '', '1 salariĂŠ', 'Auvergne et RhĂ´ne-Alpes', '', '', '3', '', '', '', '1', '2015-04-01', '2015-04-01', '1', '', '', '', 0, '0000-00-00'),
(3692, 0, 0, 'y.hoarau@gmail.com', 'a8031c862da7625531d397f5ee2c1038', '', '', '', '', '', '', '', '1 salariĂŠ', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-06-16', '2015-06-16', '1', '', '', '', 0, '0000-00-00'),
(3738, 0, 0, 'tomasz@99foto.pl', '387492af0349572cde6907badf68eb93', '', '', '', '', '', '', '', '1 salariĂŠ', 'Dans un dĂŠpartement d''outre-mer', '', '', '4', '', '', '', '1', '2015-09-16', '2015-09-16', '1', '', '', '', 0, '0000-00-00'),
(3691, 0, 0, 'c.stutzmann@metamorphose.co', 'dbf2641b360d20ed942a79b59d0cd5bd', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '2', '', '', '', '1', '2015-06-14', '2015-06-14', '1', '', '', '', 0, '0000-00-00'),
(3595, 0, 0, 'jgoarant@opinion-way.com', '71e71c60db6488919cecd000f2f92b0c', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Ăle-de-France', '', '', '10', '', '', '', '1', '2015-02-19', '2015-02-19', '1', '', '', '', 0, '0000-00-00'),
(3596, 0, 0, 'S.SOUET@ccifrance.fr', '9179b8f1cef2d1944d5b1fbd46fa67d3', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Ăle-de-France', '', '', '1974', '', '', '', '1', '2015-02-23', '2015-02-23', '0', '', 'f6bbcef83f4f932625348ae2606bcb92', '', 0, '0000-00-00'),
(3602, 0, 0, 'bomotel@wanadoo.fr', '886e4070fa753cee22b6d693bcd25b2e', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '13', '', '', '', '1', '2015-04-01', '2015-04-01', '1', '', '', '', 0, '0000-00-00'),
(3704, 0, 0, 'louis@gometgranit.fr', '15486aff7ddfafe2f12dbf65e1d71c3d', '', '', '', '', '', '', '', 'De 11 Ă  20 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '38', '', '', '', '1', '2015-06-18', '2015-06-18', '1', '', '', '', 0, '0000-00-00'),
(3705, 0, 0, 'serge.pflumio@yggval.com', 'fe6d13ed5c81f78bfe1ec4ee218713d6', '', '', '', '', '', '', '', 'De 21 Ă  50 salariĂŠs', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '8', '', '', '', '1', '2015-06-19', '2015-06-19', '1', '', '', '', 0, '0000-00-00'),
(3604, 0, 0, 'eric.bornard@orange.fr', 'c06db9897d574bf41c57439a28fb320a', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '30', '', '', '', '1', '2015-04-02', '2015-04-02', '1', '', '', '', 0, '0000-00-00'),
(3605, 0, 0, 'hlmaistre@hotmail.com', '0e534b51c4229ab9e5954b0c306618c9', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '2', '', '', '', '1', '2015-04-02', '2015-04-02', '0', '', '97623a2c0204c5a454f817d8d443fa7f', '', 0, '0000-00-00'),
(3606, 0, 0, 'soissons@feuvert.fr', '37715858798a4dbb059280ff5b9c0da7', '', '', '', '', '', '', '', 'De 11 Ă  20 salariĂŠs', 'Nord-Pas-de-Calais et Picardie', '', '', '4', '', '', '', '1', '2015-04-02', '2015-04-02', '1', '', '', '', 0, '0000-00-00'),
(3607, 0, 0, 'contact@cibcsudaquitaine.net', '1d43d19a63380bf16e415caf0b12a517', '', '', '', '', '', '', '', 'De 11 Ă  20 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '14', '', '', '', '1', '2015-04-02', '2015-04-02', '1', '', '', '', 0, '0000-00-00'),
(3608, 0, 0, 'lfrancois@agence-maverick.com', 'ce4d2d1bd4f7db5614cc59245e783760', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '5', '', '', '', '1', '2015-04-02', '2015-04-02', '1', '', '', '', 0, '0000-00-00'),
(3609, 0, 0, 'christian@neocanal.com', '2452dd9b9a36710b35014f62beb58000', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Ăle-de-France', '', '', '4', '', '', '', '1', '2015-04-02', '2015-04-02', '1', '', '', '', 0, '0000-00-00'),
(3610, 0, 0, 'flrjean@yahoo.fr', '2bcce679527332326bd2b56df76a5f38', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-04-03', '2015-04-03', '1', '', '', '', 0, '0000-00-00'),
(3611, 0, 0, 'dorianbardavid@gmail.com', 'a351ff71e2096e836bf433e831407529', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '3', '', '', '', '1', '2015-04-03', '2015-04-03', '1', '', '', '', 0, '0000-00-00'),
(3612, 0, 0, 'zohra.bouchenak@gmail.com', 'bb5bf854675a4d6c3e8bfa56da4f3ea8', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '1', '', '', '', '1', '2015-04-03', '2015-04-03', '1', '', '', '', 0, '0000-00-00'),
(3613, 0, 0, 'sglmdm@yahoo.fr', '367655b15d6bb746db3f8264a1c86536', '', '', '', '', '', '', '', 'Aucun', 'Pays de la Loire', '', '', '1', '', '', '', '1', '2015-04-03', '2015-04-03', '1', '', '', '', 0, '0000-00-00'),
(3614, 0, 0, 'stracom.consulting@orange.fr', '58c2d2efc1f9bdbba667686ae5f4c23d', '', '', '', '', '', '', '', 'Aucun', 'Nord-Pas-de-Calais et Picardie', '', '', '1', '', '', '', '1', '2015-04-05', '2015-04-05', '0', '', '829011f5de92d95ac8ede9e4987b6b4d', '', 0, '0000-00-00'),
(3626, 0, 0, 'fdesbois@arteoconseil.fr', '4c654f9b673eb677bcd054089a9e5114', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Pays de la Loire', '', '', '10', '', '', '', '1', '2015-04-17', '2015-04-17', '1', '', '', '', 0, '0000-00-00'),
(3622, 0, 0, 'julia.berthet@vousdesirez.fr', '8449b43679a87ee4cc607872e994dd3c', '', '', '', '', '', '', '', '1 salariĂŠ', 'Bretagne', '', '', '1', '', '', '', '1', '2015-04-08', '2015-04-08', '1', '', '', '', 0, '0000-00-00'),
(3623, 0, 0, 'comad@comad.fr', 'bd23153f21e68224a58d81a0581a7d87', '', '', '', '', '', '', '', '1 salariĂŠ', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '3', '', '', '', '1', '2015-04-08', '2015-04-08', '1', '', '', '', 0, '0000-00-00'),
(3624, 0, 0, 'miguel17nicolas@gmail.com', 'f82d71a6491c31b384ab5b57d85b6593', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '1', '', '', '', '1', '2015-04-09', '2015-04-09', '1', '', '', '', 0, '0000-00-00'),
(3627, 0, 0, 'fannywallon@hotmail.com', '27ebfb8e9d0ddb6bf1628e7f3ab10f89', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '2015', '', '', '', '1', '2015-04-20', '2015-04-20', '0', '', '5de366c0c881238c3fe4a8c4fe2e5391', '', 0, '0000-00-00'),
(3634, 0, 0, 'patriceboulanger@outlook.fr', '2033884abc37d7a6aa876b2d2255cf99', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-04-28', '2015-04-28', '1', '', '', '', 0, '0000-00-00'),
(3633, 0, 0, 'le.krief@sd2m.fr', 'c3d2c874823f06fc5289203fda1c15be', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Ăle-de-France', '', '', '1991', '', '', '', '1', '2015-04-27', '2015-04-27', '1', '', '', '', 0, '0000-00-00'),
(3631, 0, 0, 'ncurtelin@opinion-way.com', '8787fb27bc59410e72cc6eef3611eabc', '', '', '', '', '', '', '', 'Aucun', 'Provence-Alpes-CĂ´te d''Azur', '', '', '7', '', '', '', '1', '2015-04-22', '2015-04-22', '1', '', '', '', 0, '0000-00-00'),
(3637, 0, 0, 'l.weil@spark-rp.com', '371bf8c859920c62ed9f658c68b6b872', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Provence-Alpes-CĂ´te d''Azur', '', '', '2', '', '', '', '1', '2015-04-29', '2015-04-29', '0', '', '24645861fffab8c967e8a551bd572686', '', 0, '0000-00-00'),
(3635, 0, 0, 'arnaud.bonnefond@inventive.tm.fr', '7bbf590176a45fc7393352e02baca6c4', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '4', '', '', '', '1', '2015-04-28', '2015-04-28', '1', '', '', '', 0, '0000-00-00'),
(3636, 0, 0, 'poetesanspapiers@yahoo.fr', 'af0ea137c7914582d29f821d8ab94ae5', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '3', '', '', '', '1', '2015-04-28', '2015-04-28', '1', '', '', '', 0, '0000-00-00'),
(3638, 0, 0, 'christophe.pelletier@adventech.fr', 'b268b9282bc6d293a620928133843b9e', '', '', '', '', '', '', '', 'De 21 Ă  50 salariĂŠs', 'Basse-Normandie et Haute-Normandie', '', '', '11', '', '', '', '1', '2015-05-01', '2015-05-01', '1', '', '', '', 0, '0000-00-00'),
(3639, 0, 0, 'audreystoussaint@gmail.com', '40f7c2c86906d6db646aaefa0b7d27bc', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '1', '', '', '', '1', '2015-05-05', '2015-05-05', '1', '', '', '', 0, '0000-00-00'),
(3640, 0, 0, 'olestang@outlook.com', 'fd6c9fd7ef275c957c95370fb22266f8', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '0', '', '', '', '1', '2015-05-05', '2015-05-05', '1', '', '', '', 0, '0000-00-00'),
(3641, 0, 0, 'LB-PEINTRE@hotmail.com', '1d01cd575a5de73190b61bb70861a599', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '2', '', '', '', '1', '2015-05-07', '2015-05-07', '0', '', '4a3dc623c57ded51eaed8cb57e3dafc2', '', 0, '0000-00-00'),
(3642, 0, 0, 'arnaud.hodencq@eiffage.com', 'be0933009d8e6c6385ab798325a64cf4', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Basse-Normandie et Haute-Normandie', '', '', '1', '', '', '', '1', '2015-05-07', '2015-05-07', '1', '', '', '', 0, '0000-00-00'),
(3643, 0, 0, 'contact@oxygeneassistanat.com', '0c11f3b6b21cc7e29c524f40c446bc66', '', '', '', '', '', '', '', 'Aucun', 'Auvergne et RhĂ´ne-Alpes', '', '', '1', '', '', '', '1', '2015-05-11', '2015-05-11', '0', '', '1c8b7ebb6c733e3543ee54474f1561a5', '', 0, '0000-00-00'),
(3644, 0, 0, 'contact@interface2a.com', '53b699a72d3a233f44812ba9514dfb6b', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Corse', '', '', '7', '', '', '', '1', '2015-05-11', '2015-05-11', '1', '', '', '', 0, '0000-00-00'),
(3645, 0, 0, 'soucaro@ymail.com', '3fcc080e77f30390c13e7bd27e41430c', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '0', '', '', '', '1', '2015-05-13', '2015-05-13', '1', '', '', '', 0, '0000-00-00'),
(3646, 0, 0, 'coutonjerome@gmail.com', '6574e91aa0be348f5c92be44b5336acf', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '2', '', '', '', '1', '2015-05-22', '2015-05-22', '1', '', '', '', 0, '0000-00-00'),
(3647, 0, 0, 'thierry.janniaux@irondell-group.fr', '69fa51391ecf02c617ced03a1c253d39', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '6', '', '', '', '1', '2015-05-23', '2015-05-23', '1', '', '', '', 0, '0000-00-00'),
(3648, 0, 0, 'carine.rouvier@laposte.net', '548b54764541ee921f0dfe5055e24323', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Ăle-de-France', '', '', '10', '', '', '', '1', '2015-05-23', '2015-05-23', '1', '', '', '', 0, '0000-00-00'),
(3649, 0, 0, 'vincent.riggi@sovitec.com', '2be5b5b42bc566524a23676b3d0c524c', '', '', '', '', '', '', '', 'De 21 Ă  50 salariĂŠs', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '6', '', '', '', '1', '2015-05-26', '2015-05-26', '1', '', '', '', 0, '0000-00-00'),
(3707, 0, 0, 'jouets.latremblade@gmail.com', 'd99bf757ab8237b6e29445f1cd46ccf5', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-06-20', '2015-06-20', '1', '', '', '', 0, '0000-00-00'),
(3651, 0, 0, 'gchaussee@cassissium.com', '5e4e9841a71fc47ecfbec02a660e8346', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Bourgogne et Franche ComtĂŠ', '', '', '20', '', '', '', '1', '2015-05-28', '2015-05-28', '1', '', '', '', 0, '0000-00-00'),
(3652, 0, 0, 'f@germain.fr', '04b7e578616ca78d0999ca142461f5bd', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '16', '', '', '', '1', '2015-05-28', '2015-05-28', '1', '', '', '', 0, '0000-00-00'),
(3653, 0, 0, 'llagoutte@cma-industry.com', '34d44af8194ab7d23658933d6fd7bad6', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '6', '', '', '', '1', '2015-05-29', '2015-05-29', '1', '', '', '', 0, '0000-00-00'),
(3664, 0, 0, 'vincent.kraus@senioradom.com', 'f1c1052b05ea2bd79d0b5c635436d7d8', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Ăle-de-France', '', '', '2', '', '', '', '1', '2015-06-03', '2015-06-03', '1', '', '', '', 0, '0000-00-00'),
(3665, 0, 0, 'fanny@bokeh-production.fr', '3065d14b1e0f2ca129e65e41664ec11c', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '2', '', '', '', '1', '2015-06-03', '2015-06-03', '1', '', '', '', 0, '0000-00-00'),
(3655, 0, 0, 'b.heemeryck@mitjavila.com', '687dc5d01e42f43274fb8675fd0a6b58', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '13', '', '', '', '1', '2015-05-29', '2015-05-29', '1', '', '', '', 0, '0000-00-00'),
(3682, 0, 0, 'contact@bordeauxmyhome.com', '46da5a65389f86d3a1ff28379a21a526', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '0', '', '', '', '1', '2015-06-11', '2015-06-11', '1', '', '', '', 0, '0000-00-00'),
(3657, 0, 0, 'eric.crestey@wanadoo.fr', '65f1ac6ab21361c959cdf74e465bd17b', '', '', '', '', '', '', '', 'Aucun', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '1988', '', '', '', '1', '2015-05-31', '2015-05-31', '1', '', '', '', 0, '0000-00-00'),
(3658, 0, 0, 'jacques.bunel@built.fr', 'c52cee846a8887ad27c38afc0db6d2a0', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Basse-Normandie et Haute-Normandie', '', '', '1987', '', '', '', '1', '2015-05-31', '2015-05-31', '0', '', '45e223e321de32eeaa0619db14cf0eac', '', 0, '0000-00-00'),
(3659, 0, 0, 'bunel@built.fr', 'c52cee846a8887ad27c38afc0db6d2a0', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Basse-Normandie et Haute-Normandie', '', '', '1987', '', '', '', '1', '2015-05-31', '2015-05-31', '0', '', 'aa8e984c549db2bb7faf2180ff857fd6', '', 0, '0000-00-00'),
(3660, 0, 0, 'pkuchly@era-sib.com', '1b43329947aa9b65bd6e7e09e5768d4e', '', '', '', '', '', '', '', 'De 21 Ă  50 salariĂŠs', 'Ăle-de-France', '', '', '13', '', '', '', '1', '2015-06-01', '2015-06-01', '1', '', '', '', 0, '0000-00-00'),
(3661, 0, 0, 'gilles.seillard@wanadoo.fr', '5839e3715e81dc1a4cc2be85b71148ef', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '10', '', '', '', '1', '2015-06-01', '2015-06-01', '1', '', '', '', 0, '0000-00-00'),
(3662, 0, 0, 'f.ligout@acpvous.fr', 'd90b61df888e933ba12df04420bef286', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '1', '', '', '', '1', '2015-06-02', '2015-06-02', '1', '', '', '', 0, '0000-00-00'),
(3663, 0, 0, 'contact@davelopweb.fr', '850bc7bb94d476c6bf078a296626a93c', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-06-02', '2015-06-02', '1', '', '', '', 0, '0000-00-00'),
(3666, 0, 0, 'dolores.adamski@grex.fr', '3074c2bf76a26e9f887d3ee133c303cc', '', '', '', '', '', '', '', 'De 11 Ă  20 salariĂŠs', 'Auvergne et RhĂ´ne-Alpes', '', '', '1', '', '', '', '1', '2015-06-03', '2015-06-03', '1', '', '', '', 0, '0000-00-00'),
(3667, 0, 0, 's.prudhon@hotmail.fr', '4f03653bb6238c2061be9b6a2fd92013', '', '', '', '', '', '', '', 'Aucun', 'Basse-Normandie et Haute-Normandie', '', '', '9', '', '', '', '1', '2015-06-03', '2015-06-03', '1', '', '', '', 0, '0000-00-00'),
(3668, 0, 0, 'nbrige@caen.cci.fr', '624d483f1d9cc757128061d5bb1eeb4c', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Basse-Normandie et Haute-Normandie', '', '', '100', '', '', '', '1', '2015-06-04', '2015-06-04', '1', '', '', '', 0, '0000-00-00'),
(3679, 0, 0, 'franck.dufrien@everbrand.eu', '6a6334446ee66b629edc85ab95b47271', '', '', '', '', '', '', '', 'De 11 Ă  20 salariĂŠs', 'Ăle-de-France', '', '', '8', '', '', '', '1', '2015-06-09', '2015-06-09', '1', '', '', '', 0, '0000-00-00'),
(3680, 0, 0, 'la-vie-facile@orange.fr', '2459aeaf39d6a9c075c4085b39fce26e', '', '', '', '', '', '', '', 'Aucun', 'Corse', '', '', '2', '', '', '', '1', '2015-06-09', '2015-06-09', '1', '', '', '', 0, '0000-00-00'),
(3681, 0, 0, 'pdutruc@seolis.net', '1f5dde44e20374327286d8dec893b920', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '9', '', '', '', '1', '2015-06-10', '2015-06-10', '1', '', '', '', 0, '0000-00-00'),
(3671, 0, 0, 'Cecileagnes.andre@laposte.net', 'e31b120e31610e45bcc5d7e1e5d00290', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '9', '', '', '', '1', '2015-06-05', '2015-06-05', '1', '', '', '', 0, '0000-00-00'),
(3672, 0, 0, 'stephanieode@matelice.com', 'ffc7eed34b5ffeff04c754e3f94c6a09', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '9', '', '', '', '1', '2015-06-05', '2015-06-05', '1', '', '', '', 0, '0000-00-00'),
(3673, 0, 0, 'antoine.rouge@rougecom.com', 'f243e04ea37777f378ad1664bd063d18', '', '', '', '', '', '', '', '1 salariĂŠ', 'Bretagne', '', '', '1', '', '', '', '1', '2015-06-05', '2015-06-05', '1', '', '', '', 0, '0000-00-00'),
(3674, 0, 0, 'eleonorequarre@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Ăle-de-France', '', '', '4', '', '', '', '1', '2015-06-05', '2015-06-05', '1', '', '', '', 0, '0000-00-00'),
(3675, 0, 0, 'fabreconseil@gmail.com', '092c39dbfe42ed18f31a16c3905052a5', '', '', '', '', '', '', '', '1 salariĂŠ', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '6', '', '', '', '1', '2015-06-06', '2015-06-06', '1', '', '', '', 0, '0000-00-00'),
(3676, 0, 0, 'Contact@mirabello-immobilier.com', '3f7e24fec00639d504ab6423dff7a64c', '', '', '', '', '', '', '', '1 salariĂŠ', 'Provence-Alpes-CĂ´te d''Azur', '', '', '1', '', '', '', '1', '2015-06-08', '2015-06-08', '1', '', '', '', 0, '0000-00-00'),
(3683, 0, 0, 'peychesfils@orange.fr', 'fe394da33c03f64cce4d6146d232656b', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '15', '', '', '', '1', '2015-06-11', '2015-06-11', '1', '', '', '', 0, '0000-00-00'),
(3684, 0, 0, 'floreale@wanadoo.fr  ', '16977a6020775c7c61e3a0a4d9ce3d95', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1976', '', '', '', '1', '2015-06-11', '2015-06-11', '1', '', '', '', 0, '0000-00-00'),
(3685, 0, 0, 'clio1208-newsletters@yahoo.fr', '4b7be1ed5bb4321b55d6eedddc4b4646', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-06-12', '2015-06-12', '1', '', '', '', 0, '0000-00-00'),
(3686, 0, 0, 'simon.jochum@alteom.com', 'ba4744f1e1741ca1e445ace91e394c7a', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Ăle-de-France', '', '', '4', '', '', '', '1', '2015-06-12', '2015-06-12', '1', '', '', '', 0, '0000-00-00'),
(3687, 0, 0, 'f.demoncade@gmail.com', 'e015531fccf90b49db48ab501e81513b', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '0', '', '', '', '1', '2015-06-12', '2015-06-12', '1', '', '', '', 0, '0000-00-00'),
(3688, 0, 0, 'sebastien.moreau@gestelia.com', 'd016bd59a603d344e3eb6649998788f6', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '2', '', '', '', '1', '2015-06-12', '2015-06-12', '1', '', '', '', 0, '0000-00-00'),
(3695, 0, 0, 'fatorilu@gmail.com', '0ddd63424b5af786fdd47bcc9209bcf3', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '3', '', '', '', '1', '2015-06-17', '2015-06-17', '0', '', 'b292c63294b8ebd7861179d6051abcc0', '', 0, '0000-00-00'),
(3696, 0, 0, 'contact@dezkemm.com', '22a78740dcbb12c506bc3b089676719b', '', '', '', '', '', '', '', 'Aucun', 'Bretagne', '', '', '1', '', '', '', '1', '2015-06-17', '2015-06-17', '1', '', '', '', 0, '0000-00-00'),
(3697, 0, 0, 'fte@territoiresetentreprises.fr', '67dc5190c3fee5d4ea0b42965f46aa33', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '5', '', '', '', '1', '2015-06-17', '2015-06-17', '0', '', '22601f450c3cb238d248f9894c72ee94', '', 0, '0000-00-00'),
(3698, 0, 0, 'jr@dubail.eu', 'a1d68e1cf3331423017c12ff29eadb83', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '24', '', '', '', '1', '2015-06-17', '2015-06-17', '1', '', '', '', 0, '0000-00-00'),
(3699, 0, 0, 'contact@bioeploy.com', '830d1ab1b2aeeb959613c80ff2c95d9a', '', '', '', '', '', '', '', 'Aucun', 'Basse-Normandie et Haute-Normandie', '', '', '3', '', '', '', '1', '2015-06-17', '2015-06-17', '0', '', '3b4b271349534ed4c431ec7ce09d982f', '', 0, '0000-00-00'),
(3700, 0, 0, 'juliebeille@aliceadsl.fr', 'b0dbe90ea6c1ced9c04d286f96b05328', '', '', '', '', '', '', '', 'Aucun', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '5', '', '', '', '1', '2015-06-17', '2015-06-17', '1', '', '', '', 0, '0000-00-00'),
(3701, 0, 0, 'denis@moinetfils.fr', '7dde60e57bc6460a9964ac0c9188ac5c', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '22', '', '', '', '1', '2015-06-18', '2015-06-18', '0', '', '4d8b8c28cf0a373ef342e59350f47658', '', 0, '0000-00-00'),
(3702, 0, 0, 'p.dutruc@seolis.net', '1f5dde44e20374327286d8dec893b920', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '9', '', '', '', '1', '2015-06-18', '2015-06-18', '0', '', '4ca05de555223d2e8cf6106960fb6eb6', '', 0, '0000-00-00'),
(3703, 0, 0, 'a.baltzli@couponbook.fr', '7e5aa88c220e8e660536a07a4e1ae084', '', '', '', '', '', '', '', 'Aucun', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '1', '', '', '', '1', '2015-06-18', '2015-06-18', '1', '', '', '', 0, '0000-00-00'),
(3706, 0, 0, 'stephanie.pietre@alterela.fr', '5adc8950554b5997fc630171512bd411', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '2', '', '', '', '1', '2015-06-19', '2015-06-19', '1', '', '', '', 0, '0000-00-00'),
(3708, 0, 0, 'DEROIN.AXA@WANADOO.FR', '27ca29021481a23d819a982e253bc05e', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Bourgogne et Franche ComtĂŠ', '', '', '20', '', '', '', '1', '2015-06-22', '2015-06-22', '1', '', '', '', 0, '0000-00-00'),
(3709, 0, 0, 'Alex.benoehr@wsicyberzen.cim', '73e4d48c5358890a63acb09f3502ef26', '', '', '', '', '', '', '', '1 salariĂŠ', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-06-22', '2015-06-22', '0', '', 'e8c906465ba2ed50d014db2924884cf9', '', 0, '0000-00-00'),
(3710, 0, 0, 'peps-sasu@bbox.fr', 'fe00f193370f3d35e9c63930ffc79afa', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '4', '', '', '', '1', '2015-06-23', '2015-06-23', '1', '', '', '', 0, '0000-00-00'),
(3711, 0, 0, 'alouisou93@gmail.com', 'a13ac91de3d0466e3f895069eae2d052', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Nord-Pas-de-Calais et Picardie', '', '', '1', '', '', '', '1', '2015-06-24', '2015-06-24', '1', '', '', '', 0, '0000-00-00'),
(3712, 0, 0, 'will.herzog@yahoo.fr', 'bdb6e42961db0b86c14a649663ee4384', '', '', '', '', '', '', '', 'Aucun', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '1', '', '', '', '1', '2015-06-26', '2015-06-26', '1', '', '', '', 0, '0000-00-00'),
(3713, 0, 0, 'atelierdeveloppement29@gmail.com', '91de800254bc38b36dc96b75a5436b22', '', '', '', '', '', '', '', 'Aucun', 'Bretagne', '', '', '2', '', '', '', '1', '2015-06-26', '2015-06-26', '1', '', '', '', 0, '0000-00-00'),
(3714, 0, 0, 'courauddamien@gmail.com', '534bc24614c2e0c44ed5768af49201ae', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-06-27', '2015-06-27', '1', '', '', '', 0, '0000-00-00'),
(3715, 0, 0, 'renaudpolly@gmail.com', 'bf1c2f751f3286030a13fd2fef560069', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '3', '', '', '', '1', '2015-06-29', '2015-06-29', '0', '', 'f636046e373369828d8e54bc8487bc7d', '', 0, '0000-00-00'),
(3716, 0, 0, 'pascaljacquot@roboticworkshop.fr', 'e2e08141cde6eb5101c73bcb25dc7acc', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '2', '', '', '', '1', '2015-06-29', '2015-06-29', '1', '', '', '', 0, '0000-00-00'),
(3717, 0, 0, 'alaintest@yahoo.fr', '25f9e794323b453885f5181f1b624d0b', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Pays de la Loire', '', '', '6', '', '', '', '1', '2015-07-03', '2015-07-03', '0', '', 'c3462ab9fab9216e3932df26bb2eaee3', '', 0, '0000-00-00'),
(3718, 0, 0, 'brunehildeperrois@gmail.com', '36750db3f2c26b1621c3e589ded1b65c', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '0', '', '', '', '1', '2015-07-06', '2015-07-06', '1', '', '', '', 0, '0000-00-00'),
(3719, 0, 0, 'marketing@mondassur.com', '69832c9dd22d240231f60cdfe8bba2cd', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '10', '', '', '', '1', '2015-07-07', '2015-07-07', '1', '', '', '', 0, '0000-00-00'),
(3720, 0, 0, 'benjamin@laboxy.fr', 'a6fa558b5122671c3df69cf5eecc958a', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '1', '', '', '', '1', '2015-07-07', '2015-07-07', '1', '', '', '', 0, '0000-00-00'),
(3721, 0, 0, 'lelautrecresto@yahoo.fr', '324bc5f668a34d16993b52fada792f52', '', '', '', '', '', '', '', 'Aucun', 'Nord-Pas-de-Calais et Picardie', '', '', '11', '', '', '', '1', '2015-07-13', '2015-07-13', '1', '', '', '', 0, '0000-00-00'),
(3722, 0, 0, 'technicalassistantwork@gmail.com', '7e8580290890ca506d282d556a170796', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '2013', '', '', '', '1', '2015-07-17', '2015-07-17', '1', '', '', '', 0, '0000-00-00'),
(3723, 0, 0, 'christinepanais@laposte.net', 'c544139afe0e0c04bdf36749eb0755e4', '', '', '', '', '', '', '', 'Aucun', 'Centre', '', '', '0', '', '', '', '1', '2015-07-20', '2015-07-20', '1', '', '', '', 0, '0000-00-00'),
(3724, 0, 0, 'pjaumain@hen-conseil.eu', '8400d7eeb90b385ab293a9852e1aa36b', '', '', '', '', '', '', '', '1 salariĂŠ', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '1', '', '', '', '1', '2015-07-20', '2015-07-20', '1', '', '', '', 0, '0000-00-00'),
(3725, 0, 0, 'snjb.cb@orange.fr', '24bbef3c49e748598ee6b4ed2a26db59', '', '', '', '', '', '', '', '1 salariĂŠ', 'Basse-Normandie et Haute-Normandie', '', '', '1', '', '', '', '1', '2015-07-20', '2015-07-20', '1', '', '', '', 0, '0000-00-00'),
(3726, 0, 0, 'arnaud.molin@champmarket.com', '33ec81c05adc1bedae90408d0cffe7e9', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '5', '', '', '', '1', '2015-07-20', '2015-07-20', '1', '', '', '', 0, '0000-00-00'),
(3727, 0, 0, 'j.luc.heimburger@wanadoo.fr', '93dd83153f16a9708a6f2d6ade847d61', '', '', '', '', '', '', '', 'De 21 Ă  50 salariĂŠs', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '25', '', '', '', '1', '2015-07-22', '2015-07-22', '1', '', '', '', 0, '0000-00-00'),
(3728, 0, 0, 'henri@aqoa.fr', '3179c4cbaf321a1585ead0e4708bcacb', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Ăle-de-France', '', '', '6', '', '', '', '1', '2015-07-22', '2015-07-22', '1', '', '', '', 0, '0000-00-00'),
(3729, 0, 0, 'gilbataille@aol.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', '', '1 salariĂŠ', 'Provence-Alpes-CĂ´te d''Azur', '', '', '10', '', '', '', '1', '2015-08-01', '2015-08-01', '0', '', '311361e36df8269cdf51b9e21c36dff9', '', 0, '0000-00-00'),
(3730, 0, 0, 'sgipfuslesecuritesarl@yahoo.fr', '6ba9591e651a9e545470868d61bc5c21', '', '', '', '', '', '', '', '1 salariĂŠ', 'Bourgogne et Franche ComtĂŠ', '', '', '2', '', '', '', '1', '2015-08-13', '2015-08-13', '1', '', '', '', 0, '0000-00-00'),
(3731, 0, 0, 'sophie.nanin@gmail.com', 'f58944a074923f15f5d6bfcdadf9bff3', '', '', '', '', '', '', '', '1 salariĂŠ', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '3', '', '', '', '1', '2015-08-23', '2015-08-23', '1', '', '', '', 0, '0000-00-00'),
(3732, 0, 0, 'vincent.guibert@acde-conseil.com', 'f75ed75301462885544ade38f7cd4551', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Ăle-de-France', '', '', '12', '', '', '', '1', '2015-08-27', '2015-08-27', '1', '', '', '', 0, '0000-00-00'),
(3733, 0, 0, 'silnickiflorian@gmail.com', '8f9e6ce265a5a4bb9d5ee26536b77787', '', '', '', '', '', '', '', 'Plus de 50 salariĂŠs', 'Ăle-de-France', '', '', '4', '', '', '', '1', '2015-08-27', '2015-08-27', '1', '', '', '', 0, '0000-00-00'),
(3734, 0, 0, 'ruchonfe@gmail.com', 'bd6a322e9550bea0d4bc12ada6b8ebd8', '', '', '', '', '', '', '', 'De 21 Ă  50 salariĂŠs', 'Ăle-de-France', '', '', '1', '', '', '', '1', '2015-08-30', '2015-08-30', '1', '', '', '', 0, '0000-00-00'),
(3735, 0, 0, 'net_haus@aol.fr', '8e20a7d94ae09b931a15d247adb10c1c', '', '', '', '', '', '', '', 'Aucun', 'Aquitaine, Limousin et Poitou-Charentes', '', '', '1', '', '', '', '1', '2015-08-31', '2015-08-31', '1', '', '', '', 0, '0000-00-00'),
(3736, 0, 0, 'bruno.guillard@fleepit.com', '869a95700236d136e97e71cea33c6650', '', '', '', '', '', '', '', '1 salariĂŠ', 'Ăle-de-France', '', '', '2004', '', '', '', '1', '2015-09-01', '2015-09-01', '1', '', '', '', 0, '0000-00-00'),
(3737, 0, 0, 'reine-marie@noblecourt.com', '14f27fbaf96d94eb4825f1fe820341eb', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Nord-Pas-de-Calais et Picardie', '', '', '34', '', '', '', '1', '2015-09-05', '2015-09-05', '0', '', 'f4ee57932fafe61b0bc6edb193518809', '', 0, '0000-00-00'),
(3739, 0, 0, 'contact@solocycles.fr', '07893b1b7c2b57b79e177af8692c506d', '', '', '', '', '', '', '', 'Aucun', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '7', '', '', '', '1', '2015-09-25', '2015-09-25', '1', '', '', '', 0, '0000-00-00'),
(3740, 0, 0, 'barthalon.laure@gmail.com', '059511d440b902e6fa0a63c03c3123f5', '', '', '', '', '', '', '', 'Aucun', 'Auvergne et RhĂ´ne-Alpes', '', '', '5', '', '', '', '1', '2015-10-15', '2015-10-15', '1', '', '', '', 0, '0000-00-00'),
(3741, 0, 0, 'contact@evolutiveweb.com', '4df055723ceada34e20adc80c242a6cf', '', '', '', '', '', '', '', '1 salariĂŠ', 'Centre', '', '', '2', '', '', '', '1', '2015-10-21', '2015-10-21', '1', '', '', '', 0, '0000-00-00'),
(3742, 0, 0, 'janine.pignat@free.fr', '2ba62badeb01d51c274cbbfe60b7cd6c', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Languedoc-Roussillon et Midi-PyrĂŠnĂŠes', '', '', '1', '', '', '', '1', '2015-10-25', '2015-10-25', '1', '', '', '', 0, '0000-00-00'),
(3743, 0, 0, 'sab.actus@gmail.com', 'f7b897b914302b827b21041b728dd980', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '0', '', '', '', '1', '2015-10-26', '2015-10-26', '0', '', '54be08fbc3eb03dfa5fc0b83ca45d107', '', 0, '0000-00-00'),
(3744, 0, 0, 'achatsetsolutions@orange.fr', 'ed2c0e353e7c799ff5423ad118fb977a', '', '', '', '', '', '', '', 'Aucun', 'Bretagne', '', '', '0', '', '', '', '1', '2015-11-26', '2015-11-26', '1', '', '', '', 0, '0000-00-00'),
(3745, 0, 0, 'Francois@cheetah-technologies.fr', '82a7093283ae34b5fb6bd2108c16719f', '', '', '', '', '', '', '', 'Aucun', 'Alsace, Champagne-Ardenne et Lorraine', '', '', '1', '', '', '', '1', '2015-11-26', '2015-11-26', '1', '', '', '', 0, '0000-00-00'),
(3746, 0, 0, 'erregeerts.jean-marie@yandex.com', '85dbecce7449065537f69b08d8701470', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '1990', '', '', '', '1', '2015-12-18', '2015-12-18', '1', '', '', '', 0, '0000-00-00'),
(3747, 0, 0, 'mathieurochefeuille@gmail.com', '83b5eabe9b58cf44121328a020171fe2', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '2', '', '', '', '1', '2016-01-20', '2016-01-20', '1', '', '', '', 0, '0000-00-00'),
(3748, 0, 0, 'Fpeytour@agencetempo.com', 'a26bac4a551ef9e16e381a5481383b40', '', '', '', '', '', '', '', 'De 6 Ă  10 salariĂŠs', 'Ăle-de-France', '', '', '23', '', '', '', '1', '2016-01-27', '2016-01-27', '1', '', '', '', 0, '0000-00-00'),
(3749, 0, 0, 'amzperso@gmail.com', '39370c3b3fb6d95168c24037b0107fed', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '2', '', '', '', '1', '2016-01-28', '2016-01-28', '1', '', '', '', 0, '0000-00-00'),
(3750, 0, 0, 'rmbazile@gmail.com', '9aa29fbe85b8e6de023c0a4097081707', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '2014', '', '', '', '1', '2016-01-28', '2016-01-28', '0', '', '7ea15091447470ed820598cc56b11099', '', 0, '0000-00-00'),
(3751, 0, 0, 'marianne@agence-leon.fr', '2c2367df71e26544336d4e6b73567a70', '', '', '', '', '', '', '', 'De 2 Ă  5 salariĂŠs', 'Ăle-de-France', '', '', '1', '', '', '', '1', '2016-01-28', '2016-01-28', '1', '', '', '', 0, '0000-00-00'),
(3752, 0, 0, 'Jerome.lenfant@infograph-tech.com', '4882e006f5ae6f6b74c58305b4ab4d72', '', '', '', '', '', '', '', 'Aucun', 'Ăle-de-France', '', '', '5', '', '', '', '1', '2016-01-29', '2016-01-29', '1', '', '', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_commentmeta`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'https://wordpress.org/', '', '2015-07-30 17:43:18', '2015-07-30 17:43:18', 'Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0),
(2, 1, 'admin@admin.com', 'tprokop@prothomsoft.com', '', '93.180.169.122', '2015-07-30 17:44:28', '2015-07-30 17:44:28', 'comment', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=157 ;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://grandeconsultation.fr/blog', 'yes'),
(2, 'home', 'http://grandeconsultation.fr/blog', 'yes'),
(3, 'blogname', 'Grande Consultation Blog', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'tprokop@prothomsoft.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'gzipcompression', '0', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'advanced_edit', '0', 'yes'),
(37, 'comment_max_links', '2', 'yes'),
(38, 'gmt_offset', '0', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'twentyfifteen', 'yes'),
(42, 'stylesheet', 'twentyfifteen', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '0', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'subscriber', 'yes'),
(49, 'db_version', '31536', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '2', 'yes'),
(54, 'show_on_front', 'posts', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '0', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '0', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_text', 'a:0:{}', 'yes'),
(81, 'widget_rss', 'a:0:{}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', '', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '0', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '31536', 'yes'),
(89, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(90, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(91, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:3:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:13:"array_version";i:3;}', 'yes'),
(97, 'cron', 'a:5:{i:1439455790;a:1:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1439487799;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1439487827;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1439493180;a:1:{s:20:"wp_maybe_auto_update";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}s:7:"version";i:2;}', 'yes'),
(99, 'rewrite_rules', 'a:58:{s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:58:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:68:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:88:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$";s:85:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1";s:77:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:65:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(/[0-9]+)?/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]";s:47:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:57:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:77:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]";s:51:"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]";s:38:"([0-9]{4})/comment-page-([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&cpage=$matches[2]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)(/[0-9]+)?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";}', 'yes'),
(106, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1439452200;s:7:"checked";a:3:{s:13:"twentyfifteen";s:3:"1.2";s:14:"twentyfourteen";s:3:"1.4";s:14:"twentythirteen";s:3:"1.5";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'yes'),
(108, '_transient_random_seed', '7db5debd0182912662efea358caa6f9a', 'yes'),
(109, '_site_transient_timeout_browser_e14f41f376cc3701f03d93ea21192f2a', '1438883014', 'yes'),
(110, '_site_transient_browser_e14f41f376cc3701f03d93ea21192f2a', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:7:"Firefox";s:7:"version";s:4:"39.0";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:2:"16";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(111, 'can_compress_scripts', '0', 'yes'),
(112, '_transient_timeout_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1438321418', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(113, '_transient_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n\n\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:49:"\n	\n	\n	\n	\n	\n	\n	\n	\n	\n	\n		\n		\n		\n		\n		\n		\n		\n		\n		\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:3:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"WordPress News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:26:"https://wordpress.org/news";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:14:"WordPress News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:13:"lastBuildDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2015 23:50:43 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:37:"http://wordpress.org/?v=4.3-RC1-33515";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:10:{i:0;a:6:{s:4:"data";s:48:"\n		\n		\n		\n		\n		\n				\n		\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:31:"WordPress 4.3 Release Candidate";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"https://wordpress.org/news/2015/07/wordpress-4-3-release-candidate/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:76:"https://wordpress.org/news/2015/07/wordpress-4-3-release-candidate/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2015 23:50:43 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:3:"4.3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3817";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:340:"The release candidate for WordPress 4.3 is now available. We&#8217;ve made more than 100 changes since releasing Beta 4 a week ago. RC means we think we’re done, but with millions of users and thousands of plugins and themes, it’s possible we’ve missed something. We hope to ship WordPress 4.3 on Tuesday, August 18, but we [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Konstantin Obenland";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2256:"<p>The release candidate for WordPress 4.3 is now available.</p>\n<p>We&#8217;ve made more than <a href="https://core.trac.wordpress.org/log/trunk?action=stop_on_copy&amp;mode=stop_on_copy&amp;rev=33512&amp;stop_rev=33372&amp;limit=120">100 changes</a> since releasing Beta 4 a week ago. RC means we think we’re done, but with millions of users and thousands of plugins and themes, it’s possible we’ve missed something. We hope to ship WordPress 4.3 on <strong>Tuesday, August 18</strong>, but we need your help to get there.</p>\n<p>If you haven’t tested 4.3 yet, now is the time!</p>\n<p><strong>Think you&#8217;ve found a bug?</strong> Please post to the <a href="https://wordpress.org/support/forum/alphabeta/">Alpha/Beta support forum</a>. If any known issues come up, you&#8217;ll be able to <a href="https://core.trac.wordpress.org/report/5">find them here</a>.</p>\n<p>To test WordPress 4.3 RC1, you can use the <a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin or you can <a href="https://wordpress.org/wordpress-4.3-RC1.zip">download the release candidate here</a> (zip).</p>\n<p>For more information about what’s new in version 4.3, check out the <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-1/">Beta 1</a>, <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-2/">Beta 2</a>, <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-3/">Beta 3</a>, and <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-4/">Beta 4</a> blog posts.</p>\n<p><strong>Developers</strong>, please test your plugins and themes against WordPress 4.3 and update your plugin&#8217;s <em>Tested up to</em> version in the readme to 4.3 before next week. If you find compatibility problems, we never want to break things, so please be sure to post to the support forums so we can figure those out before the final release.</p>\n<p>Be sure to <a href="https://make.wordpress.org/core/">follow along the core development blog</a>, where we&#8217;ll continue to post <a href="https://make.wordpress.org/core/tag/dev-notes+4-3/">notes for developers</a> for 4.3.</p>\n<p><em>Drei Monate Arbeit</em><br />\n<em>Endlich das Ziel vor Augen</em><br />\n<em>Bald hab ich Urlaub!</em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:72:"https://wordpress.org/news/2015/07/wordpress-4-3-release-candidate/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:48:"\n		\n		\n		\n		\n		\n				\n		\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:48:"WordPress 4.2.3 Security and Maintenance Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"https://wordpress.org/news/2015/07/wordpress-4-2-3/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:60:"https://wordpress.org/news/2015/07/wordpress-4-2-3/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Jul 2015 11:21:10 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Security";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:3:"4.2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3807";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:380:"WordPress 4.2.3 is now available. This is a security release for all previous versions and we strongly encourage you to update your sites immediately. WordPress versions 4.2.2 and earlier are affected by a cross-site scripting vulnerability, which could allow users with the Contributor or Author role to compromise a site. This was initially reported by Jon Cave and [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Gary Pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2708:"<p>WordPress 4.2.3 is now available. This is a<strong> security release</strong> for all previous versions and we strongly encourage you to update your sites immediately.</p>\n<p>WordPress versions 4.2.2 and earlier are affected by a cross-site scripting vulnerability, which could allow users with the Contributor or Author role to compromise a site. This was initially reported by <a href="https://profiles.wordpress.org/duck_">Jon Cave</a> and fixed by <a href="http://www.miqrogroove.com/">Robert Chapin</a>, both of the WordPress security team, and later reported by <a href="http://klikki.fi/">Jouko Pynnönen</a>.</p>\n<p>We also fixed an issue where it was possible for a user with Subscriber permissions to create a draft through Quick Draft. Reported by Netanel Rubin from <a href="https://www.checkpoint.com/">Check Point Software Technologies</a>.</p>\n<p>Our thanks to those who have practiced <a href="https://make.wordpress.org/core/handbook/reporting-security-vulnerabilities/">responsible disclosure</a> of security issues.</p>\n<p>WordPress 4.2.3 also contains fixes for 20 bugs from 4.2. For more information, see the <a href="https://codex.wordpress.org/Version_4.2.3">release notes</a> or consult the <a href="https://core.trac.wordpress.org/log/branches/4.2?rev=33382&amp;stop_rev=32430">list of changes</a>.</p>\n<p><a href="https://wordpress.org/download/">Download WordPress 4.2.3</a> or venture over to Dashboard → Updates and simply click “Update Now.” Sites that support automatic background updates are already beginning to update to WordPress 4.2.3.</p>\n<p>Thanks to everyone who contributed to 4.2.3:</p>\n<p><a href="https://profiles.wordpress.org/jorbin">Aaron Jorbin</a>, <a href="https://profiles.wordpress.org/nacin">Andrew Nacin</a>, <a href="https://profiles.wordpress.org/azaozz">Andrew Ozz</a>, <a href="https://profiles.wordpress.org/boonebgorges">Boone Gorges</a>, <a href="https://profiles.wordpress.org/chriscct7">Chris Christoff</a>, <a href="https://profiles.wordpress.org/dd32">Dion Hulse</a>, <a href="https://profiles.wordpress.org/ocean90">Dominik Schilling</a>, <a href="https://profiles.wordpress.org/iseulde">Ella Iseulde Van Dorpe</a>, <a href="https://profiles.wordpress.org/gabrielperezs">Gabriel Pérez</a>, <a href="https://profiles.wordpress.org/pento">Gary Pendergast</a>, <a href="https://profiles.wordpress.org/mdawaffe">Mike Adams</a>, <a href="https://profiles.wordpress.org/miqrogroove">Robert Chapin</a>, <a href="https://profiles.wordpress.org/nbachiyski">Nikolay Bachiyski</a>, <a href="https://profiles.wordpress.org/magicroundabout">Ross Wintle</a>, and <a href="https://profiles.wordpress.org/wonderboymusic">Scott Taylor</a>.</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2015/07/wordpress-4-2-3/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 4.3 Beta 4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-4/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:65:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-4/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 22 Jul 2015 21:55:25 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3796";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:337:"WordPress 4.3 Beta 4 is now available! This software is still in development, so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the WordPress Beta Tester plugin (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Konstantin Obenland";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2212:"<p>WordPress 4.3 Beta 4 is now available!</p>\n<p><strong>This software is still in development,</strong> so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the <a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can <a href="https://wordpress.org/wordpress-4.3-beta4.zip">download the beta here</a> (zip).</p>\n<p>For more information about what’s new in version 4.3, check out the <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-1/">Beta 1</a>, <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-2/">Beta 2</a>, and <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-3/">Beta 3</a> blog posts. Some of the changes in Beta 4 include:</p>\n<ul>\n<li><span class="s1">Fixed several bugs and broken flows in the </span><span class="s1"><strong>publish box </strong></span><span class="s1">in the edit screen.</span></li>\n<li>Addressed a number of edge cases for word count in the <strong>editor</strong>.</li>\n<li><span class="s1"><strong>Site icons</strong> </span><span class="s1">can now be previewed within the customizer. The feature has been removed from general settings.</span></li>\n<li><strong>Various bug fixes</strong>. We&#8217;ve made <a href="https://core.trac.wordpress.org/log/trunk?action=stop_on_copy&amp;mode=stop_on_copy&amp;rev=33369&amp;stop_rev=33289">more than 60 changes</a> in the last week.</li>\n</ul>\n<p>If you think you’ve found a bug, you can post to the <a href="https://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. Or, if you’re comfortable writing a bug report, <a href="https://core.trac.wordpress.org/">file one on the WordPress Trac</a>. There, you can also find <a href="https://core.trac.wordpress.org/tickets/major">a list of known bugs</a> and <a href="https://core.trac.wordpress.org/query?status=closed&amp;group=component&amp;milestone=4.3">everything we’ve fixed</a>.</p>\n<p><em>Few Tickets Remain</em><br />\n<em>Edge Cases Disappearing</em><br />\n<em>You Must Test Today</em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:61:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-4/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 4.3 Beta 3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-3/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:65:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-3/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 15 Jul 2015 21:49:35 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3787";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:337:"WordPress 4.3 Beta 3 is now available! This software is still in development, so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the WordPress Beta Tester plugin (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Konstantin Obenland";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2529:"<p>WordPress 4.3 Beta 3 is now available!</p>\n<p><strong>This software is still in development,</strong> so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the <a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can <a href="https://wordpress.org/wordpress-4.3-beta3.zip">download the beta here</a> (zip).</p>\n<p>For more information about what’s new in version 4.3, check out the <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-1/">Beta 1</a> and <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-2/">Beta 2</a> blog posts. Some of the changes in Beta 3 include:</p>\n<ul>\n<li>Performance improvements for <strong>Menus in the Customizer</strong>, as well as bug fixes and visual enhancements.</li>\n<li>Added <strong>Site Icon</strong> to the Customizer. The feature is now complete and requires lots of testing. Please help us ensure the site icon feature works well in both Settings and the Customizer.</li>\n<li>The improvements to <strong>Passwords</strong> have been added to the installation flow. When installing and setting up WordPress, a strong password will be suggested to site administrators. Please test and let us know if you encounter issues.</li>\n<li>Improved <strong>accessibility of comments and media list tables</strong>. If you use a screen reader, please let us know if you encounter any issues.</li>\n<li>Lots and lots of code documentation improvements.</li>\n<li><strong>Various other bug fixes</strong>. We&#8217;ve made <a href="https://core.trac.wordpress.org/log?action=stop_on_copy&amp;mode=stop_on_copy&amp;rev=33286&amp;stop_rev=33141&amp;limit=150">more than 140 changes</a> in the last week.</li>\n</ul>\n<p>If you think you’ve found a bug, you can post to the <a href="https://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. Or, if you’re comfortable writing a bug report, <a href="https://core.trac.wordpress.org/">file one on the WordPress Trac</a>. There, you can also find <a href="https://core.trac.wordpress.org/tickets/major">a list of known bugs</a> and <a href="https://core.trac.wordpress.org/query?status=closed&amp;group=component&amp;milestone=4.3">everything we’ve fixed</a>.</p>\n<p><em>Want to test new things?</em><br />\n<em>Wonder how four three shapes up?</em><br />\n<em>Answer: beta three</em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:61:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-3/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 4.3 Beta 2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:65:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Jul 2015 22:04:01 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3769";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:337:"WordPress 4.3 Beta 2 is now available! This software is still in development, so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the WordPress Beta Tester plugin (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Konstantin Obenland";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2876:"<p>WordPress 4.3 Beta 2 is now available!</p>\n<p><strong>This software is still in development,</strong> so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the <a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can <a href="https://wordpress.org/wordpress-4.3-beta2.zip">download the beta here</a> (zip).</p>\n<p>For more information about what’s new in version 4.3, <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-1/">check out the Beta 1 blog post</a>. Some of the changes in Beta 2 include:</p>\n<ul>\n<li>Fixed an issue in beta 1 where an alert appeared when saving or publishing a new post/page for the first time.</li>\n<li><strong><strong>Customizer</strong></strong> improvements including enhanced accessibility, smoother menu creation and location assignment, and the ability to handle nameless menus. Please help us test menus in the Customizer to fix any remaining edge cases!</li>\n<li>More robust<strong> list tables</strong> with full content support on small screens and a fallback for the primary column for custom list tables. We&#8217;d love to know how these list tables, such as All Posts and Comments, work for you now on small screen devices.</li>\n<li>The <strong>Site Icon</strong> feature has been improved so that cropping is skipped if the image is the exact size (512px square) and the media modal now suggests a minimum icon size. Please let us know how the flow feels and if you encounter any glitches!</li>\n<li>The <strong>toolbar</strong> now has a direct link to the customizer, along with quick access to themes, widgets, and menus in the dashboard.</li>\n<li>We enabled <strong>utf8mb4 for MySQL</strong> extension users, which was previously unintentionally limited to MySQLi users. Please let us know if you run into any issues.</li>\n<li><strong>Various bug fixes</strong>. We&#8217;ve made <a href="https://core.trac.wordpress.org/log?action=stop_on_copy&amp;mode=stop_on_copy&amp;rev=33138&amp;stop_rev=33046">almost 100 changes</a> in the last week.</li>\n</ul>\n<p>If you think you’ve found a bug, you can post to the <a href="https://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. Or, if you’re comfortable writing a bug report, <a href="https://core.trac.wordpress.org/">file one on the WordPress Trac</a>. There, you can also find <a href="https://core.trac.wordpress.org/tickets/major">a list of known bugs</a> and <a href="https://core.trac.wordpress.org/query?status=closed&amp;milestone=4.3&amp;group=component&amp;order=priority">everything we’ve fixed</a>.</p>\n<p><em>Edges polished up</em><br />\n<em>Features meliorated</em><br />\n<em>Beta Two: go test!</em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:61:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:48:"\n		\n		\n		\n		\n		\n				\n		\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"WordCamps Update";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"https://wordpress.org/news/2015/07/wordcamps-update/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:61:"https://wordpress.org/news/2015/07/wordcamps-update/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Jul 2015 16:13:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:9:"Community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:6:"Events";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:8:"WordCamp";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3758";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:311:"Last week saw the halfway point for 2015, yay! This seems like a good time to update you on WordCamp happenings in the first half of this year. There have been 39 WordCamps in 2015 so far, with events organized in 17 different countries and on 5 continents. More than 14,000 people have registered for [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Andrea Middleton";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:9419:"<p>Last week saw the halfway point for 2015, yay! This seems like a good time to update you on WordCamp happenings in the first half of this year.</p>\n<p>There have been <a href="https://central.wordcamp.org/schedule/past-wordcamps/">39 WordCamps in 2015</a> so far, with events organized in 17 different countries and on 5 continents. More than 14,000 people have registered for WordCamp tickets so far this year, isn&#8217;t that amazing?</p>\n<p><a href="https://europe.wordcamp.org/2015/">WordCamp Europe</a> was held in Seville, Spain just a few weeks ago, with close to 1,000 registered participants and over 500 live stream participants. You can watch  <a href="http://wordpress.tv/2015/07/04/matt-mullenweg-keynote-qanda-wordcamp-europe-2015/">Matt Mullenweg’s keynote Q&amp;A</a> session from WordCamp Europe right now on WordPress.tv.</p>\n<p>WordPress.tv has published 537 videos so far in 2015 from WordCamps around the world. Some of the more popular 2015 WordCamp talks on WordPress.tv include <a href="http://wordpress.tv/2015/03/13/tammie-lister-theme-dont-be-my-everything/">Tammie Lister: Theme, Don’t Be My Everything </a>from WordCamp Maui, <a href="http://wordpress.tv/2015/04/17/jenny-munn-seo-for-2015-whats-in-whats-out-and-how-to-be-in-it-to-win-it-for-good/">Jenny Munn: SEO for 2015 – What’s In, What’s Out and How to Be In It to Win It (For Good)</a> from WordCamp Atlanta, <a href="http://wordpress.tv/2015/02/27/fabrice-ducarme-les-constructeurs-de-page-pour-wordpress/">Fabrice Ducarme: Les Constructeurs de Page pour WordPress</a> from WordCamp Paris, <a href="http://wordpress.tv/2015/06/02/ben-furfie-how-to-value-price-websites/">Ben Furfie: How to Value Price Websites</a> from WordCamp London, and <a href="http://wordpress.tv/2015/06/09/morten-rand-hendriksen-building-themes-from-scratch-using-underscores-_s/">Morten Rand-Hendriksen: Building Themes From Scratch Using Underscores (_S)</a> from WordCamp Seattle. Check them out!</p>\n<h3>Lots of great WordCamps are still to come</h3>\n<p><a href="http://ma.tt/2015/06/wordcamp-us-survey/">WordCamp US</a> is currently in pre-planning, in the process of deciding on a host city. The following cities have proposed themselves as a great place to host the first WordCamp US: Chattanooga, Chicago, Detroit, Orlando, Philadelphia, and Phoenix. It&#8217;s possible the first WordCamp US will be held in 2016 so we can organize the best first WordCamp US imaginable.</p>\n<p>At this time, there are 28 <a href="https://central.wordcamp.org/schedule/">WordCamps</a>, in 9 different countries, that have announced their dates for the rest of 2015. Twelve of these have tickets on sale:</p>\n<ul>\n<li><a href="https://columbus.wordcamp.org/2015/">WordCamp Columbus</a>, Columbus, Ohio: July 17-18</li>\n<li><a href="https://scranton.wordcamp.org/2015/">WordCamp Scranton</a>, Scranton, Pennsylvania: July 18</li>\n<li><a href="https://boston.wordcamp.org/2015/">WordCamp Boston</a>, Boston, Massachussetts: July 18-19</li>\n<li><a href="https://milwaukee.wordcamp.org/2015/">WordCamp Milwaukee</a>, Milwaukee, Wisconsin: July 24-26</li>\n<li><a href="https://asheville.wordcamp.org/2015/">WordCamp Asheville</a>, Asheville, North Carolina: July 24-26</li>\n<li><a href="https://kansai.wordcamp.org/2015/">WordCamp Kansai</a>, Kansai, Japan: July 25-26</li>\n<li><a href="https://fayetteville.wordcamp.org/2015/">WordCamp Fayetteville</a>, Fayetteville, Arkansas: July 31-August 2</li>\n<li><a href="https://brighton.buddycamp.org/2015/">BuddyCamp Brighton</a>,  Brighton, UK: August 8</li>\n<li><a href="https://vancouver.wordcamp.org/2015/">WordCamp Vancouver, BC,</a> Vancouver, BC, Canada: August 15-16</li>\n<li><a href="https://russia.wordcamp.org/2015/">WordCamp Russia</a>, Moscow, Russia: August 15</li>\n<li><a href="https://norrkoping.wordcamp.org/2015/">WordCamp Norrköping</a>, Norrköping, Sweden: August 28-29</li>\n<li><a href="https://croatia.wordcamp.org/2015/">WordCamp Croatia</a>, Rijeka, Croatia: September 5-6</li>\n<li><a href="https://krakow.wordcamp.org/2015/">WordCamp Krakow,</a>  Krakow, Poland: September 12-13</li>\n<li><a href="https://nyc.wordcamp.org/2015/">WordCamp NYC</a>, New York City, New York: October 30-November 1</li>\n</ul>\n<p>The other 16 events don’t have tickets on sale yet, but they’ve set their dates! Subscribe to the sites to find out when registration opens:</p>\n<ul>\n<li><a href="https://pune.wordcamp.org/2015/">WordCamp Pune</a>, Pune, India: September 6</li>\n<li><a href="https://capetown.wordcamp.org/2015/">WordCamp Cape Town</a>, Cape Town, South Africa: September 10-11</li>\n<li><a href="https://baltimore.wordcamp.org/2015/">WordCamp Baltimore</a>, Baltimore, Maryland: September 12</li>\n<li><a href="https://slc.wordcamp.org/2015/">WordCamp Salt Lake City</a>, Salt Lake City, Utah: September 12</li>\n<li><a href="https://lithuania.wordcamp.org/2015/">WordCamp Lithuania</a>, Vilnius, Lithuania: September 19</li>\n<li><a href="https://vegas.wordcamp.org/2015">WordCamp Vegas</a>, Las Vegas, Nevada: September 19-20</li>\n<li><a href="https://switzerland.wordcamp.org/2015/">WordCamp Switzerland</a>, Zurich, Switzerland: September 19-20</li>\n<li><a href="https://tampa.wordcamp.org/2015/">WordCamp Tampa</a>, Tampa, Florida: September 25-27</li>\n<li><a href="https://rhodeisland.wordcamp.org/2015/">WordCamp Rhode Island</a>,  Providence, Rhode Island: September 25-26</li>\n<li><a href="https://la.wordcamp.org/2015/">WordCamp Los Angeles</a>, Los Angeles, California: September 26-27</li>\n<li><a href="https://denmark.wordcamp.org/2015/">WordCamp Denmark,</a>  Copenhagen, Denmark: October 3-4</li>\n<li><a href="https://toronto.wordcamp.org/2015">WordCamp Toronto</a>, Toronto, Ontario, Canada: October 3-4</li>\n<li><a href="https://hamptonroads.wordcamp.org/2015/">WordCamp Hampton Roads, </a>  Virginia Beach, VA, USA: October 17</li>\n<li><a href="https://annarbor.wordcamp.org/2015">WordCamp Ann Arbor</a>, Ann Arbor, Michigan: October 24</li>\n<li><a href="https://portland.wordcamp.org/2015/">WordCamp Portland</a>,  Portland, OR: October 24-25</li>\n</ul>\n<p>On top of all those exciting community events, there are 26 WordCamps in pre-planning as they look for the right event space.  If you have a great idea for a free or cheap WordCamp venue in any of the below locations, get in touch with the organizers through the WordCamp sites:</p>\n<ul>\n<li><a href="https://dfw.wordcamp.org/2015/">WordCamp DFW</a>:  Dallas/Fort Worth, Texas</li>\n<li><a href="https://riodejaneiro.wordcamp.org/2015/">WordCamp Rio</a>: Rio de Janeiro, Brazil</li>\n<li><a href="https://saratoga.wordcamp.org/2015/">WordCamp Saratoga</a>:  Saratoga Springs, New York</li>\n<li><a href="https://sofia.wordcamp.org/2015">WordCamp Sofia</a>:  Sofia, Bulgaria</li>\n<li><a href="https://austin.wordcamp.org/2015/">WordCamp Austin</a>:  Austin, TX</li>\n<li><a href="https://ottawa.wordcamp.org/2015/">WordCamp Ottawa</a>:  Ottawa, Canada</li>\n<li><a href="https://charleston.wordcamp.org/2015/">WordCamp Charleston</a>:  Charleston, South Carolina</li>\n<li><a href="https://chicago.wordcamp.org/2015/">WordCamp Chicago</a>:  Chicago, Illinois</li>\n<li><a href="https://albuquerque.wordcamp.org/2015/">WordCamp Albuquerque</a>:  Albuquerque, New Mexico</li>\n<li><a href="https://prague.wordcamp.org/2015/">WordCamp Prague</a>:  Prague, Czech Republic</li>\n<li><a href="https://seoul.wordcamp.org/2014/">WordCamp Seoul: </a>Seoul, South Korea</li>\n<li><a href="https://louisville.wordcamp.org/2014/">WordCamp Louisville</a>: Louisville, Kentucky</li>\n<li><a href="https://omaha.wordcamp.org/2015/">WordCamp Omaha</a>:  Omaha, Nebraska</li>\n<li><a href="https://grandrapids.wordcamp.org/2015/">WordCamp Grand Rapids</a>:  Grand Rapids, Michigan</li>\n<li><a href="https://easttroy.wordcamp.org/2015/">WordCamp East Troy</a>:  East Troy, Wisconsin</li>\n<li><a href="https://palmademallorca.wordcamp.org/2015">WordCamp Mallorca</a>: Palma de Mallorca, Spain</li>\n<li><a href="https://edinburgh.wordcamp.org/2015/">WordCamp Edinburgh</a>:  Edinburgh, United Kingdom</li>\n<li><a href="https://orlando.wordcamp.org/2015/">WordCamp Orlando</a>:  Orlando, Florida</li>\n<li><a href="https://mexico.wordcamp.org/2015/">WordCamp Mexico City</a>:  Mexico City, Mexico</li>\n<li><a href="https://netherlands.wordcamp.org/2015/">WordCamp Netherlands</a>:  Utrecht, Netherlands</li>\n<li><a href="https://phoenix.wordcamp.org/2016/">WordCamp Phoenix</a>:  Phoenix, Arizona</li>\n<li><a href="https://saopaulo.wordcamp.org/2015/">WordCamp São Paulo</a>:  São Paulo, Brazil</li>\n<li><a href="https://manchester.wordcamp.org/2015/">WordCamp Manchester</a>:  Manchester, United Kingdom</li>\n<li><a href="https://tokyo.wordcamp.org/2015/">WordCamp Tokyo</a>:  Tokyo, Japan</li>\n<li><a href="https://lima.wordcamp.org/2015/">WordCamp Lima</a>:  Lima, Peru</li>\n<li><a href="https://seattle.wordcamp.org/2015-beginner/">WordCamp Seattle: Beginner</a>: Seattle, WA</li>\n</ul>\n<p>Don’t see your city on the list, but yearning for a local WordCamp? WordCamps are organized by local volunteers from the WordPress community, and we have a whole team of people to support new organizers setting up a first-time WordCamp. If you want to bring WordCamp to town, check out how you can <a href="https://central.wordcamp.org/become-an-organizer/">become a WordCamp organizer</a>!</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:57:"https://wordpress.org/news/2015/07/wordcamps-update/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 4.3 Beta 1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-1/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:65:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-1/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 02 Jul 2015 01:30:22 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3738";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:329:"WordPress 4.3 Beta 1 is now available! This software is still in development, so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the WordPress Beta Tester plugin (you’ll want “bleeding edge nightlies”). Or you can [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Konstantin Obenland";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:4352:"<p>WordPress 4.3 Beta 1 is now available!</p>\n<p><strong>This software is still in development,</strong> so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.3, try the <a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want “bleeding edge nightlies”). Or you can <a href="https://wordpress.org/wordpress-4.3-beta1.zip">download the beta here</a> (zip).</p>\n<p>4.3 is due out next month, but to get there, we need your help testing what we&#8217;ve been working on:</p>\n<ul>\n<li><strong>Menus</strong> can now be managed with the <strong>Customizer</strong>, which allows you to live preview changes you’re making without changing your site for visitors until you’re ready. We&#8217;re especially interested to know if this helps streamline the process of setting up your site (<a href="https://core.trac.wordpress.org/ticket/32576">#32576</a>).</li>\n<li>Take control of another piece of your site with the <strong>Site Icon</strong> feature. You can now manage your site’s favicon and app icon from the admin area (<a href="https://core.trac.wordpress.org/ticket/16434">#16434</a>).</li>\n<li>We put a lot of work into <strong>Better Passwords</strong> throughout WordPress. Now, WordPress will limit the life time of password resets, no longer send passwords via email, and generate and suggest secure passwords for you. Try it out and let us know what you think! (<a href="https://core.trac.wordpress.org/ticket/32589">#32589</a>)</li>\n<li>We’ve also added <strong>Editor Improvements</strong>. Certain text patterns are automatically transformed as you type, including <code>*</code> and <code>-</code> transforming into unordered lists, <code>1.</code> and <code>1)</code> for ordered lists, <code>&gt;</code> for blockquotes and two to six number signs (<code>#</code>) for headings (<a href="https://core.trac.wordpress.org/ticket/31441">#31441</a>).</li>\n<li>We’ve improved the <strong>list view</strong> across the admin dashboard. Now, when you view your posts and pages <strong>on small screen devices</strong>, columns are not truncated and can be toggled into view (<a href="https://core.trac.wordpress.org/ticket/32395">#32395</a>).</li>\n</ul>\n<p><strong>Developers</strong>: There have been a few of changes for you to test as well, including:</p>\n<ul>\n<li><strong>Taxonomy Roadmap:</strong> Terms shared across multiple taxonomies will <a href="https://make.wordpress.org/core/2015/06/09/eliminating-shared-taxonomy-terms-in-wordpress-4-3/">now be split</a> into separate terms on update to 4.3. Please let us know if you hit any snags (<a href="https://core.trac.wordpress.org/ticket/30261">#30261</a>).</li>\n<li>Added <code>singular.php</code> to the template hierarchy as a fallback for <code>single.php</code> and <code>page.php</code>. (<a href="https://core.trac.wordpress.org/ticket/22314">#22314</a>).</li>\n<li>The old Distraction Free Writing code was removed (<a href="https://core.trac.wordpress.org/ticket/30949">#30949</a>).</li>\n<li>List tables now can (and often should) have a primary column defined. We’re working on a fallback for existing custom list tables but right now they likely have some breakage in the aforementioned responsive view (<a href="https://core.trac.wordpress.org/ticket/25408">#25408</a>).</li>\n</ul>\n<p>If you want a more in-depth view of what changes have made it into 4.3, <a href="https://make.wordpress.org/core/tag/4-3/">check out all 4.3-tagged posts</a> on the main development blog.</p>\n<p><strong>If you think you’ve found a bug</strong>, you can post to the <a href="https://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report, <a href="https://make.wordpress.org/core/reports/">file one on the WordPress Trac</a>. There, you can also find <a href="https://core.trac.wordpress.org/tickets/major">a list of known bugs</a> and <a href="https://core.trac.wordpress.org/query?status=closed&amp;group=component&amp;milestone=4.3">everything we’ve fixed</a> so far.</p>\n<p>Happy testing!</p>\n<p><em>Site icons for all</em><br />\n<em>Live preview menu changes</em><br />\n<em>Four three beta now</em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:61:"https://wordpress.org/news/2015/07/wordpress-4-3-beta-1/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:48:"\n		\n		\n		\n		\n		\n				\n		\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:48:"WordPress 4.2.2 Security and Maintenance Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"https://wordpress.org/news/2015/05/wordpress-4-2-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:60:"https://wordpress.org/news/2015/05/wordpress-4-2-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 07 May 2015 02:24:10 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Security";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:3:"4.2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3718";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:355:"WordPress 4.2.2 is now available. This is a critical security release for all previous versions and we strongly encourage you to update your sites immediately. Version 4.2.2 addresses two security issues: The Genericons icon font package, which is used in a number of popular themes and plugins, contained an HTML file vulnerable to a cross-site [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Samuel Sidler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:3213:"<p>WordPress 4.2.2 is now available. This is a <strong>critical security release</strong> for all previous versions and we strongly encourage you to update your sites immediately.</p>\n<p>Version 4.2.2 addresses two security issues:</p>\n<ul>\n<li>The Genericons icon font package, which is used in a number of popular themes and plugins, contained an HTML file vulnerable to a cross-site scripting attack. All affected themes and plugins hosted on <a href="https://wordpress.org/">WordPress.org</a> (including the Twenty Fifteen default theme) have been updated today by the WordPress security team to address this issue by removing this nonessential file. To help protect other Genericons usage, WordPress 4.2.2 proactively scans the wp-content directory for this HTML file and removes it. Reported by Robert Abela of <a href="http://netsparker.com">Netsparker</a>.</li>\n<li>WordPress versions 4.2 and earlier are affected by a <a href="https://wordpress.org/news/2015/04/wordpress-4-2-1/">critical cross-site scripting vulnerability</a>, which could enable anonymous users to compromise a site. WordPress 4.2.2 includes a comprehensive fix for this issue. Reported separately by Rice Adu and Tong Shi from Baidu[X-team].</li>\n</ul>\n<p>The release also includes hardening for a potential cross-site scripting vulnerability when using the visual editor. This issue was reported by Mahadev Subedi.</p>\n<p>Our thanks to those who have practiced <a href="https://make.wordpress.org/core/handbook/reporting-security-vulnerabilities/">responsible disclosure</a> of security issues.</p>\n<p>WordPress 4.2.2 also contains fixes for 13 bugs from 4.2. For more information, see the <a href="https://codex.wordpress.org/Version_4.2.2">release notes</a> or consult the <a href="https://core.trac.wordpress.org/log/branches/4.2?rev=32418&amp;stop_rev=32324">list of changes</a>.</p>\n<p><a href="https://wordpress.org/download/">Download WordPress 4.2.2</a> or venture over to Dashboard → Updates and simply click “Update Now.” Sites that support automatic background updates are already beginning to update to WordPress 4.2.2.</p>\n<p>Thanks to everyone who contributed to 4.2.2:</p>\n<p><a href="https://profiles.wordpress.org/jorbin">Aaron Jorbin</a>, <a href="https://profiles.wordpress.org/azaozz">Andrew Ozz</a>, <a href="https://profiles.wordpress.org/nacin">Andrew Nacin</a>, <a href="https://profiles.wordpress.org/boonebgorges">Boone Gorges</a>, <a href="https://profiles.wordpress.org/dd32">Dion Hulse</a>, <a href="https://profiles.wordpress.org/iseulde">Ella Iseulde Van Dorpe</a>, <a href="https://profiles.wordpress.org/pento">Gary Pendergast</a>, <a href="https://profiles.wordpress.org/hnle">Hinaloe</a>, <a href="https://profiles.wordpress.org/jeremyfelt">Jeremy Felt</a>, <a href="https://profiles.wordpress.org/johnjamesjacoby">John James Jacoby</a>, <a href="https://profiles.wordpress.org/kovshenin">Konstantin Kovshenin</a>, <a href="https://profiles.wordpress.org/mdawaffe">Mike Adams</a>, <a href="https://profiles.wordpress.org/nbachiyski">Nikolay Bachiyski</a>, <a href="https://profiles.wordpress.org/taka2">taka2</a>, and <a href="https://profiles.wordpress.org/willstedt">willstedt</a>.</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2015/05/wordpress-4-2-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:48:"\n		\n		\n		\n		\n		\n				\n		\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:32:"WordPress 4.2.1 Security Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"https://wordpress.org/news/2015/04/wordpress-4-2-1/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:60:"https://wordpress.org/news/2015/04/wordpress-4-2-1/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 27 Apr 2015 18:34:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Security";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:3:"4.2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3706";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:366:"WordPress 4.2.1 is now available. This is a critical security release for all previous versions and we strongly encourage you to update your sites immediately. A few hours ago, the WordPress team was made aware of a cross-site scripting vulnerability, which could enable commenters to compromise a site. The vulnerability was discovered by Jouko Pynnönen. [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Gary Pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1010:"<p>WordPress 4.2.1 is now available. This is a <strong>critical security release</strong> for all previous versions and we strongly encourage you to update your sites immediately.</p>\n<p>A few hours ago, the WordPress team was made aware of a cross-site scripting vulnerability, which could enable commenters to compromise a site. The vulnerability was discovered by <a href="http://klikki.fi/">Jouko Pynnönen</a>.</p>\n<p>WordPress 4.2.1 has begun to roll out as an automatic background update, for sites that <a href="https://wordpress.org/plugins/background-update-tester/">support</a> those.</p>\n<p>For more information, see the <a href="https://codex.wordpress.org/Version_4.2.1">release notes</a> or consult the <a href="https://core.trac.wordpress.org/log/branches/4.2?rev=32311&amp;stop_rev=32300">list of changes</a>.</p>\n<p><a href="https://wordpress.org/download/">Download WordPress 4.2.1</a> or venture over to <strong>Dashboard → Updates</strong> and simply click &#8220;Update Now&#8221;.</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2015/04/wordpress-4-2-1/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:26:"WordPress 4.2 “Powell”";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:42:"https://wordpress.org/news/2015/04/powell/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:51:"https://wordpress.org/news/2015/04/powell/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Apr 2015 18:35:29 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:3:"4.2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3642";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:343:"Version 4.2 of WordPress, named &#8220;Powell&#8221; in honor of jazz pianist Bud Powell, is available for download or update in your WordPress dashboard. New features in 4.2 help you communicate and share, globally. An easier way to share content Clip it, edit it, publish it. Get familiar with the new and improved Press This. From [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt Mullenweg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:29655:"<p>Version 4.2 of WordPress, named &#8220;Powell&#8221; in honor of jazz pianist <a href="https://en.wikipedia.org/wiki/Bud_Powell">Bud Powell</a>, is available for <a href="https://wordpress.org/download/">download</a> or update in your WordPress dashboard. New features in 4.2 help you communicate and share, globally.</p>\n<div id="v-e9kH4FzP-1" class="video-player"><embed id="v-e9kH4FzP-1-video" src="https://v0.wordpress.com/player.swf?v=1.04&amp;guid=e9kH4FzP&amp;isDynamicSeeking=true" type="application/x-shockwave-flash" width="692" height="388" title="Introducing WordPress 4.2 &quot;Powell&quot;" wmode="direct" seamlesstabbing="true" allowfullscreen="true" allowscriptaccess="always" overstretch="true"></embed></div>\n<hr />\n<h2 style="text-align: center">An easier way to share content</h2>\n<p><img class="alignnone size-full wp-image-3677" src="https://wordpress.org/news/files/2015/04/4.2-press-this-2.jpg" alt="Press This" width="1000" height="832" />Clip it, edit it, publish it. Get familiar with the new and improved Press This. From the Tools menu, add Press This to your browser bookmark bar or your mobile device home screen. Once installed you can share your content with lightning speed. Sharing your favorite videos, images, and content has never been this fast or this easy.</p>\n<hr />\n<h2 style="text-align: center">Extended character support</h2>\n<p><img class="alignnone size-full wp-image-3676" src="https://wordpress.org/news/files/2015/04/4.2-characters.png" alt="Character support for emoji, special characters" width="1000" height="832" />Writing in WordPress, whatever your language, just got better. WordPress 4.2 supports a host of new characters out-of-the-box, including native Chinese, Japanese, and Korean characters, musical and mathematical symbols, and hieroglyphs.</p>\n<p>Don’t use any of those characters? You can still have fun — emoji are now available in WordPress! Get creative and decorate your content with <img src="https://s.w.org/images/core/emoji/72x72/1f499.png" alt="?" class="wp-smiley" style="height: 1em; max-height: 1em;" />, <img src="https://s.w.org/images/core/emoji/72x72/1f438.png" alt="?" class="wp-smiley" style="height: 1em; max-height: 1em;" />, <img src="https://s.w.org/images/core/emoji/72x72/1f412.png" alt="?" class="wp-smiley" style="height: 1em; max-height: 1em;" />, <img src="https://s.w.org/images/core/emoji/72x72/1f355.png" alt="?" class="wp-smiley" style="height: 1em; max-height: 1em;" />, and all the many other <a href="https://codex.wordpress.org/Emoji">emoji</a>.</p>\n<hr />\n<div><img class="alignright size-medium wp-image-3656" src="https://wordpress.org/news/files/2015/04/4.2-theme-switcher-300x230.png" alt="Customizer theme switcher" width="288" height="221" /></p>\n<h3>Switch themes in the Customizer</h3>\n<p>Browse and preview your installed themes from the Customizer. Make sure the theme looks great with your content, before it debuts on your site.</p>\n</div>\n<div style="clear: both"></div>\n<div><img class="alignright size-medium wp-image-3653" src="https://wordpress.org/news/files/2015/04/4.2-embeds-300x230.png" alt="Tumbr.com oEmbed example" width="288" height="221" /></p>\n<h3>Even more embeds</h3>\n<p>Paste links from Tumblr.com and Kickstarter and watch them magically appear right in the editor. With every release, your publishing and editing experience get closer together.</p>\n</div>\n<div style="clear: both"></div>\n<div>\n<p><img class="alignright size-medium wp-image-3654" src="https://wordpress.org/news/files/2015/04/4.2-plugins-300x230.png" alt="Inline plugin updates" width="288" height="221" /></p>\n<h3>Streamlined plugin updates</h3>\n<p>Goodbye boring loading screen, hello smooth and simple plugin updates. Click <em>Update Now</em> and watch the magic happen.</p>\n</div>\n<div style="clear: both"></div>\n<hr />\n<h2 style="text-align: center">Under the Hood</h2>\n<h5>utf8mb4 support</h5>\n<p>Database character encoding has changed from utf8 to utf8mb4, which adds support for a whole range of new 4-byte characters.</p>\n<h5>JavaScript accessibility</h5>\n<p>You can now send audible notifications to screen readers in JavaScript with <code>wp.a11y.speak()</code>. Pass it a string, and an update will be sent to a dedicated ARIA live notifications area.</p>\n<h5>Shared term splitting</h5>\n<p>Terms shared across multiple taxonomies will be split when one of them is updated. Find out more in the <a href="https://developer.wordpress.org/plugins/taxonomy/working-with-split-terms-in-wp-4-2/">Plugin Developer Handbook</a>.</p>\n<h5>Complex query ordering</h5>\n<p><code>WP_Query</code>, <code>WP_Comment_Query</code>, and <code>WP_User_Query</code> now support complex ordering with named meta query clauses.</p>\n<hr />\n<h2 style="text-align: center">The Team</h2>\n<p><a class="alignleft" href="https://profiles.wordpress.org/drewapicture"><img src="https://www.gravatar.com/avatar/95c934fa2c3362794bf62ff8c59ada08?d=mm&amp;s=150&amp;r=G" alt="Drew Jaynes" width="90" height="90" /></a>This release was led by <a href="http://werdswords.com">Drew Jaynes</a>, with the help of these fine individuals. There are 283 contributors with props in this release, a new high. Pull up some Bud Powell on your music service of choice, and check out some of their profiles:</p>\n<a href="https://profiles.wordpress.org/mercime">@mercime</a>, <a href="https://profiles.wordpress.org/a5hleyrich">A5hleyRich</a>, <a href="https://profiles.wordpress.org/aaroncampbell">Aaron D. Campbell</a>, <a href="https://profiles.wordpress.org/jorbin">Aaron Jorbin</a>, <a href="https://profiles.wordpress.org/abhishekfdd">abhishekfdd</a>, <a href="https://profiles.wordpress.org/adamsilverstein">Adam Silverstein</a>, <a href="https://profiles.wordpress.org/mrahmadawais">Ahmad Awais</a>, <a href="https://profiles.wordpress.org/alexkingorg">Alex King</a>, <a href="https://profiles.wordpress.org/viper007bond">Alex Mills (Viper007Bond)</a>, <a href="https://profiles.wordpress.org/deconf">Alin Marcu</a>, <a href="https://profiles.wordpress.org/collinsinternet">Allan Collins</a>, <a href="https://profiles.wordpress.org/afercia">Andrea Fercia</a>, <a href="https://profiles.wordpress.org/awbauer">Andrew Bauer</a>, <a href="https://profiles.wordpress.org/nacin">Andrew Nacin</a>, <a href="https://profiles.wordpress.org/norcross">Andrew Norcross</a>, <a href="https://profiles.wordpress.org/azaozz">Andrew Ozz</a>, <a href="https://profiles.wordpress.org/ankitgadertcampcom">Ankit Gade</a>, <a href="https://profiles.wordpress.org/ankit-k-gupta">Ankit K Gupta</a>, <a href="https://profiles.wordpress.org/atimmer">Anton Timmermans</a>, <a href="https://profiles.wordpress.org/aramzs">Aram Zucker-Scharff</a>, <a href="https://profiles.wordpress.org/arminbraun">ArminBraun</a>, <a href="https://profiles.wordpress.org/ashfame">Ashfame</a>, <a href="https://profiles.wordpress.org/filosofo">Austin Matzko</a>, <a href="https://profiles.wordpress.org/avryl">avryl</a>, <a href="https://profiles.wordpress.org/barrykooij">Barry Kooij</a>, <a href="https://profiles.wordpress.org/beaulebens">Beau Lebens</a>, <a href="https://profiles.wordpress.org/bendoh">Ben Doherty (Oomph, Inc)</a>, <a href="https://profiles.wordpress.org/bananastalktome">Billy Schneider</a>, <a href="https://profiles.wordpress.org/boonebgorges">Boone B. Gorges</a>, <a href="https://profiles.wordpress.org/kraftbj">Brandon Kraft</a>, <a href="https://profiles.wordpress.org/krogsgard">Brian Krogsgard</a>, <a href="https://profiles.wordpress.org/bswatson">Brian Watson</a>, <a href="https://profiles.wordpress.org/calevans">CalEvans</a>, <a href="https://profiles.wordpress.org/carolinegeven">carolinegeven</a>, <a href="https://profiles.wordpress.org/caseypatrickdriscoll">Casey Driscoll</a>, <a href="https://profiles.wordpress.org/caspie">Caspie</a>, <a href="https://profiles.wordpress.org/cdog">Catalin Dogaru</a>, <a href="https://profiles.wordpress.org/chipbennett">Chip Bennett</a>, <a href="https://profiles.wordpress.org/chipx86">chipx86</a>, <a href="https://profiles.wordpress.org/chrico">ChriCo</a>, <a href="https://profiles.wordpress.org/cbaldelomar">Chris Baldelomar</a>, <a href="https://profiles.wordpress.org/c3mdigital">Chris Olbekson</a>, <a href="https://profiles.wordpress.org/chriscct7">chriscct7</a>, <a href="https://profiles.wordpress.org/cfoellmann">Christian Foellmann</a>, <a href="https://profiles.wordpress.org/cfinke">Christopher Finke</a>, <a href="https://profiles.wordpress.org/clifgriffin">Clifton Griffin</a>, <a href="https://profiles.wordpress.org/codix">Code Master</a>, <a href="https://profiles.wordpress.org/corphi">Corphi</a>, <a href="https://profiles.wordpress.org/couturefreak">Courtney Ivey</a>, <a href="https://profiles.wordpress.org/craig-ralston">Craig Ralston</a>, <a href="https://profiles.wordpress.org/cweiske">cweiske</a>, <a href="https://profiles.wordpress.org/extendwings">Daisuke Takahashi</a>, <a href="https://profiles.wordpress.org/timersys">Damian</a>, <a href="https://profiles.wordpress.org/danielbachhuber">Daniel Bachhuber</a>, <a href="https://profiles.wordpress.org/redsweater">Daniel Jalkut (Red Sweater)</a>, <a href="https://profiles.wordpress.org/dkotter">Darin Kotter</a>, <a href="https://profiles.wordpress.org/nerrad">Darren Ethier (nerrad)</a>, <a href="https://profiles.wordpress.org/dllh">Daryl L. L. Houston (dllh)</a>, <a href="https://profiles.wordpress.org/dmchale">Dave McHale</a>, <a href="https://profiles.wordpress.org/davidakennedy">David A. Kennedy</a>, <a href="https://profiles.wordpress.org/davidanderson">David Anderson</a>, <a href="https://profiles.wordpress.org/dlh">David Herrera</a>, <a href="https://profiles.wordpress.org/folletto">Davide ''Folletto'' Casali</a>, <a href="https://profiles.wordpress.org/davideugenepratt">davideugenepratt</a>, <a href="https://profiles.wordpress.org/davidhamiltron">davidhamiltron</a>, <a href="https://profiles.wordpress.org/denis-de-bernardy">Denis de Bernardy</a>, <a href="https://profiles.wordpress.org/valendesigns">Derek Herman</a>, <a href="https://profiles.wordpress.org/dsmart">Derek Smart</a>, <a href="https://profiles.wordpress.org/designsimply">designsimply</a>, <a href="https://profiles.wordpress.org/dd32">Dion Hulse</a>, <a href="https://profiles.wordpress.org/dipeshkakadiya">dipesh.kakadiya</a>, <a href="https://profiles.wordpress.org/ocean90">Dominik Schilling</a>, <a href="https://profiles.wordpress.org/doublesharp">doublesharp</a>, <a href="https://profiles.wordpress.org/dzerycz">DzeryCZ</a>, <a href="https://profiles.wordpress.org/kucrut">Dzikri Aziz</a>, <a href="https://profiles.wordpress.org/emazovetskiy">e.mazovetskiy</a>, <a href="https://profiles.wordpress.org/oso96_2000">Eduardo Reveles</a>, <a href="https://profiles.wordpress.org/cais">Edward Caissie</a>, <a href="https://profiles.wordpress.org/eliorivero">Elio Rivero</a>, <a href="https://profiles.wordpress.org/iseulde">Ella Iseulde Van Dorpe</a>, <a href="https://profiles.wordpress.org/elliottcarlson">elliottcarlson</a>, <a href="https://profiles.wordpress.org/enej">enej</a>, <a href="https://profiles.wordpress.org/ericlewis">Eric Andrew Lewis</a>, <a href="https://profiles.wordpress.org/ebinnion">Eric Binnion</a>, <a href="https://profiles.wordpress.org/ethitter">Erick Hitter</a>, <a href="https://profiles.wordpress.org/evansolomon">Evan Solomon</a>, <a href="https://profiles.wordpress.org/fab1en">Fabien Quatravaux</a>, <a href="https://profiles.wordpress.org/fhwebcs">fhwebcs</a>, <a href="https://profiles.wordpress.org/floriansimeth">Florian Simeth</a>, <a href="https://profiles.wordpress.org/bueltge">Frank Bueltge</a>, <a href="https://profiles.wordpress.org/frankpw">Frank P. Walentynowicz</a>, <a href="https://profiles.wordpress.org/f-j-kaiser">Franz Josef Kaiser</a>, <a href="https://profiles.wordpress.org/gabrielperezs">gabrielperezs</a>, <a href="https://profiles.wordpress.org/garyc40">Gary Cao</a>, <a href="https://profiles.wordpress.org/garyj">Gary Jones</a>, <a href="https://profiles.wordpress.org/pento">Gary Pendergast</a>, <a href="https://profiles.wordpress.org/geertdd">Geert De Deckere</a>, <a href="https://profiles.wordpress.org/genkisan">genkisan</a>, <a href="https://profiles.wordpress.org/georgestephanis">George Stephanis</a>, <a href="https://profiles.wordpress.org/grahamarmfield">Graham Armfield</a>, <a href="https://profiles.wordpress.org/webord">Gustavo Bordoni</a>, <a href="https://profiles.wordpress.org/hakre">hakre</a>, <a href="https://profiles.wordpress.org/harishchaudhari">Harish Chaudhari</a>, <a href="https://profiles.wordpress.org/hauvong">hauvong</a>, <a href="https://profiles.wordpress.org/helen">Helen Hou-Sandí</a>, <a href="https://profiles.wordpress.org/herbmillerjr">herbmillerjr</a>, <a href="https://profiles.wordpress.org/hew">Hew</a>, <a href="https://profiles.wordpress.org/hnle">Hinaloe</a>, <a href="https://profiles.wordpress.org/horike">horike</a>, <a href="https://profiles.wordpress.org/hlashbrooke">Hugh Lashbrooke</a>, <a href="https://profiles.wordpress.org/hugobaeta">Hugo Baeta</a>, <a href="https://profiles.wordpress.org/iandunn">Ian Dunn</a>, <a href="https://profiles.wordpress.org/ianmjones">ianmjones</a>, <a href="https://profiles.wordpress.org/idealien">idealien</a>, <a href="https://profiles.wordpress.org/imath">imath</a>, <a href="https://profiles.wordpress.org/ipstenu">Ipstenu (Mika Epstein)</a>, <a href="https://profiles.wordpress.org/jdgrimes">J.D. Grimes</a>, <a href="https://profiles.wordpress.org/jacklenox">Jack Lenox</a>, <a href="https://profiles.wordpress.org/jamescollins">James Collins</a>, <a href="https://profiles.wordpress.org/janhenckens">janhenckens</a>, <a href="https://profiles.wordpress.org/jfarthing84">Jeff Farthing</a>, <a href="https://profiles.wordpress.org/cheffheid">Jeffrey de Wit</a>, <a href="https://profiles.wordpress.org/jeremyfelt">Jeremy Felt</a>, <a href="https://profiles.wordpress.org/jesin">Jesin A</a>, <a href="https://profiles.wordpress.org/jipmoors">jipmoors</a>, <a href="https://profiles.wordpress.org/jartes">Joan Artes</a>, <a href="https://profiles.wordpress.org/joedolson">Joe Dolson</a>, <a href="https://profiles.wordpress.org/joemcgill">Joe McGill</a>, <a href="https://profiles.wordpress.org/yo-l1982">Joel Bernerman</a>, <a href="https://profiles.wordpress.org/joen">Joen Asmussen</a>, <a href="https://profiles.wordpress.org/johnbillion">John Blackbourn</a>, <a href="https://profiles.wordpress.org/johneckman">John Eckman</a>, <a href="https://profiles.wordpress.org/johnjamesjacoby">John James Jacoby</a>, <a href="https://profiles.wordpress.org/jlevandowski">John Levandowski</a>, <a href="https://profiles.wordpress.org/desrosj">Jonathan Desrosiers</a>, <a href="https://profiles.wordpress.org/joostdekeijzer">joost de keijzer</a>, <a href="https://profiles.wordpress.org/joostdevalk">Joost de Valk</a>, <a href="https://profiles.wordpress.org/jcastaneda">Jose Castaneda</a>, <a href="https://profiles.wordpress.org/joshlevinson">Josh Levinson</a>, <a href="https://profiles.wordpress.org/jphase">jphase</a>, <a href="https://profiles.wordpress.org/juliobox">Julio Potier</a>, <a href="https://profiles.wordpress.org/kopepasah">Justin Kopepasah</a>, <a href="https://profiles.wordpress.org/jtsternberg">Justin Sternberg</a>, <a href="https://profiles.wordpress.org/justincwatt">Justin Watt</a>, <a href="https://profiles.wordpress.org/kadamwhite">K.Adam White</a>, <a href="https://profiles.wordpress.org/trepmal">Kailey (trepmal)</a>, <a href="https://profiles.wordpress.org/ryelle">Kelly Dwan</a>, <a href="https://profiles.wordpress.org/kevdotbadger">Kevin Ruscoe</a>, <a href="https://profiles.wordpress.org/kpdesign">Kim Parsell</a>, <a href="https://profiles.wordpress.org/ixkaito">Kite</a>, <a href="https://profiles.wordpress.org/kovshenin">Konstantin Kovshenin</a>, <a href="https://profiles.wordpress.org/obenland">Konstantin Obenland</a>, <a href="https://profiles.wordpress.org/lancewillett">Lance Willett</a>, <a href="https://profiles.wordpress.org/mindrun">Leonard</a>, <a href="https://profiles.wordpress.org/leopeo">Leonardo Giacone</a>, <a href="https://profiles.wordpress.org/lgladdy">Liam Gladdy</a>, <a href="https://profiles.wordpress.org/maimairel">maimairel</a>, <a href="https://profiles.wordpress.org/mako09">Mako</a>, <a href="https://profiles.wordpress.org/funkatronic">Manny Fleurmond</a>, <a href="https://profiles.wordpress.org/marcelomazza">marcelomazza</a>, <a href="https://profiles.wordpress.org/marcochiesi">Marco Chiesi</a>, <a href="https://profiles.wordpress.org/mkaz">Marcus Kazmierczak</a>, <a href="https://profiles.wordpress.org/tyxla">Marin Atanasov</a>, <a href="https://profiles.wordpress.org/nofearinc">Mario Peshev</a>, <a href="https://profiles.wordpress.org/clorith">Marius (Clorith)</a>, <a href="https://profiles.wordpress.org/markjaquith">Mark Jaquith</a>, <a href="https://profiles.wordpress.org/senff">Mark Senff</a>, <a href="https://profiles.wordpress.org/markoheijnen">Marko Heijnen</a>, <a href="https://profiles.wordpress.org/mgibbs189">Matt Gibbs</a>, <a href="https://profiles.wordpress.org/sivel">Matt Martz</a>, <a href="https://profiles.wordpress.org/matt">Matt Mullenweg</a>, <a href="https://profiles.wordpress.org/mattwiebe">Matt Wiebe</a>, <a href="https://profiles.wordpress.org/mzak">Matt Zak</a>, <a href="https://profiles.wordpress.org/mboynes">Matthew Boynes</a>, <a href="https://profiles.wordpress.org/mattheweppelsheimer">Matthew Eppelsheimer</a>, <a href="https://profiles.wordpress.org/mattheu">Matthew Haines-Young</a>, <a href="https://profiles.wordpress.org/mattyrob">mattyrob</a>, <a href="https://profiles.wordpress.org/maxcutler">Max Cutler</a>, <a href="https://profiles.wordpress.org/mehulkaklotar">mehulkaklotar</a>, <a href="https://profiles.wordpress.org/melchoyce">Mel Choyce</a>, <a href="https://profiles.wordpress.org/meloniq">meloniq</a>, <a href="https://profiles.wordpress.org/mdawaffe">Michael Adams (mdawaffe)</a>, <a href="https://profiles.wordpress.org/michael-arestad">Michael Arestad</a>, <a href="https://profiles.wordpress.org/tw2113">Michael Beckwith</a>, <a href="https://profiles.wordpress.org/michalzuber">michalzuber</a>, <a href="https://profiles.wordpress.org/mdgl">Mike Glendinning</a>, <a href="https://profiles.wordpress.org/mikehansenme">Mike Hansen</a>, <a href="https://profiles.wordpress.org/thaicloud">Mike Jordan</a>, <a href="https://profiles.wordpress.org/mikeschinkel">Mike Schinkel</a>, <a href="https://profiles.wordpress.org/mikengarrett">MikeNGarrett</a>, <a href="https://profiles.wordpress.org/dimadin">Milan Dinic</a>, <a href="https://profiles.wordpress.org/mmn-o">mmn-o</a>, <a href="https://profiles.wordpress.org/batmoo">Mohammad Jangda</a>, <a href="https://profiles.wordpress.org/momdad">MomDad</a>, <a href="https://profiles.wordpress.org/morganestes">Morgan Estes</a>, <a href="https://profiles.wordpress.org/morpheu5">Morpheu5</a>, <a href="https://profiles.wordpress.org/Nao">Naoko Takano</a>, <a href="https://profiles.wordpress.org/nathan_dawson">nathan_dawson</a>, <a href="https://profiles.wordpress.org/neil_pie">Neil Pie</a>, <a href="https://profiles.wordpress.org/celloexpressions">Nick Halsey</a>, <a href="https://profiles.wordpress.org/nicnicnicdevos">nicnicnicdevos</a>, <a href="https://profiles.wordpress.org/nikv">Nikhil Vimal</a>, <a href="https://profiles.wordpress.org/nbachiyski">Nikolay Bachiyski</a>, <a href="https://profiles.wordpress.org/ninnypants">ninnypants</a>, <a href="https://profiles.wordpress.org/nitkr">nitkr</a>, <a href="https://profiles.wordpress.org/nunomorgadinho">Nuno Morgadinho</a>, <a href="https://profiles.wordpress.org/originalexe">OriginalEXE</a>, <a href="https://profiles.wordpress.org/pareshradadiya-1">Paresh Radadiya</a>, <a href="https://profiles.wordpress.org/pathawks">Pat Hawks</a>, <a href="https://profiles.wordpress.org/pbearne">Paul Bearne</a>, <a href="https://profiles.wordpress.org/paulschreiber">Paul Schreiber</a>, <a href="https://profiles.wordpress.org/paulwilde">Paul Wilde</a>, <a href="https://profiles.wordpress.org/pavelevap">pavelevap</a>, <a href="https://profiles.wordpress.org/sirbrillig">Payton Swick</a>, <a href="https://profiles.wordpress.org/petemall">Pete Mall</a>, <a href="https://profiles.wordpress.org/gungeekatx">Pete Nelson</a>, <a href="https://profiles.wordpress.org/peterwilsoncc">Peter Wilson</a>, <a href="https://profiles.wordpress.org/mordauk">Pippin Williamson</a>, <a href="https://profiles.wordpress.org/podpirate">podpirate</a>, <a href="https://profiles.wordpress.org/postpostmodern">postpostmodern</a>, <a href="https://profiles.wordpress.org/nprasath002">Prasath Nadarajah</a>, <a href="https://profiles.wordpress.org/prasoon2211">prasoon2211</a>, <a href="https://profiles.wordpress.org/cyman">Primoz Cigler</a>, <a href="https://profiles.wordpress.org/r-a-y">r-a-y</a>, <a href="https://profiles.wordpress.org/rachelbaker">Rachel Baker</a>, <a href="https://profiles.wordpress.org/rahulbhangale">rahulbhangale</a>, <a href="https://profiles.wordpress.org/ramiy">Rami Yushuvaev</a>, <a href="https://profiles.wordpress.org/lamosty">Rastislav Lamos</a>, <a href="https://profiles.wordpress.org/ravindra-pal-singh">Ravindra Pal Singh</a>, <a href="https://profiles.wordpress.org/rianrietveld">Rian Rietveld</a>, <a href="https://profiles.wordpress.org/ritteshpatel">Ritesh Patel</a>, <a href="https://profiles.wordpress.org/miqrogroove">Robert Chapin</a>, <a href="https://profiles.wordpress.org/rodrigosprimo">Rodrigo Primo</a>, <a href="https://profiles.wordpress.org/magicroundabout">Ross Wintle</a>, <a href="https://profiles.wordpress.org/ryan">Ryan Boren</a>, <a href="https://profiles.wordpress.org/rmarks">Ryan Marks</a>, <a href="https://profiles.wordpress.org/welcher">Ryan Welcher</a>, <a href="https://profiles.wordpress.org/sagarjadhav">Sagar Jadhav</a>, <a href="https://profiles.wordpress.org/solarissmoke">Samir Shah</a>, <a href="https://profiles.wordpress.org/samo9789">samo9789</a>, <a href="https://profiles.wordpress.org/samuelsidler">Samuel Sidler</a>, <a href="https://profiles.wordpress.org/sgrant">Scott Grant</a>, <a href="https://profiles.wordpress.org/coffee2code">Scott Reilly</a>, <a href="https://profiles.wordpress.org/wonderboymusic">Scott Taylor</a>, <a href="https://profiles.wordpress.org/scottgonzalez">scott.gonzalez</a>, <a href="https://profiles.wordpress.org/greglone">ScreenfeedFr</a>, <a href="https://profiles.wordpress.org/scribu">scribu</a>, <a href="https://profiles.wordpress.org/seanchayes">Sean Hayes</a>, <a href="https://profiles.wordpress.org/sergejmueller">Sergej Muller</a>, <a href="https://profiles.wordpress.org/sergeybiryukov">Sergey Biryukov</a>, <a href="https://profiles.wordpress.org/sevenspark">sevenspark</a>, <a href="https://profiles.wordpress.org/simonwheatley">Simon Wheatley</a>, <a href="https://profiles.wordpress.org/siobhan">Siobhan</a>, <a href="https://profiles.wordpress.org/sippis">sippis</a>, <a href="https://profiles.wordpress.org/slobodanmanic">Slobodan Manic</a>, <a href="https://profiles.wordpress.org/stephdau">Stephane Daury</a>, <a href="https://profiles.wordpress.org/sillybean">Stephanie Leary</a>, <a href="https://profiles.wordpress.org/netweb">Stephen Edgar</a>, <a href="https://profiles.wordpress.org/stevegrunwell">Steve Grunwell</a>, <a href="https://profiles.wordpress.org/stevehickeydesign">stevehickeydesign</a>, <a href="https://profiles.wordpress.org/stevenkword">Steven Word</a>, <a href="https://profiles.wordpress.org/taka2">taka2</a>, <a href="https://profiles.wordpress.org/iamtakashi">Takashi Irie</a>, <a href="https://profiles.wordpress.org/hissy">Takuro Hishikawa</a>, <a href="https://profiles.wordpress.org/themiked">theMikeD</a>, <a href="https://profiles.wordpress.org/thomaswm">thomaswm</a>, <a href="https://profiles.wordpress.org/ipm-frommen">Thorsten Frommen</a>, <a href="https://profiles.wordpress.org/tillkruess">Till</a>, <a href="https://profiles.wordpress.org/timothyblynjacobs">Timothy Jacobs</a>, <a href="https://profiles.wordpress.org/tiqbiz">tiqbiz</a>, <a href="https://profiles.wordpress.org/tmatsuur">tmatsuur</a>, <a href="https://profiles.wordpress.org/tmeister">tmeister</a>, <a href="https://profiles.wordpress.org/tschutter">Tobias Schutter</a>, <a href="https://profiles.wordpress.org/tobiasbg">TobiasBg</a>, <a href="https://profiles.wordpress.org/tomdxw">tomdxw</a>, <a href="https://profiles.wordpress.org/travisnorthcutt">Travis Northcutt</a>, <a href="https://profiles.wordpress.org/trishasalas">trishasalas</a>, <a href="https://profiles.wordpress.org/tywayne">Ty Carlson</a>, <a href="https://profiles.wordpress.org/uamv">UaMV</a>, <a href="https://profiles.wordpress.org/desaiuditd">Udit Desai</a>, <a href="https://profiles.wordpress.org/sorich87">Ulrich Sossou</a>, <a href="https://profiles.wordpress.org/veritaserum">Veritaserum</a>, <a href="https://profiles.wordpress.org/voldemortensen">voldemortensen</a>, <a href="https://profiles.wordpress.org/volodymyrc">VolodymyrC</a>, <a href="https://profiles.wordpress.org/vortfu">vortfu</a>, <a href="https://profiles.wordpress.org/westonruter">Weston Ruter</a>, <a href="https://profiles.wordpress.org/earnjam">William Earnhardt</a>, <a href="https://profiles.wordpress.org/willstedt">willstedt</a>, and <a href="https://profiles.wordpress.org/wordpressorru">WordPressor</a>.\n<p style="margin-top: 22px">Special thanks go to <a href="http://siobhanmckeown.com/">Siobhan McKeown</a> for producing the release video and <a href="http://camikaos.com/">Cami Kaos</a> for the voice-over.</p>\n<p>Finally, thanks to all of the contributors who provided subtitles for the release video, which at last count had been translated into 30 languages!</p>\n<p><a href="https://profiles.wordpress.org/adrianpop">Adrian Pop</a>, <a href="https://profiles.wordpress.org/deconf">Alin Marcu</a>, <a href="https://profiles.wordpress.org/bagerathan">Bagerathan Sivarajah</a>, <a href="https://profiles.wordpress.org/besnik">Besnik</a>, <a href="https://profiles.wordpress.org/bjornjohansen">Bjørn Johansen</a>, Chantal Coolsma, <a href="https://profiles.wordpress.org/cubells">cubells</a>, Daisuke Takahashi, <a href="https://profiles.wordpress.org/dianakc">Diana K. Cury</a>, <a href="https://profiles.wordpress.org/djzone">DjZoNe</a>, <a href="https://profiles.wordpress.org/dyrer">dyrer</a>, <a href="https://profiles.wordpress.org/semblance">Elzette Roelofse</a>, <a href="https://profiles.wordpress.org/wordpress-tr">Emre Erkan</a>, <a href="https://profiles.wordpress.org/fxbenard">fxbenard</a>, <a href="https://profiles.wordpress.org/tacoverdo">TacoVerdo</a>, <a href="https://profiles.wordpress.org/gabriel-reguly">Gabriel Reguly</a>, <a href="https://profiles.wordpress.org/miss_jwo">Jenny Wong</a>, <a href="https://profiles.wordpress.org/garyj">Gary Jones</a>, <a href="https://profiles.wordpress.org/hgmb">Håvard Grimelid</a>, <a href="https://profiles.wordpress.org/intoxstudio">Joachim Jensen</a>, <a href="https://profiles.wordpress.org/jimmyxu">Jimmy Xu</a>, <a href="https://profiles.wordpress.org/nukaga">Junko Nukaga</a>, <a href="https://profiles.wordpress.org/pokeraitis">Justina</a>, <a href="https://profiles.wordpress.org/kenan3008/">Kenan Dervisevic</a>, <a href="https://profiles.wordpress.org/kosvrouvas">Kostas Vrouvas</a>, <a href="https://profiles.wordpress.org/eclare">Krzysztof Trynkiewicz</a>, <a href="https://profiles.wordpress.org/goblindegook">Luís Rodrigues</a>, <a href="https://profiles.wordpress.org/luisrull">Luis Rull</a>, <a href="https://profiles.wordpress.org/culturemark">Mark Thomas Gazel </a>, <a href="https://profiles.wordpress.org/clorith">Marius Jensen</a>, <a href="https://profiles.wordpress.org/matthee">matthee</a>, <a href="https://profiles.wordpress.org/damst">Mattias Tengblad</a>, Matúš Záhradník, Mayuko Moriyama, <a href="https://profiles.wordpress.org/michalvittek">Michal Vittek</a>, <a href="https://profiles.wordpress.org/dimadin">Milan Dinić</a>, <a href="https://profiles.wordpress.org/mrshemek">MrShemek</a>, <a href="https://profiles.wordpress.org/Nao">Naoko Takano</a>, <a href="https://profiles.wordpress.org/pavelevap">pavelevap</a>, <a href="https://profiles.wordpress.org/peterhoob">Peter Holme Obrestad</a>, <a href="https://profiles.wordpress.org/petya">Petya Raykovska</a>, Przemysław Mirota, <a href="https://profiles.wordpress.org/qraczek">qraczek</a>, <a href="https://profiles.wordpress.org/bi0xid">Rafa Poveda</a>, <a href="https://profiles.wordpress.org/ramiy">Rami Yushuvaev</a>, <a href="https://profiles.wordpress.org/rasheed">Rasheed Bydousi</a>, <a href="https://profiles.wordpress.org/gwgan">Rhoslyn Prys</a>, <a href="https://profiles.wordpress.org/robee">Robert Axelsen</a>, <a href="https://profiles.wordpress.org/sergeybiryukov">Sergey Biryukov</a>, <a href="https://profiles.wordpress.org/siobhyb">Siobhan Bamber</a>, <a href="https://profiles.wordpress.org/netweb">Stephen Edgar</a>, <a href="https://profiles.wordpress.org/tohave">ک To Have داشتن</a>, <a href="https://profiles.wordpress.org/zodiac1978">Torsten Landsiedel</a>, <a href="https://profiles.wordpress.org/egalego">Victor J. Quesada</a>, <a href="https://profiles.wordpress.org/wolly">Wolly</a>, <a href="https://profiles.wordpress.org/xavivars">Xavi Ivars</a>, <a href="https://profiles.wordpress.org/xibe">Xavier Borderie</a></p>\n<p>If you want to follow along or help out, check out <a href="https://make.wordpress.org/">Make WordPress</a> and our <a href="https://make.wordpress.org/core/">core development blog</a>. Thanks for choosing WordPress. See you soon for version 4.3!</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:47:"https://wordpress.org/news/2015/04/powell/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:32:"https://wordpress.org/news/feed/";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:44:"http://purl.org/rss/1.0/modules/syndication/";a:2:{s:12:"updatePeriod";a:1:{i:0;a:5:{s:4:"data";s:6:"hourly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:15:"updateFrequency";a:1:{i:0;a:5:{s:4:"data";s:1:"1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:9:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Thu, 30 Jul 2015 17:43:37 GMT";s:12:"content-type";s:34:"application/rss+xml; charset=UTF-8";s:10:"connection";s:5:"close";s:25:"strict-transport-security";s:11:"max-age=360";s:10:"x-pingback";s:37:"https://wordpress.org/news/xmlrpc.php";s:13:"last-modified";s:29:"Wed, 29 Jul 2015 23:50:43 GMT";s:15:"x-frame-options";s:10:"SAMEORIGIN";s:4:"x-nc";s:11:"HIT lax 249";}s:5:"build";s:14:"20150730173713";}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(114, '_transient_timeout_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1438321418', 'no'),
(115, '_transient_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1438278218', 'no'),
(116, '_transient_timeout_feed_d117b5738fbd35bd8c0391cda1f2b5d9', '1438321420', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(117, '_transient_feed_d117b5738fbd35bd8c0391cda1f2b5d9', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n\n\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:61:"\n	\n	\n	\n	\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"WordPress Planet";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:28:"http://planet.wordpress.org/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:2:"en";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:47:"WordPress Planet - http://planet.wordpress.org/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:50:{i:0;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"WPTavern: Yuuta: A Free Visual Diary Theme for WordPress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47303";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wptavern.com/yuuta-a-free-visual-diary-theme-for-wordpress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4045:"<p>Earlier this month, <a href="http://wptavern.com/new-proposal-on-trac-to-remove-post-formats-from-wordpress-core" target="_blank">a new proposal landed on trac</a>, advocating the removal of <a href="http://codex.wordpress.org/Post_Formats" target="_blank">post formats</a> from core. Many believe that this feature would be better as a plugin, since it has received little improvement over the years and is not used by the majority of WordPress users.</p>\n<p>If the UI can be improved to be less confusing and theme support is standardized, post formats may have a chance at more widespread adoption. The feature is entirely dependent on theme support, as post formats are not enabled by default unless the theme author opts to include them. Many still do, which is why ripping them out of core in favor of a plugin would be a major undertaking.</p>\n<p>One of the most common use cases for post formats is a diary style WordPress theme. <a href="https://wordpress.org/themes/yuuta/" target="_blank">Yuuta</a> is a relatively popular theme on WordPress.org that revolves entirely around post formats. In the past four months, it has been downloaded more than 7,000 times. Yuuta was created to serve as a visual diary and includes support for all nine of WordPress&#8217; post formats.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/yuuta.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/yuuta.png?resize=880%2C660" alt="yuuta" class="aligncenter size-full wp-image-47392" /></a></p>\n<p>The theme was designed by Felix Dorner, owner of <a href="http://drnr.co/" target="_blank">Studio DRNR</a>, a Berlin-based web development company. According to its description page, Yuuta was selected as the the theme&#8217;s name based on its Japanese meaning:</p>\n<blockquote><p>Yuuta is a Japanese name and is made up of 優 (yuu) “gentleness, superiority”, 悠 (yuu) “distant, leisurely” or 勇 (yuu) “brave” combined with 太 (ta) “thick, big”.</p></blockquote>\n<p>Each post format has its own distinguishing icon and unique display. Dorner opted to use Roboto, Roboto Slab, and a sprinkling of Courier as the theme&#8217;s primary fonts. The typography choices were selected for optimal readability on all screen sizes.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/yuuta-chat-format.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/yuuta-chat-format.jpg?resize=961%2C526" alt="yuuta-chat-format" class="aligncenter size-full wp-image-47405" /></a></p>\n<p>Yuuta also includes specific styles for both standard and Jetpack-enabled galleries.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/yuuta-jetpack-enabled-gallery.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/yuuta-jetpack-enabled-gallery.jpg?resize=652%2C572" alt="yuuta-jetpack-enabled-gallery" class="aligncenter size-full wp-image-47407" /></a></p>\n<p>The theme&#8217;s design is fairly set, unless you opt to create a child theme. There are zero options in the Customizer. Much of the design customization is done on a post-by-post basis, as the featured image serves as a unique background for the post. Yuuta also includes editor styles to match the editing experience to the theme&#8217;s frontend appearance.</p>\n<p>The primary navigation menu is hidden until toggled into view by the icon in the header, which keeps the reader focused on the content. There are no sidebars to contend with but widgets can be added to the footer.</p>\n<p>If you&#8217;re a fan of post formats, the Yuuta theme really makes them shine. It responds to display beautifully on all devices from desktop to tablet to smartphone. Check out a <a href="http://demo.felixdorner.com/yuuta/" target="_blank">live demo</a> on Dorner&#8217;s website to see each post format in action. You can download <a href="https://wordpress.org/themes/yuuta/" target="_blank">Yuuta</a> for free from WordPress.org or install it via your admin themes browser.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 30 Jul 2015 04:06:00 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:64:"WPTavern: Awesome Geek Podcasts: A Curated List of Tech Podcasts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46562";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://wptavern.com/awesome-geek-podcasts-a-curated-list-of-tech-podcasts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2834:"<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/headphones.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/headphones.jpg?resize=960%2C482" alt="photo credit: Jan Vašek" class="size-full wp-image-47389" /></a>photo credit: <a href="https://stocksnap.io/photo/3YOVALG5DX">Jan Vašek</a>\n<p>The WordPress community produces a couple dozen high quality podcasts covering diverse topics, such as weekly news, business/entrepreneurship, education, and development. Every year the best WordPress-related podcasts are featured in <a href="http://iamdavidgray.com/best-wordpress-podcasts/" target="_blank">roundup posts</a> highlighting shows that are publishing new episodes regularly.</p>\n<p>One way to venture outside the WordPress world is to expand your horizons when it comes to podcast subscriptions. <a href="https://github.com/cv/awesome-geek-podcasts" target="_blank">Awesome Geek Podcasts</a> is a curated list of tech podcasts that was first published in May of this year on GitHub. Since that time the repository has received 121 commits from 34 contributors.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/awesome-geek-podcasts.png"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/awesome-geek-podcasts.png?resize=1025%2C551" alt="awesome-geek-podcasts" class="aligncenter size-full wp-image-47382" /></a></p>\n<p>None of the podcasts listed in the repo are directly related to WordPress, but many cover topics related to the various technologies that work in and with WordPress. The list includes approximately seven PHP-related podcasts in English (and more in other languages), along with shows focused on JavaScript, Sass, Git, and other technologies.</p>\n<p>Other topics included in the Awesome Geek Podcasts list that might be of interest to WordPress developers include:</p>\n<ul>\n<li>Running software companies</li>\n<li>Software design, creation, and delivery</li>\n<li>Front end web design, development, and UX</li>\n<li>Typography, design, prototyping</li>\n<li>Open source software</li>\n<li>Family and life/work balance</li>\n</ul>\n<p>Several of those listed follow a short format of 5 and 10-minute episodes for developers who are short on time. No matter where your interests lie in the various aspects of &#8220;geek life,&#8221; the Awesome Geek Podcast list has something for everyone.</p>\n<p>Currently the list has separate sections for shows in English, Portuguese, Spanish, Russian, Persian, and Swedish, but it is open to contribution. Although it doesn&#8217;t seem to include many podcasts that focus on specific CMS platforms, you can try <a href="https://github.com/cv/awesome-geek-podcasts/blob/master/CONTRIBUTING.md" target="_blank">submitting a pull request</a> for the inclusion of your WordPress-related podcast.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2015 20:58:52 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:67:"WPTavern: Behind the Scenes of WordPress 4.2.3 With Gary Pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47354";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:77:"http://wptavern.com/behind-the-scenes-of-wordpress-4-2-3-with-gary-pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2253:"<p>When <a href="http://wptavern.com/wordpress-4-2-3-is-a-critical-security-release-fixes-an-xss-vulnerability">WordPress 4.2.3 was released</a> last week, not only did it patch a critical security vulnerability, but also <a href="http://wptavern.com/plugin-developers-demand-a-better-security-release-process-after-wordpress-4-2-3-breaks-thousands-of-websites">adversely impacted</a> a number of sites. Changes to the Shortcode API which were necessary as part of the patch caused some plugins that rely on the API to break. These changes were not immediately communicated to plugin developers. Nearly eight hours after its release, a <a href="https://make.wordpress.org/core/2015/07/23/changes-to-the-shortcode-api/">post published</a> on the Make WordPress Core blog explained the changes.</p>\n<p>The release process of WordPress 4.2.3 left <a href="http://wptavern.com/plugin-developers-demand-a-better-security-release-process-after-wordpress-4-2-3-breaks-thousands-of-websites#comments">plugin authors and users</a> scratching their heads. On one hand, point releases are not supposed to break anything. On the other, affected plugin authors were left in the dark for nearly eight hours wondering why a point release broke their plugins.</p>\n<p><a href="http://pento.net/">Gary Pendergast</a> who works for Automattic, is a WordPress core contributor, and a member of the WordPress core security team, reached out to me for an interview. In the following conversation, we discuss what happened behind the scenes before 4.2.3 was released.</p>\n<p>He clears up some confusion on when the changes to the Shortcode API were implemented. He also admits the team made some mistakes and has already implemented changes to improve the release process. One of those changes includes publishing a post on the Make WordPress Core blog as soon as the update is pushed out to sites.</p>\n<p>I appreciate and thank Pendergast for reaching out to me to have this conversation. I look forward to similar collaborations with members of the core team in the future. A transcription of this interview is not available but if you have it transcribed and would like to make it available to the public, please <a href="http://wptavern.com/contact-me">contact me</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2015 19:02:43 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:86:"WPTavern: WordPress Theme Review Team Votes to Allow Themes to Use the REST API Plugin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47342";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:96:"http://wptavern.com/wordpress-theme-review-team-votes-to-allow-themes-to-use-the-rest-api-plugin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3363:"<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/04/colored-pencils.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/04/colored-pencils.jpg?resize=960%2C470" alt="colored-pencils" class="aligncenter size-full wp-image-42610" /></a></p>\n<p>During this week&#8217;s WordPress Theme Review Team meeting, members considered the possibility of allowing themes hosted in the directory to make use of the <a href="https://wordpress.org/plugins/rest-api/" target="_blank">WP REST API plugin</a>. Since the API is not yet included in core, any theme or plugin author who wants to use it must have the feature plugin installed.</p>\n<p>Ordinarily, WordPress.org themes are not allowed to require a plugin on installation (although they can suggest one). As per the <a href="https://make.wordpress.org/themes/handbook/review/required/#plugins" target="_blank">Theme Review Handbook on plugins</a>: <em>A theme can recommend plugins but not include those plugins in the theme code.</em></p>\n<p>&#8220;The core team has asked us to consider temporarily allowing the requirement of the REST API for themes that may take advantage of it,&#8221; Tammie Lister said before calling for a vote. She also noted that waiving the rule would be temporary, as the API will soon be going into core.</p>\n<p>&#8220;This does not open up the way for others as an exception because it&#8217;s a core feature,&#8221; she said.</p>\n<p>The team took a quick vote and all present unanimously agreed to allow themes to require the REST API plugin as a temporary measure until it is available in core. Check out the <a href="https://make.wordpress.org/themes/2015/07/28/theme-review-team-weekly-meeting-notes-the-logs-7/" target="_blank">meeting logs</a> for the full discussion.</p>\n<p>The WP REST API is already being used in production in many different ways around the web, as revealed in the comments on project leader Ryan McCue&#8217;s recent <a href="https://make.wordpress.org/core/2015/07/23/rest-api-whos-using-this-thing/" target="_blank">post</a> calling for examples. If the Theme Review Team wants to keep pace with where WordPress is headed, it must offer the flexibility to allow for more innovative themes. Temporarily waiving the guideline against plugin requirements is a smart move.</p>\n<p>As WordPress.org accrues more examples of themes that use the REST API in a way that complies with the review team&#8217;s high standards, developers who are just getting started will have strong examples for creating their own. Jack Lenox&#8217;s presentation at WordCamp London this year highlighted a few of the benefits of theming with the REST API:</p>\n<ul>\n<li>Provides a way to retrieve pure data (usually in JSON or XML format) over HTTP</li>\n<li>No loops necessary</li>\n<li>Good for mobile apps and environments where you don’t want a full webpage to render but want content from a blog or site</li>\n</ul>\n<p>With the official directory now welcoming these types of themes, it won&#8217;t be long before the entire landscape of WordPress theme development changes to support more modern ways of presenting content. Check out Jack Lenox&#8217;s presentation on <a href="http://wptavern.com/jack-lenox-on-building-themes-with-the-wp-rest-api" target="_blank">Building themes with the WP REST API</a> for information on how to get started.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2015 17:30:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"Post Status: Don’t make enemies, invest in friendships";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"https://poststatus.com/?p=13860";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:45:"https://poststatus.com/invest-in-friendships/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4756:"<p><em>Editor&#8217;s note: The following is a guest post by <a href="http://corymiller.com/about/">Cory Miller</a>, the CEO of <a href="https://ithemes.com">iThemes</a>. Cory describes his approach to making friends and avoiding making enemies. You should also check out his recent <a href="http://corymiller.com/my-talk-on-mental-health-and-entrepreneurship-is-now-online/">talk on mental health and entrepreneurship</a>, which is terrific.</em></p>\n<p>I’d rather wave a white flag and compromise than make an enemy. Every. Single. Day.</p>\n<p>I’ve purposefully and intentionally, throughout my life (and business), sought to <em>not</em> make enemies, but rather build friendships.</p>\n<ul>\n<li>Enemies are only trouble.</li>\n<li>Enemies are distractions.</li>\n<li>Enemies eat my time and energy and focus.</li>\n<li>Enemies seek your destruction.</li>\n<li>Enemies oppose you.</li>\n<li>Enemies seek to “harm or weaken” you.</li>\n</ul>\n<p>Friends do the opposite.</p>\n<p>My best example of this is my wife, Lindsey. I think of her as my greatest ally and my best friend. She’s the opposite of an enemy.</p>\n<p>The words I use to describe her are “caring,” “supportive,” “loving,” and “wants my best.”</p>\n<p>So why would I spend my time seeking to <em>create</em> enemies, instead of friendships?</p>\n<ul>\n<li>You can have opinions.</li>\n<li>You can take stands.</li>\n<li>You can and should draw boundary lines.</li>\n<li>You can have your principles and <em>never</em> budge on them.</li>\n</ul>\n<p><em>But,</em> you can also, simultaneously, choose to make and focus on friendships.</p>\n<p>Some of my best friendships have come through business, and some of them would be considered “competitors.”</p>\n<p>But I’ve cherished those friendships.</p>\n<p>Additionally, I sleep better at night knowing we only want each other’s best and that there is plenty of room for each other instead of someone actively, purposefully seeking my destruction.</p>\n<p>But instead of seeking to fester anger and hate and competition, I’ve sought the opposite, asking, &#8220;Where can we find ways to help each other do better for each other?&#8221;</p>\n<p>So what if we approached life and business like this:</p>\n<p>Instead of using that anger, bile, jerk-ness, and negative energy in telling the world who you hate and how big of a jerk you can be, and how you don’t want to be an enemy of &#8212; why not seek to build true, lasting, deep friendships?</p>\n<p>The old quote, “Keep your friends close, and your enemies closer,” is pure B.S.</p>\n<p>Why not create a friend instead of nurture an enemy?</p>\n<p>Why not tell the world that you can be the <em>best</em> friend they ever made? And prove it by your actions.</p>\n<p>Friendships do take an investment. They take consistency. They take time. They take compromise sometimes. It means showing up for them when they most need it.</p>\n<p>But those relationships have been some of the richest relationships I’ve ever had. And totally worth the investment (multiple times over and over in fact).</p>\n<p>And yes, I have made enemies in my life. Purposefully and sometimes not. In fact, someone recently asked me jokingly on Twitter who didn’t like me. I responded with:</p>\n<p>“I can think of 1 or 2 a-holes but I don’t like thinking about them. <img src="https://poststatus.com/wp-includes/images/smilies/simple-smile.png" alt=":)" class="wp-smiley" /> hahahahaha”</p>\n<p>And although that’s sadly true, I’ve sought to minimize the enemies I’ve made in my life and business.</p>\n<p>My perspective on making necessary enemies is that <em>if</em> you <em>have</em> to make an enemy &#8212; and when I say that, I don’t mean because your personality defaults to that of a jerk and you sadistically like being labeled one), but you <em>have</em> to make an enemy because you have to set a boundary and tell someone no, or take a legal action &#8212; make dang sure it’s either for a <em>very</em> good purpose, value or strategic reason.</p>\n<p>And even then, question yourself about why.</p>\n<p>As my attorney told me recently: “You catch more flies with honey.”</p>\n<p>So don’t be a jerk while making enemies. You’ll make <em>more</em> enemies in the process.</p>\n<p>Simple, lip-biting kindness in the face of anger and hate and bile helps deflate a situation rather than pour lighter fluid on it.</p>\n<p>I tell people often: it doesn’t cost me anything to be nice and kind. (In fact most of the time it makes me happier.) And I seek out different avenues to vent my frustration and relieve my stress.</p>\n<p>So I say: Don’t make enemies. Invest in friendships.</p>\n<p>It should be common sense, but sometimes I (and maybe you) need a reminder.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2015 05:13:27 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"Cory Miller";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:63:"WPTavern: Adler: A Unique Personal Blogging Theme for WordPress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47272";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:72:"http://wptavern.com/adler-a-unique-personal-blogging-theme-for-wordpress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3395:"<p>If you&#8217;re on the hunt for a new WordPress blogging theme but the designs are all starting to look too similar, you may want to check out <a href="https://wordpress.org/themes/adler/" target="_blank">Adler</a>. It is one of the more unique themes to land in the WordPress.org directory in recent months with its uncommon typography choices and bright bursts of color.</p>\n<p>Adler was created by Romanian theme designer <a href="https://twitter.com/BabBarDeL" target="_blank">George Olaru</a> of <a href="https://pixelgrade.com/" target="_blank">Pixelgrade</a>. Olaru takes a unique approach to the popular fullscreen splash page style that many themes have adopted for a homepage layout, overlaying it with a serif font title paired with a hand-script style subtitle.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/adler.png"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/adler.png?resize=880%2C660" alt="adler" class="aligncenter size-full wp-image-47315" /></a></p>\n<p>Styling for single posts is similar to the home page with the featured image serving as a fullscreen background for the title. Scroll further down and the post content is centered with no distracting sidebar widgets.</p>\n<p>Adler combines two unusual Google font choices in the design: Droid Sans Mono for paragraph text and Permanent Marker for blockquotes and subtitles. Images in posts overhang the text column to create a strong visual impact.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/adler-images-blockquotes.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/adler-images-blockquotes.jpg?resize=810%2C812" alt="adler-images-blockquotes" class="aligncenter size-full wp-image-47318" /></a></p>\n<p>Adler&#8217;s files include a tiny leaf icon that is tastefully applied on the home and archive templates to separate posts. The effect is minimalist without appearing to be stark. The theme also includes support for Font Awesome icons.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/font-awesome.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/font-awesome.jpg?resize=656%2C534" alt="font-awesome" class="aligncenter size-full wp-image-47320" /></a></p>\n<p>The necessity for large featured images can sometimes be a drawback for users when selecting a blogging theme. After testing Adler, I found that the design doesn&#8217;t break if you don&#8217;t have a large featured image assigned to a post. In fact, posts lacking a featured image look just as nice as those that include one, so you&#8217;re not tied down to hunting for one every time you publish.</p>\n<p>Adler supports three menu locations for a primary, footer, and social menu. It includes support for one footer widget area, which spans three columns. There are just two options available in the native customizer that allow you to change the background color or add a background image.</p>\n<p>Adler was created to be a personal blogging theme and the design instantly communicates: &#8220;I have something to say.&#8221; Check out the <a href="https://pixelgrade.com/demos/adler/" target="_blank">live demo</a> on Pixelgrade.com to see it in action. If you like what you see, you can <a href="https://wordpress.org/themes/adler/" target="_blank">download Adler</a> for free from WordPress.org.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2015 01:09:20 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:63:"WPTavern: New WordPress Plugin Automates Slack Team Invitations";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47267";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://wptavern.com/new-wordpress-plugin-automates-slack-team-invitations";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4403:"<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2014/11/slack-logo.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2014/11/slack-logo.jpg?resize=700%2C314" alt="slack-logo" class="aligncenter size-full wp-image-33466" /></a></p>\n<p>Generating Slack team invitations can become rather tedious when you&#8217;re managing a large group of people &#8211; particularly when the team is open to almost anyone. In the case of a company or organization, a Slack admin can use the feature that permits anyone with an email from a specified domain to be accepted on signup. However, this feature isn&#8217;t applicable to teams that are made up of people with diverse email domains and associations.</p>\n<p><a href="http://boiteaweb.fr/" target="_blank">Julio Potier</a>, a French security consultant and prolific <a href="https://profiles.wordpress.org/juliobox/" target="_blank">plugin developer</a>, created a solution for this particular scenario. As an admin on the <a href="https://wordpressfr.slack.com/" target="_blank">WordPressFR.slack.com</a> team, which is open to all French WordPress users, he needed a more convenient way to allow new signups. The team has 27 channels and 250+ members with 200 added in the first week.</p>\n<p>Julio decided to create a plugin to make the invitation process easier in the future. The new <a href="https://wordpress.org/plugins/lazy-invitation/" target="_blank">Slack Lazy Invitation</a> plugin automates the sending of Slack team invitations by adding a frontend signup on your WordPress site.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/join-slack-team.png"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/join-slack-team.png?resize=404%2C405" alt="join-slack-team" class="aligncenter size-full wp-image-47285" /></a></p>\n<p>The user simply enters an email address and the invitation is sent. A Slackbot confirmation will appear on the page.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/slack-team-invite-sent.png"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/slack-team-invite-sent.png?resize=365%2C253" alt="slack-team-invite-sent" class="aligncenter size-full wp-image-47286" /></a></p>\n<p>To configure the plugin for your Slack team all you need to do is enter the group name and the security token for your Slack invitations. As this token is not easy to find, Julio wrote a bookmarklet that will automatically capture it for you. From the plugin&#8217;s settings page you can drag and drop the bookmarklet into your browser toolbar on the invitation page found at: <code>https://YOURGROUP.slack.com/admin/invites</code>.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/lazy-slack-settings.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/lazy-slack-settings.png?resize=782%2C439" alt="lazy-slack-settings" class="aligncenter size-full wp-image-47295" /></a></p>\n<p>Once the plugin is configured, the invitation signup page will be available at <code>example.com/wp-login.php?action=slack-invitation</code>. If you&#8217;re using either the <a href="https://wordpress.org/plugins/wp-recaptcha/" target="_blank">wp-reCaptcha</a> or <a href="https://wordpress.org/plugins/google-captcha/" target="_blank">google-captcha</a> plugins, Slack Lazy Invitation will automatically add protection to the form.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/slack-invite-recaptcha.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/slack-invite-recaptcha.jpg?resize=350%2C481" alt="slack-invite-recaptcha" class="aligncenter size-full wp-image-47292" /></a></p>\n<p>The plugin also includes support for the <a href="https://wordpress.org/plugins/sf-move-login/" target="_blank">SF Move Login</a> plugin, so that the invitation form is available at /slack-invitation instead of the much longer URL. This slug can be changed in the SF Move Login settings panel.</p>\n<p>In the future Julio plans to add support for adding invite pages for multiple groups. I tested <a href="https://wordpress.org/plugins/lazy-invitation/" target="_blank">Slack Lazy Invitation</a> and found that it works exactly as advertised. If you have a large Slack team with open invites, this plugin will save you quite a bit of time. Download it for free from WordPress.org.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 28 Jul 2015 22:30:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:101:"WPTavern: Meet PeepSo: BuddyPress’ Newest Competitor in Open Source Social Networking for WordPress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46711";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:107:"http://wptavern.com/meet-peepso-buddypress-newest-competitor-in-open-source-social-networking-for-wordpress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:10255:"<p>When the first <a href="https://buddypress.org/2008/12/buddypress-10b1-components/" target="_blank">BuddyPress beta</a> arrived on the scene in 2008, there was nothing like it for WordPress. Facebook was still relatively new to the public and Twitter was just a couple years old. A plugin that transformed WordPress into a social network was an exciting prospect.</p>\n<p>After seven years of virtually unchallenged dominance among WordPress social networking plugins, BuddyPress has a new competitor. <a href="http://www.peepso.com/" target="_blank">PeepSo</a>, trademarked <em>&#8220;Your people. Your community. Your way,&#8221;</em> is the newest contender in WordPress&#8217; open source social networking plugin niche.</p>\n<p>Unlike <a href="https://buddypress.org/" target="_blank">BuddyPress</a>, which for the most part has improved slowly through community contribution, the <a href="http://www.peepso.com/" target="_blank">PeepSo</a> project is run more like a startup and is 100% self-funded. It is currently being marketed as an alternative to BuddyPress.</p>\n<blockquote class="twitter-tweet" width="550"><p lang="en" dir="ltr">You''ve been asking for it. An alternative to BuddyPress. It''s here! <a href="http://t.co/Uxd7AQcnCL">http://t.co/Uxd7AQcnCL</a> <a href="https://twitter.com/hashtag/wordpress?src=hash">#wordpress</a> <a href="https://twitter.com/hashtag/buddypress?src=hash">#buddypress</a> <a href="http://t.co/yYRI5pnXJR">pic.twitter.com/yYRI5pnXJR</a></p>\n<p>&mdash; peepso (@peepsowp) <a href="https://twitter.com/peepsowp/status/623768949943984128">July 22, 2015</a></p></blockquote>\n<p></p>\n<p>The <a href="https://wordpress.org/plugins/peepso-core/" target="_blank">PeepSo plugin</a>, available on WordPress.org, offers many of the same <a href="http://www.peepso.com/pricing/" target="_blank">core features</a> as BuddyPress but was launched with a collection of commercial add-on plugins for things like photos, videos, moods, tagging, locations, friends, and messages. A groups feature is noticeably absent from Peepso but <a href="http://www.peepso.com/roadmap/" target="_blank">planned for version 1.4</a>. Current extensions seem to focus primarily on adding multimedia features to the activity stream.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/peepso-profile.png"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/peepso-profile.png?resize=1025%2C769" alt="peepso-profile" class="aligncenter size-full wp-image-47235" /></a></p>\n<h3>Who is Behind PeepSo?</h3>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/merav-peepso.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/merav-peepso.jpg?resize=225%2C300" alt="merav-peepso" class="alignright size-medium wp-image-47241" /></a>PeepSo was founded by <a href="https://about.me/meravknafo" target="_blank">Merav Knafo</a>, owner of <a href="http://www.jomsocial.com/" target="_blank">JomSocial</a>, Joomla&#8217;s most popular social networking solution. Knafo, a veteran in the Joomla community, brings a unique perspective on the differences between the Joomla and WordPress markets for social networking software. As <a href="http://w3techs.com/technologies/overview/content_management/all" target="_blank">Joomla captures roughly 7% to WordPress&#8217; 60% of the CMS market share</a>, Knafo saw an opportunity to break into a larger market.</p>\n<p>&#8220;As a business owner, it’s my job to pay attention to trends in my industry and unfortunately, Joomla has been on a downward trend since 2009,&#8221; Knafo said.</p>\n<p>&#8220;Many of our JomSocial customers have asked us to &#8216;make JomSocial for WordPress,&#8217; because they wanted to switch to WordPress but there was nothing like JomSocial for WordPress. Finally, I could not ignore the trend nor the requests and decided to get into the WordPress market as well.&#8221;</p>\n<p>Knafo hopes to parlay her experience with JomSocial into her new venture with PeepSo.</p>\n<p>&#8220;We stuck with Joomla for almost 10 years now and took JomSocial to a whole new level when we took over in 2013,&#8221; she said. &#8220;I am very proud of what we’ve accomplished with JomSocial and super excited to implement all this experience and knowledge into PeepSo.&#8221;</p>\n<h3>How PeepSo Got Started</h3>\n<p>The idea for PeepSo was incubating for a few years before Knafo had the opportunity to execute it.</p>\n<p>&#8220;Brad Bihun used to be a customer of ours at <a href="http://www.ijoomla.com/" target="_blank">iJoomla</a>, and then he switched to WordPress,&#8221; she said. &#8220;We happened to live very close to each other in Encinitas, California, so we met up and suggested I’d created &#8216;JomSocial for WordPress.&#8217;</p>\n<p>&#8220;At that time, I didn’t even own JomSocial and I was too busy with all the iJoomla products. Then a couple of years later, I acquired JomSocial and he approached me again, but once again, I was just too busy. A year and a half into JomSocial acquisition, when things got a lot smoother, I finally said yes, he introduced me to the <a href="http://spectromtech.com/" target="_blank">SpectrOM</a> team, and we got started.&#8221;</p>\n<p>Although the plugin appears to be marketed as a direct competitor to BuddyPress, Knafo said that it wasn&#8217;t created specifically for that purpose but rather to give WordPress users a more robust array of options for building networks.</p>\n<p>&#8220;Obviously we felt there was a need for another product as an alternative to BuddyPress,&#8221; she said. &#8220;Leaving users with just one option is rarely a good idea, people like options.</p>\n<p>&#8220;We don’t necessarily plan to take on BuddyPress, we just want to offer those who want an alternative, a product that is of high quality and that is being continuously developed. Ultimately, people will choose the solution that serves them best. We are just getting started, but we have big plans and an excellent track record doing this successfully with Joomla.&#8221;</p>\n<h3>The Differences Between PeepSo and BuddyPress</h3>\n<p>I asked Knafo what her team perceives to be the most notable differences between PeepSo and its more established competitor, based on what they found to be lacking in BuddyPress.</p>\n<p>&#8220;I’d say the look and feel is a lot more modern in PeepSo right off the bat with no special themes needed,&#8221; she said. &#8220;The features are more up-to-date with the latest and greatest features of big social networks, such as Facebook &#8211; from cover photos to &#8216;likes&#8217; and so on.&#8221;</p>\n<p>BuddyPress core developers have opted to leave the aforementioned features to separate third-party plugins as opposed to packing them into core. With certain features, i.e. photos and videos, PeepSo does the same, except the add-ons are supported by PeepSo core developers.</p>\n<p>&#8220;PeepSo is lightweight and allows you to only add features that you need, to keep it lightweight,&#8221; Knafo said. &#8220;PeepSo’s code is so beautiful it made our developers shed tears of joy when they first saw it &#8211; that said, I never looked at BuddyPress’s code, nor would I be able to tell whether it’s beautiful or not.&#8221;</p>\n<p>In terms of code differences, PeepSo&#8217;s development team cited what they believe to be a few major differences between their <a href="https://github.com/wp-plugins/peepso-core" target="_blank">codebase</a> and BuddyPress:</p>\n<ul>\n<li>All object oriented &#8211; from the PHP to the Javascript</li>\n<li>Built with a templating engine similar to what you see in shopping cart systems. This allows use with virtually any theme.</li>\n<li>The JavaScript uses an extension mechanism, allowing add-ons to extend the abilities of the postbox.</li>\n<li>We made the database queries as optimized as possible to allow for greater scalability.</li>\n</ul>\n<p>&#8220;We have a track record creating and supporting a very large social networking application (JomSocial),&#8221; Knafo told the Tavern. &#8220;We know the ins and out of this business. We may be new to WordPress, but we are veterans when it comes to social networking applications.&#8221;</p>\n<h3>Where is PeepSo Headed?</h3>\n<p>The PeepSo development team, guided by lead architect <a href="https://twitter.com/davejesch" target="_blank">Dave Jesch</a> of <a href="http://spectromtech.com/" target="_blank">SpectrOM</a>, has an aggressive <a href="http://www.peepso.com/roadmap/" target="_blank">roadmap</a> for improving the plugin&#8217;s core and adding more features via commercial plugins.</p>\n<p>&#8220;Our main goal is to add more plugins to PeepSo, you can see our road map here. We’ll start with a chat plugin, custom profile fields and then groups, events, pages and so forth,&#8221; Knafo said. The team also hopes to partner with other developers who want to create PeepSo plugins.</p>\n<p>I asked her if the team plans to create a hosted PeepSo platform for community managers. Knafo said it isn&#8217;t totally out of the question but isn&#8217;t high on the priority list at the moment.</p>\n<p>&#8220;We tried to do this with JomSocial but we had a hard time finding the right hosting solution for it,&#8221; she said. &#8220;That said, we are open to the idea, a bit down the road.&#8221;</p>\n<p>PeepSo is just getting started and has not yet attracted many customers. However, Knafo&#8217;s experience of successfully running an open source project for the past 10 years has given her the determination to break into a new and unfamiliar market.</p>\n<p>&#8220;The sales have been as can be expected this early after the initial release, not too shabby to start with but we expect whole lot more sales as the WordPress users become aware of PeepSo, download the free version and give it a try,&#8221; she said.</p>\n<p>&#8220;We’re here for the long haul and we take no shortcuts in doing this right. We know it’s a huge undertaking; there is so much more to do. I am confident that investing in WordPress was the right move, I’ve been very pleased by the feedback and the community. My hope is that WordPress developers will join us and create awesome plugins to take PeepSo to the next level.&#8221;</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 27 Jul 2015 22:50:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:81:"WPTavern: Only 70 Tickets Remain to Livestream Prestige for Free August 1-2, 2015";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47208";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:90:"http://wptavern.com/only-70-tickets-remain-to-livestream-prestige-for-free-august-1-2-2015";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4855:"<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2014/08/PrestigeConfLogo.png"><img class="alignright size-full wp-image-27630" src="http://i1.wp.com/wptavern.com/wp-content/uploads/2014/08/PrestigeConfLogo.png?resize=275%2C233" alt="Prestige Conference Logo" /></a>With just a few days remaining before <a href="http://prestigeconf.com/">Prestige takes place</a>, there are only 70 tickets left to watch the event for free. Courtesy of <a href="http://www.rocketgenius.com/">Rocketgenius</a>, the event&#8217;s primary sponsor, more than 500 people will be watching the event for free this weekend. To watch the event for <del>free, use the code <strong>GravityFormsLS </strong></del>when <a href="http://prestigeconf.com/tickets/">purchasing a streaming ticket</a>.</p>\n<p>Free tickets are sold out. However, entering the code <strong>PrestigeStream</strong> when <a href="http://prestigeconf.com/tickets/">purchasing a streaming ticket</a>, will take 50% off the price</p>\n<p>Prestige is a conference founded by Kiko Doran and Josh Broton in 2014 that focuses on the business aspects of WordPress. The first event was held in Minneapolis, MN, in October of 2014. Earlier this year, Prestige was held in Las Vegas, NV. This weekend marks the third time the conference will be held.</p>\n<h2>The Future of Prestige</h2>\n<p>The first and second conference had approximately 100 attendees and Doran expects the same amount this weekend. However, future iterations of Prestige will have lower attendance. &#8220;We are transitioning to more of an online event. We’re actually going to make the in-person events smaller moving forward.&#8221; Doran told the Tavern.</p>\n<p>There&#8217;s also a chance the conference could morph into something completely different. &#8220;After organizing two WordCamps, I figured out some of the things I loved about them and some of the things I don&#8217;t. Prestige has given me the freedom to try new things and see what people like and what they don’t like,&#8221; Doran said.</p>\n<a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/PrestigeinVegas.jpg"><img class="wp-image-47216 size-full" src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/PrestigeinVegas.jpg?resize=1025%2C576" alt="Prestige in Las Vegas Nevada" /></a>Prestige in Las Vegas, NV Image courtesy of <a href="https://www.happyjoe.org/prestige-conference-las-vegas-2015/">James Dalman</a>\n<p>Although the conference has been held twice this year and in different cities, the organizing team plans to host at least one Prestige conference in Minneapolis every year. Talks are underway for the next event but details are not locked down.</p>\n<p>&#8220;We plan to do one in Minneapolis every year because we love the community there. We’d like to do Minneapolis in the summer time, due to weather, then we’d like to do any winter events in a warm place,&#8221; Doran said.</p>\n<p>Organizing a conference is a challenging experience that benefits from having motivated organizers. Doran explains what motivates him to organize Prestige, sometimes twice a year.</p>\n<p>&#8220;I have a small awesome team of organizers that love putting this event on. That and the people who come and share their knowledge. It’s a smaller event but to me, that&#8217;s the appeal of it. Everyone is far more approachable in this environment,&#8221; he said.</p>\n<h2>A First for Prestige</h2>\n<p>This weekend&#8217;s event features a hands-on workshop by Jennifer Bourn of <a href="http://www.bourncreative.com/">Bourn Creative</a>. It&#8217;s the first session in Prestige&#8217;s young history to involve hands-on exercises. The session is uncharted territory for the conference which has mostly focused on people sharing their experiences building  businesses.</p>\n<h2>How Long Will Doran Organize Prestige?</h2>\n<p>With this being his third conference, I asked Doran how long does he plan to continue organizing Prestige, &#8220;I’ll organize the conference as long as there is a demand for the content. People often say to scratch your own itch. This conference started off as a little self-serving in that I wanted to ask people all of these questions. Then I thought, couldn’t others benefit from this information as well?&#8221; he replied.</p>\n<h2>I&#8217;ll Be at Prestige Conference</h2>\n<p>I&#8217;ll be among the 100 expected attendees at this weekends conference. If you&#8217;re attending the event, please stop me and say hi. If not, make sure you grab one of the <a href="http://prestigeconf.com/tickets/">70 tickets left</a> to watch a livestream of the event. You can also monitor the <a href="https://twitter.com/search?q=prestigeconf&src=typd">#Prestigeconf</a> hashtag on Twitter. If you&#8217;ve previously attended Prestige or watched the livestream, please share your experiences in the comments.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 27 Jul 2015 21:13:13 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:57:"WPTavern: WordPress Users Association Under New Ownership";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46317";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"http://wptavern.com/wordpress-users-association-under-new-ownership";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5827:"<p>The <a href="http://wpua.org/">WordPress Users Association</a> (WPUA) is breathing new life after it was acquired by Paul DeMott earlier this year <a href="https://flippa.com/4377398-pr-2-2-405-last-12-mos-wordpress-training-membership-site-3500-members">on Flippa</a> for $797. WPUA originally launched in December 2010, with the goal of providing a central place for WordPress users to swap war stories, learn how to get the most out of WordPress, and take part in getting special discounts on themes and plugins.</p>\n<a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/WPUAFrontPage.png"><img class="size-full wp-image-47197" src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/WPUAFrontPage.png?resize=1025%2C489" alt="Redesigned Front Page" /></a>Redesigned Front Page\n<p>Three years after its launch, the site appeared to be dead. In 2013, <a href="http://wptavern.com/psa-dont-give-your-money-to-the-wpua">I paid to become a member</a> to confirm my suspicions and to see if the site still accepted payments. Free themes and plugins offered to members were not impressive and there wasn&#8217;t much to choose from. All of the videos used for WordPress training were broken. Despite these setbacks, I was able to successfully complete the refund process.</p>\n<h2>Financial Details</h2>\n<p>Earlier this year, WPUA.org was listed on <a href="https://flippa.com/">Flippa.com</a>, a domain auctioning site. As part of the auction financial details of WPUA.org were made public. According to <a href="https://flippa.com/users/217895">the seller</a>, the site made $20K when it launched. The previous owners spent between $500-$1,000 on ads and answering WordPress questions through the Ask a WordPress Expert section of the site.</p>\n<p>The following shows revenue, costs, and profit between October 2014 and March 2015. WPUA earned revenue primarily with product or service sales and affiliate income.</p>\n<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/WPUARevenue.png"><img class="size-full wp-image-47198" src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/WPUARevenue.png?resize=580%2C273" alt="WPUA Revenue" /></a>WPUA Revenue\n<p>At the time the site was listed for auction, it had 3,500+ total members made up of free and paid subscriptions. The site today boasts more than 5,600 members.</p>\n<h2>Previous Owner Explains Why He Sold The Site</h2>\n<p>Wesley Williams is the former owner of WPUA.org and helped launch the site in 2010. Williams transitioned away from the domain because his web development business used the majority of his time. &#8220;We felt with our limited time to invest in it that it was best to transition it to someone who shared our passion but had a little more time to invest in growing the community and serving the members. We completed this transition back in April,&#8221; Williams told the Tavern.</p>\n<p>From my perspective, the WPUA was not a successful venture but Williams says otherwise.</p>\n<p>&#8220;I wouldn&#8217;t say it wasn&#8217;t a success. There are thousands of members and we provided a lot of help to a lot of new and experienced WordPress users. As my main core business grew and as the time requirements of our projects increased, we couldn&#8217;t devote the time required to answer questions and give the help needed.</p>\n<p>&#8220;Actually, WPUA was a big success in my mind. Just from a number of members point of view it was a success. From the amount and number of questions and people we helped it was a success and from a financial standpoint it was a success,&#8221; he said.</p>\n<p>Williams explains his goal with WPUA and why some members of the community may not be aware of the growth it had. &#8220;My goal was to help the under-served, those just getting started and without the technical know how to make what is actually simple fixes or changes to their WordPress site.</p>\n<p>&#8220;I didn&#8217;t run the WPUA in the circles of all the established WordPress technical crowd, even though a large number of them became members of the WPUA. I ran it focused on users new to the platform and so because of that, some members of the WordPress community might not be aware of the growth and success it had,&#8221; he said.</p>\n<p>Through the course of time, Williams and his team adjusted membership levels and access points which helped increase registrations. Williams also learned that what members wanted was a direct way to ask questions and receive expert answers.</p>\n<p>&#8220;A person new to the platform didn&#8217;t want to post their question in a forum and they weren&#8217;t really sure what the real question was. Thus, we removed the forum and went to an &#8216;Ask an Expert&#8217; system where they could email their questions. This seemed to work better for everyone,&#8221; he said.</p>\n<p>Overall, Williams is happy with how WPUA progressed and feels fortunate to have played a role in its growth and success.</p>\n<h2><strong>Who is Paul DeMott?</strong></h2>\n<p>In the <a href="https://vimeo.com/129324627">following video,</a> DeMott explains how to build a eCommerce site with WooCommerce and calls himself the new president of recruitment for the WPUA. According to <a href="https://www.linkedin.com/pub/paul-demott/79/300/727">his LinkedIn profile</a>, he lives in Cincinnati, OH and is the owner of Paul&#8217;s SEO and Web Expertise which works with companies to develop websites that bring in internet traffic and sales.</p>\n<p>Not much is known about DeMott and multiple requests for comment have gone unanswered. It&#8217;s unclear what his plans are for WPUA.org but so far, it&#8217;s remained as a paid subscription membership site. If you are a past or current member of the WordPress Users Association, please tell us about your experience in the comments.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 27 Jul 2015 20:39:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:22:"Matt: MPAA Smoking Gun";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45270";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:38:"http://ma.tt/2015/07/mpaa-smoking-gun/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:319:"<p>Sometimes truth is worse than what you would imagine: <a href="https://www.techdirt.com/articles/20150724/15501631756/smoking-gun-mpaa-emails-reveal-plan-to-run-anti-google-smear-campaign-via-today-show-wsj.shtml">Smoking Gun: MPAA Emails Reveal Plan To Run Anti-Google Smear Campaign Via Today Show And WSJ</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 27 Jul 2015 15:34:15 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:119:"WPTavern: Plugin Developers Demand a Better Security Release Process After WordPress 4.2.3 Breaks Thousands of Websites";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47146";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:129:"http://wptavern.com/plugin-developers-demand-a-better-security-release-process-after-wordpress-4-2-3-breaks-thousands-of-websites";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6880:"<a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2014/07/security.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2014/07/security.jpg?resize=1024%2C487" alt="photo credit: Ravages - cc" class="size-full wp-image-27206" /></a>photo credit: <a href="https://www.flickr.com/photos/ravages/6731739485/">Ravages</a> &#8211; <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>\n<p><a href="http://wptavern.com/wordpress-4-2-3-is-a-critical-security-release-fixes-an-xss-vulnerability" target="_blank"> WordPress 4.2.3</a>, a critical security release, was automatically pushed out to users yesterday to fix an XSS vulnerability. Shortly afterwards, the <a href="https://wordpress.org/search/4.2.3?forums=1" target="_blank">WordPress.org support forums</a> were flooded with reports of websites broken by the update.</p>\n<p>Roughly eight hours later Robert Chapin (@<a href="https://profiles.wordpress.org/miqrogroove/" target="_blank">miqrogroove</a>) published a post to the Make.WordPress.org/Core blog, detailing <a href="https://make.wordpress.org/core/2015/07/23/changes-to-the-shortcode-api/" target="_blank">changes to the Shortcode API</a> that were included in the release. According to Chapin, these changes were necessary as part of the security fix:</p>\n<blockquote><p>Due to the nature of the fix – as is often the case with security fixes – we were unable to alert plugin authors ahead of time, however we did make efforts to scan the plugin directory for plugins that may have been affected.</p>\n<p>With this change, every effort has been made to preserve all of the core features of the Shortcode API. That said, there are some new limitations that affect some rare uses of shortcodes.</p></blockquote>\n<p>The security team had no reasonable way of accounting for every single edge case, but the negative impact of these changes were far more wide-reaching than they had anticipated. This particular use case likely wasn&#8217;t covered in their testing. Unfortunately, plugin developers found out about the breaking changes only after the security release had already left a slew of broken websites in its wake.</p>\n<p>&#8220;I fully understand this is an issue, but isn’t this a weird way of updating &#8211; almost all our clients are calling / e-mailing us at the moment as their sites seem to be broken,&#8221; one developer <a href="https://make.wordpress.org/core/2015/07/23/changes-to-the-shortcode-api/#comment-26449" target="_blank">commented</a> on the Shortcode API post. &#8220;Normally it would be better to announce such huge impact changes to the plugin and theme developers. This means I need to fully reschedule my agenda, which already is full during holiday season.&#8221;</p></blockquote>\n<p>Comments on the WordPress.org post are full of developers scrambling to find a way to fix client websites. Many were disappointed that the total secrecy of the security team, which is necessary in situations like this, was not immediately followed up with a public post on the important changes to the Shortcode API. Meanwhile, the email inboxes of agencies and plugin developers are filling up with urgent messages from outraged clients.</p>\n<p>Developers want better communication from the those who are managing security releases. <a href="https://twitter.com/helzer" target="_blank">Amir Helzer</a>, author of <a href="https://wordpress.org/plugins/types/" target="_blank">Types</a> and <a href="http://wp-types.com/home/views-create-elegant-displays-for-your-content/" target="_blank">Views</a>, two plugins majorly affected by the release, <a href="https://make.wordpress.org/core/2015/07/23/changes-to-the-shortcode-api/#comment-26447" target="_blank">sums up the thoughts of many other commenters</a> on the Make/WordPress.org/Core post:</p>\n<blockquote><p>We are updating the Views plugin today, so that we resolve all shortcodes before passing to WordPress to process content.</p>\n<p>This is a straightforward change, which takes us one day to complete.</p>\n<p>Would have been great to receive a heads-up about an upcoming change in WordPress, so we could do this change on time.</p>\n<p>We received a huge amount of support requests due to this, but this isn’t the issue. We can deal with a wave a support issues. This time it wasn’t “our fault”, but sometimes it is.</p>\n<p>What worries us, as mentioned above, is seeing our clients (folks who build WordPress sites for a living), losing their faith in the system. They feel like the system sees them as little ants and not as humans. People don’t like seeing their problems being dismissed.</p>\n<p>Many of them run hundreds of sites. They cannot afford to stop everything and fix content on so many sites. Especially not if they are currently away for their family vacation.</p>\n<p>What others have asked here, and I would like to ask, too, is to setup a mechanism that allows WordPress core developers to privately communicate such upcoming issues with plugins developers.</p>\n<p>We are your partners.</p>\n<p>Without WordPress (secure, stable and reliable), we would not exist.</p>\n<p>Without great themes and plugins, WordPress would not power 24% of the Web.</p>\n<p>WordPress core members already volunteer a lot of their time. I’m not asking for anyone to volunteer more time. Need help? Ask us. There is a huge community of developers who rely on WordPress. We would be happy to get involved and set up whatever is needed.</p></blockquote>\n<p>User confidence in WordPress&#8217; automatic background updates took a dent with the 4.2.3 release. Waking up to broken websites causes users to second guess automatic updates after being assured that maintenance and security releases would not include breaking changes.</p>\n<p>When users get burned by automatic updates, in the end it doesn&#8217;t matter which party is at fault &#8211; whether it&#8217;s the core team or a theme or plugin. They simply expect updates to work and not break anything. Even in instances where a poorly coded extension may be at fault, the average user has no way of determining whether or not their active plugins follow WordPress best practices.</p>\n<p>The aftermath of the most recent security release is one reason why many developers and users are still wary of automatic updates. Amir Helzer represents many other plugin developers who are eager to find better ways to work together with the core team to provide a better update experience for users. This is especially important for releases like this one where the Shortcode API changes directly affected users&#8217; content. Hezler&#8217;s comment reaffirms the fact that development agencies, plugin developers, and core developers are all partners on the same team. It&#8217;s time to find better ways of working together to provide the best update experience possible for WordPress users.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 25 Jul 2015 02:46:42 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:95:"WPTavern: FooPlugin’s Digital License Key Management Plugin is Now Open Source for Developers";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47117";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:102:"http://wptavern.com/fooplugins-digital-license-key-management-plugin-is-now-open-source-for-developers";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5296:"<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/06/open-source.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/06/open-source.jpg?resize=1024%2C514" alt="photo credit: 16th st - (license)" class="size-full wp-image-45884" /></a>photo credit: <a href="http://www.flickr.com/photos/79777096@N00/6866996865">16th st</a> &#8211; <a href="https://creativecommons.org/licenses/by-nd/2.0/">(license)</a>\n<p>Three years ago, <a href="http://fooplugins.com/" target="_blank">FooPlugins</a> built <a href="https://bitbucket.org/fooplugins/foolicensing" target="_blank">FooLicensing</a>, a digital license key management tool that enabled them to manage customers of their <a href="https://easydigitaldownloads.com/" target="_blank">EDD</a>-powered commercial plugins store. Although EDD already offered a license creation and management extension, FooPlugins required more features than it had at that time and opted to build their own.</p>\n<p>As of today, FooLicensing is now open source and free for anyone to use, along with the associated EDD connector plugin.</p>\n<p>&#8220;We love the community and wanted to give back,&#8221; FooPlugins co-founder Adam Warner said.</p>\n<p>&#8220;We know FooLicensing could be so much more but we just don&#8217;t have the time to dedicate to it alone. We are a small team and because of that we find ourselves with dozens of projects that could be so much more if only we had more time and people.&#8221;</p>\n<p>Open sourcing a project can change its trajectory if there&#8217;s enough interest and developers willing to contribute to improve it. Warner isn&#8217;t counting on that, however, and simply hopes other developers will find it useful.</p>\n<p>&#8220;It&#8217;s a bit of a leap of faith, but if it helps someone else get involved to help create an even more robust system, then great,&#8221; he said. &#8220;Bonus if it helps someone build additional extensions to help others.&#8221;</p>\n<p>FooLicensing&#8217;s main features include:</p>\n<ul>\n<li>View and manage the validated domains for your EDD license level</li>\n<li>One click EDD license upgrade/add to cart</li>\n<li>One click EDD license renewal (with associated discount) /add to cart</li>\n</ul>\n<p>A logged-in user who has entered a license key will see all the relevant account information detailing status, activations, expirations, etc.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/foolicensing-user-admin.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/foolicensing-user-admin.png?resize=580%2C332" alt="foolicensing-user-admin" class="aligncenter size-full wp-image-47135" /></a></p>\n<p>Administrators who are using the plugin together with its <a href="https://bitbucket.org/fooplugins/edd-foolicensing" target="_blank">EDD Connector</a> will see a menu with various license creation and management tools.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/foolicensing-admin-view.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/foolicensing-admin-view.png?resize=160%2C264" alt="foolicensing-admin-view" class="aligncenter size-full wp-image-47137" /></a></p>\n<p>The <a href="https://bitbucket.org/fooplugins/edd-foolicensing" target="_blank">EDD Connector</a>, also now open source, enables the following:</p>\n<ul>\n<li>Add new licenses to attach to an EDD product</li>\n<li>A searchable list of all license keys that have been created and assigned, complete with attached domains</li>\n<li>A list of licenses that have been renewed</li>\n<li>Testing for license validation and update checks in the API Sandbox</li>\n<li>A management area for various messages (domain attach, detach) and for license renewal discount amount and emails</li>\n</ul>\n<h3>Foo Licensing is Extensible for Other Platforms</h3>\n<p>FooLicensing was built from the beginning to be extensible for use with other platforms beyond EDD. The team at FooPlugins had plans to expand their library of connectors but didn&#8217;t have the time to execute them.</p>\n<p>&#8220;Our goal for FooLicensing was to build additional integrations for other eCommerce plugins and digital sales platforms but it quickly took a back seat as our <a href="https://fooplugins.com/plugins/foobox/" target="_blank">FooBox</a> and other plugins like <a href="https://fooplugins.com/plugins/foogallery/" target="_blank">FooGallery</a> gained popularity,&#8221; Warner said.</p>\n<p>&#8220;Documentation is non-existent at this point, but we welcome you to step through the code and consider getting involved with the core plugin or with extensions for other eCommerce platforms.&#8221;</p>\n<p>Warner said the team is considering a full-fledged site dedicated to FooLicensing if enough developers become interested and would consider the possibility of a marketplace to host any extension built. FooPlugins does not currently have plans to create additional extensions in house.</p>\n<p>&#8220;We&#8217;ll see what the future holds, but for now we need to move forward with some other things rather than holding this tight to our chests,&#8221; Warner said. &#8220;Open sourcing the plugins just fits in with what we believe is the right thing to do to make the web (and the WP community) a better place.&#8221;</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 24 Jul 2015 20:17:40 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:46:"Post Status: Thesis, Automattic, and WordPress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"https://poststatus.com/?p=13692";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"https://poststatus.com/thesis-automattic-and-wordpress/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:70425:"<p>Chris Pearson and Matt Mullenweg have hardly communicated with one another in the last five years, but they are ideological enemies. They are both wealthy individuals (though of different magnitudes) thanks to their online endeavors, with very strong personalities and unshakable beliefs on business and software. This is a story of their dispute, their idealism, and the implications it will have on the WordPress project.</p>\n<p><a href="http://ma.tt/">Matt Mullenweg</a> co-founded WordPress, founded <a href="https://automattic.com">Automattic</a>, and is one of the most successful entrepreneurs of his generation. He runs a billion dollar &#8220;unicorn&#8221; startup centered on a culture of embracing open source technology and has achieved incredible success embracing principles counterintuitive to either Silicon Valley or big corporate culture. He&#8217;s paving a new path for how to create a valuable software company while religiously defending and promoting open source software.</p>\n<p><a href="http://www.pearsonified.com/">Chris Pearson</a> founded <a href="http://diythemes.com/">DIYthemes</a> and helped pioneer the early WordPress commercial theme industry. He has run his business successfully for over seven years, despite unique hurdles that result from a very public dispute with Mullenweg in 2010. He vehemently defends his work as his own non-derivative achievement and rejects the religiosity and cult mentality that he believes exists in the WordPress ecosystem. He views WordPress as a huge chunk of the web, available to be monetized &#8212; which he has done so to the tune of millions of dollars &#8212; but he does not believe he must adopt Matt Mullenweg&#8217;s principles in order to meet customer demand, run his own business, and protect his own inventions.</p>\n<p>By all normal definitions, Mullenweg and Pearson have done incredibly well for themselves. However, from a pure size perspective and principles aside, Mullenweg is the big nation army and Pearson is the small revolutionary militia. Mullenweg views Pearson as a threat to everything he stands for and has worked to accomplish, and Pearson views Mullenweg as an overbearing figure with no true authority over his decisions.</p>\n<p>Mullenweg has the motivation, resources, and ability to squash Pearson &#8212; and indeed most thought he&#8217;d done so already. While he has far fewer resources, Pearson has some tools available to protect his business or to potentially even disrupt the entire WordPress ecosystem as we know it today.</p>\n<p>During their first conflict in 2010, and in the resurgent one going on now, Mullenweg and Pearson have both at times made mistakes, acted childishly, or been in the wrong. Both also have merit in various aspects of their positions. Neither conflict, so publicly debated, reflects well on the WordPress ecosystem as a whole &#8212; even though I believe it is right that each conflict is best observed under a public eye, as the results can affect so many other businesses and potentially even WordPress itself.</p>\n<p>With this post, I aim to outline the entire conflict; to describe the implications past, present and future; to highlight non-WordPress comparisons for precedent and potential implications; and to share my own thoughts on who is in the right and who is in the wrong, as viewed for the good of the global WordPress community.</p>\n<h2>A history of conflict</h2>\n<p>The commercial theme movement started in 2007 and took off in 2008. Thesis was one of the pioneers of commercial WordPress themes. The theme industry was young and evolving rapidly, and many sellers hardly considered or understood licensing issues at all.</p>\n<p>Many of the sources for this period are from Siobhan McKeown&#8217;s excellent account in the book, <a href="https://github.com/WordPress/book"><em>Milestones: The Story of WordPress</em></a> (which I&#8217;ll refer to as <em>Milestones</em>).</p>\n<h3>Themes as derivative works of WordPress</h3>\n<p>WordPress is licensed by the GNU General Public License (GPL), version 2 or later. The GPL ensures certain freedoms that protect both WordPress and those that utilize it. The &#8220;four freedoms&#8221; that are the heart of the GPL are as follows:</p>\n<blockquote>\n<ul>\n<li>The freedom to run the program as you wish, for any purpose (freedom 0).</li>\n<li>The freedom to study how the program works, and change it so it does your computing as you wish (freedom 1). Access to the source code is a precondition for this.</li>\n<li>The freedom to redistribute copies so you can help your neighbor (freedom 2).</li>\n<li>The freedom to distribute copies of your modified versions to others (freedom 3). By doing this you can give the whole community a chance to benefit from your changes. Access to the source code is a precondition for this.</li>\n</ul>\n</blockquote>\n<p>As WordPress co-founder Mike Little phrased it in the Post Status Slack, &#8220;The GPL is meant to be restrictive for developers and permissive for users.&#8221; The <a href="https://gnu.org/philosophy/philosophy.html">GNU philosophy page</a> and subsequent articles are a good resource for understanding the nature of the license.</p>\n<p>The GPL is a <a href="https://en.wikipedia.org/wiki/Copyleft">Copyleft</a> license, which creates the &#8220;stipulation that the same rights be preserved in derivative works down the line.&#8221; In an immature theme market, licensing was given relatively little notice, and many theme authors provided their themes with no license or proprietary licenses.</p>\n<p>Matt Mullenweg, to many, would be considered <a href="https://en.wikipedia.org/wiki/Benevolent_dictator_for_life">BDFL</a>, or Benevolent Dictator for Life, of WordPress. It&#8217;s a common term for folks that lead open source projects and have final say on project decisions. In his role as WordPress BDFL, he now has a reputation &#8212; at least within certain circles of folks that pay close attention &#8212; for making large, impactful decisions with little description of why he has done so.</p>\n<p>In late 2008, more than 200 free WordPress themes were removed from the WordPress.org theme repository. While many of the themes were removed due to spammy links, some were pulled due to GPL violations within the themes or within the theme upsells that were linked from the theme listings.</p>\n<p>The move, which was made without announcement, shocked many theme providers that felt they were unfairly included in the group of removed themes. The situation created a spark and initiated a serious debate about theme licensing.</p>\n<p>Authors were concerned that GPL licensed themes would mean that their themes would be bought and freely distributed, removing their ability to make money from their works. A few, such as Brian Gardner with his Revolution theme, <a href="http://www.blogherald.com/2008/10/01/brian-gardners-revolution-theme-goes-open-source/">changed their licensing</a> as a result of conversations with Mullenweg and Toni Schneider, Automattic&#8217;s CEO at the time. In Brian&#8217;s case, he made his theme free and offered paid support services.</p>\n<p>Eventually though, most authors &#8220;selling&#8221; themes started actually selling support, access to download, and updates for their themes. This model was both GPL compatible, as well as workable for authors to get paid.</p>\n<p>In mid-2009, Matt Mullenweg also posted <a href="https://wordpress.org/news/2009/07/themes-are-gpl-too/">on the official</a> WordPress blog that he was introducing a new <a href="https://wordpress.org/themes/commercial/">commercial theme listing page</a> on WordPress.org, and he shared an opinion he requested from the Software Freedom Law Center (SFLC), where they determined that the two themes packaged with WordPress were derivative works.</p>\n<p>The SFLC opinion did leave room for a &#8220;split license&#8221; where the WordPress and PHP code must inherit the GPL, and the CSS, Javascript, and images could be under a proprietary license:</p>\n<blockquote><p>In conclusion, the WordPress themes supplied contain elements that are derivative of WordPress’s copyrighted code. These themes, being collections of distinct works (images, CSS files, PHP files), need not be GPL-licensed as a whole. Rather, the PHP files are subject to the requirements of the GPL while the images and CSS are not. Third-party developers of such themes may apply restrictive copyrights to these elements if they wish.</p>\n<p>Finally, we note that it might be possible to design a valid WordPress theme that avoids the factors that subject it to WordPress’s copyright, but such a theme would have to forgo almost all the WordPress functionality that makes the software useful.</p></blockquote>\n<p>&#8220;Split license&#8221; is the colloquial term the community has assigned to this statement, but in fact the actual splitting of which parts are GPL and which parts are not matters, so it may not do the reality of the situation justice. Perhaps it should be termed &#8220;PHPGPL&#8221; or &#8220;Non-Assets GPL&#8221;.</p>\n<p>A number of prominent theme sellers were unhappy with Mullenweg&#8217;s insistence that their themes maintain a 100% GPL license, but they were not willing to shake the boat over it. At this point, themes were becoming big businesses and making new millionaires (or close to it) of some of these shop owners. This settled the issue for nearly all theme sellers, and most moved to either 100% GPL or a PHPGPL license, and the doomsday scenarios never came; the theme industry continues to thrive.</p>\n<h3>Thesis holds out</h3>\n<p>But not everyone agreed to go either 100% GPL or PHPGPL license. Chris Pearson kept his Thesis theme under a proprietary license.</p>\n<p>Thesis was one of the most popular and flexible themes in the world, and Pearson <a href="https://github.com/WordPress/book/blob/925d7dc6293b1662a7e6839a2703e8a858c730ad/Content/Part%205/39-thesis.md">boasted on Andrew Warner&#8217;s Mixergy podcast</a> of revenues of $1.2 million+ over the 12-18 month period prior to the interview. Mullenweg and Pearson criticized one another publicly, and Warner invited them both to Mixergy where they debated the merits of GPL licensing.</p>\n<p>By most accounts, Mullenweg had the better argument on the Mixergy episode, and also came off as a calmer and more collected personality &#8212; in contrast to Pearson&#8217;s often heated, and sometimes very strange, statements.</p>\n<p>The debate continued between Mullenweg, Pearson, and a variety of WordPress community members and their blogs. Mullenweg was extremely aggressive, to the extent that he <a href="https://twitter.com/photomatt/status/18548422506">offered to buy</a> alternative commercial themes for users of Thesis that agreed to switch. Mullenweg tells me that many took him up on his offer, but it was, &#8220;less than a thousand.&#8221; In my opinion, this was a step too far by Mullenweg, though for him the issue was already personal.</p>\n<p>Pearson held his ground over the following days until an admission by one of his own team members of wholesale copying of code in Thesis from WordPress code, which violates the WordPress copyright.</p>\n<p>At this point, Pearson finally capitulated and announced that Thesis would be a split license GPL compatible theme, and the debate died down. Pearson put his head down and started working on Thesis 2.</p>\n<p>He released Thesis 2 in late 2012, and by this time the debate was cool &#8212; the community had moved on to other drama (yes, even more GPL drama) &#8212; and the release of Thesis 2 was largely ignored outside of DIYthemes&#8217; audience, which was quite large but also largely isolated from the WordPress &#8220;community&#8221; that cares about stuff like licensing.</p>\n<p>Therefore, not many people paid attention to the new Thesis or the licensing it contained. Mullenweg, however, was still paying attention.</p>\n<h2>The battle over thesis.com</h2>\n<p>If you consider the word <em>thesis</em>, what do you think of?</p>\n<p>If you are a regular person walking down the street, you probably think of the general concept for stating a theory, or perhaps you think of the long papers that university students write as part of their programs.</p>\n<p>If you are in the WordPress world, you may also consider the Thesis WordPress theme by DIYthemes.</p>\n<p>Good, single word domain names are hard to come by. Thesis.com, if you visit it now, redirects to the <a href="http://themeshaper.com">ThemeShaper blog</a>. ThemeShaper is owned and operated by Automattic, and frequently posts articles about WordPress themes.</p>\n<p>ThemeShaper is not a dedicated commercial property, but it does link to Automattic&#8217;s primary website, and Automattic does make and sell WordPress themes.</p>\n<h3>Automattic buys thesis.com</h3>\n<p>Automattic hasn&#8217;t always owned <a href="http://thesis.com">thesis.com</a>. Matt Mullenweg met a third party owner of the domain at a conference &#8212; a guy named Larry &#8212; and inquired about the domain by email in January of 2014. Chris Pearson had already attempted to purchase the domain from Larry, and did not agree to pay the $150,000 that Larry requested.</p>\n<p><a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php">According to Pearson&#8217;s accounts</a>, he and Larry had a few exchanges that stalled with Pearson unwilling to bid beyond $37,500 for the domain, and Larry sticking to $150,000. With a $100,000 offer on the table from Mullenweg, Larry gave Pearson an opportunity to buy the domain for $115,000, which he didn&#8217;t do &#8212; in part because he thought it too expensive, but also because he suspected Larry didn&#8217;t really have the offer from Mullenweg.</p>\n<p>As we now know, Larry did have the offer and Automattic became the owner of the thesis.com domain name.</p>\n<p>Pearson didn&#8217;t know that Mullenweg actually bought the domain until November of 2014, when he was notified by a friend that Mullenweg&#8217;s WordCamp San Francisco State of the Word Q&amp;A session included a section where Mullenweg noted that he owned the domain (more on that later).</p>\n<h3>Pearson attempts to force domain transfer</h3>\n<p>On April 9th, 2015, Pearson and his lawyers filed a UDRP (Uniform Domain-Name Dispute Resolution Policy) complaint, which is a formal method for resolving domain disputes, recognized by ICANN. UDRP isn&#8217;t a formal government court, but serves as arbitration for domains due to the recognition by ICANN.</p>\n<p>There are many, many examples of UDRP complaints in regard to trademark infringement. There are a <a href="https://www.icann.org/resources/pages/policy-2012-02-25-en?routing_type=path">number of criteria</a> that come into play that guide the UDRP panel&#8217;s decision making process.</p>\n<p>The three basic tenets that must be met are as follows:</p>\n<blockquote><p>(i) your domain name is identical or confusingly similar to a trademark or service mark in which the complainant has rights; and</p>\n<p>(ii) you have no rights or legitimate interests in respect of the domain name; and</p>\n<p>(iii) your domain name has been registered and is being used in bad faith.</p></blockquote>\n<p>The panel reviews the initial complaint (in this case, by Pearson) and gives the respondent (Automattic) an opportunity to respond. All correspondence is in writing and not in person. The panel has two weeks after everything has been submitted to reach a decision.</p>\n<p>In this case, which <a href="http://www.adrforum.com/domaindecisions/1613723.htm">is available publicly</a>, the panel denied Pearson&#8217;s complaint.</p>\n<p>Pearson&#8217;s complaint cited that he fulfilled each of the three criteria:</p>\n<ul>\n<li>By noting his trademark of the word &#8220;thesis&#8221;.</li>\n<li>By noting that Automattic was using the domain with a commercial interest (by redirecting it to ThemeShaper).</li>\n<li>By noting the bad faith clause by citing that Automattic, &#8220;purchased the disputed domain name to confuse and redirect customers and potential customers to Respondent’s competing webpage.&#8221;</li>\n</ul>\n<p>In the response, Automattic did not contest Pearson&#8217;s trademark on the word <em>thesis</em>. However, Automattic also noted that the word is very generic, and also that ThemeShaper was not a commercial part of Automattic, but a &#8220;blogging site.&#8221;</p>\n<p>For the bad faith argument, Automattic claimed that the redirect to ThemeShaper furthers their, &#8220;purpose in providing a blogging site,&#8221; and highlights that the intention for the domain is not as a commercial entity or one to be confused with Pearson&#8217;s trademark.</p>\n<h3>Automattic wins dispute</h3>\n<p>Automattic won the dispute against Pearson. As noted, the panel had two weeks to deliver the decision, and Automattic proposed a settlement with Pearson before the decision was handed down.</p>\n<p>Pearson was considering the settlement when the decision came a day before the two week deadline, which is apparently not a common occurrence. Had the decision not come early, Pearson may have saved himself some trouble, especially in regard to eliminating the <a href="http://ttabvue.uspto.gov/ttabvue/v?qs=85115266">trademark cancellation requests</a> by Automattic on <em>thesis</em> and related terms.</p>\n<p>In Pearson&#8217;s blog post, <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php">The Truth about Thesis.com</a>, he notes the general terms of the proposed settlement:</p>\n<blockquote><p>Automattic’s attorneys drafted the original settlement, which included the following terms:</p>\n<ul>\n<li>Automattic would keep thesis.com</li>\n<li>Automattic would withdraw the federal trademark cancellation request</li>\n<li>I would withdraw the UDRP</li>\n<li>Both parties would mutually release one another (agree not to sue over this issue in the future)</li>\n</ul>\n<p>Nothing in the original settlement addressed the trademark infringement, and since this was the reason I took action in the first place, I added a requirement that Automattic no longer infringe upon my mark (which would mean they stop forwarding the domain).</p>\n<p>At this point in the proceedings, I agreed to the settlement.</p></blockquote>\n<p>However, since the decision came early, the settlement was never binding. It&#8217;s also worth noting that Mullenweg commented to me that Pearson&#8217;s stated terms are actually not the terms of the settlement:</p>\n<blockquote><p>In the settlement Automattic offered Chris we agreed not to infringe his trademarks (which is the law, regardless of what the settlement said). He never asked us to change the redirect of thesis.com in the settlement, and if he asked after, we would have said no. There were no restrictions on thesis.com in the settlement.</p></blockquote>\n<p>He also said, &#8220;I wish he had reached out before litigating,&#8221; and noted that it would have &#8220;definitely&#8221; changed the outcome of the entire situation. Whether it truly would have is neither here nor there.</p>\n<h3>Possibility for appeal</h3>\n<p>The UDRP doesn&#8217;t have an official appeals process. Instead, they are willing to not make the changes that a ruling states, if indeed a domain transfer or other action is ordered, if the affected party files a suit in court within ten days of the ruling.</p>\n<p>In this case, Pearson did not file in a court within the given timeline, and since the ruling did not require a change in domain ownership, there is no further recourse with the UDRP. However, there is no time limit if Pearson wishes to file in court &#8212; but that is the only path remaining if he truly wants to go after the domain.</p>\n<h3>Legitimacy of the trademark dispute</h3>\n<p>Trademark law has a long history. Trademarks follow a categorical system, meaning words and terms must be trademarked within a particular category to be applied to.</p>\n<p>Pearson has three trademarks for the Thesis and DIYthemes brands, all under <a href="http://www.oppedahl.com/trademarks/tmclasses.htm">international trademark class</a> 42, for computer, scientific, and legal purposes:</p>\n<ul>\n<li>THESIS</li>\n<li>THESIS THEME</li>\n<li>DIYTHEMES</li>\n</ul>\n<p>The applications were filed in 2010 and registered in 2011. On June 16th, 2015, Automattic filed <a href="http://ttabvue.uspto.gov/ttabvue/v?qs=85115266">cancellation requests</a> for all three trademarks, which were instituted June 25th. Pearson has 40 days from the date the application was instituted (which would be August 4th) to file a response to the cancellation requests. His answers, &#8220;must contain admissions or denials of the allegations in the petition for cancellation, and may include available defenses and counterclaims.&#8221; It is his burden as the defendant to establish his defense, and, &#8220;Failure to file a timely answer may result in entry of default judgment and the cancellation of the registration.&#8221;</p>\n<p>Basically, Automattic is holding his feet to the fire to defend the trademarks, which their counsel feels should not apply for two primary reasons, as listed in their <a href="http://ttabvue.uspto.gov/ttabvue/v?pno=92061714&pty=CAN&eno=1">formal filing</a>.</p>\n<ul>\n<li>The trademarks were registered in Pearson&#8217;s own name, but are used by DIYthemes, and Automattic claims that, &#8220;The Pearson Applications were improperly filed in the name of an individual, who did not have the requisite intent-to-use the marks as of the filing date, and the underlying applications are void ab initio.&#8221; Their claim notes that US Code section <a href="https://www.law.cornell.edu/uscode/text/15/1051">1051(b)</a> offers this justification.</li>\n<li>Furthermore, section <a href="https://www.law.cornell.edu/uscode/text/15/1052">1052(e)(1)</a> requires that a trademark not be &#8220;merely descriptive,&#8221; as Automattic claims his trademarks are.</li>\n</ul>\n<p>If upheld, the trademarks will be deregistered by the US Patent Office, further limiting Pearson&#8217;s options to defend his claims to the thesis.com domain name in a formal court suit.</p>\n<p>I don&#8217;t know how good of a case Automattic has, but purely on the surface it looks pretty good. I spent time reviewing the application and the US Code and the arguments appear fairly sound &#8212; especially the argument that Pearson applied for the trademarks as an individual and utilizes them as DIYthemes, despite DIYthemes already having been registered as an LLC.</p>\n<h3>Automattic&#8217;s justification for the domain</h3>\n<p>During the <a href="https://videopress.com/v/WmCl2kwS">WordCamp San Francisco Q&amp;A</a>, Mullenweg noted the existence of the redirect of the domain name with a sense of pride, and a bit of a side-eyed smirk. In response to a question about relationships with commercial theme sellers and marketplaces, he states:</p>\n<blockquote><p>With the premium theme and plugin folks? &#8230; We have had some ups and downs, particularly with marketplaces that didn&#8217;t follow the GPL, for example, or violated WordPress&#8217;s license &#8212; themes that violated WordPress&#8217;s license. Um, you can go to thesis.com to learn more about that. Type it in, seriously.</p></blockquote>\n<p>I was at this Q&amp;A in person, and don&#8217;t remember him saying this, as it was so buried in a much larger conversation, and I was simultaneously writing a wrap-up post about the State of the Word. However, once the UDRP ruling surfaced publicly, a number of WordPress community members recalled Matt&#8217;s statement and it brought a new dimension to the ruling and Mullenweg&#8217;s motivation for the domain.</p>\n<p>While Automattic bought the domain, Matt Mullenweg was clearly the driving force behind the decision. When <a href="http://wptavern.com/mullenweg-and-pearson-square-off-on-patents-gpl-and-trademarks">WP Tavern prompted Automattic</a> for a comment on their motivation for purchasing the domain, they responded with the following:</p>\n<blockquote><p>We’re happy the panel ruled in our favor. We think Thesis.com is a cool, generic .com that could be used for a variety of things. Just because you have a small WordPress theme doesn’t mean you have a right to seize generic English word .com domains.</p></blockquote>\n<p>We can accept Automattic&#8217;s case that they had a general interest in a generic .com domain, but in reality we know better. Mullenweg was clearly presented with an opportunity by this Larry character that checked all of the right boxes for him.</p>\n<p>He could get a domain he obviously knew Pearson would want, and deny him.</p>\n<p>It has a side benefit that it <em>is</em> a high quality generic domain that will likely maintain or increase its value. And he probably thought it was funny.</p>\n<p>I doubt Mullenweg even knew what kind of trademarks Pearson held, but despite Pearson holding the trademarks, it seems Automattic&#8217;s attorneys now have the upper hand, and it is highly unlikely Pearson will ever own the domain now.</p>\n<p>Mullenweg <a href="http://wptavern.com/mullenweg-and-pearson-square-off-on-patents-gpl-and-trademarks#comment-70849">commented</a> on his refusal to give up the domain to Pearson on WP Tavern:</p>\n<blockquote><p>I’m not going to give a domain worth several hundred thousand dollars to the worst actor in the entire WP ecosystem, someone who keeps repeatedly violating the GPL and now has gone beyond that into patents. Why reward that? I wouldn’t sell it if he offered a million dollars.</p>\n<p>There are so many people doing amazing things in the WP community, and 100% GPL! I can and have supported them almost every opportunity I can, and one of the things I’m most proud of in the world is how many fantastic open source businesses have been built on top of WordPress.</p>\n<p>And it’s just the beginning — if you remembered in 2010 Chris said that going GPL would destroy businesses and sticking to the principles of our license would destroy investment in WordPress — we all know how that’s worked out since then.</p></blockquote>\n<p>Such a statement, combined with the WCSF video, highlights that the issue is about far more than the domain and its investment potential &#8212; a 10x return in less than a year would make for an excellent investment, in the near impossible situation Pearson would offer that.</p>\n<p>No, the move was quite clearly a personal one &#8212; if also convenient &#8212; for Mullenweg, and that&#8217;s why terms like &#8220;bully&#8221;, &#8220;petty&#8221;, and &#8220;spiteful&#8221; have been used by many WordPress community members surprised by his actions. They expected more. They expected better, even when directed toward someone as controversial as Chris Pearson.</p>\n<h2>Pearson&#8217;s patent</h2>\n<p>While a tantalizing story, the battle over thesis.com is not <em>the</em> story here. It has simply been the spark to reignite old disputes with new fervor with potentially much bigger consequences than the 2010 affair ever reached.</p>\n<p>One of two additional large components of this story is an active patent application by Pearson that was submitted in 2012 and published in 2014. Keep in mind &#8212; and Chris Pearson reiterated this to me many times &#8212; it is an application for a patent, not a published patent.</p>\n<h3>A patent on Thesis 2, or all web templates?</h3>\n<p>The main patent is titled, <a href="https://patents.google.com/patent/US20140095982A1/en?q=thesis&q=diythemes"><em>Systems, Servers, and Methods for Managing Websites</em></a>. Chris Pearson is listed as the inventor and DIYthemes the assignee.</p>\n<p>The patent never mentions WordPress or WordPress themes, however both in the abstract and in the text, it does have many similarities to what one may expect as a description of a general template mechanism for a website, versus a specific description of the Thesis 2 technology.</p>\n<p>Here is the abstract in full (and here is the <a href="https://poststatus.com/wp-content/uploads/2015/07/US20140095982-thesis-patent-app.pdf">full patent application PDF</a>, including art):</p>\n<blockquote><p>Systems, servers, and methods for managing websites. Some embodiments provide methods which include, according to a user selection of a website skin, activating the selected skin. The skin comprises at least one structural box further comprising structural code for the website. The method also includes receiving a request (for instance a call to a hook) to serve the website. Further, the method includes, responsive to the request, outputting (by echoing PHP code if desired) the structural code with style related code applied thereto according to a reference between the box and a style package (which comprises the stylistic code). The outputting can occur in an order associated with the boxes. In some situations, another skin can be activated. Moreover, a change (or, perhaps, an edit) can be made to another skin and displayed without affecting the website. Moreover, another skin can be selected and associated with the website.</p></blockquote>\n<p>I discussed the patent at length with Chris Pearson, and while much of that conversation is off the record, I can share what I believe his motivations are with the patent application, and what I think the potential implications for this new chapter of Pearson versus Mullenweg are.</p>\n<h3>Discovery and publicity of the patent</h3>\n<p>This patent and another that&#8217;s since been rescinded were discovered by Automattic&#8217;s lawyers during the UDRP proceedings. There is debate as to how members of the WordPress community discovered the patents&#8217; existence &#8212; Jeff Chandler of WP Tavern and Carl Hancock of Gravity Forms were two of the first to discuss it publicly &#8212; but there is speculation from Chris Pearson and others that the community discovery of these patents was leaked by Mullenweg himself in order to deflect the attention at the time away from the domain issue and onto the patents and their potential implications.</p>\n<p>I honestly don&#8217;t care how they came up, though Pearson&#8217;s questioning of Jeff Chandler&#8217;s journalistic integrity were uncalled for. It is anyone&#8217;s right and ability to tip someone off to legitimate news &#8212; and these patent applications are legitimate news &#8212; and I don&#8217;t believe for a second that Chandler has played puppet to his boss&#8217;s wishes. He has dutifully and to the best of his ability written about whatever news matters to the community, and I respect him for it.</p>\n<p>Nevertheless, this patent does potentially have significantly more newsworthiness, depending on if it is approved and how it is defended by Pearson if it is approved.</p>\n<h3>Patent law and litigation</h3>\n<p>Patents often get a bad reputation, and their role in the software world is quite murky. I apologize in advance for this long sidebar on the wild world of patents.</p>\n<h4>Patent trolls</h4>\n<p>Most folks have heard of &#8220;patent trolls&#8221; that prey on companies using vague or overly generic patents, demanding big payouts.</p>\n<p>Patent law is weird, and the lawsuits that result are infamously unpredictable and cause a scenario ripe for abuse. For example, filing patent lawsuits in one district over another can have enormous impact, like <a href="http://www.nytimes.com/2006/09/24/business/24ward.html?pagewanted=all&_r=0">the case of Marshall, Texas</a>, which is a hotbed for patent trolls:</p>\n<blockquote><p>Patent litigation is a growing business across the country; Marshall is just the most visible example. Among the weightier issues behind the mushrooming of its patent docket is whether the elements that have made it expand — hungry plaintiffs’ lawyers, speedy judges and plaintiff-friendly juries — are encouraging an excess of expensive litigation that is actually stifling innovation.</p>\n<p>Some say yes. “A lot of the cases being filed in Marshall are by patent holding companies, or patent trolls, as they’re called, whose primary and only assets are patents,” Mr. Tyler said.</p></blockquote>\n<p>Companies that deal in patents but do not utilize the patented technology are <a href="https://www.patentfreedom.com/about-npes/background/">called non-practicing entities (NPEs)</a>.</p>\n<p>One of the concerns with Pearson&#8217;s patent would be if it were approved and he sold it to an NPE. It&#8217;s not uncommon for NPEs to acquire patents with the express purpose to enforce them:</p>\n<blockquote><p>Finally, of course, some entities buy patents with the express purpose of licensing them aggressively. For instance, about 25% of “parent” NPEs tracked by PatentFreedom are enforcing only patents that they had acquired. Another 60% are asserting patents originally assigned to them, and the remaining 15% are asserting a blend of originally assigned and acquired patents. However, if we add in the more than 2,100 subsidiaries and affiliates of these entities and treat them all as standalone entities, we find that 19% of them are originally assignees, and 69% are acquirers, and 12% are blends.</p>\n<p>Regardless of the important variations in their origin and behavior, NPEs present a fundamentally different challenge than operating company patent assertions.</p></blockquote>\n<h4>Software patents unpredictability and &#8220;obviousness&#8221;</h4>\n<p>The concept of software patents <em>at all</em> has been in dispute for a long time. Thousands have been awarded, but there are a handful of past court rulings that seem to <a href="https://www.law.cornell.edu/uscode/text/35/part-II/chapter-10">govern the US Patent and Trademark office&#8217;s interpretations</a> for making decisions when reviewing software patents.</p>\n<p><a href="http://www.ipwatchdog.com/2014/02/01/when-is-an-invention-obvious/id=47709/">Obviousness</a> is a key term in the patent world. Patent applicants aim to create &#8220;meaningful&#8221; patents, but &#8220;at a minimum you must have claims that embody patent eligible subject matter, demonstrate a useful invention, cover a novel invention and which are non-obvious in light of the prior art. Obviousness is typically the real hurdle to patentability, and unfortunately the law of obviousness can be quite subjective and difficult to understand. At times obviousness determinations almost seems arbitrary.&#8221;</p>\n<p>&#8220;Art&#8221; is the outlay of the invention by the applicant, and the invention&#8217;s ability to be patented depends on &#8220;prior art&#8221; not deeming the invention as obvious. Establishing non-obviousness for software has a contentious history. If it can be shown that, &#8220;any combination of prior art references that when put together would be the invention in question,&#8221; then the applicant is in trouble.</p>\n<p>But there is a great deal of potential for subjectivity from thousands of patent examiners:</p>\n<blockquote><p>Still, ever since the Supreme Court’s decision in KSR [<a href="http://www.ipwatchdog.com/2012/04/29/ksr-the-5th-anniversary-one-supremely-obvious-mess/id=24456/">reference</a>] there has been a great deal of subjectivity in the application of the law of obviousness, which is apparent if you look at the patents that issue, patents that are finally rejected and ultimately abandoned, and the patents the Federal Circuit ultimately finds to include obvious patent claims. There is little to no predictability at the edges.</p></blockquote>\n<h4>The Alice case</h4>\n<p>In my research, the <em>Alice case</em> came up many times as a pivotal case for helping to define the legitamacy of software patents. Martin Goetz is the holder of the first ever software patent, and has <a href="http://www.ipwatchdog.com/2015/02/06/alice-v-cls-bank-is-a-victory-for-software-patents/id=54489/">an excellent write-up on the importance of the Alice case</a>.</p>\n<blockquote><p>I have been asked for my opinion based my long history in the software industry and from my perspective as someone that has followed that controversial question “Is Software patentable”? That question first began to be publicly debated when I received the first software patent in 1968 for an invention on a new way of sorting data on a computer. Shortly thereafter a publication printed a page one headline “First Patent is Issued for Software, Full Implications Are Not Yet Known.”</p>\n<p>Forty five years later a variation of that question was again before the Supreme Court when it agreed to hear the appeal of the Alice v. CLS Bank case.</p></blockquote>\n<p>Goetz argues that the Alice case is a victory for software patents on both sides: that it helps true inventions gain patents (he and others assign a high standard to define &#8220;invention&#8221;), and it also helps prevent abuse of overly vague or non-inventive &#8220;obvious&#8221; patents to be denied:</p>\n<blockquote><p>The Alice v CLS Bank Supreme Court decision in June 2014 was a great victory for those that believe that inventors that use a digital computer to innovate can get a patent on their invention. It is also a victory for those people and organizations that recognize how the patent System has been abused for many years by trolls and others where there was no invention. Since the Supreme Court decision in June, thousands of patents that should never have been issued are now being deemed invalid by the US Courts and by the Patent Office.</p></blockquote>\n<h4>Obviousness and invention for Pearson&#8217;s patent</h4>\n<p>This long and boring description of patents is necessary because Pearson&#8217;s patent application is still just an application, and it can be challenged, both by the patent reviewer, but also by third parties.</p>\n<p>As patent obviousness is &#8220;so unevenly applied,&#8221; there is some risk in not challenging Pearson&#8217;s patent, if a third party like Automattic (or a myriad of other web template providers) is worried about the potential implications of the patent. Although, the Alice case does seem &#8212; in my very amateur opinion &#8212; to offer better guidance to reject the patent based on a lack of true invention.</p>\n<h3>Pearson&#8217;s reasoning for a patent, and its likelihood for success</h3>\n<p>Patents are not cheap to apply for. The patent application Pearson submitted is 34 pages of art diagrams and text describing the inventiveness of Thesis 2, though Thesis 2 is not specifically named.</p>\n<p>I asked Pearson why he applied for the patent, which he did not want to share the specifics of his position due to the open nature of the application. I&#8217;ve racked my brain to try and determine the potential causes as well.</p>\n<p>There are only a couple of decent outcomes for Pearson with this patent application. The most likely, and not good outcome for him, is that he is denied the patent; and in this case he would have spent a great deal of money for nothing.</p>\n<p>In the event he does get the patent &#8212; or perhaps even before it is fully reviewed for approval &#8212; he could face a challenge from Automattic or other parties that may be concerned his invention&#8217;s description could apply more broadly than Thesis 2.</p>\n<p>If he gets the patent, and he survives a challenge, I see three ways he could theoretically use it:</p>\n<ul>\n<li>He can do nothing.</li>\n<li>He can sell it to the highest bidding NPE, which would be a dreadful outcome for any web entities that sell templates.</li>\n<li>He can keep it in his back pocket, in case someone threatens his business or his software license, wherein he can initiate a lawsuit.</li>\n</ul>\n<p>Honestly, the whole patent route seems odd. I don&#8217;t love the idea of this patent being approved, because the application does seem overly broad toward all web templates to me, from the title to the meat of the application&#8217;s art. However, there are loads of patents in the world for incredibly silly things that have never really impacted a lot of folks&#8217; life; it&#8217;s just that it doesn&#8217;t mean a silly patent <em>couldn&#8217;t</em> become a problem. The Electronic Frontier Foundation has <a href="https://www.eff.org/patent">mountains of evidence</a> of patent holders causing havoc.</p>\n<p>I&#8217;m not much of a gambler, but if I had to gamble on this I&#8217;d put my money on this patent never being approved, and definitely never truly impacting the web or WordPress industry at scale.</p>\n<p>I don&#8217;t think Pearson is a bad guy for wanting to patent his work. When I requested comment about the patents, he told me, &#8220;If I were ever to consider selling my business, things like trademarks and patents show up on the balance sheet and add to the bottom line,&#8221; but that he views them as, &#8220;one of many expensive, ridiculous options for bolstering one&#8217;s business,&#8221; versus a way to celebrate and protect his achievements as I previously characterized his intentions.</p>\n<h2>The GPL</h2>\n<p>Most agree that the GPL has not been well tested in court, though a <a href="https://en.wikipedia.org/wiki/Software_license">software license</a> is a &#8220;legal instrument.&#8221; There is often confusion over whether a license is a contract or not.</p>\n<h3>License versus contract</h3>\n<p>One of my favorite <a href="http://softwarelawyer.blogspot.com/2008/01/jacobsen-v-katzer.html">things I&#8217;ve read on this</a> is by former Adobe Associate General Counsel Robert Pierce:</p>\n<blockquote><p>A license is not a contract. This much I know.</p>\n<p>Rather, a license is a permission granted by one party to another allowing use of a property without fear of lawsuit brought by the granting party. A license does not include a return promise (i.e., consideration) from the licensee. So, as we all learned in law school, a license cannot be a contract under law. This is not to say that a license cannot be an element of a contract under which two parties trade promises, one of such promises being a license. This is commonly known as a &#8220;license agreement.&#8221; But a bald license, a one-way promise, is enforceable outside of contract law. It is something apart. It exists and is enforceable under property law doctrine.</p>\n<p>What makes things difficult is that the scope of a license&#8217;s grant, and the conditions and restrictions on the license (or all of them together) can make what is intended to be a one-way license look a lot like a contract. The precise wording used becomes critical.</p></blockquote>\n<p>The distinction can be significant because, &#8220;contracts are enforceable by contract law, whereas licenses are enforced under copyright law,&#8221; though even this rule depends on the jurisdiction where the matter is being discussed. His larger point is that a license is a one-way street, whereas a contract is agreed upon by both sides.</p>\n<h3>Spirit of the GPL</h3>\n<p>There is little debate that a &#8220;Split GPL&#8221; or &#8220;PHP GPL&#8221; license is perfectly GPL compatible, though Mullenweg doesn&#8217;t consider that the &#8220;<a href="https://github.com/WordPress/book/blob/e55a93f1056ffac8466944086b2c5104becab9c4/Content/Part%206/42-spirit-of-the-gpl.md">spirit of the GPL</a>,&#8221; and companies like Envato&#8217;s ThemeForest and others have felt the consequences of not adopting 100% GPL licenses.</p>\n<p>From <em>Milestones</em>:</p>\n<blockquote><p>While not everyone liked the fact that the WordPress project would only support 100% GPL products, most people had accepted it. Many, however, were taken by surprise, by a sudden flare-up around not just the legalities of the GPL, but the “spirit” of the license. In a 2008 interview, Jeff Chandler asks Matt about the spirit of the GPL. Matt says that the spirit of the GPL is about user empowerment, about the four freedoms: to use, distribute, modify, and distribute modifications of the software. Software distributed with these four freedoms is in the spirit of the GPL. WordPress was created and distributed in this spirit, giving users full freedom with regard to the software.</p>\n<p>The Software Freedom Law Center&#8217;s opinion &#8212; with regards to WordPress themes, however &#8212; gives developers a loophole, one that helps them achieve GPL compliance, but denies the same freedoms as WordPress. PHP in themes must be GPL, but the CSS, images, and JavaScript do not have to be GPL. This is how Thesis released with a split license &#8212; the PHP was GPL, while the rest of the code and files were proprietary. This split license ensures that the theme is GPL compliant yet it isn&#8217;t released under the same spirit as the GPL&#8217;s driving user-freedom ethos.</p>\n<p>The loophole may have kept theme sellers in line with the GPL, but WordPress.org didn&#8217;t support that approach. In a 2010 interview, Matt says “in the philosophy there are no loopholes: you’re either following the principles of it or you’re not, regardless of what the specific license of the language is.&#8221; Theme sellers that sell their themes with a 100% GPL license are supported by WordPress. Those that aren’t don’t get any support or promotion on WordPress.org or on official resources. This is also one of the WordCamp guidelines, introduced in 2010; that WordCamps should promote WordPress’ philosophies. If a speaker, volunteer, or organizer is distributing a WordPress product it needs to be 100% GPL, i.e., the CSS, JavaScript, and other assets need to be GPL, just like the PHP.</p></blockquote>\n<p>Mullenweg believes that Thesis 2 is not only not in the spirit of the GPL, but flagrantly operates in total violation of it, as Thesis 2 carries a 100% proprietary license. Considering the implications for folks that make stuff compatible with the GPL, it&#8217;s little surprise that Mullenweg has taken the stance and actions he has toward Pearson.</p>\n<h3>Thesis 2 carries a proprietary license</h3>\n<p>Chris Pearson&#8217;s <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php#comment-1507962">comment on his blog post</a> describes that the theme has always been a proprietary license, and he describes why it is okay to be such:</p>\n<blockquote><p>In October 2012, I released an all-new version of Thesis that carried the same name as the original (which had a split-GPL license), but that’s where the similarities stopped.</p>\n<p>The new Thesis is not a Theme—it is an operating system for templates and design. This system runs Skins and Boxes, which are similar to Themes and Plugins, but with a boatload of built-in efficiencies that Themes and Plugins cannot provide.</p></blockquote>\n<p>It is worth noting the final paragraph of the SFLC&#8217;s opinion that Mullenweg has cited numerous times as justification against proprietary licenses <em>does</em> have a provision for avoiding WordPress&#8217;s copyright:</p>\n<blockquote><p>Finally, we note that it might be possible to design a valid WordPress theme that avoids the factors that subject it to WordPress’s copyright, but such a theme would have to forgo almost all the WordPress functionality that makes the software useful.</p></blockquote>\n<p>That&#8217;s exactly what Pearson believes Thesis 2 is. But the GPL has rarely been tested in a proper court, and never from a WordPress perspective. The SFLC&#8217;s opinion is just that, for now, whether Mullenweg likes it or not.</p>\n<h3>The GPL in court</h3>\n<p>The Free Software Foundation maintains the copyright on the text of the GPL itself, and between the FSF and the SFLC, a <a href="https://en.wikipedia.org/wiki/GNU_General_Public_License#Legal_status">small number of lawsuits</a> have occurred, and a German court upheld the GPL as a &#8220;valid, legally binding&#8221; license, but most of these tests have occurred outside of the United States. From what I can tell, cases involving the GPL have largely settled outside of court when based in the United States, or were argued on whether the GPL was legally applied, like in the case of <a href="https://en.wikipedia.org/wiki/SCO_Group,_Inc._v._International_Business_Machines_Corp.#The_GPL_issue">SCO vs IBM</a>, rather than whether the GPL was legally binding itself.</p>\n<p>In another case, <a href="https://en.wikipedia.org/wiki/Wallace_v._International_Business_Machines_Corp.">Wallace vs FSF</a>, Daniel Wallace compared the GPL to price fixing, as it required software to be free. The FSF won the case, as the judge cited, &#8220;The GPL encourages, rather than discourages, free competition and the distribution of computer operating systems, the benefits of which directly pass to consumers. These benefits include lower prices, better access and more innovation.&#8221;</p>\n<p>A much <a href="http://www.infoworld.com/article/2893695/open-source-software/vmware-heading-to-court-over-gpl-violations.html">newer case involving VMware</a> again tests the GPL. The Software Freedom Conservancy, &#8220;claims VMware is using the Linux kernel without respecting the terms of its copyright license, the GPL.&#8221; This case may offer a better precedent for WordPress and its derivative works, as it is centered on &#8220;module loading&#8221; in VMware, &#8220;with an insulating layer to allow its kernel to use unmodified Linux drivers.&#8221; The case gets murkier than that, as it may not have been as isolated as it was attempted, but the result could be decent precedent for similarly loading WordPress themes and plugins, in my opinion.</p>\n<h3>Limited guidance</h3>\n<p>Few lawyers want to be the first to test something in court. It&#8217;s easier to make a case when there are many cases before you to provide guidance. With the GPL, there is what&#8217;s called &#8220;limited guidance,&#8221; meaning that it&#8217;s untested, and therefore the outcome of a GPL case in the US could be very difficult to predict.</p>\n<p>If a lawsuit does occur, it could prove costly to all parties involved, and I think it&#8217;s clear that Pearson and Mullenweg both wish that litigation was not happening, though both of them maintain a bit of a &#8220;you started it&#8221; attitude.</p>\n<p>Without a formal court proceeding, which could last years, it&#8217;s going to be near impossible for Matt Mullenweg to fully prevent non-GPL compatible licenses to exist for WordPress themes and plugins. His best method to prevent it is to do what he&#8217;s done so far: make an example of bad offenders and cause anyone thinking of using a non-GPL compatible license to reconsider.</p>\n<h2>Are all WordPress themes derivative works?</h2>\n<p>A key question to whether themes and plugins must be GPL compatible licensed is whether the theme or plugin is a derivative of WordPress itself. If it is derivative, then it is under the umbrella of the GPL&#8217;s Copyleft nature.</p>\n<p>Folks disagree a good bit on how themes and plugins should be considered as derivative works, though most either agree with Mullenweg&#8217;s strict &#8220;spirit of the GPL&#8221; view, or at least have molded to avoid being an outcast.</p>\n<p>The strongest argument I&#8217;ve seen in favor of all themes being derivative of WordPress &#8212; no matter how much or little they rely on WordPress functionality &#8212; is from WordPress lead developer Mark Jaquith:</p>\n<blockquote><p>There is a tendency to think that there are two things: WordPress, and the active theme. But they do not run separately. They run as one cohesive unit. They don’t even run in a sequential order. WordPress starts up, WordPress tells the theme to run its functions and register its hooks and filters, then WordPress runs some queries, then WordPress calls the appropriate theme PHP file, and then the theme hooks into the queried WordPress data and uses WordPress functions to display it, and then WordPress shuts down and finishes the request. On that simple view, it looks like a multi-layered sandwich. But the integration is even more amalgamated than the sandwich analogy suggests.</p>\n<p>Here is one important takeaway: <em>themes interact with WordPress (and WordPress with themes) the exact same way that WordPress interacts with itself</em>. Give that a second read, and then we’ll digest.</p>\n<p>The same core WordPress functions that themes use are used by WordPress itself. The same action/filter hook system that themes use is used by WordPress itself. Themes can thus disable core WordPress functionality, or modify WordPress core data. Not just take WordPress’ ultimate output and change it, but actually reach into the internals of WordPress and change those values before WordPress is finished working with them. If you were thinking that theme code is a separate work because it is contained in a separate file, also consider that many core WordPress files work the same way. They define functions, they use the WordPress hook system to insert themselves at various places in the code, they perform various functions on their own but also interact with the rest of WordPress, etc. No one would argue that these core files don’t have to be licensed under the GPL — but they operate in the same way that themes do!</p>\n<p>It isn’t correct to think of WordPress and a theme as separate entities. As far as the code is concerned, they form one functional unit. The theme code doesn’t sit “on top of” WordPress. It is within it, in multiple different places, with multiple interdependencies. This forms a web of shared data structures and code all contained within a shared memory space. If you followed the code execution for Thesis as it jumped between WordPress core code and Thesis-specific code, you’d get a headache, because you’d be jumping back and forth literally hundreds of times. But that is an artificial distinction that you’d only be aware of based on which file contained a particular function. To the PHP parser, it is all one and the same. There isn’t WordPress core code and theme code. There is merely the resulting product, which parses as one code entity.</p></blockquote>\n<p>Jaquith&#8217;s argument that the theme and WordPress execute together to form a joint &#8220;modified work&#8221; is the key phrase, I believe. As he states, and I tend to agree, it does not matter that the files are separate or that they can be distributed independently; together, when executed, they are so intertwined that they become a single work.</p>\n<p>That said, the theme is clearly dependent on WordPress itself, which is another common justification that themes are derivative. Explaining this concept is simple: WordPress can be distributed without any theme but those that ship with it by default. But a distributed theme, like Thesis, must be <em>installed and activated using WordPress&#8217;s own schema for loading a template</em>, and cannot operate independently of WordPress.</p>\n<h3>What about the WordPress REST API?</h3>\n<p>Thus far, we&#8217;ve discussed the derivative nature of WordPress themes and plugins, which require they operate within the WordPress install. It is a different matter if we consider applications that consume data or interact with WordPress as an outside application.</p>\n<p>The WordPress REST API enables one to interact with or consume data from WordPress, while being wholly independent of the WordPress install. Jaquith makes a clear exception for a scenario like this (and also applies it to technologies like RSS and XML-RPC):</p>\n<blockquote><p>Something that interacts with these APIs sits entirely outside of WordPress. Google Reader doesn’t become part of WordPress by accessing your feed, and MarsEdit doesn’t become part of WordPress when you use it to publish a post on your WordPress blog. These are separate applications, running separately, on separate codebases. All they are doing is communicating. Applications that interact with WordPress this way are separate works, and the author can license them in any way they have authority to do so.</p></blockquote>\n<h3>The GNU&#8217;s take</h3>\n<p>The GNU agrees with Jaquith&#8217;s take. They provide <a>an FAQ</a> to answer, &#8220;&#8221;What is the difference between an &#8216;aggregate&#8217; and other kinds of &#8216;modified versions&#8217;?&#8221; The emphasis provided is my own:</p>\n<blockquote><p>An “aggregate” consists of a number of separate programs, distributed together on the same CD-ROM or other media. The GPL permits you to create and distribute an aggregate, even when the licenses of the other software are non-free or GPL-incompatible. The only condition is that you cannot release the aggregate under a license that prohibits users from exercising rights that each program&#8217;s individual license would grant them.</p>\n<p><em>Where&#8217;s the line between two separate programs, and one program with two parts? This is a legal question, which ultimately judges will decide</em>. We believe that a proper criterion depends both on the mechanism of communication (exec, pipes, rpc, function calls within a shared address space, etc.) and the semantics of the communication (what kinds of information are interchanged).</p>\n<p><em>If the modules are included in the same executable file, they are definitely combined in one program. If modules are designed to run linked together in a shared address space, that almost surely means combining them into one program</em>.</p>\n<p>By contrast, pipes, sockets and command-line arguments are communication mechanisms normally used between two separate programs. So when they are used for communication, the modules normally are separate programs. But if the semantics of the communication are intimate enough, exchanging complex internal data structures, that too could be a basis to consider the two parts as combined into a larger program.</p></blockquote>\n<p>The GNU argument falls very much in line with Jaquith&#8217;s, though admits itself that judges must decide whether it&#8217;s the case, in the end.</p>\n<h3>The case against The GNU position on derivative works</h3>\n<p>The University of Washington School of Law has a <a href="http://www.law.washington.edu/lta/swp/index.html">section of their website</a> devoted to the, &#8220;business, legal and technical consequences of choosing Open Source Software (OSS) or proprietary software.&#8221; They cover many of the topics I&#8217;ve outlined in this post so far, and <a href="http://www.law.washington.edu/lta/swp/Law/derivative.html">in the case of the GPL and derivative works</a>, they believe the GNU is overstepping with an &#8220;expansive definition&#8221; of derivative works with consequences, &#8220;counter to the goals of the proponents of Free Software.&#8221;</p>\n<p>The most compelling of multiple derivative works examples they provide is that of subclasses. For example, imagine a class, <code>Some_Theme_Class</code> that extends <code>Some_Core_WordPress_Class</code>. The GPL FAQ is very hardline on the topic (and for what it&#8217;s worth, Thesis 2 does extend some WordPress core classes). Washington believes the GNU stance on inheritance is too over-reaching:</p>\n<blockquote><p>Example 5: Programmer X wishes to write a class D, that is a subclass of existing class B. Class B is subject to the terms of the GPL. If X distributes D, does it have to be licensed under the terms of the GPL?</p>\n<p>The answer given in the GPL FAQ is short and to the point: &#8220;Subclassing is creating a derivative work.&#8221; In our example, this makes D a work derived from B, and thereby makes D subject to the terms of the GPL upon distribution. This approach attempts to further broaden the reach of the GPL, but it again leads to counter-intuitive results.</p>\n<p>Typical object oriented programming languages include a standard class hierarchy. This hierarchy provides a framework within which application developers can build their programs. The standard classes typically provide useful classes that represent user interface elements (e.g. windows, buttons, etc.), collection classes (for handling collections of data), and input-output abstractions (e.g. files and networking connections). In many object oriented languages, each class must be a subclass of exactly one superclass. And for this reason, the class hierarchies are rooted by a highly generic, standard class called Object. (The question of the superclass of Object is beyond the scope of this article.) The class Object describes only the most general properties and behaviors. For instance, in Java, the class Object only performs a handful of functions. In Java, every class is a subclass (directly or indirectly) of the Object class. Under the GPL approach, then, every program written in Java is a derived work of Object, because every program written in Java by definition consists of classes that inherit from the Object class.</p></blockquote>\n<p>Whether this argument or any of the others Washington outlines would apply to WordPress themes and/or plugins would, again, need to be settled in court. But Washington does give a compelling argument.</p>\n<p>They conclude with the following:</p>\n<blockquote><p>In some ways, the apparent weaknesses in the GPL should come as no surprise, as the GPL was born of an era in which the central artifact of software development and distribution was the monolithic executable. In such a universe, software development proceeded principally by modifying the existing source text of programs, compiling source modules, linking the corresponding object files, and distributing the resulting executable. This model of software development and distribution has become increasingly fractured in an era characterized by highly dynamic, late binding, object- and network-based systems. The GPL, consequently, strains to cover these newly arising scenarios.</p>\n<p>To effectuate the goals of the free software movement, the drafters of the GPL urge a generally expansive definition of derivative work. The great irony is, of course, that such an expansive definition would have second order consequences that are exactly counter to the goals of the proponents of Free Software. A broad definition of derivative would give code authors less freedom to create software that they can truly call their own and do with as they please. And if naive analytic approaches such as &#8220;subclassing equals derivation&#8221; reign, then proprietary vendors such as Microsoft could arguably stake claim to every program ever written in C#, because they authored the original class hierarchy. And since it seems unlikely that courts would employ different standards depending on the goals or ideological motivations of licensors, proponents of free software might want to be careful what they wish for: what&#8217;s good for the GNU might not be good for the gander.</p></blockquote>\n<h3>Aggressive license agreements</h3>\n<p>Both the GPL and DIYthemes&#8217; proprietary license could be appropriately identified as aggressive. The Copyleft nature of the GPL annoys many open source advocates, who would prefer a less restrictive license for developers, like the MIT or BSD licenses. The GPL is absolutely an opinionated license.</p>\n<p>Pearson&#8217;s proprietary license is also aggressive, in the other direction. I&#8217;ve never purchased a WordPress-centric product that so strongly forced me to accept a license. Usually, you have to look in the source code or a page on the website for a license; DIYthemes forces you to accept the <a href="http://diythemes.com/thesis/rtfm/software-extensions-license-agreement/">terms of the proprietary license</a> before you can download the product at all.</p>\n<h3>Derivative works are not a bright line</h3>\n<p>The GNU attempts to offer a &#8220;bright line&#8221; distinction for derivative works. A bright line, in much of the legal analysis I&#8217;ve read, is where <em>thing x</em> is so because of <em>thing y</em>, and can be applied across the board. You can clearly see the bright line, and when it has been crossed.</p>\n<p>Washington proves the point quite well that the GNU&#8217;s bright line approach to derivation is quite challengeable. But I don&#8217;t think their arguments prove that WordPress themes in particular are not derivative. I believe, from a legal perspective, it&#8217;s fuzzier than a bright line approach, and if I were Mullenweg or anyone defending GPL software, I would not be excited to take the issue to court.</p>\n<p>The &#8220;spirit of the GPL&#8221; is to offer users liberal freedoms, even while restricting developers building on a GPL licensed application. And I believe there is merit in the fact that WordPress, its co-founders, its lead developers, and the vast majority of its copyright holders (contributors) wish to defend the spirit of the license, even if it&#8217;s not been tested in court.</p>\n<p>Pearson is not in the majority opinion by using a proprietary license, but he is also not definitively in a position of legal wrongdoing. His desire to protect his works from user freedoms with a proprietary license may well be tested all the way to the courts, and he must be prepared to deal with that, but I don&#8217;t believe there is clear wrongdoing, legally, with his license.</p>\n<h2>A tale of idealism</h2>\n<p>Matt Mullenweg and Chris Pearson are two of the most idealistic people I&#8217;ve ever observed. They are near polar opposites, from their business belief systems and even their general world views.</p>\n<p>One of the most depressing components of my research was something Pearson told me. I asked him why he doesn&#8217;t just get out of it all and do something else. He&#8217;s not married to the culture of WordPress bestowed on it by its leaders. He called it, the &#8220;zeitgeist of western culture,&#8221; with its openness, zen attitude, and more that he feels no need to embrace if he doesn&#8217;t want to.</p>\n<p>But he admits that WordPress, &#8220;is the most used piece of software to build a website in the world. WordPress was the beneficiary of impeccable timing.&#8221; And it&#8217;s a tool for him to make his living; it&#8217;s his job, and he doesn&#8217;t see a need to be in love with every aspect of his job. This is what made me sad, because for most of us that make our living within this space, we were able to escape the &#8220;it&#8217;s just a job&#8221; mentality and be emotionally enriched by what is possible on the open web.</p>\n<p>Matt could probably drop his various issues with Pearson and life would go on. The vast majority of WordPress businesses could understand the status quo and live by it, and those that don&#8217;t can keep living their lives outside of the approval of Mullenweg, and for that matter, the official WordPress project and website. But he too insists to stand up for his ideals and the web he believes in. He sees himself as a defender of the user, and his defense of the GPL is an extension of his core beliefs on software.</p>\n<p>They will never agree on licensing, that much is clear. The question of what&#8217;s next is multi-layered.</p>\n<h3>Will litigation continue?</h3>\n<p>Undoubtedly, yes, litigation will continue. But the litigation should be viewed as three distinct parts:</p>\n<ul>\n<li>In regard to the thesis.com domain, it&#8217;s really a sideline issue that resulted from more deep-rooted differences in ideals that turned into a personal spat. Pearson may continue in court to try and get the domain back, but I doubt it. I don&#8217;t know if Automattic will relent on the trademark cancellation requests, but I wouldn&#8217;t be surprised if they dropped it in some form of settlement.</li>\n<li>The patent issue is not over. I believe Automattic and potentially other organizations will challenge Pearson&#8217;s patent application using a variety of legal options available. The chances the patent gets approved or holds up long term are unlikely (but yes, it is possible), and I don&#8217;t believe there is a significant chance it will have longstanding implications on the WordPress project.</li>\n<li>I believe the GPL will continue to be tested in court, and eventually we may have a proper precedent set to put current questions aside. I won&#8217;t pretend a guess how it will turn out, because I think it truly depends on many, many factors. I do think that if Matt Mullenweg pursues a case himself, he will be joined by a number of interested organizations, including the Free Software Foundation; or the GPL debate could be settled in court in a completely different dispute, unrelated to WordPress &#8212; but have a longstanding impact on products made for WordPress.</li>\n</ul>\n<h3>Is this debate bad for WordPress?</h3>\n<p>The <em>way</em> this debate has occurred is bad for WordPress. Neither Matt Mullenweg nor Chris Pearson looks like a saint right now. And parts of the whole thing don&#8217;t do a whole lot to further the conversation.</p>\n<p>At the root of the debate is licensing, and that debate is worth having.</p>\n<p>It is important that we separate the intent and the legal interpretation of the GPL. It is also important that we separate one&#8217;s legal ability to not license distributed WordPress products as GPL compatible, versus the business and community consequences that may result from such a decision.</p>\n<h2>Endmatter</h2>\n<p>This post would not be possible without the Post Status <a href="https://poststatus.com/partners">Partners</a> and <a href="https://poststatus.com/profiles">Members</a> that fund the website, and my ability to write about WordPress full time. If you enjoyed this post, please consider becoming a <a href="https://poststatus.com/club">Post Status member</a> to fund more free content, plus loads of great members-only benefits, including a daily-ish newsletter that keeps you covered on the happenings of the WordPress world.</p>\n<p>I would also like to thank Matt Mullenweg and Chris Pearson for the interviews they provided me in preparation of this post.</p>\n<p>And I&#8217;d like to thank my lawyer, <a href="http://associatesmind.com">Keith Lee</a> (a WordPress fan and blogger himself!) for helping me think through some of the legal matters discussed &#8212; though the opinions themselves are my own.</p>\n<p>Finally, I&#8217;d like to thank the folks that helped me review the post, consider my positions, and organize my thoughts. You know who you are.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 24 Jul 2015 01:42:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Brian Krogsgard";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:47:"WPTavern: Who’s Using the WordPress REST API?";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47039";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:53:"http://wptavern.com/whos-using-the-wordpress-rest-api";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4659:"<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/04/wp-rest-api.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/04/wp-rest-api.jpg?resize=1025%2C469" alt="wp-rest-api" class="aligncenter size-full wp-image-43000" /></a></p>\n<p>Ryan McCue and the <a href="https://github.com/WP-API/WP-API" target="_blank">WP REST API</a> team are <a href="https://make.wordpress.org/core/2015/07/23/rest-api-whos-using-this-thing/" target="_blank">seeking feedback</a> on the project ahead of the API merging into core. McCue invited comments on the post to find out how and where it&#8217;s currently being used, in hopes of identifying any roadblocks developers may be facing.</p>\n<p>&#8220;We’d love to hear feedback from everyone using this, from JS-only developers coming to WP for the first time, through WordPress plugin and theme developers, all the way through to PHP developers not involved with WordPress,&#8221; he said.</p>\n<p>Comments on the post provide a nice overview of places where the API is already in use in production all over the WordPress development community. A few examples include:</p>\n<ul>\n<li><a href="https://hmn.md/" target="_blank">Human Made</a> uses the API with client projects, i.e. to create a Node-powered frontend and maintain the familiar WordPress admin.</li>\n<li><a href="http://reactor.apppresser.com/" target="_blank">Reactor</a> uses the API to create mobile apps that digest the API themselves.</li>\n<li><a href="http://aesopstoryengine.com/" target="_blank">Aesop Interactive</a> uses the API with <a href="http://wptavern.com/lasso-frontend-editing-plugin-for-wordpress-now-available-on-github" target="_blank">Lasso</a> and also to power the <a href="http://wptavern.com/new-wp-live-search-plugin-utilizes-the-wp-rest-api" target="_blank">WP Live Search</a> plugin.</li>\n<li>A large industrial real estate firm manages its properties via an internal proprietary .NET app with a public-facing site powered by WP. It uses the API to sync property data (in real time) between the internal app and the website so the real estate listings will always be current.</li>\n<li><a href="https://www.joininuk.org/" target="_blank">Join In</a>, a site organizing volunteers in the UK, used the API to create <a href="https://www.joininuk.org/widget/" target="_blank">an embeddable JS widget</a>.</li>\n<li><a href="https://profiles.wordpress.org/pers/" target="_blank">Per Soderlind</a> used the WP REST API as <a href="https://make.wordpress.org/core/2015/07/23/rest-api-whos-using-this-thing/#comment-26372" target="_blank">a backend for an iOS application</a> for the Norwegian Ministry of Petroleum and Energy.</li>\n<li><a href="http://tri.be/about/" target="_blank">Modern Tribe</a> is building sites that use the REST API to power both Handlebars and full page React templates in themes.</li>\n</ul>\n<p>Those are just a small sampling of places where the API is being used to make WordPress more flexible for creating custom solutions. For many who are using the API or hoping to use it, the main hindrance is that it&#8217;s not yet in core.</p>\n<p>&#8220;The biggest issue right now is that the REST API isn’t included in core,&#8221; a representative from Ashworth Creative <a href="https://make.wordpress.org/core/2015/07/23/rest-api-whos-using-this-thing/#comment-26390" target="_blank">commented</a>. &#8220;If we build plugins or a theme that needs to consume data asynchronously, we’d either have to bundle the API and have to maintain it in our repositories as a dependency, or have clients install and maintain it on their own.&#8221;</p>\n<p>WordPress developer Nate Wright echoed that opinion and is eager to be able to extend it for use in his products, without having to include it as a plugin.</p>\n<p>&#8220;Put it in core, so that as a plugin developer I can make use of it in my products,&#8221; he <a href="https://make.wordpress.org/core/2015/07/23/rest-api-whos-using-this-thing/#comment-26367" target="_blank">said</a>. &#8220;I built the most popular Restaurant Reservations plugin in the .org repo, and I am eager to add a robust capacity/table management component for it using the REST API and a jQuery/Underscore/Backbone stack.&#8221;</p>\n<p>Early adopters have the unique opportunity to provide feedback on the REST API and help shape priorities for development. If you are using the API somewhere in the wild, make sure to <a href="https://make.wordpress.org/core/2015/07/23/rest-api-whos-using-this-thing/" target="_blank">leave your feedback on McCue&#8217;s post</a> to help the team make any necessary changes required before it&#8217;s merged into core.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Jul 2015 21:15:48 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:15;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:52:"WPTavern: WPWeekly Episode 200 – The Big Two Oh Oh";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:44:"http://wptavern.com?p=47083&preview_id=47083";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:58:"http://wptavern.com/wpweekly-episode-200-the-big-two-oh-oh";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3495:"<p>In this special 200th episode of WordPress Weekly, I&#8217;m joined by <a href="http://marcuscouch.com/">Marcus Couch</a>, <a href="http://strangework.com/">Brad Williams</a>, <a href="http://www.ronalfy.com/">Ronald Huereca</a>, and <a href="http://piratedunbar.com/">Ptah Dunbar</a>. Brad, Ronald, and Ptah were among the first to support WordPress Weekly. They helped get the show off the ground and provided momentum.</p>\n<p>Seven years have passed since I started WordPress Weekly. In those seven years, each one of my guests have gone on to do great things with WordPress. We find out what they&#8217;re up to these days and recall memorable moments of the show. Near the beginning of the show, we held a moment of silence in Kim&#8217;s memory.</p>\n<p>I had a great time hosting episode 200, but I&#8217;m sad that the <a href="http://wptavern.com/kim-parsell-affectionately-known-as-wpmom-passes-away">late Kim Parsell</a> couldn&#8217;t celebrate with us. When I started WordPress Weekly in 2008, Kim would often join me on each episode to provide a countdown before I pressed the record button.</p>\n<p>She was occasionally a <a href="http://wptavern.com/wpweekly-episode-87-%E2%80%93-the-lost-episode">guest on the show</a>. After the show, she would stick around for a half hour to an hour to talk about whatever was on her mind. In many ways, the show offered her an opportunity to connect and speak to WordPress people every week. It was the closest thing to a meetup she could regularly attend.</p>\n<p>Thanks to everyone who listens to the show and provides us with valuable feedback. Join us next Wednesday, as we begin the journey to episode 300.</p>\n<h2>History of WordPress Weekly:</h2>\n<ul>\n<li>My first show on Talkshoe.com was 7 years ago on January 11th, 2008.</li>\n<li>WordPress 2.3.2 was released.</li>\n<li>WordPress 2.5 took the place of 2.4.</li>\n<li>Episode 100 was on June 5th 2010.</li>\n<li>I took a two year break after episode 117 October 28th, 2011.</li>\n<li>I resumed the show on August 16th 2013 which was also my last show on Talkshoe.</li>\n<li>Marcus became a co-host January 18th, 2014, on Episode 134.</li>\n</ul>\n<h2>Plugins Picked By Marcus:</h2>\n<p><a href="https://wordpress.org/plugins/flow-flow-social-streams/">Flow-Flow Social Streams</a> lets you display your Facebook, Twitter, and Instagram messages in a responsive grid.</p>\n<p><a href="https://wordpress.org/plugins/test-gateway-for-woocommerce/">Test Payment Module for Woocommerce</a> gives you the option to test payments in WooCommerce locally without using services such as Paypal or Authorize.net.</p>\n<p><a href="https://wordpress.org/plugins/easy-backup-by-supsystic/">DropBox Backup by Supsystic</a> allows you to backup to Dropbox and FTP with one click. You can also restore full or partial backups from DropBox.</p>\n<h2>WPWeekly Meta:</h2>\n<p><strong>Next Episode:</strong> Wednesday, July 29th 4 P.M. Eastern</p>\n<p><strong>Subscribe To WPWeekly Via Itunes: </strong><a href="https://itunes.apple.com/us/podcast/wordpress-weekly/id694849738" target="_blank">Click here to subscribe</a></p>\n<p><strong>Subscribe To WPWeekly Via RSS: </strong><a href="http://www.wptavern.com/feed/podcast" target="_blank">Click here to subscribe</a></p>\n<p><strong>Subscribe To WPWeekly Via Stitcher Radio: </strong><a href="http://www.stitcher.com/podcast/wordpress-weekly-podcast?refid=stpr" target="_blank">Click here to subscribe</a></p>\n<p><strong>Listen To Episode #200:</strong><br />\n</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Jul 2015 20:30:55 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:16;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:65:"WPTavern: Philadelphia, PA to Host WordCamp US December 4th–6th";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47068";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:72:"http://wptavern.com/philadelphia-pa-to-host-wordcamp-us-december-4th-6th";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1943:"<p>Matt Mullenweg <a href="http://ma.tt/2015/07/wcus-philadelphia/">announced</a> that Philadelphia, PA, will host WordCamp US December 4th–6th at the <a href="http://www.paconvention.com/Pages/default.aspx">Pennsylvania Convention</a> center. Philadelphia will also host WordCamp US in 2016, although no dates have been chosen yet.</p>\n<p>According to Mullenweg, &#8220;Having it the same place two years in a row allows us to keep logistics a set variable and really focus on the rest of the event in the second year.&#8221; The 2017 and 2018 host cities will be chosen in between the first and second event. This allows the team in the host city to volunteer and gain on-the-ground experience in Philadelphia.</p>\n<p>Out of six cities chosen to possibly host WordCamp US and 1,390 total voters, Tavern <a href="http://wptavern.com/which-one-of-these-six-cities-should-host-wordcamp-us">readers voted</a> to have it in Phoenix, AZ, citing <a href="http://wptavern.com/which-one-of-these-six-cities-should-host-wordcamp-us#comment-70157">its warm weather</a> during winter months. Philadelphia, home of the cheesesteak, was a close second.</p>\n<p>The event is inspired by WordCamp Europe, where organizers take an entire year to <a href="http://wptavern.com/vienna-austria-to-host-wordcamp-europe-2016">plan and coordinate</a> the event. Some <a href="http://wptavern.com/which-one-of-these-six-cities-should-host-wordcamp-us#comment-70055">readers questioned</a> whether the event would be held this year considering <a href="http://wptavern.com/wordcamp-us-2015-now-accepting-applications-for-host-city">applications to be the host city </a>weren&#8217;t accepted until June.</p>\n<p>With only half a year to plan and organize WordCamp US, it will be interesting to see how the first one goes. Let us know if you plan on attending the event and if you&#8217;re going to bring ear muffs as Philadelphia during that time of year is cold.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Jul 2015 17:31:41 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:17;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:39:"Matt: WordCamp US to be in Philadelphia";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45259";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:39:"http://ma.tt/2015/07/wcus-philadelphia/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1188:"<p><img class=" wp-image-45261 alignright" src="http://i1.wp.com/ma.tt/files/2015/07/wordcamp1-e1437663434378.png?resize=303%2C309" alt="WordCamp US" />There were <a href="http://ma.tt/2015/06/wordcamp-us-survey/">amazing applications</a> for teams and cities to host the inaugural WordCamp US, a concept originally floated at <a href="http://wordpress.tv/2014/10/26/matt-mullenweg-the-state-of-the-word-2014/">the State of the Word last year</a>. It was very hard to make a choice, but can now announce that the birthplace of the United States, <strong>Philadelphia, will host the first WCUS on December 4th&#8211;6th</strong>. They will also host it in 2016, but no dates have been chosen yet.</p>\n<p>Having it the same place two years in a row allows us to keep logistics a set variable and really focus on the rest of the event in the second year. I also want to use it to facilitate experience transfer: We&#8217;ll choose the 2017 + 2018 host city in between the first and second event, so that team can volunteer on the ground the second year Philadelphia hosts it to learn from their experience. Hat tip: Cool graphic by <a href="http://visualrhythm.com/">Andrew Bergeron</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Jul 2015 16:38:26 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:18;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:84:"WPTavern: WordPress 4.2.3 is a Critical Security Release, Fixes an XSS Vulnerability";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=47045";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:93:"http://wptavern.com/wordpress-4-2-3-is-a-critical-security-release-fixes-an-xss-vulnerability";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3025:"<a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/03/security.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/03/security.jpg?resize=1024%2C514" alt="photo credit: Lock - (license)" class="size-full wp-image-40187" /></a>photo credit: <a href="http://www.flickr.com/photos/58441544@N00/2660230441">Lock</a> &#8211; <a href="https://creativecommons.org/licenses/by/2.0/">(license)</a>\n<p>WordPress users in the Americas woke this morning to find update notices in their inboxes due to a critical security vulnerability. <a href="https://wordpress.org/news/2015/07/wordpress-4-2-3/" target="_blank">WordPress 4.2.3</a> was released today and automatically pushed out to sites that have auto-updates enabled.</p>\n<p>Because this is a security release for all previous versions of WordPress, those who do not have automatic update enabled will need to manually update their sites immediately. Core contributor Gary Pendergast explained the severity of the bug in the release post:</p>\n<blockquote><p>WordPress versions 4.2.2 and earlier are affected by a cross-site scripting vulnerability, which could allow users with the Contributor or Author role to compromise a site. This was reported by <a href="https://profiles.wordpress.org/duck_" target="_blank">Jon Cave</a> and fixed by <a href="http://www.miqrogroove.com/" target="_blank">Robert Chapin</a>, both of the WordPress security team.</p>\n<p>We also fixed an issue where it was possible for a user with Subscriber permissions to create a draft through Quick Draft.</p></blockquote>\n<p>Pendergast thanked all parties reporting vulnerabilities for <a href="https://make.wordpress.org/core/handbook/reporting-security-vulnerabilities/" target="_blank">responsibly disclosing them </a> to the WordPress security team.</p>\n<p>This release also contains fixes for 20 bugs from 4.2, including one that might require you to update your database before being allowed back into the admin.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/wp-update-db.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/wp-update-db.jpg?resize=773%2C370" alt="wp-update-db" class="aligncenter size-full wp-image-47047" /></a></p>\n<p>Not all WordPress users who are updating will be greeted with this message, but if you see it, don&#8217;t panic. It&#8217;s related to one of the bug fixes included in the release.</p>\n<p>&#8220;It was a bug fix in 4.2.3, not backported &#8211; some versions of PHP didn&#8217;t run the utf8mb4 update correctly,&#8221; Pendergast said when asked about the required database update.</p>\n<p>Unfortunately, in some instances, clicking the &#8220;Update WordPress Database&#8221; button may require multiple attempts. This is unusual but Pendergast said that improving database upgrades is high on the team&#8217;s list of priorities.</p>\n<p>A list of all the files revised is available on the <a href="https://codex.wordpress.org/Version_4.2.3" target="_blank">4.2.3 release page</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Jul 2015 14:06:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:19;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:73:"WPTavern: WordPress Custom Post Type UI Plugin Passes 1 Million Downloads";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46940";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:83:"http://wptavern.com/wordpress-custom-post-type-ui-plugin-passes-1-million-downloads";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5094:"<a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/celebration.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/celebration.jpg?resize=960%2C482" alt="photo credit: Stephanie McCabe" class="size-full wp-image-47036" /></a>photo credit: <a href="https://stocksnap.io/photo/6V12NODFVM">Stephanie McCabe</a>\n<p>In June of 2010, <a href="http://codex.wordpress.org/Version_3.0" target="_blank">WordPress 3.0</a> Thelonious was released with the historic merge of WordPress MU into core and the debut of the brand new Twenty Ten default theme. This pivotal release also gave developers the ability to register their own <a href="http://codex.wordpress.org/Custom_Post_Types" target="_blank">custom post types</a>. Expanding WordPress&#8217; custom content capabilities beyond simple posts and pages has been critical to the platform maintaining its dominance as <a href="http://w3techs.com/technologies/overview/content_management/all" target="_blank">the world&#8217;s most used CMS</a>.</p>\n<p>Thousands of WordPress developers make a living from products that are based on custom post types. Five years ago, when the feature was still new, you had to know how to write the code to register a new post type. That&#8217;s when the folks at <a href="http://webdevstudios.com/" target="_blank">WebDevStudios</a> released <a href="https://wordpress.org/plugins/custom-post-type-ui/" target="_blank">Custom Post Type UI</a>, a plugin that offers an admin interface for creating and managing post types and their associated taxonomies.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/cptui_post_type_editor.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/cptui_post_type_editor.png?resize=1024%2C604" alt="cptui_post_type_editor" class="aligncenter size-full wp-image-47028" /></a></p>\n<p>The company counts more than <a href="https://profiles.wordpress.org/webdevstudios/#content-plugins" target="_blank">30 plugins</a> in its collection on WordPress.org, but Custom Post Type UI is by far the most successful. Last week it passed one million downloads and maintains a 4.6 out of 5-star average rating from users. The plugin is currently active on more than 200,000 WordPress sites.</p>\n<h3>Passing the 1 Million Downloads Milestone</h3>\n<p>Michael Beckwith, the current maintainer of Custom Post Type UI, published a <a href="http://webdevstudios.com/2015/07/17/the-custom-post-type-ui-million-download-celebration/" target="_blank">post</a> detailing the evolution of the plugin&#8217;s UI and codebase. His transparent account covers how the team overcame the challenges of their massive codebase overhaul and the undetected bugs that come crawling out of the woodwork with a major release.</p>\n<p>A plugin with a user base in the hundreds of thousands that manages to maintain a nearly 5-star average rating on WordPress.org is a notable achievement, especially when it involves weathering the UI and code updates required to keep pace with WordPress.</p>\n<p>&#8220;I believe this milestone represents the fact that making features usable and more user-friendly to the &#8216;average Joe&#8217; can take you a long ways,&#8221; Beckwith said. &#8220;Custom Post Type UI made it easier for more people to tap into the power and customization ability that custom post types and taxonomies offer to a WordPress powered website. Because of that ease of use, many have added it to their toolbox for every website they have or work on, and recommend it to their friends.&#8221;</p>\n<p>The plugin is being developed on <a href="https://github.com/WebDevStudios/custom-post-type-ui" target="_blank">GitHub</a>. Although there are many <a href="https://github.com/WebDevStudios/custom-post-type-ui/labels/enhancement" target="_blank">enhancements</a> under consideration, Beckwith said that no major changes are planned for the near future.</p>\n<p>&#8220;I would love more to get more people up-to-date on the current version and let it be the stable version for awhile,&#8221; he said.</p>\n<p>&#8220;Looking at our stats page, we still have reported active installs using as far back as version 0.6. While I can sit here scratching my head as to why, I also have to consider that that version is stable enough and still meeting the needs of 0.6% of our users.</p>\n<p>&#8220;If it is not breaking for them, and there is no security concerns, then it is not all bad that they are still marching on. There is also the minimum version requirement to keep in mind. There are still WordPress installs active and out in the wild that are not running WordPress 3.8 or higher. Until they are, those users are not going to be notified that there is even an update available,&#8221; he said.</p>\n<p>If you want to learn more about what it takes to maintain a popular plugin while successfully navigating the years of changes and support, check out WebDevStudios&#8217; <a href="http://webdevstudios.com/2015/07/17/the-custom-post-type-ui-million-download-celebration/" target="_blank">1 million downloads celebration post</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Jul 2015 01:35:36 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:20;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:82:"WPTavern: WordPress 4.3 Moves Customize to Its Own Top-level Menu in the Admin Bar";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46979";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:92:"http://wptavern.com/wordpress-4-3-moves-customize-to-its-own-top-level-menu-in-the-admin-bar";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3156:"<p>When menu management was <a href="http://wptavern.com/menu-customizer-officially-proposed-for-merge-into-wordpress-4-3">proposed to be merged into WordPress 4.3</a>, a common complaint <a href="http://wptavern.com/menu-customizer-officially-proposed-for-merge-into-wordpress-4-3#comment-68988">expressed by readers</a> was that clicking the Widgets menu item in the admin bar loads the customizer instead of the Widgets admin screen. WordPress 4.3 separates the management interfaces by moving the Customize link to the top-level menu of the admin bar. This link opens the customizer, allowing you to manage menus, appearance, and widgets through the customizer interface.</p>\n<a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/WP42AdminBar.png"><img class="wp-image-46995 size-full" src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/WP42AdminBar.png?resize=429%2C232" alt="WordPress 4.2 Admin Bar" /></a>WordPress 4.2 Admin Bar\n<a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/WP43AdminBar.png"><img class="wp-image-46996 size-full" src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/WP43AdminBar.png?resize=428%2C202" alt="WP43AdminBar" /></a>WordPress 4.3 Admin Bar\n<p>The Dashboard, Themes, Widgets, and Menus links take users to their corresponding admin pages in the backend of WordPress. This makes it clear which interface users are about to enter. The enhancement is a result of <a href="https://core.trac.wordpress.org/ticket/32678">ticket #32678</a> where Helen Hou-Sandí and other WordPress core contributors discussed ways to improve the context of each link over the course of five weeks.</p>\n<p>Within the ticket, Nick Halsey, who has spent a lot of time on the customizer, explains that the approach taken in the ticket addresses short-term problems while setting the stage for future improvements.</p>\n<blockquote><p>The Customizer gets the visibility it deserves and becomes more conceptually separated from &#8216;Appearance&#8217;, the admin becomes significantly more accessible from the front-end, the often-unhelpful dashboard is de-emphasized, etc. We also have the ability to easily upgrade the Customize link to do a much faster/shinier loading of the Customizer in the future without moving it.</p>\n<p>Notably, the add-content and edit-content links remain separated from the admin menu (and we skip submenus there for simplicity), setting us up to be able to point them to a front-end-contextual content-creating/editing experience if we build that in the future, without moving links around. This minor rearrangement should be able to last several years without things moving around much if at all, even as further adjustments are made to the features they point to.</p></blockquote>\n<p>On the surface, it appears to be a simple change but a lot of time and effort went into it. It required several core contributors to discuss a variety of mockups, ideas, and flows before the team figured out a solution.</p>\n<p>Separating how users enter each interface will be a welcome enhancement to anyone who prefers one over the other to manage themes, widgets, and menus.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 22 Jul 2015 23:28:40 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:21;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:85:"WPTavern: How and When Mullenweg Learned Thesis Changed Back to a Proprietary License";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46960";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:95:"http://wptavern.com/how-and-when-mullenweg-learned-thesis-changed-back-to-a-proprietary-license";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5837:"<p>We now know when Matt Mullenweg discovered Chris Pearson changed Thesis&#8217; license from split GPL to a proprietary one. On April 1st 2014, Siobhan McKeown <a href="http://archive.wordpress.org/interviews/2014_04_01_Mullenweg.html">interviewed Matt Mullenweg</a> for the <a href="https://github.com/WordPress/book">WordPress history book</a>.</p>\n<p>In the interview, we learn about the history of WordPress themes, the GPL, how Automattic unintentionally created the commercial theme market, why 200 themes were removed from the directory for sponsored links and much more.</p>\n<p>At the 30 minute mark, McKeown asks Mullenweg, at what point did he decide to go to the Software Freedom Law Center to receive clarification on if the default themes that ship with WordPress are derivatives? He responds:</p>\n<blockquote><p>I believe that was around our engagement with Mr. Pearson. I don&#8217;t know if it was before or after the Mixergy interview with our spirited online debate, but it was definitely around that time. I&#8217;m not a lawyer! I can read it and I can understand it from a logical point of view, but the Software Freedom Law Center is obviously the world experts in this and having them officially opine is the closest we can get to &#8211; it&#8217;s the next best thing to having a court case.</p>\n<p>I was actually very excited that perhaps Chris would actually go to court, because as you know there isn&#8217;t a ton of case law around the GPL and normally, because no one is stubborn enough to actually go to court over it, and I thought, &#8220;Oh, we finally got one!&#8221; And I was looking forward to being able to discuss in the U.S. law system and provide the precedent for anyone who comes after us to protect the GPL.</p>\n<p>Because companies like Cisco and LinkSys and huge companies with billions of dollars in resources have opted to not fight it, so you really do need someone who is going to be stubborn enough to fight it.</p></blockquote>\n<p>At the climax of the debate in 2010, <a href="http://ma.tt/2010/07/syn-thesis-1/#comment-481743">some members</a> of the WordPress community wanted to see the argument go to court so a ruling could set a precedent on when a work becomes derivative.</p>\n<p>At the 33 minute mark, McKeown informs Mullenweg that Thesis switched from a split GPL license to a proprietary license. This is the first time since his debate with Pearson in 2010, that Mullenweg discovers Thesis switched back to a proprietary license. He responds:</p>\n<blockquote><p>I have not seen that. So we&#8217;d have to do a code analysis again. As you know the Software Freedom Law Center says that non-PHP, so non-linked code which can be CSS, images and JavaScript, isn&#8217;t required to be GPL. It doesn&#8217;t trigger the viral nature of WordPress&#8217; GPL code.</p>\n<p>The stance of the WordPress community was that a theme without images or CSS isn&#8217;t much of a theme so, even though something could be legally compliant, if the entire package isn&#8217;t providing the same freedoms for users it&#8217;s not something that we want to link to or promote. Because it doesn&#8217;t really follow the things that we hold dear and true in WordPress.</p></blockquote>\n<p>On January 15, 2014, <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php">Chris Pearson received</a> a copy of Mullenweg&#8217;s inquiry into thesis.com from Larry of GetYourDomain.com. This is approximately four months prior to discovering Thesis was being sold under a proprietary license. However, the exact date in which Mullenweg obtained ownership of the domain is unknown.</p>\n<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/email-matt.png"><img class="size-full wp-image-46845" src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/email-matt.png?resize=486%2C191" alt="Email shared by Pearson showing Mullenweg''s interest in the domain" /></a>Email shared by Pearson showing Mullenweg&#8217;s interest in the domain\n<p>The first <a href="http://wptavern.com/mullenweg-and-pearson-square-off-on-patents-gpl-and-trademarks">publicly known use of the domain</a> that confirmed Mullenweg&#8217;s ownership was on October 26th, 2014, at WordCamp San Francisco during the Question and Answer session.</p>\n<p>As the interview continues, McKeown asks Mullenweg if he reached out to companies like Template Monster that sells WordPress themes that are not GPL Licensed. He responds:</p>\n<blockquote><p>We got in touch with everyone that we could, and it was definitely &#8211; it was a lot of time. There are times when WordPress core stuff is more than a full-time job for me and now is definitely one of them.</p>\n<p>I see your link to a [inaudible]. There&#8217;s always ways to word licenses around multi-site support where perhaps the code is GPL but the developer chooses to not provide support for more than one site unless you buy a special license. So sometimes people interpret those to be a GPL violation when actually they&#8217;re not.</p>\n<p>I&#8217;m not aware of what Chris has done and I&#8217;d like to think that he is supportive &#8211; he has done so well from the WordPress community that he&#8217;d be supportive of themes continuing to be GPL, especially since his business didn&#8217;t crash like he was worried it would.</p></blockquote>\n<p>McKeown jokes that lawyers might have written Thesis&#8217; license agreement. Mullenweg responds, &#8220;Well, maybe we&#8217;ll dive back into it.&#8221; More than 14 months later, <a href="http://wptavern.com/mullenweg-and-pearson-square-off-on-patents-gpl-and-trademarks">Mullenweg has dived back into it with Pearson</a>.</p>\n<p>It&#8217;s unclear if in this second round of arguments, Mullenweg will take Pearson to court to settle the GPL derivative argument once and for all.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 22 Jul 2015 23:21:27 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:22;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:92:"WPTavern: Create and Manage BuddyPress Member Types with the BP Member Type Generator Plugin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46893";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:102:"http://wptavern.com/create-and-manage-buddypress-member-types-with-the-bp-member-type-generator-plugin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4810:"<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2014/09/different-users.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2014/09/different-users.jpg?resize=1024%2C492" alt="photo credit: Dunechaser - cc" class="size-full wp-image-30565" /></a>photo credit: <a href="https://www.flickr.com/photos/dunechaser/6042984689/">Dunechaser</a> &#8211; <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>\n<p><a href="http://wptavern.com/buddypress-2-2-spumoni-released-featuring-new-member-type-api" target="_blank">BuddyPress 2.2</a> introduced a <a href="https://codex.buddypress.org/developer/member-types/" target="_blank">Member Type API</a>, which allows developers to register their own unique member types, i.e. teacher, student, coach, etc. This was an exciting addition to BuddyPress but not very accessible to non-technical community managers, since it requires writing your own plugin to utilize it.</p>\n<p><a href="https://wordpress.org/plugins/bp-member-type-generator/" target="_blank">BP Member Type Generator</a> is a new plugin from Brajesh Singh, prolific plugin author and owner of <a href="http://buddydev.com/" target="_blank">BuddyDev</a>. The plugin makes it easy for site administrators to create and manage member types in the admin &#8211; without having to write any code.</p>\n<p>A quick overview of its features includes:</p>\n<ul>\n<li>Create/Edit/Delete Member Types from WordPress admin</li>\n<li>Bulk assign member type to users from the users list screen</li>\n<li>A member type can be marked active/inactive from the edit member type page</li>\n<li>Compatible with multisite installations</li>\n</ul>\n<p>When creating a new member type, administrators have the option to enable a directory that will list all members from that type on one page.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/create-member-type.png"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/create-member-type.png?resize=968%2C725" alt="create-member-type" class="aligncenter size-full wp-image-46984" /></a></p>\n<p>If you want to add the plugin and separate your members into different types, the task is not as overwhelming as it might sound. When you visit the user listing page in the admin, you can use the plugin&#8217;s bulk &#8220;change member type&#8221; dropdown to bulk assign users to a new member type. (This feature is also available in the Extended Profile section for each individual user in the admin.)</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/change-member-type.png"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/change-member-type.png?resize=737%2C440" alt="change-member-type" class="aligncenter size-full wp-image-46988" /></a></p>\n<p>If you want to make the member types available for selection upon user registration, Singh created a free companion plugin called <a href="http://buddydev.com/buddypress/using-buddypress-member-type-as-profile-field-introducing-bp-xprofile-member-type-field-plugin/" target="_blank">BP Xprofile Member Type Field</a> that puts this on the frontend. If you want to restrict members from modifying their user type after registration, you can also add the free <a href="http://buddydev.com/plugins/bp-non-editable-profile-fields/" target="_blank">Non Editable Profile</a> field plugin.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/registration-member-type-field.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/registration-member-type-field.png?resize=490%2C337" alt="registration-member-type-field" class="aligncenter size-full wp-image-46992" /></a></p>\n<p>Please note that BP Member Type Generator cannot detect and manage other member types that have previously been added via code in a plugin. This might create some confusion if you already have existing member types. However, if you&#8217;re just starting with setting up and organizing member types, or are willing to reorganize member types, the BP Member Type Generator offers an easy way to do it.</p>\n<p>This plugin is an important and much needed new tool that puts the creation of unique member types into the hands of BuddyPress community administrators, regardless of skill level. You can download <a href="https://wordpress.org/plugins/bp-member-type-generator/" target="_blank">BP Member Type Generator</a> for free from WordPress.org. Singh does not officially support his plugins via the WordPress forums, but users can provide feedback via the <a href="http://buddydev.com/buddypress/introducing-buddypress-member-type-generator/" target="_blank">BuddyDev blog</a> or get professional support on the <a href="http://buddydev.com/support/forums/" target="_blank">BuddyDev Premium Support Forums</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 22 Jul 2015 21:51:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:23;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:31:"Joseph: Recommended Consultants";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"https://josephscott.org/?p=9888";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"https://josephscott.org/archives/2015/07/recommended-consultants/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:277:"<p>My personal list of WordPress consultants has dried up ( some took full time jobs, the rest are always booked solid ).  Now I&#8217;m directing people to the <a href="http://jkudish.com/recommendations/">Recommended Consultants &amp; Resources list</a> from Joey Kudish.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 22 Jul 2015 14:01:27 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Joseph Scott";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:24;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:90:"WPTavern: Nick Haskins Receives Cease and Desist Letter for Violating LassoSoft Trademarks";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46768";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:100:"http://wptavern.com/nick-haskins-receives-cease-and-desist-letter-for-violating-lassosoft-trademarks";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4619:"<p><a href="http://nickhaskins.com/">Nick Haskins</a>, the founder and lead developer of <a href="https://lasso.is/">Lasso</a>, is <a href="https://lasso.is/the-ugly-truth-about-trademarks/">rebranding the product</a> after being served a cease and desist letter.</p>\n<p>A few days ago, Haskins was served a cease and desist letter from <a href="http://lassosoft.com/">LassoSoft</a>. According <a href="http://www.lassosoft.com/What-Is-Lasso">to LassoSoft</a>, &#8220;Lasso is a development platform and is the easiest, quickest and most secure method of supporting custom, data-driven web sites on the market today.&#8221;</p>\n<p>Before launching a product, Haskins searches Google to see if similar products exist with the same name, &#8220;Apparently we didn’t look hard enough when naming Lasso,&#8221; he said.</p>\n<h2>Three Requirements That Must Be Met</h2>\n<p>Haskins <a href="http://cl.ly/39400J3A100k">shared the letter</a> to educate others in the business of WordPress. In the letter, attorney&#8217;s for LassoSoft point out the company&#8217;s <a href="http://www.tmfile.com/mark/?q=861046116">registered trademarks</a> and says it commenced using the mark in the US in 1998 and in Canada in 1997.</p>\n<p>LassoSoft claims to have documented at least one case of confusion between the two brands and says the continued use of Lasso will cause even more confusion.</p>\n<p>Attorney&#8217;s for LassoSoft provided three requirements that must be met for an amicable end to the dispute:</p>\n<ol>\n<li>Permanently ceasing all use of the term &#8220;Lasso&#8221; and any trademark which includes or incorporates the term &#8220;Lasso&#8221;, in connection with any software or related goods and services.</li>\n<li>Removing all references to the term &#8220;Lasso&#8221; from the Website.</li>\n<li>Removing all references to the term &#8220;Lasso&#8221; from any marketing materials including flyers, catalogs, etc.</li>\n</ol>\n<p>Haskins has until <strong>July 29th</strong> to satisfy the requirements and provide LassoSoft with written confirmation that he has permanently ceased all use of the term &#8220;Lasso&#8221; in association with software.</p>\n<h2>Transitioning Momentum</h2>\n<p>Rebranding a product that has momentum can be a crushing blow to a business that doesn&#8217;t manage the transition correctly. I asked Haskins how he plans to shift momentum from Lasso to the new brand name.</p>\n<p>&#8220;The first idea I had, was to let the community rename it, possibly even have a $500 prize to the winning name. By incentivizing a rebranding campaign, together with a concentrated effort on re-educating, along with URL redirects and custom messages, I feel pretty strongly that we&#8217;ll be able to move right along without skipping a beat,&#8221; he said.</p>\n<p>When it comes to naming a WordPress product and launching it into the WordPress ecosystem, Haskins offers the following advice:</p>\n<p>&#8220;Use Google to see if it already exists either in the WordPress ecosystem or in a related field. This may seem like a no-brainer and it&#8217;s really common sense, but for some reason, I either never searched or that company never popped up. At any rate, I think you&#8217;ll be in good shape by sticking to something with wp prefixed or appended to the name.&#8221;</p>\n<p>&#8220;Avoid generic terms and verbs because apparently, you can trademark a verb. I&#8217;d also run the search again in six months and if it&#8217;s a product that you plan on working on for a while, go through the process of getting the term trademarked.&#8221;</p>\n<p>In addition to Haskins&#8217; advice, I recommend using a search and discovery process provided by legal counsel familiar with trademark law.</p>\n<h2>Help Haskins Rebrand Lasso</h2>\n<p>In light of the battle between <a href="http://wptavern.com/mullenweg-and-pearson-square-off-on-patents-gpl-and-trademarks">Chris Pearson and Matt Mullenweg</a> involving patents, GPL, and trademarks, Haskins decided to rebrand Lasso, &#8220;There are a lot more important things in life than the name of a plugin for WordPress,&#8221; he said.</p>\n<p>Haskins is giving the community an opportunity to rebrand his product. So far, he&#8217;s ruled out WP Front End Editor as it&#8217;s too similar to the <a href="https://wordpress.org/plugins/wp-front-end-editor/">name of a feature plugin</a> that may one day be merged into WordPress core.</p>\n<p>If you have an idea on what to call Lasso, please leave a comment on this post. Sometime next week, Haskins will gather the suggestions and publish a poll where the community can vote on which one is best.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 22 Jul 2015 01:08:17 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:25;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:47:"Matt: There is No Such Thing as a Split License";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45256";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:42:"http://ma.tt/2015/07/licenses-going-dutch/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2845:"<p>There&#8217;s a term that pops in the WordPress community, &#8220;split license&#8221;, that we should put to rest. It&#8217;s sloppy at best, misleading at worst.</p>\n<p>First, some background. WordPress is under a license called the GPL, which basically says you can do whatever you like with the software, but if you distribute changes or create derivative works they also need to be under the GPL. Think of it like a Creative Commons Sharealike license.</p>\n<p>In the past people weren&#8217;t sure if themes for WordPress were derivative works and needed to be GPL. <a href="https://wordpress.org/news/2009/07/themes-are-gpl-too/">In 2009 we got an outside legal opinion that cleared up the matter</a> saying that the PHP in themes definitely had to be GPL, and for CSS and images it was optional. Basically everyone in the WP community went fully GPL, sometimes called 100% GPL, for all the files required to run their theme (PHP, JS, CSS, artwork). The predicted theme apocalypse and death of WordPress didn&#8217;t happen and in fact both theme shops and WordPress flourished, and best of all users had all the same freedoms from their themes as they got from WordPress. It was controversial at the time, but I think history has reflected well on the approach the WP community took.</p>\n<p>As I said the PHP has to be GPL, the other stuff can be something else &#8212; many people started to use the term &#8220;split license&#8221; or &#8220;split GPL&#8221; to describe this. The problem, especially with the latter, is it leaves out the most important information. &#8220;Split GPL&#8221; doesn&#8217;t say whether the theme is violating WordPress&#8217; license or not (maybe it&#8217;s proprietary PHP and GPL CSS), and more importantly doesn&#8217;t say what the non-GPL stuff is, which is the part you need to worry about! It also makes it sound like a split license is a thing, when all it really means is there are different licenses for different parts of the work. If something has a &#8220;split license&#8221; you have no idea what restrictions or freedoms it provides.</p>\n<p>If someone decides to have different licenses for different parts of a theme they ship in one package, it&#8217;s probably worth taking a few extra words to spell out what the rights and restrictions are, like &#8220;GPL PHP, and a restrictive proprietary license for all other elements included with the theme.&#8221; This is really important because if you&#8217;re a smart WordPress consumer you should avoid proprietary software, there is always a GPL alternative that <a href="http://www.gnu.org/philosophy/free-sw.en.html">gives you the rights and freedoms you deserve</a>, and probably is from a nicer person who is more in line with the philosophy of the rest of WordPress. Vote with your pocketbook, buy GPL software!</p>\n<p>&nbsp;</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 21 Jul 2015 20:55:12 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:26;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:94:"WPTavern: Shortcake Bakery Plugin Offers a Suite of Useful Shortcodes for WordPress Publishers";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46896";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:104:"http://wptavern.com/shortcake-bakery-plugin-offers-a-suite-of-useful-shortcodes-for-wordpress-publishers";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4116:"<a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/baker.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/baker.jpg?resize=1024%2C516" alt="photo credit: Panettiere - (license)" class="size-full wp-image-46899" /></a>photo credit: <a href="http://www.flickr.com/photos/27505428@N06/16282512996">Panettiere</a> &#8211; <a href="https://creativecommons.org/licenses/by-sa/2.0/">(license)</a>\n<p>In March, the <a href="http://wptavern.com/shortcake-is-now-a-wordpress-feature-plugin" target="_blank">Shortcake project officially began its journey as a feature plugin</a> with regular meetings for contributors working to make it ready to propose for inclusion in WordPress core. The <a href="https://wordpress.org/plugins/shortcode-ui/" target="_blank">plugin</a> provides a friendly UI for adding shortcodes and transforms them to render a nice preview in the visual editor.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/pullquote-shortcode.png"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/pullquote-shortcode.png?resize=1025%2C538" alt="pullquote-shortcode" class="aligncenter size-full wp-image-46904" /></a></p>\n<p>Last week, <a href="https://twitter.com/danielbachhuber" target="_blank">Daniel Bachhuber</a> and the engineering team at <a href="http://fusion.net/" target="_blank">Fusion</a> released <a href="https://wordpress.org/plugins/shortcake-bakery/" target="_blank">Shortcake Bakery</a>, a plugin that extends the Shortcake project to supply a suite of handy shortcodes for publishers. The plugin currently includes the following:</p>\n<ul>\n<li>Image Comparison (powered by <a href="https://juxtapose.knightlab.com/" target="_blank">JuxtaposeJS</a>)</li>\n<li>Facebook embeds</li>\n<li>iFrames (require whitelisted hostnames)</li>\n<li>Infogram embeds</li>\n<li>PDF’s (powered by <a href="https://mozilla.github.io/pdf.js/" target="_blank">PDF.js</a>)</li>\n<li>Playbuzz embeds</li>\n<li>Rap Genius annotations</li>\n<li>Scribd embeds</li>\n<li>Scripts (require whitelisted hostnames)</li>\n</ul>\n<p>&#8220;We’ve been steadily making shortcodes for use by the Fusion newsroom since we launched Shortcake in November, and by releasing these universally useful patterns to the world, we hope to create a large repository of structured post elements for use by the WordPress community,&#8221; Bachhuber said.</p>\n<p>For example, Shortcake Bakery supplies a friendly UI for embedding an infographic from <a href="https://infogr.am/" target="_blank">Infogra.am</a>. The author selects the post element and then pastes in the URL to the infographic. It instantly appears in the post editor with a TinyMCE preview.</p>\n<p><a href="http://wptavern.com/wp-content/uploads/2015/07/shortcake-bakery-demo.mp4">http://wptavern.com/wp-content/uploads/2015/07/shortcake-bakery-demo.mp4</a></p>\n<p>Shortcake Bakery also makes it easy to embed a single Facebook post, PDF, image comparison, and other content types that might otherwise prove troublesome to include in WordPress. Each content type is optimized for instant visual preview in the editor.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/shortcake-bakery-facebook-embed.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/shortcake-bakery-facebook-embed.png?resize=919%2C689" alt="shortcake-bakery-facebook-embed" class="aligncenter size-full wp-image-46917" /></a></p>\n<p>Version 0.1.0 includes nine useful post elements that make it easy to embed content from external services commonly referenced by publishers. Shortcodes for Instagram, Tubmlr, and Silk are listed as possible upcoming enhancements on the project&#8217;s <a href="https://github.com/fusioneng/shortcake-bakery/labels/enhancement" target="_blank">GitHub issues queue</a>. <a href="https://wordpress.org/plugins/shortcake-bakery/" target="_blank">Shortcake Bakery</a> is an open source plugin and is now available on WordPress.org. It works best when combined with the <a href="https://wordpress.org/plugins/shortcode-ui/" target="_blank">Shortcake</a> plugin.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 21 Jul 2015 02:16:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:27;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:77:"WPTavern: WP Rocket Reports $355K in Annual Revenue After 2 Years in Business";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46719";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:86:"http://wptavern.com/wp-rocket-reports-355k-in-annual-revenue-after-2-years-in-business";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4872:"<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2014/05/wp-rocket-feature.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2014/05/wp-rocket-feature.jpg?resize=1025%2C452" alt="wp-rocket-feature" class="aligncenter size-full wp-image-22199" /></a></p>\n<p><a href="http://wp-rocket.me/" target="_blank">WP Rocket</a> is celebrating its second year in business. The commercial caching plugin for WordPress launched two years ago in the French market and <a href="http://blog.wp-rocket.me/2-years-reports-feedbacks/" target="_blank">opened its doors to international customers</a> last May.</p>\n<p>At that time, WP Rocket was entering unproven territory as the first major caching plugin to launch with a 100% commercial model. Could the plugin succeed in a market dominated by free caching solutions like <a href="https://wordpress.org/plugins/w3-total-cache/" target="_blank">W3 Total Cache</a> and <a href="https://wordpress.org/plugins/wp-super-cache/" target="_blank">WP Super Cache</a>?</p>\n<p>WP Rocket has the numbers to prove that WordPress users are willing to pay for an easy-to-configure solution to site optimization. In February, the 100% bootstrapped company published a transparency report showing that the product was now active on 15,000+ websites and <a href="http://wptavern.com/wp-rocket-grows-from-0-to-35k-in-monthly-revenue" target="_blank">averaging $35K in monthly revenue</a>. Six months later, the plugin is now active on more than 32,000 websites. From July 2014 &#8211; July 2015, WP Rocket <a href="http://blog.wp-rocket.me/2-years-reports-feedbacks/" target="_blank">reports</a> that the company pulled in a total of $351,097 in revenue.</p>\n<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/wprocket-2014-2015.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/wprocket-2014-2015.jpg?resize=629%2C525" alt="photo credit: WP Rocket</a." /></a>photo credit: <a href="http://blog.wp-rocket.me/2-years-reports-feedbacks/">WP Rocket</a>\n<p>WP Rocket has been successful in identifying ways to stand out among established competitors. During our <a href="http://wptavern.com/wp-rocket-launches-commercial-caching-plugin-for-wordpress" target="_blank">initial tests of the plugin</a>, we found that it took under a minute to configure caching for a small blogging site using its simple, basic settings panel. Without even touching the more advanced options, such as DNS prefetching and file exclusions, we were able to reduce the page size and load time by roughly 50%.</p>\n<p>Inspired by a recent three-month stay in San Francisco, WP Rocket developers and co-founders  Jonathan Buttigieg and Jean-Baptiste Marchand-Arvier are now working to diversify their product offerings.</p>\n<p>&#8220;WP Rocket will be one product among others from our startup and not the only one,&#8221; Marchand-Arvier said. &#8220;We want to have a portfolio of products and not depend on only one.&#8221;</p>\n<p>To that end, the company is dipping its toes into multiple potentially welcoming revenue streams, including plugins, themes, and SaaS.</p>\n<p>&#8220;For the past few months, Julio has been working on a security plugin,&#8221; Marchand-Arvier said. &#8220;This is going to be a great challenge for us as we experiment with a freemium model for the first time, and because there are great competitors in the space, like WordFence and iThemes Security.</p>\n<p>WP Rocket currently has a dedicated team working on <a href="https://imagify.io/" target="_blank">Imagify</a>, an image compression toolkit and their first SaaS venture. The company also plans to enter the theme market with its own shop.</p>\n<p>&#8220;We want to take on that huge challenge which will be very different compared to selling a plugin,&#8221; Marchand-Arvier said.</p>\n<p>WP Rocket&#8217;s founders believe that building a strong company culture will be one of the key factors to their continued success.</p>\n<p>&#8220;To work in a mostly remote team can create a lack of human connection,&#8221; Marchand-Arvier said. &#8220;That’s why we’ve decided to organize a ‘startup retreat’ every year.&#8221; This decision was inspired by the founders&#8217; 2014 trip to explore Silicon Valley, a pivotal event that changed the way they approached business in the WordPress ecosystem.</p>\n<p>&#8220;This [trip] transformed three guys who were selling a WordPress plugin into a Startup of eight people (today) with a strong company culture,&#8221; he said.</p>\n<p>If the success of WP Rocket&#8217;s caching plugin is any indication, WordPress users should be on the lookout for the company to bring a new twist into other existing product niches. Momentum is running high on their currently incubating projects with <a href="https://imagify.io/" target="_blank">Imagify</a> on track to launch in the upcoming weeks.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 20 Jul 2015 20:33:25 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:28;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:19:"Matt: Streak Broken";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45251";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:35:"http://ma.tt/2015/07/streak-broken/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:689:"<p>Due to some distractions and mishandling of scheduled posts on my part, I broke my blogging streak. I got up to 198 days, which isn&#8217;t bad, and I&#8217;m looking forward to beating it next time. A lot of people might not know this, but if you&#8217;re on <a href="http://wordpress.com/">WordPress.com</a> or run <a href="http://jetpack.me/">Jetpack</a> when you start a posting streak it will give you a notification high-five every day you continue it, this was the last one I got:</p>\n<p><img class="aligncenter  wp-image-45252" src="http://i2.wp.com/ma.tt/files/2015/07/Screen-Shot-2015-07-18-at-9.06.19-AM.png?resize=386%2C394" alt="Screen Shot 2015-07-18 at 9.06.19 AM" /></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 18 Jul 2015 13:08:47 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:29;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:74:"WPTavern: Mullenweg and Pearson Square Off on Patents, GPL, and Trademarks";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46814";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:82:"http://wptavern.com/mullenweg-and-pearson-square-off-on-patents-gpl-and-trademarks";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:8449:"<p>In a post titled &#8220;<a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php" target="_blank">The Truth About Thesis.com</a>,&#8221; Chris Pearson responded to the recent heated discussions about his <a href="http://wptavern.com/automattic-wins-cybersquatting-case-against-chris-pearson" target="_blank">legal battle with Automattic over the Thesis.com domain</a> and related trademarks. His public response revives a <a href="http://wordpress.tv/2010/07/15/mixergy-interview-pearson-mullenweg/">five-year old licensing disagreement</a>.</p>\n<p>&#8220;I think the most important place to start is by asking: Why would Automattic—a website software company with over $300 million in funding—buy thesis.com when I owned the trademark for Thesis in the website software space?&#8221; Pearson asked.</p>\n<p>In February 2013, Pearson started negotiations with a domain broker named Larry of GetYourDomain.com in an attempt to purchase thesis.com. He opened with an offer of $37,500 which he considered to be more than enough for an unused domain. After months of negotiating, the deal fell through.</p>\n<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/email-matt.png"><img class="size-full wp-image-46845" src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/email-matt.png?resize=486%2C191" alt="Email shared by Pearson showing Mullenweg''s interest in the domain" /></a>Email shared by Pearson showing Mullenweg&#8217;s interest in the domain\n<p>&#8220;I didn’t see how Matt could justify buying the domain for $100,000. Because of my trademark, there was no way he could legally use the domain for Automattic, and therefore, I didn’t believe there was a reason for him to spend that much money,&#8221; Pearson said.</p>\n<p>Nine months after negotiations failed, Pearson received an email from Larry asking if he&#8217;d like to renegotiate since Mullenweg showed interest in the domain. Further negotiations went nowhere and Mullenweg won the domain for $100K.</p>\n<p>News of Mullenweg&#8217;s purchase didn&#8217;t reach the public until he replied to a question about WordPress&#8217; relationship with commercial theme providers at the 2014 State of the Word Q&amp;A. In his response, he encouraged the audience to visit Thesis.com. Notice Mullenweg&#8217;s delivery and how the crowd reacts to his announcement.</p>\n<p></p>\n<p></p>\n<p>Pearson also accused Mullenweg of <a href="http://tsdr.uspto.gov/#caseNumber=4039583&caseType=US_REGISTRATION_NO&searchType=statusSearch">violating his trademark</a>.</p>\n<blockquote><p>Principles? Matt spent $100,000 to buy thesis.com—a domain in which he had no legitimate business interest—forwarded the domain to his property, and violated my trademark.</p>\n<p>This is ironic considering how vigilant Matt has been about protecting the WordPress trademark—especially as it <a href="http://wptavern.com/the-wordpress-foundation-sues-jeff-yablon-for-trademark-infringement">relates to domain names</a>.</p></blockquote>\n<p>Pearson goes on to describe his duty to protect to his trademark and the details of the UDRP Case Ruling, as well as the fallout regarding the court&#8217;s decision in Automattic&#8217;s favor.</p>\n<p>&#8220;It’s time for the community to ask itself if using $300 million in funding to purchase $100,000 domains, fund aggressive lawsuits, and fuel unending drama is properly representative of the WordPress project,&#8221; he said.</p>\n<p>Pearson admitted to &#8220;being a jerk&#8221; both in the post and the comments. This admission is based on his attitude and the way he presented himself in 2010 in the <a href="http://wordpress.tv/2010/07/15/mixergy-interview-pearson-mullenweg/">interview with Andrew Warner</a> on Mixergy. Mullenweg focused on the fact that Pearson changed the licensing structure of Thesis so that part of it is incompatible with the GPL:</p>\n<p>&#8220;So why do the exact same thing you did before, change your license to violate the GPL and take rights away from your users? And then litigate against someone else?&#8221; Mullenweg asked.</p>\n<p>He is referring to Thesis&#8217; <a href="http://diythemes.com/thesis/rtfm/software-license-agreement/">license agreement</a> customers agree to when they purchase the theme. The agreement has terms that take user freedoms away that GPL licensed software provides. Here are a few of terms in the agreement:</p>\n<ul>\n<li>You can’t sell, rent, or otherwise transfer the software to anyone else.</li>\n<li>The license provides you, and only you, with the rights to use the software for its intended purpose.</li>\n<li>Other than for educational purposes, any modification of the Thesis “core” is prohibited.</li>\n</ul>\n<p>Mullenweg is well known as a zealous protector of the GPL and users&#8217; rights. However, Pearson and many others perceived his comments on licensing to be a distraction from the main issue.</p>\n<p>In responding to commenters on whether the issue is dead, he <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php#comment-1507944" target="_blank">said</a>:</p>\n<blockquote><p>The issue isn’t dead — Chris went back on his word and re-changed his license to be 100% proprietary and violate the GPL, sneakily sometime in the past 5 years since the last time he did that. He also patented how themes work, and color pickers.</p></blockquote>\n<p>The patent Mullenweg is <a href="http://www.google.com/patents/US20140095982">referring to</a> was published in September of 2012. The patent describes systems, servers, and methods for managing websites using the Thesis software. One of the fears is that the patent is vague and closely describes how WordPress themes work in general, although Pearson claims the patent has <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php#comment-1507962">nothing to do with WordPress</a>.</p>\n<p>Pearson <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php#comment-1507962" target="_blank">clarified Thesis&#8217; new proprietary licensing</a>, which Mullenweg believes to be in violation of their agreement in 2010:</p>\n<blockquote><p>In October 2012, I released an all-new version of Thesis that carried the same name as the original (which had a split-GPL license), but that’s where the similarities stopped.</p>\n<p>The new Thesis is not a Theme—it is an operating system for templates and design. This system runs Skins and Boxes, which are similar to Themes and Plugins, but with a boatload of built-in efficiencies that Themes and Plugins cannot provide.</p>\n<p>Skins and Boxes carry MIT licenses, which are not only open source, but also easy for anyone to understand and use.</p>\n<p>There is nothing sneaky about the licensing structure that has been in place since October 2012. DIYthemes customers must agree to the proprietary licensing on the Thesis core before downloading and using the software.</p></blockquote>\n<p>After Mullenweg purchased the domain, he <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php#comment-1507947">received no personal communication from Pearson</a> on the issue until Automattic was hit with litigation. The litigation stems from Pearson trying to protect his trademark.</p>\n<p>&#8220;I don’t know the last time I got an email from Chris directly (3+ years?), and myself and Automattic didn’t hear anything from him before we got the litigation notice he was trying to seize the domain,&#8221; Mullenweg commented. &#8220;No questions, no concerns, no offer to resolve, no discussion, we were just hit with legal action out of the blue.&#8221;</p>\n<p>In a <a href="http://www.pearsonified.com/2015/07/truth-about-thesis-com.php#comment-1507959">comment published</a> on Pearson&#8217;s blog post, Mullenweg contends that Pearson is repeating the same mistake he made in 2010 by not licensing Thesis as GPL.</p>\n<p>&#8220;It doesn’t matter if you admit what you did was wrong in the past if you go and do the exact same thing again: violate the GPL, and make it worse by patenting common theme practices,&#8221; he said.</p>\n<p>Up until this point, Mullenweg has declined to comment directly on Automattic&#8217;s interest in purchasing thesis.com in the first place. There are a lot of forces at play, including patents, GPL adherence, trademarks, and domain names. This is a developing and complicated story that we&#8217;ll continue to keep our eyes on.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 18 Jul 2015 05:24:07 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:30;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:65:"WPTavern: New Feature Plugin Proposed: oEmbed for WordPress Posts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46826";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:74:"http://wptavern.com/new-feature-plugin-proposed-oembed-for-wordpress-posts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2809:"<p>WordPress has a <a href="https://codex.wordpress.org/Embeds" target="_blank">whitelist</a> of 31 trusted sites from which users can oEmbed content, but one source is noticeably missing &#8211; WordPress itself. During this week&#8217;s <a href="https://make.wordpress.org/core/2015/07/10/feature-plugin-chat-on-july-14/" target="_blank">feature plugin chat</a>, Pascal Birchler and a group of contributors proposed the idea of <a href="https://make.wordpress.org/core/2015/07/10/feature-plugin-chat-on-july-14/#comment-26324" target="_blank">oEmbed for WordPress Posts</a>:</p>\n<blockquote><p>Basically, we want to make WordPress an oEmbed provider. Users should be able to paste an URL from a WordPress blog and the post gets embedded right away. Difficulties here are discovering other WordPress sites as oEmbed providers and whitelisting them. The oEmbed endpoint requires the WP-API to be in use, so this can’t land in core until the API does.</p></blockquote>\n<p>The <a href="https://github.com/swissspidy/oEmbed-API" target="_blank">oEmbed API</a> proof-of-concept feature plugin is currently in development on GitHub. It requires WordPress 4.3 beta 3 or later and version 2 of the <a href="https://github.com/WP-API/WP-API" target="_blank">WP REST API</a> plugin.</p>\n<p>Mel Choyce, author of the trac <a href="https://core.trac.wordpress.org/ticket/32522" target="_blank">ticket</a> requesting the feature, created a mockup of how embedded WordPress posts might look:</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/wordpress-oembed-feature-plugin-mockup.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/wordpress-oembed-feature-plugin-mockup.jpg?resize=1024%2C960" alt="wordpress-oembed-feature-plugin-mockup" class="aligncenter size-full wp-image-46828" /></a></p>\n<p>The <a href="https://core.trac.wordpress.org/ticket/32522" target="_blank">ticket</a> is home to an active discussion with excellent reasons on both sides of the argument for why this should or should not be included in core, highlighting the many <a href="https://core.trac.wordpress.org/ticket/32522#comment:32" target="_blank">considerations</a> that would be involved with having oEmbed discovery turned on. Tackling <a href="https://core.trac.wordpress.org/ticket/32522#comment:34" target="_blank">abuse of the feature</a> could also pose a significant challenge.</p>\n<p>The feature plugin is still in the early development stages and discussion regarding its implementation is ongoing. Birchler said the team needs help with design and development, particularly with the oEmbed auto-discovery part of the project. If you&#8217;d like to get involved with the discussion, you can join in the weekly chats in the <strong>#feature-oembed</strong> WordPress Slack channel.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 17 Jul 2015 22:51:55 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:31;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:87:"WPTavern: New Roots Radio Podcast Discusses WordPress and Modern Web Development Topics";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46679";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:97:"http://wptavern.com/new-roots-radio-podcast-discusses-wordpress-and-modern-web-development-topics";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3530:"<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/roots.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/roots.jpg?resize=700%2C300" alt="roots" class="aligncenter size-full wp-image-46801" /></a></p>\n<p>Ben Word and the team behind <a href="https://roots.io/" target="_blank">Roots</a> are launching a new WordPress-related podcast called <a href="https://roots.io/radio0/" target="_blank">Roots Radio</a>. Earlier this year, Word <a href="http://wptavern.com/roots-wordpress-starter-theme-rebrands-as-sage-with-8-0-release" target="_blank">rebranded the Roots starter theme as “Sage”</a> under the Roots organization as part of <a href="http://wptavern.com/roots-starter-theme-for-wordpress-will-become-framework-agnostic-in-2015" target="_blank">a long-term plan to make it framework-agnostic</a>. Opening up the starter theme to be available for use with a variety of frontend frameworks means that the Roots community is utilizing a wide range of technologies for development.</p>\n<p>The new podcast was created to discuss WordPress and Roots development and will also explore general modern web development topics. The <a href="https://roots.io/radio0/" target="_blank">inaugural episode</a> introduces Roots team members, many of whom use WordPress and others who are more active outside of WordPress development. They also discuss their individual WordPress workflows, dependency management, and project structure.</p>\n<blockquote class="twitter-tweet" width="550"><p lang="en" dir="ltr">If you’re interested in a smoother WordPress workflow, listen to Roots Radio, whether you use Roots or not. <a href="https://t.co/vhocxb9tkC">https://t.co/vhocxb9tkC</a></p>\n<p>&mdash; Fränk Klein (@fklux) <a href="https://twitter.com/fklux/status/621432291341017088">July 15, 2015</a></p></blockquote>\n<p></p>\n<p>Ben Word and Scott Walkinshaw recently appeared on <a href="https://changelog.com/podcast/" target="_blank">The Changelog</a> podcast, a weekly show that covers the intersection of software development and open source, to discuss &#8220;<a href="https://changelog.com/156/" target="_blank">Modern WordPress using Bedrock and Sage</a>.&#8221;</p>\n<p>&#8220;After Scott and I appeared on the Changelog podcast, the guys on the team wanted to get something going,&#8221; Word said. Even though the WordPress community already has many regular podcasts devoted to news, business, and development, Word believes that the Roots team has something unique to offer with their experience and dedication to using modern web development tools.</p>\n<p>He shared a sneak preview of some of the topics the team plans to cover in future episodes of Roots Radio:</p>\n<ul>\n<li>Deployments</li>\n<li>Theme wrapper and DRY</li>\n<li>Security</li>\n<li>Composer</li>\n<li>Forking WordPress</li>\n<li>Open Source Support/Maintenance/Burnout</li>\n<li>Keeping Roots projects up-to-date</li>\n<li>Framework agnostic workflow</li>\n<li>Theming tips and tricks</li>\n<li>How to contribute to Roots / open source</li>\n<li>Stepping outside of WordPress land</li>\n<li>Unit tests</li>\n</ul>\n<p>Word confirmed that Roots Radio will have guests on upcoming episodes. If these topics have piqued your interest, you can subscribe to the podcast via <a href="https://itunes.apple.com/us/podcast/roots-radio/id1015480854" target="_blank">iTunes</a> or <a href="http://feeds.soundcloud.com/users/soundcloud:users:160680092/sounds.rss" target="_blank">RSS</a>. New episodes will be released every couple of weeks.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 17 Jul 2015 20:24:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:32;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:71:"WPTavern: WordPress 4.3 Beta 3 Adds Site Icon Feature to the Customizer";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46676";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:81:"http://wptavern.com/wordpress-4-3-beta-3-adds-site-icon-feature-to-the-customizer";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4288:"<p>WordPress 4.3 <a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-3/" target="_blank">beta 3</a> was released this week right on <a href="https://make.wordpress.org/core/version-4-3-project-schedule/" target="_blank">schedule</a>, and beta 4 is expected to arrive next Wednesday. This release includes more than <a href="https://core.trac.wordpress.org/log?action=stop_on_copy&mode=stop_on_copy&rev=33286&stop_rev=33141&limit=150" target="_blank">140 fixes and improvements</a> since last week&#8217;s beta.</p>\n<p>One of the most important changes you&#8217;ll notice is that the <a href="http://wptavern.com/wordpress-4-3-adds-new-site-icons-feature-and-a-text-editor-to-press-this" target="_blank">Site Icon feature</a> is now available in the customizer in addition to its spot under <strong>General > Settings</strong>. The new panel is called Site Identity and it includes the site title, tagline, and the icon upload controls.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/site-identity-new-customizer-panel.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/site-identity-new-customizer-panel.jpg?resize=1025%2C690" alt="site-identity-new-customizer-panel" class="aligncenter size-full wp-image-46773" /></a></p>\n<p>&#8220;The feature is now complete and requires lots of testing,&#8221; WordPress 4.3 release lead Konstantin Obenland said in the announcement. &#8220;Please help us ensure the site icon feature works well in both Settings and the Customizer.&#8221;</p>\n<p>Mark Jaquith&#8217;s work to improve passwords has also been added to the installation process so that administrators will be prompted to select a strong password when setting up a new site. This screenshot from Ryan Boren&#8217;s most recent &#8220;<a href="https://make.wordpress.org/core/2015/07/15/today-in-the-nightly-site-icons-in-the-customizer-editor-patterns-more-accessible-comment-bubbles-row-toggle-focus-styling/" target="_blank">Today in the Nightly</a>&#8221; update shows the password strength meter&#8217;s feedback added to the UI.</p>\n<a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/passwords-ui-on-install-screen-1024x740.png"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/passwords-ui-on-install-screen-1024x740.png?resize=1024%2C740" alt="photo credit: Ryan Boren" class="size-full wp-image-46779" /></a>photo credit: <a href="https://make.wordpress.org/core/2015/07/15/today-in-the-nightly-site-icons-in-the-customizer-editor-patterns-more-accessible-comment-bubbles-row-toggle-focus-styling/passwords-ui-on-install-screen/">Ryan Boren</a>\n<p>Boren also highlighted the value of the new Markdown-esque patterns recognized in the post editor and their convenience for mobile users. Instead of trying to format HTML on a tiny screen, users will be able to take advantage of the new shortcuts which require fewer keystrokes.</p>\n<p>&#8220;Create bulleted lists, ordered lists, and blockquotes using markdown like patterns,&#8221; he said. &#8220;I find this particularly handy on phones when the editor toolbar is offscreen.&#8221;</p>\n<a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/editor-patterns-keyboard-shortcuts-list.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/editor-patterns-keyboard-shortcuts-list.jpg?resize=1025%2C541" alt="photo credit: Ryan Boren" class="size-full wp-image-46785" /></a>photo credit: <a href="https://make.wordpress.org/core/2015/07/15/today-in-the-nightly-site-icons-in-the-customizer-editor-patterns-more-accessible-comment-bubbles-row-toggle-focus-styling/">Ryan Boren</a>\n<p>Beta 3 also improves the accessibility of comments and media list tables with a better design for comment bubbles and focus styling for row toggles. Obenland welcomes feedback on the accessibility improvements from those who are using WordPress with screen readers.</p>\n<p>With 140 changes in beta 3, a new round of testing is in order. You can help by installing the <a href="https://wordpress.org/plugins/wordpress-beta-tester/" target="_blank">WordPress Beta Tester</a> plugin on a development site and reporting any bugs you find in the recent improvements. The official WordPress 4.3 release is now just four weeks away.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 16 Jul 2015 22:01:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:33;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:59:"WPTavern: WPWeekly Episode 199 – Preview of WordPress 4.3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:44:"http://wptavern.com?p=46746&preview_id=46746";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wptavern.com/wpweekly-episode-199-preview-of-wordpress-4-3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2747:"<p>In this episode of WordPress Weekly, <a href="http://marcuscouch.com/">Marcus Couch</a> and I preview WordPress 4.3. We discuss what WordPress.tv should do with old videos now that the site is six years old. There&#8217;s a conference this weekend devoted to the Genesis Framework and we let you know how you can watch it for free.</p>\n<p>Theme translations and language packs are on their way to the WordPress theme directory. Last but not least, we congratulate Topher DeRosia on reaching his funding goals to attend WordCamp Pune, India.</p>\n<h2>Stories Discussed:</h2>\n<p><a href="https://wordpress.org/news/2015/07/wordpress-4-3-beta-3/">WordPress 4.3 Beta 3</a><br />\n<a href="http://www.wpbeginner.com/news/whats-coming-in-wordpress-4-3-features-and-screenshots">What’s Coming in WordPress 4.3</a><br />\n<a href="https://make.wordpress.org/tv/2015/07/03/ui-for-outdated-content/">UI For Outdated Content on WordPress.tv</a><br />\n<a href="http://wptavern.com/theme-translations-and-language-packs-are-coming-to-wordpress-org">Theme Translations and Language Packs are Coming to WordPress.org</a><br />\n<a href="http://wptavern.com/the-first-24hr-conference-devoted-to-the-genesis-framework-set-for-july-19-20">The First 24hr Conference Devoted to the Genesis Framework Set for July 18-20</a><br />\n<a href="http://wptavern.com/topher-derosia-launches-gofundme-campaign-to-attend-wordcamp-pune-india">Topher DeRosia Launches GoFundMe Campaign to Attend WordCamp Pune, India</a></p>\n<h2>Plugins Picked By Marcus:</h2>\n<p><a href="https://wordpress.org/plugins/background-image-cropper/">Background Image Cropper</a> is a WordPress core feature-plugin that adds cropping to background images for parity with header images.</p>\n<p><a href="https://wordpress.org/plugins/frontier-restrict-media/">Frontier Restrict Media</a> will restrict users so they can only access their own media files from the media library.</p>\n<p><a href="https://wordpress.org/plugins/image-hover-effects/">Image Hover Effects</a> allows users to add 40+ hover effects to images with captions.</p>\n<h2>WPWeekly Meta:</h2>\n<p><strong>Next Episode:</strong> Wednesday, July 22nd 9:30 P.M. Eastern</p>\n<p><strong>Subscribe To WPWeekly Via Itunes: </strong><a href="https://itunes.apple.com/us/podcast/wordpress-weekly/id694849738" target="_blank">Click here to subscribe</a></p>\n<p><strong>Subscribe To WPWeekly Via RSS: </strong><a href="http://www.wptavern.com/feed/podcast" target="_blank">Click here to subscribe</a></p>\n<p><strong>Subscribe To WPWeekly Via Stitcher Radio: </strong><a href="http://www.stitcher.com/podcast/wordpress-weekly-podcast?refid=stpr" target="_blank">Click here to subscribe</a></p>\n<p><strong>Listen To Episode #199:</strong><br />\n</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 16 Jul 2015 19:02:22 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:34;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:78:"WPTavern: How to Give Back to the WordPress Foundation when Shopping on Amazon";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46683";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:88:"http://wptavern.com/how-to-give-back-to-the-wordpress-foundation-when-shopping-on-amazon";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5051:"<p>Consumer disappointment ran high yesterday when Amazon Prime Day <a href="https://twitter.com/hashtag/PrimeDayFail?src=hash" target="_blank">failed</a> to deliver on its ambitious claim to have &#8220;more deals than Black Friday.&#8221; Prime customers were surprised to find modest deals on knee braces, shoe horns, and pet grooming kits instead of steep discounts on shiny electronics.</p>\n<blockquote class="twitter-tweet" width="550"><p lang="en" dir="ltr">A Diane Keaton T Shirt,  with a 5 pack of brass knuckles AND ham?!?! DREAMS CAN COME TRUE <a href="https://twitter.com/hashtag/PrimeDayFail?src=hash">#PrimeDayFail</a> <a href="http://t.co/hE1X6lhGb5">pic.twitter.com/hE1X6lhGb5</a></p>\n<p>&mdash; Roy Buckingham (@shave_my_lemon) <a href="https://twitter.com/shave_my_lemon/status/621462914533232640">July 15, 2015</a></p></blockquote>\n<p></p>\n<p>The world was optimistic that if any company could create a consumer holiday out of thin air, Amazon would be the one to do it. Despite Prime Day&#8217;s humor-inspiring failure, consumer obsession with the online retail giant isn&#8217;t likely to wane anytime soon. In fact, the company reported that its &#8220;&#8216;<a href="http://phx.corporate-ir.net/phoenix.zhtml?c=176060&p=irol-newsArticle&ID=2068090" target="_blank">Prime Day&#8217; peak order rates surpassed that of 2014’s Black Friday</a>&#8221; early in the day.</p>\n<p>If you&#8217;re a die hard Amazon shopper, you&#8217;ll probably continue on as if Prime Day never happened. Here&#8217;s how you can do something good for WordPress while you&#8217;re at it:</p>\n<p>The <a href="http://smile.amazon.com/" target="_blank">AmazonSmile Foundation</a> enables shoppers to support their favorite charitable organizations when making purchases, at no extra cost. If you select a charity, AmazonSmile will automatically donate 0.5% of the purchase price from your eligible purchases. The <a href="http://wordpressfoundation.org/" target="_blank">WordPress Foundation</a> is among the nearly one million organizations that you can support.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/amazon-wordpress-foundation.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/amazon-wordpress-foundation.jpg?resize=1025%2C479" alt="amazon-wordpress-foundation" class="aligncenter size-full wp-image-46731" /></a></p>\n<p>To sign up, simply visit <a href="http://smile.amazon.com/" target="_blank">Smile.Amazon.com</a> and select the WordPress Foundation. You&#8217;ll be presented with options that will help you navigate to Smile.Amazon.com more conveniently the next time you shop. If you have already selected a charity and want to change it, you can visit your account settings to search and select a new organization.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/amazon-smile-change-charity.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/amazon-smile-change-charity.jpg?resize=877%2C492" alt="amazon-smile-change-charity" class="aligncenter size-full wp-image-46735" /></a></p>\n<h3>What does the WordPress Foundation do?</h3>\n<p>Before you opt to support the <a href="http://wordpressfoundation.org/" target="_blank">WordPress Foundation</a>, it&#8217;s important to know what it&#8217;s all about. The 501(c)3 non-profit organization was established &#8220;to further the mission of the WordPress open source project: to democratize publishing through Open Source, GPL software.&#8221; Matt Mullenweg created the charity to ensure that future generations will have access to WordPress as the project&#8217;s leadership and contributor base continue to evolve. It also exists to protect the WordPress and WordCamp trademarks and logos.</p>\n<p>A large portion of donations to the foundation go towards subsidizing WordCamp expenses, including video production of presentations for WordCamp.tv. The foundation also <a href="http://wptavern.com/wordpress-foundation-to-foot-the-bill-for-meetup-com-organizer-dues" target="_blank">covers Meetup.com organizer dues</a> for those who run WordPress meetups. At the beginning of this year, the foundation <a href="http://wptavern.com/the-wordpress-foundation-creates-a-traveling-scholarship-in-memory-of-kim-parsell" target="_blank">created a new traveling scholarship for women attending WordCamp US</a>, in memory of Kim Parsell, a prolific WordPress contributor who passed away this year.</p>\n<p>When you support the WordPress Foundation, you are supporting a variety of community initiatives that help ensure the future of WordPress for years to come. Rose Goldman, who helps manage the foundation, recently set the organization up on AmazonSmile. So far, she said the donations from Amazon represent just a trickle of the budget, but that&#8217;s probably due to lack of awareness of AmazonSmile. If you haven&#8217;t yet selected a charity for automatic donations from <a href="http://smile.amazon.com/" target="_blank">AmazonSmile</a>, the WordPress Foundation is a worthy cause.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 16 Jul 2015 18:52:07 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:35;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:54:"WPTavern: What Should WordPress.tv Do with Old Videos?";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46713";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wptavern.com/what-should-wordpress-tv-do-with-old-videos";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4208:"<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/WordPressTVFeaturedImage.png"><img class="size-full wp-image-46739" src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/WordPressTVFeaturedImage.png?resize=666%2C254" alt="WordPress TV Featured Image" /></a>photo credit: <a href="http://www.flickr.com/photos/30719244@N06/8648634062">tvs</a> &#8211; <a href="https://creativecommons.org/licenses/by-sa/2.0/">(license)</a>\n<p><a href="http://wordpress.tv/">WordPress.tv</a> launched in <a href="https://wordpress.org/news/2009/01/wordpresstv/">January of 2009</a> and since then has become one of the largest repositories of information dedicated to WordPress. To put that in perspective, WordPress 2.8 and 2.9 were released the same year.</p>\n<p>However, with more than six years of content available, the team has run into a problem. On July 3rd, Brash Rebel, who helps manage WordPress.tv, <a href="https://make.wordpress.org/tv/2015/07/03/ui-for-outdated-content/">asked</a> if there should be a user interface for outdated content.</p>\n<blockquote><p>A reality we are now facing is the fact that the software we know and love has evolved and changed considerably over this time period, thus rendering much of the early content on this site no longer applicable to users of more current releases of WordPress. In <a href="https://wordpress.slack.com/archives/wptv/p1435856572000421">today’s TV team Slack meeting</a> the question was raised about how to properly address outdated, deprecated, no-longer-accurate content.</p></blockquote>\n<p>The first question considered is whether to keep or delete old content, specifically, videos in the <a href="http://wordpress.tv/category/how-to/">How To</a> category. Since so many people watch older tutorial style videos, the team decided that removing the content permanently from the site is not the best course of action. The other question considered is whether older presentations on specific subjects should be deleted.</p>\n<p>For example, the following two sessions are about the same subject but four years apart. The content in the 2015 video is more likely to match the Google Analytics experience of today.</p>\n<ol>\n<li><a href="http://wordpress.tv/2013/03/16/melinda-samson-workshop-google-analytics-101/">Melinda Samson: Google Analytics 101 Workshop (2011)</a></li>\n<li><a href="http://wordpress.tv/2015/05/16/david-bird-google-analytics-and-wordpress-for-beginners-2/">David Bird: Google Analytics and WordPress for Beginners (May, 2015)</a></li>\n</ol>\n<p>The team also discussed a variety of ideas on how to display information to viewers that they&#8217;re watching outdated content. These included, text prompts, information bars, links, and determining the best method to indicate videos don&#8217;t reflect the current WordPress experience.</p>\n<p>Rebel says the goal isn&#8217;t to strictly deal with the issue today, but also set a precedence for the future. As more WordCamps occur across the globe and more <a href="https://make.wordpress.org/tv/2015/06/16/do-you-screencast-or-make-video-tutorials-of-how-to-use-wordpress-wordpress-tv-wants-you/">screencasts</a> show up on WordPress.tv, the team needs to figure out a balance between displaying old content and making the most out of fresh content.</p>\n<h2>Mimic the Plugin Directory</h2>\n<p>I&#8217;m happy that the team won&#8217;t delete old videos. As someone who writes about WordPress everyday, the videos on WordPress.tv contain a wealth of knowledge. It would be a shame to see so much information deleted.</p>\n<p>I think the best and easiest solution is to mimic the WordPress plugin directory in how it deals with plugins that haven&#8217;t been updated in two years or more. A prominent message displays on the page telling the viewer that the content they&#8217;re watching is outdated. It could be taken a step further by showing the viewer a list of related videos that are more recent.</p>\n<p>I encourage you to<a href="https://make.wordpress.org/tv/2015/07/03/ui-for-outdated-content/"> read the blog post</a> and the associated comments as they contain some good ideas. What do you think should be done with old content on WordPress.tv?</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 16 Jul 2015 18:12:42 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:36;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt: TSA Jazz";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45236";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:30:"http://ma.tt/2015/07/tsa-jazz/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:769:"<p>At an airport in Frankfurt airport security asked famous jazz saxophonist <a href="http://www.joshuaredman.com/">Joshua Redman</a> to prove it was a real instrument.</p>\n<blockquote class="twitter-tweet" width="550"><p lang="en" dir="ltr">[airport security, FRA]&#10;*sax flagged*&#10;“Pls play”&#10;“Seriously?”&#10;“Yes”&#10;*i play Ornithology*&#10;*midway thru 1st chorus*&#10;“Enuf u’re clear pls stop”</p>\n<p>&mdash; Joshua Redman (@Joshua_Redman) <a href="https://twitter.com/Joshua_Redman/status/619144413369909248">July 9, 2015</a></p></blockquote>\n<p></p>\n<p>Hilarious! I can&#8217;t find any recordings of Joshua playing that classic bebop song, but here&#8217;s a Charlie Parker recording:</p>\n<p><span class="embed-youtube"></span></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 16 Jul 2015 15:12:00 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:37;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:80:"WPTavern: Explore the WordPress REST API with the New Interactive Console Plugin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46685";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:90:"http://wptavern.com/explore-the-wordpress-rest-api-with-the-new-interactive-console-plugin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3697:"<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/04/wp-rest-api.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/04/wp-rest-api.jpg?resize=1025%2C469" alt="wp-rest-api" class="aligncenter size-full wp-image-43000" /></a></p>\n<p>WordPress REST API project lead <a href="https://twitter.com/rmccue" target="_blank">Ryan McCue</a>, in cooperation with <a href="https://twitter.com/AutomatticEng" target="_blank">Automattic&#8217;s Engineering team</a>, released a <a href="https://wordpress.org/plugins/rest-api-console/" target="_blank">REST API Console</a> plugin on WordPress.org today. It&#8217;s a basic console that fits right into the WordPress admin and allows you to explore the API, make small changes, and find out what your site is exposing.</p>\n<p>&#8220;This is a forked version of the WP.com console that myself and members of the Apollo team at Automattic worked on,&#8221; McCue told the Tavern. The console was converted in approximately four casual days, and McCue credits <a href="http://viewsource.beaucollins.com/" target="_blank">Beau Collins</a> for this, as he originally wrote the majority of the console for developers working on WordPress.com.</p>\n<p>&#8220;It&#8217;s pretty useful for exploring the API as a learning tool, but also for developers who are extending the API to get a sense of how their stuff fits in,&#8221; he said.</p>\n<p>The REST API Console plugin requires the <a href="https://wordpress.org/plugin/rest-api/" target="_blank">WP REST API plugin</a> version 2.0 or later. You can find this on the <a href="https://github.com/WP-API/WP-API" target="_blank">GitHub project page</a> and version 2 should be up on WordPress.org within the next day or two. Once you have both plugins installed, the console is visible in the admin under <strong>Tools > Rest API Console</strong>.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/wp-rest-api-console-demo.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/wp-rest-api-console-demo.jpg?resize=829%2C236" alt="wp-rest-api-console-demo" class="aligncenter size-full wp-image-46693" /></a></p>\n<p>You can actually make changes to your site using the console, so it&#8217;s advisable to install it on a local site and play with it there. While the GET requests can&#8217;t change anything, the other types can edit or delete posts (which would end up in your trash).</p>\n<p>The plugin can only connect to the local site you&#8217;re currently on and cannot access remote WordPress sites. McCue recommends using something like <a href="https://www.getpostman.com/" target="_blank">Postman</a> or <a href="http://luckymarmot.com/paw" target="_blank">Paw</a> if you want to play around with remote sites.</p>\n<p>In the future, he hopes to add more features and improve the plugin&#8217;s parameter documentation.</p>\n<p>&#8220;The older WordPress.com console had the ability to click through to links, so I&#8217;d like to re-add that at some point,&#8221; he said. &#8220;The parameter documentation and tooling hasn&#8217;t been fleshed out yet, but the plan is to do it eventually &#8211; we&#8217;re working on exposing more from the API itself, too.&#8221;</p>\n<p>If you want to tinker with the API but don&#8217;t have a local testing site handy, check out the live demo at <a href="http://demo.wp-api.org" target="_blank">demo.wp-api.org</a> where you can click around to explore. This will save you the trouble of installing the plugin, if you just want to try it out. Also, you can&#8217;t perform any destructive changes there. Version 2 of the WP REST API plugin should be available on WordPress.org within 24-48 hours.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 16 Jul 2015 00:31:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:38;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:106:"WPTavern: WordPress Theme Review Team Unanimously Approves Roadmap to Improve Directory and Review Process";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46551";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:116:"http://wptavern.com/wordpress-theme-review-team-unanimously-approves-roadmap-to-improve-directory-and-review-process";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2613:"<p>The <a href="https://make.wordpress.org/themes/">Theme Review Team</a> has spent the last two months <a href="http://wptavern.com/wordpress-theme-review-team-seeks-feedback-on-the-review-process-themes-and-the-directory">collecting data from surveys</a> to discover common pain points people experience using the theme directory and going through the theme review process. The results of those surveys were used to <a href="https://make.wordpress.org/themes/2015/07/07/roadmap-for-phase-one/">create a roadmap</a> of areas to focus on.</p>\n<p>In yesterday&#8217;s meeting, the Theme Review Team voted and those in attendance <a href="https://wordpress.slack.com/archives/themereview/p1436896772000053">unanimously approved</a> the roadmap.</p>\n<a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/ThemeReviewTeamRoadmapVote.png"><img class="size-full wp-image-46668" src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/ThemeReviewTeamRoadmapVote.png?resize=471%2C560" alt="Phase One Roadmap Approved" /></a>Phase One Roadmap Approved\n<p>One of the key parts to the roadmap is creating groups with a scope of responsibilities. The groups include:</p>\n<ul>\n<li>Directory</li>\n<li>Documentation</li>\n<li>Tools</li>\n<li>Reviews and queues</li>\n<li>UX and research</li>\n</ul>\n<p>Each group needs a point person who acts as the communication bridge between the group and Theme Review Team. Tammie Lister explains what the point person&#8217;s role is within a group.</p>\n<blockquote><p>This person will report weekly what is going on during the chats. They will also post on the make.blog each week about what is going on in each group. This should ensure we keep up communication and make sure things get done.</p></blockquote>\n<p>They&#8217;re not necessarily in charge of getting things done but rather, act as a facilitator to make sure the group stays on track.</p>\n<p>One part of the roadmap that I&#8217;m interested in is the possibility of a report button added to the theme directory to allow users to report themes. If this happens, it will be interesting to see how it&#8217;s used or abused and whether it adds any additional work load to the theme reviewers.</p>\n<p>The roadmap looks solid and shows the team is focused on improving several aspects of the Theme Directory. This is a great opportunity for new contributors to get involved with the project. If you&#8217;re interested in joining any of the groups within the Theme Review Team, please visit the <strong>#themereview</strong> channel on <a href="https://make.wordpress.org/chat/">Slack</a> and let the team know.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 15 Jul 2015 21:10:12 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:39;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:72:"WPTavern: Proper Lite: A Free and Flexible WordPress Theme for Creatives";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46585";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:81:"http://wptavern.com/proper-lite-a-free-and-flexible-wordpress-theme-for-creatives";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3530:"<p>Last November, ModernThemes <a href="http://wptavern.com/modernthemes-launches-site-dedicated-to-providing-free-wordpress-themes" target="_blank">officially launched its free WordPress themes site</a> and has been gradually adding to its <a href="https://wordpress.org/themes/author/modernthemesnet/" target="_blank">collection</a> hosted on WordPress.org. Founders Robbie Grabowski and Mike Driscoll launched the site with a commitment to produce themes that support the native customizer and keep plugin functionality separate while still being &#8220;plugin-friendly.&#8221;</p>\n<p><a href="https://modernthemes.net/wordpress-themes/proper-lite/" target="_blank">Proper Lite</a> is ModernThemes&#8217; latest release, created to be fully compatible with their new <a href="https://modernthemes.net/plugins/" target="_blank">library of free plugins</a> that add functionality like shortcodes, widgets, sidebars, services, testimonials, projects, etc.</p>\n<p>The theme features a fullscreen homepage hero section with multiple controls for customizing the background, text, and buttons.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/properlite_mockups.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/properlite_mockups.png?resize=1000%2C700" alt="properlite_mockups" class="aligncenter size-full wp-image-46645" /></a></p>\n<p>Proper Lite was designed with a modular homepage layout that supports three flexible widget areas where you can drop in portfolio items, blogs, testimonials, or any other content you choose. This is one of the reasons why ModernThemes calls it their most flexible free theme to date.</p>\n<p>In addition to the default template, Proper Lite includes Homepage, Full Width, and Left Sidebar templates. It also has specific styling for various content blocks added from the plugin library, as you can see in the <a href="https://modernthemes.net/demo/?theme=properlite" target="_blank">live demo</a>.</p>\n<p><a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/team-members.jpg"><img src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/team-members.jpg?resize=926%2C897" alt="team-members" class="aligncenter size-full wp-image-46654" /></a></p>\n<p>Proper Lite has an amazing array of controls included in the customizer. Users can easily adjust Google Fonts, logos and icons, nearly every color used in the theme, social media icons, a footer call-to-action, the number of columns in the widget areas, and much more. The theme was not created with a set, inflexible design. Versatility is one of its key features.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/proper-lite-customizer.png"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/proper-lite-customizer.png?resize=1025%2C426" alt="proper-lite-customizer" class="aligncenter size-full wp-image-46659" /></a></p>\n<p>Proper Lite, like other themes from ModernThemes, has extensive <a href="https://modernthemes.net/proper-lite-documentation/" target="_blank">documentation</a> available on the website for every section included in the theme. While this theme is heavily geared toward creatives with an emphasis on fullwidth images and portfolio content, it is also suitable for personal blogs, agencies, and creative businesses, thanks to the wide range of plugins available to extend it. <a href="https://modernthemes.net/wordpress-themes/proper-lite/" target="_blank">Download</a> it for free from the ModernThemes website.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 15 Jul 2015 18:42:20 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:40;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:15:"Matt: Sleep Dep";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45247";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:31:"http://ma.tt/2015/07/sleep-dep/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:186:"<p><a href="http://www.theatlantic.com/health/archive/2013/12/how-sleep-deprivation-decays-the-mind-and-body/282395/">How Sleep Deprivation Decays the Mind and Body</a>. Crazy story.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 15 Jul 2015 04:46:01 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:41;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:29:"Matt: Plato, Phaedrus, Google";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45224";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:36:"http://ma.tt/2015/07/plato-phaedrus/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:822:"<blockquote><p>and now you, who are the father of letters, have been led by your affection to ascribe to them a power the opposite of that which they really possess. For this invention will produce forgetfulness in the minds of those who learn to use it, because they will not practice their memory. Their trust in writing, produced by external characters which are no part of themselves, will discourage the use of their own memory within them. You have invented an elixir not of memory, but of reminding; [&#8230;]</p></blockquote>\n<p><a href="http://www.perseus.tufts.edu/hopper/text?doc=Perseus%3Atext%3A1999.01.0174%3Atext%3DPhaedrus%3Asection%3D275a">A few thousand years ago Plato predicted how Google would make us less able to remember things</a>.</p>\n<p>Hat tip: <a href="http://chris.ink/">Chris Rudzki</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 15 Jul 2015 04:24:00 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:42;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:97:"WPTavern: BuddyBoss Expands Into LMS Market with Free BuddyPress Plugins for LearnDash and Sensei";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46573";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:107:"http://wptavern.com/buddyboss-expands-into-lms-market-with-free-buddypress-plugins-for-learndash-and-sensei";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3139:"<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/learndash.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/learndash.png?resize=680%2C310" alt="learndash" class="aligncenter size-full wp-image-46576" /></a></p>\n<p>In May, <a href="http://www.buddyboss.com/" target="_blank">BuddyBoss</a> founder Michael Eisenwasser shared with Tavern readers the <a href="http://wptavern.com/inside-buddyboss-with-michael-eisenwasser" target="_blank">challenges of creating a profitable business</a> in what is still a relatively small marketplace for BuddyPress themes and plugins. Developers are building niche social networks every day, but BuddyPress&#8217; appeal as a platform hinges on the availability of compelling and reliable third-party add-ons.</p>\n<p>Over the past couple of months, BuddyBoss has branched out into serving the LMS market with free BuddyPress integration plugins for <a href="http://www.learndash.com/" target="_blank">LearnDash</a> and <a href="http://www.woothemes.com/products/sensei/" target="_blank">Sensei</a>, two of WordPress&#8217; most popular LMS solutions. Both <a href="https://wordpress.org/plugins/buddypress-learndash/" target="_blank">BuddyPress for LearnDash</a> and <a href="https://wordpress.org/plugins/sensei-buddypress/" target="_blank">BuddyPress for Sensei</a> were created to work with any theme, but are also guaranteed to work seamlessly with BuddyBoss&#8217; new Social Learner theme.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/social-learner.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/social-learner.png?resize=1000%2C573" alt="social-learner" class="aligncenter size-full wp-image-46620" /></a></p>\n<p>Both plugins have similar core feature sets that include the ability to create courses, lessons, quizzes, and tie it all in to BuddyPress activity, groups, and forums to create a social learning platform. Course managers can even introduce gamification into the learning process with open source <a href="http://badgeos.org/" target="_blank">BadgeOS</a> plugin integration.</p>\n<p>Social learning communities, like popular social goal or fitness tracking apps, bring a higher level of engagement by leveraging the people factor. An LMS powered by WordPress and BuddyPress provides students with the ability to connect to new friends, collaborate, send messages, earn badges &#8211; all activities that contribute to a higher level of motivation for learning and success.</p>\n<p>The idea is not new to BuddyPress, as the long-abandoned <a href="http://buddypress.coursewa.re/" target="_blank">BuddyPress Courseware</a> project brought a social aspect to e-learning nearly four years ago. However, it is difficult to maintain an LMS plugin that only works with BuddyPress, because it doesn&#8217;t have the benefit of contributions and testing from a larger community. BuddyBoss made a strategic move in building plugins that would bridge BuddyPress to extend existing LMS solutions that serve the larger WordPress market. Both newer alternatives are available for free on WordPress.org.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 14 Jul 2015 22:53:52 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:43;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:75:"WPTavern: Theme Translations and Language Packs are Coming to WordPress.org";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46589";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:85:"http://wptavern.com/theme-translations-and-language-packs-are-coming-to-wordpress-org";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3610:"<a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2014/08/globe.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2014/08/globe.jpg?resize=1024%2C499" alt="photo credit: . Entrer dans le rêve - cc" class="size-full wp-image-29134" /></a>photo credit: <a href="https://www.flickr.com/photos/tranbina/4765484383/">. Entrer dans le rêve</a> &#8211; <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>\n<p>WordPress.org will soon support translations and language packs for themes hosted in the official directory. In <a href="http://wptavern.com/highlights-of-matt-mullenwegs-qa-session-at-wordcamp-europe-2015" target="_blank">Matt Mullenweg&#8217;s Q&amp;A at WordCamp Europe 2015</a>, he emphasized the importance of having better language support for themes and plugins and identified this as a high priority for continued improvements to WordPress.org.</p>\n<p>Today the WordPress meta team <a href="https://make.wordpress.org/themes/2015/07/14/theme-translations-on-wordpress-org/" target="_blank">announced</a> that theme translations will soon be available on WordPress.org at <a href="http://translate.wordpress.org" target="_blank">translate.wordpress.org</a>. Within the next few days or weeks, all active themes (those updated within the last two years) will have their strings imported.</p>\n<p>&#8220;This will involve importing ~1500 themes, which, combined, have about 315,000 total strings,&#8221; Sam Sidler said in the announcement. &#8220;After duplicates, the number drops to only 80,000 unique strings.&#8221;</p>\n<h3>Language Packs Will Reduce Download Sizes for Themes</h3>\n<p>Sidler outlined several advantages for theme authors who opt to manage translations on WordPress.org, including the community&#8217;s large network of contributing translators who currently maintain 140 locales on <a href="http://translate.wordpress.org" target="_blank">translate.wordpress.org</a>.</p>\n<p>The most exciting change is that themes hosted on WordPress.org will soon be able to take advantage of language packs. Theme authors will have the option to remove translations from their zip file in favor of allowing WordPress.org to deliver the language packs, resulting in smaller download sizes.</p>\n<p>&#8220;Eventually, we also plan to give priority to localized themes in localized directories; e.g., someone searching the Romanian theme directory will see Romanian themes prioritized over English-only themes,&#8221; Sidler said.</p>\n<p>The more languages a theme can be translated into, the greater its prominence in WordPress&#8217; language-specific theme directories. This should provide WordPress.org theme authors with a strong motivation to <a href="https://make.wordpress.org/polyglots/handbook/rosetta/theme-plugin-directories/" target="_blank">work with the polyglots team</a> to get more translations. Theme authors can also request new translation editors to be added to polyglots, if they want to continue working with their own translators.</p>\n<p>Those who prefer to ship their own translations can continue to do so. Keeping the translation files in your zip package will essentially opt you out of language packs for those specific translations. If you need help adding support for translations and language packs, Sidler recommends Otto&#8217;s <a href="http://ottopress.com/2013/language-packs-101-prepwork/" target="_blank">Language Packs 101</a> tutorial in addition to the <a href="https://developer.wordpress.org/themes/functionality/internationalization/" target="_blank">Theme Developer Handbook section on Internationalization</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 14 Jul 2015 20:22:12 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:44;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:87:"WPTavern: The First 24hr Conference Devoted to the Genesis Framework Set for July 18-20";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46565";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:97:"http://wptavern.com/the-first-24hr-conference-devoted-to-the-genesis-framework-set-for-july-19-20";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1461:"<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/GenesisCampFeaturedImage.png"><img class="aligncenter size-full wp-image-46579" src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/GenesisCampFeaturedImage.png?resize=880%2C275" alt="Genesis Camp Featured Image" /></a><a href="http://genesis.camp/">Genesis Camp</a> is the first 24 hour conference dedicated to the Genesis framework by <a href="http://www.studiopress.com/">Studiopress</a>. The event takes place on July 18-20 and is free to attend. Even though the event is dedicated to the Genesis framework, it&#8217;s not associated with Copyblogger Media or Studiopress.</p>\n<p>Organized by a community of Genesis users, the event features <a href="http://genesis.camp/sessions/">sessions</a> on development workflow, branding, collaboration, and more. Each session will include an area for viewers to chat and ask questions. Speakers include Chris Lema, Carrie Dils, Wes Linda, David Wang, Heather Porter, and more.</p>\n<p>Sessions will be recorded in case you can&#8217;t stay awake to watch all 24 hours of the event. Videos will be handled by <a href="http://www.google.com/+/learnmore/hangouts/">Google Hangouts</a> while <a href="https://www.crowdcast.io/">Crowd Cast</a> will be used to allow viewers to chat during sessions. To watch the event you&#8217;ll need to register on the <a href="https://www.crowdcast.io/e/genesiscamp1">Genesis Camp Crowd Cast site</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 14 Jul 2015 17:43:43 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:45;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:77:"WPTavern: Candid Conversation with Tom McFarlin About the WordPress Community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46549";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:87:"http://wptavern.com/candid-conversation-with-tom-mcfarlin-about-the-wordpress-community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1158:"<p>Earlier this month, Tom McFarlin <a href="https://tommcfarlin.com/the-wordpress-community-a-comedy-of-drama-ego-oligarchies-and-more/">published a great post</a> where he shares his perspective on the WordPress community. His post struck a nerve and instead of discussing it through comments, I invited him to a Google Hangout to have a candid conversation. Within the conversation, McFarlin and I discuss a number of topics, including:</p>\n<ul>\n<li>Community behaviour and discourse</li>\n<li>It&#8217;s not a WordPress problem</li>\n<li>Comment moderation strategies</li>\n<li>Subtweeting</li>\n<li>How, as men, do we show that a significant portion of us are color/ethnicity/whatever blind?</li>\n<li>Women in tech</li>\n</ul>\n<p>McFarlin is the father of two daughters which adds an interesting dynamic to the women in tech issue. I enjoyed the time I spent with him discussing topics we both feel are important. If you have any feedback concerning the content in this recording, please leave a comment.</p>\n<p>There&#8217;s also a transcript of the interview <a href="http://www.wptavern.com/wpweeklyaudio/TomMcFarlinTranscript.zip">available here</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 14 Jul 2015 16:16:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:46;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:23:"Matt: Hacking Team Hack";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=45238";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:39:"http://ma.tt/2015/07/hacking-team-hack/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:966:"<p>I haven&#8217;t been following the Hacking Team story too closely. If you&#8217;re the same, here&#8217;s a quick catch-up: an Italian company that sold hacking tools, often to questionable governments, had all of their internal company data including emails, source code, everything released. <a href="http://www.engadget.com/2015/07/09/how-spyware-peddler-hacking-team-was-publicly-dismantled/">Engadget has the best summary I&#8217;ve seen so far of how they got hacked</a>, which was apparently done by a hacker vigilante who did something similar to another organization called the Gamma Group. <a href="https://firstlook.org/theintercept/2015/07/08/hacking-team-emails-exposed-death-squad-uk-spying/">The Intercept also has a good look at some of the more egregious behavior</a>. Bruce Schneier <a href="https://www.schneier.com/blog/archives/2015/07/organizational_.html">calls this new trend Organizational Doxxing and considers its ramifications</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 14 Jul 2015 03:43:00 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:47;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:82:"WPTavern: Topher DeRosia Launches GoFundMe Campaign to Attend WordCamp Pune, India";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46545";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:91:"http://wptavern.com/topher-derosia-launches-gofundme-campaign-to-attend-wordcamp-pune-india";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2000:"<p>Topher DeRosia, founder of <a href="http://t.co/Q9hSlXsBKQ">HeroPress</a>, is <a href="http://www.gofundme.com/heropress-in-pune">asking for</a> $2,150 to attend <a href="https://pune.wordcamp.org/2015/">WordCamp Pune</a>, India. DeRosia was asked to speak about HeroPress by Saurabh Shukla, who is a<a href="http://heropress.com/essays/ill-keep-looking-for-a-cms-unless-i-find-wordpress/" target="_blank"> HeroPress contributor</a> and also the lead organizer of WordCamp Pune, India.</p>\n<p>In an effort to be transparent, DeRosia published how he will spend the money.</p>\n<ul>\n<li>$1400 for the plane ticket</li>\n<li>$300 for hotel</li>\n<li>$200 for food, cabs, Uber, etc</li>\n<li>$100 for emergencies</li>\n<li>$150 for GoFundMe&#8217;s fees</li>\n</ul>\n<p>If DeRosia has money left over from his trip, he plans to sponsor a WordCamp that&#8217;s having difficulty finding sponsors or donate it to the WordPress Foundation.</p>\n<p>Since launching the campaign a few days ago, he&#8217;s raised $1,000. Unlike most other campaigns, <a href="https://www.gofundme.com/heropress-in-pune/donate">donors can choose</a> the amount they want to give. Among the donors listed is Matt Mullenweg, who contributed $250. If you enjoy the time, work, and effort put into HeroPress, consider donating a few dollars.</p>\n<p><strong>Within 24 hours since this post was published, DeRosia surpassed his funding goal.</strong></p>\n<a href="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/WordCampPuneGoalMet.png"><img class="size-full wp-image-46569" src="http://i1.wp.com/wptavern.com/wp-content/uploads/2015/07/WordCampPuneGoalMet.png?resize=976%2C649" alt="WordCamp Pune Goal Met" /></a>WordCamp Pune Goal Met\n<p>I asked DeRosia how it feels to meet is funding goal, &#8220;I&#8217;m super excited about this. Not just the fact that <em>other people</em> paid for a trip but that the HeroPress community feels this kind of thing is valuable enough to put money out for it. That means a lot.&#8221;</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Jul 2015 23:11:42 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:48;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:58:"WPTavern: Embed Your Meerkat Stream on Your WordPress Site";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46325";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:68:"http://wptavern.com/embed-your-meerkat-stream-on-your-wordpress-site";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4187:"<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/meerkat.png"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/meerkat.png?resize=655%2C300" alt="meerkat" class="aligncenter size-full wp-image-46518" /></a></p>\n<p>Just one day after <a href="https://meerkatapp.co/" target="_blank">Meerkat</a>, the popular video streaming service, <a href="http://techcrunch.com/2015/06/26/meerkat-outs-an-embeddable-player-hooks-discovery-channels-shark-week/#.qqszef:XITC" target="_blank">launched its embedded player</a>, a WordPress plugin was in the works to make it easy for publishers to take advantage of it. <a href="http://www.artiss.co.uk" target="_blank">David Artiss</a>, an English developer and author of several popular embedding <a href="https://profiles.wordpress.org/dartiss/#content-plugins" target="_blank">plugins</a>, is the first to bring Meerkat embedding to WordPress.</p>\n<p>The <a href="https://wordpress.org/plugins/meerkat/" target="_blank">Meerkat plugin</a> lets users embed their streams in WordPress content using a simple shortcode. The embedded player automatically does the following, according to Meerkat&#8217;s documentation:</p>\n<blockquote><p>It will show your live stream if you’re live. If you’re not live, if will show your next upcoming stream. If you have no upcoming streams, it will display stats from your last stream. If you have not streamed yet, it will show your profile.</p></blockquote>\n<p>All you need is the Meerkat username to use the shortcode in its simplest form:</p>\n<p><code>[meerkat username="meerkatapi"]</code></p>\n<p>It also includes optional parameters for customizing the username, player type, participation, cover image, muted defaults, and debug settings. These parameters essentially let you customize everything available in the <a href="http://widgets.meerkatapp.co/embed" target="_blank">Meerkat embed code generator</a>.</p>\n<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/meerkat-customize-embedded-player.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2015/07/meerkat-customize-embedded-player.jpg?resize=746%2C515" alt="meerkat-customize-embedded-player" class="aligncenter size-full wp-image-46532" /></a></p>\n<p>The shortcode can be embedded in posts or pages. Artiss plans to add a widget option soon, as the default player size seems to lend itself to display in a sidebar. I tested the plugin with WordPress 4.3 beta 2 and found that it works as advertised.</p>\n<p><a href="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/meerkat-wordpress-plugin-example.jpg"><img src="http://i2.wp.com/wptavern.com/wp-content/uploads/2015/07/meerkat-wordpress-plugin-example.jpg?resize=778%2C635" alt="meerkat-wordpress-plugin-example" class="aligncenter size-full wp-image-46533" /></a></p>\n<p>At TechCrunch Disrupt in May 2015, Meerkat founder Ben Rubin reported that the service was <a href="http://www.businessinsider.com/meerkat-has-nearly-2-million-users-2015-5" target="_blank">approaching nearly two million users</a>. Chances are that plenty of those users also have WordPress sites where they can gain more exposure for their streams.</p>\n<p>Artiss wanted to make it easy for anyone to embed a stream. He isn&#8217;t a Meerkat user himself but found that its API was easy to work with for embedding content.</p>\n<p>&#8220;I didn&#8217;t write it for myself but I thought putting the newly released embed function in a simple-to-use plugin for WordPress users would be useful,&#8221; he said. &#8220;I just happened to be working on <a href="https://wordpress.org/plugins/zingtree-embed/" target="_blank">Zingtree Embed plugin</a> at the same time, so it was quite simple to clone that and modify it for a different embed type.&#8221;</p>\n<p>If you want your fans and followers to be able to find your Meerkat stream on the web, download the <a href="https://wordpress.org/plugins/meerkat/" target="_blank">Meerkat</a> embed plugin from the WordPress plugin directory. This will allow folks to join you live from your website, without having to use the app on their phones. The widget embed option should land in the next release.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Jul 2015 19:47:17 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:49;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:95:"WPTavern: Envato Targeted by DDoS Attack, WordPress Theme Authors Report Major Decline in Sales";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:28:"http://wptavern.com/?p=46485";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:104:"http://wptavern.com/envato-targeted-by-ddos-attack-wordpress-theme-authors-report-major-decline-in-sales";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6430:"<p><a href="http://i0.wp.com/wptavern.com/wp-content/uploads/2014/09/envato.jpg"><img src="http://i0.wp.com/wptavern.com/wp-content/uploads/2014/09/envato.jpg?resize=697%2C314" alt="envato" class="aligncenter size-full wp-image-29973" /></a></p>\n<p>If you&#8217;ve attempted to access Themeforest or any other site on the <a href="http://www.envato.com/" target="_blank">Envato</a> network lately, you may have encountered some down time. The company <a href="http://inside.envato.com/denial-of-service-attacks-on-envato/" target="_blank">updated</a> customers and community members today, attributing the technical difficulties to a DDoS attack:</p>\n<blockquote><p>Since July 1, Envato has been the target of a sustained DDoS (distributed denial of service) attack. The attacker, whose motive and identity are unknown, has repeatedly flooded our servers with high levels of traffic, causing our services to be unavailable at various times.</p></blockquote>\n<p>The most recent outage happened over the weekend when Envato Market was down for three hours on Friday and one hour on Sunday. This is a significant chunk of time for a market that <a href="http://www.envato.com/2014" target="_blank">paid out $224 million dollars to its members in 2014</a>.</p>\n<p>The downtime has also impacted WordPress theme authors, who continue to dominate the Envato&#8217;s marketplace. According to Ben Chan, the company&#8217;s director of growth and revenue, 30 of the 31 sellers who make up the <a href="http://elite.envato.com/wall-of-fame/" target="_blank">Power Elite wall of fame</a> (selling $1 million+ worth of items) are WordPress product authors.</p>\n<p>The power of the WordPress economy on Envato is undeniable, but sales have taken a sharp decline in the past couple of months, even before the DDoS attack. According to PremiumWP, which cites reports from elite theme author Chris Robinson of Contempo and many others, <a href="http://www.premiumwp.com/themeforest-authors-report-50-70-drop-in-theme-sales/" target="_blank">sales have suddenly declined 50-70%</a>.</p>\n<p>&#8220;Sales have declined over 70% starting from May with each passing day getting worse,&#8221; Robinson said in the <a href="http://themeforest.net/forums/thread/envato-are-youre-not-telling-us-something/185158" target="_blank">members&#8217; forum</a>. &#8220;I’ve also spoken with other elite authors explaining the same thing. One example going from $1500/day to $700 &#8211; sure that’s still a great deal of money BUT what the hell is happening?</p>\n<p>&#8220;This isn’t just one or maybe twenty authors, it is marketplace wide affecting everyone. A marketplace wide decline in sales of this magnitude doesn’t just happen due to vacations, or other buyer factors. Going through the years of sales data (since 2008) this has never happened, I’ve personally gone from $2-3000/week to less than $700/week…that’s insane!&#8221;</p>\n<p>With new authors and products entering the market every day, the market share for established authors is slowly diminishing, but members are not convinced that this is the sole cause of the sharp drop in sales.</p>\n<p>FinalDestiny of TeoThemes, another author whose sales are declining, blames the <a href="http://wptavern.com/envato-continues-to-rake-in-the-cash-from-wordpress-themes-packaged-as-complete-website-solutions" target="_blank">one-size-fits-all theme products</a> for gobbling up a greater slice of the market share.</p>\n<p>&#8220;Everybody is tired of these huge, monster multipurpose themes having the same price as normal themes, and that’s pretty much killing the marketplaces. But Envato couldn’t care less, as long as they get their share,&#8221; he <a href="http://themeforest.net/forums/thread/envato-are-youre-not-telling-us-something/185158?page=1&message_id=1303716#1303716" target="_blank">said</a>.</p>\n<p>In another <a href="http://themeforest.net/forums/thread/whats-wrong-with-sales-on-tf-/181436" target="_blank">thread</a>, which ended up getting locked, there are 27 pages of comments from users speculating about why their sales have been dropping. Members cite seasonal buying fluctuations, piracy, Themeforest&#8217;s recent drop in Google search rankings, VAT and hidden price additions on checkout, and unfair pricing advantages for monster themes that claim to do everything, among other possible causes.</p>\n<p>In one thread, titled &#8220;<a href="http://themeforest.net/forums/thread/more-than-50-sales-drop-for-most-of-the-authors-does-tf-care-for-authors/182262" target="_blank">More than 50% sales drop for most of the authors. Does TF care for Authors?</a>&#8220;, an Envato community officer offered the following comment:</p>\n<blockquote><p>We don’t really give sales updates over the forums other than to say your sales can go up and down for a multitude of reasons. Try not to assume the sky is falling every time the USA has a long weekend :) We have fast and slow periods throughout the year same as any business, and your portfolio will no doubt have peaks and valleys as well.</p></blockquote>\n<p>This kind of generic reply has left theme authors scratching their heads, despite multiple threads in the forums popping up with concerns from those who are alarmed by the sudden drop. Many WordPress theme authors depend on Themeforest as their primary source of income. In one <a href="http://themeforest.net/forums/thread/more-than-50-sales-drop-for-most-of-the-authors-does-tf-care-for-authors/182262?page=3&message_id=1291143#1291143" target="_blank">reply</a>, the Aligator Studio seller sums up their concerns and frustration with the inability to convince Envato of the unusual circumstances that are affecting large numbers of sellers:</p>\n<blockquote><p>We are not talking about valleys and peaks, we’re talking about a general traffic and sales fall, from New Year until now, especially after April. We’re not talking about regular ups and downs (sometimes steeper, sometimes not), due to longer weekends, summer holidays, and general and the usual stuff happening here in the last couple of years.</p>\n<p>It’s not a sky falling – it’s inability to pay our bills, we’re not fanatics that foresee the end of the world.</p></blockquote>\n<p>Envato has yet to provide an official statement about the marketplace-wide decline in sales, apart from recognizing the network&#8217;s unavailability due to the recent DDoS attack.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Jul 2015 16:42:22 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:10:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Thu, 30 Jul 2015 17:43:39 GMT";s:12:"content-type";s:8:"text/xml";s:14:"content-length";s:6:"294101";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:29:"Thu, 30 Jul 2015 17:15:15 GMT";s:15:"x-frame-options";s:10:"SAMEORIGIN";s:4:"x-nc";s:11:"HIT lax 250";s:13:"accept-ranges";s:5:"bytes";}s:5:"build";s:14:"20150730173713";}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(118, '_transient_timeout_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1438321421', 'no'),
(119, '_transient_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1438278221', 'no'),
(120, '_transient_timeout_feed_b9388c83948825c1edaef0d856b7b109', '1438321422', 'no'),
(121, '_transient_feed_b9388c83948825c1edaef0d856b7b109', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n	\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:117:"\n		\n		\n		\n		\n		\n		\n				\n\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:34:"WordPress Plugins » View: Popular";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:45:"https://wordpress.org/plugins/browse/popular/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:34:"WordPress Plugins » View: Popular";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 30 Jul 2015 17:28:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:25:"http://bbpress.org/?v=1.1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:30:{i:0;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"WP Super Cache";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"https://wordpress.org/plugins/wp-super-cache/#post-2572";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 05 Nov 2007 11:40:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"2572@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:73:"A very fast caching engine for WordPress that produces static html files.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Donncha O Caoimh";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"Google Analytics by Yoast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:71:"https://wordpress.org/plugins/google-analytics-for-wordpress/#post-2316";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 14 Sep 2007 12:15:27 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"2316@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:124:"Track your WordPress site easily with the latest tracking codes and lots added data for search result pages and error pages.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Joost de Valk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:19:"All in One SEO Pack";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"https://wordpress.org/plugins/all-in-one-seo-pack/#post-753";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 30 Mar 2007 20:08:18 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"753@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:126:"All in One SEO Pack is a WordPress SEO plugin to automatically optimize your WordPress blog for Search Engines such as Google.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"uberdose";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"WooCommerce - excelling eCommerce";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:53:"https://wordpress.org/plugins/woocommerce/#post-29860";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 05 Sep 2011 08:13:36 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"29860@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:97:"WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"WooThemes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"TinyMCE Advanced";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:57:"https://wordpress.org/plugins/tinymce-advanced/#post-2082";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 27 Jun 2007 15:00:26 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"2082@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:71:"Enables the advanced features of TinyMCE, the WordPress WYSIWYG editor.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Andrew Ozz";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:18:"WordPress Importer";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"https://wordpress.org/plugins/wordpress-importer/#post-18101";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 20 May 2010 17:42:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"18101@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:101:"Import posts, pages, comments, custom fields, categories, tags and more from a WordPress export file.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Brian Colinger";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:21:"Really Simple CAPTCHA";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:62:"https://wordpress.org/plugins/really-simple-captcha/#post-9542";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 09 Mar 2009 02:17:35 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"9542@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:138:"Really Simple CAPTCHA is a CAPTCHA module intended to be called from other plugins. It is originally created for my Contact Form 7 plugin.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Takayuki Miyoshi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:24:"Jetpack by WordPress.com";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:49:"https://wordpress.org/plugins/jetpack/#post-23862";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 20 Jan 2011 02:21:38 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"23862@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:28:"Your WordPress, Streamlined.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"Tim Moore";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:19:"Google XML Sitemaps";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:64:"https://wordpress.org/plugins/google-sitemap-generator/#post-132";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 22:31:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"132@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:105:"This plugin will generate a special XML sitemap which will help search engines to better index your blog.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Arne Brachhold";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"Contact Form 7";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"https://wordpress.org/plugins/contact-form-7/#post-2141";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 02 Aug 2007 12:45:03 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"2141@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:54:"Just another contact form plugin. Simple but flexible.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Takayuki Miyoshi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:11:"WP-PageNavi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"https://wordpress.org/plugins/wp-pagenavi/#post-363";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 23:17:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"363@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:49:"Adds a more advanced paging navigation interface.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"Lester Chan";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"Yoast SEO";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:54:"https://wordpress.org/plugins/wordpress-seo/#post-8321";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 Jan 2009 20:34:44 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"8321@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:131:"Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using Yoast&#039;s WordPress SEO plugin.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Joost de Valk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:11:"Hello Dolly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"https://wordpress.org/plugins/hello-dolly/#post-5790";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 29 May 2008 22:11:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"5790@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt Mullenweg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:15:"NextGEN Gallery";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/plugins/nextgen-gallery/#post-1169";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 23 Apr 2007 20:08:06 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"1169@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:121:"The most popular WordPress gallery plugin and one of the most popular plugins of all time with over 12 million downloads.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"Alex Rabe";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:7:"Akismet";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:46:"https://wordpress.org/plugins/akismet/#post-15";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 22:11:30 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:32:"15@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:98:"Akismet checks your comments against the Akismet Web service to see if they look like spam or not.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt Mullenweg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:15;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:22:"Advanced Custom Fields";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:64:"https://wordpress.org/plugins/advanced-custom-fields/#post-25254";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 17 Mar 2011 04:07:30 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"25254@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:68:"Customise WordPress with powerful, professional and intuitive fields";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"elliotcondon";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:16;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:18:"Wordfence Security";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"https://wordpress.org/plugins/wordfence/#post-29832";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 04 Sep 2011 03:13:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"29832@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:138:"The Wordfence WordPress security plugin provides free enterprise-class WordPress security, protecting your website from hacks and malware.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"Wordfence";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:17;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:21:"Regenerate Thumbnails";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:62:"https://wordpress.org/plugins/regenerate-thumbnails/#post-6743";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 23 Aug 2008 14:38:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"6743@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:76:"Allows you to regenerate your thumbnails after changing the thumbnail sizes.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:25:"Alex Mills (Viper007Bond)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:18;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"W3 Total Cache";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/plugins/w3-total-cache/#post-12073";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2009 18:46:31 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"12073@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:132:"Easy Web Performance Optimization (WPO) using caching: browser, page, object, database, minify and content delivery network support.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Frederick Townes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:19;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"Disable Comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:58:"https://wordpress.org/plugins/disable-comments/#post-26907";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 27 May 2011 04:42:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"26907@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:134:"Allows administrators to globally disable comments on their site. Comments can be disabled according to post type. Multisite friendly.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Samir Shah";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:20;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"Duplicate Post";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"https://wordpress.org/plugins/duplicate-post/#post-2646";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 05 Dec 2007 17:40:03 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"2646@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:22:"Clone posts and pages.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"lopo";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:21;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:18:"WP Multibyte Patch";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"https://wordpress.org/plugins/wp-multibyte-patch/#post-28395";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 14 Jul 2011 12:22:53 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"28395@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:71:"Multibyte functionality enhancement for the WordPress Japanese package.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"plugin-master";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:22;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:46:"iThemes Security (formerly Better WP Security)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"https://wordpress.org/plugins/better-wp-security/#post-21738";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 22 Oct 2010 22:06:05 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"21738@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"Protect your WordPress site by hiding vital areas of your site, protecting access to important files, preventing brute-force login attempts, detecting";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Chris Wiegman";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:23;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"Black Studio TinyMCE Widget";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:69:"https://wordpress.org/plugins/black-studio-tinymce-widget/#post-31973";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 10 Nov 2011 15:06:14 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"31973@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:39:"The visual editor widget for Wordpress.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Marco Chiesi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:24;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:11:"Meta Slider";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"https://wordpress.org/plugins/ml-slider/#post-49521";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 14 Feb 2013 16:56:31 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"49521@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:145:"Easy to use WordPress slider plugin. Create SEO optimised responsive slideshows with Nivo Slider, Flex Slider, Coin Slider and Responsive Slides.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"Matcha Labs";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:25;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"Google Analytics";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:57:"https://wordpress.org/plugins/googleanalytics/#post-11199";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 09 Jun 2009 22:09:25 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"11199@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:38:"Enables google analytics on all pages.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Kevin Sylvestre";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:26;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:26:"Page Builder by SiteOrigin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"https://wordpress.org/plugins/siteorigin-panels/#post-51888";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 11 Apr 2013 10:36:42 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"51888@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:111:"Build responsive page layouts using the widgets you know and love using this simple drag and drop page builder.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"Greg Priday";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:27;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:12:"WP-DB-Backup";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"https://wordpress.org/plugins/wp-db-backup/#post-472";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 17 Mar 2007 04:41:26 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"472@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:44:"On-demand backup of your WordPress database.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"ringmaster";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:28;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"Google Analytics Dashboard for WP";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:75:"https://wordpress.org/plugins/google-analytics-dashboard-for-wp/#post-50539";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 10 Mar 2013 17:07:11 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"50539@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:127:"Displays Google Analytics reports in your WordPress Dashboard. Inserts the latest Google Analytics tracking code in your pages.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Alin Marcu";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:29;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:10:"Duplicator";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"https://wordpress.org/plugins/duplicator/#post-26607";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 16 May 2011 12:15:41 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"26607@http://wordpress.org/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:88:"Duplicate, clone, backup, move and transfer an entire site from one location to another.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Cory Lamle";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:46:"https://wordpress.org/plugins/rss/view/popular";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:9:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Thu, 30 Jul 2015 17:43:42 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:25:"strict-transport-security";s:11:"max-age=360";s:13:"last-modified";s:29:"Mon, 05 Nov 2007 11:40:04 GMT";s:15:"x-frame-options";s:10:"SAMEORIGIN";s:4:"x-nc";s:11:"HIT lax 250";}s:5:"build";s:14:"20150730173713";}', 'no'),
(122, '_transient_timeout_feed_mod_b9388c83948825c1edaef0d856b7b109', '1438321422', 'no'),
(123, '_transient_feed_mod_b9388c83948825c1edaef0d856b7b109', '1438278222', 'no'),
(124, '_transient_timeout_plugin_slugs', '1438364622', 'no'),
(125, '_transient_plugin_slugs', 'a:2:{i:0;s:19:"akismet/akismet.php";i:1;s:9:"hello.php";}', 'no'),
(126, '_transient_timeout_dash_4077549d03da2e451c8b5f002294ff51', '1438321423', 'no'),
(127, '_transient_dash_4077549d03da2e451c8b5f002294ff51', '<div class="rss-widget"><ul><li><a class=''rsswidget'' href=''https://wordpress.org/news/2015/07/wordpress-4-3-release-candidate/''>WordPress 4.3 Release Candidate</a> <span class="rss-date">July 29, 2015</span><div class="rssSummary">The release candidate for WordPress 4.3 is now available. We’ve made more than 100 changes since releasing Beta 4 a week ago. RC means we think we’re done, but with millions of users and thousands of plugins and themes, it’s possible we’ve missed something. We hope to ship WordPress 4.3 on Tuesday, August 18, but we [&hellip;]</div></li></ul></div><div class="rss-widget"><ul><li><a class=''rsswidget'' href=''http://wptavern.com/yuuta-a-free-visual-diary-theme-for-wordpress''>WPTavern: Yuuta: A Free Visual Diary Theme for WordPress</a></li><li><a class=''rsswidget'' href=''http://wptavern.com/awesome-geek-podcasts-a-curated-list-of-tech-podcasts''>WPTavern: Awesome Geek Podcasts: A Curated List of Tech Podcasts</a></li><li><a class=''rsswidget'' href=''http://wptavern.com/behind-the-scenes-of-wordpress-4-2-3-with-gary-pendergast''>WPTavern: Behind the Scenes of WordPress 4.2.3 With Gary Pendergast</a></li></ul></div><div class="rss-widget"><ul><li class=''dashboard-news-plugin''><span>Popular Plugin:</span> <a href=''https://wordpress.org/plugins/black-studio-tinymce-widget/'' class=''dashboard-news-plugin-link''>Black Studio TinyMCE Widget</a>&nbsp;<span>(<a href=''plugin-install.php?tab=plugin-information&amp;plugin=black-studio-tinymce-widget&amp;_wpnonce=571b9a896b&amp;TB_iframe=true&amp;width=600&amp;height=800'' class=''thickbox'' title=''Black Studio TinyMCE Widget''>Install</a>)</span></li></ul></div>', 'no'),
(132, '_transient_is_multi_author', '0', 'yes'),
(133, '_transient_twentyfifteen_categories', '1', 'yes'),
(145, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.2.4.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.2.4.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.2.4-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.2.4-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.2.4";s:7:"version";s:5:"4.2.4";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.1";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1439452190;s:15:"version_checked";s:5:"4.2.4";s:12:"translations";a:0:{}}', 'yes'),
(147, 'auto_core_update_notified', 'a:4:{s:4:"type";s:7:"success";s:5:"email";s:23:"tprokop@prothomsoft.com";s:7:"version";s:5:"4.2.4";s:9:"timestamp";i:1439263809;}', 'yes'),
(152, '_site_transient_timeout_theme_roots', '1439453992', 'yes'),
(153, '_site_transient_theme_roots', 'a:3:{s:13:"twentyfifteen";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:14:"twentythirteen";s:7:"/themes";}', 'yes'),
(156, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1439452200;s:8:"response";a:1:{s:19:"akismet/akismet.php";O:8:"stdClass":6:{s:2:"id";s:2:"15";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"3.1.3";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.3.1.3.zip";}}s:12:"translations";a:0:{}s:9:"no_update";a:1:{s:9:"hello.php";O:8:"stdClass":6:{s:2:"id";s:4:"3564";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";}}}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 1, '_edit_lock', '1438278331:1'),
(3, 4, '_wp_attached_file', '2015/07/fb.jpg'),
(4, 4, '_wp_attachment_metadata', 'a:4:{s:5:"width";i:2048;s:6:"height";i:1072;s:4:"file";s:14:"2015/07/fb.jpg";s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5, 1, '_edit_last', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2015-07-30 17:43:18', '2015-07-30 17:43:18', '<a href="http://grandeconsultation.fr/blog/wp-content/uploads/2015/07/fb.jpg"><img class="alignnone size-full wp-image-4" src="http://grandeconsultation.fr/blog/wp-content/uploads/2015/07/fb.jpg" alt="fb" width="2048" height="1072" /></a>Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2015-07-30 17:45:29', '2015-07-30 17:45:29', '', 0, 'http://grandeconsultation.fr/blog/?p=1', 0, 'post', '', 2),
(2, 1, '2015-07-30 17:43:18', '2015-07-30 17:43:18', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://grandeconsultation.fr/blog/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'open', 'open', '', 'sample-page', '', '', '2015-07-30 17:43:18', '2015-07-30 17:43:18', '', 0, 'http://grandeconsultation.fr/blog/?page_id=2', 0, 'page', '', 0),
(3, 1, '2015-07-30 17:43:35', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2015-07-30 17:43:35', '0000-00-00 00:00:00', '', 0, 'http://grandeconsultation.fr/blog/?p=3', 0, 'post', '', 0),
(4, 1, '2015-07-30 17:45:18', '2015-07-30 17:45:18', '', 'fb', '', 'inherit', 'open', 'open', '', 'fb', '', '', '2015-07-30 17:45:18', '2015-07-30 17:45:18', '', 1, 'http://grandeconsultation.fr/blog/wp-content/uploads/2015/07/fb.jpg', 0, 'attachment', 'image/jpeg', 0),
(5, 1, '2015-07-30 17:45:29', '2015-07-30 17:45:29', '<a href="http://grandeconsultation.fr/blog/wp-content/uploads/2015/07/fb.jpg"><img class="alignnone size-full wp-image-4" src="http://grandeconsultation.fr/blog/wp-content/uploads/2015/07/fb.jpg" alt="fb" width="2048" height="1072" /></a>Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'inherit', 'open', 'open', '', '1-revision-v1', '', '', '2015-07-30 17:45:29', '2015-07-30 17:45:29', '', 1, 'http://grandeconsultation.fr/blog/2015/07/30/1-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin@admin.com'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp360_locks,wp390_widgets,wp410_dfw'),
(13, 1, 'show_welcome_panel', '1'),
(15, 1, 'wp_dashboard_quick_press_last_post_id', '3'),
(16, 1, 'wp_user-settings', 'libraryContent=browse'),
(17, 1, 'wp_user-settings-time', '1438278326');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin@admin.com', '$P$B76q4ElO5OpkJ7m.M8LRy83TUd91bP.', 'adminadmin-com', 'tprokop@prothomsoft.com', '', '2015-07-30 17:43:16', '', 0, 'admin@admin.com');
