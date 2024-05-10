-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Май 08 2024 г., 06:47
-- Версия сервера: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `garage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `mileage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `number`, `type`, `mileage`) VALUES
(0, 1249, 1, 123000),
(1, 1249, 1, 123000),
(2, 5843, 1, 123000),
(3, 8742, 1, 123000),
(4, 9843, 1, 123000),
(5, 2390, 1, 123000),
(6, 911, 1, 123000),
(7, 7398, 1, 123000),
(8, 2794, 1, 123000),
(9, 3876, 1, 123000),
(10, 4304, 1, 123000),
(11, 7050, 1, 123000);

-- --------------------------------------------------------

--
-- Структура таблицы `garage`
--

CREATE TABLE `garage` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `garage`
--

INSERT INTO `garage` (`id`, `number`, `capacity`, `manager_id`, `type`) VALUES
(1, 1, 10, 0, 2),
(2, 2, 10, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reports`
--

INSERT INTO `reports` (`id`, `number`, `type`, `mileage`, `car_id`, `user_id`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1),
(5, 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type_car`
--

CREATE TABLE `type_car` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `lifting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `type_garage`
--

CREATE TABLE `type_garage` (
  `id` int(11) NOT NULL,
  `workshop` binary(11) NOT NULL,
  `pit` binary(11) NOT NULL,
  `store` binary(11) NOT NULL,
  `lift` binary(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `type_reports`
--

CREATE TABLE `type_reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `recommendations` varchar(255) NOT NULL,
  `mileage` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `type_users`
--

CREATE TABLE `type_users` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `salary`, `type`) VALUES
(1, 'Павел', 'Петров', 2000, 1),
(2, 'Анатолий', 'Петров', 2400, 2),
(3, 'Адриан', 'Смирнов', 2200, 1),
(4, 'Аркадий', 'Иванов', 2100, 1),
(5, 'Афанасий', 'Семенов', 2500, 1),
(6, 'Василий', 'Михайлов', 2700, 1),
(7, 'Виталий', 'Федоров', 3000, 2),
(8, 'Всеволод', 'Андреев', 3100, 2),
(9, 'Геннадий', 'Степанов', 3500, 1),
(10, 'Глеб', 'Макаров', 2300, 1),
(11, 'Вячеслав', 'Кузнецов', 2250, 1),
(12, 'Гавриил', 'Попов', 2340, 2),
(13, 'Владислав', 'Ковалев', 2540, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_car`
--
ALTER TABLE `type_car`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_garage`
--
ALTER TABLE `type_garage`
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
-- AUTO_INCREMENT для таблицы `garage`
--
ALTER TABLE `garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `type_car`
--
ALTER TABLE `type_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_garage`
--
ALTER TABLE `type_garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
