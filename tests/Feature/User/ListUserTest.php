<?php

use App\Models\User;
use function Pest\Laravel\assertDatabaseCount;

it('has user/listuser page', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    User::factory()->create();

    $response = $this->get(route('users.show',[
        'id' => $user->id
    ]));

    $response->assertStatus(200);
    assertDatabaseCount('users', 2);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('User return successfully');
});