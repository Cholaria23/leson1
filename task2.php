function replArr($num){
	$arr=[10,2,5,6,7,9,11,25];
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
var_dump(replArr(10));
