<?php
// 定义接口
interface iTemplate
{
    public function a($a);
    public function b($b);
}


// 实现接口
class test1 implements iTemplate
{
    public function a($a)
    {
        return 'a: ' . $a;
    }
    public function b($b)
    {
        return 'b: ' . $b;
    }
}

$test = new test1();
echo $test->a(1);
echo $test->b(3);