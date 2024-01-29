<?php

namespace App\Console\Commands;

use App\Http\Controllers\ValidateForecastController;
use App\Http\Controllers\VetGameController;
use App\Models\ForecastMatch;
use App\Models\Game;
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

        $games = Game::whereNull('result')->get();

        $games->each(function ($game) {
            VetGameController::validategame($game);
        });

        return Command::SUCCESS;
    }
}
