<?php

use App\Models\Badge;
use function Pest\Laravel\assertDatabaseCount;

it('has badge/listbadges page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    Badge::factory(2)->create();

    $response = $this->get(route('badges.index'));

    $response->assertStatus(200);

    assertDatabaseCount('badges', 2);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Badges return successfully');
});