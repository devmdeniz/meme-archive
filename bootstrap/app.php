<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
<<<<<<< HEAD
use App\Http\Middleware\CheckJWT;
=======

>>>>>>> b98b541232b7309f7089d928c0f8710976c5aafa
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
<<<<<<< HEAD
        $middleware->appendToGroup('checkSession', [
            CheckJWT::class,
        ]);
=======
        //
>>>>>>> b98b541232b7309f7089d928c0f8710976c5aafa
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
