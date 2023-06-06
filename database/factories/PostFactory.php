<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(rand(10, 20)),
            'content' => fake()->realText(rand(50, 100)),
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 5),
            'published_at' => fake()->date(),
            'created_at' => fake()->date(),
            'updated_at' => fake()->date()
        ];
    }
}
