<?php
  /*
  * Задача № 7 Реализация функции нахождения заданого числа или строки в массиве
  */
  // array( ... non-duplicate string and integer values ... )
  // $needle = 32;
  // $arr = array(32,34,5,6,8,9);
  $needle= 'Max';
  $arr = array('Max',"Min","Big","Small","tiny");
 
function in_array_i($needle, array $arr, $i = 0)
{
  $c = count($arr);

  for (;$i < $c; ++$i)
    if ($arr[$i] == $needle) return true; 
  return false;   
}
in_array_i($needle,$arr);
var_dump (in_array_i($needle,$arr));

