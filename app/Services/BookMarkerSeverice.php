<?php

namespace App\Services;

use App\Models\BookMarker;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class BookMarkerService {


    public function getBookMarker()
    {
        $client = new Client();
        $request = new Request('GET', config('app.third-party.api-url'), [
            'x-rapidapi-host' => config('app.third-party.x-rapidapi-host'),
            'x-rapidapi-key' => config('app.third-party.x-rapidapi-key')
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
}