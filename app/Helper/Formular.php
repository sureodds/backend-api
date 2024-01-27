<?php

namespace App\Helper;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class Formular {

    public static function calculateAverageOdds(int $user_id): mixed
    {
        /** @var User $user */
        $user = User::find($user_id);

        $correct_forcast = $user->forecast_matches()->where('result',1)->count();
        $wrong_forecast = $user->forecast_matches()->where('result', 0)->count();
        $sum = $correct_forcast + $wrong_forecast;

        return (($sum - $wrong_forecast ) / $sum) * 100;
    }


    public static function winningRate(int $user_id): mixed
    {
        /** @var User $user */
        $user = User::find($user_id);

        $correct_forcast = $user->forecast_matches()->where('result',1)->count();
        $wrong_forecast = $user->forecast_matches()->where('result', 0)->count();
        $sum = $correct_forcast + $wrong_forecast;

        return ($correct_forcast / $sum) * 100;
    }

    public static function combineUserPoints(bool $value, int $user_id) : void
    {
        switch ($value) {
            case true:
                # code...
                DB::table('user_points')->updateOrCreate(
                    ['user_id', $user_id],
                    [
                        'user_id', $user_id,
                        'points_earned' => DB::raw("points_earned + 3"),
                        'odds_averge' => static::calculateAverageOdds($user_id),
                    ]
                );
                break;
            case false:
                # code...
                DB::table('user_points')->updateOrCreate(
                    ['user_id', $user_id],
                    [
                        'user_id', $user_id,
                        'points_earned' => DB::raw("points_earned - 3"),
                        'odds_averge' => static::calculateAverageOdds($user_id),
                    ]
                );
                break;
        }

    }




}
