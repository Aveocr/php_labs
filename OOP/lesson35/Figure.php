<?php

abstract class Figure
{
    abstract public function getSquare(): float|int;
    abstract public function getPerimeter(): float|int;


    public function getRatio(): float|int
    {
        return $this->getSquare() / $this->getPerimeter();
    }


    public function getSquarePerimeterSum(): float|int
    {
        return $this->getSquare() + $this->getPerimeter();
    }
}