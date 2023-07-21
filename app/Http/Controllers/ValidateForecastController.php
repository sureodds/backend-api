<?php

namespace App\Http\Controllers;

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

        });
    }


    public function validateForecast(mixed $forecast) : void
    {
        
    }

}
