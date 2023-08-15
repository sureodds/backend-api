<?php

namespace App\Http\Controllers;

use App\Helper\CompareForcast;
use App\Helper\Formular;
use App\Models\ForecastMatch;


class ValidateForecastController extends Controller
{
    //
    public function rateForecast() : \Illuminate\Http\JsonResponse
    {
        $forecasts = ForecastMatch::whereNull('result')->get();

        $forecasts->each(function($forecast){
            static::validateForecast($forecast);
        });

        return $this->success(
            message: "Forecast rated successfully",
            status: 200
        );
    }


    public static function validateForecast(mixed $forecast) : void
    {

        $compare_forecast = new CompareForcast();
        $result =  $compare_forecast($forecast);
        $forecast->update(['result' => $result]);

        if(!empty($result)){
            Formular::combineUserPoints($result, $forecast->user_id);
        }

    }

}