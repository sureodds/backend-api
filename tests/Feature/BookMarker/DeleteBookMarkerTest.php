<?php

use App\Models\BookMarker;
use App\Models\League;
use App\Models\Season;

use function Pest\Laravel\assertDatabaseCount;

it('can delete bookmarker', function () {

    /** @var \App\Models\User */
    $user = actingAs();

    $bookMarker = BookMarker::factory()->create();

    $response = $this->delete(route('bookMarkers.destroy', [
        'bookMarker' => $bookMarker->id
    ]));

    $response->assertStatus(200);

    assertDatabaseCount('book_markers', 0);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('BookMarker deleted successfully');

});


it('can get feature by league id', function(){

    $user = actingAs();

    $league = League::factory()->create();
    Season::factory()->create([
        'league_id' => $league->id,
        'current' => true,
        'year' => '2023'
    ]);

    $response = $this->getJson(route('getFixturesByLeagueId', [
        'id' => $league->id
    ]));

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Fixtures retrieved successfully');


});