<?php

class Post
{
    private string $name;
    private int $salary;

    public function __construct(string $name, int $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }
}