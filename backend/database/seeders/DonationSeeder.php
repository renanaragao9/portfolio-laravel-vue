<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        $donors = User::where('profile_type', 'donor')->get();
        $campaigns = Campaign::all();

        if ($donors->isEmpty() || $campaigns->isEmpty()) {
            return; // No donors or campaigns to create donations for
        }

        foreach ($donors as $donor) {
            // Create 5-10 donations per donor
            $numDonations = rand(5, 10);
            for ($i = 0; $i < $numDonations; $i++) {
                Donation::factory()->create([
                    'compaign_id' => $campaigns->random()->id,
                    'user_id' => $donor->id,
                ]);
            }
        }
    }
}
