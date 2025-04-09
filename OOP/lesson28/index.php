<?php

require_once 'Post.php';
require_once 'Employee.php';

$programmer = new Post('Программист', 2000);
$manager = new Post('Менеджер', 1000);
$driver = new Post('Водитель', 500);


$emp = new Employee('Павел', 'Барнашев', $programmer);

echo $emp->getName();
echo $emp->getSurname();
echo $emp->getPost()->getName();
echo $emp->getPost()->getSalary();