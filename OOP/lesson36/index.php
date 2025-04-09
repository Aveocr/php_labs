<?php

require_once 'Disk.php';

$circle = new Disk(10);

var_dump($circle->getPerimeter());
var_dump($circle->getSquare());