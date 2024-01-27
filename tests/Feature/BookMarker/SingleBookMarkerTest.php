<?php

use App\Models\BookMarker;

use function Pest\Laravel\assertDatabaseCount;
it('has bookmarker/singlebookmarker page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    $bookMarker = BookMarker::factory()->create();

    $response = $this->get(route('bookMarkers.show', [
        'bookMarker' => $bookMarker
    ]));

    $response->assertStatus(200);

    assertDatabaseCount('book_markers', 1);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('BookMarker fetched successfully');
});