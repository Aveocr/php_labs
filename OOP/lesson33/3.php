<?php

class Test
{
    public function method1() {}
    public function method2() {}
    public function method3() {}
}

var_dump(get_class_methods(Test::class));