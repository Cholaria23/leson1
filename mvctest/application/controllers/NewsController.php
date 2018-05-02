<?php
namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller
{
	public function showAction()
	{
		$this->view->render('One_New');
		// echo 'NewsController:showAction';
		return true;
	}

	public function listAction()
	{
		$this->view->render('News');
		// echo 'NewsController:showAction';
		return true;
	}

}