-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 03:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transformice`
--

-- --------------------------------------------------------

--
-- Table structure for table `banlog`
--

CREATE TABLE `banlog` (
  `UserID` int(11) NOT NULL,
  `BannedByID` int(11) NOT NULL,
  `Time` int(11) NOT NULL,
  `Reason` text COLLATE utf8_bin NOT NULL,
  `Date` int(11) NOT NULL,
  `IP` text COLLATE utf8_bin NOT NULL,
  `IsBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cafeposts`
--

CREATE TABLE `cafeposts` (
  `PostID` int(11) NOT NULL,
  `TopicID` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `Post` text COLLATE utf8_bin NOT NULL,
  `Date` int(11) NOT NULL,
  `Points` int(11) NOT NULL,
  `Votes` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cafeposts`
--

INSERT INTO `cafeposts` (`PostID`, `TopicID`, `AuthorID`, `Post`, `Date`, `Points`, `Votes`) VALUES
(155, 39, 1, 'asdasasddaasd', 1598751225, 0, '0'),
(156, 40, 1, 'asdassadas', 1598751234, 0, '0'),
(157, 41, 1, 'asddsahjsadsdhjdshadshdsahsdadsa', 1598751245, 0, '0'),
(158, 42, 1, 'hdsahsadhdsasahjdsajhashjasd', 1598751253, 0, '0'),
(159, 43, 1, 'asddasaddaadsa', 1598751299, 0, '0'),
(160, 44, 1, 'adsadasdasdasaad', 1598751309, 0, '0'),
(161, 44, 5, 'addaa', 1598751743, 0, '0'),
(162, 44, 5, 'adsdaad', 1598751745, 0, '0'),
(163, 44, 5, 'adsdadadsaasd', 1598751747, 0, '0'),
(164, 44, 5, 'asaddaa', 1598751749, 0, '0'),
(165, 44, 5, 'zczxc', 1598751750, 0, '0'),
(166, 44, 1, 'test', 1599947914, 0, '0'),
(167, 44, 1, 's', 1599947920, 0, '0'),
(169, 39, 1, 'asddas', 1599949894, 0, '0'),
(170, 46, 1, 'dasasddsadas', 1599949947, 0, '0'),
(171, 46, 1, 'sadsdasaads', 1599949951, 0, '0'),
(172, 47, 1, 'asdfafdsadsfasfdafdaasdffasd', 1599949962, 0, '0'),
(174, 47, 1, 'hello', 1599950341, 0, '0'),
(175, 47, 1, 'test', 1600017542, 0, '0'),
(176, 47, 1, 'aaa', 1600017550, 0, '0'),
(177, 48, 1, 'asddsadas', 1600017682, 0, '0'),
(178, 49, 1, 'dsaasdadsdsa', 1600548615, 0, '0'),
(179, 49, 1, 'adsadsdasda', 1600548620, 0, '0'),
(180, 49, 1, 'hello', 1604172143, 0, '0'),
(181, 49, 2, 'test', 1607004821, 0, '0'),
(182, 48, 2, 'asd', 1607004845, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `cafetopics`
--

CREATE TABLE `cafetopics` (
  `TopicID` int(11) NOT NULL,
  `Title` text COLLATE utf8_bin NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `Langue` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cafetopics`
--

INSERT INTO `cafetopics` (`TopicID`, `Title`, `AuthorID`, `Langue`) VALUES
(39, 'adsadadads`', 1, 'EN'),
(40, 'dasadad', 1, 'EN'),
(41, 'jjdsahjbdsadshjsadhjsadsahj', 1, 'EN'),
(42, 'kjjjhhasdashjadshsadhjsdah', 1, 'EN'),
(43, 'dajsasdasddsadsa', 1, 'EN'),
(44, 'adsaddasasddsadsadasdasds', 1, 'EN'),
(46, 'adsdsadsa', 1, 'EN'),
(47, 'afsddssdasasdsaasfafsafssafasasfd', 1, 'EN'),
(48, 'dasadsaads', 1, 'EN'),
(49, 'test', 1, 'EN');

-- --------------------------------------------------------

--
-- Table structure for table `dailyquest`
--

CREATE TABLE `dailyquest` (
  `id` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MissionID` int(11) DEFAULT NULL,
  `MissionType` int(11) DEFAULT NULL,
  `QntToCollect` int(11) DEFAULT NULL,
  `QntCollected` int(11) DEFAULT NULL,
  `Reward` int(11) DEFAULT NULL,
  `Fraise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `UserID` int(11) NOT NULL,
  `Fur` int(11) NOT NULL,
  `Langue` text COLLATE utf8_bin NOT NULL,
  `Votes` text COLLATE utf8_bin NOT NULL,
  `VotesCount` int(11) NOT NULL,
  `Look` text COLLATE utf8_bin NOT NULL,
  `Slogan` text COLLATE utf8_bin NOT NULL,
  `Discourse` text COLLATE utf8_bin NOT NULL,
  `Mayor` tinyint(1) NOT NULL,
  `President` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ignored`
--

CREATE TABLE `ignored` (
  `UserID` int(11) NOT NULL,
  `IgnoreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ipbans`
--

CREATE TABLE `ipbans` (
  `IP` text COLLATE utf8_bin NOT NULL,
  `Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE `loginlog` (
  `Username` varchar(75) COLLATE utf8_bin NOT NULL,
  `IP` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`Username`, `IP`) VALUES
('Daryan#0000', '127.0.0.1'),
('Daryan#0010', '127.0.0.1'),
('Daryan#0329', '127.0.0.1'),
('Daryan#6096', '127.0.0.1'),
('Test#0000', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `loglogin`
--

CREATE TABLE `loglogin` (
  `id` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `IP` tinytext COLLATE utf8_bin,
  `Time` tinytext COLLATE utf8_bin,
  `Community` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `mapeditor`
--

CREATE TABLE `mapeditor` (
  `Code` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `XML` text COLLATE utf8_bin NOT NULL,
  `YesVotes` int(11) NOT NULL,
  `NoVotes` int(11) NOT NULL,
  `Perma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mapeditor`
--

INSERT INTO `mapeditor` (`Code`, `AuthorID`, `XML`, `YesVotes`, `NoVotes`, `Perma`) VALUES
(1, 1, '<C><P /><Z><S><S H=\"10\" T=\"0\" Y=\"255\" L=\"474\" X=\"386\" P=\"0,0,0.3,0.2,0,0,0,0\" /></S><D /><O /></Z></C>', 0, 0, 11),
(2, 2, '<C><P /><Z><S><S H=\"10\" P=\"0,0,0.3,0.2,0,0,0,0\" L=\"369\" X=\"377\" Y=\"376\" T=\"0\" /></S><D /><O /></Z></C>', 0, 0, 44),
(3, 3, '<C><P /><Z><S><S X=\"365\" P=\"0,0,0.3,0.2,0,0,0,0\" H=\"10\" L=\"439\" Y=\"361\" T=\"0\" /></S><D><T X=\"175\" Y=\"337\" /><F X=\"455\" Y=\"337\" /></D><O /></Z></C>', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ranklog`
--

CREATE TABLE `ranklog` (
  `Id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `givenByID` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  `Reason` text COLLATE utf8_bin NOT NULL,
  `IP` varchar(15) COLLATE utf8_bin NOT NULL,
  `Ranks` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ranklog`
--

INSERT INTO `ranklog` (`Id`, `UserID`, `givenByID`, `Date`, `Reason`, `IP`, `Ranks`) VALUES
(1, 2, 1, 158583562, '', '127.0.0.1', 'Arbitre'),
(2, 2, 1, 158584363, '', '127.0.0.1', 'Moderator'),
(3, 2, 1, 158584363, '', '127.0.0.1', 'Player');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1020) COLLATE utf8_bin DEFAULT NULL,
  `code` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tribe`
--

CREATE TABLE `tribe` (
  `Code` int(11) NOT NULL,
  `Name` text COLLATE utf8_bin NOT NULL,
  `Message` text COLLATE utf8_bin NOT NULL,
  `House` int(11) NOT NULL,
  `Ranks` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tribe`
--

INSERT INTO `tribe` (`Code`, `Name`, `Message`, `House`, `Ranks`) VALUES
(1, 'Daryan', '', 0, '${trad#TG_0}|0,0,0,0,0,0,0,0,0,0;${trad#TG_1}|0,0,0,0,0,0,0,0,0,0;${trad#TG_2}|0,0,0,0,0,0,0,0,0,0;${trad#TG_3}|0,0,0,0,0,0,0,0,0,0;${trad#TG_4}|0,0,0,0,1,0,0,0,0,0;${trad#TG_5}|0,0,0,0,1,0,1,0,0,0;${trad#TG_6}|0,0,0,0,1,0,1,1,0,0;${trad#TG_7}|0,0,0,0,1,0,1,1,1,0;${trad#TG_8}|0,1,1,1,1,1,1,1,1,1;${trad#TG_9}|1,1,1,1,1,1,1,1,1,1'),
(2, 'Test', '', 0, '${trad#TG_0}|0,0,0,0,0,0,0,0,0,0;${trad#TG_1}|0,0,0,0,0,0,0,0,0,0;${trad#TG_2}|0,0,0,0,0,0,0,0,0,0;${trad#TG_3}|0,0,0,0,0,0,0,0,0,0;${trad#TG_4}|0,0,0,0,1,0,0,0,0,0;${trad#TG_5}|0,0,0,0,1,0,1,0,0,0;${trad#TG_6}|0,0,0,0,1,0,1,1,0,0;${trad#TG_7}|0,0,0,0,1,0,1,1,1,0;${trad#TG_8}|0,1,1,1,1,1,1,1,1,1;${trad#TG_9}|1,1,1,1,1,1,1,1,1,1');

-- --------------------------------------------------------

--
-- Table structure for table `tribehistoric`
--

CREATE TABLE `tribehistoric` (
  `ID` int(11) NOT NULL,
  `TribeCode` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  `Informations` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tribehistoric`
--

INSERT INTO `tribehistoric` (`ID`, `TribeCode`, `Type`, `Date`, `Informations`) VALUES
(1, 1, 1, 26189225, '{\"auteur\":\"daryan#0000\",\"tribu\":\"Daryan\"}'),
(2, 1, 2, 26189226, '{\"auteur\":\"daryan#0000\",\"membreAjoute\":\"daryan#0010\"}'),
(3, 2, 1, 26430583, '{\"auteur\":\"test#0000\",\"tribu\":\"Test\"}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `PlayerID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `NameID` int(11) NOT NULL,
  `Password` text NOT NULL,
  `PrivLevel` int(11) NOT NULL,
  `TitleNumber` int(11) NOT NULL,
  `FirstCount` int(11) NOT NULL,
  `CheeseCount` int(11) NOT NULL,
  `ShamanCheeses` int(11) NOT NULL,
  `ShopCheeses` int(11) NOT NULL,
  `ShopFraises` int(11) NOT NULL,
  `ShamanSaves` int(11) NOT NULL,
  `HardModeSaves` int(11) NOT NULL,
  `DivineModeSaves` int(11) NOT NULL,
  `BootcampCount` int(11) NOT NULL,
  `ShamanType` int(11) NOT NULL,
  `Look` text NOT NULL,
  `MouseColor` text NOT NULL,
  `ShamanColor` text NOT NULL,
  `RegDate` int(11) NOT NULL,
  `CheeseTitleList` text NOT NULL,
  `FirstTitleList` text NOT NULL,
  `BootcampTitleList` text NOT NULL,
  `ShamanTitleList` text NOT NULL,
  `HardModeTitleList` text NOT NULL,
  `DivineModeTitleList` text NOT NULL,
  `ShopTitleList` text NOT NULL,
  `SpecialTitleList` text NOT NULL,
  `ShopItems` text NOT NULL,
  `ShamanItems` text NOT NULL,
  `ShamanEquipedItems` text NOT NULL,
  `Clothes` text NOT NULL,
  `ShopBadges` text NOT NULL,
  `TotemItemCount` int(11) NOT NULL,
  `Totem` text NOT NULL,
  `BanHours` int(11) NOT NULL,
  `Email` text NOT NULL,
  `MapCrew` tinyint(1) NOT NULL,
  `LuaDev` tinyint(1) NOT NULL,
  `FunCorp` tinyint(1) NOT NULL,
  `ShamanLevel` int(11) NOT NULL,
  `ShamanExp` int(11) NOT NULL,
  `ShamanExpNext` int(11) NOT NULL,
  `Skills` text NOT NULL,
  `LastOn` int(11) NOT NULL,
  `Gender` int(11) NOT NULL,
  `MarriageID` int(11) NOT NULL,
  `LastDivorceTimer` int(11) NOT NULL,
  `TribeCode` int(11) NOT NULL,
  `TribeRank` int(11) NOT NULL,
  `Karma` int(11) NOT NULL,
  `TribunalCorrect` int(11) NOT NULL,
  `TribunalIncorrect` int(11) NOT NULL,
  `ElectionVoted` tinyint(1) NOT NULL,
  `Gifts` text NOT NULL,
  `Messages` text NOT NULL,
  `SurvivorStats` text NOT NULL,
  `RacingStats` text NOT NULL,
  `ShamanBadges` text NOT NULL,
  `EquipedShamanBadge` int(11) NOT NULL,
  `Consumables` text NOT NULL,
  `EquipedConsumables` text NOT NULL,
  `Letters` text NOT NULL,
  `Pet` int(11) NOT NULL,
  `PetEnd` int(11) NOT NULL,
  `IceCoins` int(11) NOT NULL,
  `IceTokens` int(11) NOT NULL,
  `VipTime` int(11) NOT NULL,
  `Time` int(11) NOT NULL,
  `GodFather` text NOT NULL,
  `RoundsCount` int(11) NOT NULL,
  `MuteTime` int(11) NOT NULL,
  `MuteReason` text NOT NULL,
  `PermaBanned` tinyint(1) NOT NULL,
  `BanTime` int(11) NOT NULL,
  `BanReason` text NOT NULL,
  `NameColor` text NOT NULL,
  `forum` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PlayerID`, `Username`, `NameID`, `Password`, `PrivLevel`, `TitleNumber`, `FirstCount`, `CheeseCount`, `ShamanCheeses`, `ShopCheeses`, `ShopFraises`, `ShamanSaves`, `HardModeSaves`, `DivineModeSaves`, `BootcampCount`, `ShamanType`, `Look`, `MouseColor`, `ShamanColor`, `RegDate`, `CheeseTitleList`, `FirstTitleList`, `BootcampTitleList`, `ShamanTitleList`, `HardModeTitleList`, `DivineModeTitleList`, `ShopTitleList`, `SpecialTitleList`, `ShopItems`, `ShamanItems`, `ShamanEquipedItems`, `Clothes`, `ShopBadges`, `TotemItemCount`, `Totem`, `BanHours`, `Email`, `MapCrew`, `LuaDev`, `FunCorp`, `ShamanLevel`, `ShamanExp`, `ShamanExpNext`, `Skills`, `LastOn`, `Gender`, `MarriageID`, `LastDivorceTimer`, `TribeCode`, `TribeRank`, `Karma`, `TribunalCorrect`, `TribunalIncorrect`, `ElectionVoted`, `Gifts`, `Messages`, `SurvivorStats`, `RacingStats`, `ShamanBadges`, `EquipedShamanBadge`, `Consumables`, `EquipedConsumables`, `Letters`, `Pet`, `PetEnd`, `IceCoins`, `IceTokens`, `VipTime`, `Time`, `GodFather`, `RoundsCount`, `MuteTime`, `MuteReason`, `PermaBanned`, `BanTime`, `BanReason`, `NameColor`, `forum`) VALUES
(1, 'Daryan', 0, '5R2jqBLKn44crh5qR2lsDqAvwM18EQfHqcp6em9Spds=', 10, 453, 2410, 2410, 10, 999999999, 999334431, 133641, 46771, 6761, 0, 0, '138;0,0,0,0,0,0,0,0,0', '78583a', '95d9d6', 1570913127, '5.1,6.1,7.1,8.1,35.1,36.1,37.1,26.1,27.1,28.1,29.1,30.1,31.1,32.1,33.1,34.1,38.1,39.1,40.1,41.1,72.1', '9.1,10.1,11.1,12.1,42.1,43.1,44.1,45.1,46.1,47.1,48.1,49.1,50.1,51.1,52.1,53.1,54.1,55.1', '', '', '', '', '115.1', '', '230138', '', '', '', '16:8;247:1', 0, '', 0, 'daryan.latif@hotmail.com', 1, 1, 1, 1000, 500, 1000, '0:5;1:5;2:5;3:5;4:1;5:5;6:5;7:1;8:5;9:5;10:1;11:5;12:5;13:1;14:1;20:5;21:5;22:5;23:5;24:1;25:5;26:5;27:1;28:5;29:5;30:1;31:5;32:5;33:1;34:1;40:5;41:5;42:5;43:5;44:1;45:5;46:5;47:1;48:5;49:5;50:1;51:5;52:5;53:1;54:1;60:5;61:5;62:5;63:5;64:1;65:5;66:5;67:1;68:5;69:5;70:1;72:5;73:1;74:5;80:5;81:5;82:5;83:5;84:1;85:5;86:5;87:1;88:5;89:5;90:1;91:1;92:1;93:5;94:1', 26430774, 0, 0, 0, 1, 9, 0, 0, 0, 0, '', '', '0,0,0,0', '17,7,7,7', '', 0, '2256:5;2242:1;2243:2;2244:1;2437:3;23:10;2343:210;2379:5;2252:5;2349:4;2254:3', '23', '', 0, 1585846443, 30, 0, 0, 16487, '0', 481, 0, '', 0, 0, '', '01558f', 1),
(2, 'Test', 0, '5R2jqBLKn44crh5qR2lsDqAvwM18EQfHqcp6em9Spds=', 3, 0, 0, 0, 1, 999999, 999999, 0, 0, 0, 0, 0, '1;0,0,0,0,0,0,0,0,0', '78583a', '95d9d6', 1571350018, '1101.1,1102.1,1103.1', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 'daryan.latif@hotmail.com', 0, 0, 0, 1, 0, 32, '', 26430774, 0, 0, 0, 2, 9, 0, 0, 0, 0, '', '', '0,0,0,0', '0,0,0,0', '', 0, '2256:5;23:10;2379:5;2252:5;2349:5', '23', '', 0, 1585846444, 0, 0, 0, 4166, '0', 101, 0, '', 0, 0, '', '', 1),
(3, 'Daryan', 10, '5R2jqBLKn44crh5qR2lsDqAvwM18EQfHqcp6em9Spds=', 5, 0, 1000, 1000, 2, 999959, 999999, 0, 0, 0, 0, 0, '1;0,0,0,0,0,0,0,0,0', '78583a', '95d9d6', 1571350988, '5.1,6.1,7.1,8.1,35.1,36.1,37.1,26.1,27.1,28.1,29.1,30.1', '9.1,10.1,11.1,12.1,8001.1,42.1,43.1,8002.1,44.1,45.1,46.1,8003.1,47.1,48.1,8004.1,49.1', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 'daryan.latif@hotmail.com', 0, 0, 0, 1, 0, 32, '', 26189249, 0, 0, 0, 1, 0, 0, 0, 0, 0, '', '', '0,0,0,0', '0,0,0,0', '', 0, '2256:5;23:10;2379:5;2252:5;2349:5', '23', '', 0, 1571354976, 0, 0, 1657752671, 418, '0', 15, 0, '', 0, 0, '', '', 1),
(4, 'Daryan', 6096, '5R2jqBLKn44crh5qR2lsDqAvwM18EQfHqcp6em9Spds=', 1, 0, 0, 0, 0, 999999, 999999, 0, 0, 0, 0, 0, '1;0,0,0,0,0,0,0,0,0', '78583a', '95d9d6', 1585763799, '1101.1,1102.1,1103.1', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 'daryan.latif@hotmail.com', 1, 0, 0, 1, 0, 32, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '0,0,0,0', '0,0,0,0', '', 0, '23:10;2252:5;2256:5;2349:5;2379:5', '23', '', 0, 0, 0, 0, 0, 0, '0', 0, 0, '', 0, 0, '', '', 1),
(5, 'Demo', 0, 'y5/a/Cqsyb+BiG3n+14fLgmFKAS4RkW9PAPEZ7L4qEk=', 0, 0, 0, 0, 0, 50000, 50000, 0, 0, 0, 0, 0, '1;0,0,0,0,0,0,0,0,0', '78583a', '95d9d6', 1598740780, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 'demo@example.com', 0, 0, 0, 50, 0, 680, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '0,0,0,0', '0,0,0,0', '', 0, '2256:5;23:10;2379:5;2252:5;2349:5;2253:6', '23', '', 0, 0, 0, 0, 0, 0, '0', 0, 0, '', 0, 0, '', '', 0),
(6, 'Demo', 0, 'y5/a/Cqsyb+BiG3n+14fLgmFKAS4RkW9PAPEZ7L4qEk=', 0, 0, 0, 0, 0, 50000, 50000, 0, 0, 0, 0, 0, '1;0,0,0,0,0,0,0,0,0', '78583a', '95d9d6', 1600483903, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 'demo@example.com', 0, 0, 0, 50, 0, 680, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '0,0,0,0', '0,0,0,0', '', 0, '2256:5;23:10;2379:5;2252:5;2349:5;2253:6', '23', '', 0, 0, 0, 0, 0, 0, '0', 0, 0, '', 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertempmute`
--

CREATE TABLE `usertempmute` (
  `id` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `reason` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafeposts`
--
ALTER TABLE `cafeposts`
  ADD PRIMARY KEY (`PostID`);

--
-- Indexes for table `cafetopics`
--
ALTER TABLE `cafetopics`
  ADD PRIMARY KEY (`TopicID`);

--
-- Indexes for table `dailyquest`
--
ALTER TABLE `dailyquest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD UNIQUE KEY `Username` (`Username`,`IP`);

--
-- Indexes for table `loglogin`
--
ALTER TABLE `loglogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapeditor`
--
ALTER TABLE `mapeditor`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `ranklog`
--
ALTER TABLE `ranklog`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tribe`
--
ALTER TABLE `tribe`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `tribehistoric`
--
ALTER TABLE `tribehistoric`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`PlayerID`);

--
-- Indexes for table `usertempmute`
--
ALTER TABLE `usertempmute`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cafeposts`
--
ALTER TABLE `cafeposts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `cafetopics`
--
ALTER TABLE `cafetopics`
  MODIFY `TopicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `dailyquest`
--
ALTER TABLE `dailyquest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loglogin`
--
ALTER TABLE `loglogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapeditor`
--
ALTER TABLE `mapeditor`
  MODIFY `Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ranklog`
--
ALTER TABLE `ranklog`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tribe`
--
ALTER TABLE `tribe`
  MODIFY `Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tribehistoric`
--
ALTER TABLE `tribehistoric`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertempmute`
--
ALTER TABLE `usertempmute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
