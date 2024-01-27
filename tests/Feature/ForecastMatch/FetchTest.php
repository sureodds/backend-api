<?php

use App\Models\ForecastMatch;

it('can fetch all forecat-matches', function () {

    $user = actingAs();

    ForecastMatch::factory(10)->create(
        [
            'user_id' => $user->id,
        ]
    );

    $response = $this->getJson(route('forecast-match.index'));

    $response->assertStatus(200);

    expect($response['message'])->toBe('Forecasts retrieved successfully');

});

it('can fetch a single forecast', function(){
    $user = actingAs();

    $forecast = ForecastMatch::factory(10)->create(
        [
            'user_id' => $user->id,
        ]
    );

    $response = $this->getJson(route('forecast-match.show', $forecast->first()->id));

    $response->assertStatus(200);

    expect($response['message'])->toBe('Forecast retrived successfully');

});


it('can rate forecast', function(){

    $user = actingAs();

    ForecastMatch::factory(10)->create(
        [
            'user_id' => $user->id,
        ]
    );

    $response = $this->get(route('rate-Forecast'));

    $response->assertStatus(200);

    expect($response['message'])->toBe('Forecast rated successfully');
    expect($response['success'])->toBeTruthy();
});
