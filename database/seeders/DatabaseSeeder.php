<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Consultation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(2)->create([
            'user_role' => 'user',
        ]);

        User::factory()->count(1)->create([
            'user_role' => 'doctor',
        ]);

        $this->call([
            ConsultationSeeder::class,
        ]);
    }
}
