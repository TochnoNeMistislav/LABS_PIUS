<?php

namespace App\Domain\Catalog\Actions\Employee;
use App\Domain\Catalog\Models\Employee;

class DeleteEmployeeAction
{
    public function execute(int $employeeId): Employee
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();

        return $employee;
    }

}