<?php
/*
*Задача №3) найти в массиве число второе по величине.
*/
class Max_My
{ public $arr;
   function __construct (array $arr)
     {$this->arr =$arr;}
	public function myCount()
	{$c =0;
	  foreach ($this->arr as $value) 
	{
	  $c++;# code...
	}
	return $c;		
	}
	 public function myMax2()
		{$result =$max = $this->arr[0];
		 $count = $this->myCount($this->arr);
		 for ($i=1; $i< $count;$i++) 
			{
			if ($max < $this->arr[$i])
			  {$result = $max;
			   $max = $this->arr[$i];
			  }# code...
			}
		return $result;
	  	}
}

$arr=[5,8,9,10,20,52,56];
$obj= new Max_My($arr);
var_dump($obj->arr);
echo $obj->myMax2();