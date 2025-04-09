<?php

/*
 * Задача 24.1
 * Самостоятельно повторите описанные мною классы Arr и SumHelper.
 */

require_once 'SumHelper.php';
require_once 'AvgHelper.php';

class Arr
{

    private array $nums = [];


    private SumHelper $sumHelper;

    private AvgHelper $avgHelper;


    public function __construct()
    {
        $this->sumHelper = new SumHelper();
        $this->avgHelper = new AvgHelper();
    }


    public function getSum23(): float|int
    {
        $nums = &$this->nums;

        return $this->sumHelper->getSum2($nums) + $this->sumHelper->getSum3($nums);
    }


    public function add(int $number): void
    {
        $this->nums[] = $number;
    }
    
    public function getAvgMeanSum(): float|int
    {
        $nums = &$this->nums;

        return $this->avgHelper->getAvg($nums) + $this->avgHelper->getMeanSquare($nums);
    }
}