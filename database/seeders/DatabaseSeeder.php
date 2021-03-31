<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            CommentStatusSeeder::class,
            PostStatusSeeder::class,
            TagSeeder::class,
            SocialMediaPlatformSeeder::class,
            RolesAndPermissionSeeder::class,
            UserSeeder::class,
        ]);
    }
}
