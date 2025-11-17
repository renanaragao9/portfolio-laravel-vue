<?php

namespace Database\Factories;

use App\Models\DonorProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonorProfileFactory extends Factory
{
    protected $model = DonorProfile::class;

    public function definition(): array
    {
        return [
            'cpf' => fake()->unique()->numerify('###.###.###-##'),
            'phone' => fake()->optional()->phoneNumber(),
            'asaas_customer_id' => fake()->optional()->randomNumber(8),
        ];
    }
}
