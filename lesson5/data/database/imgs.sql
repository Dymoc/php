-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 18 2020 г., 21:38
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nodatabase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_bin NOT NULL,
  `path_img` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `size` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `imgs`
--

INSERT INTO `imgs` (`id`, `name`, `path_img`, `size`) VALUES
(1, '1', '/img/', NULL),
(2, '2', '/img/', NULL),
(3, '3', '/img/', NULL),
(4, '4', '/img/', NULL),
(5, '5', '/img/', NULL),
(6, '6', '/img/', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
