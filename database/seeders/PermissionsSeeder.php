<?php

namespace Database\Seeders;

use App\Enums\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allRoles = Role::all()->keyBy('id');

        $permissions = [
            'properties-manage' => [Roles::ROLE_OWNER],
            'bookings-manage' => [Roles::ROLE_USER],
        ];

        foreach ($permissions as $key => $roles) {
            $permission = Permission::create(['name' => $key, 'guard_name' => 'api']);
            foreach ($roles as $role) {
                $allRoles[$role]->givePermissionTo($permission);
            }
        }
    }
}
