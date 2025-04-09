<?php

class ParentClass {}
class ChildClass extends ParentClass {}

var_dump(get_parent_class(ChildClass::class));