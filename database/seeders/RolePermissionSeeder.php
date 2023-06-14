<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        // DB::table('model_has_roles')->truncate();
        // DB::table('model_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $permissions = [
            [
                'name' => 'create',
                'description' => 'The user can create organization',
                'group' => 'organization',
                'can_access' => ['creator administrator']
            ],
        ];

        $roles = [
            [
                'name' => 'creator administrator',
                'description' => 'Create and edit core functions/features',
            ],
            [
                'name' => 'admin manager',
                'description' => 'Create and edit core functions/features',
            ],
            [
                'name' => 'user',
                'description' => 'user of the platform',
            ],

        ];

        collect($permissions)->map(function ($permission) {
            Permission::create([
                'name' => "{$permission['name']} {$permission['group']}",
                'description' => $permission['description'],
                'group' => $permission['group']
            ]);
        });

        collect($roles)->each(function ($role) use ($permissions) {
            $role = Role::create($role);
            $mappedPermissions = collect($permissions)->filter(function ($permission) use ($role) {
                return in_array($role['name'], $permission['can_access']);
            })->map(function ($permission) {
                return "{$permission['name']} {$permission['group']}";
            });

            $role->syncPermissions($mappedPermissions);
        });

    }
}