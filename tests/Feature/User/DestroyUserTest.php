<?php

use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;

it('has user/destroyuser page', function () {

    /** @var \App\Models\User */
    $user = actingAs();

    $response = $this->delete(route('users.destroy',[
        'id' => $user->id
    ]));

    $response->assertStatus(200);
    assertDatabaseCount('users', 0);
    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('User deleted successfully');
});