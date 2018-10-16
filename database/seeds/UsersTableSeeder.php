<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSuperAdminSeeded = false;
        // Clear the table
        // User::truncate();

        // Get the role
        $superAdminRole = Role::whereSlug('super.admin')->first();

        // Seed super admin

        $seededSuperAdminEmail = config('superadmin.baseSuperAdminUser01Email');
        $user = User::where('email', '=', $seededSuperAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name'              => config('superadmin.baseSuperAdminUser01Name'),
                'email'             => $seededSuperAdminEmail,
                'email_verified_at' => now(),
                'password'          => Hash::make(config('superadmin.baseSuperAdminUser01PW')),
                'remember_token'    => str_random(10),
            ]);

            $user->attachRole($superAdminRole);
            $user->save();

            $newSuperAdminSeeded = true;
        }

        if ($newSuperAdminSeeded) {
            echo "\033[01;33mSuccessfully Seeded: \033[0mSuper Admin User\r\n";

            return;
        }

        echo "\033[01;33mAlready Seeded: \033[0mSuper Admin User\r\n";
    }
}
