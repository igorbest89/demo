-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2016 г., 22:28
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `admin_code`
--

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id_manufacturer` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id_manufacturer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `manufacturer`
--

INSERT INTO `manufacturer` (`id_manufacturer`, `name`) VALUES
(2, 'vizand'),
(3, 'lacosta');

-- --------------------------------------------------------

--
-- Структура таблицы `permission_description`
--

CREATE TABLE IF NOT EXISTS `permission_description` (
  `id_permission` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Storage`
--

CREATE TABLE IF NOT EXISTS `Storage` (
  `id_storage` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `id_material` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `id_manufacturer` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `coment` longtext,
  `sum` float DEFAULT NULL,
  PRIMARY KEY (`id_storage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `type_material`
--

CREATE TABLE IF NOT EXISTS `type_material` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `name_material` text,
  `material_config` longtext,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `type_material`
--

INSERT INTO `type_material` (`id_material`, `name_material`, `material_config`) VALUES
(5, 'Золото', 's:0:"";'),
(6, 'Серебро', 's:0:"";'),
(7, 'Алмаз', 's:0:"";'),
(8, 'Топаз', 's:0:"";');

-- --------------------------------------------------------

--
-- Структура таблицы `type_product`
--

CREATE TABLE IF NOT EXISTS `type_product` (
  `id_type_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `config` longtext,
  PRIMARY KEY (`id_type_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `type_product`
--

INSERT INTO `type_product` (`id_type_product`, `name`, `config`) VALUES
(2, 'Кольца', 's:0:"";'),
(3, 'браслеты', 's:0:"";'),
(4, 'серьги', 's:0:"";');

-- --------------------------------------------------------

--
-- Структура таблицы `type_work`
--

CREATE TABLE IF NOT EXISTS `type_work` (
  `id_type_work` int(11) NOT NULL AUTO_INCREMENT,
  `name_work` text,
  PRIMARY KEY (`id_type_work`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `type_work`
--

INSERT INTO `type_work` (`id_type_work`, `name_work`) VALUES
(5, 'Гравировка'),
(6, 'Вставка камней'),
(8, 'Переплавка'),
(9, 'Очистка');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `permission`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0'),
(4, 'qweqwe', '123123123', '1'),
(5, 'q', 'q', ''),
(6, 'tt', '9990775155c3518a0d7917f7780b24aa', '1'),
(7, 'aaasd', '6c0cbf5029aed0af395ac4b864c6b095', '2'),
(8, '1111', '934b535800b1cba8f96a5d72f72f1611', '1'),
(9, '', 'd41d8cd98f00b204e9800998ecf8427e', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
