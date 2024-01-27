<?php

namespace App\Actions;

use App\Models\Country;
use App\Models\League;
use App\Models\Season;
use Illuminate\Support\Arr;

class populateLeagueAction {

    public static function execute(array $data) : void
    {

        Arr::map($data, function($item,$index){
            $country = Country::where('name', $item['country']['name'])->first();

            if (empty($country)) {
                // Create a new BookMarker record
                $country = Country::create([
                    'name' => $item['country']['name'],
                    "code" => $item['country']['code'],
                    'flag' => $item['country']['flag']
                ]);

            }

            $league = League::where('name', $item['league']['name'])->first();

            if(empty($league)){

                $league = League::create([
                    'name'=> $item['league']['name'],
                    'type' => $item['league']['type'],
                    'logo' => $item['league']['logo'],
                    'country_id' => $country->id,
                    'league_api_id' => $item['league']['id']
                ]);

                foreach ($item['seasons'] as $season) {
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


        });

    }
}
