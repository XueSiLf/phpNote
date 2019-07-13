[TOC]

# 有关PHP处理变量和类型的函数理解Variable handling-1

## Variable handling函数

###  boolval()  获取变量的布尔值，返回布尔值。

  ~~~php
  boolval(mixed $var) : boolean
  boolval(0);//false
  boolval(0.0);//false
  boolval("");//false
  boolval("0");//false
  boolval([]);//false
  boolval(new stdClass);//true
  // 实现boolval()函数
  if (!function_exists('boolval') {
      function boolval($val) {
          return (bool)$val;
          //return !!$val;
      }
  }
  // var_dump()可以输出多个变量类型
  var_dump(!!1, !!0, !!"test", !!"");
  // 实现boolval()函数    
  function is_true($val, $return_null = false) {
      $boolval = (is_string($val) ? filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : (bool)$val);
      return ($boolval === null && !$return_null ? false : $boolval);
  }
  is_true(new stdClass);      // true
  is_true([1,2]);             // true
  is_true([1]);               // true
  is_true([0]);               // true
  is_true(42);                // true
  is_true(-42);               // true
  is_true('true');            // true
  is_true('on')               // true
  is_true('off')              // false
  is_true('yes')              // true
  is_true('no')               // false
  is_true('ja')               // false
  is_true('nein')             // false
  is_true('1');               // true
  is_true(NULL);              // false
  is_true(0);                 // false
  is_true('false');           // false
  is_true('string');          // false
  is_true('0.0');             // false
  is_true('4.2');             // false
  is_true('0');               // false
  is_true('');                // false
  is_true([]);                // false
  ~~~

【参考】floatval intval is_bool

strval --- 获取变量的字符串值

settype --- 设置变量的类型

[Type juggling][https://www.php.net/manual/zh/language.types.type-juggling.php]



### doubleval()  floatval的别名
此别名是函数改名之后的遗留问题。在 PHP 旧的版本中由于还没有 [floatval()](https://www.php.net/manual/zh/function.floatval.php) 函数，所以你可能需要用到这个 [floatval()](https://www.php.net/manual/zh/function.floatval.php) 的别名函数。



### empty()  【检查一个变量是否为空】

~~~php
empty(mixed $var) : bool
~~~

判断一个变量是否被认为是空的。当一个变量并不存在，或者它的值等同于false，那么它会被认为不存在。如果变量不存在的话，empty()并不会产生警告。

【注意】：在PHP5.5之前，empty()仅支持变量；任何其他东西将会导致一个解析错误。换言之，下列代码不会生效：empty(trim($name))。作为替代，应该使用trim($name) == false.

没有警告会产生，哪怕变量不存在。这意味着empty() 本质上与【!isset($var) || $var == false】等价。

【返回值】：当$var存在，且是一个【非空非零】的值返回false，否则返回true。

* 以下的值被认为是空的：

  ~~~php
  "" 空字符串
  0 作为整数的0
  0.0 作为浮点数的0
  "0" 作为字符串的0
  NULL
  FALSE
  array() 一个空数组
  $var 【一个声明了，但是没有值的变量】
  ~~~

【注意】：PHP5.5.0 empty()支持表达式了，不仅仅是变量。 PHP5.4 .0 检查非数字的字符串偏移量会返回TRUE。

【范例】：

~~~php
// 1.empty()与isset()的比较
<?php
$var = 0;
if (empty($var)) {
    echo '$var也是0，空，或者不存在'；
}
if (isset($var)) {
    echo '$var被设置了即使它是空';
}

// PHP 5.4 修改了当传入的是字符串偏移量时， empty() 的行为
// 2.在字符串偏移量上使用empty() 字符串偏移量看不懂，以下是HP5.4运行结果
$expected_array_got_string = 'something';
var_dump(empty($expected_array_got_string['some_key']));//true
var_dump(empty($expected_array_got_string[0]));//false
var_dump(empty($expected_array_got_string['0']));//false
var_dump(empty($expected_array_got_string[0.5]));//false
var_dump(empty($expected_array_got_string['0.5']));//true
var_dump(empty($expected_array_got_string['0 Mostel']));//true
~~~

【参考】isset() --- 【检测变量是否已设置并且非null】

\__\__isset() --- 【魔术方法之一，当对不访问属性调用isset()或empty()时，\__\__isset()会被调用。

unset() --- 【释放给定的变量】

array_key_exists() --- 【检查数组理是否指定的键名或索引】

count() --- 【计算数组中的单元数目，或对象中的属性个数】

strlen() --- 【获取字符串长度】

类型比较表[The type comparison tables](https://www.php.net/manual/zh/types.comparisons.php)



【我的总结】：两种魔术方法 \_\_isset() 和 \_\_unset()



### floatval()  获取变量的浮点值

### get_defined_vars()

### get_resource_type()

### gettype()  【获取变量的类型】

### import_request_variables

### intval() --- 【获取变量的整数值】

### is_array() --- 【检测变量是否是数组】

### is_bool() --- 【检测变量是否是布尔型】

### is_callable --- 【检测参数是否为合法的可调用结构】？？？

### is_double --- 【is_float的别名】

### is_float --- 【检测变量是否为浮点型】

### is_int --- 【检测变量是否为整数】

### is_integer -- 【is_int的别名】

### is_long --- 【is_int的别名】

### is_null --- 【检测变量是否为NULL】

### is_numeric --- 【检测变量是否为数字或者数字字符串】

### is_object --- 【检测变量是否是一个对象】

### is_real --- 【is_float的别名】

### is_resource --- 【检测变量是否为资源类型】

### is_scalar --- 【检测变量是否是一个标量】

### is_string --- 【检测变量是否是字符串】

### isset --- 【检测变量是否已设置并且非空】

### print_r --- 【以易于理解的格式打印变量】

### serialize --- 【产生一个可存储的值的表示】

### settype --- 【设置变量的类型】

### strval --- 【获取变量的字符串值】

### unserialize --- 【从已存储的表示中创建PHP的值】

### unset --- 【释放给定的变量】

### var_dump --- 【打印变量的相关信息】

### var_export --- 【输出或返回一个变量的字符串表示】