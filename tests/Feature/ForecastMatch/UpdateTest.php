<?php

use App\Models\Bet;
use App\Models\BookMarker;
use App\Models\ForecastMatch;

it('can update forecast', function () {

    $user = actingAs();

    $forecast = ForecastMatch::factory()->create([
        'user_id' => $user->id,

    ]);

    $data =  [
                'fixture_id' => 1,
                'book_marker_id' => BookMarker::factory()->create()->id,
               
                'forecast_odd' => 1.2,
                'prediction_value' => 'home',
                'prediction_score' => '1-4',
                'prediction_odd' => 1.2,
                'is_submitted' => true,
                'code' => "12345",
    ];

    $response = $this->patch(route('forecast-match.update', $forecast), $data);

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Forecast updated successfully');
});