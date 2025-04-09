<?php

class Test
{
    public $prop1 = 'property 1';
    public $prop3 = 'property 3';
}

var_dump(property_exists(Test::class, 'prop1')); // true
var_dump(property_exists(Test::class, 'prop2')); // false


$props = [
    'prop1',
    'prop2',
    'prop3',
    'prop4',
];
foreach ($props as $prop) {
    if (property_exists(Test::class, $prop)) {
        echo (new Test())->$prop . '<br/>';
    }
}