<?php

use App\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Roles
         *
         */
        if (Role::where('name', '=', 'Super Admin')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'Super Admin',
                'slug'        => 'super-admin',
                'description' => 'Super Admin Role',
                'level'       => 5,
            ]);
        }

        if (Role::where('name', '=', 'Admin')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 4,
            ]);
        }

        if (Role::where('name', '=', 'Moderator')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Moderator',
                'slug'        => 'moderator',
                'description' => 'Moderator Role',
                'level'       => 3,
            ]);
        }

        if (Role::where('name', '=', 'Writer')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Writer',
                'slug'        => 'writer',
                'description' => 'Writer Role',
                'level'       => 2,
            ]);
        }

        if (Role::where('name', '=', 'User')->first() === null) {
            $userRole = Role::create([
                'name'        => 'User',
                'slug'        => 'user',
                'description' => 'User Role',
                'level'       => 1,
            ]);
        }

        if (Role::where('name', '=', 'Unverified')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Unverified',
                'slug'        => 'unverified',
                'description' => 'Unverified Role',
                'level'       => 0,
            ]);
        }
    }
}
