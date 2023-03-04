<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $condition = array('1','2','3','4','5')
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->sentence(4),
            'condition' => 

        ];
    }
}
