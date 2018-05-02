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
		// debug($name);
		if (file_exists('application/views/'.$this->path.'.php')) 
		{
		ob_start();
		require 'application/views/'.$this->path.'.php';
		$content = ob_get_clean();
		require 'application/views/layouts/'.$this->layout.'.php';
		} else {echo 'View is not found'.$this->path;}
		
	}
	
}