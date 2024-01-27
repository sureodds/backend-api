<?php

namespace Database\Factories;

use App\Models\Bet;
use App\Models\BookMarker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ForecastMatch>
 */
class ForecastMatchFactory extends Factory
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
            'fixture_id' => $this->faker->numberBetween(1, 100),
            'book_marker_id' => BookMarker::factory(),
            'bet_id' => Bet::factory(),
            'forecast_odd' => $this->faker->randomFloat(2, 1, 10),
            'prediction_value' => $this->faker->randomElement(['home', 'away', 'draw']),
            'prediction_score' => $this->faker->randomElement(['1-4',3,'under']),

            'prediction_odd' => $this->faker->randomFloat(2, 1, 10),
            'is_submitted' => true,
            'code' => $this->faker->randomNumber(5),

        ];

   }
}
