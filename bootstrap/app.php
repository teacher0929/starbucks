<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn() => abort(404));
        $middleware->redirectUsersTo(fn() => route('admin.dashboard'));
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\WebMiddleware::class,
            \App\Http\Middleware\LocaleMiddleware::class,
        ]);
        $middleware->appendToGroup('api', [
            \App\Http\Middleware\ApiMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
