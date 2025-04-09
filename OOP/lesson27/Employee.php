<?php

require_once 'User.php';

class Employee extends User
{
    public int $salary;

    public function __construct(string $name, int $salary, string $surname = '') // optional param for passing 27.3
    {
        $this->salary = $salary;

        parent::__construct($name, $surname);
    }
}