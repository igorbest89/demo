-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2016 г., 17:54
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
-- Структура таблицы `permission_description`
--

CREATE TABLE IF NOT EXISTS `permission_description` (
  `id_permission` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type_material`
--

CREATE TABLE IF NOT EXISTS `type_material` (
  `id_material` int(11) NOT NULL,
  `name_material` text,
  `material_config` longtext
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_material`
--

INSERT INTO `type_material` (`id_material`, `name_material`, `material_config`) VALUES
(2, 'gold', 's:0:"";'),
(3, 'алмазы', 's:0:"";'),
(4, 'изумруды', 's:0:"";');

-- --------------------------------------------------------

--
-- Структура таблицы `type_product`
--

CREATE TABLE IF NOT EXISTS `type_product` (
  `id_type_product` int(11) NOT NULL,
  `name` text,
  `config` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(5, 'qwe12'),
(6, 'work 1'),
(8, 'укк'),
(9, 'обработка');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `permission`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0'),
(4, 'qweqwe', '123123123', '1'),
(5, 'q', 'q', ''),
(6, 'tt', '9990775155c3518a0d7917f7780b24aa', '1');

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `type_material`
--
ALTER TABLE `type_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type_product` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `type_work`
--
ALTER TABLE `type_work`
  MODIFY `id_type_work` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
