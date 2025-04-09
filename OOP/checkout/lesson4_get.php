<?php

class Employee {
    public $name;
    public $age;
    public $salary;

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function checkAge(){
        return  $this->age > 18 ? true : false;
    }

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
echo $person1->getSalary() + $person2->getSalary();

echo "\nAge: ";
echo $person1->age + $person2->age;
?>