<?php

use App\Models\Badge;
use Illuminate\Support\Arr;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

it('has auth/register page', function () {

    $data = [
        "first_name" => fake()->firstName(),
        "last_name" => fake()->lastName(),
        'email' => fake()->email(),
        'password' => "P@ssw0rd1",
        'phone_number' => fake()->phoneNumber()
    ];

    Badge::factory()->create();

    $reponse = $this->postJson(route('register'), $data);
    $reponse->assertStatus(200);

    assertDatabaseCount('users', 1);
    assertDatabaseHas('users', Arr::except($data, ['password']));


});


it('has auth/admin/register page', function () {

    $data = [
        "first_name" => fake()->firstName(),
        "last_name" => fake()->lastName(),
        'email' => fake()->email(),
        'password' => "P@ssw0rd1",
        'phone_number' => fake()->phoneNumber()
    ];

    Badge::factory()->create();

    $reponse = $this->postJson(route('register-admin'), $data);
    $reponse->assertStatus(200);

    assertDatabaseCount('users', 1);
    assertDatabaseHas('users', Arr::except($data, ['password']));
});