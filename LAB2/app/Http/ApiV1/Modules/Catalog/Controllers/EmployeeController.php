<?php

namespace App\Http\ApiV1\Modules\Catalog\Controllers;

use App\Http\ApiV1\Modules\Catalog\Controllers\Controller;
use App\Domain\Catalog\Actions\Employee\DeleteEmployeeAction;
use App\Domain\Catalog\Actions\Employee\PostEmployeeAction;
use App\Domain\Catalog\Actions\Employee\PutEmployeeAction;
use App\Domain\Catalog\Actions\Employee\GetEmployeeAction;
use App\Domain\Catalog\Actions\Employee\PatchEmployeeAction;
use App\Http\ApiV1\Modules\Catalog\Resources\EmployeeResource;
use App\Http\ApiV1\Modules\Catalog\Requests\EmployeeRequests\PatchEmployeeRequest;
use App\Http\ApiV1\Modules\Catalog\Requests\EmployeeRequests\PostEmployeeRequest;
use App\Http\ApiV1\Modules\Catalog\Requests\EmployeeRequests\PutEmployeeRequest;



class EmployeeController extends Controller
{
    public static string $code = '200';
    public static string $message = 'OK';

    public function patch(int $id, PatchEmployeeRequest $request, PatchEmployeeAction $action) {
        return new EmployeeResource(
            $action->execute($id, $request->validated())
        );
    }

    public function get(int $id, GetEmployeeAction $action) {
        $employee = new EmployeeResource($action->execute($id));
        $employee->message = EmployeeController::$message;
        $employee->code = EmployeeController::$code;

        return response()->json($employee, EmployeeController::$code);
    }

    public function post(PostEmployeeRequest $request, PostEmployeeAction $action) {
        $employee = new EmployeeResource(
            $action->execute($request->validated())
        );
        return response()->json($employee, 201);
    }
    
    public function delete(int $id, DeleteEmployeeAction $action)
    {
        $employee = new EmployeeResource($action->execute($id));
        $employee->message = EmployeeController::$message;
        $employee->code = EmployeeController::$code;

        return response()->json($employee, EmployeeController::$code);

    }
    
    public function put(int $id, PutEmployeeRequest $request, PutEmployeeAction $action) {
        $employee = new EmployeeResource(
            $action->execute($id, $request->validated())
        );
        return response()->json($employee, EmployeeController::$code);
    }
}
