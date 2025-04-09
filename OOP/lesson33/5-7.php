<?php

class Test {

    public function __construct()
    {
        var_dump(get_class_vars(self::class));
    }

    public $prop1;
    public $prop2;

    private $prop3;
    private $prop4;
}


var_dump(get_class_vars(Test::class));


new Test();