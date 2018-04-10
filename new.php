<?php
// ********************************************************
/* Задача №6 Сортировка по возрастанию в массиве
*/
class Array_Sort
{ public $arr;
  	function __construct (array $arr)
	{
		$this->arr =$arr;
		if(!is_array($arr))
		{
			throw new Exception("NOT array!!");// остановка скрипта по ошибке
		}
	}
		public function myCount()
		{
			$c =0;
			foreach ($this->arr as $value) 
			{
				$c++;# code...
			}
			return $c;		
		}	
			public function my_sort()
				{	$count = $this->myCount($this->arr);
					// $ =0;
					
				foreach ($this->arr as $i=>$value) 
				 {	
					for ($i=0; $i<$count-1;$i++ ) 
						{ if ($this->arr[$i] > $this->arr[$i+1])//]||$this->arr[$i] = $this->arr[$i+1]
							{
							$arr[]=$max=$this->arr[$i];
							 // echo '<p>',"Максимальное число в массиве =",$i,"=>",$max,'</p>';
							$arr[]=$this->arr[$i]= $this->arr[$i+1];
							 
							$arr[]=$this->arr[$i+1]=$max;
							 // echo '<p>',"Минимальное число в масиве =",$i,$this->arr[$i+1],'</p>';
							}
						
						}

					return $this->arr[$i];	
				 }
			//return $arr[$i];	
		  		}

}

$arr = [1,5,2,4,3,-1,-2,6,8,10,100,1000];
$obj= new Array_Sort($arr);
var_dump($obj->arr);
echo '<p>'."Сортировка по возрастанию ".$obj->my_sort(),'</p>';