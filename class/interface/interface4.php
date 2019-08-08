<?php
// 使用接口常量
interface a
{
    const b = 'Interface constant';
}
// 输出接口常量
echo a::b;

// 错误写法 因为常量不能被子类和子接口覆盖。接口常量和类常量是一个概念
/*class b implements a
{
    const b = 'Class constant';
}*/
