<?php

use Illuminate\Http\Testing\File;
use function Pest\Laravel\assertDatabaseCount;

it('has bookmarker/createbookmarker page', function () {
   /** @var \App\Models\User */
    $user = actingAs();

    $data = [
        'name' => fake()->name(),
        'logo' => File::image('photo.png'),
        'code' => fake()->safeColorName(),
        'link' => fake()->url()
    ];

    $response = $this->postJson(route('bookMarkers.store'), $data);

    $response->assertStatus(201);

    assertDatabaseCount('book_markers', 1);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('BookMarker created successfully');
});
