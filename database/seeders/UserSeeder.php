<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Maxie',
                'last_name' => 'Wright',
                'email'  => 'maxiewright@gmail.com',
                'about' => 'Developer',
                'password' => Hash::make('Password-01')
            ],
            [
                'first_name' => 'Kanu',
                'last_name' => 'Sankara',
                'email'  => 'khsankara@gmail.com',
                'about' => 'Lead Author',
                'password' => Hash::make('Password-01')
            ],
        ];

        User::insert($users);
    }
}
