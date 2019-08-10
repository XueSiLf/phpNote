<?php
function http_send_post()
{
    $data = array(
        'username' => 'hlh',
        'password' => '123',
        'sign' => 'adafasfa'
    );
    # 第一种：不做任何处理，直接传递参数，
    # 会导致 post.php 无法通过file_get_contents('php://input')函数获取 $_POST参数，只能通过$_POST超全局变量

    # 第二种：使用json 编码处理，post.php 可以通过file_get_contents('php://input')函数获取 $_POST参数
    // $data = json_encode($data);

    # 第三种：使用http_build_query 建立查询字符串处理，
    # post.php 可以通过file_get_contents('php://input')函数获取 $_POST参数
    // $data = http_build_query($data);
    $url = 'http://localhost/post.php';// post.php是接受数据的文件，代码在下面
    $ch = curl_init();// 初始化curl
    curl_setopt($ch, CURLOPT_URL, $url);// 设置链接
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// 设置是否返回信息
    curl_setopt($ch, CURLOPT_POST, 1);// 设置为POST方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);// POST数据
    // 可选参数
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727');
    $ressponse = curl_exec($ch);// 接受返回信息
    // 出错则显示错误信息
    if (curl_errno($ch)) {
        print curl_error($ch);
    }
    curl_close($ch);// 关闭curl链接
    echo $ressponse;// 显示返回信息
}
http_send_post();