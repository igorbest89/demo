-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2016 г., 18:34
-- Версия сервера: 5.5.48-log
-- Версия PHP: 5.5.33

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
-- Структура таблицы `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id_files` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `id_task` int(11) DEFAULT NULL,
  `type_file` text,
  `path` text
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id_files`, `id_project`, `id_task`, `type_file`, `path`) VALUES
(6, 0, 6, 'neworder', '54f92586c0384961c2c60255f444ad8c.zip'),
(7, 0, 1, 'neworder', '0c375977db8899eeb1de5194d32afe10.zip'),
(8, 0, 1, 'neworder', '369c0696faf420431025cb1895c39314.zip'),
(9, 0, 3, 'neworder', '876f5217f5dd302f37e87ab6cd20b992.zip'),
(22, 4, 11, 'neworder', '5a7890cf4742de532e8cf7b656d70372.zip'),
(23, 3, 7, 'neworder', '31a2c2e058b4acf46ba18aa68e6e4d3f.zip'),
(24, 3, 7, 'neworder', '9aaa6d351c76634871a954ef6f9e4f68.png'),
(25, 6, 14, 'neworder', '47a5a23cbc2f5a93274452c819c2bb81.jpg'),
(26, 6, 14, 'neworder', '401c1de7dc3707dd0fe501651902dcb3.zip');

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
-- Структура таблицы `order_to_project`
--

CREATE TABLE IF NOT EXISTS `order_to_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Структура таблицы `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(11) NOT NULL,
  `name_project` text,
  `desk` longtext,
  `status` text
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`id_project`, `name_project`, `desk`, `status`) VALUES
(1, '333', '444', 'Обычный'),
(2, '345', '123', 'Срочный'),
(3, '123123', '123132ё12', 'Отложенный'),
(6, 'test', '', 'Обычный');

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` int(11) NOT NULL,
  `key_s` text,
  `value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id_setting`, `key_s`, `value`) VALUES
(5, 'status', 'a:4:{s:14:"Обычный";s:14:"Обычный";s:14:"Срочный";s:14:"Срочный";s:20:"Отложенный";s:20:"Отложенный";s:16:"Закрытый";s:16:"Закрытый";}');

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
  `sum` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `deep` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Storage`
--

INSERT INTO `Storage` (`id_storage`, `name`, `id_material`, `counts`, `weight`, `id_manufacturer`, `date`, `coment`, `sum`, `width`, `height`, `deep`) VALUES
(1, '', 0, 0, '0', 0, '0000-00-00', '', 0, NULL, NULL, NULL),
(3, '456', 6, 11, '100', 3, '2016-04-30', '232323', 1022, NULL, NULL, NULL),
(4, '5553', 8, 0, '123123', 2, '2016-04-30', '', 1210, 111, 222, 333),
(5, 'йцуйцу', 5, 111, '222', 2, '2016-06-06', 'йцуйцу', 111, 1111, 4444, 3333),
(6, '1111111111111', 5, 2222, '1212', 2, '2016-06-07', '', 0, 12221, 1212, 1212),
(7, '1111', 5, 22, '22', 2, '2016-06-06', '', 0, 11, 33, 44),
(8, 'qqqqwwwe11', 14, 1111, '', 2, '0000-00-00', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id_task` int(11) NOT NULL,
  `task_name` text,
  `artikle` text,
  `in_artikle` text,
  `id_type_work` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `weight` text,
  `status` text,
  `comment` text,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id_task`, `task_name`, `artikle`, `in_artikle`, `id_type_work`, `id_user`, `date_start`, `date_end`, `weight`, `status`, `comment`, `project_id`) VALUES
(1, 'rtyrty', '', '', 5, 3, '2016-06-10', '2016-06-18', '', 'Обычный', '', 3),
(2, 'asdasdad', '', NULL, 5, 3, '0000-00-00', '0000-00-00', '', 'Срочный', '', 3),
(3, 'asdasdasd', '', NULL, 5, 3, '0000-00-00', '0000-00-00', '', 'Отложенный', '', 3),
(4, 'qwerqwer', '', NULL, 5, 3, '0000-00-00', '0000-00-00', '', 'Обычный', '', 3),
(5, 'задача', '', '', 5, 3, '2016-06-11', '2016-06-11', '', 'Обычный', '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `type_material`
--

CREATE TABLE IF NOT EXISTS `type_material` (
  `id_material` int(11) NOT NULL,
  `name_material` text,
  `material_config` longtext,
  `parrent_id` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_material`
--

INSERT INTO `type_material` (`id_material`, `name_material`, `material_config`, `parrent_id`) VALUES
(5, 'Золото 777', 's:0:"";', 0),
(6, 'Серебро', 's:0:"";', 0),
(7, 'Алмаз', 's:0:"";', 0),
(8, 'Топаз', 's:0:"";', 0),
(9, 'карат', 's:0:"";', 0),
(10, '111', 's:0:"";', 0),
(11, '2222', 's:0:"";', 8),
(12, 'qweqwe', 's:0:"";', 0),
(13, 'кварц - мелкий - 0.1 - ', 's:0:"";', 0),
(14, 'топаз -  - мелкий - 11 - желтый', 's:0:"";', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `type_product`
--

CREATE TABLE IF NOT EXISTS `type_product` (
  `id_type_product` int(11) NOT NULL,
  `name` text,
  `config` longtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_product`
--

INSERT INTO `type_product` (`id_type_product`, `name`, `config`) VALUES
(2, 'Кольца', 's:0:"";'),
(3, 'браслеты', 's:0:"";'),
(4, 'серьги', 's:0:"";'),
(5, 'караты 1', 's:0:"";');

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
-- Структура таблицы `used_task_material`
--

CREATE TABLE IF NOT EXISTS `used_task_material` (
  `id_used` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `count` float DEFAULT NULL,
  `id_task` int(11) DEFAULT NULL,
  `date_used` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `used_task_material`
--

INSERT INTO `used_task_material` (`id_used`, `id_material`, `count`, `id_task`, `date_used`) VALUES
(3, 6, 333, 2, '2016-06-09'),
(4, 6, 2, 2, '2016-06-10'),
(5, 12, 24, 2, '2016-06-10'),
(6, 14, 24, 2, '2016-06-10'),
(7, 12, 24, 2, '2016-06-10'),
(8, 5, 111, 13, '2016-06-10'),
(9, 8, 111, 13, '2016-06-10'),
(10, 8, 11145, 13, '2016-06-10'),
(11, 5, 1, 14, '2016-06-10'),
(12, 6, 2, 14, '2016-06-10'),
(13, 9, 4, 14, '2016-06-10'),
(14, 14, 5, 14, '2016-06-10');

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
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_files`);

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
-- Индексы таблицы `order_to_project`
--
ALTER TABLE `order_to_project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Индексы таблицы `Storage`
--
ALTER TABLE `Storage`
  ADD PRIMARY KEY (`id_storage`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

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
-- Индексы таблицы `used_task_material`
--
ALTER TABLE `used_task_material`
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
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
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
-- AUTO_INCREMENT для таблицы `order_to_project`
--
ALTER TABLE `order_to_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `Storage`
--
ALTER TABLE `Storage`
  MODIFY `id_storage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `type_material`
--
ALTER TABLE `type_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type_product` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT для таблицы `used_task_material`
--
ALTER TABLE `used_task_material`
  MODIFY `id_used` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
