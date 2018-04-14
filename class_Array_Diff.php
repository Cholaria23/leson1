<?php
/*
*  Задача № 8 Нахождение отличий значений в двух массивах, реализация функции array_diff
*/

class Array_Diff
{
	public $arr_a,$arr_b;

	function __construct(array $arr_a,array $arr_b)
	{
		$this->arr_a = $arr_a;
		$this->arr_b = $arr_b;
	}
	
	public function myCount(array $arr_a,array $arr_b)
	{
		$c=0;
		$j=0;
		foreach ($arr_a as $valuea) 
		{
		 $c++;
		 foreach ($arr_b as $valueb) 
		 	{
		 		$j++;	# code...
		 	}
		 		
		}
	return $c;$j;
	}

	public function in_array_i($valuea,$arr_b, $i = 0)
	{
	  $c = $this->myCount($arr_b);

	  for (;$i < $c; ++$i)
	    if ($arr_b[$i] == $valuea) return true; 
	  return false;   
	}

	function array_different(array $arr_a,array $arr_b)
	{
	    foreach ($arr_a as $keya => $valuea)
	    {
	        if (in_array($valuea, $arr_b))
	        {
	            unset($arr_a[$keya]);
	        }
	    }
	    return $arr_a;
	}
}

$arr_a = array(32,34,5,6,8,9);
$arr_b = array(32,3,5,6,8,90);
	// var_dump(array_different($arr_a,$arr_b));
	// array_different ($arr_a,$arr_b);
$obj = new Array_Diff($arr_a,$arr_b);
var_dump($obj->array_different($arr_a,$arr_b));
