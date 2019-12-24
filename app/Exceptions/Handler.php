<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Traits\ResponseTrait;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ResponseTrait;
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
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        switch (true) {
            case $exception instanceof ModelNotFoundException:
                return $this->response('Запись не найдена', null, 404, 'error');
            case $exception instanceof NotFoundHttpException:
                return $this->response('Not found', null, 404, 'error');
            default:
                return $this->response($exception->getMessage(), null, $exception->getCode(), 'error');
        }
    }
}
