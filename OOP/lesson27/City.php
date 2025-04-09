<?php

class City
{
    public string $name;
    public int $population;

    public function __construct(string $name, int $population)
    {
        $this->name = $name;
        $this->population = $population;
    }
}