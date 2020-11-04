<?php

namespace App\Exceptions;

use Throwable;
use Neomerx\JsonApi\Exceptions\JsonApiException;
use CloudCreativity\LaravelJsonApi\Exceptions\HandlesErrors;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use HandlesErrors;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        JsonApiException::class,
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
     * Render an exception into an HTTP response json:api specification.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Throwable $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        // [Eng] Comment if you need to see better the exceptions when running the tests.
        // [Spa] Comentar si requiere ver mejor las excepciones al momento de correr las pruebas.
        if ($this->isJsonApi($request, $exception)) {
            return $this->renderJsonApi($request, $exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * Prepare exception for rendering json:api specification.
     *
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpKernel\Exception\HttpException \Throwable
     */
    protected function prepareException(Throwable $exception)
    {
        if ($exception instanceof JsonApiException) {
            return $this->prepareJsonApiException($exception);
        }

        return parent::prepareException($exception);
    }
}
