<?php


namespace App\Http\Clients;
use GuzzleHttp\Client;

class RapidApiClient {

    public function hitThirdParty(string $url): mixed
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