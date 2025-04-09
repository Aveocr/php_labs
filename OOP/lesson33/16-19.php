<?php

class GrandParentClass {}
class ParentClass extends GrandParentClass {}
class ChildClass extends ParentClass {}

var_dump(is_subclass_of(ChildClass::class, GrandParentClass::class));

var_dump(is_subclass_of(ParentClass::class, GrandParentClass::class));


var_dump(is_subclass_of(ChildClass::class, ParentClass::class));