<?php
abstract class AbstractClass
{
    // 强制要求子类定义这些方法
    abstract protected function getvalue();
    abstract protected function prefixValue($prefix);

    // 普通方法（非抽象方法）
    public function printOut()
    {
        print $this->getvalue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getvalue()
    {
        // TODO: Implement getvalue() method.
        return "ConcreteClass1";
    }
    public function prefixValue($prefix)
    {
        // TODO: Implement prefixValue() method.
        return "{$prefix}ConcreteClass1";
    }
}
class ConcreteClass2 extends AbstractClass
{
    public function getvalue()
    {
        // TODO: Implement getvalue() method.
        return "ConcreteClass2";
    }
    public function prefixValue($prefix)
    {
        // TODO: Implement prefixValue() method.
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1();
$class1->printOut();
// ConcreteClass1

echo $class1->prefixValue('FOO_') . "\n";
// FOO_ConcreteClass1

$class2 = new ConcreteClass2();
$class2->printOut();
// ConcreteClass2
echo $class2->prefixValue('FOO_') . "\n";
// FOO_ConcreteClass1