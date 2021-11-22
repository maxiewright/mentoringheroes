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
            ->has(Category::factory()->count(3))
//            ->hasComments(3)
            ->hasTags(3)
            ->count(10)
            ->create();


//        $posts = Post::factory()
//            ->has(User::factory()->count(1), 'authors')
//            ->has(Category::factory()->count(3))
//            ->create();



    }
}
