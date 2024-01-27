<?php

use App\Enums\PredictionScore;
use App\Models\Bet;
use App\Models\BookMarker;
use function Pest\Laravel\assertDatabaseCount;


it('can create forecast', function () {

    $user = actingAs();

    $response = $this->postJson(route('forecast-match.store'), [
        'predictions' => [
            [
                'fixture_id' => 1,
                'book_marker_id' => BookMarker::factory()->create()->id,
                'bet_id' => Bet::factory()->create()->id,
                'forecast_odd' => 1.2,
                'prediction_value' => 'home',
                'prediction_score' => '1-4',
                'prediction_odd' => 1.2,
                'is_submitted' => true,
                'code' => "12345",
            ],
            [
                'fixture_id' => 2,
                'book_marker_id' => BookMarker::factory()->create()->id,
                'bet_id' => Bet::factory()->create()->id,
                'forecast_odd' => 1.2,
                'prediction_value' => 'home',
                'prediction_score' => '1-4',
                'prediction_odd' => 1.2,
                'is_submitted' => true,
                'code' => "12345",
            ],
        ],
    ]);

    $response->assertStatus(200);

    assertDatabaseCount('forecast_matches', 2);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Forecast saved successfully');
});