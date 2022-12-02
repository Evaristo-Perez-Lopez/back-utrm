<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->unique()->randomDigit(100) * 1.6,
            'material' => $this->faker->name(), // password
            'size' => $this->faker->randomElement(['M','S','L','XL']),
            'created_at' => now(),
        ];
    }
}
