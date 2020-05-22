<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Users')->first() === null) {
            Permission::create([
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Users')->first() === null) {
            Permission::create([
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Users')->first() === null) {
            Permission::create([
                'name'        => 'Can Edit Users',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Users')->first() === null) {
            Permission::create([
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Super Admin Permissions')->first() === null) {
            Permission::create([
                'name'        => 'Super Admin Permissions',
                'slug'        => 'perms.super-admin',
                'description' => 'Has Super Admin Permissions',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Admin Permissions')->first() === null) {
            Permission::create([
                'name'        => 'Admin Permissions',
                'slug'        => 'perms.admin',
                'description' => 'Has Admin Permissions',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Moderator Permissions')->first() === null) {
            Permission::create([
                'name'        => 'Moderator Permissions',
                'slug'        => 'perms.moderator',
                'description' => 'Has Moderator Permissions',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Writer Permissions')->first() === null) {
            Permission::create([
                'name'        => 'Writer Permissions',
                'slug'        => 'perms.writer',
                'description' => 'Has Writer Permissions',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'User Permissions')->first() === null) {
            Permission::create([
                'name'        => 'User Permissions',
                'slug'        => 'perms.user',
                'description' => 'Has User Permissions',
                'model'       => 'Permission',
            ]);
        }
    }
}
