<?php

namespace App\Services;

use App\Models\BookMarker;
use App\Models\Country;
use App\Models\League;
use App\Models\Season;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FootBallApiService {


    public function getBookMarker() : void
    {
        $client = new Client();
        $request = new Request('GET', config('third-party.api-url'). '/odds/bookmakers', [
            'X-RapidAPI-Host' => config('third-party.x-rapidapi-host'),
            'X-RapidAPI-Key' => config('third-party.x-rapidapi-key')
        ]);

        $response = $client->send($request);

        $result = json_decode($response->getBody(), true);

        if (!empty($result['response'])) {
            foreach ($result['response'] as $res) {
                $bookMarker = BookMarker::where('name', $res['name'])->first();

                if (!$bookMarker) {
                    // Create a new BookMarker record
                    $bookMarker = new BookMarker();
                    $bookMarker->name = $res['name'];
                    // Set other properties as needed
                    $bookMarker->save();
                }
            }
        }

    }

    public function getLeagues() : void
    {
        $client = new Client();
        $request = new Request('GET', config('third-party.api-url') . '/leagues', [
            'X-RapidAPI-Host' => config('third-party.x-rapidapi-host'),
            'X-RapidAPI-Key' => config('third-party.x-rapidapi-key')
        ]);

        $response = $client->send($request);

        $result = json_decode($response->getBody(), true);

        if (!empty($result['response'])) {
            foreach ($result['response'] as $res) {
                $country = Country::where('name', $res->country->name)->first();

                if (empty($country)) {
                    // Create a new BookMarker record
                    $country = Country::create([
                        'name' => $res->country->name,
                        "code" => $res->country->code,
                        'flag' => $res->country->flag
                    ]);

                }

                $league = League::where('name', $res->league->name)->first();

                if(empty($league)){

                    $league = League::create([
                        'name'=> $res->league->name,
                        'type' => $res->league->type,
                        'logo' => $res->league->logo,
                        'country_id' => $country->id,
                        'league_api_id' => $res->league->id
                    ]);

                    foreach ($res->seasons as $season) {
                        # code...
                        Season::create([
                            'year' => $season->year,
                            'start' => $season->start,
                            'end' => $season->end,
                            'current' => $season->current,
                            'league_id' => $league->id
                        ]);
                    }
                }


            }
        }
    }


    public function getFeatureByLeague(int $league_api_id, string $season) : array
    {
        $client = new Client();
        $request = new Request('GET', config('third-party.api-url') . '/fixtures?league='. $league_api_id.'&season='. $season, [
            'X-RapidAPI-Host' => config('third-party.x-rapidapi-host'),
            'X-RapidAPI-Key' => config('third-party.x-rapidapi-key')
        ]);

        $response = $client->send($request);

        $result = json_decode($response->getBody(), true);

        return $result;
    }
}
