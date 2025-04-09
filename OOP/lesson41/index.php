<?php


require_once '../35/Quadrate.php';
require_once '../35/Rectangle.php';
require_once '../35/Figure.php';
require_once 'Cube.php';
require_once 'Figure3d.php';

$quadrate = new Quadrate(5);
$rectangle = new Rectangle(4,5);
$cube = new Cube(4);

$arr = [$rectangle, $quadrate, $cube];

foreach ($arr as $obj) {
    if ($obj instanceof Figure) {
        var_dump($obj->getSquare());
    } elseif($obj instanceof Figure3d) {
        var_dump($obj->getSurfaceSquare());
    }
}