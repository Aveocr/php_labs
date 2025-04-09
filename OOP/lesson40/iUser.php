<?php


interface iUser
{
    public function getName(): string;


    public function setName(string $name): void;


    public function getAge(): int;


    public function setAge(int $age): void;
}