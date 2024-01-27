<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum PredictionScore: string
{
    use EnumToArray;

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
    const FIRSTHALF = 'firsthalf';
    const SECONDHALF = 'secondhalf';
    const FIRSTHALFHOME = 'firsthalfhome';
    const FIRSTHALFAWAY = 'firsthalfaway';
    const FIRSTHALFDRAW = 'firsthalfdraw';
    const SECONDHALFHOME = 'secondhalfhome';
    const SECONDHALFAWAY = 'secondhalfaway';
    const SECONDHALFDRAW = 'secondhalfdraw';
    const ONEXTWO = '1X2';
    const ODD = 'odd';
    const EVEN = 'even';
    const TOTALGOALS = 'totalgoals';

}