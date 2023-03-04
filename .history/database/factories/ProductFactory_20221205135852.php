<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Image;

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
        // $condition = array('1','2','3','4','5');
        // $category = array('1', '2', '3', '4');

        $categories = Category::pluck('id')->all();
        $images = Image::pluck('id')->all();

        return [
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(3),
            'condition' => '5',
            'price' => rand(1000, 4000)/100,
            'user_id' => User::factory(),
            'category_id' => fake()->randomElement($categories)
        ];
    }
}
