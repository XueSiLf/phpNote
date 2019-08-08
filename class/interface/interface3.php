<?php
// 继承多个接口
// 声明接口a
interface a
{
    public function foo();
}
// 声明接口b
interface b
{
    public function bar();
}
// 声明接口c 继承接口a和b
interface c extends a, b
{
    public function baz();
}

// 实现接口c
class d implements c
{
    public function foo()
    {
        // TODO: Implement foo() method.
    }
    public function bar(Baz $baz)
    {
        // TODO: Implement bar() method.
    }
    public function baz()
    {
        // TODO: Implement baz() method.
    }
}