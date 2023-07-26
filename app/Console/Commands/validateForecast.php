<?php

namespace App\Console\Commands;

use App\Http\Controllers\ValidateForecastController;
use App\Models\ForecastMatch;
use Illuminate\Console\Command;

class validateForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:validate-forecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    //

        $forecasts = ForecastMatch::whereNull('result')->get();

        $forecasts->each(function ($forecast) {
            (new ValidateForecastController)->validateForecast($forecast);
        });

        return Command::SUCCESS;
    }
}