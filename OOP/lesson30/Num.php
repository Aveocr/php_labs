<?php

class Num
{
    private static int $num1 = 2;
    private static int $num2 = 3;

    public static function getSum()
    {
        return self::$num1 + self::$num2;
    }
}