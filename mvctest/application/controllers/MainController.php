<?php
namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
		// echo 'MainController:indexAction';
		$this->view->render('Main Page');
		// debug($this->view->render());
		
		// $this->view->render('Main Page',$vars);
		// return true;
	}

}