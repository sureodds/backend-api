<?php

use App\Models\EmailVerification;
use App\Models\User;

it('can verifyForgetonPasswordOtp', function () {

        $user = actingAs();

        EmailVerification::factory()->create([
            'email' => $user->email,
            'otp' => '1234'
        ]);

        $response = $this->post(route('verify-password-otp'), ['otp' => '1234']);

        $response->assertStatus(200);

        expect($response['success'])->toBeTruthy();
        expect($response['message'])->toBe('OTP verified successfully');
});

it('can verifyForgetonPasswordOtp expired', function () {

    $user = actingAs();

    EmailVerification::factory()->create([
        'email' => $user->email,
        'otp' => '1234',
        'expired_at' => now()->subMinutes(10)
    ]);

    $response = $this->post(route('verify-password-otp'), ['otp' => '1234']);

    $response->assertStatus(400);

    expect($response['success'])->toBeFalsy();
    expect($response['message'])->toBe('OTP expired');
});



it('can reset password', function(){

    $user = User::factory()->create();

    $response = $this->post(route('reset-password'), ['email' => $user->email, 'password' => 'P@ssw0rd!@234']);

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Password  reset successfully');

});