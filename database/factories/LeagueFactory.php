<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use PHPUnit\Framework\Constraint\Count;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\League>
 */
class LeagueFactory extends Factory
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
            'name' => fake()->name(),
            'country_id' => Country::factory(),
            'type' => fake()->randomElement(['League', 'Cup']),
            'logo' => fake()->imageUrl(),
            'league_api_id' => fake()->numberBetween(1, 100),
        ];
    }
}
