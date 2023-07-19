<?php

use Illuminate\Http\Testing\File;

use function Pest\Laravel\assertDatabaseCount;

it('has badge/createbadge page', function () {

    /** @var \App\Models\User */
    $user = actingAs();

    $data = [
        'title' => fake()->title(),
        'level' => 'low',
        'image' => File::image('photo.jpg')
    ];

    $response = $this->postJson(route('badges.store'), $data);

    $response->assertStatus(201);

    assertDatabaseCount('badges', 1);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Badge created successfully');
});