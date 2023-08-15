<?php

use App\Models\League;

use function Pest\Laravel\assertDatabaseCount;

it('can delete league', function () {

    $user = actingAs();

    $league = League::factory()->create();

    $response = $this->delete(route('leagues.destroy', [
        'league' => $league->id
    ]));

    $response->assertStatus(200);

    assertDatabaseCount('leagues', 0);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('League deleted successfully');

});
