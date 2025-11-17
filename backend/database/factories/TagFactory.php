<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(rand(1, 3), true),
            'icon' => fake()->randomElement(['fa-heart', 'fa-star', 'fa-tag', 'fa-fire', 'fa-thumbs-up', 'fa-smile', 'fa-leaf', 'fa-sun', 'fa-moon', 'fa-cloud']),
        ];
    }
}
