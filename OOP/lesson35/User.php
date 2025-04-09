<?php

abstract class User
{
    private string $name;


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }


    abstract public function increaseRevenue(int $value): void;

w
    abstract public function decreaseRevenue(int $value): void;
}