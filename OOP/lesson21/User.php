<?php

class User
{
    protected string $name;
    protected int $age;

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        if (mb_strlen($name) > 3) {
            $this->name = $name;
        }
    }

    public function getAge(): int {
        return $this->age;
    }

    public function setAge(int $age): void {
        if ($age >= 18) {
            $this->age = $age;
        }
    }
}