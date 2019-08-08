<?php

abstract class Base{

    // 抽象方法子类继承 子类必须全部实现
    // 并且权限和参数类型数量
    // 强制要求子类定义这些方法
    abstract public function a($a);
    abstract protected function b($a, $b);
//    abstract private function cc($c);// 注意抽象类中方法不能声明为私有的

    public function hello()
    {
        echo 'heloo';
    }
}


class Simple extends Base
{
    public function a($a)
    {
        return $a;
    }
    protected function b($a, $b)
    {
        return $a + $b;
    }
    private function cc($c)
    {
        return $c;
    }
}

$simple = new Simple();
echo $simple->a(111);