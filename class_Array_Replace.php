<?php
class Array_Repl 
{ public $a;
	function __construct(
		array $a) {
		$this->a = $a;
	}
 public function repl_arr($num){
	$i=0;
	$c=1;
	$arr1=[];
	foreach ($this->a as $key=> $value) {
		if($value>$num){
		$this->a[$i]=$num;
		$key=$i++;# code...
		$arr1=$c++;
		}else {$key=$i++;}
	}
	echo "Количество замен в массиве =",$arr1;
	return $this->a;
  }

}
$a=[10,2,5,6,7,9,11,25];
$obj=new Array_Repl($a);
var_dump($obj->repl_arr(10));
