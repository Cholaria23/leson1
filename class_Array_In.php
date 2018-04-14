<?php
  /*
  * Задача № 7 Реализация функции нахождения заданого числа или строки в массиве
  */
  // array( ... non-duplicate string and integer values ... )
 
class Array_In 
{ 
	public $arr;

	function __construct(array $arr)
	{
		$this->arr = $arr;
	}

	public function myCount(array $arr)
	{
		$c=0;
		foreach ($arr as $value) 
		{
		 $c++;	# code...
		}
	return $c;
	}
	public function in_array_i($needle, array $arr, $i = 0)
	{
	  $c = $this->myCount($arr);

	  for (;$i < $c; ++$i)
	    if ($arr[$i] == $needle) return true; 
	  return false;   
	}
}

// $needle = 32;
// $arr = array(32,34,5,6,8,9);
$needle= 'Max';
$arr = array('Max',"Min","Big","Small","tiny");
$obj= new Array_In($arr);
var_dump ($obj->in_array_i($needle,$arr));

