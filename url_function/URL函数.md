# url函数

[TOC]

## 1、base64_decode()  对使用 MIME base64 编码的数据进行解码

### 1.2、【留心：返回值的类型】

### 1.3、用法示例：

~~~php
base64_decode( 编码后的字符串$str )

base64_decode( 编码后的字符串$str, TRUE) 一旦输入的数据超出了 【base64 字母表】，将返回 FALSE。 否则会静默丢弃无效的字符。
~~~



### 1.4、示例：

~~~php
<?php
    $str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
    echo base64_decode($str);
// 结果：
// This is an encoded string
~~~



### 1.5、返回值：字符串 或者 FALSE

### 1.6、说明：

~~~php
base64_decode( string $data[, bool $strict = false] ) : string
~~~

对 base64 编码的 `data` 进行解码。

### 1.7、参数：

$data：编码过的数据

$strict：当设置 `strict` 为 **TRUE** 时，一旦输入的数据超出了 base64 字母表，将返回 **FALSE**。 否则会静默丢弃无效的字符。

### 1.8、返回值说明：

返回原始数据， 或者在失败时返回 **FALSE**。返回的数据可能是二进制的。



## 2、base64_encode()  使用 MIME base64 对数据进行编码

### 2.1、【留心：返回值为 字符串 或者 FALSE 】

### 2.2、用法示例：

~~~php
base64_encode( 字符串$str )
~~~

### 2.3、示例：

~~~php
<?php
    $str = 'This is an encoded string';
    echo base64_encode($str);
    // 结果
    // VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==
~~~

### 2.4、说明：

~~~php
base64_encode( string $data ) ：string 
~~~

使用 base64 对 `data` 进行编码。

设计此种编码是为了使二进制数据可以通过非纯 8-bit 的传输层传输，例如电子邮件的主体。

Base64-encoded 数据要比原始数据多占用 33% 左右的空间。

#### 2.4.1、【占用空间比原始数据大%33左右】

### 2.5、参数说明：

$data：要编码的数据

### 2.6、返回值说明：

编码后的字符串数据， 或者在失败时返回 **FALSE**。



## 3、get_headers()  取得服务器响应一个 HTTP 请求所发送的所有标头

### 3.1、【留心：返回值的类型为索引数组 或者 关联数组 或者 false 】

### 3.2、用法示例：

~~~php
get_headers( 字符串URL$url ) : array 返回索引数组
get_headers( 字符串URL$url, 1) : array 返回关联数组
~~~

### 3.3、示例：

#### 3.3.1、示例1：get_headers() 例子

~~~php
<?php
    $url = 'http://www.baidu.com';
    print_r(get_headers($url));// 返回索引数组
    print_r(get_headers($url, 1));// 返回关联数组
// 结果：
// 索引数组
Array
(
    [0] => HTTP/1.0 200 OK
    [1] => Accept-Ranges: bytes
    [2] => Cache-Control: no-cache
    [3] => Content-Length: 14615
    [4] => Content-Type: text/html
    [5] => Date: Fri, 09 Aug 2019 06:40:14 GMT
    [6] => Etag: "5d4be0b4-3917"
    [7] => Last-Modified: Thu, 08 Aug 2019 08:43:32 GMT
    [8] => P3p: CP=" OTI DSP COR IVA OUR IND COM "
    [9] => Pragma: no-cache
    [10] => Server: BWS/1.1
    [11] => Set-Cookie: BAIDUID=1F063CC6BE6A49FD1AFE381E3A302FC3:FG=1; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com
    [12] => Set-Cookie: BIDUPSID=1F063CC6BE6A49FD1AFE381E3A302FC3; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com
    [13] => Set-Cookie: PSTM=1565332814; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com
    [14] => Vary: Accept-Encoding
    [15] => X-Ua-Compatible: IE=Edge,chrome=1
)
// 关联数组
Array
(
    [0] => HTTP/1.0 200 OK
    [Accept-Ranges] => bytes
    [Cache-Control] => no-cache
    [Content-Length] => 14615
    [Content-Type] => text/html
    [Date] => Fri, 09 Aug 2019 06:40:14 GMT
    [Etag] => "5d4be0b4-3917"
    [Last-Modified] => Thu, 08 Aug 2019 08:43:32 GMT
    [P3p] => CP=" OTI DSP COR IVA OUR IND COM "
    [Pragma] => no-cache
    [Server] => BWS/1.1
    [Set-Cookie] => Array
        (
            [0] => BAIDUID=1F063CC6BE6A49FD49CBDE150069F24B:FG=1; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com
            [1] => BIDUPSID=1F063CC6BE6A49FD49CBDE150069F24B; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com
            [2] => PSTM=1565332814; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com
        )

    [Vary] => Accept-Encoding
    [X-Ua-Compatible] => IE=Edge,chrome=1
)
~~~

#### 3.3.2、示例2：get_headers() 使用HEAD 例子

默认情况下，get头使用get请求获取头。如果你要改为发送head请求，可以使用流上下文：

~~~php
<?php
// By default get_headers uses a GET request to fetch the headers. If you
// want to send a HEAD request instead, you can do so using a stream context:
stream_context_set_default(
    array(
        'http' => array(
            'method' => 'HEAD'
        )
    )
);
$headers = get_headers('http://example.com');
~~~



### 3.4、说明：

~~~php
get_headers( string $url[, int $format = 0] ) : array
~~~

**get_headers()** 返回一个数组，包含有服务器响应一个 HTTP 请求所发送的标头。

### 3.5、参数说明：

$url：目标URL

$format：如果将可选的 `format` 参数设为 1，则 **get_headers()** 会解析相应的信息并设定数组的键名。

### 3.6、返回值说明：

返回包含有服务器响应一个 HTTP 请求所发送标头的索引或关联数组，如果失败则返回 **FALSE**。

### 3.7、参考：

apache_request_headers() - 获取全部HTTP请求头信息



## 4、get_meta_tags() -  从一个文件中提取所有的 meta 标签 content 属性，返回一个数组

### 4.1、用法示例：

~~~php
get_meta_tags( 本地文件/URL网址 ) // 返回数组
~~~

#### 4.1.1、示例1：get_meta_tags() 返回什么数据

~~~php
<?php
$tags = get_meta_tags('http://www.example.com/');

// 注意所有的键（key）均为小写，而键中的‘.’则转换成了‘_’。
echo $tags['author'];       // name
echo $tags['keywords'];     // php documentation
echo $tags['description'];  // a php manual
echo $tags['geo_position']; // 49.33;-86.59
~~~

### 4.2、【留心：只有包含 name 属性的 meta 标签才会被解析。】

### 4.3、说明

~~~php
get_meta_tags( string $filename[, bool $use_include_path = false ]) : array
~~~

打开 `filename` 逐行解析文件中的 <meta> 标签。解析工作将在 *</head>* 处停止。

### 4.4、参数说明

**$filename**：HTML 文件的路径字符串。 此参数可以是本地文件也可以是一个 URL。

**get_meta_tags() 解析了什么**

~~~html
<meta name="author" content="name">
<meta name="keywords" content="php documentation">
<meta name="DESCRIPTION" content="a php manual">
<meta name="geo.position" content="49.33;-86.59">
</head> <!-- 解析工作在此处停止 -->
~~~

（注意回车换行 － PHP 使用一个本地函数来解析输入，所以 Mac 上的文件将不能在 Unix 上正常工作）。

**$use_include_path**：将 `use_include_path` 设置为 **TRUE** 将使 PHP 尝试按照 [include_path](https://www.php.net/manual/zh/ini.core.php#ini.include-path) 标准包含路径中的每个指向去打开文件。这只用于本地文件，不适用于 URL。

### 4.5、返回值说明

返回一个数组，包含所有解析过的 meta 标签。

返回的关联数组以属性 name 的值作为键，属性 content 的值作为值，所以你可以很容易地使用标准数组函数遍历此关联数组或访问某个值。 属性 name 中的特殊字符将使用‘_’替换，而其它字符则转换成小写。如果有两个 meta 标签拥有相同的 name，则只返回最后出现的那一个。



### 4.6、参考

htmllentities() - 将字符串转换为HTML转移字符

urlencode() - 编码URL字符串



## 5、http_build_query() - 生成 URL-encode 之后的请求字符串【把数组组装成查询字符串，第4个参数编码1738(空格转+号)/3986(空格转百分号)】

### 5.1、【留心：返回值的格式，参数中数字前缀参数，分隔符号参数，加密类型】

### 5.2、用法示例：

~~~php
http_build_query( 数组$arr ) : string // 返回采用&分隔字符串 键=值&键=值
http_build_query( 数组$arr, 数字前缀) // 返回采用&分隔字符串   
http_build_query( 数组$arr, 数字前缀, 分隔符)
http_build_query( 对象$obj ) // 返回公有属性和继承父类的属性

http_build_query( 数组$arr, '', '&', PHP_QUERY_RFC1738);
http_build_query( 数组$arr, '', '&', PHP_QUERY_RFC3986);

~~~

#### 5.2.1、示例1：http_build_query() 使用分隔符

~~~php
<?php
$data = array(
    'foo'=>'bar',
    'baz'=>'boom',
    'cow'=>'milk',
    'php'=>'hypertext processor'
);
echo http_build_query($data) . "\n";// 默认是用分隔符&
echo http_build_query($data, '', '&amp;');// 不指定数字前缀 指定分隔符
// 结果：
foo=bar&baz=boom&cow=milk&php=hypertext+processor
foo=bar&baz=boom&cow=milk&php=hypertext+processor   
// 空格变成加号
~~~

#### 5.2.2、示例2：http_build_query() 使用数字下标的元素 使用前缀（只针对索引数组）

~~~php
<?php
    $data = array('foo', 'bar', 'baz', 'boom', 'cow' => 'milk', 'php' =>'hypertext processor');
    echo http_build_query($data) . "\n";
    echo http_build_query($data, 'myvar_');
// 结果：
0=foo&1=bar&2=baz&3=boom&cow=milk&php=hypertext+processor
myvar_0=foo&myvar_1=bar&myvar_2=baz&myvar_3=boom&cow=milk&php=hypertext+processor
~~~

#### 5.2.3、示例3：http_build_query() 使用复杂的数组

~~~php
<?php
$data = array(
    'user' => array(
        'name' => 'Bob Smith',
        'age' => 47,
        'sex' => 'M',
        'dob' => '5/12/1956'
    ),
    'pastimes' => array('golf', 'opera', 'poker', 'rap'),
    'children' => array(
        'bobby' => array('age' => 12, 'sex' => 'M'),
        'sally' => array('age' => 8, 'sex' => 'F') 
    ),
    'CEO'
);
echo http_build_query($data, 'flag_');
// 结果：
user%5Bname%5D=Bob+Smith&user%5Bage%5D=47&user%5Bsex%5D=M&user%5Bdob%5D=5%2F12%2F1956&pastimes%5B0%5D=golf&pastimes%5B1%5D=opera&pastimes%5B2%5D=poker&pastimes%5B3%5D=rap&children%5Bbobby%5D%5Bage%5D=12&children%5Bbobby%5D%5Bsex%5D=M&children%5Bsally%5D%5Bage%5D=8&children%5Bsally%5D%5Bsex%5D=F&flag_0=CEO
~~~

##### 5.2.3.1、【留心：只有基础数组中的数字下标元素获取了前缀】

下标元素“CEO”才获取了前缀，其它数字下标元素（如 pastimes 下的元素）则不需要为了合法的变量名而加上前缀。

#### 5.2.4、示例4：http_build_query() 使用对象

~~~php
<?php
class parentClass {
    public    $pub      = 'publicParent';
    protected $prot     = 'protectedParent';
    private   $priv     = 'privateParent';
    public    $pub_bar  = Null;
    protected $prot_bar = Null;
    private   $priv_bar = Null;

    public function __construct(){
        $this->pub_bar  = new childClass();
        $this->prot_bar = new childClass();
        $this->priv_bar = new childClass();
    }
}

class childClass {
    public    $pub  = 'publicChild';
    protected $prot = 'protectedChild';
    private   $priv = 'privateChild';
}

$parent = new parentClass();
echo http_build_query($parent);
// 结果：只有公有属性打印出来了
pub=publicParent&pub_bar%5Bpub%5D=publicChild
~~~

#### 5.2.5、示例5：http_build_query() 使用不同的加密方式

~~~php
<?php
$arr = array(
    'name' => 'longhui hui'
);
echo http_build_query($arr, '', '&', PHP_QUERY_RFC1738);
echo http_build_query($arr, '', '&', PHP_QUERY_RFC3986);
// 结果：
name=longhui+hui
name=longhui%20hui
~~~

### 5.2、说明

~~~php
http_build_query(mixed $query_data[, string $numeric_prefix[, string $arg_arguments[, int $enc_type = PHP_QUERY_RFC1738]]]) : string
~~~

使用给出的关联（或下标）数组生成一个经过    URL-encode 的请求字符串。

### 5.3、参数说明

**$query_data**：可以是数组或包含属性的对象。 一个  query_data   数组可以是简单的一维结构，也可以是由数组组成的数组（其依次可以包含其它数组）。 如果 query_data 是一个对象，只有 public 的属性会加入结果。 

**$numeric_prefix**：如果在基础数组中使用了数字下标同时给出了该参数，此参数值将会作为基础数组中的数字下标元素的前缀。这是为了让    PHP 或其它 CGI    程序在稍后对数据进行解码时获取合法的变量名。 

**$arg_separator**：除非指定并使用了这个参数，否则会用 arg_separator.output （即&符号）来分隔参数。 

**$enc_type**：默认使用 PHP_QUERY_RFC1738。    如果 enc_type 是  PHP_QUERY_RFC1738，则编码将会以 » RFC 1738 标准和 application/x-www-form-urlencoded 媒体类型进行编码，空格会被编码成加号（+）。   如果 enc_type 是 PHP_QUERY_RFC3986，将根据 » RFC 3986 编码，空格会被百分号编码（%20）。



### 5.4、返回值说明

​         返回一个 URL 编码后的字符串。 

### 5.5、【关键：常常配合 parse_str 使用】

### 5.6、【参考：】

parse_str( $str, $output ) - 将字符串解析成多个变量

parse_url( $url ) - 解析URL，返回其组成部分

urlencode( $url ) - 编码URL字符串

array_walk() - 使用用户自定义函数对数组中的每个元素做回调处理









## 6、parse_url() - 解析URL，返回其组成部分

### 6.1、【留心：它是解析一个URL网址，可能返回false，可能返回数组，返回字符串，返回null】

### 6.2、用法示例：

~~~php
parse_url( 链接$url ) // 返回一个关联数组
parse_url( 链接$url, PHP_URL_SCHEME ) // 返回协议
parse_url( 链接$url, PHP_URL_HOST ) // 返回主机地址
parse_url( 链接$url, PHP_URL_PORT ) // 返回端口号，整数integer值
parse_url( 链接$url, PHP_URL_USER ) // 返回用户名
parse_url( 链接$url, PHP_URL_PASS ) // 返回密码
parse_url( 链接$url, PHP_URL_PATH ) // 返回查询路径
parse_url( 链接$url, PHP_URL_QUERY ) // 返回查询字符串，在问号 ? 之后
parse_url( 链接$url, PHP_URL_FRAGMENT ) // 返回参数，在散列符号 # 之后
~~~

#### 6.2.1、示例1：parse_url() 例子

~~~php
<?php
$url = 'http://username:password@hostname/path?arg=value#author';
print_r(parse_url($url));
echo parse_url($url, PHP_URL_HEAD);
//结果：
Array
(
    [scheme] => http
    [host] => hostname
    [user] => username
    [pass] => password
    [path] => /path
    [query] => arg=value
    [fragment] => author
)

/path
~~~

#### 6.2.2、parse_url()  解析丢失协议的例子

~~~php
<?php
$url = '//www.example.com/path?googlguy=googley';

// 在 5.4.7 之前这会输出路径 "//www.example.com/path"
var_dump(parse_url($url));
// 结果：
array (size=3)
  'host' => string 'www.example.com' (length=15)
  'path' => string '/path' (length=5)
  'query' => string 'googlguy=googley' (length=16)
    
~~~

### 6.3、【留心：本函数不能用于相对URL 】

### 6.4、【留心：parse_url() 是专门用来解析URL的，而不是URI的。不过为遵从 PHP 向后兼容的需要有个例外，对 file:// 协议允许三个斜线（file:///...）。其它任何协议都不能这样。】

### 6.5、说明

~~~php
parse_url(string $url[, int $component = -1]) : mixed
~~~

本函数解析一个 URL 并返回一个关联数组，包含在 URL 中出现的各种组成部分。

本函数*不是*用来验证给定 URL 的合法性的，只是将其分解为下面列出的部分。不完整的 URL 也被接受，**parse_url()** 会尝试尽量正确地将其解析。

### 6.6、参数说明

**$url**：要解析的 URL。无效字符将使用 *_* 来替换。

**$component**：指定 **PHP_URL_SCHEME**、 **PHP_URL_HOST**、 **PHP_URL_PORT**、 **PHP_URL_USER**、 **PHP_URL_PASS**、 **PHP_URL_PATH**、 **PHP_URL_QUERY** 或 **PHP_URL_FRAGMENT** 的其中一个来获取 URL 中指定的部分的 [string](https://www.php.net/manual/zh/language.types.string.php)。 （除了指定为 **PHP_URL_PORT** 后，将返回一个 [integer](https://www.php.net/manual/zh/language.types.integer.php) 的值）。

### 6.7、返回值

对严重不合格的 URL，**parse_url()** 可能会返回 **FALSE**。

如果省略了 `component` 参数，将返回一个关联数组 [array](https://www.php.net/manual/zh/language.types.array.php)，在目前至少会有一个元素在该数组中。数组中可能的键有以下几种：

- scheme - 如 http
- host
- port
- user
- pass
- path
- query - 在问号 *?* 之后
- fragment - 在散列符号 *#* 之后

如果指定了 `component` 参数， **parse_url()** 返回一个 [string](https://www.php.net/manual/zh/language.types.string.php) （或在指定为 **PHP_URL_PORT** 时返回一个 [integer](https://www.php.net/manual/zh/language.types.integer.php)）而不是 [array](https://www.php.net/manual/zh/language.types.array.php)。如果 URL 中指定的组成部分不存在，将会返回 **NULL**。

### 6.8、参考

pathinfo() - 返回文件路径的信息

parse_str( $url) - 将字符串解析成多个变量

http_build_query( $arr ) - 生成URL-encode之后的请求字符串

dirname() - 返回路径中的目录部分

basename() - 返回路径中的文件名部分

RFC3986

## 7、rawurldecode() - 对已编码的URL字符串进行解码

### 7.1、【留心：对一个编码后的URL字符串进行解码，把%xx变成原意字符】

### 7.2、用法示例：

~~~php
rawurldecode( 编码后的URL字符串$str ) // 返回解码后的字符串
~~~

#### 7.2.1、示例1：rawurldecode() 示例

~~~php
<?php
echo rawurldecode('foo%20bar%40baz');
// 结果：
foo bar@baz
~~~

### 7.3、【留心：该函数和 urldecode()函数的区别】

### 7.4、【留心：**rawurldecode()** 不会把加号（'+'）解码为空格，而 [urldecode()](https://www.php.net/manual/zh/function.urldecode.php) 可以。】

说明：

~~~php
rawurldecode( string $str ) : string
~~~

返回字符串，此字符串中百分号（*%*）后跟两位十六进制数的序列都将被替换成原义字符。

### 7.5、参数说明：

**$str**：要解码的 URL。

### 7.6、返回值：

返回解码后的 URL 字符串。

### 7.7、参考：

rawurlencode() -  按照RFC3986 对URL进行编码

urldecode() - 解码已编码的 URL 字符串

urlencode() - 编码URL 字符串



## 8、rawurlencode()

8.0、【留心：返回值，除了-_.之外的所有非字母数字都转成%xx格式，这是按照RFC3986编码标准的。在 PHP 5.3.0 之前，rawurlencode 根据 [» RFC 1738](http://www.faqs.org/rfcs/rfc1738) 来编码波浪线（*~*）。】

### 8.1、用法示例：

~~~php
rawurlencode( 要编码的URL$str ) //返回一个字符串
~~~

#### 8.1.2、示例1：在 FTP URL 里包含一个密码

~~~php
<?php
    echo '<a href="ftp://user:',rawurlencode('foo @+%/'),'@ftp.example.com/x.txt">';
// 结果：
<a href="ftp://user:foo%20%40%2B%25%2F@ftp.example.com/x.txt">
~~~

或者，如果你想通过 URL 的 PATH_INFO 构成部分去传递信息：

#### 8.1.3、示例2：rawurlencode() 示例 2

~~~php
<?php
echo '<a href="http://example.com/department_list_script/',
    rawurlencode('sales and marketing/Miami'), '">';
// 结果：
<a href="http://example.com/department_list_script/sales%20and%20marketing%2FMiami">
~~~

### 8.2、说明

~~~php
urlencode(string $str) : string
~~~

根据 [» RFC 3986](http://www.faqs.org/rfcs/rfc3986) 编码指定的字符。

### 8.3、参数说明

**$str**：要编码的 URL。

### 8.4、返回值

返回字符串，此字符串中除了 *-_.* 之外的所有非字母数字字符都将被替换成百分号（*%*）后跟两位十六进制数。这是在 [» RFC 3986](http://www.faqs.org/rfcs/rfc3986) 中描述的编码，是为了保护原义字符以免其被解释为特殊的 URL 定界符，同时保护 URL 格式以免其被传输媒体（像一些邮件系统）使用字符转换时弄乱。

### 8.5、参考

rawurldecode() - 对已编码的URL字符串进行解码，按照RFC3986的标准

urldecode() - 解码已编码的URL 字符串

urldecode() - 编码URL字符串



## 9、urldecode() - 解码已编码的URL字符串

### 9.0、【留心：它是解码任何%xx，加号解码成一个空格字符】

### 9.1、用法示例：

~~~php
urldecode( 要解码的字符串$str ) //返回字符串
~~~

#### 9.1.1 示例1： urldecode() 示例

~~~php
<?php
$query = "my=apple&are=green+and+red";
foreach (explode('&', $query) as $chunk) {
    $param = explode('=', $chunk);
    if ($param) {
        printf("Value for paramater \"%s\" is \"%s\"<br/>\n",urldecode($param[0], $param[1]));
    }
}
// 结果：
Value for paramater "my" is "apple"
Value for paramater "are" is "green and red"
~~~

### 9.2、【必须留心：超全局变量 [$_GET](https://www.php.net/manual/zh/reserved.variables.get.php) 和 [$_REQUEST](https://www.php.net/manual/zh/reserved.variables.request.php) 已经被解码了。对 [$_GET](https://www.php.net/manual/zh/reserved.variables.get.php) 或 [$_REQUEST](https://www.php.net/manual/zh/reserved.variables.request.php) 里的元素使用 **urldecode()** 将会导致不可预计和危险的结果。】

### 9.3、说明

~~~php
urldecode( string $str ) : string 
~~~

解码给出的已编码字符串中的任何 *%##*。 加号（'*+*'）被解码成一个空格字符。

### 9.4、参数说明

**$str**：要解码的字符串。

### 9.5、返回值

返回解码后的字符串。

### 9.6、参考

urlencode( URL字符串$str ) - 编码URL字符串

rawurlencode( URL字符串$str ) - 按照RFC3986对 URL字符串进行编码

rawurldecode( 编码后的URL字符串$str ) - 按照RFC3986标准对 已编码的 URL 字符串进行解码



## 10、urlencode() - 编码URL字符串

### 10.0 【留心：小心与 HTML 实体相匹配的变量】

### 10.1 用法示例：

~~~php
urlencode( 要编码的URL字符串 ) // 返回字符串
~~~

#### 10.1.1 urlencode() 例子

~~~php
<?php
echo '<a href="mycgi?foo=', urlencode('user input'), '">test</a>';
// 结果：
<a href="mycgi?foo=user+input">test</a>
~~~

#### 10.1.2  urlencode() 与 htmlentities() 例子

~~~php
<?php
$query_string = 'foo=' . urlencode('foo1 foo2') . '&bar=' . urlencode('bar1+bar2');
echo '<a href="mycgi?' . htmlentities($query_string) . '">';
// 结果：
<a href="mycgi?foo=foo1+foo2&bar=bar1%2Bbar2"></a>
~~~

### 10.2、留心

注意：小心与 HTML 实体相匹配的变量。像 &amp、&copy 和 &pound 都将被浏览器解析，并使用实际实体替代所期待的变量名。这是明显的混乱，W3C 已经告诫人们好几年了。参考地址：[» http://www.w3.org/TR/html4/appendix/notes.html#h-B.2.2](http://www.w3.org/TR/html4/appendix/notes.html#h-B.2.2)。

PHP 通过 arg_separator.ini 指令，支持将参数分割符变成 W3C 所建议的分号。不幸的是大多数用户代理并不发送分号分隔符格式的表单数据。较为简单的解决办法是使用 & amp; 代替 & 作为分隔符。你不需要为此修改 PHP 的 arg_separator。让它仍为 &，而仅使用 [htmlentities()](https://www.php.net/manual/zh/function.htmlentities.php) 或 [htmlspecialchars()](https://www.php.net/manual/zh/function.htmlspecialchars.php) 对你的 URL 进行编码。

### 10.3、说明

~~~php
urlencode( string $str ) : string
~~~

此函数便于将字符串编码并将其用于 URL 的请求部分，同时它还便于将变量传递给下一页。

### 10.4、参数说明

**$str**：要编码的字符串。

### 10.5、返回值

返回字符串，此字符串中除了 *-_.* 之外的所有非字母数字字符都将被替换成百分号（*%*）后跟两位十六进制数，空格则编码为加号（*+*）。此编码与 WWW 表单 POST 数据的编码方式是一样的，同时与 *application/x-www-form-urlencoded* 的媒体类型编码方式一样。由于历史原因，此编码在将空格编码为加号（+）方面与 [» RFC3986](http://www.faqs.org/rfcs/rfc3986) 编码（参见 [rawurlencode()](https://www.php.net/manual/zh/function.rawurlencode.php)）不同。

### 10.6、参考

urldecode() - 解码已编码的 URL 字符串

htmllentities() - 将字符转换为 HTML转移字符

rawurldecode() - 按照 RFC 3986 对 URL 进行编码

rawurlencode() - 对已编码的 URL 字符串进行解码





## 11、总结：

urlencode：除了 *-_.* 之外的所有非字母数字字符都将被替换成百分号（*%*）后跟两位十六进制数，空格则编码为加号（*+*）。此编码与 WWW 表单 POST 数据的编码方式是一样的，同时与 *application/x-www-form-urlencoded* 的媒体类型编码方式一样。由于历史原因，此编码在将空格编码为加号（+）方面与 [» RFC3986](http://www.faqs.org/rfcs/rfc3986) 编码（参见 [rawurlencode()](https://www.php.net/manual/zh/function.rawurlencode.php)）不同。【空格转加号】

rawurlencode：除了 *-_.* 之外的所有非字母数字字符都将被替换成百分号（*%*）后跟两位十六进制数。这是在 [» RFC 3986](http://www.faqs.org/rfcs/rfc3986) 中描述的编码，是为了保护原义字符以免其被解释为特殊的 URL 定界符，同时保护 URL 格式以免其被传输媒体（像一些邮件系统）使用字符转换时弄乱。

rawurldecode：百分号（*%*）后跟两位十六进制数的序列都将被替换成原义字符。【接口中常用】