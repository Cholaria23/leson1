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


//Front Controller

//1. Общие настройки
ini_set("display errors", 1);
error_reporting(E_ALL);

// 2. Подключение файлов сист
define ('ROOT', dirname(__FILE__));
require_once (ROOT.'/routers/Router.php');
// 3. Установка соединения  с БД

// 4. Вызов Router
$router = new Router();
$router->run();