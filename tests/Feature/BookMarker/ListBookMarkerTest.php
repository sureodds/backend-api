<?php

use App\Models\BookMarker;
use function Pest\Laravel\assertDatabaseCount;

it('has bookmarker/listbookmarker page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    BookMarker::factory(2)->create();

    $response = $this->get(route('bookMarkers.index'));

    $response->assertStatus(200);

    assertDatabaseCount('book_markers', 2);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('BookMarkers return successfully');
});