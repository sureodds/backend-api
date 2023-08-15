<?php

it('can be deleted', function () {

    $user = actingAs();
    $bet = \App\Models\Bet::factory()->create();

    $response = $this->delete(route('bets.destroy', $bet->id));

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Bet deleted successfully');
});
