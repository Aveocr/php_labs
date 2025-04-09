<?php

require_once 'User.php';

class Employee extends User
{
    private int $salary = 0;


    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setSalary(int $salary)
    {
        $this->salary = $salary;
    }

    public function increaseRevenue(int $value): void
    {
        $this->salary += $value;
    }

    public function decreaseRevenue(int $value): void
    {
        $this->salary = max($this->salary - $value, 0);
    }
}