-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 22 2017 г., 21:33
-- Версия сервера: 5.5.48
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `xparser`
--

-- --------------------------------------------------------

--
-- Структура таблицы `best_db`
--

CREATE TABLE IF NOT EXISTS `best_db` (
  `ID` int(6) NOT NULL,
  `GAME_ID` varchar(12) NOT NULL,
  `GAME_NAME` varchar(128) NOT NULL,
  `GAME_PRICE` float(7,2) NOT NULL,
  `GAME_LINK` varchar(512) NOT NULL,
  `COUNTRY` varchar(32) NOT NULL,
  `DISCOUNT` varchar(1) NOT NULL,
  `USA_PRICE` int(1) NOT NULL,
  `RUS_PRICE` int(1) NOT NULL,
  `EVRO_PRICE` int(1) NOT NULL,
  `ECONOM` float(3,2) NOT NULL,
  `SITE_LINK` varchar(128) NOT NULL,
  `FREE_GAME` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `discount_db`
--

CREATE TABLE IF NOT EXISTS `discount_db` (
  `ID` int(6) NOT NULL,
  `GAME_ID` varchar(12) NOT NULL,
  `GAME_NAME` varchar(128) NOT NULL,
  `GAME_PRICE` float(7,2) NOT NULL,
  `GAME_LINK` varchar(512) NOT NULL,
  `COUNTRY` varchar(32) NOT NULL,
  `DISCOUNT` varchar(1) NOT NULL,
  `USA_PRICE` float(7,2) NOT NULL,
  `RUS_PRICE` float(7,2) NOT NULL,
  `EVRO_PRICE` float(7,2) NOT NULL,
  `SITE_LINK` varchar(128) NOT NULL,
  `FREE_GAME` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `game_db`
--

CREATE TABLE IF NOT EXISTS `game_db` (
  `ID` int(6) NOT NULL,
  `GAME_ID` varchar(12) NOT NULL,
  `GAME_NAME` varchar(128) NOT NULL,
  `GAME_PRICE` float(7,2) NOT NULL,
  `GAME_LINK` varchar(512) NOT NULL,
  `COUNTRY` varchar(32) NOT NULL,
  `DISCOUNT` varchar(1) NOT NULL,
  `USA_PRICE` float(4,2) NOT NULL,
  `RUS_PRICE` float(4,2) NOT NULL,
  `EVRO_PRICE` float(4,2) NOT NULL,
  `SITE_LINK` varchar(128) NOT NULL,
  `FREE_GAME` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `or_parcing`
--

CREATE TABLE IF NOT EXISTS `or_parcing` (
  `ID` int(6) NOT NULL,
  `GAME_ID` varchar(12) NOT NULL,
  `EN_US_GAME_NAME` varchar(128) NOT NULL,
  `EN_US_GAME_PRICE` float(7,2) NOT NULL,
  `EN_US_GAME_LINK` varchar(512) NOT NULL,
  `EN_US_DISC` varchar(1) NOT NULL,
  `RU_RU_GAME_PRICE` float(7,2) NOT NULL,
  `RU_RU_GAME_LINK` varchar(512) NOT NULL,
  `DE_DE_GAME_PRICE` float(7,2) NOT NULL,
  `DE_DE_GAME_LINK` varchar(512) NOT NULL,
  `NB_NO_GAME_PRICE` float(7,2) NOT NULL,
  `NB_NO_GAME_LINK` varchar(512) NOT NULL,
  `EN_GB_GAME_PRICE` float(7,2) NOT NULL,
  `EN_GB_GAME_LINK` varchar(512) NOT NULL,
  `EN_IN_GAME_PRICE` float(7,2) NOT NULL,
  `EN_IN_GAME_LINK` varchar(512) NOT NULL,
  `PT_BR_GAME_PRICE` float(7,2) NOT NULL,
  `PT_BR_GAME_LINK` varchar(512) NOT NULL,
  `EN_ZA_GAME_PRICE` float(7,2) NOT NULL,
  `EN_ZA_GAME_LINK` varchar(512) NOT NULL,
  `ES_MX_GAME_PRICE` float(7,2) NOT NULL,
  `ES_MX_GAME_LINK` varchar(512) NOT NULL,
  `PL_PL_GAME_PRICE` float(7,2) NOT NULL,
  `PL_PL_GAME_LINK` varchar(512) NOT NULL,
  `EN_AU_GAME_PRICE` float(7,2) NOT NULL,
  `EN_AU_GAME_LINK` varchar(512) NOT NULL,
  `ES_AR_GAME_PRICE` float(7,2) NOT NULL,
  `ES_AR_GAME_LINK` varchar(512) NOT NULL,
  `HU_HU_GAME_PRICE` float(7,2) NOT NULL,
  `HU_HU_GAME_LINK` varchar(512) NOT NULL,
  `EN_HK_GAME_PRICE` float(7,2) NOT NULL,
  `EN_HK_GAME_LINK` varchar(512) NOT NULL,
  `ES_CO_GAME_PRICE` float(7,2) NOT NULL,
  `ES_CO_GAME_LINK` varchar(512) NOT NULL,
  `ZH_TW_GAME_PRICE` float(7,2) NOT NULL,
  `ZH_TW_GAME_LINK` varchar(512) NOT NULL,
  `ES_CL_GAME_PRICE` float(7,2) NOT NULL,
  `ES_CL_GAME_LINK` varchar(512) NOT NULL,
  `EN_CA_GAME_PRICE` float(7,2) NOT NULL,
  `EN_CA_GAME_LINK` varchar(512) NOT NULL,
  `DA_DK_GAME_PRICE` float(7,2) NOT NULL,
  `DA_DK_GAME_LINK` varchar(512) NOT NULL,
  `EN_IL_GAME_PRICE` float(7,2) NOT NULL,
  `EN_IL_GAME_LINK` varchar(512) NOT NULL,
  `EN_NZ_GAME_PRICE` float(7,2) NOT NULL,
  `EN_NZ_GAME_LINK` varchar(512) NOT NULL,
  `TR_TR_GAME_PRICE` float(7,2) NOT NULL,
  `TR_TR_GAME_LINK` varchar(512) NOT NULL,
  `CS_CZ_GAME_PRICE` float(7,2) NOT NULL,
  `CS_CZ_GAME_LINK` varchar(512) NOT NULL,
  `DE_CH_GAME_PRICE` float(7,2) NOT NULL,
  `DE_CH_GAME_LINK` varchar(512) NOT NULL,
  `KO_KR_GAME_PRICE` float(7,2) NOT NULL,
  `KO_KR_GAME_LINK` varchar(512) NOT NULL,
  `JA_JP_GAME_PRICE` float(7,2) NOT NULL,
  `JA_JP_GAME_LINK` varchar(512) NOT NULL,
  `EN_SG_GAME_PRICE` float(7,2) NOT NULL,
  `EN_SG_GAME_LINK` varchar(512) NOT NULL,
  `FREE_GAME` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `best_db`
--
ALTER TABLE `best_db`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `discount_db`
--
ALTER TABLE `discount_db`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `game_db`
--
ALTER TABLE `game_db`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `or_parcing`
--
ALTER TABLE `or_parcing`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `best_db`
--
ALTER TABLE `best_db`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `discount_db`
--
ALTER TABLE `discount_db`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `game_db`
--
ALTER TABLE `game_db`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `or_parcing`
--
ALTER TABLE `or_parcing`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
