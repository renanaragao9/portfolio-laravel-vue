<?php

namespace Database\Seeders;

use App\Models\DonorProfile;
use App\Models\OngProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(1000)->create();

        foreach ($users as $user) {
            if ($user->profile_type === 'donor') {
                $user->donorProfile()->create(DonorProfile::factory()->make()->toArray());
            } elseif ($user->profile_type === 'ong') {
                $user->ongProfile()->create(OngProfile::factory()->make()->toArray());
            }
        }

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'birthdate' => '1990-01-01',
            'gender' => 'male',
            'image_path' => null,
            'profile_type' => 'donor',
            'email_verified_at' => now(),
            'is_active' => true,
        ]);

        $admin->donorProfile()->create(DonorProfile::factory()->make()->toArray());
    }
}
