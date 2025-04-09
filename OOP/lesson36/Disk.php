<?php

require_once 'Figure.php';

class Disk implements Figure
{
    const PI = 3.14;
    private $radius;

    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    public function getSquare(): float
    {
        return self::PI * ($this->radius * $this->radius);
    }

    public function getPerimeter(): float
    {
        return 2 * self::PI * $this->radius;
    }
}