-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 22 2018 г., 17:22
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mypost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`) VALUES
(1, 0, 'Раздел 1'),
(2, 0, 'Раздел 2'),
(3, 0, 'Раздел 3'),
(4, 1, 'Раздел 1.1'),
(5, 1, 'Раздел 1.2'),
(6, 4, 'Раздел 1.1.1'),
(7, 2, 'Раздел 2.1'),
(8, 2, 'Раздел 2.2'),
(9, 3, 'Раздел 3.1');

-- --------------------------------------------------------

--
-- Структура таблицы `category_`
--

CREATE TABLE `category_` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_`
--

INSERT INTO `category_` (`id`, `title`, `parent_id`) VALUES
(1, 'Автомобильные Марки', NULL),
(2, 'Футбольные Клубы', NULL),
(3, 'Porsche', 1),
(4, 'Ferrari', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previewcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authtor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datapost` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `previewcontent`, `content`, `image`, `authtor`, `datapost`, `category_id`) VALUES
(1, 'Porsche', 'Porsche (По́рше, повна оригінальна назва — Die Dr. Ing. h.c. F. Porsche AG, скор. Porsche AG (укр. Акціонерне товариство Порше) — німецька автобудівна компанія, що з 2007 року на 100 % належала холдингу Porsche Automobil Holding SE. З 7 грудня 2009 49,9 %', 'Події\r\nУ післявоєнній Німеччині, частина, як правило, в дефіциті, тому 356 автомобіль використовували компоненти від Volkswagen Beetle, в тому числі корпус двигуна від його двигуна внутрішнього згоряння, коробка передач, а також кілька частин, які викорис', 'web/images/porsche.jpg', 'maksimus', '2018-05-16 00:00:00', 1),
(2, 'Ferrari', 'Ferrari S.p.A. (кратко: Ferrari — рус. «Ферра́ри») — итальянская компания, выпускающая спортивные и гоночные автомобили, базирующаяся в Маранелло. Основана в 1928 году Энцо Феррари как Scuderia Ferrari, компания спонсировала гонщиков и производила гоночны', 'В начале 1970-х годов появилась модель «Dino», названная в честь умершего сына Коммендаторе, с центрально расположенным двигателем производства ФИАТ— V-образным 6-цилиндровым; модель выпускалась и в 8-цилиндровом варианте, но 6-цилиндровая модель считаетс', 'web/images/ferrari.jpg', 'maksimus', '2018-05-16 23:50:00', 1),
(3, 'Maserati', 'Мазераті (італ. Maserati), італійська компанія, що спеціалізується на випуску комфортабельних спортивних автомобілів з ефектною зовнішністю і високими динамічними показниками. Входить до складу найбільшої італійської автомобільної корпорації «Fiat Auto Sp', 'Історія\r\n\r\n1957 Maserati 200SI на Scarsdale Concours\r\nКожен з шести братів Мазераті — Карло, Біндо, Альф\'єрі, Маріо, Етторе і Ернесто — в тій чи іншій мірі, вніс свій внесок до розвитку компанії, яка досі носить їхнє ім\'я. Карло, старший з братів, першим ', 'web/images/maserati.jpg', 'maksimus', '2018-05-15 18:00:00', 1),
(4, 'Nissan', 'Nissan Motor Co., Ltd. (яп. 日産自動車株式会社 ниссан дзидо:ся кабусикигайся) — японский автопроизводитель, один из крупнейших в мире. Компания основана в 1933 году. По состоянию на 2010 год занимает 8-е место в мировом рейтинге автопроизводителей (3-е среди японс', 'История\r\n\r\nПервый президент компании — Ёсисуки Аикава (яп. 鮎川義介), 1939 год.\r\nДатой основания корпорации считается 26 декабря 1933 года, когда в результате слияния компаний «Тобата имоно» и «Нихон сангё» была создана новая компания, которая с 1 июня 1934 г', 'web/images/nissan.jpg', 'alena', '2018-05-14 09:00:00', 1),
(5, 'Динамо Киев', '\r\n«Дина́мо» (укр. «Динамо») — украинский футбольный клуб из города Киева, постоянный участник чемпионатов Украины по футболу. Самый титулованный футбольный клуб СССР и Украины[4].\r\n\r\nКлуб основан 13 мая 1927 года[5]. Первая зарегистрированная игра состоялась 17 июля 1928 года против одесского «Динамо» (2:2). В советский период клуб выиграл 13 чемпионатов СССР, 9 Кубков СССР, 3 Суперкубка СССР. Один из двух футбольных клубов (вместе с московским «Динамо»), участвовавший во всех чемпионатах СССР в высшем дивизионе. Стал первой не московской командой, выигравшей чемпионат СССР.', 'История\r\nОснование\r\n13 мая 1927 был официально зарегистрирован Устав Киевского пролетарского спортивного общества «Динамо» Межведомственной комиссией по делам общественных организаций и союзов Киевского округа. Под флагом «Динамо» собрались представители ОГПУ, футболисты которого защищали цвета клуба «Совторгслужащие». Поэтому попытки руководства «Динамо» создать во время сезона свою футбольную команду успехом не закончились, так как «Совторгслужащие» были одними из главных претендентов на призовые места в чемпионате Киева и создание «Динамо» было весьма рискованным делом. Поэтому первое упоминание о футбольном клубе «Динамо» появилось лишь 5 апреля 1928 года в газете «Вечерний Киев»:\r\n\r\n«	Киевское спортивное общество «Динамо» в текущем году организовывает свою футбольную команду. «Динамо» поднял вопрос перед Окрсофиком о включении команды в розыгрыши матчей.	»\r\nИменно тогда по инициативе Семёна Западного, начальника Киевского ОГПУ, была основана футбольная команда. Его заместитель — Сергей Барминский стал формировать состав команды, в который вошли как кадровые чекисты, так и футболисты других киевских команд. Причём все футболисты или входили в сборную Киева, или были чемпионами города.\r\n\r\nИ только 1 июля 1928 года клуб провёл первую официальную игру.', 'web/images/dinamo.jpg', 'lena', '2018-05-18 00:00:00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `title`) VALUES
(1, 'Авто'),
(2, 'Футбол');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_`
--
ALTER TABLE `category_`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C1727ACA70` (`parent_id`,`id`) USING BTREE;

--
-- Индексы таблицы `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8D12469DE2` (`category_id`);

--
-- Индексы таблицы `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `IDX_5ACE3AF04B89032C` (`post_id`),
  ADD KEY `IDX_5ACE3AF0BAD26311` (`tag_id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `category_`
--
ALTER TABLE `category_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_`
--
ALTER TABLE `category_`
  ADD CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category_` (`id`);

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category_` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `FK_5ACE3AF04B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5ACE3AF0BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
