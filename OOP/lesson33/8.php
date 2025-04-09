<?php


class Test {
    public $prop1;
    public $prop2;

    private $prop3;
    private $prop4;
}

$test = new Test();

var_dump(get_object_vars($test));