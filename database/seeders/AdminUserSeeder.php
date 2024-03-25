<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'marcelognn@gmail.com',
            'password' => bcrypt('P@ssw0rd'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('Administrator');
    }
}
