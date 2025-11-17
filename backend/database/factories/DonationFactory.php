<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition(): array
    {
        $transactionDate = fake()->dateTimeBetween('-1 year', 'now');
        $status = fake()->randomElement(['pago', 'pendente', 'cancelado', 'falho']);
        $paymentDate = ($status === 'pago') ? fake()->dateTimeBetween($transactionDate, 'now') : null;

        return [
            'amount' => fake()->randomFloat(2, 10, 10000),
            'status' => $status,
            'asaas_payment_id' => ($status !== 'pendente') ? fake()->randomNumber(8) : null,
            'asaas_pix_qr' => ($status === 'pendente') ? fake()->url() : null,
            'asaas_pix_code' => ($status === 'pendente') ? fake()->uuid() : null,
            'transaction_date' => $transactionDate->format('Y-m-d'),
            'payment_date' => $paymentDate ? $paymentDate->format('Y-m-d') : null,
        ];
    }
}
