<?php

class Test1 {}

var_dump(class_exists(Test1::class)); // true
var_dump(class_exists('Test2')); // false


$class = filter_input(INPUT_GET, 'class', FILTER_SANITIZE_STRING);
$class = trim($class);

if (!empty($class)) {
    var_dump(class_exists($class));
}