<?php

class Test
{
    public function method1()
    {
        return sprintf('Method %s was called', __FUNCTION__);
    }

    public function method2()
    {
        return sprintf('Method %s was called', __FUNCTION__);
    }

    public function method3()
    {
        return sprintf('Method %s was called', __FUNCTION__);
    }
}

$test = new Test();
foreach (get_class_methods($test) as $method) {
    echo $test->$method().'<br />';
}