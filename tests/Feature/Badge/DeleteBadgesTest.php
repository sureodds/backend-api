<?php

use App\Models\Badge;

use function Pest\Laravel\assertDatabaseCount;

it('has badge/deletebadges page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    $badges = Badge::factory()->create();

    $response = $this->delete(route('badges.destroy',[
        'badge' => $badges
    ]));

    $response->assertStatus(200);

    assertDatabaseCount('badges', 0);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Badge deleted successfully');
});