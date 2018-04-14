<?php
/*
* Задача №1 Вывод всех положительных четные чисел, которые меньше заданного
*/
class Array_Even 
 {
 	function even_num($even) 
  {
  	$arr1=[];
 	for ($i=0;$even!=0&$even>0; $i++)
      {
      	if ($even>0&$even%2==0)
        {
          $even=$arr1[]=$even-2;		
 	 	 }
 	 	  else{ 
 	 	 		$even--;// Блок else для преобразования нечетного числа в четное
 	 		    $arr1[]=$even;
 	 		    echo "No Even! or Negative Number!";
          	   }
 	  }
 return $arr1;
 }
}

$obj= new Array_Even();
var_dump($obj->even_num(10));
