<?php


require_once 'Employee.php';

class EmployeesCollection
{

    private array $employees = [];

    public function addIfNotAdded(Employee $employee)
    {
        if (!$this->exists($employee)) {
            $this->employees[] = $employee;
        }
    }


    public function addIfNotAddedStrict(Employee $employee)
    {
        if (!$this->exists($employee, true)) {
            $this->employees[] = $employee;
        }
    }


    public function get(): array
    {
        return $this->employees;
    }

    public function dump()
    {
        var_dump($this->get());
        echo '==================';
    }


    private function exists($employee, bool $strict = false): bool
    {
        return in_array($employee, $this->employees, $strict);
    }
}