<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends Exception
{
    public function render($request, Throwable $exception){
        $response = $this->handleException($request, $exception);

        return $response;
    }

    public function handleException($request, Throwable $exception){
        if($exception instanceof AuthenticationException){
            return ResponseHelper::errorResponse('Unauthenticated', [], 401);
        }

        if($exception instanceof MethodNotAllowedHttpException){
            return ResponseHelper::errorResponse('The specified method for the request is invalid',[], 405);
        }

        if($exception instanceof NotFoundHttpException){
            return ResponseHelper::errorResponse('The specified URL cannot be found', [], 404);
        }

        if($exception instanceof ValidationException){
            return ResponseHelper::errorResponse('Validation Error', [$exception->errors()], 422);
        }

        return ResponseHelper::errorResponse('Something went wrong', [
            "error" => $exception->getMessage(),
            "file" => $exception->getFile(),
            "line" => $exception->getLine(),
        ], 500);

    }
}
