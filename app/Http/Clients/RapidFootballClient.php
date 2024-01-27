<?php

namespace App\Http\Clients;

use App\DataTransferObjects\BookmarkersObject;
use Illuminate\Http\Client\PendingRequest;

class RapidFootballClient extends PendingRequest
{

     /**
     * @return BookmarkersObject
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function getBookMarker() : mixed
    {

        $response = $this->get('odds/bookmakers');

        if ($response->failed()) {
            $response->throw();
        }

        return new BookmarkersObject($response->json());

    }

    public function getLeagues() : bool
    {
        $url = '/leagues';
        $result = $this->hitThirdParty($url);


        return false;
    }


    public function getFeatureByLeague(int $league_api_id, string $season) : mixed
    {
        $url = '/fixtures?league=' . $league_api_id . '&season=' . $season;

    }

    public function getFeatureById(int $feature_id): mixed
    {
        $url = '/fixtures?id=' . $feature_id;

    }

}
