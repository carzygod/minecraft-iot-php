<?php

namespace App\Exceptions;

use App\Services\ApiResponseService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseService;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param $request
     * @param Throwable $exception
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception): Response
    {
        if ($exception instanceof AuthenticationException) {
            return $this->unauthorized('请求未认证');
        }

        if ($exception instanceof AuthorizationException) {
            return $this->unauthorized('请求未授权');
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->notFound('请求地址不存在');
        }

        if ($exception instanceof UnauthorizedException) {
            return $this->unauthorized('权限不足');
        }

        return parent::render($request, $exception);
    }
}
