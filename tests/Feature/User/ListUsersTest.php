<?php

use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;

it('has list users page', function () {

    /** @var \App\Models\User */
    $user = actingAs();

    User::factory(5)->create();

    $response = $this->get(route('users.index'));

    $response->assertStatus(200);
    assertDatabaseCount('users', 6);

    expect($response['status'])->toBeTruthy();
    expect($response['message'])->toBe('Users return successfully');
});