<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Modules\Catalog\Controllers\OrderController;
use App\Http\ApiV1\Modules\Catalog\Resources\OrderResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\ApiV1\Modules\Catalog\Controllers\CustomerController;
use App\Http\ApiV1\Modules\Catalog\Resources\CustomerResource;
use App\Http\ApiV1\Modules\Catalog\Controllers\EmployeeController;
use App\Http\ApiV1\Modules\Catalog\Resources\EmployeeResource;
use App\Http\ApiV1\Modules\Catalog\Resources\BadPathResource;
use App\Http\ApiV1\Modules\Catalog\Resources\EmptyResource;
use Dotenv\Exception\ValidationException;
use Throwable;
use TypeError;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

     /**
     * @param Request $request
     * @param Throwable $e
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof NotFoundHttpException)
        {
            return response()->json(new BadPathResource($request), 404);
        }

        if ($request->is('api/ApiV1/Order*')) {
            if ($e instanceof ModelNotFoundException) {
                CustomerController::$code = 404;
                CustomerController::$message = "NOT FOUND";
                return response()->json(new EmptyResource($request), 404);
            }
            else  {
                if($e instanceof ValidationException || $e instanceof TypeError)
                {
                    CustomerController::$code = 400;
                    CustomerController::$message = "BAD REQUEST";
                    return response()->json(new EmptyResource($request), 400);

                }
                // CustomerController::$code = 500;
                // CustomerController::$message = "INTERNAL SERVER ERROR";
                // return response()->json(new EmptyResource($request), 500);
            }
        }
        else if ($request->is('api/ApiV1/Customer*')) {
            if ($e instanceof ModelNotFoundException) {
                CustomerController::$code = 404;
                CustomerController::$message = "NOT FOUND";
                return response()->json(new EmptyResource($request), 404);
            }
            else  {
                CustomerController::$code = 500;
                CustomerController::$message = "INTERNAL SERVER ERROR";
                return response()->json(new EmptyResource($request), 500);
            }
        }
        else if ($request->is('api/ApiV1/Employee*')) {
            if ($e instanceof ModelNotFoundException) {
                CustomerController::$code = 404;
                CustomerController::$message = "NOT FOUND";
                return response()->json(new EmptyResource($request), 404);
            }
            else  {
                CustomerController::$code = 500;
                CustomerController::$message = "INTERNAL SERVER ERROR";
                return response()->json(new EmptyResource($request), 500);
            }
        }

        return parent::render($request, $e);
    }
}