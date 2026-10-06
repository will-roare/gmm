<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $admin = User::factory()->create([
        'name' => 'GMM Admin',
        'email' => 'admin@gmm.test',
        'password' => bcrypt('password'),
    ]);

    \App\Models\Episode::factory()->count(10)->create([
        'user_id' => $admin->id,
    ]);
}
}
