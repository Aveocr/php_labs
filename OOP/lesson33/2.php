<?php


class Test1
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Test2
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$arr = [
    new Test1('2'),
    new Test1('3'),
    new Test2('4'),
    new Test2('5'),
];
foreach ($arr as $obj) {
    printf('Объект с именем: %s, класс %s<br/>', $obj->name, get_class($obj));
}