# url函数

[TOC]

## base64_decode()  对使用 MIME base64 编码的数据进行解码

### 【留心：返回值的类型】

### 用法示例：

~~~php
base64_decode( 编码后的字符串$str )

base64_decode( 编码后的字符串$str, TRUE) 一旦输入的数据超出了 【base64 字母表】，将返回 FALSE。 否则会静默丢弃无效的字符。
~~~



### 示例：

~~~php
<?php
    $str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
    echo base64_decode($str);
// 结果：
// This is an encoded string
~~~



### 返回值：字符串 或者 FALSE

### 说明：

~~~php
base64_decode( string $data[, bool $strict = false] ) : string
~~~

对 base64 编码的 `data` 进行解码。

### 参数：

$data：编码过的数据

$strict：当设置 `strict` 为 **TRUE** 时，一旦输入的数据超出了 base64 字母表，将返回 **FALSE**。 否则会静默丢弃无效的字符。

### 返回值说明：

返回原始数据， 或者在失败时返回 **FALSE**。返回的数据可能是二进制的。



## base64_encode()  使用 MIME base64 对数据进行编码

### 【留心：返回值为 字符串 或者 FALSE 】

### 用法示例：

~~~php
base64_encode( 字符串$str )
~~~

### 示例：

~~~php
<?php
    $str = 'This is an encoded string';
    echo base64_encode($str);
    // 结果
    // VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==
~~~

### 说明：

~~~php
base64_encode( string $data ) ：string 
~~~

使用 base64 对 `data` 进行编码。

设计此种编码是为了使二进制数据可以通过非纯 8-bit 的传输层传输，例如电子邮件的主体。

Base64-encoded 数据要比原始数据多占用 33% 左右的空间。

#### 【占用空间比原始数据大%33左右】

### 参数说明：

$data：要编码的数据

### 返回值说明：

编码后的字符串数据， 或者在失败时返回 **FALSE**。



## get_headers()  取得服务器响应一个 HTTP 请求所发送的所有标头

### 【留心：返回值的类型为索引数组 或者 关联数组 或者 false 】

### 用法示例：

~~~php
get_headers( 字符串URL$url ) : array 返回索引数组
get_headers( 字符串URL$url, 1) : array 返回关联数组
~~~

### 示例：

#### 示例1：get_headers() 例子

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

#### 示例2：get_headers() 使用HEAD 例子

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



### 说明：

~~~php
get_headers( string $url[, int $format = 0] ) : array
~~~

**get_headers()** 返回一个数组，包含有服务器响应一个 HTTP 请求所发送的标头。

### 参数说明：

$url：目标URL

$format：如果将可选的 `format` 参数设为 1，则 **get_headers()** 会解析相应的信息并设定数组的键名。

### 返回值说明：

返回包含有服务器响应一个 HTTP 请求所发送标头的索引或关联数组，如果失败则返回 **FALSE**。

### 参考：

apache_request_headers() - 获取全部HTTP请求头信息



## get_meta_tags() 

## http_build_query() - 生成 URL-encode 之后的请求字符串【把数组组装成查询字符串】

### 【留心：返回值的格式，参数中数字前缀参数，分隔符号参数，加密类型】

### 用法示例：

~~~php
http_build_query( 数组$arr ) : string // 返回采用&分隔字符串 键=值&键=值
http_build_query( 数组$arr, 数字前缀) // 返回采用&分隔字符串   
http_build_query( 数组$arr, 数字前缀, 分隔符)
http_build_query( 对象$obj, )
~~~

#### 示例1：http_build_query() 使用分隔符

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

#### 示例2：http_build_query() 使用数字下标的元素 使用前缀（只针对索引数组）

~~~php
<?php
    $data = array('foo', 'bar', 'baz', 'boom', 'cow' => 'milk', 'php' =>'hypertext processor');
    echo http_build_query($data) . "\n";
    echo http_build_query($data, 'myvar_');
// 结果：
0=foo&1=bar&2=baz&3=boom&cow=milk&php=hypertext+processor
myvar_0=foo&myvar_1=bar&myvar_2=baz&myvar_3=boom&cow=milk&php=hypertext+processor
~~~

#### 示例3：http_build_query() 使用复杂的数组

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

##### 【留心：只有基础数组中的数字下标元素获取了前缀】

下标元素“CEO”才获取了前缀，其它数字下标元素（如 pastimes 下的元素）则不需要为了合法的变量名而加上前缀。

#### 示例4：http_build_query() 使用对象

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



### 【关键：常常配合 parse_str 使用】

### 【参考：】

parse_str( $str, $output ) - 将字符串解析成多个变量

parse_url( $url ) - 解析URL，返回其组成部分

urlencode( $url ) - 编码URL字符串

array_walk() - 使用用户自定义函数对数组中的每个元素做回调处理









## parse_url()

## rawurldecode()

## rawurlencode()

## urldecode()

## urlencode()