<?php

use App\Models\League;

it('can fetch list of leagues', function () {

    $user = actingAs();

    League::factory()->count(5)->create();

    $response = $this->getJson(route('leagues.index'));

    $response->assertStatus(200);

    expect($response->json('data'))->toHaveCount(3);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('League Fetched successfully');
});


it('can get one', function(){
    $user = actingAs();

    $league = League::factory()->create();

    $response = $this->getJson(route('leagues.show', [
        'league' => $league->id
    ]));

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('League retrieved successfully');
  
});