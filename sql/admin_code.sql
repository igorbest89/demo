-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2016 г., 18:22
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `admin_code`
--

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id_manufacturer` int(11) NOT NULL,
  `name` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  `id_storage` int(11) NOT NULL,
  `name` text,
  `id_material` int(11) DEFAULT NULL,
  `counts` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `id_manufacturer` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `coment` longtext,
  `sum` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Storage`
--

INSERT INTO `Storage` (`id_storage`, `name`, `id_material`, `counts`, `weight`, `id_manufacturer`, `date`, `coment`, `sum`) VALUES
(1, '', 0, 0, 0, 0, '0000-00-00', '', 0),
(3, '456', 6, 0, 100, 3, '2016-04-30', '232323', 1022),
(4, '555', 5, 12312, 123123, 2, '2016-04-30', '', 1210);

-- --------------------------------------------------------

--
-- Структура таблицы `type_material`
--

CREATE TABLE IF NOT EXISTS `type_material` (
  `id_material` int(11) NOT NULL,
  `name_material` text,
  `material_config` longtext
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
  `id_type_product` int(11) NOT NULL,
  `name` text,
  `config` longtext
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `id_type_work` int(11) NOT NULL,
  `name_work` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id_manufacturer`);

--
-- Индексы таблицы `Storage`
--
ALTER TABLE `Storage`
  ADD PRIMARY KEY (`id_storage`);

--
-- Индексы таблицы `type_material`
--
ALTER TABLE `type_material`
  ADD PRIMARY KEY (`id_material`);

--
-- Индексы таблицы `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id_type_product`);

--
-- Индексы таблицы `type_work`
--
ALTER TABLE `type_work`
  ADD PRIMARY KEY (`id_type_work`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id_manufacturer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Storage`
--
ALTER TABLE `Storage`
  MODIFY `id_storage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `type_material`
--
ALTER TABLE `type_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type_product` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `type_work`
--
ALTER TABLE `type_work`
  MODIFY `id_type_work` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
