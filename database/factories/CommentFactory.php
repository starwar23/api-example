<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_user' => fake()->name(),
            'text' => fake()->text(100),
            'post_id' => Post::query()->inRandomOrder()->first()->id
        ];
    }
}
