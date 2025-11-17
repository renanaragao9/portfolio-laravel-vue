<?php

namespace Database\Factories;

use App\Models\OngProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class OngProfileFactory extends Factory
{
    protected $model = OngProfile::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->company(),
            'cnpj' => fake()->unique()->numerify('##.###.###/####-##'),
            'image_path' => fake()->optional()->imageUrl(640, 480, 'business'),
            'website_url' => fake()->optional()->url(),
            'asaas_customer_id' => fake()->optional()->randomNumber(8),
        ];
    }
}
