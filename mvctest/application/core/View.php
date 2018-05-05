<?php
namespace application\core;

class View
{
	public $path;
	public $route;
	public $layout='default';

	public function __construct($route)
	{
		// var_dump($route);
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
		// echo '<p>'.$this->route.'</p>';
		// debug($this->path);
		// return true;
	}

	public function render($titel,$vars = [])
	{	
		// debug($vars);
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
		// debug($name);
		if (file_exists($path)) 
		{
		ob_start();
		require $path;
		$content = ob_get_clean();
		require 'application/views/layouts/'.$this->layout.'.php';
		} else {echo 'View is not found'.$this->path;}
		
	}
	
	public function reDirect($url)
	{
		header('location:'.$url);
		exit;
	}

	public static function errorCode($code)
	{
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if(file_exists($path))
			{
				require $path;
			}
		exit;
	}


	
}