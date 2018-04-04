function fiboNum($count){
    $arr =[0,1]; 
    for ($i=1;$i<$count;$i++){
        $arr[] = $arr[$i]+$arr[$i-1];
    }
    return $arr;
}

var_dump(fiboNum(10));
