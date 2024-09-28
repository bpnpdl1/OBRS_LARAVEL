<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
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
           'brand_name' => $this->faker->name,
            'brand_logo' => $this->faker->imageUrl(640, 480, 'bikes', true),
            'created_at' => now(),

        ];
    }
}
