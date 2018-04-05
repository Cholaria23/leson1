<?php
class Array_Repl () {
function repl_arr($a,$num){
	$i=0;
	$c=1;
	$arr1=[];
	foreach ($arr as $key=> $value) {
		if($value>$num){
		$arr[$i]=$num;
		$key=$i++;# code...
		$arr1=$c++;
		// echo $arr1;
		}else {$key=$i++;}
	}
	echo "Количество замен в массиве =",$arr1;
return $arr;
  }
}
$a=[10,2,5,6,7,9,11,25];
$obj=new Array_Repl($a);
var_dump($obj->repl_arr(10));
