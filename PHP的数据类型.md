# PHP数据类型笔记总结

PHP支持9种原始数据类型。

4种标量，3种复合，2种特殊。当然还有其他一些伪类型，比如mixed number callback array|object void

## 4种标量类型：

* 布尔型 boolean

* 整型 integer

* 浮点型 float（也称作double）

* 字符串 string

  

## 3种复合类型：

* 数组 array

* 对象 object

* 可调用 callable（也称作callback）

  

## 2种特殊类型：

* 资源（resource）
* NULL（空类型）

疑问：什么函数返回资源类型resource？



## 另外有一些伪类型：5种

混合类型（mixed）

数字类型（number）

回调类型（callback，又称为callable)

数组|对象类型（array|object）

无类型（void）

伪类型“void”，用于函数原型开始时的可读性原因。它意味着它的“返回类型”必须完全省略它们的返回语句，或者使用空的返回语句。但是，空值不应作为void函数的有效返回值。

~~~
<?php
    //这个函数没有返回值
    (void) unset(mixed $var [, mixed $...])
~~~



## 还有伪标量$...

var_dump()函数：查看某个[表达式](https://www.php.net/manual/zh/language.expressions.php)的值和类型。

gettype()函数：得到一个易读懂的类型的表达方式用于调试。

检验某个类型不要用gettype()函数，而用is_type()函数。

is_int()函数判断一个变量是不是整型。返回布尔值。

is_string()函数判断一个变量是不是字符串。也返回布尔值。

is_bool()函数也是类似。



## 代码示例

~~~php//
<?php
    $a_bool = TRUE;//布尔值 boolean
    $a_str = "foo";//字符串 string
    $a_str2 = 'foo';//字符串 string
    $an_int = 12;//整型 integer
    
echo gettype($a_bool);//输出boolean
echo gettype($a_str); //输出string

//如果是整型就加4
if (is_int($an_int)) {
    $an_int += 4;
}

//如果是字符串就打印出来
if (is_string($a_bool)) {
    echo 'String: ' . $a_bool;
    echo "String: {$a_bool}";
}
~~~

## 其他总结：

如果要将一个变量强制转换为某类型，可以对其使用【强制转换】或者【settype()函数】。

注意变量根据其当时的类型在特定场合下会表现出不同的值。

此外，还可以参考 [PHP 类型比较表](https://www.php.net/manual/zh/types.comparisons.php)看不同类型相互比较的例子。