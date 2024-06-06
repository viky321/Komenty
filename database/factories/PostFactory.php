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
        $title = $this->faker->words(4, true);
        return [
            "user_id" => 1,
            "title" => ucfirst($title),
            "slug" => str_slug($title),
            "text" => $this->faker->paragraphs(5, true),

        ];
    }
}
