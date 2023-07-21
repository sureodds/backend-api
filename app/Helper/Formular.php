<?php

namespace App\Helper;

use App\Models\User;

class Formular {

    public function calculateAverageOdds(int $user_id): mixed
    {
        /** @var User $user */
        $user = User::find($user_id);

        $correct_forcast = $user->forecast_matches()->where('result',1)->count();
        $wrong_forecast = $user->forecast_matches()->where('result', 0)->count();
        $sum = $correct_forcast + $wrong_forecast;

        return (($sum - $wrong_forecast ) / $sum) * 100;
    }
}
