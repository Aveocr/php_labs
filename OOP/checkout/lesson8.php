<?php

class Employee {
    private $name;
    private $age;
    private $salary;

    public function get_name(){
        return $this->name;
    }
    public function get_age(){
        return $this->age;
    }
    public function get_salary(){
        return "<p>$this->salary \$</p>";
    }

    private function isAgeCorrect($age){
        return $age < 100 ? ($age > 1 ? True : False)   : False;
    }

    public function set_name($name){
        $this->name = $name;
    }
    public function set_age($age){
        if ($this->isAgeCorrect($age)){
        $this->age = $age;
        }
        else {
            throw new Exception("Incorrect age");
        }
    }
    public function set_salary($salary){
        $this->salary = $salary;
    }

    public function __construct($name="John", $age = 32, $salary=1200){
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
}

?>