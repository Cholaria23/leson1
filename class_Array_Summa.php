<?php
// *******************************************************
// *Задача №5 найти сумму  массива 
// 
class Array_Summa
{ 
	public $arr;
	
	function __construct (array $arr)
	{
		$this->arr =$arr;
	}
		public function myCount (array $arr)
		{
		$c =0;
			foreach ($arr as $value) 
			{
				$c++;# code...
			}
			return $c;		
		}	
		public function summa_arr(array $arr)
			{   $summa= 0;
				$count = $this->myCount($arr);

					for ($i=0; $i<$count; $i++) 
					{   
						$summa = $summa + $arr[$i];
					    // echo "Сумма=", $summa,'<p></p>';
			
					}
				 
				 return $summa; $arr;
				}
					
}

$arr=[5,8,9,10,20,52,56,5];
$obj= new Array_Summa($arr);
var_dump($obj->summa_arr($arr));
echo "Сумма элементов массива =",($obj->summa_arr($arr));