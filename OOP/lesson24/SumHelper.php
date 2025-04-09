<?php

class SumHelper
{

    public function getSum1(array $arr): float|int
    {
        return $this->getSum($arr, 1);
    }

    public function getSum2(array $arr): float|int
    {
        return $this->getSum($arr, 2);
    }


    public function getSum3(array $arr): float|int
    {
        return $this->getSum($arr, 3);
    }

    private function getSum(array $arr, int $power): float|int
    {
        $sum = 0;

        foreach ($arr as $elem) {
            $sum += $elem ** $power;
        }

        return $sum;
    }
}