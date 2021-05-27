-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 27 2021 г., 21:40
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `foodball`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `categories_id` int NOT NULL,
  `categories_name` varchar(30) NOT NULL,
  `categories_img` varchar(100) NOT NULL,
  `restaurants_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_img`, `restaurants_id`) VALUES
(1, 'fast food', 'img/s-food-fastfood.jpg', 1),
(2, 'breakfast', 'img/s-food-breakfast.jpg', 1),
(3, 'american', 'img/s-food-american.jpg', 1),
(4, 'mexican', 'img/s-food-mexican.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cheque`
--

CREATE TABLE `cheque` (
  `cheque_id` int NOT NULL,
  `cheque_cost` varchar(50) NOT NULL,
  `user_id` int NOT NULL,
  `food_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cheque`
--

INSERT INTO `cheque` (`cheque_id`, `cheque_cost`, `user_id`, `food_id`) VALUES
(1, '300', 16, 1),
(2, '1000', 16, 1),
(3, '2000', 16, 1),
(4, '13000', 16, 1),
(5, '100', 16, 1),
(6, '1000', 16, 1),
(7, '12000', 16, 1),
(8, '50', 16, 1),
(9, '10', 16, 1),
(10, '1', 16, 1),
(11, '10000', 16, 1),
(12, '200', 16, 1),
(13, '20000', 18, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `food`
--

CREATE TABLE `food` (
  `food_id` int NOT NULL,
  `food_name` varchar(20) NOT NULL,
  `food_cost` int NOT NULL,
  `food_img` varchar(100) NOT NULL,
  `restaurants_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_cost`, `food_img`, `restaurants_id`) VALUES
(1, 'burger', 360, 'img/food/burger.jpg', 1),
(2, 'salad', 200, 'img/food/salad.jpg', 1),
(3, 'cola', 80, 'img/food/cola.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `restaurants`
--

CREATE TABLE `restaurants` (
  `rest_id` int NOT NULL,
  `rest_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rest_logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rest_hover_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `restaurants`
--

INSERT INTO `restaurants` (`rest_id`, `rest_name`, `rest_logo`, `rest_hover_logo`) VALUES
(1, 'mcDonalds', 'img/mc_donalds.png', 'img/rest1.jpg'),
(2, 'PapaJohns', 'img/papajohns.svg', 'img/rest2.jpg'),
(3, 'BurgerKing', 'img/burger_king.png', 'img/rest3.jpeg'),
(4, 'VkussVil', 'img/vkuss.png', 'img/rest4.jpg'),
(5, 'StarBucks', 'img/starbucks-logo.png', 'img/rest5.jpg'),
(6, 'Dixi', 'img/dixi.svg', 'img/rest6.jpg'),
(7, 'Verniy', 'img/rest7.png', 'img/verniy.png'),
(8, 'Russkiy Dvorik', 'img/russkiy.png', 'img/rest8.png'),
(9, 'KFC', 'img/rest9.png', 'img/kfc.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `user_roles` varchar(10) NOT NULL DEFAULT 'user',
  `user_avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'img/user/user.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `address`, `user_roles`, `user_avatar`) VALUES
(1, 'kvxxxAdmin', '3b712de48137572f3849aabd5666a4e3', 'admin account', 'admin', 'img/user/admin.svg'),
(16, 'AssLocker', 'bad670f05ad869901d90a37aef62572c', 'village of Mishutino, 33', 'user', 'img/user/AssLocker.svg'),
(18, 'killer', 'bad670f05ad869901d90a37aef62572c', NULL, 'user', 'img/user/user.svg'),
(19, 'treeh', 'da64cc43c673dc18b78137fc9cd81e9a', NULL, 'user', 'img/user/user.svg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`),
  ADD KEY `restaurants_id` (`restaurants_id`);

--
-- Индексы таблицы `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`cheque_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `food_id_2` (`food_id`);

--
-- Индексы таблицы `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `restaurants_id` (`restaurants_id`);

--
-- Индексы таблицы `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rest_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cheque`
--
ALTER TABLE `cheque`
  MODIFY `cheque_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rest_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`restaurants_id`) REFERENCES `restaurants` (`rest_id`);

--
-- Ограничения внешнего ключа таблицы `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `cheque_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cheque_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`);

--
-- Ограничения внешнего ключа таблицы `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`restaurants_id`) REFERENCES `restaurants` (`rest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
