<?php
// Задача №4

/*
*В массиве $a[] замена всех элементов, больше заданного числа функцией 
*repl_arr(), этим числом. Подсчитаные количество сохраняются замен в массиве $arr1[].
*/
class Array_Replace // класс для замены числа в массиве
{ public $a;
	function __construct(array $a) 
	{
	$this->a = $a;
	}
 public function repl_arr($num) // фунция которая выполняет замену чисел которые, больше задного числа в переменной $num
 	{
	 $i=0;
	 $c=1;
	 $arr1=[];
		foreach ($this->a as $key=> $value) 
			{ 
			if($value>$num){
					 $this->a[$i]=$num;
					 $key=$i++;# code...
					 $arr1=$c++;
					} //else {$key=$i++;}
			}
		echo "Количество замен в массиве =",$arr1;
		return $this->a;
  	 }

}
$a=[10,2,5,6,7,9,11,25]; // массив
$obj=new Array_Replace($a); // новый объект
var_dump($obj->repl_arr(11));
