<?php
// post直接传递过来的数据不做任何处理，只能通过$_POST获取
echo '<br> post 数据是:';
echo '<pre>';
var_dump($_POST);

// post直接传递过来的数据 通过 json 编码 或者 http_build_query 处理
// 可以通过file_get_contents('php://input')获取请求中的POST参数
$result = file_get_contents('php://input');

echo 'file_get_contents 数据是:' . "\n";

# json编码处理
# 转换为数组
$result = json_decode($result, true);
var_dump($result);


# http_build_query() 处理
### 方法一：
parse_str($result, $output);
var_dump($output);

### 方法二：
# name=hlh&pwd=123 => array('name=hlh', 'pwd=123')
$result = explode('&', $result);
$res_arr = array();
# array('name=hlh', 'pwd=123') => array('name' => 'hlh', 'pwd' => '123')
foreach ($result as $key => $value) {
    if (!empty($value)) {
        $temp = explode('=', $value);
        if (empty($temp[1])) {
            $temp[1] = '';
        }
        $res_arr[$temp[0]] = $temp[1];
    }
}
var_dump($res_arr);

