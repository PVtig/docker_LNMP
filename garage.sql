-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Июн 17 2024 г., 20:33
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
  `mileage` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `number`, `type`, `mileage`, `garage_id`, `status`) VALUES
(5, 1249, 1, 123903, 1, 1),
(6, 3245, 4, 135604, 2, 1),
(7, 4456, 5, 50000, 1, 1),
(8, 4532, 5, 50000, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `fuel_vehicle`
--

CREATE TABLE `fuel_vehicle` (
  `1` int(11) NOT NULL,
  `gas_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `fuel_vehicle`
--

INSERT INTO `fuel_vehicle` (`1`, `gas_id`, `car_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 1),
(4, 2, 4);

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
(1, 1, 5, 3, 3),
(2, 2, 6, 2, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `gas`
--

CREATE TABLE `gas` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `Octane` int(11) NOT NULL,
  `diskription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `gas`
--

INSERT INTO `gas` (`id`, `name`, `Octane`, `diskription`) VALUES
(1, 'Gasoline', 80, 'Fuel supplied for trucks'),
(2, 'Gasoline', 92, 'Universal gasoline purchased for general purpose'),
(3, 'Diesel', 45, 'Fuel suitable for use in summer'),
(4, 'Diesel', 55, 'Fuel suitable for winter use');

-- --------------------------------------------------------

--
-- Структура таблицы `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cost` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `invoices`
--

INSERT INTO `invoices` (`id`, `name`, `phone`, `email`, `cost`, `Date`) VALUES
(1, 'Jon Snow', '(665)121-5454', 'jonsnow@gmail.com', 2100, '2022-03-12'),
(2, 'Cersei Lannister', '(421)314-2288', 'cerseilannister@gmail.com', 1417, '2021-06-15'),
(3, 'Jaime Lannister', '(422)982-6739', 'jaimelannister@gmail.com', 1189, '2022-05-02'),
(4, 'Anya Stark', '(921)425-6742', 'anyastark@gmail.com', 8074, '2022-03-21'),
(5, 'Daenerys Targaryen', '(421)445-1189', 'daenerystargaryen@gmail.com', 1589, '2021-01-12'),
(6, 'Ever Melisandre', '(232)545-6483', 'evermelisandre@gmail.com', 6332, '2022-11-02'),
(7, 'Ferrara Clifford', '(543)124-0123', 'ferraraclifford@gmail.com', 5286, '2022-02-11'),
(8, 'Rossini Frances', '(222)444-5555', 'rossinifrances@gmail.com', 2123, '2021-05-02');

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
(4, 1, 3, 123903, 5, 2),
(5, 2, 3, 138987, 5, 2),
(6, 3, 3, 158987, 5, 2),
(7, 5, 3, 155555, 5, 2),
(8, 6, 3, 65000, 7, 15),
(11, 7, 3, 80000, 7, 15),
(13, 8, 3, 95000, 7, 2),
(14, 9, 3, 110000, 7, 2),
(15, 10, 3, 125000, 7, 2),
(16, 11, 1, 125500, 7, 2),
(18, 12, 1, 125700, 7, 2),
(19, 13, 1, 125800, 7, 2),
(20, 14, 1, 125850, 7, 2),
(22, 15, 1, 125900, 7, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `status_car`
--

CREATE TABLE `status_car` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status_car`
--

INSERT INTO `status_car` (`id`, `title`, `description`) VALUES
(1, 'neu car', 'The car has a mileage of up to 150 thousand kilometers and is being run-in'),
(2, 'used car', 'The car has a mileage of more than 150 thousand kilometers and is fully serviceable'),
(3, 'needs maintenance', 'consumables require replacement in accordance with operating instructions'),
(4, 'light repair needed', 'simple repairs or replacement of small components and assemblies are required'),
(5, 'complex repairs required', 'Repairs require the use of sophisticated equipment or flaw detection. Repair is not impossible on your own'),
(6, 'unsuitable for use', 'The car is not suitable for use and is awaiting write-off.');

-- --------------------------------------------------------

--
-- Структура таблицы `type_acsess`
--

CREATE TABLE `type_acsess` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_type_users` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_acsess`
--

INSERT INTO `type_acsess` (`id`, `description`, `id_type_users`) VALUES
(1, 'oil change required', 2),
(2, 'the vehicle is suitable for use', 1);

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

--
-- Дамп данных таблицы `type_car`
--

INSERT INTO `type_car` (`id`, `name`, `weight`, `lifting`) VALUES
(1, 'ZIL-131', 5000, 11900),
(2, 'URAL-4320', 8050, 15205),
(3, 'KAMAZ-4310', 7080, 15000),
(4, 'GAZ-66', 3470, 5940),
(5, 'GAZ-3308', 4150, 6450),
(6, 'KRAZ-6322', 12700, 23000),
(7, 'KRAZ-219', 11300, 23300);

-- --------------------------------------------------------

--
-- Структура таблицы `type_garage`
--

CREATE TABLE `type_garage` (
  `id` int(11) NOT NULL,
  `workshop` int(1) NOT NULL,
  `pit` int(1) NOT NULL,
  `store` int(1) NOT NULL,
  `lift` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_garage`
--

INSERT INTO `type_garage` (`id`, `workshop`, `pit`, `store`, `lift`) VALUES
(3, 1, 1, 1, 1),
(4, 1, 1, 1, 0),
(5, 1, 1, 0, 0),
(6, 1, 0, 0, 0),
(7, 0, 0, 0, 0),
(8, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `type_reports`
--

CREATE TABLE `type_reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `recommendations` varchar(255) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_reports`
--

INSERT INTO `type_reports` (`id`, `name`, `recommendations`, `access_id`) VALUES
(1, 'work shift', 'Inspect the general condition of the vehicle', 2),
(3, 'chnge oil', 'chenge oil', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type_users`
--

CREATE TABLE `type_users` (
  `id` int(11) NOT NULL,
  `title` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_users`
--

INSERT INTO `type_users` (`id`, `title`) VALUES
(1, 'driver'),
(2, 'mechanic'),
(3, 'manager');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `salary` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `phone`, `email`, `salary`, `type`) VALUES
(1, 'Павел', 'Петров', '', '', 2000, 1),
(2, 'Анатолий', 'Петров', '', '', 2400, 2),
(3, 'Адриан', 'Смирнов', '', '', 2200, 1),
(4, 'Аркадий', 'Иванов', '', '', 2100, 1),
(5, 'Афанасий', 'Семенов', '', '', 2500, 1),
(6, 'Василий', 'Михайлов', '', '', 2700, 1),
(7, 'Виталий', 'Федоров', '', '', 3000, 2),
(8, 'Всеволод', 'Андреев', '', '', 3100, 2),
(9, 'Геннадий', 'Степанов', '', '', 3500, 1),
(10, 'Глеб', 'Макаров', '', '', 2300, 1),
(11, 'Вячеслав', 'Кузнецов', '', '', 2250, 1),
(12, 'Гавриил', 'Попов', '', '', 2340, 2),
(13, 'Владислав', 'Ковалев', '', '', 2540, 1),
(14, 'Николай', 'Белозор', '', '', 3888, 2),
(15, 'Афанасий', 'Степочкин', '+4901888628', 'afanasi@gmail.com', 3500, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `garage_id` (`garage_id`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `fuel_vehicle`
--
ALTER TABLE `fuel_vehicle`
  ADD PRIMARY KEY (`1`),
  ADD KEY `gas_id` (`gas_id`),
  ADD KEY `fuel_vehicle_ibfk_1` (`car_id`);

--
-- Индексы таблицы `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `gas`
--
ALTER TABLE `gas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namber` (`number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `status_car`
--
ALTER TABLE `status_car`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_acsess`
--
ALTER TABLE `type_acsess`
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
-- Индексы таблицы `type_reports`
--
ALTER TABLE `type_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_id` (`access_id`);

--
-- Индексы таблицы `type_users`
--
ALTER TABLE `type_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `fuel_vehicle`
--
ALTER TABLE `fuel_vehicle`
  MODIFY `1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `garage`
--
ALTER TABLE `garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `gas`
--
ALTER TABLE `gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `status_car`
--
ALTER TABLE `status_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `type_acsess`
--
ALTER TABLE `type_acsess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type_car`
--
ALTER TABLE `type_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `type_garage`
--
ALTER TABLE `type_garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `type_reports`
--
ALTER TABLE `type_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type_users`
--
ALTER TABLE `type_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_car` (`id`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`),
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status_car` (`id`);

--
-- Ограничения внешнего ключа таблицы `fuel_vehicle`
--
ALTER TABLE `fuel_vehicle`
  ADD CONSTRAINT `fuel_vehicle_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `type_car` (`id`),
  ADD CONSTRAINT `fuel_vehicle_ibfk_2` FOREIGN KEY (`gas_id`) REFERENCES `gas` (`id`);

--
-- Ограничения внешнего ключа таблицы `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `garage_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_garage` (`id`);

--
-- Ограничения внешнего ключа таблицы `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `reports_ibfk_3` FOREIGN KEY (`type`) REFERENCES `type_reports` (`id`);

--
-- Ограничения внешнего ключа таблицы `type_reports`
--
ALTER TABLE `type_reports`
  ADD CONSTRAINT `type_reports_ibfk_1` FOREIGN KEY (`access_id`) REFERENCES `type_acsess` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
