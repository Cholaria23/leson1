<?php 

class Router 
{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/routers/routes.php';
		$this->routes = include ($routesPath);
	} 
/*
* Возвращаем request string
*/
	private function getURI() // Реализация инкапсуляции, обращении только в классе Router
	{
		if (!empty($_SERVER['REQUEST_URI']))
		{
			return trim($_SERVER['REQUEST_URI'],'/');
		}
	}
	public function run()
	{
		// print_r($this->routes);
		// echo "Class Router, method run";
		// Получить строку запроса
		$url = $this->getURI();
		echo $url;
		// Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $urlPattern => $path) 
		{
			echo "<br>$urlPattern -> $path";	# code...
		}

		// Подключить файл класса-контролера

		//  Создать объект, вызвать метод (т.е. action)
	}
}