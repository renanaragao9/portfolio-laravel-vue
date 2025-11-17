<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('now', '+6 months');
        $endDate = fake()->dateTimeBetween($startDate, '+1 year');

        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'image_path' => fake()->imageUrl(640, 480, 'campaign'),
            'goal_amount' => fake()->randomFloat(2, 1000, 100000),
            'status' => fake()->randomElement(['ativo', 'inativo', 'concluido', 'pausado']),
        ];
    }
}
