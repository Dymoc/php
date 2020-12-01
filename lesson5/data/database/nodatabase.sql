-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 18 2020 г., 22:35
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
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(22,2) NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_bin NOT NULL,
  `path_img` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `size` int(255) DEFAULT NULL,
  `view` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `imgs`
--

INSERT INTO `imgs` (`id`, `name`, `path_img`, `size`, `view`) VALUES
(1, '1', '/img/', NULL, 5),
(2, '2', '/img/', NULL, 5),
(3, '3', '/img/', NULL, 6),
(4, '4', '/img/', NULL, 29),
(5, '5', '/img/', NULL, 11),
(6, '6', '/img/', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','deleted','draft') NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `status`) VALUES
(1, 'The National (Объединенные Арабские Эмираты): в ОАЭ разрешили употребление алкоголя и сожительство вне брака', 'Употребление спиртных напитков и совместное проживание вне брака отныне не считаются уголовными преступлениями в Объединенных Арабских Эмиратах (ОАЭ). Это — крупнейший за последние годы пересмотр правовой системы, который затронул все — от развода и правил наследования до употребления алкоголя.', '2020-11-09 15:26:57', 'draft'),
(2, 'Бюджетный Nissan Magnite запатентовали в России', 'Кроссовер Nissan Magnite был представлен в летом 2020 года. Автомобиль создавался специально для рынка Индии, однако не исключено, что он появится в продаже в других странах. Его дебют должен состояться в начале 2021 года.', '2020-11-09 15:27:45', 'draft');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
