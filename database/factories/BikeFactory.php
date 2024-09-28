<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bike>
 */
class BikeFactory extends Factory
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
            'number_plate' => $this->faker->name,
            'cc' => $this->faker->numberBetween(100, 2000),
            'billbook' => $this->faker->imageUrl(640, 480, 'bikes', true),
            'status' => 'active',
            'model_year' => $this->faker->year,
            'variant_id' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
