<?php

use App\Http\Controllers\PredictionController;
use App\Http\Controllers\UserBookMarkerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




    Route::group(['middleware' => ['auth:sanctum', 'isUser']], static function () {
        Route::patch('update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::apiResource('predictions', PredictionController::class)->except(['index']);
        Route::apiresource('bookmarker', UserBookMarkerController::class)->only(['index', 'store','destroy']);
    });

