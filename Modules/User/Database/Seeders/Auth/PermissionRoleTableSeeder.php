<?php

namespace Modules\User\Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Modules\User\Traits\DisableForeignKeys;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create([
            'name' => config('project.users.admin_role'),
            'display_name' => 'Administrator',
            'description' => 'Site administrator with access to developer tools.'
        ]);

        $executive = Role::create([
            'name' => 'publisher',
            'display_name' => 'Publisher',
            'description' => 'Site editor with access to publishing tools.'
        ]);

        // Create Permissions
        $permissions = [
            'view-backend'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo(Permission::all());

        // Assign Permissions to other Roles
        $executive->givePermissionTo('view-backend');

        $this->enableForeignKeys();
    }
}
