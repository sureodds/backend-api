<?php

it('can fetch all', function () {

        $user = actingAs();
        $bets = \App\Models\Bet::factory()->count(3)->create();

        $response = $this->get(route('bets.index'));

        $response->assertStatus(200);

        expect($response['success'])->toBeTruthy();
        expect($response['message'])->toBe('Bets return successfully');
        expect($response['data'])->toHaveCount(3);


});


it('can fetch one',function(){

        $user = actingAs();
        $bet = \App\Models\Bet::factory()->create();

        $response = $this->get(route('bets.show', $bet->id));

        $response->assertStatus(200);

        expect($response['success'])->toBeTruthy();
        expect($response['message'])->toBe('Bet display successfully');
        expect($response['data']['name'])->toBe($bet->name);

});