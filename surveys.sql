-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 06 Sty 2015, 19:53
-- Wersja serwera: 5.0.51
-- Wersja PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza danych: `surveys`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Advert`
--

CREATE TABLE IF NOT EXISTS `Advert` (
  `AdvertId` int(11) NOT NULL auto_increment,
  `ClubId` int(11) NOT NULL,
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `ShortDescription` text collate utf8_polish_ci NOT NULL,
  `LongDescription` text collate utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL default '0000-00-00',
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `ImgFileName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Ordering` int(11) NOT NULL,
  PRIMARY KEY  (`AdvertId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=53 ;

--
-- Zrzut danych tabeli `Advert`
--

INSERT INTO `Advert` (`AdvertId`, `ClubId`, `Name`, `SeoName`, `EventDate`, `ShortDescription`, `LongDescription`, `CreationDate`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `Ordering`) VALUES
(48, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-06', '2010-06-06', '3434d9296944c85e7d27a7eb6fa6282b.jpg', '', 2),
(49, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-06', '2010-06-06', '195651f1e231f233836e9543816de63c.jpg', '', 3),
(51, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-07', '2010-06-07', '77536abc7a5e095a839914d90ceac7c5.jpg', '', 4),
(52, 0, 'http://agstudio.com.pl/blog.html', 'httpagstudiocomplbloghtml', 'nie', '', '', '2010-06-07', '2010-06-07', 'e0eca21421c1ccfb413bf8c62342e352.jpg', '', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `AdvertPicture`
--

CREATE TABLE IF NOT EXISTS `AdvertPicture` (
  `AdvertPictureId` int(11) NOT NULL auto_increment,
  `AdvertId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) character set latin2 NOT NULL default '0',
  `ImgFileName` varchar(40) character set latin2 NOT NULL default '0',
  `ImgAlt` varchar(40) character set latin2 NOT NULL default '0',
  `ImgType` varchar(10) character set latin2 NOT NULL default '0',
  `BigImgDriveName` varchar(40) character set latin2 NOT NULL default '0',
  `BigImgFileName` varchar(40) character set latin2 NOT NULL default '0',
  `BigImgAlt` varchar(40) character set latin2 NOT NULL default '0',
  `BigImgType` varchar(10) character set latin2 NOT NULL default '0',
  PRIMARY KEY  (`AdvertPictureId`),
  KEY `ClubId` (`AdvertId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=15 ;

--
-- Zrzut danych tabeli `AdvertPicture`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Alfa`
--

CREATE TABLE IF NOT EXISTS `Alfa` (
  `AlfaId` int(11) NOT NULL auto_increment,
  `BetaId` int(11) NOT NULL default '0',
  `ClubId` int(11) NOT NULL,
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `NameTransEN` varchar(255) collate utf8_polish_ci NOT NULL,
  `NameTransDE` varchar(255) collate utf8_polish_ci NOT NULL,
  `NameTransRU` varchar(255) collate utf8_polish_ci NOT NULL,
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `Description` varchar(255) collate utf8_polish_ci NOT NULL,
  `ShortDescription` text collate utf8_polish_ci NOT NULL,
  `VeryShortDescription` varchar(255) collate utf8_polish_ci NOT NULL,
  `ShortDescriptionTransEN` text collate utf8_polish_ci NOT NULL,
  `ShortDescriptionTransDE` text collate utf8_polish_ci NOT NULL,
  `ShortDescriptionTransRU` text collate utf8_polish_ci NOT NULL,
  `LongDescription` text collate utf8_polish_ci NOT NULL,
  `LongDescriptionTransEN` text collate utf8_polish_ci NOT NULL,
  `LongDescriptionTransDE` text collate utf8_polish_ci NOT NULL,
  `LongDescriptionTransRU` text collate utf8_polish_ci NOT NULL,
  `UpdateDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `AlfaOrder` int(11) NOT NULL default '0',
  `Status` int(11) NOT NULL default '0',
  `StatusEN` int(11) NOT NULL,
  `StatusDE` int(11) NOT NULL,
  `StatusRU` int(11) NOT NULL,
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `ImgDriveNameHeader` varchar(40) collate utf8_polish_ci NOT NULL,
  `EventDate` varchar(40) collate utf8_polish_ci NOT NULL,
  `EventCalendar` date NOT NULL,
  `YouTube` varchar(255) collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`AlfaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `Alfa`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `AlfaPicture`
--

CREATE TABLE IF NOT EXISTS `AlfaPicture` (
  `AlfaPictureId` int(11) NOT NULL auto_increment,
  `AlfaId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `ImgAltName` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY  (`AlfaPictureId`),
  KEY `AlfaId` (`AlfaId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `AlfaPicture`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Beta`
--

CREATE TABLE IF NOT EXISTS `Beta` (
  `BetaId` int(11) NOT NULL auto_increment,
  `ClubId` int(11) NOT NULL,
  `GamaId` int(11) NOT NULL,
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `ShortDescription` text collate utf8_polish_ci NOT NULL,
  `LongDescription` text collate utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) collate utf8_polish_ci NOT NULL,
  `Description` varchar(255) collate utf8_polish_ci NOT NULL default '0000-00-00',
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Status` int(11) NOT NULL default '0',
  `BetaOrder` int(11) NOT NULL,
  PRIMARY KEY  (`BetaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=22 ;

--
-- Zrzut danych tabeli `Beta`
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
-- Struktura tabeli dla  `BetaPicture`
--

CREATE TABLE IF NOT EXISTS `BetaPicture` (
  `BetaPictureId` int(11) NOT NULL auto_increment,
  `BetaId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) character set latin2 NOT NULL default '0',
  `ImgAltName` varchar(255) collate utf8_polish_ci NOT NULL,
  `IW` int(11) NOT NULL default '0',
  `IH` int(11) NOT NULL default '0',
  PRIMARY KEY  (`BetaPictureId`),
  KEY `ClubId` (`BetaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=37 ;

--
-- Zrzut danych tabeli `BetaPicture`
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
-- Struktura tabeli dla  `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `BookId` int(11) NOT NULL auto_increment,
  `SigmaId` int(11) NOT NULL,
  `Email` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `CreateDate` date NOT NULL,
  `FirstName` varchar(50) character set utf8 collate utf8_polish_ci NOT NULL,
  `LastName` varchar(50) character set utf8 collate utf8_polish_ci NOT NULL,
  `CompanyName` text character set utf8 collate utf8_polish_ci NOT NULL,
  `City` text character set utf8 collate utf8_polish_ci NOT NULL,
  `Code` varchar(50) character set utf8 collate utf8_polish_ci NOT NULL,
  `Street` varchar(50) character set utf8 collate utf8_polish_ci NOT NULL,
  `Number` varchar(50) character set utf8 collate utf8_polish_ci NOT NULL,
  `Phone` varchar(50) character set utf8 collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`BookId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `Book`
--

INSERT INTO `Book` (`BookId`, `SigmaId`, `Email`, `CreateDate`, `FirstName`, `LastName`, `CompanyName`, `City`, `Code`, `Street`, `Number`, `Phone`) VALUES
(4, 29, 'tprokop@prothomsoft.com', '2012-03-11', 'Tomasz', 'Prokop', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '1', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Club`
--

CREATE TABLE IF NOT EXISTS `Club` (
  `ClubId` int(11) NOT NULL auto_increment,
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) collate utf8_polish_ci NOT NULL,
  `Description` varchar(255) collate utf8_polish_ci NOT NULL,
  `Address` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `ShortDescription` text collate utf8_polish_ci NOT NULL,
  `LongDescription` text collate utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `ImgFileName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Manager` varchar(100) collate utf8_polish_ci NOT NULL default '',
  `Phone` varchar(100) collate utf8_polish_ci NOT NULL,
  `Email` varchar(100) collate utf8_polish_ci NOT NULL,
  `Route` varchar(255) collate utf8_polish_ci NOT NULL,
  `Lat` varchar(40) collate utf8_polish_ci NOT NULL,
  `Lng` varchar(40) collate utf8_polish_ci NOT NULL,
  `IsClub` int(11) NOT NULL,
  `ClubOrder` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY  (`ClubId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `Club`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ClubPicture`
--

CREATE TABLE IF NOT EXISTS `ClubPicture` (
  `ClubPictureId` int(11) NOT NULL auto_increment,
  `ClubId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) NOT NULL default '0',
  `ImgAltName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY  (`ClubPictureId`),
  KEY `ProductId` (`ClubId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `ClubPicture`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `CmsCategory`
--

CREATE TABLE IF NOT EXISTS `CmsCategory` (
  `CmsCategoryId` int(11) NOT NULL auto_increment,
  `FatherId` int(11) NOT NULL default '0',
  `Name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '',
  `TransEN` varchar(255) NOT NULL,
  `TransDE` varchar(255) NOT NULL,
  `TransRU` varchar(255) NOT NULL,
  `ListOrder` int(11) NOT NULL default '0',
  `Url` varchar(255) NOT NULL,
  `IsModule` int(11) NOT NULL default '0',
  `NumberOfItems` int(11) NOT NULL default '0',
  PRIMARY KEY  (`CmsCategoryId`),
  KEY `CmsCategoryId` (`CmsCategoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `CmsCategory`
--

INSERT INTO `CmsCategory` (`CmsCategoryId`, `FatherId`, `Name`, `SeoName`, `TransEN`, `TransDE`, `TransRU`, `ListOrder`, `Url`, `IsModule`, `NumberOfItems`) VALUES
(10, 6, 'La communaute page 2', 'la-communaute-page-2', '', '', '', 2, 'http://127.0.0.1/surveys/surveys_page/la-communaute-page-2.html', 0, 0),
(9, 6, 'La communaute page 1', 'la-communaute-page-1', '', '', '', 1, 'http://127.0.0.1/surveys/surveys_page/la-communaute-page-1.html', 0, 0),
(6, 0, 'LA COMMUNAUTE CCI DE FRANCE', 'la-communaute-cci-de-france', '', '', '', 1, '#', 1, 0),
(7, 0, 'LES ETUDES', 'les-etudes', '', '', '', 2, '#', 1, 0),
(8, 0, 'REJOINDRE LA COMMUNAUTE', 'rejoindre-la-communaute', '', '', '', 3, '#', 1, 0),
(11, 7, 'Les etudes page 1', 'les-etudes-page-1', '', '', '', 1, 'http://127.0.0.1/surveys/surveys_page/les-etudes-page-1.html', 0, 0),
(12, 7, 'Les etudes page 2', 'les-etudes-page-2', '', '', '', 2, 'http://127.0.0.1/surveys/surveys_page/les-etudes-page-2.html', 0, 0),
(16, 8, 'Rejoindre la commuaute page 2', 'rejoindre-la-commuaute-page-2', '', '', '', 2, 'http://127.0.0.1/surveys/surveys_page/rejoindre-la-commuaute-page-2.html', 0, 0),
(15, 8, 'Rejoindre la commuaute page 1', 'rejoindre-la-commuaute-page-1', '', '', '', 1, 'http://127.0.0.1/surveys/surveys_page/rejoindre-la-commuaute-page-1.html', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `CmsCategoryPlain`
--

CREATE TABLE IF NOT EXISTS `CmsCategoryPlain` (
  `CmsCategoryPlainId` int(11) NOT NULL auto_increment,
  `CategoryId` int(11) default NULL,
  `CategoryName` varchar(255) character set utf8 collate utf8_polish_ci default NULL,
  `CategorySeoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '',
  PRIMARY KEY  (`CmsCategoryPlainId`),
  KEY `CmsCategoryPlainId` (`CmsCategoryPlainId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=459 ;

--
-- Zrzut danych tabeli `CmsCategoryPlain`
--

INSERT INTO `CmsCategoryPlain` (`CmsCategoryPlainId`, `CategoryId`, `CategoryName`, `CategorySeoName`) VALUES
(450, 6, 'LA COMMUNAUTE CCI DE FRANCE', 'la-communaute-cci-de-france'),
(451, 9, '&nbsp; &nbsp;La communaute page 1', 'la-communaute-page-1'),
(452, 10, '&nbsp; &nbsp;La communaute page 2', 'la-communaute-page-2'),
(453, 7, 'LES ETUDES', 'les-etudes'),
(454, 11, '&nbsp; &nbsp;Les etudes page 1', 'les-etudes-page-1'),
(455, 12, '&nbsp; &nbsp;Les etudes page 2', 'les-etudes-page-2'),
(456, 8, 'REJOINDRE LA COMMUNAUTE', 'rejoindre-la-communaute'),
(457, 15, '&nbsp; &nbsp;Rejoindre la commuaute page 1', 'rejoindre-la-commuaute-page-1'),
(458, 16, '&nbsp; &nbsp;Rejoindre la commuaute page 2', 'rejoindre-la-commuaute-page-2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `CmsContent`
--

CREATE TABLE IF NOT EXISTS `CmsContent` (
  `CmsContentId` int(11) NOT NULL auto_increment,
  `CmsCategoryId` int(11) NOT NULL default '0',
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `NameTransEN` varchar(255) collate utf8_polish_ci NOT NULL,
  `NameTransDE` varchar(255) collate utf8_polish_ci NOT NULL,
  `NameTransRU` varchar(255) collate utf8_polish_ci NOT NULL,
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL,
  `Keyword` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `Description` varchar(255) collate utf8_polish_ci NOT NULL,
  `ShortDescription` text collate utf8_polish_ci NOT NULL,
  `ShortDescriptionTransEN` text collate utf8_polish_ci NOT NULL,
  `ShortDescriptionTransDE` text collate utf8_polish_ci NOT NULL,
  `ShortDescriptionTransRU` text collate utf8_polish_ci NOT NULL,
  `LongDescription` text collate utf8_polish_ci NOT NULL,
  `LongDescriptionTransEN` text collate utf8_polish_ci NOT NULL,
  `LongDescriptionTransDE` text collate utf8_polish_ci NOT NULL,
  `LongDescriptionTransRU` text collate utf8_polish_ci NOT NULL,
  `UpdateDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `CmsContentOrder` int(11) NOT NULL default '0',
  `Status` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Om1` text collate utf8_polish_ci NOT NULL,
  `Om2` text collate utf8_polish_ci NOT NULL,
  `Om3` text collate utf8_polish_ci NOT NULL,
  `Om4` text collate utf8_polish_ci NOT NULL,
  `Om5` text collate utf8_polish_ci NOT NULL,
  `Om6` text collate utf8_polish_ci NOT NULL,
  `Om7` text collate utf8_polish_ci NOT NULL,
  `Om8` text collate utf8_polish_ci NOT NULL,
  `Om9` text collate utf8_polish_ci NOT NULL,
  `Om10` text collate utf8_polish_ci NOT NULL,
  `Om11` text collate utf8_polish_ci NOT NULL,
  `Om12` text collate utf8_polish_ci NOT NULL,
  `Om13` text collate utf8_polish_ci NOT NULL,
  `Om14` text collate utf8_polish_ci NOT NULL,
  `Om15` text collate utf8_polish_ci NOT NULL,
  `Om16` text collate utf8_polish_ci NOT NULL,
  `Om17` text collate utf8_polish_ci NOT NULL,
  `Om18` text collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`CmsContentId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `CmsContent`
--

INSERT INTO `CmsContent` (`CmsContentId`, `CmsCategoryId`, `Name`, `NameTransEN`, `NameTransDE`, `NameTransRU`, `SeoName`, `Keyword`, `Description`, `ShortDescription`, `ShortDescriptionTransEN`, `ShortDescriptionTransDE`, `ShortDescriptionTransRU`, `LongDescription`, `LongDescriptionTransEN`, `LongDescriptionTransDE`, `LongDescriptionTransRU`, `UpdateDate`, `CmsContentOrder`, `Status`, `ImgDriveName`, `Om1`, `Om2`, `Om3`, `Om4`, `Om5`, `Om6`, `Om7`, `Om8`, `Om9`, `Om10`, `Om11`, `Om12`, `Om13`, `Om14`, `Om15`, `Om16`, `Om17`, `Om18`) VALUES
(4, 9, 'La communaute page 1', '', '', '', 'la-communaute-page-1', 'LA COMMUNAUTE PAGE 1', 'LA COMMUNAUTE PAGE 1', '', '', '', '', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&lt;/p&gt;', '', '', '', '2015-01-01 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 10, 'La communaute page 2', '', '', '', 'la-communaute-page-2', 'LA COMMUNAUTE PAGE 1', 'LA COMMUNAUTE PAGE 1', '', '', '', '', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&lt;/p&gt;', '', '', '', '2015-01-01 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 11, 'Les etudes page 1', '', '', '', 'les-etudes-page-1', 'LES ETUDES PAGE 1', 'LES ETUDES PAGE 1', '', '', '', '', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&lt;/p&gt;', '', '', '', '2015-01-01 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 12, 'Les etudes page 2', '', '', '', 'les-etudes-page-2', 'LES ETUDES PAGE 2', 'LES ETUDES PAGE 2', '', '', '', '', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&lt;/p&gt;', '', '', '', '2015-01-01 00:00:00', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 15, 'Rejoindre la commuaute page 1', '', '', '', 'rejoindre-la-commuaute-page-1', 'Rejoindre la commuaute page 1', 'Rejoindre la commuaute page 1', '', '', '', '', '', '', '', '', '2015-01-01 00:00:00', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 16, 'Rejoindre la commuaute page 2', '', '', '', 'rejoindre-la-commuaute-page-2', 'Rejoindre la commuaute page 2', 'Rejoindre la commuaute page 2', '', '', '', '', '', '', '', '', '2015-01-01 00:00:00', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `CmsContentPicture`
--

CREATE TABLE IF NOT EXISTS `CmsContentPicture` (
  `CmsContentPictureId` int(11) NOT NULL auto_increment,
  `CmsContentId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) NOT NULL default '0',
  `ImgAltName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `ImgOrder` int(11) NOT NULL,
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY  (`CmsContentPictureId`),
  KEY `ProductId` (`CmsContentId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `CmsContentPicture`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Country`
--

CREATE TABLE IF NOT EXISTS `Country` (
  `CountryId` int(11) NOT NULL auto_increment,
  `Name` varchar(40) NOT NULL default '0',
  PRIMARY KEY  (`CountryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Zrzut danych tabeli `Country`
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
-- Struktura tabeli dla  `Delta`
--

CREATE TABLE IF NOT EXISTS `Delta` (
  `DeltaId` int(11) NOT NULL auto_increment,
  `ClubId` int(11) NOT NULL,
  `BetaId` int(11) NOT NULL,
  `Name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) NOT NULL,
  `Keyword` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EventDate` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `EventCalendar` date NOT NULL,
  `ShortDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `LongDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) NOT NULL default '0',
  `ImgFileName` varchar(40) NOT NULL default '0',
  `PictureDescSmall` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `DeltaOrder` int(11) NOT NULL,
  PRIMARY KEY  (`DeltaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `Delta`
--

INSERT INTO `Delta` (`DeltaId`, `ClubId`, `BetaId`, `Name`, `SeoName`, `Keyword`, `Description`, `EventDate`, `EventCalendar`, `ShortDescription`, `LongDescription`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `PictureDescSmall`, `Status`, `DeltaOrder`) VALUES
(2, 0, 0, 'Free shipping&lt;br&gt;on 50.00 NOK', 'free-shippingltbron-5000-nok', 'http://www.google.pl', '', '', '0000-00-00', '&lt;p&gt;Header 1&lt;/p&gt;', '', '2014-12-07', '89aa52e98f9b0e71c9a24db901a06abf.jpg', '0', '', 0, 1),
(3, 0, 0, '25% off&lt;br&gt;for pink swim', '25-offltbrfor-pink-swim', 'http://www.google.pl', '', '', '0000-00-00', '&lt;p&gt;Header 2&lt;/p&gt;', '', '2014-12-07', 'be052f56d794b47020920139e906cf8d.jpg', '0', '', 0, 2),
(4, 0, 0, 'Up to 50% off&lt;br&gt;on selected items', 'up-to-50-offltbron-selected-items', 'http://mg.prothomsoft.com', '', '', '0000-00-00', '&lt;p&gt;Header 3&lt;/p&gt;', '', '2015-01-05', '62c6b1b317f120377f4e6c9f1b3e8b15.jpg', '0', '', 0, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `DeltaPicture`
--

CREATE TABLE IF NOT EXISTS `DeltaPicture` (
  `DeltaPictureId` int(11) NOT NULL auto_increment,
  `DeltaId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `ImgAltName` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY  (`DeltaPictureId`),
  KEY `DeltaId` (`DeltaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `DeltaPicture`
--

INSERT INTO `DeltaPicture` (`DeltaPictureId`, `DeltaId`, `ImgDriveName`, `ImgAltName`, `IW`, `IH`) VALUES
(2, 2, '89aa52e98f9b0e71c9a24db901a06abf.jpg', '', 320, 92),
(3, 3, 'be052f56d794b47020920139e906cf8d.jpg', '', 320, 92),
(4, 4, '62c6b1b317f120377f4e6c9f1b3e8b15.jpg', '', 320, 92);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Event`
--

CREATE TABLE IF NOT EXISTS `Event` (
  `EventId` int(11) NOT NULL auto_increment,
  `ClubId` int(11) NOT NULL,
  `PhotoId` int(11) NOT NULL,
  `Name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) NOT NULL,
  `EventDate` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `EventCalendar` date NOT NULL,
  `ShortDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `LongDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL default '0000-00-00',
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) NOT NULL default '0',
  `ImgFileName` varchar(40) NOT NULL default '0',
  `PictureDescSmall` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Archived` int(11) NOT NULL,
  `Ordering` int(11) NOT NULL,
  PRIMARY KEY  (`EventId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Zrzut danych tabeli `Event`
--

INSERT INTO `Event` (`EventId`, `ClubId`, `PhotoId`, `Name`, `SeoName`, `EventDate`, `EventCalendar`, `ShortDescription`, `LongDescription`, `CreationDate`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `PictureDescSmall`, `Archived`, `Ordering`) VALUES
(170, 0, 0, 'Anna i Tomasz', 'anna-i-tomasz', '1', '2009-07-25', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-16', '2010-06-13', '', '', '', 0, 2),
(177, 0, 0, 'Magdalena i Micha??', 'magdalena-i-michal', '1', '2009-08-29', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-25', '2010-06-13', '', '', '', 0, 3),
(178, 0, 0, 'Sylwia i Adam ', 'sylwia-i-adam', '1', '2009-05-15', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-30', '2010-06-13', '', '', '', 0, 4),
(179, 0, 0, 'Lenka', 'lenka', '1', '2010-04-25', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-30', '2010-06-13', '', '', '', 0, 5),
(180, 0, 0, 'Weronika i Damian', 'weronika-i-damian', '1', '2010-02-13', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', 'PiÄ?tnastego grudnia roku dwa tysiÄ?ce ??smego, w swoje dwudzieste sz??ste urodziny, Pawe?? zosta?? obudzony o wp???? do piÄ?tej nad ranem. Jego ??ona Magda nie pozostawi??a mu wiele czasu na domys??y i fantazje - o sz??stej mieli zabukowany autobus do Warszawy. Cztery godziny jazdy i ju?? mogÄ? podziwiaÄ? Pa??ac Kultury i inne uroki Stolicy. Oko??o trzynastej wpadajÄ? do \\"w biegu cafe\\" na Placu Zbawiciela, by choÄ? na chwilÄ? siÄ? ogrzaÄ?. W drzwiach zderzajÄ? siÄ? z zaszalikowanÄ? szatynkÄ? z wielkim plecakiem. Pawe?? szarpie MagdÄ? za rÄ?kaw.', '2010-05-31', '2010-06-13', '', '', '', 0, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `EventPicture`
--

CREATE TABLE IF NOT EXISTS `EventPicture` (
  `EventPictureId` int(11) NOT NULL auto_increment,
  `EventId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) NOT NULL default '0',
  `ImgFileName` varchar(40) NOT NULL default '0',
  `ImgAlt` varchar(40) NOT NULL default '0',
  `ImgType` varchar(10) NOT NULL default '0',
  `BigImgDriveName` varchar(40) NOT NULL default '0',
  `BigImgFileName` varchar(40) NOT NULL default '0',
  `BigImgAlt` varchar(40) NOT NULL default '0',
  `BigImgType` varchar(10) NOT NULL default '0',
  PRIMARY KEY  (`EventPictureId`),
  KEY `ClubId` (`EventId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `EventPicture`
--

INSERT INTO `EventPicture` (`EventPictureId`, `EventId`, `ImgDriveName`, `ImgFileName`, `ImgAlt`, `ImgType`, `BigImgDriveName`, `BigImgFileName`, `BigImgAlt`, `BigImgType`) VALUES
(15, 1, '1ce5d6524d655e63ea5d7666dfb8ecd2.jpg', '', '', '', '', '', '', ''),
(16, 2, '6d361baef55e073a3fd806065a81ff44.jpg', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Gama`
--

CREATE TABLE IF NOT EXISTS `Gama` (
  `GamaId` int(11) NOT NULL auto_increment,
  `ClubId` int(11) NOT NULL,
  `GminaId` int(11) NOT NULL,
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL,
  `Keyword` varchar(40) collate utf8_polish_ci NOT NULL,
  `Description` varchar(255) collate utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `ShortDescription` text collate utf8_polish_ci NOT NULL,
  `LongDescription` text collate utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `VideoDriveName` varchar(50) collate utf8_polish_ci NOT NULL,
  `Status` int(11) NOT NULL default '0',
  `GamaOrder` int(11) NOT NULL,
  `YouTube` varchar(255) collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`GamaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=24 ;

--
-- Zrzut danych tabeli `Gama`
--

INSERT INTO `Gama` (`GamaId`, `ClubId`, `GminaId`, `Name`, `SeoName`, `Keyword`, `Description`, `EventDate`, `ShortDescription`, `LongDescription`, `UpdateDate`, `ImgDriveName`, `VideoDriveName`, `Status`, `GamaOrder`, `YouTube`) VALUES
(23, 0, 0, 'Bochnia', 'bochnia', 'Bochnia', '', '', '&lt;p&gt;krĂłtki opis miasta&lt;/p&gt;', '', '2012-01-06', '', '', 0, 2, ''),
(22, 0, 0, 'KrakĂłw', 'krakow', 'Krakow', '', '', '&lt;p&gt;to jest krĂłtki opis&lt;/p&gt;', '', '2012-01-06', '', '', 0, 1, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `GamaPicture`
--

CREATE TABLE IF NOT EXISTS `GamaPicture` (
  `GamaPictureId` int(11) NOT NULL auto_increment,
  `GamaId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) character set latin2 NOT NULL default '0',
  `ImgAltName` varchar(40) character set latin2 NOT NULL default '0',
  `IW` int(11) NOT NULL default '0',
  `IH` int(11) NOT NULL default '0',
  PRIMARY KEY  (`GamaPictureId`),
  KEY `ClubId` (`GamaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `GamaPicture`
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
-- Struktura tabeli dla  `Newsletter`
--

CREATE TABLE IF NOT EXISTS `Newsletter` (
  `NewsletterId` int(11) NOT NULL auto_increment,
  `Email` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `CreateDate` date NOT NULL,
  PRIMARY KEY  (`NewsletterId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `Newsletter`
--

INSERT INTO `Newsletter` (`NewsletterId`, `Email`, `CreateDate`) VALUES
(2, 'tprokop@prothomsoft.com', '2014-12-23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
  `OrderId` int(11) NOT NULL auto_increment,
  `UserId` varchar(100) NOT NULL default '',
  `CreateDate` datetime default NULL,
  `AuthorizeDate` date default NULL,
  `AuthorizeStatus` int(11) default NULL,
  `AuthorizeMail` int(11) NOT NULL,
  `CustomerInformation` text character set utf8 collate utf8_polish_ci,
  `Comments` text character set utf8 collate utf8_polish_ci,
  `Amount` float(8,2) default NULL,
  `IsSend` int(1) NOT NULL default '0',
  `IsPointed` int(1) NOT NULL default '0',
  `PointComment` text character set utf8 collate utf8_polish_ci NOT NULL,
  `ShipName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `PaymentName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `ShipPrice` float(8,2) NOT NULL,
  `NameFirst` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `NameLast` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Street` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Number` varchar(40) character set utf8 collate utf8_polish_ci NOT NULL,
  `Zip` varchar(40) character set utf8 collate utf8_polish_ci NOT NULL,
  `City` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Phone1` varchar(40) character set utf8 collate utf8_polish_ci NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Organization` varchar(255) NOT NULL,
  `OrganizationEmail` varchar(255) NOT NULL,
  PRIMARY KEY  (`OrderId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=93 ;

--
-- Zrzut danych tabeli `Orders`
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
-- Struktura tabeli dla  `OrdersProduct`
--

CREATE TABLE IF NOT EXISTS `OrdersProduct` (
  `OrdersProductId` int(11) NOT NULL auto_increment,
  `OrderId` int(11) NOT NULL default '0',
  `ProductId` int(11) NOT NULL default '0',
  `PurchasePrice` float(8,2) NOT NULL default '0.00',
  `Quantity` int(11) NOT NULL default '0',
  `IsFilled` int(11) NOT NULL default '0',
  `ProductCategoryLevelOneName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '',
  `ProductCategoryLevelTwoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `ImgDriveName` varchar(40) character set utf8 collate utf8_polish_ci NOT NULL,
  `Name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Points` int(11) NOT NULL,
  `PurchaseWeight` int(11) NOT NULL,
  PRIMARY KEY  (`OrdersProductId`,`OrderId`,`ProductId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=114 ;

--
-- Zrzut danych tabeli `OrdersProduct`
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
-- Struktura tabeli dla  `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(6) NOT NULL auto_increment,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `payments`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Photo`
--

CREATE TABLE IF NOT EXISTS `Photo` (
  `PhotoId` int(11) NOT NULL auto_increment,
  `EventId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL,
  `EventDate` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `ShortDescription` text collate utf8_polish_ci NOT NULL,
  `LongDescription` text collate utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL default '0000-00-00',
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `ImgFileName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Ordering` int(11) NOT NULL,
  PRIMARY KEY  (`PhotoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `Photo`
--

INSERT INTO `Photo` (`PhotoId`, `EventId`, `TypeId`, `Name`, `SeoName`, `EventDate`, `ShortDescription`, `LongDescription`, `CreationDate`, `UpdateDate`, `ImgDriveName`, `ImgFileName`, `Ordering`) VALUES
(15, 170, 0, 'Wesele', 'wesele', '1', '', '', '2010-05-29', '2010-05-29', '', '', 2),
(14, 177, 0, 'ZdjÄ?cia z wesela', 'zdjecia-z-wesela', '1', '', '', '2010-05-29', '2010-05-29', '', '', 1),
(16, 178, 0, 'SylwiaAdam09', 'sylwiaadam09', '1', '', '', '2010-05-30', '2010-05-30', '', '', 3),
(17, 179, 0, 'Lenka galeria', 'lenka-galeria', '1', '', '', '2010-05-30', '2010-05-30', '', '', 4),
(18, 180, 0, 'Weronika Damian Galeria 1', 'weronika-damian-galeria-1', '1', '', '', '2010-05-31', '2010-06-06', '', '', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `PhotoPicture`
--

CREATE TABLE IF NOT EXISTS `PhotoPicture` (
  `PhotoPictureId` int(11) NOT NULL auto_increment,
  `PhotoId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) character set latin2 NOT NULL default '0',
  `ImgFileName` varchar(40) character set latin2 NOT NULL default '0',
  `PictureDescBig` varchar(255) collate utf8_polish_ci NOT NULL,
  `ImgAlt` varchar(40) character set latin2 NOT NULL default '0',
  `ImgType` varchar(10) character set latin2 NOT NULL default '0',
  `BigImgDriveName` varchar(40) character set latin2 NOT NULL default '0',
  `BigImgFileName` varchar(40) character set latin2 NOT NULL default '0',
  `BigImgAlt` varchar(40) character set latin2 NOT NULL default '0',
  `BigImgType` varchar(10) character set latin2 NOT NULL default '0',
  PRIMARY KEY  (`PhotoPictureId`),
  KEY `ClubId` (`PhotoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=297 ;

--
-- Zrzut danych tabeli `PhotoPicture`
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
-- Struktura tabeli dla  `PictureOrder`
--

CREATE TABLE IF NOT EXISTS `PictureOrder` (
  `PictureOrderId` int(11) NOT NULL auto_increment,
  `UserId` int(11) NOT NULL,
  `PictureName` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float(5,2) NOT NULL,
  PRIMARY KEY  (`PictureOrderId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2329 ;

--
-- Zrzut danych tabeli `PictureOrder`
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
-- Struktura tabeli dla  `Points`
--

CREATE TABLE IF NOT EXISTS `Points` (
  `PointId` int(11) NOT NULL auto_increment,
  `UserId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `CreateDate` datetime default NULL,
  `AuthorizeDate` datetime default NULL,
  `AuthorizeStatus` tinyint(4) default NULL,
  `CustomerInformation` text character set utf8 collate utf8_polish_ci,
  `Comments` text character set utf8 collate utf8_polish_ci,
  `Amount` int(11) default NULL,
  `IsSend` int(1) NOT NULL default '0',
  `IsReceived` int(1) NOT NULL default '0',
  PRIMARY KEY  (`PointId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=76 ;

--
-- Zrzut danych tabeli `Points`
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
-- Struktura tabeli dla  `Poll`
--

CREATE TABLE IF NOT EXISTS `Poll` (
  `PollId` int(11) NOT NULL auto_increment,
  `Question` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `CreateDate` date NOT NULL default '0000-00-00',
  `Status` int(11) NOT NULL,
  `PollOrder` int(11) NOT NULL,
  PRIMARY KEY  (`PollId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `Poll`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `PollAnswer`
--

CREATE TABLE IF NOT EXISTS `PollAnswer` (
  `PollAnswerId` int(11) NOT NULL auto_increment,
  `PollId` int(11) NOT NULL default '0',
  `PollAnswer` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `PollAnswerOrder` int(11) NOT NULL,
  PRIMARY KEY  (`PollAnswerId`),
  KEY `DeltaId` (`PollId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `PollAnswer`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Producer`
--

CREATE TABLE IF NOT EXISTS `Producer` (
  `ProducerId` int(11) NOT NULL auto_increment,
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  PRIMARY KEY  (`ProducerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=34 ;

--
-- Zrzut danych tabeli `Producer`
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
-- Struktura tabeli dla  `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `ProductId` int(11) NOT NULL auto_increment,
  `BetaId` int(11) NOT NULL,
  `ProductCategoryId` int(11) NOT NULL default '0',
  `ProductCategoryLevelOneName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `ProductCategoryLevelOneSeoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `ProductCategoryLevelTwoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `ProductCategoryLevelTwoSeoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `UserId` int(11) NOT NULL default '0',
  `Name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '',
  `ExtName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Code` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `ShortDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `PreviewDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `LongDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `ContactDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `HDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `CreationDate` date NOT NULL default '0000-00-00',
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ProductOrder` int(11) NOT NULL default '0',
  `HomeProductOrder` int(11) NOT NULL,
  `Status` int(11) NOT NULL default '0',
  `IsBestProduct` int(11) NOT NULL default '0',
  `IsHomeProduct` int(11) NOT NULL,
  `IsAvailable` int(11) NOT NULL,
  `IsVisible` int(11) NOT NULL,
  `ImgDriveName` varchar(40) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `ImgFileName` varchar(40) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `ImgAlt` varchar(40) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `Price` float(10,2) NOT NULL default '0.00',
  `PriceOld` float(10,2) NOT NULL default '0.00',
  `Weight` int(11) NOT NULL,
  `ProductType` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '',
  `ProducerName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `ProductIdLink1` int(11) NOT NULL,
  `ProductIdLink2` int(11) NOT NULL,
  `ProductIdLink3` int(11) NOT NULL,
  `ProductIdLink4` int(11) NOT NULL,
  `ProductIdLink5` int(11) NOT NULL,
  `InStock` int(11) NOT NULL default '0',
  `Delivery` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Points` int(11) NOT NULL,
  `PointsMinus` int(11) NOT NULL,
  PRIMARY KEY  (`ProductId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `Product`
--

INSERT INTO `Product` (`ProductId`, `BetaId`, `ProductCategoryId`, `ProductCategoryLevelOneName`, `ProductCategoryLevelOneSeoName`, `ProductCategoryLevelTwoName`, `ProductCategoryLevelTwoSeoName`, `UserId`, `Name`, `SeoName`, `ExtName`, `Code`, `ShortDescription`, `PreviewDescription`, `LongDescription`, `ContactDescription`, `HDescription`, `CreationDate`, `UpdateDate`, `ProductOrder`, `HomeProductOrder`, `Status`, `IsBestProduct`, `IsHomeProduct`, `IsAvailable`, `IsVisible`, `ImgDriveName`, `ImgFileName`, `ImgAlt`, `Price`, `PriceOld`, `Weight`, `ProductType`, `ProducerName`, `ProductIdLink1`, `ProductIdLink2`, `ProductIdLink3`, `ProductIdLink4`, `ProductIdLink5`, `InStock`, `Delivery`, `Points`, `PointsMinus`) VALUES
(1, 8, 0, '', '', '', '', 0, 'Casio Keyboard SA-77 44 minitangenter', 'casio-keyboard-sa-77-44-minitangenter', 'C112', '1', 'Med 44 tangenter gir SA-77 alle musikalske nybegynnere et utgangspunkt som er tilstrekkelig til at de kan spille sine fĂ¸rste melodier. 100 lyder, 50 rytmer og 10 integrerte sanger sĂ¸rger for ekte avveksling. LCD-skjermen bidrar til ĂĽ velge og hente frem et stort musikalsk mangfold. Dessuten har SA-76 5 trommepads med forskjellige trommelyder ĂĽ utforske. KjĂ¸per du dette keyboardet fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.', '', '&lt;p&gt;Med 44 tangenter gir SA-77 alle musikalske nybegynnere et utgangspunkt som er tilstrekkelig til at de kan spille sine fĂ¸rste melodier. 100 lyder, 50 rytmer og 10 integrerte sanger sĂ¸rger for ekte avveksling. LCD-skjermen bidrar til ĂĽ velge og hente frem et stort musikalsk mangfold. Dessuten har SA-76 5 trommepads med forskjellige trommelyder ĂĽ utforske. KjĂ¸per du dette keyboardet fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.&lt;/p&gt;', '', '', '2014-12-02', '2014-12-22', 3, 0, 0, 1, 1, 1, 1, 'd7de3d9da9905c55a0256bcc5ac79679.jpg', '', '', 30.00, 0.00, 2, 'Keyword 1', '1', 0, 0, 0, 0, 0, 10, '(2-3 weeks)', 0, 0),
(2, 7, 0, '', '', '', '', 0, 'Casio Digitalpiano CDP-120 inkl. CS44', 'casio-digitalpiano-cdp-120-inkl-cs44', 'C221', '1', 'Casio Digitalpiano CDP-120 inkl. CS44', '', '&lt;p&gt;CDP-120 er et helt nytt og stilrent instrument, utrustet med et 88 tangenters klaviatur med hammermekanikk, autentiske stereosamplinger og med et pent og brukervennlig design. Aldri fĂ¸r har man fĂĽtt sĂĽ mye piano for pengene!! \r\nCasio CDP-120 leveres komplett med stativ, sustainpedal og notestativ. \r\nPianoet inneholder akustisk flygel og pianolyd, samt elpiano og strykere. \r\nDu kan enkelt ta CDP-120 med deg som et stagepiano med en vekt pĂĽ bare 12kg OG man kan koble det til dataen via USB-tilkoblingen pĂĽ baksiden. Med andre ord fĂĽr man i CDP-120 et mangfoldig og komplett instrument som kan like gjerne brukes i hjemmet, pĂĽ skolen og pĂĽ scenen.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;88 vektede tangenter&lt;/li&gt;\r\n&lt;li&gt;AHL lydkilde&lt;/li&gt;\r\n&lt;li&gt;48 toners polyfoni&lt;/li&gt;\r\n&lt;li&gt;5 lyder&lt;/li&gt;\r\n&lt;li&gt;Layerfunksjon (to lyder pĂĽ hverandre)&lt;/li&gt;\r\n&lt;li&gt;10 forskjellig romklangeffekter&lt;/li&gt;\r\n&lt;li&gt;5 forskjellige choruseffekter&lt;/li&gt;\r\n&lt;li&gt;Transponering&lt;/li&gt;\r\n&lt;li&gt;USB â MIDI-interface&lt;/li&gt;\r\n&lt;li&gt;Hodetelefonutgang/Stereo Lineout (stor jack, 6,3mm)&lt;/li&gt;\r\n&lt;li&gt;Inkl CS-44P understell&lt;/li&gt;\r\n&lt;li&gt;Inkl enkel sustainpedal&lt;/li&gt;\r\n&lt;li&gt;Inkl notestativ&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;KjĂ¸per du dette pianoet, fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.&lt;/p&gt;', '', '', '2014-12-02', '2014-12-22', 4, 0, 0, 1, 1, 1, 1, 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', '', '', 10.00, 0.00, 10, 'Keyword 2', '1', 0, 0, 0, 0, 0, 5, '2 weeks', 0, 0),
(3, 7, 0, '', '', '', '', 0, 'Casio Digitalpiano AP-250BN komplett', 'casio-digitalpiano-ap-250bn-komplett', 'C112', '1', 'Casio Digitalpiano AP-250BN komplett', '', '&lt;ul&gt;\r\n&lt;li&gt;Ny flerdimensjonell AiR lydkilde (128 stemmers polyfoni)&lt;/li&gt;\r\n&lt;li&gt;Tri-Sensor Scaled Hammer Action II&lt;/li&gt;\r\n&lt;li&gt;Damper resonance&lt;/li&gt;\r\n&lt;li&gt;Hammer response&lt;/li&gt;\r\n&lt;li&gt;18 Lyder, 60 melodier&lt;/li&gt;\r\n&lt;li&gt;USB (For datatilkobling)&lt;/li&gt;\r\n&lt;/ul&gt;', '', '', '2014-12-02', '2014-12-22', 5, 0, 0, 1, 1, 1, 1, 'eb9087b9ef031bcd0e6f7a4408e0724d.jpg', '', '', 10.00, 0.00, 10, 'Keyword 3', '1', 0, 0, 0, 0, 0, 4, '1 week', 0, 0),
(4, 8, 0, '', '', '', '', 0, 'Casio Digitalpiano PX-350BK', 'casio-digitalpiano-px-350bk', 'C443', '1', 'Casio Digitalpiano PX-350BK', '', '&lt;p&gt;Ny flerdimensjonell AiR lydkilde (128 stemmers polyfoni)&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Tri-Sensor Scaled Hammer Action II&lt;/li&gt;\r\n&lt;li&gt;Damper resonance&lt;/li&gt;\r\n&lt;li&gt;Hammer response&lt;/li&gt;\r\n&lt;li&gt;250 Lyder,180 rytmer&lt;/li&gt;\r\n&lt;li&gt;Bakbelyst display&lt;/li&gt;\r\n&lt;li&gt;USB (For datatilkobling)&lt;/li&gt;\r\n&lt;li&gt;USB flash memory port (USB-minne)&lt;/li&gt;\r\n&lt;li&gt;Audio Recording&lt;/li&gt;\r\n&lt;li&gt;Lydinnspilling&lt;/li&gt;\r\n&lt;li&gt;MIDI-Interface&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;KjĂ¸per du dette pianoet, fĂĽr du 2 timers gratis pianoundervisning av AndrĂĄs Hidas.&lt;/p&gt;', '', '', '2014-12-02', '2014-12-22', 6, 0, 0, 1, 1, 1, 1, '23b719e001a21a85da2d9d240b12e912.jpg', '', '', 10.00, 0.00, 49, 'Keyword 4', '1', 0, 0, 0, 0, 0, 0, '2 weeks', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ProductCategory`
--

CREATE TABLE IF NOT EXISTS `ProductCategory` (
  `ProductCategoryId` int(11) NOT NULL auto_increment,
  `FatherId` int(11) NOT NULL default '0',
  `Name` varchar(100) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `Descr` varchar(255) NOT NULL,
  `SeoName` varchar(255) NOT NULL default '',
  `ListOrder` int(11) NOT NULL default '0',
  `Img` varchar(40) NOT NULL default '0',
  `NumberOfItems` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ProductCategoryId`),
  KEY `ProductCategoryId` (`ProductCategoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `ProductCategory`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ProductCategoryPlain`
--

CREATE TABLE IF NOT EXISTS `ProductCategoryPlain` (
  `ProductCategoryPlainId` int(11) NOT NULL auto_increment,
  `ProductCategoryId` int(11) default NULL,
  `ProductCategoryName` varchar(100) character set utf8 collate utf8_polish_ci default NULL,
  `ProductCategorySeoName` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ProductCategoryPlainId`),
  KEY `ProductCategoryPlainId` (`ProductCategoryPlainId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `ProductCategoryPlain`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ProductPicture`
--

CREATE TABLE IF NOT EXISTS `ProductPicture` (
  `ProductPictureId` int(11) NOT NULL auto_increment,
  `ProductId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) NOT NULL default '0',
  `ImgFileName` varchar(40) NOT NULL default '0',
  `ImgAlt` varchar(40) NOT NULL default '0',
  `ImgType` varchar(10) NOT NULL default '0',
  `BigImgDriveName` varchar(40) NOT NULL default '0',
  `BigImgFileName` varchar(40) NOT NULL default '0',
  `BigImgAlt` varchar(40) NOT NULL default '0',
  `BigImgType` varchar(10) NOT NULL default '0',
  PRIMARY KEY  (`ProductPictureId`),
  KEY `ProductId` (`ProductId`),
  KEY `ProductPictureId` (`ProductPictureId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `ProductPicture`
--

INSERT INTO `ProductPicture` (`ProductPictureId`, `ProductId`, `ImgDriveName`, `ImgFileName`, `ImgAlt`, `ImgType`, `BigImgDriveName`, `BigImgFileName`, `BigImgAlt`, `BigImgType`) VALUES
(9, 1, 'd7de3d9da9905c55a0256bcc5ac79679.jpg', '', '', '', '', '', '', ''),
(10, 2, 'f070adcaa5fb4ccf8c8bdafdb8ba11fb.jpg', '', '', '', '', '', '', ''),
(11, 3, 'eb9087b9ef031bcd0e6f7a4408e0724d.jpg', '', '', '', '', '', '', ''),
(12, 4, '23b719e001a21a85da2d9d240b12e912.jpg', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `ProvinceId` int(11) NOT NULL auto_increment,
  `CountryId` int(11) NOT NULL default '0',
  `Name` varchar(40) NOT NULL default '0',
  PRIMARY KEY  (`ProvinceId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Zrzut danych tabeli `Province`
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
-- Struktura tabeli dla  `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `RightsId` int(11) NOT NULL auto_increment,
  `Label` varchar(40) NOT NULL default '0',
  `Level` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`RightsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `Rights`
--

INSERT INTO `Rights` (`RightsId`, `Label`, `Level`) VALUES
(1, 'admin', '0'),
(2, 'access zone 1', '1'),
(3, 'access zone 2', '2'),
(4, 'access zone 3', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `RightsUser`
--

CREATE TABLE IF NOT EXISTS `RightsUser` (
  `RightsId` int(11) NOT NULL default '0',
  `UserId` int(11) NOT NULL default '0',
  PRIMARY KEY  (`RightsId`,`UserId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `RightsUser`
--

INSERT INTO `RightsUser` (`RightsId`, `UserId`) VALUES
(1, 3),
(2, 3564),
(2, 3565),
(2, 3566),
(2, 3567),
(2, 3568),
(2, 3569),
(2, 3570),
(2, 3571),
(2, 3572),
(2, 3573),
(2, 3574),
(2, 3575),
(2, 3576),
(2, 3577),
(2, 3578),
(2, 3579);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Search`
--

CREATE TABLE IF NOT EXISTS `Search` (
  `SearchId` int(11) NOT NULL auto_increment,
  `Keyword` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `CreateDate` date NOT NULL,
  PRIMARY KEY  (`SearchId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=933 ;

--
-- Zrzut danych tabeli `Search`
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
-- Struktura tabeli dla  `Sigma`
--

CREATE TABLE IF NOT EXISTS `Sigma` (
  `SigmaId` int(11) NOT NULL auto_increment,
  `DeltaId` int(11) NOT NULL,
  `Name` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) NOT NULL,
  `Keyword` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EventDate` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '0',
  `EventCalendar` date NOT NULL,
  `ShortDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `LongDescription` text character set utf8 collate utf8_polish_ci NOT NULL,
  `UpdateDate` date NOT NULL default '0000-00-00',
  `ImgDriveName` varchar(40) NOT NULL default '0',
  `ImgFileName` varchar(40) NOT NULL default '0',
  `PictureDescSmall` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `SigmaOrder` int(11) NOT NULL,
  PRIMARY KEY  (`SigmaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=46 ;

--
-- Zrzut danych tabeli `Sigma`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `SigmaPicture`
--

CREATE TABLE IF NOT EXISTS `SigmaPicture` (
  `SigmaPictureId` int(11) NOT NULL auto_increment,
  `SigmaId` int(11) NOT NULL default '0',
  `ImgDriveName` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `ImgAltName` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `IW` int(11) NOT NULL,
  `IH` int(11) NOT NULL,
  PRIMARY KEY  (`SigmaPictureId`),
  KEY `SigmaId` (`SigmaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=68 ;

--
-- Zrzut danych tabeli `SigmaPicture`
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
(67, 40, '29a1f25741587c718fc494390d82fd6f.jpg', 'Musikkgave 3', 160, 200);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Template`
--

CREATE TABLE IF NOT EXISTS `Template` (
  `TemplateId` int(11) NOT NULL auto_increment,
  `Size` varchar(255) NOT NULL default '0',
  `Quantity` varchar(255) NOT NULL default '0',
  `Price` float(5,2) NOT NULL default '0.00',
  PRIMARY KEY  (`TemplateId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=44 ;

--
-- Zrzut danych tabeli `Template`
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
-- Struktura tabeli dla  `TemplateUser`
--

CREATE TABLE IF NOT EXISTS `TemplateUser` (
  `TemplateUserId` int(11) NOT NULL auto_increment,
  `UserId` int(11) NOT NULL,
  `Size` varchar(255) NOT NULL default '0',
  `Quantity` varchar(255) NOT NULL default '0',
  `Price` float(5,2) NOT NULL default '0.00',
  PRIMARY KEY  (`TemplateUserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=75 ;

--
-- Zrzut danych tabeli `TemplateUser`
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
-- Struktura tabeli dla  `UpdateCategory`
--

CREATE TABLE IF NOT EXISTS `UpdateCategory` (
  `UpdateCategoryId` int(11) NOT NULL auto_increment,
  `FatherId` int(11) NOT NULL default '0',
  `Name` varchar(255) collate utf8_polish_ci NOT NULL default '0',
  `SeoName` varchar(255) collate utf8_polish_ci NOT NULL default '',
  `ListOrder` int(11) NOT NULL default '0',
  `ContentType` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `NumberOfItems` int(11) NOT NULL default '0',
  PRIMARY KEY  (`UpdateCategoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `UpdateCategory`
--

INSERT INTO `UpdateCategory` (`UpdateCategoryId`, `FatherId`, `Name`, `SeoName`, `ListOrder`, `ContentType`, `NumberOfItems`) VALUES
(1, 0, '', '', 1, '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `UpdateCategoryPlain`
--

CREATE TABLE IF NOT EXISTS `UpdateCategoryPlain` (
  `UpdateCategoryPlainId` int(11) NOT NULL auto_increment,
  `CategoryId` int(11) default NULL,
  `CategoryName` varchar(255) character set utf8 collate utf8_polish_ci default NULL,
  `CategorySeoName` varchar(255) character set utf8 collate utf8_polish_ci NOT NULL default '',
  PRIMARY KEY  (`UpdateCategoryPlainId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Zrzut danych tabeli `UpdateCategoryPlain`
--

INSERT INTO `UpdateCategoryPlain` (`UpdateCategoryPlainId`, `CategoryId`, `CategoryName`, `CategorySeoName`) VALUES
(32, 1, '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `UpdateFile`
--

CREATE TABLE IF NOT EXISTS `UpdateFile` (
  `UpdateFileId` int(11) NOT NULL auto_increment,
  `UpdateCategoryId` int(11) NOT NULL default '0',
  `DriveName` varchar(255) NOT NULL default '',
  `FileName` varchar(255) NOT NULL default '',
  `FileDescription` tinytext NOT NULL,
  `FileType` varchar(10) NOT NULL default '',
  `ShortContent` text,
  `LongContent` text NOT NULL,
  `CreateDate` date default NULL,
  `UpdateDate` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`UpdateFileId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `UpdateFile`
--

INSERT INTO `UpdateFile` (`UpdateFileId`, `UpdateCategoryId`, `DriveName`, `FileName`, `FileDescription`, `FileType`, `ShortContent`, `LongContent`, `CreateDate`, `UpdateDate`) VALUES
(1, 1, 'andreas_1.jpg', 'i', 'iu', 'jpg', '', '', '2012-12-28', '2012-12-28'),
(2, 1, 'andreas_2.jpg', 'uih', 'iuh', 'jpg', '', '', '2012-12-28', '2012-12-28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserId` int(11) NOT NULL auto_increment,
  `CountryId` int(11) NOT NULL default '0',
  `ProvinceId` int(11) NOT NULL default '0',
  `Email` varchar(100) character set latin1 NOT NULL default '0',
  `Password` varchar(255) character set latin1 NOT NULL default '0',
  `CompanyName` varchar(40) character set latin1 NOT NULL default '0',
  `NameFirst` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `NameLast` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Street` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Number` varchar(10) character set latin1 NOT NULL default '0',
  `Zip` varchar(40) character set latin1 NOT NULL default '0',
  `City` varchar(40) collate utf8_polish_ci NOT NULL default '0',
  `Phone1` varchar(255) character set latin1 NOT NULL default '0',
  `Phone2` varchar(20) character set latin1 NOT NULL default '0',
  `Fax1` varchar(20) character set latin1 NOT NULL default '0',
  `Fax2` varchar(20) character set latin1 NOT NULL default '0',
  `Website1` varchar(40) character set latin1 NOT NULL default '0',
  `Website2` varchar(40) character set latin1 NOT NULL default '0',
  `NipPL` varchar(40) character set latin1 NOT NULL default '0',
  `NipUE` varchar(40) character set latin1 NOT NULL default '0',
  `Regon` varchar(40) character set latin1 NOT NULL default '1',
  `CreateDate` date NOT NULL default '0000-00-00',
  `UpdateDate` date NOT NULL default '0000-00-00',
  `Status` varchar(40) character set latin1 NOT NULL default '0',
  `ImgDriveName` varchar(40) character set latin1 NOT NULL default '',
  `ActivationToken` varchar(40) character set latin1 NOT NULL,
  `Info` text collate utf8_polish_ci NOT NULL,
  `TesterStatus` int(1) NOT NULL,
  `TesterDate` date NOT NULL,
  PRIMARY KEY  (`UserId`),
  KEY `CountryId` (`CountryId`),
  KEY `ProvinceId` (`ProvinceId`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3580 ;

--
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`UserId`, `CountryId`, `ProvinceId`, `Email`, `Password`, `CompanyName`, `NameFirst`, `NameLast`, `Street`, `Number`, `Zip`, `City`, `Phone1`, `Phone2`, `Fax1`, `Fax2`, `Website1`, `Website2`, `NipPL`, `NipUE`, `Regon`, `CreateDate`, `UpdateDate`, `Status`, `ImgDriveName`, `ActivationToken`, `Info`, `TesterStatus`, `TesterDate`) VALUES
(3, 0, 0, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', 'Nicolas', 'Curtelin', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2010-07-06', '2010-07-06', '1', '', '', '', 0, '0000-00-00'),
(3579, 0, 0, 'tprokop@prothomsoft.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2015-01-02', '2015-01-02', '1', '', '08fb8b77a478d8f7dc7b1e54488fc430', '', 0, '0000-00-00');
