<?php

class Test
{
    public function method1()
    {
        return sprintf('Method %s of class %s was called', __FUNCTION__, __CLASS__);
    }
}

var_dump(method_exists(Test::class, 'method1')); // true
var_dump(method_exists(Test::class, 'method2')); // false


$class = filter_input(INPUT_GET, 'class', FILTER_SANITIZE_STRING);
$class = trim($class);

$method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_STRING);
$method = trim($method);

if (empty($class) || empty($method)) {
    // Не передали в параметрах класс либо метод.
    return;
}

if (!class_exists($class)) {
    // Класса не существует.
    return;
}

if (!method_exists($class, $method)) {
    // Метода у класса не существует.
    return;
}

$obj = new $class();
echo $obj->$method();