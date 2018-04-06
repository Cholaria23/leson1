/*
* Задача №2) Выводит определенное количество элементов  последовательности Фибоначчи.
*/
class Numbers_Fibonachi
{
	function fiboNum($count){
	    $arr =[0,1]; 
	    for ($i=1;$i<$count;$i++){
	        $arr[] = $arr[$i]+$arr[$i-1];
	    }
	    return $arr;
	}
}

$obj= new Numbers_Fibonachi();
var_dump($obj->fiboNum(10));