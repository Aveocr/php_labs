<?php


interface Figure3d
{
    public function getVolume(): int|float;

    public function getSurfaceSquare(): int|float;
}