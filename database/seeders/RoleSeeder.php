<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
                'name' => 'Administrator',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'Editor',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'Author',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'Contributor',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'Subscriber',
                'guard_name' => 'web',
                'created_at' => now(),
            ],

        ];

        Role::insert($roles);
    }
}
