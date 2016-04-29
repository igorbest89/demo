-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2016 г., 18:01
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
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `type_image` text,
  `path` longtext
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id_image`, `id_order`, `type_image`, `path`) VALUES
(1, 8, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/01ac2753b60d2a79e22e685461f9d9de.png'),
(2, 8, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/b817f2d543306c7d6b6d1116c034f1e4.png'),
(3, 8, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/2d496bb1ee4ccc0583d507ff5e66c3a6.png'),
(4, 8, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/5d4cf350c9ad8ab84a4a22f2e1f60eda.png'),
(5, 9, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/'),
(6, 9, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/'),
(7, 9, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/'),
(8, 9, 'neworder', 'D:/openserver/OpenServer/domains/gold.loc/upload/'),
(9, 10, 'neworder', '139b14017b4f8fd699b05f7d527550c3.png'),
(10, 10, 'neworder', '9a31cc86bc70abaf9c34f1d7792eef66.png'),
(11, 10, 'neworder', '8f631d169a3fd2503c1a216e23778573.png'),
(12, 10, 'neworder', '8a443c77521b8db227d1109c368fc4d8.png'),
(13, 10, 'render', '4c0f419066400d2bc8e8b81f5b084531.png'),
(14, 10, 'render', '712ece114f36f5831a4a7ab9f6fd6d33.png'),
(15, 10, 'render', '8ac9af986a3ec66e7279d4a1c934d3bb.png'),
(16, 10, 'render', 'ffe6ccdfaefe55c757005d4d1d721279.png');

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
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(11) NOT NULL,
  `order_name` text,
  `artikle` text,
  `id_type_work` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `weight` text,
  `status` text,
  `comment` longtext
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `order_name`, `artikle`, `id_type_work`, `id_user`, `date_start`, `date_end`, `weight`, `status`, `comment`) VALUES
(1, 'qwe', 'qwe', 5, 3, NULL, NULL, '123', 'Новый', '123213qa  q'),
(2, '', '', 5, 3, NULL, NULL, '', 'Новый', ''),
(3, '', '', 0, 0, NULL, NULL, '', 'Новый', ''),
(4, '', '', 0, 0, NULL, NULL, '', 'Новый', ''),
(5, '123', 'qweqwe', 5, 3, NULL, NULL, '12', 'Новый', 'qweqwed'),
(6, '123', 'qweqwe', 5, 3, NULL, NULL, '12', 'Новый', 'qweqwed'),
(7, '', '', 0, 0, NULL, NULL, '', 'Новый', ''),
(8, 'test', 'test1', 5, 3, NULL, NULL, '1', 'Новый', 'qweqwe'),
(9, '123', '456', 5, 3, NULL, NULL, '123123', 'Новый', 'qweqwe'),
(10, '123', 'qweqwe', 5, 3, NULL, NULL, '100', 'Новый', '');

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
  `weight` text,
  `id_manufacturer` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `coment` longtext,
  `sum` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Storage`
--

INSERT INTO `Storage` (`id_storage`, `name`, `id_material`, `counts`, `weight`, `id_manufacturer`, `date`, `coment`, `sum`) VALUES
(1, '', 0, 0, '0', 0, '0000-00-00', '', 0),
(3, '456', 6, 11, '100', 3, '2016-04-30', '232323', 1022),
(4, '555', 8, 0, '123123', 2, '2016-04-30', '', 1210);

-- --------------------------------------------------------

--
-- Структура таблицы `type_material`
--

CREATE TABLE IF NOT EXISTS `type_material` (
  `id_material` int(11) NOT NULL,
  `name_material` text,
  `material_config` longtext
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
-- Структура таблицы `used_material`
--

CREATE TABLE IF NOT EXISTS `used_material` (
  `id_used` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `used_material`
--

INSERT INTO `used_material` (`id_used`, `id_material`, `count`, `id_order`) VALUES
(1, 5, 10, 10),
(2, 6, 2, 10),
(3, 7, 100, 10),
(4, 8, 1, 10);

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
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Индексы таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id_manufacturer`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

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
-- Индексы таблицы `used_material`
--
ALTER TABLE `used_material`
  ADD PRIMARY KEY (`id_used`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id_manufacturer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `Storage`
--
ALTER TABLE `Storage`
  MODIFY `id_storage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `type_material`
--
ALTER TABLE `type_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
-- AUTO_INCREMENT для таблицы `used_material`
--
ALTER TABLE `used_material`
  MODIFY `id_used` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
