<?php

use App\Models\Badge;
use App\Models\User;
use Illuminate\Support\Arr;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('has auth/login page', function () {

    $data = [
        "first_name" => fake()->firstName(),
        "last_name" => fake()->lastName(),
        'email' => fake()->email(),
        'password' => "P@ssw0rd1",
        'phone_number' => fake()->phoneNumber()
    ];

    Badge::factory()->create();
    $user = User::factory()->create($data);

    $reponse =
    $this->post(route('login'), [
        'email' => $user->email,
        'password' => $data['password']
    ]);
    $reponse->assertStatus(200);

    assertDatabaseCount('users', 1);

    assertDatabaseHas('users', Arr::except($data, ['password']));
});

it('has password mismatched', function () {

    $data = [
        "first_name" => fake()->firstName(),
        "last_name" => fake()->lastName(),
        'email' => fake()->email(),
        'password' => "P@ssw0rd1",
        'phone_number' => fake()->phoneNumber()
    ];

    Badge::factory()->create();
    $user = User::factory()->create();

    $reponse =
        $this->post(route('login'), [
            'email' => $user->email,
            'password' => $data['password']
        ]);

    $reponse->assertStatus(302);

    assertDatabaseCount('users', 1);

    $this->assertGuest();
});