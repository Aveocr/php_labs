<?php

class Employee {
    public $name;
    public $age;
    public $salary;
}

$person1 = new Employee;
$person1->name = 'John';
$person1->age = 25;
$person1->salary = 1000;

$person2 = new Employee;
$person2->name = 'eric';
$person2->age = 26;
$person2->salary = 2000;

# Зарплата
echo "Salary: ";
echo $person1->salary + $person2->salary;

echo "\nAge: ";
echo $person1->age + $person2->age;
?>