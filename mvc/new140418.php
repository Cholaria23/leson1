<?php
//  интерфесы - это должностные обязаности каждого обьекта (метода)
// абстрактные классы - набор полей и методов
// MVC- Model-View-Controller(применяется для сайтов)
// Контролер-это класс, который сожержит страницы сайта, управляет всей работой, делегируют всем задачи, содержит методы (страницы сайта)
// патерн -front controller - почитать!!!!
// патерн - MVC
// патерн - adapter
// View - это html код
// Model - это база данных, логика работы (json- это массив виде строки)

// Controller
class MainController 
{
	public function index ()
	{
		$model = new MainModel;
		$data = $model -> getData();// вызов фунции getData для получения данных у моделе 
		// echo $data;// View 
		include 'view.php'; // тоже View,Шаблонизатор почитать 
	}
}

// model

class MainModel
{
	public function getData()
	{
		return $this->getDataFromDatabase();
	}

	private function getDataFromDatabase() //приват фунция вызывается и спользуется только внутри этого класса MainModel, другим он недоступен
	{
		return 'Data From MainModel !';
	}

}


// router

$routes = [
	''
];

$controller = new MainController;
call_user_func([$controller,'index']);
