<?php

use App\Models\Badge;
use function Pest\Laravel\assertDatabaseCount;

it('has badge/listbadge page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

  $badge = Badge::factory()->create();

    $response = $this->get(route('badges.show',[
        'badge'=> $badge
    ]));

    $response->assertStatus(200);

    assertDatabaseCount('badges', 1);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Badge fetched successfully');
});