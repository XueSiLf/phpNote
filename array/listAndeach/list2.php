<?php
// 用法1
$result = $pdo->query("SELECT id,name,salary FROM employees");
while (list($id, $name, $salary) = $result->fetch(PDO::FETCH_NUM)) {
    echo "<tr>\n" .
        "<td>{$name}</td>\n" .
        "<td>{$salary}</td>\n" .
        "</tr>\n";
}

// 用法2 使用嵌套的list()
list($a, list($b, $c)) = array(1, array(2, 3));
var_dump($a, $b, $c);

// 用法3 在list()中使用数组索引 注意PHP7和PHP5的list()区别
$info = array('one', 'two', 'three');
list($a[0], $a[1], $a[2]) = $info;
var_dump($a);

// 用法4 list()和索引顺序定义
//list()使用array索引的顺序和它何时定义无关
$foo = array(2 => 'a', 'foo' => 'b', 0 => 'c');
$foo[1] = 'd';
list($x, $y, $z) = $foo;
var_dump($foo, $x, $y, $z);//$x=c $y=d $z=a

// 用法5 带键的list() 从PHP7.1.0开始 list()可以包含显式的键，可赋值到任意表达式。
//可以混合使用数字和字符串键。但是不能混合有键和无键不能混用。
$data = [
    ['id' => 1, 'name' => 'Tom'],
    ['id' => 2, 'name' => 'Fred'],
];
foreach ($data as ['id' => $id, "name" => $name]) {
    echo "id: {$id}, name: {$name}\n";
}
echo PHP_EOL;
list(1 => $second, 3 => $fourth) = [1, 2, 3, 4];
echo "{$second}, {$fourth}\n"; //2, 4