-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 12 2017 г., 12:45
-- Версия сервера: 5.5.56-cll-lve
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dkame397_owox`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `alias` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `is_private` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `content`, `is_private`) VALUES
(1, 'privat', 'Secret plan for the conquest of the world :)', 'Proin interdum, velit sit amet mollis vulputate, neque orci aliquet sapien, non feugiat quam augue a nulla. Vestibulum sed libero quis nibh pellentesque lobortis vel in turpis. Vestibulum eu tincidunt est. Duis felis quam, tempus sit amet metus eu, elementum laoreet orci. Aliquam tincidunt cursus lacus in tristique. Mauris condimentum dolor eu dui consectetur, iaculis sagittis magna facilisis. Donec vel leo id nisl sagittis consectetur. Etiam faucibus sapien erat, et eleifend sapien lacinia in. Donec vitae purus a diam malesuada egestas. Suspendisse vehicula nibh urna, a vehicula sem ultrices vitae. Sed non posuere enim. Sed malesuada tortor eget mi consequat vulputate.', 1),
(2, 'public', 'Public Information', 'Proin interdum, velit sit amet mollis vulputate, neque orci aliquet sapien, non feugiat quam augue a nulla. Vestibulum sed libero quis nibh pellentesque lobortis vel in turpis. Vestibulum eu tincidunt est. Duis felis quam, tempus sit amet metus eu, elementum laoreet orci. Aliquam tincidunt cursus lacus in tristique. Mauris condimentum dolor eu dui consectetur, iaculis sagittis magna facilisis. Donec vel leo id nisl sagittis consectetur. Etiam faucibus sapien erat, et eleifend sapien lacinia in. Donec vitae purus a diam malesuada egestas. Suspendisse vehicula nibh urna, a vehicula sem ultrices vitae. Sed non posuere enim. Sed malesuada tortor eget mi consequat vulputate.', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `facebook_id` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `image`, `facebook_id`) VALUES
(1, 'Александр Деберина', '59b7198833d47@gmail.com', '510e7b0b4300750408aea33e32962e0a', 'https://graph.facebook.com/v2.9/1928450184143021/picture?width=100&height=100', '1928450184143021');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
