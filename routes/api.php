<?php

use App\Http\Controllers\PricesController;
use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(ApiAuthMiddleware::class)
    ->group(function () {
        Route::get('prices/current-hour', [PricesController::class, 'currentHourPrice']);
        Route::get('prices/next-hour', [PricesController::class, 'nextHourPrice']);
    });

// todo: add bearer token check
