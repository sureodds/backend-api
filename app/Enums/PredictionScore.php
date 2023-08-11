<?php

namespace App\Enums;

use Spatie\Enum\Enum;

class PredictionScore extends Enum
{
    const WIN = 'win';
    const LOSS = 'loss';
    const DRAW = 'draw';
    const AWAY = 'away';
    const HOME = 'home';
    const BOTH = 'both';
    const UNDER = 'under';
    const OVER = 'over';
    const NOGOAL = 'nogoal';
    const GOAL = 'goal';
    const HANDICAP = 'handicap';
    const HANDICAPHOME = 'handicaphome';
    const HANDICAPAWAY = 'handicapaway';
    const HANDICAPDRAW = 'handicapdraw';
    const ONEX = '1x';
    const X2 = 'x2';
    const ONEX2 = '1x2';
    const ONEX2HT = '1x2ht';
    const ONEXHT = '1xht';
    const X2HT = 'x2ht';
    const ONEX2FT = '1x2ft';
    const ONEXFT = '1xft';
    const X2FT = 'x2ft';

}