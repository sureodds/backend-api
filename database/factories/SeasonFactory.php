<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season>
 */
class SeasonFactory extends Factory
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
            'year' => $this->faker->year,
            'start' => $this->faker->date(),
            'end' => $this->faker->date(),
            'current' => $this->faker->boolean,
            'league_id' => \App\Models\League::factory(),
        ];
    }
}
