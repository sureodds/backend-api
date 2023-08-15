<?php

use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;

it('can resend otp', function () {
    /** @var \App\Models\User */
    $user = actingAs();

    $response = $this->post(route('resend-otp'));

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('OTP resent successfully');
});


it('can confirm email', function(){

    $user = User::factory()->create();

    $response = $this->post(route('confirm-email'), ['email' => $user->email]);

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('A token has be sent to your mail');

});
