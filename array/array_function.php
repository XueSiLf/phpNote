<?php
$arr = array('one', 'two', 'three');
$res = array_shift($arr);
echo $res;// 'one'
print_r($arr);// Array ( [0] => two [1] => three )

array_unshift($arr,'one1');


# 在数组开头插入一个或多个单元
array_push($arr, $var, $var1, ...);

# 弹出数组最后一个单元（出栈）
array_pop($arr);

# 将数组开头的单元移出数组，
# 返回值为移出的值，数组为空或者不是一个数组则返回值为NULL.
array_shift($arr);

# 在数组开头插入一个或者多个单元
array_unshift($arr, $var, $var1, ...);
