<?php

namespace App\Domain\Catalog\Actions\Employee;
use App\Domain\Catalog\Models\Employee;

class GetEmployeeAction
{
    public function execute(int $employeeId): Employee
    {
        $employee = Employee::findOrFail($employeeId);

        return $employee;
    }

}