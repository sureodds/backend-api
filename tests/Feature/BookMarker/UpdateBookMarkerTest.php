<?php

use App\Models\BookMarker;
use function Pest\Laravel\assertDatabaseCount;
use Illuminate\Http\Testing\File;

it('has bookmarker/updatebookmarker page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    $data = [
        'name' => fake()->name(),
        'logo' => File::image('photo.png'),
        'code' => fake()->safeColorName(),
        'link' => fake()->url()
    ];
    $badges = BookMarker::factory()->create();

    $response = $this->patch(route('bookMarkers.update', [
        'bookMarker' => $badges
    ]), $data);

    $response->assertStatus(200);

    assertDatabaseCount('book_markers', 1);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Bookmarker updated successfully');
});