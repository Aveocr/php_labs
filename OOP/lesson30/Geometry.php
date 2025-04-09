<?php

class Geometry
{
    private static $pi = 3.14;

    public static function getCircleSquare($radius)
    {
        return self::$pi * $radius * $radius;
    }

    public static function getCircleCircuit($radius)
    {
        return 2 * self::$pi * $radius;
    }


    public static function getCircleVolume($radius)
    {
        return 4/3 * self::$pi * $radius * $radius * $radius;
    }
}