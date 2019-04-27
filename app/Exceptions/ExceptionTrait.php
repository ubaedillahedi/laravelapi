<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if($this->isModel($e))
        {
            return $this->ModelResponse();
        }

        if($this->isHttp($e))
        {
            return $this->HttpResponse();
        }

        // return ExceptionHandler::render($request, $exception);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function ModelResponse()
    {
        /*
        this syntax is a custom for response json
        */

        // return response()->json([
        //     'errors' => 'Product model not found'
        // ], Response::HTTP_NOT_FOUND);
        return response([
            'errors' => 'Model not found'
        ], Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse()
    {
        return response([
            'errors' => 'Incorrect route'
        ], Response::HTTP_NOT_FOUND);
    }
}
