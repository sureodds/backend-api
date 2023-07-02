<?php

use App\Models\Badge;
use Illuminate\Http\Testing\File;
use function Pest\Laravel\assertDatabaseCount;

it('has badge/updatebadge page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    $badge = Badge::factory()->create();

    $data = [
        'title' => fake()->title(),
        'level' => 'low',
        'image' => File::image('photo.jpg')
    ];


    $response = $this->patch(route('badges.update', [
        'badge' => $badge->id
    ]), $data);

    $response->assertStatus(200);

    assertDatabaseCount('badges', 1);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Badge updated successfully');
});