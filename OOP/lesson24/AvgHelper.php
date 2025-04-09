<?php

require_once 'SumHelper.php';

class AvgHelper
{
    /** @var SumHelper */
    private SumHelper $sumHelper;


    public function __construct()
    {
        $this->sumHelper = new SumHelper();
    }


    public function getAvg(array $arr): float|int
    {
        return $this->sumHelper->getSum1($arr) / count($arr);
    }


    private function getAvg2(array $arr): float|int
    {
        return $this->sumHelper->getSum2($arr) / count($arr);
    }


    public function getMeanSquare(array $arr): float
    {
        return sqrt($this->getAvg2($arr));
    }
}