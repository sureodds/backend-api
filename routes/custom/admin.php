<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\BookMarkerController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\TriggerThiryPartyController;
use App\Http\Controllers\UserBookMarkerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VetGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



    Route::group(['middleware' => ['auth:sanctum', 'isAdmin']], static function () {
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('user/{id}', [UserController::class, 'show'])->name('users.show');
        Route::patch('user/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::apiResource('badges', BadgeController::class);

        Route::apiResource('bookmarkers', BookMarkerController::class);
        Route::apiResource('leagues', LeagueController::class);
        Route::apiResource('predictions', PredictionController::class);


        Route::get('rate-forecast', [VetGameController::class, 'rateGame'])->name('rate-game');


        Route::prefix('third-party')->group(function () {
            Route::get('populateBookMarker', [TriggerThiryPartyController::class, 'populateBookMarker'])->name('populateBookMarker');
            Route::get('populateLeague', [TriggerThiryPartyController::class, 'populateLeague'])->name('populateLeague');
            Route::get('getFeatureById/{id}', [TriggerThiryPartyController::class, 'getFeatureById'])->name('getFeatureById');
            Route::get('populateBet', [TriggerThiryPartyController::class, 'populateBet'])->name('populateBet');

        });

    });

