<?php

namespace App\Domain\Catalog\Actions\Employee;
use App\Domain\Catalog\Models\Employee;

class PutEmployeeAction
{
    public function execute(int $employeeId, array $fields): Employee
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->update($fields);

        return $employee;
    }

}