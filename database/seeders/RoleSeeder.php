<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Administrator', 'guard_name' => 'api']);
        Role::create(['name' => 'PropertyOwner', 'guard_name' => 'api']);
        Role::create(['name' => 'Simple User', 'guard_name' => 'api']);
    }
}
