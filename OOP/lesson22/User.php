<?php

class User
{
    private string $name;
    private string $surname;
    private string $birthday;
    private int $age;
    public function __construct(string $name, string $surname, string $birthday)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;

        $this->age = $this->calculateAge($birthday);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    private function calculateAge(string $birthday): int
    {
        $birthdayDt = new DateTime($birthday);
        $today = new DateTime();
        return (int) $today->diff($birthdayDt)->format('%y');
    }
}