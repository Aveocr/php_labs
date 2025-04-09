<?php
class User
{
    private $name;
    private $age;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function setAge($age)
    {
        $this->age = $age;
    }
}


class Student extends User
{
    private $course;
    
    // Реализуем этот метод:
    public function addOneYear()
    {
        $this->age++;
    }
    
    public function getCourse()
    {
        return $this->course;
    }
    
    public function setCourse($course)
    {
        $this->course = $course;
    }
}
?>