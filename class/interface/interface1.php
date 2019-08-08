<?php
// 声明一个'iTemplate'接口
interface iTemplate1
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// 实现接口
class Template implements iTemplate1
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        // TODO: Implement setVariable() method.
        $this->vars[$name] = $var;
    }
    public function getHtml($template)
    {
        // TODO: Implement getHtml() method.
        foreach ($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $var, $template);
        }
        return $template;
    }
}