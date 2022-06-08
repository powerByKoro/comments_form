-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2022 г., 19:09
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `comments`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user_comments`
--

CREATE TABLE `user_comments` (
  `id` int(11) NOT NULL,
  `name` text,
  `number` varchar(11) NOT NULL,
  `email` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL DEFAULT '0',
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_comments`
--

INSERT INTO `user_comments` (`id`, `name`, `number`, `email`, `date`, `likes`, `msg`) VALUES
(137, 'Петров Павел Игоревич', '88005553535', 'test1@yandex.ru', '2022-06-08 14:57:00', 1, 'Отличный сайт!'),
(138, 'Бабкина Татьяна Витальевна', '+7800555353', 'test2@yandex.ru', '2022-06-08 14:58:28', 1, 'очень крутой сайт!'),
(139, 'Гладков Сергей Октябринович', '+7800555353', 'test1@yandex.ru', '2022-06-08 14:59:01', 1, 'Крутые комментарии'),
(140, 'Вестяк Анатолий Васильевич', '+7800555353', 'test1@yandex.ru', '2022-06-08 14:59:42', 1, 'Никогда не видел таких крутых комментариев'),
(141, 'Байден Джозеф Трампович', '+7800555353', 'test1@yandex.ru', '2022-06-08 15:02:04', 1, 'Как тебе такое Илон Маск ?'),
(142, 'Карпов Андрей Владимирович', '+7800555353', 'test1@yandex.ru', '2022-06-08 15:02:49', 1, 'Зашел сюда почитать комментарии'),
(143, 'Зюганов Леонид Викторович', '+7800555353', 'test1@yandex.ru', '2022-06-08 15:03:58', 1, 'Первым делом читаю комментарии'),
(144, 'Петров Павел Васильевич', '+7800555353', 'test1@yandex.ru', '2022-06-08 15:06:13', 2, 'комментарий'),
(145, 'Васильев Стас Андреевич', '+7800555353', 'test1@yandex.ru', '2022-06-08 15:08:26', 2, 'ох уж эти комментарии'),
(146, 'Павлов Владимир Михайлович', '+7800555353', 'test1@yandex.ru', '2022-06-08 15:20:14', 2, 'Павлов Владимир Михайлович - это я!');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
