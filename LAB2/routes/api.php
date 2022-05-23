<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Modules\Catalog\Controllers\CustomerController;
use App\Http\ApiV1\Modules\Catalog\Controllers\EmployeeController;
use App\Http\ApiV1\Modules\Catalog\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ApiV1/Customer/{id}', [CustomerController::class, 'get']);
Route::patch('ApiV1/Customer/{id}', [CustomerController::class, 'patch']);
Route::post('ApiV1/Customer/', [CustomerController::class, 'post']);
Route::delete('ApiV1/Customer/{id}', [CustomerController::class, 'delete']);
Route::put('ApiV1/Customer/{id}', [CustomerController::class, 'put']);

Route::get('ApiV1/Employee/{id}', [EmployeeController::class, 'get']);
Route::patch('ApiV1/Employee/{id}', [EmployeeController::class, 'patch']);
Route::post('ApiV1/Employee/', [EmployeeController::class, 'post']);
Route::delete('ApiV1/Employee/{id}', [EmployeeController::class, 'delete']);
Route::put('ApiV1/Employee/{id}', [EmployeeController::class, 'put']);

Route::get('ApiV1/Order/{id}', [OrderController::class, 'get']);
Route::patch('ApiV1/Order/{id}', [OrderController::class, 'patch']);
Route::post('ApiV1/Order/', [OrderController::class, 'post']);
Route::delete('ApiV1/Order/{id}', [OrderController::class, 'delete']);
Route::put('ApiV1/Order/{id}', [OrderController::class, 'put']);
