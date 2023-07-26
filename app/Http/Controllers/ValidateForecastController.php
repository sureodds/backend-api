<?php

namespace App\Http\Controllers;

use App\Helper\CompareForcast;
use App\Helper\Formular;
use App\Models\ForecastMatch;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;

class ValidateForecastController extends Controller
{
    //
    public function __invoke()
    {
        $forecasts = ForecastMatch::whereNull('result')->get();

        $forecasts->each(function($forecast){
            $this->validateForecast($forecast);
        });
    }


    private function validateForecast(mixed $forecast) : void
    {

        $compare_forecast = new CompareForcast();
        $result =  $compare_forecast($forecast);
        $forecast->update(['result' => $result]);
        Formular::combineUserPoints($result,$forecast->user_id);

    }

}