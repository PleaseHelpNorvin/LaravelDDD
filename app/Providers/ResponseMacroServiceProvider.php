<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /**
         * Custom Responses .
         */
        Response::macro('success', function (array $data = [], string $message = 'Success', int $status = 200) {
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data
            ], $status);
        });

        Response::macro('error', function (array $errors = [], string $message = 'Error', int $status = 400) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
                'errors' => $errors
            ], $status);
        });

        Response::macro('notFound', function (string $message = 'Resource not found', int $status = 404) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
            ], $status);
        });

        
    }
}
