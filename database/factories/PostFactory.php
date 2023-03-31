<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'text' => fake()->text(100),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
