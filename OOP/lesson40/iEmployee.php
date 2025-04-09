<?php


require_once 'iUser.php';

interface iEmployee extends iUser
{

    public function getSalary(): int;


    public function setSalary(int $salary): void;
}