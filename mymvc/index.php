<?php
/*Цикл
*http://listen-radio.org/news/ - news считаем строкой запроса, которые передает браузер на Front Controller.
*
*Назначение  Front Controller:
*1)Общие настройкиж
*2)Подключение файлов системы;
*3)Установка соединения с базой данныз сайта;
*
*Далее вступает в работы класс Router, котрый является частью Front Controller и выполняет такие задачи:
*
*class Router
*
*4)Анализ запроса и контролера, который будет его обрабатывать;
*5)Подключение файла с классом контролера;
*6)Передача управления контролеру(Допустим NewsController);
*
*class NewsController выполняет такие действия(методы = function):
*7) Посетить страницу списка новостей /news/list;
*function actionList(){}
*8) Посетить страницу одной новости /news/152;
*function actionView(){}
*9) Посетить страницу архива новостей /news/archive;
*function actionArchiveList()
*
* Routers -> Front Controller -> NewsController ->Model ->NewsController->View -> user web browser

/news/list -> news/list
/news/archive -> news/archiveList
*/

// $string = "Он учился в школе с 2000 по 2006";
// $pattern = " /200[1,2,5]/ ";

// $result = preg_match($pattern, $string);

// var_dump($result);
/******************************/
// Format: dd-mm-yyyy
// $string = '21-11-2015';
// // Год 2015 месяц 11 день 21
// $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

// $replacement = 'Год $3, месяц $2, день $1';
// echo preg_replace($pattern,$replacement,$string);
// die;

/**************************************************/

//  Передача парметров при использовании ЧПУ

// не ЧПУ
// http://test2/news/?id=1235&category=sport  -> $_GET

// $_GET['id'];
// $_GET['category'];

// ЧПУ
// Где ищем (запрос , который набрал пользователь):http://test2/news/sport/1235
// Что ищем (совпадения из правила): news/([a-z]+)/([0-9]+)
// Кто обрабатывает: news/view/$1/$2
// Нужно сформировать: news/view/sport/1235
// Просмотр одной новости

/**************************************************/
//Front Controller

//1. Общие настройки
ini_set("display errors", 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы
define ('ROOT', dirname(__FILE__));
require_once (ROOT.'/routers/Router.php');
// 3. Установка соединения  с БД
require_once (ROOT.'/models/DB.php');
// 4. Вызов Router
$router = new Router();
$router->run();