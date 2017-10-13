-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 13 2017 г., 10:09
-- Версия сервера: 5.6.35
-- Версия PHP: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat_messages`
--

CREATE TABLE IF NOT EXISTS `chat_messages` (
  `msg_id` int(10) NOT NULL,
  `author` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat_messages`
--

INSERT INTO `chat_messages` (`msg_id`, `author`, `message`, `datetime`) VALUES
(1, 'Noname', 'Yo', '2017-10-11 19:00:06'),
(2, 'Alex', 'what?', '2017-10-11 19:00:16'),
(3, 'Den', 'Hi', '2017-10-11 19:00:30'),
(4, 'Miha', 'How are u?', '2017-10-11 19:00:48'),
(5, 'Miha', 'I''m fine', '2017-10-11 19:01:13'),
(6, 'Admin', 'Ban all)))', '2017-10-11 19:01:38'),
(7, 'Kate', 'o_O oh,no!', '2017-10-11 19:05:09'),
(8, 'Pink', 'let''s Rock!', '2017-10-11 19:06:07'),
(9, 'Max', 'nice chat', '2017-10-11 19:06:18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
INSERT INTO `chat_messages` (author, message) VALUES ('Vanya', 'Hello'),('Petya', 'Bye'),('Vasya', 'Pupkin');