<?php

use App\Models\BookMarker;
use function Pest\Laravel\assertDatabaseCount;

it('has bookmarker/updatebookmarker page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    $badges = BookMarker::factory()->create();

    $response = $this->delete(route('bookMarker.destroy', [
        'bookMarker' => $badges
    ]));

    $response->assertStatus(200);

    assertDatabaseCount('book_markers', 0);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('BookMarker deleted successfully');
});