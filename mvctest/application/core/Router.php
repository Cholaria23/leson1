<?php
namespace application\core;

use application\core\View;

class Router 
{
	protected $routes = [];
	protected $params = [];

	public function __construct()
	{
		$arr = require 'application/config/routes.php';
		foreach ($arr as $key => $val) 
		{
			$this->add($key,$val);	# code...
		}
	
	// debug($this->routes);
	}

	public function add($route,$params)
	{
		$route = '#^'.$route.'$#';
		// echo '<p>'.$route.'<p>';
		$this->routes[$route] = $params;
		 // debug($params);
	}

	public function match()
	{	
		 $url = trim($_SERVER['REQUEST_URI'],'/');
		 // debug($url);
		// var_dump($url);
		foreach ($this->routes as $route => $params) 
			{
		// // 		var_dump($route);
			if (preg_match($route, $url, $matches))
				{
					$this->params = $params;
		 			// var_dump($matches);
		//  		echo 'Rout';
		 			return true;
		 		}
			}
		return false;
	}

	public function run()
	{
		if($this->match())
		{
			
			$path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
			// echo $controller;
			If (class_exists($path))
			{
				$action = $this->params['action'].'Action';//
				if(method_exists($path, $action))
				{
					// Call Controller
					$conroller = new $path($this->params);//
					// Call Action
					$conroller -> $action();

				} else {
						View::errorCode(404);
						//echo 'Action Not Found'.$action;
						}

			} else { 
					View::errorCode(404);
					// exit('Not found class'.$path);
					}
			// echo '<p> controllers:<b>'.$this->params['controller'].'</b></p>';
			// echo '<p> controllers:<b>'.$this->params['action'].'</b></p>';
			// echo 'find route';
		}else{
				View::errorCode(403);
				// exit('Not found route');
			 }
		// debug ($_SERVER);
		// echo 'start';
	}
}