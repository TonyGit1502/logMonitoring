-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2017 г., 00:57
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `log_monitoring`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `groupID` int(5) UNSIGNED NOT NULL,
  `groupName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`groupID`, `groupName`) VALUES
(1, 'Преподаватель'),
(2, 'ГИП-113'),
(3, 'ГИП-114'),
(4, 'ГИП-115');

-- --------------------------------------------------------

--
-- Структура таблицы `issues`
--

CREATE TABLE `issues` (
  `issueID` int(5) UNSIGNED NOT NULL,
  `issueText` varchar(255) NOT NULL,
  `issueComplete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `issues`
--

INSERT INTO `issues` (`issueID`, `issueText`, `issueComplete`) VALUES
(2, 'Разработать структуру страниц \"Дисциплины\", \"Общая статистика групп\"', 1),
(3, 'Доработать дизайн страниц \"Группы\" и \"Новости\"', 1),
(4, 'Создать дамп базы и развернуть его на планшете. Предварительно установить на планшет Open Server', 1),
(5, 'Доработать эту таблицу (сохранить отметку о выполнении таска)', 1),
(6, 'Доработать вывод и добавление оценок на странице \"Дисциплины\"', 1),
(7, 'Доработать функционал кнопок \"Изменить задание\" и \"Удалить задание\" (страница \"Дисциплины\")', 0),
(8, 'Доработать страницу \"Статистика\" (Графики и пояснения к ним)', 0),
(9, 'Написать подробную инструкцию к проекту', 0),
(10, 'Решить проблему со входом в ИС (входит лишь со второго раза)', 0),
(11, 'Обдумать идею добавления расписания в содержимое проекта(а также календаря)', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `marks`
--

CREATE TABLE `marks` (
  `markID` int(5) UNSIGNED NOT NULL,
  `userID` int(5) NOT NULL,
  `subjectID` int(5) NOT NULL,
  `taskID` int(5) NOT NULL,
  `mark` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `marks`
--

INSERT INTO `marks` (`markID`, `userID`, `subjectID`, `taskID`, `mark`) VALUES
(1, 1, 1, 1, 5),
(2, 1, 1, 2, 5),
(3, 1, 1, 3, 4),
(4, 1, 1, 4, 5),
(5, 1, 1, 5, 3),
(6, 1, 2, 1, 3),
(7, 1, 2, 2, 5),
(8, 1, 2, 3, 4),
(9, 1, 2, 4, 5),
(10, 1, 3, 1, 4),
(11, 1, 3, 2, 5),
(12, 1, 3, 3, 3),
(13, 1, 3, 4, 5),
(14, 1, 3, 5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `newsID` int(5) UNSIGNED NOT NULL,
  `newsAuthor` varchar(50) NOT NULL,
  `newsTitle` varchar(100) NOT NULL,
  `newsText` text NOT NULL,
  `newsDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`newsID`, `newsAuthor`, `newsTitle`, `newsText`, `newsDate`) VALUES
(1, 'admin', 'Начало занимательного веб-путешествия=)ПОГНАЛИ!!!', 'Всем большой и горячий ПРИВЕТ!!! Сегодня я наконец-таки дошел до реализации одной из самых информативных частей своего программного продукта, а именно - до новостной ленты. На данный момент не могу сказать, что доволен своей работой на все 100%....многое нужно корректировать, а некоторые моменты и вовсе создавать с 0 (либо же отказаться от реализации этих фрагментов, что было бы гораздо проще, но не совсем правильно). Но, несмотря на, казалось бы, такой немаленький набор минусов, настрой на продуктивную и продолжительную работу не пропадает. Этому я весьма рад и в то же время удивлен, ибо обычно в таких ситуациях веду себя иначе: пропадает настрой, сосредоточенность, начинаю психовать и злиться. Работая над курсовой, замечаю, как начинают прокачиваться навыки программиста и, чёрт возьми, мне это нравится=) Ну что ж, пойду дальше кодить и шкодить. Окружающая обстановка как раз располагает к дальнейшей продуктивной работе: бокал свежезаваренного горячего чая с лимоном, приятная музыка, хорошее интернет-соединение, пару-троек идей, которые попытаюсь воплотить и грядущая ночь.\r\n<br><br>\r\nP.S. Спонтанно получился такой незатейливый \"эскиз\" блога. Может в будущем решусь создать настоящий...Ну а пока что здесь буду записывать свои текущие результаты, траблы(которые, надеюсь, будут по минимуму), свои впечатления, идеи и планы.', '2017-04-16'),
(2, 'admin', 'Что я сделал за сегодня или как ложиться спать в 4:30 утра', 'Что могу сказать. Сильно продвинуться, увы, не удалось, однако пишу этот пост уже под утро. Не сказал бы, что задача была столь трудной...нет. Она скорее объемная и громоздкая (заполнение базы данных \"таблица users\") + исправление мелочей (на них тоже ушло немало времени). Только исправлял одну, как сразу же находил следующую. Приятная музыка и горячий чай несомненно выполнили свою задачу=))<br>Завтра начну оформлять страницу \"группы\"...предстоит освоить canvas для построения диаграмм и графиков. Также стоит поработать над другим курсачом...что-то совсем забыл про него...\r\n', '2017-04-16'),
(3, 'admin', 'День с КПД=0:(', 'Доброго времени суток! Сегодня у меня получился крайне неплодотворный день. Большую часть дня я проспал (следствие прошлой бессонной ночи). Все, что я планировал, так и не притворилось в жизнь. Я бы рад списать этот промах на что-нибудь или кого-нибудь, но по факту - виноват в нем лишь я сам. Это следствие моей недисциплинированности и чрезмерно выросшей ЛЕНИ!!!\r\nПОРА С НЕЙ БОРОТЬСЯ! Иначе даже самые несущественные, порой абсурдные планы будут заранее обречены на провал. Пора становиться тем, кем хотел видеть себя всю свою сознательную жизнь. И начну это сразу после нескольких часов сна.<br>Сегодня пересмотрел набросок страницы \"Группы\". Теперь в ней будут отображаться все группы, указанные в БД (ну кроме \"Преподавателей\", конечно) Помогла пересмотреть представление родная сестренка, а также вдохновила меня на несколько интересных задумок. Их предстоит еще обдумать, но начало положено, а это - ГЛАВНОЕ! <br><br>Начинается новая неделя, которая, надеюсь, удивит меня приятными, насыщенными событиями=))    ', '2017-04-17'),
(4, 'admin', 'А кодить, пока все пишут лекцию, классно=)', 'И снова всем громадный привет=) Сегодня я изрядно вымотался, поэтому сильно разглагольствовать не буду. Небольшими шагами постепенно приближаюсь к концу проекта. Удалось реализовать вывод таблицы \"users\", однако потратил много времени на вывод названия группы...черт, даже смешно. Впредь надо быть ВНИМАТЕЛЬНЕЕ! Хотя бы для того, чтобы не тратить драгоценное время попусту. Также создал 2 страницы (Статистика и Дисциплины) и оформил их базовым стилем сайта. В панели навигации они последние (может со временем добавлю еще что-нибудь.  сейчас с фантазией не очень) Еще зарегистрировался на бесплатном хостинге 000webhost.com. Никита был прав. После обновы он действительно выглядит великолепно. Единственная, для меня, беда - он англоязычный. Ну что ж, это еще одна возможность прокачивать свой хромой английский. Так что пасовать не буду. <br><br>А теперь пора на боковую. Всем хорошего кодинга и приятных снов) ', '2017-04-19'),
(5, 'admin', 'Ну здравствуй, майский интенсив!!!', 'Доброй ночи всем, кому сейчас не спится) На связи Зыблев Антон. Настроение целый день было довольно поганым, и поэтому, чтобы не тратить время попусту, я продолжить работу над своей курсовой. Начал пилить долгожданную страницу \"Дисциплины\". Очень долго не мог подключить стили, но, почистив историю браузера, мне все-таки удалось сделать это. Вывел таблицу успеваемости, а также оформил \"шапку\" таблицы. Больше всего сейчас беспокоит проблема с cookie. Она довольно таки часто не создается, и я не могу понять, почему именно. Мне явно не хватает опыта и знаний в этой области. Попробую проконсультироваться у друга. <br><br>А тем временем дэдлайн все близится, причем с невероятной скоростью. УЖЕ 7 МАЯ! Остается <strong>8</strong> дней до защиты, КАРЛ!!! Самое время послать на три веселых свою лень и начать активно работать над 2 курсачом. Приступлю к этому сразу после нескольких часов сна. <br><br>В общем, меня ждет <strong>огромная</strong> гора работы.', '2017-05-07'),
(6, 'admin', 'Продолжение интенсива...', 'Вот наступило 10 число, а у меня так и нет ничего готового, даже практической части. А про теоретическую вообще говорить боюсь. Остается 5 дней до защиты курсового проекта. Кажется настало то время, когда со сном придется ненадолго расстаться. Нужно закрыть эту сессию на отлично\n<br>\nКоротко о том, что сделал сегодня: \n1) Добавление оценок в базу(Есть проблема с выводом)\n2) В таблицу \"Users\" добавлено поле \"userGender\"\n<br>\nМда...получилось совсем коротко. Ну да ладно. Компенсирую это завтра, а точнее, сегодня. На часах уже 2:30 :D \n<br>\nДоброй ночи всем!!!', '2017-05-10'),
(7, 'admin', 'Среда с привкусом понедельника', 'Всем горячий и громадный ПРИВЕТ!!! Из заголовка новости становится понятно, что денёк сегодня выдался непростым. Большую часть времени потратил на кодинг курсовой работы, которую не терпится завершить. Сегодня удалось построить первые графики с помощью плагина на js под названием charts.js. Пользоваться им одно удовольствие. Весь функционал ооочень простой! К тому же есть документация, в которой все весьма подробно расписано. Еще поправил дизайн новостей(добавил немного светлых тонов). Проект начинает приобретать изящность, динамику. Это именно то, чего я так стараюсь добиться. Однако, не стоит расслабляться!!! Ведь помимо этого курсача есть еще и второй, который, к слову, сдавать через 4 ДНЯ!!! В голове так и крутится идея: сдать этот проект и по ТПД, и по Проектированию Интерфейсов. Формулировки заданий, конечно, отличаются, но не противоречат друг другу. Пожалуй, эта идея будет моим планом \"Б\". Как писал выше, впереди еще много работы. Поэтому надо сделать перерыв и восстановить силы=)) <br><br>Всем желаю всего самого наилучшего!=))) Доброй ночи!', '2017-05-11'),
(8, 'admin', 'Ох уж эта дождливая пятница...', 'Доброй ночи всем) Есть желание, и, самое главное, повод поделиться успехами. Довел-таки наконец  таблицу \"Доработки\" на главной странице до нужного уровня. Помимо этого, разобрался с добавлением, сохранением оценок в таблице. <br>Проект уверенно приближается к финишной черте. Остается лишь доработать графики, добавить существенный контент на страницы(если такой необходим), написать инструкцию для \"подопытных кроликов\"...то есть, для счастливчиков=) Хотя последнее, скорее всего, будет относится к пояснительной записке. Её оформлением займусь позже. <br>А тем временем на часах <b>2:50.</b> Пора бы уже идти на боковую. Доброй ночи=))', '2017-05-13');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(5) UNSIGNED NOT NULL,
  `subjectName` varchar(100) NOT NULL,
  `subjectTeacher` varchar(100) NOT NULL,
  `taskID` int(5) NOT NULL,
  `markID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`subjectID`, `subjectName`, `subjectTeacher`, `taskID`, `markID`) VALUES
(1, 'Проектирование интерфейсов', 'Козлов В.В.', 0, 0),
(2, 'Операционные системы', 'Козлов В.В.', 0, 0),
(3, 'Введение в Qt', 'Шаталов Р.Б.', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `taskID` int(5) UNSIGNED NOT NULL,
  `subjectID` int(5) UNSIGNED NOT NULL,
  `taskName` varchar(255) NOT NULL,
  `taskText` varchar(255) NOT NULL,
  `taskDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`taskID`, `subjectID`, `taskName`, `taskText`, `taskDate`) VALUES
(1, 1, 'Задание 1', 'Описание 1 задания', '2017-05-01'),
(2, 1, 'Задание 2', 'Описание 2 задания', '2017-05-02'),
(3, 1, 'Задание 3', 'Описание 3 задания', '2017-05-03'),
(4, 1, 'Задание 4', 'Описание 4 задания', '2017-05-04'),
(5, 1, 'Задание 5', 'Описание 5 задания', '2017-05-05'),
(6, 2, 'Задание 1', 'Описание 1 задания', '2017-05-01'),
(7, 2, 'Задание 2', 'Описание 2 задания', '2017-05-02'),
(8, 2, 'Задание 3', 'Описание 3 задания', '2017-05-03'),
(9, 2, 'Задание 4', 'Описание 4 задания', '2017-05-04'),
(10, 2, 'Задание 5', 'Описание 5 задания ', '2017-05-05'),
(11, 3, 'Задание 1', 'Описание 1 задания', '2017-05-01'),
(12, 3, 'Задание 2', 'Описание 2 задания', '2017-05-02'),
(13, 3, 'Задание 3', 'Описание 3 задания', '2017-05-03'),
(14, 3, 'Задание 4', 'Описание 4 задания', '2017-05-04'),
(15, 3, 'Задание 5', 'Описание 5 задания', '2017-05-05');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userID` int(5) UNSIGNED NOT NULL,
  `userLogin` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userFIO` varchar(100) NOT NULL,
  `userDateBirth` date NOT NULL,
  `userGender` varchar(7) NOT NULL,
  `userPhoneNumber` varchar(20) NOT NULL,
  `userCity` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `groupID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `userLogin`, `userPassword`, `userFIO`, `userDateBirth`, `userGender`, `userPhoneNumber`, `userCity`, `userEmail`, `groupID`) VALUES
(1, 'admin', 'admin', 'user', '1996-01-01', 'мужской', '+7 (999)-999-99-99', 'Moskow', 'admin@gmail.com', 1),
(2, 'balabashina_GIP114', '5001', 'Балабашина Юлия', '1996-01-18', 'женский', '+7 (991)-319-93-01', 'Новокуйбышевск', 'balabashina@mail.ru', 3),
(3, 'bulychev_GIP114', '5002', 'Булычёв Александр', '1996-08-12', 'мужской', '+7 (992)-773-66-71', 'Новокуйбышевск', 'bulychev@mail.ru', 3),
(4, 'grishin_GIP114', '5003', 'Гришин Анатолий', '1996-06-22', 'мужской', '+7 (946)-374-48-38', 'Самара', 'grishin@mail.ru', 3),
(5, 'gurinovich_GIP114', '5004', 'Гуринович Лада', '1996-10-18', 'женский', '+7 (996)-263-37-21', 'Самара', 'gurinovich@gmail.com', 3),
(6, 'egorov_GIP114', '5005', 'Егоров Алексей', '1996-02-11', 'мужской', '+7 (936)-273-92-91', 'Самара', 'egorov@gmail.com', 3),
(7, 'zyblev_GIP114', '5006', 'Зыблев Антон', '1996-02-15', 'мужской', '+7 (932)-739-96-21', 'Новокуйбышевск', 'a.zyblev9@gmail.com', 3),
(8, 'knyazev_GIP114', '5007', 'Князев Александр', '1996-09-04', 'мужской', '+7 (982)-783-72-91', 'Самара', 'knyazev@mail.ru', 3),
(9, 'kutepova_GIP114', '5008', 'Кутепова Евгения', '1996-01-10', 'женский', '+7 (937)-366-71-81', 'Новокуйбышевск', 'kutepova@gmail.com', 3),
(10, 'marcinevskij_GIP114', '5009', 'Марциневский Илья', '1996-02-09', 'мужской', '+7 (873)-628-77-71', 'Самара', 'marcinevskij@mail.ru', 3),
(11, 'moleva_GIP114', '5010', 'Молева Наталия', '1996-09-30', 'женский', '+7 (926)-671-79-31', 'Новокуйбышевск', 'moleva@gmail.com', 3),
(12, 'atanova_GIP113', '3001', 'Атанова Марина', '1995-02-02', 'женский', '+7 (936)-374-67-21', 'Самара', 'atanova@mail.ru', 2),
(13, 'barotova_GIP113', '3002', 'Баротова Анна', '1995-01-09', 'женский', '+7 (936)-782-78-11', 'Жигулевск', 'barotova@mail.ru', 2),
(14, 'belyaev_GIP113', '3003', 'Беляев Александр', '1995-01-12', 'мужской', '+7 (926)-799-47-28', 'Самара', 'belyaev@mail.ru', 2),
(15, 'borisova_GIP113', '3004', 'Борисова Ольга', '1995-02-10', 'женский', '+7 (936)-189-01-63', 'Самара', 'borisova@gmail.com', 2),
(16, 'valinurov_GIP113', '3005', 'Валинуров Камиль', '1995-09-21', 'мужской', '+7 (923)-803-01-37', 'Самара', 'valinurov@mail.ru', 2),
(17, 'gordeev_GIP113', '3006', 'Гордеев Сергей', '1995-10-08', 'мужской', '+7 (939)-873-73-61', 'Самара', 'gordeev@mail.ru', 2),
(18, 'gracheva_GIP113', '3007', 'Грачева Мария', '1996-01-19', 'женский', '+7 (923)-738-81-91', 'Жигулевск', 'gracheva@gmail.com', 2),
(19, 'dautov_GIP113', '3007', 'Даутов Руслан', '1995-08-26', 'мужской', '+7 (883)-713-88-39', 'Самара', 'dautov@gmail.com', 2),
(20, 'denisov_GIP113', '3009', 'Денисов Виктор', '1994-02-08', 'мужской', '+7 (936)-237-71-66', 'Тольятти', 'denisov@mail.ru', 2),
(21, 'dergunova_GIP113', '3010', 'Дергунова Екатерина', '1995-11-06', 'женский', '+7 (920)-182-60-83', 'Самара', 'dergunova@gmail.com', 2),
(22, 'bochkarev_GIP115', '1001', 'Бочкарев Сергей', '1997-01-01', 'мужской', '+7 (936)-813-01-83', 'Самара', 'bochkarev@mail.ru', 4),
(23, 'vyazov_GIP115', '1002', 'Вязов Иван', '1998-08-01', 'мужской', '+7 (983)-091-83-87', 'Тольятти', 'vyazov@mail.ru', 4),
(24, 'galieva_GIP115', '1003', 'Галиёва Анастасия', '1997-12-19', 'женский', '+7 (982)-926-63-61', 'Самара', 'galieva@gmail.com', 4),
(25, 'grazhdankin_GIP115', '1004', 'Гражданкин Андрей', '1996-01-17', 'мужской', '+7 (926)-389-38-29', 'Жигулевск', 'grazhdankin@mail.ru', 4),
(26, 'gafarova_GIP115', '1005', 'Гафарова Линара', '1997-02-18', 'женский', '+7 (290)-836-83-26', 'Самара', 'gafarova@gmail.com', 4),
(27, 'zadorozhnyaya_GIP115', '1006', 'Задорожняя Мария', '1996-09-19', 'женский', '+7 (803)-983-92-82', 'Самара', 'zadorozhnyaya@gmail.com', 4),
(28, 'ilyazova_GIP115', '1007', 'Ильязова Лидия', '1997-01-12', 'женский', '+7 (938)-238-91-21', 'Тольятти', 'ilyazova@mail.ru', 4),
(29, 'kapichnikov_GIP115', '1008', 'Капичников Арсений', '1998-04-19', 'мужской', '+7 (930)-238-39-83', 'Самара', 'kapichnikov@mail.ru', 4),
(30, 'kokotkov_GIP115', '1009', 'Кокотков Максим', '1997-08-13', 'мужской', '+7 (398)-928-73-82', 'Самара', 'kokotkov@mail.ru', 4),
(31, 'korobejnikov_GIP115', '1010', 'Коробейников Георгий', '1998-10-10', 'мужской', '+7 (023)-029-30-13', 'Самара', 'korobejnikov@gmail.com', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Индексы таблицы `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issueID`);

--
-- Индексы таблицы `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`markID`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `groupID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `issues`
--
ALTER TABLE `issues`
  MODIFY `issueID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `marks`
--
ALTER TABLE `marks`
  MODIFY `markID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;