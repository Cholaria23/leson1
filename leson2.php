<?php 

/**
* магический классы вызываются при создании обекта 
*абстрактные классы посмотреть - создаются только для наследования, чтобы хранить в себе методы
* abstract class A
*/
// class A 
// {
// 	protected $a;
// 	// public $a =5; // defaul value a=5
// 	// public $b =7;
// 	// protected $c =8;
// 	function __construct()
// 	{
// 		$this->a=1;# code...
// 	}
// }

//  варинт 2

interface MyInterface 
{
	const MY_CONST = 33;
 	
 	public function getData();
}
// abstract class A 
abstract class A  implements MyInterface
{
	 // abstract public function getData(); // вызов метода
	protected $a;
	// public $a =5; // defaul value a=5
	// public $b =7;
	// protected $c =8;
	function __construct()
	{
		$this->a=1;# code...
	}
}


/**
*Наследование - это когда класс В забирает данные и методы ,что есть первичного класа А 
*Наследование - вынесение методов в отдельные классы или библиотек, изменение(переопределние чужих библиотек) через наследование
*/
class B extends A
{
	protected $b = 9;

	public function getData()
	{
		return 12;
	}
	function __construct()
	{
		parent::__construct();//вызов конструктора класса А 
		// $this->cc=10;
		// $this->a=10;// переопределение 	# code...
		$this->b=4;
	}
}

$obj= new B;
// echo $obj->b;
// var_dump($obj);
echo $obj->getData();
var_dump($obj::MY_CONST);
// 
// Интерфейс - это набор методов которые должны быть в наших классах
// Патерны для MVC