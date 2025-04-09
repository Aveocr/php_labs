<?php


class Circle
{
    const PI = 3.14;
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }


    public function getSquare(): float
    {
        return self::PI * ($this->radius * $this->radius);
    }

    public function getCircuit(): float
    {
        return (2 * self::PI) * $this->radius;
    }
}