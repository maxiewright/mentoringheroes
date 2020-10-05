<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CommentStatus;
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
        ]);
    }
}
