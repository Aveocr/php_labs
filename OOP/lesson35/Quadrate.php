<?php

require_once 'Figure.php';

class Quadrate extends Figure
{
    private int $a;

    public function __construct(int $a)
    {
        $this->a = $a;
    }


    public function getSquare(): float|int
    {
        return $this->a * $this->a;
    }


    public function getPerimeter(): float|int
    {
        return 4 * $this->a;
    }
}