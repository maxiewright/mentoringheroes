<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = [
            [
                'name' => 'Maxie Wright',
                'email'  => 'maxiewright@gmail.com',
                'about' => 'Developer',
                'password' => Hash::make('Password-01')
            ],
            [
                'name' => 'Kanu Sankara',
                'email'  => 'khsankara@gmail.com',
                'about' => 'Lead Author',
                'password' => Hash::make('Password-01')
            ],
        ];

        User::insert($users);

        $admins = User::all();

        foreach ($admins as $admin){
            $admin->assignRole('admin');
        }
    }
}
