-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 30 2015 г., 21:11
-- Версия сервера: 5.6.27-0ubuntu1
-- Версия PHP: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `OnlineTest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(5) NOT NULL,
  `answer` text NOT NULL,
  `trueAnswer` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id`, `answer`, `trueAnswer`) VALUES
(146, 'echo $arr;', 0),
(147, 'print_r($arr);', 1),
(148, 'Ð­Ñ‚Ð¾ Ð²Ð¾Ð·Ð¼Ð¾Ð¶Ð½Ð¾ ÑÐ´ÐµÐ»Ð°Ñ‚ÑŒ Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ñ‡ÐµÑ€ÐµÐ· Ñ†Ð¸ÐºÐ».', 0),
(149, 'print $arr;', 0),
(150, 'var_dump($arr);', 1),
(154, '/', 0),
(155, '.', 1),
(156, '@', 0),
(157, '&', 0),
(158, '""', 0),
(159, ' integer, float, string, boolean,object, resource, NULL', 0),
(160, '4 ÑÐºÐ°Ð»ÑÑ€Ð½Ñ‹Ñ… Ñ‚Ð¸Ð¿Ð°, 2 ÐºÐ¾Ð¼Ð¿Ð»ÐµÐºÑÐ½Ñ‹Ñ… (ÑÐ¾ÑÑ‚Ð°Ð²Ð½Ñ‹Ñ…) Ñ‚Ð¸Ð¿Ð°, 2 ÑÐ¿ÐµÑ†Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ñ… Ñ‚Ð¸Ð¿Ð°.', 1),
(161, 'boolean, object, integer, float, string, function, resource, NULL.', 0),
(162, 'string, array, constant, resource, boolean, integer, float, NULL.', 0),
(163, 'boolean, integer, float, string, array, object, resource, NULL.', 1),
(164, 'ÐšÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ‚Ð¾Ñ€ â€“ ÑÑ‚Ð¾ Ð¼ÐµÑ‚Ð¾Ð´ __construct(), Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð¿Ñ€Ð¸ ÑÐ¾Ð·Ð´Ð°Ð½Ð¸Ð¸ ÑÐºÐ·ÐµÐ¼Ð¿Ð»ÑÑ€Ð° ÐºÐ»Ð°ÑÑÐ° Ð¿Ñ€Ð¸ Ð¿Ð¾Ð¼Ð¾Ñ‰Ð¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ð¾Ð³Ð¾ ÑÐ»Ð¾Ð²Ð° this.', 0),
(165, 'ÐšÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ‚Ð¾Ñ€ â€“ ÑÑ‚Ð¾ Ð¼ÐµÑ‚Ð¾Ð´ __construction(), Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð¿Ñ€Ð¸ ÑÐ¾Ð·Ð´Ð°Ð½Ð¸Ð¸ ÑÐºÐ·ÐµÐ¼Ð¿Ð»ÑÑ€Ð° ÐºÐ»Ð°ÑÑÐ° Ð¿Ñ€Ð¸ Ð¿Ð¾Ð¼Ð¾Ñ‰Ð¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ð¾Ð³Ð¾ ÑÐ»Ð¾Ð²Ð° this.', 0),
(166, 'ÐšÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ‚Ð¾Ñ€ â€“ ÑÑ‚Ð¾ Ð¼ÐµÑ‚Ð¾Ð´ __construct(), Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð¿Ñ€Ð¸ ÑÐ¾Ð·Ð´Ð°Ð½Ð¸Ð¸ ÑÐºÐ·ÐµÐ¼Ð¿Ð»ÑÑ€Ð° ÐºÐ»Ð°ÑÑÐ° Ð¿Ñ€Ð¸ Ð¿Ð¾Ð¼Ð¾Ñ‰Ð¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ð¾Ð³Ð¾ ÑÐ»Ð¾Ð²Ð° new.', 1),
(167, 'ÐšÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ‚Ð¾Ñ€ â€“ ÑÑ‚Ð¾ ÐºÐ»Ð°ÑÑ __construct(), Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð¿Ñ€Ð¸ ÑÐ¾Ð·Ð´Ð°Ð½Ð¸Ð¸ ÑÐºÐ·ÐµÐ¼Ð¿Ð»ÑÑ€Ð° ÐºÐ»Ð°ÑÑÐ° Ð¿Ñ€Ð¸ Ð¿Ð¾Ð¼Ð¾Ñ‰Ð¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ð¾Ð³Ð¾ ÑÐ»Ð¾Ð²Ð° new.', 0),
(168, 'ÐšÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ‚Ð¾Ñ€ â€“ ÑÑ‚Ð¾ Ð¼ÐµÑ‚Ð¾Ð´ __construction(), Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð¿Ñ€Ð¸ ÑÐ¾Ð·Ð´Ð°Ð½Ð¸Ð¸ ÑÐºÐ·ÐµÐ¼Ð¿Ð»ÑÑ€Ð° ÐºÐ»Ð°ÑÑÐ° Ð¿Ñ€Ð¸ Ð¿Ð¾Ð¼Ð¾Ñ‰Ð¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ð¾Ð³Ð¾ ÑÐ»Ð¾Ð²Ð° new.', 0),
(169, 'Ð’  PHP 4  Ð¸ PHP 5 Ð¾Ð±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾.', 0),
(170, 'ÐÐµ Ð¾Ð±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾ Ð²Ð¾ Ð²ÑÐµÑ… Ð²ÐµÑ€ÑÐ¸ÑÑ… PHP.', 0),
(171, 'ÐžÐ±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾.', 0),
(172, 'Ð¡ Ð²ÐµÑ€ÑÐ¸Ð¸ PHP 4 Ð½Ðµ Ð¾Ð±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾.', 0),
(173, 'Ð’ PHP 4 â€“ Ð±Ñ‹Ð»Ð¾ Ð¾Ð±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾. Ð’ PHP 5 Ð½Ðµ Ð¾Ð±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾.', 1),
(179, 'Ð˜Ð½ÐºÐ°Ð¿ÑÑƒÐ»ÑÑ†Ð¸Ñ. ', 1),
(180, ' ÐŸÐ¾Ð»Ð¸Ð¼Ð¾Ñ€Ñ„Ð¸Ð·Ð¼. ', 1),
(181, 'ÐÐ±ÑÑ‚Ñ€Ð°ÐºÑ†Ð¸Ñ.', 0),
(182, 'ÐÐ°ÑÐ»ÐµÐ´Ð¾Ð²Ð°Ð½Ð¸Ðµ.', 1),
(183, 'ÐšÐ»Ð¾Ð½Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ.', 0),
(188, 'ÐšÐ»Ð°ÑÑ â€“ ÑÑ‚Ð¾ Ñ‚Ð¸Ð¿ Ð´Ð°Ð½Ð½Ñ‹Ñ…, Ð° Ð¾Ð±ÑŠÐµÐºÑ‚ â€“ ÑÐºÐ·ÐµÐ¼Ð¿Ð»ÑÑ€ Ñ‚Ð¸Ð¿Ð° ÐºÐ»Ð°ÑÑ. ', 1),
(189, 'ÐžÐ±ÑŠÐµÐºÑ‚ â€“ ÑÑ‚Ð¾ Ñ‚Ð¸Ð¿ Ð´Ð°Ð½Ð½Ñ‹Ñ…, Ð° ÐºÐ»Ð°ÑÑ â€“ ÑÐºÐ·ÐµÐ¼Ð¿Ð»ÑÑ€ Ñ‚Ð¸Ð¿Ð° Ð¾Ð±ÑŠÐµÐºÑ‚. ', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(5) NOT NULL,
  `question` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id`, `question`) VALUES
(48, 'Ð•ÑÑ‚ÑŒ Ð¼Ð°ÑÑÐ¸Ð² $arr. ÐšÐ°Ðº Ð²Ñ‹Ð²ÐµÑÑ‚Ð¸ Ð²ÑÐµ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ñ‹ Ð¼Ð°ÑÑÐ¸Ð²Ð° $arr?'),
(49, 'ÐšÐ°ÐºÐ¾Ð¹ Ð¸Ð· ÑÐ»ÐµÐ´ÑƒÑŽÑ‰Ð¸Ñ… Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ð¾Ð² Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐµÑ‚ÑÑ Ð´Ð»Ñ ÐºÐ¾Ð½ÐºÐ°Ñ‚ÐµÐ½Ð°Ñ†Ð¸Ð¸ ÑÑ‚Ñ€Ð¾Ðº?'),
(50, 'ÐÐ°Ð·Ð¾Ð²Ð¸Ñ‚Ðµ Ñ‚Ð¸Ð¿Ñ‹  Ð´Ð°Ð½Ð½Ñ‹Ñ… Ð² PHP.'),
(51, ' Ð§Ñ‚Ð¾ Ñ‚Ð°ÐºÐ¾Ðµ ÐºÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ‚Ð¾Ñ€?'),
(52, 'ÐžÐ±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾ Ð»Ð¸ Ð¿Ð¸ÑÐ°Ñ‚ÑŒ Ð·Ð°ÐºÑ€Ñ‹Ð²Ð°ÑŽÑ‰Ð¸Ð¹ Ñ‚ÐµÐ³ ?> Ð² ÐºÐ¾Ð½Ñ†Ðµ ÑÐºÑ€Ð¸Ð¿Ñ‚Ð°?'),
(54, 'ÐžÑÐ½Ð¾Ð²Ð½Ñ‹Ðµ Ð¿Ñ€Ð¸Ð½Ñ†Ð¸Ð¿Ñ‹ ÐžÐžÐŸ.'),
(56, ' Ð§ÐµÐ¼ Ð¾Ñ‚Ð»Ð¸Ñ‡Ð°ÐµÑ‚ÑÑ ÐºÐ»Ð°ÑÑ Ð¾Ñ‚ Ð¾Ð±ÑŠÐµÐºÑ‚Ð°?');

-- --------------------------------------------------------

--
-- Структура таблицы `question_answer`
--

CREATE TABLE IF NOT EXISTS `question_answer` (
  `question_id` int(5) DEFAULT NULL,
  `answer_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question_answer`
--

INSERT INTO `question_answer` (`question_id`, `answer_id`) VALUES
(48, 146),
(48, 147),
(48, 148),
(48, 149),
(48, 150),
(49, 154),
(49, 155),
(49, 156),
(49, 157),
(49, 158),
(50, 159),
(50, 160),
(50, 161),
(50, 162),
(50, 163),
(51, 164),
(51, 165),
(51, 166),
(51, 167),
(51, 168),
(52, 169),
(52, 170),
(52, 171),
(52, 172),
(52, 173),
(54, 179),
(54, 180),
(54, 181),
(54, 182),
(54, 183),
(56, 188),
(56, 189);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question_answer`
--
ALTER TABLE `question_answer`
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `question_answer`
--
ALTER TABLE `question_answer`
  ADD CONSTRAINT `question_answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_answer_ibfk_2` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
