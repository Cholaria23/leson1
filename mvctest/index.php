<?php

require 'application/lib/Dev.php';

// use application\lib\Db;
use application\core\Router;
// Автозагрузка классов
spl_autoload_register(function ($class) 
{
    $path = str_replace('\\', '/', $class.'.php');
    // echo $path;
    if (file_exists($path))
    {
    	require $path;
    }
});


// session_start();
$router = new Router;
$router->run();

// $router = new Db;
