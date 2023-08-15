<?php

it('can create new bet', function () {

    $user = actingAs();
    $response = $this->post(route('bets.store'), ['name' => 'bet 1']);

    $response->assertStatus(201);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Bet created successfully');
    expect($response['data']['name'])->toBe('bet 1');

});