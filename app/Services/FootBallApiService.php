<?php

namespace App\Services;

use App\Http\Clients\RapidApiClient;
use App\Models\Bet;
use App\Models\BookMarker;
use App\Models\Country;
use App\Models\League;
use App\Models\Season;
use GuzzleHttp\Client;


class FootBallApiService {

    public RapidApiClient $rapidApi;

    public function __construct()
    {
        $this->rapidApi = new RapidApiClient();
    }
    public function getBookMarker() : bool
    {
        $url = '/odds/bookmakers';
        $result = $this->rapidApi->hitThirdParty($url);

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
        $result = $this->rapidApi->hitThirdParty($url);


        if (!empty($result['response'])) {
            return false;
        }

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


    public function getFeatureByLeague(int $league_api_id, string $season) : array
    {
        $url = '/fixtures?league=' . $league_api_id . '&season=' . $season;
       $result = $this->rapidApi->hitThirdParty($url);
       return $result['response'];
    }

    public function getFeatureById(int $feature_id): array
    {
        $url = '/fixtures?id=' . $feature_id;
        $result = $this->rapidApi->hitThirdParty($url);
        return $result['response'];
    }

    public function getFeatureByIdWithEvent(int $feature_id): array
    {
        $url = 'fixtures/events?fixture=' . $feature_id;
        $result = $this->rapidApi->hitThirdParty($url);
        return $result['response'];
    }

    public function validateForecast(int $fixture_id, string $date) : array
    {
        $url = '/odds?date='. $date .'&fixture='. $fixture_id;
        $result = $this->rapidApi->hitThirdParty($url);
        return $result['response'];

    }

    public function populateBet() : bool
    {
        $url = '/odds/bets';
        $result = $this->rapidApi->hitThirdParty($url);

        if (empty($result['response'])) {

            return false;
        }

        foreach ($result['response'] as $res) {

            $bet = Bet::where('name', $res['name'])->first();

            if (empty($bet) && !empty($res['name'])) {
                // Create a new Bet record
                $bet = Bet::create([
                    'name' => $res['name'],
                ]);
            }

        }
        return true;

    }

    public function fetchFixtureEvent(int $fixture_id) : array
    {
        $url = 'fixtures/events?fixture=' . $fixture_id;
        $result = $this->rapidApi->hitThirdParty($url);
        return $result['response'];
    }

    public function fetchFixtureStatistics(int $fixture_id): array
    {
        $url = '/fixtures/statistics?fixture=' . $fixture_id;
        $result = $this->rapidApi->hitThirdParty($url);
        return $result['response'];
    }

}