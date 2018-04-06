<?php
// *******************************************************
// *Задача №5 найти сумму  массива 
// 
class Array_Summa
{ public $arr;
	function __construct (array $arr)
	{$this->arr =$arr;}
		public function myCount()
		{
			$c =0;
			foreach ($this->arr as $value) 
			{
				$c++;# code...
			}
			return $c;		
		}	
			public function summa_arr()
				{   $summa= 0;
				 	$count = $this->myCount($this->arr);
					for ($i=0; $i!=$count;$i++) 
					{   
						$max = $this->arr[$i];
						$result =$this->arr[++$i];
						// echo "Первое число в масиве =",$max,'<p></p>';
						// echo "Second number =", $result,'<p></p>';
						$summa = $summa + $max + $result;
					    // echo "Сумма=", $summa,'<p></p>';
			
					}
				 
				 return $summa;
				}
					
}

$arr=[5,8,9,10,20,52,56,5];
$obj= new Array_Summa($arr);
var_dump($obj->arr);
echo "Сумма элементов массива =",($obj->summa_arr());