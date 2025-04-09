<?php


require_once 'iEmployee.php';

class Employee implements iEmployee
{

    private int $name;
    private int $salary;
    private int $age;


    public function getSalary(): int
    {
        return $this->salary;
    }


    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}