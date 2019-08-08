<?php
$arr = array('one', 'two', 'three');
$res = each($arr);
print_r($res);
// Array ( [1] => one [value] => one [0] => 0 [key] => 0 )

$arr1 = array('');
$res1 = each($arr1);
print_r($res1);

// 用法2 each()经常和list()结合使用来遍历数组
// 用each()遍历数组
$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');
reset($fruit);
while (list($key, $value) = each($fruit)) {
    echo "{$key} => {$value}\n";
}