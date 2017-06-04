<?php

// Change here.

namespace App\Exceptions;

use Exception;

use Illuminate\Auth\AuthenticationException;

use Illuminate\Auth\Access\AuthorizationException;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;

use Symfony\Component\HttpKernel\Exception\HttpException;

use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        HttpException::class,

        LoginFailedException::class,
        RequestValidationException::class,
        ResourceNotFoundException::class
    ];

    public function report(Exception $e)
    {
        parent::report($e);
    }

    public function render($request, Exception $e)
    {
        if (env('APP_DEBUG')) {
            return parent::render($request, $e);
        }

        if ($e instanceof AuthenticationException) {
            return response()->json(['message' => $e->getMessage(), 'status_code' => Response::HTTP_UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);
        }

        if ($e instanceof AuthorizationException) {
            return response()->json(['message' => $e->getMessage(), 'status_code' => Response::HTTP_FORBIDDEN], Response::HTTP_FORBIDDEN);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json(['message' => $e->getMessage(), 'status_code' => Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ValidationException) {
            return response()->json(['message' => $e->getMessage(), 'status_code' => Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        }

        if ($e instanceof HttpException) {
            return response()->json(['message' => $e->getMessage(), 'status_code' => $e->getStatusCode()], $e->getStatusCode());
        }

        if ($e instanceof LoginFailedException) {
            return response()->json(['message' => $e->getMessage(), 'status_code' => Response::HTTP_UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);
        }

        if ($e instanceof ResourceNotFoundException) {
            return response()->json(['message' => $e->getMessage(), 'status_code' => Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof RequestValidationException) {
            return response()->json(['message' => $e->getMessage(), 'errors' => $e->getErrors(), 'status_code' => Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'The server encountered an internal error.', 'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

?>