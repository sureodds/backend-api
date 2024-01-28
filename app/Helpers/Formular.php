<?php

namespace App\Helpers;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class Formular {

   // public static function calculateAverageOdds(int $user_id): mixed
   // {
        /** @var User $user */
       /*  $user = User::find($user_id);

        $correct_forcast = $user->forecast_matches()->where('result',1)->count();
        $wrong_forecast = $user->forecast_matches()->where('result', 0)->count();
        $sum = $correct_forcast + $wrong_forecast;

        return (($sum - $wrong_forecast ) / $sum) * 100;
    } */

    // not in use for now.
   /*  public static function combineUserPoints(bool $value, User $user) : void
    {
        switch ($value) {
            case true:
                # code...
                DB::table('user_points')->updateOrCreate(
                    ['user_id', $user->id],
                    [
                        'user_id', $user->id,
                        'points_earned' => DB::raw("points_earned + 3"),
                        'odds_averge' => static::calculateAverageOdds($user->id),
                    ]
                );
                break;
            case false:
                # code...
                DB::table('user_points')->updateOrCreate(
                    ['user_id', $user->id],
                    [
                        'user_id', $user->id,
                        'points_earned' => DB::raw("points_earned - 3"),
                        'odds_averge' => static::calculateAverageOdds($user->id),
                    ]
                );
                break;
        }

    } */




}
