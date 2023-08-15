<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmailVerification>
 */
class EmailVerificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'email' => $this->faker->email,
            'otp' => $this->faker->randomNumber(4),
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 day'),
        ];
    }
}