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
		// echo $url;
		// Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $urlPattern => $path) 
		{
			// echo "<br>$urlPattern -> $path";	# code...
		// Сравниваем $urlPattern и $url
			if (preg_match("~$urlPattern~", $url))
			{
				// echo '<br>.Где ищем (запрос, который набрал пользователь):'.$url;
				// echo '<br> Что ишем (совпадения из правила):'.$urlPattern;
				// echo '<br>Кто обрабатывает:'.$path;
				// echo '+';
				// echo $path;
			  // Получаем внутрений путь из внешнего согласно правилу
				$internalRoute = preg_replace("~$urlPattern~", $path, $url);

				// echo '<br><br>Нужно сформировать:'.$internalRoute;
				// Определяем какой контролер
				// и action обрабатывает запрос и параметры
				$segments = explode ("/",$internalRoute);

				// echo '<pre>';
				// print_r ($segments);
				// echo "<pre>";
				$controllerName = array_shift($segments).'Controller';
                // Делаем первый символ заглавным в строке для контролера
                $controllerName = ucfirst($controllerName);
                $actionName = 'action'.ucfirst(array_shift($segments));
                // echo "<pre>";
                // print_r ($actionName);
                // echo '<pre>';

				// echo '<br>Класс:'.$controllerName;
				// echo '<br> Метод:'.$actionName;
               
                // echo '<br>controller name:'.$controllerName;
                // echo '<br>action name:'.$actionName;
               
                $parameters = $segments;
                
                // echo '<pre>'; print_r($parameters);

                // die;
				// Подключить файл класса-контролера
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				if (file_exists($controllerFile))
				{
					include_once ($controllerFile);
				}
				//  Создать объект, вызвать метод (т.е. action)
				$controllerObject = new $controllerName; // полиморфизм 
				
				// $result = $controllerObject->$actionName(); // вызов метода
				$result = call_user_func_array(array($controllerObject,$actionName),$parameters);
				
				if ($result != null)
				{
					break;
				}


			}
		}
		


		

		
	}
}