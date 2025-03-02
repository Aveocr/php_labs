<?php

class Employee {
    public $name;
    public $age;

    public $salary;

    public function setAge($age) {
        if ($age >= 18) {
            $this->age = $age;
        }
    }

    public function doubleSalary(){
        $this->salary *= 2;
    }
}

$person1 = new Employee;
$person1->name = 'John';
$person1->age = 25;
$person1->setAge(30);

echo $person1->age;
$person1->salary = 1000;


?>