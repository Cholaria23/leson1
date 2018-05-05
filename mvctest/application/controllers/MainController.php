<?php
namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
	public function indexAction()
	{
		// $db = new Db;
		// //Защита от SQL инйекций
		// // $form = '2;DELETE FROM user';
		// $params = ['id'=>5,];
		// $data=$db->column('SELECT title FROM news where id=:id',$params);
		// debug ($data);
		
		// echo 'MainController:indexAction';
		 // $this->view->render('Main Page');
		// debug($this->view->render());

		$result = $this->model->getNews();
		$vars = [
		 'news' => $result,
		// 'age' => '88',
		];
		// debug($result);
		 $this->view->render('Main Page',$vars);

		// return true;
	}

}