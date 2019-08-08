<?php
// 可扩充的接口
interface a
{
    public function foo();
}
// 接口b继承接口a
interface b extends a
{
    public function bar(Baz $baz);
}

// 实现接口b
class c implements b
{
    public function foo()
    {
        // TODO: Implement foo() method.
    }
    public function bar(Baz $baz)
    {
        // TODO: Implement bar() method.
    }
}