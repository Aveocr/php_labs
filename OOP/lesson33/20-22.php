<?php

class ParentClass {}
class ChildClass extends ParentClass {}

$obj = new ChildClass();


var_dump(is_a($obj, ChildClass::class));


var_dump(is_a($obj, ParentClass::class));