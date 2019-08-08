<?php
abstract class AbstractClass
{
    // 抽象方法仅需要定义需要的参数
    abstract protected function prefixName($name);
}

class ConcreateClass extends AbstractClass
{
    // 子类可以定义父类签名中不存在的可选参数
    public function prefixName($name, $separator = '.')
    {
        // TODO: Implement prefixName() method.
        if ($name == 'Tom') {
            $prefix = 'Mr';
        } elseif ($name == 'Lucy') {
            $prefix = 'Mrs';
        } else {
            $prefix = '';
        }
        return "{$prefix}{$separator} {$name}";
    }
}

$class = new ConcreateClass();
echo $class->prefixName('Tom'), "\n";
echo $class->prefixName('Lucy'), "\n";