<?php

namespace App\Services;

use App\Models\BookMarker;
use App\Models\Country;
use App\Models\League;
use App\Models\Season;
use GuzzleHttp\Client;


class FootBallApiService {


    public function getBookMarker() : bool
    {
        $url = '/odds/bookmakers';
        $result = $this->hitThirdParty($url);

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
            return true;
        }
        return false;

    }

    public function getLeagues() : bool
    {
        $url = '/leagues';
        $result = $this->hitThirdParty($url);


        if (!empty($result['response'])) {
            foreach ($result['response'] as $res) {

                $country = Country::where('name', $res['country']['name'])->first();

                if (empty($country)) {
                    // Create a new BookMarker record
                    $country = Country::create([
                        'name' => $res['country']['name'],
                        "code" => $res['country']['code'],
                        'flag' => $res['country']['flag']
                    ]);

                }

                $league = League::where('name', $res['league']['name'])->first();

                if(empty($league)){

                    $league = League::create([
                        'name'=> $res['league']['name'],
                        'type' => $res['league']['type'],
                        'logo' => $res['league']['logo'],
                        'country_id' => $country->id,
                        'league_api_id' => $res['league']['id']
                    ]);

                    foreach ($res['seasons'] as $season) {
                        # code...
                        Season::create([
                            'year' => $season['year'],
                            'start' => $season['start'],
                            'end' => $season['end'],
                            'current' => $season['current'],
                            'league_id' => $league->id
                        ]);
                    }
                }


            }
            return true;
        }

        return false;
    }


    public function getFeatureByLeague(int $league_api_id, string $season) : array
    {
        $url = '/fixtures?league=' . $league_api_id . '&season=' . $season;
       $result = $this->hitThirdParty($url);
       return $result['response'];
    }

    public function getFeatureById(int $feature_id): array
    {
        $url = '/fixtures?id=' . $feature_id;
        $result = $this->hitThirdParty($url);
        return $result['response'];
    }



    private function hitThirdParty(string $url) : mixed
    {
        $client = new Client();

        $response = $client->request('GET', config('third-party.api-url') . $url, [
            'headers' => [
                'X-RapidAPI-Host' => config('third-party.x-rapidapi-host'),
                'X-RapidAPI-Key' => config('third-party.x-rapidapi-key'),
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        return $result;
    }
}