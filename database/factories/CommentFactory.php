<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['comment' => "string", 'content_id' => "int", 'content_type' => "string", 'parent_id' => "int", 'status' => "string"])] public function definition(): array
    {
        return [
            'comment' => fake()->text,
            'content_id' => rand(1, 11),
            'content_type' => 'ne',
            'parent_id' => 0,
            'status' => 'A'
        ];
    }
}
