<?php
require_once 'User.php';

class Employee extends User
{
    private int $salary;

    public function __construct($surname, $name, $patronymic, $salary)
    {
        $this->salary = $salary;

        parent::__construct($surname, $name, $patronymic);
    }

    public function getSalary(): int
    {
        return $this->salary;
    }
}