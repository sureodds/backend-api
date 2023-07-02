<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookMarker>
 */
class BookMarkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $image = $faker->image();
        return [
            //
            'name' => fake()->name(),
            'logo' => $image,
            'code' => fake()->safeColorName(),
            'link' => fake()->url()

        ];
    }
}
