<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\BetController;
use App\Http\Controllers\BookMarkerController;
use App\Http\Controllers\ForecastMatchController;
use App\Http\Controllers\LeadersDashboardController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\TriggerThiryPartyController;
use App\Http\Controllers\UserBookMarkerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidateForecastController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')->group(function () {
    Route::any('/', static fn () => response()->json([
        'message' => 'Welcome to SureOdds API',
        'apiVersion' => 'v1.0.0',
    ]));
    Route::prefix('auth')->group(
        function () {
            Route::post('/register', [AuthController::class, 'registerUsers'])->name('register');
            Route::post('/register-admin', [AuthController::class, 'register'])->name('register-admin');
            Route::post('/login', [AuthController::class, 'login'])->name('login');

            Route::post(
                '/confirm-email',
                [AuthController::class, 'confirmEmail']
            )->name('confirm-email');

            Route::post(
                '/verify-password-otp',
                [AuthController::class, 'verifyForgetonPasswordOtp']
            )->name('verify-password-otp');

            Route::post('/reset-password', [AuthController::class, 'resetPasword'])->name('reset-password');

            //Auth Routes
            Route::group(['middleware' => ['auth:api']], static function () {
                Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp');
                Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend-otp');

                Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

                Route::get('/user', static function (Request $request) {
                    return new UserResource($request->user());
                })->name('user-details');
            });
    });

    Route::group(['middleware' => ['auth:api']], static function () {

        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('user/{id}', [UserController::class, 'show'])->name('users.show');
        Route::patch('user/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::apiResource('badges', BadgeController::class);

        Route::apiResource('bookMarkers', BookMarkerController::class)->only(['index', 'store','destroy','show','update']);

        Route::resource('user.bookMarker', UserBookMarkerController::class)->shallow()->only(['index', 'store','destroy']);
        Route::apiResource('leagues', LeagueController::class);
        Route::apiResource('forecast-match', ForecastMatchController::class);
        Route::apiResource('bets', BetController::class);

        Route::prefix('feature')->group(function () {
            Route::get('features-by-league/{id}', [LeagueController::class, 'getFixturesByLeagueId'])->name('getFixturesByLeagueId');
        });

        Route::prefix('third-party')->group(function () {
            Route::get('populateBookMarker', [TriggerThiryPartyController::class, 'populateBookMarker'])->name('populateBookMarker');
            Route::get('populateLeague', [TriggerThiryPartyController::class, 'populateLeague'])->name('populateLeague');
            Route::get('getFeatureById/{id}', [TriggerThiryPartyController::class, 'getFeatureById'])->name('getFeatureById');
            Route::get('populateBet', [TriggerThiryPartyController::class, 'populateBet'])->name('populateBet');

        });

        Route::get('rate-forecast', [ValidateForecastController::class, 'rateForecast'])->name('rate-Forecast');
        Route::get('leaders-dashboard', [LeadersDashboardController::class, 'leadersDashboard'])->name('leaders-dashboard');

    });
 });