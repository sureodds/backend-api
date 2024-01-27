<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Helper\Formular;
use App\Models\ForecastMatch;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadersDashboardController extends Controller
{
    //
    public function leadersDashboard(Request $request) : JsonResponse
    {
        $users = User::with(['forecast_matches', 'pointsEarned'])
        ->where(function ($query) {

            $query->whereHas('forecast_matches', function ($forecastQuery) {
                $forecastQuery->whereNotNull('forecast_matches.result');
            });
        })
        ->get()
        ->sortBy('pointsEarned')
        ->transform(function ($user, $key) {
            return [
                'position' => $key + 1,
                'id' => $user->id,
                'full_name' => $user->full_name,
                'profile_picture' => $user->profile_picture,
                'winning_rate' => Formular::winningRate($user->id),
                'average_odds' => $user->pointsEarned->odds_averge,
            ];
        });


        return $this->success(
            message: 'Leaders Dashboard',
            data: $users,
            status: HttpStatusCode::SUCCESSFUL->value
        );

    }
}
