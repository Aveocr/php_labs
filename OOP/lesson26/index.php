<?php


function compare1(object $obj1, object $obj2): bool {
    return $obj1 == $obj2;
}


function compare2(object $obj1, object $obj2): bool {
    return $obj1 === $obj2;
}


function compare3(object $obj1, object $obj2): int {
    if ($obj1 === $obj2) {
        return 1;
    }

    if ($obj1 == $obj2) {
        return 0;
    }

    return -1;
}

require_once 'Employee.php';
require_once 'EmployeesCollection.php';

echo '<pre>';

$employeesCollection = new EmployeesCollection;

$employeesCollection->addIfNotAdded(new Employee('Коля', 100));
$employeesCollection->addIfNotAdded(new Employee('Коля', 100)); // wasn't add

$employeesCollection->dump();

$employeesCollection->addIfNotAddedStrict(new Employee('Вася', 200));
$employeesCollection->addIfNotAddedStrict(new Employee('Вася', 200)); // was added

$employeesCollection->dump();

$employee = new Employee('Петя', 300);
$employeesCollection->addIfNotAddedStrict($employee);
$employeesCollection->addIfNotAddedStrict($employee); // wasn't add
$employeesCollection->addIfNotAddedStrict($employee); // wasn't add

$employeesCollection->dump();

echo '</pre>';
?>