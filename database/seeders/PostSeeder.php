<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->hasAuthors(1)
            ->hasCategory(2)
            ->hasComments(3)
            ->hasTags(3)
            ->create();
    }
}
