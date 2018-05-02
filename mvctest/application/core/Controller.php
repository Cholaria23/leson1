<?php
namespace application\core;

use application\core\View;

abstract class Controller
{
	public $route;
	public $view;

	public function __construct($route)
	{
		// var_dump($route);
		$this->route = $route;
		$this->view = new View($route);
		// echo '<p>Controller:abstract</p>';
		
		return true;
		// debug($this->route);
	}

	
}