<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'redirect_to' => '/admin'
            ],
            [
                'name' => 'user',
                'redirect_to' => '/home'
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
