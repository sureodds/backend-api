<?php

use App\Models\User;

use Illuminate\Http\Testing\File;

use function Pest\Laravel\assertDatabaseCount;


it('has user/updateuser page', function () {

    $user = actingAs();

    $data = [
        "first_name" => fake()->firstName(),
        "last_name" => fake()->lastName(),
        'email' => fake()->email(),
        'password' => "P@ssw0rd1",
        'phone_number' => fake()->phoneNumber(),
        'profile_picture' =>  File::image('photo.jpg')
    ];

    $response = $this->patch(route('users.update', [
        'id' => $user->id
    ]), $data);

    $response->assertStatus(200);
    assertDatabaseCount('users', 1);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('User updated successfully');
});