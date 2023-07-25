<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => mt_rand(5000000, 20000000),
            'description' => fake()->paragraph(5),
            'image' => fake()->imageUrl(450, 300, 'laptop', true),
            'category_id' => mt_rand(1, 5),
            'created_at' => Carbon::now(),
        ];
    }
}
