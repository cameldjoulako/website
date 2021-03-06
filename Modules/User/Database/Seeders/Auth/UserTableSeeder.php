<?php

namespace Modules\User\Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Modules\User\Traits\DisableForeignKeys;

class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Laravel',
            'username' => 'laravelcm',
            'email' => 'admin@laravelcm.com',
            'password' => 'password',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        $this->enableForeignKeys();
    }
}
