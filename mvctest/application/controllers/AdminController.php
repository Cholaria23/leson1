<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller 
{
	public function mainAction()
	{
		$result = $this->model->getUser();
		echo 'AdminController:mainAction';
		return true;
	}
}