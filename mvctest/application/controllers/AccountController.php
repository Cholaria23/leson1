<?php
namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
	public function before()
	{	//Подключение админ шаблона
		$this->view->layout = 'admin';
	} 

	public function loginAction()
	{
		// echo 'AccountController:loginAction';
		$this->view->layout = 'admin';
		$this->view->render('LogIn');
		return true;
	}

	public function registerAction()
	{
		
		// echo 'AccountController:registerAction';
		$this->view->layout = 'admin';
		$this->view->render('Registration');
		// var_dump($this->route);
		return true;
	}
}