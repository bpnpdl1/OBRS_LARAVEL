<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
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
            'variant_image' => $this->faker->imageUrl(640, 480, 'bikes', true),
            'variant_name' => $this->faker->name,
            'variant_rental_price' => $this->faker->numberBetween(100, 2000),
            'brand_id' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now()


         
        ];
    }
}
