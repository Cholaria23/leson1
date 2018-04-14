<?php
// ********************************************************
/* Задача №6 Сортировка по возрастанию в массиве
*/
class Array_Sort
{ 
	public $arr;
  	function __construct (array $arr)
	{
		$this->arr = $arr;
	}
		public function myCount(array $arr)
		{
			$c =0;
			foreach ($arr as $value) 
			{
				$c++;# code...
			}
			echo "Количество елементов в массиве =".$c."<br>";
			return $c;		
		}	
			public function my_sort(array $arr)
				{	
					$count = $this->myCount($arr);
					$inc = 0;
					
				foreach ($arr as $i =>$value) 
				 {	
					for ($i=0; $i < $count-1; $i++ ) 
						{ $inc++;
							if ($arr[$i] > $arr[$i+1])
							{
							$temp=$arr[$i];
							 
							$arr[$i]= $arr[$i+1];
							 
							$arr[$i+1]=$temp;
							}
						}
				 }
				 echo $inc;
			return $arr;	
		  		}
}

$arr = [1,5,2,4,3,-11,-2,6,8,102,100,1000];
$obj= new Array_Sort($arr);
var_dump($obj->my_sort($arr));
