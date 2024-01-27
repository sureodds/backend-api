<?php

namespace App\Providers;

use App\Http\Clients\FootballApiClient;
use App\Http\Clients\RapidFootballClient;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;


class FootballServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() : mixed
    {

      return  $this->app->singleton(RapidFootballClient::class, function () {


            $client = new RapidFootballClient();
            // Set base URL and headers
            $client->baseUrl(config('services.rapidapi.url'))
                ->withHeaders([
                    'X-RapidAPI-Host' => config('services.rapidapi.host'),
                    'X-RapidAPI-Key' => config('services.rapidapi.key'),
                ])
                ->withOptions([]);

            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
