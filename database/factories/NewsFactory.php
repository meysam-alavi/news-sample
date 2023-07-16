<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['title' => "string", 'subtitle' => "string", 'content' => "string"])] public function definition(): array
    {
        return [
            'title' => fake()->title,
            'subtitle' => fake()->text,
            'content' => fake()->text
        ];
    }
}
