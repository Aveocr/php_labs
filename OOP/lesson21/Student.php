<?php

require_once 'User.php';
class Student extends User
{
    private int $course;

    public function setAge($age): void {
        if ($age <= 25) {
            parent::setAge($age);
        }
    }

    public function getCourse(): int {
        return $this->course;
    }

    public function setCourse(int $course): void {
        $this->course = $course;
    }

    public function setName(string $name): void {
        if (mb_strlen($name) < 10) {
            parent::setName($name);
        }
    }
}