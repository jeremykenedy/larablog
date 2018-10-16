<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get and Attach Super Admin Permissions to Roles.
         */
        $roleSuperAdmin = Role::where('name', '=', 'Super Admin')->first();
        $superAdminPermissions = Permission::all();
        foreach ($superAdminPermissions as $permission) {
            $roleSuperAdmin->attachPermission($permission);
        }

        /**
         * Get and Attach Admin Permissions to Roles.
         */
        $roleAdmin = Role::where('name', '=', 'Admin')->first();
        $adminPermissions = Permission::where('slug', 'perms.admin')
                       ->orWhere('slug', 'perms.moderator')
                       ->orWhere('slug', 'perms.writer')
                       ->orWhere('slug', 'perms.user')
                       ->get();
        foreach ($adminPermissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }

        /**
         * Get and Attach Moderator Permissions to Roles.
         */
        $roleModerator = Role::where('name', '=', 'Moderator')->first();
        $moderatorPermissions = Permission::where('slug', 'perms.moderator')
                       ->orWhere('slug', 'perms.writer')
                       ->orWhere('slug', 'perms.user')
                       ->get();
        foreach ($moderatorPermissions as $permission) {
            $roleModerator->attachPermission($permission);
        }

        /**
         * Get and Attach Writer Permissions to Roles.
         */
        $roleWriter = Role::where('name', '=', 'Writer')->first();
        $writerPermissions = Permission::where('slug', 'perms.writer')
                       ->orWhere('slug', 'perms.user')
                       ->get();
        foreach ($writerPermissions as $permission) {
            $roleWriter->attachPermission($permission);
        }

        /**
         * Get and Attach User Permissions to Roles.
         */
        $userPermissions = Permission::where('slug', 'perms.user')->get();
        $roleUser = Role::where('name', '=', 'User')->first();
        foreach ($userPermissions as $permission) {
            $roleUser->attachPermission($permission);
        }
    }
}
