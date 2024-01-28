<?php

namespace App\Helpers;

use App\Models\User;

class WinningRate
{
    public static function calculate(User $user) : mixed
    {

        $lost = $user->forecastedMatches()->where('result',0)->count();
        $total = $user->forecastedMatches()->count();

        return (($total - $lost) / $total) * 100;

        //return (($winning_rate == 100) && ($total == 1)) ? 1 :
    }
}
