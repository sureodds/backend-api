<?php

namespace App\Helpers;

use App\Models\User;

class WinningRate
{
    public static function calculate(User $user) : mixed
    {


        $lost = $user->predictions?->flatMap->games?->where('result', 0)->count();
        $total = $user->predictions?->flatMap->games?->count();


        return (($total - $lost) / $total) * 100;

        //return (($winning_rate == 100) && ($total == 1)) ? 1 :
    }
}
