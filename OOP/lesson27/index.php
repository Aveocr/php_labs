<?php

require_once 'Employee.php';
require_once 'Student.php';
require_once 'User.php';
require_once 'City.php';

echo '<pre>';

$arr = [];

$arr[] = new Employee('Иван', 100);
$arr[] = new Employee('Степан', 300);
$arr[] = new Employee('Инокентий', 500);

$arr[] = new Student('Юрий', 400);
$arr[] = new Student('Влад', 600);
$arr[] = new Student('Пётр', 200);


foreach ($arr as $user) {
    if ($user instanceof Employee) {
        echo $user->name . '<br />';
    }
}


foreach ($arr as $user) {
    if ($user instanceof Student) {
        echo $user->name . '<br />';
    }
}


$scholarshipSum = 0;
$salarySum = 0;

foreach ($arr as $user) {
    if ($user instanceof Student) {
        $scholarshipSum += $user->scholarship;
    }

    if ($user instanceof Employee) {
        $salarySum += $user->salary;
    }
}

echo sprintf('%s, %s<br/>', $scholarshipSum, $salarySum);


$arr = [];

$arr[] = new User('Иван', 'Петров');
$arr[] = new User('Степан', 'Разин');
$arr[] = new User('Инокентий', 'Смоктуновский');

$arr[] = new Employee('Кодзима', 30000000, 'Гений');
$arr[] = new Employee('Владимир', 200000, 'Зеленский',);
$arr[] = new Employee('Валерий', 1000, 'Леонтьев');

$arr[] = new City('Харьков', 1500000);
$arr[] = new City('Киев', 20500000);
$arr[] = new City('Белгород', 20000);


foreach ($arr as $user) {
    if ($user instanceof User) {
        echo $user->name . '<br />';
    }
}


foreach ($arr as $user) {
    if (!$user instanceof User) {
        echo $user->name . '<br />';
    }
}


foreach ($arr as $user) {
    if (!$user instanceof Employee && $user instanceof User) {
        echo $user->name . '<br />';
    }
}


echo '</pre>';