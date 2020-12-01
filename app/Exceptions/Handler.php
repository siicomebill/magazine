<?php

namespace App\Exceptions;

use App\Http\Policies\HumblePolicy;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Throwable;

class Handler extends ExceptionHandler
{
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $this->container->singleton(HumblePolicy::class, function ($app) {
            return new HumblePolicy();
        });
        app(HumblePolicy::class)->addDirective(Directive::SCRIPT, Keyword::UNSAFE_INLINE);
        app(HumblePolicy::class)->addDirective(Directive::STYLE, Keyword::UNSAFE_INLINE);

        return parent::render($request, $exception);
    }
}
