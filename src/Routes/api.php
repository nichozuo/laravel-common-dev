<?php

use Illuminate\Support\Facades\Route;
use Nichozuo\LaravelCommonDev\Controllers\DocsController;
use Nichozuo\LaravelCommonDev\Helpers\RouteHelper;

Route::middleware('api')->prefix('/api/docs')->name('docs.')->group(function ($router) {
    if (config('app.debug')) {
        RouteHelper::New($router, DocsController::class);
    }
});