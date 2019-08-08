<?php
$arr = array('one', 'two', 'three');

list($a, $b, $c) = $arr;

echo $a . '<br />';
echo $b . '<br />';
echo $c . '<br />';

list($a1, , $c1) = $arr;
echo $a1 . '<br />';
echo $c1 . '<br />';

list(, , $c2) = $arr;
echo $c2 . '<br />';