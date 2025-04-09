<?php

require_once '../36/Figure.php';

class FiguresCollection
{

    private array $figures = [];


    public function add(Figure $figure)
    {
        $this->figures[] = $figure;
    }

    public function getTotalSquare(): float|int
    {
        $sum = 0;

        foreach ($this->figures as $figure) {
            $sum += $figure->getSquare();
        }

        return $sum;
    }


    public function getTotalPerimeter(): float|int
    {
        $sum = 0;

        foreach ($this->figures as $figure) {
            $sum += $figure->getPerimeter();
        }

        return $sum;
    }
}