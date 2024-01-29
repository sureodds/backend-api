<?php

namespace App\Services;

use App\Actions\populateLeagueAction;
use App\Models\BookMarker;
use App\Models\Country;
use App\Models\League;
use App\Models\Season;
use GuzzleHttp\Client;


class RapidFootballService {


    public function getBookMarker() : bool
    {
        $url = 'odds/bookmakers';
        $result = $this->hitThirdParty($url);

        if (!empty($result['response'])) {
            foreach ($result['response'] as $res) {
                 if(!empty($res['name'])){
                    BookMarker::firstOrCreate(['name' => $res['name']]);
                 }
            }
            return true;
        }
        return false;

    }

    public function getLeagues() : bool
    {
        $url = 'leagues';
        $result = $this->hitThirdParty($url);


        if (!empty($result['response'])) {
            populateLeagueAction::execute($result['response']);
            return true;
        }

        return false;
    }


    public function getFeatureByLeague(int $league_api_id, string $season) : array
    {
        $url = 'fixtures?league=' . $league_api_id . '&season=' . $season;
       $result = $this->hitThirdParty($url);
       return $result['response'];
    }

    public function getFeatureById(int $feature_id): array
    {
        $url = 'fixtures?id=' . $feature_id;
        $result = $this->hitThirdParty($url);
        return $result['response'];
    }

    



    private function hitThirdParty(string $url) : mixed
    {
        $client = new Client();

        $response = $client->request('GET', config('services.rapidapi.url') . $url, [
            'headers' => [
                'X-RapidAPI-Host' => config('services.rapidapi.host'),
                'X-RapidAPI-Key' => config('services.rapidapi.key'),
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        return $result;
    }
}
