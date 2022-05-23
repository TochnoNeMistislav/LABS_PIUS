<?php

namespace App\Domain\Catalog\Actions\Employee;
use App\Domain\Catalog\Models\Employee;

class PostEmployeeAction
{
    public function execute(array $fields): Employee
    {
        $employee = Employee::create($fields);

        return $employee;
    }

}