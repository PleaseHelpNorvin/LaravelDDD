<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Console\Commands\MakeDomainStructure;
use App\Console\Commands\DeleteDomainStructure;
use App\Providers\ResponseMacroServiceProvider;
use App\Providers\RepositoryServiceProvider;





return Application::configure(basePath: dirname(__DIR__))
    ->withCommands([
        MakeDomainStructure::class,
        DeleteDomainStructure::class,
    ])
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withProviders([
        ResponseMacroServiceProvider::class, 
        RepositoryServiceProvider::class,
    ])->create();
