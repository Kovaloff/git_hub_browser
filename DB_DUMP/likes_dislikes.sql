-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 08 2013 г., 10:54
-- Версия сервера: 5.5.31
-- Версия PHP: 5.4.15-1~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `likes_dislikes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `user_id` int(11) NOT NULL,
  `vote_up` int(11) NOT NULL,
  `vote_down` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `votes`
--

INSERT INTO `votes` (`user_id`, `vote_up`, `vote_down`) VALUES
(5856, 8, 4),
(43504, 1, 0),
(14555, 4, 1),
(9766, 1, 0),
(20234, 1, 0),
(100198, 4, 6),
(91159, 1, 0),
(77607, 1, 0),
(62809, 1, 0),
(123245, 1, 0),
(139048, 1, 0),
(47294, 9, 5),
(1443215, 10, 6),
(209837, 16, 3),
(189796, 2, 0),
(1321010, 1, 0),
(363611, 4, 2),
(993322, 1, 3),
(728971, 2, 0),
(1178722, 1, 0),
(1482054, 3, 1),
(132242, 1, 0),
(18924, 1, 1),
(34844, 1, 1),
(54884, 6, 1),
(281595, 0, 1),
(45925, 4, 0),
(720, 4, 0),
(8358, 1, 0),
(37493, 2, 0),
(35014, 5, 3),
(6153, 3, 1),
(65244, 4, 4),
(24568, 4, 0),
(488465, 1, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
