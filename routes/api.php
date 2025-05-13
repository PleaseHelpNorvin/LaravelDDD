<?php

    use Illuminate\Support\Facades\Route;
    use App\Interfaces\Web\Controllers\User\UserController;

    Route::prefix('v1')->group(function () {
        Route::prefix('users')->group(function () {
            Route::post('/store', [UserController::class, 'store']);

        }); 
    });