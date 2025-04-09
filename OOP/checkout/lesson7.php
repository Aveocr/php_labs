<?php

class Employee {
    public $name;
    public $age;
    public $salary;

    public function __construct($name="John", $age = 32, $salary=1200){
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
}

$person1 = new Employee("eric", 25, 1000);
$person2 = new Employee('kyle', 30, 2000);

echo "<p>";
echo $person1->age + $person2->age;
echo "</p>"; 
?>