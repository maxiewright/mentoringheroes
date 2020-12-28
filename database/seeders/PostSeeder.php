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
            ->hasAttached(
                Category::factory()->count(2),
                ['is_main' => false]
            )
            ->hasComments(3)
            ->hasTags(3)

            ->count(10)->create();
    }
}
